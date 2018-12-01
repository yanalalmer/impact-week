<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feed</title>
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/styles.css">

    <?php
    if ( ! $this->session->user) {
      redirect('/users/index');
      die();
    }
    ?>
  </head>
  <body>
    <?php var_dump($this->session->all_userdata()) ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 ">
          <a href=<?="/users/profile/".$this->session->user['id']?>>Your profile</a>
          <form action="/users/log_out" method="post">
            <input type="submit" value="Log out" class="btn btn-danger"/>
          </form>
          <form action="/posts/add" method="post">
            <input type="text" name='title' placeholder='Enter title here' />
            <textarea name="content" placeholder="Post text here"></textarea>
            <input type="hidden" value=<?=$this->session->user['id']?> name='id'>
            <input type="submit" value="post" class="btn btn-primary" />
          </form>
        </div>
      </div>

      <div class="row">
        <?php
        /*Print each post. If the post was creaded by the logged-in user,
        add the option to eddit.
        If edit was toggled on for a given post, display a form with the
        post content as a default.
        */
        foreach($posts as $post) {
        ?>

          <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 post">
            <?php
            if ($this->session->post_edit_id === NULL or $this->session->post_edit_id !== $post['id']) {
            ?>
            <?= '<h4>'.$post['title'].'</h4>' ?>
            <?= $post['content'] ?>
            <p>Uploader: <?php if($post['name']) {
              echo $post['name'];
            } else {
              echo $post['email'];
            }?> | <a href=<?='/thread/'.$post['id']?>>comments</a></p>
            <p>
              <?php if ($post['is_pinned']) {
                echo "<strong>PINNED</strong>";
              }
              ?>
            </p>
            <?php
              if ($this->session->user['id'] == $post['user_id'] || $this->session->user['user_type']) {
                ?>
                <form action="/posts/toggle_edit_post" method="post">
                  <input type='hidden' name='post_id' value=<?=$post['id']?>>
                  <input type='submit' value='Edit' />
                </form>
                <form action="/posts/delete_post" method="post">
                  <input type='hidden' name='post_id' value=<?=$post['id']?>>
                  <input type='submit' value='Delete' />
                </form>
                <?php
              }

              if ($this->session->user['user_type'] == 1) {
                ?>
                <form action='/posts/toggle_pin' method='post'>
                  <input type='hidden' name='post_id' value=<?=$post['id']?>>
                  <input type="hidden" name="is_pinned" value=<?=$post['is_pinned']?>>
                  <input type='submit' value='Pin' />
                </form>
                <?php
              }
            ?>
            <hr>
            <?php
            }
            else
            {
              ?>
              <form action="/posts/submit_edit_post" method='post'>
                <textarea name="edited_content_post"><?=$post['content']?></textarea>
                <input type='submit' value='submit' />
              </form>
              <p>Uploader: <?php if($post['name']) {
                echo $post['name'];
              } else {
                echo $post['email'];
              }?></p>
              <hr>
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>

      </div>
    </div>
  </body>
</html>
