<?php
$class = 'contact-common layout-contact-common';

// 特定のページやアーカイブのときにクラスを追加
if (
    is_page('about-us') ||
    is_post_type_archive('campaign') ||
    is_tax('campaign_category') ||
    is_page('information') ||
    is_home() ||
    is_singular('post') ||
    is_date() ||
    is_post_type_archive('voice') ||
    is_tax('voice_category') ||
    is_page('price') ||
    is_page('faq') ||
    is_page('privacy-policy') ||
    is_page('terms-of-service')
) {
    $class .= ' layout-contact-common--subpage';
}
?>

<!-- contact --------------------------------- -->
<section class="<?php echo esc_attr($class); ?>">
    <div class="contact-common__inner inner">
        <div class="contact-common__wrap">
            <div class="contact-common__top">
                <div class="contact-common__logo">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_logo_contact.svg" alt="CodeUps" width="200" height="75"
                        loading="lazy" decoding="async">
                </div>
                <div class="contact-common__address">
                    <div class="contact-common__detail">
                        <p>沖縄県那覇市1-1</p>
                        <p>TEL:0120-000-0000</p>
                        <p>営業時間:8:30-19:00</p>
                        <p>定休日:毎週火曜日</p>
                    </div>
                    <div class="contact-common__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57273.023220238!2d127.6435023807252!3d26.21085938024693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5697141a6b58b%3A0x2cd8aff616585e98!2z5rKW57iE55yM6YKj6KaH5biC!5e0!3m2!1sja!2sjp!4v1734704063205!5m2!1sja!2sjp"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="contact-common__bottom">
                <div class="contact-common__bottom-wrap">
                    <div class="contact-common__title-wrap">
                        <div class="section-title section-title--shadow">
                            <p class="section-title__sub section-title__sub--contact">Contact</p>
                            <h2 class="section-title__main section-title__main--contact">お問い合わせ</h2>
                        </div>
                    </div>
                    <p class="contact-common__text">ご予約・お問い合わせはコチラ</p>
                    <div class="contact-common__link">
                        <a href="<?php echo esc_url(home_url("/contact")) ?>" class="button button--white">
                            <div class="button__bg-anime"></div>
                            <p class="button__text">Contact us<span></span></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>