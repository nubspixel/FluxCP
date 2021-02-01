<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_THEME_DIR.'/newtheme/includes/config.php');
require_once (FLUX_ADDON_DIR."/newtheme/modules/newtheme/main.php");
$serverNames = $this->getServerNames();
$pc = $pop = 0;

if(! ($params->get('module') == 'server' && $params->get('action') == 'status')) {
  if(isset($title))
    $t_title = $title;
  else
    $t_title = "";

  require_once (FLUX_MODULE_DIR."/server/status.php");
  $title = $t_title;
}

if(isset($serverStatus)) {
  $key = array_keys($serverStatus)[0];
  $pc = $serverStatus[$key][$key]['playersOnline'];
  $pop = $serverStatus[$key][$key]['playersPeak'];
  $status = ($serverStatus[$key][$key]['loginServerUp'] && $serverStatus[$key][$key]['charServerUp'] && $serverStatus[$key][$key]['mapServerUp']);
}
if (Flux::config('UseLoginCaptcha') && Flux::config('EnableReCaptcha')) {
  $recaptcha = Flux::config('ReCaptchaPublicKey');
  $theme = Flux::config('ReCaptchaTheme');
}

$is_main_page = false;
$cm = $params->get('module');
$ca = $params->get('action');
$sc = $si = "";
if($cm == 'main' && $ca = 'index') {
  $is_main_page = true;
}
else if ($cm == 'specials') {
  $sc = " special-flux-pages special-page-".$params->get('action');
  $si = ' id="special-body-'.$params->get('action').'"';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs ----------------------------------------------->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, height=device-height"/>
  <?php if (isset($metaRefresh)): ?>
  <meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
  <?php endif ?>

  <!-- Page HTML Meta -------------------------------------------------------->
  <title><?php echo Flux::config('SiteTitle'); if (isset($title) && !empty(trim($title))) echo ": $title" ?></title>
  <meta name="description" content="<?php echo $config['html_desc']; ?>">
  <meta name="author" content="<?php echo $config['html_author']; ?>">
  <link rel="icon" type="image/png" href="<?php echo $this->themePath('includes/img/favicon.png') ?>">

  <!-- Stylesheets ---------------------------------------------------->
  <link href="<?php echo $this->themePath('includes/css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
  <?php if (Flux::config('EnableReCaptcha')): ?>
  <link href="<?php echo $this->themePath('includes/css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
  <?php endif ?>
  <!--[if IE]>
  <link rel="stylesheet" href="<?php echo $this->themePath('includes/css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
  <![endif]-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->themePath('includes/css/flux/flux.css') ?>" async></link>
  <link rel="stylesheet" href="<?php echo $this->themePath('includes/css/styles.css') ?>" type="text/css" charset="utf-8">

  <!-- Javascripts ---------------------------------------------------->
  <?php if (Flux::config('EnableReCaptcha')): ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
  <?php endif ?>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/jquery-3.4.1.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/slick.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/jquery.ellipsis.js') ?>"></script>
  <!--[if lt IE 9]>
  <script src="<?php echo $this->themePath('includes/js/ie9.js') ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/flux.unitpngfix.js') ?>"></script>
  <![endif]-->
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/flux.datefields.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/flux.unitip.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/aos.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/time.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/lity/lity.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $this->themePath('includes/js/scripts.js') ?>"></script>

  <script type="text/javascript">
    // Preload spinner image.
    var spinner = new Image();
    spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';

    // Preload spinner image.
    var spinner = new Image();
    spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';

    function refreshSecurityCode(imgSelector){
      $(imgSelector).attr('src', spinner.src);

      // Load image, spinner will be active until loading is complete.
      var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
      var image = new Image();
      // console.log(clean)
      image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
      // console.log(image)
      // console.log("<?php echo $this->url('captcha') ?>")

      $(imgSelector).attr('src', image.src);
    }

    <?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
      var RecaptchaOptions = {
      theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
      };
    <?php endif; ?>

    function reload(){
      window.location.href = '<?php echo $this->url ?>';
    }

    $(function() {

      if($('.loader-box').length > 0) {
        $('.loader-box').fadeOut('slow');
      }

      AOS.init();
      $('.money-input').keyup(function() {
        var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
        if (isNaN(creditValue))
          $('.credit-input').val('?');
        else
          $('.credit-input').val(creditValue);
      }).keyup();
      $('.credit-input').keyup(function() {
        var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
        if (isNaN(moneyValue))
          $('.money-input').val('?');
        else
          $('.money-input').val(moneyValue.toFixed(2));
      }).keyup();

      <?php
      if($params->get('module') == 'main' && $params->get('action') == 'index'):
      require_once (FLUX_ADDON_DIR."/newtheme/modules/newtheme/woe.php");
      ?>
      if($('.woe-box .woe-center .timer-block').length > 0) {
        // Set the date we're counting down to
        var countDownDate = new Date('<?php echo $woe[0]['start']->format('Y-m-d H:i:s'); ?>').getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date().getTime();

          // Find the distance between now and the count down date
          var distance = countDownDate - now;

          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // console.log('seconds', seconds, $('.timer-seconds .ctime'))

          // Display the result
          $('.timer-block .timer-d').html(pad(days,2));
          $('.timer-block .timer-h').html(pad(hours,2));
          $('.timer-block .timer-m').html(pad(minutes,2));
          $('.timer-block .timer-s').html(pad(seconds,2));

          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            $('.timer-block .timer-d').html('00');
            $('.timer-block .timer-h').html('00');
            $('.timer-block .timer-m').html('00');
            $('.timer-block .timer-s').html('00');
          }
        }, 1000);
      }
      <?php endif; ?>
      if($('#timeline-slider-list').length > 0)
        $('#timeline-slider-list').slick('slickGoTo', <?php echo (isset($config['timeline_focus']) ? $config['timeline_focus'] : 0) ?>);
    });

<?php if($is_main_page): ?>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v7.0'
      });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
<?php endif; ?>
  </script>
</head>
<body class="newtheme"<?php echo $si ?>>

<?php if($is_main_page): ?>
  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>

  <!-- Your Chat Plugin code -->
  <div class="fb-customerchat"
    attribution=setup_tool
    page_id="112256200471297"
    theme_color="#0084ff"
    logged_in_greeting="Hi, Adventurer! If you have questions, feel free to let us know!"
    logged_out_greeting="Hi, Adventurer! If you have questions, feel free to let us know!">
  </div>
<?php endif; ?>

  <?php if($config['enable_preloader_animation']):?>
  <div class="loader-box">
    <div class="loader">&nbsp;</div>
  </div>
  <?php endif; ?>

  <?php include $this->themePath('main/nav/topbar.php', true); ?>

  <?php if(!($params->get('module') == 'main' && $params->get('action') == 'index')): ?>
  <!-- Section: Flux ------------------------------------------------->
  <div id="newtheme-splash" class="newtheme-sections newtheme-flux">
    <div id="flux-box">
      <div class="container flux-page<?php echo $sc ?> scrollbar">
      <?php include $this->themePath('main/nav/submenu.php', true); ?>
      <?php include $this->themePath('main/nav/pagemenu.php', true); ?>
  <?php endif; ?>