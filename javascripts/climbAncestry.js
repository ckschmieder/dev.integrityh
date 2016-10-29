// Compiled with CoffeeScript 1.7.0 on 2014-03-12 16:05:19

/*
Climb ancestry of an element and invoke a callback at each level
 */

(function() {
  define(['jquery'], function($) {
    var AncestryClimber;
    return AncestryClimber = (function() {
      function AncestryClimber(elem, callback) {
        this.elem = elem;
        this.callback = callback;
        if (!this.elem) {
          throw new Error('Please supply a DOM element');
        }
        if (!this.callback) {
          throw new Error('Please supply a callback function');
        }
        this.$elem = $(this.elem);
        this.$parent = this.$elem.parent();
        this.stop = false;
        this.iterations = 0;
      }

      AncestryClimber.prototype.climbLevel = function(skipStop) {
        if (skipStop == null) {
          skipStop = true;
        }
        this.iterations += 1;
        this.stop = this.callback.call(this.$elem, this.iterations) === false;
        if (skipStop) {
          this.stop = false;
        }
        if (!this.stop && this.$parent.nodeName !== '#document') {
          return this.climbLevel(false);
        }
      };

      return AncestryClimber;

    })();
  });

}).call(this);
