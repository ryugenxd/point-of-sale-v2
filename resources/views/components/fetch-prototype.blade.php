<script>
class Fetch {
    static url = `{{url('/')}}`;
    static ajax = $.ajax;
    static tabel(route,columns){
        $("#data-tabel").DataTable({
            responsive: true, lengthChange: true, autoWidth: false,
            processing:true,
            serverSide:true,
            ajax:route,
            columns:columns
        }).button().container();
    }
    static save(endpoint,data,callback)
    {
        this.ajax({
            url:`${this.url}/${endpoint}/save`,
            type:"post",
            contenType:"json",
            data:data,
            success:function(res){
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#kembali').click();
                callback();
                $('#data-tabel').DataTable().ajax.reload();
            },
            error:function(err){
                if(err.status == 400){
                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Oops...",
                            text:"Harap isi inputan yang wajib di isi",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
            },
        })
    }
    static update(endpoint,data,callback)
    {
        let id = $("#id").val();
        this.ajax({
            url:`${this.url}/${endpoint}/update/${id}`,
                contenType:"json",
                type:"put",
                data:data,
                success:function(res){
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#kembali').click();
                    callback();
                    $('#data-tabel').DataTable().ajax.reload();
                    $('#simpan').text("simpan");
                },
                error:function(err){
                    if(err.status == 400){
                            Swal.fire({
                                position: "center",
                                icon: "warning",
                                title: "Oops...",
                                text:"Harap isi inputan yang wajib di isi",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
        });
    }
    static delete(endpoint)
    {
        $(document).on("click",".delete",function(){
            let id = $(this).attr('id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success m-1",
                    cancelButton: "btn btn-danger m-1"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                    title: "anda yakin ?",
                    text: "data ini akan di hapus",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "ya, hapus",
                    cancelButtonText: "tidak, kembali !",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:`{{url('/')}}/${endpoint}/delete/${id}`,
                            type:"delete",
                            success:function(res){
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: res.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            $('#data-tabel').DataTable().ajax.reload();
                        }
                    });
                }
            });
        });
    }
}
</script>
