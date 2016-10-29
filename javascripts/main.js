// Compiled with CoffeeScript 1.7.0 on 2014-12-11 10:30:56

/*
Integrity House
Main JavaScript

Authors:
  - Mike Green <mike@fifthroomcreative.com>
  - Chris Hurst <chris@fifthroomcreative.com>
 */

(function() {
  require.config({
    paths: {
      'domReady': '../vendor/requirejs-domready/domReady',
      'jquery': '../vendor/jquery/dist/jquery',
      'lodash': '../vendor/lodash-amd/modern',
      'hammerjs': '../vendor/hammerjs/hammer',
      'jquery.hammerjs': '../vendor/jquery-hammerjs/jquery.hammer',
      'jquery.flexslider': '../vendor/flexslider/jquery.flexslider',
      'magnific': '../vendor/magnific-popup/dist/jquery.magnific-popup'
    },
    shim: {
      'jquery.flexslider': {
        deps: ['jquery'],
        exports: 'jQuery.fn.flexslider'
      },
      'magnific': {
        deps: ['jquery'],
        exports: 'jQuery.magnificPopup'
      }
    }
  });

  require(['domReady!', 'lodash/functions/throttle', 'jquery', 'magnific', 'jquery.hammerjs', 'jquery.integrityhouse', 'jquery.mobile-nav', 'debug'], function(doc, throttle, $) {
    var $contentSliders, $gallery, $galleryNav, $homeSlider, $indicator, $mainNav, config, tabletMatcher, windowResizeHandler;
    config = {
      debug: true,
      breakpoints: {
        belowTablet: 767,
        tablet: 768,
        desktop: 1025
      },
      hoverTimeout: 250
    };
    $mainNav = $('#menu-main-navigation');
    $indicator = $('#indicator');
    $homeSlider = $('#home-slider');
    $contentSliders = $('.content-slide-wrap .slider');
    $gallery = $('ul.gallery');
    $galleryNav = $('#gallery-nav');
    tabletMatcher = matchMedia("screen and (min-width: " + config.breakpoints.tablet + "px)");
    if ($galleryNav.length) {
      $galleryNav.find('select').on('change', function(evt) {
        var url;
        url = $(this).val();
        if (!(url === window.location.href || !url)) {
          return window.location.href = url;
        }
      });
    }
    if ($gallery.length) {
      $gallery.magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
          enabled: true
        }
      });
    }
    $('#footer-mob').find('[data-bind-content]').each(function() {
      return $(this).bindContent();
    });
    if ($homeSlider.length) {
      $contentSliders.extractFirstStory();
      $homeSlider.featureSlider({
        debug: config.debug
      });
      if (tabletMatcher.matches) {
        $contentSliders.contentSlider({
          debug: config.debug
        });
      }
      if (Modernizr.matchmedialistener) {
        tabletMatcher.addListener(function(match) {
          if (match.matches) {
            return $contentSliders.contentSlider({
              debug: config.debug
            });
          }
        });
      }
    }
    $mainNav.children('li').hover(function(evt) {
      var $elem, centerOffset, relOffset;
      $elem = $(this);
      relOffset = $elem.relativeOffset('#main-navigation');
      centerOffset = relOffset.left + $elem.innerWidth() / 2;
      centerOffset -= $indicator.outerWidth() / 2;
      return $indicator.css({
        left: centerOffset
      }).toggleClass('visible');
    });
    $mainNav.children('.menu-item-has-children').children('ul').children('.menu-item-has-children').hover(function(evt) {
      var $elem, $subMenu, height;
      $elem = $(evt.currentTarget);
      $subMenu = $elem.children('ul');
      height = evt.type === 'mouseenter' ? $subMenu.childrenHeight('li') : 0;
      return $subMenu.height(height);
    });
    windowResizeHandler = function(evt) {
      var $captions, $directionals, $slides, $win;
      $win = $(window);
      $homeSlider = $('#home-slider');
      if ($homeSlider.length) {
        $captions = $homeSlider.find('.caption');
        $slides = $homeSlider.find('.slides li');
        $directionals = $homeSlider.find('a.directional');
        if ($win.minWidth(config.breakpoints.tablet)) {
          $slides.flushCaptionToBottom();
          return $directionals.removeAttr('style');
        } else {
          return $homeSlider.centerDirectionals();
        }
      }
    };
    return $(window).resize(throttle(windowResizeHandler, 100));
  });

}).call(this);
