<?php get_header(); ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>

<div class="row">
  <div class="col-12 hero-img">
    <div class="hero-txt">
      <h3 class="tagline"><?php echo get_theme_mod('tagline');?></h3>
      <h1 class="title"><?php echo get_theme_mod('title');?></h1>
    </div>
  </div>
</div>
<!-- hero img ends -->

<div class="row middle-section">

  <?php
  query_posts(
    array(
      'post_type' => 'services'
    )
  );
  ?>

  <div class="col-md-6 col-sm-12">
    <div class="content-padded">
      <h4 class="col-main"><?php echo get_theme_mod('middle_title');?></h4>
      <p class="col-dark pt"><?php echo get_theme_mod('middle_content');?></p>

      <h5 class="col-dark pt">We Specialise In</h5>
      <?php
      if ( have_posts() ) :
        while (have_posts() ) : the_post();
        ?>
        <h5 class="tag col-light bg-col-main"><?php the_title(); ?></h5>
      <?php endwhile;
        else : echo '<p> No services have been posted. </p>';
        endif
        ?>
      <a href="<?php echo get_page_link(get_page_by_path('our-work'));?>" class="col-grey">
        <div class="cc-btn mt col-grey">
          more work
            <span class="material-icons-outlined" class="col-grey">
            arrow_right_alt
            </span>
        </div>
      </a>
    </div>
  </div>
  <!-- txt content end -->

  <?php
  query_posts(
    array(
      'post_type' => 'work'
    )
  );
  ?>

  <div class="col-md-6 col-sm-12 middle-work-col">
  <?php
  if ( have_posts() ) : $postcount = 0;
    while (have_posts() ) : the_post();
    $postcount++;

    if ($postcount == 1) {
    ?>
    <div class="row ft-row">

      <div class="col-md-12 ft-video-col">
        <div class="fp-video featured-cont">
          <?php
          if (has_post_format('video')) {
            echo the_content();
          } else {
            echo the_post_thumbnail('medium_large', ['class' => 'fp-img']);
          }
          ?>
        </div>
      </div>
    <!-- featured video/img -->
    </div>
    <div class="row sub-row">
  <?php } ?>
  <?php if ($postcount == 2 || $postcount == 3) { ?>
      <div class="col-md-6 col-sm-12 video-col">
        <div class="fp-video sub-video" style="<?php
          if (has_post_format('video')) {
            echo 'display: flex;align-items: center;justify-content: center; height:100%;';
          }
        ?>">
          <?php
          if (has_post_format('video')) {
            echo the_content();
          } else {
            echo the_post_thumbnail('medium_large', ['class' => 'work-img']);
          }
          ?>
        </div>
      </div>
    <?php } ?>
    <?php endwhile;
      else : echo '<p> No videos have been posted. </p>';
      endif
      ?>
    </div>
    <!-- row ends -->
  </div>
</div>
<!-- middle section row ends -->

<script>
  if (document.querySelector('iframe')) {
    var iframes  = document.querySelectorAll('iframe');
    for (var i = 0; i < iframes.length; i++) {
      $(iframes[i]).unwrap();
    }
  }
</script>


<?php
query_posts(
  array(
    'post_type' => 'services'
  )
);
?>

<div class="row g-0 pt-sm" id="services">
  <?php
  if ( have_posts() ) :
    while (have_posts() ) : the_post();
    ?>
  <div class="col-md-<?php echo get_theme_mod('col-no');?> col-sm-12 service-col">
    <div class="one-service">
      <div class="service-overlay bg-col-light">
        <h4 class="col-main"><?php the_title(); ?></h4>
        <p class="col-dark"><?php the_content();?></p>
      </div>
      <div class="service-img-container">
        <?php the_post_thumbnail('medium_large', ['class' => 'service-img']); ?>
      </div>
    </div>
    <div class="service-title-wrapper">
      <div class="service-title">
        <h5 class="col-main pt-sm"><?php the_title();?></h5>
      </div>
    </div>
  </div>
<?php endwhile;
  else : echo '<p> No services have been posted. </p>';
  endif
  ?>

</div>

<?php get_footer(); ?>
