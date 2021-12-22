<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cannab
 */

get_header();
?>

  <div class="container">
    <div class="post" id="post-<?php the_ID(); ?>">

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

      <div class="posts">
        <p class="recent-posts-caption">Related posts</p>
        <div class="posts__list">
            <?php foreach ($posts_list as $item) :
                setup_postdata( $post );
                get_template_part('/template-parts/post-template', null, array(
                    'first' => false,
                    'post' => $item,
                ));
            endforeach; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>

  <style>
    /*body #content-sticky-panel {
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
    }*/


    /*@media(max-width: 1600px) {
      .post-single__img {
        margin-left: calc((100vw - 1330px) / -2);
      }

      .post__title-block,
      .post-single__content {
        max-width: 900px;
      }
    }*/

    /*@media (min-width: 1280px) and (max-width: 1500px) {
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
    }*/


    @media(max-width: 1400px) {
      .post-single__img {
        /*margin-left: calc((100vw - 1200px) / -2);*/
      }
    }

    @media(max-width: 1280px) {
      .post-single__img {
        /*margin-left: calc((100vw - 1080px) / -2);*/
      }
    }

    @media(max-width: 992px) {

      /*#content-sticky-panel ul, #content-sticky-panel ul li {
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
      }*/

    }
  </style>

<?php
get_footer();
