// Compiled with CoffeeScript 1.7.0 on 2014-03-14 11:51:17

/*
Media Query Builder Class
by Mike Green

Provides a JavaScript DSL for declaratively building
media query strings.
 */

(function() {
  define([], function() {
    var MediaQueryBuilder;
    return MediaQueryBuilder = (function() {
      function MediaQueryBuilder(baseString) {
        this.baseString = baseString != null ? baseString : '';
        this.mqString = this.baseString;
      }

      MediaQueryBuilder.prototype.screen = function() {
        this.mqString += "screen";
        return this;
      };

      MediaQueryBuilder.prototype.print = function() {
        this.mqString += "print";
        return this;
      };

      MediaQueryBuilder.prototype.and = function() {
        this.mqString += " and";
        return this;
      };

      MediaQueryBuilder.prototype.or = function() {
        this.mqString += ",";
        return this;
      };

      MediaQueryBuilder.prototype.maxWidth = function(size) {
        size = typeof size === 'number' ? "" + size + "px" : size;
        this.mqString += " (max-width: " + size + ")";
        return this;
      };

      MediaQueryBuilder.prototype.minWidth = function(size) {
        size = typeof size === 'number' ? "" + size + "px" : size;
        this.mqString += " (min-width: " + size + ")";
        return this;
      };

      MediaQueryBuilder.prototype.minDevicePixelRatio = function(ratio) {
        this.mqString += " (-webkit-min-device-pixel-ratio: " + ratio + ")";
        return this;
      };

      MediaQueryBuilder.prototype.toString = function() {
        return this.mqString;
      };

      MediaQueryBuilder.prototype.reset = function() {
        this.mqString = '';
        return this;
      };

      return MediaQueryBuilder;

    })();
  });

}).call(this);
