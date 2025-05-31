<!-- footer --------------------------------- -->
<footer class="footer layout-footer<?php
                                    if (is_404()) echo ' layout-footer--not-404';
                                    if (is_page('contact')) echo ' layout-footer--contact';
                                    if (is_page('thanks')) echo ' layout-footer--completed';
                                    ?>">
    <div class="footer__inner inner">
        <div class="footer__head">
            <div class="footer__logo">
                <a href="<?php echo esc_url(home_url("/")) ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_logo.svg" alt="CodeUps" width="200"
                        height="75" loading="lazy" decoding="async" class="CodeUps"></a>
            </div>
            <div class="footer__sns-items">
                <a href="#" class="footer__sns--facebook">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/footer/FacebookLogo.png" alt="Facebook" width="64" height="64"
                        loading="lazy" decoding="async">
                </a>
                <a href="#" class="footer__sns--instagram">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/footer/instagramLogo.png" alt="instagram" width="52" height="52"
                        loading="lazy" decoding="async">
                </a>
            </div>
        </div>
        <div class="footer__nav nav">
            <div class="nav__wrap">
                <div class="nav__items nav__items--1">
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item nav__item--icon"> キャンペーン </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item"> ライセンス取得 </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item"> 貸切体験ダイビング </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item"> ナイトダイビング </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/about-us")) ?>">
                        <span class="nav__item nav__item--icon"> 私たちについて </span>
                    </a>
                </div>
                <div class="nav__items nav__items--2">
                    <a href="<?php echo esc_url(home_url("/information")) ?>">
                        <span class="nav__item nav__item--icon">
                            ダイビング情報
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/information")) ?>#tab-1">
                        <span class="nav__item">
                            ライセンス講習
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/information")) ?>#tab-3">
                        <span class="nav__item">
                            体験ダイビング
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/information")) ?>#tab-2">
                        <span class="nav__item">
                            ファンダイビング
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/blog")) ?>">
                        <span class="nav__item nav__item--icon">
                            ブログ
                        </span>
                    </a>
                </div>
                <div class="nav__items nav__items--3">
                    <a href="<?php echo esc_url(home_url("/voice")) ?>">
                        <span class="nav__item nav__item--icon">
                            お客様の声
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/price")) ?>">
                        <span class="nav__item nav__item--icon">
                            料金一覧
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/price")) ?>#license">
                        <span class="nav__item">
                            ライセンス講習
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/price")) ?>#experience">
                        <span class="nav__item">
                            体験ダイビング
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/price")) ?>#fundiving">
                        <span class="nav__item">
                            ファンダイビング
                        </span>
                    </a>
                </div>
                <div class="nav__items nav__items--4">
                    <a href="<?php echo esc_url(home_url("/faq")) ?>">
                        <span class="nav__item nav__item--icon">
                            よくある質問
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/privacypolicy")) ?>">
                        <span class="nav__item nav__item--icon">
                            プライバシー<br class="u-mobile">ポリシー
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/terms-of-service")) ?>">
                        <span class="nav__item nav__item--icon">
                            利用規約
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/contact")) ?>">
                        <span class="nav__item nav__item--icon">
                            お問い合わせ
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <small class="footer__copyright">Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</small>
    </div>
</footer>
<a href="#top" class="page-top js-pagetop" aria-label="ページトップへ移動する"></a>

<?php wp_footer(); ?>
</body>

</html>