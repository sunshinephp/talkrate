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
        }
    };
}(window, window.jQuery, window.SunshinePhp));
