<?php

$post_data = $args;

$post_item = $args['post'];
$is_first = $args['first'];
$post_ID = $post_item->ID;
$excerpt_symbols = $is_first ? 80 : 30;
$trim_post_content = wp_trim_words( $post_item->post_content, $excerpt_symbols, '...' );
$recent_modified = strtotime($post_item->post_date);
$recent_modified_value = date( 'F j, Y', $recent_modified );
?>

<div href="<?= get_permalink($post_ID); ?>" class="post-item<?= $is_first ? ' first' : ''; ?>">
    <?php if (!$is_first) : ?>
    <a href="<?= get_permalink($post_ID); ?>" class="post__main-link"></a>
    <?php endif; ?>
    <figure class="post__img">
        <?=
        $is_first ? get_the_post_thumbnail($post_item->ID, 'full') :
            get_the_post_thumbnail($post_item->ID, 'medium'); ?>
    </figure>
    <div class="post__content">
        <a class="post__title" href="<?= get_permalink($post_ID); ?>"><?= $post_item->post_title; ?></a>
        <p class="post_excerpt"><?= $trim_post_content; ?></p>
        <?php if ($is_first) : ?>
        <a href="<?= get_permalink($post_ID); ?>" class="read-more">READ ALL ARTICLE</a>
        <?php endif; ?>
    </div>
</div>
