// Compiled with CoffeeScript 1.7.0 on 2014-12-11 10:30:55

/*
Integrity House
jQuery Utility Functions Plugin
 */

(function() {
  var init;

  init = function(root, factory) {
    if (typeof define === 'function' && define.amd) {
      define(['jquery', 'lodash/collections/reduce', 'lodash/objects/isString', 'lodash/objects/isArray', 'ancestryClimber', 'jquery.hammerjs', 'jquery.flexslider'], factory);
    } else {
      factory(root.jQuery);
    }
    return true;
  };

  init(this, function($, reduce, isString, isArray, AncestryClimber) {
    'use strict';
    var console;
    console = window.console || {
      log: $.noop,
      debug: $.noop
    };
    $.fn.relativeOffset = function(target) {
      var $target, $this, parentOffset, thisOffset;
      $this = $(this);
      $target = target ? $(this).closest(target) : $(this).parent();
      parentOffset = $target.offset();
      thisOffset = $this.offset();
      return {
        top: Math.round(thisOffset.top - parentOffset.top),
        left: Math.round(thisOffset.left - parentOffset.left)
      };
    };
    $.fn.preventClick = function() {
      return $(this).on('click', function(evt) {
        evt.preventDefault();
        return evt.stopPropagation();
      });
    };
    $.fn.stopHammerTime = function() {
      return $(this).preventClick().hammer();
    };
    $.fn.tapClick = function(callback) {
      return $(this).hammer().on('tap click', function(evt) {
        if (evt.type === 'click') {
          evt.preventDefault();
          return false;
        }
        return callback.call($(this), evt);
      });
    };
    $.fn.maxWidth = function(width) {
      return this.innerWidth() <= width;
    };
    $.fn.minWidth = function(width) {
      return this.innerWidth() >= width;
    };
    $.fn.widthBetween = function(bottom, top) {
      var innerWidth;
      innerWidth = this.innerWidth();
      return innerWidth >= bottom && innerWidth <= top;
    };
    $.fn.hasSlider = function() {
      return $(this).data('flexslider');
    };
    $.fn.featureSlider = function(opts) {
      var debug, defaults, options;
      if (opts == null) {
        opts = {};
      }
      debug = opts['debug'];
      delete opts['debug'];
      defaults = {
        directionNav: false,
        controlNav: false,
        start: function(slider) {
          var delay, speed;
          if (debug) {
            console.log('main slider starting');
          }
          delay = slider.data('delay') * 1000;
          speed = slider.data('speed');
          if (debug) {
            console.log('Delay: %d, Speed: %d', delay, speed);
          }
          slider.vars.slideshowSpeed = delay || slider.vars.slideshowSpeed;
          slider.vars.animationSpeed = speed || slider.vars.animationSpeed;
          slider.addClass('visible');
          slider.find('a.directional.left').stopHammerTime().on('tap', function(evt) {
            slider.flexslider('prev');
            return false;
          });
          slider.find('a.directional.right').stopHammerTime().on('tap', function(evt) {
            slider.flexslider('next');
            return false;
          });
          return $(window).trigger('resize');
        }
      };
      options = $.extend({}, defaults, opts);
      if (!$(this).hasSlider()) {
        return $(this).flexslider(options);
      }
    };
    $.fn.contentSlider = function(opts) {
      var debug, defaults, options;
      if (opts == null) {
        opts = {};
      }
      debug = opts['debug'];
      delete opts['debug'];
      defaults = {
        directionNav: false,
        controlNav: false,
        slideshow: false,
        animation: 'slide',
        start: function(slider) {
          var speed;
          if (debug) {
            console.log('content slider started');
          }
          speed = slider.data('speed');
          slider.vars.animationSpeed = speed || slider.vars.animationSpeed;
          slider.parent().addClass('visible');
          slider.parent().find('a.directional.left').stopHammerTime().on('tap', function(evt) {
            slider.flexslider('prev');
            return false;
          });
          return slider.parent().find('a.directional.right').stopHammerTime().on('tap', function(evt) {
            slider.flexslider('next');
            return false;
          });
        }
      };
      options = $.extend({}, defaults, opts);
      if (!$(this).hasSlider()) {
        return $(this).flexslider(options);
      }
    };
    $.fn.extractFirstStory = function() {
      return this.each(function() {
        var $content, $el, $firstSlide, $target;
        $el = $(this);
        $firstSlide = $el.find('.slides li:first');
        $content = $firstSlide.find('.content').clone();
        $target = $el.parent().prev('.mobile-content');
        return $content.prependTo($target);
      });
    };
    $.fn.climbAncestry = function(callback) {
      var climber;
      climber = new AncestryClimber(this, callback);
      return climber.climbLevel();
    };
    $.fn.reduce = function(callback, initial) {
      if (initial == null) {
        initial = 0;
      }
      return reduce(this, callback, initial);
    };
    $.fn.childrenHeight = function(sel) {
      if (sel == null) {
        sel = '*';
      }
      return this.children(sel).reduce(function(total, child) {
        return total + $(child).outerHeight();
      });
    };
    $.fn.flushCaptionToBottom = function() {
      return this.each(function() {
        var $caption, $elem, $img;
        $elem = $(this);
        $img = $elem.find('img');
        $caption = $elem.find('.caption');
        return $caption.css({
          top: $img.outerHeight() - $caption.outerHeight()
        });
      });
    };
    $.fn.centerDirectionals = function(selector) {
      var $directionals, $elem, dirHeight, equator, sliderHeight;
      if (selector == null) {
        selector = 'a.directional';
      }
      $elem = $(this);
      $directionals = $elem.find(selector);
      dirHeight = $directionals.outerHeight();
      sliderHeight = $elem.innerHeight();
      equator = sliderHeight / 2 - dirHeight;
      return $directionals.css({
        top: equator
      });
    };
    $.fn.menuDepth = function() {
      return this.parents('ul').length;
    };
    $.fn.prependBackLinks = function(selector) {
      var $backLink, $childMenus, $menu;
      if (selector == null) {
        selector = '.menu-item-has-children ul';
      }
      $menu = $(this);
      $childMenus = $menu.find(selector);
      $backLink = $("<li class=\"back-to-parent\">\n  <a href=\"\" class=\"back\">&laquo;</a>\n</li>");
      $childMenus.each(function() {
        return $(this).prepend($backLink.clone());
      });
      return this;
    };
    $.fn.bindContent = function(stripIds) {
      var $target, content, selector;
      if (stripIds == null) {
        stripIds = true;
      }
      selector = this.data('bindContent');
      if (!selector) {
        return this;
      }
      $target = $(selector);
      content = $target.html();
      this.html(content);
      if (stripIds) {
        this.find('[id]').removeAttr('id');
      }
      return this;
    };
    $.fn.afterTransition = function(once, cb) {
      var fn;
      if (cb == null) {
        cb = once;
        once = false;
      }
      fn = once ? 'one' : 'on';
      return $(this)[fn]('transitionend webkitTransitionEnd', function(evt) {
        var $elem;
        $elem = $(this);
        return cb.call($elem, evt);
      });
    };
    $.fn.wrapCssTransition = function(cb) {
      if (Modernizr.csstransitions) {
        this.addClass('transitioning').afterTransition(true, function(evt) {
          return this.removeClass('transitioning');
        });
      }
      cb.call(this);
      return this;
    };
    $.fn.transitionToggleClass = function(klass, cb) {
      var classList;
      if (cb == null) {
        cb = $.noop;
      }
      if (!(isString(klass) || isArray(klass))) {
        throw new TypeError("argument must be a String or Array");
      }
      classList = isArray(klass) ? klass.join(' ') : klass;
      return $(this).wrapCssTransition(function() {
        this.toggleClass(classList);
        return cb.call(this);
      });
    };
    $.fn.transitionAddClass = function(klass, cb) {
      var classList;
      if (cb == null) {
        cb = $.noop;
      }
      if (!(isString(klass) || isArray(klass))) {
        throw new TypeError("argument must be a String or Array");
      }
      classList = isArray(klass) ? klass.join(' ') : klass;
      return $(this).wrapCssTransition(function() {
        this.addClass(classList);
        return cb.call(this);
      });
    };
    return $.fn.transitionRemoveClass = function(klass, cb) {
      var classList;
      if (cb == null) {
        cb = $.noop;
      }
      if (!(isString(klass) || isArray(klass))) {
        throw new TypeError("argument must be a String or Array");
      }
      classList = isArray(klass) ? klass.join(' ') : klass;
      return $(this).wrapCssTransition(function() {
        this.removeClass(classList);
        return cb.call(this);
      });
    };
  });

}).call(this);
