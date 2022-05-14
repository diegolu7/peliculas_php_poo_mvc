<?php 
require('StatusController.php');
//INDEXXXXX
echo '<h1>CRUD con MVC de la Tabla Status</h1>';

$status = new StatusController();
//LEER DB
$status_data = $status->read();

var_dump($status_data);

$num_status = count($status_data);

echo '<h2>Numero de Status: <b>' . $num_status . ' </b></h2>';
echo '<h2>Tabla de Status </h2>';
echo '<table>
      <tr>
        <th>status_id</th>
        <th>status</th>
      </tr>';
for($i=0; $i < $num_status; $i++){
  echo '<tr>
          <td>' . $status_data[$i]['status_id'] . '</td>
          <td>' . $status_data[$i]['status'] . '</td>
        </tr>';
}
echo '</table>';


echo '</table>';

echo '<h2>Insertando Status</h2>';

$new_status = array(
  'status_id' => 6, //sabemos que es auto incremental y automatico
  'status' => '654654654 Status'
);

//$status->update($update_status);

//INSERTAR EN LA DB
//$status->create( $new_status );

//UPDATE EN LA DB
echo '<h2>Actualizando Status</h2>';


//DELETE EN LA DB
echo '<h2>Eliminando Status</h2>';
//$status->delete(6);






























?>