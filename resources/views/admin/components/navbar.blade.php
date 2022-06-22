<nav class="navbar navbar-expand d-flex justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item small-screens-sidebar-link">
            <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
        </li>
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../../assets/images/avatars/profile-image-1.png" alt="profile image">
                <span>Nancy Moore</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                {{-- <a class="dropdown-item" href="#">Calendar<span class="badge badge-pill badge-info float-right">2</span></a>
                <a class="dropdown-item" href="#">Settings &amp Privacy</a>
                <a class="dropdown-item" href="#">Switch Account</a> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                <a class="dropdown-item" href="#">Log out</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
        </li>
    </ul>   
    <div class="navbar-search">
        <form>
            <div class="form-group">
                <input type="text" name="search" id="nav-search" placeholder="Search...">
            </div>
        </form>
    </div>
</nav>