Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: 'COMPENSACIONES '
  },
 subtitle: {
    text: 'Area RH'
  },
  xAxis: {
    categories:[
      '32.Las prestaciones que ofrece la Institución son satisfactorias.',
      '33.El sueldo que recibo es comparable a lo que otras personas reciben en puestos similares dentro de la Institución. ',
      '34.Los aumentos salariales se otorgan de manera justa.',
      '35.Las políticas de compensaciones y prestaciones están de acuerdo al mercado laboral en giros similares.',
      '36.Entiendo los criterios utilizados para asignar y definir el sueldo de acuerdo a mi puesto (sueldo deducciones, etc.)'
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
    data:  [49.9, 71.5, 106.4, 129.2,41.5]

  }, {
    name: 'Neutro',
    data: [83.6, 78.8, 98.5, 93.4,55.3]

  }, {
    name: 'Insatisfecho',
    data: [48.9, 38.8, 39.3, 41.4,102.5]

  }


  ]
});