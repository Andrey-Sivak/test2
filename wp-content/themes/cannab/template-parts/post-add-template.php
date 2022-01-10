<?php $post_data = $args; ?>

<div href="<?= $post_data['add-link']; ?>" class="post-item add">
    <div class="post__content">
        <a class="post__title" href="<?= $post_data['add-link']; ?>"><?= $post_data['add-caption']; ?></a>
        <p class="post_excerpt"><?= $post_data['add-short_text']; ?></p>
        <a href="<?= $post_data['add-link']; ?>" class="post__learn-more">Learn more</a>
    </div>
    <figure class="post__img">
        <img src="<?= $post_data['add-image']['url']; ?>" alt="img">
    </figure>
</div>
