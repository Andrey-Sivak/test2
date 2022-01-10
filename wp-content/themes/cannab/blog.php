<?php
/**
 * Template Name: Blog
 */
get_header();
?>
        <!-- Main Side -->
<div class="container">

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

    $add = [
            'add' => get_field('add', 'option'),
    ];

    array_splice($posts_list, rand(1, count($posts_list)), 0, $add);
    ?>
  <div class="posts">
      <?php
      get_template_part('/template-parts/post-template', null, array(
          'first' => true,
          'post' => $first_post,
      ));
      ?>

    <p class="recent-posts-caption">Recent posts</p>
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

<?php get_footer(); ?>
