Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: 'ESTRUCTURA DE LA INSTITUCION'
  },
 subtitle: {
    text: 'Area RH'
  },
  xAxis: {
    categories: [
      '7.Conozco cuáles son las funciones de mi puesto',
      '8.Los procedimientos de la Institución me permiten darle a mis clientes un servicio excelente',
      '9.Conozco las normas y reglamentos de la Institución',
      '10.Los objetivos específicos  de mi puesto están claramente definidos'
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
      borderWidth: .5
    }
  },
  series: [{
    name: 'Satisfecho',
    data: [49.9, 71.5, 106.4,16.8]

  }, {
    name: 'Neutro',
    data: [83.6, 78.8, 98.5, 93.4]

  }, {
    name: 'Insatisfecho',
    data: [48.9, 38.8, 39.3, 41.4]

  }


  ]
});

