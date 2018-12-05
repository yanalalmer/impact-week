<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

    <?php
    $user_friend_status = 0;

    var_dump($requests);

    foreach ($friends as $friend) {

      if($friend['friend_id'] == $this->session->user['id']) {
        $user_friend_status = $friend['status'];
      }

      if ($friend['status'] == 1) {

        echo $friend['friend_name']." sent you a friend request <br>";
      }
      else if ($friend['status'] == 2) {
        echo $friend['friend_name']." is your friend<br>";
      }
    }

    echo "FRIEND STATUS: ".$user_friend_status;

    var_dump($friends);


    ?>

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
    if ($this->session->user['id'] != $user['id'] && $user_friend_status == 0) {
    ?>
      <button id="add">Add friend!</button>
      <button id="cancel" style="display:none">Cancel request</button>
    <?php
    } else if ($this->session->user['id'] != $user['id'] && $user_friend_status == 1) {
      ?>
      <button id="add" style="display:none">Add friend!</button>
      <button id="cancel">Cancel request</button>
      <?php
    } else if ($user_friend_status == 1) {
      echo "TODO";
      ?>
      <button id="accept">Accept friend request!</button>
      <button id="cancel">Reject friend request.</button>
      <button id="add" style="display:none">Add friend!</button>
      <button id="delete" style="display:none">Friendship over. JS is my new best friend.</button>

      <?php
    } else if ($this->session->user['id'] != $user['id'] && $user_friend_status == 2) {
      ?>
      <button id="add" style="display:none">Add friend!</button>
      <button id="delete">Friendship over. JS is my new best friend.</button>
      <?php
    }
    ?>

    <?php



    ?>

  </body>
</html>

<script>
$(document).ready(function() {
  var id_to = <?=$user['id']?>;
  var id_from = <?=$this->session->user['id']?>;
  var user_friend_status = <?=$user_friend_status?>;
   console.log("User status starts at " + user_friend_status);
  function add_friend(id_from, id_to, user_friend_status) {
    $.ajax({
      url:'<?= base_url()?>users/add_friend',
      method:'POST',
      data: {id_to:id_to, id_from:id_from, user_friend_status:user_friend_status},
      success:function() {
        $("#add").hide();
        $("#cancel").show();
      }
    })
  }

  function cancel_friend_request(id_from, id_to) {
    $.ajax({
      url:'<?= base_url()?>users/delete_friend',
      method:'POST',
      data: {id_to:id_to, id_from:id_from},
      success:function() {
        $("#add").show();
        $("#cancel").hide();
      }
    })
  }

  function delete_friend(id_from, id_to) {
    $.ajax({
      url:'<?= base_url()?>users/delete_friend',
      method:'POST',
      data: {id_to:id_to, id_from:id_from},
      success:function() {
        $("#add").show();
        $("#delete").hide();
      }
    })
  }

  function accept_friend(id_from, id_to) {
    $.ajax({
      url:'<?= base_url()?>users/accept_friend',
      method:'POST',
      data: {id_to:id_to, id_from:id_from},
      success:function() {
        $("#accept").hide();
        $("#cancel").hide();
        $("#delete").show();
      }
    })
  }


  $('#add').click(function() {
    console.log("we have " + user_friend_status);
    add_friend(id_from, id_to, user_friend_status);
    if (user_friend_status == 0) user_friend_status++;
    console.log("we have " + user_friend_status);
  });

  $("#cancel").click(function() {
    cancel_friend_request(id_from, id_to);
    user_friend_status = 0;
  });

  $("#delete").click(function() {
    delete_friend(id_from, id_to);
    user_friend_status = 0;
  });


});


</script>
