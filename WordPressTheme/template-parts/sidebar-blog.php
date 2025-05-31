<!-- サイドバー -->
<div class="blog__sidebar-all sidebar">
    <!-- 人気記事 -->
    <div class="sidebar__blog">
        <div class="sidebar__header sidebar-header">
            <div class="sidebar-header__img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/whale.svg" alt="" width="64" height="64"
                    loading="lazy" decoding="async">
            </div>
            <p class="sidebar-header__title">人気記事</p>
        </div>
        <div class="sidebar__contents">
            <ul class="sidebar__article-list">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                );
                $popular_query = new WP_Query($args);
                if ($popular_query->have_posts()) :
                    while ($popular_query->have_posts()) : $popular_query->the_post();
                        $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $alt = get_the_title(); // 代替テキストとしてタイトルを利用
                        $date = get_the_date('Y.m.d');
                        $title = get_the_title();
                        $link = get_permalink();
                ?>
                        <li>
                            <a href="<?php echo esc_url($link); ?>" class="sidebar__article-item sidebar-article">
                                <figure class="sidebar-article__img">
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>" width="602" height="402" loading="lazy" decoding="async">
                                </figure>
                                <div class="sidebar-article__content">
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="sidebar-article__time"><?php echo esc_html($date); ?></time>
                                    <p class="sidebar-article__title"><?php echo esc_html($title); ?></p>
                                </div>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>
    </div>
    <!-- 口コミ -->
    <div class="sidebar__blog">
        <div class="sidebar__header sidebar-header">
            <div class="sidebar-header__img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/whale.svg" alt="" width="64" height="64"
                    loading="lazy" decoding="async">
            </div>
            <p class="sidebar-header__title">口コミ</p>
        </div>
        <?php
        $args = [
            "post_type" => "voice",
            "posts_per_page" => 1
        ];
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
            <div class="sidebar__contents">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php
                    $image = get_field('voice-img');
                    $url = esc_url($image['url']);
                    $alt = esc_attr($image['alt'] ?: $image['title']);
                    $width = esc_attr($image['width']);
                    $height = esc_attr($image['height']);
                    ?>
                    <div class="sidebar__voice">
                        <figure class="sidebar__voice-img">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"
                                width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" decoding="async">
                        </figure>
                        <p class="sidebar__voice-belong"><?php echo esc_html(get_field('voice-age')); ?>(<?php echo esc_html(get_field('voice-sex')); ?>)</p>
                        <p class="sidebar__voice-title"><?php the_field('voice-title'); ?></p>
                    </div>
            </div>
            <div class="sidebar__voice-btn">
                <a href="<?php echo esc_url(home_url("/voice")) ?>" class="button">
                    <div class="button__bg-anime"></div>
                    <p class="button__text">View more<span></span></p>
                </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p>現在公開中のボイスはございません。</p>
        <?php endif; ?>
    </div>
    <!-- キャンペーン -->
    <div class="sidebar__blog">
        <div class="sidebar__header sidebar-header">
            <div class="sidebar-header__img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/whale.svg" alt="" width="64" height="64"
                    loading="lazy" decoding="async">
            </div>
            <p class="sidebar-header__title">キャンペーン</p>
        </div>
        <div class="sidebar__contents">
            <div class="sidebar__campaign">
                <?php
                $args = [
                    "post_type" => "campaign",
                    "posts_per_page" => 2
                ];
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <ul class="sidebar__campaign-list">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php
                            $image = get_field('cam-image');
                            $url = esc_url($image['url']);
                            $alt = esc_attr($image['alt'] ?: $image['title']);
                            $width = esc_attr($image['width']);
                            $height = esc_attr($image['height']);
                            ?>
                            <li class="sidebar__campaign-card">
                                <div class="card">
                                    <div class="card__img card__img--blog"><img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"
                                            width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" decoding="async">
                                    </div>
                                    <div class="card__main card__main--blog">
                                        <div class="card__title card__title--blog"><?php the_title(); ?></div>
                                        <p class="card__text card__text--blog">全部コミコミ(お一人様)</p>
                                        <div class="card__price">
                                            <div class="card__price-origin card__price-origin--blog">¥<?php echo number_format(get_field('cam-price')); ?>
                                            </div>
                                            <div class="card__price-sale card__price-sale--blog">¥<?php echo number_format(get_field('cam-sale')); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                <?php else : ?>
                    <p>記事が投稿されていません</p>
                <?php endif; ?>
                <div class="sidebar__campaign-btn">
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">
                        <div class="button__bg-anime"></div>
                        <p class="button__text">View more<span></span></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- アーカイブ -->
    <div class="sidebar__blog">
        <div class="sidebar__header sidebar-header">
            <div class="sidebar-header__img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/whale.svg" alt="" width="64" height="64"
                    loading="lazy" decoding="async">
            </div>
            <p class="sidebar-header__title">アーカイブ</p>
        </div>
        <div class="sidebar__contents">
            <div class="sidebar__archive">
                <?php
                // 年ごとに月の投稿をグループ化
                global $wpdb;
                $archives = $wpdb->get_results("
        SELECT YEAR(post_date) AS year, MONTH(post_date) AS month
        FROM $wpdb->posts
        WHERE post_type = 'post' AND post_status = 'publish'
        GROUP BY year, month
        ORDER BY year DESC, month DESC
    ");

                $grouped_archives = [];

                foreach ($archives as $archive) {
                    $grouped_archives[$archive->year][] = $archive;
                }

                foreach ($grouped_archives as $year => $months) :
                ?>
                    <div class="sidebar__archive-item">
                        <p class="sidebar__archive-year js-archive-year"><?php echo esc_html($year); ?></p>
                        <ul class="sidebar__archive-list" style="display: none;">
                            <?php foreach ($months as $m) :
                                $month_link = get_month_link($m->year, $m->month);
                            ?>
                                <li><a href="<?php echo esc_url($month_link); ?>" class="sidebar__archive-month">
                                        <?php echo esc_html($m->month); ?>月
                                    </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</div>