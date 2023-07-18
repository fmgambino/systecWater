<!-- inject:js -->
<script src="<?php echo base_url('js/d3.min.js') ?>"></script>
<script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('js/getmdl-select.min.js') ?>"></script>
<script src="<?php echo base_url('js/material.min.js') ?>"></script>
<script src="<?php echo base_url('js/nv.d3.min.js') ?>"></script>
<script src="<?php echo base_url('js/layout/layout.min.js') ?>"></script>
<script src="<?php echo base_url('js/scroll/scroll.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/charts/discreteBarChart.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/charts/linePlusBarChart.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/charts/stackedBarChart.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/employer-form/employer-form.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/line-chart/line-charts-nvd3.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/map/maps.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/pie-chart/pie-charts-nvd3.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/table/table.min.js') ?>"></script>
<script src="<?php echo base_url('js/widgets/todo/todo.min.js') ?>"></script>
<script src="<?php echo base_url('js/sweetalert2.all.min.js') ?>"></script>


<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>

<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js" integrity="sha256-qSIshlknROr4J8GMHRlW3fGKrPki733tLq+qeMCR05Q=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/mqtt@4.1.0/dist/mqtt.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145830444-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-145830444-2');
</script>


<script type="text/javascript">
  window.onload = function() {
    <?php if ($_SESSION['msg_body'] != "") { ?>
      Swal.fire({
        type: '<?php echo  $_SESSION['msg_type']; ?>',
        title: '<?php echo  $_SESSION['msg_title']; ?>',
        text: '<?php echo  $_SESSION['msg_body']; ?>',
        footer: '<?php echo  $_SESSION['msg_footer']; ?>'
      });

      <?php $_SESSION['msg_title'] = ""; ?>
      <?php $_SESSION['msg_type'] = ""; ?>
      <?php $_SESSION['msg_body'] = ""; ?>
      <?php $_SESSION['msg_footer'] = ""; ?>
    <?php } ?>
  };
</script>

<script type="text/javascript">
let estadoConexion = 0;
let mensajeOptico = 'Alto' ; 

  const options = {
    connectTimeout: 1000,
    // Authentication
    clientId: 'client_id_' + Math.floor((Math.random() * 1000000) + 1),
    username: '<?php echo MQTT_USER; ?>',  
    password: '<?php echo MQTT_PASSWORD; ?>',
    keepalive: 60,
    clean: true,
  }

  // WebSocket connect url
  const WebSocket_URL = 'wss://broker.emqx.io:8084/mqtt';
  const client = mqtt.connect(WebSocket_URL, options)
  

  var device_topic = '<?php echo ROOT_TOPIC . "/" . $_SESSION['selected_topic'] . "/" ?>';
  client.on('connect', () => {
    console.log('Conexión Exitosa ^_^');

    client.subscribe(device_topic + "data", {
      qos: 0
    }, (error) => {
      if (error) {
        console.log("Error al Suscribir");
        estadoConexion = 0;
      } else {
        console.log("Suscrito al Broker con Exito!");
        console.log("Proyecto Final de Carrera");
        console.log("by AUGUSTO ARRUETA");
        console.log("San Miguel de Tucumán - Tucumán - Argentina");
        console.log("UTN - FRT");
        console.log("2025");

        console.log('MQTT USER y pass: ', options);
  
        estadoConexion = 1;
      }

    })
  })

  client.on('message', (topic, message) => {
    console.log('Msg desde el topico: ', topic, ' ----> ', message.toString());

    if (topic == device_topic + "data") {
      var splitted = message.toString().split(",");

      var melasa = splitted[0];
      var temp = splitted[1];         
      var optico = splitted[2];
      var sw1 = splitted[3];
      var eH2O = splitted[4];

      var switch1 = splitted[5];
      var switch2 = splitted[6];
      var switch3 = splitted[7];
      var cdtv = splitted[8];

      $("#display_melasa").html(melasa);
      $("#display_tempamb").html(temp); 
      
      if(optico > 1000){
        mensajeOptico = 'Bajo';
      }
      else{
        mensajeOptico = 'Alto';
      }

      $("#display_optico").html(mensajeOptico);      

      document.getElementById('bateria').src = "<?php echo base_url('images/icons/iconoBateria100.svg') ?>";
      //gTemp = temp;
      //gNivel = melasa;
      //gEspuma = optico;      

/*
      if (niv == 1) {
        $("#display_niv").html("ALTO");
      } else {
        $("#display_niv").html("OPTIMO");
      }

      if (switch1 == "1") {
        $("#display_sw1").prop('checked', true);
      } else {
        $("#display_sw1").prop('checked', "");
      }
      */
/*
      if (switch2 == "1") {
        $("#display_sw2").prop('checked', true);
      } else {
        $("#display_sw2").prop('checked', "");
      }

      if (switch3 == "1") {
        $("#display_sw3").prop('checked', true);
      } else {
        $("#display_sw3").prop('checked', "");
      }
*/

    }


  })

  client.on('reconnect', (error) => {
    console.log('reconnecting:', error);
  })

  client.on('error', (error) => {
    console.log('Connect Error:', error);
  })

  function sw1_change() {
    if ($('#display_sw1').is(":checked")) {
      client.publish(device_topic + 'actions/sw1', "1"); //Valor que envio al broker
    } else {
      client.publish(device_topic + 'actions/sw1', "0");
    }
  }

  //SE CREA FUNCION PARA ENVIO DE DATOS DEL FORMULARIO PARAMETROS

</script>
<!-- endinject -->

<style media="screen">
  /* The switch - the box around the slider */
  .switch {
    position: relative;
    display: inline-block;
    width: 42px;
    height: 24px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked+.slider {
    background-color:  #2196F3;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
    -webkit-transform: translateX(16px);
    -ms-transform: translateX(16px);
    transform: translateX(16px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 18px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
