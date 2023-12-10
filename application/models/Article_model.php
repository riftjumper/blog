<?php

class Article_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_articles()
    {
        $query = $this->db->get('article');
        return $query->result();
    }

    public function get_article($id)
    {
        $query = $this->db->get_where('article', array('id' => $id));
        return $query->row();
    }

    public function insert_article($data)
    {
        $this->db->insert('article', $data);
        return $this->db->insert_id();
    }

    public function delete_article($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('article');
    }

    public function update_article($data)
    {
        $this->db->where('id', $data['id']);
        unset($data['id']);  // Remove 'id' from $data to avoid updating it
        $this->db->update('article', $data);
    }




}