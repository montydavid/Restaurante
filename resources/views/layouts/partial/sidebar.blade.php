<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-light">
      <!-- Brand Logo -->
      <div class="brand-link bg-success">
         <i class="fa-solid fa-utensils fa-3x text-light"></i>
         <span class="ml-2 text-light">Restaurante</span>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item menu-open mt-2">
              <a href="home" class="nav-link active bg-danger">
                <i class="fa-solid fa-gauge fa-lg"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            
            <li class="nav-item mt-1">
            <a href="#" class="nav-link">
              <i class="fas fa-chart-pie fa-lg text-black"></i>
              <p class="text-black">
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('customers.index')}}" class="nav-link">
                  <i class="fa-solid fa-user fa-lg text-black"></i>
                  <p class="text-black">Cliente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="fa-solid fa-burger fa-lg text-black"></i>
                  <p class="text-black">Producto</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('orders.index') }}" class="nav-link">
                  <i class="fa-solid fa-scroll fa-lg text-black"></i>
                  <p class="text-black">Venta/factura</p>
                </a>
              </li>
              
            </ul>
            <li class="nav-item mt-1">
            <a href="#" class="nav-link">
              <i class="fa-brands fa-shopify fa-lg text-black"></i>
              <p class="text-black">
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fa-solid fa-cart-shopping fa-lg text-black"></i>
                  <p class="text-black">Proveedor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa-solid fa-burger fa-lg text-black"></i>
                  <p class="text-black">Producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="fa-solid fa-boxes-stacked fa-lg text-black"></i>
                  <p class="text-black">Pedido</p>
                </a>
              </li>        
          </ul>
          <li class="nav-item mt-1">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-folder-open fa-lg text-black"></i>
              <p class="text-black">
                Inventario
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fa-solid fa-burger fa-lg text-black"></i>
                  <p class="text-black">Producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa-solid fa-dungeon fa-lg text-black"></i>
                  <p class="text-black">Entrada</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="fa-solid fa-outdent fa-lg text-black"></i>
                  <p class="text-black">Salida</p>
                </a>
              </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>