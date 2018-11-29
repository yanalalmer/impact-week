<?php

class Post extends CI_Model {

  public function get_all_posts() {
    $query = 'SELECT posts.id, content, users.first_name
              FROM posts
              JOIN users
              ON posts.user_id = users.id
              ORDER BY posts.created_at DESC';
    return $this->db->query($query)->result_array();
  }

  public function upvote($id) {
    $query = "UPDATE posts SET upvote = upvote + 1 WHERE id = ?";
    $this->db->query($query, array($id));
  }

  public function add_post($data) {
    $query = "INSERT INTO posts (content, user_id) VALUES (?, ?)";
    $this->db->query($query, $data);
  }

}
?>
