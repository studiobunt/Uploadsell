<?php
error_reporting(5);
@ignore_user_abort(TRUE);
@set_magic_quotes_runtime(0);
$_REQUEST = array_merge($_COOKIE,$_GET,$_POST);
foreach($_REQUEST as $k=>$v) {if (!isset($$k)) {$$k = $v;}}

@set_time_limit(0);
$tmp = array();

function informacije($id) {
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
echo "<h3>Product name: <strong>" . $del['product_name'] . "</strong></h3><br />";
echo "<h3>Price: <strong>" . $del['product_price'] . "</strong></h3><br />";
echo "<h3>Currency: <strong>" . $del['product_currency'] . "</strong></h3><br />";
echo "<h3>Seller's name: <strong>" . $del['contact_person'] . "</strong></h3><br />";
echo "<h3>Seller's email: <strong>" . $del['email_address'] . "</strong></h3><br />";
?>
<script type="text/javascript" language="javascript" src="niftyplayer.js"></script>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="165" height="38" id="niftyPlayer1" align="">
<param name=movie value="niftyplayer.swf?file=<?php echo $del['cut']; ?>&as=1">
<param name=quality value=high>
<param name=bgcolor value=#FFFFFF>
<embed src="niftyplayer.swf?file=<?php echo $del['cut']; ?>&as=1" quality=high bgcolor=#FFFFFF width="165" height="38" name="niftyPlayer1" align="" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
</embed>
</object>
<?php
?> <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="cbt" value="Return To Merchant">
<input type="hidden" name="business" value="<?php echo $del['paypal_addres']; ?>">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="<?php echo $del['product_name']; ?>">
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="undefined_quantity" value="0">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="shipping" value="0.00">
<input type="hidden" name="shipping2" value="0.00">
<input type="hidden" name="handling" value="0.00">
<input type="hidden" name="amount" value="<?php echo $del['product_price']; ?>">
<input type="hidden" name="currency_code" value="<?php echo $del['product_currency']; ?>">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
<input type="hidden" name="return" value="http://upload-sell.com/verify.php">
<input type="hidden" name="notify_url" value="http://upload-sell.com/ipn.php?id=<?php echo $del['id']; ?>">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="rm" value="2">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<?php
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
echo "<h1><a href=\"/index.php\" class=\"tutorijal\">Buy</a></h1><h5>Product info.</h5>";
echo "<div class=\"divider\"></div><div class=\"about\"><br />";
informacije();
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
