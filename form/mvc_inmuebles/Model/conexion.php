<?php
class Conexion
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=catastro;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }
}
?>