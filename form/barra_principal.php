<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barra de navegación</title>
	<style type="text/css">
		/* Sección de contenedor principal */
		.container-main{
			width: 100%;
			background-color: black;
			float: left;
			display: inline-block;
			position: absolute;
		}
		/* Sección de navegación principal */
		.container-nav{
			margin: 1rem;
			width: 75%;
			background-color: white;
			float: right;
			text-align: center;
		}

		/*  */
		.option-block{
			padding: 6px;
			display: inline-block;
			margin:  2px;
			background-color: white;
			
		}
		.option-block:hover .suboption-block{
			display: block;

		}
		.suboption-block{
			display: none;
		}

		.suboption-block:hover .suboption-block2{
			display: block;
		}

		.suboption-block2{
			display: none;
		}

		.primary-form{
			display: inline-block;
			position: absolute;
		}

		.campo-user{
			border-right: none;
			border-left: none;
			border-top: none;
			border-bottom-color: red;
			background-color: lightblue;
			border-radius: 2px;
		}
		.campo-user:focus{
			outline: none;
			border-color: green;
			background-color: lightgreen;
		}
	</style>
</head>
<body>
    <background-color: lightblue;>
	<div class="container-main">
		<div class="container-nav">
			<div class="option-block">
				CONTRIBUYENTE.


			</div>
    
            <div class="option-block">
				INMUEBLES.
			</div>
			
			<div class="option-block">
				SERVIVIOS DE ALCALDIA.
			</div>
		</div>
		
	</div>
    </background-color>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	
</body>
</html>