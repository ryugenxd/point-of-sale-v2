<x-layout-app title="Pelanggan">
    <x-head-data-table />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-header row">
                        <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                            <div class="p-3">
                                <h1 class="text-bold">Pelanggan</h1>
                            </div>
                            <div>
                                <button class="btn btn-success" type="button" data-toggle="modal"
                                    data-target="#TambahData" id="modal-button"><i class="fas fa-plus"></i>
                                    Tambah Pelanggan
                                </button>
                            </div>
                        </div>
                    </div>

                <!-- Modal -->
                <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="TambahDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TambahDataModalLabel">Tambah Data Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" onclick="clear()" >&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="name">nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" autocomplete="off">
                                <input type="hidden" name="id" id="id">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone_number">telp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone_number" autocomplete="off">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="address"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="kembali">kembali</button>
                            <button type="button" class="btn btn-success" id="simpan">simpan</button>
                        </div>
                        </div>
                    </div>
                </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-tabel" width="100%"
                                class="table table-striped table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                                <thead class="bg-blue text-bold">
                                    <tr>
                                        <th class="border-bottom-0" width="4%">No</th>
                                        <th class="border-bottom-0">Nama</th>
                                        <th class="border-bottom-0">Telp</th>
                                        <th class="border-bottom-0">Alamat</th>
                                        <th class="border-bottom-0" width="1%">Tindakan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-body-data-table/>
    <x-fetch-prototype/>
    <script>
    $(document).ready(function(){
        Fetch.tabel(`{{route('customers.tabel')}}`,[
            {
                "data":null,"sortable":false,
                render:function(data,type,row,meta){
                    return meta.row + meta.settings._iDisplayStart+1;
                }
            },
            {
                data:'name',
                name:'name'
            },
            {
                data:'phone',
                name:'phone',
            },
            {
                data:'address',
                name:'address',
            },
            {
                data:'action',
                name:'action'
            }
        ]);

        const CallBack = function(){$("#name").val(null);$("#phone_number").val(null);$("#address").val(null);};

        $('#simpan').on('click',function(){
            if($(this).text() === "ubah"){
                Fetch.update('customers',{
                    name:$("#name").val(),
                    phone:$("#phone_number").val(),
                    address:$("#address").val()
                },CallBack);
            }else{
                Fetch.save('customers',{
                    name:$("#name").val(),
                    phone:$("#phone_number").val(),
                    address:$("#address").val()
                },CallBack);
            }
        });

        $("#modal-button").on("click",function(){
            $("#TambahDataModalLabel").text("Tambah Data Pelanggan");
            CallBack()
            $("#simpan").text("simpan");
        });

        $(document).on("click",".update",function(){
            let id = $(this).attr('id');
            $("#modal-button").click();
            $("#TambahDataModalLabel").text("Ubah Data Pelanggan");
            $("#simpan").text("ubah");
            $.ajax({
                url:'{{url('/')}}/customers/detail/'+id,
                type:"get",
                success:function({data}){
                    $("#id").val(data.id);
                    $("#name").val(data.name);
                    $("#phone_number").val(data.phone);
                    $("#address").val(data.address);
                }
            });
        });

        Fetch.delete("customers")
    });
    </script>
</x-layout-app>
