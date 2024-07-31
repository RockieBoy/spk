<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        // Membentuk Matriks Keputusan
        $matrixKeputusan = [];
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $penilaian = Penilaian::where('alternatif_id', $alternatif->id)
                                      ->where('kriteria_id', $kriteria->id)
                                      ->first();
                $matrixKeputusan[$alternatif->id][$kriteria->id] = $penilaian ? $penilaian->nilai : 0;
            }
        }

        // Membentuk Matriks Ternormalisasi
        $normalizedMatrix = [];
        foreach ($kriterias as $kriteria) {
            $x_max = max(array_column($matrixKeputusan, $kriteria->id));
            $x_min = min(array_column($matrixKeputusan, $kriteria->id));
            
            foreach ($alternatifs as $alternatif) {
                $x_ij = $matrixKeputusan[$alternatif->id][$kriteria->id];
                
                if ($x_max != $x_min) {
                    $normalizedMatrix[$alternatif->id][$kriteria->id] = ($x_ij - $x_min) / ($x_max - $x_min);
                } else {
                    $normalizedMatrix[$alternatif->id][$kriteria->id] = 0; // Avoid division by zero
                }
            }
        }

        // Membentuk Matriks Ternormalisasi Terbobot
        $weightedNormalizedMatrix = [];
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $weightedNormalizedMatrix[$alternatif->id][$kriteria->id] = $normalizedMatrix[$alternatif->id][$kriteria->id] * $kriteria->bobot;
            }
        }

        // Menentukan Matriks Area Perkiraan Perbatasan (G)
        $matrixG = [];
        foreach ($kriterias as $kriteria) {
            $sum = 0;
            foreach ($alternatifs as $alternatif) {
                $sum += $weightedNormalizedMatrix[$alternatif->id][$kriteria->id];
            }
            $matrixG[$kriteria->id] = $sum / count($alternatifs);
        }

        // Menghitung Matriks Jarak Alternatif dari Daerah Perkiraan Perbatasan (Q)
        $matrixQ = [];
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $matrixQ[$alternatif->id][$kriteria->id] = $weightedNormalizedMatrix[$alternatif->id][$kriteria->id] - $matrixG[$kriteria->id];
            }
        }

        // Menghitung Total Nilai Alternatif
        $totalNilaiAlternatif = [];
        foreach ($alternatifs as $alternatif) {
            $totalNilaiAlternatif[$alternatif->id] = array_sum($matrixQ[$alternatif->id]);

            // Simpan hasil akhir ke tabel perhitungan
            Perhitungan::updateOrCreate(
                ['alternatif_id' => $alternatif->id],
                ['hasil_akhir' => $totalNilaiAlternatif[$alternatif->id]]
            );
        }

        // Membentuk Ranking
        $ranking = array_keys($totalNilaiAlternatif);
        usort($ranking, function($a, $b) use ($totalNilaiAlternatif) {
            return $totalNilaiAlternatif[$b] <=> $totalNilaiAlternatif[$a];
        });

        return view('content.data_perhitungan.index', [
                'alternatifs' => $alternatifs,
                'kriterias' => $kriterias,
                'matrixKeputusan' => $matrixKeputusan,
                'normalizedMatrix' => $normalizedMatrix,
                'weightedNormalizedMatrix' => $weightedNormalizedMatrix,
                'matrixG' => $matrixG,
                'matrixQ' => $matrixQ,
                'totalNilaiAlternatif' => $totalNilaiAlternatif,
                'ranking' => $ranking
        ]);
    }
}
?>
