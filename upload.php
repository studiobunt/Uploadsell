<?php
error_reporting(5);
@ignore_user_abort(TRUE);
@set_magic_quotes_runtime(0);
$_REQUEST = array_merge($_COOKIE,$_GET,$_POST);
foreach($_REQUEST as $k=>$v) {if (!isset($$k)) {$$k = $v;}}

@set_time_limit(0);
$tmp = array();

require_once './mp3.php';

function nadjiEks ($filename) 
{ 
$filename = strtolower($filename) ; 
$exts = split("[/\\.]", $filename) ; 
$n = count($exts)-1; 
$exts = $exts[$n]; 
return $exts; 
}
function zapisi($prod, $price, $cur, $cp, $cn, $pp, $email, $purl, $cut) {
$link = mysql_connect('localhost', 'gimnp_upload', 'uploadsell');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('gimnp_upload', $link);
$delp = rand();
$xd = mysql_query("SELECT * FROM 1korisnik1 WHERE product_name = '$prod'");
$cc = mysql_num_rows($xd);
if($cc == 1) {
$aa = 1;
} else {
mysql_query("INSERT INTO 1korisnik1 VALUES('', '$prod', '$price', '$cur', '$cp', '$cn', '$pp', '$email', '$delp', '$purl', '$cut')");
}
mysql_close($link);
}
function getid($prod) {
$link = mysql_connect('localhost', 'gimnp_upload', 'uploadsell');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('gimnp_upload', $link);
$id = mysql_query("SELECT id FROM 1korisnik1 WHERE product_name = '$prod'");
$id = mysql_fetch_assoc($id);
return $id['id'];
mysql_close($link);
}
function getdelkey($id) {
$link = mysql_connect('localhost', 'gimnp_upload', 'uploadsell');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('gimnp_upload', $link);
$delp = mysql_query("SELECT del_password FROM 1korisnik1 WHERE id = '$id'");
$delp = mysql_fetch_assoc($delp);
return $delp['del_password'];
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
echo "<h1><a href=\"/index.php\" class=\"tutorijal\">Upload System</a></h1><h5>Important informations about your upload.</h5>";
echo "<div class=\"divider\"></div><div class=\"about\"><br />";
if(isset($_POST['yesgood']) && isset($_POST['yestos'])) { 
if ($_FILES["file"]["size"] < 50000000)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "<h3>An error has occured. Please try again later.<h3><br />";
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    
    $md5 = time();
    if (file_exists("upload/$md5/" . $_FILES["file"]["name"]))
      {
      echo "<h3>The file you uploaded already exist on our server.</h3>";
      }
    else
      {
if (empty($_POST['seller_name']) || empty($_POST['product_name']) || empty($_POST['product_price']) || empty($_POST['product_currency']) ||
empty($_POST['seller_company']) || empty($_POST['seller_paypal']) || empty($_POST['seller_support'])) die ("Please fill in all empty fields");
if(nadjiEks($_FILES["file"]["name"]) == "mp3" || nadjiEks($_FILES["file"]["name"]) == "zip" || nadjiEks($_FILES["file"]["name"]) == "rar" || nadjiEks($_FILES["file"]["name"]) == "pdf" || nadjiEks($_FILES["file"]["name"]) == "doc" || nadjiEks($_FILES["file"]["name"]) == "docx") { 
      
      mkdir('upload//'.$md5, 0777, true);
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/$md5/" . $_FILES["file"]["name"]);

$mp3 = new mp3;
$input = "upload/$md5/" . $_FILES["file"]["name"];
$output = "cut/" . $_FILES["file"]["name"];
$mp3->cut_mp3($input, $output, 0, 30, 'second', false);

      $prod = $_POST['product_name'];
      $price = $_POST['product_price'];
      $cur = $_POST['product_currency'];
      $cp = $_POST['seller_name'];
      $cn = $_POST['seller_company'];
      $pp = $_POST['seller_paypal'];
      $email = $_POST['seller_support'];
      $purl = "http://gimnazijanp.edu.rs/uploadsell/upload/$md5/" . $_FILES["file"]["name"];
      $cut = "http://gimnazijanp.edu.rs/uploadsell/cut/" . $_FILES["file"]["name"];
      if(!empty($prod) || !empty($price) || !empty($cur) || !empty($cp) || !empty($cn) || !empty($pp) || !empty($email)) {
      zapisi($prod, $price, $cur, $cp, $cn, $pp, $email, $purl, $cut);
      $id = getid($prod);
      $DELP = getdelkey($id);
      $selll = "http://gimnazijanp.edu.rs/uploadsell/buy.php?id=$id";
      $delll = "http://gimnazijanp.edu.rs/uploadsell/delete.php?id=$id";
      if($aa == 1) {
      echo "<h2>File with same product name already exists in our database. If that's your file please delete it with your delete link.</h2>"; } else { 
      echo "<h2>Your file has been uploaded successfully!</h2><br /><h3>Thank you for uploading your file. Your sell link is:
<strong><a class=\"tutorijal\" href=\"$selll\">$selll</a></strong>. 
When someone buys your file you'll be noticed via support email you entered. If you, for any reason, decide to delete your file this is your delete link: <strong><a class=\"tutorijal\" href=\"$delll\">$delll</a></strong>. 
Please notice that if you want to delete your file, you need a DEL password. Your DEL password for this file is $DELP. We reccomended you to save your sell link, DEL link and DEL password. Good luck selling! :)</h3>";
} 
} else { echo "<h2>Please fill all fields!</h2>"; }
} else { echo "<h2>Invalid file extension!</h2>"; }
}
    }
  }
else
  {
  echo "<h1>Invalid file!</h1>";
  }
} else {
echo "<h3>To upload your file you have to accept our Terms of Service, and you have to be a good person!</h3>";
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
