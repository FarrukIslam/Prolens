<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


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



    <div class="wrapper">

    <style type="text/css">
         <?php $body_bg =  cs_get_option('body_bg'); ?>
         <?php $body_bg_color =  cs_get_option('body_bg_color'); ?>
            
                <?php if($body_bg) : ?>

                  body { background-image: url(<?php echo $body_bg;  ?>);  }

                 <?php else : ?>

                 <?php if($body_bg_color): ?>

                  body { background-color: <?php echo $body_bg_color; ?>  }
                  <?php else : ?>
                     body { background-color:  #00b2f0; }
                  <?php endif; ?>

                 <?php endif; ?>
    
        
    </style>

      <header class="header-section">
          <div class="container">
             <!--  <div class="header-main"> -->

            <?php $header_img =  cs_get_option('header_img'); ?>
            
                <?php if($header_img) : ?>
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo $header_img;  ?>" class="img-responsive hader-logo"></a>

               <?php else : ?>

                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/mainlogo.png" class="img-responsive hader-logo"></a>
               <?php endif; ?>

                
               
                 <!--  <img src="img/mainlogo.png" class="img-responsive hader-logo"> -->
                  <!-- <h1 class="header-text">1 -800-PRO-LENS</h1> -->
                
              <!-- </div> -->
          </div><!-- /container -->
      </header><!-- /header -->