<!-- filepath: c:\xampp\htdocs\Proyecto_MVC\app\vistas\ProductosVista.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de Productos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Estilo general */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://image.shutterstock.com/image-vector/sneaker-shop-logo-shoes-sign-450w-471891626.jpg') no-repeat center center fixed;
            background-size: cover; /* Hace que la imagen cubra toda la pantalla */
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Menú lateral */
        .side-menu {
            width: 250px;
            background-color:rgb(0, 0, 0);
            color: white;
            height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .side-menu h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .side-menu a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .side-menu a:hover {
            background-color:rgb(255, 0, 0);
        }

        /* Contenedor principal */
        .main-container {
            margin-left: 250px; /* Espacio para el menú lateral */
            padding: 20px;
            width: calc(100% - 250px);
        }

        /* Tabla centrada */
        .table-container {
            margin-top: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: none; /* Oculto por defecto */
        }

        
        /* Encabezado */
        .header {
            background-color:rgb(4, 4, 4);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-icon {
            width: 40px;
            height: 40px;
            background-color: white;
            color: #007bff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }

        .user-name {
            font-size: 16px;
            color: white;
        }

        .logout-btn {
            padding: 8px 12px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Tabla centrada */
        .table-container {
            margin-top: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn-agregar {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color:rgb(0, 0, 0);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-agregar:hover {
            background-color:rgb(245, 15, 15);
        }
    </style>
    <script>
        function toggleProductos() {
            const tableContainer = document.querySelector('.table-container');
            tableContainer.style.display = tableContainer.style.display === 'none' || tableContainer.style.display === '' ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <!-- Menú lateral -->
    <div class="side-menu">
        <h2>Proyecto MVC</h2>
        <a href="#" onclick="toggleProductos()">Productos</a>
        <a href="#">Categorías</a>
        <a href="#">Usuarios</a>
        <a href="#">Configuración</a>
    </div>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Encabezado -->
        <div class="header">
            <h1>Lista de Productos</h1>
            <div class="user-info">
                <div class="user-icon">👤</div>
                <span class="user-name"><?php echo htmlspecialchars($_SESSION['usuario'] ?? 'Invitado'); ?></span>
                <a href="http://localhost/Proyecto_MVC/app/login/logout.php" class="logout-btn">Cerrar Sesión</a>
            </div>
        </div>

        <!-- Tabla centrada -->
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Color</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data) && is_array($data)) {
                        foreach ($data as $producto) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($producto['pro_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($producto['pro_nom']) . "</td>";
                            echo "<td>" . htmlspecialchars($producto['pro_mar']) . "</td>";
                            echo "<td>" . htmlspecialchars($producto['pro_cos']) . "</td>";
                            echo "<td>" . htmlspecialchars($producto['pro_pre']) . "</td>";
                            echo "<td>" . htmlspecialchars($producto['pro_can']) . "</td>";
                            echo "<td><a href='" . RUTA_URL . "productos/modificar/" . htmlspecialchars($producto['pro_id']) . "' class='btn btn-primary btn-sm'>Modificar</a></td>";
                            echo "<td><a href='" . RUTA_URL . "productos/borrar/" . htmlspecialchars($producto['pro_id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este producto?\")'>Borrar</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay productos para mostrar.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Botón para agregar un nuevo producto -->
            <a href='<?php echo RUTA_URL . "productos/alta"; ?>' class="btn-agregar">Agregar nuevo producto</a>
        </div>
    </div>
</body>
</html>