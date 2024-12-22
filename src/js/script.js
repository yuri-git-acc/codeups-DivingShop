
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

    // ハンバーガーメニュー ------------------------------------
    $(".js-hamburger").click(function() {
        $(this).toggleClass("js-open");
        $(".js-sp-nav").toggleClass("js-open");
        $("body").toggleClass("noscroll");
    });

    // MVアニメーション ------------------------------------
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
                    $('.js-splide-mv.hidden').removeClass('hidden').promise().done(function() {
                        // Splideの初期化とスタート
                        const mvSplide = new Splide('.js-splide-mv', {
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
            $('.js-splide-mv.hidden').removeClass('hidden');
            $('.mv__copy').addClass('mv__copy--after');
            // Splideの初期化とスタート
            const mvSplide = new Splide('.js-splide-mv', {
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

    // CampaignのSplideの初期化とスタート ------------------------------------
    $(document).ready(function () {
    const campaignSplide = new Splide('.js-splide-campaign', {
        arrows: true,
        pagination: false,
        gap: 40,
        padding: { left: "12.5%", right: "64.35%" },
        speed: 1000,
        interval: 5000,
        // autoplay: true,
        breakpoints: {
            767: {
                arrows: false,
                gap: 24,
                padding: { left: "4%", right: "21.3%" },
            }
        }
    
    });
    campaignSplide.on('mounted moved', function () {
        const totalSlides = $('.js-splide-campaign .splide__slide').length; // 総スライド数を取得
        const currentIndex = campaignSplide.index; // 現在のスライドインデックス
        const maxIndex = totalSlides - 3; // 「マイナス2」の位置

        const $nextButton = $('.arrow-button.next'); // 次ボタンを取得

        if (currentIndex >= maxIndex) {
            $nextButton.prop('disabled', true); // 次ボタンを無効化
            $nextButton.addClass('is-disabled'); // 必要なら無効化スタイルを追加
        } else {
            $nextButton.prop('disabled', false); // 次ボタンを有効化
            $nextButton.removeClass('is-disabled'); // 無効化スタイルを削除
        }
    });
    campaignSplide.mount();
    });
});

