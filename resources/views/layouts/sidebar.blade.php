<aside>
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a class="simple-text logo-normal text-center">
            Web SPK
        </a>
    </div>
    
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ url('/dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            
            @if (Auth::user()->role == 'dosen')
                <li class="{{ request()->is('kriterium') ? 'active' : '' }}">
                    <a href="{{ route('kriterium.index') }}">
                        <i class="nc-icon nc-diamond"></i>
                        <p>Data Kriteria</p>
                    </a>
                </li>
                <li class="{{ request()->is('alternatif') ? 'active' : '' }}">
                    <a href="{{ route('alternatif.index') }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Data Alternatif</p>
                    </a>
                </li>
                    <li class="{{ request()->is('perhitungan') ? 'active' : '' }}">
                        <a href="{{ route('perhitungan.index') }}">
                            <i class="nc-icon nc-tile-56"></i>
                            <p>Data Penghitungan</p>
                        </a>
                    </li>
            @endif
            @if (Auth::user()->role == 'superadmin')
                <li class="{{ request()->is('adminusers') ? 'active' : '' }}">
                    <a href="{{ url('adminusers') }}">
                        <i class="nc-icon nc-paper"></i>
                        <p>Data User</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'mahasiswa')
                <li class="{{ request()->is('hasils') ? 'active' : '' }}">
                    <a href="{{ url('hasils') }}">
                        <i class="nc-icon nc-paper"></i>
                        <p>Data Hasil</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
</aside>
