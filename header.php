<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if (is_404()) : ?>
        <meta http-equiv="refresh" content=" 3 url=<?php echo esc_url(home_url("")); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="header__logo">
            <img src="" alt="ロゴ">
        </div>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item"><a href="#" class="header__nav-link">ナビゲーション1</a></li>
                <li class="header__nav-item"><a href="#" class="header__nav-link">ナビゲーション2</a></li>
                <li class="header__nav-item"><a href="#" class="header__nav-link">ナビゲーション3</a></li>
            </ul>
        </nav>
    </header>