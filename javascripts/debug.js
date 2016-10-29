// Compiled with CoffeeScript 1.7.0 on 2014-12-11 10:30:55

/*
Integrity House
Debug Functions Script
 */

(function() {
  var init;

  init = function(root, factory) {
    if (typeof define === 'function' && define.amd) {
      define(['jquery', 'lodash/collections/contains', 'ancestryClimber', 'jquery.integrityhouse'], factory);
    } else {
      factory(root.jQuery);
    }
    return true;
  };

  init(this, function($, contains, AncestryClimber) {
    'use strict';
    var css;
    css = {
      normal: 'font-weight: normal',
      bold: 'font-weight: bold',
      blue: 'color: #0000FF; font-weight: normal'
    };
    $.fn.nameString = function() {
      var nameStr, tag;
      tag = this[0];
      nameStr = tag.nodeName.toLowerCase();
      if (tag.id) {
        nameStr += "#" + tag.id;
      }
      if (tag.className) {
        nameStr += "." + tag.className;
      }
      return nameStr;
    };
    $.fn.fontSizeTree = function() {
      console.group("Font Size Tree");
      $(this).climbAncestry(function(iters) {
        var name;
        name = this.nameString();
        return console.log("%s:\n\t%s\n\t%o", name, this.css('fontSize'), this[0]);
      });
      console.groupEnd("Font Size Tree");
      return this;
    };
    $.fn.positionAncestor = function(keepGoing) {
      var positions;
      if (keepGoing == null) {
        keepGoing = false;
      }
      positions = ['absolute', 'relative', 'fixed'];
      console.group("Position Ancestry");
      $(this).climbAncestry(function(iters) {
        var name, pos, posMatch, ret, valueStyle;
        name = this.nameString();
        pos = this.css('position');
        posMatch = contains(positions, pos);
        if (keepGoing) {
          ret = true;
        }
        ret || (ret = !posMatch);
        valueStyle = posMatch && iters > 1 ? css.blue : css.normal;
        console.log("%c%s:\n\t%c%s\n\t%o", css.bold, name, valueStyle, pos, this[0]);
        return ret;
      });
      return console.groupEnd("Position Ancestry");
    };
    $.debugTransitions = {
      properties: ['transitionend', 'webkitTransitionEnd']
    };
    return $.fn.debugTransitions = function(propName, callback) {
      if (propName == null) {
        propName = null;
      }
      if (callback == null) {
        callback = $.noop;
      }
      return this.on($.debugTransitions.properties.join(' '), function(evt) {
        var propVal;
        if (propName && propName !== evt.originalEvent.propertyName) {
          return;
        }
        propName || (propName = evt.originalEvent.propertyName);
        propVal = $(evt.currentTarget).css(propName);
        console.group("Transition Event: " + propName);
        console.log(evt);
        console.log(evt.currentTarget);
        console.log("%c%s: %c%s", css.bold, propName, css.normal, propVal);
        callback.call(this, evt);
        return console.groupEnd();
      });
    };
  });

}).call(this);
