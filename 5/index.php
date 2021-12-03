<?php
$error = "";
if (isset($_POST['submit'])) {
  $file1 = $_FILES['fichero1'];
  $file2 = $_FILES['fichero2'];

  $destination = __DIR__ . '/images';
  if (is_writable($destination)) {
    for ($i = 1; $i < 2; $i++) {
      $file = $_FILES["fichero$i"];
      if (is_uploaded_file($file["tmp_name"])) {
        move_uploaded_file($file['tmp_name'], $destination . $file['name']);
      }
    }
  } else {
    $error = "El archivo de imagenes no es escribible o no existe";
  }


}

?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>5</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
    }

    input {
        margin: .5rem 0
    }
    img{
        max-width: 300px;
    }
</style>
<body>
<form method="post" enctype="multipart/form-data">
  <label for="nombre">Nombre
    <input type="text" name="nombre">
  </label>
  <label for="apellidos">Apellidos
    <input type="text" name="apellidos">
  </label>
  <label for="fecha">
    <input type="date" name="fecha">
  </label>
  <input type="file" name="fichero1" id="">
  <input type="file" name="fichero2" id="">
  <input type="submit" name="submit" value="Enviar">
</form>

<?php if (isset($_POST["submit"])): ?>
  <?php if (!$error): ?>
    <p>Nombre:<?= $_POST["nombre"] ?></p>
    <p>Apellidos<?= $_POST["apellidos"] ?></p>
    <p>Fecha de nacimiento: <?= $_POST["fecha"] ?></p>
    <?php
    if ($_FILES["fichero1"]["tmp_name"]) {
      echo "<img src='images/" . $_FILES['fichero1']['name'] . "'>";
      echo "<br>";
      echo "tamaño de fichero1: " . $_FILES["fichero1"]["size"] . "bytes";
    }
    if ($_FILES["fichero2"]["tmp_name"]) {
      echo "<img src='images/" . $_FILES['fichero2']['name'] . "'>";
      echo "<br>";
      echo "tamaño de fichero2: " . $_FILES["fichero2"]["size"] . "bytes";
    }
    ?>
  <?php else: ?>
    <p><?= $error ?></p>
  <?php endif; ?>
<?php endif; ?>
</body>
</html>


