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





