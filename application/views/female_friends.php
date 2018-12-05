<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/assets/female_friends.css">
    <title>Friends!</title>
  </head>
  <body>
    <!-- Header start from here -->
  <header>
          <nav class="navbar navbar-expand-md fixed-top sticky is-sticky"  data-toggle="sticky-onscroll">
             <div class="container">
              <a href="#" class="toggle-nav collapsed primary" data-toggle="collapse" data-target="#navbarsExampleDefault">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="navbar-brand" href="https://femaleventures.nl/">

                            <img id="logo" src="https://femaleventures.nl/wp-content/uploads/2018/06/Logo_White-e1530265633749.png" alt="Female Ventures" />
              </a>
          <div class="collapse navbar-collapse" id="navbarsExampleDefault" >
            <ul class="navbar-nav mr-auto"></ul>
            <ul id="menu-hoofd-menu" class="navbar-nav "><li  id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item nav-item-13"><a href="https://femaleventures.nl/mission/" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">What we do</a>
          <ul class="dropdown-menu depth_0">
            <li  id="menu-item-974" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-974"><a class="dropdown-item" href="https://femaleventures.nl/mission/" class="nav-link"> About FV</a></li>
            <li  id="menu-item-1127" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1127"><a class="dropdown-item" href="https://femaleventures.nl/female-match-2/" class="nav-link"> Female Match</a></li>
          </ul>
          </li>
          <li  id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-29"><a href="https://femaleventures.nl/events/" class="nav-link">Events</a></li>
          <li  id="menu-item-1559" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item nav-item-1559"><a href="https://femaleventures.nl/newsitems/" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
          <ul class="dropdown-menu depth_0">
            <li  id="menu-item-1518" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1518"><a class="dropdown-item" href="https://femaleventures.nl/newsitems/" class="nav-link"> News Items</a></li>
            <li  id="menu-item-1506" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1506"><a class="dropdown-item" href="https://femaleventures.nl/newsletters/" class="nav-link"> Newsletters</a></li>
            <li  id="menu-item-1492" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1492"><a class="dropdown-item" href="https://femaleventures.nl/blog/" class="nav-link"> Blog</a></li>
            <li  id="menu-item-1522" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1522"><a class="dropdown-item" href="https://femaleventures.nl/vacancies/" class="nav-link"> Vacancies Team FV</a></li>
          </ul>
          </li>
          <li  id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-28"><a href="https://femaleventures.nl/partners/" class="nav-link">Partners</a></li>
          <li  id="menu-item-27" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-27"><a href="https://femaleventures.nl/contact/" class="nav-link">Contact</a></li>
          <li  id="menu-item-495" class="menu-item menu-item-type-post_type menu-item-object-product nav-item nav-item-495"><a href="https://femaleventures.nl/product/donations/" class="nav-link">Donate</a></li>
          <li  id="menu-item-495" class="menu-item menu-item-type-post_type menu-item-object-product nav-item nav-item-495"><a href=<?="/users/profile/".$this->session->user['id']?> class="nav-link">My Profile</a></li>
          <li  id="menu-item-83" class="nav-btn menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-83"><a href="/users/log_out" class="nav-link">LOGOUT !</a></li>
          </ul>
        </div>
          </div>
          </nav>
          <nav id="body-nav" >
       <ul id="menu-hoofd-menu-1"><li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item nav-item-13"><a href="https://femaleventures.nl/mission/" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">What we do</a>
      <ul class="dropdown-menu depth_0">
        <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-974"><a class="dropdown-item" href="https://femaleventures.nl/mission/" class="nav-link"> About FV</a></li>
        <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1127"><a class="dropdown-item" href="https://femaleventures.nl/female-match-2/" class="nav-link"> Female Match</a></li>
      </ul>
      </li>
      <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-29"><a href="https://femaleventures.nl/events/" class="nav-link">Events</a></li>
      <li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item nav-item-1559"><a href="https://femaleventures.nl/newsitems/" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
      <ul class="dropdown-menu depth_0">
        <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1518"><a class="dropdown-item" href="https://femaleventures.nl/newsitems/" class="nav-link"> News Items</a></li>
        <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1506"><a class="dropdown-item" href="https://femaleventures.nl/newsletters/" class="nav-link"> Newsletters</a></li>
        <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1492"><a class="dropdown-item" href="https://femaleventures.nl/blog/" class="nav-link"> Blog</a></li>
        <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-1522"><a class="dropdown-item" href="https://femaleventures.nl/vacancies/" class="nav-link"> Vacancies Team FV</a></li>
      </ul>
      </li>
      <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-28"><a href="https://femaleventures.nl/partners/" class="nav-link">Partners</a></li>
      <li  class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-27"><a href="https://femaleventures.nl/contact/" class="nav-link">Contact</a></li>
      <li  class="menu-item menu-item-type-post_type menu-item-object-product nav-item nav-item-495"><a href="https://femaleventures.nl/product/donations/" class="nav-link">Donate</a></li>
      <li  class="nav-btn menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-83"><a href="" class="nav-link">Friends</a></li>
      <li  class="nav-btn menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-83"><a href="" class="nav-link">My Profile</a></li>
      <li  class="nav-btn menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-84"><a href="" class="nav-link">Logout!</a></li>
      </ul></nav>
  </header>
  <!-- Header finish here *****************************************-->
    <div class='container'>
      <div class='row'>
        <div class='col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2 text-center'>
          <p id="top-title">FEMALE FRIENDS</p>
          <input type='text' class="form-control" id='searchbar' placeholder='search for friends'/>
          <!-- <button id="test">Click me!</button> -->

        </div>
      </div>


      <div class='row' id='results'>
        <!-- <div class='col-sm-12 col-md-12 col-lg-12' id="results">
        </div> -->
      </div>
    </div>
    <br>
    <hr>
    <!-- footer start from here **********************************-->
    <footer class="content-info">
      <div class="container">
          <div class="row">
            <div class="col-md-3 widget text-4 widget_text">
              <h4>Contact<p></p></h4>
                <div class="textwidget">
                  <p><a href="mailto:team@femaleventures.nl" target="_blank" rel="noopener">team@femaleventures.nl</a></p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
           </div>
           <div class="col-md-3 widget text-3 widget_text">
             <h4>Follow us<p></p></h4>
             <div class="textwidget">
                <p>
                 <span class="fab fa-linkedin"></span>
                   <a href="https://www.linkedin.com/organization/14974484/" target="_blank" rel="noopener">Link us on Linkedin</a><br />
                 <span class="fab fa-facebook-f"></span>
                     <a href="https://www.facebook.com/femaleventures/" target="_blank" rel="noopener">Like us on Facebook</a><br />
                 <span class="fab fa-twitter"></span>
                   <a href="https://twitter.com/FemVentures" target="_blank" rel="noopener">Follow us on Twitter</a>
                </p>
              </div>
           </div>
           <div class="col-md-3 widget mailpoet_form-2 widget_mailpoet_form">
              <h4>Subscribe to Our Newsletter</h4>
              <div id="mailpoet_form_2" class="mailpoet_form mailpoet_form_widget">
                <label class="mailpoet_text_label">Email<span class="mailpoet_required"> * </span></label><br>
                <input type="email" class="mailpoet_text" name="data[form_field]" title="Email" value="" data-automation-id="form_email"/></p>
                  <p class="mailpoet_paragraph">
                <input type="submit" class="mailpoet_submit" value="Subscribe!" /></p>
              </div>
           </div>
           <div class="col-md-3 widget nav_menu-2 widget_nav_menu">
             <h4>Information<p></p></h4>
             <div class="menu-footer-menu-container">
               <ul id="menu-footer-menu" class="menu">
                 <li id="menu-item-81" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a href="https://femaleventures.nl/terms-and-conditions/">Terms and Conditions</a></li>
                 <li id="menu-item-1339" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1339"><a href="https://femaleventures.nl/privacy-main/">Privacy</a></li>
                 <li id="menu-item-242" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-242"><a href="">Logout</a></li>
               </ul>
             </div>
           </div>
        </div>
      </div>
    </footer>
    <!-- End of footer -->
  </body>
</html>

<script type="text/javascript">

$(document).ready(function() {

  load_data();

  function load_data(query) {

    $.ajax({
      url:'<?= base_url()?>users/fetch_friends',
      method:'POST',
      data:{query:query},
      success:function(data) {
        $('#results').html(data);
      }
    })
  }

  $('#searchbar').keyup(function() {
    var query = $(this).val();
    if (query != '') {
      load_data(query);
    } else {
      load_data();
    }
  })



  $('#test2').click(function() {
    alert("please work");
    console.log("aaaa");
  })

  // function add_friend() {
  //   $.ajax({
  //     url:'<?= base_url()?>users/add_friend',
  //     method:'POST',
  //     data: { to_id:  }
  //   })
  // }
  //
  // $('#')

})

</script>
