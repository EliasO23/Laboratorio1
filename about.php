<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acerca de Nosotros</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    .developer-card {
      transition: transform 0.3s;
    }
    .developer-card:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <i class="fas fa-info-circle"></i> Sistema de Usuarios
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-edit"></i> Registrar</a></li>
          <li class="nav-item"><a class="nav-link" href="users.php"><i class="fas fa-users"></i> Usuarios</a></li>
          <li class="nav-item"><a class="nav-link active" href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container mt-5">
    <h3 class="mb-4"><i class="fas fa-address-card"></i> Acerca de los Desarrolladores</h3>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card developer-card shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-user fa-4x mb-3 text-primary"></i>
            <h5 class="card-title">Elias Antonio</h5>
            <p class="card-text">Email: <a href="mailto:oc0496032022@unab.edu.sv">oc0496032022@unab.edu.sv</a></p>
            <p class="card-text">Especialista en PHP.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card developer-card shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-user fa-4x mb-3 text-primary"></i>
            <h5 class="card-title">Emerson Eli</h5>
            <p class="card-text">Email: <a href="mailto:ml0280032022@unab.edu.sv">ml0280032022@unab.edu.sv</a></p>
            <p class="card-text">Especialista en Frontend y Diseño UI/UX.</p>
          </div>
        </div>
      </div>

        <div class="col-md-6 mb-4">
          <div class="card developer-card shadow-sm">
            <div class="card-body text-center">
              <i class="fas fa-user fa-4x mb-3 text-primary"></i>
              <h5 class="card-title">Brandon Emerson</h5>
              <p class="card-text">Email: <a href="mailto:ra0082032022@unab.edu.sv">ra0082032022@unab.edu.sv</a></p>
              <p class="card-text">Especialista en MySQL.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
