<?php
namespace TECWEB\MODEL;
abstract class DataBase {
    protected $conexion;
    public function __construct($user, $pass, $db) {
        $this->conexion = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );
        /**
         * NOTA: si la conexion falló $conexion contendrá false
         */
        if(!$this->conexion) {
            die('¡Base de datos NO conectada!');
        }
    }
}
?>