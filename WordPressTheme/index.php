<?php get_header() ?>

<!-- mv --------------------------------- -->
<div class="mv">
    <div class="mv__loading">
        <div class="mv__double js-loading">
            <div class="mv__left">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv/mv_pc_01.webp" media="(min-width: 768px)" type="image/webp">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv/mv_sp_01.webp" width="750" height="1334" alt="">
                </picture>
            </div>
            <div class="mv__right">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/mv/mv_pc_01.webp" media="(min-width: 768px)" type="image/webp">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/mv/mv_sp_01.webp" width="750" height="1334" alt="">
                </picture>
            </div>
        </div>
        <div class="mv__copy">
            <h2 class="mv__copy-main uppercase">diving</h2>
            <p class="mv__copy-sub">into the ocean</p>
        </div>
    </div>
    <div class="mv__splide splide js-splide-mv hidden">
        <div class="splide__track">
            <ul class="splide__list">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <?php
                    $sp_img = get_field('mv_sp0' . $i);
                    $pc_img = get_field('mv_pc0' . $i);

                    if ($sp_img && $pc_img):
                        $alt = esc_attr($sp_img['alt'] ?? '');
                        $sp_src = esc_url($sp_img['url']);
                        $sp_width = esc_attr($sp_img['width']);
                        $sp_height = esc_attr($sp_img['height']);

                        $pc_src = esc_url($pc_img['url']);
                    ?>
                        <li class="splide__slide">
                            <picture>
                                <source srcset="<?php echo $pc_src; ?>" media="(min-width: 768px)">
                                <img src="<?php echo $sp_src; ?>" width="<?php echo $sp_width; ?>" height="<?php echo $sp_height; ?>" alt="<?php echo $alt; ?>">
                            </picture>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
    <div class="mv__loading-bg"></div>
</div>
<main>
    <!-- campaign --------------------------------- -->
    <section class="top-campaign layout-top-campaign">
        <div class="top-campaign__inner">
            <div class="top-campaign__title section-title">
                <p class="section-title__sub">Campaign</p>
                <h2 class="section-title__main">キャンペーン</h2>
            </div>
            <div class="top-campaign__slider splide js-splide-campaign">
                <div class="splide__track">
                    <?php
                    $args = [
                        "post_type" => "campaign",
                        "posts_per_page" => -1
                    ];
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <ul class="splide__list top-campaign__list">
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <?php
                                $image = get_field('cam-image');
                                $url = esc_url($image['url']);
                                $alt = esc_attr($image['alt'] ?: $image['title']);
                                $width = esc_attr($image['width']);
                                $height = esc_attr($image['height']);
                                ?>
                                <li class="splide__slide top-campaign__card">
                                    <div class="card card--top-campaign">
                                        <div class="card__img card__img--top">
                                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"
                                                width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" decoding="async">
                                        </div>
                                        <div class="card__main card__main--top">
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
                                            <div class="card__title"><?php the_title(); ?></div>
                                            <p class="card__text card__text--top">全部コミコミ(お一人様)</p>
                                            <div class="card__price card__price--top">
                                                <div class="card__price-origin card__price-origin--top">¥<?php echo number_format(get_field('cam-price')); ?></div>
                                                <div class="card__price-sale card__price-sale--top">¥<?php echo number_format(get_field('cam-sale')); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    <?php else : ?>
                        <p>現在開催中のキャンペーンはございません</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="splide__arrows splide__arrows--ltr">
                <button class="splide__arrow splide__arrow--prev arrow-button prev"><span
                        class="arrow-button__tip arrow-button__tip--prev"></span></button>
                <button class="splide__arrow splide__arrow--next arrow-button next"><span
                        class="arrow-button__tip arrow-button__tip--next"></span></button>
            </div>
            <div class="top-campaign__btn">
                <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">
                    <div class="button__bg-anime"></div>
                    <p class="button__text">View more<span></span></p>
                </a>
            </div>
        </div>
    </section>
    <!-- about --------------------------------- -->
    <section class="top-about layout-top-about">
        <div class="top-about__inner inner">
            <div class="top-about__title section-title">
                <p class="section-title__sub">About us</p>
                <h2 class="section-title__main">私たちについて</h2>
            </div>
            <div class="top-about__contents">
                <div class="top-about__img">
                    <div class="top-about__img-item top-about__img-item--1">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus/aboutus_01.jpg" alt="砂地と岩が広がる海底で優雅に動く、美しい熱帯魚の姿"
                            width="1760" height="1162" loading="lazy" decoding="async">
                    </div>
                    <div class="top-about__img-item top-about__img-item--2">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus/aboutus_02.jpg" alt="屋根の上のシーサーと、緑の枝が広がる空のコントラストが美しい風景"
                            width="800" height="1212" loading="lazy" decoding="async">
                    </div>
                </div>
                <div class="top-about__main">
                    <div class="top-about__title">Dive into<br>the Ocean</div>
                    <div class="top-about__other">
                        <p class="top-about__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
                        <div class="top-about__btn">
                            <a href="<?php echo esc_url(home_url("/about-us")) ?>" class="button">
                                <div class="button__bg-anime"></div>
                                <p class="button__text">View more<span></span></p>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- information --------------------------------- -->
    <section class="top-information layout-top-information">
        <div class="top-information__inner inner">
            <div class="top-information__title section-title">
                <p class="section-title__sub">Information</p>
                <h2 class="section-title__main">ダイビング情報</h2>
            </div>
            <div class="top-information__article information-article information-article--reverse">
                <div class="information-article__main information-article__main--reverse">
                    <h3 class="information-article__title information-article__title--top">ライセンス講習</h3>
                    <p class="information-article__text">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
                        正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
                    <div class="information-article__btn">
                        <a href="<?php echo esc_url(home_url("/information")) ?>" class="button">
                            <div class="button__bg-anime"></div>
                            <p class="button__text">View more<span></span></p>
                        </a>
                    </div>
                </div>
                <div class="information-article__img information-article__img--top js-img-anime colorbox">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/information/information_02.jpg" alt="海中に珊瑚とオレンジの魚がいる様子" width="1080"
                        height="712" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </section>
    <!-- blog --------------------------------- -->
    <section class="top-blog layout-top-blog">
        <div class="top-blog__inner inner">
            <div class="top-blog__title section-title">
                <p class="section-title__sub section-title__sub--white">Blog</p>
                <h2 class="section-title__main section-title__main--white">ブログ</h2>
            </div>
            <?php
            $args = [
                "post_type" => "post",
                "posts_per_page" => 3
            ];
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>
                <div class="top-blog__cards blog-cards">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card blog-card--top">
                            <div>
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full', ['class' => 'news__img']); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/20200501_noimage.jpg")); ?>" alt="NoImage画像" />
                                <?php endif; ?>
                            </div>
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="blog-card__time"><?php echo get_the_date('Y.m.d'); ?></time>
                            <p class="blog-card__title"><?php the_title(); ?></p>
                            <div class="blog-card__text"><?php the_excerpt(); ?>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <p>記事が投稿されていません</p>
            <?php endif; ?>
            <div class="top-blog__btn">
                <a href="<?php echo esc_url(home_url("/blog")) ?>" class="button">
                    <div class="button__bg-anime"></div>
                    <p class="button__text">View more<span></span></p>
                </a>
            </div>
        </div>
    </section>
    <!-- voice --------------------------------- -->
    <section class="top-voice layout-top-voice">
        <div class="top-voice__inner inner">
            <div class="top-voice__title section-title">
                <p class="section-title__sub">Voice</p>
                <h2 class="section-title__main">お客様の声</h2>
            </div>
            <?php
            $args = array(
                'post_type'      => 'voice', // カスタム投稿タイプ名（必要に応じて変更）
                'posts_per_page' => 2,
                'post_status'    => 'publish',
                'orderby'        => 'date',  // 日付で並べ替え
                'order'          => 'DESC',  // 新しい順
            );

            $voice_query = new WP_Query($args);
            if ($voice_query->have_posts()) : ?>
                <div class="top-voice__cards voice-cards">
                    <?php while ($voice_query->have_posts()) : $voice_query->the_post();
                        $image = get_field('voice-img');
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
                                        <div class="voice-card__select">
                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'campaign_category');
                                            if ($terms && !is_wp_error($terms)) {
                                                echo esc_html($terms[0]->name);
                                            } else {
                                                echo '未分類';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <h3 class="voice-card__title"><?php the_field('voice-title'); ?></h3>
                                </div>
                                <div class="voice-card__img js-img-anime colorbox">
                                    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" decoding="async">
                                </div>
                            </div>
                            <p class="voice-card__text"><?php the_field('voice-text'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>現在表示できるお客様の声はありません。</p>
            <?php endif; ?>

            <div class="top-voice__btn">
                <a href="<?php echo esc_url(home_url("/voice")) ?>" class="button">
                    <div class="button__bg-anime"></div>
                    <p class="button__text">View more<span></span></p>
                </a>
            </div>
        </div>
    </section>
    <!-- price --------------------------------- -->
    <section class="top-price layout-top-price">
        <div class="top-price__inner inner">
            <div class="top-price__title section-title">
                <p class="section-title__sub">Price</p>
                <h2 class="section-title__main">料金一覧</h2>
            </div>
            <div class="top-price__contents">
                <div class="top-price__img js-img-anime colorbox">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/price/priceimg_pc.webp" media="(min-width: 768px)"
                            type="image/webp">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/price/priceimg_sp.jpg" alt="海の中を優雅に泳ぐ一匹のウミガメ" width="690"
                            height="454">
                    </picture>
                </div>
                <div class="top-price__list top-price-list">
                    <?php
                    // 固定ページ「price」のIDを取得（1回のみ）
                    $price_page = get_page_by_path('price');
                    $price_id = $price_page ? $price_page->ID : null;

                    if ($price_id) :

                        // 1セット目：ライセンス講習
                        $price_title_01 = SCF::get('price-title01', $price_id);
                        $price_set_01 = SCF::get('price-set01', $price_id);
                        if ($price_title_01) :
                    ?>
                            <div class="top-price-list__item top-price-item">
                                <p class="top-price-item__title"><?php echo esc_html($price_title_01); ?></p>
                                <table class="top-price-item__list">
                                    <?php foreach ($price_set_01 as $set) : ?>
                                        <tr class="top-price-item__row">
                                            <th class="top-price-item__head"><?php echo nl2br(esc_html($set['price-name01'])); ?></th>
                                            <td class="top-price-item__date">¥<?php echo number_format($set['price-main01']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>

                        <!-- 2セット目：体験ダイビング -->
                        <?php
                        $price_title_02 = SCF::get('price-title02', $price_id);
                        $price_set_02 = SCF::get('price-set02', $price_id);
                        if ($price_title_02) :
                        ?>
                            <div class="top-price-list__item top-price-item">
                                <p class="top-price-item__title"><?php echo esc_html($price_title_02); ?></p>
                                <table class="top-price-item__list">
                                    <?php foreach ($price_set_02 as $set) : ?>
                                        <tr class="top-price-item__row">
                                            <th class="top-price-item__head"><?php echo nl2br(esc_html($set['price-name02'])); ?></th>
                                            <td class="top-price-item__date">¥<?php echo number_format($set['price-main02']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>

                        <!-- 3セット目：ファンダイビング -->
                        <?php
                        $price_title_03 = SCF::get('price-title03', $price_id);
                        $price_set_03 = SCF::get('price-set03', $price_id);
                        if ($price_title_03) :
                        ?>
                            <div class="top-price-list__item top-price-item">
                                <p class="top-price-item__title"><?php echo esc_html($price_title_03); ?></p>
                                <table class="top-price-item__list">
                                    <?php foreach ($price_set_03 as $set) : ?>
                                        <tr class="top-price-item__row">
                                            <th class="top-price-item__head"><?php echo nl2br(esc_html($set['price-name03'])); ?></th>
                                            <td class="top-price-item__date">¥<?php echo number_format($set['price-main03']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>

                        <!-- 4セット目：スペシャルダイビング -->
                        <?php
                        $price_title_04 = SCF::get('price-title04', $price_id);
                        $price_set_04 = SCF::get('price-set04', $price_id);
                        if ($price_title_04) :
                        ?>
                            <div class="top-price-list__item top-price-item">
                                <p class="top-price-item__title"><?php echo esc_html($price_title_04); ?></p>
                                <table class="top-price-item__list">
                                    <?php foreach ($price_set_04 as $set) : ?>
                                        <tr class="top-price-item__row">
                                            <th class="top-price-item__head"><?php echo nl2br(esc_html($set['price-name04'])); ?></th>
                                            <td class="top-price-item__date">¥<?php echo number_format($set['price-main04']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>

                </div>
            </div>
            <div class="top-price__btn">
                <a href="<?php echo esc_url(home_url("/price")) ?>" class="button">
                    <div class="button__bg-anime"></div>
                    <p class="button__text">View more<span></span></p>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>