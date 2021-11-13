<?php
/*

Template Name: About Us

*/
 ?>

 <?php get_header(); ?>

 <div class="row">

   <div class="col-md-6 col-sm-12 abt-img">
     <!-- we can make it so that they clip to some container...??? -->
   </div>

   <div class="col-md-6 col-sm-12">
     <div class="content-padded abt-txt-container">

       <h4 class="col-main">About Us</h4>

       <div class="abt-txt abt-txt-1 col-dark mt">
         <p>Clockwork Creative are very good at stories. We are experts in narrative visual storytelling — from feature-length documentary to 15-second snippets for social sharing. Our projects run like clockwork if clocks were known for working with intelligence, sensitivity, flexibility, and open communication.</p>
       </div>

       <div class="cc-btn mt">
         next
         <span class="material-icons-outlined">
         arrow_right_alt
         </span>
       </div>
       <!-- NOTE: LINK THIS TO A PAGE BC YOU NEED TO :) -->
     </div>
   </div>

 </div>
 <!-- row ends -->

 <script type="text/javascript">
   var txt = document.querySelector('.abt-txt p');
   var img = document.querySelector('.abt-img');

   var btn = document.querySelector('.cc-btn');
   var count = 1;

   btn.addEventListener('click', () => {
     count++;
     // replace everything with the appropriate php?

     if (count == 1) {
       img.style.backgroundImage = `url(<?php bloginfo('stylesheet_directory');?>/img/1.jpg)`;
       txt.innerHTML = 'Clockwork Creative are very good at stories. We are experts in narrative visual storytelling — from feature-length documentary to 15-second snippets for social sharing. Our projects run like clockwork if clocks were known for working with intelligence, sensitivity, flexibility, and open communication.';
     }

     if (count == 2) {
       img.style.backgroundImage = `url(<?php bloginfo('stylesheet_directory');?>/img/2.jpg)`;
       txt.innerHTML = 'Having a multi-skilled creative director, experienced core crew, and access to specialist support makes us adaptable. Our network includes friends and colleagues who happen to be some of the industry’s best technicians and practitioners. We work and deliver to the size, schedule and ambition of our clients.';
     }

     if (count == 3) {
       img.style.backgroundImage = `url(<?php bloginfo('stylesheet_directory');?>/img/3.jpg)`;
       txt.innerHTML = 'We believe compromise and collaboration are important parts of a creative process. But we don’t compromise on quality. Whether local or global, boutique or big budget, stories crafted by Clockwork are striking in their visual and emotional detail. Before and during filming, our crew is known for working with people to get the best out of them. We listen to clients carefully and incorporate feedback to deliver quality.';
     }

     if (count == 4) {
       img.style.backgroundImage = `url(<?php bloginfo('stylesheet_directory');?>/img/4.jpg)`;
       txt.innerHTML = 'Clockwork is equipped with the latest tech to give your project the professional treatment it deserves — being able to deliver on all platforms from cinema to billboards, social media snippets or GIFs. We care about the impact of our work, and we like building visibility for brands and organisations who care about the impact of theirs.';
     }

     if (count == 5) {
       img.style.backgroundImage = `url(<?php bloginfo('stylesheet_directory');?>/img/5.jpg)`;
       txt.innerHTML = 'Depending on the goal and budget of your project, we can work with you through the entire production process, from developing a concept to delivering finished media. Sometimes our clients prefer to lead particular stages of a project, or work with existing partners — calling us in to focus on specific parts of production. We enjoy collaboration, and we’re happy to work in this way when required.';
       count = 0;
     }

   }, false);

 </script>

 <div class="row clients-section mt">

   <div class="content-padded">
     <h4 class="col-main">Our Clients</h4>
     <div class="cc-btn">
       <a href="<?php get_page_link(get_page_by_path('home'));?>#services">
       services
       <span class="material-icons-outlined">
       arrow_right_alt
       </span>
       </a>
     </div>

     <?php if ( function_exists( 'soliloquy' ) ) { soliloquy( '48' ); } ?>
   </div>

 </div>


 <?php get_footer(); ?>
