<?php
/*

Template Name: Team

*/
 ?>

 <?php get_header(); ?>

 <div class="row">
   <div class="mt ml">
     <h4 class="col-main">Our Team</h4>
   </div>
 </div>

 <?php
 query_posts(
   array(
     'post_type' => 'team'
   )
 );
 ?>

 <?php
 if ( have_posts() ) : $postcount = 0;
   while (have_posts() ) : the_post();
   $postcount++;
   ?>

 <div class="row team-member-container" id="mem<?php echo $postcount; ?>">
   <div class="col-12">
     <div class="content-padded">
       <div class="row">

         <div class="col-md-4 col-sm-12 ">
           <div class="team-img-container">
            <?php the_post_thumbnail('medium_large', ['class' => 'team-img']); ?>
           </div>
         </div>

         <div class="col-md-4 col-sm-12 member-info">
           <div class="info-1">
             <h1 class="col-main"><?php the_title(); ?></h1>
             <h5 class="col-grey pt-sm"><?php $position = get_post_meta(get_the_ID(), 'position_input', true);
             if ($position) {
               echo $position;
             } ?></h5>
             <div class="cc-btn mt-sm col-grey team-more">
               more
               <span class="material-icons-outlined team-more">
               arrow_right_alt
               </span>
             </div>
           </div>

           <div class="info-2">
             <h4 class="col-main"><?php the_title(); ?> • <?php $position = get_post_meta(get_the_ID(), 'position_input', true);
             if ($position) {
               echo $position;
             } ?></h4>
             <p class="col-dark team-mem-info"><?php the_content();?></p>
             <div class="cc-btn mt-sm col-grey team-back">
               back
               <span class="material-icons-outlined team-back">
               arrow_right_alt
               </span>
             </div>
           </div>
           <!-- info 2 -->

         </div>

       </div>
       <!-- row -->
     </div>
     <!-- content padded -->
   </div>
   <!-- col-12 -->
 </div>
 <!-- row ends -->

<?php endwhile;
  else : echo '<p> No team members have been posted. </p>';
  endif ?>

  <div class="mt">

  </div>

  <script type="text/javascript">

    var mediaQuery = window.matchMedia('(max-width: 600px)');
    var mediaTablet = window.matchMedia('(max-width: 950px)');
    var member = document.querySelectorAll('.team-member-container');

    if (mediaQuery.matches) {
      for (var i = 0; i < member.length; i++) {
        member[i].style.height = '90vh';
      }
    }

    if (mediaTablet.matches) {
      for (var i = 0; i < member.length; i++) {
        member[i].style.height = '80vh';
        console.log('LITTLE IT');
      }
    }

    window.addEventListener('click', (e) => {

      if (e.target.classList.contains('team-more')) {
        if (mediaQuery.matches) {
          e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.height = '170vh';
        } else if (mediaTablet.matches) {
          e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.height = '130vh';
        } else {
          e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.height = '65vh';
        }

        e.target.parentNode.parentNode.children[0].style.display = 'none';

        e.target.parentNode.parentNode.children[1].style.display = 'block';

        e.target.parentNode.parentNode.children[1].style.animation = 'fade_in_show 1s';
      }

      if (e.target.classList.contains('team-back')) {
        if (mediaQuery.matches) {
          e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.height = '90vh';
        } else if (mediaTablet.matches) {
          e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.height = '80vh';
        } else {
          e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.height = '45vh';
        }

        e.target.parentNode.parentNode.children[1].style.display = 'none';

        e.target.parentNode.parentNode.children[0].style.display = 'block';

        e.target.parentNode.parentNode.children[0].style.animation = 'fade_in_show 1s';
      }

    }, false);

  </script>

 <?php get_footer(); ?>
