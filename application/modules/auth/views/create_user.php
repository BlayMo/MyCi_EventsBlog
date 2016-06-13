

<?php 
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="expresoweb" content="Eventos, Blogs y Paginas">
      <title>Create/User</title>
       <link rel="icon" href="../../favicon.ico">
     <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
<!--        <link href="theme.css" rel="stylesheet">-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
   </head>
   <body style="padding-top: 2em; padding-left: 10em ;padding-right: 10em">
      <div id="page-content-wrapper">
         <div class="jumbotron"><div class="container">
            <h2><?php echo lang('create_user_heading');?></h2>
            <p><?php echo lang('create_user_subheading');?></p></div>
         </div>
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Formulario de registro</h3>
            </div>
            <div class="panel-body">
               <!-------------------- create user ----------------------->       
               <div id="infoMessage"><?php echo $message;?></div>
               <?php echo form_open("auth/create_user");?>
               <div class="controls">
                  <div class="row">
                     <div class="col-md-6">                
                        <?php echo lang('create_user_fname_label', 'first_name');?> 
                        <?php  $first_name['class'] = 'form-control';echo form_input($first_name);?>             
                     </div>
                     <div class="col-md-6">  
                        <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                        <?php $last_name['class'] = 'form-control';echo form_input($last_name);?>
                     </div>
                     <div class="col-md-6"> 
                        <?php
                           if($identity_column!=='email') {
                               echo '<p>';
                               echo lang('create_user_identity_label', 'identity');
                               echo '<br />';
                               echo form_error('identity');
                               echo form_input($identity);
                               echo '</p>';
                           }
                           ?>
                     </div>
                     <div class="col-md-6"> 
                        <?php echo lang('create_user_company_label', 'company');?> <br />
                        <?php $company['class'] = 'form-control';echo form_input($company);?>
                     </div>
                     <div class="col-md-6"> 
                        <?php echo lang('create_user_email_label', 'email');?> <br />
                        <?php $email['class'] = 'form-control';echo form_input($email);?>
                     </div>
                     <div class="col-md-6"> 
                        <?php echo lang('create_user_phone_label', 'phone');?> <br />
                        <?php $phone['class'] = 'form-control';echo form_input($phone);?>
                     </div>
                     <div class="col-md-6"> 
                        <?php echo lang('create_user_password_label', 'password');?> <br />
                        <?php $password['class'] = 'form-control';echo form_input($password);?>
                     </div>
                     <div class="col-md-6"> 
                        <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                        <?php $password_confirm['class'] = 'form-control';echo form_input($password_confirm);?>
                     </div>
                     <div class="col-md-6"><br />  
                        <?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn btn-success btn-send"');?>
                         <a href="<?php echo site_url('main');?>">
                   <button type="button" class="btn btn-lg btn-link">Home</button></a>
                     </div>
                     <?php echo form_close();?>
                     
                     <!-------------------- create user ----------------------->
                  </div>
               </div>
            </div>                      
         </div>
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
   </body>
</html>

