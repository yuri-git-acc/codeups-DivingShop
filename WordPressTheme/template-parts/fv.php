<?php
if (is_page('about-us')) {
    $class = 'aboutus';
    $title = 'About us';
} elseif (is_post_type_archive('campaign')) {
    $class = 'campaign';
    $title = 'Campaign';
} elseif (is_tax('campaign_category')) {
    $class = 'campaign';
    $title = 'Campaign';
} elseif (is_page('information')) {
    $class = 'information';
    $title = 'Information';
} elseif (is_home('blog')) {
    $class = 'blog';
    $title = 'Blog';
} elseif (is_singular('post')) {
    $class = 'blog';
    $title = 'Blog';
} elseif (is_date()) {
    $class = 'blog';
    $title = 'Blog';
} elseif (is_post_type_archive('voice')) {
    $class = 'voice';
    $title = 'Voice';
} elseif (is_tax('voice_category')) {
    $class = 'voice';
    $title = 'Voice';
} elseif (is_page('price')) {
    $class = 'price';
    $title = 'Price';
} elseif (is_page('faq')) {
    $class = 'faq';
    $title = 'FAQ';
} elseif (is_page('contact')) {
    $class = 'contact';
    $title = 'Contact';
} elseif (is_page('thanks')) {
    $class = 'contact';
    $title = 'Contact';
} elseif (is_page('sitemap')) {
    $class = 'map';
    $title = 'site MAP';
} elseif (is_page('privacypolicy')) {
    $class = 'map';
    $title = 'Privacy Policy';
} elseif (is_page('terms-of-service')) {
    $class = 'map';
    $title = 'Terms of Service';
} elseif (is_page('faq')) {
    $class = 'faq';
    $title = 'FAQ';
} else {
    $class = '';
    $title = '';
}

?>

<!-- sub-mv --------------------------------- -->
<div class="sub-mv">
    <div class="sub-mv__bg sub-mv__bg--<?php echo esc_html($class); ?>">
        <div class="sub-mv__inner inner">
            <h1 class="sub-mv__title"><?php echo esc_html($title); ?></h1>
        </div>
    </div>
</div>
<div class="breadcrumb layout-breadcrumbs">
    <div class="breadcrumb__innet inner">
        <?php if (function_exists('bcn_display')) { ?>
            <div class="breadcrumb breadcrumb__item" vocab="http://schema.org/" typeof="BreadcrumbList">
                <?php bcn_display(); ?>
            </div>
        <?php } ?>
    </div>
</div>