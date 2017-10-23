<?php 
require_once(__DIR__ . '/classes/access_user/access_user_class.php');

$LOGIN_ACTIVATE = filter_input(INPUT_GET, 'activate', FILTER_SANITIZE_SPECIAL_CHARS);
$LOGIN_IDENT = filter_input(INPUT_GET, 'ident', FILTER_SANITIZE_SPECIAL_CHARS);
$LOGIN_VALIDATE = filter_input(INPUT_GET, 'validate', FILTER_SANITIZE_SPECIAL_CHARS);

$LOGIN_ID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$LOGIN_REMEMBER = filter_input(INPUT_POST, 'remember', FILTER_SANITIZE_SPECIAL_CHARS);
$LOGIN_LOGIN = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
$LOGIN_SUBMIT = filter_input(INPUT_POST, 'Submit', FILTER_SANITIZE_SPECIAL_CHARS);
$LOGIN_PASSWORD = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

$my_access = new Access_user(false);
if (isset($LOGIN_ACTIVATE) && isset($LOGIN_IDENT)) { 
	$my_access->auto_activation = true; 
	$my_access->activate_account($LOGIN_ACTIVATE, $LOGIN_IDENT); 
}
if (isset($LOGIN_VALIDATE) && isset($LOGIN_ID)) { 
	$my_access->validate_email($LOGIN_VALIDATE, $LOGIN_ID);
}
if (isset($LOGIN_SUBMIT)) {
	$my_access->save_login = (isset($LOGIN_REMEMBER)) ? $LOGIN_REMEMBER : "no"; 
	$my_access->count_visit = false; 
	$my_access->login_user($LOGIN_LOGIN, $LOGIN_PASSWORD); 
} 
$error = $my_access->the_msg; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ADL CRM | Login</title>
        <link rel="stylesheet" href="/styles/loginpage.css" type="text/css" />
        <link rel="stylesheet" href="/bootstrap-3.3.5-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        
    <?php require_once(__DIR__ . '/php/analyticstracking.php'); ?>        
        <div class="container">          
            
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">ADL | Compliance Portal</div>
                    </div>  
                    
                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">
                            
                        </div>
                        <form id="loginform" class="form-horizontal" role="form" name="form1" method="post" action="<?php echo filter_input(INPUT_SERVER,'PHP_SELF', FILTER_SANITIZE_SPECIAL_CHARS); ?>">
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="login" value="<?php echo (isset($LOGIN_LOGIN)) ? $LOGIN_LOGIN : $my_access->user; ?>" placeholder="username">                                        
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <label for="login-password"></label>
                                <input id="login-password" type="password" class="form-control"  name="password" value="<?php if (isset($LOGIN_PASSWORD)) echo $LOGIN_PASSWORD; ?>" placeholder="password">
                            </div>
                            
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <center>
                                        <input type="submit" value="Login" id="submit" name="Submit" class="btn btn-success" />
                                    </center>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="footer navbar-fixed-bottom"><center><i class="fa fa-support"></i> <a href="mailto:michael@adl-crm.uk?Subject=ADL"> <strong>ADL Email Support</strong> </a></center></div>            
            
        </div>
        
<!-- Begin Cookie Consent plugin by Silktide - //silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":null,"theme":"dark-bottom"};
</script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->
    </body>
</html>                                		