<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_ADDON_DIR."/newtheme/modules/newtheme/woe.php");

# echo "<pre>";
# var_dump($castles[0]);
?>

  <!-- Section: WoE ------------------------------------------------->
  <div id="newtheme-woe" class="newtheme-sections">
    <div class="container-fluid">
      <div class="section-title">
        <h2>Agit Holders</h2>
      </div>
      <div class="woe-box">
        <div class="woe-center">
          <div class="timer-block">
            <span class="timer-d">01</span><span class="timer-colon">:</span><span class="timer-h">01</span><span class="timer-colon">:</span><span class="timer-m">01</span><span class="timer-colon">:</span><span class="timer-s">01</span>
          </div>
          <div class="schedule-block">
            <?php foreach ($woe_schedule as $day => $woe_time) {
              echo '<div class="line"><span>'.$day.'</span><span>';
              $idx = 0;
              foreach ($woe_time as $time) {
                if($idx > 0) echo " / ";
                echo $time;
                $idx++;
              }
              echo '</span></div>';
            }?>
          </div>
          <div class="schedule-block koe-block">
            <?php foreach ($koe_schedule as $day => $koe_time) {
              echo '<div class="line"><span>'.$day.'</span><span>';
              foreach ($koe_time as $key => $time) {
                if($key > 0) echo " / ";
                echo $time;
              }
              echo '</span></div>';
            }?>
          </div>
        </div>
        <div id="woe-flags">
        <?php for ($i=0; $i < count($castles); $i+=6):  // load all the available guilds ?>
        <div class="woe-flags-box">
          <div class="woe-left">
          <?php $c = 1; ?>
          <?php for ($j=$i; $j < ($i+3); $j++):  // load only 3 castles ?>
            <?php if(isset($castles[$j])): ?>
              <?php if(! empty($castles[$j]['link'])): ?>
                <a class="woe-flag flag-<?php echo $c; ?>" href="<?php echo $castles[$j]['link']; ?>">
              <?php else: ?>
                <a class="woe-flag flag-<?php echo $c; ?>">
              <?php endif; ?>
                <div class="woe-emblem">
                  <?php if($castles[$j]['emblem']): ?>
                  <img src="<?php echo $this->emblem($castles[$j]['gid']) ?>"
                    alt="" data-toggle="tooltip" data-placement="right" data-html="true" title="<?php echo $castles[$j]['tooltip']; ?>"/>
                  <?php else: ?>
                  <img src="<?php echo $this->themePath('includes/img/woe/emblem2.png') ?>"
                    alt="" data-toggle="tooltip" data-placement="right" data-html="true" title="<?php echo $castles[$j]['tooltip']; ?>"/>
                  <?php endif; ?>
                </div>
                <div class="woe-info">
                  <div class="line"><span>Castle Name:</span> <span><?php echo $castles[$j]['castle']; ?></span></div>
                  <div class="line"><span>Guild Name:</span> <span><?php echo $castles[$j]['owner']; ?></span></div>
                  <div class="line"><span>Guild Leader:</span> <span><?php echo $castles[$j]['leader']; ?></span></div>
                </div>
              </a>
            <?php endif; ?>
          <?php $c++; ?>
          <?php endfor; ?>
          </div>
          <div class="woe-right">
          <?php $c = 1; ?>
          <?php for ($j=$i; $j < ($i+3); $j++):  // load only 3 castles ?>
            <?php if(isset($castles[$j])): ?>
              <?php if(! empty($castles[$j]['link'])): ?>
                <a class="woe-flag flag-<?php echo $c; ?>" href="<?php echo $castles[$j]['link']; ?>">
              <?php else: ?>
                <a class="woe-flag flag-<?php echo $c; ?>">
              <?php endif; ?>
                <div class="woe-emblem">
                  <?php if($castles[$j]['emblem']): ?>
                  <img src="<?php echo $this->emblem($castles[$j]['gid']) ?>"
                    alt="" data-toggle="tooltip" data-placement="right" data-html="true" title="<?php echo $castles[$j]['tooltip']; ?>"/>
                  <?php else: ?>
                  <img src="<?php echo $this->themePath('includes/img/woe/emblem2.png') ?>"
                    alt="" data-toggle="tooltip" data-placement="right" data-html="true" title="<?php echo $castles[$j]['tooltip']; ?>"/>
                  <?php endif; ?>
                </div>
                <div class="woe-info">
                  <div class="line"><span>Castle Name:</span> <span><?php echo $castles[$j]['castle']; ?></span></div>
                  <div class="line"><span>Guild Name:</span> <span><?php echo $castles[$j]['owner']; ?></span></div>
                  <div class="line"><span>Guild Leader:</span> <span><?php echo $castles[$j]['leader']; ?></span></div>
                </div>
              </a>
            <?php endif; ?>
          <?php $c++; ?>
          <?php endfor; ?>
          </div>
        </div>
        <?php endfor; ?>
        </div>
      </div>
    </div>
  </div>