<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit your profile</title>
  </head>
  <body>

    <form action="/users/edit_profile" method="post">
      <label>First Name</label>
      <input type='text' name='first_name' value=<?=$this->session->user['first_name']?>>
      <br>
      <label>Last name</label>
      <input type='text' name='last_name' value=<?=$this->session->user['last_name']?>>
      <br>
      <label>email</label>
      <input type='email' name='email' value=<?=$this->session->user['email']?>>
      <br>
      <!-- <label>City</label>
      <input type='text' name='city' value=<?=$this->session->user['city']?>> -->

      <br>
      <input type='submit' value='Submit' name='submit_profile_edit'>
    </form>

  </body>
</html>
