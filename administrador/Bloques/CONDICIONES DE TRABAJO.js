Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: 'CONDICIONES DE TRABAJO  '
  },
 subtitle: {
    text: 'Area RH'
  },
  xAxis: {
    categories:[
      '52. ',
      '53. ',
      '54. ',
      '55.',
      '56.',
      '57',
      '58',
      '59',
      '60'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Promedio'
    }
  },
 tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
   pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: .0,
      dataLabels:{

        enabled:true,
        color:'blue'
      }
    }
  },
  series: [{
    name: 'Satisfecho',
    data:  [49.9, 71.5, 106.4, 129.2,414,4141,741,41,100]

  }, {
    name: 'Neutro',
    data: [83.6, 78.8, 98.5, 93.4,10,454,400,440,4410]

  }, {
    name: 'Insatisfecho',
    data: [48.9, 38.8, 39.3, 41.41,10,41,74,410,10]

  }


  ]
});