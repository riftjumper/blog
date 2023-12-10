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

        // Add 'id' to $data
        $data['id'] = $id;

        $this->load->model('Article_model');
        $this->Article_model->update_article($data);

        // Optionally, you can redirect to a success page
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