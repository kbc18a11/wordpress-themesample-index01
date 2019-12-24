<?php get_header(); ?>
<div class="container">

    <?php
    //サブループの対象カテゴリー名 key(カテゴリー名),value(表示数)
    $subRoopTargetCategorys = [
        'Hot News' => 3,
        'Feature Story' => 4,
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
                <?php
                while ($my_query->have_posts()) : $my_query->the_post();
                ?>

                    <li class="media">
                        <a class="d-flex thumbnail" href="#">
                            <?php
                            if (has_post_thumbnail()) :
                                the_post_thumbnail('thumbnail');
                            else :
                            ?>
                                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/pose_dance_ukareru_woman.png" alt="" srcset="">
                            <?php
                            endif; ?>
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

    <?php //Contents 
    ?>
    <h1>Contents</h1>
    <?php
    $args = [
        'posts_per_page' => 10,
        'orderby' => 'date',
        'paged' => $paged
    ];
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) :

        while ($my_query->have_posts()) : $my_query->the_post();
    ?>
            <div class="Contents">
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>

    <?php
        endwhile;
    endif;
    if ($my_query->max_num_pages > 1) {
        $args = [
            'preve_text' => 'NEXT',
            'next_text' => 'PREV',
            'screen_reader_text' => '',
            'show_all' => false,
            'mid_size' => 2,
        ];
        the_posts_pagination($args);
    }
    ?>



</div>
<?php get_footer() ?>