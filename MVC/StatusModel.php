<?php 
require_once('Model.php'); //lo requiere 1 vez,  NO CADA VEZ QUE RECARGUEMOS LA APP

class StatusModel extends Model{
  public $status_id;
  public $status;

  public function __construct(){
    $this->db_name = 'mexflix';//toma del padre
  }
  //como heredamos una clase abstracta debemos implementar todos sus Metodos
  public function create( $status_data = array() ){
    foreach ($status_data as $key => $value){
      $$key = $value;//variables variables
    }
    $this->consulta = "INSERT INTO status (status_id, status)
     VALUES ($status_id ,'$status')";
     $this->set_query();
  }
  public function read( $status_id = ''){//*************** */
    $this->consulta = ($status_id != '')
    ?"SELECT * FROM status WHERE status_id = $status_id;":
     "SELECT * FROM status;";
    //ES UNA CONSULTA QUE LEERA DATOS POR ELLOS EJECUTO GET QUERY
    $this->get_query();
    //var_dump($this->rows);

    //return $this->rows;

    $num_rows = count($this->rows);
    //echo $num_rows;
    $data = array();
    foreach ($this->rows as $key => $value){
      $data[$key] = $value;
    }
    return $data;

  }
  public function update( $status_data = array()){
    foreach ($status_data as $key => $value){
      $$key = $value;//variables variables
      }
    $this->consulta = "UPDATE status SET status_id = $status_id , status = '$status' WHERE status_id = $status_id";
    $this->set_query();
  }
  public function delete($status_id = ''){
    $this->consulta = "DELETE FROM status WHERE status_id = $status_id";
    $this->set_query();
  }
  public function __destruct(){
   //unset($this);//destruir el objeto, pero no se puede usar con this
  }






























}?>