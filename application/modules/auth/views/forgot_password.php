
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
       <title>Forgot/Password</title>
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
         <h2><?php echo lang('forgot_password_heading');?></h2>
         <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p></div>
      </div>
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">Formulario de registro</h3>
         </div>
         <div class="panel-body">
            <!---------------------- forgot password ------------------------------->
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open("auth/forgot_password");?>
            <div class="controls">
               <div class="row">
                  <div class="col-md-6"> 
                     <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
                     <?php $identity['class'] = 'form-control';echo form_input($identity);?><br>
                  </div>
                  <div class="col-md-12"> 
                     <?php echo form_submit('submit', lang('forgot_password_submit_btn'),'class="btn btn-success btn-send"');?>
                      <a href="<?php echo site_url('main');?>">
                   <button type="button" class="btn btn-lg btn-link">Home</button></a>
                  </div>
               </div>
            </div>
            <?php echo form_close();?>
            <!---------------------- forgot password ------------------------------->
           
         </div>
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
   </body>
</html>

