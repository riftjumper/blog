<?php

class Auth extends CI_Controller {
    public function index() {
        // $this->load->view("login_form");
    }

    public function login() {
        $this->load->model("auth_model");
        // $this->load->library("form_validation");

        // $rules = $this->auth_model->rules();
        // $this->form_validation->set_rules($rules);

        // if ($this->form_validation->run() == FALSE) {
        //     return $this->load->view("login_form");
        // }

        // var_dump($_POST);
        // die;
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        if($this->auth_model->login($username, $password)){
            return redirect("article");
        } else{
            $this->session->set_flashdata("message_login_error","Login gagal pastikan username dan password benar");
        }

        $this->load->view("login_form");
    }

    public function logout() {
        $this->load->model('auth_model');
        $this->auth_model->logout();
        redirect(site_url());
    }
}