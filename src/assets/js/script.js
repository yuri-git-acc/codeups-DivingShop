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
        $(window).on('resize', function () {
            $(".js-header").removeClass("js-open");
            $('.js-hamburger').removeClass('js-open');
            $('.js-sp-nav').removeClass('js-open');
            $("body").removeClass("noscroll");
        });

        // リンククリック時にメニューを閉じる処理
        $(".js-sp-nav a").click(function () {
            $(".js-hamburger").removeClass("js-open"); // ハンバーガーアイコンの状態をリセット
            $(".js-sp-nav").removeClass("js-open"); // メニューを非表示に
            $("body").removeClass("noscroll"); // スクロールロックを解除
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
                $(this).delay(200).animate({
                    'width': '100%'
                }, speed, function () {
                    image.css('opacity', '1');
                    $(this).css({
                        'left': '0',
                        'right': 'auto'
                    });
                    $(this).animate({
                        'width': '0%'
                    }, speed);
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
                img.attr("alt", "鮮やかな赤い魚が群れをなして泳ぐ、美しいサンゴ礁の風景"); // PC版のalt
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
            $("body,html").animate({
                    scrollTop: 0,
                },
                300
            );
            return false;
        });
    });

    // モーダル関連の要素を取得 ------------------------------------
    const modalTriggers = $('.js-modal-open img');
    const modal = $('#modal');
    const modalImage = $('.gallery__modal-img');
    let isModalEnabled = $(window).width() > 768; // 初期判定

    // モーダルを閉じる処理
    function closeModal() {
        modal.css({
            "opacity": "0",
            "visibility": "hidden"
        });

        // bodyの固定を解除して、元のスクロール位置を復元
        $("body").removeClass("noscroll").css({
            "padding-right": ""
        });

    }

    // 画面サイズが変更されたとき
    $(window).on("resize", function () {
        closeModal();
        isModalEnabled = $(window).width() > 768;
    });

    // モーダルを開く処理
    modalTriggers.on("click", function () {
        if (!isModalEnabled) return; // SPの場合は処理しない

        // 画像の情報を取得して設定
        modalImage.attr({
            "src": $(this).attr("src"),
            "alt": $(this).attr("alt")
        }).css("aspect-ratio", $(this).css("aspect-ratio") || "auto");

        // **スクロールバーの幅を取得して body に padding-right を追加**
        const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
        $("body").css({
            "padding-right": `${scrollbarWidth}px`
        }).addClass("noscroll");

        // モーダルを表示する
        modal.css({
            "opacity": "1",
            "visibility": "visible"
        });
    });

    // モーダルを閉じる処理
    modal.on("click", function () {
        if (!isModalEnabled) return; // SPの場合は処理しない

        closeModal();
    });



    // informationタブメニュー ------------------------------------
    $(function () {
        // 最初のコンテンツは表示
        $(".js-content:first-of-type").css("display", "flex");
        // タブをクリックすると
        $(".js-tab").on("click", function () {
            // 現在選択されているタブからcurrentを外す
            $(".current").removeClass("current");
            // クリックされたタブにcurrentクラスを付与
            $(this).addClass("current");
            // クリックされた要素が何番目か取得（クリックしたタブのインデックス番号を取得）
            const index = $(this).index();
            // コンテンツを非表示にして、クリックしたタブのインデックス番号と同じコンテンツを表示
            $(".js-content").hide().eq(index).css("display", "flex").hide().fadeIn(300);
        });
    });

    // informationタブへのリンク移動
    $(function () {
        const $tabs = $(".js-tab");
        const $contents = $(".js-content");

        // タブを切り替える関数
        function switchTabByHash() {
            const hash = location.hash; //クリックされた#以降の部分を取得
            const $targetTab = $(hash); // id="tab-⚪︎" の要素を取得

            let index = 0;
            if ($targetTab.length > 0) {
                index = $tabs.index($targetTab); // $tabs（.js-tab）のある中で$targetTab（＃tab-⚪︎"）の順番を取得
            }

            $tabs.removeClass("current").eq(index).addClass("current");
            $contents.hide().eq(index).css("display", "flex");
        }

        // ページ読み込み時の初期処理
        switchTabByHash();

        // hashが変わった時にもタブを切り替え
        $(window).on("hashchange", function () {
            switchTabByHash();
        });

        // タブ内のリンク（data-link）クリック時に処理を発動
        $tabs.find('a').on("click", function (e) {
            const $link = $(this);
            const link = $link.attr('href'); // リンク先のURLを取得

            // リンクのURLが存在する場合、location.hashを更新
            if (link) {
                e.preventDefault(); // デフォルトの動作（スクロール）を防ぐ
                location.hash = link.split('#')[1]; // URLの#以降の部分をlocation.hashに設定
            }
        });
    });



    // blogページのサイドバーのアコーディオン ------------------------------------
    $(function () {
        // 最初のコンテンツは表示
        $(".sidebar__archive-item:first-of-type .sidebar__archive-list").css("display", "block");
        // 最初の矢印は開いた時の状態に
        $(".sidebar__archive-item:first-of-type .js-archive-year").addClass("open");
        // タイトルをクリックすると
        $(".js-archive-year").on("click", function () {
            // クリックした次の要素を開閉
            $(this).next().slideToggle(300);
            // タイトルにopenクラスを付け外しして矢印の向きを変更
            $(this).toggleClass("open", 300);
        });
    });

    // FAQアコーディオン　　------------------------------------
    // 初期状態で全てのアコーディオンを開く
    $('.js-accordion-title').attr('aria-expanded', 'false');
    $('.js-accordion-content').attr('aria-hidden', 'true');

    // クリックで開閉
    $('.js-accordion-title').on('click', function () {
        let faq = $(this);
        let content = $('#' + faq.attr('aria-controls'));
        let isOpen = faq.attr('aria-expanded') === 'true';

        faq.toggleClass('is-close'); // ＋/− 切り替え用
        faq.attr('aria-expanded', !isOpen);
        content.attr('aria-hidden', isOpen).slideToggle();
    });

    // Contactフォーム　------------------------------------
    // 初期状態でボタンを無効化
    const $submitButton = $('#submit-confirm');
    $submitButton.prop('disabled', true);

    // チェックボックスの状態監視
    $('#acceptance-checkbox').on('change', function () {
        $submitButton.prop('disabled', !this.checked);
    });

    // フォーム送信ボタンのクリックイベント
    $submitButton.on('click', function (e) {
        let isValid = true;

        // 全てのエラーステートをリセット
        $('.form__item').removeClass('is-error');

        // 通常の必須フィールドチェック
        $('input[required], select[required], textarea[required]').each(function () {
            const $input = $(this);
            const hasValue = $input.val();

            if (!hasValue) {
                $input.closest('.form__item').addClass('is-error');
                isValid = false;
            }
        });

        // チェックボックスグループのバリデーション（どれか1つ以上チェック）
        const $checkboxGroup = $('input[name="services[]"]');
        if ($checkboxGroup.filter(':checked').length === 0) {
            $checkboxGroup.closest('.form__item').addClass('is-error');
            isValid = false;
        }

    });

    // 入力時にエラークラスを外す
    $('input[required], select[required], textarea[required], input[type="checkbox"]').on('input change', function () {
        const $input = $(this);

        if ($input.attr('name') === 'services[]') {
            // チェックボックスグループの場合
            if ($('input[name="services[]"]:checked').length > 0) {
                $input.closest('.form__item').removeClass('is-error');
            }
        } else {
            // 通常のフィールド
            if ($input.val()) {
                $input.closest('.form__item').removeClass('is-error');
            }
        }
    });

    jQuery(function ($) {
        // フォーム送信後のリダイレクト
        document.addEventListener('wpcf7mailsent', function (event) {
            window.location.href = 'http://sayum75.xsrv.jp/contact/thanks/'; // URLは環境に合わせて調整
        }, false);
    });



});