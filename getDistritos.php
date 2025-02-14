<?php
require 'db.php';

if(isset($_POST['municipio_id'])){
  $stmt = $pdo->prepare("SELECT * FROM distritos WHERE municipio_id = ?");
  $stmt->execute([$_POST['municipio_id']]);
  $distritos = $stmt->fetchAll();
  if($distritos){
    echo '<option value="">Seleccione Distrito</option>';
    foreach($distritos as $dist){
      echo '<option value="'.$dist['id'].'">'.$dist['nombre'].'</option>';
    }
  } else {
    echo '<option value="">No hay distritos disponibles</option>';
  }
}
?>
