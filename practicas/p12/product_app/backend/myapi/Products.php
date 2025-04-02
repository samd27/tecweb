<?php
namespace TECWEB\MYAPI;

use TECWEB\MYAPI\DataBase as DataBase;
require_once __DIR__ . '/DataBase.php';

class Products extends DataBase{
    private $data = NULL;
    
    public function __construct($user='root', $pass='samd2704', $db){
        $this->data = array();
        parent::__construct($user, $pass, $db);
    }

    public function list(){
        $this -> data = array();

        if($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")){
            $rows = $result->fetch_all(MYSQLI_ASSOC);   
            if(!is_null($rows)){
                foreach($rows as $num => $row){
                    foreach($row as $key => $value){
                        $this->data[$num][$key]=$value;
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function add($producto){
        $nombre   = $producto['nombre'];
        $marca    = $producto['marca'];
        $modelo   = $producto['modelo'];
        $precio   = $producto['precio'];
        $detalles = $producto['detalles'];
        $unidades = $producto['unidades'];
        $imagen   = $producto['imagen'];

        $this->data = array(
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );

        if(isset($nombre)) {
            $sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            
            if ($result->num_rows == 0) {
                $sql = "INSERT INTO productos VALUES (null, '$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen', 0)";
                if($this->conexion->query($sql)){
                    $this->data['status'] =  "success";
                    $this->data['message'] =  "Producto agregado";
                } else {
                    $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
            $result->free();
            $this->conexion->close();
        }
    }

    public function delete($producto){
        $id = $producto['id'];
        $this->data = array(
            'status'  => 'error',
            'message' => 'No se pudo eliminar el producto'
        );

        if(isset($id)) {
            $sql = "UPDATE productos SET eliminado = 1 WHERE id = $id";
            if($this->conexion->query($sql)){
                $this->data['status'] =  "success";
                $this->data['message'] =  "Producto eliminado";
            } else {
                $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }

    public function edit($producto){
        $id       = $producto['id'];
        $nombre   = $producto['nombre'];
        $marca    = $producto['marca'];
        $modelo   = $producto['modelo'];
        $precio   = $producto['precio'];
        $detalles = $producto['detalles'];
        $unidades = $producto['unidades'];
        $imagen   = $producto['imagen'];

        $this->data = array(
            'status'  => 'error',
            'message' => 'No se pudo editar el producto'
        );

        if(isset($id)) {
            $sql = "UPDATE productos SET nombre = '$nombre', marca = '$marca', modelo = '$modelo', precio = '$precio', detalles = '$detalles', unidades = '$unidades', imagen = '$imagen' WHERE id = $id";
            if($this->conexion->query($sql)){
                $this->data['status'] =  "success";
                $this->data['message'] =  "Producto editado";
            } else {
                $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }

    public function search($search){
        $this -> data = array();

        if($result = $this->conexion->query("SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0")){
            $rows = $result->fetch_all(MYSQLI_ASSOC);   
            if(!is_null($rows)){
                foreach($rows as $num => $row){
                    foreach($row as $key => $value){
                        $this->data[$num][$key]=$value;
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function single($id){
        $this -> data = array();

        if($result = $this->conexion->query("SELECT * FROM productos WHERE id = $id")){
            $row = $result->fetch_assoc();   
            if(!is_null($row)){
                foreach($row as $key => $value){
                    $this->data[$key]=$value;
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function singleByName($nombre){
        $this -> data = array();

        if($result = $this->conexion->query("SELECT * FROM productos WHERE nombre = $nombre")){
            $row = $result->fetch_assoc();   
            if(!is_null($row)){
                foreach($row as $key => $value){
                    $this->data[$key]=$value;
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function getData(){
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

  
}

?>