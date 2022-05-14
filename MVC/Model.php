<?php 
//CLASE ABSTR para CONECTARNOS A MYSQL
//es abstracta -> solo puede ser heredada
abstract class Model {
//Atributos
private static $db_host ='127.0.0.1';
private static $db_user = 'root';
private static $db_pass = '';
protected $db_name;

private static $db_charset = 'utf8';
private $conn;
protected $consulta;
protected $rows = array();

//Metodos
//metodos abstractos para CRUD de clases que hereden
abstract protected function create();
abstract protected function read();
abstract protected function update();
abstract protected function delete();

//metodo privado para conectarme a la base de datos
private function db_open(){
  //https://www.php.net/manual/es/class.mysqli.php
  $this->conn = new mysqli(self::$db_host,self::$db_user,self::$db_pass,$this->db_name);
  $this->conn->set_charset(self::$db_charset);//cada q ejecute una conexion DEFINE EL TIPO DE CARACT DE MI DB
}
//metodo privado para DESconectarme a la base de datos
private function db_close(){
  $this->conn->close();
}

//ESTABLECER un query q afecte datos (INSERT DELETE UPDATE)
protected function set_query(){
  $this->db_open(); //ejecutamos el metodo db_open
  //https://www.php.net/manual/es/mysqli.query.php
  $this->conn->query($this->consulta); //1er query es de CONN y 2do de this clase
  $this->db_close();//ejecutamos el metodo db_close

}

//obtener datos de una query (SELECT)
protected function get_query(){
  $this->db_open();
  //https://www.php.net/manual/es/mysqli.query.php
  $result = $this->conn->query($this->consulta);// ejecuto una query
  //el while se ejecutara y guarda por cada posicion que encuentre en la DB
  //var_dump($result);
  //exit;
  while( $this->rows[] = $result->fetch_assoc() );//https://www.php.net/manual/es/mysqli-result.fetch-assoc
  $result->free();//limpiamos consulta
  $this->db_close();//cerramos conexion
  return array_pop($this->rows); //array pop quitara la ultima posicion nulla qu viene por defecto

}












}?>