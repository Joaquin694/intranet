<script>
    /*INSERT INTO*/ 
    function sendNewUser(){
        var fecha_recepcion = document.getElementById('fecha_recepcion').value;
        var fecha_analisis = document.getElementById('fecha_analisis').value;
        var codigo_interno = document.getElementById('codigo_interno').value;
        var varidad = document.getElementById('varidad').value;
        
        var cosecha = document.getElementById('cosecha').value;
        
        if (document.getElementById('analisis_de_pergamino').checked){
            var analisis_de_pergamino = document.getElementById('analisis_de_pergamino').value;
        }else{
            var analisis_de_pergamino = "NULL";
        }
        if (document.getElementById('proceso_organico').checked){
            var proceso_organico = document.getElementById('proceso_organico').value;
        }else{
            var proceso_organico = "NULL";
        }
        if (document.getElementById('proceso_convencional').checked){
            var proceso_convencional = document.getElementById('proceso_convencional').value;
        }else{
            var proceso_convencional = "NULL";
        }


        var peso_pergamino = document.getElementById('peso_pergamino').value;
        var h_pergamino = document.getElementById('h_pergamino').value;

        if (document.getElementById('normal_pergamino').checked){
            var normal_pergamino = document.getElementById('normal_pergamino').value;
        }else{
            var normal_pergamino = "NULL";
        }

        if (document.getElementById('disparejo_pergamino').checked){
            var disparejo_pergamino = document.getElementById('disparejo_pergamino').value;
        }else{
            var disparejo_pergamino = "NULL";
        }
        if (document.getElementById('manchado_pergamino').checked){
            var manchado_pergamino = document.getElementById('manchado_pergamino').value;
        }else{
            var manchado_pergamino = "NULL";
        }
        if (document.getElementById('negruzco_pergamino').checked){
            var negruzco_pergamino = document.getElementById('negruzco_pergamino').value;
        }else{
            var negruzco_pergamino = "NULL";
        }
        if (document.getElementById('otros_pergamino').checked){
            var otros_pergamino = document.getElementById('otros_pergamino').value;
        }else{
            var otros_pergamino = "NULL";
        }
        if (document.getElementById('fresco_pergamino').checked){
            var fresco_pergamino = document.getElementById('fresco_pergamino').value;
        }else{
            var fresco_pergamino = "NULL";
        }
        if (document.getElementById('viejo_pergamino').checked){
            var viejo_pergamino = document.getElementById('viejo_pergamino').value;
        }else{
            var viejo_pergamino = "NULL";
        }
        if (document.getElementById('fermento_pergamino').checked){
            var fermento_pergamino = document.getElementById('fermento_pergamino').value;
        }else{
            var fermento_pergamino = "NULL";
        }
        if (document.getElementById('terroso_pergamino').checked){
            var terroso_pergamino = document.getElementById('terroso_pergamino').value;
        }else{
            var terroso_pergamino = "NULL";
        }
        if (document.getElementById('hierbas_pergamino').checked){
            var hierbas_pergamino = document.getElementById('hierbas_pergamino').value;
        }else{
            var hierbas_pergamino = "NULL";
        }
        if (document.getElementById('moho_pergamino').checked){
            var moho_pergamino = document.getElementById('moho_pergamino').value;
        }else{
            var moho_pergamino = "NULL";
        }
        
        
        var peso_oro = document.getElementById('peso_oro').value;
        var h_oro = document.getElementById('h_oro').value;

        if (document.getElementById('normal_oro').checked){
            var normal_oro = document.getElementById('normal_oro').value;
        }else{
            var normal_oro = "NULL";
        }
        if (document.getElementById('blanqueado_oro').checked){
            var blanqueado_oro = document.getElementById('blanqueado_oro').value;
        }else{
            var blanqueado_oro = "NULL";
        }
        if (document.getElementById('disparejo_oro').checked){
            var disparejo_oro = document.getElementById('disparejo_oro').value;
        }else{
            var disparejo_oro = "NULL";
        }
        if (document.getElementById('amarillo_oro').checked){
            var amarillo_oro = document.getElementById('amarillo_oro').value;
        }else{
            var amarillo_oro = "NULL";
        }
        if (document.getElementById('traslucido_oro').checked){
            var traslucido_oro = document.getElementById('traslucido_oro').value;
        }else{
            var traslucido_oro = "NULL";
        }
        if (document.getElementById('azulado_oro').checked){
            var azulado_oro = document.getElementById('azulado_oro').value;
        }else{
            var azulado_oro = "NULL";
        }

        if (document.getElementById('fresco_oro').checked){
            var fresco_oro = document.getElementById('fresco_oro').value;
        }else{
            var fresco_oro = "NULL";
        }
        if (document.getElementById('viejo_oro').checked){
            var viejo_oro = document.getElementById('viejo_oro').value;
        }else{
            var viejo_oro = "NULL";
        }
        if (document.getElementById('fermento_oro').checked){
            var fermento_oro = document.getElementById('fermento_oro').value;
        }else{
            var fermento_oro = "NULL";
        }
        if (document.getElementById('terroso_oro').checked){
            var terroso_oro = document.getElementById('terroso_oro').value;
        }else{
            var terroso_oro = "NULL";
        }
        if (document.getElementById('hierbas_oro').checked){
            var hierbas_oro = document.getElementById('hierbas_oro').value;
        }else{
            var hierbas_oro = "NULL";
        }
        if (document.getElementById('moho_oro').checked){
            var moho_oro = document.getElementById('moho_oro').value;
        }else{
            var moho_oro = "NULL";
        }
        
        var observaciones = document.getElementById('observaciones').value;
        var peso_cascarilla = document.getElementById('peso_cascarilla').value;
        var porcentaje_cascarilla = document.getElementById('porcentaje_cascarilla').value;
        var peso1_granulometria = document.getElementById('peso1_granulometria').value;
        var peso2_granulometria = document.getElementById('peso2_granulometria').value;
        var peso3_granulometria = document.getElementById('peso3_granulometria').value;
        var peso4_granulometria = document.getElementById('peso4_granulometria').value;
        var peso5_granulometria = document.getElementById('peso5_granulometria').value;
        var peso6_granulometria = document.getElementById('peso6_granulometria').value;
        var peso7_granulometria = document.getElementById('peso7_granulometria').value;
        var peso_total_granulometria = document.getElementById('peso_total_granulometria').value;
        var porcentaje1_granulometria = document.getElementById('porcentaje1_granulometria').value;
        var porcentaje2_granulometria = document.getElementById('porcentaje2_granulometria').value;
        var porcentaje3_granulometria = document.getElementById('porcentaje3_granulometria').value;
        var porcentaje4_granulometria = document.getElementById('porcentaje4_granulometria').value;
        var porcentaje5_granulometria = document.getElementById('porcentaje5_granulometria').value;
        var porcentaje6_granulometria = document.getElementById('porcentaje6_granulometria').value;
        var porcentaje7_granulometria = document.getElementById('porcentaje7_granulometria').value;
        var porcentaje_total_granulometria = document.getElementById('porcentaje_total_granulometria').value;
        var grano1_muestra = document.getElementById('grano1_muestra').value;
        var grano2_muestra = document.getElementById('grano2_muestra').value;
        var grano3_muestra = document.getElementById('grano3_muestra').value;
        var grano4_muestra = document.getElementById('grano4_muestra').value;
        var grano5_muestra = document.getElementById('grano5_muestra').value;
        var grano6_muestra = document.getElementById('grano6_muestra').value;
        var grano7_muestra = document.getElementById('grano7_muestra').value;
        var grano8_muestra = document.getElementById('grano8_muestra').value;
        var grano9_muestra = document.getElementById('grano9_muestra').value;
        var grano10_muestra = document.getElementById('grano10_muestra').value;
        var grano11_muestra = document.getElementById('grano11_muestra').value;
        var grano12_muestra = document.getElementById('grano12_muestra').value;
        var grano13_muestra = document.getElementById('grano13_muestra').value;
        var grano14_muestra = document.getElementById('grano14_muestra').value;
        var grano15_muestra = document.getElementById('grano15_muestra').value;
        var grano16_muestra = document.getElementById('grano16_muestra').value;
        var defecto1_muestra = document.getElementById('defecto1_muestra').value;
        var defecto2_muestra = document.getElementById('defecto2_muestra').value;
        var defecto3_muestra = document.getElementById('defecto3_muestra').value;
        var defecto4_muestra = document.getElementById('defecto4_muestra').value;
        var defecto5_muestra = document.getElementById('defecto5_muestra').value;
        var defecto6_muestra = document.getElementById('defecto6_muestra').value;
        var defecto7_muestra = document.getElementById('defecto7_muestra').value;
        var defecto8_muestra = document.getElementById('defecto8_muestra').value;
        var defecto9_muestra = document.getElementById('defecto9_muestra').value;
        var defecto10_muestra = document.getElementById('defecto10_muestra').value;
        var defecto11_muestra = document.getElementById('defecto11_muestra').value;
        var defecto12_muestra = document.getElementById('defecto12_muestra').value;
        var defecto13_muestra = document.getElementById('defecto13_muestra').value;
        var defecto14_muestra = document.getElementById('defecto14_muestra').value;
        var defecto15_muestra = document.getElementById('defecto15_muestra').value;
        var defecto16_muestra = document.getElementById('defecto16_muestra').value;
        var suma_total_defectos = document.getElementById('suma_total_defectos').value;
        var peso_defectos_total = document.getElementById('peso_defectos_total').value;
        var porcentaje_defectos = document.getElementById('porcentaje_defectos').value;
        var rendimiento_exportable = document.getElementById('rendimiento_exportable').value;
        var idcliente= document.getElementById('idcliente').value;
        var correlativo= document.getElementById('correlativo').value;

        

        var accion = "Newad";

        
        
       
        // var dataen =        
        //           'fecha_recepcion=' +fecha_recepcion+
        //           '&fecha_analisis=' +fecha_analisis+
        //           '&codigo_interno=' +codigo_interno+
        //           '&varidad=' +varidad+

        //           '&cosecha=' +cosecha+
                  
        //           '&analisis_de_pergamino=' +analisis_de_pergamino+
        //           '&proceso_organico=' +proceso_organico+
        //           '&proceso_convencional=' +proceso_convencional+

        //           '&peso_pergamino=' +peso_pergamino+
        //           '&h_pergamino=' +h_pergamino+
        //           '&normal_pergamino=' +normal_pergamino+
        //           '&disparejo_pergamino=' +disparejo_pergamino+
        //           '&manchado_pergamino=' +manchado_pergamino+
        //           '&negruzco_pergamino=' +negruzco_pergamino+
        //           '&otros_pergamino=' +otros_pergamino+
        //           '&fresco_pergamino=' +fresco_pergamino+
        //           '&viejo_pergamino=' +viejo_pergamino+
        //           '&fermento_pergamino=' +fermento_pergamino+
        //           '&terroso_pergamino=' +terroso_pergamino+
        //           '&hierbas_pergamino=' +hierbas_pergamino+
        //           '&moho_pergamino=' +moho_pergamino+
        //           '&peso_oro=' +peso_oro+
        //           '&h_oro=' +h_oro+
        //           '&normal_oro=' +normal_oro+
        //           '&blanqueado_oro=' +blanqueado_oro+
        //           '&disparejo_oro=' +disparejo_oro+
        //           '&amarillo_oro=' +amarillo_oro+
        //           '&traslucido_oro=' +traslucido_oro+
        //           '&azulado_oro=' +azulado_oro+
        //           '&fresco_oro=' +fresco_oro+
        //           '&viejo_oro=' +viejo_oro+
        //           '&fermento_oro=' +fermento_oro+
        //           '&terroso_oro=' +terroso_oro+
        //           '&hierbas_oro=' +hierbas_oro+
        //           '&moho_oro=' +moho_oro+
        //           '&observaciones=' +observaciones+
        //           '&peso_cascarilla=' +peso_cascarilla+
        //           '&porcentaje_cascarilla=' +porcentaje_cascarilla+
        //           '&peso1_granulometria=' +peso1_granulometria+
        //           '&peso2_granulometria=' +peso2_granulometria+
        //           '&peso3_granulometria=' +peso3_granulometria+
        //           '&peso4_granulometria=' +peso4_granulometria+
        //           '&peso5_granulometria=' +peso5_granulometria+
        //           '&peso6_granulometria=' +peso6_granulometria+
        //           '&peso7_granulometria=' +peso7_granulometria+
        //           '&peso_total_granulometria=' +peso_total_granulometria+
        //           '&porcentaje1_granulometria=' +porcentaje1_granulometria+
        //           '&porcentaje2_granulometria=' +porcentaje2_granulometria+
        //           '&porcentaje3_granulometria=' +porcentaje3_granulometria+
        //           '&porcentaje4_granulometria=' +porcentaje4_granulometria+
        //           '&porcentaje5_granulometria=' +porcentaje5_granulometria+
        //           '&porcentaje6_granulometria=' +porcentaje6_granulometria+
        //           '&porcentaje7_granulometria=' +porcentaje7_granulometria+
        //           '&porcentaje_total_granulometria=' +porcentaje_total_granulometria+
        //           '&grano1_muestra=' +grano1_muestra+
        //           '&grano2_muestra=' +grano2_muestra+
        //           '&grano3_muestra=' +grano3_muestra+
        //           '&grano4_muestra=' +grano4_muestra+
        //           '&grano5_muestra=' +grano5_muestra+
        //           '&grano6_muestra=' +grano6_muestra+
        //           '&grano7_muestra=' +grano7_muestra+
        //           '&grano8_muestra=' +grano8_muestra+
        //           '&grano9_muestra=' +grano9_muestra+
        //           '&grano10_muestra=' +grano10_muestra+
        //           '&grano11_muestra=' +grano11_muestra+
        //           '&grano12_muestra=' +grano12_muestra+
        //           '&grano13_muestra=' +grano13_muestra+
        //           '&grano14_muestra=' +grano14_muestra+
        //           '&grano15_muestra=' +grano15_muestra+
        //           '&grano16_muestra=' +grano16_muestra+
        //           '&defecto1_muestra=' +defecto1_muestra+
        //           '&defecto2_muestra=' +defecto2_muestra+
        //           '&defecto3_muestra=' +defecto3_muestra+
        //           '&defecto4_muestra=' +defecto4_muestra+
        //           '&defecto5_muestra=' +defecto5_muestra+
        //           '&defecto6_muestra=' +defecto6_muestra+
        //           '&defecto7_muestra=' +defecto7_muestra+
        //           '&defecto8_muestra=' +defecto8_muestra+
        //           '&defecto9_muestra=' +defecto9_muestra+
        //           '&defecto10_muestra=' +defecto10_muestra+
        //           '&defecto11_muestra=' +defecto11_muestra+
        //           '&defecto12_muestra=' +defecto12_muestra+
        //           '&defecto13_muestra=' +defecto13_muestra+
        //           '&defecto14_muestra=' +defecto14_muestra+
        //           '&defecto15_muestra=' +defecto15_muestra+
        //           '&defecto16_muestra=' +defecto16_muestra+
        //           '&suma_total_defectos=' +suma_total_defectos+
        //           '&peso_defectos_total=' +peso_defectos_total+
        //           '&porcentaje_defectos=' +porcentaje_defectos+
        //           '&rendimiento_exportable=' +rendimiento_exportable+
        //           '&idcliente=' +idcliente+
        //           '&correlativo=' +correlativo+
                  
        //           '&accion=' +accion;

        var dataen =        
                  {fecha_recepcion:fecha_recepcion,
                  fecha_analisis:fecha_analisis,
                  codigo_interno:codigo_interno,
                  varidad:varidad,
                  cosecha:cosecha,                  
                  analisis_de_pergamino:analisis_de_pergamino,
                  proceso_organico:proceso_organico,
                  proceso_convencional:proceso_convencional,
                  peso_pergamino:peso_pergamino,
                  h_pergamino:h_pergamino,
                  normal_pergamino:normal_pergamino,
                  disparejo_pergamino:disparejo_pergamino,
                  manchado_pergamino:manchado_pergamino,
                  negruzco_pergamino:negruzco_pergamino,
                  otros_pergamino:otros_pergamino,
                  fresco_pergamino:fresco_pergamino,
                  viejo_pergamino:viejo_pergamino,
                  fermento_pergamino:fermento_pergamino,
                  terroso_pergamino:terroso_pergamino,
                  hierbas_pergamino:hierbas_pergamino,
                  moho_pergamino:moho_pergamino,
                  peso_oro:peso_oro,
                  h_oro:h_oro,
                  normal_oro:normal_oro,
                  blanqueado_oro:blanqueado_oro,
                  disparejo_oro:disparejo_oro,
                  amarillo_oro:amarillo_oro,
                  traslucido_oro:traslucido_oro,
                  azulado_oro:azulado_oro,
                  fresco_oro:fresco_oro,
                  viejo_oro:viejo_oro,
                  fermento_oro:fermento_oro,
                  terroso_oro:terroso_oro,
                  hierbas_oro:hierbas_oro,
                  moho_oro:moho_oro,
                  observaciones:observaciones,
                  peso_cascarilla:peso_cascarilla,
                  porcentaje_cascarilla:porcentaje_cascarilla,
                  peso1_granulometria:peso1_granulometria,
                  peso2_granulometria:peso2_granulometria,
                  peso3_granulometria:peso3_granulometria,
                  peso4_granulometria:peso4_granulometria,
                  peso5_granulometria:peso5_granulometria,
                  peso6_granulometria:peso6_granulometria,
                  peso7_granulometria:peso7_granulometria,
                  peso_total_granulometria:peso_total_granulometria,
                  porcentaje1_granulometria:porcentaje1_granulometria,
                  porcentaje2_granulometria:porcentaje2_granulometria,
                  porcentaje3_granulometria:porcentaje3_granulometria,
                  porcentaje4_granulometria:porcentaje4_granulometria,
                  porcentaje5_granulometria:porcentaje5_granulometria,
                  porcentaje6_granulometria:porcentaje6_granulometria,
                  porcentaje7_granulometria:porcentaje7_granulometria,
                  porcentaje_total_granulometria:porcentaje_total_granulometria,
                  grano1_muestra:grano1_muestra,
                  grano2_muestra:grano2_muestra,
                  grano3_muestra:grano3_muestra,
                  grano4_muestra:grano4_muestra,
                  grano5_muestra:grano5_muestra,
                  grano6_muestra:grano6_muestra,
                  grano7_muestra:grano7_muestra,
                  grano8_muestra:grano8_muestra,
                  grano9_muestra:grano9_muestra,
                  grano10_muestra:grano10_muestra,
                  grano11_muestra:grano11_muestra,
                  grano12_muestra:grano12_muestra,
                  grano13_muestra:grano13_muestra,
                  grano14_muestra:grano14_muestra,
                  grano15_muestra:grano15_muestra,
                  grano16_muestra:grano16_muestra,
                  defecto1_muestra:defecto1_muestra,
                  defecto2_muestra:defecto2_muestra,
                  defecto3_muestra:defecto3_muestra,
                  defecto4_muestra:defecto4_muestra,
                  defecto5_muestra:defecto5_muestra,
                  defecto6_muestra:defecto6_muestra,
                  defecto7_muestra:defecto7_muestra,
                  defecto8_muestra:defecto8_muestra,
                  defecto9_muestra:defecto9_muestra,
                  defecto10_muestra:defecto10_muestra,
                  defecto11_muestra:defecto11_muestra,
                  defecto12_muestra:defecto12_muestra,
                  defecto13_muestra:defecto13_muestra,
                  defecto14_muestra:defecto14_muestra,
                  defecto15_muestra:defecto15_muestra,
                  defecto16_muestra:defecto16_muestra,
                  suma_total_defectos:suma_total_defectos,
                  peso_defectos_total:peso_defectos_total,
                  porcentaje_defectos:porcentaje_defectos,
                  rendimiento_exportable:rendimiento_exportable,
                  idcliente:idcliente,
                  correlativo:correlativo,                  
                  accion:accion};


        $.ajax({
            type: 'post',
            url: 'modelos/anal_fisico.modelo.php',
            data:dataen,
            success:function(resp){
                //$("#request_idOjo").html(resp);
                if(resp==1){
                    swal({
                    title: "Exito!",
                    text: "Registro Guardado Correctamente!",
                    icon: "success",
                    button: "Aceptar!",
                    });
                    setTimeout(() => {
                            
                        location.href ='laboratorio';
                        
                    }, 1000);
                }
                                
            }
        });
        return false;
    }
    //PROBANDO - SELECT PARA ASOC./COOP
    function getselect(){
        var idGetValor= document.getElementById('idcliente').value;

        var accion='consulta_asoc';

        var dataen =
        'idGetValor=' +idGetValor+
        '&accion='+accion;

        $.ajax({
                type: 'post',
                url: 'modelos/anal_fisico.modelo.php',
                data:dataen,
                success:function(resp){
                    //$("#newContenido").html(resp);
                    document.getElementById('asoc_coop').value = resp;
                    
                }
        });
        return false;
    }

    //PROBANDO - SELECT PARA UBICACION
    function getselect2(){
        var idGetValor= document.getElementById('idcliente').value;

        var accion='consulta_ubicacion';

        var dataen =
        'idGetValor=' +idGetValor+
        '&accion='+accion;

        $.ajax({
                type: 'post',
                url: 'modelos/anal_fisico.modelo.php',
                data:dataen,
                success:function(resp){
                    //$("#newContenido").html(resp);
                    document.getElementById('ubicacion').value = resp;
                    
                }
        });
        return false;
    }
    
    /*UPDATE*/
    function updatad(idGetValor){
        var idGetValor= idGetValor;
        
        var accion='updatad';

        var dataen =
        'idGetValor=' +idGetValor+
        '&accion='+accion;

        $.ajax({
                type: 'post',
                url: 'modelos/anal_fisico.modelo.php',
                data:dataen,
                success:function(resp){
                    $("#newContenido").html(resp);
                
                    
                }
        });
        return false;
        
    }

    function updatadinsert(idGetValor){
        var idGetValor= idGetValor;

                
        var fecha_recepcion = document.getElementById('fecha_recepcion').value;
        var fecha_analisis = document.getElementById('fecha_analisis').value;
        var codigo_interno = document.getElementById('codigo_interno').value;
        var varidad = document.getElementById('varidad').value;
        var idcliente = document.getElementById('idcliente').value;
        
        var cosecha = document.getElementById('cosecha').value;

        if (document.getElementById('analisis_de_pergamino').checked){
            var analisis_de_pergamino = document.getElementById('analisis_de_pergamino').value;
        }else{
            var analisis_de_pergamino = "NULL";
        }
        if (document.getElementById('proceso_organico').checked){
            var proceso_organico = document.getElementById('proceso_organico').value;
        }else{
            var proceso_organico = "NULL";
        }
        if (document.getElementById('proceso_convencional').checked){
            var proceso_convencional = document.getElementById('proceso_convencional').value;
        }else{
            var proceso_convencional = "NULL";
        }


        var peso_pergamino = document.getElementById('peso_pergamino').value;
        var h_pergamino = document.getElementById('h_pergamino').value;

        if (document.getElementById('normal_pergamino').checked){
            var normal_pergamino = document.getElementById('normal_pergamino').value;
        }else{
            var normal_pergamino = "NULL";
        }

        if (document.getElementById('disparejo_pergamino').checked){
            var disparejo_pergamino = document.getElementById('disparejo_pergamino').value;
        }else{
            var disparejo_pergamino = "NULL";
        }
        if (document.getElementById('manchado_pergamino').checked){
            var manchado_pergamino = document.getElementById('manchado_pergamino').value;
        }else{
            var manchado_pergamino = "NULL";
        }
        if (document.getElementById('negruzco_pergamino').checked){
            var negruzco_pergamino = document.getElementById('negruzco_pergamino').value;
        }else{
            var negruzco_pergamino = "NULL";
        }
        if (document.getElementById('otros_pergamino').checked){
            var otros_pergamino = document.getElementById('otros_pergamino').value;
        }else{
            var otros_pergamino = "NULL";
        }
        if (document.getElementById('fresco_pergamino').checked){
            var fresco_pergamino = document.getElementById('fresco_pergamino').value;
        }else{
            var fresco_pergamino = "NULL";
        }
        if (document.getElementById('viejo_pergamino').checked){
            var viejo_pergamino = document.getElementById('viejo_pergamino').value;
        }else{
            var viejo_pergamino = "NULL";
        }
        if (document.getElementById('fermento_pergamino').checked){
            var fermento_pergamino = document.getElementById('fermento_pergamino').value;
        }else{
            var fermento_pergamino = "NULL";
        }
        if (document.getElementById('terroso_pergamino').checked){
            var terroso_pergamino = document.getElementById('terroso_pergamino').value;
        }else{
            var terroso_pergamino = "NULL";
        }
        if (document.getElementById('hierbas_pergamino').checked){
            var hierbas_pergamino = document.getElementById('hierbas_pergamino').value;
        }else{
            var hierbas_pergamino = "NULL";
        }
        if (document.getElementById('moho_pergamino').checked){
            var moho_pergamino = document.getElementById('moho_pergamino').value;
        }else{
            var moho_pergamino = "NULL";
        }
        
        
        var peso_oro = document.getElementById('peso_oro').value;
        var h_oro = document.getElementById('h_oro').value;

        if (document.getElementById('normal_oro').checked){
            var normal_oro = document.getElementById('normal_oro').value;
        }else{
            var normal_oro = "NULL";
        }
        if (document.getElementById('blanqueado_oro').checked){
            var blanqueado_oro = document.getElementById('blanqueado_oro').value;
        }else{
            var blanqueado_oro = "NULL";
        }
        if (document.getElementById('disparejo_oro').checked){
            var disparejo_oro = document.getElementById('disparejo_oro').value;
        }else{
            var disparejo_oro = "NULL";
        }
        if (document.getElementById('amarillo_oro').checked){
            var amarillo_oro = document.getElementById('amarillo_oro').value;
        }else{
            var amarillo_oro = "NULL";
        }
        if (document.getElementById('traslucido_oro').checked){
            var traslucido_oro = document.getElementById('traslucido_oro').value;
        }else{
            var traslucido_oro = "NULL";
        }
        if (document.getElementById('azulado_oro').checked){
            var azulado_oro = document.getElementById('azulado_oro').value;
        }else{
            var azulado_oro = "NULL";
        }

        if (document.getElementById('fresco_oro').checked){
            var fresco_oro = document.getElementById('fresco_oro').value;
        }else{
            var fresco_oro = "NULL";
        }
        if (document.getElementById('viejo_oro').checked){
            var viejo_oro = document.getElementById('viejo_oro').value;
        }else{
            var viejo_oro = "NULL";
        }
        if (document.getElementById('fermento_oro').checked){
            var fermento_oro = document.getElementById('fermento_oro').value;
        }else{
            var fermento_oro = "NULL";
        }
        if (document.getElementById('terroso_oro').checked){
            var terroso_oro = document.getElementById('terroso_oro').value;
        }else{
            var terroso_oro = "NULL";
        }
        if (document.getElementById('hierbas_oro').checked){
            var hierbas_oro = document.getElementById('hierbas_oro').value;
        }else{
            var hierbas_oro = "NULL";
        }
        if (document.getElementById('moho_oro').checked){
            var moho_oro = document.getElementById('moho_oro').value;
        }else{
            var moho_oro = "NULL";
        }
        
        var observaciones = document.getElementById('observaciones').value;
        var peso_cascarilla = document.getElementById('peso_cascarilla').value;
        var porcentaje_cascarilla = document.getElementById('porcentaje_cascarilla').value;
        var peso1_granulometria = document.getElementById('peso1_granulometria').value;
        var peso2_granulometria = document.getElementById('peso2_granulometria').value;
        var peso3_granulometria = document.getElementById('peso3_granulometria').value;
        var peso4_granulometria = document.getElementById('peso4_granulometria').value;
        var peso5_granulometria = document.getElementById('peso5_granulometria').value;
        var peso6_granulometria = document.getElementById('peso6_granulometria').value;
        var peso7_granulometria = document.getElementById('peso7_granulometria').value;
        var peso_total_granulometria = document.getElementById('peso_total_granulometria').value;
        var porcentaje1_granulometria = document.getElementById('porcentaje1_granulometria').value;
        var porcentaje2_granulometria = document.getElementById('porcentaje2_granulometria').value;
        var porcentaje3_granulometria = document.getElementById('porcentaje3_granulometria').value;
        var porcentaje4_granulometria = document.getElementById('porcentaje4_granulometria').value;
        var porcentaje5_granulometria = document.getElementById('porcentaje5_granulometria').value;
        var porcentaje6_granulometria = document.getElementById('porcentaje6_granulometria').value;
        var porcentaje7_granulometria = document.getElementById('porcentaje7_granulometria').value;
        var porcentaje_total_granulometria = document.getElementById('porcentaje_total_granulometria').value;
        var grano1_muestra = document.getElementById('grano1_muestra').value;
        var grano2_muestra = document.getElementById('grano2_muestra').value;
        var grano3_muestra = document.getElementById('grano3_muestra').value;
        var grano4_muestra = document.getElementById('grano4_muestra').value;
        var grano5_muestra = document.getElementById('grano5_muestra').value;
        var grano6_muestra = document.getElementById('grano6_muestra').value;
        var grano7_muestra = document.getElementById('grano7_muestra').value;
        var grano8_muestra = document.getElementById('grano8_muestra').value;
        var grano9_muestra = document.getElementById('grano9_muestra').value;
        var grano10_muestra = document.getElementById('grano10_muestra').value;
        var grano11_muestra = document.getElementById('grano11_muestra').value;
        var grano12_muestra = document.getElementById('grano12_muestra').value;
        var grano13_muestra = document.getElementById('grano13_muestra').value;
        var grano14_muestra = document.getElementById('grano14_muestra').value;
        var grano15_muestra = document.getElementById('grano15_muestra').value;
        var grano16_muestra = document.getElementById('grano16_muestra').value;
        var defecto1_muestra = document.getElementById('defecto1_muestra').value;
        var defecto2_muestra = document.getElementById('defecto2_muestra').value;
        var defecto3_muestra = document.getElementById('defecto3_muestra').value;
        var defecto4_muestra = document.getElementById('defecto4_muestra').value;
        var defecto5_muestra = document.getElementById('defecto5_muestra').value;
        var defecto6_muestra = document.getElementById('defecto6_muestra').value;
        var defecto7_muestra = document.getElementById('defecto7_muestra').value;
        var defecto8_muestra = document.getElementById('defecto8_muestra').value;
        var defecto9_muestra = document.getElementById('defecto9_muestra').value;
        var defecto10_muestra = document.getElementById('defecto10_muestra').value;
        var defecto11_muestra = document.getElementById('defecto11_muestra').value;
        var defecto12_muestra = document.getElementById('defecto12_muestra').value;
        var defecto13_muestra = document.getElementById('defecto13_muestra').value;
        var defecto14_muestra = document.getElementById('defecto14_muestra').value;
        var defecto15_muestra = document.getElementById('defecto15_muestra').value;
        var defecto16_muestra = document.getElementById('defecto16_muestra').value;
        var suma_total_defectos = document.getElementById('suma_total_defectos').value;
        var peso_defectos_total = document.getElementById('peso_defectos_total').value;
        var porcentaje_defectos = document.getElementById('porcentaje_defectos').value;
        var rendimiento_exportable = document.getElementById('rendimiento_exportable').value;

        

        var accion='updatadinsert';

        
        
       
        // var dataen =
        //           'idGetValor=' +idGetValor+        
        //           '&fecha_recepcion=' +fecha_recepcion+
        //           '&fecha_analisis=' +fecha_analisis+
        //           '&codigo_interno=' +codigo_interno+
        //           '&varidad=' +varidad+
        //           '&idcliente=' +idcliente+

        //           '&cosecha=' +cosecha+

        //           '&analisis_de_pergamino=' +analisis_de_pergamino+
        //           '&proceso_organico=' +proceso_organico+
        //           '&proceso_convencional=' +proceso_convencional+

        //           '&peso_pergamino=' +peso_pergamino+
        //           '&h_pergamino=' +h_pergamino+
        //           '&normal_pergamino=' +normal_pergamino+
        //           '&disparejo_pergamino=' +disparejo_pergamino+
        //           '&manchado_pergamino=' +manchado_pergamino+
        //           '&negruzco_pergamino=' +negruzco_pergamino+
        //           '&otros_pergamino=' +otros_pergamino+
        //           '&fresco_pergamino=' +fresco_pergamino+
        //           '&viejo_pergamino=' +viejo_pergamino+
        //           '&fermento_pergamino=' +fermento_pergamino+
        //           '&terroso_pergamino=' +terroso_pergamino+
        //           '&hierbas_pergamino=' +hierbas_pergamino+
        //           '&moho_pergamino=' +moho_pergamino+
        //           '&peso_oro=' +peso_oro+
        //           '&h_oro=' +h_oro+
        //           '&normal_oro=' +normal_oro+
        //           '&blanqueado_oro=' +blanqueado_oro+
        //           '&disparejo_oro=' +disparejo_oro+
        //           '&amarillo_oro=' +amarillo_oro+
        //           '&traslucido_oro=' +traslucido_oro+
        //           '&azulado_oro=' +azulado_oro+
        //           '&fresco_oro=' +fresco_oro+
        //           '&viejo_oro=' +viejo_oro+
        //           '&fermento_oro=' +fermento_oro+
        //           '&terroso_oro=' +terroso_oro+
        //           '&hierbas_oro=' +hierbas_oro+
        //           '&moho_oro=' +moho_oro+
        //           '&observaciones=' +observaciones+
        //           '&peso_cascarilla=' +peso_cascarilla+
        //           '&porcentaje_cascarilla=' +porcentaje_cascarilla+
        //           '&peso1_granulometria=' +peso1_granulometria+
        //           '&peso2_granulometria=' +peso2_granulometria+
        //           '&peso3_granulometria=' +peso3_granulometria+
        //           '&peso4_granulometria=' +peso4_granulometria+
        //           '&peso5_granulometria=' +peso5_granulometria+
        //           '&peso6_granulometria=' +peso6_granulometria+
        //           '&peso7_granulometria=' +peso7_granulometria+
        //           '&peso_total_granulometria=' +peso_total_granulometria+
        //           '&porcentaje1_granulometria=' +porcentaje1_granulometria+
        //           '&porcentaje2_granulometria=' +porcentaje2_granulometria+
        //           '&porcentaje3_granulometria=' +porcentaje3_granulometria+
        //           '&porcentaje4_granulometria=' +porcentaje4_granulometria+
        //           '&porcentaje5_granulometria=' +porcentaje5_granulometria+
        //           '&porcentaje6_granulometria=' +porcentaje6_granulometria+
        //           '&porcentaje7_granulometria=' +porcentaje7_granulometria+
        //           '&porcentaje_total_granulometria=' +porcentaje_total_granulometria+
        //           '&grano1_muestra=' +grano1_muestra+
        //           '&grano2_muestra=' +grano2_muestra+
        //           '&grano3_muestra=' +grano3_muestra+
        //           '&grano4_muestra=' +grano4_muestra+
        //           '&grano5_muestra=' +grano5_muestra+
        //           '&grano6_muestra=' +grano6_muestra+
        //           '&grano7_muestra=' +grano7_muestra+
        //           '&grano8_muestra=' +grano8_muestra+
        //           '&grano9_muestra=' +grano9_muestra+
        //           '&grano10_muestra=' +grano10_muestra+
        //           '&grano11_muestra=' +grano11_muestra+
        //           '&grano12_muestra=' +grano12_muestra+
        //           '&grano13_muestra=' +grano13_muestra+
        //           '&grano14_muestra=' +grano14_muestra+
        //           '&grano15_muestra=' +grano15_muestra+
        //           '&grano16_muestra=' +grano16_muestra+
        //           '&defecto1_muestra=' +defecto1_muestra+
        //           '&defecto2_muestra=' +defecto2_muestra+
        //           '&defecto3_muestra=' +defecto3_muestra+
        //           '&defecto4_muestra=' +defecto4_muestra+
        //           '&defecto5_muestra=' +defecto5_muestra+
        //           '&defecto6_muestra=' +defecto6_muestra+
        //           '&defecto7_muestra=' +defecto7_muestra+
        //           '&defecto8_muestra=' +defecto8_muestra+
        //           '&defecto9_muestra=' +defecto9_muestra+
        //           '&defecto10_muestra=' +defecto10_muestra+
        //           '&defecto11_muestra=' +defecto11_muestra+
        //           '&defecto12_muestra=' +defecto12_muestra+
        //           '&defecto13_muestra=' +defecto13_muestra+
        //           '&defecto14_muestra=' +defecto14_muestra+
        //           '&defecto15_muestra=' +defecto15_muestra+
        //           '&defecto16_muestra=' +defecto16_muestra+
        //           '&suma_total_defectos=' +suma_total_defectos+
        //           '&peso_defectos_total=' +peso_defectos_total+
        //           '&porcentaje_defectos=' +porcentaje_defectos+
        //           '&rendimiento_exportable=' +rendimiento_exportable+                  
        //           '&accion=' +accion;


        var dataen =
                  {idGetValor: idGetValor,
                  fecha_recepcion: fecha_recepcion,
                  fecha_analisis: fecha_analisis,
                  codigo_interno: codigo_interno,
                  varidad: varidad,
                  idcliente: idcliente,
                  cosecha: cosecha,
                  analisis_de_pergamino: analisis_de_pergamino,
                  proceso_organico: proceso_organico,
                  proceso_convencional: proceso_convencional,
                  peso_pergamino: peso_pergamino,
                  h_pergamino: h_pergamino,
                  normal_pergamino: normal_pergamino,
                  disparejo_pergamino: disparejo_pergamino,
                  manchado_pergamino: manchado_pergamino,
                  negruzco_pergamino: negruzco_pergamino,
                  otros_pergamino: otros_pergamino,
                  fresco_pergamino: fresco_pergamino,
                  viejo_pergamino: viejo_pergamino,
                  fermento_pergamino: fermento_pergamino,
                  terroso_pergamino: terroso_pergamino,
                  hierbas_pergamino: hierbas_pergamino,
                  moho_pergamino: moho_pergamino,
                  peso_oro: peso_oro,
                  h_oro: h_oro,
                  normal_oro: normal_oro,
                  blanqueado_oro: blanqueado_oro,
                  disparejo_oro: disparejo_oro,
                  amarillo_oro: amarillo_oro,
                  traslucido_oro: traslucido_oro,
                  azulado_oro: azulado_oro,
                  fresco_oro: fresco_oro,
                  viejo_oro: viejo_oro,
                  fermento_oro: fermento_oro,
                  terroso_oro: terroso_oro,
                  hierbas_oro: hierbas_oro,
                  moho_oro: moho_oro,
                  observaciones: observaciones,
                  peso_cascarilla: peso_cascarilla,
                  porcentaje_cascarilla: porcentaje_cascarilla,
                  peso1_granulometria: peso1_granulometria,
                  peso2_granulometria: peso2_granulometria,
                  peso3_granulometria: peso3_granulometria,
                  peso4_granulometria: peso4_granulometria,
                  peso5_granulometria: peso5_granulometria,
                  peso6_granulometria: peso6_granulometria,
                  peso7_granulometria: peso7_granulometria,
                  peso_total_granulometria: peso_total_granulometria,
                  porcentaje1_granulometria: porcentaje1_granulometria,
                  porcentaje2_granulometria: porcentaje2_granulometria,
                  porcentaje3_granulometria: porcentaje3_granulometria,
                  porcentaje4_granulometria: porcentaje4_granulometria,
                  porcentaje5_granulometria: porcentaje5_granulometria,
                  porcentaje6_granulometria: porcentaje6_granulometria,
                  porcentaje7_granulometria: porcentaje7_granulometria,
                  porcentaje_total_granulometria: porcentaje_total_granulometria,
                  grano1_muestra: grano1_muestra,
                  grano2_muestra: grano2_muestra,
                  grano3_muestra: grano3_muestra,
                  grano4_muestra: grano4_muestra,
                  grano5_muestra: grano5_muestra,
                  grano6_muestra: grano6_muestra,
                  grano7_muestra: grano7_muestra,
                  grano8_muestra: grano8_muestra,
                  grano9_muestra: grano9_muestra,
                  grano10_muestra: grano10_muestra,
                  grano11_muestra: grano11_muestra,
                  grano12_muestra: grano12_muestra,
                  grano13_muestra: grano13_muestra,
                  grano14_muestra: grano14_muestra,
                  grano15_muestra: grano15_muestra,
                  grano16_muestra: grano16_muestra,
                  defecto1_muestra: defecto1_muestra,
                  defecto2_muestra: defecto2_muestra,
                  defecto3_muestra: defecto3_muestra,
                  defecto4_muestra: defecto4_muestra,
                  defecto5_muestra: defecto5_muestra,
                  defecto6_muestra: defecto6_muestra,
                  defecto7_muestra: defecto7_muestra,
                  defecto8_muestra: defecto8_muestra,
                  defecto9_muestra: defecto9_muestra,
                  defecto10_muestra: defecto10_muestra,
                  defecto11_muestra: defecto11_muestra,
                  defecto12_muestra: defecto12_muestra,
                  defecto13_muestra: defecto13_muestra,
                  defecto14_muestra: defecto14_muestra,
                  defecto15_muestra: defecto15_muestra,
                  defecto16_muestra: defecto16_muestra,
                  suma_total_defectos: suma_total_defectos,
                  peso_defectos_total: peso_defectos_total,
                  porcentaje_defectos: porcentaje_defectos,
                  rendimiento_exportable: rendimiento_exportable,
                  accion:accion};


        $.ajax({
                type: 'post',
                url: 'modelos/anal_fisico.modelo.php',
                data:dataen,
                success:function(resp){
                    
                    if(resp==1){
                        
                        swal({
                        title: "Exito!",
                        text: "Se Actualizo Correctamente!",
                        icon: "success",
                        button: "Aceptar!",
                        });
                        
                        
                        setTimeout(() => {
                            
                            location.href ='laboratorio';
                            
                        }, 1000);
                    }

                                   
                }
        });
        return false;
    }

    /*DELET */
    function Deletad(idGetValor){
        var idGetValor= idGetValor;
        var accion ='Deletad';

        var dataen =
            'idGetValor='+idGetValor+
            '&accion='+accion;

        swal({
            title: "Esta seguro de eliminar este registro?",
            text: "Una vez eliminado, no podras recuperar este registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                    type: 'post',
                    url: 'modelos/anal_fisico.modelo.php',
                    data:dataen,
                    success:function(resp){                   
                        if(resp==1){
                            swal("Exito! Registro Eliminado Correctamente!", {
                            icon: "success",
                            });

                            setTimeout(() => {
                                location.href ='laboratorio';
                            }, 1000);
                        }       
                    }
                    });
                    return false;

                } else {
                    swal("Tu registro esta seguro!");
                }
        });
    }

    function generarCodigo(){

        
        var accion='generarCodigo';

        var dataen =
        'accion=' +accion;

        $.ajax({
                type: 'post',
                url: 'modelos/anal_fisico.modelo.php',
                data:dataen,
                success:function(resp){
                   document.getElementById("codigo_interno").value=resp;
                
                    
                }
        });
        return false;
    }

    function mostrarCorrelativo(){

        
        var accion='mostrarCorrelativo';

        var dataen =
        'accion=' +accion;

        $.ajax({
                type: 'post',
                url: 'modelos/anal_fisico.modelo.php',
                data:dataen,
                success:function(resp){
                document.getElementById("correlativo").value=resp;
                
                    
                }
        });
        return false;
    }

</script>