<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<style>
  .highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 400px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>

<script>
  var sku_tab = <?php echo json_encode($sku_tab)?>;
  var skm_tab = <?php echo json_encode($skm_tab)?>;
  var skd_tab = <?php echo json_encode($skd_tab)?>;
  var duda_tab = <?php echo json_encode($duda_tab)?>;
  var janda_tab = <?php echo json_encode($janda_tab)?>;
  var skbm_tab = <?php echo json_encode($skbm_tab)?>;
  var bmr_tab = <?php echo json_encode($bmr_tab)?>;
  var kematian_tab = <?php echo json_encode($kematian_tab)?>;  
  var domisilipt_tab = <?php echo json_encode($domisilipt_tab)?>;
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: ''
  },
  subtitle: {
    text: ''
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: ''
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '',
    pointFormat: ''
  },

  series: [
    {
      name: "Surat",
      colorByPoint: true,
      data: [
        {
          name: "Surat Keterangan Usaha ",
          y: sku_tab,
        
        },
        {
          name: "Surat Keterangan Tidak Mampu",
          y: skm_tab,
        },
        {
          name: "Surat Keterangan Domisili",
          y: skd_tab,
        },
        {
          name: "Surat Keterangan Duda",
          y: duda_tab,
        },
        {
          name: "Surat Keterangan Janda",
          y: janda_tab,
        },

        {
          name: "Surat Keterangan Belum Menikah",
          y: skbm_tab,
        },

        {
          name: "Surat Keterangan Belum Memiliki Rumah",
          y: bmr_tab,
        },

        
        {
          name: "Surat Keterangan Kematian",
          y: kematian_tab,
        },

        {
          name: "Surat Keterangan Domisili Perusahaan",
          y: domisilipt_tab,
        },

      ]
    }
  ],
});
</script>