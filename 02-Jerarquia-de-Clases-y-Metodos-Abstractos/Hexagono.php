<?php
class Hexagono extends Poligono{
  private $lado;
  private $apotema;

  public function __construct($l,$a) {
    $this->lados = 6 ;
    $this->lado =$l;
    $this->apotema =$a;
  }
  public function perimetro(){
    return ($this->lados * $this->lado);
  } function area(){
    return (self::perimetro() * $this->apotema)/2;
    //self (uno mismo) pq es un metodo dentro de la clase
  }
}

?>