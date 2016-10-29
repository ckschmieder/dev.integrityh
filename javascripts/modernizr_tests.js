// Compiled with CoffeeScript 1.7.0 on 2014-12-11 10:30:55

/*
Integrity House
Custom Modernizr.js Tests
 */

(function() {
  if (Modernizr.addTest == null) {
    return;
  }

  Modernizr.addTest('matchmedia', function() {
    return (window.matchMedia != null) && typeof window.matchMedia === 'function';
  });

  Modernizr.addTest('matchmedialistener', function() {
    var matcher;
    if (!Modernizr.matchmedia) {
      return false;
    }
    matcher = matchMedia("only all");
    return (matcher.addListener != null) && typeof matcher.addListener === 'function';
  });

}).call(this);
