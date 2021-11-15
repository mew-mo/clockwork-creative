<?php
/*

Template Name: Our Work

*/
 ?>

 <?php get_header(); ?>

 <script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>


   <?php
   query_posts(
     array(
       'post_type' => 'work'
     )
   );
   ?>
   <div class="content-padded">
     <h4 class="col-main">Our Work</h4>
   <div class="row work-row mt">


     <?php
     if ( have_posts() ) : $postcount = 0;
       while (have_posts() ) : the_post();
       $postcount++;

       if ($postcount == 1 || $postcount == 2) {
       ?>

     <div class="col-md-6 col-sm-12">
       <div class="work-title">
         <h5 class="col-main text-right"><?php the_title(); ?></h5>
       </div>
       <?php
       if (has_post_format('video')) {
         echo the_content();
       } else {
         echo the_post_thumbnail('medium_large', ['class' => 'work-img']);
       }
       ?>
       <div class="d-inline">
         <p class="col-dark">
           <?php
            if (get_post_format() == false) {
              echo 'Image • ';
            } else {
             echo 'Video • ';
            }?>
           <?php echo get_the_term_list($post->ID, 'service-type', '', ' ', ''); ?>
          </p>
       </div>
     </div>

   <?php } else { ?>
     <div class="col-md-3 col-sm-12 mt">
       <div class="work-title">
         <h5 class="col-main"><?php the_title(); ?></h5>
       </div>
       <?php
       if (has_post_format('video')) {
         echo the_content();
       } else {
         echo the_post_thumbnail('medium_large', ['class' => 'work-img']);
       }
       ?>
       <div class="d-inline">
         <p class="col-dark">
           <?php
            if (get_post_format() == false) {
              echo 'Image';
            } else {
             echo 'Video';
            }?>
           <?php echo get_the_term_list($post->ID, 'service-type', '', ' ', ''); ?>
          </p>
       </div>
    </div>
   <?php } ?>

 <?php endwhile;
   else : echo '<p> No services have been posted. </p>';
   endif
   ?>
 </div>
<!-- end row -->
</div>
<!-- end content padded -->

<script>
  if (document.querySelector('iframe')) {
    var iframes  = document.querySelectorAll('iframe');
    console.log(iframes);
    for (var i = 0; i < iframes.length; i++) {
      $(iframes[i]).unwrap();
    }
  }
</script>

 <?php get_footer(); ?>
