<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <?php wp_head(); ?>
</head>

<body id="top">
    <!-- header --------------------------------- -->
    <header class="js-header header">
        <div class="header__inner">
            <h1 class="header__logo">
                <a href="<?php echo esc_url(home_url("/")) ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_logo.svg" alt="CodeUps" width="200" height="75">
                </a>
            </h1>
            <!-- header-pc -->
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="header__link">
                            <span class="header__link-main">
                                Campaign
                            </span>
                            <span class="header__link-sub">
                                キャンペーン
                            </span>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/about-us")) ?>" class="header__link">
                            <span class="header__link-main">
                                About us
                            </span>
                            <span class="header__link-sub">
                                私たちについて
                            </span>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/information")) ?>" class="header__link">
                            <span class="header__link-main">
                                Information
                            </span>
                            <span class="header__link-sub">
                                ダイビング情報
                            </span>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/blog")) ?>" class="header__link">
                            <span class="header__link-main">
                                Blog
                            </span>
                            <span class="header__link-sub">
                                ブログ
                            </span>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/voice")) ?>" class="header__link">
                            <span class="header__link-main">
                                Voice
                            </span>
                            <span class="header__link-sub">
                                お客様の声
                            </span>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/price")) ?>" class="header__link">
                            <span class="header__link-main">
                                Price
                            </span>
                            <span class="header__link-sub">
                                料金一覧
                            </span>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/faq")) ?>" class="header__link">
                            <span class="header__link-main">
                                FAQ
                            </span>
                            <span class="header__link-sub">
                                よくある質問
                            </span>
                        </a>
                    </li>
                    <li class="header__item">
                        <a href="<?php echo esc_url(home_url("/contact")) ?>" class="header__link">
                            <span class="header__link-main">
                                Contact
                            </span>
                            <span class="header__link-sub">
                                お問合せ
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="header__hamburger js-hamburger">
                <button type="button" class="hamburger">
                    <span></span>
                </button>
            </div>
        </div>
        <!-- header-sp -->
        <div class="header__sp-nav nav nav--header js-sp-nav">
            <div class="nav__wrap">
                <div class="nav__items nav__items--1">
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item nav__item--icon">
                            キャンペーン
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item">
                            ライセンス取得
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item">
                            貸切体験ダイビング
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/campaign")) ?>">
                        <span class="nav__item">
                            ナイトダイビング
                        </span>
                    </a>
                    <a href="<?php echo esc_url(home_url("/about-us")) ?>">
                        <span class="nav__item nav__item--icon">
                            私たちについて
                        </span>
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
    </header>