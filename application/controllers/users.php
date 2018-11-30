<?php

class Users extends CI_Controller {


  public function index() {
    $this->load->view('main');
  }

  public function login() {
    $email = $this->input->post('login_email', TRUE);
    $password = $this->input->post('login_password', TRUE);
    $this->session->user = $this->user->get_user_by_email($email);

    if ($this->session->user && password_verify($password, $this->session->user['password'])) {
      redirect('/feed');
    } else {
      $this->session->set_flashdata('login_error', 'Incorrect email and/or password');
      redirect('/');
    }
  }

  public function log_out() {
    $this->session->sess_destroy();
    redirect('/');
  }

  public function register() {
    $data = $this->input->post(NULL, TRUE);
    $this->user->register($data);
    redirect('/');
  }

  public function feed() {
    $this->load->view('feed');
  }

  public function profile($id) {
    $this->session->user = $this->user->get_user_by_id($id);
    $this->load->view('profile');
  }

  public function edit_profile() {
    if(!$this->input->post('submit_profile_edit')) {
      $this->session->profile_edit_status = TRUE;
      redirect('/users/profile/'.$this->session->user['id']);
    } else {
      $values = array(
        'first_name' => $this->input->post('first_name', TRUE),
        'last_name' => $this->input->post('last_name', TRUE),
        'email' => $this->input->post('email', TRUE),
        'id' => $this->session->user['id']
      );
      $this->user->update_profile($values);
      $this->session->unset_userdata('profile_edit_status');
      redirect('/users/profile/'.$this->session->user['id']);
    }
  }
}
?>
