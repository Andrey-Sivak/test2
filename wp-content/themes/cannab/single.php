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
<div class="wrapper">

  <div class="container">
    <div class="post" id="post-<?php the_ID(); ?>">

      <div class="post__header">
        <div class="post-single__img">
            <div class="post-single__img_img" 
                 style="background-image: url('<?= get_the_post_thumbnail_url($post->ID, 'full'); ?>');"></div>
        </div>

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
        <div class="cannab-product__desc_tabs-wrap"></div>
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
</div>
<?php
get_footer();
