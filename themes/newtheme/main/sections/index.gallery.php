<?php if (!defined('FLUX_ROOT')) exit; ?>

  <!-- Section: Gallery------------------------------------------------->
  <div id="newtheme-gallery" class="newtheme-sections">
    <div class="gallery-items">
      <?php if($config['gallery_details'][0]['link']): ?>
      <a href="<?php echo $config['gallery_details'][0]['link'] ?>">
      <?php endif; ?>
        <img src="<?php echo $config['gallery_details'][0]['img'] ?>" class="gallery-item" />
        <div class="gallery-info">
          <div class="img-title"><?php echo $config['gallery_details'][0]['title'] ?></div>
          <p><?php echo $config['gallery_details'][0]['desc'] ?></p>
        </div>
      <?php if($config['gallery_details'][0]['link']): ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="gallery-items">
      <?php if($config['gallery_details'][1]['link']): ?>
      <a href="<?php echo $config['gallery_details'][1]['link'] ?>">
      <?php endif; ?>
        <img src="<?php echo $config['gallery_details'][1]['img'] ?>" class="gallery-item" />
        <div class="gallery-info">
          <div class="img-title"><?php echo $config['gallery_details'][1]['title'] ?></div>
          <p><?php echo $config['gallery_details'][1]['desc'] ?></p>
        </div>
      <?php if($config['gallery_details'][1]['link']): ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="gallery-items">
      <?php if($config['gallery_details'][2]['link']): ?>
      <a href="<?php echo $config['gallery_details'][2]['link'] ?>">
      <?php endif; ?>
        <img src="<?php echo $config['gallery_details'][2]['img'] ?>" class="gallery-item" />
        <div class="gallery-info">
          <div class="img-title"><?php echo $config['gallery_details'][2]['title'] ?></div>
          <p><?php echo $config['gallery_details'][2]['desc'] ?></p>
        </div>
      <?php if($config['gallery_details'][2]['link']): ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="gallery-items">
      <?php if($config['gallery_details'][3]['link']): ?>
      <a href="<?php echo $config['gallery_details'][3]['link'] ?>">
      <?php endif; ?>
        <img src="<?php echo $config['gallery_details'][3]['img'] ?>" class="gallery-item" />
        <div class="gallery-info">
          <div class="img-title"><?php echo $config['gallery_details'][3]['title'] ?></div>
          <p><?php echo $config['gallery_details'][3]['desc'] ?></p>
        </div>
      <?php if($config['gallery_details'][3]['link']): ?>
      </a>
      <?php endif; ?>
    </div>
  </div>