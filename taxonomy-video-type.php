<?php get_header(); ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>

 <div class="content-padded">
   <h4 class="col-main">Showing results for
       <span class="col-grey term-tag">
       <?php
       $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
       echo $term->name;
       ?>
    </h4>

    <a href="<?php echo get_page_link(get_page_by_path('our-work'));?>" class="col-grey">
      <div class="cc-btn mt-SM col-grey">
        back to our work
          <span class="material-icons-outlined" class="col-grey">
          arrow_right_alt
          </span>
      </div>
    </a>

 <div class="row work-row">

   <?php
   if ( have_posts() ) : $postcount = 0;
     while (have_posts() ) : the_post();
     $postcount++;

     if ($postcount == 1 || $postcount == 2) {
     ?>

   <div class="col-md-6 col-sm-12 mt work-box">
     <a href="<?php the_permalink();?>">
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
         <span class="col-light bg-col-main work-tags"> Tags: </span>
         <?php
          if (get_post_format() == false) {
            echo 'Image • ';
          } else {
           echo 'Video • ';
           echo get_the_term_list($post->ID, 'video-type', '', ', ', '');
          }?>
         <?php echo get_the_term_list($post->ID, 'service-type', '', ', ', ''); ?>
        </p>
     </div>
    </a>
   </div>

 <?php } else { ?>
   <div class="col-md-3 col-sm-12 mt pt work-box">
     <a href="<?php the_permalink();?>">
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
     <div class="d-inline-block">
       <p class="col-dark d-inline-block">
         <span class="col-light bg-col-main work-tags"> Tags: </span>
         <?php
          if (get_post_format() == false) {
            echo 'Image • ';
          } else {
           echo 'Video • ';
          }?>
         <?php echo get_the_term_list($post->ID, 'service-type', '', ', ', ''); ?>
        </p>
     </div>
     </a>
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
  for (var i = 0; i < iframes.length; i++) {
    $(iframes[i]).unwrap();
  }
}
</script>

<div class="pt"></div>
<?php get_footer(); ?>
