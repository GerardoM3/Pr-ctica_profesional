<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>Resultado</h1></center>
    <?php 
    $var = [];
    $var2 = [];
    for ($i=1; $i <= 5; $i++) { 
        if(isset($_POST['chk'.$i])){
            echo <<<text
            El check $i está activao<br>
            <dd>
            text;
            if (isset($_POST['chk_norte_'.$i])) {
                echo <<<text
                El check norte $i está activado<br>
                El valor de range norte $i es 
                text;
                if (isset($_POST['rg_norte_'.$i])) {
                    echo $_POST['rg_norte_'.$i]. "<br>";
                    $var["norte_".$i] = $_POST['rg_norte_'.$i];
                    $var2[$i] = $var["norte_".$i];
                    echo "Arreglo ".$i.": ".$var["norte_".$i]."<br><br>";
                }
            }

            if (isset($_POST['chk_este_'.$i])) {
                echo <<<text
                El check este $i está activado<br>
                El valor de range este $i es 
                text;
                if (isset($_POST['rg_este_'.$i])) {
                    echo $_POST['rg_este_'.$i]. "<br>";
                    $var["este_".$i] = $_POST['rg_este_'.$i];
                    $var2[$i] = $var["este_".$i];
                    echo "Arreglo ".$i.": ".$var["este_".$i]."<br><br>";
                }
            }

            if (isset($_POST['chk_oeste_'.$i])) {
                echo <<<text
                El check oeste $i está activado<br>
                El valor de range oeste $i es 
                text;
                if (isset($_POST['rg_oeste_'.$i])) {
                    echo $_POST['rg_oeste_'.$i]. "<br>";
                    $var["oeste_".$i] = $_POST['rg_oeste_'.$i];
                    $var2[$i] = $var["oeste_".$i];
                    echo "Arreglo ".$i.": ".$var["oeste_".$i]."<br><br>";
                }
            }

            if (isset($_POST['chk_sur_'.$i])) {
                echo <<<text
                El check sur $i está activado<br>
                El valor de range sur $i es 
                text;
                if (isset($_POST['rg_sur_'.$i])) {
                    echo $_POST['rg_sur_'.$i]. "<br>";
                    $var["sur_".$i] = $_POST['rg_sur_'.$i];
                    $var2[$i] = $var["sur_".$i];
                    echo "Arreglo ".$i.": ".$var["sur_".$i]."<br><br>";
                }
            }
            
            echo "</dd><br><br><br>";
            
        }/* else{
            echo <<<text
            El check $i está desactivao<br>
            text;
        } */
    }
    
    foreach ($var as $i => $result) {
        echo <<<text
        Arreglo $i: $result <br>
        text;
        /*foreach ($var as $j => $result2) {
            echo <<<texto2
            Arreglo $j: $result2<br>
            texto2;
        }*/
    }
    ?>
    <center>
        
        <br>
        <button id="btn-regresar">Regresar</button>
    </center>
    <script>
        document.getElementById('btn-regresar').addEventListener('click', ()=>{
            window.location.href = "index.php";
        });
    </script>
</body>
</html>
