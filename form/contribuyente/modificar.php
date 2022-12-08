<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <style>
* {
  box-sizing: border-box;
}

.center {
  text-align: center;
  border: 1px solid black;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container-middle{
  width: 70%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin: auto;
}

.col-25 {
  float: left;
  width: 25vh;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 100vh;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 1rem;
  }
}
</style>
</head>
<body>

<h2 class="center">Formulario Contribuyente</h2>

<div class="container-middle">
  <form action="/action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">Nombres</label>
    </div>
    <div class="col-75">
      <input type="text" id="nombre_contribuyente" name="nombre_contribuyente" placeholder="Nombres..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Apellidos</label>
    </div>
    <div class="col-75">
      <input type="text" id="apellido_contribuyente" name="apellido_contribuyente" placeholder="Apellidos..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">Direccion</label>
    </div>
    <div class="col-75">
      <input type="text" id="direccion_contribuyente" name="direccion_contribuyente" placeholder="Direccion..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">DUI</label>
    </div>
    <div class="col-75">
      <input type="text" id="dui_contribuyente" name="dui_contribuyente" placeholder="DUI..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">NIT</label>
    </div>
    <div class="col-75">
      <input type="text" id="nit_contribuyente" name="nit_contribuyente" placeholder="NIT..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">Telefono</label>
    </div>
    <div class="col-75">
      <input type="text" id="telefono_contribuyente" name="telefono_contribuyente" placeholder="Telefono..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    </div>
  </div>
  <div class="row">
    <div >
  <div >
    <input type="submit" value="Modificar">
  </div>
  </form>
</div>

</body>
</html>