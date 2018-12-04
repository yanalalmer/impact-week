<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Friends!</title>
  </head>
  <body>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2 text-center'>
          <input type='text' id='searchbar' placeholder='search for friends' autocomplete="off"/>

        </div>

      </div>

      <div class='row' id='results'>
        <!-- <div class='col-sm-12 col-md-12 col-lg-12' id="results">

        </div> -->
      </div>
    </div>
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

})

</script>
