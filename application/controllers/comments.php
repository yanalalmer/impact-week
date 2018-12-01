<?php

class Comments extends CI_Controller {

  public function index($post_id) {
    $post = $this->post->get_post($post_id);
    $comments = $this->comment->get_all_comments($post_id);

    $this->load->view('thread', array(
      'post' => $post,
      'comments' => $comments
    ));
  }


}
