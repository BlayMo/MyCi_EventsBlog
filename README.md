# MyCi_EventsBlog
Proyecto realizado con PHP7 + Codeigniter 3.0.6 + IonAuth + Grocery_CRUD + DatetimePicker + Fullcalendar

Eventos + Blog + Páginas + Gestión de Usuarios.

Proyecto realizado para la gestión de eventos sociales, blogs y páginas personales.

El objetivo del proyecto es el Aprendizaje.

Para el desarrollo del proyecto he utilizado:

 XAMPP con PHP7 + MARIA DB.
 Codeigniter 3.0.6.
 Ion_Auth.
 Grocery_CRUD.
 DatetimePicker.
 FullCalendar.
 Plantilla Blog Post de Start Bootstrap.
Todo el software de terceros se distribuye bajo sus respectivas licencias, depositadas en la carpeta /licenses. El software desarrollado por el autor de este proyecto se distribuye bajo licnecia MIT.

La estructura de la BD, se encuentra en el fichero zip: myci_eventsblog.sql.zip

La aplicación consta de dos capas:

- Front. Gestión de eventos, blogs y páginas personales que el usuario registrado puede mantener.
- Admin. Capa de administración a la que solo el "administrator" puede acceder. Incluye la gestión de Usuarios.
- El acceso a la capa de administración se realiza con los datos que por defecto figuran en las tablas de IonAuth, a saber:

mail:      admin@admin.com
password:  password

La instalación es sencilla:

-Descargar el zip del proyecto en su directrio raiz del servidor web.
- Crear la BD e importar el zip mycy_eventsblog.sql.zip
- Modificar el fichero application/config/database.php con los datos de su BD.
- Ejecutar la aplicación. 

Comentarios y/o sugerencias:
expresoWeb
expresoweb2015@gmail.com
