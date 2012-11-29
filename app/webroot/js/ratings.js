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
            var $ratings = $('.rating'),
                resetRating = function($rating, oldValue) {
                    $rating.rateit('value', oldValue);
                    window.alert('There was a problem changing your rating');
                };
            $ratings.rateit({ step: 1 });
            $ratings.on('rated', function(e, newRating) {
                var $rating = $(this),
                    oldValue = $rating.data('rating'),
                    talkId = $rating.data('talkId'),
                    promise;
                promise = $.post('/talk_ratings/save', { talkId: talkId, rating: newRating });
                promise.fail(function() {
                    resetRating($rating, oldValue);
                });
            });
            $ratings.on('reset', function(e, newRating) {
                var $rating = $(this),
                    oldValue = $rating.data('rating'),
                    talkId = $rating.data('talkId'),
                    promise;
                promise = $.post('/talk_ratings/reset', { talkId: talkId });
                promise.fail(function() {
                    resetRating($rating);
                });
            });
        }
    };
}(window, window.jQuery, window.SunshinePhp));
