<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_THEME_DIR.'/newtheme/includes/config.php');
?>
  <?php if(!($params->get('module') == 'main' && $params->get('action') == 'index')): ?>
  </div></div></div>
  <?php endif; ?>

  <!-- Section: Footer --------------------------------------------->
  <div id="newtheme-footer" class="newtheme-sections">
    <div id="foot-top">
      <ul id="foot-menu-text">
        <?php foreach ($config['footer_links'] as $title => $links): ?>
          <li><a href="<?php echo $links; ?>"><?php echo $title; ?></a></li>
        <?php endforeach; ?>
      </ul>
      <div id="foot-top-right">
          <?php if(count(Flux::$appConfig->get('ThemeName', false)) > 1): ?>
            <div id="newtheme-theme-flux">
                <div class="form-group mb-0">
                <select id="theme_selector" class="form-control form-control-sm" name="preferred_theme" onchange="updatePreferredTheme(this)">
                  <?php foreach (Flux::$appConfig->get('ThemeName', false) as $themeName): ?>
                  <option value="<?php echo htmlspecialchars($themeName) ?>"<?php if ($session->theme == $themeName) echo ' selected="selected"' ?>><?php echo htmlspecialchars($themeName) ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <form action="<?php echo $this->urlWithQs ?>" method="post" name="preferred_theme_form" style="display: none">
                <input type="hidden" name="preferred_theme" value="" />
              </form>
            </div>
          <?php endif ?>
        <ul id="foot-menu-icons">
          <?php if(isset($config['footer_discord']) && !empty($config['footer_discord'])): ?>
          <li><a href="<?php echo $config['footer_discord']; ?>" id="btn-f-discord" class="btn-footer">&nbsp;</a></li>
          <?php endif; ?>
          <?php if(isset($config['footer_twitch']) && !empty($config['footer_twitch'])): ?>
          <li><a href="<?php echo $config['footer_twitch']; ?>" id="btn-f-twitch" class="btn-footer">&nbsp;</a></li>
          <?php endif; ?>
          <?php if(isset($config['footer_facebook']) && !empty($config['footer_facebook'])): ?>
          <li><a href="<?php echo $config['footer_facebook']; ?>" id="btn-f-facebook" class="btn-footer">&nbsp;</a></li>
          <?php endif; ?>
          <?php if(isset($config['footer_twitter']) && !empty($config['footer_twitter'])): ?>
          <li><a href="<?php echo $config['footer_twitter']; ?>" id="btn-f-twitter" class="btn-footer">&nbsp;</a></li>
          <?php endif; ?>
          <?php if(isset($config['footer_youtube']) && !empty($config['footer_youtube'])): ?>
          <li><a href="<?php echo $config['footer_youtube']; ?>" id="btn-f-youtube" class="btn-footer">&nbsp;</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <div id="foot-credits">
      <div id="credits-left">
        <ul id="foot-credits-logo">
          <li><img src="<?php echo $this->themePath('includes/img/footer/teen.jpg') ?>" alt="teen"></li>
          <li><a class="navbar-brand" href="<?php echo $this->url('main') ?>">
                <img src="<?php echo $this->themePath('includes/img/footer/logo.png') ?>" alt="logo">
          </a></li>
        </ul>
        <p><?php echo $config['footer_copyright_text']; ?></p>
      </div>

      <div id="credits-right">
        <p>Developed by:</p>
        <ul id="foot-credits-icons">
          <li><a href="https://renncgfx.com"><img src="<?php echo $this->themePath('includes/img/footer/rennc.png') ?>" /></a></li>
          <li><a href="https://discord.gg/v8eMwrC"><img src="<?php echo $this->themePath('includes/img/footer/nubs.png') ?>" /></a></li>
        </ul>
      </div>

    </div>

  </div>


</body>
</html>