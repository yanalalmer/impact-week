<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Thread</title>
  </head>
  <body>

    <?php
    var_dump($post);

    var_dump($comments);
    ?>

    <?php
    // Display the post
    if ($this->session->post_edit_id === NULL or $this->session->post_edit_id !== $post['id']) {
    ?>
    <?= $post['content'] ?>
    <p>Uploader: <?= $post['name']?></p>
    <?php
      if ($this->session->user['id'] == $post['user_id']) {
        ?>
        <form action="/posts/toggle_edit_post" method="post">
          <input type='hidden' name='post_id' value=<?=$post['id']?>>
          <input type='submit' value='Edit' name='edit_in_thread' />
        </form>
        <form action="/posts/delete_post" method="post">
          <input type='hidden' name='post_id' value=<?=$post['id']?>>
          <input type='submit' value='Delete' />
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
        <input type='submit' value='submit' name='submit_in_thread' />
      </form>
      <p>Uploader: <?= $post['name']?></p>
      <hr>
    <?php
    }
    ?>


  </body>
</html>
