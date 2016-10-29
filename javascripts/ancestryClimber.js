// Compiled with CoffeeScript 1.7.0 on 2014-12-11 10:30:56

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
        this.iterations = 0;
      }

      AncestryClimber.prototype.climbLevel = function(skipStop) {
        var $parent, stop;
        if (skipStop == null) {
          skipStop = true;
        }
        this.iterations += 1;
        $parent = this.$elem.parent();
        stop = this.callback.call(this.$elem, this.iterations) === false;
        if (skipStop) {
          stop = false;
        }
        this.$elem = $parent;
        if (!this.stop && $parent[0].nodeName !== '#document') {
          return this.climbLevel(false);
        }
      };

      return AncestryClimber;

    })();
  });

}).call(this);
