<?php
class MySQLdb
{
    // Parámetros de conexión a la base de datos
    private $host = "localhost";  // Dirección del servidor de la base de datos
    private $usuario = "root";    // Usuario de la base de datos
    private $clave = "";          // Contraseña del usuario de la base de datos
    private $db = "proyecto_mvc"; // Nombre de la base de datos
    private $conn;                // Variable para la conexión a la base de datos

    // Constructor: se encarga de establecer la conexión con la base de datos
    public function __construct()
    {
        try {
            // Crear la conexión con PDO
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->usuario, $this->clave);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Si hay un error, mostrar mensaje y salir
            die("Error en la conexión con la base de datos: " . $e->getMessage());
        }
    }

    // Método para obtener la conexión PDO
    public function getConnection()
    {
        return $this->conn;
    }

    /* Método para ejecutar consultas SELECT (retorna un arreglo de resultados) */
    public function querySelect($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Método para ejecutar consultas que no retornan resultados (INSERT, UPDATE, DELETE) */
    public function queryExecute($sql, $params = [])
{
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($params); // Asegúrate de que los parámetros coincidan con los marcadores de posición
}
}
?>