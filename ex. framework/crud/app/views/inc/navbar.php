<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo URLROOT; ?>/">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Inici</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
        <i class="mdi mdi-table-edit  menu-icon"></i>
        <span class="menu-title">Menú</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse <?php echo (strpos($_SERVER['REQUEST_URI'] ,"edit") !== false) ? 'show' : ''; ?>" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'] ,"add") !== false) ? 'active' : ''; ?>" href="<?php echo URLROOT; ?>/menus/add">Insertar</a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'] ,"edit") !== false OR strpos($_SERVER['REQUEST_URI'] ,"menus/index") !== false) ? 'active' : 'pasar'; ?>" href="<?php echo URLROOT; ?>/menus/index">Modificar</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>