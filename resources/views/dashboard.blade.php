<x-layout-app title="Dashboard">
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $customers }}</h3>
                    <p class="font-weight-bold">Pelanggan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-person"></i>
                </div>
                <a href="" class="small-box-footer">Lainnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $suppliers }}</h3>
                    <p class="font-weight-bold">Pemasok</p>
                </div>
                <div class="icon">
                   <i class="fas fa-shipping-fast"></i>
                </div>
                <a href="" class="small-box-footer">Lainnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $products  }}</h3>
                    <p class="font-weight-bold">Barang</p>
                </div>
                <div class="icon">
                   <i class="ion ion-cube"></i>
                </div>
                <a href="" class="small-box-footer">Lainnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $products  }}</h3>
                    <p class="font-weight-bold">Barang Masuk</p>
                </div>
                <div class="icon">
                   <i class="ion ion-cube"></i>
                </div>
                <a href="" class="small-box-footer">Lainnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



        <div class="col-lg-3 col-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $products  }}</h3>
                    <p class="font-weight-bold">Barang Keluar</p>
                </div>
                <div class="icon">
                   <i class="ion ion-cube"></i>
                </div>
                <a href="" class="small-box-footer">Lainnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        @foreach($users as $user)
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $user["count"]}}</h3>
                    <p class="font-weight-bold">{{ $user["name"]}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-person"></i>
                </div>
                <a href="" class="small-box-footer">Lainnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endforeach


    </div>

    <div class="row">
        <section class="col-lg-5">
            <div class="card">
                <div  class="card-header">
                <p class="fw-bold fs-6">Lacak Transaksi</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-lg-7">
            <div class="card">
                <div class="card-header">
                <p class="fw-bold fs-6">Detail Jumlah Barang</p>
                </div>
                <div class="card-body">
                    <table width="100%"
                        class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th class="border-bottom-0" width="4%">No</th>
                                <th class="border-bottom-0">Nama</th>
                                <th class="border-bottom-0" width="1%">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


</x-layout-app>
