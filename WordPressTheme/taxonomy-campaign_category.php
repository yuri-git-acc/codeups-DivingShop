<?php get_header() ?>

<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- campaign --------------------------------- -->
    <div class="campaign layout-campaign sub-page-fish">
        <div class="campaign__inner inner">
            <div class="campaign__tab genre-tab">
                <a href="<?php echo get_post_type_archive_link('campaign'); ?>"
                    class="genre-tab__item <?php if (!is_tax('campaign_category')) echo 'genre-tab__item--active'; ?>">
                    ALL
                </a>

                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'campaign_category',
                    'hide_empty' => true //投稿が1つもないカテゴリは除外
                ));
                if (!is_wp_error($terms)) : //エラーがなければ次の処理へ
                    foreach ($terms as $term) :
                        $link = get_term_link($term); //カテゴリ一覧ページへのURL
                        $is_active = (is_tax('campaign_category') && get_queried_object_id() === $term->term_id);
                ?>
                        <!-- 今いるカテゴリと同じリンクなら active クラスをつける -->
                        <a href="<?php echo esc_url($link); ?>"
                            class="genre-tab__item <?php if ($is_active) echo 'genre-tab__item--active'; ?>">
                            <?php echo esc_html($term->name); ?>
                        </a>
                <?php endforeach;
                endif;
                ?>
            </div>

            <?php if (have_posts()) : ?>
                <ul class="campaign__list">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        // 画像
                        $image = get_field('cam-image');

                        if ($image) {
                            $url = esc_url($image['url']);
                            $alt = esc_attr($image['alt'] ?: $image['title']);
                            $width = esc_attr($image['width']);
                            $height = esc_attr($image['height']);
                        ?>
                            <li class="campaign__card card card--campaign">
                                <div class="card__img card__img--campaign">
                                    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"
                                        width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" decoding="async">
                                <?php
                            }
                                ?>
                                </div>
                                <div class="card__main card__main--campaign">
                                    <div class="card__tag-wrap">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'campaign_category');
                                        if ($terms && !is_wp_error($terms)) {
                                            foreach ($terms as $term) {
                                                echo '<span class="card__tag">' . esc_html($term->name) . '</span>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="card__title card__title--campaign">
                                        <?php the_title(); ?>
                                    </div>
                                    <p class="card__text card__text--campaign">全部コミコミ(お一人様)</p>
                                    <div class="card__price card__price--campaign">
                                        <div class="card__price-origin card__price-origin--top">¥<?php echo number_format(get_field('cam-price')); ?></div>
                                        <div class="card__price-sale card__price-sale--top">¥<?php echo number_format(get_field('cam-sale')); ?></div>
                                    </div>
                                </div>
                                <div class="card__pc">
                                    <p class="card__under-text"><?php the_field('cam-text'); ?>
                                    </p>
                                    <div class="card__box">
                                        <div class="card__date">
                                            <?php
                                            $start = get_field('cam-start');
                                            $end = get_field('cam-end');
                                            if ($start && $end) {
                                                echo esc_html(date('Y/n/j', strtotime($start))) . '-' . esc_html(date('n/j', strtotime($end)));
                                            }
                                            ?>
                                        </div>
                                        <p class="card__guidance">
                                            ご予約・お問い合わせはコチラ
                                        </p>
                                        <div class="card__btn">
                                            <a href="#" class="button">
                                                <div class="button__bg-anime"></div>
                                                <p class="button__text">Contact us<span></span></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p>現在開催中のキャンペーンはございません</p>
            <?php endif; ?>

            <div class="campaign__pagenavi">
                <?php if (function_exists('wp_pagenavi')): ?>
                    <?php wp_pagenavi(); ?>
                <?php endif; ?>
            </div>
        </div>
</main>

<?php get_template_part('template-parts/contact'); ?>

<?php get_footer(); ?>