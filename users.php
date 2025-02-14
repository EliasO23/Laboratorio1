<?php
require 'db.php';

$sql = "SELECT u.*, d.nombre AS departamento, m.nombre AS municipio, dt.nombre AS distrito 
FROM usuarios u
JOIN departamentos d ON u.departamento_id = d.id
JOIN municipios m ON u.municipio_id = m.id
JOIN distritos dt ON u.distrito_id = dt.id
ORDER BY u.fecha_creacion DESC";
$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    .table-container {
      animation: slideIn 1s ease-out;
    }
    @keyframes slideIn {
      from { opacity: 0; transform: translateX(-20px); }
      to { opacity: 1; transform: translateX(0); }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <i class="fas fa-users"></i> Sistema de Usuarios
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-edit"></i> Registrar</a></li>
          <li class="nav-item"><a class="nav-link active" href="users.php"><i class="fas fa-table"></i> Usuarios</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container mt-5 table-container">
    <h3 class="mb-4"><i class="fas fa-list"></i> Listado de Usuarios</h3>
    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Usuario registrado exitosamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary">
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Distrito</th>
            <th>Creación</th>
            <th>Activo</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($usuarios as $usuario): ?>
          <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= htmlspecialchars($usuario['nombres']) ?></td>
            <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
            <td><?= $usuario['edad'] ?></td>
            <td><?= $usuario['sexo'] ?></td>
            <td><?= htmlspecialchars($usuario['correo']) ?></td>
            <td><?= htmlspecialchars($usuario['departamento']) ?></td>
            <td><?= htmlspecialchars($usuario['municipio']) ?></td>
            <td><?= htmlspecialchars($usuario['distrito']) ?></td>
            <td><?= $usuario['fecha_creacion'] ?></td>
            <td><?= $usuario['activo'] ? '<span class="badge bg-success">Sí</span>' : '<span class="badge bg-danger">No</span>' ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
