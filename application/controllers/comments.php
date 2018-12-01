<?php

class Comments extends CI_Controller {

  // AUTOMATICALLY LOAD THE WHOLE THREAD
  public function index($post_id) {
    $post = $this->post->get_post($post_id);
    $comments = $this->comment->get_all_comments($post_id);
    $this->load->view('thread', array(
      'post' => $post,
      'comments' => $comments
    ));
  }

  public function delete_comment() {
    $comment_id = $this->input->post('comment_id', TRUE);
    $this->comment->delete_comment($comment_id);
    $post_id = $this->input->post('post_id', TRUE);
    redirect('/thread/'.$post_id);
  }

  public function toggle_edit_comment() {
    $this->session->comment_edit_id = $this->input->post('comment_id');
    $post_id = $this->input->post('post_id', NULL);
    redirect('/thread/'.$post_id);
  }

  public function submit_edit_comment() {
    $content = $this->input->post('edited_content_comment', NULL);
    $values = array(
      'content' => $content,
      'id' => $this->session->comment_edit_id
    );
    $this->comment->update_comment($values);
    $this->session->comment_edit_id = NULL;
    $post_id = $this->input->post('post_id', TRUE);
    redirect('/thread/'.$post_id);
  }
}
