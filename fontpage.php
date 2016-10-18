
<?php
/* Template Name: Fontpage prolens*/
 get_header(); ?>

         <?php $meta_data = get_post_meta( get_the_ID(), 'fontpage_meta', true ); ?>

      <section class="main-section">
        <div class="container">

           <div class="main-content">

           <?php get_sidebar() ?>


              <div class="content-wrapper col-md-8">


              <!-- End Welcome Text section -->

                <?php if( $meta_data['welcome_title']) : ?>
                       <h2><?php echo $meta_data['welcome_title']; ?></h2>
                <?php else : ?>
                   <h2>Welcome to ProLens! <br/>Replacement Lenses for Goggles and Sunglasses!!</h2>
                <?php endif; ?>  

                <?php if( $meta_data['welcome_text']) : ?> 
                  <p><?php echo $meta_data['welcome_text']; ?></p>
                  <?php else : ?>
                     <p><b>PROLENS</b> has replacement lenses for all major brands of Snow Goggles, Motocross Goggles, </p>
                <?php endif; ?>

              <!-- End Welcome Text section -->


                 <!-- Separetor -->
                 <?php if( $meta_data['separetor_color']) : ?>
                      <hr style="border-color:<?php echo $meta_data['separetor_color']; ?>" width="75%">
                <?php else : ?>
                      <hr width="75%">
                <?php endif; ?> 
              <!--End Separetor -->


              <!-- Category Product section -->
              <?php $showshortcode = $meta_data['shortcode_item']; ?>
               <?php if( $showshortcode ): ?>
                  <?php echo do_shortcode( '[product_category_items]'); ?>
                   <hr style="border-color:<?php echo $meta_data['separetor_color']; ?>" width="75%">
                <?php else : ?>
                    <?php //echo do_shortcode( '[product_category_items]'); ?>
                     <hr width="75%">
                <?php endif; ?> 

                     
               
              <!-- End Category Product section -->

           


              <!-- Content list info section -->

                <?php if( $meta_data['content_list_title']) : ?>
                      <p><b> <?php echo $meta_data['content_list_title']; ?></b></p>
                <?php else : ?>
                  <p><b> The ORDER PROCESS FOR REPLACEMENT LENSES: </p></b>
                <?php endif; ?>  


                  <ul>
                    <?php 

                      $meta_data = get_post_meta( get_the_ID(), 'fontpage_meta', true );
                      $con_list = $meta_data['content_list_info'];

                      if( $meta_data['content_list_info']) : ?>

                      <?php foreach ($con_list as $info_list_value) : ?>
                      

                            <li><p><b><?php echo $info_list_value['list_heading']; ?></b> S<?php echo $info_list_value['list_content']; ?></p></li>

                      <?php endforeach; ?>
                               

                      <?php else : ?>
                          <li><p><b>Step 1:</b> Select your brand of goggle or sunglass from the homepage.</p></li>

                          <li><p><b>Step 1:</b> Select your brand of goggle or sunglass from the homepage.</p></li>
                          <li><p><b>Step 2:</b> Identify your model from the pictures or description on the brand page. Please be sure that the lens you are ordering is the right lens for your model. If you are not sure, please call us at 1-800-PRO-LENS and we will be glad to help you identify your goggle or sunglasses. Please read our Return Policy as we only ship First Quality lenses and correct lens identification is very important.</p></li>
                          <li><p><b>Step 3:</b> Select the desired lens color or tint, compare it to your lens and add to cart.</p></li>
                          <li><p>Step 4: Process order online or call us at 1-800-PRO-LENS to process your order in person.</p></li>
                      <?php endif; ?> 



                    </ul>
              <!-- End Content list info section -->


               <!-- Separetor -->
                   <?php if( $meta_data['separetor_color']) : ?>
                        <hr style="border-color:<?php echo $meta_data['separetor_color']; ?>" width="75%">
                  <?php else : ?>
                        <hr width="75%">
                  <?php endif; ?> 
               <!--End Separetor --> 
                 

                <!--  HOURS OF OPERATION section -->
                  <?php if( $meta_data['hour_operation_title']) : ?>
                          <p><b><?php echo $meta_data['hour_operation_title']; ?></b></p>
                  <?php else : ?>
                       <p><b>HOURS OF OPERATION</b></p>
                  <?php endif; ?>  

                  <?php if( $meta_data['hour_operation_text']) : ?> 
                    <p><?php echo $meta_data['hour_operation_text']; ?></p>
                    <?php else : ?>
                       <p>Monday thru Friday, 9:00 AM - 6:00 PM EST <br/>Saturdays 10:00 to 6:00 PM EST<br/> Closed Sundays</p>
                  <?php endif; ?> 
                <!--  End HOURS OF OPERATION section-->


                <!-- Separetor -->
                   <?php if( $meta_data['separetor_color']) : ?>
                        <hr style="border-color:<?php echo $meta_data['separetor_color']; ?>" width="75%">
                  <?php else : ?>
                        <hr width="75%">
                  <?php endif; ?> 
               <!--End Separetor -->


                <!--  fontpage contact section-->
                  <?php if( $meta_data['contact_section_text']) : ?> 
                    <p><?php echo $meta_data['contact_section_text']; ?></p>
                    <?php else : ?>
                       <p><b>GOT QUESTIONS</b> Call us or e-mail us and we would be happy to help you!</p>
                  <?php endif; ?>  
                <!--  fontpage contact section-->  
              


              </div>
            </div>

        </div><!-- /container -->
      </section><!-- /main-content section  -->
<?php get_footer(); ?>