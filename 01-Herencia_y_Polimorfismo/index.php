<?php //TELEFONOS.PHP
class Telefono{
  public $marca;
  public $modelo;
  protected $alambrico = true; //pueden ser accdos por hijos
  protected $comunicacion;
  
  public function __construct($marca,$modelo){
    $this->marca = $marca;
    $this->modelo = $modelo;
    $this->comunicacion = ($this->alambrico)? 'Alambrico':'Inalambrico';
  }
  public function llamar(){
    return print ('<p> riiing riiiingg </p>');
  }
  public function mas_info(){
    return print ('<ul><li>marca ' . $this->marca . '</li><li>modelo ' . $this->modelo . '</li><li>Comunicacion ' . $this->comunicacion . '</li></ul>');
  }


}
class Celular extends Telefono{
  protected $alambrico = false;
  public function __construct($marca,$modelo){
    parent::__construct($marca,$modelo);//usa el consturctor de padre
  }
}
final class SmarthPhone extends Telefono{
  public $alambrico = false;
  public $internet = true;
  public function __construct($marca,$modelo){
    parent::__construct($marca,$modelo);
  }
    public function mas_info(){
    return print ('<ul><li>marca ' . $this->marca . '</li><li>modelo ' . $this->modelo . '</li><li>Comunicacion ' . $this->comunicacion . '</li><li>Telefono con Internet </li></ul>');
  }
}



echo '<h1>Evolución del Teléfono</h1>';
echo '<h2>Teléfono</h2>';
$tel_casa = new Telefono('Panasonic', 'KX-TS550');
$tel_casa->llamar();
$tel_casa->mas_info();

echo '<hr>';

echo '<h2>Celular</h2>';
$mi_cel = new Celular('Nokia', '1100s');
$mi_cel->llamar();
$mi_cel->mas_info();

echo '<hr>';

echo '<h2>SmarthPhone</h2>';
$mi_smarth = new SmarthPhone('Xiomi', 's10');
$mi_smarth->llamar();
$mi_smarth->mas_info();
















?>