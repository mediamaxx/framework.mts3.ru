<div class="section news">
    <div class="container">
        <div class="section-suptitle">Последние события</div>
        <div class="section-title">Новости компании</div>

        <div class="news-row">

            <?php 
            $args = [
                'posts_per_page' => 3,
                'cat' => 39
            ];

            $news = new WP_Query($args);

            if($news->have_posts()): ?>
            <?php while($news->have_posts()): $news->the_post(); ?>

                    <a href="<?php the_permalink(); ?>" class="new">
                        <span class="new__photo"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                alt="Alt"></span>
                        <span class="new__title"><?php the_title(); ?></span>
                        <span class="new__date"><?php echo get_the_date(); ?></span>

                        <span class="new__more">Читать далее</span>
                    </a>

            <?php endwhile; wp_reset_postdata(); endif; ?>

        </div>

        <a href="/novosti/" class="btn btn--bdr">Читать все новости</a>

    </div>
</div>