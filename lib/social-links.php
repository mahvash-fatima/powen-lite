<?php

/**
 * Social media items
 * @return array social sites array
 */

if ( ! function_exists( 'powen_customizer_social_media_array' ) ) :

    function powen_customizer_social_media_array()
    {
        // store social site names in array
        return apply_filters( 'powen_customizer_social_media_icons_array', array('phone', 'twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'vimeo', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'stumbleupon', 'skype', 'vine', 'yahoo', 'digg', 'drupal', 'soundcloud', 'flickr', 'delicious', 'instagram', 'whatsapp') );
    }

endif; //powen_customizer_social_media_array

/**
 * Needed for Fontawesome
 * takes user input from the customizer and outputs linked social media icons
 */

if ( ! function_exists( 'powen_social_media_icons' ) ) :

    function powen_social_media_icons()
    {
        $powen_social_sites = powen_customizer_social_media_array();

        /**
         * Hold an array of all active social urls entered by the user.
         * @var array
         */
        $active_sites = array();

        // any inputs that aren't empty are stored in $active_sites array
        foreach( $powen_social_sites as $key => $powen_social_site) {
            $social_url = powen_mod( $powen_social_site );
            if( trim($social_url) ) {
                $active_sites[$powen_social_site] = $social_url;
            }
        }

        // CREATE THE OUTPUT for each active social site, add it as a list item
        if( $active_sites ) { ?>
                <?php foreach ($active_sites as $site => $site_url ) : ?>
                    <div class="powen-social-icon">
                    <a href="<?php echo esc_url($site_url); ?>" target="new">
                    <?php if( $site == "vimeo") { ?>
                        <i class="fa fa-<?php echo $site; ?>-square"></i>
                        <?php } else { ?>
                        <i class="fa fa-<?php echo $site; ?>"></i>
                        <?php } ?>
                    </a>
                    </div>
                <?php endforeach; ?>
            <?php
        }
    }

endif; //powen_social_media_icons