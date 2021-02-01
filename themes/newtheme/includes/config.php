<?php if (!defined('FLUX_ROOT')) exit;


# ==========================================================================================================
# [HTML Meta data]
# ==========================================================================================================
# This part handles the info for search engine. For example, it will display the additional infomation when you share your
# FluxCP links via Discord. This option is optional and thus there is no need to define this if you are not sure.
# However, we still provide you with a simple example.
$config['html_desc'] = "newtheme is a 255/100 High-Rate server fused with Star Wars experience.";
$config['html_author'] = "newtheme Admin";

# ==========================================================================================================
# [newtheme Preloader Animation]
# ==========================================================================================================
# the template may take some time to load and during this process, some parts might displayed in the wrong
# positions. And thus makes the template looks a bit weird. To prevent this disjointed feeling, the template
# also comes with a preloader animation. Which you can disable in the option below.
$config['enable_preloader_animation'] = true;

# ==========================================================================================================
# [newtheme Navigations]
# ==========================================================================================================
# Top navigation bar in this template displays the navigations that you have defined in the flux
# configuration settings in
#
#       config/application.php
#

# ==========================================================================================================
# [newtheme Main Section]
# ==========================================================================================================
# The main section or something we usually call it as splash section, are the top most part of the theme.
# This sections comes with 3 extra buttons and a login panel.
$config['splash_text'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat lorem ac nibh pharetra pretium. Donec in tellus erat. Ut vestibulum nisi eu nisi auctor ullamcorper. <br /><br />Sed rhoncus nulla massa, non sagittis tellus placerat id. Nulla eget mauris eu turpis malesuada vehicula. Suspendisse sem arcu, malesuada sit amet ante nec, vehicula hendrerit tortor. Aliquam vitae euismod nibh. Vestibulum vulputate a nulla in ullamcorper. Cras nec euismod augue. Proin suscipit risus quis quam vulputate, a finibus lectus laoreet. Sed vel nisl tempor, bibendum urna in, feugiat tortor. Phasellus laoreet sem a pellentesque lacinia. Integer et sem commodo, lobortis arcu id, maximus orci. Sed vel arcu ex. Ut at dui eros. Vestibulum condimentum pharetra porta.";
$config['play_video'] = "https://www.youtube.com/watch?v=0ERXMQJ1OJM";
$config['download_btn'] = "https://www.google.com";
$config['register_btn'] = "https://www.google.com";

# ==========================================================================================================
# [newtheme News Section]
# ==========================================================================================================
# The following configurations are use to define the news to automatically fetch using RSS feed.
#
# This option is to disable the news sections
$config['enable_news_section'] = true;
#

# the 'category_name' defines the category title displayed in headings inside the "image"
# the 'category_img' defines the background image of that particular category
# the 'feed_url' defines the link of your RSS feed.
# The 'feed_type' defines what kind of RSS feed provided to the theme.
# For example, Invasion Power Board forum uses RSS. While, phpBB3 forum uses ATOM.
# You can test it on your feed links, if it doesn't show up, you can use the other type

$config['news_feed'] = array(
    array(
        'category_name'         => 'News',
        'feed_url'              => 'https://dark-ro.com/forum/rss/1-news-feed.xml/',
        'feed_type'             => 'rss',
    ),
    array(
        'category_name'         => 'Events',
        'feed_url'              => 'https://dark-ro.com/forum/rss/3-events-feed.xml/',
        'feed_type'             => 'rss',
    ),
    array(
        'category_name'         => 'Patch Notes',
        'feed_url'              => 'https://dark-ro.com/forum/rss/2-updates-feed.xml/',
        'feed_type'             => 'rss',
    ),
);
# ============ IMPORTANT! ============
# This feed system uses caching system. If you deleted a news on the feed source, the news on the website will
# still be displayed normally. To ensure the news in website is displayed correctly, please also delete
# the files inside the cache folder.
#
#       fluxCP/themes/newtheme/includes/fcache/*


# ==========================================================================================================
# [newtheme WoE Section]
# ==========================================================================================================
# This option is to disable the stats sections
$config['enable_woe_section'] = true;

# Find your timezone in here: https://www.php.net/manual/en/timezones.php
$config['timezone'] = 'Asia/Singapore';

# the woe schedules
# this option does not affects or use the one displayed in the FluxCP's WoE page:
#
#       flux/?module=woe
#
# this option is only use in the front page to display the WoE status
#
$config['woe_schedule'] = array(
    array(
        'castle_id' => array(0,1,6,7,11,12,29),         // please refer to config/castlenames.php
        'woe_start' => 'Wednesday 21:00:00',
        'woe_end'   => 'Wednesday 22:00:00',
        'link'      => 'https://www.google.com'         // leave empty to disable link
    ),
    array(
        'castle_id' => array(5,2,3,13,14,18,19,24,26),  // please refer to config/castlenames.php
        'woe_start' => 'Saturday 09:00:00',
        'woe_end'   => 'Saturday 10:00:00',
        'link'      => ''                               // leave empty to disable link
    ),
    array(
        'castle_id' => array(10,15,16,17,8,9,4,31,25),  // please refer to config/castlenames.php
        'woe_start' => 'Sunday 22:00:00',
        'woe_end'   => 'Sunday 23:00:00',
        'link'      => ''                               // leave empty to disable link
    ),
);

# this option does not involve any calculation. it only display as text in the woe section.
$config['koe_schedule'] = '07:00 / 14:00 / 21:00';

# ==========================================================================================================
# [newtheme Ranker Sections]
# ==========================================================================================================
# This option is to disable the stats sections
$config['enable_ranker_section'] = true;
$config['ranker_text'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat lorem ac nibh pharetra pretium. Donec in tellus erat. Ut vestibulum nisi eu nisi auctor ullamcorper. Sed rhoncus nulla massa, non sagittis tellus placerat id. Nulla eget mauris eu turpis malesuada vehicula. Suspendisse sem arcu, malesuada sit amet ante nec, vehicula hendrerit tortor. Aliquam vitae euismod nibh.";

# ==========================================================================================================
# [newtheme Gallery Sections]
# ==========================================================================================================
# This option is to disable the stats sections
$config['enable_gallery_section'] = true;
#
# This option defines the gallery details.
# Note1: Only 4 items are allowed.
# Note2: Leave the link part empty to disable the link
$config['gallery_details'] = array(
    array(
        'title' => 'Valkyrja, The Land of newtheme',
        'link' => 'https://www.newtheme-ro.net/main',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat lorem ac nibh pharetra pretium. Donec in tellus erat. Ut vestibulum nisi eu nisi auctor ullamcorper.',
        'img' => $this->themePath('includes/img/gallery/gallery-1.jpg')
    ),
    array(
        'title' => 'World Boss Guards',
        'link' => '',       # leave empty to disable link
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat lorem ac nibh pharetra pretium. Donec in tellus erat. Ut vestibulum nisi eu nisi auctor ullamcorper.',
        'img' => $this->themePath('includes/img/gallery/gallery-2.jpg')
    ),
    array(
        'title' => 'Sky Flower Market',
        'link' => '',       # leave empty to disable link
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat lorem ac nibh pharetra pretium. Donec in tellus erat. Ut vestibulum nisi eu nisi auctor ullamcorper.',
        'img' => $this->themePath('includes/img/gallery/gallery-3.jpg')
    ),
    array(
        'title' => 'Bunch of Porings',
        'link' => 'https://www.newtheme-ro.net/main',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat lorem ac nibh pharetra pretium. Donec in tellus erat. Ut vestibulum nisi eu nisi auctor ullamcorper.',
        'img' => $this->themePath('includes/img/gallery/gallery-4.jpg')
    ),
);


# ==========================================================================================================
# [newtheme Footer Sections]
# ==========================================================================================================
# The text 'Powered by FluxCP' is removed from this template.
# The render text details is also removed froom this template.
#
# As for the theme settings, leave only 'newtheme' in [ThemeName], if you wish to disable the theme select option
# If you wish to leave the option to change theme to the users, make sure 'newtheme' is the first option, example
#
#       'ThemeName' => array('newtheme', 'default', 'bootstrap'),
#
# Note: Names of the themes you would like list for use in the footer. Themes are in FLUX_ROOT/themes.
#
# This option controls the links inside the footer.
$config['footer_discord']   = "https://discord.com/invite/gjgYBnx";
$config['footer_twitch']    = "https://twitch.com/";
$config['footer_facebook']  = "https://www.facebook.com/groups/DRORebirth/";
$config['footer_twitter']   = "https://twitter.com/";
$config['footer_youtube']   = "https://www.youtube.com/watch?v=0ERXMQJ1OJM";

$config['footer_links'] = array(
    'Rules'                 => "https://www.newtheme-ro.net/forum/index.php?/forum/52-rules-regulations",
    'Forums'                => "https://www.newtheme-ro.net/forum",
    'Information'           => "https://www.newtheme-ro.net/main/?module=main&action=info",
);

$config['footer_copyright_text'] = "&copy; Copyright 2020 newtheme. <br />For Gamers By Gamers.";



?>