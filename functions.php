<?php

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Персональные настройки сайта',
        'menu_title' => 'Персональные настройки сайта',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'parent_slug' => '',
        'position' => false,
        'icon_url' => false,
        'redirect' => false
    ));
}

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('main_size', 1254, 696, true); // Custom Main Size Thumbnail
    add_image_size('medium_size', 640, 356, true); // Custom Medium Size Thumbnail
    add_image_size('medium_size_square', 640, 640, true); // Custom Medium Size Square Thumbnail
    add_image_size('medium_size_square_sm', 480, 480, true); // Custom Medium Size Square-Small Thumbnail
    add_image_size('small_size_square', 240, 240, true); // Custom Small Size Square Thumbnail

    // using the_post_thumbnail('main_size'); ...

    update_option('thumbnail_size_w', 100);
    update_option('thumbnail_size_h', 100);
    update_option('medium_size_w', 320);
    update_option('medium_size_h', 320);
    update_option('large_size_w', 0);
    update_option('large_size_h', 0);

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('ninjatheme', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Navigation
function ninjatheme_nav()
{
    wp_nav_menu(
        array(
            'theme_location' => 'header_menu',
            'menu' => '',
            'container' => false,
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'main_nav_menu clearfix',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => new My_Walker_Nav_Menu()
        )
    );
}

// Services Custom Navigation
function ninjatheme_services_nav()
{
    wp_nav_menu(
        array(
            'theme_location' => 'services_side_menu',
            'menu' => '',
            'container' => false,
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'sidebar_services_menu_list',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => '',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        )
    );
}

// Projects Custom Navigation
function ninjatheme_projects_nav()
{
    wp_nav_menu(
        array(
            'theme_location' => 'projects_side_menu',
            'menu' => '',
            'container' => false,
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'sidebar_projects_menu_list',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => '',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        )
    );
}

// Footer Navigation 1
function ninjatheme_footer_nav1()
{
    wp_nav_menu(
        array(
            'theme_location' => 'footer_menu_1',
            'menu' => '',
            'container' => false,
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'footer_menu_list',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => '',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        )
    );
}

// Footer Navigation 2
function ninjatheme_footer_nav2()
{
    wp_nav_menu(
        array(
            'theme_location' => 'footer_menu_2',
            'menu' => '',
            'container' => false,
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'footer_menu_list',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => '',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        )
    );
}

// Search Filter
function nt_search_filter($query)
{
    if ($query->is_search) {
        $query->set('post_type', array('post'));
    }
    return $query;
}

// Remove "Site" field in comment form
function ninjatheme_remove_url_field($fields)
{
    unset($fields['url']);
    return $fields;
}

// Change sub menu class
class My_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub_menu\">\n";
    }
}

// Change img quality
function ninjatheme_jpeg_quality($arg)
{
    return 100;
}

// Change "class" attribute for menu item
function rename_menu_css_class($text)
{
    $my_classes = array(
        'current-menu-item' => 'current_menu_item',
        'menu-item-has-children' => 'menu_item_has_children',
    );
    $text = str_replace(array_keys($my_classes), $my_classes, $text);
    return $text;
}

// Add Custom Post Type in main query & Set Posts Per Page for custom archives and taxonomies
function ninjatheme_post_queries($query)
{

    if (is_tax('services_categories') && $query->is_main_query()) {
        $query->set('post_type', array('post', 'page', 'services_post'));
        $query->set('posts_per_page', 6);
    }

    if (is_tax('projects_categories') && $query->is_main_query()) {
        $query->set('post_type', array('post', 'page', 'projects_post'));
        $query->set('posts_per_page', 6);
    }

    if (!is_admin() && $query->is_main_query()) {
        if (is_post_type_archive(array('services_post', 'projects_post'))) {
            $query->set('posts_per_page', 6);
        }
    }

    return $query;
}

// Reconnection Jquery script
function ninjatheme_scripts_method()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
}

// Load common scripts
function ninjatheme_common_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3.0', true);
        wp_enqueue_script('easing');

        wp_register_script('formstyler', get_template_directory_uri() . '/js/jquery.formstyler.min.js', array('jquery'), '2.0.0', true);
        wp_enqueue_script('formstyler');

        wp_register_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), '1.0.6', true);
        wp_enqueue_script('slicknav');

        wp_register_script('sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('sticky');

        wp_register_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.12.1', true);
        wp_enqueue_script('jquery-ui');

        wp_register_script('owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.1', true);
        wp_enqueue_script('owlcarousel');

        wp_register_script('viewportchecker', get_template_directory_uri() . '/js/jquery.viewportchecker.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('viewportchecker');

        wp_register_script('animatenumber', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', array('jquery'), '0.0.1', true);
        wp_enqueue_script('animatenumber');

        wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('custom');

        wp_register_script('current-device', get_template_directory_uri() . '/js/current-device.min.js', array('jquery'), '0.7.2', true);
        wp_enqueue_script('current-device');

        wp_register_script('gray', get_template_directory_uri() . '/js/jquery.gray.min.js', array('jquery'), '1.6.0', true);
        wp_enqueue_script('gray');

    }
}

// Load conditional scripts
function ninjatheme_conditional_scripts()
{
    if ((is_tax('projects_categories')) || (is_post_type_archive('projects_post')) || (is_tax('services_categories')) || (is_post_type_archive('services_post'))) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, false);
        wp_enqueue_script('jquery');
    }
}

// Load styles
function ninjatheme_styles()
{

    wp_register_style('ninjatheme', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('ninjatheme');
}

// Register Navigation
function ninjatheme_register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header_menu' => __('Главное меню в шапке', 'ninjatheme'), // Main Navigation
        'services_side_menu' => __('Боковое меню "Услуги"', 'ninjatheme'), // Sidebar Services Navigation
        'projects_side_menu' => __('Боковое меню "Работы"', 'ninjatheme'), // Sidebar Services Navigation
        'footer_menu_1' => __('Дополнительное меню 1 в подвале', 'ninjatheme'), // Footer Navigation 1
        'footer_menu_2' => __('Дополнительное меню 2 в подвале', 'ninjatheme'), // Footer Navigation 2
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {

    register_sidebar(array(
        'name' => __('Боковая панель в разделе "Услуги"', 'ninjatheme'),
        'description' => __('Произвольные блоки, расположенные в боковой панели в разделе "Услуги"', 'ninjatheme'),
        'id' => 'services_widget_area',
        'before_widget' => '<div id="%1$s" class="sidebar_box sidebar_sample_block">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Боковая панель в разделе "Работы"', 'ninjatheme'),
        'description' => __('Произвольные блоки, расположенные в боковой панели в разделе "Работы"', 'ninjatheme'),
        'id' => 'projects_widget_area',
        'before_widget' => '<div id="%1$s" class="sidebar_box sidebar_sample_block">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Боковая панель в разделе "Блог"', 'ninjatheme'),
        'description' => __('Произвольные блоки, расположенные в боковой панели в разделе "Блог"', 'ninjatheme'),
        'id' => 'blog_widget_area',
        'before_widget' => '<div id="%1$s" class="sidebar_box sidebar_sample_block">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Боковая панель на статичных страницах', 'ninjatheme'),
        'description' => __('Произвольные блоки, расположенные в боковой панели на статичных страницах', 'ninjatheme'),
        'id' => 'pages_widget_area',
        'before_widget' => '<div id="%1$s" class="sidebar_box sidebar_sample_block">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2>'
    ));

}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Create 40 Word Callback for Index page Excerpts, call using ninjatheme_excerpt('ninjatheme_index');
function ninjatheme_index($length)
{
    return 40;
}

// Create 40 Word Callback for Custom Post Excerpts, call using ninjatheme_excerpt('ninjatheme_custom_post');
function ninjatheme_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function ninjatheme_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function ninjatheme_view_article($more)
{
    global $post;
    return ' ... <a class="view_article" href="' . get_permalink($post->ID) . '">' . __('Читать далее', 'ninjatheme') . '</a>';
}

// Remove 'text/css' from our enqueued stylesheet
function ninjatheme_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

function my_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'main_size' => 'Основной размер',
        'medium_size' => 'Средний прямоугольный',
        'medium_size_square' => 'Средний квадратный',
        'medium_size_square_sm' => 'Средний квадратный мини',
        'small_size_square' => 'Маленький квадратный',
    ));
}

// Custom Gravatar in Settings > Discussion
function ninjathemegravatar($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function ninjathemecomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>

    <<?php echo $tag ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

    <?php if ('div' != $args['style']) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment_body">
<?php endif; ?>

    <div class="comment_ava">
        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $size = '100'); ?>
    </div> <!-- /.comment_ava -->

    <div class="comment_content">
        <div class="comment_top">

            <div class="comment_author vcard">
                <?php printf(__('<div class="fn">%s</div>'), get_comment_author_link()) ?>
            </div>

            <div class="comment_meta"><a
                        href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
                    <?php
                    printf(__('%1$s, %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', '');
                ?>
            </div>

            <div class="reply">
                <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>

        </div> <!-- /.comment_top -->

        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment_awaiting_moderation"><?php _e('Ваш комментарий ожидает модерации.') ?></em>
        <?php endif; ?>

        <div class="comment_bottom">
            <?php comment_text() ?>
        </div> <!-- /.comment_bottom -->

    </div> <!-- /.comment_content -->

    <?php if ('div' != $args['style']) : ?>
    </div>
<?php endif; ?>

<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'ninjatheme_common_scripts'); // Add Custom Scripts to wp_head
add_action('init', 'ninjatheme_register_menu'); // Add Menu
add_action('wp_print_scripts', 'ninjatheme_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'ninjatheme_scripts_method');
add_action('wp_enqueue_scripts', 'ninjatheme_styles'); // Add Theme Stylesheet
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('pre_get_posts', 'ninjatheme_post_queries'); // Add CPT in main query for custom taxonomies & Override the number of posts on the Custom Post Type archive page

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('document_title_separator', function () {
    return ' | ';
});
add_filter('avatar_defaults', 'ninjathemegravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'ninjatheme_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'ninjatheme_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('image_size_names_choose', 'my_custom_sizes');
add_filter('nav_menu_css_class', 'rename_menu_css_class');
add_filter('comment_form_default_fields', 'ninjatheme_remove_url_field', 10, 1);
add_filter('jpeg_quality', 'ninjatheme_jpeg_quality'); // Change img quality
add_filter('pre_get_posts', 'nt_search_filter'); // Search Filter
add_filter('wpcf7_load_css', '__return_false'); // Dismiss loading Contact Form 7 styles
//add_filter('acf/settings/show_admin', '__return_false');

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('column', 'column_shortcode');
add_shortcode('one_column', 'one_column_shortcode');

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

function column_shortcode($atts, $content = '')
{
    extract(shortcode_atts(array('cols' => '2'), $atts));
    $content = parse_shortcode_content($content);
    $output = "<div class='content_col content_col$cols'>$content</div>";
    return $output;
}

function one_column_shortcode($atts, $content = '')
{
    extract(shortcode_atts(array(), $atts));
    $content = parse_shortcode_content($content);
    $output = "<div class='one_col'>$content</div>";
    return $output;
}

function parse_shortcode_content($content)
{
    $content = trim(wpautop(do_shortcode($content)));
    if (substr($content, 0, 4) == '</p>')
        $content = substr($content, 4);
    if (substr($content, -3, 3) == '<p>')
        $content = substr($content, 0, -3);
    $content = str_replace(array('<p></p>'), '', $content);
    return $content;
}

/**
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * @param string [$sep  = '']      Разделитель. По умолчанию ' » '
 * @param array  [$l10n = array()] Для локализации. См. переменную $default_l10n.
 * @param array  [$args = array()] Опции. См. переменную $def_args
 * @return string Выводит на экран HTML код
 *
 * version 3.3.2
 */
function kama_breadcrumbs($sep = ' / ', $l10n = array(), $args = array())
{
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs($sep, $l10n, $args);
}

class Kama_Breadcrumbs
{

    public $arg;

    // Локализация
    static $l10n = array(
        'home' => 'Главная',
        'paged' => 'Страница %d',
        '_404' => 'Ошибка 404',
        'search' => 'Результаты поиска по запросу: «%s»',
        'author' => 'Архив автора: <b>%s</b>',
        'year' => 'Архив за <b>%d</b> год',
        'month' => 'Архив за: <b>%s</b>',
        'day' => '',
        'attachment' => 'Медиа: %s',
        'tag' => 'Записи с тегом: «%s»',
        'tax_tag' => '%1$s из "%2$s" по тегу: «%3$s»',
        // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
        // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
    );

    // Параметры по умолчанию
    static $args = array(
        'on_front_page' => true,  // выводить крошки на главной странице
        'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
        'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
        'title_patt' => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
        'last_sep' => true,  // показывать последний разделитель, когда заголовок в конце не отображается
        'markup' => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
        // или можно указать свой массив разметки:
        // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
        'priority_tax' => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
        'priority_terms' => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
        // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
        // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
        // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
        'nofollow' => false, // добавлять rel=nofollow к ссылкам?

        // служебные
        'sep' => '',
        'linkpatt' => '',
        'pg_end' => '',
    );

    function get_crumbs($sep, $l10n, $args)
    {
        global $post, $wp_query, $wp_post_types;

        self::$args['sep'] = $sep;

        // Фильтрует дефолты и сливает
        $loc = (object)array_merge(apply_filters('kama_breadcrumbs_default_loc', self::$l10n), $l10n);
        $arg = (object)array_merge(apply_filters('kama_breadcrumbs_default_args', self::$args), $args);

        $arg->sep = '<span class="kb_sep">' . $arg->sep . '</span>'; // дополним

        // упростим
        $sep = &$arg->sep;
        $this->arg = &$arg;

        // микроразметка ---
        if (1) {
            $mark = &$arg->markup;

            // Разметка по умолчанию
            if (!$mark) $mark = array(
                'wrappatt' => '<div class="kama_breadcrumbs">%s</div>',
                'linkpatt' => '<a href="%s">%s</a>',
                'sep_after' => '',
            );
            // rdf
            elseif ($mark === 'rdf.data-vocabulary.org') $mark = array(
                'wrappatt' => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
                'linkpatt' => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
                'sep_after' => '</span>', // закрываем span после разделителя!
            );
            // schema.org
            elseif ($mark === 'schema.org') $mark = array(
                'wrappatt' => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
                'linkpatt' => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
                'sep_after' => '',
            );

            elseif (!is_array($mark))
                die(__CLASS__ . ': "markup" parameter must be array...');

            $wrappatt = $mark['wrappatt'];
            $arg->linkpatt = $arg->nofollow ? str_replace('<a ', '<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
            $arg->sep .= $mark['sep_after'] . "\n";
        }

        $linkpatt = $arg->linkpatt; // упростим

        $q_obj = get_queried_object();

        // может это архив пустой таксы?
        $ptype = null;
        if (empty($post)) {
            if (isset($q_obj->taxonomy))
                $ptype = &$wp_post_types[get_taxonomy($q_obj->taxonomy)->object_type[0]];
        } else $ptype = &$wp_post_types[$post->post_type];

        // paged
        $arg->pg_end = '';
        if (($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')))
            $arg->pg_end = $sep . sprintf($loc->paged, (int)$paged_num);

        $pg_end = $arg->pg_end; // упростим

        // ну, с богом...
        $out = '';

        if (is_front_page()) {
            return $arg->on_front_page ? sprintf($wrappatt, ($paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home)) : '';
        } // страница записей, когда для главной установлена отдельная страница.
        elseif (is_home()) {
            $out = $paged_num ? (sprintf($linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title)) . $pg_end) : esc_html($q_obj->post_title);
        } elseif (is_404()) {
            $out = $loc->_404;
        } elseif (is_search()) {
            $out = sprintf($loc->search, esc_html($GLOBALS['s']));
        } elseif (is_author()) {
            $tit = sprintf($loc->author, esc_html($q_obj->display_name));
            $out = ($paged_num ? sprintf($linkpatt, get_author_posts_url($q_obj->ID, $q_obj->user_nicename) . $pg_end, $tit) : $tit);
        } elseif (is_year() || is_month() || is_day()) {
            $y_url = get_year_link($year = get_the_time('Y'));

            if (is_year()) {
                $tit = sprintf($loc->year, $year);
                $out = ($paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit);
            } // month day
            else {
                $y_link = sprintf($linkpatt, $y_url, $year);
                $m_url = get_month_link($year, get_the_time('m'));

                if (is_month()) {
                    $tit = sprintf($loc->month, get_the_time('F'));
                    $out = $y_link . $sep . ($paged_num ? sprintf($linkpatt, $m_url, $tit) . $pg_end : $tit);
                } elseif (is_day()) {
                    $m_link = sprintf($linkpatt, $m_url, get_the_time('F'));
                    $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
                }
            }
        } // Древовидные записи
        elseif (is_singular() && $ptype->hierarchical) {
            $out = $this->_add_title($this->_page_crumbs($post), $post);
        } // Таксы, плоские записи и вложения
        else {
            $term = $q_obj; // таксономии

            // определяем термин для записей (включая вложения attachments)
            if (is_singular()) {
                // изменим $post, чтобы определить термин родителя вложения
                if (is_attachment() && $post->post_parent) {
                    $save_post = $post; // сохраним
                    $post = get_post($post->post_parent);
                }

                // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
                $taxonomies = get_object_taxonomies($post->post_type);
                // оставим только древовидные и публичные, мало ли...
                $taxonomies = array_intersect($taxonomies, get_taxonomies(array('hierarchical' => true, 'public' => true)));

                if ($taxonomies) {
                    // сортируем по приоритету
                    if (!empty($arg->priority_tax)) {
                        usort($taxonomies, function ($a, $b) use ($arg) {
                            $a_index = array_search($a, $arg->priority_tax);
                            if ($a_index === false) $a_index = 9999999;

                            $b_index = array_search($b, $arg->priority_tax);
                            if ($b_index === false) $b_index = 9999999;

                            return ($b_index === $a_index) ? 0 : ($b_index < $a_index ? 1 : -1); // меньше индекс - выше
                        });
                    }

                    // пробуем получить термины, в порядке приоритета такс
                    foreach ($taxonomies as $taxname) {
                        if ($terms = get_the_terms($post->ID, $taxname)) {
                            // проверим приоритетные термины для таксы
                            $prior_terms = &$arg->priority_terms[$taxname];
                            if ($prior_terms && count($terms) > 2) {
                                foreach ((array)$prior_terms as $term_id) {
                                    $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                                    $_terms = wp_list_filter($terms, array($filter_field => $term_id));

                                    if ($_terms) {
                                        $term = array_shift($_terms);
                                        break;
                                    }
                                }
                            } else
                                $term = array_shift($terms);

                            break;
                        }
                    }
                }

                if (isset($save_post)) $post = $save_post; // вернем обратно (для вложений)
            }

            // вывод

            // все виды записей с терминами или термины
            if ($term && isset($term->term_id)) {
                $term = apply_filters('kama_breadcrumbs_term', $term);

                // attachment
                if (is_attachment()) {
                    if (!$post->post_parent)
                        $out = sprintf($loc->attachment, esc_html($post->post_title));
                    else {
                        if (!$out = apply_filters('attachment_tax_crumbs', '', $term, $this)) {
                            $_crumbs = $this->_tax_crumbs($term, 'self');
                            $parent_tit = sprintf($linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent));
                            $_out = implode($sep, array($_crumbs, $parent_tit));
                            $out = $this->_add_title($_out, $post);
                        }
                    }
                } // single
                elseif (is_single()) {
                    if (!$out = apply_filters('post_tax_crumbs', '', $term, $this)) {
                        $_crumbs = $this->_tax_crumbs($term, 'self');
                        $out = $this->_add_title($_crumbs, $post);
                    }
                } // не древовидная такса (метки)
                elseif (!is_taxonomy_hierarchical($term->taxonomy)) {
                    // метка
                    if (is_tag())
                        $out = $this->_add_title('', $term, sprintf($loc->tag, esc_html($term->name)));
                    // такса
                    elseif (is_tax()) {
                        $post_label = $ptype->labels->name;
                        $tax_label = $GLOBALS['wp_taxonomies'][$term->taxonomy]->labels->name;
                        $out = $this->_add_title('', $term, sprintf($loc->tax_tag, $post_label, $tax_label, esc_html($term->name)));
                    }
                } // древовидная такса (рибрики)
                else {
                    if (!$out = apply_filters('term_tax_crumbs', '', $term, $this)) {
                        $_crumbs = $this->_tax_crumbs($term, 'parent');
                        $out = $this->_add_title($_crumbs, $term, esc_html($term->name));
                    }
                }
            } // влоежния от записи без терминов
            elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $parent_link = sprintf($linkpatt, get_permalink($parent), esc_html($parent->post_title));
                $_out = $parent_link;

                // вложение от записи древовидного типа записи
                if (is_post_type_hierarchical($parent->post_type)) {
                    $parent_crumbs = $this->_page_crumbs($parent);
                    $_out = implode($sep, array($parent_crumbs, $parent_link));
                }

                $out = $this->_add_title($_out, $post);
            } // записи без терминов
            elseif (is_singular()) {
                $out = $this->_add_title('', $post);
            }
        }

        // замена ссылки на архивную страницу для типа записи
        $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype);

        if ('' === $home_after) {
            // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
            if ($ptype && $ptype->has_archive && !in_array($ptype->name, array('post', 'page', 'attachment'))
                && (is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)))
            ) {
                $pt_title = $ptype->labels->name;

                // первая страница архива типа записи
                if (is_post_type_archive() && !$paged_num)
                    $home_after = sprintf($this->arg->title_patt, $pt_title);
                // singular, paged post_type_archive, tax
                else {
                    $home_after = sprintf($linkpatt, get_post_type_archive_link($ptype->name), $pt_title);

                    $home_after .= (($paged_num && !is_tax()) ? $pg_end : $sep); // пагинация
                }
            }
        }

        $before_out = sprintf($linkpatt, home_url(), $loc->home) . ($home_after ? $sep . $home_after : ($out ? $sep : ''));

        $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg);

        $out = sprintf($wrappatt, $before_out . $out);

        return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg);
    }

    function _page_crumbs($post)
    {
        $parent = $post->post_parent;

        $crumbs = array();
        while ($parent) {
            $page = get_post($parent);
            $crumbs[] = sprintf($this->arg->linkpatt, get_permalink($page), esc_html($page->post_title));
            $parent = $page->post_parent;
        }

        return implode($this->arg->sep, array_reverse($crumbs));
    }

    function _tax_crumbs($term, $start_from = 'self')
    {
        $termlinks = array();
        $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
        while ($term_id) {
            $term = get_term($term_id, $term->taxonomy);
            $termlinks[] = sprintf($this->arg->linkpatt, get_term_link($term), esc_html($term->name));
            $term_id = $term->parent;
        }

        if ($termlinks)
            return implode($this->arg->sep, array_reverse($termlinks)) /*. $this->arg->sep*/ ;
        return '';
    }

    // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
    function _add_title($add_to, $obj, $term_title = '')
    {
        $arg = &$this->arg; // упростим...
        $title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
        $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

        // пагинация
        if ($arg->pg_end) {
            $link = $term_title ? get_term_link($obj) : get_permalink($obj);
            $add_to .= ($add_to ? $arg->sep : '') . sprintf($arg->linkpatt, $link, $title) . $arg->pg_end;
        } // дополняем - ставим sep
        elseif ($add_to) {
            if ($show_title)
                $add_to .= $arg->sep . sprintf($arg->title_patt, $title);
            elseif ($arg->last_sep)
                $add_to .= $arg->sep;
        } // sep будет потом...
        elseif ($show_title)
            $add_to = sprintf($arg->title_patt, $title);

        return $add_to;
    }

}

/**
 * Изменения:
 * 3.3 - новые хуки: attachment_tax_crumbs, post_tax_crumbs, term_tax_crumbs. Позволяют дополнить крошки таксономий.
 * 3.2 - баг с разделителем, с отключенным 'show_term_title'. Стабилизировал логику.
 * 3.1 - баг с esc_html() для заголовка терминов - с тегами получалось криво...
 * 3.0 - Обернул в класс. Добавил опции: 'title_patt', 'last_sep'. Доработал код. Добавил пагинацию для постов.
 * 2.5 - ADD: Опция 'show_term_title'
 * 2.4 - Мелкие правки кода
 * 2.3 - ADD: Страница записей, когда для главной установлена отделенная страница.
 * 2.2 - ADD: Link to post type archive on taxonomies page
 * 2.1 - ADD: $sep, $loc, $args params to hooks
 * 2.0 - ADD: в фильтр 'kama_breadcrumbs_home_after' добавлен четвертый аргумент $ptype
 * 1.9 - ADD: фильтр 'kama_breadcrumbs_default_loc' для изменения локализации по умолчанию
 * 1.8 - FIX: заметки, когда в рубрике нет записей
 * 1.7 - Улучшена работа с приоритетными таксономиями.
 */

/* постраничная навигация */
function kama_pagenavi($before = '', $after = '', $echo = true, $args = array(), $wp_query = null)
{
    if (!$wp_query) {
        wp_reset_query();
        global $wp_query;
    }

    // параметры по умолчанию
    $default_args = array(
        'text_num_page' => 'Страницы: ', // Текст перед пагинацией. {current} - текущая; {last} - последняя (пр. 'Страница {current} из {last}' получим: "Страница 4 из 60" )
        'num_pages' => 5, // сколько ссылок показывать
        'step_link' => 0, // ссылки с шагом (значение - число, размер шага (пр. 1,2,3...10,20,30). Ставим 0, если такие ссылки не нужны.
        'dotright_text' => '...', // промежуточный текст "до".
        'dotright_text2' => '...', // промежуточный текст "после".
        'back_text' => '« назад', // текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
        'next_text' => 'вперед »', // текст "перейти на следующую страницу". Ставим 0, если эта ссылка не нужна.
        'first_page_text' => '0', // текст "к первой странице". Ставим 0, если вместо текста нужно показать номер страницы.
        'last_page_text' => '0', // текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
    );

    $default_args = apply_filters('kama_pagenavi_args', $default_args); // чтобы можно было установить свои значения по умолчанию

    $args = array_merge($default_args, $args);

    extract($args);

    $posts_per_page = (int)$wp_query->get('posts_per_page');
    $paged = (int)$wp_query->get('paged');
    $max_page = $wp_query->max_num_pages;

    //проверка на надобность в навигации
    if ($max_page <= 1)
        return false;

    if (empty($paged) || $paged == 0)
        $paged = 1;

    $pages_to_show = intval($num_pages);
    $pages_to_show_minus_1 = $pages_to_show - 1;

    $half_page_start = floor($pages_to_show_minus_1 / 2); //сколько ссылок до текущей страницы
    $half_page_end = ceil($pages_to_show_minus_1 / 2); //сколько ссылок после текущей страницы

    $start_page = $paged - $half_page_start; //первая страница
    $end_page = $paged + $half_page_end; //последняя страница (условно)

    if ($start_page <= 0)
        $start_page = 1;
    if (($end_page - $start_page) != $pages_to_show_minus_1)
        $end_page = $start_page + $pages_to_show_minus_1;
    if ($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = (int)$max_page;
    }

    if ($start_page <= 0)
        $start_page = 1;

    //выводим навигацию
    $out = '';

    // создаем базу чтобы вызвать get_pagenum_link один раз
    $link_base = str_replace(99999999, '___', get_pagenum_link(99999999));
    $first_url = get_pagenum_link(1);
    if (false === strpos($first_url, '?'))
        $first_url = user_trailingslashit($first_url);

    $out .= $before . "<div class='wp-pagenavi'>\n";

    if ($text_num_page) {
        $text_num_page = preg_replace('!{current}|{last}!', '%s', $text_num_page);
        $out .= sprintf("<span class='pages'>$text_num_page</span> ", $paged, $max_page);
    }
    // назад
    if ($back_text && $paged != 1)
        $out .= '<a class="prev" href="' . (($paged - 1) == 1 ? $first_url : str_replace('___', ($paged - 1), $link_base)) . '">' . $back_text . '</a> ';
    // в начало
    if ($start_page >= 2 && $pages_to_show < $max_page) {
        $out .= '<a class="first" href="' . $first_url . '">' . ($first_page_text ? $first_page_text : 1) . '</a> ';
        if ($dotright_text && $start_page != 2) $out .= '<span class="extend">' . $dotright_text . '</span> ';
    }
    // пагинация
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $paged)
            $out .= '<span class="current">' . $i . '</span> ';
        elseif ($i == 1)
            $out .= '<a href="' . $first_url . '">1</a> ';
        else
            $out .= '<a href="' . str_replace('___', $i, $link_base) . '">' . $i . '</a> ';
    }

    //ссылки с шагом
    $dd = 0;
    if ($step_link && $end_page < $max_page) {
        for ($i = $end_page + 1; $i <= $max_page; $i++) {
            if ($i % $step_link == 0 && $i !== $num_pages) {
                if (++$dd == 1)
                    $out .= '<span class="extend">' . $dotright_text2 . '</span> ';
                $out .= '<a href="' . str_replace('___', $i, $link_base) . '">' . $i . '</a> ';
            }
        }
    }
    // в конец
    if ($end_page < $max_page) {
        if ($dotright_text && $end_page != ($max_page - 1))
            $out .= '<span class="extend">' . $dotright_text2 . '</span> ';
        $out .= '<a class="last" href="' . str_replace('___', $max_page, $link_base) . '">' . ($last_page_text ? $last_page_text : $max_page) . '</a> ';
    }
    // вперед
    if ($next_text && $paged != $end_page)
        $out .= '<a class="next" href="' . str_replace('___', ($paged + 1), $link_base) . '">' . $next_text . '</a> ';

    $out .= "</div>" . $after . "\n";

    $out = apply_filters('kama_pagenavi', $out);

    if ($echo)
        return print $out;

    return $out;
}

function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return ' Просмотров: ' . $count;
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyBtMm0LWOLES1BfkJOxyQ3jAKaf6S_jjFA');
}

add_action('acf/init', 'my_acf_init');

?>
