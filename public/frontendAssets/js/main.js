!(function(e) {
    "use strict";
    jQuery(document).on("ready", function() {
        jQuery(".mean-menu").meanmenu({
            meanScreenWidth: "991"
        }),
            e(window).on("scroll", function() {
                e(this).scrollTop() > 120
                    ? e(".sinmun-nav").addClass("is-sticky")
                    : e(".sinmun-nav").removeClass("is-sticky");
            }),
            e(".nav-search-button").on("click", function() {
                e(".nav-search form").toggleClass("active");
            }),
            e(".nav-search-close-button").on("click", function() {
                e(".nav-search form").removeClass("active");
            }),
            setInterval(function() {
                var o, s, a, t, n, i, l;
                (o = new Date("September 30, 2019 17:00:00 PDT")),
                    (o = Date.parse(o) / 1e3),
                    (s = new Date()),
                    (a = o - (s = Date.parse(s) / 1e3)),
                    (t = Math.floor(a / 86400)),
                    (n = Math.floor((a - 86400 * t) / 3600)),
                    (i = Math.floor((a - 86400 * t - 3600 * n) / 60)),
                    (l = Math.floor(a - 86400 * t - 3600 * n - 60 * i)),
                    n < "10" && (n = "0" + n),
                    i < "10" && (i = "0" + i),
                    l < "10" && (l = "0" + l),
                    e("#days").html(t + "<span>Days</span>"),
                    e("#hours").html(n + "<span>Hours</span>"),
                    e("#minutes").html(i + "<span>Minutes</span>"),
                    e("#seconds").html(l + "<span>Seconds</span>");
            }, 1e3),

            e(".more-news-slides").owlCarousel({
                loop: !0,
                nav: !0,
                dots: !1,
                autoplayHoverPause: !0,
                autoplay: !0,
                navText: [
                    "<i class='icofont-rounded-left'></i>",
                    "<i class='icofont-rounded-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            }),
            e(".banner-slides").owlCarousel({
                loop: !0,
                nav: !0,
                dots: !1,
                autoplayHoverPause: !0,
                autoplay: !0,
                navText: [
                    "<i class='icofont-rounded-left'></i>",
                    "<i class='icofont-rounded-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    }
                }
            }),

            e(function() {
                e(window).on("scroll", function() {
                    var o = e(window).scrollTop();
                    o > 300 && e(".go-top").fadeIn("slow"),
                        o < 300 && e(".go-top").fadeOut("slow");
                }),
                    e(".go-top").on("click", function() {
                        e("html, body").animate(
                            {
                                scrollTop: "0"
                            },
                            500
                        );
                    });
            });
    }),
        e(window).on("load", function() {
            e(".wow").length &&
                new WOW({
                    boxClass: "wow",
                    animateClass: "animated",
                    offset: 20,
                    mobile: !0,
                    live: !0
                }).init();
        });
})(jQuery);
