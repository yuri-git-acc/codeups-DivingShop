<?php get_header(); ?>
<main>
    <section class="category-section">
        <h2 class="category-section__title">カテゴリー一覧</h2>
        <?php
        $current_category_id = get_queried_object_id();
        $categories = get_categories(array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ));

        if ($categories) {
            echo '<ul class="category-section__list">';
            foreach ($categories as $category) {
                $category_class = ($current_category_id === $category->term_id) ? 'current' : '';
                $category_link = sprintf(
                    '<li class="category-section__item %4$s"><a href="%1$s" alt="%2$s">%3$s</a></li>',
                    esc_url(get_category_link($category->term_id)),
                    esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
                    esc_html($category->name),
                    $category_class
                );
                echo sprintf(esc_html__('%s', 'textdomain'), $category_link);
            }
            echo '</ul>';
        }
        ?>
    </section>
    <!-- ここからカテゴリ別記事一覧 -->
    <section class="category-posts">
        <header class="category-posts__header">
            <h1 class="category-posts__title"><?php single_cat_title(); ?></h1>
        </header>

        <?php if (have_posts()) : ?>
            <ul class="news category-posts__news">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="news__item">
                        <span class="news__date"><?php the_time(get_option('date_format')); ?></span>
                        <span class="news__category"><?php the_category(', '); ?></span>
                        <h3 class="news__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </li>
                <?php endwhile; ?>
            </ul>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p><?php _e('No posts found in this category.', 'textdomain'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>