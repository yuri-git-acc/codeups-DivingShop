
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

    // ハンバーガーメニュー
    $(".js-hamburger").click(function() {
        $(this).toggleClass("js-open");
        $(".js-sp-nav").toggleClass("js-open");
        $("body").toggleClass("noscroll");
    });
    

$(function () {
    // セッションストレージからフラグを取得
    const isFirstLoad = sessionStorage.getItem('isFirstLoad');

    if (isFirstLoad !== 'true') {
        // 初回アクセス時の処理
        $('.js-loading').addClass('active');

        $(document).on("animationend", ".mv__left, .mv__right", function() {
            setTimeout(function () {
                $('.mv__left').fadeOut(1000);
                $('.mv__right').fadeOut(1000);
                $('.mv__copy').addClass('mv__copy--after');
                $('.mv__loading-bg').addClass('mv__loading-bg--after');
                $('.js-splide.hidden').removeClass('hidden').promise().done(function() {
                    // Splideの初期化とスタート
                    const mvSplide = new Splide('.js-splide', {
                        type: "fade",
                        arrows: false,
                        pagination: false,
                        speed: 1000,
                        interval: 5000,
                        autoplay: true,
                        rewind: true,
                    });
                    mvSplide.mount();
                });
                sessionStorage.setItem('isFirstLoad', 'true'); // フラグを保存
            }, 2000);
        });
    } else {
        // 2回目以降のアクセス時の処理
        $('.js-splide.hidden').removeClass('hidden');
        $('.mv__copy').addClass('mv__copy--after');
        // Splideの初期化とスタート
        const mvSplide = new Splide('.js-splide', {
            type: "fade",
            arrows: false,
            pagination: false,
            speed: 1000,
            interval: 5000,
            autoplay: true,
            rewind: true,
        });
        mvSplide.mount();
    }
});

});

