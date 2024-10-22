<?php
require_once "includes/config.php";

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}
if (!in_a("admin", $_SESSION['usuario']['rangos'])) {
    header("Location: my_profile.php");
}

function generar_texto($cant)
{
    $palabras = array(
        "que", "de", "no", "a", "la", "el", "es", "y", "en", "lo", "un", "por", "qué", "me", "una", "te", "los", "se", "con", "para", "mi", "está", "si", "bien", "pero", "yo", "eso", "las", "sí", "su", "tu", "aquí", "del", "al", "como", "le", "más", "esto", "ya", "todo", "esta", "vamos", "muy", "hay", "ahora", "algo", "estoy", "tengo", "nos", "tú", "nada", "cuando", "ha", "este", "sé", "estás", "así", "puedo", "cómo", "quiero", "sólo", "soy", "tiene", "gracias", "o", "él", "bueno", "fue", "ser", "hacer", "son", "todos", "era", "eres", "vez", "tienes", "creo", "ella", "he", "ese", "voy", "puede", "sabes", "hola", "sus", "porque", "dios", "quién", "nunca", "dónde", "quieres", "casa", "favor", "esa", "dos", "tan", "señor", "tiempo", "verdad", "estaba", "mejor", "están", "va", "hombre", "usted", "mucho", "hace", "entonces", "siento", "tenemos", "puedes", "ahí", "ti", "vida", "ver", "alguien", "sr", "hasta", "sin", "mí", "solo", "años", "sobre", "decir", "uno", "siempre", "oh", "ir", "cosas", "también", "antes", "has", "ni", "mis", "día", "estar", "estamos", "noche", "nadie", "otra", "quiere", "parece", "nosotros", "poco", "padre", "trabajo", "gente", "mira", "vas", "sea", "les", "donde", "mismo", "hecho", "ellos", "dijo", "pasa", "dinero", "hijo", "tal", "otro", "hablar", "seguro", "claro", "estas", "lugar", "mundo", "amigo", "espera", "han", "tus", "sabe", "después", "momento", "desde", "fuera", "cosa", "tipo", "mañana", "podemos", "dije", "gran", "necesito", "estado", "podría", "acuerdo", "papá", "tener", "dice", "mío", "crees", "buena", "gusta", "nuestro", "nuevo", "será", "haciendo", "días", "nombre", "buen", "había", "ven", "tres", "menos", "debe", "tenía", "mal", "conmigo", "madre", "hoy", "quien", "sido", "mamá", "tienen", "luego", "todas", "allí", "toda", "hora", "mujer", "visto", "haces", "importa", "contigo", "ve", "tarde", "oye", "hemos", "amigos", "chica", "cariño", "lado", "allá", "entre", "minutos", "digo", "algún", "serio", "cuidado", "pasó", "segundo", "aunque", "pueda", "dime", "igual", "comida", "ay", "cuerpo", "encontrar", "fuerte", "vuelta", "venga", "creer", "realidad", "saben", "deberías", "pregunta", "fui", "cuatro", "sra", "primer", "meses", "cuarto", "éste", "escuela", "esté", "dólares", "tío", "posible", "tuve", "fácil", "preocupes", "jack", "luz", "eran", "carajo", "final", "lista", "trata", "armas", "hermana", "exactamente", "chicas", "podía", "bastante", "seguridad", "pasando", "esperando", "acá", "teléfono", "perro", "fuego", "murió", "tampoco", "sola", "estuvo", "verte", "iré", "tenido", "culpa", "veras", "adónde", "buscando", "cuanto", "padres", "paz", "demonios", "estará", "cual", "perdón", "asi", "jugar", "pensando", "esperar", "sabemos", "recuerdo", "par", "joven", "seguir", "pueblo", "tenga", "caballeros", "idiota", "dio", "minuto", "bebé", "única", "lejos", "nuestras", "plan", "pienso", "sentido", "dormir", "digas", "palabra", "correcto", "control", "vemos", "entiendes", "país", "seis", "último", "ésta", "diga", "podrías", "pequeña", "cállate", "trato", "rey", "sucede", "sam", "muchachos", "jamás", "cama", "srta", "ayudar", "acerca", "di", "cambio", "falta", "hospital", "lleva", "presidente", "mil", "gusto", "conoces", "diciendo", "os", "ido", "general", "extraño", "semanas", "coche", "peor", "mucha", "disculpe", "diré", "anoche", "perder", "vámonos", "nave", "cielo", "habrá", "orden", "segura", "querida", "niña", "michael", "increíble", "además", "deben", "libro", "calle", "café", "piensas", "hacemos", "especial", "queremos", "ia", "clark", "irme", "perfecto", "buscar", "odio", "piensa", "oficina", "hablas", "libre", "agente", "york", "llamar", "mala", "detrás", "viste", "dile", "grandes", "recuerdas", "real", "estaban", "mía", "frente", "perdido", "llamo", "muertos", "millones", "asesino", "sueño", "quisiera", "habría", "hará", "viaje", "probablemente", "peter", "resto", "estaré", "maldición", "lamento", "muchacho", "avión", "ropa", "fuerza", "llamado", "oído", "frank", "dado", "encima", "negro", "usar", "información", "uds", "preguntas", "tuvo", "secreto", "vuelve", "miren", "quieras", "haría", "acaba", "otras", "incluso", "sientes", "deberíamos", "haz", "decirte", "boca", "dolor", "baño", "adentro", "profesor", "habitación", "daño", "tuyo", "seas", "noticias", "demás", "querido", "duro", "poner", "prueba", "mire", "tonto", "campo", "siendo", "diez", "ése", "tranquilo", "asunto", "acabó", "quédate", "derecho", "placer", "recuerda", "estuve", "tratando", "ejército", "futuro", "llevar", "compañía", "venido", "listos", "haremos", "sitio", "verlo", "puesto", "atención", "sino", "cambiar", "error", "blanco", "raro", "palabras", "llegó", "sal", "pase", "mente", "sistema", "película", "anda", "ello", "negocio", "novia", "permiso", "creí", "suena", "ocurre", "oficial", "espere", "aire", "george", "mató", "harry", "regresar", "vio", "hazlo", "trasero", "grupo", "entendido", "señorita", "música", "perra", "conoce", "empezar", "siente", "acabo", "estúpido", "diferente", "traje", "modo", "james", "encontré", "mensaje", "llamada", "navidad", "eras", "pena", "largo", "entra", "piso", "foto", "dijeron", "médico", "accidente", "fuiste", "imposible", "podríamos", "línea", "propia", "barco", "ganar", "normal", "segundos", "vive", "mitad", "quiera", "tras", "decirle", "lindo", "funciona", "programa", "vine", "abre", "sean", "pagar", "fotos", "centro", "supone", "basura", "situación", "mejores", "vienen", "encanta", "marido", "personal", "maestro", "hambre", "ataque", "dale", "pie", "conseguir", "trabajando", "gracioso", "dejó", "pudo", "derecha", "izquierda", "próxima", "pobre", "respuesta", "tipos", "sentir", "tenías", "pude", "darle", "voz", "amiga", "gustan", "vista", "salvo", "loca", "hotel", "hicieron", "ten", "temo", "señal", "pelo", "llevo", "ayer", "das", "nena", "servicio", "tren", "tom", "bonito", "mes", "tendrá", "tendrás", "edad", "ellas", "hermosa", "ben", "honor", "simplemente", "llamas", "tengas", "corre", "baja", "sol", "siéntate", "dan", "humano", "divertido", "sexo", "vuelto", "peligro", "mesa", "jimmy", "siguiente", "hablo", "disculpa", "decirme", "joe", "caja", "negocios", "misión", "silencio", "sale", "llegado", "estaría", "regreso", "media", "estan", "propio", "charlie", "oro", "enseguida", "linda", "prometo", "esposo", "norte", "hubo", "juro", "muerta", "interesante", "pensaba", "busca", "terminar", "tendré", "completamente", "cita", "siete", "cumpleaños", "abogado", "alrededor", "cerebro", "porqué", "llave", "santo", "hermoso", "necesario", "edificio", "irnos", "aun", "tendremos", "vayas", "doy", "trae", "salió", "ley", "ahi", "verdadero", "pelea", "banco", "terrible", "calma", "cena", "daré", "gobierno", "comprar", "creen", "sargento", "destino", "bob", "existe", "hacía", "novio", "sala", "través", "regalo", "iglesia", "decía", "cualquiera", "excelente", "esperen", "deseo", "alma", "diablo", "deje", "cuántos", "espada", "estábamos", "carne", "maravilloso", "vidas", "sucedió", "oí", "peligroso", "dirección", "libertad", "jesús", "ocurrió", "veré", "sueños", "pudiera", "detective", "sorpresa", "tuya", "pies", "club", "terminado", "infierno", "creía", "luna", "salvar", "carta", "estés", "cielos", "teniente", "encuentra", "david", "veamos", "quise", "escúchame", "necesitan", "ambos", "decisión", "roma", "enemigo", "hicimos", "éi", "dulce", "pruebas", "querías", "abuelo", "totalmente", "mirando", "vayan", "carrera", "vuelo", "ante", "bienvenido", "harás", "encontramos", "encontrado", "contacto", "posición", "saberlo", "planeta", "humanos", "coronel", "junto", "diría", "ésa", "base", "oír", "suelo", "pelear", "ayudarte", "pistola", "frío", "comandante", "partes", "llega", "verás", "sur", "iremos", "rato", "mar", "espacio", "asesinato", "ventana", "prisa", "tienda", "cámara", "puedas", "según", "broma", "reunión", "despierta", "sacar", "tí", "segunda", "papel", "locura", "departamento", "horrible", "enfermo", "pregunto", "cárcel", "órdenes", "intento", "isla", "salida", "llamó", "volveré", "usa", "gato", "paul", "hagan", "dejes", "duele", "vengan", "crimen", "esperaba", "causa", "bar", "seré", "ocho", "temprano", "río", "relación", "drogas", "luces", "bromeando", "ojalá", "hablamos", "trabaja", "irse", "libros", "radio", "mary", "ray", "bill", "vienes", "quedan", "excepto", "brazo", "tome", "rojo", "conocido", "universidad", "investigación", "batalla", "reglas", "cargo", "hogar", "ninguno", "dieron", "vuelva", "sabías", "respeto", "estación", "corte", "paciente", "encuentro", "energía", "dejado", "baile", "fbi", "abuela", "caliente", "vieja", "viendo", "veremos", "rayos", "simple", "bailar", "papa", "triste", "zona", "serás", "guardia", "canción", "salud", "escuchar", "parar", "mike", "estarás", "cenar", "max", "soldados", "caballo", "serán", "estaremos", "interesa", "volar", "principio", "nivel", "cálmate", "conocer", "finalmente", "alegro", "debajo", "podrían", "bosque", "bonita", "bolsa", "pone", "importantes", "apuesta", "jean", "directamente", "recuperar", "pongo", "llegaron", "cobarde", "cantidad", "sucio", "habia", "emperador", "mono", "encontraremos", "disparen", "gloria", "contrario", "socorro", "sir", "escaleras", "seth", "pasos", "nuevamente", "derechos", "obtener", "guste", "búsqueda", "helado", "fútbol", "sexual", "polvo", "aseguro", "rostro", "robado", "policia"
    );
    $palabra = "";
    for ($i = 0; $i < $cant; $i++) {
        $number = rand(0, count($palabras) - 1);
        if ($i != 0) {
            $palabra = $palabra . " " . $palabras[$number];
        } else {
            $array_str = str_split($palabras[$number]);
            $array_str[0] = strtoupper($array_str[0]);
            $palabra = implode("", $array_str);
        }
    }
    return $palabra;
}
function randomName()
{
    $firstname = array(
        'Johnathon',
        'Anthony',
        'Erasmo',
        'Raleigh',
        'Nancie',
        'Tama',
        'Camellia',
        'Augustine',
        'Christeen',
        'Luz',
        'Diego',
        'Lyndia',
        'Thomas',
        'Georgianna',
        'Leigha',
        'Alejandro',
        'Marquis',
        'Joan',
        'Stephania',
        'Elroy',
        'Zonia',
        'Buffy',
        'Sharie',
        'Blythe',
        'Gaylene',
        'Elida',
        'Randy',
        'Margarete',
        'Margarett',
        'Dion',
        'Tomi',
        'Arden',
        'Clora',
        'Laine',
        'Becki',
        'Margherita',
        'Bong',
        'Jeanice',
        'Qiana',
        'Lawanda',
        'Rebecka',
        'Maribel',
        'Tami',
        'Yuri',
        'Michele',
        'Rubi',
        'Larisa',
        'Lloyd',
        'Tyisha',
        'Samatha',
    );

    $lastname = array(
        'Mischke',
        'Serna',
        'Pingree',
        'Mcnaught',
        'Pepper',
        'Schildgen',
        'Mongold',
        'Wrona',
        'Geddes',
        'Lanz',
        'Fetzer',
        'Schroeder',
        'Block',
        'Mayoral',
        'Fleishman',
        'Roberie',
        'Latson',
        'Lupo',
        'Motsinger',
        'Drews',
        'Coby',
        'Redner',
        'Culton',
        'Howe',
        'Stoval',
        'Michaud',
        'Mote',
        'Menjivar',
        'Wiers',
        'Paris',
        'Grisby',
        'Noren',
        'Damron',
        'Kazmierczak',
        'Haslett',
        'Guillemette',
        'Buresh',
        'Center',
        'Kucera',
        'Catt',
        'Badon',
        'Grumbles',
        'Antes',
        'Byron',
        'Volkman',
        'Klemp',
        'Pekar',
        'Pecora',
        'Schewe',
        'Ramage',
    );

    $name = $firstname[rand(0, count($firstname) - 1)];
    $name .= ' ';
    $name .= $lastname[rand(0, count($lastname) - 1)];

    return $name;
}

function usuarios($link, $tabla = "usuarios")
{
    $query = "SELECT COUNT(*) FROM $tabla";
    $cu = consulta($query, $link, 1);
    $ru = 0;
    do {
        $ru = rand(5, 999);
    } while ($ru > $cu["COUNT(*)"]);
    $query = "SELECT id FROM $tabla WHERE fecha_baja IS NULL ORDER BY RAND() LIMIT 0," . $ru;
    $cu = consulta($query, $link);
    return $cu;
}

if (isset($_POST['tabla'])) {
    $tabla = $_POST['tabla'];
    $limit = 10;
    $fecha_alta = date("Y-m-d h:i:s", time());
    $caracteres = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    if ($tabla == "informes") {
        $usuarios = usuarios($link);
        $titulos = array();
        for ($i = 0; $i < $limit; $i++) {
            $cant = rand(3, 15);
            $titulo = generar_texto($cant);
            $titulos[] = $titulo;
        }
        $contenidos = array();
        for ($i = 0; $i < $limit; $i++) {
            $cant = rand(50, 500);
            $contenido = generar_texto($cant);
            $contenidos[] = $contenido;
        }
        $encabezados = array();
        for ($i = 0; $i < $limit; $i++) {
            $cant = rand(15, 35);
            $encabezado = generar_texto($cant);
            $encabezados[] = $encabezado;
        }
        if (isset($contenidos) && isset($titulos) && isset($encabezados)) {
            $query = "INSERT INTO informes(titulo,contenido,encabezado,fecha_alta) VALUES";
            $siono = false;
            for ($i = 0; $i < $limit; $i++) {
                $tr = rand(0, 9);
                $query = $query . "('" . $titulos[$tr] . "',";
                $cr = rand(0, 9);
                $query = $query . "'" . $contenidos[$cr] . "',";
                $er = rand(0, 9);
                $query = $query . "'" . $encabezados[$er] . "','" . $fecha_alta . "')";
                if ($i != $limit - 1) {
                    $query .= ",";
                }
                $siono = true;
            }
            if ($siono == true) {
                consulta($query, $link, 4);
                header("Location: my_profile.php");
            }
        }
    } else if ($tabla == "usuarios") {
        $query = "INSERT INTO usuarios(user_name,password,email,foto,fecha_alta) VALUES";
        $query1 = "SELECT id FROM usuarios WHERE ";
        for ($i = 0; $i < $limit; $i++) {
            $user_name = randomName();
            $password = "";
            for ($j = 0; $j < 9; $j++) {
                $ru = rand(0, count($caracteres) - 1);
                $password .= $caracteres[$ru];
            }
            $email = $user_name . "@gmail.com";
            $foto = "../../pajarito.jpg";
            $query .= "('$user_name',MD5('$password'),'$email','$foto','$fecha_alta')";
            $query1 .= "(user_name = '$user_name' AND password = MD5('$password'))";
            if ($i != $limit - 1) {
                $query .= ",";
                $query1 .= " OR ";
            }
        }
        consulta($query, $link, 4);
        $ids = consulta($query1, $link);
        $query = "INSERT INTO rango_usuario(rango_id,usuario_id,fecha_alta) VALUES";
        for ($i = 0; $i < count($ids); $i++) {
            $query .= "(1,".$ids[$i]['id'].",'$fecha_alta')";
            if ($i != count($ids) - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    } else if ($tabla == "rango_usuario") {
        $query = "SELECT * FROM rangos";
        $rangos = consulta($query, $link);
        $usuarios = usuarios($link);
        $query = "INSERT INTO rango_usuario(rango_id,usuario_id,fecha_alta) VALUES";
        for ($i = 0; $i < $limit; $i++) {
            $ru = rand(0, count($rangos) - 1);
            $rango_id = $rangos[$ru]['id'];
            $ru = rand(0, count($usuarios) - 1);
            $usuario_id = $usuarios[$ru]['id'];
            $query .= "($rango_id,$usuario_id,'$fecha_alta')";
            if ($i != $limit - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    } else if ($tabla == "informe_likes" || $tabla == "informe_vistas" || $tabla == "favoritos") {
        $usuarios = usuarios($link);
        $informes = usuarios($link, "informes");
        $query = "INSERT INTO $tabla(usuario_id,informe_id,fecha_alta) VALUES";
        for ($i = 0; $i < $limit; $i++) {
            $ru = rand(0, count($usuarios) - 1);
            $usuario_id = $usuarios[$ru]['id'];
            $ru = rand(0, count($informes) - 1);
            $informe_id = $informes[$ru]['id'];
            $query .= "($usuario_id,$informe_id,'$fecha_alta')";
            if ($i != $limit - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    } else if ($tabla == "moderaciones") {
        $usuarios = usuarios($link);
        $informes = usuarios($link, "informes");
        $query = "INSERT INTO $tabla(usuario_id,informe_id,moderacion,fecha_alta,tipo) VALUES";
        for ($i = 0; $i < $limit; $i++) {
            $ru = rand(0, count($usuarios) - 1);
            $usuario_id = $usuarios[$ru]['id'];
            $ru = rand(0, count($informes) - 1);
            $informe_id = $informes[$ru]['id'];
            $ru = rand(30, 70);
            $moderacion = generar_texto($ru);
            $ru = rand(0, 1);
            $cat = array("informe", "comentario");
            $query .= "($usuario_id,$informe_id,'$moderacion','$fecha_alta','" . $cat[$ru] . "')";
            if ($i != $limit - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    } else if ($tabla == "donaciones") {
        $usuarios = usuarios($link);
        $query = "INSERT INTO $tabla(importe,usuario_id,fecha_alta) VALUES";
        for ($i = 0; $i < $limit; $i++) {
            $ru = rand(0, count($usuarios) - 1);
            $usuario_id = $usuarios[$ru]['id'];
            $ru = rand(100, 10000);
            $query .= "($ru,$usuario_id,'$fecha_alta')";
            if ($i != $limit - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    } else if ($tabla == "comentarios") {
        $usuarios = usuarios($link);
        $informes = usuarios($link, "informes");
        $query = "INSERT INTO $tabla(usuario_id,comentario,informe_id,fecha_alta) VALUES";
        for ($i = 0; $i < $limit; $i++) {
            $ru = rand(0, count($usuarios) - 1);
            $usuario_id = $usuarios[$ru]['id'];
            $ru = rand(0, count($informes) - 1);
            $informe_id = $informes[$ru]['id'];
            $ru = rand(30, 70);
            $comentario = generar_texto($ru);
            $query .= "($usuario_id,'$comentario',$informe_id,'$fecha_alta')";
            if ($i != $limit - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    } else if ($tabla == "categoria_informe") {
        $informes = usuarios($link, "informes");
        $query = "SELECT id FROM categorias";
        $categorias = consulta($query, $link);
        $query = "INSERT INTO $tabla(categoria_id,informe_id,fecha_alta) VALUES";
        for ($i = 0; $i < $limit; $i++) {
            $ru = rand(0, count($categorias) - 1);
            $categoria_id = $categorias[$ru]['id'];
            $ru = rand(0, count($informes) - 1);
            $informe_id = $informes[$ru]['id'];
            $query .= "($categoria_id,$informe_id,'$fecha_alta')";
            if ($i != $limit - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    } else if ($tabla == "mensajes") {
        $usuarios = usuarios($link);
        $emisores = usuarios($link);
        $query = "INSERT INTO $tabla(usuario_id,emisor_id,mensaje,fecha_alta) VALUES";
        for ($i = 0; $i < $limit; $i++) {
            $ru = rand(0, count($usuarios) - 1);
            $usuario_id = $usuarios[$ru]['id'];
            do {
                $ru = rand(0, count($emisores) - 1);
                $emisor_id = $emisores[$ru]['id'];
            } while ($emisor_id == $usuario_id);
            $ru = rand(30, 70);
            $mensaje = generar_texto($ru);
            $query .= "($usuario_id,$emisor_id,'$mensaje','$fecha_alta')";
            if ($i != $limit - 1) {
                $query .= ",";
            }
        }
        consulta($query, $link, 4);
        header("Location: my_profile.php");
    }
}
header("Location: my_profile.php");
