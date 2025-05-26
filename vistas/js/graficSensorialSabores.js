var arraynivel1 = new Array() ;var arraynivel2=[];var arraynivel3=[];
var padren1=[];
var hijp=[];var hijp1=[];var hijp2=[];var hijp3=[];var hijp4=[];var hijp5=[];var hijp6=[];var hijp7=[];var hijp8=[];
var hijpp=[];var hijpp1=[];var hijpp2=[];var hijpp3=[];var hijpp4=[];var hijpp5=[];var hijpp6=[];hijpp7=[];hijpp8=[];
var hij1nivel3=[]; var hij2nivel3=[]; var hij3nivel3=[]; var hij4nivel3=[]; var hij5nivel3=[]; var hij6nivel3=[]; var hij7nivel3=[]; var hij8nivel3=[];
var hij9nivel3=[]; var hij10nivel3=[]; var hij11nivel3=[]; var hij12nivel3=[]; var hij13nivel3=[]; var hij14nivel3=[]; var hij15nivel3=[]; var hij16nivel3=[];
var hij17nivel3=[]; var hij18nivel3=[]; var hij19nivel3=[]; var hij20nivel3=[]; var hij21nivel3=[]; var hij22nivel3=[]; var hij23nivel3=[]; var hij24nivel3=[];
var hij25nivel3=[]; var hij26nivel3=[]; var hij27nivel3=[]; var hij28nivel3=[];

function contrucGraficSenSab(idus,nomitm,level,phj,idniv){

if (level=="n3"){
  if( $('#'+idus).prop('checked') ) {
    var customSwitch1    = 1;
  arraynivel3.push({'id':idniv, 'padre':phj, 'estado': customSwitch1});
  }else{
    var customSwitch1    = 0;
  }
//####### NIVEL 3 #########
//phj=> variable para identificar el padre e hijo del grafico
 
switch (phj) {
  case "1":
    if( $('#'+idus).prop('checked') ) {
      hij1nivel3.push({'name':nomitm, 'fill':'red'});                  
    }else{
      hij1nivel3 = hij1nivel3.filter((item) => item.name !== nomitm);      
                
    } 
    var nom='FLORAL';    
        hijp.map(function(dato){
           if(dato.name == nom){
              dato.children = hij1nivel3;
                 }
                return dato;
               });  
    
    break;
  case "2":
    if( $('#'+idus).prop('checked') ) {
      hij2nivel3.push({'name':nomitm, 'fill':'red'});
  }else{
    hij2nivel3 = hij2nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='TÉ NEGRO';    
        hijp.map(function(dato){
           if(dato.name == nom){
              dato.children = hij2nivel3;
                 }
                return dato;
               });
break;
  case "3": 
    if( $('#'+idus).prop('checked') ) {
      hij3nivel3.push({'name':nomitm, 'fill':'green'}); }else{
        hij3nivel3 = hij3nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='BAYAS';    
        hijp1.map(function(dato){
           if(dato.name == nom){
              dato.children = hij3nivel3;
                 }
                return dato;
               });
    break;
  case "4":
    if( $('#'+idus).prop('checked') ) {
      hij4nivel3.push({'name':nomitm, 'fill':'green'}); }else{
        hij4nivel3 = hij4nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='FRUTOS SECOS';    
    hijp1.map(function(dato){
           if(dato.name == nom){
              dato.children = hij4nivel3;
                 }
                return dato;
               });
    break;
  case "5":
    if( $('#'+idus).prop('checked') ) {
      hij5nivel3.push({'name':nomitm, 'fill':'yellow'}); }else{
        hij5nivel3 = hij5nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='OTRAS FRUTAS';    
    hijp1.map(function(dato){
           if(dato.name == nom){
              dato.children = hij5nivel3;
                 }
                return dato;
               });
    break;  
    case "6":
    if( $('#'+idus).prop('checked') ) {
      hij6nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij6nivel3 = hij6nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='CÍTRICOS';    
    hijp1.map(function(dato){
           if(dato.name == nom){
              dato.children = hij6nivel3;
                 }
                return dato;
               });
    break;
    case "7":
    if( $('#'+idus).prop('checked') ) {
      hij7nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij7nivel3 = hij7nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='ÁCIDO';    
    hijp2.map(function(dato){
           if(dato.name == nom){
              dato.children = hij7nivel3;
                 }
                return dato;
               });
    break;
    case "8":
    if( $('#'+idus).prop('checked') ) {
      hij8nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij8nivel3 = hij8nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='ALCOHOL/FERMENTADO';    
    hijp2.map(function(dato){
           if(dato.name == nom){
              dato.children = hij8nivel3;
                 }
                return dato;
               });
    break;
    case "9":
    if( $('#'+idus).prop('checked') ) {
      hij9nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij9nivel3 = hij9nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='ACEITE DE OLIVA';    
    hijp3.map(function(dato){
           if(dato.name == nom){
              dato.children = hij9nivel3;
                 }
                return dato;
               });
    break;
    case "10":
    if( $('#'+idus).prop('checked') ) {
      hij10nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij10nivel3 = hij10nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='CRUDO';    
    hijp3.map(function(dato){
           if(dato.name == nom){
              dato.children = hij10nivel3;
                 }
                return dato;
               });
    break;
    case "11":
    if( $('#'+idus).prop('checked') ) {
      hij11nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij11nivel3 = hij11nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='VERDE/VEGETAL';    
    hijp3.map(function(dato){
           if(dato.name == nom){
              dato.children = hij11nivel3;
                 }
                return dato;
               });
    break;
    case "12":
    if( $('#'+idus).prop('checked') ) {
      hij12nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij12nivel3 = hij12nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='LEGUMINOSO';    
    hijp3.map(function(dato){
           if(dato.name == nom){
              dato.children = hij12nivel3;
                 }
                return dato;
               });
    break;
    case "13":
    if( $('#'+idus).prop('checked') ) {
      hij13nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij13nivel3 = hij13nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='AZÚCAR MORENA';    
    hijp4.map(function(dato){
           if(dato.name == nom){
              dato.children = hij13nivel3;
                 }
                return dato;
               });
    break;
    case "14":
    if( $('#'+idus).prop('checked') ) {
      hij14nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij14nivel3 = hij14nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='VANILLA';    
    hijp4.map(function(dato){
           if(dato.name == nom){
              dato.children = hij14nivel3;
                 }
                return dato;
               });
    break;
    case "15":
    if( $('#'+idus).prop('checked') ) {
      hij15nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij15nivel3 = hij15nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='AROMA DE VANILLA';    
    hijp4.map(function(dato){
           if(dato.name == nom){
              dato.children = hij15nivel3;
                 }
                return dato;
               });
    break;
    case "16":
    if( $('#'+idus).prop('checked') ) {
      hij16nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij16nivel3 = hij16nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='DULCE GENERAL';    
    hijp4.map(function(dato){
           if(dato.name == nom){
              dato.children = hij16nivel3;
                 }
                return dato;
               });
    break;
    case "17":
    if( $('#'+idus).prop('checked') ) {
      hij17nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij17nivel3 = hij17nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='AROMÁTICOS DULCES';    
    hijp4.map(function(dato){
           if(dato.name == nom){
              dato.children = hij17nivel3;
                 }
                return dato;
               });
    break;
    case "18":
    if( $('#'+idus).prop('checked') ) {
      hij18nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij18nivel3 = hij18nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='CACAO';    
    hijp5.map(function(dato){
           if(dato.name == nom){
              dato.children = hij18nivel3;
                 }
                return dato;
               });
    break;
    case "19":
    if( $('#'+idus).prop('checked') ) {
      hij19nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij19nivel3 = hij19nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='NUECES';    
    hijp5.map(function(dato){
           if(dato.name == nom){
              dato.children = hij19nivel3;
                 }
                return dato;
               });
    break;
    case "20":
    if( $('#'+idus).prop('checked') ) {
      hij20nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij20nivel3 = hij20nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='ESPECIAS MARRONES';    
    hijp6.map(function(dato){
           if(dato.name == nom){
              dato.children = hij20nivel3;
                 }
                return dato;
               });
    break;
    case "21":
    if( $('#'+idus).prop('checked') ) {
      hij21nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij21nivel3 = hij21nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='PIMIENTA';    
    hijp6.map(function(dato){
           if(dato.name == nom){
              dato.children = hij21nivel3;
                 }
                return dato;
               });
    break;
    case "22":
    if( $('#'+idus).prop('checked') ) {
      hij22nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij22nivel3 = hij22nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='ACRE';    
    hijp6.map(function(dato){
           if(dato.name == nom){
              dato.children = hij22nivel3;
                 }
                return dato;
               });
    break;
    case "23":
    if( $('#'+idus).prop('checked') ) {
      hij23nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij23nivel3 = hij23nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='CEREAL';    
    hijp7.map(function(dato){
           if(dato.name == nom){
              dato.children = hij23nivel3;
                 }
                return dato;
               });
    break;
    case "24":
    if( $('#'+idus).prop('checked') ) {
      hij24nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij24nivel3 = hij24nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='QUEMADO';    
    hijp7.map(function(dato){
           if(dato.name == nom){
              dato.children = hij24nivel3;
                 }
                return dato;
               });
    break;
    case "25":
    if( $('#'+idus).prop('checked') ) {
      hij25nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij25nivel3 = hij25nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='TABACO';    
    hijp7.map(function(dato){
           if(dato.name == nom){
              dato.children = hij25nivel3;
                 }
                return dato;
               });
    break;
    case "26":
    if( $('#'+idus).prop('checked') ) {
      hij26nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij26nivel3 = hij26nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='TABACO DE PIPA';    
    hijp7.map(function(dato){
           if(dato.name == nom){
              dato.children = hij26nivel3;
                 }
                return dato;
               });
    break;
    case "27":
    if( $('#'+idus).prop('checked') ) {
      hij27nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij27nivel3 = hij27nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='QUÍMICO';    
    hijp8.map(function(dato){
           if(dato.name == nom){
              dato.children = hij27nivel3;
                 }
                return dato;
               });
    break;
    case "28":
    if( $('#'+idus).prop('checked') ) {
      hij28nivel3.push({'name':nomitm, 'fill':'brown'});  }else{
        hij28nivel3 = hij28nivel3.filter((item) => item.name !== nomitm);
    } 
    var nom='PAPEL/HUMEDAD';    
    hijp8.map(function(dato){
           if(dato.name == nom){
              dato.children = hij28nivel3;
                 }
                return dato;
               });
    break;
  default:
    console.log('default');
  }
//fin nivel 3

} else if(level=="n2"){
  if( $('#'+idus).prop('checked') ) {
    var customSwitch1    = 1;
  arraynivel2.push({'id':idniv, 'padre':phj, 'estado':customSwitch1});
  }else{
    var customSwitch1    = 1;
  }
switch (phj) {
  case "1":
    if( $('#'+idus).prop('checked') ) {
      //if(nomitm=='Peru1'){hijpp=hij1nivel3}else if(nomitm=='Peru2'){hijpp=hij2nivel3}
    hijp.push({'name':nomitm, 'fill':'green', 'children': hijpp}); 
    }else{
        hijp = hijp.filter((item) => item.name !== nomitm);
        var nom='FLORAL';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp;
                 }
                return dato;
               });
    } 
    break;
  case "2":
    if( $('#'+idus).prop('checked') ) {
    hijp1.push({'name':nomitm, 'fill':'green', 'children': hijpp1});   }else{
        hijp1 = hijp1.filter((item) => item.name !== nomitm);
        var nom='AFRUTADO';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp1;
                 }
                return dato;
               });
    } 
break;
  case "3": 
    if( $('#'+idus).prop('checked') ) {
    hijp2.push({'name':nomitm, 'fill':'blue', 'children': hijpp2}); }else{
        hijp2 = hijp2.filter((item) => item.name !== nomitm);
        var nom='ACIDO/FERMENTADO';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp2;
                 }
                return dato;
               });
    } 
    break;
  case "4":
    if( $('#'+idus).prop('checked') ) {
    hijp3.push({'name':nomitm, 'fill':'red', 'children': hijpp3}); }else{
        hijp3 = hijp3.filter((item) => item.name !== nomitm);
        var nom='VERDE/VEGETAL';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp3;
                 }
                return dato;
               });
    } 
    break;
  case "5":
    if( $('#'+idus).prop('checked') ) {
    hijp4.push({'name':nomitm, 'fill':'green', 'children': hijpp4}); 
  }else{
        hijp4 = hijp4.filter((item) => item.name !== nomitm);
        var nom='DULCE';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp4;
                 }
                return dato;
               });
    } 
    break;  
  case "6":
    if( $('#'+idus).prop('checked') ) {
    hijp5.push({'name':nomitm, 'fill':'green', 'children': hijpp5}); 
  }else{
        hijp5 = hijp5.filter((item) => item.name !== nomitm);
        var nom='NUECES/CACAO';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp5;
                 }
                return dato;
               });
    } 
    break;
  case "7":
    if( $('#'+idus).prop('checked') ) {
    hijp6.push({'name':nomitm, 'fill':'green', 'children': hijpp6}); 
  }else{
        hijp6 = hijp6.filter((item) => item.name !== nomitm);
        var nom='NUECES/CACAO';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp6;
                 }
                return dato;
               });
    } 
    break;
  case "8":
    if( $('#'+idus).prop('checked') ) {
    hijp7.push({'name':nomitm, 'fill':'green', 'children': hijpp7}); 
  }else{
        hijp7 = hijp7.filter((item) => item.name !== nomitm);
        var nom='NUECES/CACAO';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp7;
                 }
                return dato;
               });
    } 
  break;
  case "9":
    if( $('#'+idus).prop('checked') ) {
    hijp8.push({'name':nomitm, 'fill':'green', 'children': hijpp8}); 
  }else{
        hijp8 = hijp8.filter((item) => item.name !== nomitm);
        var nom='NUECES/CACAO';    
        padren1.map(function(dato){
           if(dato.name == nom){
              dato.children = hijp8;
                 }
                return dato;
               });
    } 
    break;
  default:
    console.log('default');
  }

  }else if (level=="n1"){
   
if( $('#'+idus).prop('checked') ) {
var customSwitch1= 1;
arraynivel1.push({'id':idniv,'estado':customSwitch1});

//#####################################
var cod      = "modifigraf";
var lev = 1;

        var dataen ='idniv1='+idniv+
              '&estado='+customSwitch1+
              '&cod=' +cod;
$.ajax(
  {
    type: 'post',
    url:'controladores/graficosensorial.controlador.php',
    data: dataen,
    success:function(resp){
      //$('#message').hide();
          //$('#message').empty();
           // $('#message').show();
       //     $('#respMsj').delay(3000).fadeOut(1500).html(resp);
           // $('.btn-ini').prop('disabled', false);
          //   $('#contraseña,#contraseña1,#numIdent,#nomb,#apell,#fechNac,#obserb,#correo,#contraseña,#contraseña1').val("");
      }
  });
 // return false;


//######################################


  //padren1=padren1+'{"Name":"'+nomitm+'}';
  switch (phj) {
  case "1":
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp});
    break;
  case "2": // foo es 0, por lo tanto se cumple la condición y se ejecutara el siguiente bloque
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp1}); 
   // console.log(padren1);
   break;
    // NOTA: el "break" olvidado debería estar aquí
  case "3": // No hay sentencia "break" en el 'case 0:', por lo tanto este caso también será ejecutado
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp2});
    break; // Al encontrar un "break", no será ejecutado el 'case 2:'
  case "4":
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp3}); 
    break;
  case "5":
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp4});
    break;  
  case "6":
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp5});
    break;
  case "7":
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp6});
    break;
  case "8":
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp7});
    break;
  case "9":
    padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp8});
    break;
  default:
    console.log('default');
} 
//  padren1.push({'name':nomitm, 'fill':'blue', 'children': hijp});
//person1 = [{'name':'hola', 'fill':'green'},{'name':'hola', 'fill':'green'}];
}else{
var customSwitch1    = 0;


//#####################################
//######## edita/agrega registro ###############
var cod      = "modifigraf";
var lev = 1;

        var dataen ='idniv1='+idniv+
              '&estado='+customSwitch1+
              '&cod=' +cod;
$.ajax(
  {
    type: 'post',
    url:'controladores/graficosensorial.controlador.php',
    data: dataen,
    success:function(resp){
      //$('#message').hide();
          //$('#message').empty();
           // $('#message').show();
       //     $('#respMsj').delay(3000).fadeOut(1500).html(resp);
           // $('.btn-ini').prop('disabled', false);
          //   $('#contraseña,#contraseña1,#numIdent,#nomb,#apell,#fechNac,#obserb,#correo,#contraseña,#contraseña1').val("");
      }
  });
  //return false;

//######################################

//var myArray = [{id:1, name:'Morty'},{id:2, name:'Rick'},{id:3, name:'Anna'}];
padren1 = padren1.filter((item) => item.name !== nomitm);

console.log(padren1);

}
}
const person = [{'name':'', 'fill':'transparent', 'children': padren1}];

console.log(person);


  // alert(customSwitch1);
var cod      = "cifargrtnoc";
    // statement
       $('#container').empty();//limpia el contenido
            // makes tree from the data for the sample
          var dataTree = anychart.data.tree(person);

// create sunburst chart
var chart = anychart.sunburst(dataTree);

// set calculation mode
//chart.calculationMode('parent-independent');//para que funcione es necesario especificar el value en el array
chart.calculationMode('ordinal-from-root');

// set chart labels settings
chart.labels().hAlign('center');

// set settings for the penultimate level labels
chart.level(-2).labels().position('radial');
chart.level(-3).labels().position('circular');

// set settings for leaves labels
//        chart.leaves().labels().minFontSize(8).textOverflow('...');
// descending sort data
chart.sort('desc');

// set chart title
chart.title('GRAFICO ANALISIS SENSORIAL');

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
        
      return false;

}
