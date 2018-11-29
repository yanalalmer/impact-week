<?php

class User extends CI_Model {

  public function get_one($email) {
    // $data is expected to hold email and password.
    return $this->db->query("SELECT * FROM users WHERE email = ?", $email)->row_array();
  }

  public function register($data) {

    $this->form_validation->set_data($data);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');

    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

    if ($this->form_validation->run()) {
      $query = 'INSERT INTO users (email, password) VALUES (?, ?)';
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      $values = array($data['email'], $data['password']);
      $this->db->query($query, $values);
      $this->session->set_flashdata('registration_status', 'You have registered successfully!');

    } else {
      $this->session->test = 'bad';
      $this->session->set_flashdata('registration_error', validation_errors());

    }
  }


}

?>
