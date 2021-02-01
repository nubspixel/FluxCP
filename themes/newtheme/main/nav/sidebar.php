<?php if (!defined('FLUX_ROOT')) exit;
require_once FLUX_THEME_DIR.'/newtheme/includes/config.php';
?>
  <!-- SideBar     ---------------------------------------------------->
  <ul id="newtheme-sidenav" class="newtheme-sidenav">
    <?php if(isset($config['side_android']) && !empty($config['side_android'])): ?>
    <li class="" id="side-android">
      <a href="<?php echo $config['side_android'] ?>">
        <img src="<?php echo $this->themePath('includes/img/btn-android.png') ?>" alt="" />
        Android Installer
      </a>
    </li>
    <?php endif;?>
    <?php if(isset($config['side_discord']) && !empty($config['side_discord'])): ?>
    <li class="" id="side-discord">
      <a href="<?php echo $config['side_discord'] ?>">
        <img src="<?php echo $this->themePath('includes/img/btn-discord.png') ?>" alt="" />
        Discord
      </a>
    </li>
    <?php endif; ?>
    <?php if(isset($config['side_facebook']) && !empty($config['side_facebook'])): ?>
    <li class="" id="side-facebook">
      <a href="<?php echo $config['side_facebook'] ?>">
        <img src="<?php echo $this->themePath('includes/img/btn-facebook.png') ?>" alt="" />
        Facebook
      </a>
    </li>
    <?php endif; ?>
    <?php if(isset($config['side_rms']) && !empty($config['side_rms'])): ?>
    <li class="" id="side-rms">
      <a href="<?php echo $config['side_rms'] ?>">
        <img src="<?php echo $this->themePath('includes/img/btn-rms.png') ?>" alt="" />
        Review Us
      </a>
    </li>
    <?php endif; ?>
  </ul>