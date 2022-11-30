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
			background-color: purple;
			float: left;
			display: inline-block;
			position: absolute;
		}
		/* Sección de navegación principal */
		.container-nav{
			margin: 1rem;
			width: 75%;
			background-color: pink;
			float: right;
			text-align: center;
		}

		/*  */
		.option-block{
			padding: 6px;
			display: inline-block;
			margin:  2px;
			background-color: Pink;
			
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
				CATASTRO

                <label for="dog-names">:</label>
<select name="dog-names" id="dog-names">
    <option value="rigatoni">Generar cuenta</option>
  <option value="dave">Generar numero de propietario</option>
  <option value="pumpernickel">Registro de inmuebles</option>
</select>

			</div>
    
            <div class="option-block">
				CUENTAS CORRIENTES
			</div>
			
			<div class="option-block">
				COLECTURIA
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