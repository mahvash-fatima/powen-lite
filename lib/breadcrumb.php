<?php

if ( ! function_exists( 'powen_breadcrumb' ) ) :

    function powen_breadcrumb () {

        // Settings
        $id         = 'breadcrumbs';
        $class      = 'breadcrumbs';
        $home_title = esc_attr__('Homepage', 'powen-lite');

        // Get the query & post information
        global $post,$wp_query;
        $category = get_the_category();

        // Build the breadcrums
        echo '<ul id="' . $id . '" class="' . $class . '">';

        // Do not display on the homepage
        if ( !is_front_page() ) {

            // Home page
            echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url( get_home_url() ) . '" title="' . esc_attr( $home_title ) . '">' . esc_attr( $home_title ) . '</a></li>';
            echo '<li class="separator separator-home"></li>';

            if ( is_single() ) {

                // Single post (Only display the first category)
                echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . esc_url(get_category_link($category[0]->term_id )) . '" title="' . esc_attr( $category[0]->cat_name ) . '">' . $category[0]->cat_name . '</a></li>';
                echo '<li class="separator separator-' . $category[0]->term_id . '"></li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . get_the_title() . '</strong></li>';

            } else if ( is_category() ) {

                // Category page
                echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';

            } else if ( is_page() ) {

                // Standard page
                if( $post->post_parent ){

                    // If child page, get parents
                    $anc = get_post_ancestors( $post->ID );

                    // Get parents in the right order
                    $anc = array_reverse($anc);

                    // Parent page loop
                    foreach ( $anc as $ancestor ) {
                        $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . esc_url( get_permalink($ancestor) ) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                        $parents .= '<li class="separator separator-' . $ancestor . '"></li>';
                    }

                    // Display parent pages
                    echo $parents;

                    // Current page
                    echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

                } else {

                    // Just display current page if not parents
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

                }

            } else if ( is_tag() ) {

                // Tag page

                // Get tag information
                $term_id = get_query_var('tag_id');
                $taxonomy = 'post_tag';
                $args ='include=' . $term_id;
                $terms = get_terms( $taxonomy, $args );

                // Display the tag name
                echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';

            } elseif ( is_day() ) {

                // Day archive

                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . esc_url( get_the_time('Y') ) . '" title="' . esc_attr( get_the_time('Y') ) . '">' . sprintf( __( '%s', 'powen-lite' ), get_the_time('Y') ). __( 'Archives', 'powen-lite' ) . '</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"></li>';

                // Month link
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . esc_url( get_month_link( get_the_time('Y') ), get_the_time('m') ) . '" title="' . esc_attr( get_the_time('M') ) . '">' . sprintf( __( '%s', 'powen-lite' ), get_the_time('M') ) .  __( 'Archives', 'powen-lite' ) . '</a></li>';
                echo '<li class="separator separator-' . get_the_time('m') . '"></li>';

                // Day display
                echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . sprintf( __( '%s', 'powen-lite' ), get_the_time('jS') ) . ' ' . sprintf( __( '%s', 'powen-lite' ), get_the_time('M') ) . __( 'Archives', 'powen-lite' ) . '</strong></li>';

            } else if ( is_month() ) {

                // Month Archive

                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '" title="' . esc_attr( get_the_time('Y') ) . '">' . sprintf( __( '%s', 'powen-lite' ), get_the_time('Y') ) . __( 'Archives', 'powen-lite' ) . '</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"></li>';

                // Month display
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . esc_attr( get_the_time('M') ) . '">' . sprintf( __( '%s', 'powen-lite' ), get_the_time('M') ) . __( 'Archives', 'powen-lite' ) . '</strong></li>';

            } else if ( is_year() ) {

                // Display year archive
                echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . esc_attr( get_the_time('Y') ) . '">' . sprintf( __( '%s', 'powen-lite' ), get_the_time('Y') ) . __( 'Archives', 'powen-lite' ) . '</strong></li>';

            } else if ( is_author() ) {

                // Auhor archive

                // Get the author information
                global $author;
                $userdata = get_userdata( $author );

                // Display author name
                echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . esc_attr($userdata->display_name) . '">' . __( 'Author: ', 'powen-lite' ) . $userdata->display_name . '</strong></li>';

            } else if ( get_query_var('paged') ) {

                // Paginated archives
                echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . esc_attr( get_query_var('paged') ) . '">'.__( 'Page', 'powen-lite' ) . ' ' . get_query_var('paged') . '</strong></li>';

            } else if ( is_search() ) {

                // Search results page
                echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . esc_attr( get_search_query() ) . '">' . __('Search results for: ', 'powen-lite' ) . get_search_query() . '</strong></li>';

            } elseif ( is_404() ) {

                // 404 page
                echo '<li>' . __( 'Error 404', 'powen-lite' ) . '</li>';
            }

        }

        echo '</ul>';

    }

endif; //powen_breadcrumb

?>