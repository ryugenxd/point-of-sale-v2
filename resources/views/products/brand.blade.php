<x-layout-app title="Merk">
    <x-head-data-table/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card w-100">

                        <div class="card-header row">
                            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                                <div class="p-3">
                                    <h1 class="text-bold">Merk</h1>
                                </div>
                                <div>
                                    <button class="btn btn-success" type="button" data-toggle="modal"
                                        data-target="#TambahData" id="modal-button"><i class="fas fa-plus"></i>
                                        Tambah Merk
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="TambahDataModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TambahDataModalLabel">Tambah Data Merk</h5>
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
                                        <label for="description">catatan</label>
                                        <textarea class="form-control" id="description"></textarea>
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
                                    class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0" width="4%">No</th>
                                            <th class="border-bottom-0">Nama</th>
                                            <th class="border-bottom-0">Catatan</th>
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

        Fetch.tabel(`{{route('brands.tabel')}}`,[
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
                data:'description',
                name:'description',
                render:function(data){
                    if(data == null) return  "<span class='font-weight-bold text-center'>-</span>";
                            return data;
                }
            },
            {
                data:"action",
                name:"action"
            }
        ]);

        const CallBack = function(){$("#name").val(null);$("#description").val(null);};

        $('#simpan').on('click',function(){
            if($(this).text() === "ubah"){
                Fetch.update('products/brands',{name:$("#name").val(),description:$("#description").val()},CallBack);
            }else{
                Fetch.save("products/brands", {name:$("#name").val(),description:$("#description").val()},CallBack);
            }
        });

        $("#modal-button").on("click",function(){
            $("#TambahDataModalLabel").text("Tambah Data Merk");
            CallBack();
            $("#simpan").text("simpan");
        });

        $(document).on("click",".update",function(){
            let id = $(this).attr('id');
            $("#modal-button").click();
            $("#TambahDataModalLabel").text("Ubah Data Merk");
            $("#simpan").text("ubah");
            $.ajax({
                url:'{{url('/')}}/products/brands/detail/'+id,
                type:"get",
                success:function({data}){
                    $("#id").val(data.id);
                    $("#name").val(data.name);
                    $("#description").val(data.description);
                }
            });
        });

        Fetch.delete('products/brands');

    });
    </script>
</x-layout-app>
