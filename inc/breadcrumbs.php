<?php
/*

	Source: http://dimox.net/wordpress-breadcrumbs-without-a-plugin/

*/

if (!function_exists('breadcrumbs')) {
    function breadcrumbs() {

	/* === OPTIONS === */
	$text['location'] = __('', 'designinvento'); // text for the 'Home' link
	$text['home']     = jw_option('br_home') ? jw_option('br_home') : __('Home', 'designinvento'); // text for the 'Home' link
	$text['category'] = jw_option('br_category') ? jw_option('br_category').'" %s"' : __('Archive by Category "%s"', 'designinvento'); // text for a category page
	$text['search']   = jw_option('br_search') ? jw_option('br_search').'" %s"' : __('Search Results for "%s" query', 'designinvento'); // text for a search results page
	$text['tag']      = jw_option('br_tag') ? jw_option('br_tag').'" %s"' : __('Posts Tagged "%s"', 'designinvento'); // text for a tag page
	$text['author']   = jw_option('br_author') ? jw_option('br_author').' %s' : __('Articles Posted by %s', 'designinvento'); // text for an author page
	$text['404']      = jw_option('br_404') ? jw_option('br_404') : __('Error 404', 'designinvento'); // text for the 404 page

	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter   = '|'; // delimiter between crumbs
	$before      = '<span class="current">'; // tag before the current crumb
	$after       = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$homeLink = home_url() . '/';
	$linkBefore = '<span>';
	$linkAfter = '</span>';
	$linkAttr = '';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

        
        echo '<div id="crumbs" class="jw-breadcrumb pull-right"><span class="statictext">You are Here</span>:'.$text['location'];
        
	if (is_home() || is_front_page()) {

		if ($showOnHome == 1) echo '<span><a href="' . $homeLink . '">' . $text['home'] . '</a></span>';

	} else {

		echo sprintf($link, $homeLink, $text['home']) . $delimiter;

		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo esc_attr($cats);
			}
			echo esc_attr($before) . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo esc_attr($before) . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo esc_attr($before) . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo esc_attr($before) . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo esc_attr($before) . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $homeLink . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) echo esc_attr($delimiter) . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo esc_attr($cats);
				if ($showCurrent == 1) echo esc_attr($before) . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo esc_attr($before) . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
			$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
			echo esc_attr($cats);
			printf($link, get_permalink($parent), $parent->post_title);
			if ($showCurrent == 1) echo esc_attr($delimiter) . esc_attr($before) . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo esc_attr($before) . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo esc_attr($breadcrumbs[$i]);
				if ($i != count($breadcrumbs)-1) echo esc_attr($delimiter);
			}
			if ($showCurrent == 1) echo esc_attr($delimiter) . esc_attr($before) . get_the_title() . $after;

		} elseif ( is_tag() ) {
			echo esc_attr($before) . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo esc_attr($before) . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo esc_attr($before) . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page', 'designinvento') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}		

	}
        echo '</div>';
    } // end breadcrumbs()
} ?>