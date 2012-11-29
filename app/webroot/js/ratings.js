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
                resetRating = function($rating, oldValue, msg) {
                    var msg = msg || 'There was a problem changing your rating';
                    $rating.rateit('value', oldValue);
                    window.alert(msg);
                };

            $ratings.rateit({ step: 1 });

            $ratings.on('rated', function(e, newRating) {
                var $rating = $(this),
                    oldValue = $rating.data('rating'),
                    talkId = $rating.data('talkId'),
                    promise;
                promise = $.post('/talk_ratings/add', { talk_id: talkId, rating: newRating });
                promise.done(function(data) {
                    if (!data.success) {
                        resetRating($rating, oldValue, data.error);
                    }
                });
                promise.fail(function() {
                    resetRating($rating, oldValue);
                });
            });

            $ratings.on('reset', function(e, newRating) {
                var $rating = $(this),
                    oldValue = $rating.data('rating'),
                    talkId = $rating.data('talkId'),
                    promise;
                promise = $.post('/talk_ratings/delete', { talk_id: talkId });
                promise.done(function(data) {
                    if (!data.success) {
                        resetRating($rating, oldValue, data.error);
                    }
                });
                promise.fail(function() {
                    resetRating($rating, oldValue);
                });
            });
        }
    };
}(window, window.jQuery, window.SunshinePhp));
