<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Female Ventures</title>
    	<link rel="shortcut icon" href="/assets/favicon.png">
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/registration.css"/>
  </head>
  <body>
    <?php $this->load->view('header/header-3.php') ?>

      <div class="page-header">
        <p class='top-t'>Join our community and become a Female Friend</p>

      <div id="et-boc" class="et-boc">
  			<div id="et_builder_outer_content" class="et_builder_outer_content">
    			<div class="et_builder_inner_content et_pb_gutters3">
            <div class="et_pb_section et_pb_section_1 et_section_regular et_section_transparent">
        				<div class="et_pb_row et_pb_row_0">
            				<div class="et_pb_column et_pb_column_1_2 et_pb_column_0    et_pb_css_mix_blend_mode_passthrough">
              				<div class="et_pb_module et_pb_text et_pb_text_0 et_pb_bg_layout_light  et_pb_text_align_left">
                				<div class="et_pb_text_inner">
                					<h2 class='top-title'>Become a member of the Female Ventures online community platform. </h2>
                            <p class='top-title'>Membership is <span style="color:green;">free</span> until <span style="color:red;">1st January 2019</span>.<br> Shortly before that date we will send you an invitation to renew your Female Friendship registration against a small fee.<br> Enjoy the community and connect to other Female Friends.</p>
                				</div>
              			</div> <!-- .et_pb_text -->
            			</div> <!-- .et_pb_column -->
                  <div class="et_pb_column et_pb_column_1_2 et_pb_column_1    et_pb_css_mix_blend_mode_passthrough">
            				<div class="et_pb_module et_pb_text et_pb_text_1 et_pb_bg_layout_light  et_pb_text_align_left">
                				<div class="et_pb_text_inner top-title">
                					<p class='top-t-middle'>Registered Friends have access to :</p>
                            <ul class="maza">
                              <li>Personal profile page</li>
                              <li>Find other Friends</li>
                              <li>Mentor/Mentee program</li>
                              <li>Female Match recruitment program</li>
                            </ul>
                				</div>
            		  	</div> <!-- .et_pb_text -->
            			</div> <!-- .et_pb_column -->
        			  </div> <!-- .et_pb_row -->
    			  </div> <!-- .et_pb_section -->
        	</div>
  			</div>
  		</div>
      </div>
            <hr>
      <div class="container">
        <div class="row">
          <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 register">
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
                <input type="submit" value="Sign Up" class="btn"/>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 login ">
            <form action="/users/login" method="post">
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
            <input type="submit" value="Log In" class="btn"/>
          </form>
        </div>
      </div>
      </div>
    <hr>
  <?php $this->load->view('footer/footer.php'); ?>
  </body>

</html>
