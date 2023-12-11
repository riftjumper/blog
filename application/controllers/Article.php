<?php

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
        $this->config->set_item('csrf_protection', false);
        $this->load->model('Article_model');
    }
    public function index()
    {
        $this->load->model('Article_model');
        $this->load->view("article.php");
    }

    public function get_articles()
    {
        $this->load->model('Article_model');
        $articles = $this->Article_model->get_articles();

        header('Content-Type: application/json');
        echo json_encode($articles);
    }


    public function view($id)
    {
        $this->load->model('Article_model');
        $data['article'] = $this->Article_model->get_article($id);

        if ($data['article']) {
            $this->load->view('article_view', $data);
        } else {
            show_404();
        }
    }

    public function upload()
    {
        $this->load->model('Article_model');
        $data['current_user'] = $this->auth_model->current_user();

        if ($this->input->method() === 'post') {
            $file_name = str_replace('.', '', $data['id']);
            $config['upload_path']          = FCPATH . '/upload/avatar/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            $config['max_width']            = 1080;
            $config['max_height']           = 1080;

            $this->load->library('upload', $config);

            // baru sampai sini liat di https://www.petanikode.com/codeigniter-upload/

        }
    }
    public function add()
    {
        $this->load->model('Article_model');

        $data = array(
            'photo' => $this->input->post('photo'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        );

        unset($data['id']);

        $this->Article_model->insert_article($data);
        echo json_encode(array('status' => 'success'));
    }


    public function delete($id)
    {
        $this->load->model('Article_model');
        $this->Article_model->delete_article($id);

        echo json_encode(array('status' => 'success'));
    }

    public function update($id)
    {

        $data = array(
            'photo' => $this->input->post('photo'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        );

        $data['id'] = $id;

        $this->load->model('Article_model');
        $this->Article_model->update_article($data);

        redirect('article');
    }




    public function edit($id)
    {
        $this->load->model('Article_model');
        $article = $this->Article_model->get_article($id);

        header('Content-Type: application/json');
        echo json_encode($article);
    }

    public function edit_view($id)
    {
        $this->load->model('Article_model');
        $article = $this->Article_model->get_article($id);

        $data['article'] = $article;
        $this->load->view('article_edit', $data);
    }
}
