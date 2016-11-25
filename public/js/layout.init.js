$.noConflict();
jQuery(document).ready(function ($) {
    var pCon = $('.page-container'),
        sRight = $('.right-aside'),
        aRight = $('.right-aside'),
        mLbar = $('.m-leftbar-show'),
        pBody = $('body'),
        pHtml = $('html');

    //Fixed TopBar
    function topbarFixed() {
        var fxHeader = $('.page-container').hasClass('fixed-header');
        var conInnnerWidth = $('.main-container').innerWidth();

        if (fxHeader) {
            $('.top-bar').css({
                'width': conInnnerWidth + 'px'
            });
        }

    }
    topbarFixed();

    //List Menu View
    function ListMenuView() {
        $('.leftbar-action').on('click', function (event) {
            event.preventDefault();

            if (pCon.hasClass('list-menu-view')) {
                pCon.removeClass('list-menu-view');
                pCon.addClass('hide-list-menu');
            } else {
                pCon.removeClass('hide-list-menu');
                pCon.addClass('list-menu-view');
            }

        });
        $('.leftbar-action-mobile').on('click', function (event) {
            event.preventDefault();

            if (pCon.hasClass('list-menu-view')) {
                pCon.removeClass('list-menu-view');
                pCon.addClass('hide-list-menu');

            } else {
                pCon.removeClass('hide-list-menu');
                pCon.addClass('list-menu-view');
            }
        });

        $('.rightbar-action').on('click', function (ev) {
            ev.preventDefault();
            if (aRight.hasClass('rightbar-show')) {
                aRight.removeClass('rightbar-show');

            } else {
                aRight.addClass('rightbar-show');

            }
        });

        $('.aside-close').on('click', function (ev) {
            pCon.removeClass('hide-list-menu');
            pCon.addClass('list-menu-view');
        });

    }

    function ListMenuViewExit() {
        if (sRight.hasClass('rightbar-show')) {
            sRight.removeClass('rightbar-show');
        }
    }


    /*====Search Bar====*/
    function SearchBar() {
        if ($('.search-bar').hasClass('search-show')) {
            $('.search-bar').removeClass('search-show');

        } else {
            $('.search-bar').addClass('search-show');
            $('.search-input').focus();
        }
    }



    ListMenuView();



    var jRes = jRespond([
        {
            label: 'handheld',
            enter: 0,
            exit: 767
    }, {
            label: 'tablet',
            enter: 768,
            exit: 979
    }, {
            label: 'laptop',
            enter: 980,
            exit: 1199
    }, {
            label: 'desktop',
            enter: 1200,
            exit: 10000
    }
]);

    jRes.addFunc([
        {
            breakpoint: ['desktop', 'laptop'],
            enter: function () {


            },
            exit: function () {


            }
    },
        {
            breakpoint: ['handheld', 'tablet'],
            enter: function () {



            },
            exit: function () {
                ListMenuViewExit();
            }
    }
]);

    /*====Left Bar Accordion====*/
    if ($.fn.dcAccordion) {
        $('.list-accordion').each(function () {
            $(this).dcAccordion({
                eventType: 'click',
                hoverDelay: 100,
                autoClose: true,
                saveState: false,
                disableLink: true,
                speed: 'fast',
                showCount: false,
                autoExpand: true,
                cookie: 'dcjq-accordion-1',
                classExpand: 'dcjq-current-parent'
            });
        });

    }


    /*====Collapsible Widgets====*/

    $('.widget-collapse').on('click', function (e) {
        var widgetElem = $(this).children('i');
        $(this).parents('.widget-head')
            .next('.widget-container')
            .slideToggle(200);

        if ($(widgetElem).hasClass('fa-angle-down')) {
            $(widgetElem).removeClass('fa-angle-down');
            $(widgetElem).addClass('fa-angle-left');


        } else {
            $(widgetElem).removeClass('fa-angle-left');
            $(widgetElem).addClass('fa-angle-down');

        }

        e.preventDefault();

    });


    /*--Wiget Loader--*/

    var ThisLoad;

    $(".w-reload").click(function () {
        ThisLoad = $(this);
        $(this).parents('.widget-head')
            .next('.widget-container').mask("Loading...");
        setTimeout(UnMask, 1500);
    });


    function UnMask() {
        ThisLoad.parents('.widget-head')
            .next('.widget-container').unmask();
    }

    /*--
    * switchery.css
    * switchery.js
    --*/

    try {

        var on_off_w = Array.prototype.slice.call(document.querySelectorAll('.w-on-off'));
        on_off_w.forEach(function (html) {
            var switchery = new Switchery(html, {
                size: 'small',
                color: '#15bdc3',
                jackColor: '#fff',
                secondaryColor: '#eee',
                jackSecondaryColor: '#fff'
            });
        });


        var on_off_w_check = document.querySelector('.w-on-off');
        on_off_w_check.onchange = function () {
            var swithToggle = $(this).parents('.widget-head')
                .next('.widget-container')
                .slideToggle(200);
            if (on_off_w_check.checked) {
                swithToggle
            } else {
                swithToggle
            }
        };

    } catch (e) {

    }


    /*--
     * iCheck
     * icheck.js
     * icheck.css
     * --- */
    try {

        $('.w-i-check').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
            increaseArea: '30%' // optional
        });
        var w_check_box = $('.w-i-check');
        w_check_box.on('ifChecked ifUnchecked', function (event) {
            var swithToggle = $(this).parents('.widget-head')
                .next('.widget-container')
                .slideToggle(200);
            if (event.type == 'ifChecked') {
                swithToggle

            } else {
                swithToggle
            }
        });

    } catch (e) {

    }


    /*====Widgets Remove====*/
    $('.widget-remove').on('click', function (e) {
        $(this).parents('.widget-module').remove();
        e.preventDefault();

    });


    $('.search-btn').on('click', function () {
        SearchBar();
    });
    $('.search-close').on('click', function () {
        SearchBar();
    });


    /*====Tooltip====*/
    $('[data-tooltip="tooltip"]').tooltip();

    $('.chat-close').on('click', function () {
        $('.conv-container').removeClass('show-conv');
    });

    $('.chat-list').on('click', function () {
        $('.conv-container').addClass('show-conv');
    });


    function ChatHeight() {

        var MainHeight = $(window).height();
        var ChatUserContainer = $('.chat-user-list');
        if (ChatUserContainer.length) {
            var OffsetCal = ChatUserContainer.offset().top;
        }
        var CalHeight = MainHeight - OffsetCal;
        $('.chat-user-list').css({
            'height': CalHeight + "px"
        });

    }
    ChatHeight();

    function ConvHeight() {

        var MainHeight = $(window).height();

        var CovContainer = $('.converstaion-list');
        if (CovContainer.length) {
            var OffsetCal = CovContainer.offset().top;
        }

        var InputFrmH = $('.chat-input-form').height() + 40;
        var MinusH = OffsetCal + InputFrmH;
        var CalHeight = MainHeight - MinusH;
        $('.converstaion-list').css({
            'height': CalHeight + "px"
        });

    }
    ConvHeight();

    function StatsHeight() {

        var MainHeight = $(window).height();
        var OffsetCal = $('.aside-branding').height();
        var CalHeight = MainHeight - OffsetCal;
        $('.server-stats-content').css({
            'height': CalHeight + "px"
        });
    }
    StatsHeight();


    function NotifysHeight() {

        var MainHeight = $(window).height();
        var OffsetCal = $('.right-aside .aside-branding').height();
        var CalHeight = MainHeight - OffsetCal;
        $('.aside-notifications-wrap').css({
            'height': CalHeight + "px"
        });
    }
    NotifysHeight();

    function LeftNavHeight() {

        var MainHeight = $(window).height();
        var OffsetCal = $('.left-aside .aside-branding').height();
        var CalHeight = MainHeight - OffsetCal;
        $('.left-navigation').css({
            'height': CalHeight + "px"
        });



    }
    LeftNavHeight();

    $(window).smartresize(function () {
        ChatHeight();
        ConvHeight();
        StatsHeight();
        NotifysHeight();
        LeftNavHeight();
        topbarFixed();
    });


    if ($.fn.sparkline) {
        var sparkLine = function () {
            $('.sparkline').each(function () {
                var data = $(this).data();
                data.valueSpots = {
                    '0:': data.spotColor
                };

                $(this).sparkline(data.data, data);
                var composite = data.compositedata;

                if (composite) {
                    var stlColor = $(this).attr("data-stack-line-color"),
                        stfColor = $(this).attr("data-stack-fill-color"),
                        sptColor = $(this).attr("data-stack-spot-color"),
                        sptRadius = $(this).attr("data-stack-spot-radius");

                    $(this).sparkline(composite, {
                            composite: true,
                            lineColor: stlColor,
                            fillColor: stfColor,
                            spotColor: sptColor,
                            highlightSpotColor: sptColor,
                            spotRadius: sptRadius,
                            valueSpots: {
                                '0:': sptColor
                            }

                        }

                    );

                };
            });

        };

        var sparkResize;
        $(window).smartresize(function (e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(function () {
                sparkLine(true)
            }, 100);
        });
        sparkLine(false);
    }

    $('.progress-bar').each(function () {
        var PbarWidth = $(this).data("progress");
        if (PbarWidth) {
            $(this).css('width', PbarWidth + '%');
            $(this).parents('.progress').parents('.progress-wrap').children('.progress-meta').children('.progress-percent').text(PbarWidth + '%');
        }

    });

    if ($.fn.easyPieChart) {
        $('.epie-chart').each(function () {
            var pbColor = $(this).data("barcolor"),
                tColor = $(this).data("tcolor"),
                sColor = $(this).data("scalecolor"),
                lCap = $(this).data("linecap"),
                lWidth = $(this).data("linewidth"),
                pSize = $(this).data("size"),
                pAnimate = $(this).data("animate"),
                pPercent = $(this).data("percent");

            $(this).children('.percent').css({
                'width': pSize + 'px',
                'line-height': pSize + 'px'
            });

            if (pPercent === 100) {
                $('<span class="p-done"><i class="fa fa-check"></i></span>').insertBefore($(this).children('.percent'));
                $(this).children('.p-done').css({
                    'width': pSize + 'px',
                    'height': pSize + 'px',
                    'line-height': pSize + 'px',
                    'color': pbColor
                });
                $(this).children('.percent').remove();
            }

            $(this).easyPieChart({
                barColor: pbColor,
                trackColor: tColor,
                scaleColor: sColor,
                lineCap: lCap,
                lineWidth: lWidth,
                size: pSize,
                animate: pAnimate,
                onStep: function (from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));


                }
            });

        });
    }

    try {
        $.scrollUp({
            scrollName: 'scrollTop', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade',
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
            activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
    } catch (err) {
        console.log('scrollTop is not found')
    }

});