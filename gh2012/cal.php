<?php
header('Cache-Control: max-age=120, must-revalidate;');
header('Content-type: text/html; charset= utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
$movs = "";
if(isset($_GET['movs'])) $movs = preg_replace('/[^0-9,]/', '', $_GET['movs']);
include("../includes/mooveeClass.inc.php");
$k = new moovee();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Moovee -- 2012 Golden Horse Film Festival (Calendar mode)</title>
<meta name="description" content="很陽春的排片單系統" />
<meta name="keywords" content="排片單, 2012, 金馬, 金馬影展, Golden Horse 2012" />
<!-- Oh, yes, please render it using chrome frame, or your almost-standard engine -->
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<link rel="stylesheet" href="../styles/reset.css" type="text/css" />
<link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../styles/calprint.css" type="text/CSS" media="print" />
<link rel="stylesheet" href="../styles/movprops.css" type="text/css" />
<link rel="stylesheet" href="../styles/calprops.css" type="text/css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("jquery", "1.3.2");
google.load("jqueryui", "1.7.2");
</script>
<script src="../func.js" type="text/javascript"></script>
</head>
<body onload="renderCal();">
<?php $k->getCalendar($movs); ?>
</body>
</html>
