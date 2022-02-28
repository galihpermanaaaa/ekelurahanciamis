<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
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
var kb1 = <?php echo json_encode($kb1)?>;
var kb2 = <?php echo json_encode($kb2)?>;
var kb3 = <?php echo json_encode($kb3)?>;
var kb4 = <?php echo json_encode($kb4)?>;
var kb5 = <?php echo json_encode($kb5)?>;


Highcharts.chart('container7', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Keluarga Berencana Kelurahan Ciamis'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: ''
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
  formatter: function () {
    return '<b>' + this.y + '<br/>';
  }
},
  series: [{
    name: 'Keluarga Berencana',
    data: [
      ['PUS', kb1],
      ['Peserta KB Aktif', kb2],
      ['Pra KS', kb3],
      ['KS 1', kb4],
      ['KS', kb5]
    ],
    dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '11px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});
</script>