<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feed</title>
    	<link rel="shortcut icon" href="/assets/favicon.png">
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/sidebar.css"/>

    <?php
    if ( ! $this->session->user) {
      redirect('/users/index');
      die();
    }
    ?>
  </head>
  <body>

    <header>
          <?php $this->load->view('/header/header-3.php') ?>
    </header>
<div class="wrapper">

    <!-- Sidebar -->
      <nav id="sidebar">
        <div class="sidebar-header" style="text-align: center;">
            <h4>Sidebar header</h4>
        </div>

        <ul class="list-unstyled components">
            <li>
                <ul>
                    <li>
                        <a href="#">Google</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
    </nav>


    <!-- Page Content -->
    <div id="content">
        <!-- We'll fill this with dummy content -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn-info" style="margin-left: 70px;">
               <i class="fas fa-align-left"></i>
                <span>Hide/Open Menu</span>
            </button>

        </div>
    </nav>

        <div class="container">
      <div class="row">
        <div class="col-sm-7 offset-sm-1 p-2">
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

          <div  class=" card col-sm-6 offset-sm-2 p-2 mb-1 bg-light text-dark border-dark">
            <?php
            if ($this->session->post_edit_id === NULL or $this->session->post_edit_id !== $post['id']) {
            ?>


            <h5 class="card-title p-2 text-white" style="background-color: #85B3B8">
                <?php if ($post['is_pinned']) { ?>
                <i class="fas fa-thumbtack"></i>
                <?php } ?><?= $post['title']?>
            </h5>
            <h6 clas="text-monospaced"><?= $post['content'] ?></h6>
            <a href="<?='/thread/'.$post['id']?>" class="btn btn-sm"><?=$post['comment_count']." " ?>comments</a>
            Uploader: <p class="card-text text-info"><?php if($post['name']) {
              echo "<a href='/profile/{$post['user_id']}'>".$post['name']."</a>";
            } else {
              echo "<a href='/profile/{$post['user_id']}'>".$post['email']."</a>";
            }?></p>

            <?php
              if ($this->session->user['id'] == $post['user_id'] || $this->session->user['user_type']) {
                ?>
        <div>
                <form action="/posts/toggle_edit_post" method="post" style="display: inline-block;">
                  <input type='hidden' name='post_id' value=<?=$post['id']?>>
                  <button><i class="fa fa-edit"> edit post</i></button>
                  <!-- <input type='submit' value='Edit' class="btn far fa-edit" /> -->
                </form>
                <form action="/posts/delete_post" method="post" style="display: inline-block;">
                  <input type='hidden' name='post_id' value=<?=$post['id']?>>
                  <button><i class="far fa-trash-alt"> delete post</i></button>
                  <!-- <input type='submit' value='Delete' class="btn-sm btn-dark" /> -->
                </form>
          </div>
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
    </div>

</div><br>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});
    </script>
<br><br>
    <footer>
        <?php $this->load->view('footer/footer.php'); ?>
    </footer>
  </body>
</html>
