<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Female Ventures</title>
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/styles.css"/>
  </head>
  <body>

  <div class="container">
    <div class="row">
      <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
        <form action="/users/login" method="post">
          <h4>Female Ventures</h4>
          <p class="warning_message"><?php echo $this->session->flashdata('login_error') ?></p>

          <div class="form-row">
            <div class="form-group col-sm-6 col-md-6">
              <label for="login_email">Email</label>
              <input id="login_email" name="login_email"
              class="form-control" type="email" placeholder="Email"
              value="test@email.com" required/>
            </div>
            <div class="form-group col-sm-6 col-md-6">
              <label for="login_password">Password</label>
              <input id="login_password" name="login_password"
              class="form-control" type="password" placeholder="Password"
              value="admin123" required/>
            </div>
          </div>

          <input type="submit" value="Log In" class="btn btn-primary"/>
        </form>
      </div>
    </div>

      <hr>


      <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
          <form action="/users/register" method="post" id="registrationForm">
            <span class="warning_message"><?php echo $this->session->flashdata('registration_error')?></span>

            <p><?php echo $this->session->flashdata('registration_status')?></p>

            <div class="form-row">

              <div class="form-group col-sm-6 col-md-6">
                <label for="email">Email</label>
                <input id="email" name="email"
                class="form-control" type="email" placeholder="email"
                value="test@email.com"/>
              </div>
              <div class="form-group col-sm-6 col-md-6">
                <label for="password">Password</label>
                <input id="password" name="password"
                class="form-control" type="text" placeholder="Password"
                value="admin123"/>
              </div>
            <input type="submit" value="Sign Up" class="btn btn-success"/>
          </div>

          </div>

        </div>
    </div>
  </body>


</html>
