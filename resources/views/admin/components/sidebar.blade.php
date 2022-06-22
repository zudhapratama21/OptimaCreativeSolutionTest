<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">Intive Studio</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="{{request()->is('dashboard') ? ' active-page' : ''}}">
                <a href="index.html" ><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="{{request()->is('service') ? ' active-page' : ''}}">
                <a href="/service"><i class="material-icons-outlined">inbox</i>Service</a>
            </li>
            <li class="{{request()->is('product') ? ' active-page' : ''}}">
                <a href="/product"><i class="material-icons-outlined">account_circle</i>Product</a>
            </li>
            <li class="{{request()->is('article') ? ' active-page' : ''}}">
                <a href="/article"><i class="material-icons-outlined">calendar_today</i>Article</a>
                
            </li>
            <li class="{{request()->is('award') ? ' active-page' : ''}}">
                <a href="/award"><i class="material-icons">cloud_queue</i>Award</a>
            </li>
            <li>
                <a href="todo.html"><i class="material-icons">
                    logout
                    </i>Logout</a>
            </li>                               
        </ul>
    </div>
</div>