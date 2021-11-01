<?php
//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );
//カスタムメニュー
register_nav_menu( 'header-nav',  ' ヘッダーナビゲーション ' );
register_nav_menu( 'footer-nav',  ' フッターナビゲーション ' );
//メニュー用jsの読み込み
function navbutton_scripts(){
  wp_enqueue_script( 'navbutton_script', get_template_directory_uri() .'/js/navbutton.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts' , 'navbutton_scripts' );
//サイドバーにウィジェット追加
function widgetarea_init() {
register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'side-widget',
    'before_widget'=>'<div id="%1$s" class="%2$s sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
    ));
}
add_action( 'widgets_init', 'widgetarea_init' );

if (function_exists('register_sidebar')) {
 
register_sidebar(array(
  'name' => 'ヘッダー内',
  'id' => 'header1',
  'description' => 'ヘッダー内に表示されるウィジェットです。',
  'before_widget' => '<div class="header_widget">',
  'after_widget' => '</div>',
  'before_title' => '',
  'after_title' => ''
));

}

function mytheme_comments($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>" class="comments-wrapper">
       <div class="comments-meta">
       <?php echo get_avatar( $comment, $args['avatar_size']) ?>
         <ul class="comments-meta-list">
           <li class="comments-author-name">
           <?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?>
           </li>
           <li class="comments-title">
           <?php
             $commentID_parent = $comment->comment_parent;
             if( $commentID_parent != 0 ):
           ?>
             <a href="<?php echo htmlspecialchars( get_comment_link( $commentID_parent ) ) ?>"><?php echo get_comment_author($commentID_parent); ?>さんへの返信</a>
           <?php else: ?>
             <a href="#top">「<?php the_title(); ?>」へのコメント</a>
           <?php endif; ?>
           <?php 
             if ($comment->comment_approved == '0') {
               echo '<span class="comments-approval">このコメントは承認待ちです。</span>';
             }
           ?>
           </li>
           <li class="comments-date">
             <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
             <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a>
 <span><?php edit_comment_link('（編集する）','','') ?></span>
           </li>
         </ul>
       </div>
       <!-- comment-meta -->
       <div class="comments-content">
         <?php comment_text() ?>
       </div>
       <div class="comments-reply">
         <?php comment_reply_link(array_merge( $args, array(
            'reply_text'=>'返信する', 
            'add_below' =>$add_below, 
            'depth' =>$depth, 
            'max_depth' =>$args['max_depth']))) 
         ?>
       </div>
     </div>
     <!-- comment-comment_ID -->
   <?php
}

function wp34731_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;

  return $fields;
}
add_filter( 'comment_form_fields', 'wp34731_move_comment_field_to_bottom' );