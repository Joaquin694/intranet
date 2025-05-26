<script>


    
    window.onload = function() {
        document.getElementById("fecha_recepcion").focus();
    };



    $(document).ready(function(){
        $(".tablas").on("click", "#create_pdf", function(){

        var codigoVenta = $(this).attr("codigo_pdf");

        window.open("extensiones/tcpdf/pdf/reporte.php?codigo="+codigoVenta,'_blank');

        });

        /*CALCULAR PESO CAFE ORO */
        $("#peso_pergamino").on("keyup", calcular_peso_oro1);
        $("#peso_cascarilla").on("keyup", calcular_peso_oro1);
        function calcular_peso_oro1(){
            var calculo= (parseFloat($('#peso_pergamino').val())-parseFloat($('#peso_cascarilla').val())).toFixed(3);

            $('#peso_oro').val(!isNaN(calculo) ? calculo : '0.000');
        }
        $("#peso1_granulometria").on("keyup", calcular_porcentaje_granulometria);
        $("#peso2_granulometria").on("keyup", calcular_porcentaje_granulometria);
        $("#peso3_granulometria").on("keyup", calcular_porcentaje_granulometria);
        $("#peso4_granulometria").on("keyup", calcular_porcentaje_granulometria);
        $("#peso5_granulometria").on("keyup", calcular_porcentaje_granulometria);
        $("#peso6_granulometria").on("keyup", calcular_porcentaje_granulometria);
        $("#peso7_granulometria").on("keyup", calcular_porcentaje_granulometria);


        function calcular_porcentaje_granulometria(){
            var sumatotal= (parseFloat($('#porcentaje1_granulometria').val())+parseFloat($('#porcentaje2_granulometria').val())+
            parseFloat($('#porcentaje3_granulometria').val())+parseFloat($('#porcentaje4_granulometria').val())+parseFloat($('#porcentaje5_granulometria').val())+
            parseFloat($('#porcentaje6_granulometria').val())+parseFloat($('#porcentaje7_granulometria').val())).toFixed(2);


            $('#porcentaje_total_granulometria').val(sumatotal);
        }

        //DETERMINAR AUTOMATICAMENTE EL VALOR DEL DEFECTO
        $('#grano1_muestra').on('keyup', function(){

            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }

            if($('#grano1_muestra').val()!=0 && $('#grano1_muestra').val()<10 && $('#grano1_muestra').val()!=teclado_especial){
                $('#defecto1_muestra').val(1);
            }else if($('#grano1_muestra').val()!=0 && $('#grano1_muestra').val()>=10 && $('#grano1_muestra').val()!=teclado_especial){
                $('#defecto1_muestra').val(2);
            }else{
                $('#defecto1_muestra').val(0);
            }

        });
        
        $('#grano2_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano2_muestra').val()<10 && $('#grano2_muestra').val()!=teclado_especial){
                $('#defecto2_muestra').val(1);
            }else if($('#grano2_muestra').val()>=10 && $('#grano2_muestra').val()!=teclado_especial){
                $('#defecto2_muestra').val(2);
            }else{
                $('#defecto2_muestra').val(0);
            }

        });
        $('#grano3_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano3_muestra').val()<10 && $('#grano3_muestra').val()!=teclado_especial){
                $('#defecto3_muestra').val(1);
            }else if($('#grano3_muestra').val()>=10 && $('#grano3_muestra').val()!=teclado_especial){
                $('#defecto3_muestra').val(2);
            }else{
                $('#defecto3_muestra').val(0);
            }

        });
        $('#grano4_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano4_muestra').val()<10 && $('#grano4_muestra').val()!=teclado_especial){
                $('#defecto4_muestra').val(1);
            }else if($('#grano4_muestra').val()>=10 && $('#grano4_muestra').val()!=teclado_especial){
                $('#defecto4_muestra').val(2);
            }else{
                $('#defecto4_muestra').val(0);
            }

        });
        $('#grano5_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano5_muestra').val()<10 && $('#grano5_muestra').val()!=teclado_especial){
                $('#defecto5_muestra').val(1);
            }else if($('#grano5_muestra').val()>=10 && $('#grano5_muestra').val()!=teclado_especial){
                $('#defecto5_muestra').val(2);
            }else{
                $('#defecto5_muestra').val(0);
            }

        });
        $('#grano6_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano6_muestra').val()<10 && $('#grano6_muestra').val()!=teclado_especial){
                $('#defecto6_muestra').val(1);
            }else if($('#grano6_muestra').val()>=10 && $('#grano6_muestra').val()!=teclado_especial){
                $('#defecto6_muestra').val(2);
            }else{
                $('#defecto6_muestra').val(0);
            }

        });
        $('#grano7_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano7_muestra').val()<10 && $('#grano7_muestra').val()!=teclado_especial){
                $('#defecto7_muestra').val(1);
            }else if($('#grano7_muestra').val()>=10 && $('#grano7_muestra').val()!=teclado_especial){
                $('#defecto7_muestra').val(2);
            }else{
                $('#defecto7_muestra').val(0);
            }

        });
        $('#grano8_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano8_muestra').val()<10 && $('#grano8_muestra').val()!=teclado_especial){
                $('#defecto8_muestra').val(1);
            }else if($('#grano8_muestra').val()>=10 && $('#grano8_muestra').val()!=teclado_especial){
                $('#defecto8_muestra').val(2);
            }else{
                $('#defecto8_muestra').val(0);
            }

        });
        $('#grano9_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano9_muestra').val()<10 && $('#grano9_muestra').val()!=teclado_especial){
                $('#defecto9_muestra').val(1);
            }else if($('#grano9_muestra').val()>=10 && $('#grano9_muestra').val()!=teclado_especial){
                $('#defecto9_muestra').val(2);
            }else{
                $('#defecto9_muestra').val(0);
            }

        });
        $('#grano10_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano10_muestra').val()<10 && $('#grano10_muestra').val()!=teclado_especial){
                $('#defecto10_muestra').val(1);
            }else if($('#grano10_muestra').val()>=10 && $('#grano10_muestra').val()!=teclado_especial){
                $('#defecto10_muestra').val(2);
            }else{
                $('#defecto10_muestra').val(0);
            }

        });
        $('#grano11_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano11_muestra').val()<10 && $('#grano11_muestra').val()!=teclado_especial){
                $('#defecto11_muestra').val(1);
            }else if($('#grano11_muestra').val()>=10 && $('#grano11_muestra').val()!=teclado_especial){
                $('#defecto11_muestra').val(2);
            }else{
                $('#defecto11_muestra').val(0);
            }

        });
        $('#grano12_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano12_muestra').val()<10 && $('#grano12_muestra').val()!=teclado_especial){
                $('#defecto12_muestra').val(1);
            }else if($('#grano12_muestra').val()>=10 && $('#grano12_muestra').val()!=teclado_especial){
                $('#defecto12_muestra').val(2);
            }else{
                $('#defecto12_muestra').val(0);
            }

        });
        $('#grano13_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano13_muestra').val()<10 && $('#grano13_muestra').val()!=teclado_especial){
                $('#defecto13_muestra').val(1);
            }else if($('#grano13_muestra').val()>=10 && $('#grano13_muestra').val()!=teclado_especial){
                $('#defecto13_muestra').val(2);
            }else{
                $('#defecto13_muestra').val(0);
            }

        });
        $('#grano14_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano14_muestra').val()<10 && $('#grano14_muestra').val()!=teclado_especial){
                $('#defecto14_muestra').val(1);
            }else if($('#grano14_muestra').val()>=10 && $('#grano14_muestra').val()!=teclado_especial){
                $('#defecto14_muestra').val(2);
            }else{
                $('#defecto14_muestra').val(0);
            }

        });
        $('#grano15_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano15_muestra').val()<10 && $('#grano15_muestra').val()!=teclado_especial){
                $('#defecto15_muestra').val(1);
            }else if($('#grano15_muestra').val()>=10 && $('#grano15_muestra').val()!=teclado_especial){
                $('#defecto15_muestra').val(2);
            }else{
                $('#defecto15_muestra').val(0);
            }

        });

        $('#grano16_muestra').on('keyup', function(){
            especiales="8-37-38-46";//Array
            teclado_especial=false;
            //bucle de encontrar un caracter especial
            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;;
                }
            }
            if($('#grano16_muestra').val()<10 && $('#grano16_muestra').val()!=teclado_especial){
                $('#defecto16_muestra').val(1);
            }else if($('#grano16_muestra').val()>=10 && $('#grano16_muestra').val()!=teclado_especial){
                $('#defecto16_muestra').val(2);
            }else{
                $('#defecto16_muestra').val(0);
            }

        });
                

        //CALCULAR SUMA TOTAL DE DEFECTOS
        function suma_total_defectos(){
            var sumatotal= parseFloat($('#defecto1_muestra').val())+parseFloat($('#defecto2_muestra').val())
            +parseFloat($('#defecto3_muestra').val())+parseFloat($('#defecto4_muestra').val())+parseFloat($('#defecto5_muestra').val())
            +parseFloat($('#defecto6_muestra').val())+parseFloat($('#defecto7_muestra').val())+parseFloat($('#defecto8_muestra').val())
            +parseFloat($('#defecto9_muestra').val())+parseFloat($('#defecto10_muestra').val())+parseFloat($('#defecto11_muestra').val())
            +parseFloat($('#defecto12_muestra').val())+parseFloat($('#defecto13_muestra').val())+parseFloat($('#defecto14_muestra').val())
            +parseFloat($('#defecto15_muestra').val())+parseFloat($('#defecto16_muestra').val());
        
            $('#suma_total_defectos').val(sumatotal);
        }
        $("#grano1_muestra").on("keyup", suma_total_defectos);
        $("#grano2_muestra").on("keyup", suma_total_defectos);
        $("#grano3_muestra").on("keyup", suma_total_defectos);
        $("#grano4_muestra").on("keyup", suma_total_defectos);
        $("#grano5_muestra").on("keyup", suma_total_defectos);
        $("#grano6_muestra").on("keyup", suma_total_defectos);
        $("#grano7_muestra").on("keyup", suma_total_defectos);
        $("#grano8_muestra").on("keyup", suma_total_defectos);
        $("#grano9_muestra").on("keyup", suma_total_defectos);
        $("#grano10_muestra").on("keyup", suma_total_defectos);
        $("#grano11_muestra").on("keyup", suma_total_defectos);
        $("#grano12_muestra").on("keyup", suma_total_defectos);
        $("#grano13_muestra").on("keyup", suma_total_defectos);
        $("#grano14_muestra").on("keyup", suma_total_defectos);
        $("#grano15_muestra").on("keyup", suma_total_defectos);
        $("#grano16_muestra").on("keyup", suma_total_defectos);


        /*CALCULOS FINAL */

        $("#peso_defectos_total").on("keyup", calcular_porcentaje_defectos);
        $("#peso_pergamino").on("keyup", calcular_porcentaje_defectos);

        function calcular_porcentaje_defectos(){
            var calculo= ((parseFloat($('#peso_defectos_total').val())*100)/parseFloat($('#peso_pergamino').val())).toFixed(2);

            $('#porcentaje_defectos').val(!isNaN(calculo) ? calculo : '0.00');
            
        }

        /*RENDIMIENTO EXPORTABLE */
        $("#peso_defectos_total").on("keyup", calcular_rendimiento_exportable);
        $("#peso_cascarilla").on("keyup", calcular_rendimiento_exportable);
        $("#peso_pergamino").on("keyup", calcular_rendimiento_exportable);

        function calcular_rendimiento_exportable(){
            var calculo= (100 - parseFloat($('#porcentaje_cascarilla').val()) - parseFloat($('#porcentaje_defectos').val())).toFixed(2);

            $('#rendimiento_exportable').val(!isNaN(calculo) ? calculo: '0.00');
        }

    });



    function calcular_peso_oro(peso_pergamino,peso_cascarilla,peso_oro){

        var pp= document.getElementById(peso_pergamino).value;
        var pc= document.getElementById(peso_cascarilla).value;
        var po= (parseFloat(pp)-parseFloat(pc)).toFixed(3);

        document.getElementById(peso_oro).value = po;
    }

    function calcular_porcentaje_cascarilla(peso_cascarilla,peso_pergamino,porcentaje_cascarilla){

        var pc= document.getElementById(peso_cascarilla).value;
        var pp= document.getElementById(peso_pergamino).value;
        var por_cas= ((parseFloat(pc)/parseFloat(pp))*100).toFixed(2);

        $('#porcentaje_cascarilla').val(!isNaN(por_cas) ? por_cas: '0.00');

    }



    /*VALIDACIÓN Granulometría*/
    function calcular_porcentaje1_granulometria(peso1_granulometria,peso_oro,porcentaje1_granulometria){
        var p1_g= document.getElementById(peso1_granulometria).value;
        var po= document.getElementById(peso_oro).value;
        var p1_g= ((parseFloat(p1_g)*100)/parseFloat(po)).toFixed(2);
        
        document.getElementById(porcentaje1_granulometria).value = p1_g;
    }

    function calcular_porcentaje2_granulometria(peso2_granulometria,peso_oro,porcentaje2_granulometria){
        var p2_g= document.getElementById(peso2_granulometria).value;
        var po= document.getElementById(peso_oro).value;
        var p2_g= ((parseFloat(p2_g)*100)/parseFloat(po)).toFixed(2);
        
        document.getElementById(porcentaje2_granulometria).value = p2_g;
    }

    function calcular_porcentaje3_granulometria(peso3_granulometria,peso_oro,porcentaje3_granulometria){
        var p3_g= document.getElementById(peso3_granulometria).value;
        var po= document.getElementById(peso_oro).value;
        var p3_g= ((parseFloat(p3_g)*100)/parseFloat(po)).toFixed(2);
        
        document.getElementById(porcentaje3_granulometria).value = p3_g;
    }

    function calcular_porcentaje4_granulometria(peso4_granulometria,peso_oro,porcentaje4_granulometria){
        var p4_g= document.getElementById(peso4_granulometria).value;
        var po= document.getElementById(peso_oro).value;
        var p4_g= ((parseFloat(p4_g)*100)/parseFloat(po)).toFixed(2);
        
        document.getElementById(porcentaje4_granulometria).value = p4_g;
    }

    function calcular_porcentaje5_granulometria(peso5_granulometria,peso_oro,porcentaje5_granulometria){
        var p5_g= document.getElementById(peso5_granulometria).value;
        var po= document.getElementById(peso_oro).value;
        var p5_g= ((parseFloat(p5_g)*100)/parseFloat(po)).toFixed(2);
        
        document.getElementById(porcentaje5_granulometria).value = p5_g;
    }

    function calcular_porcentaje6_granulometria(peso6_granulometria,peso_oro,porcentaje6_granulometria){
        var p6_g= document.getElementById(peso6_granulometria).value;
        var po= document.getElementById(peso_oro).value;
        var p6_g= ((parseFloat(p6_g)*100)/parseFloat(po)).toFixed(2);
        
        document.getElementById(porcentaje6_granulometria).value = p6_g;
    }

    function calcular_porcentaje7_granulometria(peso7_granulometria,peso_oro,porcentaje7_granulometria){
        var p7_g= document.getElementById(peso7_granulometria).value;
        var po= document.getElementById(peso_oro).value;
        var p7_g= ((parseFloat(p7_g)*100)/parseFloat(po)).toFixed(2);
        
        document.getElementById(porcentaje7_granulometria).value = p7_g;
    }

    function calcular_peso_total(peso1_granulometria,peso2_granulometria,peso3_granulometria,peso4_granulometria,peso5_granulometria,peso6_granulometria,peso7_granulometria,peso_total_granulometria){
        var p1_g= document.getElementById(peso1_granulometria).value;
        var p2_g= document.getElementById(peso2_granulometria).value;
        var p3_g= document.getElementById(peso3_granulometria).value;
        var p4_g= document.getElementById(peso4_granulometria).value;
        var p5_g= document.getElementById(peso5_granulometria).value;
        var p6_g= document.getElementById(peso6_granulometria).value;
        var p7_g= document.getElementById(peso7_granulometria).value;

        var peso_total= (parseFloat(p1_g)+parseFloat(p2_g)+parseFloat(p3_g)+parseFloat(p4_g)+parseFloat(p5_g)+
        parseFloat(p6_g)+parseFloat(p7_g)).toFixed(3);

        document.getElementById(peso_total_granulometria).value = peso_total;
    }

    function suma_porcentaje_total_granulometria(){
        var sum1 = document.getElementById("porcentaje1_granulometria").value;
        var sum2 = document.getElementById("porcentaje2_granulometria").value;
        var sum3 = document.getElementById("porcentaje3_granulometria").value;
        var sum4 = document.getElementById("porcentaje4_granulometria").value;
        var sum5 = document.getElementById("porcentaje5_granulometria").value;
        var sum6 = document.getElementById("porcentaje6_granulometria").value;
        var sum7 = document.getElementById("porcentaje7_granulometria").value;
        var div = document.getElementById("porcentaje_total_granulometria");

        resultado = (parseFloat(sum1) + parseFloat(sum2) + parseFloat(sum3) +
        parseFloat(sum4) + parseFloat(sum5) + parseFloat(sum6) + parseFloat(sum7)).toFixed(2);
        
        if(document.getElementById("porcentaje_total_granulometria").value==null){
            document.getElementById("porcentaje_total_granulometria").value='0.00';
        }else{
            document.getElementById("porcentaje_total_granulometria").value=resultado;
        }
        
    }

    function soloNumeros(e){
        //Almacenar la entrada del teclado
        key= e.keyCode || e.which;
        //Almacenar lo que haya en la entrada del teclado
        teclado= String.fromCharCode(key);
        //numeros que se permitira ingresar
        numeros="0123456789.";
        //teclas especiales que si queremos que se ejecute
        especiales="8-37-38-46";//Array
        //llave boolean
        teclado_especial=false;
        //bucle de encontrar un caracter especial
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;;
            }
        }
        //Si la tecla que estamos ingresando se encuentra en numeros va ser ingresado,
        //pero si no lo encuentra va ser igual a -1
        //si es un teclado especial no se va ingresar
        if(numeros.indexOf(teclado)==-1 && !teclado_especial){
            return false;
        }

    }
    function soloNumeros2(e){
        //Almacenar la entrada del teclado
        key= e.keyCode || e.which;
        //Almacenar lo que haya en la entrada del teclado
        teclado= String.fromCharCode(key);
        //numeros que se permitira ingresar
        numeros="0123456789";
        //teclas especiales que si queremos que se ejecute
        especiales="8-37-38-46";//Array
        //llave boolean
        teclado_especial=false;
        //bucle de encontrar un caracter especial
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;;
            }
        }
        //Si la tecla que estamos ingresando se encuentra en numeros va ser ingresado,
        //pero si no lo encuentra va ser igual a -1
        //si es un teclado especial no se va ingresar
        if(numeros.indexOf(teclado)==-1 && !teclado_especial){
            return false;
        }

    }

    function AbrirModal(){
        $('#myModal').modal('toggle');
        $('#buttton').hide();
    }



</script>