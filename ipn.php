<?php
error_reporting(5);
@ignore_user_abort(TRUE);
@set_magic_quotes_runtime(0);
$_REQUEST = array_merge($_COOKIE,$_GET,$_POST);
foreach($_REQUEST as $k=>$v) {if (!isset($$k)) {$$k = $v;}}

@set_time_limit(0);
$tmp = array();

function download($id) {
$link = mysql_connect('localhost', 'gimnp_upload', 'uploadsell');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('gimnp_upload', $link);
$id = mysql_real_escape_string($_GET['id']);
$delp = mysql_query("SELECT * FROM 1korisnik1 WHERE id = '$id'");
$c = mysql_num_rows($delp);
if($c == 1) {
$del = mysql_fetch_assoc($delp);
echo "<h3>Download: <strong>" . $del['product_url'] . "</strong></h3><br />";
}  else {
echo "<h3>Product with id you provided does not exist! Please check your link!</h3>";
}
mysql_close($link);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;charset=utf-8" />
<title>Upload & Sell | An easy way to sell your files</title>
<meta name="keywords" content="upload, pdf, ebooks, ebook, sell, paypal, fast, quick, prodaja, digital, products, txt" />
<meta name="description" content="Upload-Sell.com provides an easy way to sell your files." />
<meta name="distribution" content="global" />
<meta name="robots" content="all" />

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/masters.css" type="text/css" media="projection, screen" />
<link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
<!--[if gte IE 6]><![if lt IE 7]>
<link rel="stylesheet" href="library/css/ie-fixes.css" type="text/css" media="projection, screen" />
<![endif]><![endif]-->

</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div>
<h1><a href="http://upload-sell.com" title="Upload-Sell.com">Upload-Sell.com</a></h1>
                                <p>
						<a href="index.php" id="index">Home</a>
						<a href="faq.php" id="news">FAQ</a> 
						<a href="about.php" id="about">About</a>
						<a href="contact.php" id="contact">Contact us</a></p>
			</div>
		</div>
		<div id="column">
			<div id="about">
<div class="tutorijali">
<?php
echo "<h1><a href=\"/index.html\" class=\"tutorijal\">Buy</a></h1><h5>Product info.</h5>";
echo "<div class=\"divider\"></div><div class=\"about\"><br />";
// Read the post from PayPal and add 'cmd' 
$req = 'cmd=_notify-validate'; 
if(function_exists('get_magic_quotes_gpc')) 
{  
	$get_magic_quotes_exits = true; 
} 
foreach ($_POST as $key => $value) 
// Handle escape characters, which depends on setting of magic quotes 
{  
	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1){  
		$value = urlencode(stripslashes($value)); 
	} else { 
		$value = urlencode($value); 
	} 
	$req .= "&$key=$value"; 
} 
// Post back to PayPal to validate 
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n"; 
$header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n"; 
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30); 
  
if (!$fp) {
} else { 
fputs ($fp, $header . $req); 
while (!feof($fp)) { 
	$res = fgets ($fp, 1024); 
	if (strcmp ($res, "VERIFIED") == 0) { 
$link = mysql_connect('localhost', 'gimnp_upload', 'uploadsell');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('gimnp_upload', $link);
$id = mysql_real_escape_string($_GET['id']);
$delp = mysql_query("SELECT * FROM 1korisnik1 WHERE id = '$id'");
$c = mysql_num_rows($delp);
if($c == 1) {
$del = mysql_fetch_assoc($delp);
if($_POST['receiver_email'] == $del['paypal_addres'] && $_POST['mc_gross'] == $del['product_price'] && $_POST['mc_currency'] == $del['product_currency'] && $_POST['payment_status'] == "Completed") {
$subject = $del['product_name'];
$message = "Thanks for purchasing $subject!\n Your download link is:" . download();
$headers = 'From: webmaster@upload-sell.com' . "\r\n" .
    'Reply-To: webmaster@upload-sell.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$email = $_POST['receiver_email'];

mail($email, $subject, $message, $headers);
} else {
echo "<h2>An error has occured!</h2>";
}
	} else if (strcmp ($res, "INVALID") == 0) { 
echo "<h2>Payment not received! Please try again!</h2>";
	}
}	 
} 
}
fclose ($fp); 
?>
</div></div>.
                         </div>
			
			<div id="bottom"><p><a href=""></a></p></div>
		</div><!-- end #column -->
	
		<div id="footer">
			<div><center><p>Copyright &copy; 2011. All rights reserved.</p></center></div>
		</div>
	</div><!-- end #wrapper -->
</body>
</html>