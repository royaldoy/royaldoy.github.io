<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url(); ?>">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
        <i class="mdi mdi-leaf menu-icon"></i>
        <span class="menu-title">Event</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="admin">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/admin/event_add"> Tambah Event </a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/admin/event_manage"> Manage Event </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#member" aria-expanded="false" aria-controls="member">
        <i class="mdi mdi-human-handsup menu-icon"></i>
        <span class="menu-title">Member</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="member">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/admin/member_manage"> Manage Member </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data">
        <i class="mdi mdi-account-card-details menu-icon"></i>
        <span class="menu-title">data</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="data">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/member/manage_member"> Manage Member </a></li>
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="documentation/documentation.html">
        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>