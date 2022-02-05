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