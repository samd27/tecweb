<?php
class Pagina{
    private $cabecera;
    private $cuerpo;
    private $pie;


    public function __construct($texto1, $texto2){
        $this->cabecera = new Cabecera($texto1);
        $this->cuerpo = new Cuerpo;
        $this->pie = new Pie($texto2);
    }

    public function insertar_cuerpo($texto){
        $this->cuerpo->insertar_parrafo($texto);
    }

    public function graficar(){
        $this->cabecera->graficar();
        $this->cuerpo->graficar();
        $this->pie->graficar();
    }
}

class Cabecera{
    private $titulo;

    public function __construct($title){
        $this->titulo = $title;
    }

    public function graficar(){
        $estilo = 'font-size: 20px; text-align: center';
        echo '<div style="'.$estilo.'">';
        echo '<h1>'.$this->titulo.'</h1>';
        echo '</div>';
    }
}

class Cuerpo{
    private $lineas = array();

    public function insertar_parrafo($text){
        $this->lineas[] = $text;
    }

    public function graficar(){
        echo '<hr>';
        foreach($this->lineas as $linea){
            echo '<p>'.$linea.'</p>';
        }
    }
}

class Pie{
    private $mensaje;

    public function __construct($text){
        $this->mensaje = $text;
    }

    public function graficar(){
        
        $estilo = 'font-size: 15px; text-align: center';
        echo '<div style="'.$estilo.'">';
        echo '<h4>'.$this->mensaje.'</h4>';
        echo '</div>';
    }
}


?>