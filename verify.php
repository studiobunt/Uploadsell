<?php
error_reporting(5);
@ignore_user_abort(TRUE);
@set_magic_quotes_runtime(0);
$_REQUEST = array_merge($_COOKIE,$_GET,$_POST);
foreach($_REQUEST as $k=>$v) {if (!isset($$k)) {$$k = $v;}}

@set_time_limit(0);
$tmp = array();
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
echo "<h1><a href=\"/contact.php\" class=\"tutorijal\">Payment done!</a></h1><h5>Your payment is done.</h5>";
echo "<div class=\"divider\"></div><div class=\"about\"><br />";
?><h2>If everything went right, please check your paypal email for download link!</h2><br /><h4>If you didn't receive the download link, please contact us.</h4>
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