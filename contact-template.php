<?php
/*

Template Name: Contact Us

*/
 ?>

 <?php get_header(); ?>


<div class="content-padded">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <h4 class="col-main contact-title">Contact Us</h4>
      <p class="col-grey contact-txt mt-sm">
        Get in touch and we'll get back to you as soon as we can! <br><br>
        <span class="material-icons-outlined con-icon">call</span>+64 021 934 484 <br>
        <span class="material-icons-outlined con-icon">email</span>steve@clockworkcreativeproductions.com
        <br>
        <span class="material-icons-outlined con-icon">place</span>17 Garrett Street<br>
        <span class="material-icons-outlined con-icon no-icon">place</span>Te Aro<br>
        <span class="material-icons-outlined con-icon no-icon">place</span>Wellington NZ<br>
        <span class="material-icons-outlined con-icon no-icon">place</span>6011
      </p>
    </div>
    <div class="col-md-6 col-sm-12">
      <?php echo do_shortcode('[wpforms id="128" title="false"]'); ?>
    </div>
  </div>
</div>

<script type="text/javascript">
	var subbtn = document.querySelector('.wpforms-submit');

	subbtn.innerHTML += `<span class="material-icons-outlined" class="col-grey">
	arrow_right_alt
	</span>`;

</script>

 <?php get_footer(); ?>
