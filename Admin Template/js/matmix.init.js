jQuery(document).ready(function ($) {
    var pCon = $('.page-container'),
        sRight = $('.right-aside'),
        aRight = $('.right-aside'),
        mLbar = $('.m-leftbar-show'),
        pBody = $('body'),
        pHtml = $('html'),
        NoteCon = $('.note-container'),
        inboxCon = $('.inbox-container'),
        TaskCon = $('.task-container');


    $('.inbox-aside-action').on('click', function (event) {
        event.preventDefault();

        if (inboxCon.hasClass('hide-inbox-sidebar')) {
            inboxCon.removeClass('hide-inbox-sidebar');
            $(this).children('i').removeClass('fa-indent');
            $(this).children('i').addClass('fa-outdent');
        } else {
            inboxCon.addClass('hide-inbox-sidebar');
            $(this).children('i').removeClass('fa-outdent');
            $(this).children('i').addClass('fa-indent');
        }
        if (inboxCon.hasClass('mobile-mail-show')) {
            inboxCon.removeClass('mobile-mail-show');
        }

    });

    $('.item-label').each(function () {
        var labelColor = $(this).data('color');
        if (labelColor) {
            $(this).children('a').children('.label-color').css({
                'background-color': labelColor
            });
        }

    });

    var jRes = jRespond([{
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
    }]);

    jRes.addFunc([{
        breakpoint: ['handheld', 'tablet'],
        enter: function () {

            $('.email-list-details').on('click', function () {

                if (inboxCon.hasClass('mobile-mail-show')) {
                    inboxCon.removeClass('mobile-mail-show');
                } else {
                    inboxCon.addClass('mobile-mail-show');
                }

            });
            $('.task-list-details').on('click', function () {

                if (TaskCon.hasClass('mobile-task-show')) {
                    TaskCon.removeClass('mobile-task-show');

                } else {
                    TaskCon.addClass('mobile-task-show');
                    $('.task-list-back').fadeIn('fast');
                }

            });

            $('.task-list-back').on('click', function (event) {
                event.preventDefault();

                if (TaskCon.hasClass('mobile-task-show')) {
                    TaskCon.removeClass('mobile-task-show');
                    $('.task-list-back').fadeOut('fast');
                } else {
                    TaskCon.addClass('mobile-task-show');
                }

            });

            $('.note-list-details').on('click', function () {

                if (NoteCon.hasClass('mobile-note-show')) {
                    NoteCon.removeClass('mobile-note-show');

                } else {
                    NoteCon.addClass('mobile-note-show');
                    $('.note-list-back').fadeIn('fast');
                }

            });

            $('.note-list-back').on('click', function (event) {
                event.preventDefault();

                if (NoteCon.hasClass('mobile-note-show')) {
                    NoteCon.removeClass('mobile-note-show');
                    $('.note-list-back').fadeOut('fast');
                } else {
                    NoteCon.addClass('mobile-note-show');
                }

            });
            $('.mobile-mail-action').on('click', function (event) {
                event.preventDefault();

                if (inboxCon.hasClass('mobile-mail-show')) {
                    inboxCon.removeClass('mobile-mail-show');
                } else {
                    inboxCon.addClass('mobile-mail-show');
                }

            });



        },
        exit: function () {

        }
    }]);

    function composeForm() {
        var wh = $(window).height();
        var hHeight = $('.compose-form-top').height();
        var fHeight = $('.compose-form-bottom').height();
        var bHeight = wh - hHeight;
        var mHeight = (bHeight - fHeight) - 40;
        $('.compose-form-wrap').css({
            'height': mHeight + 'px'
        });

    }

    composeForm();

    function MaTmixInbox() {
        var wh = $(window).height();
        var inboxContainer = $('.inbox-container');
        if (inboxContainer.length) {
            var inboxTopOfset = inboxContainer.offset().top;

        }
        var inboxCalH = wh - inboxTopOfset
        var mailLenght = $('.email-content').length;


        $('.inbox-container').css({
            'height': inboxCalH + 'px'
        });
        $('.inbox-content').css({
            'height': inboxCalH + 'px'
        });
        $('.inbox-sidebar').css({
            'height': inboxCalH + 'px'
        });
        $('.email-list').css({
            'height': inboxCalH + 'px'
        });
        $('.mail-body').css({
            'height': inboxCalH + 'px'
        });

        $('.email-content').each(function () {
            if (mailLenght > 1) {

                $(this).parent('.mail-body').addClass('multi-page');
            }

        });

    }
    MaTmixInbox();

    $(window).smartresize(function () {
        composeForm();
        MaTmixInbox()
    });


    function MatMixScroll() {
        var wh = $(window).height();
        var AppsContainer = $('.apps-container');
        if (AppsContainer.length) {
            var AppsTopOfset = AppsContainer.offset().top;

        }
        var AppsCalH = wh - AppsTopOfset;


        $('.apps-panel-scroll').css({
            'height': AppsCalH + 'px'
        });

    }
    MatMixScroll();
    $(window).smartresize(function () {
        MatMixScroll()
    });


    var cFrm = $('.compose-form')
    $(document).on('click', '.compose-form-minimize', function (event) {
        event.preventDefault();
        var minCheck = $(this).parents('.compose-form-top').parents(cFrm);
        if (minCheck.hasClass('minimized')) {
            $("<span class='i-mask'></span>").prependTo(".page-container");
            $(".i-mask").css('cursor', 'url(images/close-icon.png),auto');
            minCheck.removeClass('minimized');
            pHtml.addClass('off-canvas');
            pBody.addClass('off-canvas');

        } else {
            minCheck.addClass('minimized');
            $('.i-mask').remove();
            pHtml.removeClass('off-canvas');
            pBody.removeClass('off-canvas');
        }


    });

    $(document).on('click', '.compose-form-maximize', function (event) {
        event.preventDefault();
        var minCheck = $(this).parents('.compose-form-top').parents(cFrm);
        if (minCheck.hasClass('maximized')) {
            minCheck.removeClass('maximized');
        } else {
            minCheck.addClass('maximized');
        }


    });

    $(document).on('click', '.compose-mail', function (event) {
        event.preventDefault();
        cFrm.addClass('compose-form-show');
        $("<span class='i-mask'></span>").prependTo(".page-container");
        $(".i-mask").css('cursor', 'url(images/close-icon.png),auto');
        pHtml.addClass('off-canvas');
        pBody.addClass('off-canvas');

        $('.compose-editor').summernote({
            height: 250,
            focus: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });

    });

    if ($.summernote) {
        $('.task-comment-input').summernote({
            height: 150,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['codeview']]
        ]
        });

        $('.forum-post-editor').summernote({
            height: 125,
            focus: true,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['codeview']]
        ]
        });

        $('.forum-reply-input').summernote({
            height: 225,
            focus: true,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['codeview']]
        ]
        });

    }


    $(document).on('click', '.compose-form-exit', function (event) {
        event.preventDefault();
        cFrm.removeClass('compose-form-show');
        cFrm.removeClass('minimized');
        pHtml.removeClass('off-canvas');
        pBody.removeClass('off-canvas');
        $('.i-mask').remove();
    });


    $(document).on('click', '.i-mask', function () {

        cFrm.removeClass('compose-form-show');
        pHtml.removeClass('off-canvas');
        pBody.removeClass('off-canvas');
        $('.i-mask').remove();
    });


    /**
     * iCheck
     * icheck.js
     * icheck.css
     *  */
    try {

        $('.mail-select,.select-all-email,.task-select,.select-all-task,.note-select,.select-all-note,.todo-select').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
            increaseArea: '30%' // optional
        });

        $('.i-min-check').iCheck({
            checkboxClass: 'icheckbox_minimal-pink',
            radioClass: 'iradio_minimal-pink',
            increaseArea: '30%' // optional
        });

        $('.tc-check,.tc-check-all').iCheck({
            checkboxClass: 'icheckbox_minimal-aero',
            radioClass: 'iradio_minimal-aero',
            increaseArea: '30%' // optional
        });

    } catch (e) {

    }

    function SelectAllMail() {
        var checkAll = $('input.select-all-email');
        var checkboxes = $('input.mail-select');



        checkAll.on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                checkboxes.iCheck('check');
            } else {
                checkboxes.iCheck('uncheck');
            }
        });

        checkboxes.on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                $(this).iCheck('check');
                $(this).parents('.email-list-action').parents('.email-list-item').addClass('m-selected');
            } else {
                $(this).iCheck('uncheck');
                $(this).parents('.email-list-action').parents('.email-list-item').removeClass('m-selected');
            }
        });

        checkboxes.on('ifChanged', function (event) {
            if (checkboxes.filter(':checked').length == checkboxes.length) {
                checkAll.prop('checked', 'checked');
            } else {
                checkAll.removeProp('checked');
            }
            checkAll.iCheck('update');
        });
    };

    SelectAllMail();


    function SelectAllNote() {
        var NoteCheckAll = $('input.select-all-note');
        var NoteCheckboxes = $('input.note-select');

        NoteCheckAll.on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                NoteCheckboxes.iCheck('check');
            } else {
                NoteCheckboxes.iCheck('uncheck');
            }
        });

        NoteCheckboxes.on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                $(this).iCheck('check');
                $(this).parents('.note-list-action').parents('.note-list-item').addClass('note-item-selected');
            } else {
                $(this).iCheck('uncheck');
                $(this).parents('.note-list-action').parents('.note-list-item').removeClass('note-item-selected');
            }
        });

        NoteCheckboxes.on('ifChanged', function (event) {
            if (NoteCheckboxes.filter(':checked').length == NoteCheckboxes.length) {
                NoteCheckAll.prop('checked', 'checked');
            } else {
                NoteCheckAll.removeProp('checked');
            }
            NoteCheckAll.iCheck('update');
        });
    };

    SelectAllNote();

    var wh = $(window).height();
    var AppsContainer = $('.apps-container');
    if (AppsContainer.length) {
        var AppsTopOfset = AppsContainer.offset().top;
    }
    var AppsCalH = wh - AppsTopOfset;


    if ($.summernote) {
        $('.compose-note').summernote({
            height: AppsCalH,
            focus: true,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']]
        ]
        });
    }


    $("[data-event=fullscreen]").on('click', function () {
        var NoteFullScreen = $('.note-body').hasClass('full-screen');
        if (NoteFullScreen) {
            $('.note-body').removeClass('full-screen');
        } else {
            $('.note-body').addClass('full-screen');
        }
    });

    $('.btn-list-serach').on('click', function () {
        $('.list-toolbar').children('.list-search-form').fadeIn('fast');
        $('.list-search-input').focus();
    });

    $('.s-input-close').on('click', function () {
        $('.list-toolbar ').children('.list-search-form').fadeOut('fast');
    });


    function NoteWithSidebar() {
        var NoteSideW = $('.note-sidebar').width();
        var NoteListW = $('.note-list-wrap').width();
        var NoteBodyCal = $(window).width() - (NoteSideW + NoteListW);
        $('.note-body').css({
            'width': (NoteBodyCal - $('.left-aside').width()) + 'px'
        });
    }
    NoteWithSidebar();


    function NoteWithOutSidebar() {
        var NoteListW = $('.note-list-wrap').width();
        var NoteBodyCal = $(window).width() - NoteListW;
        $('.note-body').css({
            'width': (NoteBodyCal - $('.left-aside').width()) + 'px'
        });
    }


    function TaskWithSidebar() {
        var NoteSideW = $('.task-sidebar').width();
        var NoteListW = $('.task-list').width();
        var NoteBodyCal = $(window).width() - (NoteSideW + NoteListW);
        $('.task-body').css({
            'width': (NoteBodyCal - $('.left-aside').width()) + 'px'
        });
    }
    TaskWithSidebar();

    function TaskWithOutSidebar() {
        var NoteListW = $('.task-list').width();
        var NoteBodyCal = $(window).width() - NoteListW;
        $('.task-body').css({
            'width': (NoteBodyCal - $('.left-aside').width()) + 'px'
        });
    }

    $('.note-sidebar-toggle').on('click', function (event) {
        event.preventDefault();

        if (NoteCon.hasClass('hide-note-sidebar')) {
            NoteCon.removeClass('hide-note-sidebar');
            NoteWithSidebar();
            $(this).children('i').removeClass('fa-outdent');
            $(this).children('i').addClass('fa-indent');
        } else {
            NoteCon.addClass('hide-note-sidebar');
            NoteWithOutSidebar();
            $(this).children('i').removeClass('fa-indent');
            $(this).children('i').addClass('fa-outdent');
        }
        if (NoteCon.hasClass('mobile-note-show')) {
            NoteCon.removeClass('mobile-note-show');
        }

    });

    $('.task-sidebar-toggle').on('click', function (event) {
        event.preventDefault();

        if (TaskCon.hasClass('hide-task-sidebar')) {
            TaskCon.removeClass('hide-task-sidebar');
            TaskWithSidebar();
            $(this).children('i').removeClass('fa-outdent');
            $(this).children('i').addClass('fa-indent');
        } else {
            TaskCon.addClass('hide-task-sidebar');
            TaskWithOutSidebar();
            $(this).children('i').removeClass('fa-indent');
            $(this).children('i').addClass('fa-outdent');
        }
        if (TaskCon.hasClass('mobile-task-show')) {
            TaskCon.removeClass('mobile-task-show');
        }
    });



    function ForumCatHeight() {
        var MainHeight = $(window).height();
        var ForumListContainer = $('.forum-list-container');

        if (ForumListContainer.length) {
            var OffsetCal = ForumListContainer.offset().top;

        }

        var CalHeight = MainHeight - OffsetCal;


        $(window).on('scroll', function () {
            var ScrollPos = $(window).scrollTop();

            if (ScrollPos > 60) {
                $('.forum-categories').addClass('fixed-top-side');
            } else {
                $('.forum-categories').removeClass('fixed-top-side');
            }
            var ScrollCal = CalHeight + ScrollPos;
            if (ScrollPos < 60) {
                $('.forum-categories').css({
                    'height': ScrollCal + "px"
                });
            }
        });

        $('.forum-categories').css({
            'height': CalHeight + "px"
        });


    }
    ForumCatHeight();

    $(window).smartresize(function () {
        NoteWithSidebar();
        NoteWithOutSidebar();
        TaskWithSidebar();
        TaskWithOutSidebar();
        ForumCatHeight();

    });



    if ($.fn.select2) {
        $('.tickets-switch').select2({
            placeholder: "Select a State",
            maximumSelectionSize: 6,
            minimumResultsForSearch: -1
        });
        $('.forum-select').select2({
            placeholder: "Select a State",
            maximumSelectionSize: 6,
            minimumResultsForSearch: -1
        });
        $('.topic-tags').select2({
            placeholder: "Select a State",
            maximumSelectionSize: 6,
            minimumResultsForSearch: -1
        });
        $('.status-select').select2({
            placeholder: "Select a State",
            maximumSelectionSize: 6,
            minimumResultsForSearch: -1
        });
        $('.status-select-all').select2({
            placeholder: "Select a State",
            maximumSelectionSize: 6,
            minimumResultsForSearch: -1
        });



    }


    if ($.fn.mentionsInput) {
        $('.mention').mentionsInput({
            onDataRequest: function (mode, query, callback) {
                var data = [{
                    id: 1,
                    name: 'Kenneth Auchenberg',
                    'avatar': 'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif',
                    'type': 'contact'
                }, {
                    id: 2,
                    name: 'Jon Froda',
                    'avatar': 'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif',
                    'type': 'contact'
                }, {
                    id: 3,
                    name: 'Anders Pollas',
                    'avatar': 'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif',
                    'type': 'contact'
                }, {
                    id: 4,
                    name: 'Kasper Hulthin',
                    'avatar': 'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif',
                    'type': 'contact'
                }, {
                    id: 5,
                    name: 'Andreas Haugstrup',
                    'avatar': 'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif',
                    'type': 'contact'
                }, {
                    id: 6,
                    name: 'Pete Lacey',
                    'avatar': 'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif',
                    'type': 'contact'
                }];

                data = _.filter(data, function (item) {
                    return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1
                });

                callback.call(this, data);
            }
        });
    }


    var SyntaxHighlight = $.SyntaxHighlighter;
    if (SyntaxHighlight) {
        SyntaxHighlight.init({
            'theme': 'balupton',
            'themes': ['balupton']
        });
    }


    function ForumTopicAction() {
        var ForumTopic = $('.forum-post-container');
        if (ForumTopic.hasClass('forum-form-hide')) {
            ForumTopic.removeClass('forum-form-hide');
        } else {
            ForumTopic.addClass('forum-form-hide');
        }
    }

    $('.create-topic').on('click', function (e) {
        e.preventDefault();
        ForumTopicAction();

    });

    $('.topic-close').on('click', function (e) {
        e.preventDefault();
        ForumTopicAction();
    });



    function ForumReplyAction() {
        var ForumTopic = $('.forum-reply-post');
        if (ForumTopic.hasClass('forum-reply-hide')) {
            ForumTopic.removeClass('forum-reply-hide');
        } else {
            ForumTopic.addClass('forum-reply-hide');
        }
    }

    $('.reply-forum-topic').on('click', function (e) {
        e.preventDefault();
        ForumReplyAction();

    });

    $('.reply-close').on('click', function (e) {
        e.preventDefault();
        ForumReplyAction();
    });

    $("body").scroll(function (e) {
        e.preventDefault()
    });




    $('.forum-categories').bind('mousewheel DOMMouseScroll', function (e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        } else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
    });

    $('.left-navigation, .chat-user-list, .server-stats-content, .aside-notifications-wrap').bind('mousewheel DOMMouseScroll', function (e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        } else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
    });

    $('.forum-aside-toggle').on('click', function (e) {
        var ForumCat = $('.forum-categories');
        if (ForumCat.hasClass('forum-categories-show')) {
            ForumCat.removeClass('forum-categories-show');
            ForumCat.addClass('forum-categories-hide');
        } else {
            ForumCat.removeClass('forum-categories-hide');
            ForumCat.addClass('forum-categories-show');

        }
    });

    var TopicsList = $('.topics-list');
    if (TopicsList.hasClass('condense-topics')) {
        $('.list-condense').addClass('active-btn');
    } else {
        $('.list-expand').addClass('active-btn');
    }

    $('.list-condense').on('click', function () {

        TopicsList.addClass('condense-topics');
        $(this).addClass('active-btn');
        $(this).siblings('.btn').removeClass('active-btn');
    });

    $('.list-expand').on('click', function () {

        if (TopicsList.hasClass('condense-topics')) {
            TopicsList.removeClass('condense-topics');
            $(this).addClass('active-btn');
            $(this).siblings('.btn').removeClass('active-btn');
        }
    });


    /*==Plugins Init==*/

    /*========================
         * ADVANCED FORM ELEMENTS *
     ==========================*/
    /**
     * Tags Input
     * jquery.tagsinput.js
     * tagsinput.css
     * */
    if ($.fn.tagsInput) {
        $('.tags-input').each(function () {
            var tagsType = $(this).data('type')
            var highlightColor = $(this).data('highlight-color')
            if (tagsType === 'tags') {
                $(this).tagsInput({
                    width: 'auto'
                });
            }
            if (tagsType === 'highlighted-tags') {
                $(this).tagsInput({
                    width: 'auto',
                    onChange: function (elem, elem_tags) {
                        var languages = ['php', 'ruby', 'javascript'];
                        $('.tag', elem_tags).each(function () {
                            if ($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0) $(this).css('background-color', highlightColor);
                        });
                    }
                });
            }
        });
    }

    /**
     * Input Mask
     * jquery.mask.js
     *  */
    if ($.fn.mask) {
        $('.date-mask').mask('11/11/1111', {
            placeholder: "__/__/____"
        });
        $('.time-mask').mask('00:00:00', {
            placeholder: "00:00:00"
        });
        $('.date_time-mask').mask('00/00/0000 00:00:00', {
            placeholder: "00/00/0000 00:00:00"
        });
        $('.cep-mask').mask('00000-000', {
            placeholder: "00000-000"
        });
        $('.phone-mask').mask('0000-0000', {
            placeholder: "0000-0000"
        });
        $('.phone_with_ddd-mask').mask('(00) 0000-0000', {
            placeholder: "(00) 0000-0000"
        });
        $('.phone_us-mask').mask('(000) 000-0000', {
            placeholder: "(000) 000-0000"
        });
        $('.mixed-mask').mask('AAA 000-S0S', {
            placeholder: "AAA 000-S0S"
        });
        $('.cpf-mask').mask('000.000.000-00', {
            reverse: true,
            placeholder: "000.000.000-00"
        });
        $('.money-mask').mask('000.000.000.000.000,00', {
            reverse: true,
            placeholder: "000.000.000.000.000,00"
        });
        $('.money2-mask').mask("#.##0,00", {
            reverse: true,
            maxlength: false,
            placeholder: "#.##0,00"
        });
        $('.ip_address-mask').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            placeholder: "0ZZ.0ZZ.0ZZ.0ZZ",
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            }
        });
        $('.ip_address-mask').mask('099.099.099.099', {
            placeholder: "099.099.099.099"
        });
        $('.percent-mask').mask('##0,00%', {
            reverse: true,
            placeholder: "###,##%"
        });
        $('.clear-if-not-match-mask').mask("00/00/0000", {
            clearIfNotMatch: true,
            placeholder: "__/__/____"
        });
        $('.placeholder-mask').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
    }


    /** 
     * select2.js
     * select2-bootstrap.css
     *  */
    if ($.fn.select2) {
        var placeholder = "Select a State";
        $('.select2, .select2-multiple').select2({
            placeholder: placeholder
        });

        $('.select2-allow-clear').select2({
            allowClear: true,
            placeholder: placeholder
        });
        $('button[data-select2-open]').click(function () {
            $('#' + $(this).data('select2-open')).select2('open');
        });
        var select2OpenEventName = "select2-open";
        $(':checkbox').on("click", function () {
            $(this).parent().nextAll('select').select2("enable", this.checked);
        });
    }

    /**
     * Spinner
     * jquery.bootstrap-touchspin.js
     * bootstrap-touchspin.css
     *  */
    if ($.fn.TouchSpin) {
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'glyphicon glyphicon-plus',
            verticaldownclass: 'glyphicon glyphicon-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }

        $("input[name='demo1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='demo2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='demo3']").TouchSpin();
        $("input[name='demo3_21']").TouchSpin({
            initval: 40
        });
        $("input[name='demo3_22']").TouchSpin({
            initval: 40
        });

        $("input[name='demo5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        $("input[name='demo0']").TouchSpin({});
    }

    /**
     * Bootstrap Filestyle
     * bootstrap-filestyle.js
     **/
    if ($.fn.filestyle) {
        $(":file").filestyle();
    }


    /**
     * selectize.css
     * selectize.js
     * */
    if ($.fn.selectize) {

        var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
            '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

        $('#select-contact').selectize({
            plugins: ['remove_button'],
            persist: false,
            maxItems: null,
            valueField: 'email',
            labelField: 'name',
            searchField: ['name', 'email'],
            options: [{
                email: 'brian@thirdroute.com',
                name: 'Brian Reavis'
            }, {
                email: 'nikola@tesla.com',
                name: 'Nikola Tesla'
            }, {
                email: 'someone@gmail.com'
            }],
            render: {
                item: function (item, escape) {
                    return '<div>' +
                        (item.name ? '<span class="name">' + escape(item.name) + '</span>' : '') +
                        (item.email ? '<span class="email">' + escape(item.email) + '</span>' : '') +
                        '</div>';
                },
                option: function (item, escape) {
                    var label = item.name || item.email;
                    var caption = item.name ? item.email : null;
                    return '<div>' +
                        '<span class="label">' + escape(label) + '</span>' +
                        (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                        '</div>';
                }
            },
            createFilter: function (input) {
                var match, regex;

                // email@address.com
                regex = new RegExp('^' + REGEX_EMAIL + '$', 'i');
                match = input.match(regex);
                if (match) return !this.options.hasOwnProperty(match[0]);

                // name <email@address.com>
                regex = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
                match = input.match(regex);
                if (match) return !this.options.hasOwnProperty(match[2]);

                return false;
            },
            create: function (input) {
                if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
                    return {
                        email: input
                    };
                }
                var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
                if (match) {
                    return {
                        email: match[2],
                        name: $.trim(match[1])
                    };
                }
                alert('Invalid email address.');
                return false;
            }
        });


        $('#input-tags').selectize({
            delimiter: ',',
            persist: false,
            create: function (input) {
                return {
                    value: input,
                    text: input
                }
            }
        });

        $('#selectize-select').selectize();

    }

    /**
     * Bootstrap Datepicker
     * bootstrap-datepicker.js
     * datepicker.css
     **/

    if ($.fn.datepicker) {
        $('.input-date-picker').datepicker({
            orientation: "bottom",
            daysOfWeekDisabled: "6",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });
        $('.cal-date-picker').datepicker({
            orientation: "bottom",
            daysOfWeekDisabled: "6",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });

        $('.addon-datepicker').datepicker({
            orientation: "bottom",
            daysOfWeekDisabled: "1",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });

        $('.inline-date-picker').datepicker({
            daysOfWeekDisabled: "1",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });

        $('.input-daterange').datepicker({
            orientation: "top",
            daysOfWeekDisabled: "1",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });

    }

    /**
     * Bootstrap daterangepicker
     * daterangepicker.js
     * daterangepicker.css
     **/

    if ($.fn.daterangepicker) {
        $('.input-daterange-datepicker').daterangepicker();
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true,
            format: 'MM/DD/YYYY h:mm A',
            timePickerIncrement: 30,
            timePicker12Hour: true,
            timePickerSeconds: false
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '06/01/2015',
            maxDate: '06/30/2015',
            dateLimit: {
                days: 6
            }
        });

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

    }

    /**
     * Bootstrap colorpicker
     * colorpicker.css
     * colorpicker.js
     *  */

    if ($.fn.colorpicker) {
        $('.demo1').colorpicker();
        $('.demo2').colorpicker();

    }

    /**
     * Bootstrap colorpicker
     * colorpicker.css
     * colorpicker.js
     *  */

    if ($.fn.colorPicker) {

        $('.color').colorPicker();
        $('.elem-color').colorPicker();

    }

    /**
     * Form Validate
     * jquery.validate.js
     *  */
    if ($.fn.validate) {

        $("#commentForm").validate();

        $("#login").validate()

        // validate the form when it is submitted
        var validator = $("#form1").validate({
            errorPlacement: function (error, element) {
                // Append error within linked label
                $(element)
                    .closest("form")
                    .find("label[for='" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",
            messages: {
                user: {
                    required: " (required)",
                    minlength: " (must be at least 3 characters)"
                },
                password: {
                    required: " (required)",
                    minlength: " (must be between 5 and 12 characters)",
                    maxlength: " (must be between 5 and 12 characters)"
                }
            }
        });

        $(".cancel").click(function () {
            validator.resetForm();
        });

        $("#form2").validate();
    }


    /**
     * summernote-wysiwyg
     * summernote.min.js
     * text-editor.css
     **/

    if ($.summernote) {
        $('.minimal-editor').summernote({
            height: 200,
            focus: false,
            toolbar: [
                ['font', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        $('.simple-editor').summernote({
            height: 200,
            focus: false,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'hr']]
            ]
        });
        $('.full-editor').summernote({
            height: 250,
            focus: false,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });


        $("[data-event=fullscreen]").on('click', function () {
            var FullScreen = $('body').hasClass('full-screen');
            if (FullScreen) {
                $('body').removeClass('full-screen');
            } else {
                $('body').addClass('full-screen');
            }
        });


        $("#text-edit").on('click', function () {
            $('.editable-note').summernote({
                focus: true,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['codeview']]
            ]
            });
        });

        $("#text-save").on('click', function () {
            var aHTML = $('.editable-note').code();
            $('.editable-note').destroy();
        });


        $('.air-note').summernote({
            airMode: true,
            airPopover: [
    ['color', ['color']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture']]
  ]
        });


    }


    /*--Tables
    css/tables.css
    js/jquery.dataTables.js
    js/dataTables.responsive.js
    js/dataTables.tableTools.js
    js/dataTables.bootstrap.js
    */


    if ($.fn.dataTable) {

        $('.dt-table-simple').DataTable({
            responsive: true,
            "oLanguage": {
                "sLengthMenu": '<select class="td-select form-control">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select>' + '<span class="r-label">Entries</span>'
            },
            "dom": '<"row" <"col-md-6"l><"col-md-6"f>><"row" <"col-md-12"<"td-content-simple"rt>>><"row" <"col-md-6"i><"col-md-6"p>>'
        });


        $('.dt-table').DataTable({
            responsive: true,
            //            "columnDefs": [ { "targets": [0], "orderable": false }],
            "oLanguage": {
                "sLengthMenu": '<select class="td-select form-control">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select>' + '<span class="r-label">Entries</span>'
            },
            "dom": '<"row" <"col-md-6"l><"col-md-6"f>><"row" <"col-md-12"<"td-content"rt>>><"row" <"col-md-6"i><"col-md-6"p>>'
        });



        $('.dt-table-export').DataTable({
            "iDisplayLength": 10,
            "oLanguage": {
                "sLengthMenu": '<select class="td-select form-control">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select>' + '<span class="r-label">Entries</span>'
            },
            "dom": '<"row" <"col-md-6"><"col-md-6" <"td-export-toolbar"T>>><"row" <"col-md-6"l><"col-md-6"f>><"row" <"col-md-12"<"td-content"rt>>><"row" <"col-md-6"i><"col-md-6"p>>',
            responsive: true,
            "tableTools": {
                "sSwfPath": "swf/copy_csv_xls_pdf.swf"
            }
        });
        if ($.fn.select2) {
            $('.td-select').select2({
                minimumResultsForSearch: -1
            });
        }
    }


    /*--Tables
    css/tables.css
    js/stacktable.js
    */

    if ($.fn.cardtable) {
        $('.dt-stack-table').stacktable();
    }


    //UI Elements & Componenets
    /*--jQuery Noty
    * jquery.noty.js
    --*/
    // notification body's can be any html string or just string

    if ($.noty) {
        var n_dom = [];
        n_dom[0] = '<div class="activity-item"> <i class="fa fa-tasks text-warning"></i> <div class="activity"> There are <a href="#">6 new tasks</a> waiting for you. Don\'t forget! <span>About 3 hours ago</span> </div> </div>',
            n_dom[1] = '<div class="activity-item"> <i class="fa fa-check text-error"></i> <div class="activity"> Mail server was updated. See <a href="#">changelog</a> <span>About 2 hours ago</span> </div> </div>',
            n_dom[2] = '<div class="activity-item"> <i class="fa fa-heart text-info"></i> <div class="activity"> Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a> <span>35 minutes ago</span> </div> </div>',
            n_dom[3] = '<div class="activity-item"> <i class="fa fa-shopping-cart text-success"></i> <div class="activity"> <a href="#">Eugene</a> ordered 2 copies of <a href="#">OEM license</a> <span>14 minutes ago</span> </div> </div>',
            n_dom[4] = '<div class="activity-item"> <i class="ico-alarm-check text-alert"></i> <div class="activity"> <a href="#">Amark</a> This is frienly notification example <a href="#">Here</a> <span>14 minutes ago</span> </div> </div>',
            n_dom[5] = '<div class="activity-item"> <i class="ico-alarm-check text-alert"></i> <div class="activity"> <a href="#">Amark</a> This is frienly notification example <a href="#">Here</a> <span>14 minutes ago</span> </div> </div>';

        window.anim = {};
        window.anim.open = 'flipInX';
        window.anim.close = 'flipOutX';
        $('#anim-open').on('change', function (e) {
            window.anim.open = $(this).val();
        });

        $('#anim-close').on('change', function (e) {
            window.anim.close = $(this).val();
        });

        function nGen(type, text, layout) {

            var n = noty({
                text: text,
                type: type,
                dismissQueue: true,
                layout: layout,
                closeWith: ['click'],
                theme: 'MatMixNoty',
                maxVisible: 10,
                animation: {
                    open: 'noty_animated bounceInRight',
                    close: 'noty_animated bounceOutRight',
                    easing: 'swing',
                    speed: 500
                }

            });
            //        setTimeout(function () {
            //            n.close();
            //        }, 3000);

        }


        function nGenAll() {
            nGen('warning', n_dom[0], 'topRight');
            nGen('error', n_dom[1], 'topRight');
            nGen('information', n_dom[2], 'topRight');
            nGen('success', n_dom[3], 'topRight');
            nGen('alert', n_dom[4], 'topRight');
        }

        //        setTimeout(function () {
        //            nGenAll();
        //        }, 1000);



        function PreviewGen(type, text, layout) {

            var n = noty({
                text: text,
                type: type,
                dismissQueue: true,
                layout: layout,
                closeWith: ['click'],
                theme: 'MatMixNoty',
                maxVisible: 10
            });
            setTimeout(function () {
                n.close();
            }, 5000);

        }


        $('.ex-noty').on('click', function () {
            var Dtype = $(this).data("type"),
                Dlayout = $(this).data("layout");
            PreviewGen(Dtype, n_dom[5], Dlayout);
        });

    }

    /*--jQuery Noty
    * switchery.css
    * switchery.js
    --*/

    try {
        var sw_large = Array.prototype.slice.call(document.querySelectorAll('.switch-large'));

        sw_large.forEach(function (html) {
            var sw_largeGen = new Switchery(html, {
                size: 'large',
                color: '#66bb6a',
                jackColor: '#fff',
                secondaryColor: '#eee',
                jackSecondaryColor: '#fff'
            });
        });

        var sw_m = Array.prototype.slice.call(document.querySelectorAll('.switch-m'));
        sw_m.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#66bb6a',
                jackColor: '#fff',
                secondaryColor: '#eee',
                jackSecondaryColor: '#fff'
            });
        });

        var sw_small = Array.prototype.slice.call(document.querySelectorAll('.switch-small'));
        sw_small.forEach(function (html) {
            var switchery = new Switchery(html, {
                size: 'small',
                color: '#66bb6a',
                jackColor: '#fff',
                secondaryColor: '#eee',
                jackSecondaryColor: '#fff'
            });
        });

        var sw_c = Array.prototype.slice.call(document.querySelectorAll('.switch-c'));
        sw_c.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#15bdc3',
                jackColor: '#fff',
                secondaryColor: '#eee',
                jackSecondaryColor: '#fff'
            });
        });

        var sw_c = Array.prototype.slice.call(document.querySelectorAll('.switch-mini'));
        sw_c.forEach(function (html) {
            var switchery = new Switchery(html, {
                size: 'small',
                color: '#15bdc3',
                jackColor: '#fff',
                secondaryColor: '#eee',
                jackSecondaryColor: '#fff'
            });
        });

    } catch (e) {

    }



    /*
     * jQuery No UI slider
     * jquery.nouislider.css
     * jquery.nouislider.js
     */
    if ($.fn.noUiSlider) {

        $("#slider-range").noUiSlider({
            start: [50, 200],
            connect: true,
            format: wNumb({
                mark: '',
                decimals: 0,
                prefix: '$'
            }),
            range: {
                'min': 0,
                '20%': 100,
                '40%': 200,
                '60%': 300,
                '80%': 400,
                'max': 500
            }

        });
        $('#slider-range').Link('lower').to($('#slider-snap-value-lower'));

        $('#slider-range').Link('upper').to($('#slider-snap-value-upper'));

        $("#slider-range").noUiSlider_pips({
            mode: 'range',
            density: 3,
            format: wNumb({
                decimals: 0,
                prefix: '$'
            })
        });

        var range_all_sliders = {
            'min': [0],
            '10%': [500, 500],
            '50%': [4000, 1000],
            'max': [10000]
        };



        $("#pips-range").noUiSlider({
            start: [20, 80],
            connect: true,
            range: {
                'min': 0,
                'max': 100
            }
        });
        $("#pips-range-01").noUiSlider({
            start: [4000],
            range: {
                'min': [2000],
                'max': [10000]
            }
        });
        $("#pips-range-02").noUiSlider({
            range: range_all_sliders,
            start: [0, 500],
            connect: true,
            range: {
                'min': 0,
                'max': 1500
            }
        });
        $("#pips-range-vertical").noUiSlider({
            range: range_all_sliders,
            start: 0,
            orientation: 'vertical'
        });
        $("#pips-range-vertical-01").noUiSlider({
            range: range_all_sliders,
            start: [300, 1200],
            connect: true,
            range: {
                'min': 0,
                '20%': 300,
                '80%': 1200,
                'max': 1500
            },
            orientation: 'vertical'
        });
        $("#pips-range-vertical-02").noUiSlider({
            range: range_all_sliders,
            start: [400, 1000],
            connect: true,
            range: {
                'min': 0,
                'max': 1500
            },
            orientation: 'vertical'
        });


        function filter500(value, type) {
            return value % 1000 ? 2 : 1;
        }
        $(".pips-range").noUiSlider_pips({
            mode: 'range',
            density: 3,
            filter: filter500,
            format: wNumb({
                decimals: 2,
                prefix: '$'
            })
        });

    }

    /**
     * Boot Box
     * bootbox.js
     */
    var DemoCallBack = (function () {
        var elem,
            hideHandler,
            that = {};

        that.init = function (options) {
            elem = $(options.selector);
        };

        that.show = function (text) {
            clearTimeout(hideHandler);
            elem.find("span").html(text);
            elem.delay(200).fadeIn().delay(3000).fadeOut();
        };

        return that;
    }());

    DemoCallBack.init({
        "selector": ".bb-alert"
    });

    var bb_demos = {};

    $(document).on("click", "a[data-bb]", function (e) {
        e.preventDefault();
        var type = $(this).data("bb");

        if (typeof bb_demos[type] === 'function') {
            bb_demos[type]();
        }
    });

    // Alert

    bb_demos.alert = function () {
        bootbox.alert("Hello world!", function () {
            DemoCallBack.show("Hello world callback");
        });
    };

    // Confirm
    bb_demos.confirm = function () {
        bootbox.confirm("Are you sure?", function (result) {
            DemoCallBack.show("Confirm result: " + result);
        });
    };

    // Prompt
    bb_demos.prompt = function () {
        bootbox.prompt({
            title: "What is your real name?",
            value: "Kamrujaman Shohel",
            callback: function (result) {
                if (result === null) {
                    DemoCallBack.show("Prompt dismissed");
                } else {
                    DemoCallBack.show("Hi <b>" + result + "</b>");
                }
            }
        });
    }

    // Dialog
    bb_demos.dialog = function () {
            bootbox.dialog({
                message: "I am a custom dialog",
                title: "Custom title",
                buttons: {
                    success: {
                        label: "Success!",
                        className: "btn-success",
                        callback: function () {
                            DemoCallBack.show("great success");
                        }
                    },
                    danger: {
                        label: "Danger!",
                        className: "btn-danger",
                        callback: function () {
                            DemoCallBack.show("uh oh, look out!");
                        }
                    },
                    main: {
                        label: "Click ME!",
                        className: "btn-primary",
                        callback: function () {
                            DemoCallBack.show("Primary button");
                        }
                    }
                }
            });
        }
        // Custom Html Contents
    bb_demos.custom_html = function () {
        bootbox.dialog({
            title: "That html",
            message: '<img src="images/avatar/jaman-01.jpg" alt="image"/><br/> You can also use <b>html</b>'
        });
    }

    // Custom Html Forms
    bb_demos.html_forms = function () {
        bootbox.dialog({
            title: "This is a form in a modal.",
            message: '<div class="row">  ' +
                '<div class="col-md-12"> ' +
                '<form class="form-horizontal"> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Name</label> ' +
                '<div class="col-md-4"> ' +
                '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md"> ' +
                '<span class="help-block">Here goes your name</span> </div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label> ' +
                '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
                '<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="checked"> ' +
                'Really awesome </label> ' +
                '</div><div class="radio"> <label for="awesomeness-1"> ' +
                '<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"> Super awesome </label> ' +
                '</div> ' +
                '</div> </div>' +
                '</form> </div>  </div>',
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        var name = $('#name').val();
                        var answer = $("input[name='awesomeness']:checked").val()
                        DemoCallBack.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");
                    }
                }
            }
        });
    }


    /*Edit Delete Alert in Table*/


    $('.m-user-edit').on('click', function (e) {
        e.preventDefault();
        var Ubox = bootbox.dialog({
            title: "Information for: Amery ",
            message: '<div class="row">  ' +
                '<div class="col-md-12"> ' +
                '<form class="form-horizontal"> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Name</label> ' +
                '<div class="col-md-6"> ' +
                '<input id="name" name="name" type="text" value="Amery" placeholder="Your name" class="form-control input-md"> ' +
                '</div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Address</label> ' +
                '<div class="col-md-6"> ' +
                '<input id="address" name="address" value="Ap #411-3258 Est. Avenue" type="text" placeholder="Address" class="form-control input-md"> ' +
                '</div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Image</label> ' +
                '<div class="col-md-6"> ' +
                '<img src="images/avatar/adellecharles.jpg" alt="user">' +
                '</div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Change Photo</label> ' +
                '<div class="col-md-6"> ' +
                '<input type="file" class="filestyle" data-input="false">' +
                '</div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Status</label> ' +
                '<div class="col-md-6"> ' +
                '<select class="form-control ubox-status-select">' +
                '<option>Select</option>' +
                '<option>Approve</option>' +
                '<option>Reject</option>' +
                ' <option>Suspend</option>' +
                '<option>Pending</option>' +
                '</select>' +
                '</div> ' +
                '</div> ' +
                '</div> </div>' +
                '</form> </div>  </div>',
            buttons: {
                update: {
                    label: "Update",
                    className: "btn-success",
                    callback: function () {
                        var name = $('#name').val();
                        var answer = $("input[name='awesomeness']:checked").val()
                        DemoCallBack.show("Information updated for <b>" + name + "</b>");
                    }
                },
                cancel: {
                    label: "Cancel",
                    className: "btn-danger",
                    callback: function () {
                        DemoCallBack.show("You have cancel the form");
                    }
                }
            }
        });


        Ubox.find(".filestyle").filestyle({
            input: false
        });
        Ubox.find('.ubox-status-select').select2({
            placeholder: "Select a State",
            maximumSelectionSize: 6,
            minimumResultsForSearch: -1
        });


    });



    $('.btn-toolbar').on('click', '.m-user-delete', function (e) {
        e.preventDefault();
        var _this = this;
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Information!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                $(_this).parentsUntil('tbody').addClass("noty_animated bounceOutRight");
                setTimeout(function () {
                    $(_this).parentsUntil('tbody').remove();
                }, 1000);

                swal("Deleted!", "Information has been deleted.", "success");
            } else {
                console.log('not remvoed');
            }
        });
    });

    /*
     * Sweet Alert
     * sweetalert.css
     * sweetalert.js
     */

    $('.simple-alert').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            confirmButtonColor: "#DD6B55"
        });
    });

    $('.success-alert').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "success",
            confirmButtonColor: "#4caf50"
        });
    });

    $('.warning-btn-ok').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal({
                title: "Your imaginary file has been deleted.",
                type: "success",
                confirmButtonColor: "#4caf50"
            });
        });
    });
    $('.warning-btn-cancel').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });

    $('.warning-custom-icon').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "Sweet!",
            text: "Here's a custom image.",
            imageUrl: "images/avatar/jaman-01.jpg"
        });
    });
    $('.warning-custom-html').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "HTML <small>Title</small>!",
            text: 'A custom <span style="color:#F8BB86">html<span> message.',
            html: true
        });
    });

    $('.warning-auto-close').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "Auto close alert!",
            text: "I will close in 3 seconds.",
            timer: 3000,
            showConfirmButton: false
        });
    });

    $('.warning-prompt').on('click', function (e) {
        e.preventDefault();
        swal({
            title: "An input!",
            text: "Write something interesting:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        }, function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }
            swal("Nice!", "You wrote: " + inputValue, "success");
        });
    });




    //Animated Numbers

    $.fn.animateNumbers = function (stop, commas, duration, ease) {
        return this.each(function () {
            var $this = $(this);
            var start = parseInt($this.text().replace(/,/g, ""));
            commas = (commas === undefined) ? true : commas;
            $({
                value: start
            }).animate({
                value: stop
            }, {
                duration: duration == undefined ? 500 : duration,
                easing: ease == undefined ? "swing" : ease,
                step: function () {
                    $this.text(Math.floor(this.value));
                    if (commas) {
                        $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    }
                },
                complete: function () {
                    if (parseInt($this.text()) !== stop) {
                        $this.text(stop);
                        if (commas) {
                            $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        }
                    }
                }
            });
        });
    };


    try {

        $('.number-rotate').appear();
    } catch (e) {

    }



    $(document.body).on('appear', '.number-rotate', function () {
        $('.number-animate').each(function () {
            $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-animation-duration")));
        });
    });


    if ($.fn.fullCalendar) {
        $('#event-calendar').fullCalendar({
            header: {
                left: 'Next',
                center: 'title',
                right: ''
            },
            defaultDate: '2015-08-12',
            selectable: true,
            selectHelper: true,
            select: function (start, end) {
                var calMbox = bootbox.dialog({
                    title: "Event Information",
                    message: '<div class="row">  ' +
                        '<div class="col-md-12"> ' +
                        '<form class="form-horizontal"> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="name">Event Title</label> ' +
                        '<div class="col-md-6"> ' +
                        '<input id="event_title" name="evtitle" type="text" value="Event Title" placeholder="Event Title" class="form-control input-md"> ' +
                        '</div> ' +
                        '</div> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="name">Description</label> ' +
                        '<div class="col-md-6"> ' +
                        '<input id="event_description" name="evdesc" value="Event Description" type="text" placeholder="Description" class="form-control input-md"> ' +
                        '</div> ' +
                        '</div> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="name">Select Color</label> ' +
                        '<div class="col-md-6"> ' +
                        '<div class="input-group event-color-picker"><input id="event_color" type="text" value="#0097a7" class="form-control"/><span class="input-group-addon"><i></i></span></div>' +
                        '</div> ' +
                        '</div> ' +
                        '</form> </div>  </div>',
                    buttons: {
                        update: {
                            label: "Save",
                            className: "btn-success",
                            callback: function () {
                                var evTitle = $('#event_title').val();
                                var evDesc = $('#event_description').val();
                                var evColor = $('#event_color').val();
                                var title = evTitle;
                                var eventData;
                                if (title) {
                                    eventData = {
                                        title: evTitle,
                                        start: start,
                                        end: end,
                                        description: evDesc,
                                        color: evColor
                                    };
                                    $('#event-calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                                }

                            }
                        },
                        cancel: {
                            label: "Cancel",
                            className: "btn-danger",
                            callback: function () {

                            }
                        }
                    }


                });

                calMbox.find('.event-color-picker').colorpicker();


                $('#event-calendar').fullCalendar('unselect');

            },
            eventRender: function (event, element) {
                element.popover({
                    title: event.title,
                    html: true,
                    placement: 'top',
                    content: '<div>' + event.description + '</div>' +
                        '<div>Start: ' + moment(event.start).format('MM/DD/YYYY hh:mm') + '</div>' +
                        '<div>End: ' + moment(event.end).format('MM/DD/YYYY hh:mm') + '</div>'
                });

                element.find('div.fc-title').html(element.find('div.fc-title').text());
                $('body').on('click', function (e) {
                    if (!element.is(e.target) && element.has(e.target).length === 0 && $('.popover').has(e.target).length === 0)
                        element.popover('hide');
                });
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    id: 1,
                    title: 'Long Event',
                    start: '2015-08-01',
                    end: '2015-08-05',
                    description: 'Four days business conference',
                    color: '#43a047'
    },
                {
                    id: 2,
                    title: 'Meeting',
                    start: '2015-08-07',
                    end: '2015-08-07',
                    description: 'Meeting with Nisha Agarwal',
                    color: '#0097a7'
    },
                {
                    id: 3,
                    title: 'Repeating Event',
                    start: '2015-08-09',
                    end: '2015-08-09',
                    description: 'Meeting with Nisha Agarwal',
                    color: '#f9a825'
    },
                {
                    id: 4,
                    title: 'Repeating Event',
                    start: '2015-08-16',
                    end: '2015-08-18',
                    description: 'Meeting with Nisha Agarwal',
                    color: '#009688'
    },
                {
                    id: 5,
                    title: 'Conference',
                    start: '2015-08-11',
                    end: '2015-08-13',
                    description: 'Attend for a software conference',
                    color: '#455a64'
    },
                {
                    id: 6,
                    title: 'Meeting',
                    start: '2015-08-12T10:30:00',
                    end: '2015-08-12T12:30:00',
                    description: 'Meeting with CEO',
                    color: '#ab47bc'
    },
                {
                    id: 7,
                    title: 'Lunch',
                    start: '2015-08-12',
                    end: '2015-08-12',
                    description: 'Lunch with high official',
                    color: '#ef6c00'
    },
                {
                    id: 8,
                    title: 'Meeting',
                    start: '2015-08-12T14:30:00',
                    end: '2015-08-12T12:30:00',
                    description: 'Meeting with VC',
                    color: '#f9a825'
    },
                {
                    id: 9,
                    title: 'Happy Hour',
                    start: '2015-08-12T17:30:00',
                    end: '2015-08-12T12:30:00',
                    description: 'Happy hour with team members',
                    color: '#455a64'
    },
                {
                    id: 10,
                    title: 'Dinner',
                    start: '2015-08-12T20:00:00',
                    end: '2015-08-12T12:30:00',
                    description: 'Dinner with VC',
                    color: '#455a64'
    },
                {
                    id: 11,
                    title: 'Birthday Party',
                    start: '2015-08-13T07:00:00',
                    end: '2015-08-12T12:30:00',
                    description: 'My daughter birthday party',
                    color: '#ef6c00'
    }
   ]






        });




        $('.CalPrev').on('click', function () {
            $('#event-calendar').fullCalendar('prev');
        });
        $('.CalNext').on('click', function () {
            $('#event-calendar').fullCalendar('next');

        });
        $('.CalToday').click(function () {
            $('#event-calendar').fullCalendar('today');
        });

        $('.CalMonthView').on('click', function () {
            $('#event-calendar').fullCalendar('changeView', 'month');
        });
        $('.CalAgendaWeekView').on('click', function () {
            $('#event-calendar').fullCalendar('changeView', 'agendaWeek');

        });
        $('.CalAgendaDayView').click(function () {
            $('#event-calendar').fullCalendar('changeView', 'agendaDay');

        });

        $('.cal-goDate').on('click', function () {
            var GoDate = $('.cal-date-picker').val();
            if (GoDate === "") {
                swal({
                    title: "Oops! Please slect a date",
                    text: "",
                    type: "warning",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ok"
                }, function (isConfirm) {
                    if (isConfirm) {
                        $('.cal-date-picker').focus();
                    }
                });


            } else {
                $('#event-calendar').fullCalendar('gotoDate', GoDate);
            }
        });

    }


    if ($.fn.floatlabel) {
        $('input.floatlabel').floatlabel({
            labelClass: "login-label",
            slideInput: true,
            labelStartTop: '0px',
            labelEndTop: '0px',
            paddingOffset: '20px',
            transitionDuration: 0.2,
            transitionEasing: 'ease-in-out',
            focusColor: '#838780',
            blurColor: '#2996cc'
        });
    }

    
    $('.matmix-icons-list i,.matmix-icons-list span').on('click', function(){
        var fontAttr = $(this).attr("class");  
        $('.font-class').text(fontAttr);
      
      });

});