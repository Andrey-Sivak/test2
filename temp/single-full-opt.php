<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!-- Title area -->
<?php wp_enqueue_script('rhreadingprogress' ); wp_enqueue_script('rhalignfull');wp_enqueue_script('rhyall');?>

<!-- CONTENT -->
<div class="rh-container">
    <div class="rh-content-wrap pt0 clearfix">
        <!-- Main Side -->
        <div class="main-side single post-readopt alignfulloutside clearfix full_width">
            <div <?php post_class('post pt0 pb0 pr0 pl0 post-single'); ?> id="post-<?php the_ID(); ?>">

              <div class="post__header">
                <figure class="post-single__img">
                    <?= get_the_post_thumbnail($post->ID, 'full'); ?>
                </figure>

                <div class="post__title-block">
                  <h1 class="post__caption"><?= the_title(); ?></h1>
                  <div class="post__title-block_breadcrumbs">
                    <a href="<?= get_home_url(); ?>" class="post__title-block_breadcrumb">Home</a>
                    <a href="<?= esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" class="post__title-block_breadcrumb">Blog</a>
                    <p class="post__title-block_breadcrumb"><?php the_title(); ?></p>
                  </div>
                </div>
              </div>

              <div class="post-single__wrap">
                  <?php $disableads = get_post_meta($post->ID, 'show_banner_ads', true);?>
                  <?php if(rehub_option('rehub_single_before_post') && $disableads != '1') : ?><div class="mediad mediad_before_content mb15"><?php echo do_shortcode(rehub_option('rehub_single_before_post')); ?></div><?php endif; ?>
                  <?php $contentsticky = wpsm_contents_shortcode(array('headers'=>'h2')); echo wpsm_stickypanel_shortcode('', $contentsticky); ?>
                <div class="post-single__content">
                    <?php the_content(); ?>
                </div>
              </div>

            </div>

          <div class="post__related-posts">
            <?php
            $posts_list = get_posts([
                'posts_per_page' => 3,
                'orderby' => 'rand',
                'order' => 'DESC'
            ]); ?>

            <p class="recent-posts-caption">Related posts</p>
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
        <!-- /Main Side -->
    </div>
</div>
<!-- /CONTENT -->

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

  @media(max-width: 1200px) {
    .post__img {
      height: 160px;
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

    .post__title {
      margin-bottom: 8px;
    }
  }

  @media(max-width: 767px) {
    .post-item {
      width: 100%;
      margin-bottom: 16px;
    }
  }
</style>

<style>
  body {
    overflow-x: hidden;
  }

  .post__title-block_breadcrumbs {
    display: flex;
  }

  .post__title-block_breadcrumb {
    text-transform: uppercase;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
  }

  body p.post__title-block_breadcrumb {
    color: #9B9B9B;
    margin-bottom: 0;
  }

  .post__title-block_breadcrumb:not(:last-child) {
    color: #05B9FF;
    margin-right: 24px;
  }

  .post__header {
    position: relative;
  }

  .post__caption {
    font-weight: normal;
    font-size: 40px;
    line-height: 56px;
    color: #000;
    max-width: 1100px;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    margin-bottom: 27px;
  }

  .post__title-block {
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #fff;
    padding: 48px 48px 42px;
    max-width: 1100px;
    width: 100%;
  }

  .post-single__img {
    position: relative;
    z-index: 0;
    margin-bottom: 16px;
    height: 500px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 103vw;
    margin-left: calc((100vw - 1530px) / -2);
  }

  .post-single__img img {
    display: block;
    max-width: 100%;
    width: 100%;
    height: auto;
  }

  .post-single__content {
    max-width: 1100px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 48px;
    padding-right: 48px;
    margin-top: -33px;
    width: 100%;
  }

  body #content-sticky-panel {
    width: 185px;
    margin: 0;
    padding-top: 33px;
    top: unset;
  }

  body #content-sticky-panel:before {
    position: absolute;
    content: 'Contents';
    left: 0;
    bottom: 100%;
    top: 0;
    text-transform: uppercase;
    font-size: 20px;
    line-height: 23px;
    color: #000;
  }

  body #content-sticky-panel a {
    font-size: 16px;
    line-height: 24px;
    padding-left: 0;
    font-weight: normal;
    padding-top: 6px;
    padding-bottom: 6px;
    color: #9B9B9B;
    transition: all ease .3s;
    border-bottom: unset;
  }

  body #content-sticky-panel a. {
    color: #000;
  }

  body #content-sticky-panel a:hover {
    color: #000;
  }

  body #content-sticky-panel ul {
    border: none;
    border-bottom: 1px solid #ddd;
  }

  .post p {
    color: #000;
  }

  .post-single  {

  }

  @media(max-width: 1600px) {
    .post-single__img {
      margin-left: calc((100vw - 1330px) / -2);
    }

    .post__title-block,
    .post-single__content {
      max-width: 900px;
    }
  }

  @media (min-width: 1280px) and (max-width: 1500px) {
    body #content-sticky-panel {
      position: sticky;
      height: 0;
    }

    body #content-sticky-panel ul {
      overflow-y: auto;
    }

    body #mobileactivate {
      display: none;
    }
  }

  @media (min-width: 1280px) and (max-width: 1400px) {
    .rh-container, .content {
      width: 95vw;
    }
  }

  @media(max-width: 1400px) {
    .post-single__img {
      margin-left: calc((100vw - 1200px) / -2);
    }
  }

  @media(max-width: 1280px) {
    .post-single__img {
      margin-left: calc((100vw - 1080px) / -2);
      height: auto;
    }

    .post-single__content {
      margin-top: 0;
    }
  }

  @media(max-width: 992px) {
    .post-single__img {
      margin-left: -15px;
    }

    #content-sticky-panel ul, #content-sticky-panel ul li {
      padding-left: 7px;
    }

    body #content-sticky-panel a {
      font-size: 14px;
    }

    body #content-sticky-panel:before {
      text-indent: 12px;
    }

    body #content-sticky-panel:after {
      position: absolute;
      content: '';
      z-index: 1;
      background-color: #fff;
      left: 0;
      right: 0;
      top: -9px;
      height: 10px;
    }

    .post-single__content {
      padding-left: 0;
      padding-right: 0;
    }

    body .post__title-block_breadcrumbs {
      margin-bottom: 12px;
    }

    body p.post__title-block_breadcrumb {
      font-size: 12px;
      line-height: 16px;
      margin-bottom: 12px;
    }
  }

  @media(max-width: 767px) {
    .post-single__img {
      height: 250px;
      margin-bottom: 24px;
    }

    .post__title-block {
      position: static;
      transform: unset;
      padding: 0;
    }

    .post__caption {
      font-size: 18px;
      line-height: 24px;
      margin-bottom: 16px;
    }

    .post__title-block_breadcrumbs {
      flex-wrap: wrap;
    }

    .post__title-block_breadcrumb {
      font-size: 12px;
      line-height: 16px;
    }

    .post p {
      font-size: 14px;
      line-height: 24px;
    }
  }
</style>