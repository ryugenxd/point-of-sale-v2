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




    </div>

    <div class="row">
        <section class="col-lg-5">
            <div class="card">
                <div  class="card-header">
                <p class="fw-bold fs-6 text-bold">Daftar Peran</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table w-100">
                                <thead class="bg-blue">
                                    <tr>
                                        <th class="text-bold">Nama</th>
                                        <th class="text-bold">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['count']}}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="p-2">
                                        <td class="text-bold bg-red">
                                            Total :
                                        </td>
                                        <td class="bg-green text-center text-bold">
                                            {{$user_all}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-lg-7">
            <div class="card">
                <div class="card-header">
                <p class="fw-bold fs-6 text-bold">Detail Jumlah Barang</p>
                </div>
                <div class="card-body">
                    <table width="100%"
                        class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                        <thead class="bg-blue">
                            <tr>
                                <th class="border-bottom-0 text-bold" width="4%">No</th>
                                <th class="border-bottom-0 text-bold">Nama</th>
                                <th class="border-bottom-0 text-bold" width="1%">Jumlah</th>
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
