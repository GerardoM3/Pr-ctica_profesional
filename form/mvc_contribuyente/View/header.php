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
                    $.post("/getMunicipio.php", {cod_departamento: cod_departamento}, function(data){
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
</style>


</head>
    <body>
        
    <div class="container">