<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">Coding Test</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>          
            <li class="{{request()->is('company*') ? ' active-page' : ''}}">
                <a href="/company"><i class="material-icons-outlined">inbox</i>Company</a>
            </li>
            <li class="{{request()->is('employee*') ? ' active-page' : ''}}">
                <a href="/employee"><i class="material-icons"> inventory </i>Employee</a>
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