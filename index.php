<?php
require 'db.php';
$departamentos = $pdo->query("SELECT * FROM departamentos")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <i class="fas fa-user-plus"></i> Sistema de Usuarios
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-edit"></i> Registrar</a></li>
          <li class="nav-item"><a class="nav-link" href="users.php"><i class="fas fa-users"></i> Usuarios</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container mt-5 fade-in">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h4><i class="fas fa-user-edit"></i> Registrar Usuario</h4>
          </div>
          <div class="card-body">
            <form action="insert.php" method="post" id="registroForm">
              <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required>
              </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
              </div>
              <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
              </div>
              <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo" required>
                  <option value="">Seleccione</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
              </div>
              <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea class="form-control" id="direccion" name="direccion" rows="2" required></textarea>
              </div>
              <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <select class="form-select" id="departamento" name="departamento" required>
                  <option value="">Seleccione Departamento</option>
                  <?php foreach($departamentos as $dep): ?>
                     <option value="<?= $dep['id'] ?>"><?= $dep['nombre'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="municipio" class="form-label">Municipio</label>
                <select class="form-select" id="municipio" name="municipio" required>
                  <option value="">Seleccione Municipio</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="distrito" class="form-label">Distrito</label>
                <select class="form-select" id="distrito" name="distrito" required>
                  <option value="">Seleccione Distrito</option>
                </select>
              </div>
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="activo" name="activo" checked>
                <label class="form-check-label" for="activo">Activo</label>
              </div>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Enviar Registro
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#departamento').change(function(){
         var deptoID = $(this).val();
         if(deptoID){
            $.ajax({
               type: 'POST',
               url: 'getMunicipios.php',
               data: {departamento_id: deptoID},
               success: function(html){
                 $('#municipio').html(html);
                 $('#distrito').html('<option value="">Seleccione Distrito</option>');
               }
            });
         } else {
            $('#municipio').html('<option value="">Seleccione Municipio</option>');
            $('#distrito').html('<option value="">Seleccione Distrito</option>');
         }
      });
      
      $('#municipio').change(function(){
         var municipioID = $(this).val();
         if(municipioID){
            $.ajax({
               type: 'POST',
               url: 'getDistritos.php',
               data: {municipio_id: municipioID},
               success: function(html){
                 $('#distrito').html(html);
               }
            });
         } else {
            $('#distrito').html('<option value="">Seleccione Distrito</option>');
         }
      });
    });
  </script>
</body>
</html>

