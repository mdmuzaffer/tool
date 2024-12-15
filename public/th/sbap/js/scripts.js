function Scriptloader(url, helper) {
    var head = document.getElementsByTagName("head")[0];
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = url;
    if (helper instanceof Function) {
        script.onreadystatechange = function () {
            if (this.readyState == "complete") helper();
        };
        script.onload = helper;
    }

    head.appendChild(script);
}
window.isAutoNumericLoaded = false;
// Scriptloader("//unpkg.com/autonumeric", function () {
//     // // console.log("autonumeric loaded",arguments);
//     // new AutoNumeric(".onlyNumeric,[only-numeric]", {
//     //     currencySymbol: "",
//     //     decimalCharacter: ".",
//     //     digitGroupSeparator: "",
//     // });
//     window.isAutoNumericLoaded = true;
//     $(document).trigger("scriptloader.autonumeric.loaded");
// });

/*!
 * Start Bootstrap - SB Admin Pro v1.1.2 (https://shop.startbootstrap.com/product/sb-admin-pro)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under SEE_LICENSE (https://github.com/BlackrockDigital/sb-admin-pro/blob/master/LICENSE)
 */
(function ($) {
    "use strict";

    // Enable Bootstrap tooltips via data-attributes globally
    $('[data-toggle="tooltip"]').tooltip();

    // Enable Bootstrap popovers via data-attributes globally
    $('[data-toggle="popover"]').popover();

    $(".popover-dismiss").popover({
        trigger: "focus",
    });

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("sidenav-toggled");
    });

    // Activate Feather icons
    feather.replace();

    // Activate Bootstrap scrollspy for the sticky nav component
    $("body").scrollspy({
        target: "#stickyNav",
        offset: 82,
    });

    // Scrolls to an offset anchor when a sticky nav link is clicked
    $('.nav-sticky a.nav-link[href*="#"]:not([href="#"])').click(function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top - 81,
                    },
                    200
                );
                return false;
            }
        }
    });

    // Click to collapse responsive sidebar
    $("#layoutSidenav_content").click(function () {
        const BOOTSTRAP_LG_WIDTH = 992;
        if (window.innerWidth >= 992) {
            return;
        }
        if ($("body").hasClass("sidenav-toggled")) {
            $("body").toggleClass("sidenav-toggled");
        }
    });

    // Init sidebar
    let activatedPath = window.location.pathname.match(/([\w-]+\.html)/, "$1");

    if (activatedPath) {
        activatedPath = activatedPath[0];
    } else {
        activatedPath = "index.html";
    }

    let targetAnchor = $('[href="' + activatedPath + '"]');
    let collapseAncestors = targetAnchor.parents(".collapse");

    targetAnchor.addClass("active");

    collapseAncestors.each(function () {
        $(this).addClass("show");
        $('[data-target="#' + this.id + '"]').removeClass("collapsed");
    });
})(jQuery);

function bringCsrf(callBack) {
    if (callBack && callBack instanceof Function) {
        fetch("/common/utils/bring-csrf")
            .then((res) => res.json())
            .then(function (res) {
                callBack.apply(res.__token, [res.__token, res]);
            })
            .catch(() => {});
    }
}
function reloadCsrf(callBack) {
    bringCsrf(function (csrf, resp) {
        $('meta[name="csrf-token"]').attr("content", csrf);
        $('input[name="_token"]').val(csrf);
        if (callBack && callBack instanceof Function) {
            callBack.apply(csrf, [csrf, resp]);
        }
    });
}

(function ($) {
    // var inputFilter = function (value) {
    //     // return
    //     var test = /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    //     console.log(value, test);
    //     return test;
    // };
    // var eventNames = [
    //     "input",
    //     "keydown",
    //     // "keyup",
    //     // "mousedown",
    //     // "mouseup",
    //     // "select",
    //     // "contextmenu",
    //     "drop",
    // ];

    $.fn.OnlyNumeric = function () {
        // window.isAutoNumericLoaded = true;
        var elems = $(this);
        function initOnlyNumerics(elems_) {
            $(elems_).each(function (index, element) {
                var options = {
                    currencySymbol: "",
                    decimalCharacter: ".",
                    digitGroupSeparator: "",
                };
                var min, max;
                if (element.hasAttribute("min")) {
                    min = element.getAttribute("min");
                    options["minimumValue"] = Number(min);
                }
                if (element.hasAttribute("max")) {
                    max = element.getAttribute("max");
                    options["maximumValue"] = Number(max);
                }
                new AutoNumeric(element, options);
            });
        }
        // if (window.isAutoNumericLoaded) {
        //     initOnlyNumerics(elems);
        // } else {
        //     $(document).on("scriptloader.autonumeric.loaded", function () {
        //         initOnlyNumerics(elems);
        //     });
        // }
        initOnlyNumerics(elems);
    };
})(jQuery);

$(document).ready(function () {
    // $(".onlyNumeric,[only-numeric]").OnlyNumeric();
    $(".onlyNumeric,[only-numeric]").OnlyNumeric();
});
