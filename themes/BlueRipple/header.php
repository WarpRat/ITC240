<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title><?=$config->title?></title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="<?=$config->theme_virtual . '/';?>css/style.css" />
  <script type="text/javascript" src="<?=$config->theme_virtual . '/';?>js/jquery.min.js"></script>
  <script type="text/javascript" src="<?=$config->theme_virtual . '/';?>js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="<?=$config->theme_virtual . '/';?>js/jquery.lavalamp.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#lava_menu").lavaLamp({
        fx: "backout",
        speed: 700
      });
    });
  </script>
    <script type="text/javascript" src="<?=$config->theme_virtual . '/';?>js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>

    <?=$config->loadhead?>

</head>

<body>
  <div id="main">
    <div id="site_content">
	  <div id="menubar">
        <ul class="lavaLampWithImage" id="lava_menu">
          <li class="current"><a href="<?=$config->virtual_path . '/';?>index.php">Home</a></li>
          <li><a href="<?=$config->virtual_path . '/';?>customers.php">Customers</a></li>
          <li><a href="<?=$config->virtual_path . '/';?>daily.php">Daily Menus</a></li>
          <li><a href="<?=$config->virtual_path . '/';?>dishes.php">Sample Dishes</a></li>
          <li><a href="<?=$config->virtual_path . '/';?>catering.php">Catering Event</a></li>
          <li><a href="<?=$config->virtual_path . '/';?>contact.php">Contact Us</a></li>

        </ul>
	  </div><!--close menubar-->
      <div id="header">
        <h1><?=$config->banner?></h1>
	    <h2>Made with 100% food!</h2>
      </div><!--close header-->
	  <div id="banner_image">
	    <div id="slider-wrapper">
          <div id="slider" class="nivoSlider">
            <img src="<?=$config->theme_virtual . '/';?>images/slide1.jpg" alt="" />
            <img src="<?=$config->theme_virtual . '/';?>images/slide2.jpg" alt="" />
            <img src="<?=$config->theme_virtual . '/';?>images/slide3.jpg" alt="" />
		  </div><!--close slider-->
		</div><!--close slider-wrapper-->
	  </div><!--close banner_image-->
      <div id="content">
  <?=showFeedback();?>
<!--Headed ends here-->
