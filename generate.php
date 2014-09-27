<?php 

//Get the Canvas ID
$id = htmlspecialchars($_GET["id"]);
//Get the course name
$coursename = urldecode($_GET["coursename"]);


//$url = "https://blueline.instructure.com/api/v1/courses/" . $id . "/external_tools";

//Setup the REST POST
require_once '../includes/api.php';
require_once '../lib/PestJSON.php';


$pest = new Pest('https://blueline.test.instructure.com');
$resp = $pest->post('/api/v1/courses/' . $id . '/external_tools?access_token=' .$token . '', 
    array(
        'name' => "BLTools - Template Wizard",
        'consumer_key' => "abc",
        'shared_secret' => "123",
        'config_type' => "by_url",
        'config_url' => "https://bltools.creighton.edu/master/templatewizard/config.xml"
    )
);


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title> BlueLine Tools</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
    
    body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  
}
    </style>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BlueLine Tools</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="#about"></a></li>
            <li><a href="#contact"></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
   <div class="alert alert-success">
   <h3>Success!</h3>
   <p>The <strong>Template Wizard</strong> has been added to <strong><?php echo $coursename; ?></strong>!</p>
    </div>
   

   <?php echo $resp; ?>
          
       </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  </body>
</html>
