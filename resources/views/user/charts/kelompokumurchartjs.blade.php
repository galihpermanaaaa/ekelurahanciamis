<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
 #container {
  height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

#datatable {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

#datatable caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

#datatable th {
  font-weight: 600;
  padding: 0.5em;
}

#datatable td,
#datatable th,
#datatable caption {
  padding: 0.5em;
}

#datatable thead tr,
#datatable tr:nth-child(even) {
  background: #f8f8f8;
}

#datatable tr:hover {
  background: #f1f7ff;
}
</style>

<script>
    var kelompok_umur1_lk = <?php echo json_encode($kelompok_umur1_lk)?>; 
    var kelompok_umur1_pr = <?php echo json_encode($kelompok_umur1_pr)?>;

    var kelompok_umur2_lk = <?php echo json_encode($kelompok_umur2_lk)?>;
    var kelompok_umur2_pr = <?php echo json_encode($kelompok_umur2_pr)?>;

    var kelompok_umur3_lk = <?php echo json_encode($kelompok_umur3_lk)?>;
    var kelompok_umur3_pr = <?php echo json_encode($kelompok_umur3_pr)?>;

    var kelompok_umur4_lk = <?php echo json_encode($kelompok_umur4_lk)?>;
    var kelompok_umur4_pr = <?php echo json_encode($kelompok_umur4_pr)?>;

    var kelompok_umur5_lk = <?php echo json_encode($kelompok_umur5_lk)?>;
    var kelompok_umur5_pr = <?php echo json_encode($kelompok_umur5_pr)?>;

    var kelompok_umur6_lk = <?php echo json_encode($kelompok_umur6_lk)?>;
    var kelompok_umur6_pr = <?php echo json_encode($kelompok_umur6_pr)?>;

    var kelompok_umur7_lk = <?php echo json_encode($kelompok_umur7_lk)?>;
    var kelompok_umur7_pr = <?php echo json_encode($kelompok_umur7_pr)?>;

    var kelompok_umur8_lk = <?php echo json_encode($kelompok_umur8_lk)?>;
    var kelompok_umur8_pr = <?php echo json_encode($kelompok_umur8_pr)?>;

    var kelompok_umur9_lk = <?php echo json_encode($kelompok_umur9_lk)?>;
    var kelompok_umur9_pr = <?php echo json_encode($kelompok_umur9_pr)?>;

    var kelompok_umur10_lk = <?php echo json_encode($kelompok_umur10_lk)?>;
    var kelompok_umur10_pr = <?php echo json_encode($kelompok_umur10_pr)?>;

    var kelompok_umur11_lk = <?php echo json_encode($kelompok_umur11_lk)?>;
    var kelompok_umur11_pr = <?php echo json_encode($kelompok_umur11_pr)?>;

    var kelompok_umur12_lk = <?php echo json_encode($kelompok_umur12_lk)?>;
    var kelompok_umur12_pr = <?php echo json_encode($kelompok_umur12_pr)?>;

    var kelompok_umur13_lk = <?php echo json_encode($kelompok_umur13_lk)?>;
    var kelompok_umur13_pr = <?php echo json_encode($kelompok_umur13_pr)?>;

    var kelompok_umur14_lk = <?php echo json_encode($kelompok_umur14_lk)?>;
    var kelompok_umur14_pr = <?php echo json_encode($kelompok_umur14_pr)?>;

    var kelompok_umur15_lk = <?php echo json_encode($kelompok_umur15_lk)?>;
    var kelompok_umur15_pr = <?php echo json_encode($kelompok_umur15_pr)?>;

    var kelompok_umur16_lk = <?php echo json_encode($kelompok_umur16_lk)?>;
    var kelompok_umur16_pr = <?php echo json_encode($kelompok_umur16_pr)?>;

    Highcharts.chart('container', {

chart: {
  type: 'column'
},

title: {
  text: 'Kriteria Umur Masyarakat Kelurahan Ciamis'
},

xAxis: {
  categories: ['0-4','5-9','10-14','15-19','20-24','25-29','30-34','35-39','40-44','45-49','50-54','55-59','60-64','65-69','70-74','75keatas']
},

yAxis: {
  allowDecimals: false,
  min: 0,
  title: {
    text: ''
  }
},

tooltip: {
  formatter: function () {
    return '<b>' + this.x + '</b><br/>' +
      this.series.name + ': ' + this.y + '<br/>';
  }
},

plotOptions: {
  column: {
    stacking: 'normal'
  }
},

series: [{
  name: 'Laki-laki',
  data: [parseFloat(kelompok_umur1_lk), parseFloat(kelompok_umur2_lk), parseFloat(kelompok_umur3_lk), parseFloat(kelompok_umur4_lk), parseFloat(kelompok_umur5_lk), parseFloat(kelompok_umur6_lk),
         parseFloat(kelompok_umur7_lk), parseFloat(kelompok_umur8_lk), parseFloat(kelompok_umur9_lk), parseFloat(kelompok_umur10_lk), parseFloat(kelompok_umur11_lk), parseFloat(kelompok_umur12_lk),
         parseFloat(kelompok_umur13_lk), parseFloat(kelompok_umur14_lk), parseFloat(kelompok_umur15_lk), parseFloat(kelompok_umur16_lk)],
  stack: 'Laki-laki'
}, {
  name: 'Perempuan',
  data: [parseFloat(kelompok_umur1_pr), parseFloat(kelompok_umur2_pr), parseFloat(kelompok_umur3_pr), parseFloat(kelompok_umur4_pr), parseFloat(kelompok_umur5_pr), parseFloat(kelompok_umur6_pr),
         parseFloat(kelompok_umur7_pr), parseFloat(kelompok_umur8_pr), parseFloat(kelompok_umur9_pr), parseFloat(kelompok_umur10_pr), parseFloat(kelompok_umur11_pr), parseFloat(kelompok_umur12_pr),
         parseFloat(kelompok_umur13_pr), parseFloat(kelompok_umur14_pr), parseFloat(kelompok_umur15_pr), parseFloat(kelompok_umur16_pr)],
  stack: 'Perempuan'
}]
});

</script>