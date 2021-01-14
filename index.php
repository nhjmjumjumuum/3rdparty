<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap: content:">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">

  <meta name="theme-color" content="#e14747">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <title>3Store</title>
  
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="assets/icons/apple-touch-icon.png">
  <link rel="icon" href="assets/icons/favicon.png">
  <link rel="manifest" href="/manifest.json">
  
  <link rel="stylesheet" href="framework7/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <div id="app"class="theme-dark">

    
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main view-init safe-areas">
      <div class="page" data-name="home">
        <!-- Top Navbar -->
        <div class="navbar navbar-large">
          <div class="navbar-bg"></div>
          <div class="navbar-inner">
            <div class="title sliding">3Store</div>
            <div class="right">
              <?php
              $string = file_get_contents("json/sign.json");
              $json = json_decode($string, true);
              foreach ($json as $app => $appkey){
              ?>
              <?php echo $appkey['status'] ?>
              <?php
            }
            ?>
            </div>
            <div class="title-large">
              <div class="title-large-text">3Store</div>
            </div>
          </div>
        </div>
        <!-- Scrollable page content-->
        <div class="page-content">
          <div class="searchbar-backdrop"></div>
          <form class="searchbar searchbar-init" data-search-container=".app-list" data-search-in=".item-title">
            <div class="searchbar-inner">
              <div class="searchbar-input-wrap">
                <input type="search" placeholder="Search">
                <i class="searchbar-icon"></i>
                <span class="input-clear-button"></span>
              </div>
              <span class="searchbar-disable-button">Cancel</span>
            </div>
          </form>

          <div class="list media-list app-list">
            <ul>
              <?php
              $string = file_get_contents("json/all.json");
              $json = json_decode($string, true);
              foreach ($json as $app => $appkey){
              ?>
              <li>
                <div onclick="location='itms-services://?action=download-manifest&url=https://3store.com/plists/<?php echo $appkey['url'] ?>.plist'" class="item-content">
                  <div class="item-media">
                    <img style="width:60px;height:60px;border-radius:30%;" src="<?php echo $appkey['img'] ?>">
                  </div>
                  <div class="item-inner">
                    <div class="item-title-row">
                      <div class="item-title"><?php echo $appkey['name'] ?></div>
                    </div>
                    <div class="item-subtitle"><?php echo $appkey['sub'] ?></div>
                  </div>
                </div>
              </li>
              <?php
            }
            ?>
            </ul>
          </div>
      </div>
    </div>

    </div>
  </div>
  
  <!-- Framework7 library -->
  <script src="framework7/js/framework7.bundle.min.js"></script>
  
  <!-- App routes -->
  <script src="js/routes.js"></script>
  <!-- App scripts -->
  <script src="js/app.js"></script>
</body>
</html>