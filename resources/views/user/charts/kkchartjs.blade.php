<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
    @import "https://code.highcharts.com/css/highcharts.css";

.highcharts-pie-series .highcharts-point {
  stroke: #ede;
  stroke-width: 2px;
}

.highcharts-pie-series .highcharts-data-label-connector {
  stroke: silver;
  stroke-dasharray: 2, 2;
  stroke-width: 2px;
}

.highcharts-figure,
.highcharts-data-table table {
  min-width: 320px;
  max-width: 600px;
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
     var kk1 = <?php echo json_encode($kk1)?>;
     var kk2 = <?php echo json_encode($kk2)?>;
     
Highcharts.chart('container4', {

chart: {
  styledMode: true
},

title: {
  text: 'Kepala Keluarga Masyarakat Kelurahan Ciamis'
},

xAxis: {
  categories: ['']
},

series: [{
  type: 'pie',
  allowPointSelect: true,
  keys: ['name', 'y', 'selected', 'sliced'],
  data: [
    ['Laki-laki', kk1, false],
    ['perempuan', kk2, false],
  ],
  showInLegend: true
}]
});
</script>