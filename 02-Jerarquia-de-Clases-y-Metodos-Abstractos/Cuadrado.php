<?php
class Cuadrado extends Poligono{
  private $lado;

  public function __construct($l) {
    $this->lados = 4 ;
    $this->lado =$l;
  }
  public function perimetro(){
    return $this->lado * $this->lados ;
  } function area(){
    return pow($this->lado , 2);
  }
}

?>