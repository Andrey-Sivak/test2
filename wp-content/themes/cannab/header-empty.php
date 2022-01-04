<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cannab
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <script>
    let homeUrl = '<?= get_home_url(); ?>';
  </script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="preload" href="<?= get_template_directory_uri() . '/dist/fonts/rhicons.woff2?3oibrk'; ?>" as="font" type="font/woff2" crossorigin="crossorigin">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="loader active">
  <div class="loadingio-spinner-spinner-rl7w6qbl47d"><div class="ldio-4khtpk1mo8v">
      <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
    </div></div>
  <style type="text/css">
    @keyframes ldio-4khtpk1mo8v {
      0% { opacity: 1 }
      100% { opacity: 0 }
    }
    .ldio-4khtpk1mo8v div {
      left: 98.735px;
      top: 42.315px;
      position: absolute;
      animation: ldio-4khtpk1mo8v linear 2.127659574468085s infinite;
      background: #265D93;
      width: 19.53px;
      height: 19.53px;
      border-radius: 9.765px / 9.765px;
      transform-origin: 9.765px 66.185px;
    }.ldio-4khtpk1mo8v div:nth-child(1) {
       transform: rotate(0deg);
       animation-delay: -1.9342359767891684s;
       background: #265D93;
     }.ldio-4khtpk1mo8v div:nth-child(2) {
        transform: rotate(32.72727272727273deg);
        animation-delay: -1.7408123791102514s;
        background: #265D93;
      }.ldio-4khtpk1mo8v div:nth-child(3) {
         transform: rotate(65.45454545454545deg);
         animation-delay: -1.5473887814313347s;
         background: #265D93;
       }.ldio-4khtpk1mo8v div:nth-child(4) {
          transform: rotate(98.18181818181819deg);
          animation-delay: -1.3539651837524178s;
          background: #265D93;
        }.ldio-4khtpk1mo8v div:nth-child(5) {
           transform: rotate(130.9090909090909deg);
           animation-delay: -1.1605415860735009s;
           background: #265D93;
         }.ldio-4khtpk1mo8v div:nth-child(6) {
            transform: rotate(163.63636363636363deg);
            animation-delay: -0.9671179883945842s;
            background: #265D93;
          }.ldio-4khtpk1mo8v div:nth-child(7) {
             transform: rotate(196.36363636363637deg);
             animation-delay: -0.7736943907156674s;
             background: #265D93;
           }.ldio-4khtpk1mo8v div:nth-child(8) {
              transform: rotate(229.0909090909091deg);
              animation-delay: -0.5802707930367504s;
              background: #265D93;
            }.ldio-4khtpk1mo8v div:nth-child(9) {
               transform: rotate(261.8181818181818deg);
               animation-delay: -0.3868471953578337s;
               background: #265D93;
             }.ldio-4khtpk1mo8v div:nth-child(10) {
                transform: rotate(294.54545454545456deg);
                animation-delay: -0.19342359767891684s;
                background: #265D93;
              }.ldio-4khtpk1mo8v div:nth-child(11) {
                 transform: rotate(327.27272727272725deg);
                 animation-delay: 0s;
                 background: #265D93;
               }
    .loadingio-spinner-spinner-rl7w6qbl47d {
      width: 217px;
      height: 217px;
      display: block;
      overflow: hidden;
      margin: 0 auto;
    }
    .ldio-4khtpk1mo8v {
      width: 100%;
      height: 100%;
      position: relative;
      transform: translateZ(0) scale(1);
      backface-visibility: hidden;
      transform-origin: 0 0; /* see note above */
    }
    .ldio-4khtpk1mo8v div { box-sizing: content-box; }
  </style>
</div>

<header class="header empty">
    <a href="<?= get_home_url(); ?>" class="header__logo">
        <img src="<?= get_field('logo', 'option')['url']; ?>"
             alt="img">
    </a>
</header>