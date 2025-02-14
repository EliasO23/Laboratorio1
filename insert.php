<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nombres         = $_POST['nombres'];
  $apellidos       = $_POST['apellidos'];
  $edad            = $_POST['edad'];
  $sexo            = $_POST['sexo'];
  $correo          = $_POST['correo'];
  $direccion       = $_POST['direccion'];
  $departamento_id = $_POST['departamento'];
  $municipio_id    = $_POST['municipio'];
  $distrito_id     = $_POST['distrito'];
  $activo          = isset($_POST['activo']) ? 1 : 0;
  
  $stmt = $pdo->prepare("INSERT INTO usuarios (nombres, apellidos, edad, sexo, correo, direccion, departamento_id, municipio_id, distrito_id, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  
  if($stmt->execute([$nombres, $apellidos, $edad, $sexo, $correo, $direccion, $departamento_id, $municipio_id, $distrito_id, $activo])){
      header("Location: users.php?msg=success");
      exit;
  } else {
      header("Location: index.php?msg=error");
      exit;
  }
} else {
  header("Location: index.php");
  exit;
}
?>
