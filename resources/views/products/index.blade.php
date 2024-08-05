@push('css')
<link rel="stylesheet" href="{{asset('select2/dist/css/select2.js')}}"/>
@endpush
@push('js')
<script src="{{asset('select2/dist/js/select2.js')}}"></script>
@endpush
<x-layout-app title="Barang">
    <x-head-data-table/>
    <x-code-generate/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-header row">
                        <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                            <div class="p-3">
                                <h1 class="text-bold">Barang</h1>
                            </div>
                            <div>
                                <button class="btn btn-primary text-bold" type="button" data-toggle="modal" data-target="#TambahData" id="modal-button"><i class="fas fa-plus"></i>
                                    Tambah Merk
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="TambahDataModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TambahDataModalLabel">Tambah Data Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" onclick="clear()" >&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="code" class="form-label">kode</label>
                                                <input type="text" name="code" readonly class="form-control">
                                                <input type="hidden" name="id"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="name">nama <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="brand_id" class="form-label">merk <span class="text-danger">*</span></label>
                                                <select name="brand_id" class="form-control">
                                                    <option value="">-- pilih merk --</option>
                                                    @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="unit_id" class="form-label">Satuan <span class="text-danger">*</span></label>
                                                <select name="unit_id" class="form-control">
                                                    <option value="">-- pilih satuan  --</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="price" class="form-label">harga<span class="text-danger">*</span></label>
                                                <input type="text"  id="harga" name="price" class="form-control" placeholder="RP. 0">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <span  class="form-label text-bold">Foto</span>
                                                <label for="photo" class="form-label">
                                                    <img src="{{asset('default.png')}}" width="80%" alt="profile-user" id="outputImg" class="text-center">
                                                </label>
                                                <input class="form-control mt-5 d-none" id="photo" name="photo" type="file"  accept=".png,.jpeg,.jpg,.svg">
                                            </div>

                                            <div class="form-group">
                                                <label for="type_id" class="form-label">jenis <span class="text-danger">*</span></label>
                                                <select name="type_id" class="form-control">
                                                    <option value="">-- pilih jenis  --</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="kembali">kembali</button>
                                    <button type="button" class="btn btn-primary text-bold" id="simpan"><i class="fas fa-save px-1"></i>simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-body-data-table/>
</x-layout-app>
