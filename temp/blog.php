<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php
    /* Template Name: Blog*/
?>
<?php 
    global $post;
    $postID = $post->ID;
    $header_disable = $footer_disable = $content_type = $page_class = $content_class = $enable_preloader = ''; 

    if(!$header_disable) $header_disable = get_post_meta($postID, "_header_disable", true);
    if(!$footer_disable) $footer_disable = get_post_meta($postID, "_footer_disable", true);
    if(!$content_type) $content_type = get_post_meta($postID, "content_type", true);
    if(!$enable_preloader) $enable_preloader =  get_post_meta($postID, "_enable_preloader", true);    

    if ($content_type =='full_width') {
        $page_class = ' full_width';
    }elseif($content_type =='full_post_area'){
        $page_class = ' visual_page_builder full_width';
    }
    elseif($content_type =='full_gutenberg'){
        $page_class = ' fullgutenberg full_width';
    }
    $title_disable =  get_post_meta($postID, "_title_disable", true);
    $comment_enable = get_post_meta($postID, "_enable_comments", true); 
    $content_class = ($content_type == 'full_post_area') ? 'rh-fullbrowser' : 'rh-post-wrapper';
    if($content_type == 'full_gutenberg'){
        $content_class = '';
    }
?>
<?php if ($header_disable =='1') :?>
    <!DOCTYPE html>
    <!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
    <!--[if (gt IE 9)|!(IE)] <?php language_attributes(); ?>><![endif]-->
    <html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <!-- feeds & pingback -->
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />    
    <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <?php if(function_exists('wp_body_open')){wp_body_open();}?>
    <div class="rh-outer-wrap">
    <div id="top_ankor"></div>
    <?php $branded_bg_url = rehub_option('rehub_branded_bg_url');?>
    <?php if ($branded_bg_url ) :?>
      <a id="branded_bg" href="<?php echo esc_url($branded_bg_url); ?>" target="_blank" rel="sponsored"></a>
    <?php endif; ?>
    <?php include(rh_locate_template('inc/parts/branded_banner.php')); ?>   
    <!-- HEADER --> 
<?php elseif($header_disable =='2') :?>
    <?php get_header(); ?> 
    <?php $addstyles = '#main_header{position: absolute;}  
    #main_header, .main-nav{background:none transparent !important;}  
    nav.top_menu > ul > li > a, .logo_section_wrap .user-ava-intop:after, .dl-menuwrapper button i, .dl-menuwrapper .re-compare-icon-toggle, nav.top_menu > ul > li > a{color: #fff !important} 
    .dl-menuwrapper button svg line{stroke:#fff !important}
    .responsive_nav_wrap{background:transparent !important}';
    if (rehub_option('rehub_header_color_background') ==''){
        $addstyles .= '.is-sticky .logo_section_wrap{background: #000 !important}';
    }
    echo '<style>'.$addstyles.'</style>';
    ?>    
<?php else :?>
    <?php get_header(); ?>
<?php endif ;?>
<?php if($enable_preloader):?>
    <!-- PRELOADER -->
    <div id="rhLoader">
        <style scoped>
            #loading-spinner {
              animation: loading-spinner 1s linear infinite;
            }

            @keyframes loading-spinner {
              from {
                transform: rotate(0deg);
              }
              to {
                transform: rotate(360deg);
              }
            }  
        </style>  
        <?php 
            if (rehub_option('rehub_custom_color')) {
                $maincolor = rehub_option('rehub_custom_color');
            } 
            else {
                $maincolor = REHUB_MAIN_COLOR;
            }
        ?>                
        <div class="preloader-cell">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" id="loading-spinner">
                <circle cx="50" cy="50" r="15" stroke-width="4" stroke="<?php echo esc_attr($maincolor);?>" stroke-dasharray="23.561944901923447 23.561944901923447" fill="none" stroke-linecap="round">
                  
                </circle>
                </svg>                
            </div>
        </div>
    </div>
    <!-- /end PRELOADER --> 
<?php endif;?>

<!-- CONTENT -->
<div class="rh-container <?php echo ''.$content_type ?>"> 
    <div class="rh-content-wrap clearfix <?php if($content_type =='full_gutenberg'){echo 'pt0';}?>">
        <!-- Main Side -->
        <div class="main-side page clearfix<?php echo ''.$page_class ?>" id="content">

                <?php

                $first_post = get_posts([
                    'posts_per_page' => -1,
                    'offset' => 1,
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ])[0];


                $posts_list = get_posts([
                    'posts_per_page' => 1000,
                    'offset' => 1,
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ]);
                ?>
              <div class="posts">
                  <?php
                  get_template_part('/post-template', null, array(
                      'first' => true,
                      'post' => $first_post,
                  ));
                  ?>

                <p class="recent-posts-caption">Recent posts</p>
                <div class="posts__list">
                    <?php foreach ($posts_list as $item) :
                        setup_postdata( $post );
                        get_template_part('/post-template', null, array(
                            'first' => false,
                            'post' => $item,
                        ));
                    endforeach; wp_reset_postdata(); ?>
                </div>
              </div>
            </div>         
        </div>
    </div>
</div>

  <style>
    .recent-posts-caption {
      margin-bottom: 32px;
      font-size: 24px;
      line-height: 28px;
    }

    .posts {
      margin-top: 20px;
      width: 100%;
    }

    .read-more {
      margin-top: 24px;
      color: #05B9FF;
      font-weight: 500;
      font-size: 14px;
      line-height: 24px;
      display: block;
      text-transform: uppercase;
    }

    .read-more:hover {
      color: #05B9FF;
    }

    .posts__list {
      width: 100%;
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .post-item {
      margin-bottom: 20px;
      position: relative;
      padding: 16px;
      background-color: #fff;
      width: 32%;
      border-radius: 4px;
      transition: all ease .3s;
    }

    .post-item:hover {
      box-shadow: 0px 12px 32px rgba(0, 0, 0, 0.04);
    }

    .post-item.first {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 64px;
      width: 100%;
      border-radius: 0;
      padding: 0;
    }

    .post-item.first:hover {
      box-shadow: unset;
    }

    .post-item.first .post__img {
      flex: 0 0 730px;
      height: 458px;
      margin-right: 20px;
    }

    .post-item.first .post__title {
      font-size: 28px;
      line-height: 44px;
      margin-bottom: 24px;
    }

    .post-item.first .post_excerpt {
      font-size: 22px;
      line-height: 32px;
    }

    .post__img {
      overflow: hidden;
      width: 100%;
      height: 270px;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .post__img img {
      display: block;
      max-width: 100%;
      height: auto;
      transition: all ease .3s;
      transform: scale(1);
    }

    .post__img:hover img {
      transform: scale(1.1);
    }

    .post__title {
      display: block;
      margin-bottom: 16px;
      color: #000;
      font-size: 22px;
      line-height: 32px;
      text-decoration: none;
    }

    .post__main-link {
      position: absolute;
      display: block;
      left: 0;
      top: 0;
      bottom: 0;
      right: 0;
      z-index: 10;
    }

    .post_excerpt {
      color: #9B9B9B;
      font-size: 16px;
      line-height: 24px;
      margin-bottom: 5px!important;
    }

    @media(max-width: 1400px) {
      .post-item.first .post__img {
        flex: 0 0 45%;
        align-items: flex-start;
        height: auto;
      }
    }

    @media(max-width: 1200px) {
      .post__img {
        height: 160px;
      }

      .post-item.first .post_excerpt {
        font-size: 20px;
      }
    }

    @media(max-width: 900px) {
      .title {
        display: none;
      }

      .posts {
        margin-top: 0;
      }

      .read-more {
        margin-top: 16px;
      }

      .post-item.first {
        display: block;
        margin-bottom: 32px;
      }

      .recent-posts-caption {
        font-size: 18px;
        line-height: 24px;
        margin-bottom: 16px;
      }

      .post-item {
        padding: 8px;
      }

      .post__img {
        height: 200px;
        margin-bottom: 16px;
      }

      .post-item.first .post__img {
        margin-bottom: 24px;
        margin-right: 0;
        display: block;
      }

      .post-item.first .post__title,
      .post__title {
        font-size: 18px;
        line-height: 24px;
      }

      .post-item.first .post__title {
        margin-bottom: 16px;
      }

      .post__title {
        margin-bottom: 8px;
      }

      .post-item.first .post_excerpt,
      .post_excerpt {
        font-size: 14px;
        line-height: 20px;
      }
    }

    @media(max-width: 767px) {
      .post-item {
        width: 100%;
        margin-bottom: 16px;
      }

      .post-item.first .post__img {
        width: 100vw;
        height: 250px;
        margin-left: -15px;
      }
    }
  </style>

<!-- /CONTENT -->     
<style type="text/css">.vc_row.vc_rehub_container > .vc_col-sm-8, .main-side:not(.full_width), .main_slider.flexslider {
    width: 100%;
}</style>
<!-- FOOTER -->
<?php if ($footer_disable =='1') :?>
</div>
<span class="rehub_scroll" id="topcontrol" data-scrollto="#top_ankor"><i class="rhicon rhi-chevron-up"></i></span>
<?php wp_footer(); ?>
</body>
</html>
<?php else :?>
<?php get_footer(); ?>
<?php endif ;?>