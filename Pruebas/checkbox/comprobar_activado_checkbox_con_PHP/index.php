<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar checkbox con PHP</title>
    <style>
        input[type = 'submit']{
            padding-block: 3em;
            padding-inline: 5em;
        }
        input[type = 'submit']:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="comprobar.php" method="post">
        <input type="checkbox" name="chk1" id="chk_1"> <label for="chk_1">Check 1</label><br>
        <dd>
            <input type="checkbox" name="chk_norte_1" id="chk_norte_1"> <label for="chk_norte_1">Norte 1</label><input readonly type="range" name="rg_norte_1" id="rg_norte_1" min="1" max="5" value=""><br>
            <input type="checkbox" name="chk_este_1" id="chk_este_1"> <label for="chk_este_1">Este 1</label><input readonly type="range" name="rg_este_1" id="rg_este_1" min="1" max="4" value=""><br>
            <input type="checkbox" name="chk_oeste_1" id="chk_oeste_1"> <label for="chk_oeste_1">Oeste 1</label><input readonly type="range" name="rg_oeste_1" id="rg_oeste_1" min="1" max="6" value=""><br>
            <input type="checkbox" name="chk_sur_1" id="chk_sur_1"> <label for="chk_sur_1">Sur 1</label><input readonly type="range" name="rg_sur_1" id="rg_sur_1" min="1" max="5" value=""><br>
        </dd>
        <input type="checkbox" name="chk2" id="chk_2"> <label for="chk_2">Check 2</label><br>
        <dd>
            <input type="checkbox" name="chk_norte_2" id="chk_norte_2"> <label for="chk_norte_2">Norte 2</label><input type="range" name="rg_norte_2" id="rg_norte_2" min="1" max="5" value=""><br>
            <input type="checkbox" name="chk_este_2" id="chk_este_2"> <label for="chk_este_2">Este 2</label><input type="range" name="rg_este_2" id="rg_este_2" min="1" max="4" value=""><br>
            <input type="checkbox" name="chk_oeste_2" id="chk_oeste_2"> <label for="chk_oeste_2">Oeste 2</label><input type="range" name="rg_oeste_2" id="rg_oeste_2" min="1" max="6" value=""><br>
            <input type="checkbox" name="chk_sur_2" id="chk_sur_2"> <label for="chk_sur_2">Sur 2</label><input type="range" name="rg_sur_2" id="rg_sur_2" min="1" max="5" value=""><br>
        </dd>
        <input type="checkbox" name="chk3" id="chk_3"> <label for="chk_3">Check 3</label><br>
        <dd>
            <input type="checkbox" name="chk_norte_3" id="chk_norte_3"> <label for="chk_norte_3">Norte 3</label><input type="range" name="rg_norte_3" id="rg_norte_3" min="1" max="5" value=""><br>
            <input type="checkbox" name="chk_este_3" id="chk_este_3"> <label for="chk_este_3">Este 3</label><input type="range" name="rg_este_3" id="rg_este_3" min="1" max="4" value=""><br>
            <input type="checkbox" name="chk_oeste_3" id="chk_oeste_3"> <label for="chk_oeste_3">Oeste 3</label><input type="range" name="rg_oeste_3" id="rg_oeste_3" min="1" max="6" value=""><br>
            <input type="checkbox" name="chk_sur_3" id="chk_sur_3"> <label for="chk_sur_3">Sur 3</label><input type="range" name="rg_sur_3" id="rg_sur_3" min="1" max="5" value=""><br>
        </dd>
        <input type="checkbox" name="chk4" id="chk_4"> <label for="chk_4">Check 4</label><br>
        <dd>
            <input type="checkbox" name="chk_norte_4" id="chk_norte_4"> <label for="chk_norte_4">Norte 4</label><input type="range" name="rg_norte_4" id="rg_norte_4" min="1" max="5" value=""><br>
            <input type="checkbox" name="chk_este_4" id="chk_este_4"> <label for="chk_este_4">Este 4</label><input type="range" name="rg_este_4" id="rg_este_4" min="1" max="4" value=""><br>
            <input type="checkbox" name="chk_oeste_4" id="chk_oeste_4"> <label for="chk_oeste_4">Oeste 4</label><input type="range" name="rg_oeste_4" id="rg_oeste_4" min="1" max="6" value=""><br>
            <input type="checkbox" name="chk_sur_4" id="chk_sur_4"> <label for="chk_sur_4">Sur 4</label><input type="range" name="rg_sur_4" id="rg_sur_4" min="1" max="5" value=""><br>
        </dd>
        <input type="checkbox" name="chk5" id="chk_5"> <label for="chk_5">Check 5</label><br>
        <dd>
            <input type="checkbox" name="chk_norte_5" id="chk_norte_5"> <label for="chk_norte_5">Norte 5</label><input type="range" name="rg_norte_5" id="rg_norte_5" min="1" max="5" value=""><br>
            <input type="checkbox" name="chk_este_5" id="chk_este_5"> <label for="chk_este_5">Este 5</label><input type="range" name="rg_este_5" id="rg_este_5" min="1" max="4" value=""><br>
            <input type="checkbox" name="chk_oeste_5" id="chk_oeste_5"> <label for="chk_oeste_5">Oeste 5</label><input type="range" name="rg_oeste_5" id="rg_oeste_5" min="1" max="6" value=""><br>
            <input type="checkbox" name="chk_sur_5" id="chk_sur_5"> <label for="chk_sur_5">Sur 5</label><input type="range" name="rg_sur_5" id="rg_sur_5" min="1" max="5" value=""><br>
        </dd>
        <center><input type="submit" value="Enviar"></center>
    </form>
</body>
</html>