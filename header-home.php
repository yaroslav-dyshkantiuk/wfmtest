
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

      <?php if(has_custom_logo()): ?>
        <?php the_custom_logo(); ?>
      <?php else: ?>
        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">Navbar</a>
      <?php endif; ?>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php 
        wp_nav_menu(array(
          'theme_location' => 'header_menu',
          'container' => false,
          'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
          'walker'=> new Wfmtest_Menu(),
        )); 
        ?>
        <?php get_search_form(); ?>
      </div>
    </div>
  </nav>
</header>

<?php
$img_header = has_custom_header() ? get_header_image() : get_custom_header()->url;
$color = (get_header_textcolor() == 'blank') ? 'transparent' : '#' . get_header_textcolor();
?>

<section class="header" style="background: url(<?php echo $img_header; ?>) center no-repeat; background-size: cover; color: <?php echo $color; ?>">
<?php if(get_header_textcolor() != 'blank'): ?>
  <h1><?php bloginfo('name'); ?></h1>
  <?php if(get_theme_mod('wfmtest_display_description')): ?>
    <h2><?php bloginfo('description'); ?></h2>
  <?php endif; ?>
<?php endif; ?>
</section>