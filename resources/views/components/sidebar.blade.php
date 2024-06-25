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

          <li class="nav-item  {{request()->routeIs('products.*')?'menu-open':''}}">
            <a href="javascript:void(0)" class="nav-link text-white {{request()->routeIs('products.*')?'bg-indigo text-bold':''}}">
              <i class="nav-icon fas fa-box"></i>
              <p>
              Master Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.types')}}" class="nav-link text-white {{request()->routeIs('products.types')?'bg-indigo text-bold':''}}">
                <i class="fas fa-angle-right"></i>
                 <p>Jenis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.units')}}" class="nav-link text-white {{request()->routeIs('products.units')?'bg-indigo text-bold':''}}">
                <i class="fas fa-angle-right"></i>
                  <p>Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Diskon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.brands')}}" class="nav-link text-white {{request()->routeIs('products.brands')?'bg-indigo text-bold':''}}">
                <i class="fas fa-angle-right"></i>
                  <p>Merk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products')}}" class="nav-link text-white">
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
                  <p>Laporan Pengembalian Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                <i class="fas fa-angle-right"></i>
                  <p>Laporan Jumlah Stok Barang</p>
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
                            <p>Hak akses</p>
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
                <i class="nav-icon fas fa-wrench mx-2"></i>
                  <p>Aplikasi</p>
                </a>
            </li>
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2" viewBox="0 0 16 16">
                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                    </svg>
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
