<header class="header z-index-50">
  <nav class="navbar py-3 px-0 shadow-sm text-white position-relative">
    <!-- Search Box-->
    <div class="search-box shadow-sm">
      <button class="dismiss d-flex align-items-center">
        <svg class="svg-icon svg-icon-heavy">
          <use xlink:href="#close-1"> </use>
        </svg>
      </button>
      <form id="searchForm" action="#" role="search">
        <input class="form-control shadow-0" type="text" placeholder="What are you looking for...">
      </form>
    </div>
    <div class="container-fluid w-100">
      <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
        <!-- Navbar Header-->
        <div class="navbar-header">
          <!-- Navbar Brand -->
          <a class="navbar-brand d-none d-sm-inline-block" href="index.php">
            <div class="brand-text d-none d-lg-inline-block"><span>Sisfo</span> <strong>Harga Kue</strong></div>
            <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div>
          </a>
          <!-- Toggle Button-->
          <a class="menu-btn active" id="toggle-btn" href="#"><span></span><span></span><span></span>
          </a>
        </div>
        <!-- Navbar Menu -->
        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
          <!-- Logout    -->
          <li class="nav-item"><a class="nav-link text-white" href="logout.php"> <span class="d-none d-sm-inline">Logout</span>
            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
              <use xlink:href="#security-1"> </use>
            </svg></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>