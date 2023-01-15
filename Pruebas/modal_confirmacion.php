<!DOCTYPE html>
<html>
<head>
<style>
.container {
  position: relative;
  width: 100%;
  max-width: 400px;
}

.container img {
  width: 100%;
  height: auto;
}

.container .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: black;
  color: white;
  font-size: 16px;
  padding: 16px 30px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.container .btn:hover {
  background-color: white;
  color: black;
}
</style>
</head>
<body>
    <center>
<script>
        function confirmation (){
            var respuesta = confirm("¿Estas seguro que quieres elimar el registro?");
        if (respuesta--true){
            return true;
        }else{
            return false;
        }
        }
    </script>


<div class="container">
  <button class="btn">Eliminar</button>
  <input type='submit' name='eliminar' onclick='return confirmacion()'>
</div>
    </center>
</body>
</html>
