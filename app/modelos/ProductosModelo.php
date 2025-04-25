<?php
class ProductosModelo
{
    private $obj_mySQLdb;

    // Constructor: Instancia la clase MySQLdb para realizar consultas a la base de datos
    function __construct()
    {
        $this->obj_mySQLdb = new MySQLdb();  // Instanciamos la conexión con la base de datos
    }

    // Obtener todos los productos
    public function getProductos()
    {
        $sql = "SELECT * FROM productos";  // Consulta para obtener todos los productos
        return $this->obj_mySQLdb->querySelect($sql);  // Ejecutar consulta y retornar los resultados
    }

    // Obtener un solo producto por su ID
    public function getProductoById($id)
    {
    $sql = "SELECT * FROM productos WHERE pro_id = :id"; // Cambié 'id' por 'pro_id'
    $result = $this->obj_mySQLdb->querySelect($sql, ['id' => $id]);
    return $result ? $result[0] : null; // Devuelve el primer resultado o null si no hay resultados
    }

    // Insertar un nuevo producto en la base de datos
    public function guardarProducto($nombre, $marca, $costo, $precio, $cantidad)
{
    $sql = "INSERT INTO productos (pro_nom, pro_mar, pro_cos, pro_pre, pro_can) 
            VALUES (:nombre, :marca, :costo, :precio, :cantidad)";
    return $this->obj_mySQLdb->queryExecute($sql, [
        'nombre' => $nombre,
        'marca' => $marca,
        'costo' => $costo,
        'precio' => $precio,
        'cantidad' => $cantidad
    ]);
}

    // Actualizar los detalles de un producto existente
    public function actualizarProducto($id, $nombre, $marca, $costo, $precio, $cantidad)
{
    $sql = "UPDATE productos SET 
            pro_nom = :nombre, 
            pro_mar = :marca, 
            pro_cos = :costo, 
            pro_pre = :precio, 
            pro_can = :cantidad 
            WHERE pro_id = :id";
    return $this->obj_mySQLdb->queryExecute($sql, [
        'id' => $id,
        'nombre' => $nombre,
        'marca' => $marca,
        'costo' => $costo,
        'precio' => $precio,
        'cantidad' => $cantidad
    ]);
}

    // Eliminar un producto de la base de datos por su ID
    public function eliminarProducto($id)
    {
        $sql = "DELETE FROM productos WHERE pro_id = :id";   // Consulta para eliminar el producto por su ID
        $this->obj_mySQLdb->queryExecute($sql, ['id' => $id]); // Ejecutar la consulta de eliminación
    }
}
?>
