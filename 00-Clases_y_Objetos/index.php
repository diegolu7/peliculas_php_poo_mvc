<?php 
/*
  public: Acceso desde cualquier método de la clase u objeto que lo invoque.
  private: Acceso sólo desde los métodos de la clase, los objetos no los pueden invocar.
  protected: Acceso sólo desde los métodos de la clase y subclases que la hereden, los objetos no los pueden invocar
*/
class Perro{
  //METODOS
  public $nombre;
  public $raza;
  public $edad;
  public $sexo;
  public $adiestrado;
  public $foto;
  public $comida;
  private $pulgas;
  public static $mejor_amigo = 'hombre'; //no cambiara es estatica
  const MEJOR_CUALIDAD = 'Fidelidad'; 
  //Constructor
  public function __construct($nombre, $raza, $edad, $sexo, $adiestrado, $foto,$pulgas){
    $this->nombre = $nombre;
    $this->raza = $raza;
    $this->edad = $edad;
    $this->sexo = $sexo;
    $this->adiestrado = ($adiestrado) ? 'Adiestrado' : 'NoAdiestrado';
    $this->foto = $foto;
    $this->pulgas = $pulgas;
    echo '<p><mark>Hola soy el Constructor de la clase</mark></p>';
  }
  public function __destruct(){
    echo '<p><mark>Hola soy el Destructor de la clase</mark></p>';
  }
  //METODOS
  public function ladrar(){
    echo '<mark> Waw! waW Grr! </mark>';
  }
  public function comer($c){
    $this->comida = $c;
    echo '<p>' . $this->nombre . ' come ' . $this->comida . '</p>';
  }
  public function aparecer(){
    echo '<img width="200px" src='. $this->foto . '>';
  }
  public function mas_info(){
    self::ladrar();
    Perro::comer('guaschalocro');
    echo '<h1> El mejor amigo de ' . $this->nombre . ' es ' . Perro::$mejor_amigo . ' </h1>';
    echo '<h1> La mejor cualidad de ' . $this->nombre . ' es ' . Perro::MEJOR_CUALIDAD . ' </h1>';

  }
}
//instanciamos

$kenai = new Perro('kenai','callejero',20,'macho',true, 'https://thumbs.gfycat.com/AstonishingDisgustingAsp-max-1mb.gif', false);
//var_dump($kenai);
echo '<h1>' . $kenai->nombre . '</h1>';
echo '<h1>' . $kenai->raza . '</h1>';
echo '<h1>' . $kenai->edad . '</h1>';
echo '<h1>' . $kenai->sexo . '</h1>';
echo '<h1>' . $kenai->adiestrado . '</h1>';
echo '<hr>';
$kenai->ladrar();
$kenai->comer("guiso de la juana");
$kenai->aparecer();
echo '<hr>';
$kenai->mas_info();




?>