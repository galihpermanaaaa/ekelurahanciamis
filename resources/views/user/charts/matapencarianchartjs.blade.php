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
    var matapencarian1 = <?php echo json_encode($matapencarian1)?>;
    var matapencarian2 = <?php echo json_encode($matapencarian2)?>;
    var matapencarian3 = <?php echo json_encode($matapencarian3)?>;
    var matapencarian4 = <?php echo json_encode($matapencarian4)?>;
    var matapencarian5 = <?php echo json_encode($matapencarian5)?>;
    var matapencarian6 = <?php echo json_encode($matapencarian6)?>;
    var matapencarian7 = <?php echo json_encode($matapencarian7)?>;
    var matapencarian8 = <?php echo json_encode($matapencarian8)?>;
    var matapencarian9 = <?php echo json_encode($matapencarian9)?>;
    var matapencarian10 = <?php echo json_encode($matapencarian10)?>;
    var matapencarian11 = <?php echo json_encode($matapencarian11)?>;
    var matapencarian12 = <?php echo json_encode($matapencarian12)?>;
    var matapencarian13 = <?php echo json_encode($matapencarian13)?>;
    var matapencarian14 = <?php echo json_encode($matapencarian14)?>;
    var matapencarian15 = <?php echo json_encode($matapencarian15)?>;

Highcharts.chart('container2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Mata Pencarian Masyarakat Kelurahan Ciamis'
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
        format: '{point.y}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
  },

  series: [
    {
      name: "",
      colorByPoint: true,
      data: [
        {
          name: "PNS",
          y: parseFloat(matapencarian1),
          drilldown: "PNS"
        },
        {
          name: "TNI/POLRI",
          y: parseFloat(matapencarian2),
          drilldown: "TNI/POLRI"
        },
        {
          name: "BUMN/BUMD",
          y: parseFloat(matapencarian3),
          drilldown: "BUMN/BUMD"
        },
        {
          name: "Pegawai Swasta",
          y: parseFloat(matapencarian4),
          drilldown: "Pegawai Swasta"
        },
        {
          name: "Pertanian",
          y: parseFloat(matapencarian5),
          drilldown: "Pertanian"
        },
        {
          name: "Perikanan",
          y:parseFloat(matapencarian6),
          drilldown: "Perikanan"
        },
        {
          name: "Industri Pengolahan",
          y: parseFloat(matapencarian7),
          drilldown: "Industri Pengolahan",
        },
        {
          name: "Perdagangan",
          y: parseFloat(matapencarian8),
          drilldown: "Perdagangan",
        },
        {
          name: "Angkutan",
          y: parseFloat(matapencarian9),
          drilldown: "Angkutan",
        },
        {
          name: "Jasa-jasa",
          y: parseFloat(matapencarian10),
          drilldown: "Jasa-jasa",
        },
        {
          name: "Buruh Pertukangan",
          y: parseFloat(matapencarian11),
          drilldown: "Buruh Pertukangan",
        },
        {
          name: "Buruh Pertanian",
          y: parseFloat(matapencarian12),
          drilldown: "Buruh Pertanian",
        },
        {
          name: "Buruh Serabutan",
          y: parseFloat(matapencarian13),
          drilldown: "Buruh Serabutan",
        },
        {
          name: "Pengangguran",
          y: parseFloat(matapencarian14),
          drilldown: "Pengangguran",
        },
        {
          name: "Pensiunan",
          y: parseFloat(matapencarian15),
          drilldown: "Pensiunan",
        }
      ]
    }
  ]
});
</script>