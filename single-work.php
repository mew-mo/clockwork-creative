<?php get_header();?>

<div class="content-padded">
  <h4 class="col-main"><?php the_title();?></h4>
  <a href="<?php echo get_page_link(get_page_by_path('our-work'));?>" class="col-grey">
    <div class="cc-btn mt-sm col-grey">
      back to our work
        <span class="material-icons-outlined" class="col-grey">
        arrow_right_alt
        </span>
    </div>
  </a>

  <div class="col-12 single-work mt <?php if (has_post_format('video')) {
    echo 'vid-work-box';
  }?>">
    <?php echo the_post_thumbnail('medium_large', ['class' => 'single-work-img']); ?>
    <p class="col-dark"><?php the_content();?></p>
  </div>
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

<?php get_footer();?>
