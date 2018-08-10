<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package northarc_capital
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/images/favicon.ico" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/css/custom.css">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

 <header class="headerrow">
    <div class="container">
      <?php if(is_front_page()):?>
        <div class="navbar-headers homeheaders">
           <div id="logo"> <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/images/logo.png"/></a></div>
             <?php northarc_capital_header_menu(); ?>
        </div>
        <?php else:?>
          <div class="navbar-headers innersheader">
           <div id="logo"> <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/images/inner-logo.png"/></a></div>
             <?php northarc_capital_header_menu(); ?>
        </div>
    <?php endif;?>

     </div>  
  </header> 
  </header>


     <div id="content" class="site-content">
        <div class="main-content-area">