<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_THEME_DIR.'/newtheme/includes/config.php');

include $this->themePath('main/sections/index.splash.php', true);
if(isset($config['enable_news_section']) && $config['enable_news_section'])
  include $this->themePath('main/sections/index.news.php', true);
if(isset($config['enable_woe_section']) && $config['enable_woe_section'])
  include $this->themePath('main/sections/index.woe.php', true);
if(isset($config['enable_ranker_section']) && $config['enable_ranker_section'])
  include $this->themePath('main/sections/index.ranker.php', true);
if(isset($config['enable_gallery_section']) && $config['enable_gallery_section'])
  include $this->themePath('main/sections/index.gallery.php', true);

?>