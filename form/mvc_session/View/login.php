<?php
   session_start();
   $_SESSION["estado"]=0;
   if (isset($_POST["usuario"]))
   {   if ($_POST["usuario"]=="alcaldia" & $_POST["clave"]=="123")
        {   $_SESSION["estado"]=1;
            $_SESSION["usuario"]=$_POST["usuario"];
            header("location:index.php");
        }
        else
        {  echo "Usuario o clave incorrecta";  
    }   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INCIO DE SESION</h1>
    <form method="post" action="login.php">
        Usuario:<input type="text" name="usuario"><br>
        clave:<input type="password" name="clave"><br>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown
  </button>
  <div class="dropdown" aria-labelledby="dropdownMenu2">
</select>
</opition>Empleado<option>
</opition>Administrador<option>
    <select>
  </div>
</div>
         <input type="submit" name="bt" value="ingresar"><br>
    </form>
</body>
</html>