<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
		<script src="https://use.fontawesome.com/df1b5d1b28.js"></script>
		<title><?php bloginfo('name');?> | <?php the_title();?></title>
	</head>

  <!-- nav -->
	<div class="get-navbar-to-stay">
		<nav class="navbar navbar-expand-lg bg-col-light">

		<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="
			<?php
			$logo = get_theme_mod('custom_logo');
        if ($logo) {
           echo $logo;
        } else {
				  bloginfo('stylesheet_directory');?>/img/logo.png<?php
				}?>" alt="Clockwork Creative Logo" id="logo"></a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="movemenu">
				<?php $menu_args = ['theme_location' => 'primary', 'menu_class' => 'navbar-nav']; ?>
				<?php wp_nav_menu($menu_args); ?>
      </div>
		</div>

		<div class="mobile-nav">
			<span class="material-icons-outlined col-dark">
				menu
			</span>
		</div>
	</nav>
</div>
  <!-- ENDNAV  -->

	<div class="mobile-nav-open bg-col-dark col-light">
		<div class="vertical-menu">
			<?php $menu_args = ['theme_location' => 'primary', 'menu_class' => 'navbar-nav']; ?>
			<?php wp_nav_menu($menu_args); ?>
		</div>
	</div>

	<script>
		var menuItems = document.querySelector('#menu-main-menu').children;
		var mobileNav = document.querySelector('.mobile-nav');
		var openNav = document.querySelector('.mobile-nav-open');
		var wholeNav = document.querySelector('.get-navbar-to-stay');
		var isOpen = false;

		for (var i = 0; i < menuItems.length; i++) {
			menuItems[i].classList.add('nav-item');
			menuItems[i].children[0].classList.add('nav-link');
      menuItems[i].children[0].classList.add('col-dark');
		}

		mobileNav.addEventListener('click', () => {
			if (!isOpen) {
				openNav.style.marginLeft = '0';
				wholeNav.style.position = 'fixed';
				wholeNav.style.zIndex = '9999';
				wholeNav.style.width = '100vw';
				isOpen = true;
			} else if (isOpen) {
				openNav.style.marginLeft = '100vw';
				wholeNav.style.position = 'inherit';
				wholeNav.style.zIndex = '50';
				wholeNav.style.width = '100vw';
				isOpen = false;
			}
		}, false);

		window.addEventListener('click', (e) => {
			if (e.target.innerHTML == "Services") {
				console.log('HASHED');
				openNav.style.marginLeft = '100vw';
				wholeNav.style.position = 'inherit';
				wholeNav.style.zIndex = '50';
				wholeNav.style.width = '100vw';
				isOpen = false;
			}
		}, false);

	</script>

 	<!-- starting the body -->
  <body <?php body_class(); ?> class="bg-col-light">

  <?php wp_head();?>
  <!-- Links the styles -->
