#ReadMe.md
##MVC 		Muestra la implementación de 4 operaciones
            <Crear, Leer, Actualizar, Delete> 
			sobre una base de datos con una organización de arquitectura por capas <Modelo,Vista,Controlador>.
			
			Renderiza en lista un recordSet de datos de una tabla definida en base de datos.

<a id='contents'></a>
## Contenido.
<ul>
	<li><a href="#descripcion"> Descripcion</a></li>
        <li><a href="#actualizacion"> Actualización</a></li>
        <li><a href="#ejecucion">Ejecución</a></li>
        <li><a href="#glosario">Glosario</a></li>
	<li><a href="#referencias">Referencias</a></li>
	<li><a href="#persona">Persona</a></li>
</ul>

### Antecedente. 
			ReadMe.txt CapasRecordSet			
			Muestra como organizar una aplicación web en capas; muestra como las colecciones 
			de los script .htcacces -raiz,public/app- es interpretado por el servidor Apache 
			desarrolla:
			i) direccionamiento de la petición del cliente en una URL.
			ii) Prohibe mostrar el index de proyectos en la carpeta raiz.

<a id='descripcion'></a>
### Descripción.
<que>
		Se presenta una aplicación web entre un cliente-servidor, que muestra una interfaz de usuario con los recursos de un navegador una colección de productos de sus
		atributos; tanto titulos como sus atributos estan almacenados en una base de datos persistente; además la interfaz web presenta tres controles de petición para administrar un registro de la colección de productos, los controles conducen hacia la  ejecucuón de las operaciones de: a) Modificar, b)Borrar c) Agregar nuevo producto.
		
<cuales>
		El dialogo entre cliente-servidor comienza con una petición de tipo genérico del lado 
		del cliente, el servidor responde atiendiendo y mostrando la colección de 
		productos y sus controles de petición en la interfaz gráfica.
		
		Existen DOS tipos de peticiones: 
		i)url generica, 
		ii)url especializada.
		
		Donde: 
		
		i) url-genérica, raiz-url, es un localizador de recursos de propósito general que muestra en la interfaz del cliente una tabla con los registros y atributos de una colección de productos. 
		Los elementos encontrados en la url-genérica son: 
		
				http://localhost/Proyecto_MVC/ 
				
			┬	 http://   	<-define tipo de protocolo de red para la transferencia de información.
	    raiz-url localhost/ <-define IpV4 del servidor local de recursos Http. 
			┴	Proyecto_MVC/       <-define carpeta del proyecto, contiene la infractuctura publica y desoporte. 
							de la aplicación web.
							
		ii) url-especializada, llamada carga útil, es un localizador de recursos de propósito 
		específico, ejecuta tareas que administran un registro de la coleción de 
		productos.  Se tiene que la url-especializada contiene a los siguientes elementos:

			http://localhost/Proyecto_MVC/productos/modificar/1
			http://localhost/Proyecto_MVC/productos/alta
		
				http://			
				localhost/		
				Proyecto_MVC/
			┬	productos/	   <-define controlador especializado, es una clase con métodos para gestionar un registro. 
	payLoad-url borrar/        <-define método para gestionar los atributos,campos de una colección de productos. 
			┴	1		       <-define argumento del elemento método, identifica el número de registro 
							     de la colección de productos sobre la que sestionará una tarea. 

		Las tareas de adminstración de registros de la colección de productos son:
		
			a) modificar($id)	<-define e identifica y modificar los atributos.
			b) borrar($id)		<-define e identifica y elimina un registro existente y sus atributos.
			c) alta()			<-incorporar un nuevo registro con atributos. 
				

<donde>
		Organización de carpetas de la aplicación 

		Una petición por del lado del cliente se atiende a través, de los recursos contenidos 
		en la carpeta contenedora <MVC>. Ésta presenta una organización de dos carpetas y 
		un archivo.  Se presenta la descripción organica de la aplicación web.  
		
		Desde la carpeta contenedora se tiene: 
		
		```bash
		  Proyecto_MVC
			├─ .htaccess <- enruta cualquier petición URL
			├─ app		 <- arcivos de la aplicación para uso del desarrollad@r.	
			└─ public    <- archivos públicos de la aplicación.
		```
		</br>	
			
		Donde: 	
				
		Se tienen dos tipos de carpetas.
	
			i) Carpetas de archivos públicos para la atender la petición.
			
			```bash
					Proyecto_MVC/public
							├─ css		 <-contiene archivos de scripts de hoja de estilos
							├─ img  	 <-almacena fotográfias, multimedios
							├─ js		 <-archivos de scripts en JavaScrips 
							├─ .htaccess <-enruta petición hacia cualquier index.php
							└─ index.php <-redirecciona al controlador principal.
			```
			</br>
							
			ii) Carpetas de archivos para soporte de la aplicación.
			```bash
					Proyecto_MVC/app
						├─ controladores	 	<-retorna interfaz de gestion bd y recorSet base de datos
						├─ libs  	 			<-contine clases
						├─ modelos	 			<-atiende operaciones de lectura-escritura con base de datos
						├─ vistas	 			<-renderiza vista principal
						├─ .htaccess 			<-prohibe navegación en index de proyectos.
						└─ inicio.php 			<-cargar en memoria el entorno y atiende la petición principal.
			```
			</br>			
			
		Por parte del lado del soporte de la aplicación, se tiene que la organización organica
		define:
		i) una arquitectura por capas modelo-vista-controlador.
		ii) una biblioteca de recursos de soporte para la capa controlador 	
		iii) un archivo oculto para prohibir la indexación de archivos.
		
		Representación gráficade la estructura de soporte de la aplicación.
		
		```bash
		MVC/app
			 ├─ inicio.php	//carga en memoria el entorno y atiende la petición principal. 
             ├─ libs
			 │	   ├─ MySQLdb.php // Clase para gestionar tareas con base de datos.
			 │	   │	├─ __construct()//retorna un objeto interfaz
			 │	   │	└─ querySelect($sql)//retorna un arreglo asociativo tipo recordSet
			 │	   ├─ Control.php
			 │	   │   ├─ __construct()//constructor, desgloza URL y obtiene la componente del controlador.
			 │	   │   └─ separarURL()//retorna un arreglo con los elementos encontrados en la URL.
			 │	   └─ Controlador.php //Clase tipo: fabrica de métodos
		     ├─	controladores
			 │		└─ Productos.php//colección de métodos para gestionar los registro-atributos de la base de datos 
			 ├─	modelos
			 │      └─ ProductosModelo.php//retorna interfaz de gestion bd y recorSet de la base de datos.
			 ├─ vistas
			 │      └─ ProductosVista.php//renderiza UI con los recorSet de la base de datos.
			 └─ .htaccess // prohibe la indexación de archivos.
		```
		</br>	
  
<a id='actualizacion'></a>
### Actualización.

			Cualquier petición debe ser recuperada, direccionada y atendida hacia: /public/index.php. 
			index.php tiene la responsabilidad de direccionar hacia el controlador principal de la aplicación, 
			por lo que, la carpeta con soporte a la aplicación contiene un archivo de configuración distribuida,
			archivo oculto, que lee e interpreta el servidor Html para realizar los cambios en la configuración
			en contexto del directorio de la aplicación.   
			
			El archivo .htaccess, es un archivo oculto que se utiliza en el lado del servidor Apache para 
			i) configurar funciones de direccionamiento y busqueda de archivos para una aplicación web.
			ii) no permtir el acceso al índice de proyecto.
			iii) habilitar-deshabilitar la renderización de mensajes del estado de ejecución de la aplicación web.
			
			.htaccess en el contecto del directorio de la aplicación, es el  responsable de conducir, 
			cargar en memoria y ejecutar el contenido de index.php en el servdor-Apache, contiene colecciones de 
			directivas, llamadas expresiones regulares (RegEx), conjugadas con argumentos de ejecución y configuración
			por lo que debe ACTUALIZAR la ruta de acceso al index.php mismo que direcciona hacia el controlador principal.	
			
			```bash
				Proyecto_MVC/public
					├─ .htaccess <- enruta petición hacia cualquier index.php
					│		└─ <IfModule mod_rewrite.c>
					│			Options -Multiviews
					│			RewriteEngine On
					│			RewriteBase /Crud/public              <- ruta de busqueda y ejecución de index.php
					│			RewriteCond %{REQUEST_FILENAME} !-d
					│			RewriteCond %{REQUEST_FILENAME} !-f
					│			RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
					│			</IfModule>
					│
                    └─ index.php <- direcciona hacia el controlador principal.
							└─ require_once("../app/inicio.php");//cargar en memoria clases entorno de la aplicación.
							   $control = new Control();
			```
			</br>

<a id='ejecucion'></a>
### Ejecución.
			1)Ejecutar en modo administrador la aplicación: xampp-control.exe
			2)Ejecutar en la barra de direcciones del navegador local: http://localhost/Proyecto_MVC/
			3)Navegar con los hiperenlaces dentro del dashboard de la aplicación:
					Modificar  				<- modifica un registro-atributo. 
					Borrar     				<- borra un registro-atributo.
					Agrega nuevo producto   <- actualiza un registro-atributo.
<a id='glosario'></a>
### Glosario.

.htaccess

			Los archivos ocultos .htaccess (o "ficheros/archivos de configuración distribuida") facilitan 
			una forma de realizar cambios en la configuración en contexto directorio. 
			Un fichero, que contiene una o más directivas, se coloca en un documento específico 
			de un directorio, y estas directivas aplican a ese directorio y todos sus subdirectorios.
<a id='referencias'></a>
Referencias.

    Introducción a la programación orientada a objetos con PHP: 
    La programación orientada a objetos te permitirá hacer proyectos con PHP.
    Formato: Edición Kindle. ASIN ‏ : ‎ B07Z6KKLX1					

    Crear un patrón MVC con PHP y MySQL.
    Disponible en: <https://www.udemy.com/course/crear-un-patron-mvc-con-php-y-mysql/learn/lecture/12655444#overview>

    PHP MVC y Estructura en Carpetas (Proyecto MVC PHP)
    Disponible en: <https://github.com/velamds/PHP_MVC_Youtube?tab=readme-ov-file.>
    Disponible en: <https://www.youtube.com/@ElProfeSergio/videos>

    Qué es el archivo .htaccess: Guía completa.
    Disponible en: <https://www.hostinger.mx/tutoriales/que-es-el-archivo-htaccess>

    Disponible en: <https://www.php.net/manual/es/mysqli.construct.php>

    MVC en PHP || Como hacer un proyecto MVC basico en PHP
    Disponible en: https://www.youtube.com/watch?v=JWi4_8_d-RM&t=386s
    Consultado en: 25/03/2025

    MVC en nuestro proyecto con PHP y Composer 
    Disponible en: ttps://www.youtube.com/watch?v=suJCaXZwO0o
    Consultado en: 25/03/2025

<a href="#contents">Ir a Contenido.</a>

<a id='persona'></a>
A BOUT ME

Estudiante de ingenieria en sistemas computacionlaes de 8vo semestre del Tecnologico Nacional de México.
Yo soy Arat, elaborador de este poryecto de parcial.
Este poryecto se basa en la renderizacion de la tabla productos usado con CRUD.
