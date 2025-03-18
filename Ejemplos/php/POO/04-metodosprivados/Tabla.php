<?php
class Tabla{
    private $matriz = array();
    private $numfilas;
    private $numcolumnas;
    private $estilo;

    public function __construct($rows, $cols, $style){
        $this->numfilas = $rows;
        $this->numcolumnas = $cols;
        $this->estilo = $style;
    }

    public function cargar($row, $col, $val){
        $this->matriz[$row][$col] = $val;
    }

    private function inicio_Tabla(){
        echo '<table style="'.$this->estilo.'">';
    }

    private function inicio_Fila(){
        echo '<tr>';
    }

    private function mostrar_dato($row, $col){
        echo '<td style="'.$this->estilo.'">';
        echo isset($this->matriz[$row][$col]) ? $this->matriz[$row][$col] : '';
        echo '</td>';
    }

    private function fin_Fila(){
        echo '</tr>';
    }

    private function fin_Tabla(){
        echo '</table>';
    }

    public function graficar(){
        $this->inicio_Tabla();
        for($i=0; $i<$this->numfilas; $i++){
            $this->inicio_Fila();
            for($j=0; $j<$this->numcolumnas; $j++){
                $this->mostrar_dato($i, $j);
            }
            $this->fin_Fila();
        }
        $this->fin_Tabla();
    }
}
?>