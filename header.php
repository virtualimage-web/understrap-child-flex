<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$GLOBALS['phone1'] = "<span>xxx-xxx-xxxx</span>";

if ( isMobileDevice() ) {
  $GLOBALS['phone1'] = "<a href='tel:xxxxxxxxxx'>xxx-xxx-xxxx</a>";
}
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Prefetch Resources -->
	<link rel="dns-prefetch" href="//www.google-analytics.com">
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="dns-prefetch" href="//apis.google.com">
	<link rel="dns-prefetch" href="//maps.gstatic.com">
	
	<link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Dancing+Script:wght@400;500;600;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500&display=swap" rel="stylesheet">


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.typekit.net/ncv5bkv.css">
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<div class="site" id="page">
  <?php get_template_part( 'global-templates/navbar' ); ?>