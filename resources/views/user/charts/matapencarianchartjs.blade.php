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
          y: matapencarian1,
          drilldown: "PNS"
        },
        {
          name: "TNI/POLRI",
          y: matapencarian2,
          drilldown: "TNI/POLRI"
        },
        {
          name: "BUMN/BUMD",
          y: matapencarian3,
          drilldown: "BUMN/BUMD"
        },
        {
          name: "Pegawai Swasta",
          y: matapencarian4,
          drilldown: "Pegawai Swasta"
        },
        {
          name: "Pertanian",
          y: matapencarian5,
          drilldown: "Pertanian"
        },
        {
          name: "Perikanan",
          y:matapencarian6,
          drilldown: "Perikanan"
        },
        {
          name: "Industri Pengolahan",
          y: matapencarian7,
          drilldown: "Industri Pengolahan",
        },
        {
          name: "Perdagangan",
          y: matapencarian8,
          drilldown: "Perdagangan",
        },
        {
          name: "Angkutan",
          y: matapencarian9,
          drilldown: "Angkutan",
        },
        {
          name: "Jasa-jasa",
          y: matapencarian10,
          drilldown: "Jasa-jasa",
        },
        {
          name: "Buruh Pertukangan",
          y: matapencarian11,
          drilldown: "Buruh Pertukangan",
        },
        {
          name: "Buruh Pertanian",
          y: matapencarian12,
          drilldown: "Buruh Pertanian",
        },
        {
          name: "Buruh Serabutan",
          y: matapencarian13,
          drilldown: "Buruh Serabutan",
        },
        {
          name: "Pengangguran",
          y: matapencarian14,
          drilldown: "Pengangguran",
        },
        {
          name: "Pensiunan",
          y: matapencarian15,
          drilldown: "Pensiunan",
        }
      ]
    }
  ],
  drilldown: {
    series: [
      {
        name: "Chrome",
        id: "Chrome",
        data: [
          [
            "v65.0",
            0.1
          ],
          [
            "v64.0",
            1.3
          ],
          [
            "v63.0",
            53.02
          ],
          [
            "v62.0",
            1.4
          ],
          [
            "v61.0",
            0.88
          ],
          [
            "v60.0",
            0.56
          ],
          [
            "v59.0",
            0.45
          ],
          [
            "v58.0",
            0.49
          ],
          [
            "v57.0",
            0.32
          ],
          [
            "v56.0",
            0.29
          ],
          [
            "v55.0",
            0.79
          ],
          [
            "v54.0",
            0.18
          ],
          [
            "v51.0",
            0.13
          ],
          [
            "v49.0",
            2.16
          ],
          [
            "v48.0",
            0.13
          ],
          [
            "v47.0",
            0.11
          ],
          [
            "v43.0",
            0.17
          ],
          [
            "v29.0",
            0.26
          ]
        ]
      },
      {
        name: "Firefox",
        id: "Firefox",
        data: [
          [
            "v58.0",
            1.02
          ],
          [
            "v57.0",
            7.36
          ],
          [
            "v56.0",
            0.35
          ],
          [
            "v55.0",
            0.11
          ],
          [
            "v54.0",
            0.1
          ],
          [
            "v52.0",
            0.95
          ],
          [
            "v51.0",
            0.15
          ],
          [
            "v50.0",
            0.1
          ],
          [
            "v48.0",
            0.31
          ],
          [
            "v47.0",
            0.12
          ]
        ]
      },
      {
        name: "Internet Explorer",
        id: "Internet Explorer",
        data: [
          [
            "v11.0",
            6.2
          ],
          [
            "v10.0",
            0.29
          ],
          [
            "v9.0",
            0.27
          ],
          [
            "v8.0",
            0.47
          ]
        ]
      },
      {
        name: "Safari",
        id: "Safari",
        data: [
          [
            "v11.0",
            3.39
          ],
          [
            "v10.1",
            0.96
          ],
          [
            "v10.0",
            0.36
          ],
          [
            "v9.1",
            0.54
          ],
          [
            "v9.0",
            0.13
          ],
          [
            "v5.1",
            0.2
          ]
        ]
      },
      {
        name: "Edge",
        id: "Edge",
        data: [
          [
            "v16",
            2.6
          ],
          [
            "v15",
            0.92
          ],
          [
            "v14",
            0.4
          ],
          [
            "v13",
            0.1
          ]
        ]
      },
      {
        name: "Opera",
        id: "Opera",
        data: [
          [
            "v50.0",
            0.96
          ],
          [
            "v49.0",
            0.82
          ],
          [
            "v12.1",
            0.14
          ]
        ]
      }
    ]
  }
});
</script>