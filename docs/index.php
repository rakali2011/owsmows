<?php
$user = ""; //prevent the "no index" error from $_POST
$pass = "";
if (isset($_POST['user'])) { // check for them and set them so
    $user = $_POST['user'];
}
if (isset($_POST['pass'])) { // so that they don't return errors
    $pass = $_POST['pass'];
}    

$useroptions = ['cost' => 8,]; // all up to you
$pwoptions   = ['cost' => 8,]; // all up to you
$userhash    = password_hash($user, PASSWORD_BCRYPT, $useroptions); // hash entered user
$passhash    = password_hash($pass, PASSWORD_BCRYPT, $pwoptions);  // hash entered pw
$hasheduser  = file_get_contents("stuff/user.txt"); // this is our stored user
$hashedpass  = file_get_contents("stuff/pass.txt"); // and our stored password


if ((password_verify($user, $hasheduser)) && (password_verify($pass,$hashedpass))) {

    // the password verify is how we actually login here
    // the $userhash and $passhash are the hashed user-entered credentials
    // password verify now compares our stored user and pw with entered user and pw
?>
<!DOCTYPE html>
<html>
<head>
  <title>Swagger UI</title>
  <link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'/>
  <link href='css/reset.css' media='screen' rel='stylesheet' type='text/css'/>
  <link href='css/screen.css' media='screen' rel='stylesheet' type='text/css'/>
  <link href='css/reset.css' media='print' rel='stylesheet' type='text/css'/>
  <link href='css/screen.css' media='print' rel='stylesheet' type='text/css'/>
  <script type="text/javascript" src="lib/shred.bundle.js"></script>
  <script src='lib/jquery-1.8.0.min.js' type='text/javascript'></script>
  <script src='lib/jquery.slideto.min.js' type='text/javascript'></script>
  <script src='lib/jquery.wiggle.min.js' type='text/javascript'></script>
  <script src='lib/jquery.ba-bbq.min.js' type='text/javascript'></script>
  <script src='lib/handlebars-1.0.0.js' type='text/javascript'></script>
  <script src='lib/underscore-min.js' type='text/javascript'></script>
  <script src='lib/backbone-min.js' type='text/javascript'></script>
  <script src='lib/swagger.js' type='text/javascript'></script>
  <script src='lib/swagger-client.js' type='text/javascript'></script>
  <script src='swagger-ui.js' type='text/javascript'></script>
  <script src='lib/highlight.7.3.pack.js' type='text/javascript'></script>

  <!-- enabling this will enable oauth2 implicit scope support -->
  <script src='lib/swagger-oauth.js' type='text/javascript'></script>
  <script type="text/javascript">
    $(function () {
      var url = window.location.search.match(/url=([^&]+)/);
      if (url && url.length > 1) {
        url = url[1];
      } else {
        url = "http://localhost/apparel/docs/json";
      }
//      http://localhost/apparel/docs/json
//      http://s5technology.com/demo/apparel/docs/json
      window.swaggerUi = new SwaggerUi({
        url: url,
        dom_id: "swagger-ui-container",
        supportedSubmitMethods: ['get', 'post', 'put', 'delete'],
        onComplete: function(swaggerApi, swaggerUi){
          log("Loaded SwaggerUI");
          if(typeof initOAuth == "function") {
            /*
            initOAuth({
              clientId: "your-client-id",
              realm: "your-realms",
              appName: "your-app-name"
            });
            */
          }
          $('pre code').each(function(i, e) {
            hljs.highlightBlock(e)
          });
        },
        onFailure: function(data) {
          log("Unable to Load SwaggerUI");
        },
        docExpansion: "none",
        sorter : "alpha"
      });

      function addApiKeyAuthorization() {
        var key = $('#input_apiKey')[0].value;
        log("key: " + key);
        if(key && key.trim() != "") {
            log("added key " + key);
            window.authorizations.add("api_key", new ApiKeyAuthorization("api_key", key, "query"));
        }
      }

      $('#input_apiKey').change(function() {
        addApiKeyAuthorization();
      });

      // if you have an apiKey you would like to pre-populate on the page for demonstration purposes...
      /*
        var apiKey = "myApiKeyXXXX123456789";
        $('#input_apiKey').val(apiKey);
        addApiKeyAuthorization();
      */

      window.swaggerUi.load();
  });
  </script>
</head>

<body class="swagger-section">
<div id='header'>
  <div class="swagger-ui-wrap">
    <a id="logo" href="#">Apparel API Documentation <br/> (Base URL: http://s5technology.com/demo/apparel/api/)</a>
<!--    <form id='api_selector'>
      <div class='input icon-btn'>
        <img id="show-pet-store-icon" src="images/pet_store_api.png" title="Show Swagger Petstore Example Apis">
      </div>
      <div class='input icon-btn'>
        <img id="show-wordnik-dev-icon" src="images/wordnik_api.png" title="Show Wordnik Developer Apis">
      </div>
      <div class='input'><input placeholder="http://example.com/api" id="input_baseUrl" name="baseUrl" type="text"/></div>
      <div class='input'><input placeholder="api_key" id="input_apiKey" name="apiKey" type="text"/></div>
      <div class='input'><a id="explore" href="#">Explore</a></div>
    </form>-->
  </div>
</div>

<div id="message-bar" class="swagger-ui-wrap">&nbsp;</div>
<div id="swagger-ui-container" class="swagger-ui-wrap"></div>
</body>
</html>

<?php
} else { 
    // if it was invalid it'll just display the form, if there was never a $_POST
    // then it'll also display the form. that's why I set $user to "" instead of a $_POST
    // this is the right place for comments, not inside html
    ?>  <body>
    <form method="POST" action="index.php" style="margin: 0 auto; width: 300px; padding: 0;">
        <strong style="margin: 0 auto; width: 300px; ">Login</strong>
        <br/>
    User <input type="text" name="user" style="margin: 10px; padding: 5px;"></input><br/>
    Pass <input type="password" name="pass" style="margin: 10px; padding: 5px;"></input><br/>
    <input type="submit" name="submit" value="Login" style="margin: 10px; float: right; padding: 10px;"></input>
    </form>
    </body>
    <?php 
}
?>
