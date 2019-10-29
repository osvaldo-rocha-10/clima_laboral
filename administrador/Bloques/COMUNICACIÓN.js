Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: 'COMUNICACIÓN'
  },
 subtitle: {
    text: 'Area RH'
  },
  xAxis: {
    categories:[
      '28.Yo me entero oportunamente de todo lo que sucede dentro de la Institución.',
      '29.Todas las instrucciones que recibo son claras y comprensibles. ',
      '30.En esta Institución tengo acceso a la toda información que necesito para realizar bien mi trabajo. ',
      '31.Mi jefe inmediato informa claramente las decisiones y/o cambios que ocurren en la Institución.'
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
    data: [48.9, 38.8, 39.3, 41.4]

  }


  ]
});