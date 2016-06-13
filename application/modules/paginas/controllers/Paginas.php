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

class Paginas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paginas_model');       
        $this->load->library(array('ion_auth','form_validation','Grocery_CRUD'));
    }

    public function index()
    {
        /*  Si el usuario es el admin, CRUD en todas las paginas
         * 
         *  Si el usuario no es admin, CRUD solo en sus paginas
         * 
         *  Si el usuario no esta registrado puede ver las paginas y no CRUD
         */
                         
        if ($this->session->userdata('username') != ''){
            if ($this->ion_auth->is_admin()){
                $paginas = $this->Paginas_model->get_all();           
                $data = array(
                'paginas_data' => $paginas
                );
                $data['editable'] = TRUE;
            }else{
                $paginas = $this->paginas_model->user_pag_get_all($this->session->userdata('user_id'));           
                $data = array(
                'paginas_data' => $paginas
                );
                $data['editable'] = TRUE;
            }
        }else {
                $paginas = $this->Paginas_model->get_all();
                $data = array(
                'paginas_data' => $paginas
                ); 
                $data['editable'] = FALSE;
        }
        

//        $data['editable'] = TRUE; //-- Desactivar al final del test
        $this->load->view('paginas/paginas_list', $data);
    }
    
    // get categoria de pagina
    function pag_get_cat() 
    {
        $categ = $this->db->get('cat_pagina')->result();
        return $categ;
    }
    
    // get categoria de blog
    function blog_get_cat() 
    {
        $categ = $this->db->get('categoria')->result();
        return $categ;
    }
            
    //Crea la pagina con el blog
    public function pag_blog($blog)
    {
        $this->load->model('blog/Blog_model');
        $row = $this->Blog_model->get_by_id($blog);
        if ($row) {
            $data = array(
		'id' => $row->id_blog,
		'titulo' => $row->titulo,
		'texto' => $row->texto,
		'fecha' => $row->fecha,
		'imagen' => $row->imagen,
		'categoria_id' => $row->categoria_id,
		'user_id' => $row->user_id,
                'username' => $row->username,
                'categoria' => $row->categoria,
                'categorias' => $this->pag_get_cat(),
                'cat_blog' => $this->blog_get_cat(),
                'otros_blog' => $this->Blog_model->get_by_user($row->user_id),
                'user_online' => $this->session->userdata('username'),
	    );
//            print_r($data);
            $this->load->view('mypagina/mypagina_blog',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paginas'));
        }
               
    }
   
    /* Crea la pagina de usuario
     * Leo datos de pagina, datos de blog, datos de eventos
     * 
     *
     */
    public function pag_user($id) 
    {
       
        $this->load->model(array('blog/Blog_model','events/Events_model'));
                
        $row = $this->Paginas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pagina' => $row->id_pagina,
		'fecha' => $row->fecha,
		'imagen' => $row->imagen,
		'categoria_id' => $row->categoria_id,
		'user_id' => $row->user_id,
		'titulo_pagina' => $row->titulo_pagina,
		'cab_pagina' => $row->cab_pagina,
		'descripcion_corta' => $row->descripcion_corta,
		'descripcion_larga' => $row->descripcion_larga,
		'texto_pagina' => $row->texto_pagina,
		'id_blog_pagina' => $row->id_blog_pagina,
		'pie_pagina' => $row->pie_pagina,
                'username' => $row->username,
                'categoria' => $row->categoria_pagina,
                'categorias' => $this->pag_get_cat(),
                'blogs_user' => $this->Blog_model->user_get_all($row->user_id),
                'events_user' =>  $this->Events_model->get_by_user($row->username),
                'user_online' => $this->session->userdata('username'),
                'otras_paginas' =>  $this->Paginas_model->user_pag_get_all($row->user_id),
	    );
            
            // leo datos del blog para construir la pagina de usuario
            //$blog = $this->Blog_model->user_get_all($row->user_id);
            //$data['blogs_user'] = $blog;
                                    
            $this->load->view('mypagina/mypagina_user', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paginas'));
        }
    }
    
    //Edicion categoria de pagina
    public function categoria()
    {
        try{
                $crud = new grocery_CRUD();
                //$crud->set_theme('datatables');
                $crud->set_table('cat_pagina');
                $crud->set_subject('Categoria');
                $crud->columns();
                              
                $crud->display_as('categoria','Categoria');
                $crud->display_as('descripcion','Descripcion');
               
                //--- si no es admin--> solo view
                if (!$this->ion_auth->is_admin()){                                   
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->unset_edit();
                }
                $data['titulo_pagina'] = 'Categoria';
                $data['pie_de_pagina']   = '<a href="'. site_url('paginas').'"/>P&aacute;ginas';
                $this->load->view('header_data',$data);
                
                $output = $crud->render();
                $this->load->view('crud_views_pag',$output);
                                
                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
                       		        
    }
    // CRUD con tabla de paginas
    // Solo accesible al usuario registrado
    public function pag_view()
	{
            try{
                $crud = new grocery_CRUD();
//                $crud->set_theme('datatables');
                $crud->set_table('paginas');
                $crud->set_subject('Pagina');
                $crud->set_relation('user_id','users','username');
                $crud->set_relation('categoria_id','cat_pagina','categoria_pagina');
                $crud->columns('fecha','imagen','titulo_pagina','cab_pagina',
                        'descripcion_corta','descripcion_larga','texto_pagina','pie_pagina');
                $crud->set_field_upload('imagen','assets/uploads/files');
                $crud->edit_fields('user_id','categoria_id','fecha','imagen','titulo_pagina','cab_pagina',
                        'descripcion_corta','descripcion_larga','texto_pagina','pie_pagina');
                
                $crud->display_as('user_id','Autor');
                $crud->display_as('imagen','Imagen');
                $crud->display_as('cab_pagina','Cabecera de Pagina');
                $crud->required_fields('user_id','fecha','categoria_id','titulo_pagina');
                

//                $crud->add_action('UserPag', '', 'paginas/pag_user/','ui-icon-plus');
                
//                ejemplos:
//                $crud->add_fields('customerName','contactLastName','city','creditLimit');
//                $crud->edit_fields('customerName','contactLastName','city');
// 
//                $crud->required_fields('customerName','contactLastName');
               
                //--- si no es admin--> solo puede CRUD en sus paginas 
                if (!$this->ion_auth->is_admin()){                                   
//                    $crud->unset_delete();
//                    $crud->unset_add();
//                    $crud->unset_edit();
                    $crud->like('user_id',$this->session->userdata('user_id'));
                }
                $data['titulo_pagina'] = 'Lista de P&aacute;ginas de:<small> '.$this->session->userdata('username').'</small>';
                $data['pie_de_pagina']   = '<a href="'. site_url('paginas').'"/>Paginas';
                $this->load->view('header_data',$data);
                
                $output = $crud->render();
                $this->load->view('crud_views_pag',$output);
                                
                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
                       		
	}
                           
    public function read($id) 
    {
        $row = $this->Paginas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pagina' => $row->id_pagina,
		'fecha' => $row->fecha,
		'imagen' => $row->imagen,
		'categoria_id' => $row->categoria_id,
		'user_id' => $row->user_id,
		'titulo_pagina' => $row->titulo_pagina,
		'cab_pagina' => $row->cab_pagina,
		'descripcion_corta' => $row->descripcion_corta,
		'descripcion_larga' => $row->descripcion_larga,
		'texto_pagina' => $row->texto_pagina,
		'id_blog_pagina' => $row->id_blog_pagina,
		'pie_pagina' => $row->pie_pagina,
                'categorias' => $this->pag_get_cat(),
	    );
            $this->load->view('paginas/paginas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paginas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paginas/create_action'),
	    'id_pagina' => set_value('id_pagina'),
	    'fecha' => set_value('fecha'),
	    'imagen' => set_value('imagen'),
	    'categoria_id' => set_value('categoria_id'),
	    'user_id' => set_value('user_id'),
	    'titulo_pagina' => set_value('titulo_pagina'),
	    'cab_pagina' => set_value('cab_pagina'),
	    'descripcion_corta' => set_value('descripcion_corta'),
	    'descripcion_larga' => set_value('descripcion_larga'),
	    'texto_pagina' => set_value('texto_pagina'),
	    'id_blog_pagina' => set_value('id_blog_pagina'),
	    'pie_pagina' => set_value('pie_pagina'),
            'categorias' => $this->pag_get_cat(),
	);
        $this->load->view('paginas/paginas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'fecha' => $this->input->post('fecha',TRUE),
		'imagen' => $this->input->post('imagen',TRUE),
		'categoria_id' => $this->input->post('categoria_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'titulo_pagina' => $this->input->post('titulo_pagina',TRUE),
		'cab_pagina' => $this->input->post('cab_pagina',TRUE),
		'descripcion_corta' => $this->input->post('descripcion_corta',TRUE),
		'descripcion_larga' => $this->input->post('descripcion_larga',TRUE),
		'texto_pagina' => $this->input->post('texto_pagina',TRUE),
		'id_blog_pagina' => $this->input->post('id_blog_pagina',TRUE),
		'pie_pagina' => $this->input->post('pie_pagina',TRUE),
	    );

            $this->Paginas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('paginas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Paginas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('paginas/update_action'),
		'id_pagina' => set_value('id_pagina', $row->id_pagina),
		'fecha' => set_value('fecha', $row->fecha),
		'imagen' => set_value('imagen', $row->imagen),
		'categoria_id' => set_value('categoria_id', $row->categoria_id),
		'user_id' => set_value('user_id', $row->user_id),
		'titulo_pagina' => set_value('titulo_pagina', $row->titulo_pagina),
		'cab_pagina' => set_value('cab_pagina', $row->cab_pagina),
		'descripcion_corta' => set_value('descripcion_corta', $row->descripcion_corta),
		'descripcion_larga' => set_value('descripcion_larga', $row->descripcion_larga),
		'texto_pagina' => set_value('texto_pagina', $row->texto_pagina),
		'id_blog_pagina' => set_value('id_blog_pagina', $row->id_blog_pagina),
		'pie_pagina' => set_value('pie_pagina', $row->pie_pagina),
	    );
            $this->load->view('paginas/paginas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paginas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pagina', TRUE));
        } else {
            $data = array(
		'fecha' => $this->input->post('fecha',TRUE),
		'imagen' => $this->input->post('imagen',TRUE),
		'categoria_id' => $this->input->post('categoria_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'titulo_pagina' => $this->input->post('titulo_pagina',TRUE),
		'cab_pagina' => $this->input->post('cab_pagina',TRUE),
		'descripcion_corta' => $this->input->post('descripcion_corta',TRUE),
		'descripcion_larga' => $this->input->post('descripcion_larga',TRUE),
		'texto_pagina' => $this->input->post('texto_pagina',TRUE),
		'id_blog_pagina' => $this->input->post('id_blog_pagina',TRUE),
		'pie_pagina' => $this->input->post('pie_pagina',TRUE),
	    );

            $this->Paginas_model->update($this->input->post('id_pagina', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('paginas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Paginas_model->get_by_id($id);

        if ($row) {
            $this->Paginas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('paginas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('paginas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
	$this->form_validation->set_rules('imagen', 'imagen', 'trim|required');
	$this->form_validation->set_rules('categoria_id', 'categoria id', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('titulo_pagina', 'titulo pagina', 'trim|required');
	$this->form_validation->set_rules('cab_pagina', 'cab pagina', 'trim|required');
	$this->form_validation->set_rules('descripcion_corta', 'descripcion corta', 'trim|required');
	$this->form_validation->set_rules('descripcion_larga', 'descripcion larga', 'trim|required');
	$this->form_validation->set_rules('texto_pagina', 'texto pagina', 'trim|required');
	$this->form_validation->set_rules('id_blog_pagina', 'id blog pagina', 'trim|required');
	$this->form_validation->set_rules('pie_pagina', 'pie pagina', 'trim|required');

	$this->form_validation->set_rules('id_pagina', 'id_pagina', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

