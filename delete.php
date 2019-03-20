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
echo "<h3>Hello, if you want to delete <strong>" . $del['product_name'] . "</strong>, please enter you DEL password below.</h3>"; 
echo "<form id=\"del_form\" name=\"del_form\" method=\"post\" action=\"delete.php?id=$id&del=true\"><input name=\"del_key\" type=\"text\" class=\"tekst\" style=\"width: 300px;\" /><input type=\"submit\" style=\"width: 100px;\" id=\"del_button\" name=\"del_button\" class=\"dugme\" value=\"Delete\" \>";
}  else {
echo "<h3>Product with id you provided does not exist! Please check your link!</h3>";
}
mysql_close($link);
}
function getdelkey($id) {
$link = mysql_connect('localhost', 'gimnp_upload', 'uploadsell');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('gimnp_upload', $link);
$id = mysql_real_escape_string($_GET['id']);
$delp = mysql_query("SELECT del_password FROM 1korisnik1 WHERE id = '$id'");
$delp = mysql_fetch_assoc($delp);
return $delp['del_password'];
mysql_close($link);
}
function izbrisi($id) {
$link = mysql_connect('localhost', 'gimnp_upload', 'uploadsell');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('gimnp_upload', $link);
$id = mysql_real_escape_string($_GET['id']);
$de = mysql_query("DELETE FROM 1korisnik1 WHERE id = '$id'");
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
echo "<h1><a href=\"/index.php\" class=\"tutorijal\">Delete</a></h1><h5>Delete your file(s).</h5>";
echo "<div class=\"divider\"></div><div class=\"about\"><br />";
if($_GET['del'] == "true" && $_POST['del_key'] == getdelkey(mysql_real_escape_string($_GET['id']))) {
echo "<h3>File successfully deleted.</h3>";
izbrisi();
} else {
if($_POST['del_key'] =! getdelkey(mysql_real_escape_string($_GET['id']))) {
echo "<h3><strong>Invalid key!</strong></h3><br />";
}
informacije();
}
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
