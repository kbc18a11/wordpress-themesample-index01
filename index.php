<?php get_header(); ?>
<div class="container">

    <?php
    //サブループの対象カテゴリー名 key(カテゴリー名),value(表示数)
    $subRoopTargetCategorys = [
        'Hot News' => 3,
        'Feature Story' => 4,
        'orderby' => 'date',
    ];

    foreach ($subRoopTargetCategorys as $key => $value) : ?>
        <?php
            $args = [
                'category_name' => $key,
                'posts_per_page' => $value
            ];
            $my_query = new WP_Query($args);

            if ($my_query->have_posts()) :
                ?>

            <h1><?php echo $key ?></h1>
            <ul class="list-unstyled">
                <?php while ($my_query->have_posts()) : $my_query->the_post();
                            ?>

                    <li class="media">
                        <a class="d-flex thumbnail" href="#">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                        <div class="media-body">
                            <h1>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h1>
                            <p class="post-meta">
                                <span class="post-date"><?php the_date(); ?>&nbsp;</span>
                                <span class="post-category">カテゴリラ：<?php the_category(','); ?></span>
                            </p>
                            <?php the_excerpt(); ?>
                            <p class="more-link">
                                <a href="<?php the_permalink(); ?>">続きを読む</a>
                            </p>
                        </div>
                    </li>

                <?php
                        endwhile; ?>
            </ul>
        <?php
            endif;
            ?>
    <?php endforeach; ?>



</div>
<?php get_footer() ?>