<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">Intive Studio</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="{{request()->is('/') ? ' active-page' : ''}}">
                <a href="/" ><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="{{request()->is('service*') ? ' active-page' : ''}}">
                <a href="/service"><i class="material-icons-outlined">inbox</i>Service</a>
            </li>
            <li class="{{request()->is('product*') ? ' active-page' : ''}}">
                <a href="/product"><i class="material-icons"> inventory </i>Product</a>
            </li>
            <li class="{{request()->is('article*') ? ' active-page' : ''}}">
                <a href="/article"><i class="material-icons-outlined">calendar_today</i>Article</a>
                
            </li>
            <li class="{{request()->is('award*') ? ' active-page' : ''}}">
                <a href="/award"><i class="material-icons"> emoji_events </i>Award</a>
            </li>
            <li class="{{request()->is('mediasosial*') ? ' active-page' : ''}}">
                <a href="/mediasosial"><i class="material-icons">cloud_queue</i>Media Sosial</a>
            </li>
            <li class="{{request()->is('profile*') ? ' active-page' : ''}}">
                <a href="/profile"><i class="material-icons"> account_circle </i>Profile</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="material-icons">
                        logout
                        </i>Logout
                </a>
                
            </li>                               
        </ul>
    </div>
</div>