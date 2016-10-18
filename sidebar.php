
 <?php $enable_sidebar =  cs_get_option('enable_sidebar'); ?>

                <?php if($enable_sidebar) : ?>
                  
             
    <div class="sidebar col-md-4">
      <?php dynamic_sidebar( 'fontpage-left-sidebar' ); ?>


    </div><!-- /sidebar /col-md-3 -->

   <?php endif; ?>