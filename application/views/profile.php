<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your profile</title>
    <?php
    if( ! $this->session->user) {
      redirect('/users');
      die();
    }
    ?>
  </head>
  <body>

    <a href="/users/edit_profile">Edit your profile</a>

    Welcome, <?=$this->session->user['first_name']?>
    <br>

    Your info:

    <p>
      First name: <?=$this->session->user['first_name']?>
    </p>

    <p>
      Last name: <?=$this->session->user['last_name']?>
    </p>

    <p>
      Email: <?=$this->session->user['email']?>
    </p>

    <p>
      City: <?=$this->session->user['city']?>
    </p>
  </body>
</html>
