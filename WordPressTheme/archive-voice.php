<?php get_header() ?>

<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- voice --------------------------------- -->
    <div class="voice layout-voice sub-page-fish">
        <div class="voice__inner inner">
            <div class="voice__tab genre-tab">
                <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="genre-tab__item genre-tab__item--active">ALL</a>

                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'voice_category',
                    'hide_empty' => true
                ));
                if (!is_wp_error($terms)) :
                    foreach ($terms as $term) :
                        $link = get_term_link($term);
                ?>
                        <a href="<?php echo esc_url($link); ?>" class="genre-tab__item">
                            <?php echo esc_html($term->name); ?>
                        </a>
                <?php endforeach;
                endif;
                ?>
            </div>
            <?php if (have_posts()) : ?>
                <div class="voice__cards voice-cards">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        // 画像
                        $image = get_field('voice-img');

                        if ($image) {
                            $url = esc_url($image['url']);
                            $alt = esc_attr($image['alt'] ?: $image['title']);
                            $width = esc_attr($image['width']);
                            $height = esc_attr($image['height']);
                        ?>
                            <div class="voice-cards__item voice-card">
                                <div class="voice-card__head">
                                    <div class="voice-card__content">
                                        <div class="voice-card__intro">
                                            <div class="voice-card__belong"><?php the_field('voice-age'); ?>(<?php the_field('voice-sex'); ?>)</div>
                                            <div class="voice-card__select"><?php
                                                                            $terms = get_the_terms(get_the_ID(), 'campaign_category');
                                                                            if ($terms && !is_wp_error($terms)) {
                                                                                echo esc_html($terms[0]->name);
                                                                            } else {
                                                                                echo '未分類';
                                                                            }
                                                                            ?></div>
                                        </div>
                                        <h2 class="voice-card__title"><?php the_field('voice-title'); ?></h2>
                                    </div>
                                    <div class="voice-card__img js-img-anime colorbox"> <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"
                                            width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" decoding="async">
                                    <?php
                                }
                                    ?></div>
                                </div>
                                <p class="voice-card__text">
                                    <?php echo nl2br(esc_html(get_field('voice-text'))); ?>

                                </p>
                            </div>
                        <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p>現在開催中のキャンペーンはございません</p>
            <?php endif; ?>
            <div class="voice__pagination">
                <?php if (function_exists('wp_pagenavi')): ?>
                    <?php wp_pagenavi(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/contact'); ?>

<?php get_footer(); ?>