<?php
include("config.php");

$selectBarrio = "SELECT prov FROM adoptantes WHERE id = (SELECT MAX(id) FROM adoptantes)";
$resultado = mysqli_query($con, $selectBarrio);


$barrio = mysqli_fetch_array($resultado);

if (!$barrio) {
    echo "no llego la var";
}

?>

<select name="barr" class="form-select" REQUIRED>
    <!--Seleccion del barrio-->
    <label for="barr"></label>
    <?php

    switch ($barrio['prov']) {
        case "Seleccione su provincia"/*0*/: ?>
            <html>

            <head>
                <title>ponela bien</title>
                <meta http-equiv="Refresh" content="3;url=registro_adoptante1.php">
            </head>

            <body>
                <p> seleccione una provincia, se te va a redirigir automáticamente, en caso contrario, click <a href="registro_adoptante1.php">aquí</a></p>
            </body>

            </html> <?php
                    break;
                case "Bs As"/*1*/:
                    $bsas = ["Almirante Brown", "Avellaneda", "Berazategui", "Berisso", "Brandsen", "Campana", "Cañuelas", "Ensenada", "Escobar", "Esteban Echeverría", "Exaltación de la Cruz", "Ezeiza", "Florencio Varela", "General Las Heras", "General Rodríguez", "General San Martín", "Hurlingham", "Ituzaingó", "José C. Paz", "La Matanza", "La Plata", "Lanús", "Lomas de Zamora", "Luján", "Malvinas Argentinas", "Marcos Paz", "Merlo", "Moreno", "Morón", "Pilar", "Presidente Perón", "Quilmes", "San Fernando", "San Isidro", "San Miguel", "San Vicente", "Tigre", "Tres de Febrero", "Vicente López", "Zárate"];
                    foreach ($bsas as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option><!--a-->"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "CABA"/*2*/:
                    $caba = ["Agronomía", "Almagro", "Balvanera", "Barracas", "Belgrano", "Boedo", "Caballito", "Chacarita", "Coghlan", "Colegiales", "Constitución", "Flores", "Floresta", "La Boca", "La Paternal", "Liniers", "Mataderos", "Monte Castro", "Montserrat", "Nueva Pompeya", "Nuñez", "Palermo", "Parque Avellaneda", "Parque Chacabuco", "Parque Chas", "Parque Patricios", "Puerto Madero", "Recoleta", "Retiro", "Saavedra", "San Cristóbal", "San Nicolás", "San Telmo", "Versalles", "Villa Crespo", "Villa Devoto", "Villa General Mitre", "Villa Lugano", "Villa Luro", "Villa Ortúzar", "Villa Pueyrredón", "Villa Real", "Villa Riachuelo", "Villa Santa Rita", "Villa Soldati", "Villa Urquiza", "Villa del Parque", "Vélez Sarsfield"];
                    foreach ($caba as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option><!--a-->"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Catamarca"/*3*/:
                    $catamarca = ["Ambato", "Ancasti", "Andalgalá", "Antofagasta de la Sierra", "Belén", "Capayán", "Capital", "El Alto", "Esquiú", "Fray Mamerto", "La Paz", "Paclín", "Pomán", "Santa María", "Santa Rosa", "Tinogasta", "Valle Viejo"];
                    foreach ($catamarca as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option><!--a-->"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Chaco"/*4*/:
                    $chaco = ["Almirante Brown", "Bermejo", "Chacabuco", "Comandante Fernández", "Doce de Octubre", "Dos de Abril", "Fray Justo Santa María de Oro", "General Belgrano", "General Donovan", "General Güemes", "Independencia", "Libertad", "Libertador General San Martin", "Maipú", "Mayor Luis Jorge Fontana", "Nueve de Julio", "O'Higgins", "Presidencia de la Plaza", "Primero de Mayo", "Quitilipi", "San Fernando", "San Lorenzo", "Sargento Cabral", "Tapenagá", "Veinticinco de Mayo"];
                    foreach ($chaco as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option><!--a-->"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Chubut"/*5*/:
                    $chubut = ["Atlántico", "Biedma", "Cushamen", "Escalante", "Florentino Ameghino", "Futaleufú", "Gaiman", "Gastre", "Languiñeo", "Mártires", "Paso de Indios", "Rawson", "Río Senguer", "Sarmiento", "Tehuelches", "Telsen"];
                    foreach ($chubut as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option><!--a-->"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Córdoba"/*6*/:
                    $cordoba = ["Calamuchita", "Capital", "Colón", "Cruz del Eje", "General Roca", "General San Martín", "Ischilín", "Juárez Celman", "Marcos Juárez", "Minas", "Pocho", "Presidente Roque Sáenz Peña", "Punilla", "Río Cuarto", "Río Primero", "Río Seco", "Río Segundo", "San Alberto", "San Javier", "San Justo", "Santa María", "Sobremonte", "Tercero Arriba", "Totoral", "Tulumba", "Union"];
                    foreach ($cordoba as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Corrientes"/*7*/:
                    $corrientes = ["Bella Vista", "Berón de Astrada", "Capital", "Concepción", "Curuzú Cuatiá", "Empedrado", "Esquina", "General Alvear", "General Paz", "Goya", "Itatí", "Ituzaingó", "Lavalle", "Mburucuyá", "Mercedes", "Monte Caseros", "Paso de los Libres", "Saladas", "San Cosme", "San Luis del Palmar", "San Martín", "San Miguel", "San Roque", "Santo Tomé", "Sauce"];
                    foreach ($corrientes as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Entre Ríos"/*8*/:
                    $entre_rios = ["Colón", "Concordia", "Diamante", "Federación", "Federal", "Feliciano", "Gualeguay", "Gualeguaychú", "Islas del Ibicuy", "La Paz", "Nogoyá", "Paraná", "San Salvador", "Tala", "Uruguay", "Victoria", "Villaguay"];
                    foreach ($entre_rios as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Formosa"/*9*/:
                    $formosa = ["Bermejo", "Formosa", "Laishi", "Matacos", "Patiño", "Pilagás", "Pilcomayo", "Pirané", "Ramón Lista"];
                    foreach ($formosa as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Jujuy"/*10*/:
                    $jujuy = ["9 de Julio", "Aeroclub", "Almirante Brown", "Alto Éxodo", "Alto Gorriti", "Alto la Viña", "Alto Padilla", "Atalaya de los Huaicos", "Azopardo", "Bajo Éxodo", "Bajo Gorriti", "Bajo la Viña", "Bicentenario", "Campo Verde", "Centro", "Cerro Las Rosas", "Chijra", "Ciudad de Nieva", "Constitución", "Coronel Arias", "Cuyaya", "El Chingo", "El Progreso", "Higuerillas", "Huaico Chico", "Huaico Hondo", "Islas Malvinas", "Las Marias", "Los Molinos", "Los Naranjos", "Los Noveiro", "Los Perales", "Mariano Moreno", "Norte", "Primero de Marzo", "Punta Diamante", "San Francisco de Álava", "San Guillermo", "San Isidro", "San Pedrito", "Sargento Cabral", "Suipacha", "Tupac Amaru", "Veintitrés de Agosto", "Villa Belgrano", "Villa Jardín de Reyes", "Villa San Martín"];
                    foreach ($jujuy as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "La Pampa"/*11*/:
                    $la_pampa = ["Atreucó", "Caleu Caleu", "Capital", "Catriló", "Chalileo", "Chapaleufú", "Chical Co", "Conhelo", "Curacó", "Guatraché", "Hucal", "Lihuel Calel", "Limay Mahuida", "Loventué", "Maracó", "Puelén", "Quemú Quemú", "Rancul", "Realicó", "Toay", "Trenel", "Utracán"];
                    foreach ($la_pampa as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "La Rioja"/*12*/:
                    $la_rioja = ["Arauco", "Capital", "Castro Barros", "Chamical", "Chilecito", "Coronel Felipe Varela", "Famatina", "General Ángel V. Peñaloza", "General Belgrano", "General Juan Facundo Quiroga", "General Lamadrid", "General Ocampo", "General San Martín", "Independencia", "Rosario Vera Peñaloza", "San Blas de los Sauces", "Sanagasta", "Vinchina"];
                    foreach ($la_rioja as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Mendoza"/*13*/:
                    $mendoza = ["Capital", "General Alvear", "Godoy Cruz", "Guaymallén", "Junín", "La Paz", "Las Heras", "Lavalle", "Luján de Cuyo", "Maipú", "Malargüe", "Rivadavia", "San Carlos", "General San Martín", "San Rafael", "Santa Rosa", "Tunuyán", "Tupungato"];
                    foreach ($mendoza as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Misiones"/*14*/:
                    $misiones = ["Apóstoles", "Cainguás", "Candelaria", "Capital", "Concepción", "Eldorado", "General Manuel Belgrano", "Guaraní", "Iguazú", "Leandro N. Alem", "Libertador General San Martin", "Montecarlo", "Oberá", "San Ignacio", "San Javier", "San Pedro", "25 de Mayo"];
                    foreach ($misiones as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Neuquén"/*15*/:
                    $neuquen = ["Aluminé", "Añelo", "Las Coloradas", "Chos Malal", "Piedra del Águila", "Neuquén", "Junín de los Andes", "San Martín de Los Andes", "Loncopué", "Villa La Angostura", "Andacollo", "El Huecú", "Buta Ranquil", "Picún Leufú", "Las Lajas", "Zapala"];
                    foreach ($neuquen as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Río Negro"/*16*/:
                    $rio_negro = ["Choele Choel", "El Cuy", "General Conesa", "General Roca", "Maquinchao", "Ñorquincó", "Pilcaniyeu", "Río Colorado", "San Antonio Oeste", "San Carlos de Bariloche", "Sierra Colorada", "Valcheta", "Viedma"];
                    foreach ($rio_negro as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Salta"/*17*/:
                    $salta = ["Anta", "Cachi", "Cafayate", "Capital", "Cerrillos", "Chicoana", "General Güemes", "General José de San Martin", "Guachipas", "Iruya", "La Caldera", "La Candelaria", "La Poma", "La Viña", "Los Andes", "Metán", "Molinos", "Orán", "Rivadavia", "Rosario de la Frontera", "Rosario de Lerma", "San Carlos", "Santa Victoria"];
                    foreach ($salta as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "San Juan"/*18*/:
                    $san_juan = ["Albardón", "Angaco", "Calingasta", "Capital", "Caucete", "Chimbas", "Iglesia", "Jáchal", "9de julio", "Pocito", "Rawson", "Rivadavia", "San Martin", "Santa Lucía", "Sarmiento", "Ullum", "Valle Fértil", "25 de mayo", "Zonda"];
                    foreach ($san_juan as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "San Luis"/*19*/:
                    $san_luis = ["Ayacucho", "Belgrano", "Chacabuco", "Coronel Pringles", "General Pedernera", "Gobernador Dupuy", "Juan Martín de Pueyrredón", "Junin", "Libertador General San Martín", "San Luis"];
                    foreach ($san_luis as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Santa Cruz"/*20*/:
                    $santa_cruz = ["Río Gallegos", "Caleta Olivia", "Pico Truncado", "Las Heras", "El Calafate", "Puerto Deseado", "Río Turbio", "Puerto San Julián", "Piedrabuena", "Veintiocho", "Rural dispersa", "Perito Moreno", "Gregores", "Santa Cruz", "Los Antiguos", "El Chaltén"];
                    foreach ($santa_cruz as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Santa Fe"/*21*/:
                    $santa_fe = ["Rosario", "La Capital", "General López", "Castellanos", "General Obligado", "San Lorenzo", "Las Colonias", "Constitución", "Caseros", "San Jerónimo", "San Cristóbal", "Iriondo", "San Martín", "Vera", "Belgrano", "San Justo", "San Javier", "9 de Julio", "Garay"];
                    foreach ($santa_fe as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Santiago del Estero"/*22*/:
                    $santiago_del_estero = ["Aguirre", "Alberdi", "Atamisqui", "Avellaneda", "Banda", "Belgrano", "Choya", "Copo", "Figueroa", "General Taboada", "Guasayán", "Jiménez", "Juan Felipe Ibarra", "Juan Francisco Borges", "Loreto", "Mitre", "Moreno", "Ojo de Agua", "Pellegrini", "Quebrachos", "Río Hondo", "Rivadavia", "Robles", "Salavina", "San Martín", "Sarmiento", "Silípica"];
                    foreach ($santiago_del_estero as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Tierra del Fuego"/*23*/:
                    $tierra_del_fuego = ["Rio Grande", "Tolhuin", "Ushiaia"];
                    foreach ($tierra_del_fuego as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
                case "Tucumán"/*24*/:
                    $Tucuman = ["Burruyacú", "Capital", "Chicligasta", "Cruz Alta", "Famaillá", "Graneros", "Juan Bautista Alberdi", "La Cocha", "Leales", "Lules", "Monteros", "Río Chico", "Simoca", "Tafí del Valle", "Tafí Viejo", "Trancas", "Yerba Buena"];
                    foreach ($jujuy as $barr) {
                        $barr = strtr($barr, " ", "_");
                        echo "<option value=$barr>", strtr($barr, "_", " "), "</option>"; // Aca se crea el desplegable con cada provincia
                    }
                    break;
            }
                    ?>
</select>
<?php
?>