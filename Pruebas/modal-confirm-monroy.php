<?php
$variable = "Este es el dato 1";
$variable2 = "Este es el dato 2";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar eliminaciòn</title>
    <style>
        body{
            margin:0;
            padding:0;
        }
        .header-main{
            margin:0;
            padding:0;
            width: 100%;
            height: 300px;
            background: green;
        }
        .content-main{
            margin:0;
            padding:0;
            width: 100%;
            height: 300px;
            background: orange;
        }
        .footer-main{
            margin:0;
            padding:0;
            width: 100%;
            height: 300px;
            background: red;
        }
        .modal-eliminar{
            margin:0;
            padding:0;
            display: none;
            position:absolute;
            top:5%;
            right: 5%;
            width: 35%;
            height: 35%;
            background: #FF5454;
            border-radius: 25px;
            box-shadow: 10px 10px 30px 1px black;
        }

        .cabecera-modal, .footer-modal{
            position:absolute;
            width:100%;
        }
        .cabecera-modal{
            color: #AA0000;
            margin-top:0;
            padding-top:0;
            top: 0;
            left: 0;
            height:24%;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            background: #DAD7D7;
        }

        .cuerpo-modal{
            position:absolute;
            top:24%;
            padding:1em;
            display:block;
            align-content: center;
            color:white;
        }
        .footer-modal{
            display: flex;
            align-items: center;
            justify-content: right;
            bottom: 0;
            height: 20%;
            background: #DAD7D7;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        .boton-eliminar{
            width: 200px;
            height:60px;
        }
        .btn-modal{
            padding: 13px;
            border-radius:10px;
            border: 1px black solid;
            font-size: 20px;
            transition-property: box-shadow;
            transition-duration: 1s;
        }
        .btn-modal:hover{
            cursor: pointer;
            box-shadow: -1px -1px 5px black;
        }
    </style>
</head>
<body>
    
    <div class="header-main">
        <h1 style="margin:0;padding:0;">Esta es la cabecera principal de la página</h1>
    </div>
    <div class="content-main">
        <p style="margin:0;padding:0;">Dato 1: <?php echo $variable;?></p>
        <button class="boton-eliminar" id="eliminar-dato-content-main1">Eliminar</button>
        <button class="boton-eliminar" id="eliminar-dato-content-main2">Eliminar 2</button>
    </div>
    <div class="footer-main">
        
    </div>

    <div class="modal-eliminar" id="modal-eliminar">
        <div class="cabecera-modal">
            <h2 style="padding: 5px;">Mensaje de eliminación</h2>
        </div>
        <div class="cuerpo-modal">
            <h3>¿Está seguro que desea eliminar los siguientes datos?</h3>
            <p>Dato 1: </p>
        </div>
        <div class="footer-modal">
            <div style="margin-right:15%;">
                <input type="checkbox" name="confirm" id="confirm"><label for="confirm">Confirmar</label>
            </div>
            <button class="btn-modal" type="submit" id="aceptar" style="margin-left: 0;margin-right:3%;" disabled>Aceptar</button>
            <button class="btn-modal" style="margin-left:3%;margin-right:2%;" id="cancelar">Cancelar</button>
        </div>
    </div>

    <script>
        var confirmar = document.getElementById('confirm');

        confirmar.addEventListener('click', ()=>{
            var acept = document.getElementById('aceptar');
            acept.disabled = !acept.disabled
        });
    </script>



    <script>
        var variable = "Soy el dato 1 de JavaScript";
        var variable2 = "Soy el dato 2 de JavaScript";

        var eliminar_dato = document.getElementById('eliminar-dato-content-main2');
        var aceptar_eliminar = document.getElementById('aceptar');
        var cancelar_eliminar = document.getElementById('cancelar');
        var modal_eliminar = document.getElementById('modal-eliminar');

        eliminar_dato.addEventListener('click', ()=>{
            modal_eliminar.style.display = "block";
        });
        cancelar_eliminar.addEventListener('click', ()=>{
            modal_eliminar.style.display = "none";
        });
        aceptar_eliminar.addEventListener('click', ()=>{
            modal_eliminar.style.display = "none";
        });
    </script>
</body>
</html>