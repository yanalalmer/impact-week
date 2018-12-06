<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style media="screen">

    </style>
    <?php
    var_dump($user);
    if( ! $this->session->user) {
      redirect('/users');
      die();
    }
    ?>
  </head>
  <body>

    <h4>User's posts</h4>
    <?php
    foreach($posts as $post) {
      echo "<h6><a href=/thread/".$post['post_id'].">{$post['title']}</a></h6>";
    }
     ?>
     <hr />

    <?php
    if ($this->session->user['id'] == $user['id']) {
      ?>
      <a href="/users/edit_profile">Edit your profile</a>
      <?php
    }
    ?>
    <img src=<?=$user['picture']?> width=100px height=100px>
    <?php
    if ($this->session->profile_edit_status == FALSE ) {
      ?>

      <p>
        First name: <?=$user['first_name']?>
      </p>

      <p>
        Last name: <?=$user['last_name']?>
      </p>

      <p>
        Email: <?=$user['email']?>
      </p>

      <p>
        City: <?=$user['city']?>
      </p>

      <?php if($user['phone']) {
        echo "<p>Phone: {$user['phone']}</p>";
      }

      if($user['birthdate']) {
        echo "<p>Birthdate: {$user['birthdate']}</p>";
      }

      if($user['bio']) {
        echo "<p>Bio: {$user['bio']}</p>";
      }

      if($user['education']) {
        echo "Education: <p>{$user['education']}</p>";
      }

      if($user['company']) {
        echo "Company: <p>{$user['company']}</p>";
      }

      if($user['industry']) {
        echo "Industry: <p>{$user['industry']}</p>";
      }

      if($user['role']) {
        echo "Role: <p>{$user['role']}</p>";
      }

      if($user['recruitment']) {
        echo "Recruitment: <p>{$user['recruitment']}</p>";
      }
      ?>
    </div>
      <?php
    } else
    {
      ?>
      <form action="/users/edit_profile" method="post">
        <label>First Name</label>
        <input type='text' name='first_name' value=<?=$user['first_name']?>>
        <br>
        <label>Last name</label>
        <input type='text' name='last_name' value=<?=$user['last_name']?>>
        <br>
        <label>Phone</label>
        <input type='text' name='phone' value=<?=$user['phone']?>>
        <br>
        <label>Birthdate</label>
        <input type='date' name='birthdate' value=<?=$user['birthdate']?>>
        <br>
        <label>Bio</label>
        <textarea name='bio'><?=$user['bio']?></textarea>
        <br />
        <label>Email</label>
        <input type='email' name='email' value=<?=$user['email']?>>
        <br>
        <label>Education</label>
        <input type='text' name='education' value=<?=$user['education']?>>
        <br>
        <label>Company</label>
        <input type='text' name='company' value=<?=$user['company']?>>
        <br>
        <label>Industry</label>
        <input type='text' name='industry' value=<?=$user['industry']?>>
        <br>
        <label>Role:</label>
        <input type='radio' name='role' value='mentor'>Mentor
        <input type='radio' name='role' value='mentee'>Mentee

        <br>
        <label>Recruitment:</label>
        <input type='radio' name='recruitment' value='Interested'>Interested
        <input type='radio' name='recruitment' value='Not interested'>Not interested
        <br>

        <input type='submit' value='Submit' name='submit_profile_edit'>
      </form>
      <?php
    }
    ?>

  <?php
  var_dump($this->session->all_userdata());
    ?>


  </body>
</html>
