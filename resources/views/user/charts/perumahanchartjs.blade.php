<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
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
    var perum1 = <?php echo json_encode($perum1)?>;
    var perum2 = <?php echo json_encode($perum2)?>;
    var perum3 = <?php echo json_encode($perum3)?>;
    var perum4 = <?php echo json_encode($perum4)?>;
    var perum5 = <?php echo json_encode($perum5)?>;

Highcharts.chart('container6', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45
    }
  },
  title: {
    text: 'Perumahan Kelurahan Ciamis'
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    pie: {
      innerSize: 100,
      depth: 45
    }
  },
  series: [{
    name: '',
    data: [
      ['Status Kepemilikan Sendiri', perum1],
      ['Status Kepemilikan Sewa Kontrak', perum2],
      ['Penyediaan Perumahan Perumnas', perum3],
      ['Penyediaan Perumahan Developer swasta', perum4],
      ['Penyediaan Perumahan Penyediaan Perseorangan', perum5]
    ]
  }]
});
</script>