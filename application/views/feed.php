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
  </head>
  <?php
  if ($this->session->user) {
        ?>
    <body>

      <div class="container">
        <div class="row">
          <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 ">
            <form action="/users/log_out" method="post">
              <input type="submit" value="Log out" class="btn btn-danger"/>
            </form>
            <form action="/posts/add" method="post">
              <textarea name="content"></textarea>
              <input type="hidden" value=<?=$this->session->user['id']?> name='id'>
              <input type="submit" value="post" class="btn btn-primary" />
            </form>
          </div>
        </div>

        <div class="row">

            <?php

            foreach($all as $post) {
              ?>

              <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 post">
                <?= $post['content'] ?>
                <hr />
                <p>Uploader: <?= $post['first_name']?></p>

              </div>

              <?php
            }

            ?>


        </div>

      </div>

    </body>

    <?php
  } else {
    ?>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 ">
            <a href='/'>Log in</a> to see the feed.
          </div>
        </div>
      </div>
    </body>
    <?php

  }
  ?>
</html>
