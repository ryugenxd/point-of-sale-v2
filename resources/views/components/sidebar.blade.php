  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-blue elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('icon.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->



      <!-- Sidebar Menu -->
      <nav class="mt-2 text-capitalize">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Menu</li>
         <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link text-white {{request()->routeIs('dashboard')?"bg-indigo text-bold":''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item  {{request()->routeIs('goods.*')?'menu-open':''}}">
            <a href="javascript:void(0)" class="nav-link text-white {{request()->routeIs('goods.*')?'bg-indigo text-bold':''}}">
              <i class="nav-icon fas fa-box"></i>
              <p>
              Master Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('goods.types')}}" class="nav-link text-white {{request()->routeIs('goods.types')?'bg-indigo text-bold':''}}">
                <i class="fas fa-angle-right"></i>
                 <p>Jenis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('goods.units')}}" class="nav-link text-white {{request()->routeIs('goods.units')?'bg-indigo text-bold':''}}">
                <i class="fas fa-angle-right"></i>
                  <p>Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('goods.brands')}}" class="nav-link text-white {{request()->routeIs('goods.brands')?'bg-indigo text-bold':''}}">
                <i class="fas fa-angle-right"></i>
                  <p>Merk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('customers')}}" class="nav-link text-white {{request()->routeIs('customers')?'bg-indigo text-bold':''}}">
              <i class="nav-icon far fa-user"></i>
              <p>
              Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('suppliers')}}" class="nav-link text-white {{request()->routeIs('suppliers')?'bg-indigo text-bold':''}}">
              <i class="nav-icon fas fa-shipping-fast"></i>
              <p>
               Pemasok
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link text-white">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
              Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Transaksi Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Transaksi keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link text-white">
              <i class="nav-icon fas fa-print"></i>
              <p>
              Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Laporan Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Laporan Barang keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Laporan Jumlah Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Lainnya</li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link text-white">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pangaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>web</p>
                </a>
              </li> -->
            <li  class="nav-item">
                <a href="javascript:void(0)" class="nav-link text-white">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Kelola Peran
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">
                        <i class="fas fa-angle-right"></i>
                            <p>Atur hak akses</p>
                        </a>
                    </li>
                    @foreach($roles as $role)
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">
                        <i class="fas fa-angle-right"></i>
                        <p>{{$role}}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Akun</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="" class="nav-link text-white">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                Keluar
                </p>
              </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
