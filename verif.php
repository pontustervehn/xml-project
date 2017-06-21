<?php 
if(isset($_POST['submit'])){ 

    $usr =$_POST['username']; 
    $pas =$_POST['password']; 
    if($usr == "admin"){ 
		if($pas == "password"){ 
			header("Location: laggtill.php"); // Modify to go to the page you would like 
			exit; 
		}
		else{        
			header("Location: logga_in.php"); 
			exit;
		}
    }else{ 
        header("Location: logga_in.php"); 
        exit; 
    } 
}else{    //If the form button wasn't submitted go to the index page, or login page 
    header("Location: logga_in.php");     
    exit; 
} 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>
</title>
</head>
<body>
</body>
</html>


// <?php 
// if(isset($_POST['submit'])){ 

    // $usr = mysql_real_escape_string($_POST['username']); 
    // $pas = hash('sha256', mysql_real_escape_string($_POST['password'])); 
    // $sql = mysql_query("SELECT * FROM users_table  
        // WHERE username='$usr' AND 
        // password='$pas' 
        // LIMIT 1"); 
    // if(mysql_num_rows($sql) == 1){ 
        // $row = mysql_fetch_array($sql); 
        // session_start(); 
        // $_SESSION['username'] = $row['username']; 
        // $_SESSION['fname'] = $row['first_name']; 
        // $_SESSION['lname'] = $row['last_name']; 
        // $_SESSION['logged'] = TRUE; 
        // header("Location: users_page.php"); // Modify to go to the page you would like 
        // exit; 
    // }else{ 
        // header("Location: login_page.php"); 
        // exit; 
    // } 
// }else{    //If the form button wasn't submitted go to the index page, or login page 
    // header("Location: index.php");     
    // exit; 
// } 
// ?>