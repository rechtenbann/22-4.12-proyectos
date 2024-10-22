<?php if ($_SESSION['usu']['rol'] == 2) { ?>
  <br>
  <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-info" style="text-decoration: none;">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a class="link-dark" style="text-decoration: none;">Usuarios</a></li>
            </ol>
        </nav>
    </div>
  <br>
  <div class="container">
    <a type="button" class="link-dark dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i> Filtros </a>&nbsp;&nbsp;
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="usuarios_usu.php">Usuarios</a></li>
      <li><a class="dropdown-item" href="admin_usu.php">Administradores</a></li>
      <li><a class="dropdown-item" href="mod_usu.php">Moderadores</a></li>
      <li><a class="dropdown-item" href="listado_usu.php">Todos</a></li>

    </ul>
  </div>
  <br>
  <div class="container">
    <table class="table table-dark table-striped">
      <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Cargo</th>
        <th>Opciones</th>
      </tr>
      <?php foreach ($usu as $usuarios) { ?>
        <tr>
          <th><?php echo $usuarios['nombre']; ?></th>
          <th><?php echo $usuarios['correo']; ?></th>
          <th><?php echo $usuarios['roles']; ?></th>
          <td>
            <a class="btn btn-danger <?php echo $usuarios['nombre'] == $_SESSION['usu']['nombre'] ? 'disabled' : '' ?>" href="eliminar_usu.php?id=<?php echo $usuarios['id'] ?>"><i class="far fa-trash-alt"></i></a>
            <a class="btn btn-success  <?php echo $usuarios['rol'] == 2 ? 'disabled' : '' ?> <?php echo $usuarios['rol'] == 3 ? 'disabled' : '' ?>" href="asignar_usu.php?id=<?php echo $usuarios['id'] ?>"><i class="fas fa-edit"></i></a>
            <a class="btn btn-danger <?php echo $usuarios['rol'] == 2 ? 'disabled' : '' ?> <?php echo $usuarios['rol'] == 1 ? 'disabled' : '' ?>" href="designar_usu.php?id=<?php echo $usuarios['id'] ?>"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
<?php } ?>
<?php if ($_SESSION['usu']['rol'] == 3) { ?>
  <br>
  <div class="container">
    <a type="button" class="link-dark dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i> Filtros </a>&nbsp;&nbsp;
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="usuarios_usu.php">Usuarios</a></li>
      <li><a class="dropdown-item" href="admin_usu.php">Administradores</a></li>
      <li><a class="dropdown-item" href="mod_usu.php">Moderadores</a></li>
      <li><a class="dropdown-item" href="listado_usu.php">Todos</a></li>
    </ul>
  </div>
  <br>
  <div class="container">
    <table class="table table-dark table-striped">
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Cargo</th>
        <th>Opciones</th>
      </tr>
      <?php foreach ($usu as $usuarios) { ?>
        <tr>
          <th><?php echo $usuarios['id']; ?></th>
          <th><?php echo $usuarios['nombre']; ?></th>
          <th><?php echo $usuarios['correo']; ?></th>
          <th><?php echo $usuarios['roles']; ?></th>
          <th>
            <a class="btn btn-danger <?php echo $usuarios['rol'] == 2 ? 'disabled' : '' ?><?php echo $usuarios['nombre'] == $_SESSION['usu']['nombre'] ? 'disabled' : '' ?>" href="eliminar_usu.php?id=<?php echo $usuarios['id'] ?>"><i class="far fa-trash-alt"></i></a>
            <a class="btn btn-success  <?php echo $usuarios['rol'] == 2 ? 'disabled' : '' ?> <?php echo $usuarios['rol'] == 3 ? 'disabled' : '' ?>" href="asignar_usu.php?id=<?php echo $usuarios['id'] ?>"><i class="fas fa-edit"></i></a>
          </th>
        </tr>
      <?php } ?>
    </table>
  </div>
<?php } ?>