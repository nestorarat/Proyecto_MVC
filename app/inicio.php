<?php
//Cargar en memoria el entorno y atender la petición principal 
define("RUTA_APP", "/Proyecto_MVC/");
define("RUTA_URL", "http://localhost/Proyecto_MVC/");

// Redirigir al archivo login.php si no se ha especificado otra ruta
if (!isset($_GET['url']) || $_GET['url'] === '') {
    header("Location: " . RUTA_URL . "app/login/login.php");
    exit();
}

// Cargar las librerías principales
require_once("libs/MySQLdb.php"); // Retorna objeto tipo interfaz
require_once("libs/Controlador.php"); // Clase tipo fábrica de métodos
require_once("libs/Control.php"); // Gestiona el desglose de la URL y controla el flujo
?>