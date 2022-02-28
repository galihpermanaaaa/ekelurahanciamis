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
     var agama1 = <?php echo json_encode($agama1)?>;
     var agama2 = <?php echo json_encode($agama2)?>;
     var agama3 = <?php echo json_encode($agama3)?>;
     var agama4 = <?php echo json_encode($agama4)?>;
     var agama5 = <?php echo json_encode($agama5)?>;
     var agama6 = <?php echo json_encode($agama6)?>;
     var agama7 = <?php echo json_encode($agama7)?>;

Highcharts.chart('container3', {

chart: {
  styledMode: true
},

title: {
  text: 'Agama Masyarakat Kelurahan Ciamis'
},

xAxis: {
  categories: ['']
},

series: [{
  type: 'pie',
  allowPointSelect: true,
  keys: ['name', 'y', 'selected', 'sliced'],
  data: [
    ['Kepercayaan', agama7, false],
    ['Konghuchu', agama6, false],
    ['Budha', agama5, false],
    ['Hindu', agama4, false],
    ['Katholik', agama3, false],
    ['Kristen', agama2, false],
    ['Islam', agama1, true, true]
  ],
  showInLegend: true
}]
});
</script>