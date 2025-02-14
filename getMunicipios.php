<?php
require 'db.php';

if(isset($_POST['departamento_id'])){
  $stmt = $pdo->prepare("SELECT * FROM municipios WHERE departamento_id = ?");
  $stmt->execute([$_POST['departamento_id']]);
  $municipios = $stmt->fetchAll();
  if($municipios){
    echo '<option value="">Seleccione Municipio</option>';
    foreach($municipios as $mun){
      echo '<option value="'.$mun['id'].'">'.$mun['nombre'].'</option>';
    }
  } else {
    echo '<option value="">No hay municipios disponibles</option>';
  }
}
?>
