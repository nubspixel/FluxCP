<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_THEME_DIR.'/newtheme/includes/Feed.php');
?>

  <!-- Section: News ------------------------------------------------->
  <div id="newtheme-news" class="newtheme-sections">
    <div class="container-fluid">
      <div class="section-title">
        <h2>News</h2>
      </div>
      <div class="row no-gutters" id="news-content">
        <div class="d-none d-md-block col-md-4 col-lg-5 news-img">
        </div>
        <div class="col-12 col-md-8 col-lg-7">
          <ul id="news-list-link">
            <li class="btn-all active">All</li>
            <li class="btn-news">Latest News</li>
            <li class="btn-events">Events</li>
            <li class="btn-updates">Changelog</li>
          </ul>
          <div id="news-list-box" class="scrollbar">
            <ul id="news-list">
            <?php foreach ($feed_data as $key => $feed): ?>
              <li class="ppn-content ppn-<?php echo $feed['css']; ?>"><a href="<?php echo $feed['link']; ?>"><span class="news-title"><?php echo $feed['title']; ?></span><span class="news-date"><?php echo $feed['date']; ?></span></a></li>
            <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>