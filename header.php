<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="ja"><![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="ja"><![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="ja"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('description') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <?php if(is_single()):?>

  <meta property="fb:admins" content="100004406949904" />
  <meta property="og:title" content="<?php the_title(); ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php the_permalink() ?>" />
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
  <meta property="og:locale" content="ja_JP" />
  <?php if (has_post_thumbnail()) : ?>
<meta property="og:image" content="<?php echo get_thumbnail_image_url(); ?>" />
  <?php else: ?>
<meta property="og:image" content="<?php echo bloginfo('template_url'); ?>/img/apple-touch-icon.png" />
  <?php endif; ?>
<meta property="og:description" content="<?php echo get_ogp_excerpted_content($post->post_content); ?>" />
  <?php endif; ?>

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css" />
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/css3-mediaqueries.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42655851-2', 'mochi-flappe.com');
    ga('send', 'pageview');
  </script>
</head>
<body itemscope itemtype="http://schema.org/Blog">

<div class="container">

  <header class="site_header">
    <div>
      <h1 class="site_title">
        <a href="<?php echo home_url('/'); ?>" itemprop="name"><?php bloginfo('name'); ?></a>
      </h1>
      <h2 class="site_description" itemprop="description"><?php bloginfo('description'); ?></h2>
    </div>
  </header>

