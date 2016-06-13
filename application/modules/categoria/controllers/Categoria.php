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

class Categoria extends CI_Controller {

	
     function __construct()
        {
            parent::__construct();                               
            $this->load->library(array('ion_auth','grocery_CRUD'));
            
        }
    
    
	public function index()
	{
            try{
                $crud = new grocery_CRUD();
                //$crud->set_theme('datatables');
                $crud->set_table('categoria');
                $crud->set_subject('Categoria');
                $crud->columns('categoria','descripcion');
               
                $crud->display_as('categoria','Categoria');
                $crud->display_as('descripcion','Descripcion');
               
                //--- si no es admin--> solo view
                if (!$this->ion_auth->is_admin()){                                   
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->unset_edit();
                }
              
                $data['titulo_pagina']    = '<h2>Categor&iacute;as de Blog</h2>';
                $data['pie_pagina_cat']   = '<a href="'. site_url('blog').'"/>Blog';
                $this->load->view('header_data',$data);
                
                $output = $crud->render();
                $this->load->view('crud_views_cat',$output);
                                
                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
                       		
	}
}

