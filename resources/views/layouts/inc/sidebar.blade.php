<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="#" class="simple-text logo-normal">
        Admin Panel
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}  ">
          <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('categories') ? 'active':'' }}">
          <a class="nav-link" href="{{ url('categories') }}">
            <i class="material-icons">category</i>
            <p>Kategori</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('products') ? 'active':'' }}">
          <a class="nav-link" href="{{ url('products') }}">
              <i class="material-icons">cake</i>
              <p>Produk</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('districts') ? 'active':'' }}">
          <a class="nav-link" href="{{ url('districts') }}">
              <i class="material-icons">local_shipping</i>
              <p>Ongkos Kirim</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('orders') ? 'active':'' }}">
          <a class="nav-link" href="{{ url('orders') }}">
            <i class="material-icons">content_paste</i>
            <p>Pesanan</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('users') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="material-icons">persons</i>
              <p>Akun</p>
            </a>
        </li>

      </ul>
    </div>
  </div>
