<?php if (!defined('FLUX_ROOT')) exit; ?>

  <!-- Section: Splash------------------------------------------------->
  <div id="newtheme-splash" class="newtheme-sections">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7" id="splash-render">
              <div id="render-1">&nbsp;</div>
              <div id="render-2">&nbsp;</div>
            </div>
            <div class="col-12 col-md-6 col-lg-5" id="splash-content">
              <a class="" href="./">
                <img id="splash-logo" src="<?php echo $this->themePath('includes/img/splash/logo.png') ?>" alt="logo">
              </a>
              <p><?php echo $config['splash_text'] ?></p>
            <?php if(!empty($config['play_video'])): ?>
              <div id="btn-play">
                <a href="<?php echo $config['play_video'] ?>" data-lity>Play</a>
              </div>
            <?php endif; ?>

            <?php if(!empty($config['download_btn']) || !empty($config['register_btn'])): ?>
              <div id="btn-extra">
              <?php if(!empty($config['download_btn'])): ?>
                <a id="btn-download" href="<?php echo $config['download_btn'] ?>">Download</a>
              <?php endif; ?>
              <?php if(!empty($config['register_btn'])): ?>
                <a id="btn-register" href="<?php echo $config['register_btn'] ?>">Register</a>
              <?php endif; ?>
              </div>
            <?php endif; ?>
            </div>
        </div>
        <div class="row">
          <div class="cursor-container">
            <div class="chevron"></div>
            <div class="chevron"></div>
            <div class="chevron"></div>
          </div>
        </div>
    </div>
  </div>