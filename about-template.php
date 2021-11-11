<?php
/*

Template Name: About Us

*/
 ?>

 <?php get_header(); ?>

 <div class="row">

   <div class="col-md-6 col-sm-12 abt-img">

     <!-- Imagez x5, user should be allowed to change them i guess lol :) -->
     <!-- different backgroun img ech time, lets put some script in for that ! like  -->
   </div>

   <div class="col-md-6 col-sm-12">
     <div class="content-padded">

       <div class="abt-txt abt-txt-1">
         <p>Clockwork Creative are very good at stories. We are experts in narrative visual storytelling — from feature-length documentary to 15-second snippets for social sharing. Our projects run like clockwork if clocks were known for working with intelligence, sensitivity, flexibility, and open communication.</p>
       </div>

       <!-- <div class="abt-txt abt-txt-2">
         <p></p>
       </div>

       <div class="abt-txt abt-txt-3">
         <p></p>
       </div>

       <div class="abt-txt abt-txt-4">
         <p></p>
       </div>

       <div class="abt-txt abt-txt-5">
         <p></p>
       </div> -->

       <!-- words x5. can use like, z-index and some opacity funnies,, script it ig -->

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
   var txt = document.querySelectorAll('.abt-txt');
   var btn = document.querySelector('.cc-btn');
   var count = 1;

   btn.addEventListener('click', () => {
     count++;
     console.log(count);

     if (count > 5) {
       count = 1;
     }

     // if (count = 1) {
     //   // show txt 0
     //   // set bg image to 1.jpg OR whatever the user sets it to
     // }
   }, false);

 </script>

 <div class="row clients-section">

 </div>


 <?php get_footer(); ?>
