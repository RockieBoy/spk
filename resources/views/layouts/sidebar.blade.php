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
            
            <li class="{{ request()->is('icon') ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-diamond"></i>
                    <p>Icons</p>
                </a>
            </li>

            <li class="{{ request()->is('maps') ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>Maps</p>
                </a>
            </li>

            <li class="{{ request()->is('notif') ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>

            <li class="{{ request()->is('profile') ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>

            <li class="{{ request()->is('table') ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Table List</p>
                </a>
            </li>

            <li class="{{ request()->is('typografi') ? 'active' : '' }}">
                <a href="">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>Typography</p>
                </a>
            </li>
        </ul>
    </div>
</div>