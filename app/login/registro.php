<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include __DIR__ . '/../libs/MySQLdb.php';

    $db = new MySQLdb(); // Crear una instancia de la clase MySQLdb
    $pdo = $db->getConnection(); // Obtener la conexión PDO

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena']; // Almacenar la contraseña sin encriptar

    // Insertar los datos
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
    if ($stmt->execute([$nombre, $correo, $contrasena])) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error al registrar";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Registro de Usuario</h2>
            <form method="post">
                <div class="input-container">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="input-container">
                    <input type="email" name="correo" placeholder="Correo" required>
                </div>
                <div class="input-container">
                    <input type="password" name="contrasena" placeholder="Contraseña" required>
                </div>
                <button class="btn-submit" type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</body>
</html>
<style>
    /* Estilos generales ya existentes para login */
body {
    font-family: Arial, sans-serif;
    background: url('https://www.shutterstock.com/image-vector/sneaker-shop-logo-shoes-sign-600w-471240233.jpg') no-repeat center center fixed;
    background-size: cover; /* Hace que la imagen cubra toda la pantalla */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 400px;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 50px;
}

.form-box {
    width: 100%;
    text-align: center;
}

.form-box h2 {
    margin-bottom: 20px;
    color: #333333;
    font-size: 24px;
}

.input-container {
    margin-bottom: 15px;
    position: relative;
}

.input-container input {
    width: 100%;
    padding: 10px 5px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.3s;
}

.input-container input:focus {
    border-color:rgb(0, 0, 0);
}

.btn-submit {
    width: 100%;
    padding: 10px 15px;
    background-color:rgb(0, 0, 0);
    color: #ffffff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-submit:hover {
    background-color:rgb(255, 17, 17);
}
</style>