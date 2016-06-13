<?php

if (!defined('BASEPATH'))
{exit('No direct script access allowed');}

class Blog_model extends CI_Model
{
    public $table = 'blog';
    public $id = 'id_blog';   
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
    // Establezco relacion blog->categoria
    //                     blog->users
    function my_set_relation()
    {
        $this->db->select();       
        $this->db->join('categoria', 'blog.categoria_id = categoria.id_categoria','left');
        $this->db->join('users', 'blog.user_id = users.id','left');
    }
    
    // Solo leo los blogs de un usuario
    function user_get_all($cUser)
    {
        $this->my_set_relation();
        $this->db->like('user_id',$cUser,'after');       
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all()
    {
        $this->my_set_relation();
        $this->db->order_by($this->id, $this->order);  
        return $this->db->get($this->table)->result();        
    }

    // get data by id
    function get_by_id($id)
    {
        $this->my_set_relation();
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
     // get data by user
    function get_by_user($user)
    {
        $this->my_set_relation();
        $this->db->where('user_id', $user);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_blog', $q);
	$this->db->or_like('titulo', $q);
	$this->db->or_like('texto', $q);
	$this->db->or_like('fecha', $q);
	$this->db->or_like('imagen', $q);
	$this->db->or_like('categoria_id', $q);
	$this->db->or_like('user_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_blog', $q);
	$this->db->or_like('titulo', $q);
	$this->db->or_like('texto', $q);
	$this->db->or_like('fecha', $q);
	$this->db->or_like('imagen', $q);
	$this->db->or_like('categoria_id', $q);
	$this->db->or_like('user_id', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
