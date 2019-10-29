


Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: 'MI JEFE INMEDIATO'
  },
 subtitle: {
    text: 'Area RH'
  },
  xAxis: {
    var i = 1;
    while(){


    }
    categories:[
      '17.Mi jefe ha logrado que lo respete por su comportamiento y ejemplo.',
      '18.Mi jefe inmediato me enseña cómo realizar mejor mi trabajo. ',
      '19.Mi opinión es tomada en cuenta para la toma de decisiones.',
      '20.Mi jefe estimula mi creatividad e innovación para mejorar en el trabajo.',
      '21.Mi jefe inmediato propicia un clima de cordialidad y confianza dentro de nuestro equipo de trabajo.',
      '22.Mi jefe fomenta el trabajo en equipo para resolver los problemas del departamento. ',
      '23.Cuando realizo bien mi trabajo, mi jefe inmediato me lo reconoce.',
      '24.Mi jefe inmediato aplica las normas y reglamentos de forma justa.',
      '25.Mi jefe inmediato  da instrucciones claras y precisas.',
      '26.Mi jefe delega el trabajo eficientemente.',
      ''
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
    data:  [49.9, 71.5, 106.4, 129.2, 144.0, 176.0]

  }, {
    name: 'Neutro',
    data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5]

  }, {
    name: 'Insatisfecho',
    data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3]

  }


  ]
});