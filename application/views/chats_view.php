<!DOCTYPE html>
<html> 
    <head> 
        <title>Chat list</title> 
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <link href="<?php echo base_url(); ?>css/clean-blog.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url(); ?>js/clean-blog.min.js"></script>
 <!--===================CSS=================================-->

<style>
 /* I am using bootstap, this css is for modifications only
    and for the look of the messages. */
 .msg-box{
    background: #ffc107;
    border-radius: 17px;
    clear: both;
    color: #212121;
    display: block;
    float: left;
    font-size: 20px;
    padding: 8px 16px;
    position: relative;
    margin: 10px;
}

.box{
   background: #ffc107;
    border-radius: 17px;
    color: #000;
    float: left;
    max-width: 440px;
    padding: 8px 16px;
    position: relative;
    margin: 10px;
    box-shadow: 1px 3px 2px 0 rgba(0, 0, 0, 0.4);

}

.userbox{
    background: #dcdcde;
    border-radius: 17px;
    color: #212121;
    float: right;
    max-width: 450px;
    padding: 8px 16px;
    position: relative;
    margin: 10px;
     box-shadow: 1px 3px 2px 0 rgba(0, 0, 0, 0.4);
  
}


.text{
    max-width: 500px;
}
.dont-break-out {
  overflow-wrap: break-word;
  word-wrap: break-word;
  -ms-word-break: break-all;
  word-break: break-all;
  word-break: break-word;
  -ms-hyphens: auto;
  -moz-hyphens: auto;
  -webkit-hyphens: auto;
  hyphens: auto;
}
.table-wrapper-2 {
    display: block;
    max-height: 600px;
    max-width: 1000px;
    overflow-y: auto;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}
.my-wrapper {
    
    max-height: 600px;
    max-width: 1000px;
    overflow-y: auto;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}
.date{
    font-size: 15px;
}
   
</style>
    
 <?php 
 //=====================PHP===============================
//define handler for exeptions in order to avoid errors in clinet's side
 
set_error_handler('exceptions_error_handler');

function exceptions_error_handler($severity, $message, $filename, $lineno) {
  if (error_reporting() == 0) {
    return;
  }
  if (error_reporting() & $severity) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
  }
}?>
<!--=====================JS===============================-->
<!--  avoiding sending empty message  -->    
<script>
    $(document).ready(function(){
           
          $('#message').on('input', function() {
              if ($.trim($(this).val()) ==="") {
                  $("#send-button").prop('disabled',true);
              }
              else{ 
                  $("#send-button").prop('disabled',false);
              } 
             });
       });
</script>
<!--====================HTML===============================-->

    </head> 
    <body> 
      <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
          <p class="navbar-brand">Hi <?php 
      echo  $name["name"];
           ?></p>
        <a class="navbar-brand" href="<?php echo site_url() ?>/login/logout">logout</a>
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
      
      <header class="masthead" style="background-image: url('img/about-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>BlogChat</h1>
              <span class="subheading">send messages to every one</span>
            </div>
          </div>
        </div>
      </div>
    </header>
      
      
      
  <div class="container">
      <div class="row">
       <div class="col-lg-8 col-md-10 mx-auto">
           <h2>Messages..</h2>
          <div class="card ">
              <div class="card-body">

                <div class="list-group my-wrapper ">
  
                   <?php
                   //for any message in db:
                       foreach ($chats as $key => $value) {
                                ?>
                 <div class='border-0 list-group-item list-group-item-action 
                             flex-column align-items-start'>
                               <?php  
                               //add link to delete message only for me (this)
                                  if( $value["user_id"]==$userid)
                                  {
                                     echo   "<div class='mb-1 box dont-break-out'>";
                                     echo  "<h5 class='mb-1' >";
                                      echo "<a style='float:right;' class='nounderline' href='", base_url(),
                                              "chat/delete_message/", $value['id'] ,"'> "
                                              . " <i class='fa fa-trash-o '></i></a>";
                                  }else
                                  {
                                       echo   "<div class='mb-1 userbox dont-break-out'>";
                                        echo  "<h5 class='mb-1' >";
                                  }
                            //adding the user name 
                            try {
                                    echo '@',$names[$value["user_id"]];
                                    } 
                             catch (Exception $ex) {
                                    echo "unknown user";
                                    }
                             ?></h5>
                               
                             <?php    echo $value["message"]," "; ?>
                               <br>
                       <small class='text-muted'><?php   echo  $value["date"]; ?></small>

                                 </div></div>  
                               <?php   }    ?>                
              </div> 
                  <br>
                  
                    <form class="form-horizontal" action="<?php echo site_url() ?>/Chat/new_message" method="post">
               
                        <div class="input-group">
                          <span class="input-group-btn">
                              <button id="send-button" class="btn btn-default" type="submit" disabled>
                                  <i class="fa fa-send "></i>
                             </button>
                          </span>
                          <input type="text" class="form-control" id="message" placeholder="write something.." name="message">
                        </div>
            </form>
                 
                 
                  
            </div>
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
            <p class="copyright text-muted">Copyright &copy; BlogChat 2018 By: Zvi Berger</p>
          </div>
        </div>
      </div>
	  
    </footer>

                
 
    </body> 
</html>
