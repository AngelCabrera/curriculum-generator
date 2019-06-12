# Curriculum - Curso PHP - Hector Benítez - Platzi 2019

### ¿Qué es PSR Y PHP-FIG?

PHP-FIG son las siglas de PHP framework Interop Group, que corresponde a un grupo de 'proyectos php' que tienen por objetivo hallar las coincidencias entre esos proyectos y encontrar formas en las que puedan trabajar mejor de manera conjunta.

De una manera más básica, un grupo de programadores se unieron para crear PHP-FIG con el objetivos de avanzar en la interoperabilidad de librerías en php.

PHP-FIG fueron los encargados de crear PSR que son las siglas de PHP Standards Recommendations. Qué como su nombre lo especifica son recomendaciones y estándares para tu código PHP para mejorar la interoperabilidad de los proyectos.

### ¿Qué es Composer?
Composer es un administrador de paquetes a nivel de aplicación para PHP, permite administrar dependencias de PHP y las bibliotecas requeridas.

- **composer.json**: es un archivo que especifica la configuración y los paquetes requeridos a composer.
- **composer install**: hace la instalación de la configuración y paquetes especificados en el archivo _composer.json_.
- **composer require _packageName_**: instala el paquete requerido en nuestro directorio y añade el requerimiento al archivo composer.json.

### ¿Qué es un ORM?
ORM son las siglas de Object Relational Mapping. En la práctica esto crea una base de datos orientada a objetos virtual, sobre la base de datos relacional. Esto posibilita el uso de las características propias de la orientación a objetos (básicamente herencia y polimorfismo), además el ORM hace más transparente las conexiones a las bases de datos, nos protege de algunas vulnerabilidades de SQL y facilita algunas validaciones a la información.

Crear modelos basados en las tablas de nuestra base de datos. Utilizar librerías de terceros nos ayuda a ahorrarnos mucho trabajo. En este caso utilizaremos el ORM de Eloquent.

El ORM convierte las tablas en clases y convierte las columnas en atributos de esa clase, por lo cual podemos acceder a las columnas de la base de datos como si fuesen atributos de una clase.

### ¿Qué es un FrontController?

FrontController corresponde a un Patrón que centraliza el acceso de las peticiones provenientes del cliente. 

Consiste en tener un controlador único y usarlo como el punto inicial de contacto para manejar las peticiones. El controlador maneja el control de peticiones, incluyendo la invocación de los servicios de seguridad como la autentificación y autorización, la delegación del procesamiento de negocio, el control de la elección de una vista apropiada, el manejo de errores y el control de la selección de estrategias de creación de contenido.

Nos dará una solució a la redundancia de código en las múltiples entradas a la aplicación.

### ¿Cómo mostrar errores en pantalla con PHP?

- ini_set('display_errors', 1);
- ini_set('display_startup_error', 1);
- error_reporting(E_ALL);

### ¿Qué es PSR7?

PSR7 es un estandar que nos permite normalizar un request y un response en PHP, se crea una variable $request que almacenará todos los datos de las superglobales $_GET, $_POST, $_COOKIES, etc.

### ¿Qué es MVC?

MVC son las siglas de modelo-vista-controlador, se refiere a un patrón de arquitectura de software que, utilizando 3 componentes (Vistas, Models y Controladores) separa la lógica del negocio de la lógica de la vista en una aplicación.