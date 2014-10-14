<?php
header('Cache-Control: max-age=120, must-revalidate;');
header('Content-type: text/html; charset= utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
$movs = "";
if(isset($_GET['movs'])) $movs = preg_replace('/[^0-9,]/', '', $_GET['movs']);
include("../includes/mooveeClass.inc.php");
include("config.php");
$k = new moovee();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title; ?> (Calendar mode)</title>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<!-- Oh, yes, please render it using chrome frame, or your almost-standard engine -->
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<link rel="stylesheet" href="../styles/reset.css" type="text/css" />
<link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../styles/calprint.css" type="text/CSS" media="print" />
<link rel="stylesheet" href="../styles/movprops.css" type="text/css" />
<link rel="stylesheet" href="../styles/calprops.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
<script src="../func.js" type="text/javascript"></script>
</head>
<body onload="renderCal();">
<?php $k->getCalendar($movs); ?>
</body>
</html>
