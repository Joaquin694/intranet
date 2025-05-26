/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::

                 EVENTOS JS SUGERIDOS



******* Marcar el rastro de tus menus ---> https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_html_blur



---------------------------------------------------------

1.- onchange  -> Lanza evento al terminar de escribir en input

2.- onkeyup   -> Por cada letra escrita

3.- onmouseover -> Hover

4.- onmouseout  -> Retirado el puntero lanza

5.- $(window).scroll(function (event){ var scroll = $(window).scrollTop(); }); ->Al scroll





----------------------------------------------------------

-> Terminas de escribir y te pasa al siguiente input https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_text_autonext

----------------------------------------------------------



----------------------------------------------------------

-> Autoselect  focus input

                      $(".inputElegido").focus();

                      $('div.dataTables_filter input').focus(); <- datatable

----------------------------------------------------------



----------------------------------------------------------

-> Abrir o cerrar modal desde funcion js

                      $('#modalFichaBpm').modal('toggle');

----------------------------------------------------------



----------------------------------------------------------

-> Lanzar funciones con solo cargar

                                    $(document).ready(function(){

                                          funcionLanzada();

                                    });

----------------------------------------------------------



----------------------------------------------------------

-> Recoger VALOR A UN ID: 

                      var x = document.getElementById(idSelect).value;   <-- Solo input

                      var x = document.getElementById('hour').innerHTML; <-- Div,td ,tr ...

----------------------------------------------------------



----------------------------------------------------------

-> ASIGNA VALOR A UN ID Ó INPUT: document.getElementById(id_alert).innerHTML = "<p style='color: red'>Confirme su contraseña*</p>";  

                                 document.frmAdmdp.f1t1.value = 30;

                                 document.getElementById("prueba").value = "";

----------------------------------------------------------



----------------------------------------------------------

-> Modificar un atributo:

                        

                           document.getElementById('number').setAttribute('type', 'number');                         

                                              ó

                           var x = document.getElementById(idSelect).value; 

                           document.getElementById("myText").maxLength = "4";

----------------------------------------------------------



----------------------------------------------------------

-> Modificar css:         document.getElementById(id_input_mark).style.border = "1px solid red";

                          document.getElementById("p2").style.border = "blue";                           

----------------------------------------------------------





----------------------------------------------------------

->Limpiar todos los inputs de un formulario     $("#formEjemplo")[0].reset();

----------------------------------------------------------





:::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::

                      VALIDATION 

:::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/* --------------------------------------------------------------------------------------------------*/
function updatead(columnaValidar, idDelDatoaValidard, label, acionati, idPadre, idtoast) {
    //Capturamos datos contenidos en id
    var columnaValidar = columnaValidar;
    var idDelDatoaValidar = document.getElementById(idDelDatoaValidard).value;
    var label = label;
    var accion = acionati;
    var idPadre = document.getElementById(idPadre).value;
    var dataen = 'columnaValidar=' + columnaValidar + '&idDelDatoaValidar=' + idDelDatoaValidar + '&label=' + label + '&accion=' + accion + '&idPadre=' + idPadre;
    $.ajax({
        type: 'post',
        url: 'modelos/abad.modelo.php',
        data: dataen,
        success: function(resp) {
            $(idtoast).html(resp);
        }
    });
    return false;
}
/* --------------------------------------------------------------------------------------------------*/
function val_2input_equals(ida, idb, id_alert) { /*Que dos campos sean identicos*/
    //Capturamos datos contenidos en id
    var inp1 = document.getElementById(ida).value;
    var inp2 = document.getElementById(idb).value;
    if (inp1 == inp2) {
        //Escribimos desde cod a html dom
        document.getElementById(id_alert).innerHTML = "<p style='font-size: 11px'>Una vez culminado el registro te enviaremos al correo un link para la confirmación de tu cuenta*</p>";
    } else {
        //Escribimos desde cod a html dom
        document.getElementById(id_alert).innerHTML = "<p style='color: red'>Confirme su contraseña*</p>";
    }
}
/* --------------------------------------------------------------------------------------------------*/
function isNumeric(idNoNumer, id_input_mark, id_alert) { /*INGRESO DE SOLO NÚMEROS*/
    var num = document.getElementById(idNoNumer).value;
    if (num.match(/^-{0,1}\d+$/)) {
        //valid integer (positive or negative)      
        document.getElementById(id_input_mark).style.border = "1px solid white";
        document.getElementById(id_alert).innerHTML = "<p style='font-size: 11px'>Una vez culminado el registro te enviaremos al correo un link para la confirmación de tu cuenta*<p>";
    } else if (num.match(/^\d+\.\d+$/)) {
        //valid float      
        document.getElementById(id_alert).innerHTML = "<mark style='color: red'>Su Doc. identidad no debe ser Decimal*</mark>";
        document.getElementById(id_input_mark).style.border = "1px solid red";
        document.getElementById(idNoNumer).value = "";
    } else {
        //not valid number      
        document.getElementById(id_alert).innerHTML = "<mark style='color: red'>Su Doc. identidad no debe ser Alfanumérico*</mark>";
        document.getElementById(id_input_mark).style.border = "1px solid red";
        document.getElementById(idNoNumer).value = "";
    }
}
/* --------------------------------------------------------------------------------------------------*/
function isText(idNoNumer, id_input_mark, id_alert) { /*INGRESO DE SOLO NÚMEROS*/
    var num = document.getElementById(idNoNumer).value;
    if (num.match(/^-{0,1}\d+$/)) {
        //not valid number      
        document.getElementById(id_alert).innerHTML = "<mark style='color: red'>Este campo no debe contener números*</mark>";
        document.getElementById(id_input_mark).style.border = "1px solid red";
        document.getElementById(idNoNumer).value = "";
    } else if (num.match(/^\d+\.\d+$/)) {
        //valid float      
        document.getElementById(id_alert).innerHTML = "<mark style='color: red'>Este campo no debe ser Decimal*</mark>";
        document.getElementById(id_input_mark).style.border = "1px solid red";
        document.getElementById(idNoNumer).value = "";
    } else {
        //valid integer (positive or negative)      
        document.getElementById(id_input_mark).style.border = "1px solid #c3c3c3";
        document.getElementById(id_alert).innerHTML = "<p style='font-size: 11px'>Una vez culminado el registro te enviaremos al correo un link para la confirmación de tu cuenta*<p>";
    }
}
/* --------------------------------------------------------------------------------------------------*/
function docIdentidad(idDocuIdent, newuser_dni) { /*DOCUMENTO IDENTIDAD INPUT MAXLENGHT*/
    var x = document.getElementById(idDocuIdent).value;
    switch (x) {
        case "DNI":
            // code block            
            document.getElementById(newuser_dni).maxLength = "8";
            document.getElementById(newuser_dni).readOnly = false;
            break;
        case "CARNET EXT.":
            // code block
            document.getElementById(newuser_dni).maxLength = "12";
            document.getElementById(newuser_dni).readOnly = false;
            break;
        case "RUC":
            // code block
            document.getElementById(newuser_dni).maxLength = "11";
            document.getElementById(newuser_dni).readOnly = false;
            break;
        case "PASAPORTE":
            // code block
            document.getElementById(newuser_dni).maxLength = "12";
            document.getElementById(newuser_dni).readOnly = false;
            break;
        case "P. NAC.":
            // code block
            document.getElementById(newuser_dni).maxLength = "5";
            document.getElementById(newuser_dni).readOnly = false;
            break;
        case "OTROS":
            // code block
            document.getElementById(newuser_dni).maxLength = "15";
            document.getElementById(newuser_dni).readOnly = false;
            break;
        default:
            // code block
            document.getElementById(newuser_dni).maxLength = "15";
            document.getElementById(newuser_dni).readOnly = false;
            break;
    }
}
/* --------------------------------------------------------------------------------------------------*/
/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::

                      ACCIONES RUTINE

:::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/* --------------------------------------------------------------------------------------------------*/
function loadData(dato, idDondeVer) {
    /*

      *Lanzar data luego de x segundos el detonante debe ser 

        |<script type="text/javascript">

        |     $(document).ready(function(){

        |           view_toast('.toastAbad'); 

        |           $('#modalFichaBpm').modal('toggle');

        |-->        setTimeout(function() { loadData('dato','idDondeVer') }, 5000)

        |     });

        |</script>

    */
    var dato = dato;
    var accion = 'loadData';
    var dataen = 'dato=' + dato + '&accion=' + accion;
    $.ajax({
        type: 'post',
        url: 'modelos/abad.modelo.php',
        data: dataen,
        success: function(resp) {
            $(idDondeVer).html(resp);
        }
    });
    return false;
}
/* --------------------------------------------------------------------------------------------------*/
function inpEsp(inpReflejo, inpEspejo) { //Input espejo 
    var inpReflejo = document.getElementById(inpReflejo).value;
    document.getElementById(inpEspejo).value = inpReflejo;
}
/* --------------------------------------------------------------------------------------------------*/
function copy_element(id_elemento) { //Copiar elemento
    var element = document.createElement("img");
    element.setAttribute("value", document.getElementById(id_elemento).innerHTML);
    document.body.appendChild(element);
    element.select();
    document.execCommand("copy");
    document.body.removeChild(element);
}
/* --------------------------------------------------------------------------------------------------*/
function download_image(idCanvas) { //Descargar elemento canvas como imagen onclick(Ejem: barcode)
    var canvas = document.getElementById(idCanvas);
    image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    var link = document.createElement('a');
    var fecha = new Date();
    var nombre_imagen = fecha.getHours() + "_" + fecha.getMinutes() + "_" + fecha.getSeconds() + "_" + fecha.getMilliseconds();
    link.download = nombre_imagen + ".png";
    link.href = image;
    link.click();
}
/* --------------------------------------------------------------------------------------------------*/
function view_toast(clase) { //Mostrar elementos
    // $('.toastAbad').delay(1000).show("slow");
    // $('.toastAbad').delay(4000).hide("slow");
    $(clase).delay(1000).fadeIn(1000);
    $(clase).animate({
        bottom: "65px"
    });
    $(clase).animate({
        bottom: "70px"
    });
    $(clase).animate({
        bottom: "65px"
    });
    $(clase).delay(5000).fadeOut(1000);
}

function view_abad(id) { //Mostrar elementos
    var contenedorx = document.getElementById(id);
    contenedorx.style.display = "block";
    return true;
}
/* -----------------                                                      --------------------------*/
function noview_abad(id) { //Ocultar elementos
    var contenedorx = document.getElementById(id);
    contenedorx.style.display = "none";
    return true;
}
/* --------------------------------------------------------------------------------------------------*/
function redireccionar(url) { //Redireccionar onclik
    location.href = url;
}
/* --------------------------------------------------------------------------------------------------*/
$(document).ready(function() { /*Inicializamos */
    $('[data-toggle="tooltip"]').tooltip(); /* para que los title sean negros. HTML -->data-toggle="tooltip" data-placement="bottom" title="Página dashboard"*/
    setTimeout(function() {
        $('[type="search"]').focus()
    }, 2000); /* Para autoseleccionar input search de data tables*/
    $('#cerrarModalClientes').click(function() {
        $("#modalFichaBpm").modal('hide');
    })
});
/* --------------------------------------------------------------------------------------------------*/
//REFRESH TABLE ON CLIC al cerrar modal
// function refreshtable(){
//        location.reload();
//        $('input[type="text"]').val('');   
// }
// $(".modal").on('hidden.bs.modal', function () {
//        refreshtable()
// });
//REFRESH TABLE ON CLIC al abrir modal
// function refreshtable(){
//        location.reload();
//        $('input[type="text"]').val('');   
// }
// $(".modal").on('show.bs.modal', function () {
//        refreshtable()
// });
/* --------------------------------------------------------------------------------------------------*/
function printDiv(divName) { /*IMPRIMIR UN DIV */
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
/* --------------------------------------------------------------------------------------------------*/
// Pega todo donde desees lanzar
// window.onbeforeunload = function (e) {
//   var e = e || window.event;
//   // For IE and Firefox
//   if (e) {
//     e.returnValue = 'Mensaje';
//   }
//   // For Safari
//   return 'Mensaje';
// };
/*
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  ROBOT DE VOZ ABAD ESQUEN !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
*/
var synth = window.speechSynthesis;
var allVoices = synth.getVoices();

function hablame(quehablar) {
    var sampleText = quehablar;
    var utterance = new SpeechSynthesisUtterance(sampleText);
    if (speechSynthesis.onvoiceschanged !== undefined) {
        speechSynthesis.onvoiceschanged = synth.getVoices;
    }
    utterance.voice = allVoices.filter(function(allVoices) {
        return voice.name == 'Monica';
    })[0];
    window.speechSynthesis.speak(utterance);
}