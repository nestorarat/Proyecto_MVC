<?php
/**
 * Clase tipo fábrica de métodos
 */
class Controlador
{
    /* Carga en memoria y retorna un objeto tipo modeloFile.php. */
    public function modelo($modeloFile)
    {
        // Incluir el archivo del modelo que se encuentra en la carpeta "modelos"
        require_once("../app/modelos/" . $modeloFile . ".php");
        
        // Instanciar el modelo y retornar el objeto creado
        return new $modeloFile(); // Retorna una instancia del modelo
    }

    /* Carga en memoria la vista */
    public function vista($vista, $data = [])
    {
        // Verificar si el archivo de vista existe
        if (file_exists("../app/vistas/" . $vista . ".php"))
        {
            // Si la vista existe, incluirla
            require_once("../app/vistas/" . $vista . ".php");
        }
        else 
        {
            // Si la vista no existe, mostrar un mensaje de error
            die("La vista no existe");
        }
    }
}
?>
