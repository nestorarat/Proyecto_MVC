<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Modificar Producto</title>
</head>

<style>
    /* Estilo general para la página */
    body {
        font-family: Arial, sans-serif; /* Fuente utilizada para el texto */
        background: url('https://www.shutterstock.com/image-vector/sneaker-shop-logo-shoes-sign-600w-471240233.jpg') no-repeat center center fixed;
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
        color: rgb(255, 11, 11); /* Color del texto del título */
        margin-top: 20px; /* Espacio entre el título y el borde superior */
        text-align: center; /* Centra el texto del título */
    }

    /* Estilo para el contenedor del formulario */
    .form-container {
        background-color: #fff; /* Color de fondo del formulario */
        padding: 20px; /* Espaciado interno del formulario */
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
        color: rgb(233, 18, 18); /* Color del texto de las etiquetas */
        margin-bottom: 5px; /* Espacio debajo de las etiquetas */
        display: block; /* Hace que las etiquetas se muestren en bloque */
    }

    /* Estilo para los campos de texto */
    input[type="text"] {
        width: 100%; /* Hace que los campos de texto ocupen el 100% del ancho disponible */
        padding: 10px; /* Espaciado interno de los campos */
        font-size: 14px; /* Tamaño de la fuente del texto ingresado */
        border: 1px solid #ddd; /* Borde gris claro para los campos */
        border-radius: 5px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espacio entre los campos */
        box-sizing: border-box; /* Asegura que el padding no afecte el ancho total */
        transition: border-color 0.3s; /* Transición suave para el cambio de color del borde */
    }

    /* Estilo cuando el campo de texto tiene el foco */
    input[type="text"]:focus {
        border-color: #007bff; /* Cambia el color del borde cuando el campo está enfocado */
        outline: none; /* Elimina el contorno predeterminado */
    }

    /* Estilo para el botón */
    button {
        background-color: #007bff; /* Color de fondo del botón */
        color: white; /* Color del texto del botón */
        padding: 12px; /* Espaciado interior del botón */
        font-size: 16px; /* Tamaño de la fuente del texto del botón */
        border: none; /* Elimina el borde del botón */
        border-radius: 5px; /* Bordes redondeados */
        cursor: pointer; /* Cambia el cursor a mano al pasar por encima */
        width: 100%; /* El botón ocupa el 100% del ancho disponible */
        transition: background-color 0.3s; /* Transición suave para el cambio de color de fondo */
    }

    /* Estilo para el botón cuando se pasa el cursor por encima */
    button:hover {
        background-color: #0056b3; /* Cambia el color del fondo al pasar el cursor */
    }

    /* Estilo para el botón cuando se hace clic */
    button:active {
        background-color: #003d82; /* Cambia el color del fondo cuando se hace clic */
    }

    /* Estilo para las agrupaciones de los campos */
    .form-group {
        margin-bottom: 20px; /* Espacio entre los grupos de campos */
    }

    /* Elimina el margen inferior del último grupo de campos */
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
        text-decoration: none; /* Elimina el subrayado del enlace */
        width: auto; /* Ajusta el ancho del botón al contenido */
        transition: background-color 0.3s; /* Transición suave para el cambio de color del fondo */
    }

    /* Estilo para el botón de regresar cuando se pasa el cursor por encima */
    .btn-regresar:hover {
        background-color: #0056b3; /* Cambia el color del fondo al pasar el cursor */
    }
</style>

<body>
    <!-- Título principal de la página -->
    <h1>MODIFICAR PRODUCTOS</h1>

    <!-- Formulario para modificar los detalles del producto -->
    <form action="<?php echo RUTA_URL . "productos/guardar/" . $data['pro_id']; ?>" method="post" style="max-width: 500px; margin: auto;">
    <label for="nombre">Marca:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($data['pro_nom']); ?>" style="width:100%; padding:10px; margin-bottom:15px;" required>

    <label for="marca">Color:</label>
    <input type="text" id="marca" name="marca" value="<?php echo htmlspecialchars($data['pro_mar']); ?>" style="width:100%; padding:10px; margin-bottom:15px;" required>

    <label for="costo">Talla:</label>
    <input type="number" id="costo" name="costo" step="0.01" value="<?php echo htmlspecialchars($data['pro_cos']); ?>" style="width:100%; padding:10px; margin-bottom:15px;" required>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" step="0.01" value="<?php echo htmlspecialchars($data['pro_pre']); ?>" style="width:100%; padding:10px; margin-bottom:15px;" required>

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($data['pro_can']); ?>" style="width:100%; padding:10px; margin-bottom:20px;" required>

    <button type="submit" style="width:100%; padding:12px; background-color:#007bff; color:white; border:none; border-radius:5px;">Guardar Cambios</button>
    <br><br>
    <a href="<?php echo RUTA_APP; ?>productos" class="btn-regresar">Regresar</a>
</form>
</body>
</html>
