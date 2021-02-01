<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_THEME_DIR.'/newtheme/includes/config.php');
?>
  <!-- TopBar      ---------------------------------------------------->
  <div id="newtheme-topbar">
    <div class="topbar-left">
      <div class="status">
        <span class="grey">Players Online</span>
        <span class="white"><?php echo number_format($pc) ?></span>
      </div>
      <div class="status ml-3">
        <span class="grey">Online Population</span>
        <span class="white"><?php echo number_format($peak) ?></span>
      </div>
    </div>
    <div class="topbar-right">
      <div class="status">
        <span class="grey">Server Time</span>
        <span class="white"><span id="server-time"><span id="t-hours">12</span>:<span id="t-minutes">40</span>:<span id="t-seconds">49</span></span> GMT+8</span>
      </div>
    </div>
  </div>

  <nav id="newtheme-topnav" class="navbar fixed-top navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="<?php echo $this->url('main') ?>">
      <img src="<?php echo $this->themePath('includes/img/topbar/logo.png') ?>" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#newthemeTopBar" aria-controls="newthemeTopBar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="newthemeTopBar">
      <ul class="navbar-nav mr-auto">

      <?php
        $menuItems = $this->getMenuItems();
        if (!empty($menuItems)) {
          foreach($menuItems as $menuCategory => $menus) {
            if(!empty($menus)) {
              $cur_page = false;
              if($params->get('module') == $menus[0]['module'] && $params->get('action') == $menus[0]['action'])
                $cur_page = true;

              if(count($menus) == 1) { // only 1 in the group
                echo '<li class="nav-item '.($cur_page ? 'active' : '').'">';
                echo '<a class="nav-link" href="'.$menus[0]['url'].'">'.htmlspecialchars(Flux::message($menus[0]['name'])).' '.($cur_page ? '<span class="sr-only">(current)</span>' : '').'</a>';
                echo '</li>';
              } else {
                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle" href="#" id="info-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo htmlspecialchars(Flux::message($menuCategory));
                echo '</a>';
                echo '<div class="dropdown-menu" aria-labelledby="info-dropdown">';
                foreach ($menus as $menuItem) {
                  echo '<a class="dropdown-item" href="'.$menuItem['url'].'">'.htmlspecialchars(Flux::message($menuItem['name'])).'</a>';
                }
                echo '</div></li>';
              }
            }
          }
        }
        $adminMenuItems = $this->getAdminMenuItems();
        if (!empty($adminMenuItems) && Flux::config('AdminMenuNewStyle')) {
          echo '<li class="nav-item dropdown">';
          echo '<a class="nav-link dropdown-toggle" href="#" id="info-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
          echo 'Admin Menu</a><div class="dropdown-menu" aria-labelledby="info-dropdown">';
          foreach ($adminMenuItems as $menuItem) {
            echo '<a class="dropdown-item" href="'.$this->url($menuItem['module'], $menuItem['action']).'">'.htmlspecialchars(Fluz::message($menuItem['name'])).'</a>';
          }
          echo '</div></li>';
        }
      ?>
      </ul>
    </div>
  </nav>