(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefProgressBar.init();
    });

    var qodefProgressBar = {
        init: function () {
            this.holder = $('.qodef-progress-bar');

            if (this.holder.length) {
                this.holder.each(function () {
                    var $thisHolder = $(this),
                        layout = $thisHolder.data('layout'),
                        data = qodefProgressBar.generateBarData($thisHolder, layout),
                        container = '#qodef-m-canvas-' + $thisHolder.data('rand-number'),
                        number = $thisHolder.data('number') / 100;

                    switch (layout) {
                        case 'circle':
                            qodefProgressBar.initCircleBar($thisHolder, container, data, number);
                            break;
                        case 'semi-circle':
                            qodefProgressBar.initSemiCircleBar($thisHolder, container, data, number);
                            break;
                        case 'line':
                            number = $thisHolder.data('number');
                            container = $thisHolder.find('.qodef-m-canvas');
                            data = qodefProgressBar.generateLineData($thisHolder, layout, number);
                            qodefProgressBar.initLineBar($thisHolder, container, data);
                            break;
                    }
                });
            }
        },
        generateBarData: function (thisBar, layout) {
            var activeWidth = thisBar.data('active-line-width');
            var activeColor = thisBar.data('active-line-color');
            var inactiveWidth = thisBar.data('inactive-line-width');
            var inactiveColor = thisBar.data('inactive-line-color');
            var easing = 'linear';
            var duration = 1400;
            var textColor = thisBar.data('text-color');

            return {
                strokeWidth: activeWidth,
                color: activeColor,
                trailWidth: inactiveWidth,
                trailColor: inactiveColor,
                easing: easing,
                duration: duration,
                svgStyle: {width: '100%', height: '100%'},
                text: {
                    style: {
                        color: textColor
                    },
                    autoStyleContainer: false
                },
                from: {color: inactiveColor},
                to: {color: activeColor},
                step: function (state, bar) {
                    if (layout !== 'custom') {
                        bar.setText(Math.round(bar.value() * 100) + '%');
                    }
                }
            };
        },
        initCircleBar: function (holder, container, data, number) {
            var bar = new ProgressBar.Circle(container, data);
            holder.appear(function () {
                bar.animate(number);
            });
        },
        initSemiCircleBar: function (holder, container, data, number) {
            var bar = new ProgressBar.SemiCircle(container, data);
            holder.appear(function () {
                bar.animate(number);
            });
        },
        generateLineData: function (thisBar, layout, number) {
            var height = thisBar.data('active-line-width');
            var activeColor = thisBar.data('active-line-color');
            var inactiveHeight = thisBar.data('inactive-line-width');
            var inactiveColor = thisBar.data('inactive-line-color');
            var duration = 1400;
            var textColor = thisBar.data('text-color');

            return {
                percentage: number,
                duration: duration,
                fillBackgroundColor: activeColor,
                backgroundColor: inactiveColor,
                height: height,
                inactiveHeight: inactiveHeight,
                followText: false,
                textColor: textColor
            };
        },
        initLineBar: function (holder, container, data) {
            holder.appear(function () {
                container.LineProgressbar(data);
            });
        }
    };

})(jQuery);