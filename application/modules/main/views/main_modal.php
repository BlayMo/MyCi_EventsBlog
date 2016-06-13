<?php

/*
 * The MIT License
 *
 * Copyright 2016 Blas Monerris Alcaraz.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/* * *****************************************************************************

  Proyecto MyCi_EventsBlog
  Autor:   Blas Monerris Alcaraz
  Objeto:  Practicas/Aprendizaje
  Fecha comienzo : 06-06-2016
  Junio de 2016
  https://expresoweb.joomla.com
  mail: expresoweb2015@gmail.com

  PHP7 + Codeigniter 3.0.6

  Gestión de eventos + blogs  + paginas personales

 * ***************************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="expresoweb" content="Eventos, Blogs y Paginas">
      <link rel="icon" href="../../favicon.ico">
      <title>Events/Home</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <!-- Custom styles for this template -->
     
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style type="text/css">
         body.modal-open #wrap{
         -webkit-filter: blur(7px);
         -moz-filter: blur(15px);
         -o-filter: blur(15px);
         -ms-filter: blur(15px);
         filter: blur(15px);
         }
         .modal-backdrop {background: #f7f7f7;}
         .close {
         font-size: 50px;
         display:block;
         }
      </style>
   </head>
   <body>
      <div id="wrap" class="text-center">
         <!-- Button trigger modal -->
         <br>
         <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Muy Importante</button>
         <?php   require_once 'weekcalendar.php';?>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div>
            <div class="row">
               <div class="col-sm-6 col-sm-offset-3 text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                  <br><br>
                  <h1>Eventos/Blogs &amp; P&aacute;ginas</h1>
                  <h2>Software de terceros empleado en el proyecto:</h2>
                  <div>
                     <p>
                     <h3>Aplicaci&oacute;n para registro y publicaci&oacute;n de Eventos sociales, Blogs y P&aacute;ginas personales, realizada bajo PHP7 + Codeigniter 3.0.6 y pattern HMVC<br/></h3>
                        Integración de:<br/><strong> Ion Auth + Codeigniter + Grocery_CRUD + Harviacode CRUD Generator + Codeigniter google maps + DatetimePicker + Fullcalendar</strong><br/><br/>
                        Software de terceros(Licencias en <strong>/licenses</strong>):<br/><strong>
                        https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc<br/>
                        http://benedmunds.com/ion_auth/<br/>
                        http://www.grocerycrud.com/<br/>                      
                        http://bootstrapious.com/p/how-to-build-a-working-bootstrap-contact-form<br/>
                        http://harviacode.com (Codeigniter CRUD Generator).<br/>
                        http://biostall.com/codeigniter-google-maps-v3-api-library<br/>                      
                        https://github.com/xdan/datetimepicker.git<br/>
                        http://startbootstrap.com/template-overviews/blog-post<br/></strong>
                     </p>
                     <hr>
                     <p>
                        Aplicaci&oacute;n base con gesti&oacute;n de eventos, blogging + Disqus, p&aacute;ginas personales y gesti&oacute;n de usuarios.<br/>
                        El desarrollo puede servir como base para futuras apliciones que requieren una sencilla gesti&oacute;n de usuarios.<br/>
                        No se han testado las funciones de email que figuran por defecto en la libreria IonAuth.<br/>
                        Todo el software de terceros se distribuye bajo sus respectivas licencias.<br/>
                        El software desarrollado por el autor se distribuye bajo licencia MIT.<br/>
                        El acceso al panel de administración se realiza con el login por defecto de Ion_Auth:<br/>
                        mail:     <strong>admin@admin.com</strong><br/>
                        password: <strong>password</strong><br/><br/>
                        Las tablas para la BD, se encuentran en : <strong>myci_eventsblog.sql.zip</strong><br/>
                        He realizado un Diccionario de Datos en formato PDF.<br/>
                     </p>
                  </div>
                  <h4>Sugerencias y/o comentarios: https://expresoweb.joomla.com<br/>
                     Mail Autor: expresoweb2015@gmail.com<br/>
                  </h4>
                  <hr>
                  <div>
                     <a href="<?php echo base_url()?>main">
                     <button type="button" class="btn btn-primary btn-lg">Cerrar ventana</button></a>
                  </div>
                  <br/><br/>
                  <div class="alert alert-danger">
                     <h4>&iexcl;Gracias por su tiempo...!</h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
</html>

