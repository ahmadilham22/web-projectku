<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard')? 'active' : '' }}"  href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/penduduk')? 'active' : '' }}"  href="/dashboard/penduduk/">
              <span data-feather="user"></span>
               Population Data
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/data')? 'active' : '' }}"  href="/dashboard/data">
              <span data-feather="users"></span>
               Users 
            </a>
          </li>
          
        </ul>   
      </div>
</nav>