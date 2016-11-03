<?php
/* 
Template Name: Free Shipping Popup
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php $favicon = cs_get_option('favicon'); ?>

      <?php if($favicon) : ?>
      <link rel="icon" href="<?php echo $favicon; ?>" sizes="32x32" />

    <?php endif; ?>




    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <?php wp_head(); ?>
  <body <?php body_class(); ?>>
    <div id="fixedsmall">
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr class="header">
          <td valign="middle"><img src="<?php echo get_template_directory_uri(); ?>/img/PROLENSsmall.jpg" border="0" alt="ProLens" title=" PRO LENS " width="400" height="80"></td>
        </tr>
      </table>
      <table border="0" width="100%" cellspacing="0" cellpadding="1">
        <tr class="headerNavigation">
          <td class="headerNavigation">&nbsp;&nbsp;</td>
        </tr>
      </table>
      <center>
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
          
          <?php the_content(); ?>
          <?php endwhile; ?>

        <?php endif; ?>
      </center>
    </div>
  </body>
</html>