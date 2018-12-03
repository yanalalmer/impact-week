<?php

class User extends CI_Model {

  public function get_user_by_email($email) {
    return $this->db->query("SELECT users.id, first_name, last_name, email, city, password, user_type, phone, birthdate, bio, education, company, industry, role, recruitment
          FROM users LEFT JOIN cities ON users.city_id=cities.id WHERE email = ?", $email)->row_array();
  }

  public function get_user_by_id($id) {
    return $this->db->query("SELECT users.id, first_name, last_name, email, city, password, user_type, phone, birthdate, bio, education, company, industry, role, recruitment
          FROM users LEFT JOIN cities ON users.city_id=cities.id WHERE users.id = ?", $id)->row_array();
  }

  public function register($data) {
    // Later: move validation to controller and make it a separate method.
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
      $this->session->set_flashdata('registration_error', validation_errors());
    }
  }

  public function update_profile($values) {
    $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, birthdate = ?, bio = ?, education = ?, company = ?, industry = ?, role = ?, recruitment = ?, updated_at = NOW() WHERE id = ?";
    $this->db->query($query, $values);
  }

  public function search_friends($keyword) {
    // $query = "SELECT * FROM users WHERE first_name LIKE '%{$keyword}%' OR last_name LIKE '%{$keyword}%' OR city LIKE '%{$keyword}%' OR email LIKE '%{$keyword}%' OR education LIKE '%{$keyword}%' OR company LIKE '%{$keyword}%' OR industry LIKE '%{$keyword}%'";
    // return $this->db->query($query)->result_array();
    $keywords = explode(' ', $keyword);

    //
    // $query = "SELECT * FROM users WHERE first_name LIKE '%$keyword%'";
    // return $this->db->query($query)->result_array();

    $this->db->select('*');
    $this->db->from('users');
    if ($keyword !== '') {
      $this->db->where_in('first_name', $keywords);
      $this->db->or_where_in('last_name', $keywords);
      $this->db->or_where_in('city', $keywords);
      $this->db->or_where_in('education', $keywords);
      $this->db->or_where_in('company', $keywords);
      $this->db->or_where_in('industry', $keywords);
      $this->db->or_where_in('role', $keywords);
      $this->db->or_where_in('recruitment', $keywords);
    }
    return $this->db->get()->result_array();
  }

}

?>
