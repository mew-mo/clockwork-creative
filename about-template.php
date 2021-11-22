<?php
/*

Template Name: About Us

*/
 ?>

 <?php get_header(); ?>

 <div class="row">

   <div class="col-md-6 col-sm-12 abt-img-container">
     <div class="abt-img">
     </div>
   </div>

   <div class="col-md-6 col-sm-12">
     <div class="content-padded">
       <div class="abt-txt-container">
         <h4 class="col-main"><?php echo get_theme_mod('abt_title');?></h4>
         <div class="abt-txt col-dark mt">
           <p>Clockwork Creative are very good at stories. We are experts in narrative visual storytelling — from feature-length documentary to 15-second snippets for social sharing. Our projects run like clockwork if clocks were known for working with intelligence, sensitivity, flexibility, and open communication.</p>
         </div>

         <div class="cc-btn mt col-grey">
           Read More
           <span class="material-icons-outlined">
           arrow_right_alt
           </span>
         </div>

       </div>
       <!-- abt-txt -->
     </div>
     <!-- content-padded -->
   </div>
   <!-- col -->
 </div>
 <!-- row ends -->

 <script type="text/javascript">
   var txt = document.querySelector('.abt-txt p');
   var img = document.querySelector('.abt-img');

   var btn = document.querySelector('.cc-btn');
   var count = 1;

   <?php
    $img1 = get_theme_mod('slide1_img');
    $txt1 = get_theme_mod('slide1_content');

    $img2 = get_theme_mod('slide2_img');
    $txt2 = get_theme_mod('slide2_content');

    $img3 = get_theme_mod('slide3_img');
    $txt3 = get_theme_mod('slide3_content');

    $img4 = get_theme_mod('slide4_img');
    $txt4 = get_theme_mod('slide4_content');

    $img5 = get_theme_mod('slide5_img');
    $txt5 = get_theme_mod('slide5_content');
   ?>

   <?php
   if ($img1) {
     ?>img.style.backgroundImage = 'url(<?php echo $img1;?>)';
    <?php
    } else {
      ?>img.style.backgroundImage = 'url(<?php bloginfo('stylesheet_directory');?>/img/1.jpg)';
    <?php
    }?>
    <?php
    if ($txt1) {
      ?>txt.innerHTML = '<?php echo $txt1;?>';
     <?php
     } else {
       ?>txt.innerHTML = 'Clockwork Creative are very good at stories. We are experts in narrative visual storytelling — from feature-length documentary to 15-second snippets for social sharing. Our projects run like clockwork if clocks were known for working with intelligence, sensitivity, flexibility, and open communication.';
     <?php
    }?>

   btn.addEventListener('click', () => {
     count++;
     if (count == 1) {
       <?php
       if ($img1) {
         ?>img.style.backgroundImage = 'url(<?php echo $img1;?>)';
        <?php
        } else {
          ?>img.style.backgroundImage = 'url(<?php bloginfo('stylesheet_directory');?>/img/1.jpg)';
        <?php
        }?>

        <?php
        if ($txt1) {
          ?>txt.innerHTML = '<?php echo $txt1;?>';
         <?php
         } else {
           ?>txt.innerHTML = 'Clockwork Creative are very good at stories. We are experts in narrative visual storytelling — from feature-length documentary to 15-second snippets for social sharing. Our projects run like clockwork if clocks were known for working with intelligence, sensitivity, flexibility, and open communication.';
         <?php
        }?>
      }

     if (count == 2) {
       <?php
       if ($img2) {
         ?>img.style.backgroundImage = 'url(<?php echo $img2;?>)';
        <?php
        } else {
          ?>img.style.backgroundImage = 'url(<?php bloginfo('stylesheet_directory');?>/img/2.jpg)';
        <?php
        }?>

        <?php
        if ($txt2) {
          ?>txt.innerHTML = '<?php echo $txt2;?>';
         <?php
         } else {
           ?>txt.innerHTML = 'Having a multi-skilled creative director, experienced core crew, and access to specialist support makes us adaptable. Our network includes friends and colleagues who happen to be some of the industry’s best technicians and practitioners. We work and deliver to the size, schedule and ambition of our clients.';
         <?php
        }?>
      }

     if (count == 3) {
       <?php
       if ($img3) {
         ?>img.style.backgroundImage = 'url(<?php echo $img3;?>)';
        <?php
        } else {
          ?>img.style.backgroundImage = 'url(<?php bloginfo('stylesheet_directory');?>/img/3.jpg)';
        <?php
        }?>

        <?php
        if ($txt3) {
          ?>txt.innerHTML = '<?php echo $txt3;?>';
         <?php
         } else {
           ?>txt.innerHTML = 'We believe compromise and collaboration are important parts of a creative process. But we don’t compromise on quality. Whether local or global, boutique or big budget, stories crafted by Clockwork are striking in their visual and emotional detail. Before and during filming, our crew is known for working with people to get the best out of them. We listen to clients carefully and incorporate feedback to deliver quality.';
         <?php
        }?>
      }

     if (count == 4) {
       <?php
       if ($img4) {
         ?>img.style.backgroundImage = 'url(<?php echo $img4;?>)';
        <?php
        } else {
          ?>img.style.backgroundImage = 'url(<?php bloginfo('stylesheet_directory');?>/img/4.jpg)';
        <?php
        }?>

        <?php
        if ($txt4) {
          ?>txt.innerHTML = '<?php echo $txt4;?>';
         <?php
         } else {
           ?>txt.innerHTML = 'Clockwork is equipped with the latest tech to give your project the professional treatment it deserves — being able to deliver on all platforms from cinema to billboards, social media snippets or GIFs. We care about the impact of our work, and we like building visibility for brands and organisations who care about the impact of theirs.';
         <?php
        }?>
      }

     if (count == 5) {
       <?php
       if ($img5) {
         ?>img.style.backgroundImage = 'url(<?php echo $img5;?>)';
        <?php
        } else {
          ?>img.style.backgroundImage = 'url(<?php bloginfo('stylesheet_directory');?>/img/5.jpg)';
        <?php
        }?>

        <?php
        if ($txt5) {
          ?>txt.innerHTML = '<?php echo $txt5;?>';
         <?php
         } else {
           ?>txt.innerHTML = 'Depending on the goal and budget of your project, we can work with you through the entire production process, from developing a concept to delivering finished media. Sometimes our clients prefer to lead particular stages of a project, or work with existing partners — calling us in to focus on specific parts of production. We enjoy collaboration, and we’re happy to work in this way when required.';
         <?php
        }?>
        count = 0;
      }
   }, false);

 </script>

 <div class="row clients-section mt">

   <div class="content-padded">
     <h4 class="col-main">Our Clients</h4>
     <a href="<?php echo home_url();?>#services" class="col-grey">
       <div class="cc-btn">
         services
         <span class="material-icons-outlined">
         arrow_right_alt
         </span>
       </div>
     </a>

     <div class="col-12 content-padded">
       <?php echo do_shortcode('[logo-slider]'); ?>
     </div>
   </div>

 </div>


 <?php get_footer(); ?>
