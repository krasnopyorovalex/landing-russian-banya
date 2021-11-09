jQuery(document).ready(function() {

    [].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function() {
            img.removeAttribute('data-src');
        };
    });

    const burgerMob = jQuery(".burger-mob");
    if(burgerMob.length) {
        const mobileMenu = jQuery(".mobile__menu"),
            closeMenuBtn = jQuery(".close-menu-btn");
        burgerMob.on("click", function () {
            return mobileMenu.addClass("is__opened") && mobileMenu.fadeIn("fast");
        });
        closeMenuBtn.on("click", function () {
            return mobileMenu.removeClass("is__opened") && mobileMenu.fadeOut();
        });
        mobileMenu.on("click", ".has__child > span", function (e) {
            e.preventDefault();
            const _this = jQuery(this);
            if( _this.next('ul').is(':hidden') ) {
                _this.next('ul').slideDown();
            } else {
                _this.next('ul').slideUp();
            }
            return false;
        });
    }

    const stickyMenu = jQuery("#nav__menu");
    if(stickyMenu.length) {
        const header = jQuery("header"),
            height = header.height();
        jQuery(window).scroll(function(){
            if (window.pageYOffset >= height) {
                return ! stickyMenu.hasClass("is__sticky") ? stickyMenu.hide().addClass("is__sticky").fadeIn() : false;
            }
            return stickyMenu.removeClass("is__sticky");
        });
    }

    const maskPhone = jQuery("form input.phone__mask");
    if (maskPhone.length) {
        maskPhone.mask('+0 (000) 000-00-00', {placeholder: "+_ (___) ___-__-__"});
    }

    const portfolio = jQuery('.default__slider');
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

    const faq = jQuery(".faq");
    if(faq.length) {
        faq.on("click", "li .q", function () {
            const _this = jQuery(this),
                parent = _this.parent("li");
            faq.find(".a").hide();
            if(parent.hasClass("active")) {
                return faq.find("li").removeClass("active");
            }
            return faq.find("li").removeClass("active") && _this.next(".a").fadeIn("slow") && parent.addClass("active");
        });
    }

    const headerMenu = jQuery("#nav__menu,.mobile__menu,.footer__menu");
    if(headerMenu.length) {
        headerMenu.on("click", "li > a", function (e) {
            e.preventDefault();
            const _this = jQuery(this),
                scrollTo = _this.attr("href");

            jQuery(".mobile__menu").removeClass("is__opened").fadeOut();
            return jQuery.scrollTo(jQuery(scrollTo), 750,  {offset: {top:-80} });
        });
    }

    const viewDetail = jQuery(".view__detail-link"),
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

    const sliderAboutAs = jQuery('.slider__about-us');
    if (sliderAboutAs.length) {
        sliderAboutAs.owlCarousel({
            loop:false,
            margin:5,
            nav:true,
            dots:false,
            items:1,
            navText: ['','']
        });
        const navs = jQuery('.slider__about-us-nav');
        navs.on("click", "div[data-target]", function () {
            const _this = jQuery(this),
                pos = parseInt(_this.attr("data-target"));

            navs.find("div[data-target]").removeClass("active");
            _this.addClass("active");

            return sliderAboutAs.trigger('to.owl.carousel', pos - 1);
        });
    }

    const callPopup = jQuery(".call__popup");
    if(callPopup.length) {
        callPopup.on("click", function (e) {
            e.preventDefault();
            const _this = jQuery(this),
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
    const Notification = {
        element: false,
        setElement: function (element) {
            return this.element = element;
        },
        notify: function (message) {
            if (!this.element) {
                this.setElement(jQuery(".notify"));
            }
            return this.element.html('<div>' + message + '</div>') && this.element.fadeIn().delay(7000).fadeOut();
        }
    };

    formHandler("#form__callback", Notification);
    formHandler("#form__consultation", Notification);
    formHandler("#form__calculate", Notification);

    //youtube
    const youtube = document.querySelectorAll(".youtube-box");

    const yLength = youtube.length;
    if(yLength) {
        for (let i = 0; i < yLength; i++) {

            const source = "https://img.youtube.com/vi/" + youtube[i].dataset.embed + "/sddefault.jpg";

            const image = new Image();
            image.src = source;
            image.addEventListener( "load", function() {
                return youtube[ i ].appendChild( image );
            }(i));

            youtube[i].addEventListener( "click", function() {

                const iframe = document.createElement("iframe");

                iframe.setAttribute("frameborder", "0");
                iframe.setAttribute("allowfullscreen", "");
                iframe.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture");
                iframe.setAttribute("src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1");

                this.innerHTML = "";
                this.appendChild(iframe);
            });
        }
    }
});

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

function formHandler(selector, Notification) {
    return jQuery(document).on("submit", selector, function(e){
        e.preventDefault();
        const _this = jQuery(this),
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
    const detailCarousel = jQuery('.view__detail-carousel');
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
