<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a class="simple-text logo-normal text-center">
            Web SPK
        </a>
    </div>
    
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            
            <li class="{{ request()->is('data_kriteria') ? 'active' : '' }}">
                <a href="{{ url('data_kriteria') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>Data Kriteria</p>
                </a>
            </li>

            <li class="{{ request()->is('data_sub_kriteria') ? 'active' : '' }}">
                <a href="{{ url('data_sub_kriteria') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Data Sub Kriteria</p>
                </a>
            </li>

            <li class="{{ request()->is('data_alternatif') ? 'active' : '' }}">
                <a href="{{ url('data_alternatif') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Data Alternatif</p>
                </a>
            </li>

            <li class="{{ request()->is('data_penilaian') ? 'active' : '' }}">
                <a href="{{ url('data_penilaian') }}">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    <p>Data Penilaian</p>
                </a>
            </li>

            <li class="{{ request()->is('data_hitung') ? 'active' : '' }}">
                <a href="{{ url('data_hitung') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Data Penghitungan</p>
                </a>
            </li>

            <li class="{{ request()->is('data_hasil') ? 'active' : '' }}">
                <a href="{{ url('data_hasil') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>Data Hasil</p>
                </a>
            </li>
        </ul>
    </div>
</div>