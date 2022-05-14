<?php 
//herencia multiples atravez de interfaces
//seria como un Postre extends Ingredientes, Receta
interface Ingredientes{
  public function establecer_ingredientes($lista);
  public function obtener_ingredientes();
}
interface Receta{
  public function establecer_receta($pasos);
  public function obtener_receta();
}
//debe implementar los 4 metodos si o si

class Postre implements Ingredientes, Receta{
  private $nigredientes;
  private $receta;

  public function establecer_ingredientes($lista){
    $this->ingredientes = explode(',',$lista);
    //explode('') rompe cadena delimita por , transf en array de string

  }
  public function obtener_ingredientes(){
    $num_ingredientes = count($this->ingredientes);

    $html = '<ul> ';
    for ($i = 0 ; $i < $num_ingredientes ; $i++){
      $html .= '<li>' . $this->ingredientes[$i] . '</li>';
    }
    $html .= '</ul>';
    return print($html);
  }
  public function establecer_receta($pasos){
    $this->receta = explode('|',$pasos);

  }
  public function obtener_receta(){
    $x = count($this->receta);

    $html = '<ol> ';
    for ($i = 0 ; $i < $x ; $i++){
      $html .= '<li>' . $this->receta[$i] . '</li>';
    }
    $html .= '</ol>';
    return print($html);
  }

}

echo '<h1>Postres</h1>';
echo '<h2>Hot Cakes</h2>';

$hot_cakes = new Postre();
echo '<h3>Ingredientes</h3>';
$hot_cakes->establecer_ingredientes('1 taza de harina para hoy cakes,1 huevo,1/3 taza de leche,10 gotitas de vainilla,3 cucharadas de mantequilla');
$hot_cakes->obtener_ingredientes();
echo '<h3>Receta</h3>';
$hot_cakes->establecer_receta('Mezclar todos los ingredientes excepto la manteca en un recipiente hasta obtener una masa espesa y uniforme|Calentar1 cucharada de manteca a fuego lento en un sarten|cuando la mantequilla se derrita, vierte la mezla hasta formar un cirlulo|Dejar calentar la mezcla hasta que comience a salir burbujas|Cuando la consistencia se vea esponjosa voltear|dejar cocinar el segundo lado por 3min|Repetir el paso 2 al 6 hasta que se acabe la mezcla');
$hot_cakes->obtener_receta();

echo '<hr>';

echo '<h1>Comidas</h1>';
echo '<h2>Asado</h2>';
$asado = new Postre();
echo '<h3>Ingredientes</h3>';
$asado->establecer_ingredientes('carne,limon,choris,sal,carbon');
$asado->obtener_ingredientes();
echo '<h3>Receta</h3>';
$asado->establecer_receta('prender fuego|limpiar parrilla|tiro el asado|espero 30min|tiro choris|doy vuelta espero otros 30 min| tiro sal y limonciño| listo compi ');
$asado->obtener_receta();



?>