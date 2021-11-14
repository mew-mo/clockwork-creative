<?php
/*

Template Name: Our Work

*/
 ?>

 <?php get_header(); ?>

   <?php
   query_posts(
     array(
       'post_type' => 'work'
     )
   );
   ?>


 <?php get_footer(); ?>
