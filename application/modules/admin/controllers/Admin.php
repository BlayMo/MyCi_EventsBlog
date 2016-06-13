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

class Admin extends CI_Controller {
             
        function __construct()
        {
            parent::__construct();                               
            $this->load->library(array('ion_auth','grocery_CRUD'));
            
        }
    	
        public function index()
        {
                $this->load->view('admin_view');
        }
        
        public function admin_pag()
        {
            try{
                $crud = new grocery_CRUD();
                //$crud->set_theme('datatables');
                $crud->set_table('paginas');
                $crud->set_subject('Pagina');
                $crud->set_relation('user_id','users','username');
                $crud->set_relation('categoria_id','cat_pagina','categoria_pagina');
                $crud->columns();
//                $crud->columns('user_id','imagen','titulo_pagina','cab_pagina',
//                        'descripcion_corta','descripcion_larga','texto_pagina','pie_pagina');
                $crud->set_field_upload('imagen','assets/uploads/files');
               
                $crud->display_as('categoria_id','Categoria');
                $crud->display_as('user_id','Usuario');
                $crud->display_as('id_blog_pagina','Blog');
               
                //--- si no es admin--> solo view
                if (!$this->ion_auth->is_admin()){                                   
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->unset_edit();
                }
                $data['titulo_pagina']      = '<h2>Admin. Paginas de usuario</h2>';
                $data['pie_pagina_admin']   = '<a href="'. site_url('admin').'"/>Admin';
                $this->load->view('header_data',$data);
                
                $output = $crud->render();
                $this->load->view('admin_crud_views',$output);
                                
                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
            
        }
                        
        public function users()
        {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('users');
            $crud->set_subject('User');

            $crud->columns('first_name','last_name','username','email');

            //--- si no es admin--> solo view
            $crud->unset_add();
            $crud->unset_edit();
            if (!$this->ion_auth->is_admin()){                                   
                $crud->unset_delete();
            }else{

                $crud->add_action('Add','',  'auth/create_user','ui-icon-plus');
                $crud->add_action('Edit','', 'auth/edit_user','ui-icon-edit');
                $crud->add_action('(-)','',  'auth/deactivate','ui-icon-edit');                     
             }
            $data['titulo_pagina']    = '<h2>Admin. Usuarios</h2>';
            $data['pie_pagina_admin'] = '<a href="'. site_url('admin').'"/>Admin';
            
            $output = $crud->render();
            $this->load->view('header_data',$data);
            $this->load->view('admin_crud_views',$output);                   
        }
        
        public function grupos()
	{
		$crud = new grocery_CRUD();
                $crud->set_theme('datatables');
		$crud->set_table('groups');
                $crud->set_subject('Group');                               
                $crud->columns('name','description');
                $crud->unset_add();
                $crud->unset_edit();
               
                
                if (!$this->ion_auth->is_admin())
                {
                     $crud->unset_delete();
                }else
                {                                                                                          
                    $crud->add_action('Add','',  'auth/create_group','ui-icon-plus');
                    $crud->add_action('Edit','', 'auth/edit_group','ui-icon-edit');                    
                }	 
		$output = $crud->render();
                $data['titulo_pagina'] = '<h2>Admin. Grupos de usuarios</h2>';
                $data['pie_pagina_admin'] = '<a href="'. site_url('admin').'"/>Admin';
                $this->load->view('header_data',$data);
                $this->load->view('admin_crud_views',$output);
	}
        
        public function users_groups()
        {
            $crud = new grocery_CRUD();
                //$crud->set_theme('datatables');
		$crud->set_table('users_groups');

                $crud->set_relation('user_id','users','username');
                $crud->set_relation('group_id','groups','name');
                $crud->display_as('user_id','Usuario');
                $crud->display_as('group_id','Grupo al que pertenece');
                $crud->unset_add();
                $crud->unset_edit();
                $crud->unset_delete(); 
	 
		$output = $crud->render();
                $data['titulo_pagina'] = '<h2>Admin. Usuarios&amp;Grupos</h2>';
                $data['pie_pagina_admin'] = '<a href="'. site_url('admin').'"/>Admin';
                $this->load->view('header_data',$data);
                $this->load->view('admin_crud_views',$output);
            
        }
	
        
        public function adblogg()
        {
            try{
                $crud = new grocery_CRUD();
                //$crud->set_theme('datatables');
                $crud->set_table('blog');
                $crud->set_subject('Blog');
                $crud->columns('imagen','fecha','titulo','categoria_id','user_id','texto');
                $crud->set_field_upload('imagen','assets/uploads/files');
                $crud->set_relation('categoria_id','categoria','categoria');
                $crud->set_relation('user_id','users','username');
                $crud->display_as('categoria_id','Categoria');
                $crud->display_as('user_id','Publicado por');
                $crud->order_by('id_blog','desc');
                
                if ($this->session->userdata('user_id') != 1){
                    $crud->like('user_id',$this->session->userdata('user_id'));}

                //--- si no es admin--> solo view
                if (!$this->ion_auth->is_admin()){                                   
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->unset_edit();
                }
                $data['titulo_pagina'] = '<h2>Admin. de Blogs</h2>';
                $data['pie_pagina_admin'] = '<a href="'. site_url('admin').'"/>Admin';
                $this->load->view('header_data',$data);
                $output = $crud->render();
                $this->load->view('admin_crud_views',$output);

                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
                       
        }
        
        public function adcategoria()
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
                $data['titulo_pagina'] = '<h2>Admin. Categorias de Blog</h2>';
                $data['pie_pagina_admin'] = '<a href="'. site_url('admin').'"/>Admin';
                $this->load->view('header_data',$data);
                
                $output = $crud->render();
                $this->load->view('admin_crud_views',$output);
                                
                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
                       
        }
        
        public function adcat_pag()
        {
            try{
                $crud = new grocery_CRUD();
                //$crud->set_theme('datatables');
                $crud->set_table('cat_pagina');
                $crud->set_subject('Cat.Pagina');
                $crud->columns('categoria_pagina','descripcion_cat_pag');
               
                $crud->display_as('categoria_pagina','Categoria');
                $crud->display_as('descripcion_cat_pag','Descripcion');
               
                //--- si no es admin--> solo view
                if (!$this->ion_auth->is_admin()){                                   
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->unset_edit();
                }
                $data['titulo_pagina'] = '<h2>Admin. Categorias de Pagina</h2>';
                $data['pie_pagina_admin'] = '<a href="'. site_url('admin').'"/>Admin';
                $this->load->view('header_data',$data);
                
                $output = $crud->render();
                $this->load->view('admin_crud_views',$output);
                                
                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
                       
        }
        
                           
}
