
      <footer>
        <div class="container">

                <p><?php echo $today = date("l j F Y"); ?></p>
             

            
              <div class="copy-right">
                <?php $copy_right_text =  cs_get_option('copy_right'); ?>
                <?php if($copy_right_text) : ?>
                <p><?php echo $copy_right_text; ?> </p>
                <?php else : ?>
                  <p>Copyright © 2003-2012</p>
                <?php endif; ?>

              </div>
          </div><!-- /container -->
      </footer><!-- /footer  -->    

    </div><!-- /wrapper -->


    <?php $ganalytics = cs_get_option('ganalytics'); ?>
      <?php if($ganalytics) : ?>
      <script>
         (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
               (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
               m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
         })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

         ga('create', '<?php echo $ganalytics; ?>', 'auto');
         ga('send', 'pageview');
      </script>
    <?php endif; ?>
  <?php wp_footer(); ?>
  </body>
</html>
