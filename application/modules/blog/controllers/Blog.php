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
if (!defined('BASEPATH'))
{exit('No direct script access allowed');}

class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->config('config_blog');
        $this->load->model('Blog_model');       
        $this->load->library(array('ion_auth','form_validation','Grocery_CRUD'));
        //Leo configuracion de blog
        $this->todo = $this->config->config;
    }

    public function index()
    {
        /*  Si el usuario es el admin, CRUD en todas los Blogs
        * 
        *  Si el usuario no es admin, CRUD solo en sus Blogs
        * 
        *  Si el usuario no esta registrado puede ver los blogs y no CRUD
        */
                
        if ($this->session->userdata('username') != ''){
            if ($this->ion_auth->is_admin()){
                $blog = $this->Blog_model->get_all();           
                $data = array(
                'blog_data' => $blog
                );
                $data['editable'] = TRUE;
            }else{
                $blog = $this->Blog_model->user_pag_get_all($this->session->userdata('user_id'));           
                $data = array(
                'blog_data' => $blog
                );
                $data['editable'] = TRUE;
            }
        }else {
                $blog = $this->Blog_model->get_all();
                $data = array(
                'blog_data' => $blog
                ); 
                $data['editable'] = FALSE;
        }
                               
        //datos de la configuracion exclusiva de blog
        $data['filas_texto']  = $this->config->item('row_textarea');
        $data['ancho_imagen'] = $this->config->item('width_image');
        $data['alto_imagen']  = $this->config->item('heigt_image');
        $data['ancho_texto']  = $this->config->item('cols_textarea');
                        
        //$data['editable'] = TRUE;//--- ojo.. anular al finalizar desarrollo
        $this->load->view('blog_list', $data);
    }
    
    public function mydiscus($id)
    {
        $row = $this->Blog_model->get_by_id($id);
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
	    );
            $this->load->view('blog_discus', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
        }
                      
    }
            
    function blog_get_cat() 
    {
        $categ = $this->db->get('categoria')->result();
        return $categ;
    }
                  
    public function read($id) 
    {
        $row = $this->Blog_model->get_by_id($id);
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
	    );
            //datos de la configuracion exclusiva de blog
            $data['filas_texto']  = $this->config->item('row_textarea');
            $data['ancho_imagen'] = $this->config->item('width_image');
            $data['alto_imagen']  = $this->config->item('heigt_image');
            $data['ancho_texto']  = $this->config->item('cols_textarea');
            
            $this->load->view('blog_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
        }
    }

    public function create() 
    {   
        $hoy = getdate();
        $newDate = date_create($hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
               
         $data = array(
            'button' => 'Create',
            'action' => site_url('blog/create_action'),
	    'id_blog' => set_value('id_blog'),
	    'titulo' => set_value('titulo'),
	    'texto' => set_value('texto'),
	    'fecha' => date_format($newDate,'Y/d/m'),
	    'imagen' => set_value('imagen'),
	    'categoria_id' => set_value('categoria_id'),
	    'user_id' => $this->session->userdata('user_id'),
            'categorias' => $this->blog_get_cat(),
            'filas_texto' => $this->config->item('row_textarea'),
	);
        
        $this->load->view('blog_create', $data);
    }
    
    public function create_action() 
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'titulo' => $this->input->post('titulo',TRUE),
		'texto' => $this->input->post('texto',TRUE),
		'fecha' => $this->input->post('fecha',TRUE),
		'imagen' => $this->input->post('imagen',TRUE),
		'categoria_id' => $this->input->post('categoria_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Blog_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('blog'));
        }
                
    }
    
    public function update($id) 
    {
        $row = $this->Blog_model->get_by_id($id);
        $hoy = getdate();
        $newDate = date_create($hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']);
        // Guarda fecha sistema si el blog es modificado 
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('blog/update_action'),
		'id' => set_value('id', $row->id_blog),
		'titulo' => set_value('titulo', $row->titulo),
		'texto' => set_value('texto', $row->texto),
		'fecha' => date_format($newDate,'Y/d/m'),
		'imagen' => set_value('imagen', $row->imagen),
		'categoria_id' => set_value('categoria_id', $row->categoria_id),
		'user_id' => set_value('user_id', $row->user_id),
                'categoria' => $row->categoria,
                'categorias' => $this->blog_get_cat(),
                'username' => $row->username,
                'filas_texto' => $this->config->item('row_textarea'),
                'ancho_imagen' => $this->config->item('width_image'),
                'alto_imagen' => $this->config->item('heigt_image'),
	    );
            
            $this->load->view('blog/blog_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'titulo' => $this->input->post('titulo',TRUE),
		'texto' => $this->input->post('texto',TRUE),
		'fecha' => $this->input->post('fecha',TRUE),
		'imagen' => $this->input->post('imagen',TRUE),
		'categoria_id' => $this->input->post('categoria_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Blog_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('blog'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Blog_model->get_by_id($id);

        if ($row) {
            $this->Blog_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('blog'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('titulo', 'titulo', 'trim|required');
	$this->form_validation->set_rules('texto', 'texto', 'trim|required');
	$this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
	$this->form_validation->set_rules('imagen', 'imagen', 'trim|required');
	$this->form_validation->set_rules('categoria_id', 'categoria id', 'trim');
	$this->form_validation->set_rules('user_id', 'user id', 'trim');
	$this->form_validation->set_rules('id_blog', 'id_blog', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=blog.doc");

        $data = array(
            'blog_data' => $this->Blog_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('blog/blog_doc',$data);
    }
             
} // Fin blog

