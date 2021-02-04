
  
  
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <!-- <a href="index.html">
          <img class="logo" src="../images/logogaga.png" alt="">
          <img class="logo-mini" src="../images/logogaga.png" alt="">
        </a> -->
      </div>

    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="../images/umcl.jpeg" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">Unsada Music Club</p>
            <h6 class="display-income">Role : <?= session('role'); ?></h6>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          <li>
            <a href="/admin">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li> 
          <li>
            <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Materi</span>
              <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
              <li>
                <a href="/admin/listmateri" >List Materi</a>
              </li>
              <!-- <li>
                <a href="/admin/tambahp" >Add Materi</a>
              </li> -->
            </ul>
          </li>
          <li>
            <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">User</span>
              <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
              <li>
                <a href="/admin/listuser">List User</a>
              </li>
              <li>
                <a href="/admin/tambahuser">Add User</a>
              </li>
            </ul>
            <li>
            <a href="/logout">
              <span class="link-title">Logout</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          </li>
        </ul>

      </div>