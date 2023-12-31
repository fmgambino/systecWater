<main class=" container-fluid px-4" style="overflow-y:scroll;">

    <div class="">

        <div class="row">
            <!-- columna1  -->
            <div class="col-12 col-lg-4 px-1">
                <div class=" form-inline">
                    <div class="col-6 px-1" >
                        <div class="mdl-card--expand color-negro text-center pb-3" style="height: 125px;">
                            <h4 class=" hc-color-text-blanco ">Estado</h4>
                            <div class=" form-inline d-flex " style="justify-content: center;">
                                <!-- SWITCH-->
                                <label class="switch mr-2" style="margin-bottom: 0px;">
                                    <input onchange="sw1_change()" type="checkbox" id="display_sw1">
                                    <span class="slider round"></span>
                                </label>
                                <img src="<?php echo base_url('images/cancel.png') ?>" class="hc-icono-cancel ml-2"
                                    id="icono1" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 px-1" >
                        <div class="mdl-card--expand color-negro text-center pb-3" style="height: 125px;">
                            <h4 class=" hc-color-text-blanco  ">Nivel Bateria</h4>
                            <div class="form-inline" style="display: inline-flex">
                                <div class="progress " style=" width: 80px;height: 30px; border: 2px solid white;position: relative;">
                                    <div id="bateria" class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" style="width: 90% ; background-color: #2cff00 !important; flex-direction: row !important;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">                                        
                                    </div>
                                    <div class="form-inline ml-4" style="position: absolute;">
                                        <h4 id="valorBateria" style="">30</h4>
                                        <h5>%</h5>
                                    </div>
                                    
                                </div>
                                <div class="progress" style="   width: 10px;height: 20px; border-radius: 0; border: 2px solid white;">
                                    <div class="progress-bar" role="progressbar" style="width: 0% " aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class=" " style="height: 160px;">
                    <div class=" mdl-card--expand color-azul-1 ">
                        <div class="form-inline">
                            <div class="col-4 col-md-6 hc-color-text-blanco ">
                                <div class="col-12 form-inline " style="justify-content: center;">
                                    <h4 class=" mb-0 ">Volumen</h4>
                                    <img src="<?php echo base_url('images/iconoWater.svg') ?>" class="icono">
                                </div>
                                <div class="col-12 form-inline mt-3" style="justify-content: center;">
                                    <h2 id="valorVolumen" class="weather-temperature mr-1">--</h2>
                                    <h2 class="hc-unidades">m3</h2>
                                </div>
                            </div>
                            <div class="col-8 col-md-6" style="width: 80%; height: 130px;">
                                <div id="gaugeVolumen"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--columna 2-->
            <div class="col-12 col-lg-4 px-1 mt-0 mt-md-0">

                <div class=" ">

                    <div class=" mdl-card--expand color-azul-1 temperatura-content" >
                        <div class="form-inline">
                            <div class=" col-4 col-md-6 hc-color-text-blanco ">
                                <div class="col-12 form-inline text-center flex-wrap flex-md-nowrap ">
                                    <h4 class=" mb-0 ">Monto $/m3</h4>
                                    <img src="<?php echo base_url('images/iconDolar.svg') ?>" class="icono">
                                </div>
                                <div class="col-12 form-inline mt-3">
                                    <h2 id="valorTemperatura" class="weather-temperature mr-1">--</h2>
                                    <h2 class="hc-unidades">$</h2>
                                </div>
                            </div>
                            <div class="col-8 col-md-6 " style="width: 100%; height: 80px;">
                                <div id="gaugeTemperatura"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class=" ">
                    <div class=" mdl-card--expand color-azul-1 ">
                        <div class="form-inline">
                            <div class="col-4 col-md-6 hc-color-text-blanco ">
                                <div class="col-12 form-inline text-center " style="justify-content: center;">
                                    <h4 class=" mb-0 ">Consumo</h4>
                                    <img src="<?php echo base_url('images/iconoWater.svg') ?>" class="icono">
                                </div>
                                <div class="col-12 form-inline mt-3" style="justify-content: center;">
                                    <h2 id="valorConsumo" class="weather-temperature mr-1">--</h2>
                                    <h2 class="hc-unidades">m3</h2>
                                </div>
                            </div>
                            <div class="col-8 col-md-6 " style="width: 100%; height: 130px;">
                                <div id="gaugeConsumo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--columna 3-->
            <div class="col-12 col-lg-4 px-1">
                <div class=" ">

                    <div class=" mdl-card--expand color-azul-1 ">
                        <div class="form-inline">
                            <div class=" col-4 col-md-6 hc-color-text-blanco ">
                                <div class="col-12 form-inline " style="justify-content: center;">
                                    <h4 class=" mb-0 ">Caudal</h4>
                                    <img src="<?php echo base_url('images/iconoViento.svg') ?>" class="icono">
                                </div>
                                <div class="col-12 form-inline mt-3 " style="justify-content: center;">
                                    <h2 id="valorCaudal" class="weather-temperature mr-1 ">23.11</h2>
                                    <h2 class="hc-unidades">l/h</h2>
                                </div>
                            </div>

                            <div class="col-8 col-md-6 " style="width: 100%; height: 80px;">
                                <div id="gaugeCaudal"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PH H2O -->

                <!-- <div class=" ">
                    <div class=" mdl-card--expand color-azul-1 ">
                        <div class="form-inline">
                            <div class="col-4 col-md-6 hc-color-text-blanco ">
                                <div class="col-12 form-inline " style="justify-content: center;">
                                    <h4 class=" mb-0 ">Ph H2O</h4>
                                    <img src="<?php echo base_url('images/iconoWater.svg') ?>" class="icono">
                                </div>
                                <div class="col-12 form-inline mt-3" style="justify-content: center;">
                                    <p id="valorPh" class="weather-temperature mr-1">--</p>

                                </div>
                            </div>
                            <div class="col-8 col-md-6 " style="width: 100%; height: 130px;">
                                <div id="gaugePh"></div>
                            </div>
                        </div>
                    </div>
                </div> -->

<!-- Direccion GPS -->
                <div class=" " style="height: 160px;">
                    <div class=" mdl-card--expand color-azul-1 h-100 d-flex align-center justify-content-center">
                        <div class="form-inline">
                            <div class="col-12 col-md-12 hc-color-text-blanco ">
                                <div class="col-12 form-inline " style="justify-content: center; align-items:center">
                                    <h4 class=" mb-0 mr-3 ">Dirección GPS</h4>
                                    <img src="<?php echo base_url('images/iconoGPS.svg') ?>" class="icono" style="filter:invert(1)">
                                    
                                </div>
                                <div class="col-12 form-inline mt-3" style="justify-content: center;">
                                    <h2 id="direccionGPS" class="weather-temperature mr-1">Av san martin 2222</h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!--Graficos-->
        <div class="row mt-3 form-inline ">
            <div class="col-12 col-md-6 px-1">
                <div id="grafico1" class="color-azul-1 pl-3 graficos" style=" ">
                </div>
            </div>
            <div class="col-12 col-md-6 px-1">
                <div id="grafico2" class="color-azul-1 pl-3 graficos" style=" "></div>
            </div>
        </div>
        <div class="col-12 col-md-4 hc-box-a">
            <div class="mdl-card  trending">
                <div>
                    <span class="mdl-list__item-secondary-content" style="padding-top: 6px;">
                    </span>
                </div>
            </div>
        </div>
        <!-- Actuadores-->
        <div class="row">

        </div>
    </div>
    </div>
</main>

<!-- <script src="<?php echo base_url('js/progresbarlmz.js') ?>"></script> -->
<script src="<?php echo base_url('js/graficos.js') ?>"></script>

<script>
/*
const options = {
    connectTimeout: 1000,
    // Authentication
    clientId: 'client_id_' + Math.floor((Math.random() * 1000000) + 1),
    username: '<?php echo MQTT_USER; ?>',
    password: '<?php echo MQTT_PASSWORD; ?>',
    keepalive: 60,
    clean: true,
}*/

// WebSocket connect url
// const WebSocket_URL = 'wss://broker.emqx.io:8084/mqtt';
// const client = mqtt.connect(WebSocket_URL, options)

// var device_topic = '<?php echo ROOT_TOPIC . "/" . $_SESSION['selected_topic'] . "/" ?>';
// client.on('connect', () => {
//     console.log('Conexión Exitosa ^_^');

//     client.subscribe(device_topic + "data", {
//         qos: 0
//     }, (error) => {
//         if (error) {
//             console.log("Error al Suscribir");
//         } else {
//             console.log("Suscrito al Broker con Exito!");
//             console.log("Proyecto de Inversión");
//             console.log("San Miguel de Tucumán - Tucumán - Argentina");
//             console.log("2022");
//         }

//     })
// })


// console.log('<?php echo base_url()?>')

var contCo2 = 0;
var contcdtv = 0;

var sumadorA = 0;
var sumadorB = 0;
var sumadorC = 0;
var co2, cdtv;

// console.log("llegue aqui 2");

// client.on('message', (topic, message) => {
//     console.log('Msg desde el topico: ', topic, ' ----> ', message.toString());

// })

// client.on('reconnect', (error) => {
//     console.log('reconnecting:', error);
// })

// client.on('error', (error) => {
//     console.log('Connect Error:', error);
// })

var img1 = "<?php echo base_url('images/cancelblanco.png') ?>";
var img2 = "<?php echo base_url('images/checkblanco.png') ?>";

function sw1_change() {
    var imagen1 = document.getElementById('icono1');
    if ($('#display_sw1').is(":checked")) {
        console.log("ingrese en sw1_change ok");
        client.publish(device_topic + 'actions/sw1', "1"); //Valor que envio al broker             
        imagen1.src = img2;
        imagen1.classList.remove("hc-icono-cancel");
        imagen1.classList.add("hc-icono-check");
    } else {
        console.log("ingrese en sw1_change else");
        client.publish(device_topic + 'actions/sw1', "0");
        imagen1.src = img1;
        imagen1.classList.remove("hc-icono-check");
        imagen1.classList.add("hc-icono-cancel");
    }
}


// FUNCIONES CIRCULOS DE ESTADOS

function ce1_change() {
    if ($('#display_sw1').is(":checked")) {
        client.publish(device_topic + 'actions/sw1', "1"); //Valor que envio al broker
    } else {
        client.publish(device_topic + 'actions/sw1', "0");
    }
}
</script>