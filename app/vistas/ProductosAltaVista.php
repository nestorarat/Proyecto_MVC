<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Agregar Producto</title>
</head>
<style>
    /* Estilo general para la página */
    body {
        font-family: Arial, sans-serif; /* Fuente utilizada para el texto */
        background: url('https://image.shutterstock.com/image-vector/sneaker-shop-logo-shoes-sign-450w-471891626.jpg') no-repeat center center fixed;
        background-size: cover; /* Hace que la imagen cubra toda la pantalla */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center; /* Centra el contenido horizontalmente */
        align-items: center; /* Centra el contenido verticalmente */
        flex-direction: column; /* Coloca los elementos en columna */
        height: 100vh; /* Ajusta la altura a la pantalla completa */
    }

    /* Estilo para el encabezado */
    h1 {
        color: rgb(255, 0, 0); /* Color del texto del título */
        margin-top: 20px; /* Margen superior para separar del borde */
        text-align: center; /* Centra el texto */
    }

    /* Estilo para el contenedor del formulario */
    .form-container {
        background-color: #fff; /* Color de fondo del formulario */
        padding: 20px; /* Espaciado interior del formulario */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave para darle profundidad */
        width: 100%; /* El formulario ocupa el 100% del ancho disponible */
        max-width: 500px; /* Ancho máximo del formulario */
        box-sizing: border-box; /* Asegura que los márgenes y el padding no afecten el ancho total */
        margin-top: 20px; /* Espacio entre el título y el formulario */
    }

    /* Estilo para las etiquetas de los campos del formulario */
    label {
        font-size: 14px; /* Tamaño de la fuente de las etiquetas */
        color: rgb(255, 0, 0); /* Color del texto de las etiquetas */
        margin-bottom: 5px; /* Espacio debajo de la etiqueta */
        display: block; /* Hace que las etiquetas se muestren en bloque */
    }

    /* Estilo para los campos de texto */
    input[type="text"] {
        width: 100%; /* Hace que los campos de texto ocupen el 100% del ancho disponible */
        padding: 10px; /* Espaciado interno del campo */
        font-size: 14px; /* Tamaño de la fuente del texto ingresado */
        border: 1px solid #ddd; /* Borde de color gris claro */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espacio entre los campos */
        box-sizing: border-box; /* Asegura que el padding no afecte el ancho total */
        transition: border-color 0.3s; /* Transición suave para el cambio de color del borde */
    }

    /* Estilo para cuando el campo de texto tiene el foco */
    input[type="text"]:focus {
        border-color: #007bff; /* Color de borde cuando el campo está enfocado */
        outline: none; /* Elimina el contorno predeterminado */
    }

    /* Estilo para el botón */
    button {
        background-color: #007bff; /* Color de fondo del botón */
        color: white; /* Color del texto del botón */
        padding: 12px; /* Espaciado interno del botón */
        font-size: 16px; /* Tamaño de la fuente del texto en el botón */
        border: none; /* Elimina el borde del botón */
        border-radius: 5px; /* Bordes redondeados */
        cursor: pointer; /* Cambia el cursor a mano al pasar por encima */
        width: 100%; /* El botón ocupa el 100% del ancho disponible */
        transition: background-color 0.3s; /* Transición suave para el cambio de color de fondo */
    }

    /* Estilo para el botón cuando se pasa el cursor por encima */
    button:hover {
        background-color: #0056b3; /* Color de fondo cuando el cursor está encima */
    }

    /* Estilo para el botón cuando se hace clic */
    button:active {
        background-color: #003d82; /* Color de fondo cuando el botón es presionado */
    }

    /* Estilo para las agrupaciones de los campos del formulario */
    .form-group {
        margin-bottom: 20px; /* Espacio entre los grupos de campos */
    }

    /* Eliminar el margen inferior del último grupo de campos */
    .form-group:last-child {
        margin-bottom: 0;
    }

    /* Estilo para el botón de regresar */
    .btn-regresar {
        display: inline-block; /* El botón se muestra en línea con otros elementos */
        padding: 12px 20px; /* Espaciado interior del botón */
        background-color: #007bff; /* Color de fondo del botón */
        color: white; /* Color del texto del botón */
        text-align: center; /* Centra el texto dentro del botón */
        border-radius: 5px; /* Bordes redondeados */
        text-decoration: none; /* Elimina el subrayado de los enlaces */
        width: auto; /* Ajusta el ancho del botón al contenido */
        transition: background-color 0.3s; /* Transición suave para el cambio de color de fondo */
    }

    /* Estilo para el botón de regresar cuando se pasa el cursor por encima */
    .btn-regresar:hover {
        background-color: #0056b3; /* Color de fondo cuando el cursor está encima */
    }
</style>

<body>
    <!-- Título principal de la página -->
    <h1>AGREGAR NUEVO PRODUCTO</h1>

    <!-- Formulario para agregar un nuevo producto -->
    <form action="<?php echo RUTA_APP; ?>productos/guardarAlta" method="POST" style="max-width: 400px; margin: auto;">
    <!-- Campo para el nombre del producto -->
    <label for="nombre">Marca:</label><br>
    <input type="text" name="nombre" required style="width: 100%; padding: 10px; margin-bottom: 15px;"><br>

    <!-- Campo para la marca del producto -->
    <label for="marca">Color:</label><br>
    <input type="text" name="marca" required style="width: 100%; padding: 10px; margin-bottom: 15px;"><br>

    <!-- Campo para el costo del producto -->
    <label for="costo">Talla:</label><br>
    <input type="text" name="costo" required style="width: 100%; padding: 10px; margin-bottom: 15px;"><br>

    <!-- Campo para el precio del producto -->
    <label for="precio">Precio:</label><br>
    <input type="text" name="precio" required style="width: 100%; padding: 10px; margin-bottom: 15px;"><br>

    <!-- Campo para la cantidad del producto -->
    <label for="cantidad">Cantidad:</label><br>
    <input type="number" name="cantidad" required style="width: 100%; padding: 10px; margin-bottom: 20px;"><br>

    <!-- Botón para enviar el formulario -->
    <button type="submit" style="width: 100%; padding: 12px; background-color:rgb(40, 40, 167); color: white; border: none; border-radius: 5px;">Agregar Producto</button>

    <br>
    <br>
        <!-- Botón de regresar que redirige a la vista de productos -->
        <a href="../vistas/ProductosVista.php" class="btn-regresar">Regresar</a>
    </form>
</body>
</html>
