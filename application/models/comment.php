<?php

class Comment extends CI_Model {

  // get all comments for a specific post
  public function get_all_comments($post_id) {
    $query = 'SELECT comments.id, content, CONCAT(first_name, " ", last_name)
              FROM comments
              JOIN users
              ON comments.user_id = users.id
              WHERE post_id = ?
              ORDER BY comments.created_at ASC';
    return $this->db->query($query, array($post_id))->result_array();
  }



}




?>
