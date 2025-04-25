<?php
require_once __DIR__ . '/../libs/Controlador.php';

class Productos extends Controlador
{
    private $objModelo; // Variable para almacenar el objeto del modelo

    // Constructor de la clase
    public function __construct()
    {
        // Cargar el modelo ProductosModelo
        $this->objModelo = $this->modelo('ProductosModelo');
    }

    // Mostrar la lista de productos
    public function index()
    {
        // Obtener los productos desde el modelo
        $productos = $this->objModelo->getProductos();
        // Pasar los datos a la vista para mostrar la lista de productos
        $this->vista('ProductosVista', $productos);
    }

    // Vista para dar de alta un nuevo producto
    public function alta()
    {
        // Cargar la vista para el formulario de alta de producto
        $this->vista('ProductosAltaVista');
    }

    // Guardar un nuevo producto en la base de datos
    public function guardarAlta()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = htmlspecialchars($_POST['nombre'] ?? '');
            $marca = htmlspecialchars($_POST['marca'] ?? '');
            $costo = filter_var($_POST['costo'] ?? '', FILTER_VALIDATE_FLOAT);
            $precio = filter_var($_POST['precio'] ?? '', FILTER_VALIDATE_FLOAT);
            $cantidad = filter_var($_POST['cantidad'] ?? '', FILTER_VALIDATE_INT);
    
            if ($nombre && $marca && $costo && $precio && $cantidad) {
                $this->objModelo->guardarProducto($nombre, $marca, $costo, $precio, $cantidad);
                header('Location: ' . RUTA_APP . 'productos');
                exit();
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    }

    // Mostrar formulario para modificar un producto existente
    public function modificar($id)
{
    $producto = $this->objModelo->getProductoById($id);
    if ($producto) {
        $this->vista('ProductosModificarVista', $producto);
    } else {
        echo "Producto no encontrado.";
    }
}

    // Guardar los cambios realizados a un producto
    public function guardar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = htmlspecialchars($_POST['nombre'] ?? '');
            $marca = htmlspecialchars($_POST['marca'] ?? '');
            $costo = filter_var($_POST['costo'] ?? '', FILTER_VALIDATE_FLOAT);
            $precio = filter_var($_POST['precio'] ?? '', FILTER_VALIDATE_FLOAT);
            $cantidad = filter_var($_POST['cantidad'] ?? '', FILTER_VALIDATE_INT);
    
            if ($nombre && $marca && $costo !== false && $precio !== false && $cantidad !== false) {
                $this->objModelo->actualizarProducto($id, $nombre, $marca, $costo, $precio, $cantidad);
                header('Location: ' . RUTA_URL . 'productos');
                exit();
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    }
    

    // Eliminar un producto
    public function borrar($id)
    {
        if ($this->objModelo->eliminarProducto($id)) {
            // Redirige a la lista de productos si se elimina correctamente
            header('Location: ' . RUTA_APP . 'productos');
            exit();
        } else {
            // Muestra un mensaje de error y redirige a la lista de productos
            echo "<script>alert('Se a eliminado el producto..');</script>";
            echo "<script>window.location.href='" . RUTA_APP . "productos';</script>";
            exit();
        }
    }
}
?>
