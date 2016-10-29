// Compiled with CoffeeScript 1.7.0 on 2014-12-11 10:30:56

/*
Integrity House WordPress Theme
Mobile Navigation
 */

(function() {
  var init;

  init = function(root, factory) {
    if (typeof define === 'function' && define.amd) {
      define(['jquery', 'jquery.integrityhouse'], factory);
    } else {
      factory(root.jQuery);
    }
    return true;
  };

  init(this, function($) {
    $.mobileNav = {
      debug: false,
      defaults: {
        levelDataKey: 'menuLevel',
        selectors: {
          parent: 'li.menu-item-has-children',
          nextUL: 'ul.sub-menu',
          subnavLinks: 'li.menu-item-has-children > a:not(.back)',
          backLinks: 'li.back-to-parent > a'
        }
      }
    };
    return $.fn.extend({
      mobileNavParentLinks: function(options) {
        var $mobileNav, opts;
        if (options == null) {
          options = {};
        }
        opts = $.extend($.mobileNav.defaults, options);
        $mobileNav = $(this);
        $mobileNav.find(opts.selectors.subnavLinks).tapClick(function(evt) {
          var $elem, $nextUL, nextLevel;
          $elem = $(this);
          $nextUL = $elem.next(opts.selectors.nextUL);
          nextLevel = $elem.menuDepth() + 1;
          if ($.mobileNav.debug) {
            console.debug("Transitioning to level %d", nextLevel);
          }
          $(this).addClass('active');
          $mobileNav.data(opts.levelDataKey, nextLevel);
          $nextUL.transitionAddClass('open');
          $mobileNav.transitionAddClass('showing-sublevel');
          if ($.mobileNav.debug && nextLevel === 2) {
            console.debug("Turning green");
          }
          return false;
        });
        return $mobileNav;
      },
      mobileNavBackLinks: function(options) {
        var $mobileNav, opts;
        if (options == null) {
          options = {};
        }
        opts = $.extend($.mobileNav.defaults, options);
        $mobileNav = $(this);
        $mobileNav.find(opts.selectors.backLinks).tapClick(function(evt) {
          var $elem, $parentUL, prevLevel;
          $elem = $(this);
          $parentUL = $elem.parentsUntil(opts.selectors.parent).last();
          prevLevel = $elem.menuDepth() - 1;
          if ($.mobileNav.debug) {
            console.debug("Transitioning to level %d", prevLevel);
          }
          $mobileNav.data(opts.levelDataKey, prevLevel);
          $parentUL.transitionRemoveClass('open', function() {
            return $(this).prev('a').removeClass('active');
          });
          if (prevLevel === 1) {
            $mobileNav.removeClass('showing-sublevel');
            if ($.mobileNav.debug) {
              console.debug("Turning blue");
            }
          }
          return false;
        });
        return $mobileNav;
      }
    });
  });

}).call(this);
