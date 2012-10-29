<?php
if(isset($_GET['movs']))
{
	header("HTTP/1.1 301 Moved Permanently");
	header("location: ./gh2009/?movs=" . $_GET['movs']);
	return;
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
    <title>Moovee -- A simple movie scheduler</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="很陽春的排片單系統" />
    <meta name="keywords" content="排片單, 金馬, 金馬影展, 台北電影節, Taipei Golden Horse Film Festival, Taipei Film Festival, Movie Time Scheduler" />
    <!-- iPhone test -->
    <link rel="apple-touch-icon" href="icon/moovee.png" />
    <meta name="viewport" content = "width = device-width, initial-scale = 1, user-scalable = no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="styles/print.css" type="text/CSS" media="print" />
    <link rel="stylesheet" href="styles/movprops.css" type="text/css" />
    <!-- Oh, yes, please render it using chrome frame, or your almost-standard engine -->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="."><strong>Moovee</strong> -- A simple movie scheduler</a>
        </div>
    </div>
</div>
<div class="container">
    <h1>Which film festival?</h1>
    <div id="festList">
        <ul>
            <li><a href="gh2012">2012 金馬影展 / Golden Horse 2012</a></li>
            <li><a href="tiff2011">2011 台北電影節 / Taipei Film Festival 2011</a></li>
            <li><a href="gh2011f">2011 金馬奇幻影展 / Golden Horse 2011 (Fantastic)</a></li>
            <li><a href="gh2010">2010 金馬影展 / Golden Horse 2010</a></li>
            <li><a href="tiff2010">2010 台北電影節 / Taipei Film Festival 2010</a></li>
            <li><a href="gh2010f">2010 金馬奇幻影展 / Golden Horse 2010 (Fantastic)</a></li>
            <li><a href="gh2009">2009 金馬影展 / Golden Horse 2009</a></li>
        </ul>
    </div>
    <div class="muted">
        <span>Short link of this page: <a href="http://bit.ly/moovee">http://bit.ly/moovee</a></span><br />
        <span>Hint: iPad / iPhone / iPod user, try to add this page to your Home Screen :)</span><br />
        <span>20121020: Here's <a href="https://github.com/cornguo/moovee">the source code</a> of this tool. Have fun :D</span>
    </div>
    <div class="fb_like">
        <object data="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcornguo.atcity.org%2Ftest%2Fmoovee%2F&amp;layout=button_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;colorscheme=light&amp;height=21" style="border:none; overflow:hidden; height:21px;" type="text/html"></object>
    </div>
</div>
</body>
</html>
<?php
}
?>
