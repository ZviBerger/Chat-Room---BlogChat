<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BlogChat  welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/clean-blog.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

   
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url(); ?>js/clean-blog.min.js"></script>
    
    
   
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="#email">BlogChat</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url() ?>/login">Log in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url() ?>signup">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url() ?>chat">Chat room</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url(); ?>img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>BlogChat</h1>
              <span class="subheading">A Room For Every One</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
           
              <h2 class="post-title">
                Please Login:
              </h2>

          <hr>
         <form class="form-horizontal" action="<?php echo site_url() ?>/login/checklogin" method="post">
                <?php 
                if ($error != "") { ?>
                <div class="form-group alert alert-danger">
                    <label class="col-sm-6">
                        <?php echo $error;?>
                    </label>
                </div>
                <?php
                }
                ?>
                
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email"
                               placeholder="Enter email" name="email" required pattern=".*\S+.*" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" 
                               placeholder="Enter password" name="pwd" required pattern=".*\S+.*">
                    </div>
                </div>
                
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-warning">login</button>
                    </div>
                </div>
            </form>
          <!-- Pager -->
          <br>
          <br>
          <br>
          <hr>

                        <h4>Not registered?</h4>
                        <a href="<?php echo site_url() ?>/signup"> <button  class="btn btn-warning" >Register</button> </a>
                        
                        
          </div>
        </div>
      </div>
	  
	  
	  

       
    </div>


    <!-- Footer -->
    <footer>
         <hr>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/in/zvi-berger-2b7817110/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/ZviBerger">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
                <li class="list-inline-item">
                <a href="mailto:zvikaberger3@gmail.com">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
               <li class="list-inline-item">
                <a href="callto:0544260858">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; BlogChat 2018 By: Zvi Berger </p>
          </div>
        </div>
      </div>
	  
    </footer>

  </body>

</html>
