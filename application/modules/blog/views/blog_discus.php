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

  Proyecto MyCi_Blogg
  Autor:   Blas Monerris Alcaraz
  Objeto:  Practicas/Aprendizaje
  Fecha comienzo : 01-06-2016
  Junio de 2016
  https://expresoweb.joomla.com
  mail: expresoweb2015@gmail.com

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

      <title>Blog/Discus</title>
      <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
      <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
      
   </head>
   <body>
      <?php require_once 'nav_main.php';?>
      <div id="page-content-wrapper">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Blog/Discus</h3>
            </div>
            <div class="panel-body">
                
               <!--<h2 style="margin-top:0px">Blog/Discus</h2>-->
               <div class="container-fluid">
               <div class="row">               
                <div class="col-md-12">
                  <div class="thumbnail">
                    <img src="<?php echo site_url('assets/uploads/files').'/'.$imagen;?>"
                        width="" height="" alt="<?php echo $imagen;?>"/>
                    <div class="caption">
                      <h4><?php echo $titulo;?></h4><h4>Categor&iacute;a :<?php echo $categoria;?></h4>
                      <h5>Publicado el :<?php echo $fecha;?> Por :<?php echo $username;?></h5>
                      <p><textarea class="form-control" rows="15" name="texto" id="texto" readonly ><?php echo $texto;?></textarea></p>
                      <p><a href="<?=site_url('main')?>" class="btn btn-primary" role="button">Home</a> <a href="<?=site_url('blog')?>" class="btn btn-default" role="button">Blogs</a></p>
                      <p><a href="http://example.com/bar.html#disqus_thread">MyCi Blogg Disqus</a>.</p>
                    </div>
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                         */
                        /*
                        var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() {  // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');

                            s.src = '//myciblogg.disqus.com/embed.js';

                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                  </div>
                </div>
              </div>
               </div> 
            </div>
         </div>       
      </div>
      <script id="dsq-count-scr" src="//myciblogg.disqus.com/count.js" async></script>       
   </body>
</html>


