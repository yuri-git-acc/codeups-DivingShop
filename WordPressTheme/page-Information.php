<?php get_header() ?>

<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- information --------------------------------- -->
    <div class="information layout-information sub-page-fish sub-page-fish--information">
        <div class="information__inner inner">
            <ul class="information__tab-list">
                <li id="tab-1" class="information__tab-menu information-tab js-tab current"
                    data-link="<?php echo esc_url(home_url("/information")) ?>#tab-1">
                    <button class="information-tab__title information-tab__title--1">ライセンス<br
                            class="u-mobile">講習</button>
                </li>
                <li id="tab-2" class="information__tab-menu information-tab js-tab"
                    data-link="<?php echo esc_url(home_url("/information")) ?>#tab-2">
                    <button class="information-tab__title information-tab__title--2">ファン<br
                            class="u-mobile">ダイビング</button>
                </li>
                <li id="tab-3" class="information__tab-menu information-tab js-tab"
                    data-link="<?php echo esc_url(home_url("/information")) ?>#tab-3">
                    <button class="information-tab__title information-tab__title--3">体験<br
                            class="u-mobile">ダイビング</button>
                </li>
            </ul>

            <div class="information__contents">
                <section class="information__article information-article information-article--normal  js-content">
                    <div class="information-article__main information-article__main--normal">
                        <h2 class="information-article__title information-article__title--normal">ライセンス講習</h2>
                        <p class="information-article__text">
                            泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                        </p>
                    </div>
                    <div class="information-article__img information-article__img--low js-img-anime colorbox">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/information/information_01.webp"
                            alt="自然の岩とクリアな水が広がる美しい海でのマリンアクティビティの様子" width="984" height="626" loading="lazy"
                            decoding="async">
                    </div>
                </section>
                <section class="information__article information-article information-article--normal  js-content">
                    <div class="information-article__main information-article__main--normal">
                        <h2 class="information-article__title information-article__title--normal">ファンダイビング</h2>
                        <p class="information-article__text">
                            ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                        </p>
                    </div>
                    <div class="information-article__img information-article__img--normal js-img-anime colorbox">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus/gallery_5.webp" alt="透明感のある青い海の中を泳ぐ、小さな魚の大群" width="1160"
                            height="738" loading="lazy" decoding="async">
                    </div>
                </section>
                <section class="information__article information-article information-article--normal  js-content">
                    <div class="information-article__main information-article__main--normal">
                        <h2 class="information-article__title information-article__title--normal">体験ダイビング</h2>
                        <p class="information-article__text">
                            ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                        </p>
                    </div>
                    <div class="information-article__img information-article__img--normal js-img-anime colorbox">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/aboutus/gallery_3.webp" alt="黄色と黒の模様が特徴的な魚が透き通る青い水の中泳いでいます"
                            width="1160" height="738" loading="lazy" decoding="async">
                    </div>
                </section>
            </div>
        </div>
    </div>

</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>