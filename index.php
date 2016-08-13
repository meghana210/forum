<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  

</script>
<title>Keep it Simple</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="container">
          <?php
                include "header/header.php";
                include"menu/menu.php";

          ?>
<div id="content"

        
           
    <h1>Welcome</h1>
   
  <div id="main">
    <form action="logincheck.php" method="POST">
<p><label>User Name : </label>
<input id="username" type="text" name="username" placeholder="username" /></p>
<p><label>Password  : </label>
<input id="password" type="password" name="password" placeholder="password" /></p>
<input id="register" type="submit" name="submit" value="Login" />
</form>    
     </div>

  <?php 
          include"footer/footer.php";
          ?>
</div>

  </body>
  

</html>
