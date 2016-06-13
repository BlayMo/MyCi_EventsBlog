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
  
    <link rel="icon" href="../../favicon.ico">

        <title>Login</title>

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
<!--<body>-->
<body style="padding-top: 2em; padding-left: 10em ;padding-right: 10em">
    <div id="page-content-wrapper">
    <div class="jumbotron"><div class="container">
        <h2><?php echo lang('login_heading');?></h2>
        <p><?php echo lang('login_subheading');?></p></div>
    </div>
        
	<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Formulario de acceso</h3>
            </div>
            <div class="panel-body">
                <!----------------------- login --------------------->                      
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open("auth/login");?>
            <div class="controls">
            <div class="row">
            <div class="col-md-6">             
                <?php echo lang('login_identity_label', 'identity','');                               
                $identity['class'] = 'form-control';
                echo form_input($identity);
                ?>              
            </div>
            <div class="col-md-6"> 
              <?php echo lang('login_password_label', 'password','');
              $password['class'] = 'form-control';
              echo form_input($password);?>
            </div>

            <div class="col-md-6"> 
                <label>
              <?php echo lang('login_remember_label', 'remember');?>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                </label> 
            </div>
            <div class="col-md-12">
                <br>
                <?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-success btn-send"');?>
                <a href="<?php echo site_url('main');?>">
                   <button type="button" class="btn btn-lg btn-link">Home</button></a>
            </div>
            <?php echo form_close();?>
            <div class="col-md-6"> 
                <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
            </div>
            <div class="col-md-6"> 
                <a href="create_user"><?php echo 'Sign Up';?></a>
            </div>
            
            <!-------------------------- login ----------------->                                 
             </div>
            </div>
        </div>
</div>               
</body>

</html>

