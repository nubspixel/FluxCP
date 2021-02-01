<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_ADDON_DIR."/newtheme/modules/newtheme/stats.php");
?>

  <!-- Section: Ranker ------------------------------------------------->
  <div id="newtheme-ranker" class="newtheme-sections">
    <div class="container-fluid">
      <div class="section-title">
        <h2>Best of the Best</h2>
      </div>
      <div class="row">
          <div id="ranker-render" class="col-12 col-md-5">
            <div id="render-1">&nbsp;</div>
            <div id="render-2">&nbsp;</div>
          </div>
          <div id="ranker-content" class="col-12 col-md-7">
            <p>
              <?php echo $config['ranker_text'] ?>
            </p>
          </div>
        </div>
        <div class="row justify-content-md-end">
          <div id="badge-box">
            <div class="badges badge-champ">
              <span>Player Name:</span><span><?php echo $bests[0] ?></span>
            </div>
            <div class="badges badge-jedi">
              <span>Player Name:</span><span><?php echo $bests[1] ?></span>
            </div>
            <div class="badges badge-knight">
              <span>Player Name:</span><span><?php echo $bests[2] ?></span>
            </div>
            <div class="badges badge-assassin">
              <span>Player Name:</span><span><?php echo $bests[3] ?></span>
            </div>
            <div class="badges badge-guild">
              <span>Guild Name:</span><span><?php echo $bests[4] ?></span>
            </div>
            <div class="badges badge-koe">
              <span>Guild Name:</span><span><?php echo $bests[5] ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>