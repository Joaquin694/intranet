/* |||||||||||||||||||||||||||||||||||||  FUNCIONES GENERALES  ||||||||||||||||||||||||||||||||||||| */
/*-------------> Formatenado datepicker a español*/
(function($) {
    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        monthsTitle: "Meses",
        clear: "Borrar",
        weekStart: 1,
        format: 'yyyy/m/d',
        multidateSeparator: "-",
    };
}(jQuery));
/*-------------> Href _target js nativo*/
function ir(url) {
    location.href = url;
}
/*-------------> Algoritmo para busquedas generales por clase  jquery */
function buscadorMinas(idBuscador, classPaquete) {
    // document.querySelector('meta[name="theme-color"]').setAttribute('content',  '#4645e1');
    $(idBuscador).keyup(function() {
        var value = $(this).val().toLowerCase();
        $(classPaquete).filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}
/* ***************************************> Render autonomos *******************************************/
/*-------------> RENDER GENERI  1 Datos*/
function render_de_vista_autonomo_1(action, datoUn, domRender) {
    /*------------------------------------------------*/
    var cod = action;
    var datoUn = datoUn;
    var domRender = domRender;
    var dataen = 'cod=' + cod + '&datoUn=' + datoUn;
    $.ajax({
        type: 'post',
        url: 'controladores/servicios.controlador.php',
        data: dataen,
        success: function(resp) {
            $(domRender).html(resp);
        }
    });
    return false;
}
/*-------------> RENDER GENERI  Dos Datos*/
function render_de_vista_autonomo_2(action, datoUn, datoDo, domRender) {
    /*------------------------------------------------*/
    var cod = action;
    var datoUn = datoUn;
    var datoDo = datoDo;
    var domRender = domRender;
    var dataen = 'cod=' + cod + '&datoUn=' + datoUn + '&datoDo=' + datoDo;
    $.ajax({
        type: 'post',
        url: 'controladores/reserva.controlador.php',
        data: dataen,
        success: function(resp) {
            $(domRender).html(resp);
        }
    });
    return false;
}
/*-------------> RENDER GENERI  Tres Datos*/
function render_de_vista_autonomo_3(action, datoUn, datoDo, datoTr, domRender) {
    /*------------------------------------------------*/
    var cod = action;
    var datoUn = datoUn;
    var datoDo = datoDo;
    var datoTr = datoTr;
    var domRender = domRender;
    var dataen = 'cod=' + cod + '&datoUn=' + datoUn + '&datoDo=' + datoDo + '&datoTr=' + datoTr;
    $.ajax({
        type: 'post',
        url: 'controladores/reserva.controlador.php',
        data: dataen,
        success: function(resp) {
            $(domRender).html(resp);
        }
    });
    return false;
}
/*-------------> RENDER GENERI  Cuatro Datos*/
function render_de_vista_autonomo_4(action, datoUn, datoDo, datoTr, datoCu, domRender) {
    /*------------------------------------------------*/
    var cod = action;
    var datoUn = datoUn;
    var datoDo = datoDo;
    var datoTr = datoTr;
    var datoCu = datoCu;
    var domRender = domRender;
    var dataen = 'cod=' + cod + '&datoUn=' + datoUn + '&datoDo=' + datoDo + '&datoTr=' + datoTr + '&datoCu=' + datoCu;
    $.ajax({
        type: 'post',
        url: 'controladores/reserva.controlador.php',
        data: dataen,
        success: function(resp) {
            $(domRender).html(resp);
        }
    });
    return false;
}
/*-------------> RENDER GENERI  Cinco Datos*/
function render_de_vista_autonomo_5(action, datoUn, datoDo, datoTr, datoCu, datoCi, domRender) {
    /*------------------------------------------------*/
    var cod = action;
    var datoUn = datoUn;
    var datoDo = datoDo;
    var datoTr = datoTr;
    var datoCu = datoCu;
    var datoCi = datoCi;
    var domRender = domRender;
    var dataen = 'cod=' + cod + '&datoUn=' + datoUn + '&datoDo=' + datoDo + '&datoTr=' + datoTr + '&datoCu=' + datoCu + '&datoCi=' + datoCi;
    $.ajax({
        type: 'post',
        url: 'controladores/reserva.controlador.php',
        data: dataen,
        success: function(resp) {
            $(domRender).html(resp);
        }
    });
    return false;
}
/*-------------> RENDER GENERI  Seies Datos*/
function render_de_vista_autonomo_6(action, datoUn, datoDo, datoTr, datoCu, datoCi, datoSe, domRender) {
    /*------------------------------------------------*/
    var cod = action;
    var datoUn = datoUn;
    var datoDo = datoDo;
    var datoTr = datoTr;
    var datoCu = datoCu;
    var datoCi = datoCi;
    var datoSe = datoSe;
    var domRender = domRender;
    var dataen = 'cod=' + cod + '&datoUn=' + datoUn + '&datoDo=' + datoDo + '&datoTr=' + datoTr + '&datoCu=' + datoCu + '&datoCi=' + datoCi + '&datoSe=' + datoSe;
    $.ajax({
        type: 'post',
        url: 'controladores/reserva.controlador.php',
        data: dataen,
        success: function(resp) {
            $(domRender).html(resp);
        }
    });
    return false;
}
/*-------------> RENDER GENERI  siete Datos*/
function render_de_vista_autonomo_7(action, datoUn, datoDo, datoTr, datoCu, datoCi, datoSe, datoSi, domRender) {
    /*------------------------------------------------*/
    var cod = action;
    var datoUn = datoUn;
    var datoDo = datoDo;
    var datoTr = datoTr;
    var datoCu = datoCu;
    var datoCi = datoCi;
    var datoSe = datoSe;
    var datoSi = datoSi;
    var domRender = domRender;
    var dataen = 'cod=' + cod + '&datoUn=' + datoUn + '&datoDo=' + datoDo + '&datoTr=' + datoTr + '&datoCu=' + datoCu + '&datoCi=' + datoCi + '&datoSe=' + datoSe + '&datoSi=' + datoSi;
    $.ajax({
        type: 'post',
        url: 'controladores/reserva.controlador.php',
        data: dataen,
        success: function(resp) {
            $(domRender).html(resp);
        }
    });
    return false;
}
// >>>>>>>>>>>>>>>>>>>>>> function botones option 2
function changeColorDosBotones(idBtnUno, idBtnDos, classActi, classInacti) {
    $(idBtnUno).click(function() {
        $(idBtnUno).removeClass(classInacti);
        $(idBtnDos).removeClass(classActi);
        $(idBtnDos).addClass(classInacti);
        $(idBtnUno).addClass(classActi);
    });
    $(idBtnDos).click(function() {
        $(idBtnDos).removeClass(classInacti);
        $(idBtnUno).removeClass(classActi);
        $(idBtnUno).addClass(classInacti);
        $(idBtnDos).addClass(classActi);
    });
}
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° instal SERVICE WORKER °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° INSTAL SERVICE WORKE
// if ('serviceWorker' in navigator) {
//   window.addEventListener('load', function() {
//     navigator.serviceWorker.register('vistas/js/service-worker.js').then(function(registration) {
//       // Registration was successful
//       console.log('ServiceWorker registration successful with scope: ', registration.scope);
//     }, function(err) {
//       // registration failed :(
//       console.log('ServiceWorker registration failed: ', err);
//     });
//   });
// } 
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° ASIGNATION HEIGHT FULL LOADING
//aqui el codigo que se ejecutara cuando se redimencione la ventana
var alto = $(window).height();
var ancho = $(window).width();
var altoImg = alto - 74;
var padding = ((altoImg - 310) / 2);
$(".spinerGiration2").css({
    "height": alto + "px"
});
$(".spinerGiration2").css("padding-top", (alto / 3) + "px");
// -----------------------------------------------
$(".viewspinerloading").click(function() {
    $(".spinerGiration2").removeClass("d-none");
    setTimeout('$(".spinerGiration2").addClass("d-none");', 3000);
});
// PARCHE PARA EVITAR INSERT INTO INCONCLUSO POR CONFLICTO DE CARACTERES
// $("input[type=text],textarea,input[type=number]").keyup(function() {
//     let leter = $(this).val();
//     let text_estractor = "'";
//     let text_estractorb = "\"";
//     if (leter.includes(text_estractor)) {
//         let boration = leter.replace("'", "");
//         $(this).val(boration);
//     } else if (leter.includes(text_estractorb)) {
//         let boration = leter.replace("\"", "");
//         $(this).val(boration);
//     }
// });