<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JavaScript, Blog, Code, Php">
    <meta name="description" content="This is a coder bloging website">
    <link rel="shortcut icon" href="/img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <title>Code Blog</title>
</head>

<body>
    <!---Header area start--->
    <header class="header-area">
        <div class="main-content flex align-items-center justify-content-space-between">
            <div class="logo-area">
                <a href="index.php"><img src="./img/logo.png" alt="Logo" width="120px"></a>
            </div>
            <div>
                <a href="login.php" class="primary_btn">Login</a>
            </div>
        </div>
    </header>
<!---Header area end--->
<?php
	if(isset($_GET['result'])){
		if($_GET['result'] == 'blank'){
			echo '<h3 style="color:red;background:gray;margin:0;padding:10px;text-align:center;">Fill all input</h3>';
		}elseif($_GET['result'] == 'not-match'){
			echo '<h3 style="color:red;background:gray;margin:0;padding:10px;text-align:center;">Check email</h3>';
		}if($_GET['result'] == 'exist'){
			echo '<h3 style="color:red;background:gray;margin:0;padding:10px;text-align:center;">Already have an account</h3>';
		}if($_GET['result'] == 'successful'){
			echo '<h3 style="color:red;background:gray;margin:0;padding:10px;text-align:center;">Welcome to Codebook</h3>';
		}
	}
?>