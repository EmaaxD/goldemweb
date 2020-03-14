 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nombre'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header text-uppercase text-white">menu de navegacion</li>
        <li class="treeview">
          <a href="area-admin.php">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
          <!-- <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          </ul> -->
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span>Eventos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu text-capitalize">
            <li><a href="lista-evento.php"><i class="fa fa-list-ul"></i> ver todos</a></li>
            <li><a href="crear-evento.php"><i class="fa fa-plus-circle"></i> agregar</a></li>
          </ul>
        </li>

        <li class="treeview text-capitalize">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>categoria eventos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu text-capitalize">
            <li><a href="lista-categoria.php"><i class="fa fa-list-ul"></i> ver todos</a></li>
            <li><a href="crear-categoria.php"><i class="fa fa-plus-circle"></i> agregar</a></li>
          </ul>
        </li>

        <li class="treeview text-capitalize">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>invitados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu text-capitalize">
            <li><a href="lista-invitados.php"><i class="fa fa-list-ul"></i> ver todos</a></li>
            <li><a href="crear-invitados.php"><i class="fa fa-plus-circle"></i> agregar</a></li>
          </ul>
        </li>

        <li class="treeview text-capitalize">
          <a href="#">
            <i class="far fa-gem"></i>
            <span>registrados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu text-capitalize">
            <li><a href="lista-registrado.php"><i class="fa fa-list-ul"></i> ver todos</a></li>
            <li><a href="crear-registro.php"><i class="fa fa-plus-circle"></i> agregar</a></li>
          </ul>
        </li>

        <li class="treeview text-capitalize">
          <a href="#">
            <i class="fa fa-comments"></i>
            <span>testimoniales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu text-capitalize">
            <li><a href="#"><i class="fa fa-list-ul"></i> ver todos</a></li>
            <li><a href="#"><i class="fa fa-plus-circle"></i> agregar</a></li>
          </ul>
        </li>

        <?php if ($_SESSION['nivel'] == 1): ?>
            <li class="treeview text-capitalize">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>administradores</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu text-capitalize">
                <li><a href="listar-admin.php"><i class="fa fa-list-ul"></i> ver todos</a></li>
                <li><a href="crear-admin.php"><i class="fa fa-plus-circle"></i> agregar</a></li>
              </ul>
            </li>  
        <?php endif ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>