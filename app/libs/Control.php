<?php
/**
 * Clase que gestiona el desglose de la URL y controla el flujo por 
 * i) omisión ii) elementos URL encontrados.
 * Atiende a los tipos de petición:
 * i) nula/vacia, invoca al controlador "Productos", método "index" y parámetros[], y renderiza la vista principal.
 * ii) atiende a los elementos controlador, método, parámetros[] encontrados en la URL.
 * separarURL() retorna un arreglo asociativo de los componentes de la URL del cliente.
 */
class Control
{
    /* Define controlador por omisión */
    protected $controlador = "Productos"; // Controlador principal por omisión
    protected $metodo = "index"; // Método del controlador principal por omisión
    protected $parametros = []; // Argumentos para el método

    // Constructor que maneja el flujo según la URL
    function __construct()
    {
        // Obtener los componentes de la URL usando la función separarURL()
        $url = $this->separarURL(); // Retorna un arreglo con los componentes de la URL

        // Si la URL no está vacía y el controlador especificado existe en el sistema
        if ($url != "" && file_exists("../app/controladores/" . ucwords($url[0]) . ".php"))
        {
            // Si existe un controlador especificado en la URL, actualizarlo
            $this->controlador = ucwords($url[0]);
            unset($url[0]); // Eliminar el primer componente de la URL (ya que es el controlador)
        }

        // Cargar el controlador en memoria, ya sea el encontrado en la URL o el por omisión
        require_once("../app/controladores/" . ucwords($this->controlador) . ".php");
        $this->controlador = new $this->controlador; // Instanciar el controlador

        // Recuperar el método del controlador si está especificado en la URL
        if (isset($url[1]))
        {
            // Si el método existe en el controlador, actualizarlo
            if (method_exists($this->controlador, $url[1])) 
            {
                $this->metodo = $url[1];
                unset($url[1]); // Eliminar el segundo componente de la URL (ya que es el método)
            }
        }

        // El arreglo $this->parametros contendrá los valores restantes de la URL (argumentos para el método)
        $this->parametros = $url ? array_values($url) : [];

        // Llamar al método correspondiente del controlador con los parámetros obtenidos
        call_user_func_array(
            [$this->controlador, $this->metodo], // Controlador y método a invocar
            $this->parametros // Parámetros que se pasan al método
        );
    }

    // Método privado que retorna un arreglo con los componentes de la URL del cliente
    private function separarURL()
    {
        $url = ""; // Inicializar la variable $url

        // Si la URL está definida en los parámetros de la petición GET
        if (isset($_GET["url"]))
        {
            // Eliminar la barra diagonal final y sanear la URL
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL); // Filtrar la URL para evitar caracteres no deseados
            $url = explode("/", $url); // Dividir la URL en partes usando "/" como delimitador
        }

        return $url; // Retornar el arreglo con los componentes de la URL
    }
}
?>
