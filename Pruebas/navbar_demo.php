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
			background-color: green;
			float: left;
			display: inline-block;
			position: absolute;
		}
		/* Sección de navegación principal */
		.container-nav{
			margin: 1rem;
			width: 75%;
			background-color: orange;
			float: right;
			text-align: center;
		}

		/*  */
		.option-block{
			padding: 6px;
			display: inline-block;
			margin:  2px;
			background-color: red;
			
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
	<div class="container-main">
		<div class="container-nav">
			<div class="option-block">
				Menú
			</div>
			<div class="option-block">
				Estudios
				<div class="suboption-block">
					Educación básica
				</div>
				<div class="suboption-block">
					Educación media
					<div class="suboption-block2">
						Primer año
					</div>
					<div class="suboption-block2">
						Segundo año
					</div>
					<div class="suboption-block2">
						Tercer año
					</div>
				</div>
				<div class="suboption-block">
					Educación superior
				</div>
			</div>
			
			<div class="option-block">
				Experiencia laboral
			</div>
			<div class="option-block">
				Acerca de
			</div>
		</div>
		
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="primary-form">
		<form class="form-main">
		<label class="label-user">Usuario</label>
		<input type="text" name="campo-user" class="campo-user"/>
	</form>
	</div>
</body>
</html>