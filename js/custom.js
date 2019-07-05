$(window).load(function() {

    $('.main_slider').owlCarousel({      
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        autoHeight: true,
        items: 1,
        center: true,
        loop: true,
        margin: 0,
        nav: true,
        navText: [,],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive: {
            992 : {
                mouseDrag: false
            }            
        }
    });

    $('.services_list_carousel').owlCarousel({
        navContainer: '.carousel_nav_services',
        autoHeight: true,
        items: 1,
        loop: false,
        margin: 30,
        nav: true,
        navText: [,],
        responsive: {
            640 : {
                items: 2
            },
            992 : {
                items: 3
            }
        }
    });

    $('.projects_list_carousel').owlCarousel({
        navContainer: '.carousel_nav_projects',
        autoHeight: true,
        items: 1,
        loop: false,
        margin: 2,
        nav: true,
        navText: [,],
        responsive: {
            640 : {
                items: 2
            },
            992 : {
                items: 3
            },
            1440 : {
                items: 4
            }
        }
    });

    $('.team_list').owlCarousel({
        navContainer: '.carousel_nav_team',
        autoHeight: true,
        items: 1,
        loop: false,
        margin: 30,
        nav: true,
        navText: [,],
        responsive: {
            480 : {
                items: 2
            },
            768 : {
                items: 3
            },
            1200 : {
                items: 4
            }
        }
    });

    $('.testimonials_list').owlCarousel({
        navContainer: '.carousel_nav_testimonials',
        autoHeight: true,
        items: 1,
        loop: false,
        margin: 30,
        nav: true,
        navText: [,],
        responsive: {
            640 : {
                items: 2
            }
        }
    });

    $('.partners_list').owlCarousel({
        navContainer: '.carousel_nav_partners',
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        autoHeight: true,
        items: 1,
        loop: true,
        margin: 30,
        nav: false,
        navText: [,],
        responsive: {
            480 : {
                items: 2
            },
            640 : {
                items: 3
            },
            768 : {
                items: 4
            },
            992 : {
                items: 5
            },
            1200 : {
                items: 6
            }
        }
    });

    $('a[href="#top"]').click(function () {
        $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top + "px"
        }, {
            duration: 750,
            easing: 'swing'
        });
        return false;
    });

    $('.sticky_nav').sticky({topSpacing:0});

    if (navigator.userAgent.match(/msie/i) || navigator.userAgent.match(/trident/i) ){
        $("html").addClass("ie");
    }

    openMm();

    $('.main_nav_menu').slicknav({
        label: '',
        prependTo: '.mm_nav',
        allowParentLinks: true
    });

    setProjectHeight();
    setBg($('.section_about .photos .img_wrp'));
    addWrpToImg();

});

$(window).resize(function() {
    $('.sticky_nav').unstick();
    $('.sticky_nav').sticky({topSpacing:0});
});

$(function() {
    $( "#faq_accordion" ).accordion({
        collapsible: true,
        heightStyle: "content",
        animate: 250
    });
});

$(window).scroll(function () {
    if (($(this).scrollTop() > $('.main_header').height())) {
        $('.to_top').addClass('active');
    }
    else {
        $('.to_top').removeClass('active');
    }
});

$(function($) {
    $(function() {
        $('.custom_select').styler();
    });
});

$(function(){
    $('.number1').viewportChecker({
        offset: 100,
        callbackFunction: function(){
            $('#number1').animateNumber({ number: $('#number1').data('num') },3000);
        }
    });
    $('.number2').viewportChecker({
        offset: 100,
        callbackFunction: function(){
            $('#number2').animateNumber({ number: $('#number2').data('num') },3000);
        }
    });
    $('.number3').viewportChecker({
        offset: 100,
        callbackFunction: function(){
            $('#number3').animateNumber({ number: $('#number3').data('num') },3000);
        }
    });
});

function openMm() {
    $('.burger').click(function() {
        if (!$('.burger').hasClass('active')) {
            $('.burger').addClass('active');
            $('.mm_block').addClass('active');
            $('body').addClass('fixed');
        }
        else {
            $('.burger').removeClass('active');
            $('.mm_block').removeClass('active');
            $('body').removeClass('fixed');
        }
    });
    $('.mm_block .btn').click(function() {
        $('.burger').removeClass('active');
        $('.mm_block').removeClass('active');
        $('body').removeClass('fixed');
    });
}

function setProjectHeight() {

    var ph_original = $('.projects_list .one_project .content_wrp'),
        ph = ph_original,
        mh = 0;

    function setHeight(el,h) {
        el.each(function(indx){
            $(this).height(h);
        });
    }

    function setMaxHeight(el) {
        mh = 0;
        setHeight(el,'auto');
        el.each(function(indx){
            if($(this).height()>mh) {
                mh = $(this).height();
            }
        });
        setHeight(el,mh);
    }

    if($(window).width()<992) {
        setMaxHeight(ph);
    }
    else {
        setHeight(ph,'100%');
    }

    $(window).resize(function() {
        if($(window).width()<992) {
            $(this).delay(300).queue(function(n) {
                    setMaxHeight(ph);
                n();
            });
        }
        else {
            setHeight(ph,'100%');
        }
    });

    ph_original = ph;

    return ph_original;
}

function setBg(el) {
    el.each(function(indx){
        url = $(this).find('img').remove().attr('src');
        $(this).css('background-image', 'url('+url+')');
    });
}

function addWrpToImg() {
    var el = $('.article_content img');
    var width = 0;
    el.each(function(indx){
        if (!($(this).parents().hasClass('gallery'))) {
            if ($(this).parent().is('a')) {
                width = $(this).width();
                $(this).parent('a').wrap('<div class="img_wrp top_offset"></div>');
                $(this).parents('.img_wrp').css('width', width);
                if ($(this).hasClass('alignleft')) {
                    $(this).parents('.img_wrp').addClass('alignleft');
                }
                if ($(this).hasClass('alignright')) {
                    $(this).parents('.img_wrp').addClass('alignright');
                }
                if ($(this).hasClass('aligncenter')) {
                    $(this).parents('.img_wrp').addClass('aligncenter');
                }
                if ($(this).hasClass('alignnone')) {
                    $(this).parents('.img_wrp').addClass('alignnone');
                }
            }
            else {
                $(this).addClass('top_offset');
            }
        }
    });
    $(window).resize(function() {
        el.each(function(indx){
            $(this).parents('.img_wrp').css('width', 'auto');
            if ($(this).parents('.img_wrp').width() >= $(this).naturalWidth()) {
                $(this).parents('.img_wrp').css('width', $(this).naturalWidth());
            }
            else {
                $(this).parents('.img_wrp').css('width', 'auto');
            }
        });
    });
}

(function($){
  var
  props = ['Width', 'Height'],
  prop;

  while (prop = props.pop()) {
  (function (natural, prop) {
    $.fn[natural] = (natural in new Image()) ? 
    function () {
    return this[0][natural];
    } : 
    function () {
    var 
    node = this[0],
    img,
    value;

    if (node.tagName.toLowerCase() === 'img') {
      img = new Image();
      img.src = node.src,
      value = img[prop];
    }
    return value;
    };
  }('natural' + prop, prop.toLowerCase()));
  }
}(jQuery));

Share = {
    /**
     * Показать пользователю диалог шаринга в сооветствии с опциями
     * Метод для использования в inline-js в ссылках
     * При блокировке всплывающего окна подставит нужный адрес и ползволит браузеру перейти по нему
     *
     * @example <a href="" onclick="return share.go(this)">like+</a>
     *
     * @param Object _element - элемент DOM, для которого
     * @param Object _options - опции, все необязательны
     */
    go: function(_element, _options) {
        var
            self = Share,
            options = $.extend(
                {
                    type:       'vk',    // тип соцсети
                    url:        location.href,  // какую ссылку шарим
                    count_url:  location.href,  // для какой ссылки крутим счётчик
                    title:      document.title, // заголовок шаринга
                    image:        '',             // картинка шаринга
                    text:       '',             // текст шаринга
                },
                $(_element).data(), // Если параметры заданы в data, то читаем их
                _options            // Параметры из вызова метода имеют наивысший приоритет
            );
  
        if (self.popup(link = self[options.type](options)) === null) {
            // Если не удалось открыть попап
            if ( $(_element).is('a') ) {
                // Если это <a>, то подставляем адрес и просим браузер продолжить переход по ссылке
                $(_element).prop('href', link);
                return true;
            }
            else {
                // Если это не <a>, то пытаемся перейти по адресу
                location.href = link;
                return false;
            }
        }
        else {
            // Попап успешно открыт, просим браузер не продолжать обработку
            return false;
        }
    },
  
    // ВКонтакте
    vk: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                image:  '',
                text:   '',
            }, _options);
  
        return 'http://vkontakte.ru/share.php?'
            + 'url='          + encodeURIComponent(options.url)
            + '&title='       + encodeURIComponent(options.title)
            + '&description=' + encodeURIComponent(options.text)
            + '&image='       + encodeURIComponent(options.image)
            + '&noparse=true';
    },
  
    // Одноклассники
    ok: function(_options) {
        var options = $.extend({
                url:    location.href,
                text:   '',
            }, _options);
  
        return 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1'
            + '&st.comments=' + encodeURIComponent(options.text)
            + '&st._surl='    + encodeURIComponent(options.url);
    },
  
    // Facebook
    fb: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                image:  '',
                text:   '',
            }, _options);
  
        return 'http://www.facebook.com/sharer.php?s=100'
            + '&p[title]='     + encodeURIComponent(options.title)
            + '&p[summary]='   + encodeURIComponent(options.text)
            + '&p[url]='       + encodeURIComponent(options.url)
            + '&p[images][0]=' + encodeURIComponent(options.image);
    },
  
    // Живой Журнал
    lj: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                text:   '',
            }, _options);
  
        return 'http://livejournal.com/update.bml?'
            + 'subject='        + encodeURIComponent(options.title)
            + '&event='         + encodeURIComponent(options.text + '<br/><a href="' + options.url + '">' + options.title + '</a>')
            + '&transform=1';
    },
  
    // Твиттер
    tw: function(_options) {
        var options = $.extend({
                url:        location.href,
                count_url:  location.href,
                title:      document.title,
            }, _options);
  
        return 'http://twitter.com/share?'
            + 'text='      + encodeURIComponent(options.title)
            + '&url='      + encodeURIComponent(options.url)
            + '&counturl=' + encodeURIComponent(options.count_url);
    },
  
// Google+
    gp: function (_options) {
        var options = $.extend({
            url: location.href          
        }, _options);
  
        return 'https://plus.google.com/share?url='
            + encodeURIComponent(options.url);
    },
  
    // Mail.Ru
    mr: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                image:  '',
                text:   '',
            }, _options);
  
        return 'http://connect.mail.ru/share?'
            + 'url='          + encodeURIComponent(options.url)
            + '&title='       + encodeURIComponent(options.title)
            + '&description=' + encodeURIComponent(options.text)
            + '&imageurl='    + encodeURIComponent(options.image);
    },
  
    // Открыть окно шаринга
    popup: function(url) {
        return window.open(url,'','toolbar=0,status=0,scrollbars=1,width=626,height=436');
    }
}

$(document).on('click', '.social_share', function(){
    Share.go(this);
});