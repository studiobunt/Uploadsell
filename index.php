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
<?
echo "<h1><a href=\"/index.php\" class=\"tutorijal\">Home</a></h1><h5>Upload and start selling your stuff -- It's  completely FREE!</h5>";
echo "<div class=\"divider\"></div><div class=\"about\"><br />"; ?>
			<form id="upload_form" name="upload_form" method="post" enctype="multipart/form-data" action="upload.php">  
				<h2>1. Select Files</h2><br />
				<h5>Select your file (max. 50MB)</h5>
				<input type="file" name="file" id="file" class="tekst"/><br /> 

				<br /><h2>2. Product Information</h2>
				
				<table width="500" border="0" class="formtable" style="color: #616362;"><br />
					<tr><td width="150">Product Name:
					</td><td><input type="text" name="product_name" class="tekst" maxlength="127"></td></tr>
					<tr><td width="150">Price:
					</td><td><input type="text" name="product_price" class="tekst" maxlength="5" style="text-align: right" value="1.00"></td></tr>
					<tr><td width="150">Currency:
					</td><td><select name="product_currency" class="tekst">
						<option value="USD" selected>USD</option>
						<option value="AUD">AUD</option>
						<option value="BRL">BRL</option>
						<option value="GBP">GBP</option>
						<option value="CAD">CAD</option>
						<option value="CZK">CZK</option>
						<option value="DKK">DKK</option>
						<option value="EUR">EUR</option>
						
						<option value="HKD">HKD</option>
						<option value="HUF">HUF</option>
						<option value="ILS">ILS</option>
						<option value="JPY">JPY</option>
						<option value="MYR">MYR</option>
						<option value="MXN">MXN</option>
						<option value="NZD">NZD</option>
						<option value="NOK">NOK</option>
						<option value="PHP">PHP</option>
						
						<option value="PLN">PLN</option>
						<option value="SGD">SGD</option>
						<option value="SEK">SEK</option>
						<option value="CHF">CHF</option>
						<option value="TWD">TWD</option>
						<option value="THB">THB</option>
					</select>
					</td></tr>
				</table>
				<br /><h2>3. Seller's Information</h2><br />
				<table width="500" border="0" class="formtable" style="color: #616362;">
					<tr><td width="150" valign="top">Contact Person:
					</td><td valign="top"><input type="text" name="seller_name" class="tekst" maxlength="127"></td></tr>
					<tr><td width="150" valign="top">Company Name:
					</td><td valign="top"><input type="text" name="seller_company" class="tekst" maxlength="127"></td></tr>
					<tr><td width="150" valign="top">Paypal Email Address:
					</td><td valign="top"><input type="text" name="seller_paypal" class="tekst" maxlength="127"></td></tr>
					<tr><td width="150" valign="top">Support Email Address:
					</td><td valign="top"><input type="text" name="seller_support" class="tekst" maxlength="127"></td></tr>
				</table>
				<br /><h2>4. Agreement</h2><br />
				<table width="500" border="0" class="formtable" border="1" style="color: #616362;">
					<tr>
						<td width="50" valign="top" align="right"><input type="checkbox" name="yesgood" value="yesgood"></td>
						<td valign="top"><strong>I am a good person.</strong> By uploading this, I am not violating any copyright laws. 
						I only upload files that I have full rights to sell and distribute.<br><br></td>
					</tr>
					<tr>
						<td width="50" valign="top" align="right"><input type="checkbox" name="yestos" value="yestos"></td>
						<td valign="top">I agree to the Terms of Service. (please read them)</td>
					</tr>
				</table>
				</div><br />
					<input type="submit" id="upload_button" name="upload_button" class="dugme" value="Upload">
					<input type="reset" id="reset_button" name="reset_button" class="dugme"" value="Reset">
			</form></div>
			<br>
			<br>
</div>
                         </div>
			
		<br>
		<br>
		<br>
	
		<div id="footer">
			<div><center><p>Copyright &copy; 2011. All rights reserved.</p></center></div>
		</div>
	</div><!-- end #wrapper -->
</body>
</html>
