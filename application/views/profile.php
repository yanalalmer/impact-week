<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style media="screen">

      body,html {
			padding: 0;
			margin: 0;
			}
		 html {
			  background: #e1e1e1;
			  font-family: "Helvetica Neue" , Helvetica, Arial, Sans-serif;
			  padding-top: 50px;
        height: 1000px;
			}
      .head{
          border:1px solid silver;
      }
      #main-header {
        background:#ffffff;
        padding: 2px;
        box-shadow: 0 4px 2px -2px rgba(0,0,0,.05);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
          }
      #main-header img{
        font-size: 20px;
        margin: 2;
        margin-right: 20px;
        float: left;
        padding: 5px;
        }
      #main-header nav u1 {
        List-style: none;
        padding: 0;
        margin: 0;
          }
      #main-header nav u1 li {
        float: left;
        margin-left: 20px;
        }
      #main-header nav u1 li a{
        paddingL:10px;
        display: block;
        text-decoration: none;
        border: 1px solid transparent;
        }
      #main-header nav u1 li a:hover{
        background: #f7f7f7;
        border: 1px solid #e1e1e1;
        borde-radius: 5px;
        }
      .clearfix:after {
        visibility: hidden;
        display: block;
        font-size:0;
        content:"";
        clear:both;
        height:0;
        }
        .um-faicon-camera:before{
          font-family: "FontAwesome" !important;
          font-style: normal !important;
          font-weight: normal !important;
          font-variant: normal !important;
          text-transform: none !important;
          speak: none;
          line-height: 1;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
          }
    </style>
    <?php
    if( ! $this->session->user) {
      redirect('/users');
      die();
    }
    ?>
  </head>
  <body>
    <header id="main-header" class="Clearfix">
      <div class="head">
      <img src="Logo-DarkAqua.jpg" alt="">
      <nav>
        <u1>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="about.html">About Us</a></li>
        </u1>
      </nav>
      </div>
    </header>
  <main>
    <a href="/users/edit_profile">Edit your profile</a>
    <br>
    <?=$this->session->user['first_name']?>
    <br>
    <div>
    <label>Photo</label>
    <ins>
      <i class="um-faicon-camera">

      </i>
    </ins>
    <input type="file" name="photo"/>
    </div>
  <div class="container">


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
  </div>
  </main>
  <footer>

  </footer>
  </body>
</html>
