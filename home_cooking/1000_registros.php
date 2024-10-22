<?php
require_once "config.php";
$nombre_usuario = ['user1', 'user2', 'user3', 'user4', 'user5', 'user6', 'user7', 'user8', 'user9', 'user10', 'user11', 'user12', 'user13', 'user14', 'user15', 'user16', 'user17', 'user18', 'user19', 'user20', 'user22', 'user23', 'user24', 'user25', 'user26', 'user27', 'user28', 'user29', 'user30', 'user31', 'user32', 'user33', 'user34', 'user35', 'user36', 'user37', 'user38', 'user39', 'user40', 'user41', 'user42', 'user43', 'user44', 'user45', 'user46', 'user47', 'user48', 'user49', 'user50'];
$nombre = ['Johnathon', 'Anthony', 'Erasmo', 'Raleigh', 'Nancie', 'Tama', 'Camellia', 'Augustine', 'Christen', 'Luz', 'Diego', 'Lyndia ', 'Thomas', 'Georgianna', 'Leigha', 'Alejandro', 'Marqués', 'Joan', 'Stephania', 'Elroy', 'Zonia', 'Buffy', 'Sharie', 'Blythe', 'Gaylene', 'Elida', 'Randy', 'Margarete', 'Margarett', 'Dion', 'Tomi', 'Arden', 'Clora', 'Laine', 'Becki ', 'Margherita', 'Bong', 'Jeanice', 'Qiana', 'Lawanda', 'Rebecka', 'Maribel', 'Tami', 'Yuri', 'Michele', 'Rubi', 'Larisa', 'Lloyd', 'Tyisha', 'Samatha',];
$genero = [" Femenino ", " Masculino ", "indistinto"];
$pass = password_hash(trim(1), PASSWORD_BCRYPT);
$lorem = " Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus, harum minus fuga tempora dolore itaque ex reiciendis ut corrupti eius facilis sint asperiores quibusdam animi distintio, nostrum, quos obcaecati voluptatum. ";
$num = "qwertyuiopñlkjhgfdsazxcvbnm";
for ($i = 0; $i <= 50; $i++) {
  $user = str_shuffle($num);
  $user .= ' ';
  $name = $nombre[rand(0, COUNT($nombre) - 1)];
  $name .= ' ';
  $s = $genero[rand(0, COUNT($genero) - 1)];
  $s .= ' ';

  $cadena = "INSERT INTO usuarios(nombre_usuario, nombre, genero, mail, password) VALUES ( '" . $user  . "' , '" . $name . "' , '" . $s . "' , '" . $user . "@gmail.com','" . $pass . "') ";
  $resultado = mysqli_query($con, $cadena);
}

for ($i = 1; $i <= 1000; $i++) {
  $cadena = "INSERT INTO rango_usuarios(rango_id, usuario_id) 
				VALUES(" . rand(1, 2) . ", " . $i . ")";
  $resultado = mysqli_query($con, $cadena);
}

$cadena = "SELECT usuarios.id as 'id' FROM usuarios INNER JOIN rango_usuarios ON usuarios.id = rango_usuarios.usuario_id WHERE rango_usuarios.rango_id = 2";

$resultado = mysqli_query($con, $cadena);

?>
<form action="index.php">
  <input type="submit" value="volver a la pagina">
</form>