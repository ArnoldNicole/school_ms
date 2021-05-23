<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>!</title>
  <!-- Favicons -->
  <link href="icons/hand.right.png" rel="icon">
  <link href="icons/hand.right.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">  
 </head>
<body>
  <!-- **********************************************************************
      MAIN CONTENT
     ************* -->
  <div id="login-page">
  @yield('content')
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
  <script>
function look() {
  var x = document.getElementById("key");
  if (x.type === "password") {
    x.type = "text";
    setTimeout(function() {
      x.type = 'password';
    }, 500);
  } else {
    x.type = "password";
  }
}
</script>
</body>

</html>
