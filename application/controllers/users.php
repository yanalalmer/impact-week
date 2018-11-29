<?php

class Users extends CI_Controller {

  public function index() {
    $this->load->view('main');
  }

  public function login() {
    $this->output->enable_profiler(TRUE);
    $email = $this->input->post('login_email', TRUE);
    $password = $this->input->post('login_password', TRUE);
    $this->load->model('user');
    $user_info = $this->user->get_one($email);
    $this->session->user = $user_info;

    if ($user_info && password_verify($password, $user_info['password'])) {
      redirect('/feed');
    } else {
      $this->session->set_flashdata('login_error', 'Incorrect email and/or password');
      redirect('/');
    }
  }

  public function register() {
    $this->output->enable_profiler(TRUE);
    $data = $this->input->post(null, TRUE);
    $this->load->model('user');
    $this->user->register($data);
    redirect('/');
  }

  public function feed() {
    $this->load->view('feed');
  }

  public function log_out() {
    $this->session->sess_destroy();
    redirect('/');
  }

}
?>
