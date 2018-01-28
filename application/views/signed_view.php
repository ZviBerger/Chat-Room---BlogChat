
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>massages</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>

        <div class="container">
            <?php /* uncomment to debug and print the session data here: */ 
            /*print_r($_SESSION)*/ ?>
            <h1>Hi <?php echo $name ?></h1>
          
            <h2>You signed up successfully!</h2>
           
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="<?php echo site_url() ?>/login " ><button type="button" class="btn btn-default">Login now</button>
                       </a>
                    </div>
                </div>
             </div>

    </body>
</html>


