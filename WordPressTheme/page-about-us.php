<?php get_header() ?>

<?php get_template_part('template-parts/fv'); ?>
<main>
    <!-- About us --------------------------------- -->
    <div class="aboutus layout-aboutus sub-page-fish">
        <div class="aboutus__inner inner">
            <div class="aboutus__contents">
                <div class="aboutus__img">
                    <div class="aboutus__img-item aboutus__img-item--1">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus/aboutus_01.webp" alt="砂地と岩が広がる海底で優雅に動く、美しい熱帯魚の姿"
                            width="1760" height="1162" loading="lazy" decoding="async">
                    </div>
                    <div class="aboutus__img-item aboutus__img-item--2">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus/aboutus_02.webp" alt="屋根の上のシーサーと、緑の枝が広がる空のコントラストが美しい風景"
                            width="800" height="1212" loading="lazy" decoding="async">
                    </div>
                </div>
                <div class="aboutus__text-box">
                    <h2 class="aboutus__title">Dive into<br>the Ocean</h2>
                    <p class="aboutus__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery layout-gallery">
        <div class="gallery__inner inner">
            <div class="gallery__title section-title">
                <p class="section-title__sub">Gallery</p>
                <h2 class="section-title__main">フォト</h2>
            </div>
            <div class="gallery__wrap">
                <?php
                $gallery = SCF::get('gallery'); //グループ「gallery」を取得
                if (!empty($gallery)) { //繰り返しフィールドが空じゃないかチェック。
                    foreach ($gallery as $index => $item) {
                        if ($index % 6 === 0) echo '<div class="gallery__contents">';
                        $img_id = $item['gallery_img'];
                        if ($img_id) {
                            $img_src = wp_get_attachment_image_src($img_id, 'full');
                            $img_url = $img_src[0];
                            $width = $img_src[1];
                            $height = $img_src[2];
                            $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true) ?: get_post($img_id)->post_title;
                ?>
                            <div class="gallery__img js-modal-open">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt); ?>"
                                    width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" loading="lazy">
                            </div>
                <?php
                        }
                        if (($index + 1) % 6 === 0 || $index + 1 === count($gallery)) echo '</div>';
                    }
                }
                ?>
            </div>

            <!-- モーダル -->
            <div id="modal" class="gallery__modal">
                <div class="gallery__modal-content">
                    <img class="gallery__modal-img" alt="">
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>