
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

    // ハンバーガーメニュー ------------------------------------
    $(function () {
    $(".js-hamburger").click(function () {
        $(".js-header").toggleClass("js-open");
        $(this).toggleClass("js-open");
        $(".js-sp-nav").toggleClass("js-open");
        $("body").toggleClass("noscroll");
    });

    // ハンバーガーメニューリサイズで閉じる
    $(window).on('resize', function() {
    $(".js-header").removeClass("js-open");
    $('.js-hamburger').removeClass('js-open');
    $('.js-sp-nav').removeClass('js-open');
    $("body").removeClass("noscroll");
    });

    // リンククリック時にメニューを閉じる処理
    $(".js-sp-nav a").click(function () {
        $(".js-hamburger").removeClass("js-open"); // ハンバーガーアイコンの状態をリセット
        $(".js-sp-nav").removeClass("js-open");   // メニューを非表示に
        $("body").removeClass("noscroll");        // スクロールロックを解除
        });
    });

    // MVアニメーション ------------------------------------
    $(function () {
        // セッションストレージからフラグを取得
        const isFirstLoad = sessionStorage.getItem('isFirstLoad');

        if (isFirstLoad !== 'true') {
            // 初回アクセス時の処理
            $('.js-loading').addClass('active');

            $(document).on("animationend", ".mv__left, .mv__right", function () {
                setTimeout(function () {
                $('.mv__left').fadeOut(1000, function () {
                    $(this).css('visibility', 'hidden');
                });
                $('.mv__right').fadeOut(1000, function () {
                    $(this).css('visibility', 'hidden');
                });
                    $('.mv__copy').addClass('mv__copy--after');
                    $('.mv__loading-bg').addClass('mv__loading-bg--after');
                    $('.js-splide-mv.hidden').removeClass('hidden').promise().done(function () {
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
            $('.mv__left, .mv__right').css('visibility', 'hidden');
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
    // Splideの初期化
    const campaignSplide = new Splide('.js-splide-campaign', {
        arrows: false,
        pagination: false,
        type: "loop",
        gap: "2.5rem",
        fixedWidth: "20.8125rem",
        speed: 1000,
        interval: 5000,
        autoplay: true,
        padding: { left: 10, right: 0 },
        breakpoints: {
            767: {
                arrows: false,
                fixedWidth: "17.5rem",
                gap: "1.5rem",
            }
        }
    }).mount();

    // カスタム矢印のクリックイベント
    $('.splide__arrow--prev').on('click', function () {
        campaignSplide.go('<'); // 前のスライドに移動
    });

    $('.splide__arrow--next').on('click', function () {
        campaignSplide.go('>'); // 次のスライドに移動
    });
});


    // image画像出現アニメーション ------------------------------------
    //要素の取得とスピードの設定
    var box = $('.js-img-anime'),
        speed = 700;

    //.js-img-animeの付いた全ての要素に対して下記の処理を行う
    box.each(function () {
        $(this).append('<div class="color"></div>')
        var color = $(this).find($('.color')),
            image = $(this).find('img');
        var counter = 0;

        image.css('opacity', '0');
        color.css('width', '0%');
        //inviewを使って背景色が画面に現れたら処理をする
        color.on('inview', function () {
            if (counter == 0) {
                $(this).delay(200).animate({ 'width': '100%' }, speed, function () {
                    image.css('opacity', '1');
                    $(this).css({ 'left': '0', 'right': 'auto' });
                    $(this).animate({ 'width': '0%' }, speed);
                })
                counter = 1;
            }
        });
    });

    // topページのプライスの画像alt切り替え ------------------------------------
    $(document).ready(function () {
        function updateAltText() {
            var img = $(".top-price__img img");
            if (window.matchMedia("(min-width: 768px)").matches) {
                img.attr("alt", "大きな珊瑚とたくさんの赤い小魚の写真"); // PC版のalt
            } else {
                img.attr("alt", "ウミガメの写真"); // スマホ版のalt
            }
        }

        // 初回実行
        updateAltText();

        // 画面サイズが変わるたびにaltを更新
        $(window).on("resize", updateAltText);
    });

    // ページトップに戻るボタン ------------------------------------
    $(function () {
    const pageTop = $(".js-pagetop");
    const footer = $("footer");
    const footHeight = footer.innerHeight();

    // 初期状態で非表示
    pageTop.hide();

    // スクロールイベント
    $(window).on("scroll", function () {
        const scrollHeight = $(document).height();
        const scrollPosition = $(window).height() + $(window).scrollTop();
        const windowWidth = $(window).width(); // 画面幅を取得

        // スクロール位置でフェードイン/アウト
        if ($(this).scrollTop() > 70) {
            pageTop.fadeIn(300).addClass("is-show");
        } else {
            pageTop.fadeOut(300).removeClass("is-show");
        }

        // フッター手前で位置を調整
        if (scrollHeight - scrollPosition <= footHeight) {
            if (windowWidth >= 768) {
                pageTop.css({
                    position: "absolute",
                    bottom: `${footHeight + 20}px`, // 768px以上で20px
                });
            } else {
                pageTop.css({
                    position: "absolute",
                    bottom: `${footHeight + 16}px`, // 768px未満で16px
                });
            }
        } else {
            // 通常位置
            if (windowWidth >= 768) {
                pageTop.css({
                    position: "fixed",
                    bottom: "20px", // 768px以上で20px
                });
            } else {
                pageTop.css({
                    position: "fixed",
                    bottom: "16px", // 768px未満で16px
                });
            }
        }
    });

    // ページトップへスクロール
    pageTop.click(function () {
        $("body,html").animate(
            {
                scrollTop: 0,
            },
            300
        );
        return false;
        });
    });

    // モーダル関連の要素を取得
const modalTriggers = $('.js-modal-open img');
const modal = $('#modal');
const modalImage = $('.gallery__modal-img');
let isModalEnabled = $(window).width() > 768; // 初期判定

// 画面サイズが変更されたときに再判定
$(window).on("resize", function () {
    isModalEnabled = $(window).width() > 768;
});

// モーダルを開く処理
modalTriggers.on("click", function () {
    if (!isModalEnabled) return; // SPの場合は処理しない

    event.preventDefault(); // 画像のクリック動作を防止

    // クリックした画像の情報を取得
    const imgSrc = $(this).attr("src");
    const imgAspectRatio = $(this).css("aspect-ratio"); // aspect-ratio を取得

    // モーダルの画像を設定
    modalImage.attr("src", imgSrc);

    // aspect-ratio を適用（未指定の場合は自動で設定しない）
    if (imgAspectRatio) {
        modalImage.css("aspect-ratio", imgAspectRatio);
    } else {
        modalImage.css("aspect-ratio", "auto");
    }

    $("body").addClass("noscroll");

    // モーダルを表示する
    modal.css({
        "opacity": "1",
        "visibility": "visible"
    });
});

// モーダルを閉じる処理
modal.on("click", function () {
    if (!isModalEnabled) return; // SPの場合は処理しない

    modal.css({
        "opacity": "0",
        "visibility": "hidden"
    });
    $("body").removeClass("noscroll");
});


});