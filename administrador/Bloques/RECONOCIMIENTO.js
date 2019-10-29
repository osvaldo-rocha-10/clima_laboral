Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: 'RECONOCIMIENTO '
  },
 subtitle: {
    text: 'Area RH'
  },
  xAxis: {
    categories:[
      '48. ',
      '49. ',
      '50. ',
      '51.'
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
    data:  [49.9, 71.5, 106.4, 129.2]

  }, {
    name: 'Neutro',
    data: [83.6, 78.8, 98.5, 93.4]

  }, {
    name: 'Insatisfecho',
    data: [48.9, 38.8, 39.3, 41.41]

  }


  ]
});