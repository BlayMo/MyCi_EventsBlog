<?php
/*
 * Proyecto  :  MyCi_Hmvc
 * Creado el :  24/04/2016
 * Objetivo  :  Aprendizaje.
 * Script    :  

 * ---------- The MIT License ------------
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

 * Copyright 2016 eXpresoWeb
 * URL https://expresoweb.joomla.com

 */

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

        <title>Contact/Form</title>

      
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
      <link href='custom.css' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
               <h1>Contact form</a></h1>
               <p class="lead">Formulario de contacto</p>
               <form id="contact-form" method="post" action="contact_form.php" role="form">
                  <div class="messages"></div>
                  <div class="controls">
                     <div class="row">
                        <div class="col-md-6">
                           <label for="form_name">Firstname *</label>
                           <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required">
                        </div>
                        <div class="col-md-6">
                           <label for="form_lastname">Lastname *</label>
                           <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required">
                        </div>
                        <div class="col-md-6">
                           <label for="form_email">Email *</label>
                           <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required">
                        </div>
                        <div class="col-md-6">
                           <label for="form_phone">Phone</label>
                           <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                        </div>
                        <div class="col-md-12">
                           <label for="form_message">Message *</label>
                           <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required"></textarea>
                        </div>
                        <div class="col-md-12">
                           <br>
                           <input type="submit" class="btn btn-success btn-send" value="Send message">
                           <a href="<?= site_url('')?>"><button type="button" class="btn btn-lg btn-link">Home</button></a>
                        </div>
                        <div class="col-md-12">
                           <p class="text-muted"><strong>*</strong> These fields are required.</p>
                        </div>
                     </div>
                  </div>
               </form>              
            </div>
            <!-- /.8 -->
         </div>
         <!-- /.row-->
      </div>
      <!-- /.container-->
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="contact.js"></script>
   </body>
</html>
