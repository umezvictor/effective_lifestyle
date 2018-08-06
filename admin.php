    <?php 
    session_start();
	//notify the user tht he has logged out
    $notify = ""; 
    $logout_alert = "";
   
    if(isset($_GET['logged_out'])){
        $notify = $_GET['logged_out'];
       
        $logout_alert = "<div class=\"alert alert-danger\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        You are currently logged out
        </div>";
        
    }


    ?>
    <!DOCTYPE html>
    <html>
    <head>
    
    <title>Admin Login page</title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="author" content="Umezuruike Victor">
 <script src="https://use.fontawesome.com/80ed8cb158.js"></script>
        <!-- stylesheets -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <?php  
                         
                            ?>
							<div>
							<h2 class="section-title" style="color: #CC0033; text-align:center; font-size:25px">WELCOME TO ADMIN PANEL</h2>
							</div>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form method="post" action="process_admin_login.php" id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email"  placeholder="email" required>                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                    <button type="submit" name="login" class="btn btn-success btn-md">Login</button>
                                      

                                    </div>
                                </div>


                                
                                <div>
                                </div>   
                            </form> 
                            
                            <?php 
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                            }
                                
                        echo $logout_alert;

                       
                              
                            ?>
                               



                        </div>                     
                    </div>  
        </div>
  
    </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>

    </body>
    </html>
    