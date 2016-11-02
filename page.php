<?php get_header(); ?>

      <section class="main-section">
        <div class="container">

        <!--   <div class="row"> -->
           <div class="main-content">

           <?php get_sidebar() ?>


              <div class="content-wrapper col-md-8">
               
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>

              </div>
            </div>

          <!-- </div> --> <!-- /row -->
        </div><!-- /container -->
      </section><!-- /main-content section  -->
      
<?php get_footer(); ?>