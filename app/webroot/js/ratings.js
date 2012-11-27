window.SunshinePhp = window.SunshinePhp || {};

(function (window, $, module) {
    "use strict";
    module.Ratings = function () {
        this.init();
    };

    module.Ratings.prototype = {
        init:function () {
            if ($.fn.rateit === undefined) {
                throw new Error('RateIt Plugin Not loaded');
            }

            this.bindRatings();
        },

        bindRatings: function() {
            $('.rating').rateit();
        }
    };
}(window, window.jQuery, window.SunshinePhp));
