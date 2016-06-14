# Eventos + Blog + Páginas.

Proyecto realizado en PHP7 + Codeigniter 3.0.6, para la gestión de eventos sociales, blogs y páginas personales.

El objetivo del proyecto es el Aprendizaje.

Para el  desarrollo del proyecto he utilizado:

     XAMPP con PHP7 + MariaDB.
     Codeigniter 3.0.6.
     Ion_Auth.
     Grocery_CRUD.
     DatetimePicker.
     FullCalendar.
     Plantilla Blog Post de Start Bootstrap.
     

Todo el software de terceros:<br/><strong>

-   https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc<br/>
-   http://benedmunds.com/ion_auth/<br/>
-   http://www.grocerycrud.com/<br/>                      
-   http://bootstrapious.com/p/how-to-build-a-working-bootstrap-contact-form<br/>
-   http://harviacode.com (Codeigniter CRUD Generator).<br/>
-   http://biostall.com/codeigniter-google-maps-v3-api-library<br/>                      
-   https://github.com/xdan/datetimepicker.git<br/>
-   http://startbootstrap.com/template-overviews/blog-post<br/></strong>

Se distribuye bajo sus respectivas licencias, depositadas en la carpeta <strong>/licenses.</strong>
El software desarrollado por el autor de este proyecto se distribuye bajo licencia <strong>MIT</strong>.

La estructura de la BD, se encuentra en el fichero zip: **myci_eventsblog.sql.zip**

La aplicación consta de dos capas:

    - Front. Gestión de eventos, blogs y páginas personales que el usuario registrado puede mantener.
    - Admin. Capa de administración a la que solo el "administrator" puede acceder. Incluye la gestión de Usuarios.
    - El acceso a la capa de administración se realiza con los datos que por defecto figuran en las tablas de IonAuth, a saber:

    mail:      admin@admin.com
    password:  password
      

La **instalación** es sencilla:

    Descargar el zip del proyecto en su directorio raiz "www" o "htdocs" del servidor web.
    Descomprimir el fichero zip.
    Modificar el fichero application/config/database.php con los datos de su BD.
        'hostname' => 'localhost',
	'username' => '',
	'password' => '',
	'database' => 'myci_eventsblog',
	'dbdriver' => 'mysqli',

    Modificar el fichero application/config/config.php:
        $config['base_url'] = 'http://localhost/MyCi_EventsBlog/';
    
    Ejecutar la aplicación. 
    
Comentarios y/o sugerencias:<br/>
[expresoWeb](https://expresoweb.joomla.com "")<br/>
expresoweb2015@gmail.com


    
    
