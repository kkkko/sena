<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

  <!--- basic page needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Philosophy</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- mobile specific metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS
  ================================================== -->
  <link rel="stylesheet" href="/template/css/base.css">
  <link rel="stylesheet" href="/template/css/vendor.css">
  <link rel="stylesheet" href="/template/css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css"
        integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

  <!-- script
  ================================================== -->
  <script src="/template/js/modernizr.js"></script>
  <script src="/template/js/pace.min.js"></script>

  <!-- favicons
  ================================================== -->
  <link rel="shortcut icon" href="/template/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/template/favicon.ico" type="image/x-icon">

</head>

<body id="top">
    <!-- pageheader
  ================================================== -->
    <div class="s-pageheader">

      <header class="header header_admin">
        <div class="header__content row">

          <div class="header__logo">
            <a class="logo" href="/">
              <img src="/template/images/logo.svg" alt="Homepage">
            </a>
          </div> <!-- end header__logo -->

          <ul class="header__social">
            <li>
              <a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#0"><i class="fab fa-pinterest" aria-hidden="true"></i></a>
            </li>
          </ul> <!-- end header__social -->
          <a href="/user/logout" class="logout"><i class="fas fa-sign-out-alt"></i></a>
          <a href="/admin" class="user"><i class="far fa-user"></i></a>

          <a class="header__search-trigger" href="#0" style="display: none;"></a>

          <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
              <label>
                <span class="hide-content">Search for:</span>
                <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s"
                       title="Search for:" autocomplete="off">
              </label>
              <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

          </div>  <!-- end header__search -->


          <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

          <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Site Navigation</h2>

            <ul class="header__nav">
              <li><a href="/" title="">Home</a></li>
              <li class="has-children current">
                <a href="/#" title="">Categories</a>
                <ul class="sub-menu">
                  <?php foreach ($categoriesList as $category): ?>
                    <li><a href="/category/<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li class="has-children">
                <a href="#0" title="">Blog</a>
                <ul class="sub-menu">
                  <li><a href="single-video.html">Video Post</a></li>
                  <li><a href="single-audio.html">Audio Post</a></li>
                  <li><a href="single-gallery.html">Gallery Post</a></li>
                  <li><a href="single-standard.html">Standard Post</a></li>
                </ul>
              </li>
              <li><a href="style-guide.html" title="">Styles</a></li>
              <li><a href="about.html" title="">About</a></li>
              <li><a href="contact.html" title="">Contact</a></li>
            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

          </nav> <!-- end header__nav-wrap -->

        </div> <!-- header-content -->
      </header> <!-- header -->

    </div> <!-- end s-pageheader -->
 