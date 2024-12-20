(function(a) {
    if (a.PrimeFaces) {
        a.PrimeFaces.debug("PrimeFaces already loaded, ignoring duplicate execution.");
        return
    }
    var b = {
        escapeClientId: function(c) {
            return "#" + c.replace(/:/g, "\\:")
        },
        onElementLoad: function(c, d) {
            if (c.prop("complete")) {
                d()
            } else {
                c.on("load", d)
            }
        },
        cleanWatermarks: function() {
            $.watermark.hideAll()
        },
        showWatermarks: function() {
            $.watermark.showAll()
        },
        getWidgetById: function(e) {
            for (var d in b.widgets) {
                var c = b.widgets[d];
                if (c && c.id === e) {
                    return c
                }
            }
            return null
        },
        addSubmitParam: function(d, f) {
            var e = $(this.escapeClientId(d));
            for (var c in f) {
                e.append('<input type="hidden" name="' + b.escapeHTML(c) + '" value="' + b.escapeHTML(f[c]) + '" class="ui-submit-param"/>')
            }
            return this
        },
        submit: function(f, e) {
            var c = $(this.escapeClientId(f));
            var d;
            if (e) {
                d = c.attr("target");
                c.attr("target", e)
            }
            c.submit();
            c.children("input.ui-submit-param").remove();
            if (e) {
                if (d !== undefined) {
                    c.attr("target", d)
                } else {
                    c.removeAttr("target")
                }
            }
        },
        onPost: function() {
            this.nonAjaxPosted = true;
            this.abortXHRs()
        },
        abortXHRs: function() {
            b.ajax.Queue.abortAll()
        },
        attachBehaviors: function(d, c) {
            $.each(c, function(f, e) {
                d.on(f, function(g) {
                    e.call(d, g)
                })
            })
        },
        getCookie: function(c) {
            return $.cookie(c)
        },
        setCookie: function(d, e, c) {
            $.cookie(d, e, c)
        },
        deleteCookie: function(d, c) {
            $.removeCookie(d, c)
        },
        cookiesEnabled: function() {
            var c = (navigator.cookieEnabled) ? true : false;
            if (typeof navigator.cookieEnabled === "undefined" && !c) {
                document.cookie = "testcookie";
                c = (document.cookie.indexOf("testcookie") !== -1) ? true : false
            }
            return (c)
        },
        skinInput: function(c) {
            c.hover(function() {
                $(this).addClass("ui-state-hover")
            }, function() {
                $(this).removeClass("ui-state-hover")
            }).focus(function() {
                $(this).addClass("ui-state-focus")
            }).blur(function() {
                $(this).removeClass("ui-state-focus")
            });
            c.attr("role", "textbox").attr("aria-disabled", c.is(":disabled")).attr("aria-readonly", c.prop("readonly"));
            if (c.is("textarea")) {
                c.attr("aria-multiline", true)
            }
            return this
        },
        skinButton: function(c) {
            c.mouseover(function() {
                var e = $(this);
                if (!c.prop("disabled")) {
                    e.addClass("ui-state-hover")
                }
            }).mouseout(function() {
                $(this).removeClass("ui-state-active ui-state-hover")
            }).mousedown(function() {
                var e = $(this);
                if (!c.prop("disabled")) {
                    e.addClass("ui-state-active").removeClass("ui-state-hover")
                }
            }).mouseup(function() {
                $(this).removeClass("ui-state-active").addClass("ui-state-hover")
            }).focus(function() {
                $(this).addClass("ui-state-focus")
            }).blur(function() {
                $(this).removeClass("ui-state-focus ui-state-active")
            }).keydown(function(f) {
                if (f.which === $.ui.keyCode.SPACE || f.which === $.ui.keyCode.ENTER) {
                    $(this).addClass("ui-state-active")
                }
            }).keyup(function() {
                $(this).removeClass("ui-state-active")
            });
            var d = c.attr("role");
            if (!d) {
                c.attr("role", "button")
            }
            c.attr("aria-disabled", c.prop("disabled"));
            return this
        },
        skinSelect: function(c) {
            c.mouseover(function() {
                var d = $(this);
                if (!d.hasClass("ui-state-focus")) {
                    d.addClass("ui-state-hover")
                }
            }).mouseout(function() {
                $(this).removeClass("ui-state-hover")
            }).focus(function() {
                $(this).addClass("ui-state-focus").removeClass("ui-state-hover")
            }).blur(function() {
                $(this).removeClass("ui-state-focus ui-state-hover")
            });
            return this
        },
        info: function(c) {
            if (this.logger) {
                this.logger.info(c)
            }
        },
        debug: function(c) {
            if (this.logger) {
                this.logger.debug(c)
            }
        },
        warn: function(c) {
            if (this.logger) {
                this.logger.warn(c)
            }
            if (b.isDevelopmentProjectStage() && a.console) {
                console.log(c)
            }
        },
        error: function(c) {
            if (this.logger) {
                this.logger.error(c)
            }
            if (b.isDevelopmentProjectStage() && a.console) {
                console.error(c)
            }
        },
        isDevelopmentProjectStage: function() {
            return b.settings.projectStage === "Development"
        },
        widgetNotAvailable: function(c) {
            b.error("Widget for var '" + c + "' not available!")
        },
        setCaretToEnd: function(d) {
            if (d) {
                d.focus();
                var e = d.value.length;
                if (e > 0) {
                    if (d.setSelectionRange) {
                        d.setSelectionRange(0, e)
                    } else {
                        if (d.createTextRange) {
                            var c = d.createTextRange();
                            c.collapse(true);
                            c.moveEnd("character", 1);
                            c.moveStart("character", 1);
                            c.select()
                        }
                    }
                }
            }
        },
        changeTheme: function(g) {
            if (g && g !== "") {
                var h = $('link[href*="' + b.RESOURCE_IDENTIFIER + '/theme.css"]');
                if (h.length === 0) {
                    h = $('link[href*="' + b.RESOURCE_IDENTIFIER + '=theme.css"]')
                }
                var f = h.attr("href"),
                    e = f.split("&")[0],
                    d = e.split("ln=")[1],
                    c = f.replace(d, "primefaces-" + g);
                h.attr("href", c)
            }
        },
        escapeRegExp: function(c) {
            return this.escapeHTML(c.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1"))
        },
        escapeHTML: function(c) {
            return String(c).replace(/[&<>"'`=\/]/g, function(d) {
                return b.entityMap[d]
            })
        },
        clearSelection: function() {
            if (a.getSelection) {
                if (a.getSelection().empty) {
                    a.getSelection().empty()
                } else {
                    if (a.getSelection().removeAllRanges && a.getSelection().rangeCount > 0 && a.getSelection().getRangeAt(0).getClientRects().length > 0) {
                        a.getSelection().removeAllRanges()
                    }
                }
            } else {
                if (document.selection && document.selection.empty) {
                    try {
                        document.selection.empty()
                    } catch (c) {}
                }
            }
        },
        getSelection: function() {
            var c = "";
            if (a.getSelection) {
                c = a.getSelection()
            } else {
                if (document.getSelection) {
                    c = document.getSelection()
                } else {
                    if (document.selection) {
                        c = document.selection.createRange().text
                    }
                }
            }
            return c
        },
        hasSelection: function() {
            return this.getSelection().length > 0
        },
        cw: function(d, e, c) {
            this.createWidget(d, e, c)
        },
        getFacesResource: function(e, d, c) {
            return b.resources.getFacesResource(e, d, c)
        },
        createWidget: function(d, f, c) {
            c.widgetVar = f;
            if (this.widget[d]) {
                var e = this.widgets[f];
                if (e && (e.constructor === this.widget[d])) {
                    e.refresh(c)
                } else {
                    this.widgets[f] = new this.widget[d](c);
                    if (this.settings.legacyWidgetNamespace) {
                        a[f] = this.widgets[f]
                    }
                }
            } else {
                b.widgetNotAvailable(d)
            }
        },
        inArray: function(c, e) {
            for (var d = 0; d < c.length; d++) {
                if (c[d] === e) {
                    return true
                }
            }
            return false
        },
        isNumber: function(c) {
            return typeof c === "number" && isFinite(c)
        },
        focus: function(e, d) {
            var c = ":not(:submit):not(:button):input:visible:enabled[name]";
            setTimeout(function() {
                if (e) {
                    var h = $(b.escapeClientId(e));
                    if (h.is(c)) {
                        h.focus()
                    } else {
                        var f = h.find(c).eq(0);
                        b.focusElement(f)
                    }
                } else {
                    if (d) {
                        var f = $(b.escapeClientId(d)).find(c).eq(0);
                        b.focusElement(f)
                    } else {
                        var g = $(c),
                            f = g.eq(0);
                        b.focusElement(f)
                    }
                }
            }, 50);
            b.customFocus = true
        },
        focusElement: function(d) {
            if (d.is(":radio")) {
                if (d.hasClass("ui-helper-hidden-accessible")) {
                    d.parent().focus()
                } else {
                    var c = $(':radio[name="' + d.attr("name") + '"]').filter(":checked");
                    if (c.length) {
                        c.focus()
                    } else {
                        d.focus()
                    }
                }
            } else {
                d.focus()
            }
        },
        monitorDownload: function(f, c, d) {
            if (this.cookiesEnabled()) {
                if (f) {
                    f()
                }
                var e = d ? "primefaces.download_" + d : "primefaces.download";
                a.downloadMonitor = setInterval(function() {
                    var g = b.getCookie(e);
                    if (g === "true") {
                        if (c) {
                            c()
                        }
                        clearInterval(a.downloadMonitor);
                        b.setCookie(e, null)
                    }
                }, 1000)
            }
        },
        scrollTo: function(d) {
            var c = $(b.escapeClientId(d)).offset();
            $("html,body").animate({
                scrollTop: c.top,
                scrollLeft: c.left
            }, {
                easing: "easeInCirc"
            }, 1000)
        },
        scrollInView: function(d, g) {
            if (g === null || g.length === 0) {
                return
            }
            var j = parseFloat(d.css("borderTopWidth")) || 0,
                f = parseFloat(d.css("paddingTop")) || 0,
                h = g.offset().top - d.offset().top - j - f,
                c = d.scrollTop(),
                e = d.height(),
                i = g.outerHeight(true);
            if (h < 0) {
                d.scrollTop(c + h)
            } else {
                if ((h + i) > e) {
                    d.scrollTop(c + h - e + i)
                }
            }
        },
        calculateScrollbarWidth: function() {
            if (!this.scrollbarWidth) {
                var c = $("<div />").css({
                    width: 100,
                    height: 100,
                    overflow: "auto",
                    position: "absolute",
                    top: -1000,
                    left: -1000
                }).prependTo("body").append("<div />").find("div").css({
                    width: "100%",
                    height: 200
                });
                this.scrollbarWidth = 100 - c.width();
                c.parent().remove()
            }
            return this.scrollbarWidth
        },
        bcn: function(d, e, g) {
            if (g) {
                for (var c = 0; c < g.length; c++) {
                    var f = g[c].call(d, e);
                    if (f === false) {
                        if (e.preventDefault) {
                            e.preventDefault()
                        } else {
                            e.returnValue = false
                        }
                        break
                    }
                }
            }
        },
        bcnu: function(e, f, d) {
            if (d) {
                for (var c = 0; c < d.length; c++) {
                    var g = d[c].call(this, e, f);
                    if (g === false) {
                        break
                    }
                }
            }
        },
        openDialog: function(c) {
            b.dialog.DialogHandler.openDialog(c)
        },
        closeDialog: function(c) {
            b.dialog.DialogHandler.closeDialog(c)
        },
        showMessageInDialog: function(c) {
            b.dialog.DialogHandler.showMessageInDialog(c)
        },
        confirm: function(c) {
            b.dialog.DialogHandler.confirm(c)
        },
        deferredRenders: [],
        addDeferredRender: function(e, c, d) {
            this.deferredRenders.push({
                widget: e,
                container: c,
                callback: d
            })
        },
        removeDeferredRenders: function(e) {
            for (var d = (this.deferredRenders.length - 1); d >= 0; d--) {
                var c = this.deferredRenders[d];
                if (c.widget === e) {
                    this.deferredRenders.splice(d, 1)
                }
            }
        },
        invokeDeferredRenders: function(c) {
            var g = [];
            for (var f = 0; f < this.deferredRenders.length; f++) {
                var d = this.deferredRenders[f];
                if (d.container === c) {
                    var h = d.callback.call();
                    if (h) {
                        g.push(d.widget)
                    }
                }
            }
            for (var e = 0; e < g.length; e++) {
                this.removeDeferredRenders(g[e])
            }
        },
        getLocaleSettings: function() {
            if (!this.localeSettings) {
                var c = b.settings.locale;
                this.localeSettings = b.locales[c];
                if (!this.localeSettings) {
                    if (c) {
                        this.localeSettings = b.locales[c.split("_")[0]]
                    }
                    if (!this.localeSettings) {
                        this.localeSettings = b.locales.en_US
                    }
                }
            }
            return this.localeSettings
        },
        getAriaLabel: function(d) {
            var c = this.getLocaleSettings()["aria"];
            return (c && c[d]) ? c[d] : b.locales.en_US["aria"][d]
        },
        zindex: 1000,
        customFocus: false,
        detachedWidgets: [],
        PARTIAL_REQUEST_PARAM: "javax.faces.partial.ajax",
        PARTIAL_UPDATE_PARAM: "javax.faces.partial.render",
        PARTIAL_PROCESS_PARAM: "javax.faces.partial.execute",
        PARTIAL_SOURCE_PARAM: "javax.faces.source",
        BEHAVIOR_EVENT_PARAM: "javax.faces.behavior.event",
        PARTIAL_EVENT_PARAM: "javax.faces.partial.event",
        RESET_VALUES_PARAM: "primefaces.resetvalues",
        IGNORE_AUTO_UPDATE_PARAM: "primefaces.ignoreautoupdate",
        SKIP_CHILDREN_PARAM: "primefaces.skipchildren",
        VIEW_STATE: "javax.faces.ViewState",
        CLIENT_WINDOW: "javax.faces.ClientWindow",
        VIEW_ROOT: "javax.faces.ViewRoot",
        CLIENT_ID_DATA: "primefaces.clientid",
        RESOURCE_IDENTIFIER: "javax.faces.resource",
        VERSION: "${project.version}"
    };
    b.settings = {};
    b.util = {};
    b.widgets = {};
    b.locales = {
        en_US: {
            closeText: "Close",
            prevText: "Previous",
            nextText: "Next",
            monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            dayNamesMin: ["S", "M", "T", "W ", "T", "F ", "S"],
            weekHeader: "Week",
            weekNumberTitle: "W",
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: "",
            timeOnlyTitle: "Only Time",
            timeText: "Time",
            hourText: "Hour",
            minuteText: "Minute",
            secondText: "Second",
            currentText: "Current Date",
            ampm: false,
            month: "Month",
            week: "Week",
            day: "Day",
            allDayText: "All Day",
            aria: {
                "paginator.PAGE": "Page {0}",
                "calendar.BUTTON": "Show Calendar",
                "datatable.sort.ASC": "activate to sort column ascending",
                "datatable.sort.DESC": "activate to sort column descending",
                "columntoggler.CLOSE": "Close"
            }
        }
    };
    b.locales.en = b.locales.en_US;
    b.entityMap = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#39;",
        "/": "&#x2F;",
        "`": "&#x60;",
        "=": "&#x3D;"
    };
    PF = function(d) {
        var c = b.widgets[d];
        if (!c) {
            b.widgetNotAvailable(d)
        }
        return c
    };
    a.PrimeFaces = b
})(window);
if (!PrimeFaces.env) {
    PrimeFaces.env = {
        mobile: false,
        touch: false,
        ios: false,
        browser: null,
        init: function() {
            this.mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(window.navigator.userAgent);
            this.touch = "ontouchstart" in window || window.navigator.msMaxTouchPoints || PrimeFaces.env.mobile;
            this.ios = /iPhone|iPad|iPod/i.test(window.navigator.userAgent);
            this.resolveUserAgent()
        },
        resolveUserAgent: function() {
            if ($.browser) {
                this.browser = $.browser
            } else {
                var a, d;
                jQuery.uaMatch = function(h) {
                    h = h.toLowerCase();
                    var g = /(opr)[\/]([\w.]+)/.exec(h) || /(chrome)[ \/]([\w.]+)/.exec(h) || /(version)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec(h) || /(webkit)[ \/]([\w.]+)/.exec(h) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(h) || /(msie) ([\w.]+)/.exec(h) || h.indexOf("trident") >= 0 && /(rv)(?::| )([\w.]+)/.exec(h) || h.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(h) || [];
                    var f = /(ipad)/.exec(h) || /(iphone)/.exec(h) || /(android)/.exec(h) || /(windows phone)/.exec(h) || /(win)/.exec(h) || /(mac)/.exec(h) || /(linux)/.exec(h) || /(cros)/i.exec(h) || [];
                    return {
                        browser: g[3] || g[1] || "",
                        version: g[2] || "0",
                        platform: f[0] || ""
                    }
                };
                a = jQuery.uaMatch(window.navigator.userAgent);
                d = {};
                if (a.browser) {
                    d[a.browser] = true;
                    d.version = a.version;
                    d.versionNumber = parseInt(a.version)
                }
                if (a.platform) {
                    d[a.platform] = true
                }
                if (d.android || d.ipad || d.iphone || d["windows phone"]) {
                    d.mobile = true
                }
                if (d.cros || d.mac || d.linux || d.win) {
                    d.desktop = true
                }
                if (d.chrome || d.opr || d.safari) {
                    d.webkit = true
                }
                if (d.rv) {
                    var e = "msie";
                    a.browser = e;
                    d[e] = true
                }
                if (d.opr) {
                    var c = "opera";
                    a.browser = c;
                    d[c] = true
                }
                if (d.safari && d.android) {
                    var b = "android";
                    a.browser = b;
                    d[b] = true
                }
                d.name = a.browser;
                d.platform = a.platform;
                this.browser = d;
                $.browser = d
            }
        },
        isIE: function(a) {
            return (a === undefined) ? this.browser.msie : (this.browser.msie && parseInt(this.browser.version, 10) === a)
        },
        isLtIE: function(a) {
            return (this.browser.msie) ? parseInt(this.browser.version, 10) < a : false
        }
    };
    PrimeFaces.env.init()
};
if (!PrimeFaces.ajax) {
    PrimeFaces.AB_MAPPING = {
        s: "source",
        f: "formId",
        p: "process",
        u: "update",
        e: "event",
        a: "async",
        g: "global",
        d: "delay",
        t: "timeout",
        sc: "skipChildren",
        iau: "ignoreAutoUpdate",
        ps: "partialSubmit",
        psf: "partialSubmitFilter",
        rv: "resetValues",
        fi: "fragmentId",
        pa: "params",
        onst: "onstart",
        oner: "onerror",
        onsu: "onsuccess",
        onco: "oncomplete"
    };
    PrimeFaces.ab = function(a, c) {
        for (var b in a) {
            if (!a.hasOwnProperty(b)) {
                continue
            }
            if (this.AB_MAPPING[b]) {
                a[this.AB_MAPPING[b]] = a[b];
                delete a[b]
            }
        }
        PrimeFaces.ajax.Request.handle(a, c)
    };
    PrimeFaces.ajax = {
        VIEW_HEAD: "javax.faces.ViewHead",
        VIEW_BODY: "javax.faces.ViewBody",
        RESOURCE: "javax.faces.Resource",
        Utils: {
            getContent: function(c) {
                var b = "";
                for (var a = 0; a < c.childNodes.length; a++) {
                    b += c.childNodes[a].nodeValue
                }
                return b
            },
            updateFormStateInput: function(b, g, j) {
                var e = $.trim(g);
                var a = null;
                if (j && j.pfSettings && j.pfSettings.portletForms) {
                    a = $(j.pfSettings.portletForms)
                } else {
                    a = $("form")
                }
                var h = "";
                if (j && j.pfArgs && j.pfArgs.parameterPrefix) {
                    h = j.pfArgs.parameterPrefix
                }
                for (var d = 0; d < a.length; d++) {
                    var c = a.eq(d);
                    if (c.attr("method") === "post") {
                        var f = c.children("input[name='" + h + b + "']");
                        if (f.length > 0) {
                            f.val(e)
                        } else {
                            c.append('<input type="hidden" name="' + h + b + '" value="' + e + '" autocomplete="off" />')
                        }
                    }
                }
            },
            updateHead: function(d) {
                var b = $.ajaxSetup()["cache"];
                $.ajaxSetup()["cache"] = true;
                var a = new RegExp("<head[^>]*>", "gi").exec(d)[0];
                var c = d.indexOf(a) + a.length;
                $("head").html(d.substring(c, d.lastIndexOf("</head>")));
                $.ajaxSetup()["cache"] = b
            },
            updateBody: function(b) {
                var c = new RegExp("<body[^>]*>", "gi").exec(b)[0];
                var a = b.indexOf(c) + c.length;
                $("body").html(b.substring(a, b.lastIndexOf("</body>")))
            },
            updateElement: function(d, b, c) {
                if (d.indexOf(PrimeFaces.VIEW_STATE) !== -1) {
                    PrimeFaces.ajax.Utils.updateFormStateInput(PrimeFaces.VIEW_STATE, b, c)
                } else {
                    if (d.indexOf(PrimeFaces.CLIENT_WINDOW) !== -1) {
                        PrimeFaces.ajax.Utils.updateFormStateInput(PrimeFaces.CLIENT_WINDOW, b, c)
                    } else {
                        if (d === PrimeFaces.VIEW_ROOT) {
                            var a = PrimeFaces.ajax.Utils;
                            window.PrimeFaces = null;
                            a.updateHead(b);
                            a.updateBody(b)
                        } else {
                            if (d === PrimeFaces.ajax.VIEW_HEAD) {
                                PrimeFaces.ajax.Utils.updateHead(b)
                            } else {
                                if (d === PrimeFaces.ajax.VIEW_BODY) {
                                    PrimeFaces.ajax.Utils.updateBody(b)
                                } else {
                                    if (d === PrimeFaces.ajax.RESOURCE) {
                                        $("head").append(b)
                                    } else {
                                        if (d === $("head")[0].id) {
                                            PrimeFaces.ajax.Utils.updateHead(b)
                                        } else {
                                            $(PrimeFaces.escapeClientId(d)).replaceWith(b)
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        },
        Queue: {
            delays: {},
            requests: new Array(),
            xhrs: new Array(),
            offer: function(a) {
                if (a.delay) {
                    var b = null,
                        d = this,
                        b = (typeof(a.source) === "string") ? a.source : $(a.source).attr("id"),
                        c = function() {
                            return setTimeout(function() {
                                d.requests.push(a);
                                if (d.requests.length === 1) {
                                    PrimeFaces.ajax.Request.send(a)
                                }
                            }, a.delay)
                        };
                    if (this.delays[b]) {
                        clearTimeout(this.delays[b].timeout);
                        this.delays[b].timeout = c()
                    } else {
                        this.delays[b] = {
                            timeout: c()
                        }
                    }
                } else {
                    this.requests.push(a);
                    if (this.requests.length === 1) {
                        PrimeFaces.ajax.Request.send(a)
                    }
                }
            },
            poll: function() {
                if (this.isEmpty()) {
                    return null
                }
                var b = this.requests.shift(),
                    a = this.peek();
                if (a) {
                    PrimeFaces.ajax.Request.send(a)
                }
                return b
            },
            peek: function() {
                if (this.isEmpty()) {
                    return null
                }
                return this.requests[0]
            },
            isEmpty: function() {
                return this.requests.length === 0
            },
            addXHR: function(a) {
                this.xhrs.push(a)
            },
            removeXHR: function(b) {
                var a = $.inArray(b, this.xhrs);
                if (a > -1) {
                    this.xhrs.splice(a, 1)
                }
            },
            abortAll: function() {
                for (var a = 0; a < this.xhrs.length; a++) {
                    this.xhrs[a].abort()
                }
                this.xhrs = new Array();
                this.requests = new Array()
            }
        },
        Request: {
            handle: function(a, b) {
                a.ext = b;
                if (PrimeFaces.settings.earlyPostParamEvaluation) {
                    a.earlyPostParams = PrimeFaces.ajax.Request.collectEarlyPostParams(a)
                }
                if (a.async) {
                    PrimeFaces.ajax.Request.send(a)
                } else {
                    PrimeFaces.ajax.Queue.offer(a)
                }
            },
            collectEarlyPostParams: function(b) {
                var c;
                var d;
                if (typeof(b.source) === "string") {
                    d = $(PrimeFaces.escapeClientId(b.source))
                } else {
                    d = $(b.source)
                }
                if (d.is(":input") && d.is(":not(:button)")) {
                    c = [];
                    if (d.is(":checkbox")) {
                        var a = $("input[name='" + d.attr("name") + "']").filter(":checked").serializeArray();
                        $.merge(c, a)
                    } else {
                        c.push({
                            name: d.attr("name"),
                            value: d.val()
                        })
                    }
                } else {
                    c = d.serializeArray()
                }
                return c
            },
            send: function(f) {
                PrimeFaces.debug("Initiating ajax request.");
                PrimeFaces.customFocus = false;
                var n = (f.global === true || f.global === undefined) ? true : false,
                    c = null,
                    g = null,
                    v = null;
                if (f.onstart) {
                    v = f.onstart.call(this, f)
                }
                if (f.ext && f.ext.onstart) {
                    v = f.ext.onstart.call(this, f)
                }
                if (v === false) {
                    PrimeFaces.debug("Ajax request cancelled by onstart callback.");
                    if (!f.async) {
                        PrimeFaces.ajax.Queue.poll()
                    }
                    return false
                }
                if (n) {
                    $(document).trigger("pfAjaxStart")
                }
                if (typeof(f.source) === "string") {
                    g = f.source
                } else {
                    g = $(f.source).attr("id")
                }
                if (f.formId) {
                    c = PrimeFaces.expressions.SearchExpressionFacade.resolveComponentsAsSelector(f.formId)
                } else {
                    var r = $(PrimeFaces.escapeClientId(g));
                    c = r.closest("form");
                    if (c.length === 0) {
                        c = $("form").eq(0)
                    }
                }
                PrimeFaces.debug("Form to post " + c.attr("id") + ".");
                var y = c.attr("action"),
                    t = c.children("input[name*='javax.faces.encodedURL']"),
                    h = [];
                var w = PrimeFaces.ajax.Request.extractParameterNamespace(c);
                var x = null;
                if (t.length > 0) {
                    x = 'form[id*="' + w + '"]';
                    y = t.val()
                }
                PrimeFaces.debug("URL to post " + y + ".");
                PrimeFaces.ajax.Request.addParam(h, PrimeFaces.PARTIAL_REQUEST_PARAM, true, w);
                PrimeFaces.ajax.Request.addParam(h, PrimeFaces.PARTIAL_SOURCE_PARAM, g, w);
                if (f.resetValues) {
                    PrimeFaces.ajax.Request.addParam(h, PrimeFaces.RESET_VALUES_PARAM, true, w)
                }
                if (f.ignoreAutoUpdate) {
                    PrimeFaces.ajax.Request.addParam(h, PrimeFaces.IGNORE_AUTO_UPDATE_PARAM, true, w)
                }
                if (f.skipChildren === false) {
                    PrimeFaces.ajax.Request.addParam(h, PrimeFaces.SKIP_CHILDREN_PARAM, false, w)
                }
                var s = PrimeFaces.ajax.Request.resolveComponentsForAjaxCall(f, "process");
                if (f.fragmentId) {
                    s.push(f.fragmentId)
                }
                var b = "@none";
                if (s.length > 0) {
                    b = s.join(" ")
                } else {
                    var k = PrimeFaces.ajax.Request.resolveComponentsForAjaxCall(f, "process");
                    k = $.trim(k);
                    if (k === "") {
                        b = "@all"
                    }
                }
                if (b !== "@none") {
                    PrimeFaces.ajax.Request.addParam(h, PrimeFaces.PARTIAL_PROCESS_PARAM, b, w)
                }
                var e = PrimeFaces.ajax.Request.resolveComponentsForAjaxCall(f, "update");
                if (e.length > 0) {
                    PrimeFaces.ajax.Request.addParam(h, PrimeFaces.PARTIAL_UPDATE_PARAM, e.join(" "), w)
                }
                if (f.event) {
                    PrimeFaces.ajax.Request.addParam(h, PrimeFaces.BEHAVIOR_EVENT_PARAM, f.event, w);
                    var m = f.event;
                    if (f.event === "valueChange") {
                        m = "change"
                    } else {
                        if (f.event === "action") {
                            m = "click"
                        }
                    }
                    PrimeFaces.ajax.Request.addParam(h, PrimeFaces.PARTIAL_EVENT_PARAM, m, w)
                } else {
                    PrimeFaces.ajax.Request.addParam(h, g, g, w)
                }
                if (f.params) {
                    PrimeFaces.ajax.Request.addParams(h, f.params, w)
                }
                if (f.ext && f.ext.params) {
                    PrimeFaces.ajax.Request.addParams(h, f.ext.params, w)
                }
                if (f.partialSubmit && b.indexOf("@all") === -1) {
                    var o = false;
                    if (b.indexOf("@none") === -1) {
                        var j = f.partialSubmitFilter || ":input";
                        for (var p = 0; p < s.length; p++) {
                            var l = $(PrimeFaces.escapeClientId(s[p]));
                            var z = null;
                            if (l.is("form")) {
                                z = l.serializeArray();
                                o = true
                            } else {
                                if (l.is(":input")) {
                                    z = l.serializeArray()
                                } else {
                                    z = l.find(j).serializeArray()
                                }
                            }
                            h = PrimeFaces.ajax.Request.arrayCompare(z, h);
                            if (f.ext && f.ext.partialSubmitParameterFilter) {
                                var a = f.ext.partialSubmitParameterFilter.call(this, z);
                                $.merge(h, a)
                            } else {
                                $.merge(h, z)
                            }
                        }
                    }
                    if (!o) {
                        PrimeFaces.ajax.Request.addParamFromInput(h, PrimeFaces.VIEW_STATE, c, w);
                        PrimeFaces.ajax.Request.addParamFromInput(h, PrimeFaces.CLIENT_WINDOW, c, w);
                        PrimeFaces.ajax.Request.addParamFromInput(h, "dsPostWindowId", c, w);
                        PrimeFaces.ajax.Request.addParamFromInput(h, "dspwid", c, w)
                    }
                } else {
                    $.merge(h, c.serializeArray())
                }
                if (PrimeFaces.settings.earlyPostParamEvaluation && f.earlyPostParams) {
                    h = PrimeFaces.ajax.Request.arrayCompare(f.earlyPostParams, h);
                    $.merge(h, f.earlyPostParams)
                }
                var d = $.param(h);
                PrimeFaces.debug("Post Data:" + d);
                var q = {
                    url: y,
                    type: "POST",
                    cache: false,
                    dataType: "xml",
                    data: d,
                    portletForms: x,
                    source: f.source,
                    global: false,
                    beforeSend: function(A, i) {
                        A.setRequestHeader("Faces-Request", "partial/ajax");
                        A.pfSettings = i;
                        A.pfArgs = {};
                        PrimeFaces.nonAjaxPosted = false;
                        if (n) {
                            $(document).trigger("pfAjaxSend", [A, this])
                        }
                    }
                };
                if (f.timeout) {
                    q.timeout = f.timeout
                }
                var u = $.ajax(q).fail(function(B, i, A) {
                    if (f.onerror) {
                        f.onerror.call(this, B, i, A)
                    }
                    if (f.ext && f.ext.onerror) {
                        f.ext.onerror.call(this, B, i, A)
                    }
                    $(document).trigger("pfAjaxError", [B, this, A]);
                    PrimeFaces.error("Request return with error:" + i + ".")
                }).done(function(C, i, D) {
                    PrimeFaces.debug("Response received succesfully.");
                    try {
                        var A;
                        if (f.onsuccess) {
                            A = f.onsuccess.call(this, C, i, D)
                        }
                        if (f.ext && f.ext.onsuccess && !A) {
                            A = f.ext.onsuccess.call(this, C, i, D)
                        }
                        if (n) {
                            $(document).trigger("pfAjaxSuccess", [D, this])
                        }
                        if (A) {
                            return
                        } else {
                            PrimeFaces.ajax.Response.handle(C, i, D)
                        }
                    } catch (B) {
                        PrimeFaces.error(B)
                    }
                    PrimeFaces.debug("DOM is updated.")
                }).always(function(A, i, B) {
                    if (f.ext && f.ext.oncomplete) {
                        f.ext.oncomplete.call(this, B, i, B.pfArgs)
                    }
                    if (f.oncomplete) {
                        f.oncomplete.call(this, B, i, B.pfArgs)
                    }
                    if (n) {
                        $(document).trigger("pfAjaxComplete", [B, this])
                    }
                    PrimeFaces.debug("Response completed.");
                    PrimeFaces.ajax.Queue.removeXHR(B);
                    if (!f.async && !PrimeFaces.nonAjaxPosted) {
                        PrimeFaces.ajax.Queue.poll()
                    }
                });
                PrimeFaces.ajax.Queue.addXHR(u)
            },
            resolveExpressionsForAjaxCall: function(a, b) {
                var c = "";
                if (a[b]) {
                    c += a[b]
                }
                if (a.ext && a.ext[b]) {
                    c += " " + a.ext[b]
                }
                return c
            },
            resolveComponentsForAjaxCall: function(a, b) {
                var c = PrimeFaces.ajax.Request.resolveExpressionsForAjaxCall(a, b);
                return PrimeFaces.expressions.SearchExpressionFacade.resolveComponents(c)
            },
            addParam: function(c, a, b, d) {
                if (d || !a.indexOf(d) === 0) {
                    c.push({
                        name: d + a,
                        value: b
                    })
                } else {
                    c.push({
                        name: a,
                        value: b
                    })
                }
            },
            addParams: function(d, a, e) {
                for (var b = 0; b < a.length; b++) {
                    var c = a[b];
                    if (e && !c.name.indexOf(e) === 0) {
                        c.name = e + c.name
                    }
                    d.push(c)
                }
            },
            addParamFromInput: function(e, b, c, f) {
                var a = null;
                if (f) {
                    a = c.children("input[name*='" + b + "']")
                } else {
                    a = c.children("input[name='" + b + "']")
                }
                if (a && a.length > 0) {
                    var d = a.val();
                    PrimeFaces.ajax.Request.addParam(e, b, d, f)
                }
            },
            extractParameterNamespace: function(c) {
                var a = c.children("input[name*='" + PrimeFaces.VIEW_STATE + "']");
                if (a && a.length > 0) {
                    var b = a[0].name;
                    if (b.length > PrimeFaces.VIEW_STATE.length) {
                        return b.substring(0, b.indexOf(PrimeFaces.VIEW_STATE))
                    }
                }
                return null
            },
            arrayCompare: function(b, a) {
                $.each(b, function(d, c) {
                    a = $.grep(a, function(e, f) {
                        if (e.name === c.name) {
                            return false
                        }
                        return true
                    })
                });
                return a
            }
        },
        Response: {
            handle: function(h, e, m, b) {
                if (h === undefined || h === null) {
                    return
                }
                var n = h.getElementsByTagName("partial-response")[0];
                for (var g = 0; g < n.childNodes.length; g++) {
                    var a = n.childNodes[g];
                    switch (a.nodeName) {
                        case "redirect":
                            PrimeFaces.ajax.ResponseProcessor.doRedirect(a);
                            break;
                        case "changes":
                            var c = $(document.activeElement);
                            var k = c.attr("id");
                            var f;
                            if (c.length > 0 && c.is("input") && $.isFunction($.fn.getSelection)) {
                                f = c.getSelection()
                            }
                            for (var d = 0; d < a.childNodes.length; d++) {
                                var l = a.childNodes[d];
                                switch (l.nodeName) {
                                    case "update":
                                        PrimeFaces.ajax.ResponseProcessor.doUpdate(l, m, b);
                                        break;
                                    case "delete":
                                        PrimeFaces.ajax.ResponseProcessor.doDelete(l);
                                        break;
                                    case "insert":
                                        PrimeFaces.ajax.ResponseProcessor.doInsert(l);
                                        break;
                                    case "attributes":
                                        PrimeFaces.ajax.ResponseProcessor.doAttributes(l);
                                        break;
                                    case "eval":
                                        PrimeFaces.ajax.ResponseProcessor.doEval(l);
                                        break;
                                    case "extension":
                                        PrimeFaces.ajax.ResponseProcessor.doExtension(l, m);
                                        break
                                }
                            }
                            PrimeFaces.ajax.Response.handleReFocus(k, f);
                            PrimeFaces.ajax.Response.destroyDetachedWidgets();
                            break;
                        case "eval":
                            PrimeFaces.ajax.ResponseProcessor.doEval(a);
                            break;
                        case "extension":
                            PrimeFaces.ajax.ResponseProcessor.doExtension(a, m);
                            break;
                        case "error":
                            PrimeFaces.ajax.ResponseProcessor.doError(a, m);
                            break
                    }
                }
            },
            handleReFocus: function(d, b) {
                if (PrimeFaces.customFocus === false && d && d !== $(document.activeElement).attr("id")) {
                    var c = $(PrimeFaces.escapeClientId(d));
                    var a = function() {
                        c.focus();
                        if (b && b.start) {
                            c.setSelection(b.start, b.end)
                        }
                    };
                    if (c.length) {
                        a();
                        setTimeout(function() {
                            if (!c.is(":focus")) {
                                a()
                            }
                        }, 50)
                    }
                }
                PrimeFaces.customFocus = false
            },
            destroyDetachedWidgets: function() {
                for (var a = 0; a < PrimeFaces.detachedWidgets.length; a++) {
                    var d = PrimeFaces.detachedWidgets[a];
                    var b = PF(d);
                    if (b) {
                        if (b.isDetached() === true) {
                            PrimeFaces.widgets[d] = null;
                            b.destroy();
                            try {
                                delete b
                            } catch (c) {}
                        }
                    }
                }
                PrimeFaces.detachedWidgets = []
            }
        },
        ResponseProcessor: {
            doRedirect: function(b) {
                try {
                    window.location.assign(b.getAttribute("url"))
                } catch (a) {
                    PrimeFaces.warn("Error redirecting to URL: " + b.getAttribute("url"))
                }
            },
            doUpdate: function(c, d, a) {
                var e = c.getAttribute("id"),
                    b = PrimeFaces.ajax.Utils.getContent(c);
                if (a && a.widget && a.widget.id === e) {
                    a.handle.call(a.widget, b)
                } else {
                    PrimeFaces.ajax.Utils.updateElement(e, b, d)
                }
            },
            doEval: function(b) {
                var a = b.textContent || b.innerText || b.text;
                $.globalEval(a)
            },
            doExtension: function(d, e) {
                if (e) {
                    if (d.getAttribute("ln") === "primefaces" && d.getAttribute("type") === "args") {
                        var c = d.textContent || d.innerText || d.text;
                        if (e.pfArgs) {
                            var b = JSON.parse(c);
                            for (var a in b) {
                                e.pfArgs[a] = b[a]
                            }
                        } else {
                            e.pfArgs = JSON.parse(c)
                        }
                    }
                }
            },
            doError: function(a, b) {},
            doDelete: function(a) {
                var b = a.getAttribute("id");
                $(PrimeFaces.escapeClientId(b)).remove()
            },
            doInsert: function(d) {
                if (!d.childNodes) {
                    return false
                }
                for (var b = 0; b < d.childNodes.length; b++) {
                    var a = d.childNodes[b];
                    var f = a.getAttribute("id");
                    var e = $(PrimeFaces.escapeClientId(f));
                    var c = PrimeFaces.ajax.Utils.getContent(a);
                    if (a.nodeName === "after") {
                        $(c).insertAfter(e)
                    } else {
                        if (a.nodeName === "before") {
                            $(c).insertBefore(e)
                        }
                    }
                }
            },
            doAttributes: function(c) {
                if (!c.childNodes) {
                    return false
                }
                var g = c.getAttribute("id");
                var f = $(PrimeFaces.escapeClientId(g));
                for (var b = 0; b < c.childNodes.length; b++) {
                    var d = c.childNodes[b];
                    var a = d.getAttribute("name");
                    var e = d.getAttribute("value");
                    if (!a) {
                        return
                    }
                    if (!e || e === null) {
                        e = ""
                    }
                    f.attr(a, e)
                }
            }
        },
        AjaxRequest: function(a, b) {
            return PrimeFaces.ajax.Request.handle(a, b)
        }
    };
    $(window).on("beforeunload", function() {
        PrimeFaces.ajax.Queue.abortAll()
    })
};
if (!PrimeFaces.expressions) {
    PrimeFaces.expressions = {};
    PrimeFaces.expressions.SearchExpressionFacade = {
        resolveComponentsAsSelector: function(c) {
            var a = PrimeFaces.expressions.SearchExpressionFacade.splitExpressions(c);
            var e = $();
            if (a) {
                for (var b = 0; b < a.length; ++b) {
                    var g = $.trim(a[b]);
                    if (g.length > 0) {
                        if (g == "@none" || g == "@all") {
                            continue
                        }
                        if (g.indexOf("@") == -1) {
                            e = e.add($(document.getElementById(g)))
                        } else {
                            if (g.indexOf("@widgetVar(") == 0) {
                                var f = g.substring(11, g.length - 1);
                                var d = PrimeFaces.widgets[f];
                                if (d) {
                                    e = e.add($(document.getElementById(d.id)))
                                } else {
                                    PrimeFaces.widgetNotAvailable(f)
                                }
                            } else {
                                if (g.indexOf("@(") == 0) {
                                    e = e.add($(g.substring(2, g.length - 1)))
                                }
                            }
                        }
                    }
                }
            }
            return e
        },
        resolveComponents: function(l) {
            var k = PrimeFaces.expressions.SearchExpressionFacade.splitExpressions(l),
                c = [];
            if (k) {
                for (var g = 0; g < k.length; ++g) {
                    var m = $.trim(k[g]);
                    if (m.length > 0) {
                        if (m.indexOf("@") == -1 || m == "@none" || m == "@all") {
                            if (!PrimeFaces.inArray(c, m)) {
                                c.push(m)
                            }
                        } else {
                            if (m.indexOf("@widgetVar(") == 0) {
                                var d = m.substring(11, m.length - 1),
                                    h = PrimeFaces.widgets[d];
                                if (h) {
                                    if (!PrimeFaces.inArray(c, h.id)) {
                                        c.push(h.id)
                                    }
                                } else {
                                    PrimeFaces.widgetNotAvailable(d)
                                }
                            } else {
                                if (m.indexOf("@(") == 0) {
                                    var b = $(m.substring(2, m.length - 1));
                                    for (var e = 0; e < b.length; e++) {
                                        var f = $(b[e]),
                                            a = f.data(PrimeFaces.CLIENT_ID_DATA) || f.attr("id");
                                        if (a && !PrimeFaces.inArray(c, a)) {
                                            c.push(a)
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return c
        },
        splitExpressions: function(f) {
            var e = [];
            var b = "";
            var a = 0;
            for (var d = 0; d < f.length; d++) {
                var g = f[d];
                if (g === "(") {
                    a++
                }
                if (g === ")") {
                    a--
                }
                if ((g === " " || g === ",") && a === 0) {
                    e.push(b);
                    b = ""
                } else {
                    b += g
                }
            }
            e.push(b);
            return e
        }
    }
};
if (!PrimeFaces.utils) {
    PrimeFaces.utils = {
        resolveDynamicOverlayContainer: function(a) {
            return a.cfg.appendTo ? PrimeFaces.expressions.SearchExpressionFacade.resolveComponentsAsSelector(a.cfg.appendTo) : $(document.body)
        },
        cleanupDynamicOverlay: function(e, b, c, a) {
            if (e.cfg.appendTo) {
                var d = $("[id='" + c + "']");
                if (d.length > 1) {
                    a.children("[id='" + c + "']").remove()
                }
            }
        },
        removeDynamicOverlay: function(d, b, c, a) {
            a.children("[id='" + c + "']").not(b).remove()
        },
        appendDynamicOverlay: function(d, b, c, a) {
            var e = b.parent();
            if (!e.is(a) && !a.is(b)) {
                PrimeFaces.utils.removeDynamicOverlay(d, b, c, a);
                b.appendTo(a)
            }
        },
        addModal: function(d, f, c) {
            var e = d.id;
            PrimeFaces.utils.preventTabbing(e, f, c);
            if (d.cfg.blockScroll) {
                PrimeFaces.utils.preventScrolling()
            }
            var a = e + "_modal";
            var b = $('<div id="' + a + '" class="ui-widget-overlay ui-dialog-mask"></div>');
            b.appendTo($(document.body));
            b.css("z-index", f);
            return b
        },
        preventTabbing: function(d, c, a) {
            var b = $(document);
            b.on("focus." + d + " mousedown." + d + " mouseup." + d, function(e) {
                if ($(e.target).zIndex() < c) {
                    e.preventDefault()
                }
            });
            b.on("keydown." + d, function(g) {
                var h = $(g.target);
                if (g.which === $.ui.keyCode.TAB) {
                    var f = a();
                    if (f.length) {
                        var i = f.filter(":first"),
                            e = f.filter(":last"),
                            j = null;
                        if (i.is(":radio")) {
                            j = f.filter('[name="' + i.attr("name") + '"]').filter(":checked");
                            if (j.length > 0) {
                                i = j
                            }
                        }
                        if (e.is(":radio")) {
                            j = f.filter('[name="' + e.attr("name") + '"]').filter(":checked");
                            if (j.length > 0) {
                                e = j
                            }
                        }
                        if (h.is(document.body)) {
                            i.focus(1);
                            g.preventDefault()
                        } else {
                            if (g.target === e[0] && !g.shiftKey) {
                                i.focus(1);
                                g.preventDefault()
                            } else {
                                if (g.target === i[0] && g.shiftKey) {
                                    e.focus(1);
                                    g.preventDefault()
                                }
                            }
                        }
                    }
                } else {
                    if (!h.is(document.body) && (h.zIndex() < c)) {
                        g.preventDefault()
                    }
                }
            })
        },
        removeModal: function(b) {
            var c = b.id;
            var a = c + "_modal";
            $(PrimeFaces.escapeClientId(a)).remove();
            $(document.body).children("[id='" + a + "']").remove();
            if (b.cfg.blockScroll) {
                PrimeFaces.utils.enableScrolling()
            }
            PrimeFaces.utils.enableTabbing(c)
        },
        enableTabbing: function(a) {
            $(document).off("focus." + a + " mousedown." + a + " mouseup." + a + " keydown." + a)
        },
        isModalActive: function(b) {
            var a = b + "_modal";
            return $(PrimeFaces.escapeClientId(a)).length === 1 || $(document.body).children("[id='" + a + "']").length === 1
        },
        registerHideOverlayHandler: function(e, c, d, b, a) {
            e.addDestroyListener(function() {
                $(document).off(c)
            });
            $(document).off(c).on(c, function(h) {
                if (d.is(":hidden") || d.css("visibility") === "hidden") {
                    return
                }
                var f = $(h.target);
                if (b) {
                    var g = b(h);
                    if (g) {
                        if (g.is(f) || g.has(f).length > 0) {
                            return
                        }
                    }
                }
                a(h, f)
            })
        },
        registerResizeHandler: function(d, a, b, c, e) {
            d.addDestroyListener(function() {
                $(window).off(a)
            });
            $(window).off(a).on(a, e || null, function(f) {
                if (b && (b.is(":hidden") || b.css("visibility") === "hidden")) {
                    return
                }
                c(f)
            })
        },
        registerDynamicOverlay: function(d, b, c) {
            if (d.cfg.appendTo) {
                var a = PrimeFaces.utils.resolveDynamicOverlayContainer(d);
                PrimeFaces.utils.appendDynamicOverlay(d, b, c, a);
                d.addDestroyListener(function() {
                    var e = PrimeFaces.utils.resolveDynamicOverlayContainer(d);
                    PrimeFaces.utils.removeDynamicOverlay(d, null, c, e)
                });
                d.addRefreshListener(function() {
                    var e = PrimeFaces.utils.resolveDynamicOverlayContainer(d);
                    PrimeFaces.utils.cleanupDynamicOverlay(d, b, c, e)
                })
            }
            return b
        },
        registerScrollHandler: function(c, b, a) {
            var d = c.getJQ().scrollParent();
            if (d.is("body")) {
                d = $(window)
            }
            c.addDestroyListener(function() {
                d.off(b)
            });
            d.off(b).on(b, function(f) {
                a(f)
            })
        },
        unbindScrollHandler: function(b, a) {
            var c = b.getJQ().scrollParent();
            if (c.is("body")) {
                c = $(window)
            }
            c.off(a)
        },
        preventScrolling: function() {
            $(document.body).addClass("ui-overflow-hidden")
        },
        enableScrolling: function() {
            $(document.body).removeClass("ui-overflow-hidden")
        },
        calculateRelativeOffset: function(b) {
            var a = {
                left: 0,
                top: 0
            };
            var e = b.offset();
            var c = $(window).scrollTop();
            var d = $(window).scrollLeft();
            a.top = e.top - c;
            a.left = e.left - d;
            return a
        }
    }
};
(function() {
    var a = false,
        b = /xyz/.test(function() {
            xyz
        }) ? /\b_super\b/ : /.*/;
    this.Class = function() {};
    Class.extend = function(g) {
        var f = this.prototype;
        a = true;
        var e = new this();
        a = false;
        for (var d in g) {
            e[d] = typeof g[d] == "function" && typeof f[d] == "function" && b.test(g[d]) ? (function(h, i) {
                return function() {
                    var k = this._super;
                    this._super = f[h];
                    var j = i.apply(this, arguments);
                    this._super = k;
                    return j
                }
            })(d, g[d]) : g[d]
        }

        function c() {
            if (!a && this.init) {
                this.init.apply(this, arguments)
            }
        }
        c.prototype = e;
        c.prototype.constructor = c;
        c.extend = arguments.callee;
        return c
    }
})();
if (!PrimeFaces.widget) {
    PrimeFaces.widget = {};
    PrimeFaces.widget.BaseWidget = Class.extend({
        init: function(a) {
            this.cfg = a;
            this.id = a.id;
            this.jqId = PrimeFaces.escapeClientId(this.id);
            this.jq = $(this.jqId);
            this.widgetVar = a.widgetVar;
            this.destroyListeners = [];
            this.refreshListeners = [];
            $(this.jqId + "_s").remove();
            if (this.widgetVar) {
                var b = this;
                this.jq.on("remove", function() {
                    PrimeFaces.detachedWidgets.push(b.widgetVar)
                })
            }
        },
        refresh: function(a) {
            this.destroyListeners = [];
            if (this.refreshListeners) {
                for (var b = 0; b < this.refreshListeners.length; b++) {
                    var c = this.refreshListeners[b];
                    c.call(this, this)
                }
            }
            this.refreshListeners = [];
            return this.init(a)
        },
        destroy: function() {
            PrimeFaces.debug("Destroyed detached widget: " + this.widgetVar);
            if (this.destroyListeners) {
                for (var a = 0; a < this.destroyListeners.length; a++) {
                    var b = this.destroyListeners[a];
                    b.call(this, this)
                }
            }
            this.destroyListeners = []
        },
        isDetached: function() {
            var a = document.getElementById(this.id);
            if (typeof(a) !== "undefined" && a !== null) {
                return false
            }
            return true
        },
        getJQ: function() {
            return this.jq
        },
        removeScriptElement: function(a) {
            $(PrimeFaces.escapeClientId(a) + "_s").remove()
        },
        hasBehavior: function(a) {
            if (this.cfg.behaviors) {
                return this.cfg.behaviors[a] != undefined
            }
            return false
        },
        callBehavior: function(b, a) {
            if (this.hasBehavior(b)) {
                this.cfg.behaviors[b].call(this, a)
            }
        },
        getBehavior: function(a) {
            return this.cfg.behaviors ? this.cfg.behaviors[a] : null
        },
        addDestroyListener: function(a) {
            if (!this.destroyListeners) {
                this.destroyListeners = []
            }
            this.destroyListeners.push(a)
        },
        addRefreshListener: function(a) {
            if (!this.refreshListeners) {
                this.refreshListeners = []
            }
            this.refreshListeners.push(a)
        }
    });
    PrimeFaces.widget.DynamicOverlayWidget = PrimeFaces.widget.BaseWidget.extend({
        init: function(a) {
            this._super(a);
            PrimeFaces.utils.registerDynamicOverlay(this, this.jq, this.id)
        },
        refresh: function(a) {
            PrimeFaces.utils.removeModal(this);
            this.appendTo = null;
            this.modalOverlay = null;
            this._super(a)
        },
        destroy: function() {
            this._super();
            PrimeFaces.utils.removeModal(this);
            this.appendTo = null;
            this.modalOverlay = null
        },
        enableModality: function() {
            this.modalOverlay = PrimeFaces.utils.addModal(this, this.jq.css("z-index") - 1, $.proxy(function() {
                return this.getModalTabbables()
            }, this))
        },
        disableModality: function() {
            PrimeFaces.utils.removeModal(this);
            this.modalOverlay = null
        },
        getModalTabbables: function() {
            return null
        }
    });
    PrimeFaces.widget.DeferredWidget = PrimeFaces.widget.BaseWidget.extend({
        renderDeferred: function() {
            if (this.jq.is(":visible")) {
                this._render();
                this.postRender()
            } else {
                var a = this.jq.closest(".ui-hidden-container"),
                    b = this;
                if (a.length) {
                    this.addDeferredRender(this.id, a, function() {
                        return b.render()
                    })
                }
            }
        },
        render: function() {
            if (this.jq.is(":visible")) {
                this._render();
                this.postRender();
                return true
            } else {
                return false
            }
        },
        _render: function() {
            throw "Unsupported Operation"
        },
        postRender: function() {},
        destroy: function() {
            this._super();
            PrimeFaces.removeDeferredRenders(this.id)
        },
        addDeferredRender: function(b, a, d) {
            PrimeFaces.addDeferredRender(b, a.attr("id"), d);
            if (a.is(":hidden")) {
                var c = this.jq.closest(".ui-hidden-container");
                if (c.length) {
                    this.addDeferredRender(b, a.parent().closest(".ui-hidden-container"), d)
                }
            }
        }
    })
};
if (!PrimeFaces.resources) {
    PrimeFaces.resources = {
        getFacesResource: function(a, i, g) {
            if (a.indexOf("/") === 0) {
                a = a.substring(1, a.length)
            }
            var k = PrimeFaces.resources.getResourceScriptURI();
            var b = PrimeFaces.resources.getResourceScriptName(k);
            k = k.replace(b, a);
            var j = new RegExp("[?&]([^&=]*)ln=(.*?)(&|$)");
            var h = "ln=" + j.exec(k)[2];
            var d = "";
            var f = !(k.indexOf("?" + h) > -1 || k.indexOf("&" + h) > -1);
            if (f) {
                d = new RegExp("[?&]([^&=]+)" + h + "($|&)").exec(k)[1]
            }
            k = k.replace(d + h, d + "ln=" + i);
            if (g) {
                var c = new RegExp("[?&]" + d + "v=([^&]*)").exec(k)[1];
                k = k.replace(d + "v=" + c, d + "v=" + g)
            }
            var e = window.location.protocol + "//" + window.location.host;
            return k.indexOf(e) >= 0 ? k : e + k
        },
        isExtensionMapping: function() {
            if (!PrimeFaces.resources.IS_EXTENSION_MAPPING) {
                var a = PrimeFaces.resources.getResourceScriptURI();
                var b = PrimeFaces.resources.getResourceScriptName(a);
                PrimeFaces.resources.IS_EXTENSION_MAPPING = a.charAt(a.indexOf(b) + b.length) === "."
            }
            return PrimeFaces.IS_EXTENSION_MAPPING
        },
        getResourceUrlExtension: function() {
            if (!PrimeFaces.resources.RESOURCE_URL_EXTENSION) {
                var a = PrimeFaces.resources.getResourceScriptURI();
                var b = PrimeFaces.resources.getResourceScriptName(a);
                PrimeFaces.resources.RESOURCE_URL_EXTENSION = RegExp(b + ".([^?]*)").exec(a)[1]
            }
            return PrimeFaces.resources.RESOURCE_URL_EXTENSION
        },
        getResourceScriptName: function(a) {
            var b = new RegExp("/?" + PrimeFaces.RESOURCE_IDENTIFIER + "(/|=)(.*?).js");
            return b.exec(a)[2] + ".js"
        },
        getResourceScriptURI: function() {
            if (!PrimeFaces.resources.SCRIPT_URI) {
                PrimeFaces.resources.SCRIPT_URI = $('script[src*="/' + PrimeFaces.RESOURCE_IDENTIFIER + '/"]').first().attr("src");
                if (!PrimeFaces.resources.SCRIPT_URI) {
                    PrimeFaces.resources.SCRIPT_URI = $('script[src*="' + PrimeFaces.RESOURCE_IDENTIFIER + '="]').first().attr("src")
                }
            }
            return PrimeFaces.resources.SCRIPT_URI
        }
    }
};
PrimeFaces.widget.AjaxStatus = PrimeFaces.widget.BaseWidget.extend({
    init: function(a) {
        this._super(a);
        this.bind()
    },
    bind: function() {
        var b = $(document),
            a = this;
        b.on("pfAjaxStart", function() {
            a.trigger("start", arguments)
        }).on("pfAjaxError", function() {
            a.trigger("error", arguments)
        }).on("pfAjaxSuccess", function() {
            a.trigger("success", arguments)
        }).on("pfAjaxComplete", function() {
            a.trigger("complete", arguments)
        });
        this.bindToStandard()
    },
    trigger: function(b, a) {
        var c = this.cfg[b];
        if (c) {
            c.apply(document, a)
        }
        if (b !== "complete" || this.jq.children().filter(this.toFacetId("complete")).length) {
            this.jq.children().hide().filter(this.toFacetId(b)).show()
        }
    },
    toFacetId: function(a) {
        return this.jqId + "_" + a
    },
    bindToStandard: function() {
        if (window.jsf && window.jsf.ajax) {
            var a = $(document);
            jsf.ajax.addOnEvent(function(b) {
                if (b.status === "begin") {
                    a.trigger("pfAjaxStart", arguments)
                } else {
                    if (b.status === "complete") {
                        a.trigger("pfAjaxSuccess", arguments)
                    } else {
                        if (b.status === "success") {
                            a.trigger("pfAjaxComplete", arguments)
                        }
                    }
                }
            });
            jsf.ajax.addOnError(function(b) {
                a.trigger("pfAjaxError", arguments)
            })
        }
    }
});
PrimeFaces.widget.Poll = PrimeFaces.widget.BaseWidget.extend({
    init: function(a) {
        this.cfg = a;
        this.id = this.cfg.id;
        this.active = false;
        if (this.cfg.autoStart) {
            this.start()
        }
    },
    refresh: function(a) {
        this.stop();
        this._super(a)
    },
    destroy: function() {
        this._super();
        this.stop()
    },
    start: function() {
        if (!this.active) {
            this.timer = setInterval(this.cfg.fn, (this.cfg.frequency * 1000));
            this.active = true
        }
    },
    stop: function() {
        if (this.active) {
            clearInterval(this.timer);
            this.active = false
        }
    },
    isActive: function() {
        return this.active
    }
});