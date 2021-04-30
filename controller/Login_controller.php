<?php
    require_once 'models/db_config.php' ;	
	$username="";
	$err_username="";
	$password="";
	$err_password="";
	$email="";
	$err_email="";
	$type = "";
	$err_type="";
	$hasError=false;
	function validateEmail($email)
	{
		$pos_at = strpos($email,"@");
		$pos_dot = strpos($email,".",$pos_at+1);
		if($pos_at < $pos_dot)
			{
			return true;
			}
		return false;
	}
		
	
	
		if (isset($_POST["sign_up"])){
			if (empty($_POST["username"])){
				$err_username="Username Required";
				$hasError=true;
			}
			elseif (strlen($_POST["username"])<6){
				$err_username="Username must contain at least 6 characters ";
				$hasError=true;
			}
			elseif (strpos($_POST["username"]," ")) {
				$err_username="space is not allowed";
				$hasError=true;
			}
			else{
				$username=htmlspecialchars($_POST["username"]);
				
			}

			if(empty($_POST["password"]))
			{
				$hasError = true ;
				$err_password = "Password required!" ;
			}
			else 
			{
				$password = $_POST["password"] ;
			}
			
		
			if (empty($_POST["email"])){
				$err_email="Email Required";
				$hasError=true;
			 }
			elseif(!validateEmail($_POST["email"]))
			{
				$err_email="Not a valid email";
				$hasError=true;
			}
			else
			{
				$email=htmlspecialchars($_POST["email"]);
			}
			if(!isset($_POST["type"]))
		    {
				$err_type="User type required";
				$hasError=true;
		    }
		    else
		    {
		         $type=htmlspecialchars($_POST["type"]);
		    }	
		   if(!$hasError)
		   {
			  insertUser($username,$email,$password,$type);
		   }
		}


		if(isset($_POST["login"]))
		{
			if (empty($_POST["email"])){
				$err_email="Email Required";
				$hasError=true;
			 }
			elseif(!validateEmail($_POST["email"]))
			{
				$err_email="Not a valid email";
				$hasError=true;
			}
			else
			{
				$email=htmlspecialchars($_POST["email"]);
			}
			if(empty($_POST["password"]))
			{
				$hasError = true ;
				$err_password = "Password required!" ;
			}
			else 
			{
				$password = $_POST["password"] ;
			}
			if(isset($_POST['login']))
			{
				if(authentication($email,$password))
				{
					header("Location: admin.php") ;
				}
				echo "Invalid username or password" ;
			}
		}
	function insertUser($username,$email,$password,$type)
    {
        $query = "INSERT INTO user VALUES (NULL,'$username','$email','$password','$type')" ;
        echo $query ;
        execute($query) ;
    }
	

if(isset($_POST['login']))
			{
				if(authentication($email,$password))
				{
					header("Location: dashuser.php") ;
				}
				if(authentication1($email,$password))
				{
					header("Location: dashboard.php") ;
				}
				if(authentication2 ($email,$password))
				{
					header("Location: dashdoctor.php") ;
				}
				if(authentication3 ($email,$password))
				{
					header("Location: dasheditor.php") ;
				}
				echo "Invalid username or password" ;
			}



function authentication($email,$password)
    {
        $query = "select * from user where email='$email' and password='$password' and type='USER'";
        $result = get($query) ;
        if(count($result)>0)
        {
            return $result[0] ;
        } 
        return false ;   
    }
	function authentication1($email,$password)
    {
        $query = "select * from user where email='$email' and password='$password' and type='ADMIN'";
        $result = get($query) ;
        if(count($result)>0)
        {
            return $result[0] ;
        } 
        return false ;   
    }	
	function authentication2($email,$password)
    {
        $query = "select * from user where email='$email' and password='$password' and type='DOCTOR'";
        $result = get($query) ;
        if(count($result)>0)
        {
            return $result[0] ;
        } 
        return false ;   
    }	
	function authentication3($email,$password)
    {
        $query = "select * from user where email='$email' and password='$password' and type='EDITOR'";
        $result = get($query) ;
        if(count($result)>0)
        {
            return $result[0] ;
        } 
        return false ;   
    }	
	
	function checkUsernamee($username){
		$query = "select * from user where bname='$username'";
		$result=get($query);
		if(count($result) > 0){
			return "false";
		}
		return "true";
	}
	
?>
