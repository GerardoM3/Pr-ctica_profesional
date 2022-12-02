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

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
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
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2 class="center">Formulario Contribuyente</h2>

<div class="container">
  <form action="/action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">Nombres</label>
    </div>
    <div class="col-75">
      <input type="text" id="Nombres" name="nombres" placeholder="Nombres..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Apellidos</label>
    </div>
    <div class="col-75">
      <input type="text" id="Apellidos" name="apellidos" placeholder="Apellidos..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">Direccion</label>
    </div>
    <div class="col-75">
      <input type="text" id="Direccion" name="direccion" placeholder="Direccion..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">DUI</label>
    </div>
    <div class="col-75">
      <input type="text" id="DUI" name="dui" placeholder="DUI..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">NIT</label>
    </div>
    <div class="col-75">
      <input type="text" id="NIT" name="nit" placeholder="NIT..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="fname">Telefono</label>
    </div>
    <div class="col-75">
      <input type="text" id="Telefono" name="telefono" placeholder="Telefono..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    </div>
  </div>
  <div class="row">
    <div>
        <input type="submit" value="Registrar"> 
    </div>
  </div>
  </form>
</div>

</body>
</html>