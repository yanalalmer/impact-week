<?php

class Posts extends CI_Controller {

  public function index() {
    $this->load->model('post');
    $all = $this->post->get_all_posts();
    $this->load->view('feed', ['all' => $all]);
  }

  public function upvote() {
    $id = $this->input->post('id');
    $this->load->model('post');
    $this->post->upvote($id);
    redirect('/posts');
  }

  public function add() {
    $this->output->enable_profiler(TRUE);
    $data = $this->input->post(null, TRUE);
    $this->load->model('post');
    $this->post->add_post($data);
    redirect('/posts');
  }
}

?>
