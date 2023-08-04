
var baselink ;
//tiempo de actualizacion
var delay = 2000 ;
//variables 
var temperatura = 0;
var Caudal = 10;
var volumen = 0;
var Consumo = 0;
var ph = 0 ;
var NivelBateria = 0 ;

var gauges = setInterval( pintarGauges() , delay);

function pintarGauges(){  

  //aqui conectar los valores que vienene desde MQTT
  temperatura = 20.5;
  Caudal = 37.6;
  volumen = 40.3;
  Consumo = 20.4;
  ph = 7.3 ;
  NivelBateria = 30 ;
  //---------------------------------------------------
  cargaBateria(NivelBateria , 'black' , 70 , 25);

  document.getElementById('valorTemperatura').innerHTML = temperatura ;
  document.getElementById('valorCaudal').innerHTML = Caudal ;
  document.getElementById('valorVolumen').innerHTML = volumen ;
  document.getElementById('valorConsumo').innerHTML = Consumo ;
  document.getElementById('valorPh').innerHTML = ph ;

  gaugemedio( 'gaugeTemperatura' , temperatura , 0 , 100 , '#EA7577' , true );   
  gaugemedio( 'gaugeCaudal' , Caudal , 0 , 200 , '#C9E265' , true );
  gaugeCompleto('gaugeVolumen' , volumen , 0 , 50 , '#5DB7FE' , false  , 'cm3');
  gaugeCompleto('gaugeConsumo' , Consumo , 0 , 100 , '#F7DC5B' , false  , 'Lts');
  gaugeCompleto('gaugePh' , ph , 0 , 15 , '#5DB7FE' , false  , '');
  graficoLinea('grafico1', 'Temperatura' , '#EA7577' , '°C' );
  graficoLinea('grafico2', 'Nivel Consumo' , '#F7DC5B', 'L' );
}

function gaugemedio( contenedor , valor , valorMin , valorMax , color , puntero){

  var chartDom = document.getElementById(contenedor);
  var myChart = echarts.init(chartDom);
  var option;

  option = {
    series: [
      {
        type: 'gauge',
        startAngle: 180,
        endAngle: 0,
        min: valorMin,
        max: valorMax,
        splitNumber: 12,
        itemStyle: {
          color: color,
          shadowColor: 'rgba(0,138,255,0.45)',
          shadowBlur: 10,
          shadowOffsetX: 2,
          shadowOffsetY: 2
          
        },
        progress: {
          show: true,
          roundCap: false,
          width: 20
        },
        pointer: {
          show: puntero,
          icon: 'path://M2090.36389,615.30999 L2090.36389,615.30999 C2091.48372,615.30999 2092.40383,616.194028 2092.44859,617.312956 L2096.90698,728.755929 C2097.05155,732.369577 2094.2393,735.416212 2090.62566,735.56078 C2090.53845,735.564269 2090.45117,735.566014 2090.36389,735.566014 L2090.36389,735.566014 C2086.74736,735.566014 2083.81557,732.63423 2083.81557,729.017692 C2083.81557,728.930412 2083.81732,728.84314 2083.82081,728.755929 L2088.2792,617.312956 C2088.32396,616.194028 2089.24407,615.30999 2090.36389,615.30999 Z',
          length: '75%',
          width: 5,
          offsetCenter: [0, '15%']
        },
        axisLine: {
          roundCap: false,
          lineStyle: {
            width: 20
          }
        },
        axisTick: {
          show: false
        },
        splitLine: {
          show: false
        },
        axisLabel: {
          show: false
        },
        title: {
          show: false
        },
        detail: {
          show: false,
          offsetCenter: [0, '-10%'],
          width: '10%',
        },
        
        data: [
          {
            value: valor.toFixed(2)
          }
        ]
      }
    ]
  };
  myChart.resize({
    width: 200,
    height: 170
    
  });
  
  myChart.setOption(option);
}

function gaugeCompleto(contenedor , valor , valorMin , valorMax , color , puntero , unidad ){

  var chartDom = document.getElementById(contenedor);
  var myChart = echarts.init(chartDom);
  var option;

  option = {
    series: [
      {
        type: 'gauge',
        startAngle: 270,
        endAngle: -90,
        min: valorMin,
        max: valorMax,
        splitNumber: 12,
        itemStyle: {
          color: color,
          shadowColor: 'rgba(0,138,255,0.45)',
          shadowBlur: 10,
          shadowOffsetX: 2,
          shadowOffsetY: 2
        },
        progress: {
          show: true,
          roundCap: true,
          width: 15
        },
        pointer: {
          show: puntero,
          icon: 'path://M2090.36389,615.30999 L2090.36389,615.30999 C2091.48372,615.30999 2092.40383,616.194028 2092.44859,617.312956 L2096.90698,728.755929 C2097.05155,732.369577 2094.2393,735.416212 2090.62566,735.56078 C2090.53845,735.564269 2090.45117,735.566014 2090.36389,735.566014 L2090.36389,735.566014 C2086.74736,735.566014 2083.81557,732.63423 2083.81557,729.017692 C2083.81557,728.930412 2083.81732,728.84314 2083.82081,728.755929 L2088.2792,617.312956 C2088.32396,616.194028 2089.24407,615.30999 2090.36389,615.30999 Z',
          length: '75%',
          width: 15,
          offsetCenter: [0, '5%']
        },
        axisLine: {
          
          roundCap: true,
          lineStyle: {
            width: 15
          }
        },
        axisTick: {
          show: false,
          splitNumber: 2,
          lineStyle: {
            width: 2,
            color: '#999'
          }
        },
        splitLine: {
          show: false,
          length: 12,
          lineStyle: {
            width: 3,
            color: '#999'
          }
        },
        axisLabel: {
          show: false,
          distance: 30,
          color: '#999',
          fontSize: 20
        },
        title: {
          show: false
        },
        detail: {
          
          width: '40%',
          lineHeight: 40,
          height: 20,
          borderRadius: 8,
          offsetCenter: [0, '-10%'],
          valueAnimation: true,
          formatter: function (value , unit) {
            return '{value|' + value.toFixed(1) + '}{unit|'+ unidad +'}';
          },
          rich: {
            
            value: {
              fontSize: 25,
              fontWeight: 'bolder',
              color: '#fff'
            },
            unit: {
              fontSize: 15,
              color: '#fff',
              padding: [0, 0, 0, 0]
            }
          }
        },
        data: [
          {
            value: valor,
            unit : unidad
          }
        ]
      }
    ]
  };

  myChart.resize({
    width: 200,
    height: 170
  });
  
  myChart.setOption(option);
}

function graficoLinea(contenedor , titulo , color , unidad){
 

var chartDom = document.getElementById(contenedor);
var myChart = echarts.init(chartDom);
var option;

option = {
  title: {
    text: titulo ,
    left: 'left',
    textStyle: {
      color : '#fff'
    },
  },
  tooltip: {
    trigger: 'axis',
    axisPointer: {
      type: 'cross',
      label: {
        backgroundColor: '#6a7985'
      }
    }
  },
  legend: {
    type: "plain",    
    textStyle:{
      color : '#fff'
    }
  },
  
  grid: {
    left: '3%',
    right: '4%',
    bottom: '3%',
    containLabel: true
  },
  xAxis: [
    {
      type: 'category',
      boundaryGap: false,
      axisLabel: {        
        color: '#fff'
      },
      data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    }
  ],
  yAxis: [
    {
      type: 'value',
      axisLabel: {   
        formatter: '{value} ' + unidad ,     
        color: '#fff'
      }      
    }
  ],
  series: [
    {
      name: "" , //titulo,
      type: 'line',
      smooth: true, // efecto redondeo para la grafica
      color: color,
      stack: 'Total',
      areaStyle: {
        color : color,
      },
      emphasis: {
        focus: 'series'
      },
      data: [120, 132, 101, 134, 90, 230, 210]
    }
  ]
};

option && myChart.setOption(option);
}

function cargaBateria(valor , colorTexto , rango1 , rango2 ){
  

  document.getElementById("valorBateria").innerHTML = valor ; 
  document.getElementById("bateria").style.width = valor +'%'; 
  document.getElementById("bateria").style.color = colorTexto ;
  if (valor > rango1) {
    document.getElementById("bateria").style.background = 'rgb(44, 255, 0)';
  }else{
    if (valor > rango2) {
      document.getElementById("bateria").style.background = '#F7DC5B';
    }
    else{
      document.getElementById("bateria").style.background = '#f44336';
    }
  }
  
}



