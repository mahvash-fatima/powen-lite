<?php 
/*
 * THIS IS THE OTHER FUNC... SOCIAL MEDIA FUNCTION
 **/
function powen_customizer_social_media_array() {
    // ADD THE SOCIAL SITES
    // store social site names in array
    $powen_social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'vimeo', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram');
  
    return $powen_social_sites;
    }
    // NEEDED FOR FONTAWESOME
    // takes user input from the customizer and outputs linked social media icons
    function powen_social_media_icons() {
  
    $powen_social_sites = powen_customizer_social_media_array();
  
    // any inputs that aren't empty are stored in $active_sites array
    foreach($powen_social_sites as $powen_social_site) {
        if( strlen( get_theme_mod( $powen_social_site ) ) > 0 ) {
            $active_sites[] = $powen_social_site;
        }
    }
  
  
    // CREATE THE OUTPUT
    // for each active social site, add it as a list item
    if($active_sites) {
        echo "<ul class='social-media-icons'>";
        foreach ($active_sites as $active_site) {?>
    <li>
    <a href="<?php echo get_theme_mod( $active_site ); ?>" target="new">
    <?php if( $active_site == "vimeo") { ?>
            <i class="fa fa-<?php echo $active_site; ?>-square"></i> <?php
        } else { ?>
            <i class="fa fa-<?php echo $active_site; ?>"></i><?php
        } ?>
    </a>
    </li><?php
    }
    echo "</ul>";
    }
    }