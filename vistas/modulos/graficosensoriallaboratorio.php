         
<style type="text/css">
.itenmenu>div{margin-bottom: 10px !important}
body{
	/*     overflow-y: auto; */
	font-size: 10pt;
	/*overflow-y:hidden; */

	}
	th{
	background: #616161;
	color: white;
	border: #999999 1px solid;
	text-align: center;
	padding: 2px 3px;

	}
	td{
	background: #f5f5f5;
	border: #4e95f4 1px solid;
	padding: 4px 2px;

	}
	.letranegruda{
	font-weight: 900;
	}
	#scrollcito{

	overflow-y: auto; /**El scroll verticalmente cuando sea necesario*/
	overflow-x: auto;/*Sin scroll horizontal*/
	width: 102%;
	height: 560px;

	}

	#scrollcito  table {
	width: auto;

	}
	.fut{background: transparent;border: transparent 1px solid; }

	.btnMod{
	border-radius: 8px;
	margin-bottom: 8px;
	}
	/*
	*  STYLE 7 ABAD
	*/

	::-webkit-scrollbar-track
	{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #c3c3c3;
	border-radius: 10px;
	}

	::-webkit-scrollbar
	{
	width: 10px;
	background-color: #c3c3c3;
	}

	::-webkit-scrollbar-thumb
	{
	border-radius: 10px;
	background-image: -webkit-gradient(linear,
	left bottom,
	left top,
	color-stop(0.44, rgb(144, 148, 151)),
	color-stop(0.72, rgb(95, 106, 106)),
	color-stop(0.86, rgb(77, 86, 86)));
	}
	.lablgnrl{
	color: #607d8b;
	}
	.has-feedback>input{
	color: black;
	font-weight: 500;
	}
	.inputCabe {
	border-radius: 2px;
	background: transparent;
	text-align: left;
	border: none;
	outline: 0;
	}
	.h3ti{
	font-size: 15pt !important;
	}

	input[type=radio] {
	border: 0px;

	width: 1.2em;
	height: 1.2em;
	}



	.capsul{
	background: #30678e;color: white; padding: 0px 4px;border-radius: 10px;margin: 1px 0px;border: 1px solid #e8eaf6;
	}
	.cab_marron{
	background: #bf360c;color: white;font-weight: 800;
	}
	.volt_texto {
	writing-mode: vertical-lr;
	transform: rotate(180deg);
	}
	.total_rata{
	background: #f5f5f5;
	color: black;
	font-weight: 700;
	}
	.scale1{
	background: #76422a;
	}
	.scale2{
	background: #915136;
	}
	.scale3{
	background: #ad5b29;
	}
	.scale4{
	background: #b96c34;
	}

	/*body{
	background: #f5f5f5 !important;
	}*/
	canvas#marksCharti {
		background: white !important;
		max-width:  580px;

	}

	@media screen and (min-width: 800px) {
		canvas#marksCharti {
		background: white !important;
		min-width: 850px ;
		}
	}



	div.scrollmenu {
		margin-right: 20px !important;
		overflow: auto;
		white-space: nowrap;
	}

	div.scrollmenu a {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 1px;
		text-decoration: none;
	}

	div.scrollmenu a:hover {
		background-color: #777;
	}


  #containers {
      width: 120%;
      height: 120%;
      margin: 0;
      padding: 0;
    }
   
    #container {
     
      height: 550px;
      margin: 0;
      padding: 0;
         
    }
   
    #contieneSab {
      overflow: scroll;
        } 

        .highlight {
    background-color: #fff34d;
    -moz-border-radius: 5px; /* FF1+ */
    -webkit-border-radius: 5px; /* Saf3-4 */
    border-radius: 5px; /* Opera 10.5, IE 9, Saf5, Chrome */
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* FF3.5+ */
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Saf3.0+, Chrome */
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Opera 10.5+, IE 9.0 */
}

.highlight {
    padding:1px 4px;
    margin:0 -4px;
}

</style>
    
<div class="content">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="border-top: 2px solid #ccc;margin-top: 10px">
    <spam style="font-size: 14pt;font-weight: 600;color: black;background: #95FBFD; padding: 6px 10px;border-radius: 0px 0px 20px 20px">&gt;&gt;&gt; Clasificación de Sabores</spam>
  </div>

  <section class="content">
	<div class="row">		
    <div class="col-md-7 box-body" >
			<form method="post" id="checkForm" class="form-group-main" onsubmit="return false;">
      <input name="key" type="text" id="key" onkeyup="buscar(this.value)" /><br/><br/>
				<input type="hidden" value="ingAnalisisSPT" name="ingAnalisisSPT" id="ingAnalisisSPT">
				<input type="hidden" value="ingASPT" name="accion" id="accion">
        <textarea style="display:none;" id="GrafSabBase64String"></textarea>
				<input type="hidden" value="<?php echo $_POST['codigo_bpm_gs'];?>" name="pk_bpm" id="pk_bpm">
      
        <div class="table-responsive">
   <div id="contieneSab">
        <table class="table" id="nivel1">
        <thead>
        <tr> 
          <th colspan="90">Tablero</th>
        </tr>
        </thead>
        <tbody id="tnivel1">            
  
      </tbody>
        </table>
      </div>
        </div>
        
			</form>
      </div>
      <?php 
      /*if($_POST["pk_bpm"]){
//$pk_bpm=$_POST["pk_bpm"];
 $_SESSION['pk_bpm']=$_POST["pk_bpm"];
$pk_bpm=$_SESSION['pk_bpm'];
}else{
  $pk_bpm=$_SESSION['pk_bpm'];
  //$pk_bpm=2;
}*/
$pk_bpm = $_POST['codigo_bpm_gs'];
//echo $pk_bpm;
?>
	  <div id="respMsjj">

		</div>
    <div class="col-md-5" id="container"></div>
   
    </div>
  </section>
</div>  



<!-- Modal  AGREGAR NIETO -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">NUEVO SABOR/AROMA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ------------------------------------------------------------------------ -->
        <form id="nietoForm" method="post" class="form-group-main">
        <input type="hidden" id="padre2" name="padre2" value="">
            <div class="form-row itenmenu">
              <div class="col-md-2 ">
              <label for="colorGrag">Color:</label>
                <input type="color" class="form-control" id="color" name="color" required>
              </div>
               <div class="col-md-6 ">
               <label for="SaborGraf">Sabor:</label>
                <input type="text" class="form-control" id="nomb" placeholder="Nombre" required>
              </div>
 
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Guardar</button>
            <br><br>
             <div id="message" class="text-center"></div>

          </form>
        <!-- ------------------------------------------------------------------------ -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>

  </div>
</div>
<!-- Modal  AGREGAR NIETO -->


<script src="vistas/js/graficSensorialSabores.js"></script>
<script type="text/javascript" src="vistas/js/highlight.js"></script>
  <script>
        
    ///////////////////////////////
    ////################################################################################
    //####################################################################################
    $(document).ready(function(){
	  
    loadGrafico('<?php echo $pk_bpm;?>');
   // loadGrafico('2');
   loadDatatNivel1('#tnivel1','nivel1', '<?php echo $pk_bpm;?>');
  });

  function loadDatatNivel1(nivel,level,pk_bpm){
  
var level = level;
var cod      = "selectnivel1";

      var dataen ='cod='+cod+
      '&pk_bpm='+pk_bpm+
                  '&level='+level;
      $.ajax(
      {
        type: 'post',
        url:'controladores/graficosensorial.controlador.php',
        data: dataen,
        success:function(data){

//$('#tnivel1').fadeIn(1000).html(data);
$(nivel).html(data);
//              $('#tnivel1').fadeIn(1000).html(data);
              //### guarda los datos de la tabla para hacer la busqueda
//original=document.getElementById('nivel1').innerHTML;

          }
      });
      return false;
}

function loadGrafico(pk_bpm){
  
  var level = level;
  var cod      = "cargaGrafBD";
  
        var dataen ='cod='+cod+
        '&pk_bpm='+pk_bpm+
                    '&level='+level;
        $.ajax(
        {
          type: 'post',
          url:'controladores/graficosensorial.controlador.php',
          data: dataen,
          success:function(data){
            $('#container').empty();//limpia el contenido
            // makes tree from the data for the sample
          var dataTree = anychart.data.tree(data);

// create sunburst chart
var chart = anychart.sunburst(dataTree);

// set calculation mode
//chart.calculationMode('parent-independent');//para que funcione es necesario especificar el value en el array
//chart.calculationMode('ordinal-from-leaves');

// set chart labels settings
chart.labels().hAlign('center');
//chart.selected().hatchFill("forward-diagonal", "white", 0.5, 12);
chart.normal().stroke("white", 2);
chart.hovered().stroke("white", 2);
chart.selected().stroke("white", 2);


// set settings for the penultimate level labels
chart.level(3).labels().position('radial');
chart.level(2).labels().position('radial');
chart.level(1).labels().position('circular');

// set settings for leaves labels
//        chart.leaves().labels().minFontSize(8).textOverflow('...');

// descending sort data
chart.sort('desc');

// set chart title
chart.title('GRAFICO ANALISIS SENSORIAL');
 
// set thickness for level
//chart.level(0).thickness('20%');
//chart.level(1).thickness('20%');
chart.level(2).thickness('25%');
chart.level(3).thickness('35%');
// create standalone label and set settings



 // set point fill
 chart.fill(function () {
            return anychart.color.darken(this.parentColor, 0.15);
          });
          
          // format chart labels
          chart.labels().format('{%Name}');

          // format tooltip
          chart.tooltip().format(function () {
            return this.name + ': ' + format(this.value);
          });

          // format chart tooltip
          chart.tooltip().format('{%Name}');
          // set container id for the chart
          chart.container('container');
          // initiate chart drawing
          chart.draw();
//##  GENERA IMAGEN BASE64PNG ###
          chart.getPngBase64String(function (response) {
            base64String = document.getElementById('GrafSabBase64String');
            base64String.innerHTML = response;
            document.getElementById("GrafSabBase64String").value = base64String.innerHTML;  
          }, 100, 800, 800, 0.9);
        }
      });
      return false;
}
//###### FUNCION PARA HACER EL GRAFICO DINAMICO CON LOS CHECKBOX ############

function contrucGrafic(idus,nomitm,level,phj,idniv){
  var pk_bpm=<?php echo $pk_bpm;?>;
  if (level=="n1"){
  if( $('#'+idus).prop('checked') ) {
    var customSwitch1= 1;
  }else{
    var customSwitch1    = 0;
  }
//#####################################
//######## edita/agrega registro ###############
var cod      = "modifigraf";
var lev = 1;

        var dataen ='idniv1='+idniv+
              '&estado='+customSwitch1+
              '&pk_bpm='+pk_bpm+
              '&lev='+lev+
              '&cod=' +cod;
$.ajax(
  {
    type: 'post',
    url:'controladores/graficosensorial.controlador.php',
    data: dataen,
    success:function(resp){
      loadGrafico('<?php echo $pk_bpm;?>');
      //$('#message').hide();
          //$('#message').empty();
           // $('#message').show();
       //     $('#respMsj').delay(3000).fadeOut(1500).html(resp);
           // $('.btn-ini').prop('disabled', false);
          //   $('#contraseña,#contraseña1,#numIdent,#nomb,#apell,#fechNac,#obserb,#correo,#contraseña,#contraseña1').val("");
      }
  });
    return false;
  
}else if (level=="n2"){
  if( $('#'+idus).prop('checked') ) {
    var customSwitch1= 1;
  }else{

    var customSwitch1    = 0;
  }

  //#####################################
var cod      = "modifigraf";
var padre      = phj;
var lev = 2;

        var dataen ='idniv1='+idniv+
              '&estado='+customSwitch1+
              '&pk_bpm='+pk_bpm+
              '&padre='+padre+
              '&lev='+lev+
              '&cod=' +cod;
$.ajax(
  {
    type: 'post',
    url:'controladores/graficosensorial.controlador.php',
    data: dataen,
    success:function(resp){
      loadGrafico('<?php echo $pk_bpm;?>');
           }
  });
    return false;

}else if (level=="n3"){

  if( $('#'+idus).prop('checked') ) {
    var customSwitch1= 1;
  }else{

    var customSwitch1    = 0;

  }
//#####################################
var cod      = "modifigraf";
var padre      = phj;
var lev = 3;

        var dataen ='idniv1='+idniv+
              '&estado='+customSwitch1+
              '&pk_bpm='+pk_bpm+
              '&padre='+padre+
              '&lev='+lev+
              '&cod=' +cod;
$.ajax(
  {
    type: 'post',
    url:'controladores/graficosensorial.controlador.php',
    data: dataen,
    success:function(resp){
      loadGrafico('<?php echo $pk_bpm;?>');
      //$('#message').hide();
          //$('#message').empty();
           // $('#message').show();
       //     $('#respMsj').delay(3000).fadeOut(1500).html(resp);
           // $('.btn-ini').prop('disabled', false);
          //   $('#contraseña,#contraseña1,#numIdent,#nomb,#apell,#fechNac,#obserb,#correo,#contraseña,#contraseña1').val("");
      }
  });
    
     return false;

}

}

//captura datos de registro de nieto

function cargaIdPadre(){
$('#staticBackdrop').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
      var code = button.data('padre')
      $('#padre2').val(code)
    })
 
}

//########################

$("#nietoForm").on('submit', function() {
 
  var color=$('input[name=color]').val();
  var nomb=$('#nomb').val();
  var padre=$('#padre2').val();
  var cod = "oteinwen";

var dataen ='nombre='+nomb+
      '&color='+color+
      '&padre='+padre+
      '&cod=' +cod;
     // statement
      $.ajax(
      {
        type: 'post',
        url:'controladores/graficosensorial.controlador.php',
        data: dataen,
        success:function(resp){
          $('#message').hide();
              $('#message').empty();
                $('#message').show();
                $('#message').delay(3000).fadeOut(1500).html(resp);
                loadDatatNivel1('#tnivel1','nivel1','<?php echo $pk_bpm;?>');
                 //$('#contraseña,#contraseña1,#numIdent,#nomb,#apell,#fechNac,#obserb,#correo,#contraseña,#contraseña1').val("");
          }
      });
      return false;
    
});
  ///############################################################################
  //################################################################################

  
    // CAPTURA DATOS DEL FORMULAIRO 

    $("#checkForm").on('submit', function() {
     // var numIdent    = $('#i11').val();
     //document.getElementById('i11').checked = true;
    

     opcion="registrar";      
    //$('.btn-ini').prop('disabled', true);
    var arraylevel1 = JSON.stringify(arraynivel1);
    var arraylevel2 = JSON.stringify(arraynivel2);
    var arraylevel3 = JSON.stringify(arraynivel3);
if( $('#customSwitch1').prop('checked') ) {
    var customSwitch1    = 1;
}else{
    var customSwitch1    = 0;
}

        //var customSwitch1    = $('#customSwitch1').val();
          var cod      = "ortsigerwen";

        var dataen ='arraynivel1='+arraylevel1+
              '&arraynivel2='+arraylevel2+
              '&arraynivel3='+arraylevel3+
              '&cod=' +cod;

             //opcitne la opcion a realizar
            //OPCION REGISTRAR USURIO
            if (opcion=="registrar") {
             // statement
              $.ajax(
              {
                type: 'post',
                url:'controladores/graficosensorial.controlador.php',
                data: dataen,
                success:function(resp){
                  $('#respMsj').hide();             
                  $('#respMsj').empty();             
                  $('#respMsj').show();             
                  $('#respMsj').delay(3000).fadeOut(1500).html(resp);
                   }
              });
              return false;
            }
                   
});



//### BUSCADOR DE CONTENIDO DE TABLA #####
String.prototype.preg_quote=function(){
    p= /([:.\+*?[^\]$(){}=!<>|:)])/g;
    return this.replace(p,"\\$1");
}
function buscar(cadena){
	//######### PARA MOVER EL SCROLL
	var posicion=0;
  document.getElementById('contieneSab').scrollLeft= posicion;
       resetear();
    if(!cadena.length)return;
    var info3;
    cadena=cadena.preg_quote();
    var patron=new RegExp(cadena+'(?!\}\})','gim');
    var espacio=/^\s$/;
    var el=document.getElementById('nivel1').getElementsByTagName('*');
   for(var ii=0;ii<el.length;ii++){
	   if(el[ii].hasChildNodes && el[ii].nodeName.toLowerCase()!='title' && el[ii].nodeName.toLowerCase()!='script' && el[ii].nodeName.toLowerCase()!='meta' && el[ii].nodeName.toLowerCase()!='link' && el[ii].nodeName.toLowerCase()!='style'){
		   var tt=el[ii].childNodes;
		 
            for(var jj in tt){
                if(tt[jj].nodeType==3 && !espacio.test(tt[jj].nodeValue)){
                    patron.lastIndex = 0;
                    if(info3=patron.exec(tt[jj].nodeValue)){
                      gg= tt[jj].nodeValue;
                      pal=tt[jj].nodeValue.substr(info3['index'],cadena.length);
                        		    }
                }

            }        
        }
    }
//	console.log(gg.replace(" ", '') );
ggsg=gg.replace(" ", '');
  ggs=ggsg.replace(" ", '');
  ggs=ggs.replace("/", '');
  idbusc="#nb1"+ggs;

  $('#contieneSab').highlight(pal);
  
	var posicion = $(idbusc).offset().left;
document.getElementById('contieneSab').scrollLeft+= posicion-200;
}
function resetear(){
 
  $('#contieneSab').removeHighlight();
}


</script>

                
