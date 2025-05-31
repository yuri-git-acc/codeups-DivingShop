"use strict";

jQuery(function ($) {
  // MVアニメーション ------------------------------------

  $(function () {
    // セッションストレージからフラグを取得
    // セッションストレージはページをリロードしてもデータが保持されるが、 タブを閉じると消える。
    // 初回アクセス時と2回目以降で処理を分岐する
    var isFirstLoad = sessionStorage.getItem('isFirstLoad');

    // isFirstLoad が 'true' でない場合、 つまり初回アクセス時の処理を実行
    if (isFirstLoad !== 'true') {
      // 初回アクセス時の処理
      $('.js-loading').addClass('active');

      // .mv__left や.mv__right のアニメーション(animationend イベント) が終わったら処理を実行
      $(document).on("animationend", ".mv__left, .mv__right", function () {
        // setTimeout()を使い、 2秒後に.mv__left と.mv__rightを1秒かけてフェードアウト
        // フェードアウト後、 visibility: hidden;を設定してクリックなどの操作を無効化。
        setTimeout(function () {
          $('.mv__left').fadeOut(1000, function () {
            $(this).css('visibility', 'hidden');
          });
          $('.mv__right').fadeOut(1000, function () {
            $(this).css('visibility', 'hidden');
          });
          // .mv__copy と.mv__loading - bg にクラスを追加し、 デザインの変化やアニメーションを適用
          $('.mv__copy').addClass('mv__copy--after');
          $('.mv__loading-bg').addClass('mv__loading-bg--after');
          // .hidden クラスを削除し、 スライダー.js - splide - mv を表示
          $('.js-splide-mv.hidden').removeClass('hidden');
          // setTimeout を使い、 100 ms 後に Splide.js を初期化。
          setTimeout(function () {
            // Splideの初期化とスタート
            // .js - splide - mv が 存在するかチェックしてから.mount() を実行
            var splideEl = document.querySelector('.js-splide-mv');
            if (splideEl) {
              // 要素が存在する場合のみ初期化
              var mvSplide = new Splide(splideEl, {
                type: "fade",
                arrows: false,
                pagination: false,
                speed: 1000,
                interval: 5000,
                autoplay: true,
                rewind: true
              });
              mvSplide.mount();
            }
          }, 100); //　100 ms
          // 初回表示が終わった」 ことを記録するため、 isFirstLoad を 'true' に設定
          sessionStorage.setItem('isFirstLoad', 'true'); // フラグを保存
        }, 2000); //　2 秒後
      });
    } else {
      // 2回目以降のアクセス時の処理
      // 2 回目以降のアクセス時には、 アニメーションをスキップし、 すぐに表示状態へ
      $('.mv__left, .mv__right').css('visibility', 'hidden');
      $('.js-splide-mv.hidden').removeClass('hidden');
      $('.mv__copy').addClass('mv__copy--after');
      // Splideの初期化とスタート
      var splideEl = document.querySelector('.js-splide-mv');
      if (splideEl) {
        // ← ここを追加
        var mvSplide = new Splide(splideEl, {
          type: "fade",
          arrows: false,
          pagination: false,
          speed: 1000,
          interval: 5000,
          autoplay: true,
          rewind: true
        });
        mvSplide.mount();
      }
    }
  });

  // CampaignのSplideの初期化とスタート ------------------------------------
  $(document).ready(function () {
    // 要素があるか確認してから初期化
    var $campaignSplide = $('.js-splide-campaign');
    if ($campaignSplide.length) {
      var campaignSplide = new Splide('.js-splide-campaign', {
        arrows: false,
        pagination: false,
        type: "loop",
        gap: "2.5rem",
        fixedWidth: "20.8125rem",
        speed: 1000,
        interval: 5000,
        autoplay: true,
        padding: {
          left: 10,
          right: 0
        },
        breakpoints: {
          767: {
            arrows: false,
            fixedWidth: "17.5rem",
            gap: "1.5rem"
          }
        }
      }).mount();

      // イベントを一度解除してから再設定（重複防止）
      $('.splide__arrow--prev').off('click').on('click', function () {
        campaignSplide.go('<');
      });
      $('.splide__arrow--next').off('click').on('click', function () {
        campaignSplide.go('>');
      });
    }
  });
});