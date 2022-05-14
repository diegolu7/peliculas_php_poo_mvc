<?php 
  abstract class Poligono{
    protected $lados;

    abstract protected function perimetro();
    abstract protected function area(); //SON ABSTRACTAS YA QUE SERAN DEFINIDAS POR SUS HIJOS

  public function lados(){
    return 'Un ' . get_called_class() . 'tiene ' . $this->lados . ' lados';
    //get_called_class() retorna el nombre de la clase
  }

  }
?>