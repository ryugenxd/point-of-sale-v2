<x-layout-app title="Diskon">
    <x-head-data-table/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-header row">
                        <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                            <div class="p-3">
                                <h1 class="text-bold">Diskon</h1>
                            </div>
                            <div>
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#TambahData" id="moda-button">
                                <i class="fas fa-plus"></i>
                                 Tambah Diskon
                                </button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-body-data-table/>
    <x-fetch-prototype/>
    <script>
        console.log("hello world")
    </script>
</x-layout-app>