<?php
function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( // HTML5による出力
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');


/* CSSとJavaScriptの読み込み */
function my_script_init()
{ // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.1.min.js', "", "1.0.1");
    // googleFont
    wp_enqueue_style(
        'gotu-font',
        'https://fonts.googleapis.com/css2?family=Gotu&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'lato-font',
        'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'noto-sans-jp-font',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap',
        array(),
        null
    );
    // SplideのCSS
    wp_enqueue_style(
        'splide-css',
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css',
        array(),
        '4.1.4'
    );

    // SplideのJS
    wp_enqueue_script(
        'splide-cdn-js',
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js',
        array(), // 依存ファイルがなければ空でOK
        '4.1.4',
        true // フッターで読み込む（trueで</body>直前）
    );
    // CSSとJavaScript
    wp_enqueue_script('inview-js', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('splide-init-js', get_template_directory_uri() . '/assets/js/indexsplide.js', array('jquery', 'splide-cdn-js'), '1.0.1', true);
    wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1');
}
add_action('wp_enqueue_scripts', 'my_script_init');

// campaign/voiceの１ページの表示数　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
function custom_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query()) {

        // campaign のアーカイブまたはタクソノミー
        if (is_post_type_archive('campaign') || is_tax('campaign_category')) {
            $query->set('posts_per_page', 4);
        }

        // voice のアーカイブまたはタクソノミー
        if (is_post_type_archive('voice') || is_tax('voice_category')) {
            $query->set('posts_per_page', 6);
        }
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');



// ページナビゲーション　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
add_filter('wp_pagenavi', 'custom_pagenavi_html');

function custom_pagenavi_html($html)
{
    // 現在ページ
    $html = str_replace('class="current"', 'class="pagenavi__number current" aria-current="page"', $html);

    // page smaller / larger
    $html = str_replace('class="page smaller"', 'class="pagenavi__number"', $html);
    $html = str_replace('class="page larger"', 'class="pagenavi__number pagenavi__number--pc"', $html);
    $html = str_replace('class="page"', 'class="pagenavi__number"', $html);

    // 前・次リンク
    $html = str_replace('class="previouspostslink"', 'class="pagenavi__prev" aria-label="前のページ"', $html);
    $html = str_replace('class="nextpostslink"', 'class="pagenavi__next" aria-label="次のページ"', $html);


    return $html;
}

//Contact Form 7 セレクトボックスの選択肢をカスタム投稿のタイトルから自動生成　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

//関数の作成
function job_selectlist($tag, $unused)
{
    //セレクトボックスの名前が'select-job'かどうか
    if ($tag['name'] != 'your-select') {
        return $tag;
    }

    //get_posts()でセレクトボックスの中身を作成する
    //クエリの作成
    $args = array(
        'numberposts' => -1,
        'post_type' => 'campaign', //カスタム投稿タイプを指定
        //並び順⇒セレクトボックス内の表示順
        'orderby' => 'ID',
        'order' => 'ASC'
    );

    //クエリをget_posts()に入れる
    $job_posts = get_posts($args);

    //クエリがなければ戻す
    if (!$job_posts) {
        return $tag;
    }

    // ▼ 一番上に表示するプレースホルダーを追加（valueは空でOK）
    $tag['raw_values'][] = '';
    $tag['values'][]     = '';
    $tag['labels'][]     = 'キャンペーン内容を選択';

    //セレクトボックスにforeachで入れる
    foreach ($job_posts as $job_post) {
        $tag['raw_values'][] = $job_post->post_title;
        $tag['values'][] = $job_post->post_title;
        $tag['labels'][] = $job_post->post_title;
    }

    return $tag;
}

add_filter('wpcf7_form_tag', 'job_selectlist', 10, 2);

// ---------- 「投稿」の表記変更 ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
function Change_menulabel()
{
    global $menu;
    global $submenu;
    $name = 'ブログ';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name . '一覧';
    $submenu['edit.php'][10][0] = '新規' . $name . '投稿';
}
function Change_objectlabel()
{
    global $wp_post_types;
    $name = 'ブログ';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = _x('追加', $name);
    $labels->add_new_item = $name . 'の新規追加';
    $labels->edit_item = $name . 'の編集';
    $labels->new_item = '新規' . $name;
    $labels->view_item = $name . 'を表示';
    $labels->search_items = $name . 'を検索';
    $labels->not_found = $name . 'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');

// 投稿が表示されたときにビュー数をカウント　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
if (! function_exists('set_post_views')) {
    function set_post_views($postID)
    {
        $count_key = 'post_views_count';
        $count     = get_post_meta($postID, $count_key, true);

        if ($count === '') {
            $count = 1;
            add_post_meta($postID, $count_key, $count);
        } else {
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
}

// 投稿単体ページでのみカウント実行
if (! function_exists('track_post_views')) {
    function track_post_views($post_id)
    {
        if (! is_single()) {
            return;
        }

        if (empty($post_id)) {
            global $post;
            if (isset($post) && $post instanceof WP_Post) {
                $post_id = $post->ID;
            } else {
                return;
            }
        }

        set_post_views($post_id);
    }
}
add_action('wp_head', 'track_post_views');
