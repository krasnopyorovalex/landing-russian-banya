jQuery(document).ready(function() {

    [].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function() {
            img.removeAttribute('data-src');
        };
    });

    var burgerMob = jQuery(".burger-mob");
    if(burgerMob.length) {
        var mobileMenu = jQuery(".mobile__menu"),
            closeMenuBtn = jQuery(".close-menu-btn");
        burgerMob.on("click", function () {
            return mobileMenu.addClass("is__opened") && mobileMenu.fadeIn("fast");
        });
        closeMenuBtn.on("click", function () {
            return mobileMenu.removeClass("is__opened") && mobileMenu.fadeOut();
        });
        mobileMenu.on("click", ".has__child > span", function (e) {
            e.preventDefault();
            var _this = jQuery(this);
            if( _this.next('ul').is(':hidden') ) {
                _this.next('ul').slideDown();
            } else {
                _this.next('ul').slideUp();
            }
            return false;
        });
    }

    var stickyMenu = jQuery("#nav__menu");
    if(stickyMenu.length) {
        var header = jQuery("header"),
            height = header.height();
        jQuery(window).scroll(function(){
            if (window.pageYOffset >= height) {
                return ! stickyMenu.hasClass("is__sticky") ? stickyMenu.hide().addClass("is__sticky").fadeIn() : false;
            }
            return stickyMenu.removeClass("is__sticky");
        });
    }

    var maskPhone = jQuery("form input.phone__mask");
    if (maskPhone.length) {
        maskPhone.mask('+0 (000) 000-00-00', {placeholder: "+_ (___) ___-__-__"});
    }

    var portfolio = jQuery('.default__slider');
    if (portfolio.length) {
        portfolio.owlCarousel({
            loop:false,
            margin: 8,
            nav:true,
            dots:false,
            items: 4,
            navText: ['<i class="prev-arrow"></i>','<i class="next-arrow"></i>'],
            responsive : {
                0 : {
                    items: 1
                },
                480 : {
                    items: 1
                },
                768 : {
                    items: 4
                }
            }
        });
    }

    var faq = jQuery(".faq");
    if(faq.length) {
        faq.on("click", "li .q", function () {
            var _this = jQuery(this),
                parent = _this.parent("li");
            faq.find(".a").hide();
            if(parent.hasClass("active")) {
                return faq.find("li").removeClass("active");
            }
            return faq.find("li").removeClass("active") && _this.next(".a").fadeIn("slow") && parent.addClass("active");
        });
    }

    var headerMenu = jQuery("#nav__menu,.mobile__menu,.footer__menu");
    if(headerMenu.length) {
        headerMenu.on("click", "li > a", function (e) {
            e.preventDefault();
            var _this = jQuery(this),
                scrollTo = _this.attr("href");

            jQuery(".mobile__menu").removeClass("is__opened").fadeOut();
            return jQuery.scrollTo(jQuery(scrollTo), 750,  {offset: {top:-80} });
        });
    }

    var viewDetail = jQuery(".view__detail-link"),
        viewDetailPopup = jQuery("#view__detail-popup"),
        popupBg = jQuery(".popup__show-bg");
    if(viewDetail.length) {
        viewDetail.on("click", function () {
            return jQuery.ajax({
                type: "POST",
                dataType: "html",
                url: jQuery(this).attr("data-link"),
                success: function (data) {
                    viewDetailPopup.fadeIn();
                    popupBg.show();
                    return viewDetailPopup.html(data) && startCarouselDM();
                }
            });
        });
        viewDetailPopup.on("click", ".close", function () {
            return viewDetailPopup.fadeOut("slow") && popupBg.fadeOut();
        });
    }

    jQuery(".loader, .loader__bg").delay(250).fadeOut('250', function() {
        return jQuery(this).fadeOut();
    });

    lightbox.option({
        'albumLabel': 'Изображение %1 из %2'
    });

    var sliderAboutAs = jQuery('.slider__about-us');
    if (sliderAboutAs.length) {
        sliderAboutAs.owlCarousel({
            loop:false,
            margin:5,
            nav:false,
            dots:false,
            items:1
        });
        var navs = jQuery('.slider__about-us-nav');
        navs.on("click", "div[data-target]", function () {
            var _this= jQuery(this),
                pos = parseInt(_this.attr("data-target"));

            navs.find("div[data-target]").removeClass("active");
            _this.addClass("active");

            return sliderAboutAs.trigger('to.owl.carousel', pos - 1);
        });
    }

    var callPopup = jQuery(".call__popup");
    if(callPopup.length) {
        callPopup.on("click", function (e) {
            e.preventDefault();
            var _this = jQuery(this),
                popup = jQuery("#" + _this.attr("data-target"));

            return popup.fadeIn() && popupBg.show();
        });
        jQuery(".popup").on("click", ".close", function () {
            return jQuery(this).closest(".popup").fadeOut("slow") && popupBg.fadeOut();
        });
    }

    /*
    |-----------------------------------------------------------
    |   notification
    |-----------------------------------------------------------
    */
    var Notification = {
        element: false,
        setElement: function (element) {
            return this.element = element;
        },
        notify: function (message) {
            if( ! this.element) {
                this.setElement(jQuery(".notify"));
            }
            return this.element.html('<div>' + message + '</div>') && this.element.fadeIn().delay(7000).fadeOut();
        }
    };

    formHandler("#form__callback", Notification);
    formHandler("#form__consultation", Notification);
});

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

function formHandler(selector, Notification) {
    return jQuery(document).on("submit", selector, function(e){
        e.preventDefault();
        var _this = jQuery(this),
            url = _this.attr('action'),
            data = _this.serialize(),
            submitBlock = _this.find(".submit"),
            agree = _this.find(".i__agree input[type=checkbox]");
        if (agree.length && ! agree.prop("checked")) {
            agree.closest(".i__agree").find(".error").fadeIn().delay(3000).fadeOut();
            return false;
        }
        return jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: url,
            data: data,
            beforeSend: function() {
                return submitBlock.addClass("is__sent");
            },
            success: function (data) {
                Notification.notify(data.message);
                jQuery(".popup").fadeOut("slow");
                jQuery(".popup__show-bg").fadeOut();
                return submitBlock.removeClass("is__sent") && _this.trigger("reset");
            }
        });
    });
}
function startCarouselDM()
{
    var detailCarousel = jQuery('.view__detail-carousel');
    if (detailCarousel.length) {
        detailCarousel.owlCarousel({
            loop:false,
            margin:0,
            nav:true,
            dots:false,
            items: 1,
            navText: ['<i class="prev-arrow"></i>','<i class="next-arrow"></i>']
        });
    }
}
jQuery(document).ajaxError(function () {
    return jQuery("form .submit").removeClass("is__sent") && jQuery('.notify').html('<div>Произошла ошибка =(</div>').fadeIn().delay(3000).fadeOut();
});
