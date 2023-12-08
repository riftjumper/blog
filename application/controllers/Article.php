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

    public function update() {
        try {
            $data = $this->input->post();
            
            if (!isset($data['id'])) {
                throw new Exception("Missing 'id' in the data array.");
            }
    
            $this->load->model('ArticleModel');
            $this->ArticleModel->update_article($data);
            echo json_encode(['status' => 'success']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    

    public function edit($id) {
        $this->load->model('Article_model');
        $article = $this->Article_model->get_article($id);
    
        if ($article) {
            echo json_encode($article);
        } else {
            echo json_encode(['error' => 'Article not found']);
        }
    }
    

}