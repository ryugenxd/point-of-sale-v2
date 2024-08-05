<script> 
$(document).ready(function(){
    const viewImage = $("#outputImg");
    const image = $("#photo");

    image.on('change',function(e){
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            viewImage.attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    });
});
</script>