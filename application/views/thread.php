<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Thread</title>
  </head>
  <body>

    <?php
    var_dump($this->session->all_userdata());
    ?>

    <?php
    // -----DISPLAY THE POST-----
    if ($this->session->post_edit_id === NULL or $this->session->post_edit_id !== $post['id']) {
    ?>
    <?= '<h3>'.$post['title'].'</h3>' ?>
    <?= $post['content'] ?>
    <p>Uploader: <?php if($post['name']) {
      echo $post['name'];
    } else {
      echo $post['email'];
    }?></p>
    <?php
    // -----ALLOW LOGGED IN USER TO EDIT/DELETE HIS POSTS-----
      if ($this->session->user['id'] == $post['user_id'] || $this->session->user['user_type']) {
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
        <input type="text" name="edited_title_post" value='<?=$post['title']?>'/>
        <textarea name="edited_content_post"><?=$post['content']?></textarea>
        <input type='submit' value='submit' name='submit_in_thread' />
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
    <p>
      COMMENTS:
    </p>
    <?php
    // ----- DISPLAY ALL COMMENTS -----
    foreach ($comments as $comment) {
      ?>

      <?php
      if ($this->session->comment_edit_id === NULL or $this->session->comment_edit_id !== $comment['id']) {
        echo $comment['content'];
        ?>
        <p>Uploader: <?php if($comment['name']) {
          echo $comment['name'];
        } else {
          echo $comment['email'];
        }?></p>
        <?php
      // -----ALLOW LOGGED IN USER TO EDIT/DELETE HIS COMMENTS-----
        if ($this->session->user['id'] == $comment['user_id'] || $this->session->user['user_type']) {
          ?>
          <form action="/comments/toggle_edit_comment" method="post">
            <input type='hidden' name='comment_id' value=<?=$comment['id']?>>
            <input type='hidden' name='post_id' value=<?=$post['id']?>>
            <input type='submit' value='Edit' />
          </form>
          <form action="/comments/delete_comment" method="post">
            <input type='hidden' name='comment_id' value=<?=$comment['id']?>>
            <input type='hidden' name='post_id' value=<?=$post['id']?>>
            <input type='submit' value='Delete' />
          </form>
          <?php
        }
        ?>
        <hr>

        <?php
      } //-----END OF TOGGLE EDIT-----
      else
      {
        //-----SUBMIT A COMMENT-----
        ?>
        <form action="/comments/submit_edit_comment" method='post'>
          <textarea name="edited_content_comment"><?=$comment['content']?></textarea>
          <input type='hidden' name='post_id' value=<?=$post['id']?>>
          <input type='submit' value='submit' />
        </form>
        <p>Uploader: <?= $comment['name']?></p>
        <hr>
        <?php
      }
      ?>

    <?php
  } //-----END OF PRINTING COMMENTS
    ?>
    <form action="/comments/add_comment" method="post">
      <textarea name="content">Your text here</textarea>
      <input type='hidden' name='post_id' value=<?=$post['id']?>>
      <input type='submit' />
    </form>

  </body>
</html>
