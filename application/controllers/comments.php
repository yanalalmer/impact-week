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

  public function delete_comment() {
    $this->output->enable_profiler(TRUE);
    $comment_id = $this->input->post('comment_id', TRUE);
    $this->comment->delete_comment($comment_id);
    $post_id = $this->input->post('post_id', TRUE);
    redirect('/thread/'.$post_id);
  }


}
