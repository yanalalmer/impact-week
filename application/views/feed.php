<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feed</title>
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/styles.css"/>

    <?php
    if ( ! $this->session->user) {
      redirect('/users/index');
      die();
    }
    ?>
  </head>
  <body>
    <?php $this->load->view('/header/header-feed.php') ?>

    <!-- <?php var_dump($this->session->all_userdata()) ?> -->
    <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 ">
         <!--  <a href=<?="/users/profile/".$this->session->user['id']?> class="badge badge-secondary">Your profile</a>
          <form action="/users/log_out" method="post">
            <input type="submit" value="Log out" class="btn btn-danger"/>
          </form> --><br><br>

          <a href='/users/female_friends/'>Female Friends</a>
          <form action="/posts/add" method="post">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Enter title here/</span>
              <textarea type="text" name='title' placeholder='' rows="1" /></textarea> <br>
            </div>
             <textarea name="content" placeholder="Post text here" class="form-control " rows="3"></textarea>
            <input type="hidden" value=<?=$this->session->user['id']?> name='id'>
            <input type="submit" value="post" class="btn btn-primary" />
          </form>
        </div>
      </div><br><br>

      <div class="row">
        <?php
        /*Print each post. If the post was creaded by the logged-in user,
        add the option to eddit.
        If edit was toggled on for a given post, display a form with the
        post content as a default.
        */
        foreach($posts as $post) {
        ?>

          <div  class=" card col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 post p-3 mb-2 bg-light text-dark border-dark">
            <?php
            if ($this->session->post_edit_id === NULL or $this->session->post_edit_id !== $post['id']) {
            ?>
            <?= '<h4 class="card-title p-3 mb-5 text-white " style="background-color: #85B3B8">'.$post['title'].'</h4>' ?>
            <h5 clas="text-monospaced"><?= $post['content'] ?></h5><br>
            <a href="<?='/thread/'.$post['id']?>" class="btn btn-sm"><?=$post['comment_count']." " ?>comments</a><br>
            Uploader: <p class="card-text text-info"><?php if($post['name']) {
              echo $post['name'];
            } else {
              echo $post['email'];
            }?></p>
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
                  <button onclick="scroll(0, 100);"><i class="fa fa-edit"> edit post</i></button>
                  <!-- <input type='submit' value='Edit' class="btn far fa-edit" /> -->
                </form><br>
                <form action="/posts/delete_post" method="post">
                  <input type='hidden' name='post_id' value=<?=$post['id']?>>
                  <button><i class="far fa-trash-alt"> delete post</i></button>
                  <!-- <input type='submit' value='Delete' class="btn-sm btn-dark" /> -->
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
                <input type="text" name="edited_title_post" value='<?=$post['title']?>'/>
                <textarea name="edited_content_post" class="form-control " rows="3"><?=$post['content']?></textarea><br>
                <input type='submit' value='submit' class="btn-sm btn-dark" />
              </form><br>
              Uploader: <p class="card-text text-info"><?php if($post['name']) {
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
    </div><br><br>
    <footer>
        <?php $this->load->view('footer/footer.php'); ?>
    </footer>
    <script type="text/javascript">\
    // if (# {}
    //   window.scroll({
    //     top: 870,
    //     left: 100,
    //     behavior: 'smooth'
    //   });
    </script>
  </body>
</html>
