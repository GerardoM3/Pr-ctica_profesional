<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contribuyente</title>
	<style type="text/css">
	</style>
    
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <script language="javascript" src="assets/js/jquery-3.1.1.min.js"></script>

    <script language="javascript">
        $(document).ready(function(){
            $("#select-departamento").change(function(){

                $("#select-departamento option:selected").each(function () {
                    cod_departamento = $(this).val();
                    $.post("mvc_contribuyente/View/includes/getMunicipio.php", {cod_departamento: cod_departamento}, function(data){
                        $("#select-muni").html(data);
                    });
                });
            })

            
        });
    </script>

    <style type="text/css">
        a[data-desc]{
            position: relative;
            cursor: help;
        }

        a[data-desc]:hover::after,
        a[data-desc]:focus::after{
            content: attr(data-desc);
            position: absolute;
            left: 0;
            top: 30px;
            color: black;
            padding: 10px;
            min-width: 200px;
            border: 1px #aaaaaa solid;
            border-radius: 10px;
            background: lightblue;
            z-index: 1;
        }

        body{
            background-color: gray;
            color: black;
        }
        table{
            color: black;
        }

        /* Sección de contenedor principal */
        .container-main{
            width: 100%;
            height: 110px;
            background-color: #BEBEBE;
            display: inline-grid;
            position: relative;
            text-align: center;
            align-items: center;
        }
        /* Sección de navegación principal */
        .container-nav{
            position: relative;
            margin: 0;
            background-color: transparent;
        }

        /*  */
        .option-block{
            color: black;
            padding: 6px;
            display: inline-block;
            margin:  2px;
            border-radius:8px;
            background-color: #4D8EE7;
            transition-property: background-color, color;
            transition-duration: .4s;
        }
        .option-block:hover{
            color: white;
            text-decoration: none;
            background-color: blue;

        }

        /*
        Apertura de la sección CSS del modal
        */
        .modal{
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .modal-eliminar{
            margin:0;
            padding:0;
            position:absolute;
            top:5%;
            right: 5%;
            width: 35%;
            height: 35%;
            background: #DAD7D7;
            border-radius: 25px;
            box-shadow: 10px 10px 30px 1px black;
        }

        .cabecera-modal, .footer-modal{
            position:absolute;
            width:100%;
        }
        .cabecera-modal{
            color: #FFFFFF;
            margin-top:0;
            padding-top:0;
            top: 0;
            left: 0;
            height:24%;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            background: #FF5454;
        }

        .cuerpo-modal{
            position:absolute;
            top:15%;
            padding:1em;
            display:block;
            align-content: center;
            color:red;
        }
        .footer-modal{
            display: flex;
            align-items: center;
            justify-content: right;
            bottom: 0;
            height: 20%;
            background: #FF5454;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        .boton-eliminar{
            width: 200px;
            height:60px;
        }
        .btn-modal{
            color: black;
            padding: 13px;
            border-radius:27px;
            border: 1px black solid;
            font-size: 20px;
            transition-property: box-shadow;
            transition-duration: 1s;
        }
        a.btn-modal{
            text-decoration: none;
            background: lightgrey;
        }
        a.btn-modal:hover,
        a.btn-modal:focus,
        a.btn-modal:link,
        a.btn-modal:visited,
        a.btn-modal:active{
            background-color: lightgrey;
            color: black;
            text-decoration: none;
        }
        .btn-modal:hover{
            cursor: pointer;
            box-shadow: -1px -1px 5px black;
        }
        /*
        Cierre de la sección CSS del modal
        */


        .enlace-tabla,
        .enlace-tabla:visited{
            color: yellow;
        }
        .enlace-tabla:hover, 
        .enlace-tabla:focus{
            text-decoration: none;
            color: red;
        }
        .enlace-tabla:active{
            color: black;
        }

        p{
            margin: 5px;
            color: white;
        }
        p>b>span, p>span{
            color: red;
        }
        footer>p{
            color: black;
        }
        i>a,
        a{
            color: yellow;
        }

        .searchContri{
            min-width: 60px;
            width: 12%;
            padding: 5px;
            border-radius: 7px;
            border: 3px solid grey;
            border-top: none;
            border-left: none;
            border-right: none;
            background-color: grey;
            transition-property: border-radius width border border-top border-left border-right background-color;
            transition-duration: 0.6s;
        }
        .searchContri:hover{
            cursor: pointer;
        }
        .searchContri::placeholder{
            color: white;
            text-align: center;
            transition-property: color ;
            transition-duration: 0.6s;
        }
        .searchContri:focus::placeholder{
            text-align: initial;
            color: grey;
        }
        .searchContri:focus{
            width: 60%;
            outline: none;
            border-radius: 0;
            border: 3px solid darkblue;
            border-top: none;
            border-left: none;
            border-right: none;
            background-color: transparent;
            cursor: text;
        }
        .table-service>tbody>tr:hover{
            background-color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
        }
        #sin_resultado{
            font-size: 25px;
            font-family: Times New Roman;
            font-weight: 800;
            color: goldenrod;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button{
            -webkit-appearance:none;
        }
</style>


</head>
    <body>
        <div class="container-main">
            <div class="container-nav">
                <a href="index.php?c=Contribuyente" class="option-block">
                    CONTRIBUYENTE
                </a>
        
                <a href="index.php?c=Inmueble" class="option-block">
                    INMUEBLES
                </a>
                <a href="index.php?c=Servicio" class="option-block">
                    SERVICIOS DE ALCALDIA
                </a>
                <a href="index.php?c=Sector" class="option-block">
                    SECTORES / TIPOS / ESTADOS
                </a>
            </div>

            <div>
                <a href="index.php?c=Contribuyente&a=newContribuyente" class="option-block">
                    Nuevo registro de contribuyente
                </a>
            </div>
            
        </div>
        
    <div class="container">