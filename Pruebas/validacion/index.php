<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/servicio.nuevo-registro.main.style.css" />
</head>
<body>

    <form action="validacion.php" method="post" id="form">
        <div class="form-group">
            <label for="norte_longitud">DUI <h6 style="display:inline-flex;">(metros)</h6></label>
            <div class="input-group">
                <input type="text" pattern="[0-9]{8}-[0-9]" title="El DUI tienen 8 números, un guión y un número" id="dui_a" name="dui_a" class="form-control" maxlength="10" style="z-index: 0;" required>
            </div>
        </div>

        <div >
            <input type="submit" value="Enviar">
        </div>
        
    </form>

    <script>
        const campo = document.getElementById('dui_a');
        campo.addEventListener('input', (e)=>{
            if (e.validity.patternMismatch) {
                e.setCustomValidity("Se esperaba que usara el número de DUI");
            }else{
                e.setCustomValidity("");
            }
        });
    </script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/ini.js"></script>
    <script src="assets/js/jquery.anexsoft-validator.js"></script>
</body>
</html>