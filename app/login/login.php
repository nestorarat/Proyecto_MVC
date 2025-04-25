<?php
session_start();
require_once __DIR__ . '/../libs/MySQLdb.php';

// Crear una instancia de la clase MySQLdb y obtener la conexión PDO
$db = new MySQLdb();
$pdo = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    // Consultar el usuario por correo
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Comparar la contraseña ingresada con la almacenada (sin encriptar)
        if ($contrasena === $usuario['contrasena']) {
            $_SESSION['usuario'] = $usuario['nombre'];
            // Redirigir al archivo ProductosVista.php
            header("Location: http://localhost/Proyecto_MVC/public/productos");
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<!-- FORMULARIO DE LOGIN -->
<div class="login-container">
    <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <form method="post">
            <div class="input-container">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
            </div>
            <div class="input-container">
                <input type="password" name="contrasena" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn-submit">Iniciar Sesión</button>
            <div class="footer-links">
                <a href="registro.php">Crear cuenta</a> | <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
            </div>  
        </form>
    </div>
</div>
<style>
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

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 400px;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 20px;
}

.login-box {
    width: 100%;
    text-align: center;
}

.login-box h2 {
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
    padding: 10px 15px;
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
    background-color:rgb(241, 16, 16);
}

.footer-links {
    margin-top: 15px;
    font-size: 14px;
}

.footer-links a {
    color:rgb(0, 0, 0);
    text-decoration: none;
    transition: color 0.3s;
}

.footer-links a:hover {
    color:rgb(239, 16, 16);
}
</style>