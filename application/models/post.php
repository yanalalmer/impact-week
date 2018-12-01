<?php

class Post extends CI_Model {

  public function get_all_posts() {
    $query = 'SELECT posts.id, content, CONCAT(first_name, " ", last_name) AS "name", user_id
              FROM posts
              JOIN users
              ON posts.user_id = users.id
              ORDER BY posts.created_at DESC';
    return $this->db->query($query)->result_array();
  }

  public function get_post($post_id) {
    $query = 'SELECT posts.id, content, CONCAT(first_name, " ", last_name) AS "name", users.id AS "user_id"
              FROM posts
              JOIN users
              ON posts.user_id = users.id
              WHERE posts.id = ?';
    return $this->db->query($query, array($post_id))->row_array();
  }

  public function add_post($data) {
    $query = "INSERT INTO posts (content, user_id) VALUES (?, ?)";
    $this->db->query($query, $data);
  }

  public function update_post($values) {
    $query = "UPDATE posts SET content = ?, updated_at = NOW() WHERE id = ?";
    $this->db->query($query, $values);
  }

  public function delete_post($id) {
    $query = "DELETE FROM comments WHERE post_id = ?";
    $this->db->query($query, array($id));
    $query = "DELETE FROM posts WHERE id = ?";
    $this->db->query($query, array($id));
  }
}
?>
