<?php
require_once("config.php");

$firstname = ['Johnathon', 'Anthony', 'Erasmo', 'Raleigh', 'Nancie', 'Tama', 'Camellia', 'Augustine', 'Christeen', 'Luz', 'Diego', 'Lyndia', 'Thomas', 'Georgianna', 'Leigha', 'Alejandro', 'Marquis', 'Joan', 'Stephania', 'Elroy', 'Zonia', 'Buffy', 'Sharie', 'Blythe', 'Gaylene', 'Elida', 'Randy', 'Margarete', 'Margarett', 'Dion', 'Tomi', 'Arden', 'Clora', 'Laine', 'Becki', 'Margherita', 'Bong', 'Jeanice', 'Qiana', 'Lawanda', 'Rebecka', 'Maribel', 'Tami', 'Yuri', 'Michele', 'Rubi', 'Larisa', 'Lloyd', 'Tyisha', 'Samatha',];
$lastname = ['Mischke', 'Serna', 'Pingree', 'Mcnaught', 'Pepper', 'Schildgen', 'Mongold', 'Wrona', 'Geddes', 'Lanz', 'Fetzer', 'Schroeder', 'Block', 'Mayoral', 'Fleishman', 'Roberie', 'Latson', 'Lupo', 'Motsinger', 'Drews', 'Coby', 'Redner', 'Culton', 'Howe', 'Stoval', 'Michaud', 'Mote', 'Menjivar', 'Wiers', 'Paris', 'Grisby', 'Noren', 'Damron', 'Kazmierczak', 'Haslett', 'Guillemette', 'Buresh', 'Center', 'Kucera', 'Catt', 'Badon', 'Grumbles', 'Antes', 'Byron', 'Volkman', 'Klemp', 'Pekar', 'Pecora', 'Schewe', 'Ramage',];
$edades = ["2 semanas", "3 semanas", "1 mes", "2 meses", "3 meses", "4 meses", "5 meses", "6 meses", "7 meses", "8 meses", "9 meses", "10 meses", "11 meses", "1 año", "2 años", "3 años", "4 años", "5 años", "6 años", "7 años", "8 años", "9 años", "10 años", "11 años", "12 años", "13 años", "14 años", "15 años", "16 años", "17 años", "18 años", "19 años", "20 años"];
$nosi = ["Si", "No"];
$actNiv = ["Activo", "Moderado", "Sedentario"];
$sexo = ["Hembra", "Macho"];
$animal = ["Gato", "Perro"];
$tamano = ["Pequeño", "Mediano", "Grande"];
$pass = password_hash(trim(1), PASSWORD_BCRYPT);
$lorem = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus, harum minus fuga tempora dolore itaque ex reiciendis ut corrupti eius facilis sint asperiores quibusdam animi distinctio, nostrum, quos obcaecati voluptatum.";

//SELECT usuarios.id, rol_usuarios.rol_id, usuarios.nombre FROM usuarios INNER JOIN rol_usuarios ON usuarios.id = rol_usuarios.usuario_id WHERE rol_usuarios.rol_id = 2

$cadena = "SELECT MAX(id) FROM mascotas";
$resultado = mysqli_query($con, $cadena);
$maxMas = mysqli_fetch_assoc($resultado);
$maxMas = $maxMas['MAX(id)'];
if (!$maxMas) {
	$maxMas = 0;
}

if (quiereUsuarios) {
	for ($i = 0; $i <= regUsu; $i++) {
		$name = $firstname[rand(0, count($firstname) - 1)];
		$name .= ' ';
		$name .= $lastname[rand(0, count($lastname) - 1)];




		$prov = rand(1, 24);
		switch ($prov) {
			case 1:
				$barr = rand(1, 40);
				break;
			case 2:
				$barr = rand(41, 88);;
				break;
			case 3:
				$barr = rand(89, 105);;
				break;
			case 4:
				$barr = rand(106, 130);;
				break;
			case 5:
				$barr = rand(131, 146);;
				break;
			case 6:
				$barr = rand(147, 172);;
				break;
			case 7:
				$barr = rand(173, 197);;
				break;
			case 8:
				$barr = rand(198, 214);;
				break;
			case 9:
				$barr = rand(215, 223);;
				break;
			case 10:
				$barr = rand(224, 270);;
				break;
			case 11:
				$barr = rand(271, 291);;
				break;
			case 12:
				$barr = rand(292, 308);;
				break;
			case 13:
				$barr = rand(309, 326);;
				break;
			case 14:
				$barr = rand(327, 343);;
				break;
			case 15:
				$barr = rand(344, 359);;
				break;
			case 16:
				$barr = rand(360, 372);;
				break;
			case 17:
				$barr = rand(373, 394);;
				break;
			case 18:
				$barr = rand(395, 413);;
				break;
			case 19:
				$barr = rand(414, 423);;
				break;
			case 20:
				$barr = rand(424, 439);;
				break;
			case 21:
				$barr = rand(440, 458);;
				break;
			case 22:
				$barr = rand(459, 485);;
				break;
			case 23:
				$barr = rand(486, 488);;
				break;
			case 24:
				$barr = rand(489, 505);;
				break;
		}

		$cadena = "INSERT INTO usuarios(provincia_id, barrio_id, nombre, contrasena, mail, telefono, cumpleanios, edad) 
				VALUES (" . $prov . ", " . $barr . ", '" . $name . "', '" . $pass . "', '" . $name . "@gmail.com ', '11" . rand(11111111, 1099) . "', '2005-10-20', " . rand(16, 60) . ")";
		$resultado = mysqli_query($con, $cadena);
	}
}

if (quiereMascotas) {
	for ($i = 0; $i <= regMasc; $i++) {
		$name = $firstname[rand(0, count($firstname) - 1)];
		$edad = $edades[rand(0, count($edades) - 1)];
		$act = $actNiv[rand(0, count($actNiv) - 1)];
		$cadena = "INSERT INTO mascotas(nombre, edad, vacunado, sexo, animal, tamano, esterlizado, peso, desparasitado, nivel_de_actividad, necesidades, requisitos, historia, especificaciones) 

				VALUES ('" . $name . "', '" . $edad . "', '" . $nosi[rand(0, count($nosi) - 1)] . "', '" . $sexo[rand(0, count($sexo) - 1)] . "', '" . $animal[rand(0, count($animal) - 1)] . "', '" . $tamano[rand(0, count($tamano) - 1)] . "', '" . $nosi[rand(0, count($nosi) - 1)] . "', '" . rand(6, 12) / rand(1, 6) . "', '" . $nosi[rand(0, count($nosi) - 1)] . "', '$act', '" . $lorem . "', '" . $lorem . "', '" . $lorem . "', '" . $lorem . "')";
		$resultado = mysqli_query($con, $cadena);
	}
}


if (quiereUsuarios) {
	$cadena = "SELECT MAX(id) as id FROM usuarios";
	$resultado = mysqli_query($con, $cadena);
	$lastId = mysqli_fetch_assoc($resultado);

	for ($i = 1; $i <= $lastId['id']; $i++) {
		$cadena = "INSERT INTO rol_usuarios(rol_id, usuario_id) 

				VALUES (" . rand(1, 2) . ", " . $i . ")";
		$resultado = mysqli_query($con, $cadena);
	}
}

$cadena = "SELECT usuarios.id as 'id' FROM usuarios INNER JOIN rol_usuarios ON usuarios.id = rol_usuarios.usuario_id WHERE rol_usuarios.rol_id = 2;";

$resultado = mysqli_query($con, $cadena);
$usuarios_org = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

$cant_usuarios_org = count($usuarios_org) - 1;

$cadena = "SELECT mascotas.id as 'id' FROM mascotas";

$resultado = mysqli_query($con, $cadena);
$cantMasc = mysqli_fetch_all($resultado, MYSQLI_ASSOC);


for ($i = 0; $i <= count($cantMasc); $i++) {
	$rand = rand(1, (count($usuarios_org) - 1));
	$cadena = "INSERT INTO mascotas_organizaciones(mascota_id, usuario_id) 
				VALUES (" . ++$maxMas . ", " . $usuarios_org[$rand]['id'] . ")";
	$resultado = mysqli_query($con, $cadena);
}

?>
<form action="index.php">
	<input type="submit" value="volver a la pagina">
</form>