<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script>
    $('#provinsi').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota").empty();
                $("#kecamatan").empty();
                $("#kota").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota").empty();
               $("#kecamatan").empty();
            } 
           }
        });
    }else{
        $("#kota").empty();
        $("#kecamatan").empty();
    }
   });

   $('#kota').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan").empty();
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan").empty();
            }
           }
        });
    }else{
        $("#kecamatan").empty();
    }
   });

   $('#kecamatan').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa").empty();
                $("#desa").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa").empty();
            }
           }
        });
    }else{
        $("#desa").empty();
    }
   });

   $('#desa').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw").empty();
                $("#rw").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw").empty();
            }
           }
        });
    }else{
        $("#rw").empty();
    }
   });


</script>



<script>
    $('#provinsi1').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota1").empty();
                $("#kecamatan1").empty();
                $("#kota1").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan1").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota1").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota1").empty();
               $("#kecamatan1").empty();
            }
           }
        });
    }else{
        $("#kota1").empty();
        $("#kecamatan1").empty();
    }
   });

   $('#kota1').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan1").empty();
                $("#kecamatan1").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan1").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan1").empty();
            }
           }
        });
    }else{
        $("#kecamatan1").empty();
    }
   });

   $('#kecamatan1').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa1").empty();
                $("#desa1").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa1").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa1").empty();
            }
           }
        });
    }else{
        $("#desa1").empty();
    }
   });

   $('#desa1').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw1").empty();
                $("#rw1").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw1").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw1").empty();
            }
           }
        });
    }else{
        $("#rw1").empty();
    }
   });


   


</script>

<script>
    $('#provinsi2').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota2").empty();
                $("#kecamatan2").empty();
                $("#kota2").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan2").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota2").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota2").empty();
               $("#kecamatan2").empty();
            }
           }
        });
    }else{
        $("#kota2").empty();
        $("#kecamatan2").empty();
    }
   });

   $('#kota2').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan2").empty();
                $("#kecamatan2").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan2").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan2").empty();
            }
           }
        });
    }else{
        $("#kecamatan2").empty();
    }
   });

   $('#kecamatan2').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa2").empty();
                $("#desa2").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa2").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa2").empty();
            }
           }
        });
    }else{
        $("#desa2").empty();
    }
   });

   $('#desa2').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw2").empty();
                $("#rw2").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw2").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw2").empty();
            }
           }
        });
    }else{
        $("#rw2").empty();
    }
   });


   


</script>



<script>
    $('#provinsi3').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota3").empty();
                $("#kecamatan3").empty();
                $("#kota3").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan3").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota3").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota3").empty();
               $("#kecamatan3").empty();
            }
           }
        });
    }else{
        $("#kota3").empty();
        $("#kecamatan3").empty();
    }
   });

   $('#kota3').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan3").empty();
                $("#kecamatan3").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan3").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan3").empty();
            }
           }
        });
    }else{
        $("#kecamatan3").empty();
    }
   });

   $('#kecamatan3').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa3").empty();
                $("#desa3").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa3").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa3").empty();
            }
           }
        });
    }else{
        $("#desa3").empty();
    }
   });

   $('#desa3').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw3").empty();
                $("#rw3").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw3").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw3").empty();
            }
           }
        });
    }else{
        $("#rw3").empty();
    }
   });


   


</script>






<script>
    $('#provinsi4').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota4").empty();
                $("#kecamatan4").empty();
                $("#kota4").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan4").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota4").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota4").empty();
               $("#kecamatan4").empty();
            }
           }
        });
    }else{
        $("#kota4").empty();
        $("#kecamatan4").empty();
    }
   });

   $('#kota4').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan4").empty();
                $("#kecamatan4").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan4").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan4").empty();
            }
           }
        });
    }else{
        $("#kecamatan4").empty();
    }
   });

   $('#kecamatan4').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa4").empty();
                $("#desa4").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa4").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa4").empty();
            }
           }
        });
    }else{
        $("#desa4").empty();
    }
   });

   $('#desa4').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw4").empty();
                $("#rw4").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw4").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw4").empty();
            }
           }
        });
    }else{
        $("#rw4").empty();
    }
   });


   


</script>



<script>
    $('#provinsi5').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota5").empty();
                $("#kecamatan5").empty();
                $("#kota5").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan5").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota5").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota5").empty();
               $("#kecamatan5").empty();
            }
           }
        });
    }else{
        $("#kota5").empty();
        $("#kecamatan5").empty();
    }
   });

   $('#kota5').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan5").empty();
                $("#kecamatan5").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan5").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan5").empty();
            }
           }
        });
    }else{
        $("#kecamatan5").empty();
    }
   });

   $('#kecamatan5').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa5").empty();
                $("#desa5").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa5").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa5").empty();
            }
           }
        });
    }else{
        $("#desa5").empty();
    }
   });

   $('#desa5').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw5").empty();
                $("#rw5").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw5").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw5").empty();
            }
           }
        });
    }else{
        $("#rw5").empty();
    }
   });


   


</script>


<script>
    $('#provinsi6').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota6").empty();
                $("#kecamatan6").empty();
                $("#kota6").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan6").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota6").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota6").empty();
               $("#kecamatan6").empty();
            }
           }
        });
    }else{
        $("#kota6").empty();
        $("#kecamatan6").empty();
    }
   });

   $('#kota6').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan6").empty();
                $("#kecamatan6").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan6").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan6").empty();
            }
           }
        });
    }else{
        $("#kecamatan6").empty();
    }
   });

   $('#kecamatan6').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa6").empty();
                $("#desa6").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa6").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa6").empty();
            }
           }
        });
    }else{
        $("#desa5").empty();
    }
   });

   $('#desa6').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw6").empty();
                $("#rw6").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw6").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw6").empty();
            }
           }
        });
    }else{
        $("#rw6").empty();
    }
   });


   


</script>





<script>
    $('#provinsi7').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota7").empty();
                $("#kecamatan7").empty();
                $("#kota7").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan7").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota7").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota7").empty();
               $("#kecamatan7").empty();
            }
           }
        });
    }else{
        $("#kota7").empty();
        $("#kecamatan7").empty();
    }
   });

   $('#kota7').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan7").empty();
                $("#kecamatan7").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan7").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan7").empty();
            }
           }
        });
    }else{
        $("#kecamatan7").empty();
    }
   });

   $('#kecamatan7').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa7").empty();
                $("#desa7").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa7").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa7").empty();
            }
           }
        });
    }else{
        $("#desa7").empty();
    }
   });

   $('#desa7').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw7").empty();
                $("#rw7").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw7").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw7").empty();
            }
           }
        });
    }else{
        $("#rw7").empty();
    }
   });
</script>





<script>
    $('#provinsi8').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota8").empty();
                $("#kecamatan8").empty();
                $("#kota8").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan8").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota8").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota8").empty();
               $("#kecamatan8").empty();
            }
           }
        });
    }else{
        $("#kota8").empty();
        $("#kecamatan8").empty();
    }
   });

   $('#kota8').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan8").empty();
                $("#kecamatan8").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan8").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan8").empty();
            }
           }
        });
    }else{
        $("#kecamatan8").empty();
    }
   });

   $('#kecamatan8').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa8").empty();
                $("#desa8").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa8").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa8").empty();
            }
           }
        });
    }else{
        $("#desa8").empty();
    }
   });

   $('#desa8').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw8").empty();
                $("#rw8").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw8").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw8").empty();
            }
           }
        });
    }else{
        $("#rw8").empty();
    }
   });
</script>




<script>
    $('#provinsi9').change(function(){
    var prov_id = $(this).val();
    if(prov_id){
        $.ajax({
           type:"GET",
           url:"/getKota?prov_id="+prov_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kota9").empty();
                $("#kecamatan9").empty();
                $("#kota9").append('<option>---Pilih Kabupaten/Kota---</option>');
                $("#kecamatan9").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota9").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota9").empty();
               $("#kecamatan9").empty();
            }
           }
        });
    }else{
        $("#kota9").empty();
        $("#kecamatan9").empty();
    }
   });

   $('#kota9').change(function(){
    var city_id = $(this).val();
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getKecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#kecamatan9").empty();
                $("#kecamatan9").append('<option>---Pilih Kecamatan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan9").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan9").empty();
            }
           }
        });
    }else{
        $("#kecamatan9").empty();
    }
   });

   $('#kecamatan9').change(function(){
    var dis_id = $(this).val();
    if(dis_id ){
        $.ajax({
           type:"GET",
           url:"/getDesa?dis_id="+dis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa9").empty();
                $("#desa9").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa9").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa9").empty();
            }
           }
        });
    }else{
        $("#desa9").empty();
    }
   });

   $('#desa9').change(function(){
    var subdis_id = $(this).val();
    if(subdis_id ){
        $.ajax({
           type:"GET",
           url:"/getRw?subdis_id="+subdis_id,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#rw9").empty();
                $("#rw9").append('<option>---Pilih RW---</option>');
                $.each(res,function(nama,kode){
                    $("#rw9").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#rw9").empty();
            }
           }
        });
    }else{
        $("#rw9").empty();
    }
   });
</script>







