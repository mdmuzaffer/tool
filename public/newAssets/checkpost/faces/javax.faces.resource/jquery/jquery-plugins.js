/*! jQuery UI - v1.12.1 - 2017-08-09
 * http://jqueryui.com
 * Includes: widget.js, position.js, data.js, disable-selection.js, focusable.js, form-reset-mixin.js, keycode.js, labels.js, scroll-parent.js, tabbable.js, unique-id.js, widgets/draggable.js, widgets/droppable.js, widgets/resizable.js, widgets/selectable.js, widgets/sortable.js, widgets/datepicker.js, widgets/mouse.js, widgets/slider.js, effect.js, effects/effect-blind.js, effects/effect-bounce.js, effects/effect-clip.js, effects/effect-drop.js, effects/effect-explode.js, effects/effect-fade.js, effects/effect-fold.js, effects/effect-highlight.js, effects/effect-puff.js, effects/effect-pulsate.js, effects/effect-scale.js, effects/effect-shake.js, effects/effect-size.js, effects/effect-slide.js, effects/effect-transfer.js
 * Copyright jQuery Foundation and other contributors; Licensed MIT */
(function(a) {
    if (typeof define === "function" && define.amd) {
        define(["jquery"], a)
    } else {
        a(jQuery)
    }
}(function(K) {
    K.ui = K.ui || {};
    var Z = K.ui.version = "1.12.1";
    /*!
     * jQuery UI Widget 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var aa = 0;
    var M = Array.prototype.slice;
    K.cleanData = (function(ag) {
        return function(ah) {
            var aj, ak, ai;
            for (ai = 0;
                (ak = ah[ai]) != null; ai++) {
                try {
                    aj = K._data(ak, "events");
                    if (aj && aj.remove) {
                        K(ak).triggerHandler("remove")
                    }
                } catch (al) {}
            }
            ag(ah)
        }
    })(K.cleanData);
    K.widget = function(ag, ah, ao) {
        var am, aj, an;
        var ai = {};
        var al = ag.split(".")[0];
        ag = ag.split(".")[1];
        var ak = al + "-" + ag;
        if (!ao) {
            ao = ah;
            ah = K.Widget
        }
        if (K.isArray(ao)) {
            ao = K.extend.apply(null, [{}].concat(ao))
        }
        K.expr[":"][ak.toLowerCase()] = function(ap) {
            return !!K.data(ap, ak)
        };
        K[al] = K[al] || {};
        am = K[al][ag];
        aj = K[al][ag] = function(ap, aq) {
            if (!this._createWidget) {
                return new aj(ap, aq)
            }
            if (arguments.length) {
                this._createWidget(ap, aq)
            }
        };
        K.extend(aj, am, {
            version: ao.version,
            _proto: K.extend({}, ao),
            _childConstructors: []
        });
        an = new ah();
        an.options = K.widget.extend({}, an.options);
        K.each(ao, function(aq, ap) {
            if (!K.isFunction(ap)) {
                ai[aq] = ap;
                return
            }
            ai[aq] = (function() {
                function ar() {
                    return ah.prototype[aq].apply(this, arguments)
                }

                function at(au) {
                    return ah.prototype[aq].apply(this, au)
                }
                return function() {
                    var aw = this._super;
                    var au = this._superApply;
                    var av;
                    this._super = ar;
                    this._superApply = at;
                    av = ap.apply(this, arguments);
                    this._super = aw;
                    this._superApply = au;
                    return av
                }
            })()
        });
        aj.prototype = K.widget.extend(an, {
            widgetEventPrefix: am ? (an.widgetEventPrefix || ag) : ag
        }, ai, {
            constructor: aj,
            namespace: al,
            widgetName: ag,
            widgetFullName: ak
        });
        if (am) {
            K.each(am._childConstructors, function(aq, ar) {
                var ap = ar.prototype;
                K.widget(ap.namespace + "." + ap.widgetName, aj, ar._proto)
            });
            delete am._childConstructors
        } else {
            ah._childConstructors.push(aj)
        }
        K.widget.bridge(ag, aj);
        return aj
    };
    K.widget.extend = function(al) {
        var ah = M.call(arguments, 1);
        var ak = 0;
        var ag = ah.length;
        var ai;
        var aj;
        for (; ak < ag; ak++) {
            for (ai in ah[ak]) {
                aj = ah[ak][ai];
                if (ah[ak].hasOwnProperty(ai) && aj !== undefined) {
                    if (K.isPlainObject(aj)) {
                        al[ai] = K.isPlainObject(al[ai]) ? K.widget.extend({}, al[ai], aj) : K.widget.extend({}, aj)
                    } else {
                        al[ai] = aj
                    }
                }
            }
        }
        return al
    };
    K.widget.bridge = function(ah, ag) {
        var ai = ag.prototype.widgetFullName || ah;
        K.fn[ah] = function(al) {
            var aj = typeof al === "string";
            var ak = M.call(arguments, 1);
            var am = this;
            if (aj) {
                if (!this.length && al === "instance") {
                    am = undefined
                } else {
                    this.each(function() {
                        var ao;
                        var an = K.data(this, ai);
                        if (al === "instance") {
                            am = an;
                            return false
                        }
                        if (!an) {
                            return K.error("cannot call methods on " + ah + " prior to initialization; attempted to call method '" + al + "'")
                        }
                        if (!K.isFunction(an[al]) || al.charAt(0) === "_") {
                            return K.error("no such method '" + al + "' for " + ah + " widget instance")
                        }
                        ao = an[al].apply(an, ak);
                        if (ao !== an && ao !== undefined) {
                            am = ao && ao.jquery ? am.pushStack(ao.get()) : ao;
                            return false
                        }
                    })
                }
            } else {
                if (ak.length) {
                    al = K.widget.extend.apply(null, [al].concat(ak))
                }
                this.each(function() {
                    var an = K.data(this, ai);
                    if (an) {
                        an.option(al || {});
                        if (an._init) {
                            an._init()
                        }
                    } else {
                        K.data(this, ai, new ag(al, this))
                    }
                })
            }
            return am
        }
    };
    K.Widget = function() {};
    K.Widget._childConstructors = [];
    K.Widget.prototype = {
        widgetName: "widget",
        widgetEventPrefix: "",
        defaultElement: "<div>",
        options: {
            classes: {},
            disabled: false,
            create: null
        },
        _createWidget: function(ag, ah) {
            ah = K(ah || this.defaultElement || this)[0];
            this.element = K(ah);
            this.uuid = aa++;
            this.eventNamespace = "." + this.widgetName + this.uuid;
            this.bindings = K();
            this.hoverable = K();
            this.focusable = K();
            this.classesElementLookup = {};
            if (ah !== this) {
                K.data(ah, this.widgetFullName, this);
                this._on(true, this.element, {
                    remove: function(ai) {
                        if (ai.target === ah) {
                            this.destroy()
                        }
                    }
                });
                this.document = K(ah.style ? ah.ownerDocument : ah.document || ah);
                this.window = K(this.document[0].defaultView || this.document[0].parentWindow)
            }
            this.options = K.widget.extend({}, this.options, this._getCreateOptions(), ag);
            this._create();
            if (this.options.disabled) {
                this._setOptionDisabled(this.options.disabled)
            }
            this._trigger("create", null, this._getCreateEventData());
            this._init()
        },
        _getCreateOptions: function() {
            return {}
        },
        _getCreateEventData: K.noop,
        _create: K.noop,
        _init: K.noop,
        destroy: function() {
            var ag = this;
            this._destroy();
            K.each(this.classesElementLookup, function(ah, ai) {
                ag._removeClass(ai, ah)
            });
            this.element.off(this.eventNamespace).removeData(this.widgetFullName);
            this.widget().off(this.eventNamespace).removeAttr("aria-disabled");
            this.bindings.off(this.eventNamespace)
        },
        _destroy: K.noop,
        widget: function() {
            return this.element
        },
        option: function(aj, ak) {
            var ag = aj;
            var al;
            var ai;
            var ah;
            if (arguments.length === 0) {
                return K.widget.extend({}, this.options)
            }
            if (typeof aj === "string") {
                ag = {};
                al = aj.split(".");
                aj = al.shift();
                if (al.length) {
                    ai = ag[aj] = K.widget.extend({}, this.options[aj]);
                    for (ah = 0; ah < al.length - 1; ah++) {
                        ai[al[ah]] = ai[al[ah]] || {};
                        ai = ai[al[ah]]
                    }
                    aj = al.pop();
                    if (arguments.length === 1) {
                        return ai[aj] === undefined ? null : ai[aj]
                    }
                    ai[aj] = ak
                } else {
                    if (arguments.length === 1) {
                        return this.options[aj] === undefined ? null : this.options[aj]
                    }
                    ag[aj] = ak
                }
            }
            this._setOptions(ag);
            return this
        },
        _setOptions: function(ag) {
            var ah;
            for (ah in ag) {
                this._setOption(ah, ag[ah])
            }
            return this
        },
        _setOption: function(ag, ah) {
            if (ag === "classes") {
                this._setOptionClasses(ah)
            }
            this.options[ag] = ah;
            if (ag === "disabled") {
                this._setOptionDisabled(ah)
            }
            return this
        },
        _setOptionClasses: function(aj) {
            var ag, ai, ah;
            for (ag in aj) {
                ah = this.classesElementLookup[ag];
                if (aj[ag] === this.options.classes[ag] || !ah || !ah.length) {
                    continue
                }
                ai = K(ah.get());
                this._removeClass(ah, ag);
                ai.addClass(this._classes({
                    element: ai,
                    keys: ag,
                    classes: aj,
                    add: true
                }))
            }
        },
        _setOptionDisabled: function(ag) {
            this._toggleClass(this.widget(), this.widgetFullName + "-disabled", null, !!ag);
            if (ag) {
                this._removeClass(this.hoverable, null, "ui-state-hover");
                this._removeClass(this.focusable, null, "ui-state-focus")
            }
        },
        enable: function() {
            return this._setOptions({
                disabled: false
            })
        },
        disable: function() {
            return this._setOptions({
                disabled: true
            })
        },
        _classes: function(ag) {
            var ah = [];
            var ai = this;
            ag = K.extend({
                element: this.element,
                classes: this.options.classes || {}
            }, ag);

            function aj(al, an) {
                var am, ak;
                for (ak = 0; ak < al.length; ak++) {
                    am = ai.classesElementLookup[al[ak]] || K();
                    if (ag.add) {
                        am = K(K.uniqueSort(am.get().concat(ag.element.get())))
                    } else {
                        am = K(am.not(ag.element).get())
                    }
                    ai.classesElementLookup[al[ak]] = am;
                    ah.push(al[ak]);
                    if (an && ag.classes[al[ak]]) {
                        ah.push(ag.classes[al[ak]])
                    }
                }
            }
            this._on(ag.element, {
                remove: "_untrackClassesElement"
            });
            if (ag.keys) {
                aj(ag.keys.match(/\S+/g) || [], true)
            }
            if (ag.extra) {
                aj(ag.extra.match(/\S+/g) || [])
            }
            return ah.join(" ")
        },
        _untrackClassesElement: function(ah) {
            var ag = this;
            K.each(ag.classesElementLookup, function(ai, aj) {
                if (K.inArray(ah.target, aj) !== -1) {
                    ag.classesElementLookup[ai] = K(aj.not(ah.target).get())
                }
            })
        },
        _removeClass: function(ah, ai, ag) {
            return this._toggleClass(ah, ai, ag, false)
        },
        _addClass: function(ah, ai, ag) {
            return this._toggleClass(ah, ai, ag, true)
        },
        _toggleClass: function(aj, ak, ag, al) {
            al = (typeof al === "boolean") ? al : ag;
            var ah = (typeof aj === "string" || aj === null),
                ai = {
                    extra: ah ? ak : ag,
                    keys: ah ? aj : ak,
                    element: ah ? this.element : aj,
                    add: al
                };
            ai.element.toggleClass(this._classes(ai), al);
            return this
        },
        _on: function(aj, ai, ah) {
            var ak;
            var ag = this;
            if (typeof aj !== "boolean") {
                ah = ai;
                ai = aj;
                aj = false
            }
            if (!ah) {
                ah = ai;
                ai = this.element;
                ak = this.widget()
            } else {
                ai = ak = K(ai);
                this.bindings = this.bindings.add(ai)
            }
            K.each(ah, function(aq, ap) {
                function an() {
                    if (!aj && (ag.options.disabled === true || K(this).hasClass("ui-state-disabled"))) {
                        return
                    }
                    return (typeof ap === "string" ? ag[ap] : ap).apply(ag, arguments)
                }
                if (typeof ap !== "string") {
                    an.guid = ap.guid = ap.guid || an.guid || K.guid++
                }
                var ao = aq.match(/^([\w:-]*)\s*(.*)$/);
                var am = ao[1] + ag.eventNamespace;
                var al = ao[2];
                if (al) {
                    ak.on(am, al, an)
                } else {
                    ai.on(am, an)
                }
            })
        },
        _off: function(ah, ag) {
            ag = (ag || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace;
            ah.off(ag).off(ag);
            this.bindings = K(this.bindings.not(ah).get());
            this.focusable = K(this.focusable.not(ah).get());
            this.hoverable = K(this.hoverable.not(ah).get())
        },
        _delay: function(aj, ai) {
            function ah() {
                return (typeof aj === "string" ? ag[aj] : aj).apply(ag, arguments)
            }
            var ag = this;
            return setTimeout(ah, ai || 0)
        },
        _hoverable: function(ag) {
            this.hoverable = this.hoverable.add(ag);
            this._on(ag, {
                mouseenter: function(ah) {
                    this._addClass(K(ah.currentTarget), null, "ui-state-hover")
                },
                mouseleave: function(ah) {
                    this._removeClass(K(ah.currentTarget), null, "ui-state-hover")
                }
            })
        },
        _focusable: function(ag) {
            this.focusable = this.focusable.add(ag);
            this._on(ag, {
                focusin: function(ah) {
                    this._addClass(K(ah.currentTarget), null, "ui-state-focus")
                },
                focusout: function(ah) {
                    this._removeClass(K(ah.currentTarget), null, "ui-state-focus")
                }
            })
        },
        _trigger: function(ag, ah, ai) {
            var al, ak;
            var aj = this.options[ag];
            ai = ai || {};
            ah = K.Event(ah);
            ah.type = (ag === this.widgetEventPrefix ? ag : this.widgetEventPrefix + ag).toLowerCase();
            ah.target = this.element[0];
            ak = ah.originalEvent;
            if (ak) {
                for (al in ak) {
                    if (!(al in ah)) {
                        ah[al] = ak[al]
                    }
                }
            }
            this.element.trigger(ah, ai);
            return !(K.isFunction(aj) && aj.apply(this.element[0], [ah].concat(ai)) === false || ah.isDefaultPrevented())
        }
    };
    K.each({
        show: "fadeIn",
        hide: "fadeOut"
    }, function(ah, ag) {
        K.Widget.prototype["_" + ah] = function(ak, aj, am) {
            if (typeof aj === "string") {
                aj = {
                    effect: aj
                }
            }
            var al;
            var ai = !aj ? ah : aj === true || typeof aj === "number" ? ag : aj.effect || ag;
            aj = aj || {};
            if (typeof aj === "number") {
                aj = {
                    duration: aj
                }
            }
            al = !K.isEmptyObject(aj);
            aj.complete = am;
            if (aj.delay) {
                ak.delay(aj.delay)
            }
            if (al && K.effects && K.effects.effect[ai]) {
                ak[ah](aj)
            } else {
                if (ai !== ah && ak[ai]) {
                    ak[ai](aj.duration, aj.easing, am)
                } else {
                    ak.queue(function(an) {
                        K(this)[ah]();
                        if (am) {
                            am.call(ak[0])
                        }
                        an()
                    })
                }
            }
        }
    });
    var L = K.widget;
    /*!
     * jQuery UI Position 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     *
     * http://api.jqueryui.com/position/
     */
    (function() {
        var an, ao = Math.max,
            ar = Math.abs,
            ai = /left|center|right/,
            al = /top|center|bottom/,
            ag = /[\+\-]\d+(\.[\d]+)?%?/,
            ap = /^\w+/,
            ah = /%$/,
            ak = K.fn.position;

        function aq(av, au, at) {
            return [parseFloat(av[0]) * (ah.test(av[0]) ? au / 100 : 1), parseFloat(av[1]) * (ah.test(av[1]) ? at / 100 : 1)]
        }

        function am(at, au) {
            return parseInt(K.css(at, au), 10) || 0
        }

        function aj(au) {
            var at = au[0];
            if (at.nodeType === 9) {
                return {
                    width: au.width(),
                    height: au.height(),
                    offset: {
                        top: 0,
                        left: 0
                    }
                }
            }
            if (K.isWindow(at)) {
                return {
                    width: au.width(),
                    height: au.height(),
                    offset: {
                        top: au.scrollTop(),
                        left: au.scrollLeft()
                    }
                }
            }
            if (at.preventDefault) {
                return {
                    width: 0,
                    height: 0,
                    offset: {
                        top: at.pageY,
                        left: at.pageX
                    }
                }
            }
            return {
                width: au.outerWidth(),
                height: au.outerHeight(),
                offset: au.offset()
            }
        }
        K.position = {
            scrollbarWidth: function() {
                if (an !== undefined) {
                    return an
                }
                var au, at, aw = K("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),
                    av = aw.children()[0];
                K("body").append(aw);
                au = av.offsetWidth;
                aw.css("overflow", "scroll");
                at = av.offsetWidth;
                if (au === at) {
                    at = aw[0].clientWidth
                }
                aw.remove();
                return (an = au - at)
            },
            getScrollInfo: function(ax) {
                var aw = ax.isWindow || ax.isDocument ? "" : ax.element.css("overflow-x"),
                    av = ax.isWindow || ax.isDocument ? "" : ax.element.css("overflow-y"),
                    au = aw === "scroll" || (aw === "auto" && ax.width < ax.element[0].scrollWidth),
                    at = av === "scroll" || (av === "auto" && ax.height < ax.element[0].scrollHeight);
                return {
                    width: at ? K.position.scrollbarWidth() : 0,
                    height: au ? K.position.scrollbarWidth() : 0
                }
            },
            getWithinInfo: function(av) {
                var aw = K(av || window),
                    at = K.isWindow(aw[0]),
                    ax = !!aw[0] && aw[0].nodeType === 9,
                    au = !at && !ax;
                return {
                    element: aw,
                    isWindow: at,
                    isDocument: ax,
                    offset: au ? K(av).offset() : {
                        left: 0,
                        top: 0
                    },
                    scrollLeft: aw.scrollLeft(),
                    scrollTop: aw.scrollTop(),
                    width: aw.outerWidth(),
                    height: aw.outerHeight()
                }
            }
        };
        K.fn.position = function(aD) {
            if (!aD || !aD.of) {
                return ak.apply(this, arguments)
            }
            aD = K.extend({}, aD);
            var aE, aA, ay, aC, ax, at, az = K(aD.of),
                aw = K.position.getWithinInfo(aD.within),
                au = K.position.getScrollInfo(aw),
                aB = (aD.collision || "flip").split(" "),
                av = {};
            at = aj(az);
            if (az[0].preventDefault) {
                aD.at = "left top"
            }
            aA = at.width;
            ay = at.height;
            aC = at.offset;
            ax = K.extend({}, aC);
            K.each(["my", "at"], function() {
                var aH = (aD[this] || "").split(" "),
                    aG, aF;
                if (aH.length === 1) {
                    aH = ai.test(aH[0]) ? aH.concat(["center"]) : al.test(aH[0]) ? ["center"].concat(aH) : ["center", "center"]
                }
                aH[0] = ai.test(aH[0]) ? aH[0] : "center";
                aH[1] = al.test(aH[1]) ? aH[1] : "center";
                aG = ag.exec(aH[0]);
                aF = ag.exec(aH[1]);
                av[this] = [aG ? aG[0] : 0, aF ? aF[0] : 0];
                aD[this] = [ap.exec(aH[0])[0], ap.exec(aH[1])[0]]
            });
            if (aB.length === 1) {
                aB[1] = aB[0]
            }
            if (aD.at[0] === "right") {
                ax.left += aA
            } else {
                if (aD.at[0] === "center") {
                    ax.left += aA / 2
                }
            }
            if (aD.at[1] === "bottom") {
                ax.top += ay
            } else {
                if (aD.at[1] === "center") {
                    ax.top += ay / 2
                }
            }
            aE = aq(av.at, aA, ay);
            ax.left += aE[0];
            ax.top += aE[1];
            return this.each(function() {
                var aG, aP, aI = K(this),
                    aK = aI.outerWidth(),
                    aH = aI.outerHeight(),
                    aJ = am(this, "marginLeft"),
                    aF = am(this, "marginTop"),
                    aO = aK + aJ + am(this, "marginRight") + au.width,
                    aN = aH + aF + am(this, "marginBottom") + au.height,
                    aL = K.extend({}, ax),
                    aM = aq(av.my, aI.outerWidth(), aI.outerHeight());
                if (aD.my[0] === "right") {
                    aL.left -= aK
                } else {
                    if (aD.my[0] === "center") {
                        aL.left -= aK / 2
                    }
                }
                if (aD.my[1] === "bottom") {
                    aL.top -= aH
                } else {
                    if (aD.my[1] === "center") {
                        aL.top -= aH / 2
                    }
                }
                aL.left += aM[0];
                aL.top += aM[1];
                aG = {
                    marginLeft: aJ,
                    marginTop: aF
                };
                K.each(["left", "top"], function(aR, aQ) {
                    if (K.ui.position[aB[aR]]) {
                        K.ui.position[aB[aR]][aQ](aL, {
                            targetWidth: aA,
                            targetHeight: ay,
                            elemWidth: aK,
                            elemHeight: aH,
                            collisionPosition: aG,
                            collisionWidth: aO,
                            collisionHeight: aN,
                            offset: [aE[0] + aM[0], aE[1] + aM[1]],
                            my: aD.my,
                            at: aD.at,
                            within: aw,
                            elem: aI
                        })
                    }
                });
                if (aD.using) {
                    aP = function(aT) {
                        var aV = aC.left - aL.left,
                            aS = aV + aA - aK,
                            aU = aC.top - aL.top,
                            aR = aU + ay - aH,
                            aQ = {
                                target: {
                                    element: az,
                                    left: aC.left,
                                    top: aC.top,
                                    width: aA,
                                    height: ay
                                },
                                element: {
                                    element: aI,
                                    left: aL.left,
                                    top: aL.top,
                                    width: aK,
                                    height: aH
                                },
                                horizontal: aS < 0 ? "left" : aV > 0 ? "right" : "center",
                                vertical: aR < 0 ? "top" : aU > 0 ? "bottom" : "middle"
                            };
                        if (aA < aK && ar(aV + aS) < aA) {
                            aQ.horizontal = "center"
                        }
                        if (ay < aH && ar(aU + aR) < ay) {
                            aQ.vertical = "middle"
                        }
                        if (ao(ar(aV), ar(aS)) > ao(ar(aU), ar(aR))) {
                            aQ.important = "horizontal"
                        } else {
                            aQ.important = "vertical"
                        }
                        aD.using.call(this, aT, aQ)
                    }
                }
                aI.offset(K.extend(aL, {
                    using: aP
                }))
            })
        };
        K.ui.position = {
            fit: {
                left: function(ax, aw) {
                    var av = aw.within,
                        az = av.isWindow ? av.scrollLeft : av.offset.left,
                        aB = av.width,
                        ay = ax.left - aw.collisionPosition.marginLeft,
                        aA = az - ay,
                        au = ay + aw.collisionWidth - aB - az,
                        at;
                    if (aw.collisionWidth > aB) {
                        if (aA > 0 && au <= 0) {
                            at = ax.left + aA + aw.collisionWidth - aB - az;
                            ax.left += aA - at
                        } else {
                            if (au > 0 && aA <= 0) {
                                ax.left = az
                            } else {
                                if (aA > au) {
                                    ax.left = az + aB - aw.collisionWidth
                                } else {
                                    ax.left = az
                                }
                            }
                        }
                    } else {
                        if (aA > 0) {
                            ax.left += aA
                        } else {
                            if (au > 0) {
                                ax.left -= au
                            } else {
                                ax.left = ao(ax.left - ay, ax.left)
                            }
                        }
                    }
                },
                top: function(aw, av) {
                    var au = av.within,
                        aA = au.isWindow ? au.scrollTop : au.offset.top,
                        aB = av.within.height,
                        ay = aw.top - av.collisionPosition.marginTop,
                        az = aA - ay,
                        ax = ay + av.collisionHeight - aB - aA,
                        at;
                    if (av.collisionHeight > aB) {
                        if (az > 0 && ax <= 0) {
                            at = aw.top + az + av.collisionHeight - aB - aA;
                            aw.top += az - at
                        } else {
                            if (ax > 0 && az <= 0) {
                                aw.top = aA
                            } else {
                                if (az > ax) {
                                    aw.top = aA + aB - av.collisionHeight
                                } else {
                                    aw.top = aA
                                }
                            }
                        }
                    } else {
                        if (az > 0) {
                            aw.top += az
                        } else {
                            if (ax > 0) {
                                aw.top -= ax
                            } else {
                                aw.top = ao(aw.top - ay, aw.top)
                            }
                        }
                    }
                }
            },
            flip: {
                left: function(az, ay) {
                    var ax = ay.within,
                        aD = ax.offset.left + ax.scrollLeft,
                        aG = ax.width,
                        av = ax.isWindow ? ax.scrollLeft : ax.offset.left,
                        aA = az.left - ay.collisionPosition.marginLeft,
                        aE = aA - av,
                        au = aA + ay.collisionWidth - aG - av,
                        aC = ay.my[0] === "left" ? -ay.elemWidth : ay.my[0] === "right" ? ay.elemWidth : 0,
                        aF = ay.at[0] === "left" ? ay.targetWidth : ay.at[0] === "right" ? -ay.targetWidth : 0,
                        aw = -2 * ay.offset[0],
                        at, aB;
                    if (aE < 0) {
                        at = az.left + aC + aF + aw + ay.collisionWidth - aG - aD;
                        if (at < 0 || at < ar(aE)) {
                            az.left += aC + aF + aw
                        }
                    } else {
                        if (au > 0) {
                            aB = az.left - ay.collisionPosition.marginLeft + aC + aF + aw - av;
                            if (aB > 0 || ar(aB) < au) {
                                az.left += aC + aF + aw
                            }
                        }
                    }
                },
                top: function(ay, ax) {
                    var aw = ax.within,
                        aF = aw.offset.top + aw.scrollTop,
                        aG = aw.height,
                        at = aw.isWindow ? aw.scrollTop : aw.offset.top,
                        aA = ay.top - ax.collisionPosition.marginTop,
                        aC = aA - at,
                        az = aA + ax.collisionHeight - aG - at,
                        aD = ax.my[1] === "top",
                        aB = aD ? -ax.elemHeight : ax.my[1] === "bottom" ? ax.elemHeight : 0,
                        aH = ax.at[1] === "top" ? ax.targetHeight : ax.at[1] === "bottom" ? -ax.targetHeight : 0,
                        av = -2 * ax.offset[1],
                        aE, au;
                    if (aC < 0) {
                        au = ay.top + aB + aH + av + ax.collisionHeight - aG - aF;
                        if (au < 0 || au < ar(aC)) {
                            ay.top += aB + aH + av
                        }
                    } else {
                        if (az > 0) {
                            aE = ay.top - ax.collisionPosition.marginTop + aB + aH + av - at;
                            if (aE > 0 || ar(aE) < az) {
                                ay.top += aB + aH + av
                            }
                        }
                    }
                }
            },
            flipfit: {
                left: function() {
                    K.ui.position.flip.left.apply(this, arguments);
                    K.ui.position.fit.left.apply(this, arguments)
                },
                top: function() {
                    K.ui.position.flip.top.apply(this, arguments);
                    K.ui.position.fit.top.apply(this, arguments)
                }
            }
        }
    })();
    var R = K.ui.position;
    /*!
     * jQuery UI :data 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var ad = K.extend(K.expr[":"], {
        data: K.expr.createPseudo ? K.expr.createPseudo(function(ag) {
            return function(ah) {
                return !!K.data(ah, ag)
            }
        }) : function(ai, ah, ag) {
            return !!K.data(ai, ag[3])
        }
    });
    /*!
     * jQuery UI Disable Selection 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var V = K.fn.extend({
        disableSelection: (function() {
            var ag = "onselectstart" in document.createElement("div") ? "selectstart" : "mousedown";
            return function() {
                return this.on(ag + ".ui-disableSelection", function(ah) {
                    ah.preventDefault()
                })
            }
        })(),
        enableSelection: function() {
            return this.off(".ui-disableSelection")
        }
    });
    /*!
     * jQuery UI Focusable 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    K.ui.focusable = function(aj, ah) {
        var am, ak, ai, al, ag, an = aj.nodeName.toLowerCase();
        if ("area" === an) {
            am = aj.parentNode;
            ak = am.name;
            if (!aj.href || !ak || am.nodeName.toLowerCase() !== "map") {
                return false
            }
            ai = K("img[usemap='#" + ak + "']");
            return ai.length > 0 && ai.is(":visible")
        }
        if (/^(input|select|textarea|button|object)$/.test(an)) {
            al = !aj.disabled;
            if (al) {
                ag = K(aj).closest("fieldset")[0];
                if (ag) {
                    al = !ag.disabled
                }
            }
        } else {
            if ("a" === an) {
                al = aj.href || ah
            } else {
                al = ah
            }
        }
        return al && K(aj).is(":visible") && E(K(aj))
    };

    function E(ah) {
        var ag = ah.css("visibility");
        while (ag === "inherit") {
            ah = ah.parent();
            ag = ah.css("visibility")
        }
        return ag !== "hidden"
    }
    K.extend(K.expr[":"], {
        focusable: function(ag) {
            return K.ui.focusable(ag, K.attr(ag, "tabindex") != null)
        }
    });
    var B = K.ui.focusable;
    var P = K.fn.form = function() {
        return typeof this[0].form === "string" ? this.closest("form") : K(this[0].form)
    };
    /*!
     * jQuery UI Form Reset Mixin 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var i = K.ui.formResetMixin = {
        _formResetHandler: function() {
            var ag = K(this);
            setTimeout(function() {
                var ah = ag.data("ui-form-reset-instances");
                K.each(ah, function() {
                    this.refresh()
                })
            })
        },
        _bindFormResetHandler: function() {
            this.form = this.element.form();
            if (!this.form.length) {
                return
            }
            var ag = this.form.data("ui-form-reset-instances") || [];
            if (!ag.length) {
                this.form.on("reset.ui-form-reset", this._formResetHandler)
            }
            ag.push(this);
            this.form.data("ui-form-reset-instances", ag)
        },
        _unbindFormResetHandler: function() {
            if (!this.form.length) {
                return
            }
            var ag = this.form.data("ui-form-reset-instances");
            ag.splice(K.inArray(this, ag), 1);
            if (ag.length) {
                this.form.data("ui-form-reset-instances", ag)
            } else {
                this.form.removeData("ui-form-reset-instances").off("reset.ui-form-reset")
            }
        }
    };
    /*!
     * jQuery UI Keycode 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var w = K.ui.keyCode = {
        BACKSPACE: 8,
        COMMA: 188,
        DELETE: 46,
        DOWN: 40,
        END: 35,
        ENTER: 13,
        ESCAPE: 27,
        HOME: 36,
        LEFT: 37,
        PAGE_DOWN: 34,
        PAGE_UP: 33,
        PERIOD: 190,
        RIGHT: 39,
        SPACE: 32,
        TAB: 9,
        UP: 38
    };
    var Y = K.ui.escapeSelector = (function() {
        var ag = /([!"#$%&'()*+,./:;<=>?@[\]^`{|}~])/g;
        return function(ah) {
            return ah.replace(ag, "\\$1")
        }
    })();
    /*!
     * jQuery UI Labels 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var s = K.fn.labels = function() {
        var ah, ag, ak, aj, ai;
        if (this[0].labels && this[0].labels.length) {
            return this.pushStack(this[0].labels)
        }
        aj = this.eq(0).parents("label");
        ak = this.attr("id");
        if (ak) {
            ah = this.eq(0).parents().last();
            ai = ah.add(ah.length ? ah.siblings() : this.siblings());
            ag = "label[for='" + K.ui.escapeSelector(ak) + "']";
            aj = aj.add(ai.find(ag).addBack(ag))
        }
        return this.pushStack(aj)
    };
    /*!
     * jQuery UI Scroll Parent 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var J = K.fn.scrollParent = function(ai) {
        var ah = this.css("position"),
            ag = ah === "absolute",
            aj = ai ? /(auto|scroll|hidden)/ : /(auto|scroll)/,
            ak = this.parents().filter(function() {
                var al = K(this);
                if (ag && al.css("position") === "static") {
                    return false
                }
                return aj.test(al.css("overflow") + al.css("overflow-y") + al.css("overflow-x"))
            }).eq(0);
        return ah === "fixed" || !ak.length ? K(this[0].ownerDocument || document) : ak
    };
    /*!
     * jQuery UI Tabbable 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var r = K.extend(K.expr[":"], {
        tabbable: function(ai) {
            var ah = K.attr(ai, "tabindex"),
                ag = ah != null;
            return (!ag || ah >= 0) && K.ui.focusable(ai, ag)
        }
    });
    /*!
     * jQuery UI Unique ID 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var k = K.fn.extend({
        uniqueId: (function() {
            var ag = 0;
            return function() {
                return this.each(function() {
                    if (!this.id) {
                        this.id = "ui-id-" + (++ag)
                    }
                })
            }
        })(),
        removeUniqueId: function() {
            return this.each(function() {
                if (/^ui-id-\d+$/.test(this.id)) {
                    K(this).removeAttr("id")
                }
            })
        }
    });
    var N = K.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase());
    /*!
     * jQuery UI Mouse 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var e = false;
    K(document).on("mouseup", function() {
        e = false
    });
    var H = K.widget("ui.mouse", {
        version: "1.12.1",
        options: {
            cancel: "input, textarea, button, select, option",
            distance: 1,
            delay: 0
        },
        _mouseInit: function() {
            var ag = this;
            this.element.on("mousedown." + this.widgetName, function(ah) {
                return ag._mouseDown(ah)
            }).on("click." + this.widgetName, function(ah) {
                if (true === K.data(ah.target, ag.widgetName + ".preventClickEvent")) {
                    K.removeData(ah.target, ag.widgetName + ".preventClickEvent");
                    ah.stopImmediatePropagation();
                    return false
                }
            });
            this.started = false
        },
        _mouseDestroy: function() {
            this.element.off("." + this.widgetName);
            if (this._mouseMoveDelegate) {
                this.document.off("mousemove." + this.widgetName, this._mouseMoveDelegate).off("mouseup." + this.widgetName, this._mouseUpDelegate)
            }
        },
        _mouseDown: function(ai) {
            if (e) {
                return
            }
            this._mouseMoved = false;
            (this._mouseStarted && this._mouseUp(ai));
            this._mouseDownEvent = ai;
            var ah = this,
                aj = (ai.which === 1),
                ag = (typeof this.options.cancel === "string" && ai.target.nodeName ? K(ai.target).closest(this.options.cancel).length : false);
            if (!aj || ag || !this._mouseCapture(ai)) {
                return true
            }
            this.mouseDelayMet = !this.options.delay;
            if (!this.mouseDelayMet) {
                this._mouseDelayTimer = setTimeout(function() {
                    ah.mouseDelayMet = true
                }, this.options.delay)
            }
            if (this._mouseDistanceMet(ai) && this._mouseDelayMet(ai)) {
                this._mouseStarted = (this._mouseStart(ai) !== false);
                if (!this._mouseStarted) {
                    ai.preventDefault();
                    return true
                }
            }
            if (true === K.data(ai.target, this.widgetName + ".preventClickEvent")) {
                K.removeData(ai.target, this.widgetName + ".preventClickEvent")
            }
            this._mouseMoveDelegate = function(ak) {
                return ah._mouseMove(ak)
            };
            this._mouseUpDelegate = function(ak) {
                return ah._mouseUp(ak)
            };
            this.document.on("mousemove." + this.widgetName, this._mouseMoveDelegate).on("mouseup." + this.widgetName, this._mouseUpDelegate);
            ai.preventDefault();
            e = true;
            return true
        },
        _mouseMove: function(ag) {
            if (this._mouseMoved) {
                if (K.ui.ie && (!document.documentMode || document.documentMode < 9) && !ag.button) {
                    return this._mouseUp(ag)
                } else {
                    if (!ag.which) {
                        if (ag.originalEvent.altKey || ag.originalEvent.ctrlKey || ag.originalEvent.metaKey || ag.originalEvent.shiftKey) {
                            this.ignoreMissingWhich = true
                        } else {
                            if (!this.ignoreMissingWhich) {
                                return this._mouseUp(ag)
                            }
                        }
                    }
                }
            }
            if (ag.which || ag.button) {
                this._mouseMoved = true
            }
            if (this._mouseStarted) {
                this._mouseDrag(ag);
                return ag.preventDefault()
            }
            if (this._mouseDistanceMet(ag) && this._mouseDelayMet(ag)) {
                this._mouseStarted = (this._mouseStart(this._mouseDownEvent, ag) !== false);
                (this._mouseStarted ? this._mouseDrag(ag) : this._mouseUp(ag))
            }
            return !this._mouseStarted
        },
        _mouseUp: function(ag) {
            this.document.off("mousemove." + this.widgetName, this._mouseMoveDelegate).off("mouseup." + this.widgetName, this._mouseUpDelegate);
            if (this._mouseStarted) {
                this._mouseStarted = false;
                if (ag.target === this._mouseDownEvent.target) {
                    K.data(ag.target, this.widgetName + ".preventClickEvent", true)
                }
                this._mouseStop(ag)
            }
            if (this._mouseDelayTimer) {
                clearTimeout(this._mouseDelayTimer);
                delete this._mouseDelayTimer
            }
            this.ignoreMissingWhich = false;
            e = false;
            ag.preventDefault()
        },
        _mouseDistanceMet: function(ag) {
            return (Math.max(Math.abs(this._mouseDownEvent.pageX - ag.pageX), Math.abs(this._mouseDownEvent.pageY - ag.pageY)) >= this.options.distance)
        },
        _mouseDelayMet: function() {
            return this.mouseDelayMet
        },
        _mouseStart: function() {},
        _mouseDrag: function() {},
        _mouseStop: function() {},
        _mouseCapture: function() {
            return true
        }
    });
    var ab = K.ui.plugin = {
        add: function(ah, ai, ak) {
            var ag, aj = K.ui[ah].prototype;
            for (ag in ak) {
                aj.plugins[ag] = aj.plugins[ag] || [];
                aj.plugins[ag].push([ai, ak[ag]])
            }
        },
        call: function(ag, aj, ai, ah) {
            var ak, al = ag.plugins[aj];
            if (!al) {
                return
            }
            if (!ah && (!ag.element[0].parentNode || ag.element[0].parentNode.nodeType === 11)) {
                return
            }
            for (ak = 0; ak < al.length; ak++) {
                if (ag.options[al[ak][0]]) {
                    al[ak][1].apply(ag.element, ai)
                }
            }
        }
    };
    var O = K.ui.safeActiveElement = function(ag) {
        var ai;
        try {
            ai = ag.activeElement
        } catch (ah) {
            ai = ag.body
        }
        if (!ai) {
            ai = ag.body
        }
        if (!ai.nodeName) {
            ai = ag.body
        }
        return ai
    };
    var z = K.ui.safeBlur = function(ag) {
        if (ag && ag.nodeName.toLowerCase() !== "body") {
            K(ag).trigger("blur")
        }
    };
    /*!
     * jQuery UI Draggable 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    K.widget("ui.draggable", K.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "drag",
        options: {
            addClasses: true,
            appendTo: "parent",
            axis: false,
            connectToSortable: false,
            containment: false,
            cursor: "auto",
            cursorAt: false,
            grid: false,
            handle: false,
            helper: "original",
            iframeFix: false,
            opacity: false,
            refreshPositions: false,
            revert: false,
            revertDuration: 500,
            scope: "default",
            scroll: true,
            scrollSensitivity: 20,
            scrollSpeed: 20,
            snap: false,
            snapMode: "both",
            snapTolerance: 20,
            stack: false,
            zIndex: false,
            drag: null,
            start: null,
            stop: null
        },
        _create: function() {
            if (this.options.helper === "original") {
                this._setPositionRelative()
            }
            if (this.options.addClasses) {
                this._addClass("ui-draggable")
            }
            this._setHandleClassName();
            this._mouseInit()
        },
        _setOption: function(ag, ah) {
            this._super(ag, ah);
            if (ag === "handle") {
                this._removeHandleClassName();
                this._setHandleClassName()
            }
        },
        _destroy: function() {
            if ((this.helper || this.element).is(".ui-draggable-dragging")) {
                this.destroyOnClear = true;
                return
            }
            this._removeHandleClassName();
            this._mouseDestroy()
        },
        _mouseCapture: function(ag) {
            var ah = this.options;
            if (this.helper || ah.disabled || K(ag.target).closest(".ui-resizable-handle").length > 0) {
                return false
            }
            this.handle = this._getHandle(ag);
            if (!this.handle) {
                return false
            }
            this._blurActiveElement(ag);
            this._blockFrames(ah.iframeFix === true ? "iframe" : ah.iframeFix);
            return true
        },
        _blockFrames: function(ag) {
            this.iframeBlocks = this.document.find(ag).map(function() {
                var ah = K(this);
                return K("<div>").css("position", "absolute").appendTo(ah.parent()).outerWidth(ah.outerWidth()).outerHeight(ah.outerHeight()).offset(ah.offset())[0]
            })
        },
        _unblockFrames: function() {
            if (this.iframeBlocks) {
                this.iframeBlocks.remove();
                delete this.iframeBlocks
            }
        },
        _blurActiveElement: function(ah) {
            var ag = K.ui.safeActiveElement(this.document[0]),
                ai = K(ah.target);
            if (ai.closest(ag).length) {
                return
            }
            K.ui.safeBlur(ag)
        },
        _mouseStart: function(ag) {
            var ah = this.options;
            this.helper = this._createHelper(ag);
            this._addClass(this.helper, "ui-draggable-dragging");
            this._cacheHelperProportions();
            if (K.ui.ddmanager) {
                K.ui.ddmanager.current = this
            }
            this._cacheMargins();
            this.cssPosition = this.helper.css("position");
            this.scrollParent = this.helper.scrollParent(true);
            this.offsetParent = this.helper.offsetParent();
            this.hasFixedAncestor = this.helper.parents().filter(function() {
                return K(this).css("position") === "fixed"
            }).length > 0;
            this.positionAbs = this.element.offset();
            this._refreshOffsets(ag);
            this.originalPosition = this.position = this._generatePosition(ag, false);
            this.originalPageX = ag.pageX;
            this.originalPageY = ag.pageY;
            (ah.cursorAt && this._adjustOffsetFromHelper(ah.cursorAt));
            this._setContainment();
            if (this._trigger("start", ag) === false) {
                this._clear();
                return false
            }
            this._cacheHelperProportions();
            if (K.ui.ddmanager && !ah.dropBehaviour) {
                K.ui.ddmanager.prepareOffsets(this, ag)
            }
            this._mouseDrag(ag, true);
            if (K.ui.ddmanager) {
                K.ui.ddmanager.dragStart(this, ag)
            }
            return true
        },
        _refreshOffsets: function(ag) {
            this.offset = {
                top: this.positionAbs.top - this.margins.top,
                left: this.positionAbs.left - this.margins.left,
                scroll: false,
                parent: this._getParentOffset(),
                relative: this._getRelativeOffset()
            };
            this.offset.click = {
                left: ag.pageX - this.offset.left,
                top: ag.pageY - this.offset.top
            }
        },
        _mouseDrag: function(ag, ai) {
            if (this.hasFixedAncestor) {
                this.offset.parent = this._getParentOffset()
            }
            this.position = this._generatePosition(ag, true);
            this.positionAbs = this._convertPositionTo("absolute");
            if (!ai) {
                var ah = this._uiHash();
                if (this._trigger("drag", ag, ah) === false) {
                    this._mouseUp(new K.Event("mouseup", ag));
                    return false
                }
                this.position = ah.position
            }
            this.helper[0].style.left = this.position.left + "px";
            this.helper[0].style.top = this.position.top + "px";
            if (K.ui.ddmanager) {
                K.ui.ddmanager.drag(this, ag)
            }
            return false
        },
        _mouseStop: function(ah) {
            var ag = this,
                ai = false;
            if (K.ui.ddmanager && !this.options.dropBehaviour) {
                ai = K.ui.ddmanager.drop(this, ah)
            }
            if (this.dropped) {
                ai = this.dropped;
                this.dropped = false
            }
            if ((this.options.revert === "invalid" && !ai) || (this.options.revert === "valid" && ai) || this.options.revert === true || (K.isFunction(this.options.revert) && this.options.revert.call(this.element, ai))) {
                K(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function() {
                    if (ag._trigger("stop", ah) !== false) {
                        ag._clear()
                    }
                })
            } else {
                if (this._trigger("stop", ah) !== false) {
                    this._clear()
                }
            }
            return false
        },
        _mouseUp: function(ag) {
            this._unblockFrames();
            if (K.ui.ddmanager) {
                K.ui.ddmanager.dragStop(this, ag)
            }
            if (this.handleElement.is(ag.target)) {
                this.element.trigger("focus")
            }
            return K.ui.mouse.prototype._mouseUp.call(this, ag)
        },
        cancel: function() {
            if (this.helper.is(".ui-draggable-dragging")) {
                this._mouseUp(new K.Event("mouseup", {
                    target: this.element[0]
                }))
            } else {
                this._clear()
            }
            return this
        },
        _getHandle: function(ag) {
            return this.options.handle ? !!K(ag.target).closest(this.element.find(this.options.handle)).length : true
        },
        _setHandleClassName: function() {
            this.handleElement = this.options.handle ? this.element.find(this.options.handle) : this.element;
            this._addClass(this.handleElement, "ui-draggable-handle")
        },
        _removeHandleClassName: function() {
            this._removeClass(this.handleElement, "ui-draggable-handle")
        },
        _createHelper: function(ah) {
            var aj = this.options,
                ai = K.isFunction(aj.helper),
                ag = ai ? K(aj.helper.apply(this.element[0], [ah])) : (aj.helper === "clone" ? this.element.clone().removeAttr("id") : this.element);
            if (!ag.parents("body").length) {
                ag.appendTo((aj.appendTo === "parent" ? this.element[0].parentNode : aj.appendTo))
            }
            if (ai && ag[0] === this.element[0]) {
                this._setPositionRelative()
            }
            if (ag[0] !== this.element[0] && !(/(fixed|absolute)/).test(ag.css("position"))) {
                ag.css("position", "absolute")
            }
            return ag
        },
        _setPositionRelative: function() {
            if (!(/^(?:r|a|f)/).test(this.element.css("position"))) {
                this.element[0].style.position = "relative"
            }
        },
        _adjustOffsetFromHelper: function(ag) {
            if (typeof ag === "string") {
                ag = ag.split(" ")
            }
            if (K.isArray(ag)) {
                ag = {
                    left: +ag[0],
                    top: +ag[1] || 0
                }
            }
            if ("left" in ag) {
                this.offset.click.left = ag.left + this.margins.left
            }
            if ("right" in ag) {
                this.offset.click.left = this.helperProportions.width - ag.right + this.margins.left
            }
            if ("top" in ag) {
                this.offset.click.top = ag.top + this.margins.top
            }
            if ("bottom" in ag) {
                this.offset.click.top = this.helperProportions.height - ag.bottom + this.margins.top
            }
        },
        _isRootNode: function(ag) {
            return (/(html|body)/i).test(ag.tagName) || ag === this.document[0]
        },
        _getParentOffset: function() {
            var ah = this.offsetParent.offset(),
                ag = this.document[0];
            if (this.cssPosition === "absolute" && this.scrollParent[0] !== ag && K.contains(this.scrollParent[0], this.offsetParent[0])) {
                ah.left += this.scrollParent.scrollLeft();
                ah.top += this.scrollParent.scrollTop()
            }
            if (this._isRootNode(this.offsetParent[0])) {
                ah = {
                    top: 0,
                    left: 0
                }
            }
            return {
                top: ah.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                left: ah.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
            }
        },
        _getRelativeOffset: function() {
            if (this.cssPosition !== "relative") {
                return {
                    top: 0,
                    left: 0
                }
            }
            var ag = this.element.position(),
                ah = this._isRootNode(this.scrollParent[0]);
            return {
                top: ag.top - (parseInt(this.helper.css("top"), 10) || 0) + (!ah ? this.scrollParent.scrollTop() : 0),
                left: ag.left - (parseInt(this.helper.css("left"), 10) || 0) + (!ah ? this.scrollParent.scrollLeft() : 0)
            }
        },
        _cacheMargins: function() {
            this.margins = {
                left: (parseInt(this.element.css("marginLeft"), 10) || 0),
                top: (parseInt(this.element.css("marginTop"), 10) || 0),
                right: (parseInt(this.element.css("marginRight"), 10) || 0),
                bottom: (parseInt(this.element.css("marginBottom"), 10) || 0)
            }
        },
        _cacheHelperProportions: function() {
            this.helperProportions = {
                width: this.helper.outerWidth(),
                height: this.helper.outerHeight()
            }
        },
        _setContainment: function() {
            var ah, ak, ai, aj = this.options,
                ag = this.document[0];
            this.relativeContainer = null;
            if (!aj.containment) {
                this.containment = null;
                return
            }
            if (aj.containment === "window") {
                this.containment = [K(window).scrollLeft() - this.offset.relative.left - this.offset.parent.left, K(window).scrollTop() - this.offset.relative.top - this.offset.parent.top, K(window).scrollLeft() + K(window).width() - this.helperProportions.width - this.margins.left, K(window).scrollTop() + (K(window).height() || ag.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top];
                return
            }
            if (aj.containment === "document") {
                this.containment = [0, 0, K(ag).width() - this.helperProportions.width - this.margins.left, (K(ag).height() || ag.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top];
                return
            }
            if (aj.containment.constructor === Array) {
                this.containment = aj.containment;
                return
            }
            if (aj.containment === "parent") {
                aj.containment = this.helper[0].parentNode
            }
            ak = K(aj.containment);
            ai = ak[0];
            if (!ai) {
                return
            }
            ah = /(scroll|auto)/.test(ak.css("overflow"));
            this.containment = [(parseInt(ak.css("borderLeftWidth"), 10) || 0) + (parseInt(ak.css("paddingLeft"), 10) || 0), (parseInt(ak.css("borderTopWidth"), 10) || 0) + (parseInt(ak.css("paddingTop"), 10) || 0), (ah ? Math.max(ai.scrollWidth, ai.offsetWidth) : ai.offsetWidth) - (parseInt(ak.css("borderRightWidth"), 10) || 0) - (parseInt(ak.css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left - this.margins.right, (ah ? Math.max(ai.scrollHeight, ai.offsetHeight) : ai.offsetHeight) - (parseInt(ak.css("borderBottomWidth"), 10) || 0) - (parseInt(ak.css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top - this.margins.bottom];
            this.relativeContainer = ak
        },
        _convertPositionTo: function(ah, aj) {
            if (!aj) {
                aj = this.position
            }
            var ag = ah === "absolute" ? 1 : -1,
                ai = this._isRootNode(this.scrollParent[0]);
            return {
                top: (aj.top + this.offset.relative.top * ag + this.offset.parent.top * ag - ((this.cssPosition === "fixed" ? -this.offset.scroll.top : (ai ? 0 : this.offset.scroll.top)) * ag)),
                left: (aj.left + this.offset.relative.left * ag + this.offset.parent.left * ag - ((this.cssPosition === "fixed" ? -this.offset.scroll.left : (ai ? 0 : this.offset.scroll.left)) * ag))
            }
        },
        _generatePosition: function(ah, an) {
            var ag, ao, ap, aj, ai = this.options,
                am = this._isRootNode(this.scrollParent[0]),
                al = ah.pageX,
                ak = ah.pageY;
            if (!am || !this.offset.scroll) {
                this.offset.scroll = {
                    top: this.scrollParent.scrollTop(),
                    left: this.scrollParent.scrollLeft()
                }
            }
            if (an) {
                if (this.containment) {
                    if (this.relativeContainer) {
                        ao = this.relativeContainer.offset();
                        ag = [this.containment[0] + ao.left, this.containment[1] + ao.top, this.containment[2] + ao.left, this.containment[3] + ao.top]
                    } else {
                        ag = this.containment
                    }
                    if (ah.pageX - this.offset.click.left < ag[0]) {
                        al = ag[0] + this.offset.click.left
                    }
                    if (ah.pageY - this.offset.click.top < ag[1]) {
                        ak = ag[1] + this.offset.click.top
                    }
                    if (ah.pageX - this.offset.click.left > ag[2]) {
                        al = ag[2] + this.offset.click.left
                    }
                    if (ah.pageY - this.offset.click.top > ag[3]) {
                        ak = ag[3] + this.offset.click.top
                    }
                }
                if (ai.grid) {
                    ap = ai.grid[1] ? this.originalPageY + Math.round((ak - this.originalPageY) / ai.grid[1]) * ai.grid[1] : this.originalPageY;
                    ak = ag ? ((ap - this.offset.click.top >= ag[1] || ap - this.offset.click.top > ag[3]) ? ap : ((ap - this.offset.click.top >= ag[1]) ? ap - ai.grid[1] : ap + ai.grid[1])) : ap;
                    aj = ai.grid[0] ? this.originalPageX + Math.round((al - this.originalPageX) / ai.grid[0]) * ai.grid[0] : this.originalPageX;
                    al = ag ? ((aj - this.offset.click.left >= ag[0] || aj - this.offset.click.left > ag[2]) ? aj : ((aj - this.offset.click.left >= ag[0]) ? aj - ai.grid[0] : aj + ai.grid[0])) : aj
                }
                if (ai.axis === "y") {
                    al = this.originalPageX
                }
                if (ai.axis === "x") {
                    ak = this.originalPageY
                }
            }
            return {
                top: (ak - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + (this.cssPosition === "fixed" ? -this.offset.scroll.top : (am ? 0 : this.offset.scroll.top))),
                left: (al - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + (this.cssPosition === "fixed" ? -this.offset.scroll.left : (am ? 0 : this.offset.scroll.left)))
            }
        },
        _clear: function() {
            this._removeClass(this.helper, "ui-draggable-dragging");
            if (this.helper[0] !== this.element[0] && !this.cancelHelperRemoval) {
                this.helper.remove()
            }
            this.helper = null;
            this.cancelHelperRemoval = false;
            if (this.destroyOnClear) {
                this.destroy()
            }
        },
        _trigger: function(ag, ah, ai) {
            ai = ai || this._uiHash();
            K.ui.plugin.call(this, ag, [ah, ai, this], true);
            if (/^(drag|start|stop)/.test(ag)) {
                this.positionAbs = this._convertPositionTo("absolute");
                ai.offset = this.positionAbs
            }
            return K.Widget.prototype._trigger.call(this, ag, ah, ai)
        },
        plugins: {},
        _uiHash: function() {
            return {
                helper: this.helper,
                position: this.position,
                originalPosition: this.originalPosition,
                offset: this.positionAbs
            }
        }
    });
    K.ui.plugin.add("draggable", "connectToSortable", {
        start: function(ai, aj, ag) {
            var ah = K.extend({}, aj, {
                item: ag.element
            });
            ag.sortables = [];
            K(ag.options.connectToSortable).each(function() {
                var ak = K(this).sortable("instance");
                if (ak && !ak.options.disabled) {
                    ag.sortables.push(ak);
                    ak.refreshPositions();
                    ak._trigger("activate", ai, ah)
                }
            })
        },
        stop: function(ai, aj, ag) {
            var ah = K.extend({}, aj, {
                item: ag.element
            });
            ag.cancelHelperRemoval = false;
            K.each(ag.sortables, function() {
                var ak = this;
                if (ak.isOver) {
                    ak.isOver = 0;
                    ag.cancelHelperRemoval = true;
                    ak.cancelHelperRemoval = false;
                    ak._storedCSS = {
                        position: ak.placeholder.css("position"),
                        top: ak.placeholder.css("top"),
                        left: ak.placeholder.css("left")
                    };
                    ak._mouseStop(ai);
                    ak.options.helper = ak.options._helper
                } else {
                    ak.cancelHelperRemoval = true;
                    ak._trigger("deactivate", ai, ah)
                }
            })
        },
        drag: function(ah, ai, ag) {
            K.each(ag.sortables, function() {
                var aj = false,
                    ak = this;
                ak.positionAbs = ag.positionAbs;
                ak.helperProportions = ag.helperProportions;
                ak.offset.click = ag.offset.click;
                if (ak._intersectsWith(ak.containerCache)) {
                    aj = true;
                    K.each(ag.sortables, function() {
                        this.positionAbs = ag.positionAbs;
                        this.helperProportions = ag.helperProportions;
                        this.offset.click = ag.offset.click;
                        if (this !== ak && this._intersectsWith(this.containerCache) && K.contains(ak.element[0], this.element[0])) {
                            aj = false
                        }
                        return aj
                    })
                }
                if (aj) {
                    if (!ak.isOver) {
                        ak.isOver = 1;
                        ag._parent = ai.helper.parent();
                        ak.currentItem = ai.helper.appendTo(ak.element).data("ui-sortable-item", true);
                        ak.options._helper = ak.options.helper;
                        ak.options.helper = function() {
                            return ai.helper[0]
                        };
                        ah.target = ak.currentItem[0];
                        ak._mouseCapture(ah, true);
                        ak._mouseStart(ah, true, true);
                        ak.offset.click.top = ag.offset.click.top;
                        ak.offset.click.left = ag.offset.click.left;
                        ak.offset.parent.left -= ag.offset.parent.left - ak.offset.parent.left;
                        ak.offset.parent.top -= ag.offset.parent.top - ak.offset.parent.top;
                        ag._trigger("toSortable", ah);
                        ag.dropped = ak.element;
                        K.each(ag.sortables, function() {
                            this.refreshPositions()
                        });
                        ag.currentItem = ag.element;
                        ak.fromOutside = ag
                    }
                    if (ak.currentItem) {
                        ak._mouseDrag(ah);
                        ai.position = ak.position
                    }
                } else {
                    if (ak.isOver) {
                        ak.isOver = 0;
                        ak.cancelHelperRemoval = true;
                        ak.options._revert = ak.options.revert;
                        ak.options.revert = false;
                        ak._trigger("out", ah, ak._uiHash(ak));
                        ak._mouseStop(ah, true);
                        ak.options.revert = ak.options._revert;
                        ak.options.helper = ak.options._helper;
                        if (ak.placeholder) {
                            ak.placeholder.remove()
                        }
                        ai.helper.appendTo(ag._parent);
                        ag._refreshOffsets(ah);
                        ai.position = ag._generatePosition(ah, true);
                        ag._trigger("fromSortable", ah);
                        ag.dropped = false;
                        K.each(ag.sortables, function() {
                            this.refreshPositions()
                        })
                    }
                }
            })
        }
    });
    K.ui.plugin.add("draggable", "cursor", {
        start: function(ai, aj, ag) {
            var ah = K("body"),
                ak = ag.options;
            if (ah.css("cursor")) {
                ak._cursor = ah.css("cursor")
            }
            ah.css("cursor", ak.cursor)
        },
        stop: function(ah, ai, ag) {
            var aj = ag.options;
            if (aj._cursor) {
                K("body").css("cursor", aj._cursor)
            }
        }
    });
    K.ui.plugin.add("draggable", "opacity", {
        start: function(ai, aj, ag) {
            var ah = K(aj.helper),
                ak = ag.options;
            if (ah.css("opacity")) {
                ak._opacity = ah.css("opacity")
            }
            ah.css("opacity", ak.opacity)
        },
        stop: function(ah, ai, ag) {
            var aj = ag.options;
            if (aj._opacity) {
                K(ai.helper).css("opacity", aj._opacity)
            }
        }
    });
    K.ui.plugin.add("draggable", "scroll", {
        start: function(ah, ai, ag) {
            if (!ag.scrollParentNotHidden) {
                ag.scrollParentNotHidden = ag.helper.scrollParent(false)
            }
            if (ag.scrollParentNotHidden[0] !== ag.document[0] && ag.scrollParentNotHidden[0].tagName !== "HTML") {
                ag.overflowOffset = ag.scrollParentNotHidden.offset()
            }
        },
        drag: function(aj, ak, ai) {
            var al = ai.options,
                ah = false,
                am = ai.scrollParentNotHidden[0],
                ag = ai.document[0];
            if (am !== ag && am.tagName !== "HTML") {
                if (!al.axis || al.axis !== "x") {
                    if ((ai.overflowOffset.top + am.offsetHeight) - aj.pageY < al.scrollSensitivity) {
                        am.scrollTop = ah = am.scrollTop + al.scrollSpeed
                    } else {
                        if (aj.pageY - ai.overflowOffset.top < al.scrollSensitivity) {
                            am.scrollTop = ah = am.scrollTop - al.scrollSpeed
                        }
                    }
                }
                if (!al.axis || al.axis !== "y") {
                    if ((ai.overflowOffset.left + am.offsetWidth) - aj.pageX < al.scrollSensitivity) {
                        am.scrollLeft = ah = am.scrollLeft + al.scrollSpeed
                    } else {
                        if (aj.pageX - ai.overflowOffset.left < al.scrollSensitivity) {
                            am.scrollLeft = ah = am.scrollLeft - al.scrollSpeed
                        }
                    }
                }
            } else {
                if (!al.axis || al.axis !== "x") {
                    if (aj.pageY - K(ag).scrollTop() < al.scrollSensitivity) {
                        ah = K(ag).scrollTop(K(ag).scrollTop() - al.scrollSpeed)
                    } else {
                        if (K(window).height() - (aj.pageY - K(ag).scrollTop()) < al.scrollSensitivity) {
                            ah = K(ag).scrollTop(K(ag).scrollTop() + al.scrollSpeed)
                        }
                    }
                }
                if (!al.axis || al.axis !== "y") {
                    if (aj.pageX - K(ag).scrollLeft() < al.scrollSensitivity) {
                        ah = K(ag).scrollLeft(K(ag).scrollLeft() - al.scrollSpeed)
                    } else {
                        if (K(window).width() - (aj.pageX - K(ag).scrollLeft()) < al.scrollSensitivity) {
                            ah = K(ag).scrollLeft(K(ag).scrollLeft() + al.scrollSpeed)
                        }
                    }
                }
            }
            if (ah !== false && K.ui.ddmanager && !al.dropBehaviour) {
                K.ui.ddmanager.prepareOffsets(ai, aj)
            }
        }
    });
    K.ui.plugin.add("draggable", "snap", {
        start: function(ah, ai, ag) {
            var aj = ag.options;
            ag.snapElements = [];
            K(aj.snap.constructor !== String ? (aj.snap.items || ":data(ui-draggable)") : aj.snap).each(function() {
                var al = K(this),
                    ak = al.offset();
                if (this !== ag.element[0]) {
                    ag.snapElements.push({
                        item: this,
                        width: al.outerWidth(),
                        height: al.outerHeight(),
                        top: ak.top,
                        left: ak.left
                    })
                }
            })
        },
        drag: function(at, ap, aj) {
            var ag, ay, al, am, ar, ao, an, az, au, ak, aq = aj.options,
                ax = aq.snapTolerance,
                aw = ap.offset.left,
                av = aw + aj.helperProportions.width,
                ai = ap.offset.top,
                ah = ai + aj.helperProportions.height;
            for (au = aj.snapElements.length - 1; au >= 0; au--) {
                ar = aj.snapElements[au].left - aj.margins.left;
                ao = ar + aj.snapElements[au].width;
                an = aj.snapElements[au].top - aj.margins.top;
                az = an + aj.snapElements[au].height;
                if (av < ar - ax || aw > ao + ax || ah < an - ax || ai > az + ax || !K.contains(aj.snapElements[au].item.ownerDocument, aj.snapElements[au].item)) {
                    if (aj.snapElements[au].snapping) {
                        (aj.options.snap.release && aj.options.snap.release.call(aj.element, at, K.extend(aj._uiHash(), {
                            snapItem: aj.snapElements[au].item
                        })))
                    }
                    aj.snapElements[au].snapping = false;
                    continue
                }
                if (aq.snapMode !== "inner") {
                    ag = Math.abs(an - ah) <= ax;
                    ay = Math.abs(az - ai) <= ax;
                    al = Math.abs(ar - av) <= ax;
                    am = Math.abs(ao - aw) <= ax;
                    if (ag) {
                        ap.position.top = aj._convertPositionTo("relative", {
                            top: an - aj.helperProportions.height,
                            left: 0
                        }).top
                    }
                    if (ay) {
                        ap.position.top = aj._convertPositionTo("relative", {
                            top: az,
                            left: 0
                        }).top
                    }
                    if (al) {
                        ap.position.left = aj._convertPositionTo("relative", {
                            top: 0,
                            left: ar - aj.helperProportions.width
                        }).left
                    }
                    if (am) {
                        ap.position.left = aj._convertPositionTo("relative", {
                            top: 0,
                            left: ao
                        }).left
                    }
                }
                ak = (ag || ay || al || am);
                if (aq.snapMode !== "outer") {
                    ag = Math.abs(an - ai) <= ax;
                    ay = Math.abs(az - ah) <= ax;
                    al = Math.abs(ar - aw) <= ax;
                    am = Math.abs(ao - av) <= ax;
                    if (ag) {
                        ap.position.top = aj._convertPositionTo("relative", {
                            top: an,
                            left: 0
                        }).top
                    }
                    if (ay) {
                        ap.position.top = aj._convertPositionTo("relative", {
                            top: az - aj.helperProportions.height,
                            left: 0
                        }).top
                    }
                    if (al) {
                        ap.position.left = aj._convertPositionTo("relative", {
                            top: 0,
                            left: ar
                        }).left
                    }
                    if (am) {
                        ap.position.left = aj._convertPositionTo("relative", {
                            top: 0,
                            left: ao - aj.helperProportions.width
                        }).left
                    }
                }
                if (!aj.snapElements[au].snapping && (ag || ay || al || am || ak)) {
                    (aj.options.snap.snap && aj.options.snap.snap.call(aj.element, at, K.extend(aj._uiHash(), {
                        snapItem: aj.snapElements[au].item
                    })))
                }
                aj.snapElements[au].snapping = (ag || ay || al || am || ak)
            }
        }
    });
    K.ui.plugin.add("draggable", "stack", {
        start: function(ai, aj, ag) {
            var ah, al = ag.options,
                ak = K.makeArray(K(al.stack)).sort(function(an, am) {
                    return (parseInt(K(an).css("zIndex"), 10) || 0) - (parseInt(K(am).css("zIndex"), 10) || 0)
                });
            if (!ak.length) {
                return
            }
            ah = parseInt(K(ak[0]).css("zIndex"), 10) || 0;
            K(ak).each(function(am) {
                K(this).css("zIndex", ah + am)
            });
            this.css("zIndex", (ah + ak.length))
        }
    });
    K.ui.plugin.add("draggable", "zIndex", {
        start: function(ai, aj, ag) {
            var ah = K(aj.helper),
                ak = ag.options;
            if (ah.css("zIndex")) {
                ak._zIndex = ah.css("zIndex")
            }
            ah.css("zIndex", ak.zIndex)
        },
        stop: function(ah, ai, ag) {
            var aj = ag.options;
            if (aj._zIndex) {
                K(ai.helper).css("zIndex", aj._zIndex)
            }
        }
    });
    var ae = K.ui.draggable;
    /*!
     * jQuery UI Droppable 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    K.widget("ui.droppable", {
        version: "1.12.1",
        widgetEventPrefix: "drop",
        options: {
            accept: "*",
            addClasses: true,
            greedy: false,
            scope: "default",
            tolerance: "intersect",
            activate: null,
            deactivate: null,
            drop: null,
            out: null,
            over: null
        },
        _create: function() {
            var ah, ai = this.options,
                ag = ai.accept;
            this.isover = false;
            this.isout = true;
            this.accept = K.isFunction(ag) ? ag : function(aj) {
                return aj.is(ag)
            };
            this.proportions = function() {
                if (arguments.length) {
                    ah = arguments[0]
                } else {
                    return ah ? ah : ah = {
                        width: this.element[0].offsetWidth,
                        height: this.element[0].offsetHeight
                    }
                }
            };
            this._addToManager(ai.scope);
            ai.addClasses && this._addClass("ui-droppable")
        },
        _addToManager: function(ag) {
            K.ui.ddmanager.droppables[ag] = K.ui.ddmanager.droppables[ag] || [];
            K.ui.ddmanager.droppables[ag].push(this)
        },
        _splice: function(ag) {
            var ah = 0;
            for (; ah < ag.length; ah++) {
                if (ag[ah] === this) {
                    ag.splice(ah, 1)
                }
            }
        },
        _destroy: function() {
            var ag = K.ui.ddmanager.droppables[this.options.scope];
            this._splice(ag)
        },
        _setOption: function(ah, ai) {
            if (ah === "accept") {
                this.accept = K.isFunction(ai) ? ai : function(aj) {
                    return aj.is(ai)
                }
            } else {
                if (ah === "scope") {
                    var ag = K.ui.ddmanager.droppables[this.options.scope];
                    this._splice(ag);
                    this._addToManager(ai)
                }
            }
            this._super(ah, ai)
        },
        _activate: function(ah) {
            var ag = K.ui.ddmanager.current;
            this._addActiveClass();
            if (ag) {
                this._trigger("activate", ah, this.ui(ag))
            }
        },
        _deactivate: function(ah) {
            var ag = K.ui.ddmanager.current;
            this._removeActiveClass();
            if (ag) {
                this._trigger("deactivate", ah, this.ui(ag))
            }
        },
        _over: function(ah) {
            var ag = K.ui.ddmanager.current;
            if (!ag || (ag.currentItem || ag.element)[0] === this.element[0]) {
                return
            }
            if (this.accept.call(this.element[0], (ag.currentItem || ag.element))) {
                this._addHoverClass();
                this._trigger("over", ah, this.ui(ag))
            }
        },
        _out: function(ah) {
            var ag = K.ui.ddmanager.current;
            if (!ag || (ag.currentItem || ag.element)[0] === this.element[0]) {
                return
            }
            if (this.accept.call(this.element[0], (ag.currentItem || ag.element))) {
                this._removeHoverClass();
                this._trigger("out", ah, this.ui(ag))
            }
        },
        _drop: function(ah, ai) {
            var ag = ai || K.ui.ddmanager.current,
                aj = false;
            if (!ag || (ag.currentItem || ag.element)[0] === this.element[0]) {
                return false
            }
            this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function() {
                var ak = K(this).droppable("instance");
                if (ak.options.greedy && !ak.options.disabled && ak.options.scope === ag.options.scope && ak.accept.call(ak.element[0], (ag.currentItem || ag.element)) && I(ag, K.extend(ak, {
                        offset: ak.element.offset()
                    }), ak.options.tolerance, ah)) {
                    aj = true;
                    return false
                }
            });
            if (aj) {
                return false
            }
            if (this.accept.call(this.element[0], (ag.currentItem || ag.element))) {
                this._removeActiveClass();
                this._removeHoverClass();
                this._trigger("drop", ah, this.ui(ag));
                return this.element
            }
            return false
        },
        ui: function(ag) {
            return {
                draggable: (ag.currentItem || ag.element),
                helper: ag.helper,
                position: ag.position,
                offset: ag.positionAbs
            }
        },
        _addHoverClass: function() {
            this._addClass("ui-droppable-hover")
        },
        _removeHoverClass: function() {
            this._removeClass("ui-droppable-hover")
        },
        _addActiveClass: function() {
            this._addClass("ui-droppable-active")
        },
        _removeActiveClass: function() {
            this._removeClass("ui-droppable-active")
        }
    });
    var I = K.ui.intersect = (function() {
        function ag(ai, ah, aj) {
            return (ai >= ah) && (ai < (ah + aj))
        }
        return function(at, am, aq, ai) {
            if (!am.offset) {
                return false
            }
            var ak = (at.positionAbs || at.position.absolute).left + at.margins.left,
                ap = (at.positionAbs || at.position.absolute).top + at.margins.top,
                aj = ak + at.helperProportions.width,
                ao = ap + at.helperProportions.height,
                al = am.offset.left,
                ar = am.offset.top,
                ah = al + am.proportions().width,
                an = ar + am.proportions().height;
            switch (aq) {
                case "fit":
                    return (al <= ak && aj <= ah && ar <= ap && ao <= an);
                case "intersect":
                    return (al < ak + (at.helperProportions.width / 2) && aj - (at.helperProportions.width / 2) < ah && ar < ap + (at.helperProportions.height / 2) && ao - (at.helperProportions.height / 2) < an);
                case "pointer":
                    return ag(ai.pageY, ar, am.proportions().height) && ag(ai.pageX, al, am.proportions().width);
                case "touch":
                    return ((ap >= ar && ap <= an) || (ao >= ar && ao <= an) || (ap < ar && ao > an)) && ((ak >= al && ak <= ah) || (aj >= al && aj <= ah) || (ak < al && aj > ah));
                default:
                    return false
            }
        }
    })();
    K.ui.ddmanager = {
        current: null,
        droppables: {
            "default": []
        },
        prepareOffsets: function(aj, al) {
            var ai, ah, ag = K.ui.ddmanager.droppables[aj.options.scope] || [],
                ak = al ? al.type : null,
                am = (aj.currentItem || aj.element).find(":data(ui-droppable)").addBack();
            droppablesLoop: for (ai = 0; ai < ag.length; ai++) {
                if (ag[ai].options.disabled || (aj && !ag[ai].accept.call(ag[ai].element[0], (aj.currentItem || aj.element)))) {
                    continue
                }
                for (ah = 0; ah < am.length; ah++) {
                    if (am[ah] === ag[ai].element[0]) {
                        ag[ai].proportions().height = 0;
                        continue droppablesLoop
                    }
                }
                ag[ai].visible = ag[ai].element.css("display") !== "none";
                if (!ag[ai].visible) {
                    continue
                }
                if (ak === "mousedown") {
                    ag[ai]._activate.call(ag[ai], al)
                }
                ag[ai].offset = ag[ai].element.offset();
                ag[ai].proportions({
                    width: ag[ai].element[0].offsetWidth,
                    height: ag[ai].element[0].offsetHeight
                })
            }
        },
        drop: function(ag, ah) {
            var ai = false;
            K.each((K.ui.ddmanager.droppables[ag.options.scope] || []).slice(), function() {
                if (!this.options) {
                    return
                }
                if (!this.options.disabled && this.visible && I(ag, this, this.options.tolerance, ah)) {
                    ai = this._drop.call(this, ah) || ai
                }
                if (!this.options.disabled && this.visible && this.accept.call(this.element[0], (ag.currentItem || ag.element))) {
                    this.isout = true;
                    this.isover = false;
                    this._deactivate.call(this, ah)
                }
            });
            return ai
        },
        dragStart: function(ag, ah) {
            ag.element.parentsUntil("body").on("scroll.droppable", function() {
                if (!ag.options.refreshPositions) {
                    K.ui.ddmanager.prepareOffsets(ag, ah)
                }
            })
        },
        drag: function(ag, ah) {
            if (ag.options.refreshPositions) {
                K.ui.ddmanager.prepareOffsets(ag, ah)
            }
            K.each(K.ui.ddmanager.droppables[ag.options.scope] || [], function() {
                if (this.options.disabled || this.greedyChild || !this.visible) {
                    return
                }
                var al, aj, ai, ak = I(ag, this, this.options.tolerance, ah),
                    am = !ak && this.isover ? "isout" : (ak && !this.isover ? "isover" : null);
                if (!am) {
                    return
                }
                if (this.options.greedy) {
                    aj = this.options.scope;
                    ai = this.element.parents(":data(ui-droppable)").filter(function() {
                        return K(this).droppable("instance").options.scope === aj
                    });
                    if (ai.length) {
                        al = K(ai[0]).droppable("instance");
                        al.greedyChild = (am === "isover")
                    }
                }
                if (al && am === "isover") {
                    al.isover = false;
                    al.isout = true;
                    al._out.call(al, ah)
                }
                this[am] = true;
                this[am === "isout" ? "isover" : "isout"] = false;
                this[am === "isover" ? "_over" : "_out"].call(this, ah);
                if (al && am === "isout") {
                    al.isout = false;
                    al.isover = true;
                    al._over.call(al, ah)
                }
            })
        },
        dragStop: function(ag, ah) {
            ag.element.parentsUntil("body").off("scroll.droppable");
            if (!ag.options.refreshPositions) {
                K.ui.ddmanager.prepareOffsets(ag, ah)
            }
        }
    };
    if (K.uiBackCompat !== false) {
        K.widget("ui.droppable", K.ui.droppable, {
            options: {
                hoverClass: false,
                activeClass: false
            },
            _addActiveClass: function() {
                this._super();
                if (this.options.activeClass) {
                    this.element.addClass(this.options.activeClass)
                }
            },
            _removeActiveClass: function() {
                this._super();
                if (this.options.activeClass) {
                    this.element.removeClass(this.options.activeClass)
                }
            },
            _addHoverClass: function() {
                this._super();
                if (this.options.hoverClass) {
                    this.element.addClass(this.options.hoverClass)
                }
            },
            _removeHoverClass: function() {
                this._super();
                if (this.options.hoverClass) {
                    this.element.removeClass(this.options.hoverClass)
                }
            }
        })
    }
    var j = K.ui.droppable;
    /*!
     * jQuery UI Resizable 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    K.widget("ui.resizable", K.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "resize",
        options: {
            alsoResize: false,
            animate: false,
            animateDuration: "slow",
            animateEasing: "swing",
            aspectRatio: false,
            autoHide: false,
            classes: {
                "ui-resizable-se": "ui-icon ui-icon-gripsmall-diagonal-se"
            },
            containment: false,
            ghost: false,
            grid: false,
            handles: "e,s,se",
            helper: false,
            maxHeight: null,
            maxWidth: null,
            minHeight: 10,
            minWidth: 10,
            zIndex: 90,
            resize: null,
            start: null,
            stop: null
        },
        _num: function(ag) {
            return parseFloat(ag) || 0
        },
        _isNumber: function(ag) {
            return !isNaN(parseFloat(ag))
        },
        _hasScroll: function(aj, ah) {
            if (K(aj).css("overflow") === "hidden") {
                return false
            }
            var ag = (ah && ah === "left") ? "scrollLeft" : "scrollTop",
                ai = false;
            if (aj[ag] > 0) {
                return true
            }
            aj[ag] = 1;
            ai = (aj[ag] > 0);
            aj[ag] = 0;
            return ai
        },
        _create: function() {
            var ah, ai = this.options,
                ag = this;
            this._addClass("ui-resizable");
            K.extend(this, {
                _aspectRatio: !!(ai.aspectRatio),
                aspectRatio: ai.aspectRatio,
                originalElement: this.element,
                _proportionallyResizeElements: [],
                _helper: ai.helper || ai.ghost || ai.animate ? ai.helper || "ui-resizable-helper" : null
            });
            if (this.element[0].nodeName.match(/^(canvas|textarea|input|select|button|img)$/i)) {
                this.element.wrap(K("<div class='ui-wrapper' style='overflow: hidden;'></div>").css({
                    position: this.element.css("position"),
                    width: this.element.outerWidth(),
                    height: this.element.outerHeight(),
                    top: this.element.css("top"),
                    left: this.element.css("left")
                }));
                this.element = this.element.parent().data("ui-resizable", this.element.resizable("instance"));
                this.elementIsWrapper = true;
                ah = {
                    marginTop: this.originalElement.css("marginTop"),
                    marginRight: this.originalElement.css("marginRight"),
                    marginBottom: this.originalElement.css("marginBottom"),
                    marginLeft: this.originalElement.css("marginLeft")
                };
                this.element.css(ah);
                this.originalElement.css("margin", 0);
                this.originalResizeStyle = this.originalElement.css("resize");
                this.originalElement.css("resize", "none");
                this._proportionallyResizeElements.push(this.originalElement.css({
                    position: "static",
                    zoom: 1,
                    display: "block"
                }));
                this.originalElement.css(ah);
                this._proportionallyResize()
            }
            this._setupHandles();
            if (ai.autoHide) {
                K(this.element).on("mouseenter", function() {
                    if (ai.disabled) {
                        return
                    }
                    ag._removeClass("ui-resizable-autohide");
                    ag._handles.show()
                }).on("mouseleave", function() {
                    if (ai.disabled) {
                        return
                    }
                    if (!ag.resizing) {
                        ag._addClass("ui-resizable-autohide");
                        ag._handles.hide()
                    }
                })
            }
            this._mouseInit()
        },
        _destroy: function() {
            this._mouseDestroy();
            var ah, ag = function(ai) {
                K(ai).removeData("resizable").removeData("ui-resizable").off(".resizable").find(".ui-resizable-handle").remove()
            };
            if (this.elementIsWrapper) {
                ag(this.element);
                ah = this.element;
                this.originalElement.css({
                    position: ah.css("position"),
                    width: ah.outerWidth(),
                    height: ah.outerHeight(),
                    top: ah.css("top"),
                    left: ah.css("left")
                }).insertAfter(ah);
                ah.remove()
            }
            this.originalElement.css("resize", this.originalResizeStyle);
            ag(this.originalElement);
            return this
        },
        _setOption: function(ag, ah) {
            this._super(ag, ah);
            switch (ag) {
                case "handles":
                    this._removeHandles();
                    this._setupHandles();
                    break;
                default:
                    break
            }
        },
        _setupHandles: function() {
            var al = this.options,
                ak, ah, am, ag, ai, aj = this;
            this.handles = al.handles || (!K(".ui-resizable-handle", this.element).length ? "e,s,se" : {
                n: ".ui-resizable-n",
                e: ".ui-resizable-e",
                s: ".ui-resizable-s",
                w: ".ui-resizable-w",
                se: ".ui-resizable-se",
                sw: ".ui-resizable-sw",
                ne: ".ui-resizable-ne",
                nw: ".ui-resizable-nw"
            });
            this._handles = K();
            if (this.handles.constructor === String) {
                if (this.handles === "all") {
                    this.handles = "n,e,s,w,se,sw,ne,nw"
                }
                am = this.handles.split(",");
                this.handles = {};
                for (ah = 0; ah < am.length; ah++) {
                    ak = K.trim(am[ah]);
                    ag = "ui-resizable-" + ak;
                    ai = K("<div>");
                    this._addClass(ai, "ui-resizable-handle " + ag);
                    ai.css({
                        zIndex: al.zIndex
                    });
                    this.handles[ak] = ".ui-resizable-" + ak;
                    this.element.append(ai)
                }
            }
            this._renderAxis = function(ar) {
                var ao, ap, an, aq;
                ar = ar || this.element;
                for (ao in this.handles) {
                    if (this.handles[ao].constructor === String) {
                        this.handles[ao] = this.element.children(this.handles[ao]).first().show()
                    } else {
                        if (this.handles[ao].jquery || this.handles[ao].nodeType) {
                            this.handles[ao] = K(this.handles[ao]);
                            this._on(this.handles[ao], {
                                mousedown: aj._mouseDown
                            })
                        }
                    }
                    if (this.elementIsWrapper && this.originalElement[0].nodeName.match(/^(textarea|input|select|button)$/i)) {
                        ap = K(this.handles[ao], this.element);
                        aq = /sw|ne|nw|se|n|s/.test(ao) ? ap.outerHeight() : ap.outerWidth();
                        an = ["padding", /ne|nw|n/.test(ao) ? "Top" : /se|sw|s/.test(ao) ? "Bottom" : /^e$/.test(ao) ? "Right" : "Left"].join("");
                        ar.css(an, aq);
                        this._proportionallyResize()
                    }
                    this._handles = this._handles.add(this.handles[ao])
                }
            };
            this._renderAxis(this.element);
            this._handles = this._handles.add(this.element.find(".ui-resizable-handle"));
            this._handles.disableSelection();
            this._handles.on("mouseover", function() {
                if (!aj.resizing) {
                    if (this.className) {
                        ai = this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)
                    }
                    aj.axis = ai && ai[1] ? ai[1] : "se"
                }
            });
            if (al.autoHide) {
                this._handles.hide();
                this._addClass("ui-resizable-autohide")
            }
        },
        _removeHandles: function() {
            this._handles.remove()
        },
        _mouseCapture: function(ai) {
            var ah, aj, ag = false;
            for (ah in this.handles) {
                aj = K(this.handles[ah])[0];
                if (aj === ai.target || K.contains(aj, ai.target)) {
                    ag = true
                }
            }
            return !this.options.disabled && ag
        },
        _mouseStart: function(ah) {
            var al, ai, ak, aj = this.options,
                ag = this.element;
            this.resizing = true;
            this._renderProxy();
            al = this._num(this.helper.css("left"));
            ai = this._num(this.helper.css("top"));
            if (aj.containment) {
                al += K(aj.containment).scrollLeft() || 0;
                ai += K(aj.containment).scrollTop() || 0
            }
            this.offset = this.helper.offset();
            this.position = {
                left: al,
                top: ai
            };
            this.size = this._helper ? {
                width: this.helper.width(),
                height: this.helper.height()
            } : {
                width: ag.width(),
                height: ag.height()
            };
            this.originalSize = this._helper ? {
                width: ag.outerWidth(),
                height: ag.outerHeight()
            } : {
                width: ag.width(),
                height: ag.height()
            };
            this.sizeDiff = {
                width: ag.outerWidth() - ag.width(),
                height: ag.outerHeight() - ag.height()
            };
            this.originalPosition = {
                left: al,
                top: ai
            };
            this.originalMousePosition = {
                left: ah.pageX,
                top: ah.pageY
            };
            this.aspectRatio = (typeof aj.aspectRatio === "number") ? aj.aspectRatio : ((this.originalSize.width / this.originalSize.height) || 1);
            ak = K(".ui-resizable-" + this.axis).css("cursor");
            K("body").css("cursor", ak === "auto" ? this.axis + "-resize" : ak);
            this._addClass("ui-resizable-resizing");
            this._propagate("start", ah);
            return true
        },
        _mouseDrag: function(al) {
            var am, ak, an = this.originalMousePosition,
                ah = this.axis,
                ai = (al.pageX - an.left) || 0,
                ag = (al.pageY - an.top) || 0,
                aj = this._change[ah];
            this._updatePrevProperties();
            if (!aj) {
                return false
            }
            am = aj.apply(this, [al, ai, ag]);
            this._updateVirtualBoundaries(al.shiftKey);
            if (this._aspectRatio || al.shiftKey) {
                am = this._updateRatio(am, al)
            }
            am = this._respectSize(am, al);
            this._updateCache(am);
            this._propagate("resize", al);
            ak = this._applyChanges();
            if (!this._helper && this._proportionallyResizeElements.length) {
                this._proportionallyResize()
            }
            if (!K.isEmptyObject(ak)) {
                this._updatePrevProperties();
                this._trigger("resize", al, this.ui());
                this._applyChanges()
            }
            return false
        },
        _mouseStop: function(aj) {
            this.resizing = false;
            var ai, ag, ah, am, ap, al, ao, ak = this.options,
                an = this;
            if (this._helper) {
                ai = this._proportionallyResizeElements;
                ag = ai.length && (/textarea/i).test(ai[0].nodeName);
                ah = ag && this._hasScroll(ai[0], "left") ? 0 : an.sizeDiff.height;
                am = ag ? 0 : an.sizeDiff.width;
                ap = {
                    width: (an.helper.width() - am),
                    height: (an.helper.height() - ah)
                };
                al = (parseFloat(an.element.css("left")) + (an.position.left - an.originalPosition.left)) || null;
                ao = (parseFloat(an.element.css("top")) + (an.position.top - an.originalPosition.top)) || null;
                if (!ak.animate) {
                    this.element.css(K.extend(ap, {
                        top: ao,
                        left: al
                    }))
                }
                an.helper.height(an.size.height);
                an.helper.width(an.size.width);
                if (this._helper && !ak.animate) {
                    this._proportionallyResize()
                }
            }
            K("body").css("cursor", "auto");
            this._removeClass("ui-resizable-resizing");
            this._propagate("stop", aj);
            if (this._helper) {
                this.helper.remove()
            }
            return false
        },
        _updatePrevProperties: function() {
            this.prevPosition = {
                top: this.position.top,
                left: this.position.left
            };
            this.prevSize = {
                width: this.size.width,
                height: this.size.height
            }
        },
        _applyChanges: function() {
            var ag = {};
            if (this.position.top !== this.prevPosition.top) {
                ag.top = this.position.top + "px"
            }
            if (this.position.left !== this.prevPosition.left) {
                ag.left = this.position.left + "px"
            }
            if (this.size.width !== this.prevSize.width) {
                ag.width = this.size.width + "px"
            }
            if (this.size.height !== this.prevSize.height) {
                ag.height = this.size.height + "px"
            }
            this.helper.css(ag);
            return ag
        },
        _updateVirtualBoundaries: function(ai) {
            var ak, aj, ah, am, ag, al = this.options;
            ag = {
                minWidth: this._isNumber(al.minWidth) ? al.minWidth : 0,
                maxWidth: this._isNumber(al.maxWidth) ? al.maxWidth : Infinity,
                minHeight: this._isNumber(al.minHeight) ? al.minHeight : 0,
                maxHeight: this._isNumber(al.maxHeight) ? al.maxHeight : Infinity
            };
            if (this._aspectRatio || ai) {
                ak = ag.minHeight * this.aspectRatio;
                ah = ag.minWidth / this.aspectRatio;
                aj = ag.maxHeight * this.aspectRatio;
                am = ag.maxWidth / this.aspectRatio;
                if (ak > ag.minWidth) {
                    ag.minWidth = ak
                }
                if (ah > ag.minHeight) {
                    ag.minHeight = ah
                }
                if (aj < ag.maxWidth) {
                    ag.maxWidth = aj
                }
                if (am < ag.maxHeight) {
                    ag.maxHeight = am
                }
            }
            this._vBoundaries = ag
        },
        _updateCache: function(ag) {
            this.offset = this.helper.offset();
            if (this._isNumber(ag.left)) {
                this.position.left = ag.left
            }
            if (this._isNumber(ag.top)) {
                this.position.top = ag.top
            }
            if (this._isNumber(ag.height)) {
                this.size.height = ag.height
            }
            if (this._isNumber(ag.width)) {
                this.size.width = ag.width
            }
        },
        _updateRatio: function(ai) {
            var aj = this.position,
                ah = this.size,
                ag = this.axis;
            if (this._isNumber(ai.height)) {
                ai.width = (ai.height * this.aspectRatio)
            } else {
                if (this._isNumber(ai.width)) {
                    ai.height = (ai.width / this.aspectRatio)
                }
            }
            if (ag === "sw") {
                ai.left = aj.left + (ah.width - ai.width);
                ai.top = null
            }
            if (ag === "nw") {
                ai.top = aj.top + (ah.height - ai.height);
                ai.left = aj.left + (ah.width - ai.width)
            }
            return ai
        },
        _respectSize: function(al) {
            var ai = this._vBoundaries,
                ao = this.axis,
                aq = this._isNumber(al.width) && ai.maxWidth && (ai.maxWidth < al.width),
                am = this._isNumber(al.height) && ai.maxHeight && (ai.maxHeight < al.height),
                aj = this._isNumber(al.width) && ai.minWidth && (ai.minWidth > al.width),
                ap = this._isNumber(al.height) && ai.minHeight && (ai.minHeight > al.height),
                ah = this.originalPosition.left + this.originalSize.width,
                an = this.originalPosition.top + this.originalSize.height,
                ak = /sw|nw|w/.test(ao),
                ag = /nw|ne|n/.test(ao);
            if (aj) {
                al.width = ai.minWidth
            }
            if (ap) {
                al.height = ai.minHeight
            }
            if (aq) {
                al.width = ai.maxWidth
            }
            if (am) {
                al.height = ai.maxHeight
            }
            if (aj && ak) {
                al.left = ah - ai.minWidth
            }
            if (aq && ak) {
                al.left = ah - ai.maxWidth
            }
            if (ap && ag) {
                al.top = an - ai.minHeight
            }
            if (am && ag) {
                al.top = an - ai.maxHeight
            }
            if (!al.width && !al.height && !al.left && al.top) {
                al.top = null
            } else {
                if (!al.width && !al.height && !al.top && al.left) {
                    al.left = null
                }
            }
            return al
        },
        _getPaddingPlusBorderDimensions: function(ai) {
            var ah = 0,
                aj = [],
                ak = [ai.css("borderTopWidth"), ai.css("borderRightWidth"), ai.css("borderBottomWidth"), ai.css("borderLeftWidth")],
                ag = [ai.css("paddingTop"), ai.css("paddingRight"), ai.css("paddingBottom"), ai.css("paddingLeft")];
            for (; ah < 4; ah++) {
                aj[ah] = (parseFloat(ak[ah]) || 0);
                aj[ah] += (parseFloat(ag[ah]) || 0)
            }
            return {
                height: aj[0] + aj[2],
                width: aj[1] + aj[3]
            }
        },
        _proportionallyResize: function() {
            if (!this._proportionallyResizeElements.length) {
                return
            }
            var ai, ah = 0,
                ag = this.helper || this.element;
            for (; ah < this._proportionallyResizeElements.length; ah++) {
                ai = this._proportionallyResizeElements[ah];
                if (!this.outerDimensions) {
                    this.outerDimensions = this._getPaddingPlusBorderDimensions(ai)
                }
                ai.css({
                    height: (ag.height() - this.outerDimensions.height) || 0,
                    width: (ag.width() - this.outerDimensions.width) || 0
                })
            }
        },
        _renderProxy: function() {
            var ag = this.element,
                ah = this.options;
            this.elementOffset = ag.offset();
            if (this._helper) {
                this.helper = this.helper || K("<div style='overflow:hidden;'></div>");
                this._addClass(this.helper, this._helper);
                this.helper.css({
                    width: this.element.outerWidth(),
                    height: this.element.outerHeight(),
                    position: "absolute",
                    left: this.elementOffset.left + "px",
                    top: this.elementOffset.top + "px",
                    zIndex: ++ah.zIndex
                });
                this.helper.appendTo("body").disableSelection()
            } else {
                this.helper = this.element
            }
        },
        _change: {
            e: function(ah, ag) {
                return {
                    width: this.originalSize.width + ag
                }
            },
            w: function(ai, ag) {
                var ah = this.originalSize,
                    aj = this.originalPosition;
                return {
                    left: aj.left + ag,
                    width: ah.width - ag
                }
            },
            n: function(aj, ah, ag) {
                var ai = this.originalSize,
                    ak = this.originalPosition;
                return {
                    top: ak.top + ag,
                    height: ai.height - ag
                }
            },
            s: function(ai, ah, ag) {
                return {
                    height: this.originalSize.height + ag
                }
            },
            se: function(ai, ah, ag) {
                return K.extend(this._change.s.apply(this, arguments), this._change.e.apply(this, [ai, ah, ag]))
            },
            sw: function(ai, ah, ag) {
                return K.extend(this._change.s.apply(this, arguments), this._change.w.apply(this, [ai, ah, ag]))
            },
            ne: function(ai, ah, ag) {
                return K.extend(this._change.n.apply(this, arguments), this._change.e.apply(this, [ai, ah, ag]))
            },
            nw: function(ai, ah, ag) {
                return K.extend(this._change.n.apply(this, arguments), this._change.w.apply(this, [ai, ah, ag]))
            }
        },
        _propagate: function(ah, ag) {
            K.ui.plugin.call(this, ah, [ag, this.ui()]);
            (ah !== "resize" && this._trigger(ah, ag, this.ui()))
        },
        plugins: {},
        ui: function() {
            return {
                originalElement: this.originalElement,
                element: this.element,
                helper: this.helper,
                position: this.position,
                size: this.size,
                originalSize: this.originalSize,
                originalPosition: this.originalPosition
            }
        }
    });
    K.ui.plugin.add("resizable", "animate", {
        stop: function(aj) {
            var ao = K(this).resizable("instance"),
                al = ao.options,
                ai = ao._proportionallyResizeElements,
                ag = ai.length && (/textarea/i).test(ai[0].nodeName),
                ah = ag && ao._hasScroll(ai[0], "left") ? 0 : ao.sizeDiff.height,
                an = ag ? 0 : ao.sizeDiff.width,
                ak = {
                    width: (ao.size.width - an),
                    height: (ao.size.height - ah)
                },
                am = (parseFloat(ao.element.css("left")) + (ao.position.left - ao.originalPosition.left)) || null,
                ap = (parseFloat(ao.element.css("top")) + (ao.position.top - ao.originalPosition.top)) || null;
            ao.element.animate(K.extend(ak, ap && am ? {
                top: ap,
                left: am
            } : {}), {
                duration: al.animateDuration,
                easing: al.animateEasing,
                step: function() {
                    var aq = {
                        width: parseFloat(ao.element.css("width")),
                        height: parseFloat(ao.element.css("height")),
                        top: parseFloat(ao.element.css("top")),
                        left: parseFloat(ao.element.css("left"))
                    };
                    if (ai && ai.length) {
                        K(ai[0]).css({
                            width: aq.width,
                            height: aq.height
                        })
                    }
                    ao._updateCache(aq);
                    ao._propagate("resize", aj)
                }
            })
        }
    });
    K.ui.plugin.add("resizable", "containment", {
        start: function() {
            var ao, ai, aq, ag, an, aj, ar, ap = K(this).resizable("instance"),
                am = ap.options,
                al = ap.element,
                ah = am.containment,
                ak = (ah instanceof K) ? ah.get(0) : (/parent/.test(ah)) ? al.parent().get(0) : ah;
            if (!ak) {
                return
            }
            ap.containerElement = K(ak);
            if (/document/.test(ah) || ah === document) {
                ap.containerOffset = {
                    left: 0,
                    top: 0
                };
                ap.containerPosition = {
                    left: 0,
                    top: 0
                };
                ap.parentData = {
                    element: K(document),
                    left: 0,
                    top: 0,
                    width: K(document).width(),
                    height: K(document).height() || document.body.parentNode.scrollHeight
                }
            } else {
                ao = K(ak);
                ai = [];
                K(["Top", "Right", "Left", "Bottom"]).each(function(au, at) {
                    ai[au] = ap._num(ao.css("padding" + at))
                });
                ap.containerOffset = ao.offset();
                ap.containerPosition = ao.position();
                ap.containerSize = {
                    height: (ao.innerHeight() - ai[3]),
                    width: (ao.innerWidth() - ai[1])
                };
                aq = ap.containerOffset;
                ag = ap.containerSize.height;
                an = ap.containerSize.width;
                aj = (ap._hasScroll(ak, "left") ? ak.scrollWidth : an);
                ar = (ap._hasScroll(ak) ? ak.scrollHeight : ag);
                ap.parentData = {
                    element: ak,
                    left: aq.left,
                    top: aq.top,
                    width: aj,
                    height: ar
                }
            }
        },
        resize: function(ah) {
            var an, at, am, ak, ao = K(this).resizable("instance"),
                aj = ao.options,
                aq = ao.containerOffset,
                ap = ao.position,
                ar = ao._aspectRatio || ah.shiftKey,
                ag = {
                    top: 0,
                    left: 0
                },
                ai = ao.containerElement,
                al = true;
            if (ai[0] !== document && (/static/).test(ai.css("position"))) {
                ag = aq
            }
            if (ap.left < (ao._helper ? aq.left : 0)) {
                ao.size.width = ao.size.width + (ao._helper ? (ao.position.left - aq.left) : (ao.position.left - ag.left));
                if (ar) {
                    ao.size.height = ao.size.width / ao.aspectRatio;
                    al = false
                }
                ao.position.left = aj.helper ? aq.left : 0
            }
            if (ap.top < (ao._helper ? aq.top : 0)) {
                ao.size.height = ao.size.height + (ao._helper ? (ao.position.top - aq.top) : ao.position.top);
                if (ar) {
                    ao.size.width = ao.size.height * ao.aspectRatio;
                    al = false
                }
                ao.position.top = ao._helper ? aq.top : 0
            }
            am = ao.containerElement.get(0) === ao.element.parent().get(0);
            ak = /relative|absolute/.test(ao.containerElement.css("position"));
            if (am && ak) {
                ao.offset.left = ao.parentData.left + ao.position.left;
                ao.offset.top = ao.parentData.top + ao.position.top
            } else {
                ao.offset.left = ao.element.offset().left;
                ao.offset.top = ao.element.offset().top
            }
            an = Math.abs(ao.sizeDiff.width + (ao._helper ? ao.offset.left - ag.left : (ao.offset.left - aq.left)));
            at = Math.abs(ao.sizeDiff.height + (ao._helper ? ao.offset.top - ag.top : (ao.offset.top - aq.top)));
            if (an + ao.size.width >= ao.parentData.width) {
                ao.size.width = ao.parentData.width - an;
                if (ar) {
                    ao.size.height = ao.size.width / ao.aspectRatio;
                    al = false
                }
            }
            if (at + ao.size.height >= ao.parentData.height) {
                ao.size.height = ao.parentData.height - at;
                if (ar) {
                    ao.size.width = ao.size.height * ao.aspectRatio;
                    al = false
                }
            }
            if (!al) {
                ao.position.left = ao.prevPosition.left;
                ao.position.top = ao.prevPosition.top;
                ao.size.width = ao.prevSize.width;
                ao.size.height = ao.prevSize.height
            }
        },
        stop: function() {
            var al = K(this).resizable("instance"),
                ah = al.options,
                am = al.containerOffset,
                ag = al.containerPosition,
                ai = al.containerElement,
                aj = K(al.helper),
                ao = aj.offset(),
                an = aj.outerWidth() - al.sizeDiff.width,
                ak = aj.outerHeight() - al.sizeDiff.height;
            if (al._helper && !ah.animate && (/relative/).test(ai.css("position"))) {
                K(this).css({
                    left: ao.left - ag.left - am.left,
                    width: an,
                    height: ak
                })
            }
            if (al._helper && !ah.animate && (/static/).test(ai.css("position"))) {
                K(this).css({
                    left: ao.left - ag.left - am.left,
                    width: an,
                    height: ak
                })
            }
        }
    });
    K.ui.plugin.add("resizable", "alsoResize", {
        start: function() {
            var ag = K(this).resizable("instance"),
                ah = ag.options;
            K(ah.alsoResize).each(function() {
                var ai = K(this);
                ai.data("ui-resizable-alsoresize", {
                    width: parseFloat(ai.width()),
                    height: parseFloat(ai.height()),
                    left: parseFloat(ai.css("left")),
                    top: parseFloat(ai.css("top"))
                })
            })
        },
        resize: function(ah, aj) {
            var ag = K(this).resizable("instance"),
                ak = ag.options,
                ai = ag.originalSize,
                am = ag.originalPosition,
                al = {
                    height: (ag.size.height - ai.height) || 0,
                    width: (ag.size.width - ai.width) || 0,
                    top: (ag.position.top - am.top) || 0,
                    left: (ag.position.left - am.left) || 0
                };
            K(ak.alsoResize).each(function() {
                var ap = K(this),
                    aq = K(this).data("ui-resizable-alsoresize"),
                    ao = {},
                    an = ap.parents(aj.originalElement[0]).length ? ["width", "height"] : ["width", "height", "top", "left"];
                K.each(an, function(ar, au) {
                    var at = (aq[au] || 0) + (al[au] || 0);
                    if (at && at >= 0) {
                        ao[au] = at || null
                    }
                });
                ap.css(ao)
            })
        },
        stop: function() {
            K(this).removeData("ui-resizable-alsoresize")
        }
    });
    K.ui.plugin.add("resizable", "ghost", {
        start: function() {
            var ah = K(this).resizable("instance"),
                ag = ah.size;
            ah.ghost = ah.originalElement.clone();
            ah.ghost.css({
                opacity: 0.25,
                display: "block",
                position: "relative",
                height: ag.height,
                width: ag.width,
                margin: 0,
                left: 0,
                top: 0
            });
            ah._addClass(ah.ghost, "ui-resizable-ghost");
            if (K.uiBackCompat !== false && typeof ah.options.ghost === "string") {
                ah.ghost.addClass(this.options.ghost)
            }
            ah.ghost.appendTo(ah.helper)
        },
        resize: function() {
            var ag = K(this).resizable("instance");
            if (ag.ghost) {
                ag.ghost.css({
                    position: "relative",
                    height: ag.size.height,
                    width: ag.size.width
                })
            }
        },
        stop: function() {
            var ag = K(this).resizable("instance");
            if (ag.ghost && ag.helper) {
                ag.helper.get(0).removeChild(ag.ghost.get(0))
            }
        }
    });
    K.ui.plugin.add("resizable", "grid", {
        resize: function() {
            var aj, ao = K(this).resizable("instance"),
                at = ao.options,
                am = ao.size,
                an = ao.originalSize,
                ap = ao.originalPosition,
                ay = ao.axis,
                ag = typeof at.grid === "number" ? [at.grid, at.grid] : at.grid,
                aw = (ag[0] || 1),
                av = (ag[1] || 1),
                al = Math.round((am.width - an.width) / aw) * aw,
                ak = Math.round((am.height - an.height) / av) * av,
                aq = an.width + al,
                au = an.height + ak,
                ai = at.maxWidth && (at.maxWidth < aq),
                ar = at.maxHeight && (at.maxHeight < au),
                ax = at.minWidth && (at.minWidth > aq),
                ah = at.minHeight && (at.minHeight > au);
            at.grid = ag;
            if (ax) {
                aq += aw
            }
            if (ah) {
                au += av
            }
            if (ai) {
                aq -= aw
            }
            if (ar) {
                au -= av
            }
            if (/^(se|s|e)$/.test(ay)) {
                ao.size.width = aq;
                ao.size.height = au
            } else {
                if (/^(ne)$/.test(ay)) {
                    ao.size.width = aq;
                    ao.size.height = au;
                    ao.position.top = ap.top - ak
                } else {
                    if (/^(sw)$/.test(ay)) {
                        ao.size.width = aq;
                        ao.size.height = au;
                        ao.position.left = ap.left - al
                    } else {
                        if (au - av <= 0 || aq - aw <= 0) {
                            aj = ao._getPaddingPlusBorderDimensions(this)
                        }
                        if (au - av > 0) {
                            ao.size.height = au;
                            ao.position.top = ap.top - ak
                        } else {
                            au = av - aj.height;
                            ao.size.height = au;
                            ao.position.top = ap.top + an.height - au
                        }
                        if (aq - aw > 0) {
                            ao.size.width = aq;
                            ao.position.left = ap.left - al
                        } else {
                            aq = aw - aj.width;
                            ao.size.width = aq;
                            ao.position.left = ap.left + an.width - aq
                        }
                    }
                }
            }
        }
    });
    var U = K.ui.resizable;
    /*!
     * jQuery UI Selectable 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var a = K.widget("ui.selectable", K.ui.mouse, {
        version: "1.12.1",
        options: {
            appendTo: "body",
            autoRefresh: true,
            distance: 0,
            filter: "*",
            tolerance: "touch",
            selected: null,
            selecting: null,
            start: null,
            stop: null,
            unselected: null,
            unselecting: null
        },
        _create: function() {
            var ag = this;
            this._addClass("ui-selectable");
            this.dragged = false;
            this.refresh = function() {
                ag.elementPos = K(ag.element[0]).offset();
                ag.selectees = K(ag.options.filter, ag.element[0]);
                ag._addClass(ag.selectees, "ui-selectee");
                ag.selectees.each(function() {
                    var ai = K(this),
                        ah = ai.offset(),
                        aj = {
                            left: ah.left - ag.elementPos.left,
                            top: ah.top - ag.elementPos.top
                        };
                    K.data(this, "selectable-item", {
                        element: this,
                        $element: ai,
                        left: aj.left,
                        top: aj.top,
                        right: aj.left + ai.outerWidth(),
                        bottom: aj.top + ai.outerHeight(),
                        startselected: false,
                        selected: ai.hasClass("ui-selected"),
                        selecting: ai.hasClass("ui-selecting"),
                        unselecting: ai.hasClass("ui-unselecting")
                    })
                })
            };
            this.refresh();
            this._mouseInit();
            this.helper = K("<div>");
            this._addClass(this.helper, "ui-selectable-helper")
        },
        _destroy: function() {
            this.selectees.removeData("selectable-item");
            this._mouseDestroy()
        },
        _mouseStart: function(ai) {
            var ah = this,
                ag = this.options;
            this.opos = [ai.pageX, ai.pageY];
            this.elementPos = K(this.element[0]).offset();
            if (this.options.disabled) {
                return
            }
            this.selectees = K(ag.filter, this.element[0]);
            this._trigger("start", ai);
            K(ag.appendTo).append(this.helper);
            this.helper.css({
                left: ai.pageX,
                top: ai.pageY,
                width: 0,
                height: 0
            });
            if (ag.autoRefresh) {
                this.refresh()
            }
            this.selectees.filter(".ui-selected").each(function() {
                var aj = K.data(this, "selectable-item");
                aj.startselected = true;
                if (!ai.metaKey && !ai.ctrlKey) {
                    ah._removeClass(aj.$element, "ui-selected");
                    aj.selected = false;
                    ah._addClass(aj.$element, "ui-unselecting");
                    aj.unselecting = true;
                    ah._trigger("unselecting", ai, {
                        unselecting: aj.element
                    })
                }
            });
            K(ai.target).parents().addBack().each(function() {
                var aj, ak = K.data(this, "selectable-item");
                if (ak) {
                    aj = (!ai.metaKey && !ai.ctrlKey) || !ak.$element.hasClass("ui-selected");
                    ah._removeClass(ak.$element, aj ? "ui-unselecting" : "ui-selected")._addClass(ak.$element, aj ? "ui-selecting" : "ui-unselecting");
                    ak.unselecting = !aj;
                    ak.selecting = aj;
                    ak.selected = aj;
                    if (aj) {
                        ah._trigger("selecting", ai, {
                            selecting: ak.element
                        })
                    } else {
                        ah._trigger("unselecting", ai, {
                            unselecting: ak.element
                        })
                    }
                    return false
                }
            })
        },
        _mouseDrag: function(an) {
            this.dragged = true;
            if (this.options.disabled) {
                return
            }
            var ak, am = this,
                ai = this.options,
                ah = this.opos[0],
                al = this.opos[1],
                ag = an.pageX,
                aj = an.pageY;
            if (ah > ag) {
                ak = ag;
                ag = ah;
                ah = ak
            }
            if (al > aj) {
                ak = aj;
                aj = al;
                al = ak
            }
            this.helper.css({
                left: ah,
                top: al,
                width: ag - ah,
                height: aj - al
            });
            this.selectees.each(function() {
                var ao = K.data(this, "selectable-item"),
                    ap = false,
                    aq = {};
                if (!ao || ao.element === am.element[0]) {
                    return
                }
                aq.left = ao.left + am.elementPos.left;
                aq.right = ao.right + am.elementPos.left;
                aq.top = ao.top + am.elementPos.top;
                aq.bottom = ao.bottom + am.elementPos.top;
                if (ai.tolerance === "touch") {
                    ap = (!(aq.left > ag || aq.right < ah || aq.top > aj || aq.bottom < al))
                } else {
                    if (ai.tolerance === "fit") {
                        ap = (aq.left > ah && aq.right < ag && aq.top > al && aq.bottom < aj)
                    }
                }
                if (ap) {
                    if (ao.selected) {
                        am._removeClass(ao.$element, "ui-selected");
                        ao.selected = false
                    }
                    if (ao.unselecting) {
                        am._removeClass(ao.$element, "ui-unselecting");
                        ao.unselecting = false
                    }
                    if (!ao.selecting) {
                        am._addClass(ao.$element, "ui-selecting");
                        ao.selecting = true;
                        am._trigger("selecting", an, {
                            selecting: ao.element
                        })
                    }
                } else {
                    if (ao.selecting) {
                        if ((an.metaKey || an.ctrlKey) && ao.startselected) {
                            am._removeClass(ao.$element, "ui-selecting");
                            ao.selecting = false;
                            am._addClass(ao.$element, "ui-selected");
                            ao.selected = true
                        } else {
                            am._removeClass(ao.$element, "ui-selecting");
                            ao.selecting = false;
                            if (ao.startselected) {
                                am._addClass(ao.$element, "ui-unselecting");
                                ao.unselecting = true
                            }
                            am._trigger("unselecting", an, {
                                unselecting: ao.element
                            })
                        }
                    }
                    if (ao.selected) {
                        if (!an.metaKey && !an.ctrlKey && !ao.startselected) {
                            am._removeClass(ao.$element, "ui-selected");
                            ao.selected = false;
                            am._addClass(ao.$element, "ui-unselecting");
                            ao.unselecting = true;
                            am._trigger("unselecting", an, {
                                unselecting: ao.element
                            })
                        }
                    }
                }
            });
            return false
        },
        _mouseStop: function(ah) {
            var ag = this;
            this.dragged = false;
            K(".ui-unselecting", this.element[0]).each(function() {
                var ai = K.data(this, "selectable-item");
                ag._removeClass(ai.$element, "ui-unselecting");
                ai.unselecting = false;
                ai.startselected = false;
                ag._trigger("unselected", ah, {
                    unselected: ai.element
                })
            });
            K(".ui-selecting", this.element[0]).each(function() {
                var ai = K.data(this, "selectable-item");
                ag._removeClass(ai.$element, "ui-selecting")._addClass(ai.$element, "ui-selected");
                ai.selecting = false;
                ai.selected = true;
                ai.startselected = true;
                ag._trigger("selected", ah, {
                    selected: ai.element
                })
            });
            this._trigger("stop", ah);
            this.helper.remove();
            return false
        }
    });
    /*!
     * jQuery UI Sortable 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var m = K.widget("ui.sortable", K.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "sort",
        ready: false,
        options: {
            appendTo: "parent",
            axis: false,
            connectWith: false,
            containment: false,
            cursor: "auto",
            cursorAt: false,
            dropOnEmpty: true,
            forcePlaceholderSize: false,
            forceHelperSize: false,
            grid: false,
            handle: false,
            helper: "original",
            items: "> *",
            opacity: false,
            placeholder: false,
            revert: false,
            scroll: true,
            scrollSensitivity: 20,
            scrollSpeed: 20,
            scope: "default",
            tolerance: "intersect",
            zIndex: 1000,
            activate: null,
            beforeStop: null,
            change: null,
            deactivate: null,
            out: null,
            over: null,
            receive: null,
            remove: null,
            sort: null,
            start: null,
            stop: null,
            update: null
        },
        _isOverAxis: function(ah, ag, ai) {
            return (ah >= ag) && (ah < (ag + ai))
        },
        _isFloating: function(ag) {
            return (/left|right/).test(ag.css("float")) || (/inline|table-cell/).test(ag.css("display"))
        },
        _create: function() {
            this.containerCache = {};
            this._addClass("ui-sortable");
            this.refresh();
            this.offset = this.element.offset();
            this._mouseInit();
            this._setHandleClassName();
            this.ready = true
        },
        _setOption: function(ag, ah) {
            this._super(ag, ah);
            if (ag === "handle") {
                this._setHandleClassName()
            }
        },
        _setHandleClassName: function() {
            var ag = this;
            this._removeClass(this.element.find(".ui-sortable-handle"), "ui-sortable-handle");
            K.each(this.items, function() {
                ag._addClass(this.instance.options.handle ? this.item.find(this.instance.options.handle) : this.item, "ui-sortable-handle")
            })
        },
        _destroy: function() {
            this._mouseDestroy();
            for (var ag = this.items.length - 1; ag >= 0; ag--) {
                this.items[ag].item.removeData(this.widgetName + "-item")
            }
            return this
        },
        _mouseCapture: function(ai, aj) {
            var ag = null,
                ak = false,
                ah = this;
            if (this.reverting) {
                return false
            }
            if (this.options.disabled || this.options.type === "static") {
                return false
            }
            this._refreshItems(ai);
            K(ai.target).parents().each(function() {
                if (K.data(this, ah.widgetName + "-item") === ah) {
                    ag = K(this);
                    return false
                }
            });
            if (K.data(ai.target, ah.widgetName + "-item") === ah) {
                ag = K(ai.target)
            }
            if (!ag) {
                return false
            }
            if (this.options.handle && !aj) {
                K(this.options.handle, ag).find("*").addBack().each(function() {
                    if (this === ai.target) {
                        ak = true
                    }
                });
                if (!ak) {
                    return false
                }
            }
            this.currentItem = ag;
            this._removeCurrentsFromItems();
            return true
        },
        _mouseStart: function(aj, ak, ah) {
            var ai, ag, al = this.options;
            this.currentContainer = this;
            this.refreshPositions();
            this.helper = this._createHelper(aj);
            this._cacheHelperProportions();
            this._cacheMargins();
            this.scrollParent = this.helper.scrollParent();
            this.offset = this.currentItem.offset();
            this.offset = {
                top: this.offset.top - this.margins.top,
                left: this.offset.left - this.margins.left
            };
            K.extend(this.offset, {
                click: {
                    left: aj.pageX - this.offset.left,
                    top: aj.pageY - this.offset.top
                },
                parent: this._getParentOffset(),
                relative: this._getRelativeOffset()
            });
            this.helper.css("position", "absolute");
            this.cssPosition = this.helper.css("position");
            this.originalPosition = this._generatePosition(aj);
            this.originalPageX = aj.pageX;
            this.originalPageY = aj.pageY;
            (al.cursorAt && this._adjustOffsetFromHelper(al.cursorAt));
            this.domPosition = {
                prev: this.currentItem.prev()[0],
                parent: this.currentItem.parent()[0]
            };
            if (this.helper[0] !== this.currentItem[0]) {
                this.currentItem.hide()
            }
            this._createPlaceholder();
            if (al.containment) {
                this._setContainment()
            }
            if (al.cursor && al.cursor !== "auto") {
                ag = this.document.find("body");
                this.storedCursor = ag.css("cursor");
                ag.css("cursor", al.cursor);
                this.storedStylesheet = K("<style>*{ cursor: " + al.cursor + " !important; }</style>").appendTo(ag)
            }
            if (al.opacity) {
                if (this.helper.css("opacity")) {
                    this._storedOpacity = this.helper.css("opacity")
                }
                this.helper.css("opacity", al.opacity)
            }
            if (al.zIndex) {
                if (this.helper.css("zIndex")) {
                    this._storedZIndex = this.helper.css("zIndex")
                }
                this.helper.css("zIndex", al.zIndex)
            }
            if (this.scrollParent[0] !== this.document[0] && this.scrollParent[0].tagName !== "HTML") {
                this.overflowOffset = this.scrollParent.offset()
            }
            this._trigger("start", aj, this._uiHash());
            if (!this._preserveHelperProportions) {
                this._cacheHelperProportions()
            }
            if (!ah) {
                for (ai = this.containers.length - 1; ai >= 0; ai--) {
                    this.containers[ai]._trigger("activate", aj, this._uiHash(this))
                }
            }
            if (K.ui.ddmanager) {
                K.ui.ddmanager.current = this
            }
            if (K.ui.ddmanager && !al.dropBehaviour) {
                K.ui.ddmanager.prepareOffsets(this, aj)
            }
            this.dragging = true;
            this._addClass(this.helper, "ui-sortable-helper");
            this._mouseDrag(aj);
            return true
        },
        _mouseDrag: function(ak) {
            var ai, aj, ah, am, al = this.options,
                ag = false;
            this.position = this._generatePosition(ak);
            this.positionAbs = this._convertPositionTo("absolute");
            if (!this.lastPositionAbs) {
                this.lastPositionAbs = this.positionAbs
            }
            if (this.options.scroll) {
                if (this.scrollParent[0] !== this.document[0] && this.scrollParent[0].tagName !== "HTML") {
                    if ((this.overflowOffset.top + this.scrollParent[0].offsetHeight) - ak.pageY < al.scrollSensitivity) {
                        this.scrollParent[0].scrollTop = ag = this.scrollParent[0].scrollTop + al.scrollSpeed
                    } else {
                        if (ak.pageY - this.overflowOffset.top < al.scrollSensitivity) {
                            this.scrollParent[0].scrollTop = ag = this.scrollParent[0].scrollTop - al.scrollSpeed
                        }
                    }
                    if ((this.overflowOffset.left + this.scrollParent[0].offsetWidth) - ak.pageX < al.scrollSensitivity) {
                        this.scrollParent[0].scrollLeft = ag = this.scrollParent[0].scrollLeft + al.scrollSpeed
                    } else {
                        if (ak.pageX - this.overflowOffset.left < al.scrollSensitivity) {
                            this.scrollParent[0].scrollLeft = ag = this.scrollParent[0].scrollLeft - al.scrollSpeed
                        }
                    }
                } else {
                    if (ak.pageY - this.document.scrollTop() < al.scrollSensitivity) {
                        ag = this.document.scrollTop(this.document.scrollTop() - al.scrollSpeed)
                    } else {
                        if (this.window.height() - (ak.pageY - this.document.scrollTop()) < al.scrollSensitivity) {
                            ag = this.document.scrollTop(this.document.scrollTop() + al.scrollSpeed)
                        }
                    }
                    if (ak.pageX - this.document.scrollLeft() < al.scrollSensitivity) {
                        ag = this.document.scrollLeft(this.document.scrollLeft() - al.scrollSpeed)
                    } else {
                        if (this.window.width() - (ak.pageX - this.document.scrollLeft()) < al.scrollSensitivity) {
                            ag = this.document.scrollLeft(this.document.scrollLeft() + al.scrollSpeed)
                        }
                    }
                }
                if (ag !== false && K.ui.ddmanager && !al.dropBehaviour) {
                    K.ui.ddmanager.prepareOffsets(this, ak)
                }
            }
            this.positionAbs = this._convertPositionTo("absolute");
            if (!this.options.axis || this.options.axis !== "y") {
                this.helper[0].style.left = this.position.left + "px"
            }
            if (!this.options.axis || this.options.axis !== "x") {
                this.helper[0].style.top = this.position.top + "px"
            }
            for (ai = this.items.length - 1; ai >= 0; ai--) {
                aj = this.items[ai];
                ah = aj.item[0];
                am = this._intersectsWithPointer(aj);
                if (!am) {
                    continue
                }
                if (aj.instance !== this.currentContainer) {
                    continue
                }
                if (ah !== this.currentItem[0] && this.placeholder[am === 1 ? "next" : "prev"]()[0] !== ah && !K.contains(this.placeholder[0], ah) && (this.options.type === "semi-dynamic" ? !K.contains(this.element[0], ah) : true)) {
                    this.direction = am === 1 ? "down" : "up";
                    if (this.options.tolerance === "pointer" || this._intersectsWithSides(aj)) {
                        this._rearrange(ak, aj)
                    } else {
                        break
                    }
                    this._trigger("change", ak, this._uiHash());
                    break
                }
            }
            this._contactContainers(ak);
            if (K.ui.ddmanager) {
                K.ui.ddmanager.drag(this, ak)
            }
            this._trigger("sort", ak, this._uiHash());
            this.lastPositionAbs = this.positionAbs;
            return false
        },
        _mouseStop: function(ai, ak) {
            if (!ai) {
                return
            }
            if (K.ui.ddmanager && !this.options.dropBehaviour) {
                K.ui.ddmanager.drop(this, ai)
            }
            if (this.options.revert) {
                var ah = this,
                    al = this.placeholder.offset(),
                    ag = this.options.axis,
                    aj = {};
                if (!ag || ag === "x") {
                    aj.left = al.left - this.offset.parent.left - this.margins.left + (this.offsetParent[0] === this.document[0].body ? 0 : this.offsetParent[0].scrollLeft)
                }
                if (!ag || ag === "y") {
                    aj.top = al.top - this.offset.parent.top - this.margins.top + (this.offsetParent[0] === this.document[0].body ? 0 : this.offsetParent[0].scrollTop)
                }
                this.reverting = true;
                K(this.helper).animate(aj, parseInt(this.options.revert, 10) || 500, function() {
                    ah._clear(ai)
                })
            } else {
                this._clear(ai, ak)
            }
            return false
        },
        cancel: function() {
            if (this.dragging) {
                this._mouseUp(new K.Event("mouseup", {
                    target: null
                }));
                if (this.options.helper === "original") {
                    this.currentItem.css(this._storedCSS);
                    this._removeClass(this.currentItem, "ui-sortable-helper")
                } else {
                    this.currentItem.show()
                }
                for (var ag = this.containers.length - 1; ag >= 0; ag--) {
                    this.containers[ag]._trigger("deactivate", null, this._uiHash(this));
                    if (this.containers[ag].containerCache.over) {
                        this.containers[ag]._trigger("out", null, this._uiHash(this));
                        this.containers[ag].containerCache.over = 0
                    }
                }
            }
            if (this.placeholder) {
                if (this.placeholder[0].parentNode) {
                    this.placeholder[0].parentNode.removeChild(this.placeholder[0])
                }
                if (this.options.helper !== "original" && this.helper && this.helper[0].parentNode) {
                    this.helper.remove()
                }
                K.extend(this, {
                    helper: null,
                    dragging: false,
                    reverting: false,
                    _noFinalSort: null
                });
                if (this.domPosition.prev) {
                    K(this.domPosition.prev).after(this.currentItem)
                } else {
                    K(this.domPosition.parent).prepend(this.currentItem)
                }
            }
            return this
        },
        serialize: function(ai) {
            var ag = this._getItemsAsjQuery(ai && ai.connected),
                ah = [];
            ai = ai || {};
            K(ag).each(function() {
                var aj = (K(ai.item || this).attr(ai.attribute || "id") || "").match(ai.expression || (/(.+)[\-=_](.+)/));
                if (aj) {
                    ah.push((ai.key || aj[1] + "[]") + "=" + (ai.key && ai.expression ? aj[1] : aj[2]))
                }
            });
            if (!ah.length && ai.key) {
                ah.push(ai.key + "=")
            }
            return ah.join("&")
        },
        toArray: function(ai) {
            var ag = this._getItemsAsjQuery(ai && ai.connected),
                ah = [];
            ai = ai || {};
            ag.each(function() {
                ah.push(K(ai.item || this).attr(ai.attribute || "id") || "")
            });
            return ah
        },
        _intersectsWith: function(ar) {
            var ai = this.positionAbs.left,
                ah = ai + this.helperProportions.width,
                ap = this.positionAbs.top,
                ao = ap + this.helperProportions.height,
                aj = ar.left,
                ag = aj + ar.width,
                at = ar.top,
                an = at + ar.height,
                au = this.offset.click.top,
                am = this.offset.click.left,
                al = (this.options.axis === "x") || ((ap + au) > at && (ap + au) < an),
                aq = (this.options.axis === "y") || ((ai + am) > aj && (ai + am) < ag),
                ak = al && aq;
            if (this.options.tolerance === "pointer" || this.options.forcePointerForContainers || (this.options.tolerance !== "pointer" && this.helperProportions[this.floating ? "width" : "height"] > ar[this.floating ? "width" : "height"])) {
                return ak
            } else {
                return (aj < ai + (this.helperProportions.width / 2) && ah - (this.helperProportions.width / 2) < ag && at < ap + (this.helperProportions.height / 2) && ao - (this.helperProportions.height / 2) < an)
            }
        },
        _intersectsWithPointer: function(ai) {
            var ah, al, aj = (this.options.axis === "x") || this._isOverAxis(this.positionAbs.top + this.offset.click.top, ai.top, ai.height),
                ag = (this.options.axis === "y") || this._isOverAxis(this.positionAbs.left + this.offset.click.left, ai.left, ai.width),
                ak = aj && ag;
            if (!ak) {
                return false
            }
            ah = this._getDragVerticalDirection();
            al = this._getDragHorizontalDirection();
            return this.floating ? ((al === "right" || ah === "down") ? 2 : 1) : (ah && (ah === "down" ? 2 : 1))
        },
        _intersectsWithSides: function(aj) {
            var ah = this._isOverAxis(this.positionAbs.top + this.offset.click.top, aj.top + (aj.height / 2), aj.height),
                ai = this._isOverAxis(this.positionAbs.left + this.offset.click.left, aj.left + (aj.width / 2), aj.width),
                ag = this._getDragVerticalDirection(),
                ak = this._getDragHorizontalDirection();
            if (this.floating && ak) {
                return ((ak === "right" && ai) || (ak === "left" && !ai))
            } else {
                return ag && ((ag === "down" && ah) || (ag === "up" && !ah))
            }
        },
        _getDragVerticalDirection: function() {
            var ag = this.positionAbs.top - this.lastPositionAbs.top;
            return ag !== 0 && (ag > 0 ? "down" : "up")
        },
        _getDragHorizontalDirection: function() {
            var ag = this.positionAbs.left - this.lastPositionAbs.left;
            return ag !== 0 && (ag > 0 ? "right" : "left")
        },
        refresh: function(ag) {
            this._refreshItems(ag);
            this._setHandleClassName();
            this.refreshPositions();
            return this
        },
        _connectWith: function() {
            var ag = this.options;
            return ag.connectWith.constructor === String ? [ag.connectWith] : ag.connectWith
        },
        _getItemsAsjQuery: function(ag) {
            var ai, ah, an, ak, al = [],
                aj = [],
                am = this._connectWith();
            if (am && ag) {
                for (ai = am.length - 1; ai >= 0; ai--) {
                    an = K(am[ai], this.document[0]);
                    for (ah = an.length - 1; ah >= 0; ah--) {
                        ak = K.data(an[ah], this.widgetFullName);
                        if (ak && ak !== this && !ak.options.disabled) {
                            aj.push([K.isFunction(ak.options.items) ? ak.options.items.call(ak.element) : K(ak.options.items, ak.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), ak])
                        }
                    }
                }
            }
            aj.push([K.isFunction(this.options.items) ? this.options.items.call(this.element, null, {
                options: this.options,
                item: this.currentItem
            }) : K(this.options.items, this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), this]);

            function ao() {
                al.push(this)
            }
            for (ai = aj.length - 1; ai >= 0; ai--) {
                aj[ai][0].each(ao)
            }
            return K(al)
        },
        _removeCurrentsFromItems: function() {
            var ag = this.currentItem.find(":data(" + this.widgetName + "-item)");
            this.items = K.grep(this.items, function(ai) {
                for (var ah = 0; ah < ag.length; ah++) {
                    if (ag[ah] === ai.item[0]) {
                        return false
                    }
                }
                return true
            })
        },
        _refreshItems: function(ag) {
            this.items = [];
            this.containers = [this];
            var ak, ai, ap, al, ao, ah, ar, aq, am = this.items,
                aj = [
                    [K.isFunction(this.options.items) ? this.options.items.call(this.element[0], ag, {
                        item: this.currentItem
                    }) : K(this.options.items, this.element), this]
                ],
                an = this._connectWith();
            if (an && this.ready) {
                for (ak = an.length - 1; ak >= 0; ak--) {
                    ap = K(an[ak], this.document[0]);
                    for (ai = ap.length - 1; ai >= 0; ai--) {
                        al = K.data(ap[ai], this.widgetFullName);
                        if (al && al !== this && !al.options.disabled) {
                            aj.push([K.isFunction(al.options.items) ? al.options.items.call(al.element[0], ag, {
                                item: this.currentItem
                            }) : K(al.options.items, al.element), al]);
                            this.containers.push(al)
                        }
                    }
                }
            }
            for (ak = aj.length - 1; ak >= 0; ak--) {
                ao = aj[ak][1];
                ah = aj[ak][0];
                for (ai = 0, aq = ah.length; ai < aq; ai++) {
                    ar = K(ah[ai]);
                    ar.data(this.widgetName + "-item", ao);
                    am.push({
                        item: ar,
                        instance: ao,
                        width: 0,
                        height: 0,
                        left: 0,
                        top: 0
                    })
                }
            }
        },
        refreshPositions: function(ag) {
            this.floating = this.items.length ? this.options.axis === "x" || this._isFloating(this.items[0].item) : false;
            if (this.offsetParent && this.helper) {
                this.offset.parent = this._getParentOffset()
            }
            var ai, aj, ah, ak;
            for (ai = this.items.length - 1; ai >= 0; ai--) {
                aj = this.items[ai];
                if (aj.instance !== this.currentContainer && this.currentContainer && aj.item[0] !== this.currentItem[0]) {
                    continue
                }
                ah = this.options.toleranceElement ? K(this.options.toleranceElement, aj.item) : aj.item;
                if (!ag) {
                    aj.width = ah.outerWidth();
                    aj.height = ah.outerHeight()
                }
                ak = ah.offset();
                aj.left = ak.left;
                aj.top = ak.top
            }
            if (this.options.custom && this.options.custom.refreshContainers) {
                this.options.custom.refreshContainers.call(this)
            } else {
                for (ai = this.containers.length - 1; ai >= 0; ai--) {
                    ak = this.containers[ai].element.offset();
                    this.containers[ai].containerCache.left = ak.left;
                    this.containers[ai].containerCache.top = ak.top;
                    this.containers[ai].containerCache.width = this.containers[ai].element.outerWidth();
                    this.containers[ai].containerCache.height = this.containers[ai].element.outerHeight()
                }
            }
            return this
        },
        _createPlaceholder: function(ah) {
            ah = ah || this;
            var ag, ai = ah.options;
            if (!ai.placeholder || ai.placeholder.constructor === String) {
                ag = ai.placeholder;
                ai.placeholder = {
                    element: function() {
                        var ak = ah.currentItem[0].nodeName.toLowerCase(),
                            aj = K("<" + ak + ">", ah.document[0]);
                        ah._addClass(aj, "ui-sortable-placeholder", ag || ah.currentItem[0].className)._removeClass(aj, "ui-sortable-helper");
                        if (ak === "tbody") {
                            ah._createTrPlaceholder(ah.currentItem.find("tr").eq(0), K("<tr>", ah.document[0]).appendTo(aj))
                        } else {
                            if (ak === "tr") {
                                ah._createTrPlaceholder(ah.currentItem, aj)
                            } else {
                                if (ak === "img") {
                                    aj.attr("src", ah.currentItem.attr("src"))
                                }
                            }
                        }
                        if (!ag) {
                            aj.css("visibility", "hidden")
                        }
                        return aj
                    },
                    update: function(aj, ak) {
                        if (ag && !ai.forcePlaceholderSize) {
                            return
                        }
                        if (!ak.height()) {
                            ak.height(ah.currentItem.innerHeight() - parseInt(ah.currentItem.css("paddingTop") || 0, 10) - parseInt(ah.currentItem.css("paddingBottom") || 0, 10))
                        }
                        if (!ak.width()) {
                            ak.width(ah.currentItem.innerWidth() - parseInt(ah.currentItem.css("paddingLeft") || 0, 10) - parseInt(ah.currentItem.css("paddingRight") || 0, 10))
                        }
                    }
                }
            }
            ah.placeholder = K(ai.placeholder.element.call(ah.element, ah.currentItem));
            ah.currentItem.after(ah.placeholder);
            ai.placeholder.update(ah, ah.placeholder)
        },
        _createTrPlaceholder: function(ah, ag) {
            var ai = this;
            ah.children().each(function() {
                K("<td>&#160;</td>", ai.document[0]).attr("colspan", K(this).attr("colspan") || 1).appendTo(ag)
            })
        },
        _contactContainers: function(ag) {
            var al, aj, ap, am, an, ar, at, ak, ao, ai, ah = null,
                aq = null;
            for (al = this.containers.length - 1; al >= 0; al--) {
                if (K.contains(this.currentItem[0], this.containers[al].element[0])) {
                    continue
                }
                if (this._intersectsWith(this.containers[al].containerCache)) {
                    if (ah && K.contains(this.containers[al].element[0], ah.element[0])) {
                        continue
                    }
                    ah = this.containers[al];
                    aq = al
                } else {
                    if (this.containers[al].containerCache.over) {
                        this.containers[al]._trigger("out", ag, this._uiHash(this));
                        this.containers[al].containerCache.over = 0
                    }
                }
            }
            if (!ah) {
                return
            }
            if (this.containers.length === 1) {
                if (!this.containers[aq].containerCache.over) {
                    this.containers[aq]._trigger("over", ag, this._uiHash(this));
                    this.containers[aq].containerCache.over = 1
                }
            } else {
                ap = 10000;
                am = null;
                ao = ah.floating || this._isFloating(this.currentItem);
                an = ao ? "left" : "top";
                ar = ao ? "width" : "height";
                ai = ao ? "pageX" : "pageY";
                for (aj = this.items.length - 1; aj >= 0; aj--) {
                    if (!K.contains(this.containers[aq].element[0], this.items[aj].item[0])) {
                        continue
                    }
                    if (this.items[aj].item[0] === this.currentItem[0]) {
                        continue
                    }
                    at = this.items[aj].item.offset()[an];
                    ak = false;
                    if (ag[ai] - at > this.items[aj][ar] / 2) {
                        ak = true
                    }
                    if (Math.abs(ag[ai] - at) < ap) {
                        ap = Math.abs(ag[ai] - at);
                        am = this.items[aj];
                        this.direction = ak ? "up" : "down"
                    }
                }
                if (!am && !this.options.dropOnEmpty) {
                    return
                }
                if (this.currentContainer === this.containers[aq]) {
                    if (!this.currentContainer.containerCache.over) {
                        this.containers[aq]._trigger("over", ag, this._uiHash());
                        this.currentContainer.containerCache.over = 1
                    }
                    return
                }
                am ? this._rearrange(ag, am, null, true) : this._rearrange(ag, null, this.containers[aq].element, true);
                this._trigger("change", ag, this._uiHash());
                this.containers[aq]._trigger("change", ag, this._uiHash(this));
                this.currentContainer = this.containers[aq];
                this.options.placeholder.update(this.currentContainer, this.placeholder);
                this.containers[aq]._trigger("over", ag, this._uiHash(this));
                this.containers[aq].containerCache.over = 1
            }
        },
        _createHelper: function(ah) {
            var ai = this.options,
                ag = K.isFunction(ai.helper) ? K(ai.helper.apply(this.element[0], [ah, this.currentItem])) : (ai.helper === "clone" ? this.currentItem.clone() : this.currentItem);
            if (!ag.parents("body").length) {
                K(ai.appendTo !== "parent" ? ai.appendTo : this.currentItem[0].parentNode)[0].appendChild(ag[0])
            }
            if (ag[0] === this.currentItem[0]) {
                this._storedCSS = {
                    width: this.currentItem[0].style.width,
                    height: this.currentItem[0].style.height,
                    position: this.currentItem.css("position"),
                    top: this.currentItem.css("top"),
                    left: this.currentItem.css("left")
                }
            }
            if (!ag[0].style.width || ai.forceHelperSize) {
                ag.width(this.currentItem.width())
            }
            if (!ag[0].style.height || ai.forceHelperSize) {
                ag.height(this.currentItem.height())
            }
            return ag
        },
        _adjustOffsetFromHelper: function(ag) {
            if (typeof ag === "string") {
                ag = ag.split(" ")
            }
            if (K.isArray(ag)) {
                ag = {
                    left: +ag[0],
                    top: +ag[1] || 0
                }
            }
            if ("left" in ag) {
                this.offset.click.left = ag.left + this.margins.left
            }
            if ("right" in ag) {
                this.offset.click.left = this.helperProportions.width - ag.right + this.margins.left
            }
            if ("top" in ag) {
                this.offset.click.top = ag.top + this.margins.top
            }
            if ("bottom" in ag) {
                this.offset.click.top = this.helperProportions.height - ag.bottom + this.margins.top
            }
        },
        _getParentOffset: function() {
            this.offsetParent = this.helper.offsetParent();
            var ag = this.offsetParent.offset();
            if (this.cssPosition === "absolute" && this.scrollParent[0] !== this.document[0] && K.contains(this.scrollParent[0], this.offsetParent[0])) {
                ag.left += this.scrollParent.scrollLeft();
                ag.top += this.scrollParent.scrollTop()
            }
            if (this.offsetParent[0] === this.document[0].body || (this.offsetParent[0].tagName && this.offsetParent[0].tagName.toLowerCase() === "html" && K.ui.ie)) {
                ag = {
                    top: 0,
                    left: 0
                }
            }
            return {
                top: ag.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                left: ag.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
            }
        },
        _getRelativeOffset: function() {
            if (this.cssPosition === "relative") {
                var ag = this.currentItem.position();
                return {
                    top: ag.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(),
                    left: ag.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft()
                }
            } else {
                return {
                    top: 0,
                    left: 0
                }
            }
        },
        _cacheMargins: function() {
            this.margins = {
                left: (parseInt(this.currentItem.css("marginLeft"), 10) || 0),
                top: (parseInt(this.currentItem.css("marginTop"), 10) || 0)
            }
        },
        _cacheHelperProportions: function() {
            this.helperProportions = {
                width: this.helper.outerWidth(),
                height: this.helper.outerHeight()
            }
        },
        _setContainment: function() {
            var ah, aj, ag, ai = this.options;
            if (ai.containment === "parent") {
                ai.containment = this.helper[0].parentNode
            }
            if (ai.containment === "document" || ai.containment === "window") {
                this.containment = [0 - this.offset.relative.left - this.offset.parent.left, 0 - this.offset.relative.top - this.offset.parent.top, ai.containment === "document" ? this.document.width() : this.window.width() - this.helperProportions.width - this.margins.left, (ai.containment === "document" ? (this.document.height() || document.body.parentNode.scrollHeight) : this.window.height() || this.document[0].body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]
            }
            if (!(/^(document|window|parent)$/).test(ai.containment)) {
                ah = K(ai.containment)[0];
                aj = K(ai.containment).offset();
                ag = (K(ah).css("overflow") !== "hidden");
                this.containment = [aj.left + (parseInt(K(ah).css("borderLeftWidth"), 10) || 0) + (parseInt(K(ah).css("paddingLeft"), 10) || 0) - this.margins.left, aj.top + (parseInt(K(ah).css("borderTopWidth"), 10) || 0) + (parseInt(K(ah).css("paddingTop"), 10) || 0) - this.margins.top, aj.left + (ag ? Math.max(ah.scrollWidth, ah.offsetWidth) : ah.offsetWidth) - (parseInt(K(ah).css("borderLeftWidth"), 10) || 0) - (parseInt(K(ah).css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left, aj.top + (ag ? Math.max(ah.scrollHeight, ah.offsetHeight) : ah.offsetHeight) - (parseInt(K(ah).css("borderTopWidth"), 10) || 0) - (parseInt(K(ah).css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top]
            }
        },
        _convertPositionTo: function(ai, ak) {
            if (!ak) {
                ak = this.position
            }
            var ah = ai === "absolute" ? 1 : -1,
                ag = this.cssPosition === "absolute" && !(this.scrollParent[0] !== this.document[0] && K.contains(this.scrollParent[0], this.offsetParent[0])) ? this.offsetParent : this.scrollParent,
                aj = (/(html|body)/i).test(ag[0].tagName);
            return {
                top: (ak.top + this.offset.relative.top * ah + this.offset.parent.top * ah - ((this.cssPosition === "fixed" ? -this.scrollParent.scrollTop() : (aj ? 0 : ag.scrollTop())) * ah)),
                left: (ak.left + this.offset.relative.left * ah + this.offset.parent.left * ah - ((this.cssPosition === "fixed" ? -this.scrollParent.scrollLeft() : aj ? 0 : ag.scrollLeft()) * ah))
            }
        },
        _generatePosition: function(aj) {
            var al, ak, am = this.options,
                ai = aj.pageX,
                ah = aj.pageY,
                ag = this.cssPosition === "absolute" && !(this.scrollParent[0] !== this.document[0] && K.contains(this.scrollParent[0], this.offsetParent[0])) ? this.offsetParent : this.scrollParent,
                an = (/(html|body)/i).test(ag[0].tagName);
            if (this.cssPosition === "relative" && !(this.scrollParent[0] !== this.document[0] && this.scrollParent[0] !== this.offsetParent[0])) {
                this.offset.relative = this._getRelativeOffset()
            }
            if (this.originalPosition) {
                if (this.containment) {
                    if (aj.pageX - this.offset.click.left < this.containment[0]) {
                        ai = this.containment[0] + this.offset.click.left
                    }
                    if (aj.pageY - this.offset.click.top < this.containment[1]) {
                        ah = this.containment[1] + this.offset.click.top
                    }
                    if (aj.pageX - this.offset.click.left > this.containment[2]) {
                        ai = this.containment[2] + this.offset.click.left
                    }
                    if (aj.pageY - this.offset.click.top > this.containment[3]) {
                        ah = this.containment[3] + this.offset.click.top
                    }
                }
                if (am.grid) {
                    al = this.originalPageY + Math.round((ah - this.originalPageY) / am.grid[1]) * am.grid[1];
                    ah = this.containment ? ((al - this.offset.click.top >= this.containment[1] && al - this.offset.click.top <= this.containment[3]) ? al : ((al - this.offset.click.top >= this.containment[1]) ? al - am.grid[1] : al + am.grid[1])) : al;
                    ak = this.originalPageX + Math.round((ai - this.originalPageX) / am.grid[0]) * am.grid[0];
                    ai = this.containment ? ((ak - this.offset.click.left >= this.containment[0] && ak - this.offset.click.left <= this.containment[2]) ? ak : ((ak - this.offset.click.left >= this.containment[0]) ? ak - am.grid[0] : ak + am.grid[0])) : ak
                }
            }
            return {
                top: (ah - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ((this.cssPosition === "fixed" ? -this.scrollParent.scrollTop() : (an ? 0 : ag.scrollTop())))),
                left: (ai - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ((this.cssPosition === "fixed" ? -this.scrollParent.scrollLeft() : an ? 0 : ag.scrollLeft())))
            }
        },
        _rearrange: function(ak, aj, ah, ai) {
            ah ? ah[0].appendChild(this.placeholder[0]) : aj.item[0].parentNode.insertBefore(this.placeholder[0], (this.direction === "down" ? aj.item[0] : aj.item[0].nextSibling));
            this.counter = this.counter ? ++this.counter : 1;
            var ag = this.counter;
            this._delay(function() {
                if (ag === this.counter) {
                    this.refreshPositions(!ai)
                }
            })
        },
        _clear: function(ah, aj) {
            this.reverting = false;
            var ag, ak = [];
            if (!this._noFinalSort && this.currentItem.parent().length) {
                this.placeholder.before(this.currentItem)
            }
            this._noFinalSort = null;
            if (this.helper[0] === this.currentItem[0]) {
                for (ag in this._storedCSS) {
                    if (this._storedCSS[ag] === "auto" || this._storedCSS[ag] === "static") {
                        this._storedCSS[ag] = ""
                    }
                }
                this.currentItem.css(this._storedCSS);
                this._removeClass(this.currentItem, "ui-sortable-helper")
            } else {
                this.currentItem.show()
            }
            if (this.fromOutside && !aj) {
                ak.push(function(al) {
                    this._trigger("receive", al, this._uiHash(this.fromOutside))
                })
            }
            if ((this.fromOutside || this.domPosition.prev !== this.currentItem.prev().not(".ui-sortable-helper")[0] || this.domPosition.parent !== this.currentItem.parent()[0]) && !aj) {
                ak.push(function(al) {
                    this._trigger("update", al, this._uiHash())
                })
            }
            if (this !== this.currentContainer) {
                if (!aj) {
                    ak.push(function(al) {
                        this._trigger("remove", al, this._uiHash())
                    });
                    ak.push((function(al) {
                        return function(am) {
                            al._trigger("receive", am, this._uiHash(this))
                        }
                    }).call(this, this.currentContainer));
                    ak.push((function(al) {
                        return function(am) {
                            al._trigger("update", am, this._uiHash(this))
                        }
                    }).call(this, this.currentContainer))
                }
            }

            function ai(an, al, am) {
                return function(ao) {
                    am._trigger(an, ao, al._uiHash(al))
                }
            }
            for (ag = this.containers.length - 1; ag >= 0; ag--) {
                if (!aj) {
                    ak.push(ai("deactivate", this, this.containers[ag]))
                }
                if (this.containers[ag].containerCache.over) {
                    ak.push(ai("out", this, this.containers[ag]));
                    this.containers[ag].containerCache.over = 0
                }
            }
            if (this.storedCursor) {
                this.document.find("body").css("cursor", this.storedCursor);
                this.storedStylesheet.remove()
            }
            if (this._storedOpacity) {
                this.helper.css("opacity", this._storedOpacity)
            }
            if (this._storedZIndex) {
                this.helper.css("zIndex", this._storedZIndex === "auto" ? "" : this._storedZIndex)
            }
            this.dragging = false;
            if (!aj) {
                this._trigger("beforeStop", ah, this._uiHash())
            }
            this.placeholder[0].parentNode.removeChild(this.placeholder[0]);
            if (!this.cancelHelperRemoval) {
                if (this.helper[0] !== this.currentItem[0]) {
                    this.helper.remove()
                }
                this.helper = null
            }
            if (!aj) {
                for (ag = 0; ag < ak.length; ag++) {
                    ak[ag].call(this, ah)
                }
                this._trigger("stop", ah, this._uiHash())
            }
            this.fromOutside = false;
            return !this.cancelHelperRemoval
        },
        _trigger: function() {
            if (K.Widget.prototype._trigger.apply(this, arguments) === false) {
                this.cancel()
            }
        },
        _uiHash: function(ag) {
            var ah = ag || this;
            return {
                helper: ah.helper,
                placeholder: ah.placeholder || K([]),
                position: ah.position,
                originalPosition: ah.originalPosition,
                offset: ah.positionAbs,
                item: ah.currentItem,
                sender: ag ? ag.element : null
            }
        }
    });
    /*!
     * jQuery UI Datepicker 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    K.extend(K.ui, {
        datepicker: {
            version: "1.12.1"
        }
    });
    var q;

    function y(ah) {
        var ag, ai;
        while (ah.length && ah[0] !== document) {
            ag = ah.css("position");
            if (ag === "absolute" || ag === "relative" || ag === "fixed") {
                ai = parseInt(ah.css("zIndex"), 10);
                if (!isNaN(ai) && ai !== 0) {
                    return ai
                }
            }
            ah = ah.parent()
        }
        return 0
    }

    function ac() {
        this._curInst = null;
        this._keyEvent = false;
        this._disabledInputs = [];
        this._datepickerShowing = false;
        this._inDialog = false;
        this._mainDivId = "ui-datepicker-div";
        this._inlineClass = "ui-datepicker-inline";
        this._appendClass = "ui-datepicker-append";
        this._triggerClass = "ui-datepicker-trigger";
        this._dialogClass = "ui-datepicker-dialog";
        this._disableClass = "ui-datepicker-disabled";
        this._unselectableClass = "ui-datepicker-unselectable";
        this._currentClass = "ui-datepicker-current-day";
        this._dayOverClass = "ui-datepicker-days-cell-over";
        this.regional = [];
        this.regional[""] = {
            closeText: "Done",
            prevText: "Prev",
            nextText: "Next",
            currentText: "Today",
            monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            weekHeader: "Wk",
            dateFormat: "mm/dd/yy",
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ""
        };
        this._defaults = {
            showOn: "focus",
            showAnim: "fadeIn",
            showOptions: {},
            defaultDate: null,
            appendText: "",
            buttonText: "...",
            buttonImage: "",
            buttonImageOnly: false,
            hideIfNoPrevNext: false,
            navigationAsDateFormat: false,
            gotoCurrent: false,
            changeMonth: false,
            changeYear: false,
            yearRange: "c-10:c+10",
            showOtherMonths: false,
            selectOtherMonths: false,
            showWeek: false,
            calculateWeek: this.iso8601Week,
            shortYearCutoff: "+10",
            minDate: null,
            maxDate: null,
            duration: "fast",
            beforeShowDay: null,
            beforeShow: null,
            onSelect: null,
            onChangeMonthYear: null,
            onClose: null,
            numberOfMonths: 1,
            showCurrentAtPos: 0,
            stepMonths: 1,
            stepBigMonths: 12,
            altField: "",
            altFormat: "",
            constrainInput: true,
            showButtonPanel: false,
            autoSize: false,
            disabled: false
        };
        K.extend(this._defaults, this.regional[""]);
        this.regional.en = K.extend(true, {}, this.regional[""]);
        this.regional["en-US"] = K.extend(true, {}, this.regional.en);
        this.dpDiv = l(K("<div id='" + this._mainDivId + "' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))
    }
    K.extend(ac.prototype, {
        markerClassName: "hasDatepicker",
        maxRows: 4,
        _widgetDatepicker: function() {
            return this.dpDiv
        },
        setDefaults: function(ag) {
            F(this._defaults, ag || {});
            return this
        },
        _attachDatepicker: function(aj, ag) {
            var ak, ai, ah;
            ak = aj.nodeName.toLowerCase();
            ai = (ak === "div" || ak === "span");
            if (!aj.id) {
                this.uuid += 1;
                aj.id = "dp" + this.uuid
            }
            ah = this._newInst(K(aj), ai);
            ah.settings = K.extend({}, ag || {});
            if (ak === "input") {
                this._connectDatepicker(aj, ah)
            } else {
                if (ai) {
                    this._inlineDatepicker(aj, ah)
                }
            }
        },
        _newInst: function(ah, ag) {
            var ai = ah[0].id.replace(/([^A-Za-z0-9_\-])/g, "\\\\$1");
            return {
                id: ai,
                input: ah,
                selectedDay: 0,
                selectedMonth: 0,
                selectedYear: 0,
                drawMonth: 0,
                drawYear: 0,
                inline: ag,
                dpDiv: (!ag ? this.dpDiv : l(K("<div class='" + this._inlineClass + " ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")))
            }
        },
        _connectDatepicker: function(ai, ah) {
            var ag = K(ai);
            ah.append = K([]);
            ah.trigger = K([]);
            if (ag.hasClass(this.markerClassName)) {
                return
            }
            this._attachments(ag, ah);
            ag.addClass(this.markerClassName).on("keydown", this._doKeyDown).on("keypress", this._doKeyPress).on("keyup", this._doKeyUp);
            this._autoSize(ah);
            K.data(ai, "datepicker", ah);
            if (ah.settings.disabled) {
                this._disableDatepicker(ai)
            }
        },
        _attachments: function(ai, al) {
            var ah, ak, ag, am = this._get(al, "appendText"),
                aj = this._get(al, "isRTL");
            if (al.append) {
                al.append.remove()
            }
            if (am) {
                al.append = K("<span class='" + this._appendClass + "'>" + am + "</span>");
                ai[aj ? "before" : "after"](al.append)
            }
            ai.off("focus", this._showDatepicker);
            if (al.trigger) {
                al.trigger.remove()
            }
            ah = this._get(al, "showOn");
            if (ah === "focus" || ah === "both") {
                ai.on("focus", this._showDatepicker)
            }
            if (ah === "button" || ah === "both") {
                ak = this._get(al, "buttonText");
                ag = this._get(al, "buttonImage");
                al.trigger = K(this._get(al, "buttonImageOnly") ? K("<img/>").addClass(this._triggerClass).attr({
                    src: ag,
                    alt: ak,
                    title: ak
                }) : K("<button type='button'></button>").addClass(this._triggerClass).html(!ag ? ak : K("<img/>").attr({
                    src: ag,
                    alt: ak,
                    title: ak
                })));
                ai[aj ? "before" : "after"](al.trigger);
                al.trigger.on("click", function() {
                    if (K.datepicker._datepickerShowing && K.datepicker._lastInput === ai[0]) {
                        K.datepicker._hideDatepicker()
                    } else {
                        if (K.datepicker._datepickerShowing && K.datepicker._lastInput !== ai[0]) {
                            K.datepicker._hideDatepicker();
                            K.datepicker._showDatepicker(ai[0])
                        } else {
                            K.datepicker._showDatepicker(ai[0])
                        }
                    }
                    return false
                })
            }
        },
        _autoSize: function(am) {
            if (this._get(am, "autoSize") && !am.inline) {
                var aj, ah, ai, al, ak = new Date(2009, 12 - 1, 20),
                    ag = this._get(am, "dateFormat");
                if (ag.match(/[DM]/)) {
                    aj = function(an) {
                        ah = 0;
                        ai = 0;
                        for (al = 0; al < an.length; al++) {
                            if (an[al].length > ah) {
                                ah = an[al].length;
                                ai = al
                            }
                        }
                        return ai
                    };
                    ak.setMonth(aj(this._get(am, (ag.match(/MM/) ? "monthNames" : "monthNamesShort"))));
                    ak.setDate(aj(this._get(am, (ag.match(/DD/) ? "dayNames" : "dayNamesShort"))) + 20 - ak.getDay())
                }
                am.input.attr("size", this._formatDate(am, ak).length)
            }
        },
        _inlineDatepicker: function(ah, ag) {
            var ai = K(ah);
            if (ai.hasClass(this.markerClassName)) {
                return
            }
            ai.addClass(this.markerClassName).append(ag.dpDiv);
            K.data(ah, "datepicker", ag);
            this._setDate(ag, this._getDefaultDate(ag), true);
            this._updateDatepicker(ag);
            this._updateAlternate(ag);
            if (ag.settings.disabled) {
                this._disableDatepicker(ah)
            }
            ag.dpDiv.css("display", "block")
        },
        _dialogDatepicker: function(an, ah, al, ai, am) {
            var ag, aq, ak, ap, ao, aj = this._dialogInst;
            if (!aj) {
                this.uuid += 1;
                ag = "dp" + this.uuid;
                this._dialogInput = K("<input type='text' id='" + ag + "' style='position: absolute; top: -100px; width: 0px;'/>");
                this._dialogInput.on("keydown", this._doKeyDown);
                K("body").append(this._dialogInput);
                aj = this._dialogInst = this._newInst(this._dialogInput, false);
                aj.settings = {};
                K.data(this._dialogInput[0], "datepicker", aj)
            }
            F(aj.settings, ai || {});
            ah = (ah && ah.constructor === Date ? this._formatDate(aj, ah) : ah);
            this._dialogInput.val(ah);
            this._pos = (am ? (am.length ? am : [am.pageX, am.pageY]) : null);
            if (!this._pos) {
                aq = document.documentElement.clientWidth;
                ak = document.documentElement.clientHeight;
                ap = document.documentElement.scrollLeft || document.body.scrollLeft;
                ao = document.documentElement.scrollTop || document.body.scrollTop;
                this._pos = [(aq / 2) - 100 + ap, (ak / 2) - 150 + ao]
            }
            this._dialogInput.css("left", (this._pos[0] + 20) + "px").css("top", this._pos[1] + "px");
            aj.settings.onSelect = al;
            this._inDialog = true;
            this.dpDiv.addClass(this._dialogClass);
            this._showDatepicker(this._dialogInput[0]);
            if (K.blockUI) {
                K.blockUI(this.dpDiv)
            }
            K.data(this._dialogInput[0], "datepicker", aj);
            return this
        },
        _destroyDatepicker: function(ai) {
            var aj, ag = K(ai),
                ah = K.data(ai, "datepicker");
            if (!ag.hasClass(this.markerClassName)) {
                return
            }
            aj = ai.nodeName.toLowerCase();
            K.removeData(ai, "datepicker");
            if (aj === "input") {
                ah.append.remove();
                ah.trigger.remove();
                ag.removeClass(this.markerClassName).off("focus", this._showDatepicker).off("keydown", this._doKeyDown).off("keypress", this._doKeyPress).off("keyup", this._doKeyUp)
            } else {
                if (aj === "div" || aj === "span") {
                    ag.removeClass(this.markerClassName).empty()
                }
            }
            if (q === ah) {
                q = null
            }
        },
        _enableDatepicker: function(aj) {
            var ak, ai, ag = K(aj),
                ah = K.data(aj, "datepicker");
            if (!ag.hasClass(this.markerClassName)) {
                return
            }
            ak = aj.nodeName.toLowerCase();
            if (ak === "input") {
                aj.disabled = false;
                ah.trigger.filter("button").each(function() {
                    this.disabled = false
                }).end().filter("img").css({
                    opacity: "1.0",
                    cursor: ""
                })
            } else {
                if (ak === "div" || ak === "span") {
                    ai = ag.children("." + this._inlineClass);
                    ai.children().removeClass("ui-state-disabled");
                    ai.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", false)
                }
            }
            this._disabledInputs = K.map(this._disabledInputs, function(al) {
                return (al === aj ? null : al)
            })
        },
        _disableDatepicker: function(aj) {
            var ak, ai, ag = K(aj),
                ah = K.data(aj, "datepicker");
            if (!ag.hasClass(this.markerClassName)) {
                return
            }
            ak = aj.nodeName.toLowerCase();
            if (ak === "input") {
                aj.disabled = true;
                ah.trigger.filter("button").each(function() {
                    this.disabled = true
                }).end().filter("img").css({
                    opacity: "0.5",
                    cursor: "default"
                })
            } else {
                if (ak === "div" || ak === "span") {
                    ai = ag.children("." + this._inlineClass);
                    ai.children().addClass("ui-state-disabled");
                    ai.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", true)
                }
            }
            this._disabledInputs = K.map(this._disabledInputs, function(al) {
                return (al === aj ? null : al)
            });
            this._disabledInputs[this._disabledInputs.length] = aj
        },
        _isDisabledDatepicker: function(ah) {
            if (!ah) {
                return false
            }
            for (var ag = 0; ag < this._disabledInputs.length; ag++) {
                if (this._disabledInputs[ag] === ah) {
                    return true
                }
            }
            return false
        },
        _getInst: function(ah) {
            try {
                return K.data(ah, "datepicker")
            } catch (ag) {
                throw "Missing instance data for this datepicker"
            }
        },
        _optionDatepicker: function(am, ah, al) {
            var ai, ag, ak, an, aj = this._getInst(am);
            if (arguments.length === 2 && typeof ah === "string") {
                return (ah === "defaults" ? K.extend({}, K.datepicker._defaults) : (aj ? (ah === "all" ? K.extend({}, aj.settings) : this._get(aj, ah)) : null))
            }
            ai = ah || {};
            if (typeof ah === "string") {
                ai = {};
                ai[ah] = al
            }
            if (aj) {
                if (this._curInst === aj) {
                    this._hideDatepicker()
                }
                ag = this._getDateDatepicker(am, true);
                ak = this._getMinMaxDate(aj, "min");
                an = this._getMinMaxDate(aj, "max");
                F(aj.settings, ai);
                if (ak !== null && ai.dateFormat !== undefined && ai.minDate === undefined) {
                    aj.settings.minDate = this._formatDate(aj, ak)
                }
                if (an !== null && ai.dateFormat !== undefined && ai.maxDate === undefined) {
                    aj.settings.maxDate = this._formatDate(aj, an)
                }
                if ("disabled" in ai) {
                    if (ai.disabled) {
                        this._disableDatepicker(am)
                    } else {
                        this._enableDatepicker(am)
                    }
                }
                this._attachments(K(am), aj);
                this._autoSize(aj);
                this._setDate(aj, ag);
                this._updateAlternate(aj);
                this._updateDatepicker(aj)
            }
        },
        _changeDatepicker: function(ai, ag, ah) {
            this._optionDatepicker(ai, ag, ah)
        },
        _refreshDatepicker: function(ah) {
            var ag = this._getInst(ah);
            if (ag) {
                this._updateDatepicker(ag)
            }
        },
        _setDateDatepicker: function(ai, ag) {
            var ah = this._getInst(ai);
            if (ah) {
                this._setDate(ah, ag);
                this._updateDatepicker(ah);
                this._updateAlternate(ah)
            }
        },
        _getDateDatepicker: function(ai, ag) {
            var ah = this._getInst(ai);
            if (ah && !ah.inline) {
                this._setDateFromField(ah, ag)
            }
            return (ah ? this._getDate(ah) : null)
        },
        _doKeyDown: function(aj) {
            var ah, ag, al, ak = K.datepicker._getInst(aj.target),
                am = true,
                ai = ak.dpDiv.is(".ui-datepicker-rtl");
            ak._keyEvent = true;
            if (K.datepicker._datepickerShowing) {
                switch (aj.keyCode) {
                    case 9:
                        K.datepicker._hideDatepicker();
                        am = false;
                        break;
                    case 13:
                        al = K("td." + K.datepicker._dayOverClass + ":not(." + K.datepicker._currentClass + ")", ak.dpDiv);
                        if (al[0]) {
                            K.datepicker._selectDay(aj.target, ak.selectedMonth, ak.selectedYear, al[0])
                        }
                        ah = K.datepicker._get(ak, "onSelect");
                        if (ah) {
                            ag = K.datepicker._formatDate(ak);
                            ah.apply((ak.input ? ak.input[0] : null), [ag, ak])
                        } else {
                            K.datepicker._hideDatepicker()
                        }
                        return false;
                    case 27:
                        K.datepicker._hideDatepicker();
                        break;
                    case 33:
                        K.datepicker._adjustDate(aj.target, (aj.ctrlKey ? -K.datepicker._get(ak, "stepBigMonths") : -K.datepicker._get(ak, "stepMonths")), "M");
                        break;
                    case 34:
                        K.datepicker._adjustDate(aj.target, (aj.ctrlKey ? +K.datepicker._get(ak, "stepBigMonths") : +K.datepicker._get(ak, "stepMonths")), "M");
                        break;
                    case 35:
                        if (aj.ctrlKey || aj.metaKey) {
                            K.datepicker._clearDate(aj.target)
                        }
                        am = aj.ctrlKey || aj.metaKey;
                        break;
                    case 36:
                        if (aj.ctrlKey || aj.metaKey) {
                            K.datepicker._gotoToday(aj.target)
                        }
                        am = aj.ctrlKey || aj.metaKey;
                        break;
                    case 37:
                        if (aj.ctrlKey || aj.metaKey) {
                            K.datepicker._adjustDate(aj.target, (ai ? +1 : -1), "D")
                        }
                        am = aj.ctrlKey || aj.metaKey;
                        if (aj.originalEvent.altKey) {
                            K.datepicker._adjustDate(aj.target, (aj.ctrlKey ? -K.datepicker._get(ak, "stepBigMonths") : -K.datepicker._get(ak, "stepMonths")), "M")
                        }
                        break;
                    case 38:
                        if (aj.ctrlKey || aj.metaKey) {
                            K.datepicker._adjustDate(aj.target, -7, "D")
                        }
                        am = aj.ctrlKey || aj.metaKey;
                        break;
                    case 39:
                        if (aj.ctrlKey || aj.metaKey) {
                            K.datepicker._adjustDate(aj.target, (ai ? -1 : +1), "D")
                        }
                        am = aj.ctrlKey || aj.metaKey;
                        if (aj.originalEvent.altKey) {
                            K.datepicker._adjustDate(aj.target, (aj.ctrlKey ? +K.datepicker._get(ak, "stepBigMonths") : +K.datepicker._get(ak, "stepMonths")), "M")
                        }
                        break;
                    case 40:
                        if (aj.ctrlKey || aj.metaKey) {
                            K.datepicker._adjustDate(aj.target, +7, "D")
                        }
                        am = aj.ctrlKey || aj.metaKey;
                        break;
                    default:
                        am = false
                }
            } else {
                if (aj.keyCode === 36 && aj.ctrlKey) {
                    K.datepicker._showDatepicker(this)
                } else {
                    am = false
                }
            }
            if (am) {
                aj.preventDefault();
                aj.stopPropagation()
            }
        },
        _doKeyPress: function(ai) {
            var ah, ag, aj = K.datepicker._getInst(ai.target);
            if (K.datepicker._get(aj, "constrainInput")) {
                ah = K.datepicker._possibleChars(K.datepicker._get(aj, "dateFormat"));
                ag = String.fromCharCode(ai.charCode == null ? ai.keyCode : ai.charCode);
                return ai.ctrlKey || ai.metaKey || (ag < " " || !ah || ah.indexOf(ag) > -1)
            }
        },
        _doKeyUp: function(ai) {
            var ag, aj = K.datepicker._getInst(ai.target);
            if (aj.input.val() !== aj.lastVal) {
                try {
                    ag = K.datepicker.parseDate(K.datepicker._get(aj, "dateFormat"), (aj.input ? aj.input.val() : null), K.datepicker._getFormatConfig(aj));
                    if (ag) {
                        K.datepicker._setDateFromField(aj);
                        K.datepicker._updateAlternate(aj);
                        K.datepicker._updateDatepicker(aj)
                    }
                } catch (ah) {}
            }
            return true
        },
        _showDatepicker: function(ah) {
            ah = ah.target || ah;
            if (ah.nodeName.toLowerCase() !== "input") {
                ah = K("input", ah.parentNode)[0]
            }
            if (K.datepicker._isDisabledDatepicker(ah) || K.datepicker._lastInput === ah) {
                return
            }
            var aj, an, ai, al, am, ag, ak;
            aj = K.datepicker._getInst(ah);
            if (K.datepicker._curInst && K.datepicker._curInst !== aj) {
                K.datepicker._curInst.dpDiv.stop(true, true);
                if (aj && K.datepicker._datepickerShowing) {
                    K.datepicker._hideDatepicker(K.datepicker._curInst.input[0])
                }
            }
            an = K.datepicker._get(aj, "beforeShow");
            ai = an ? an.apply(ah, [ah, aj]) : {};
            if (ai === false) {
                return
            }
            F(aj.settings, ai);
            aj.lastVal = null;
            K.datepicker._lastInput = ah;
            K.datepicker._setDateFromField(aj);
            if (K.datepicker._inDialog) {
                ah.value = ""
            }
            if (!K.datepicker._pos) {
                K.datepicker._pos = K.datepicker._findPos(ah);
                K.datepicker._pos[1] += ah.offsetHeight
            }
            al = false;
            K(ah).parents().each(function() {
                al |= K(this).css("position") === "fixed";
                return !al
            });
            am = {
                left: K.datepicker._pos[0],
                top: K.datepicker._pos[1]
            };
            K.datepicker._pos = null;
            aj.dpDiv.empty();
            aj.dpDiv.css({
                position: "absolute",
                display: "block",
                top: "-1000px"
            });
            K.datepicker._updateDatepicker(aj);
            am = K.datepicker._checkOffset(aj, am, al);
            aj.dpDiv.css({
                position: (K.datepicker._inDialog && K.blockUI ? "static" : (al ? "fixed" : "absolute")),
                display: "none",
                left: am.left + "px",
                top: am.top + "px"
            });
            if (!aj.inline) {
                ag = K.datepicker._get(aj, "showAnim");
                ak = K.datepicker._get(aj, "duration");
                aj.dpDiv.css("z-index", y(K(ah)) + 1);
                K.datepicker._datepickerShowing = true;
                if (K.effects && K.effects.effect[ag]) {
                    aj.dpDiv.show(ag, K.datepicker._get(aj, "showOptions"), ak)
                } else {
                    aj.dpDiv[ag || "show"](ag ? ak : null)
                }
                if (K.datepicker._shouldFocusInput(aj)) {
                    aj.input.trigger("focus")
                }
                K.datepicker._curInst = aj
            }
        },
        _updateDatepicker: function(aj) {
            this.maxRows = 4;
            q = aj;
            aj.dpDiv.empty().append(this._generateHTML(aj));
            this._attachHandlers(aj);
            var al, ag = this._getNumberOfMonths(aj),
                ak = ag[1],
                ai = 17,
                ah = aj.dpDiv.find("." + this._dayOverClass + " a");
            if (ah.length > 0) {
                v.apply(ah.get(0))
            }
            aj.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width("");
            if (ak > 1) {
                aj.dpDiv.addClass("ui-datepicker-multi-" + ak).css("width", (ai * ak) + "em")
            }
            aj.dpDiv[(ag[0] !== 1 || ag[1] !== 1 ? "add" : "remove") + "Class"]("ui-datepicker-multi");
            aj.dpDiv[(this._get(aj, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl");
            if (aj === K.datepicker._curInst && K.datepicker._datepickerShowing && K.datepicker._shouldFocusInput(aj)) {
                aj.input.trigger("focus")
            }
            if (aj.yearshtml) {
                al = aj.yearshtml;
                setTimeout(function() {
                    if (al === aj.yearshtml && aj.yearshtml) {
                        aj.dpDiv.find("select.ui-datepicker-year:first").replaceWith(aj.yearshtml)
                    }
                    al = aj.yearshtml = null
                }, 0)
            }
        },
        _shouldFocusInput: function(ag) {
            return ag.input && ag.input.is(":visible") && !ag.input.is(":disabled") && !ag.input.is(":focus")
        },
        _checkOffset: function(al, aj, ai) {
            var ak = al.dpDiv.outerWidth(),
                ao = al.dpDiv.outerHeight(),
                an = al.input ? al.input.outerWidth() : 0,
                ag = al.input ? al.input.outerHeight() : 0,
                am = document.documentElement.clientWidth + (ai ? 0 : K(document).scrollLeft()),
                ah = document.documentElement.clientHeight + (ai ? 0 : K(document).scrollTop());
            aj.left -= (this._get(al, "isRTL") ? (ak - an) : 0);
            aj.left -= (ai && aj.left === al.input.offset().left) ? K(document).scrollLeft() : 0;
            aj.top -= (ai && aj.top === (al.input.offset().top + ag)) ? K(document).scrollTop() : 0;
            aj.left -= Math.min(aj.left, (aj.left + ak > am && am > ak) ? Math.abs(aj.left + ak - am) : 0);
            aj.top -= Math.min(aj.top, (aj.top + ao > ah && ah > ao) ? Math.abs(ao + ag) : 0);
            return aj
        },
        _findPos: function(aj) {
            var ag, ai = this._getInst(aj),
                ah = this._get(ai, "isRTL");
            while (aj && (aj.type === "hidden" || aj.nodeType !== 1 || K.expr.filters.hidden(aj))) {
                aj = aj[ah ? "previousSibling" : "nextSibling"]
            }
            ag = K(aj).offset();
            return [ag.left, ag.top]
        },
        _hideDatepicker: function(ai) {
            var ah, al, ak, ag, aj = this._curInst;
            if (!aj || (ai && aj !== K.data(ai, "datepicker"))) {
                return
            }
            if (this._datepickerShowing) {
                ah = this._get(aj, "showAnim");
                al = this._get(aj, "duration");
                ak = function() {
                    K.datepicker._tidyDialog(aj)
                };
                if (K.effects && (K.effects.effect[ah] || K.effects[ah])) {
                    aj.dpDiv.hide(ah, K.datepicker._get(aj, "showOptions"), al, ak)
                } else {
                    aj.dpDiv[(ah === "slideDown" ? "slideUp" : (ah === "fadeIn" ? "fadeOut" : "hide"))]((ah ? al : null), ak)
                }
                if (!ah) {
                    ak()
                }
                this._datepickerShowing = false;
                ag = this._get(aj, "onClose");
                if (ag) {
                    ag.apply((aj.input ? aj.input[0] : null), [(aj.input ? aj.input.val() : ""), aj])
                }
                this._lastInput = null;
                if (this._inDialog) {
                    this._dialogInput.css({
                        position: "absolute",
                        left: "0",
                        top: "-100px"
                    });
                    if (K.blockUI) {
                        K.unblockUI();
                        K("body").append(this.dpDiv)
                    }
                }
                this._inDialog = false
            }
        },
        _tidyDialog: function(ag) {
            ag.dpDiv.removeClass(this._dialogClass).off(".ui-datepicker-calendar")
        },
        _checkExternalClick: function(ah) {
            if (!K.datepicker._curInst) {
                return
            }
            var ag = K(ah.target),
                ai = K.datepicker._getInst(ag[0]);
            if (((ag[0].id !== K.datepicker._mainDivId && ag.parents("#" + K.datepicker._mainDivId).length === 0 && !ag.hasClass(K.datepicker.markerClassName) && !ag.closest("." + K.datepicker._triggerClass).length && K.datepicker._datepickerShowing && !(K.datepicker._inDialog && K.blockUI))) || (ag.hasClass(K.datepicker.markerClassName) && K.datepicker._curInst !== ai)) {
                K.datepicker._hideDatepicker()
            }
        },
        _adjustDate: function(ak, aj, ai) {
            var ah = K(ak),
                ag = this._getInst(ah[0]);
            if (this._isDisabledDatepicker(ah[0])) {
                return
            }
            this._adjustInstDate(ag, aj + (ai === "M" ? this._get(ag, "showCurrentAtPos") : 0), ai);
            this._updateDatepicker(ag)
        },
        _gotoToday: function(aj) {
            var ag, ai = K(aj),
                ah = this._getInst(ai[0]);
            if (this._get(ah, "gotoCurrent") && ah.currentDay) {
                ah.selectedDay = ah.currentDay;
                ah.drawMonth = ah.selectedMonth = ah.currentMonth;
                ah.drawYear = ah.selectedYear = ah.currentYear
            } else {
                ag = new Date();
                ah.selectedDay = ag.getDate();
                ah.drawMonth = ah.selectedMonth = ag.getMonth();
                ah.drawYear = ah.selectedYear = ag.getFullYear()
            }
            this._notifyChange(ah);
            this._adjustDate(ai)
        },
        _selectMonthYear: function(ak, ag, aj) {
            var ai = K(ak),
                ah = this._getInst(ai[0]);
            ah["selected" + (aj === "M" ? "Month" : "Year")] = ah["draw" + (aj === "M" ? "Month" : "Year")] = parseInt(ag.options[ag.selectedIndex].value, 10);
            this._notifyChange(ah);
            this._adjustDate(ai)
        },
        _selectDay: function(al, aj, ag, ak) {
            var ah, ai = K(al);
            if (K(ak).hasClass(this._unselectableClass) || this._isDisabledDatepicker(ai[0])) {
                return
            }
            ah = this._getInst(ai[0]);
            ah.selectedDay = ah.currentDay = K("a", ak).html();
            ah.selectedMonth = ah.currentMonth = aj;
            ah.selectedYear = ah.currentYear = ag;
            this._selectDate(al, this._formatDate(ah, ah.currentDay, ah.currentMonth, ah.currentYear))
        },
        _clearDate: function(ah) {
            var ag = K(ah);
            this._selectDate(ag, "")
        },
        _selectDate: function(ak, ag) {
            var ah, aj = K(ak),
                ai = this._getInst(aj[0]);
            ag = (ag != null ? ag : this._formatDate(ai));
            if (ai.input) {
                ai.input.val(ag)
            }
            this._updateAlternate(ai);
            ah = this._get(ai, "onSelect");
            if (ah) {
                ah.apply((ai.input ? ai.input[0] : null), [ag, ai])
            } else {
                if (ai.input) {
                    ai.input.trigger("change")
                }
            }
            if (ai.inline) {
                this._updateDatepicker(ai)
            } else {
                this._hideDatepicker();
                this._lastInput = ai.input[0];
                if (typeof(ai.input[0]) !== "object") {
                    ai.input.trigger("focus")
                }
                this._lastInput = null
            }
        },
        _updateAlternate: function(ak) {
            var aj, ai, ag, ah = this._get(ak, "altField");
            if (ah) {
                aj = this._get(ak, "altFormat") || this._get(ak, "dateFormat");
                ai = this._getDate(ak);
                ag = this.formatDate(aj, ai, this._getFormatConfig(ak));
                K(ah).val(ag)
            }
        },
        noWeekends: function(ah) {
            var ag = ah.getDay();
            return [(ag > 0 && ag < 6), ""]
        },
        iso8601Week: function(ag) {
            var ah, ai = new Date(ag.getTime());
            ai.setDate(ai.getDate() + 4 - (ai.getDay() || 7));
            ah = ai.getTime();
            ai.setMonth(0);
            ai.setDate(1);
            return Math.floor(Math.round((ah - ai) / 86400000) / 7) + 1
        },
        parseDate: function(ax, ar, az) {
            if (ax == null || ar == null) {
                throw "Invalid arguments"
            }
            ar = (typeof ar === "object" ? ar.toString() : ar + "");
            if (ar === "") {
                return null
            }
            var aj, au, ah, ay = 0,
                am = (az ? az.shortYearCutoff : null) || this._defaults.shortYearCutoff,
                ai = (typeof am !== "string" ? am : new Date().getFullYear() % 100 + parseInt(am, 10)),
                ap = (az ? az.dayNamesShort : null) || this._defaults.dayNamesShort,
                aB = (az ? az.dayNames : null) || this._defaults.dayNames,
                ag = (az ? az.monthNamesShort : null) || this._defaults.monthNamesShort,
                ak = (az ? az.monthNames : null) || this._defaults.monthNames,
                al = -1,
                aC = -1,
                aw = -1,
                ao = -1,
                av = false,
                aA, aq = function(aE) {
                    var aF = (aj + 1 < ax.length && ax.charAt(aj + 1) === aE);
                    if (aF) {
                        aj++
                    }
                    return aF
                },
                aD = function(aG) {
                    var aE = aq(aG),
                        aH = (aG === "@" ? 14 : (aG === "!" ? 20 : (aG === "y" && aE ? 4 : (aG === "o" ? 3 : 2)))),
                        aJ = (aG === "y" ? aH : 1),
                        aI = new RegExp("^\\d{" + aJ + "," + aH + "}"),
                        aF = ar.substring(ay).match(aI);
                    if (!aF) {
                        throw "Missing number at position " + ay
                    }
                    ay += aF[0].length;
                    return parseInt(aF[0], 10)
                },
                an = function(aF, aG, aI) {
                    var aE = -1,
                        aH = K.map(aq(aF) ? aI : aG, function(aK, aJ) {
                            return [
                                [aJ, aK]
                            ]
                        }).sort(function(aK, aJ) {
                            return -(aK[1].length - aJ[1].length)
                        });
                    K.each(aH, function(aK, aL) {
                        var aJ = aL[1];
                        if (ar.substr(ay, aJ.length).toLowerCase() === aJ.toLowerCase()) {
                            aE = aL[0];
                            ay += aJ.length;
                            return false
                        }
                    });
                    if (aE !== -1) {
                        return aE + 1
                    } else {
                        throw "Unknown name at position " + ay
                    }
                },
                at = function() {
                    if (ar.charAt(ay) !== ax.charAt(aj)) {
                        throw "Unexpected literal at position " + ay
                    }
                    ay++
                };
            for (aj = 0; aj < ax.length; aj++) {
                if (av) {
                    if (ax.charAt(aj) === "'" && !aq("'")) {
                        av = false
                    } else {
                        at()
                    }
                } else {
                    switch (ax.charAt(aj)) {
                        case "d":
                            aw = aD("d");
                            break;
                        case "D":
                            an("D", ap, aB);
                            break;
                        case "o":
                            ao = aD("o");
                            break;
                        case "m":
                            aC = aD("m");
                            break;
                        case "M":
                            aC = an("M", ag, ak);
                            break;
                        case "y":
                            al = aD("y");
                            break;
                        case "@":
                            aA = new Date(aD("@"));
                            al = aA.getFullYear();
                            aC = aA.getMonth() + 1;
                            aw = aA.getDate();
                            break;
                        case "!":
                            aA = new Date((aD("!") - this._ticksTo1970) / 10000);
                            al = aA.getFullYear();
                            aC = aA.getMonth() + 1;
                            aw = aA.getDate();
                            break;
                        case "'":
                            if (aq("'")) {
                                at()
                            } else {
                                av = true
                            }
                            break;
                        default:
                            at()
                    }
                }
            }
            if (ay < ar.length) {
                ah = ar.substr(ay);
                if (!/^\s+/.test(ah)) {
                    throw "Extra/unparsed characters found in date: " + ah
                }
            }
            if (al === -1) {
                al = new Date().getFullYear()
            } else {
                if (al < 100) {
                    al += new Date().getFullYear() - new Date().getFullYear() % 100 + (al <= ai ? 0 : -100)
                }
            }
            if (ao > -1) {
                aC = 1;
                aw = ao;
                do {
                    au = this._getDaysInMonth(al, aC - 1);
                    if (aw <= au) {
                        break
                    }
                    aC++;
                    aw -= au
                } while (true)
            }
            aA = this._daylightSavingAdjust(new Date(al, aC - 1, aw));
            if (aA.getFullYear() !== al || aA.getMonth() + 1 !== aC || aA.getDate() !== aw) {
                throw "Invalid date"
            }
            return aA
        },
        ATOM: "yy-mm-dd",
        COOKIE: "D, dd M yy",
        ISO_8601: "yy-mm-dd",
        RFC_822: "D, d M y",
        RFC_850: "DD, dd-M-y",
        RFC_1036: "D, d M y",
        RFC_1123: "D, d M yy",
        RFC_2822: "D, d M yy",
        RSS: "D, d M y",
        TICKS: "!",
        TIMESTAMP: "@",
        W3C: "yy-mm-dd",
        _ticksTo1970: (((1970 - 1) * 365 + Math.floor(1970 / 4) - Math.floor(1970 / 100) + Math.floor(1970 / 400)) * 24 * 60 * 60 * 10000000),
        formatDate: function(ap, aj, ak) {
            if (!aj) {
                return ""
            }
            var ar, at = (ak ? ak.dayNamesShort : null) || this._defaults.dayNamesShort,
                ah = (ak ? ak.dayNames : null) || this._defaults.dayNames,
                an = (ak ? ak.monthNamesShort : null) || this._defaults.monthNamesShort,
                al = (ak ? ak.monthNames : null) || this._defaults.monthNames,
                aq = function(au) {
                    var av = (ar + 1 < ap.length && ap.charAt(ar + 1) === au);
                    if (av) {
                        ar++
                    }
                    return av
                },
                ag = function(aw, ax, au) {
                    var av = "" + ax;
                    if (aq(aw)) {
                        while (av.length < au) {
                            av = "0" + av
                        }
                    }
                    return av
                },
                am = function(au, aw, av, ax) {
                    return (aq(au) ? ax[aw] : av[aw])
                },
                ai = "",
                ao = false;
            if (aj) {
                for (ar = 0; ar < ap.length; ar++) {
                    if (ao) {
                        if (ap.charAt(ar) === "'" && !aq("'")) {
                            ao = false
                        } else {
                            ai += ap.charAt(ar)
                        }
                    } else {
                        switch (ap.charAt(ar)) {
                            case "d":
                                ai += ag("d", aj.getDate(), 2);
                                break;
                            case "D":
                                ai += am("D", aj.getDay(), at, ah);
                                break;
                            case "o":
                                ai += ag("o", Math.round((new Date(aj.getFullYear(), aj.getMonth(), aj.getDate()).getTime() - new Date(aj.getFullYear(), 0, 0).getTime()) / 86400000), 3);
                                break;
                            case "m":
                                ai += ag("m", aj.getMonth() + 1, 2);
                                break;
                            case "M":
                                ai += am("M", aj.getMonth(), an, al);
                                break;
                            case "y":
                                ai += (aq("y") ? aj.getFullYear() : (aj.getFullYear() % 100 < 10 ? "0" : "") + aj.getFullYear() % 100);
                                break;
                            case "@":
                                ai += aj.getTime();
                                break;
                            case "!":
                                ai += aj.getTime() * 10000 + this._ticksTo1970;
                                break;
                            case "'":
                                if (aq("'")) {
                                    ai += "'"
                                } else {
                                    ao = true
                                }
                                break;
                            default:
                                ai += ap.charAt(ar)
                        }
                    }
                }
            }
            return ai
        },
        _possibleChars: function(ak) {
            var aj, ai = "",
                ah = false,
                ag = function(al) {
                    var am = (aj + 1 < ak.length && ak.charAt(aj + 1) === al);
                    if (am) {
                        aj++
                    }
                    return am
                };
            for (aj = 0; aj < ak.length; aj++) {
                if (ah) {
                    if (ak.charAt(aj) === "'" && !ag("'")) {
                        ah = false
                    } else {
                        ai += ak.charAt(aj)
                    }
                } else {
                    switch (ak.charAt(aj)) {
                        case "d":
                        case "m":
                        case "y":
                        case "@":
                            ai += "0123456789";
                            break;
                        case "D":
                        case "M":
                            return null;
                        case "'":
                            if (ag("'")) {
                                ai += "'"
                            } else {
                                ah = true
                            }
                            break;
                        default:
                            ai += ak.charAt(aj)
                    }
                }
            }
            return ai
        },
        _get: function(ah, ag) {
            return ah.settings[ag] !== undefined ? ah.settings[ag] : this._defaults[ag]
        },
        _setDateFromField: function(al, ai) {
            if (al.input.val() === al.lastVal) {
                return
            }
            var ag = this._get(al, "dateFormat"),
                an = al.lastVal = al.input ? al.input.val() : null,
                am = this._getDefaultDate(al),
                ah = am,
                aj = this._getFormatConfig(al);
            try {
                ah = this.parseDate(ag, an, aj) || am
            } catch (ak) {
                an = (ai ? "" : an)
            }
            al.selectedDay = ah.getDate();
            al.drawMonth = al.selectedMonth = ah.getMonth();
            al.drawYear = al.selectedYear = ah.getFullYear();
            al.currentDay = (an ? ah.getDate() : 0);
            al.currentMonth = (an ? ah.getMonth() : 0);
            al.currentYear = (an ? ah.getFullYear() : 0);
            this._adjustInstDate(al)
        },
        _getDefaultDate: function(ag) {
            return this._restrictMinMax(ag, this._determineDate(ag, this._get(ag, "defaultDate"), new Date()))
        },
        _determineDate: function(ak, ah, al) {
            var aj = function(an) {
                    var am = new Date();
                    am.setDate(am.getDate() + an);
                    return am
                },
                ai = function(au) {
                    try {
                        return K.datepicker.parseDate(K.datepicker._get(ak, "dateFormat"), au, K.datepicker._getFormatConfig(ak))
                    } catch (at) {}
                    var an = (au.toLowerCase().match(/^c/) ? K.datepicker._getDate(ak) : null) || new Date(),
                        ao = an.getFullYear(),
                        ar = an.getMonth(),
                        am = an.getDate(),
                        aq = /([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,
                        ap = aq.exec(au);
                    while (ap) {
                        switch (ap[2] || "d") {
                            case "d":
                            case "D":
                                am += parseInt(ap[1], 10);
                                break;
                            case "w":
                            case "W":
                                am += parseInt(ap[1], 10) * 7;
                                break;
                            case "m":
                            case "M":
                                ar += parseInt(ap[1], 10);
                                am = Math.min(am, K.datepicker._getDaysInMonth(ao, ar));
                                break;
                            case "y":
                            case "Y":
                                ao += parseInt(ap[1], 10);
                                am = Math.min(am, K.datepicker._getDaysInMonth(ao, ar));
                                break
                        }
                        ap = aq.exec(au)
                    }
                    return new Date(ao, ar, am)
                },
                ag = (ah == null || ah === "" ? al : (typeof ah === "string" ? ai(ah) : (typeof ah === "number" ? (isNaN(ah) ? al : aj(ah)) : new Date(ah.getTime()))));
            ag = (ag && ag.toString() === "Invalid Date" ? al : ag);
            if (ag) {
                ag.setHours(0);
                ag.setMinutes(0);
                ag.setSeconds(0);
                ag.setMilliseconds(0)
            }
            return this._daylightSavingAdjust(ag)
        },
        _daylightSavingAdjust: function(ag) {
            if (!ag) {
                return null
            }
            ag.setHours(ag.getHours() > 12 ? ag.getHours() + 2 : 0);
            return ag
        },
        _setDate: function(am, aj, al) {
            var ag = !aj,
                ai = am.selectedMonth,
                ak = am.selectedYear,
                ah = this._restrictMinMax(am, this._determineDate(am, aj, new Date()));
            am.selectedDay = am.currentDay = ah.getDate();
            am.drawMonth = am.selectedMonth = am.currentMonth = ah.getMonth();
            am.drawYear = am.selectedYear = am.currentYear = ah.getFullYear();
            if ((ai !== am.selectedMonth || ak !== am.selectedYear) && !al) {
                this._notifyChange(am)
            }
            this._adjustInstDate(am);
            if (am.input) {
                am.input.val(ag ? "" : this._formatDate(am))
            }
        },
        _getDate: function(ah) {
            var ag = (!ah.currentYear || (ah.input && ah.input.val() === "") ? null : this._daylightSavingAdjust(new Date(ah.currentYear, ah.currentMonth, ah.currentDay)));
            return ag
        },
        _attachHandlers: function(ah) {
            var ag = this._get(ah, "stepMonths"),
                ai = "#" + ah.id.replace(/\\\\/g, "\\");
            ah.dpDiv.find("[data-handler]").map(function() {
                var aj = {
                    prev: function() {
                        K.datepicker._adjustDate(ai, -ag, "M")
                    },
                    next: function() {
                        K.datepicker._adjustDate(ai, +ag, "M")
                    },
                    hide: function() {
                        K.datepicker._hideDatepicker()
                    },
                    today: function() {
                        K.datepicker._gotoToday(ai)
                    },
                    selectDay: function() {
                        K.datepicker._selectDay(ai, +this.getAttribute("data-month"), +this.getAttribute("data-year"), this);
                        return false
                    },
                    selectMonth: function() {
                        K.datepicker._selectMonthYear(ai, this, "M");
                        return false
                    },
                    selectYear: function() {
                        K.datepicker._selectMonthYear(ai, this, "Y");
                        return false
                    }
                };
                K(this).on(this.getAttribute("data-event"), aj[this.getAttribute("data-handler")])
            })
        },
        _generateHTML: function(aX) {
            var aA, az, aS, aK, ak, a1, aV, aO, a4, aI, a8, ar, au, at, ah, a0, ap, aD, a3, aQ, a9, aC, aH, aq, al, aT, aM, aP, aN, ao, aF, av, aW, aZ, aj, a2, a6, aL, aw, aY = new Date(),
                aB = this._daylightSavingAdjust(new Date(aY.getFullYear(), aY.getMonth(), aY.getDate())),
                a5 = this._get(aX, "isRTL"),
                a7 = this._get(aX, "showButtonPanel"),
                aR = this._get(aX, "hideIfNoPrevNext"),
                aG = this._get(aX, "navigationAsDateFormat"),
                ax = this._getNumberOfMonths(aX),
                an = this._get(aX, "showCurrentAtPos"),
                aJ = this._get(aX, "stepMonths"),
                aE = (ax[0] !== 1 || ax[1] !== 1),
                ai = this._daylightSavingAdjust((!aX.currentDay ? new Date(9999, 9, 9) : new Date(aX.currentYear, aX.currentMonth, aX.currentDay))),
                am = this._getMinMaxDate(aX, "min"),
                ay = this._getMinMaxDate(aX, "max"),
                ag = aX.drawMonth - an,
                aU = aX.drawYear;
            if (ag < 0) {
                ag += 12;
                aU--
            }
            if (ay) {
                aA = this._daylightSavingAdjust(new Date(ay.getFullYear(), ay.getMonth() - (ax[0] * ax[1]) + 1, ay.getDate()));
                aA = (am && aA < am ? am : aA);
                while (this._daylightSavingAdjust(new Date(aU, ag, 1)) > aA) {
                    ag--;
                    if (ag < 0) {
                        ag = 11;
                        aU--
                    }
                }
            }
            aX.drawMonth = ag;
            aX.drawYear = aU;
            az = this._get(aX, "prevText");
            az = (!aG ? az : this.formatDate(az, this._daylightSavingAdjust(new Date(aU, ag - aJ, 1)), this._getFormatConfig(aX)));
            aS = (this._canAdjustMonth(aX, -1, aU, ag) ? "<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='" + az + "'><span class='ui-icon ui-icon-circle-triangle-" + (a5 ? "e" : "w") + "'>" + az + "</span></a>" : (aR ? "" : "<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='" + az + "'><span class='ui-icon ui-icon-circle-triangle-" + (a5 ? "e" : "w") + "'>" + az + "</span></a>"));
            aK = this._get(aX, "nextText");
            aK = (!aG ? aK : this.formatDate(aK, this._daylightSavingAdjust(new Date(aU, ag + aJ, 1)), this._getFormatConfig(aX)));
            ak = (this._canAdjustMonth(aX, +1, aU, ag) ? "<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='" + aK + "'><span class='ui-icon ui-icon-circle-triangle-" + (a5 ? "w" : "e") + "'>" + aK + "</span></a>" : (aR ? "" : "<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='" + aK + "'><span class='ui-icon ui-icon-circle-triangle-" + (a5 ? "w" : "e") + "'>" + aK + "</span></a>"));
            a1 = this._get(aX, "currentText");
            aV = (this._get(aX, "gotoCurrent") && aX.currentDay ? ai : aB);
            a1 = (!aG ? a1 : this.formatDate(a1, aV, this._getFormatConfig(aX)));
            aO = (!aX.inline ? "<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>" + this._get(aX, "closeText") + "</button>" : "");
            a4 = (a7) ? "<div class='ui-datepicker-buttonpane ui-widget-content'>" + (a5 ? aO : "") + (this._isInRange(aX, aV) ? "<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>" + a1 + "</button>" : "") + (a5 ? "" : aO) + "</div>" : "";
            aI = parseInt(this._get(aX, "firstDay"), 10);
            aI = (isNaN(aI) ? 0 : aI);
            a8 = this._get(aX, "showWeek");
            ar = this._get(aX, "dayNames");
            au = this._get(aX, "dayNamesMin");
            at = this._get(aX, "monthNames");
            ah = this._get(aX, "monthNamesShort");
            a0 = this._get(aX, "beforeShowDay");
            ap = this._get(aX, "showOtherMonths");
            aD = this._get(aX, "selectOtherMonths");
            a3 = this._getDefaultDate(aX);
            aQ = "";
            for (aC = 0; aC < ax[0]; aC++) {
                aH = "";
                this.maxRows = 4;
                for (aq = 0; aq < ax[1]; aq++) {
                    al = this._daylightSavingAdjust(new Date(aU, ag, aX.selectedDay));
                    aT = " ui-corner-all";
                    aM = "";
                    if (aE) {
                        aM += "<div class='ui-datepicker-group";
                        if (ax[1] > 1) {
                            switch (aq) {
                                case 0:
                                    aM += " ui-datepicker-group-first";
                                    aT = " ui-corner-" + (a5 ? "right" : "left");
                                    break;
                                case ax[1] - 1:
                                    aM += " ui-datepicker-group-last";
                                    aT = " ui-corner-" + (a5 ? "left" : "right");
                                    break;
                                default:
                                    aM += " ui-datepicker-group-middle";
                                    aT = "";
                                    break
                            }
                        }
                        aM += "'>"
                    }
                    aM += "<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix" + aT + "'>" + (/all|left/.test(aT) && aC === 0 ? (a5 ? ak : aS) : "") + (/all|right/.test(aT) && aC === 0 ? (a5 ? aS : ak) : "") + this._generateMonthYearHeader(aX, ag, aU, am, ay, aC > 0 || aq > 0, at, ah) + "</div><table class='ui-datepicker-calendar'><thead><tr>";
                    aP = (a8 ? "<th class='ui-datepicker-week-col'>" + this._get(aX, "weekHeader") + "</th>" : "");
                    for (a9 = 0; a9 < 7; a9++) {
                        aN = (a9 + aI) % 7;
                        aP += "<th scope='col'" + ((a9 + aI + 6) % 7 >= 5 ? " class='ui-datepicker-week-end'" : "") + "><span title='" + ar[aN] + "'>" + au[aN] + "</span></th>"
                    }
                    aM += aP + "</tr></thead><tbody>";
                    ao = this._getDaysInMonth(aU, ag);
                    if (aU === aX.selectedYear && ag === aX.selectedMonth) {
                        aX.selectedDay = Math.min(aX.selectedDay, ao)
                    }
                    aF = (this._getFirstDayOfMonth(aU, ag) - aI + 7) % 7;
                    av = Math.ceil((aF + ao) / 7);
                    aW = (aE ? this.maxRows > av ? this.maxRows : av : av);
                    this.maxRows = aW;
                    aZ = this._daylightSavingAdjust(new Date(aU, ag, 1 - aF));
                    for (aj = 0; aj < aW; aj++) {
                        aM += "<tr>";
                        a2 = (!a8 ? "" : "<td class='ui-datepicker-week-col'>" + this._get(aX, "calculateWeek")(aZ) + "</td>");
                        for (a9 = 0; a9 < 7; a9++) {
                            a6 = (a0 ? a0.apply((aX.input ? aX.input[0] : null), [aZ]) : [true, ""]);
                            aL = (aZ.getMonth() !== ag);
                            aw = (aL && !aD) || !a6[0] || (am && aZ < am) || (ay && aZ > ay);
                            a2 += "<td class='" + ((a9 + aI + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (aL ? " ui-datepicker-other-month" : "") + ((aZ.getTime() === al.getTime() && ag === aX.selectedMonth && aX._keyEvent) || (a3.getTime() === aZ.getTime() && a3.getTime() === al.getTime()) ? " " + this._dayOverClass : "") + (aw ? " " + this._unselectableClass + " ui-state-disabled" : "") + (aL && !ap ? "" : " " + a6[1] + (aZ.getTime() === ai.getTime() ? " " + this._currentClass : "") + (aZ.getTime() === aB.getTime() ? " ui-datepicker-today" : "")) + "'" + ((!aL || ap) && a6[2] ? " title='" + a6[2].replace(/'/g, "&#39;") + "'" : "") + (aw ? "" : " data-handler='selectDay' data-event='click' data-month='" + aZ.getMonth() + "' data-year='" + aZ.getFullYear() + "'") + ">" + (aL && !ap ? "&#xa0;" : (aw ? "<span class='ui-state-default'>" + aZ.getDate() + "</span>" : "<a class='ui-state-default" + (aZ.getTime() === aB.getTime() ? " ui-state-highlight" : "") + (aZ.getTime() === ai.getTime() ? " ui-state-active" : "") + (aL ? " ui-priority-secondary" : "") + "' href='#'>" + aZ.getDate() + "</a>")) + "</td>";
                            aZ.setDate(aZ.getDate() + 1);
                            aZ = this._daylightSavingAdjust(aZ)
                        }
                        aM += a2 + "</tr>"
                    }
                    ag++;
                    if (ag > 11) {
                        ag = 0;
                        aU++
                    }
                    aM += "</tbody></table>" + (aE ? "</div>" + ((ax[0] > 0 && aq === ax[1] - 1) ? "<div class='ui-datepicker-row-break'></div>" : "") : "");
                    aH += aM
                }
                aQ += aH
            }
            aQ += a4;
            aX._keyEvent = false;
            return aQ
        },
        _generateMonthYearHeader: function(ak, ai, at, am, aq, au, ao, ag) {
            var ay, ah, az, aw, al, av, ar, an, aj = this._get(ak, "changeMonth"),
                aA = this._get(ak, "changeYear"),
                aB = this._get(ak, "showMonthAfterYear"),
                ap = "<div class='ui-datepicker-title'>",
                ax = "";
            if (au || !aj) {
                ax += "<span class='ui-datepicker-month'>" + ao[ai] + "</span>"
            } else {
                ay = (am && am.getFullYear() === at);
                ah = (aq && aq.getFullYear() === at);
                ax += "<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>";
                for (az = 0; az < 12; az++) {
                    if ((!ay || az >= am.getMonth()) && (!ah || az <= aq.getMonth())) {
                        ax += "<option value='" + az + "'" + (az === ai ? " selected='selected'" : "") + ">" + ag[az] + "</option>"
                    }
                }
                ax += "</select>"
            }
            if (!aB) {
                ap += ax + (au || !(aj && aA) ? "&#xa0;" : "")
            }
            if (!ak.yearshtml) {
                ak.yearshtml = "";
                if (au || !aA) {
                    ap += "<span class='ui-datepicker-year'>" + at + "</span>"
                } else {
                    aw = this._get(ak, "yearRange").split(":");
                    al = new Date().getFullYear();
                    av = function(aD) {
                        var aC = (aD.match(/c[+\-].*/) ? at + parseInt(aD.substring(1), 10) : (aD.match(/[+\-].*/) ? al + parseInt(aD, 10) : parseInt(aD, 10)));
                        return (isNaN(aC) ? al : aC)
                    };
                    ar = av(aw[0]);
                    an = Math.max(ar, av(aw[1] || ""));
                    ar = (am ? Math.max(ar, am.getFullYear()) : ar);
                    an = (aq ? Math.min(an, aq.getFullYear()) : an);
                    ak.yearshtml += "<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>";
                    for (; ar <= an; ar++) {
                        ak.yearshtml += "<option value='" + ar + "'" + (ar === at ? " selected='selected'" : "") + ">" + ar + "</option>"
                    }
                    ak.yearshtml += "</select>";
                    ap += ak.yearshtml;
                    ak.yearshtml = null
                }
            }
            ap += this._get(ak, "yearSuffix");
            if (aB) {
                ap += (au || !(aj && aA) ? "&#xa0;" : "") + ax
            }
            ap += "</div>";
            return ap
        },
        _adjustInstDate: function(aj, am, al) {
            var ai = aj.selectedYear + (al === "Y" ? am : 0),
                ak = aj.selectedMonth + (al === "M" ? am : 0),
                ag = Math.min(aj.selectedDay, this._getDaysInMonth(ai, ak)) + (al === "D" ? am : 0),
                ah = this._restrictMinMax(aj, this._daylightSavingAdjust(new Date(ai, ak, ag)));
            aj.selectedDay = ah.getDate();
            aj.drawMonth = aj.selectedMonth = ah.getMonth();
            aj.drawYear = aj.selectedYear = ah.getFullYear();
            if (al === "M" || al === "Y") {
                this._notifyChange(aj)
            }
        },
        _restrictMinMax: function(aj, ah) {
            var ai = this._getMinMaxDate(aj, "min"),
                ak = this._getMinMaxDate(aj, "max"),
                ag = (ai && ah < ai ? ai : ah);
            return (ak && ag > ak ? ak : ag)
        },
        _notifyChange: function(ah) {
            var ag = this._get(ah, "onChangeMonthYear");
            if (ag) {
                ag.apply((ah.input ? ah.input[0] : null), [ah.selectedYear, ah.selectedMonth + 1, ah])
            }
        },
        _getNumberOfMonths: function(ah) {
            var ag = this._get(ah, "numberOfMonths");
            return (ag == null ? [1, 1] : (typeof ag === "number" ? [1, ag] : ag))
        },
        _getMinMaxDate: function(ah, ag) {
            return this._determineDate(ah, this._get(ah, ag + "Date"), null)
        },
        _getDaysInMonth: function(ag, ah) {
            return 32 - this._daylightSavingAdjust(new Date(ag, ah, 32)).getDate()
        },
        _getFirstDayOfMonth: function(ag, ah) {
            return new Date(ag, ah, 1).getDay()
        },
        _canAdjustMonth: function(aj, al, ai, ak) {
            var ag = this._getNumberOfMonths(aj),
                ah = this._daylightSavingAdjust(new Date(ai, ak + (al < 0 ? al : ag[0] * ag[1]), 1));
            if (al < 0) {
                ah.setDate(this._getDaysInMonth(ah.getFullYear(), ah.getMonth()))
            }
            return this._isInRange(aj, ah)
        },
        _isInRange: function(ak, ai) {
            var ah, an, aj = this._getMinMaxDate(ak, "min"),
                ag = this._getMinMaxDate(ak, "max"),
                ao = null,
                al = null,
                am = this._get(ak, "yearRange");
            if (am) {
                ah = am.split(":");
                an = new Date().getFullYear();
                ao = parseInt(ah[0], 10);
                al = parseInt(ah[1], 10);
                if (ah[0].match(/[+\-].*/)) {
                    ao += an
                }
                if (ah[1].match(/[+\-].*/)) {
                    al += an
                }
            }
            return ((!aj || ai.getTime() >= aj.getTime()) && (!ag || ai.getTime() <= ag.getTime()) && (!ao || ai.getFullYear() >= ao) && (!al || ai.getFullYear() <= al))
        },
        _getFormatConfig: function(ag) {
            var ah = this._get(ag, "shortYearCutoff");
            ah = (typeof ah !== "string" ? ah : new Date().getFullYear() % 100 + parseInt(ah, 10));
            return {
                shortYearCutoff: ah,
                dayNamesShort: this._get(ag, "dayNamesShort"),
                dayNames: this._get(ag, "dayNames"),
                monthNamesShort: this._get(ag, "monthNamesShort"),
                monthNames: this._get(ag, "monthNames")
            }
        },
        _formatDate: function(aj, ag, ak, ai) {
            if (!ag) {
                aj.currentDay = aj.selectedDay;
                aj.currentMonth = aj.selectedMonth;
                aj.currentYear = aj.selectedYear
            }
            var ah = (ag ? (typeof ag === "object" ? ag : this._daylightSavingAdjust(new Date(ai, ak, ag))) : this._daylightSavingAdjust(new Date(aj.currentYear, aj.currentMonth, aj.currentDay)));
            return this.formatDate(this._get(aj, "dateFormat"), ah, this._getFormatConfig(aj))
        }
    });

    function l(ah) {
        var ag = "button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";
        return ah.on("mouseout", ag, function() {
            K(this).removeClass("ui-state-hover");
            if (this.className.indexOf("ui-datepicker-prev") !== -1) {
                K(this).removeClass("ui-datepicker-prev-hover")
            }
            if (this.className.indexOf("ui-datepicker-next") !== -1) {
                K(this).removeClass("ui-datepicker-next-hover")
            }
        }).on("mouseover", ag, v)
    }

    function v() {
        if (!K.datepicker._isDisabledDatepicker(q.inline ? q.dpDiv.parent()[0] : q.input[0])) {
            K(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover");
            K(this).addClass("ui-state-hover");
            if (this.className.indexOf("ui-datepicker-prev") !== -1) {
                K(this).addClass("ui-datepicker-prev-hover")
            }
            if (this.className.indexOf("ui-datepicker-next") !== -1) {
                K(this).addClass("ui-datepicker-next-hover")
            }
        }
    }

    function F(ai, ah) {
        K.extend(ai, ah);
        for (var ag in ah) {
            if (ah[ag] == null) {
                ai[ag] = ah[ag]
            }
        }
        return ai
    }
    K.fn.datepicker = function(ah) {
        if (!this.length) {
            return this
        }
        if (!K.datepicker.initialized) {
            K(document).on("mousedown", K.datepicker._checkExternalClick);
            K.datepicker.initialized = true
        }
        if (K("#" + K.datepicker._mainDivId).length === 0) {
            K("body").append(K.datepicker.dpDiv)
        }
        var ag = Array.prototype.slice.call(arguments, 1);
        if (typeof ah === "string" && (ah === "isDisabled" || ah === "getDate" || ah === "widget")) {
            return K.datepicker["_" + ah + "Datepicker"].apply(K.datepicker, [this[0]].concat(ag))
        }
        if (ah === "option" && arguments.length === 2 && typeof arguments[1] === "string") {
            return K.datepicker["_" + ah + "Datepicker"].apply(K.datepicker, [this[0]].concat(ag))
        }
        return this.each(function() {
            typeof ah === "string" ? K.datepicker["_" + ah + "Datepicker"].apply(K.datepicker, [this].concat(ag)) : K.datepicker._attachDatepicker(this, ah)
        })
    };
    K.datepicker = new ac();
    K.datepicker.initialized = false;
    K.datepicker.uuid = new Date().getTime();
    K.datepicker.version = "1.12.1";
    var A = K.datepicker;
    /*!
     * jQuery UI Slider 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var d = K.widget("ui.slider", K.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "slide",
        options: {
            animate: false,
            classes: {
                "ui-slider": "ui-corner-all",
                "ui-slider-handle": "ui-corner-all",
                "ui-slider-range": "ui-corner-all ui-widget-header"
            },
            distance: 0,
            max: 100,
            min: 0,
            orientation: "horizontal",
            range: false,
            step: 1,
            value: 0,
            values: null,
            change: null,
            slide: null,
            start: null,
            stop: null
        },
        numPages: 5,
        _create: function() {
            this._keySliding = false;
            this._mouseSliding = false;
            this._animateOff = true;
            this._handleIndex = null;
            this._detectOrientation();
            this._mouseInit();
            this._calculateNewMax();
            this._addClass("ui-slider ui-slider-" + this.orientation, "ui-widget ui-widget-content");
            this._refresh();
            this._animateOff = false
        },
        _refresh: function() {
            this._createRange();
            this._createHandles();
            this._setupEvents();
            this._refreshValue()
        },
        _createHandles: function() {
            var aj, ag, ah = this.options,
                al = this.element.find(".ui-slider-handle"),
                ak = "<span tabindex='0'></span>",
                ai = [];
            ag = (ah.values && ah.values.length) || 1;
            if (al.length > ag) {
                al.slice(ag).remove();
                al = al.slice(0, ag)
            }
            for (aj = al.length; aj < ag; aj++) {
                ai.push(ak)
            }
            this.handles = al.add(K(ai.join("")).appendTo(this.element));
            this._addClass(this.handles, "ui-slider-handle", "ui-state-default");
            this.handle = this.handles.eq(0);
            this.handles.each(function(am) {
                K(this).data("ui-slider-handle-index", am).attr("tabIndex", 0)
            })
        },
        _createRange: function() {
            var ag = this.options;
            if (ag.range) {
                if (ag.range === true) {
                    if (!ag.values) {
                        ag.values = [this._valueMin(), this._valueMin()]
                    } else {
                        if (ag.values.length && ag.values.length !== 2) {
                            ag.values = [ag.values[0], ag.values[0]]
                        } else {
                            if (K.isArray(ag.values)) {
                                ag.values = ag.values.slice(0)
                            }
                        }
                    }
                }
                if (!this.range || !this.range.length) {
                    this.range = K("<div>").appendTo(this.element);
                    this._addClass(this.range, "ui-slider-range")
                } else {
                    this._removeClass(this.range, "ui-slider-range-min ui-slider-range-max");
                    this.range.css({
                        left: "",
                        bottom: ""
                    })
                }
                if (ag.range === "min" || ag.range === "max") {
                    this._addClass(this.range, "ui-slider-range-" + ag.range)
                }
            } else {
                if (this.range) {
                    this.range.remove()
                }
                this.range = null
            }
        },
        _setupEvents: function() {
            this._off(this.handles);
            this._on(this.handles, this._handleEvents);
            this._hoverable(this.handles);
            this._focusable(this.handles)
        },
        _destroy: function() {
            this.handles.remove();
            if (this.range) {
                this.range.remove()
            }
            this._mouseDestroy()
        },
        _mouseCapture: function(ai) {
            var am, ap, ah, ak, ao, aq, al, ag, an = this,
                aj = this.options;
            if (aj.disabled) {
                return false
            }
            this.elementSize = {
                width: this.element.outerWidth(),
                height: this.element.outerHeight()
            };
            this.elementOffset = this.element.offset();
            am = {
                x: ai.pageX,
                y: ai.pageY
            };
            ap = this._normValueFromMouse(am);
            ah = this._valueMax() - this._valueMin() + 1;
            this.handles.each(function(ar) {
                var at = Math.abs(ap - an.values(ar));
                if ((ah > at) || (ah === at && (ar === an._lastChangedValue || an.values(ar) === aj.min))) {
                    ah = at;
                    ak = K(this);
                    ao = ar
                }
            });
            aq = this._start(ai, ao);
            if (aq === false) {
                return false
            }
            this._mouseSliding = true;
            this._handleIndex = ao;
            this._addClass(ak, null, "ui-state-active");
            ak.trigger("focus");
            al = ak.offset();
            ag = !K(ai.target).parents().addBack().is(".ui-slider-handle");
            this._clickOffset = ag ? {
                left: 0,
                top: 0
            } : {
                left: ai.pageX - al.left - (ak.width() / 2),
                top: ai.pageY - al.top - (ak.height() / 2) - (parseInt(ak.css("borderTopWidth"), 10) || 0) - (parseInt(ak.css("borderBottomWidth"), 10) || 0) + (parseInt(ak.css("marginTop"), 10) || 0)
            };
            if (!this.handles.hasClass("ui-state-hover")) {
                this._slide(ai, ao, ap)
            }
            this._animateOff = true;
            return true
        },
        _mouseStart: function() {
            return true
        },
        _mouseDrag: function(ai) {
            var ag = {
                    x: ai.pageX,
                    y: ai.pageY
                },
                ah = this._normValueFromMouse(ag);
            this._slide(ai, this._handleIndex, ah);
            return false
        },
        _mouseStop: function(ag) {
            this._removeClass(this.handles, null, "ui-state-active");
            this._mouseSliding = false;
            this._stop(ag, this._handleIndex);
            this._change(ag, this._handleIndex);
            this._handleIndex = null;
            this._clickOffset = null;
            this._animateOff = false;
            return false
        },
        _detectOrientation: function() {
            this.orientation = (this.options.orientation === "vertical") ? "vertical" : "horizontal"
        },
        _normValueFromMouse: function(ah) {
            var ag, ak, aj, ai, al;
            if (this.orientation === "horizontal") {
                ag = this.elementSize.width;
                ak = ah.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)
            } else {
                ag = this.elementSize.height;
                ak = ah.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)
            }
            aj = (ak / ag);
            if (aj > 1) {
                aj = 1
            }
            if (aj < 0) {
                aj = 0
            }
            if (this.orientation === "vertical") {
                aj = 1 - aj
            }
            ai = this._valueMax() - this._valueMin();
            al = this._valueMin() + aj * ai;
            return this._trimAlignValue(al)
        },
        _uiHash: function(ai, aj, ag) {
            var ah = {
                handle: this.handles[ai],
                handleIndex: ai,
                value: aj !== undefined ? aj : this.value()
            };
            if (this._hasMultipleValues()) {
                ah.value = aj !== undefined ? aj : this.values(ai);
                ah.values = ag || this.values()
            }
            return ah
        },
        _hasMultipleValues: function() {
            return this.options.values && this.options.values.length
        },
        _start: function(ah, ag) {
            return this._trigger("start", ah, this._uiHash(ag))
        },
        _slide: function(al, aj, ai) {
            var am, ag, ak = this.value(),
                ah = this.values();
            if (this._hasMultipleValues()) {
                ag = this.values(aj ? 0 : 1);
                ak = this.values(aj);
                if (this.options.values.length === 2 && this.options.range === true) {
                    ai = aj === 0 ? Math.min(ag, ai) : Math.max(ag, ai)
                }
                ah[aj] = ai
            }
            if (ai === ak) {
                return
            }
            am = this._trigger("slide", al, this._uiHash(aj, ai, ah));
            if (am === false) {
                return
            }
            if (this._hasMultipleValues()) {
                this.values(aj, ai)
            } else {
                this.value(ai)
            }
        },
        _stop: function(ah, ag) {
            this._trigger("stop", ah, this._uiHash(ag))
        },
        _change: function(ah, ag) {
            if (!this._keySliding && !this._mouseSliding) {
                this._lastChangedValue = ag;
                this._trigger("change", ah, this._uiHash(ag))
            }
        },
        value: function(ag) {
            if (arguments.length) {
                this.options.value = this._trimAlignValue(ag);
                this._refreshValue();
                this._change(null, 0);
                return
            }
            return this._value()
        },
        values: function(ah, ak) {
            var aj, ag, ai;
            if (arguments.length > 1) {
                this.options.values[ah] = this._trimAlignValue(ak);
                this._refreshValue();
                this._change(null, ah);
                return
            }
            if (arguments.length) {
                if (K.isArray(arguments[0])) {
                    aj = this.options.values;
                    ag = arguments[0];
                    for (ai = 0; ai < aj.length; ai += 1) {
                        aj[ai] = this._trimAlignValue(ag[ai]);
                        this._change(null, ai)
                    }
                    this._refreshValue()
                } else {
                    if (this._hasMultipleValues()) {
                        return this._values(ah)
                    } else {
                        return this.value()
                    }
                }
            } else {
                return this._values()
            }
        },
        _setOption: function(ah, ai) {
            var ag, aj = 0;
            if (ah === "range" && this.options.range === true) {
                if (ai === "min") {
                    this.options.value = this._values(0);
                    this.options.values = null
                } else {
                    if (ai === "max") {
                        this.options.value = this._values(this.options.values.length - 1);
                        this.options.values = null
                    }
                }
            }
            if (K.isArray(this.options.values)) {
                aj = this.options.values.length
            }
            this._super(ah, ai);
            switch (ah) {
                case "orientation":
                    this._detectOrientation();
                    this._removeClass("ui-slider-horizontal ui-slider-vertical")._addClass("ui-slider-" + this.orientation);
                    this._refreshValue();
                    if (this.options.range) {
                        this._refreshRange(ai)
                    }
                    this.handles.css(ai === "horizontal" ? "bottom" : "left", "");
                    break;
                case "value":
                    this._animateOff = true;
                    this._refreshValue();
                    this._change(null, 0);
                    this._animateOff = false;
                    break;
                case "values":
                    this._animateOff = true;
                    this._refreshValue();
                    for (ag = aj - 1; ag >= 0; ag--) {
                        this._change(null, ag)
                    }
                    this._animateOff = false;
                    break;
                case "step":
                case "min":
                case "max":
                    this._animateOff = true;
                    this._calculateNewMax();
                    this._refreshValue();
                    this._animateOff = false;
                    break;
                case "range":
                    this._animateOff = true;
                    this._refresh();
                    this._animateOff = false;
                    break
            }
        },
        _setOptionDisabled: function(ag) {
            this._super(ag);
            this._toggleClass(null, "ui-state-disabled", !!ag)
        },
        _value: function() {
            var ag = this.options.value;
            ag = this._trimAlignValue(ag);
            return ag
        },
        _values: function(ag) {
            var aj, ai, ah;
            if (arguments.length) {
                aj = this.options.values[ag];
                aj = this._trimAlignValue(aj);
                return aj
            } else {
                if (this._hasMultipleValues()) {
                    ai = this.options.values.slice();
                    for (ah = 0; ah < ai.length; ah += 1) {
                        ai[ah] = this._trimAlignValue(ai[ah])
                    }
                    return ai
                } else {
                    return []
                }
            }
        },
        _trimAlignValue: function(aj) {
            if (aj <= this._valueMin()) {
                return this._valueMin()
            }
            if (aj >= this._valueMax()) {
                return this._valueMax()
            }
            var ag = (this.options.step > 0) ? this.options.step : 1,
                ai = (aj - this._valueMin()) % ag,
                ah = aj - ai;
            if (Math.abs(ai) * 2 >= ag) {
                ah += (ai > 0) ? ag : (-ag)
            }
            return parseFloat(ah.toFixed(5))
        },
        _calculateNewMax: function() {
            var ag = this.options.max,
                ah = this._valueMin(),
                ai = this.options.step,
                aj = Math.round((ag - ah) / ai) * ai;
            ag = aj + ah;
            if (ag > this.options.max) {
                ag -= ai
            }
            this.max = parseFloat(ag.toFixed(this._precision()))
        },
        _precision: function() {
            var ag = this._precisionOf(this.options.step);
            if (this.options.min !== null) {
                ag = Math.max(ag, this._precisionOf(this.options.min))
            }
            return ag
        },
        _precisionOf: function(ah) {
            var ai = ah.toString(),
                ag = ai.indexOf(".");
            return ag === -1 ? 0 : ai.length - ag - 1
        },
        _valueMin: function() {
            return this.options.min
        },
        _valueMax: function() {
            return this.max
        },
        _refreshRange: function(ag) {
            if (ag === "vertical") {
                this.range.css({
                    width: "",
                    left: ""
                })
            }
            if (ag === "horizontal") {
                this.range.css({
                    height: "",
                    bottom: ""
                })
            }
        },
        _refreshValue: function() {
            var al, ak, ao, am, ap, aj = this.options.range,
                ai = this.options,
                an = this,
                ah = (!this._animateOff) ? ai.animate : false,
                ag = {};
            if (this._hasMultipleValues()) {
                this.handles.each(function(aq) {
                    ak = (an.values(aq) - an._valueMin()) / (an._valueMax() - an._valueMin()) * 100;
                    ag[an.orientation === "horizontal" ? "left" : "bottom"] = ak + "%";
                    K(this).stop(1, 1)[ah ? "animate" : "css"](ag, ai.animate);
                    if (an.options.range === true) {
                        if (an.orientation === "horizontal") {
                            if (aq === 0) {
                                an.range.stop(1, 1)[ah ? "animate" : "css"]({
                                    left: ak + "%"
                                }, ai.animate)
                            }
                            if (aq === 1) {
                                an.range[ah ? "animate" : "css"]({
                                    width: (ak - al) + "%"
                                }, {
                                    queue: false,
                                    duration: ai.animate
                                })
                            }
                        } else {
                            if (aq === 0) {
                                an.range.stop(1, 1)[ah ? "animate" : "css"]({
                                    bottom: (ak) + "%"
                                }, ai.animate)
                            }
                            if (aq === 1) {
                                an.range[ah ? "animate" : "css"]({
                                    height: (ak - al) + "%"
                                }, {
                                    queue: false,
                                    duration: ai.animate
                                })
                            }
                        }
                    }
                    al = ak
                })
            } else {
                ao = this.value();
                am = this._valueMin();
                ap = this._valueMax();
                ak = (ap !== am) ? (ao - am) / (ap - am) * 100 : 0;
                ag[this.orientation === "horizontal" ? "left" : "bottom"] = ak + "%";
                this.handle.stop(1, 1)[ah ? "animate" : "css"](ag, ai.animate);
                if (aj === "min" && this.orientation === "horizontal") {
                    this.range.stop(1, 1)[ah ? "animate" : "css"]({
                        width: ak + "%"
                    }, ai.animate)
                }
                if (aj === "max" && this.orientation === "horizontal") {
                    this.range.stop(1, 1)[ah ? "animate" : "css"]({
                        width: (100 - ak) + "%"
                    }, ai.animate)
                }
                if (aj === "min" && this.orientation === "vertical") {
                    this.range.stop(1, 1)[ah ? "animate" : "css"]({
                        height: ak + "%"
                    }, ai.animate)
                }
                if (aj === "max" && this.orientation === "vertical") {
                    this.range.stop(1, 1)[ah ? "animate" : "css"]({
                        height: (100 - ak) + "%"
                    }, ai.animate)
                }
            }
        },
        _handleEvents: {
            keydown: function(ak) {
                var al, ai, ah, aj, ag = K(ak.target).data("ui-slider-handle-index");
                switch (ak.keyCode) {
                    case K.ui.keyCode.HOME:
                    case K.ui.keyCode.END:
                    case K.ui.keyCode.PAGE_UP:
                    case K.ui.keyCode.PAGE_DOWN:
                    case K.ui.keyCode.UP:
                    case K.ui.keyCode.RIGHT:
                    case K.ui.keyCode.DOWN:
                    case K.ui.keyCode.LEFT:
                        ak.preventDefault();
                        if (!this._keySliding) {
                            this._keySliding = true;
                            this._addClass(K(ak.target), null, "ui-state-active");
                            al = this._start(ak, ag);
                            if (al === false) {
                                return
                            }
                        }
                        break
                }
                aj = this.options.step;
                if (this._hasMultipleValues()) {
                    ai = ah = this.values(ag)
                } else {
                    ai = ah = this.value()
                }
                switch (ak.keyCode) {
                    case K.ui.keyCode.HOME:
                        ah = this._valueMin();
                        break;
                    case K.ui.keyCode.END:
                        ah = this._valueMax();
                        break;
                    case K.ui.keyCode.PAGE_UP:
                        ah = this._trimAlignValue(ai + ((this._valueMax() - this._valueMin()) / this.numPages));
                        break;
                    case K.ui.keyCode.PAGE_DOWN:
                        ah = this._trimAlignValue(ai - ((this._valueMax() - this._valueMin()) / this.numPages));
                        break;
                    case K.ui.keyCode.UP:
                    case K.ui.keyCode.RIGHT:
                        if (ai === this._valueMax()) {
                            return
                        }
                        ah = this._trimAlignValue(ai + aj);
                        break;
                    case K.ui.keyCode.DOWN:
                    case K.ui.keyCode.LEFT:
                        if (ai === this._valueMin()) {
                            return
                        }
                        ah = this._trimAlignValue(ai - aj);
                        break
                }
                this._slide(ak, ag, ah)
            },
            keyup: function(ah) {
                var ag = K(ah.target).data("ui-slider-handle-index");
                if (this._keySliding) {
                    this._keySliding = false;
                    this._stop(ah, ag);
                    this._change(ah, ag);
                    this._removeClass(K(ah.target), null, "ui-state-active")
                }
            }
        }
    });
    /*!
     * jQuery UI Effects 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var o = "ui-effects-",
        t = "ui-effects-style",
        u = "ui-effects-animated",
        x = K;
    K.effects = {
        effect: {}
    };
    /*!
     * jQuery Color Animations v2.1.2
     * https://github.com/jquery/jquery-color
     *
     * Copyright 2014 jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     *
     * Date: Wed Jan 16 08:47:09 2013 -0600
     */
    (function(av, aj) {
        var aq = "backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor",
            an = /^([\-+])=\s*(\d+\.?\d*)/,
            am = [{
                re: /rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                parse: function(aw) {
                    return [aw[1], aw[2], aw[3], aw[4]]
                }
            }, {
                re: /rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                parse: function(aw) {
                    return [aw[1] * 2.55, aw[2] * 2.55, aw[3] * 2.55, aw[4]]
                }
            }, {
                re: /#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,
                parse: function(aw) {
                    return [parseInt(aw[1], 16), parseInt(aw[2], 16), parseInt(aw[3], 16)]
                }
            }, {
                re: /#([a-f0-9])([a-f0-9])([a-f0-9])/,
                parse: function(aw) {
                    return [parseInt(aw[1] + aw[1], 16), parseInt(aw[2] + aw[2], 16), parseInt(aw[3] + aw[3], 16)]
                }
            }, {
                re: /hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                space: "hsla",
                parse: function(aw) {
                    return [aw[1], aw[2] / 100, aw[3] / 100, aw[4]]
                }
            }],
            ak = av.Color = function(ax, ay, aw, az) {
                return new av.Color.fn.parse(ax, ay, aw, az)
            },
            ap = {
                rgba: {
                    props: {
                        red: {
                            idx: 0,
                            type: "byte"
                        },
                        green: {
                            idx: 1,
                            type: "byte"
                        },
                        blue: {
                            idx: 2,
                            type: "byte"
                        }
                    }
                },
                hsla: {
                    props: {
                        hue: {
                            idx: 0,
                            type: "degrees"
                        },
                        saturation: {
                            idx: 1,
                            type: "percent"
                        },
                        lightness: {
                            idx: 2,
                            type: "percent"
                        }
                    }
                }
            },
            au = {
                "byte": {
                    floor: true,
                    max: 255
                },
                percent: {
                    max: 1
                },
                degrees: {
                    mod: 360,
                    floor: true
                }
            },
            at = ak.support = {},
            ah = av("<p>")[0],
            ag, ar = av.each;
        ah.style.cssText = "background-color:rgba(1,1,1,.5)";
        at.rgba = ah.style.backgroundColor.indexOf("rgba") > -1;
        ar(ap, function(aw, ax) {
            ax.cache = "_" + aw;
            ax.props.alpha = {
                idx: 3,
                type: "percent",
                def: 1
            }
        });

        function ao(ax, az, ay) {
            var aw = au[az.type] || {};
            if (ax == null) {
                return (ay || !az.def) ? null : az.def
            }
            ax = aw.floor ? ~~ax : parseFloat(ax);
            if (isNaN(ax)) {
                return az.def
            }
            if (aw.mod) {
                return (ax + aw.mod) % aw.mod
            }
            return 0 > ax ? 0 : aw.max < ax ? aw.max : ax
        }

        function al(aw) {
            var ay = ak(),
                ax = ay._rgba = [];
            aw = aw.toLowerCase();
            ar(am, function(aD, aE) {
                var aB, aC = aE.re.exec(aw),
                    aA = aC && aE.parse(aC),
                    az = aE.space || "rgba";
                if (aA) {
                    aB = ay[az](aA);
                    ay[ap[az].cache] = aB[ap[az].cache];
                    ax = ay._rgba = aB._rgba;
                    return false
                }
            });
            if (ax.length) {
                if (ax.join() === "0,0,0,0") {
                    av.extend(ax, ag.transparent)
                }
                return ay
            }
            return ag[aw]
        }
        ak.fn = av.extend(ak.prototype, {
            parse: function(aC, aA, aw, aB) {
                if (aC === aj) {
                    this._rgba = [null, null, null, null];
                    return this
                }
                if (aC.jquery || aC.nodeType) {
                    aC = av(aC).css(aA);
                    aA = aj
                }
                var az = this,
                    ay = av.type(aC),
                    ax = this._rgba = [];
                if (aA !== aj) {
                    aC = [aC, aA, aw, aB];
                    ay = "array"
                }
                if (ay === "string") {
                    return this.parse(al(aC) || ag._default)
                }
                if (ay === "array") {
                    ar(ap.rgba.props, function(aD, aE) {
                        ax[aE.idx] = ao(aC[aE.idx], aE)
                    });
                    return this
                }
                if (ay === "object") {
                    if (aC instanceof ak) {
                        ar(ap, function(aD, aE) {
                            if (aC[aE.cache]) {
                                az[aE.cache] = aC[aE.cache].slice()
                            }
                        })
                    } else {
                        ar(ap, function(aE, aF) {
                            var aD = aF.cache;
                            ar(aF.props, function(aG, aH) {
                                if (!az[aD] && aF.to) {
                                    if (aG === "alpha" || aC[aG] == null) {
                                        return
                                    }
                                    az[aD] = aF.to(az._rgba)
                                }
                                az[aD][aH.idx] = ao(aC[aG], aH, true)
                            });
                            if (az[aD] && av.inArray(null, az[aD].slice(0, 3)) < 0) {
                                az[aD][3] = 1;
                                if (aF.from) {
                                    az._rgba = aF.from(az[aD])
                                }
                            }
                        })
                    }
                    return this
                }
            },
            is: function(ay) {
                var aw = ak(ay),
                    az = true,
                    ax = this;
                ar(ap, function(aA, aC) {
                    var aD, aB = aw[aC.cache];
                    if (aB) {
                        aD = ax[aC.cache] || aC.to && aC.to(ax._rgba) || [];
                        ar(aC.props, function(aE, aF) {
                            if (aB[aF.idx] != null) {
                                az = (aB[aF.idx] === aD[aF.idx]);
                                return az
                            }
                        })
                    }
                    return az
                });
                return az
            },
            _space: function() {
                var aw = [],
                    ax = this;
                ar(ap, function(ay, az) {
                    if (ax[az.cache]) {
                        aw.push(ay)
                    }
                });
                return aw.pop()
            },
            transition: function(ax, aD) {
                var ay = ak(ax),
                    az = ay._space(),
                    aA = ap[az],
                    aB = this.alpha() === 0 ? ak("transparent") : this,
                    aC = aB[aA.cache] || aA.to(aB._rgba),
                    aw = aC.slice();
                ay = ay[aA.cache];
                ar(aA.props, function(aH, aJ) {
                    var aG = aJ.idx,
                        aF = aC[aG],
                        aE = ay[aG],
                        aI = au[aJ.type] || {};
                    if (aE === null) {
                        return
                    }
                    if (aF === null) {
                        aw[aG] = aE
                    } else {
                        if (aI.mod) {
                            if (aE - aF > aI.mod / 2) {
                                aF += aI.mod
                            } else {
                                if (aF - aE > aI.mod / 2) {
                                    aF -= aI.mod
                                }
                            }
                        }
                        aw[aG] = ao((aE - aF) * aD + aF, aJ)
                    }
                });
                return this[az](aw)
            },
            blend: function(az) {
                if (this._rgba[3] === 1) {
                    return this
                }
                var ay = this._rgba.slice(),
                    ax = ay.pop(),
                    aw = ak(az)._rgba;
                return ak(av.map(ay, function(aA, aB) {
                    return (1 - ax) * aw[aB] + ax * aA
                }))
            },
            toRgbaString: function() {
                var ax = "rgba(",
                    aw = av.map(this._rgba, function(ay, az) {
                        return ay == null ? (az > 2 ? 1 : 0) : ay
                    });
                if (aw[3] === 1) {
                    aw.pop();
                    ax = "rgb("
                }
                return ax + aw.join() + ")"
            },
            toHslaString: function() {
                var ax = "hsla(",
                    aw = av.map(this.hsla(), function(ay, az) {
                        if (ay == null) {
                            ay = az > 2 ? 1 : 0
                        }
                        if (az && az < 3) {
                            ay = Math.round(ay * 100) + "%"
                        }
                        return ay
                    });
                if (aw[3] === 1) {
                    aw.pop();
                    ax = "hsl("
                }
                return ax + aw.join() + ")"
            },
            toHexString: function(aw) {
                var ax = this._rgba.slice(),
                    ay = ax.pop();
                if (aw) {
                    ax.push(~~(ay * 255))
                }
                return "#" + av.map(ax, function(az) {
                    az = (az || 0).toString(16);
                    return az.length === 1 ? "0" + az : az
                }).join("")
            },
            toString: function() {
                return this._rgba[3] === 0 ? "transparent" : this.toRgbaString()
            }
        });
        ak.fn.parse.prototype = ak.fn;

        function ai(ay, ax, aw) {
            aw = (aw + 1) % 1;
            if (aw * 6 < 1) {
                return ay + (ax - ay) * aw * 6
            }
            if (aw * 2 < 1) {
                return ax
            }
            if (aw * 3 < 2) {
                return ay + (ax - ay) * ((2 / 3) - aw) * 6
            }
            return ay
        }
        ap.hsla.to = function(ay) {
            if (ay[0] == null || ay[1] == null || ay[2] == null) {
                return [null, null, null, ay[3]]
            }
            var aw = ay[0] / 255,
                aB = ay[1] / 255,
                aC = ay[2] / 255,
                aE = ay[3],
                aD = Math.max(aw, aB, aC),
                az = Math.min(aw, aB, aC),
                aF = aD - az,
                aG = aD + az,
                ax = aG * 0.5,
                aA, aH;
            if (az === aD) {
                aA = 0
            } else {
                if (aw === aD) {
                    aA = (60 * (aB - aC) / aF) + 360
                } else {
                    if (aB === aD) {
                        aA = (60 * (aC - aw) / aF) + 120
                    } else {
                        aA = (60 * (aw - aB) / aF) + 240
                    }
                }
            }
            if (aF === 0) {
                aH = 0
            } else {
                if (ax <= 0.5) {
                    aH = aF / aG
                } else {
                    aH = aF / (2 - aG)
                }
            }
            return [Math.round(aA) % 360, aH, ax, aE == null ? 1 : aE]
        };
        ap.hsla.from = function(aA) {
            if (aA[0] == null || aA[1] == null || aA[2] == null) {
                return [null, null, null, aA[3]]
            }
            var az = aA[0] / 360,
                ay = aA[1],
                ax = aA[2],
                aw = aA[3],
                aB = ax <= 0.5 ? ax * (1 + ay) : ax + ay - ax * ay,
                aC = 2 * ax - aB;
            return [Math.round(ai(aC, aB, az + (1 / 3)) * 255), Math.round(ai(aC, aB, az) * 255), Math.round(ai(aC, aB, az - (1 / 3)) * 255), aw]
        };
        ar(ap, function(ax, az) {
            var ay = az.props,
                aw = az.cache,
                aB = az.to,
                aA = az.from;
            ak.fn[ax] = function(aG) {
                if (aB && !this[aw]) {
                    this[aw] = aB(this._rgba)
                }
                if (aG === aj) {
                    return this[aw].slice()
                }
                var aD, aF = av.type(aG),
                    aC = (aF === "array" || aF === "object") ? aG : arguments,
                    aE = this[aw].slice();
                ar(ay, function(aH, aJ) {
                    var aI = aC[aF === "object" ? aH : aJ.idx];
                    if (aI == null) {
                        aI = aE[aJ.idx]
                    }
                    aE[aJ.idx] = ao(aI, aJ)
                });
                if (aA) {
                    aD = ak(aA(aE));
                    aD[aw] = aE;
                    return aD
                } else {
                    return ak(aE)
                }
            };
            ar(ay, function(aC, aD) {
                if (ak.fn[aC]) {
                    return
                }
                ak.fn[aC] = function(aH) {
                    var aJ = av.type(aH),
                        aG = (aC === "alpha" ? (this._hsla ? "hsla" : "rgba") : ax),
                        aF = this[aG](),
                        aI = aF[aD.idx],
                        aE;
                    if (aJ === "undefined") {
                        return aI
                    }
                    if (aJ === "function") {
                        aH = aH.call(this, aI);
                        aJ = av.type(aH)
                    }
                    if (aH == null && aD.empty) {
                        return this
                    }
                    if (aJ === "string") {
                        aE = an.exec(aH);
                        if (aE) {
                            aH = aI + parseFloat(aE[2]) * (aE[1] === "+" ? 1 : -1)
                        }
                    }
                    aF[aD.idx] = aH;
                    return this[aG](aF)
                }
            })
        });
        ak.hook = function(ax) {
            var aw = ax.split(" ");
            ar(aw, function(ay, az) {
                av.cssHooks[az] = {
                    set: function(aD, aE) {
                        var aB, aC, aA = "";
                        if (aE !== "transparent" && (av.type(aE) !== "string" || (aB = al(aE)))) {
                            aE = ak(aB || aE);
                            if (!at.rgba && aE._rgba[3] !== 1) {
                                aC = az === "backgroundColor" ? aD.parentNode : aD;
                                while ((aA === "" || aA === "transparent") && aC && aC.style) {
                                    try {
                                        aA = av.css(aC, "backgroundColor");
                                        aC = aC.parentNode
                                    } catch (aF) {}
                                }
                                aE = aE.blend(aA && aA !== "transparent" ? aA : "_default")
                            }
                            aE = aE.toRgbaString()
                        }
                        try {
                            aD.style[az] = aE
                        } catch (aF) {}
                    }
                };
                av.fx.step[az] = function(aA) {
                    if (!aA.colorInit) {
                        aA.start = ak(aA.elem, az);
                        aA.end = ak(aA.end);
                        aA.colorInit = true
                    }
                    av.cssHooks[az].set(aA.elem, aA.start.transition(aA.end, aA.pos))
                }
            })
        };
        ak.hook(aq);
        av.cssHooks.borderColor = {
            expand: function(ax) {
                var aw = {};
                ar(["Top", "Right", "Bottom", "Left"], function(az, ay) {
                    aw["border" + ay + "Color"] = ax
                });
                return aw
            }
        };
        ag = av.Color.names = {
            aqua: "#00ffff",
            black: "#000000",
            blue: "#0000ff",
            fuchsia: "#ff00ff",
            gray: "#808080",
            green: "#008000",
            lime: "#00ff00",
            maroon: "#800000",
            navy: "#000080",
            olive: "#808000",
            purple: "#800080",
            red: "#ff0000",
            silver: "#c0c0c0",
            teal: "#008080",
            white: "#ffffff",
            yellow: "#ffff00",
            transparent: [null, null, null, 0],
            _default: "#ffffff"
        }
    })(x);
    (function() {
        var ah = ["add", "remove", "toggle"],
            ai = {
                border: 1,
                borderBottom: 1,
                borderColor: 1,
                borderLeft: 1,
                borderRight: 1,
                borderTop: 1,
                borderWidth: 1,
                margin: 1,
                padding: 1
            };
        K.each(["borderLeftStyle", "borderRightStyle", "borderBottomStyle", "borderTopStyle"], function(ak, al) {
            K.fx.step[al] = function(am) {
                if (am.end !== "none" && !am.setAttr || am.pos === 1 && !am.setAttr) {
                    x.style(am.elem, al, am.end);
                    am.setAttr = true
                }
            }
        });

        function aj(ao) {
            var al, ak, am = ao.ownerDocument.defaultView ? ao.ownerDocument.defaultView.getComputedStyle(ao, null) : ao.currentStyle,
                an = {};
            if (am && am.length && am[0] && am[am[0]]) {
                ak = am.length;
                while (ak--) {
                    al = am[ak];
                    if (typeof am[al] === "string") {
                        an[K.camelCase(al)] = am[al]
                    }
                }
            } else {
                for (al in am) {
                    if (typeof am[al] === "string") {
                        an[al] = am[al]
                    }
                }
            }
            return an
        }

        function ag(ak, am) {
            var ao = {},
                al, an;
            for (al in am) {
                an = am[al];
                if (ak[al] !== an) {
                    if (!ai[al]) {
                        if (K.fx.step[al] || !isNaN(parseFloat(an))) {
                            ao[al] = an
                        }
                    }
                }
            }
            return ao
        }
        if (!K.fn.addBack) {
            K.fn.addBack = function(ak) {
                return this.add(ak == null ? this.prevObject : this.prevObject.filter(ak))
            }
        }
        K.effects.animateClass = function(ak, al, ao, an) {
            var am = K.speed(al, ao, an);
            return this.queue(function() {
                var ar = K(this),
                    ap = ar.attr("class") || "",
                    aq, at = am.children ? ar.find("*").addBack() : ar;
                at = at.map(function() {
                    var au = K(this);
                    return {
                        el: au,
                        start: aj(this)
                    }
                });
                aq = function() {
                    K.each(ah, function(au, av) {
                        if (ak[av]) {
                            ar[av + "Class"](ak[av])
                        }
                    })
                };
                aq();
                at = at.map(function() {
                    this.end = aj(this.el[0]);
                    this.diff = ag(this.start, this.end);
                    return this
                });
                ar.attr("class", ap);
                at = at.map(function() {
                    var aw = this,
                        au = K.Deferred(),
                        av = K.extend({}, am, {
                            queue: false,
                            complete: function() {
                                au.resolve(aw)
                            }
                        });
                    this.el.animate(this.diff, av);
                    return au.promise()
                });
                K.when.apply(K, at.get()).done(function() {
                    aq();
                    K.each(arguments, function() {
                        var au = this.el;
                        K.each(this.diff, function(av) {
                            au.css(av, "")
                        })
                    });
                    am.complete.call(ar[0])
                })
            })
        };
        K.fn.extend({
            addClass: (function(ak) {
                return function(am, al, ao, an) {
                    return al ? K.effects.animateClass.call(this, {
                        add: am
                    }, al, ao, an) : ak.apply(this, arguments)
                }
            })(K.fn.addClass),
            removeClass: (function(ak) {
                return function(am, al, ao, an) {
                    return arguments.length > 1 ? K.effects.animateClass.call(this, {
                        remove: am
                    }, al, ao, an) : ak.apply(this, arguments)
                }
            })(K.fn.removeClass),
            toggleClass: (function(ak) {
                return function(an, am, al, ap, ao) {
                    if (typeof am === "boolean" || am === undefined) {
                        if (!al) {
                            return ak.apply(this, arguments)
                        } else {
                            return K.effects.animateClass.call(this, (am ? {
                                add: an
                            } : {
                                remove: an
                            }), al, ap, ao)
                        }
                    } else {
                        return K.effects.animateClass.call(this, {
                            toggle: an
                        }, am, al, ap)
                    }
                }
            })(K.fn.toggleClass),
            switchClass: function(ak, am, al, ao, an) {
                return K.effects.animateClass.call(this, {
                    add: am,
                    remove: ak
                }, al, ao, an)
            }
        })
    })();
    (function() {
        if (K.expr && K.expr.filters && K.expr.filters.animated) {
            K.expr.filters.animated = (function(aj) {
                return function(ak) {
                    return !!K(ak).data(u) || aj(ak)
                }
            })(K.expr.filters.animated)
        }
        if (K.uiBackCompat !== false) {
            K.extend(K.effects, {
                save: function(ak, am) {
                    var aj = 0,
                        al = am.length;
                    for (; aj < al; aj++) {
                        if (am[aj] !== null) {
                            ak.data(o + am[aj], ak[0].style[am[aj]])
                        }
                    }
                },
                restore: function(ak, an) {
                    var am, aj = 0,
                        al = an.length;
                    for (; aj < al; aj++) {
                        if (an[aj] !== null) {
                            am = ak.data(o + an[aj]);
                            ak.css(an[aj], am)
                        }
                    }
                },
                setMode: function(aj, ak) {
                    if (ak === "toggle") {
                        ak = aj.is(":hidden") ? "show" : "hide"
                    }
                    return ak
                },
                createWrapper: function(ak) {
                    if (ak.parent().is(".ui-effects-wrapper")) {
                        return ak.parent()
                    }
                    var al = {
                            width: ak.outerWidth(true),
                            height: ak.outerHeight(true),
                            "float": ak.css("float")
                        },
                        ao = K("<div></div>").addClass("ui-effects-wrapper").css({
                            fontSize: "100%",
                            background: "transparent",
                            border: "none",
                            margin: 0,
                            padding: 0
                        }),
                        aj = {
                            width: ak.width(),
                            height: ak.height()
                        },
                        an = document.activeElement;
                    try {
                        an.id
                    } catch (am) {
                        an = document.body
                    }
                    ak.wrap(ao);
                    if (ak[0] === an || K.contains(ak[0], an)) {
                        K(an).trigger("focus")
                    }
                    ao = ak.parent();
                    if (ak.css("position") === "static") {
                        ao.css({
                            position: "relative"
                        });
                        ak.css({
                            position: "relative"
                        })
                    } else {
                        K.extend(al, {
                            position: ak.css("position"),
                            zIndex: ak.css("z-index")
                        });
                        K.each(["top", "left", "bottom", "right"], function(ap, aq) {
                            al[aq] = ak.css(aq);
                            if (isNaN(parseInt(al[aq], 10))) {
                                al[aq] = "auto"
                            }
                        });
                        ak.css({
                            position: "relative",
                            top: 0,
                            left: 0,
                            right: "auto",
                            bottom: "auto"
                        })
                    }
                    ak.css(aj);
                    return ao.css(al).show()
                },
                removeWrapper: function(aj) {
                    var ak = document.activeElement;
                    if (aj.parent().is(".ui-effects-wrapper")) {
                        aj.parent().replaceWith(aj);
                        if (aj[0] === ak || K.contains(aj[0], ak)) {
                            K(ak).trigger("focus")
                        }
                    }
                    return aj
                }
            })
        }
        K.extend(K.effects, {
            version: "1.12.1",
            define: function(aj, al, ak) {
                if (!ak) {
                    ak = al;
                    al = "effect"
                }
                K.effects.effect[aj] = ak;
                K.effects.effect[aj].mode = al;
                return ak
            },
            scaledDimensions: function(ak, al, am) {
                if (al === 0) {
                    return {
                        height: 0,
                        width: 0,
                        outerHeight: 0,
                        outerWidth: 0
                    }
                }
                var aj = am !== "horizontal" ? ((al || 100) / 100) : 1,
                    an = am !== "vertical" ? ((al || 100) / 100) : 1;
                return {
                    height: ak.height() * an,
                    width: ak.width() * aj,
                    outerHeight: ak.outerHeight() * an,
                    outerWidth: ak.outerWidth() * aj
                }
            },
            clipToBox: function(aj) {
                return {
                    width: aj.clip.right - aj.clip.left,
                    height: aj.clip.bottom - aj.clip.top,
                    left: aj.clip.left,
                    top: aj.clip.top
                }
            },
            unshift: function(ak, am, al) {
                var aj = ak.queue();
                if (am > 1) {
                    aj.splice.apply(aj, [1, 0].concat(aj.splice(am, al)))
                }
                ak.dequeue()
            },
            saveStyle: function(aj) {
                aj.data(t, aj[0].style.cssText)
            },
            restoreStyle: function(aj) {
                aj[0].style.cssText = aj.data(t) || "";
                aj.removeData(t)
            },
            mode: function(aj, al) {
                var ak = aj.is(":hidden");
                if (al === "toggle") {
                    al = ak ? "show" : "hide"
                }
                if (ak ? al === "hide" : al === "show") {
                    al = "none"
                }
                return al
            },
            getBaseline: function(ak, al) {
                var am, aj;
                switch (ak[0]) {
                    case "top":
                        am = 0;
                        break;
                    case "middle":
                        am = 0.5;
                        break;
                    case "bottom":
                        am = 1;
                        break;
                    default:
                        am = ak[0] / al.height
                }
                switch (ak[1]) {
                    case "left":
                        aj = 0;
                        break;
                    case "center":
                        aj = 0.5;
                        break;
                    case "right":
                        aj = 1;
                        break;
                    default:
                        aj = ak[1] / al.width
                }
                return {
                    x: aj,
                    y: am
                }
            },
            createPlaceholder: function(ak) {
                var am, al = ak.css("position"),
                    aj = ak.position();
                ak.css({
                    marginTop: ak.css("marginTop"),
                    marginBottom: ak.css("marginBottom"),
                    marginLeft: ak.css("marginLeft"),
                    marginRight: ak.css("marginRight")
                }).outerWidth(ak.outerWidth()).outerHeight(ak.outerHeight());
                if (/^(static|relative)/.test(al)) {
                    al = "absolute";
                    am = K("<" + ak[0].nodeName + ">").insertAfter(ak).css({
                        display: /^(inline|ruby)/.test(ak.css("display")) ? "inline-block" : "block",
                        visibility: "hidden",
                        marginTop: ak.css("marginTop"),
                        marginBottom: ak.css("marginBottom"),
                        marginLeft: ak.css("marginLeft"),
                        marginRight: ak.css("marginRight"),
                        "float": ak.css("float")
                    }).outerWidth(ak.outerWidth()).outerHeight(ak.outerHeight()).addClass("ui-effects-placeholder");
                    ak.data(o + "placeholder", am)
                }
                ak.css({
                    position: al,
                    left: aj.left,
                    top: aj.top
                });
                return am
            },
            removePlaceholder: function(aj) {
                var al = o + "placeholder",
                    ak = aj.data(al);
                if (ak) {
                    ak.remove();
                    aj.removeData(al)
                }
            },
            cleanUp: function(aj) {
                K.effects.restoreStyle(aj);
                K.effects.removePlaceholder(aj)
            },
            setTransition: function(ak, am, aj, al) {
                al = al || {};
                K.each(am, function(ao, an) {
                    var ap = ak.cssUnit(an);
                    if (ap[0] > 0) {
                        al[an] = ap[0] * aj + ap[1]
                    }
                });
                return al
            }
        });

        function ah(ak, aj, al, am) {
            if (K.isPlainObject(ak)) {
                aj = ak;
                ak = ak.effect
            }
            ak = {
                effect: ak
            };
            if (aj == null) {
                aj = {}
            }
            if (K.isFunction(aj)) {
                am = aj;
                al = null;
                aj = {}
            }
            if (typeof aj === "number" || K.fx.speeds[aj]) {
                am = al;
                al = aj;
                aj = {}
            }
            if (K.isFunction(al)) {
                am = al;
                al = null
            }
            if (aj) {
                K.extend(ak, aj)
            }
            al = al || aj.duration;
            ak.duration = K.fx.off ? 0 : typeof al === "number" ? al : al in K.fx.speeds ? K.fx.speeds[al] : K.fx.speeds._default;
            ak.complete = am || aj.complete;
            return ak
        }

        function ai(aj) {
            if (!aj || typeof aj === "number" || K.fx.speeds[aj]) {
                return true
            }
            if (typeof aj === "string" && !K.effects.effect[aj]) {
                return true
            }
            if (K.isFunction(aj)) {
                return true
            }
            if (typeof aj === "object" && !aj.effect) {
                return true
            }
            return false
        }
        K.fn.extend({
            effect: function() {
                var ar = ah.apply(this, arguments),
                    aq = K.effects.effect[ar.effect],
                    an = aq.mode,
                    ap = ar.queue,
                    am = ap || "fx",
                    aj = ar.complete,
                    ao = ar.mode,
                    ak = [],
                    at = function(aw) {
                        var av = K(this),
                            au = K.effects.mode(av, ao) || an;
                        av.data(u, true);
                        ak.push(au);
                        if (an && (au === "show" || (au === an && au === "hide"))) {
                            av.show()
                        }
                        if (!an || au !== "none") {
                            K.effects.saveStyle(av)
                        }
                        if (K.isFunction(aw)) {
                            aw()
                        }
                    };
                if (K.fx.off || !aq) {
                    if (ao) {
                        return this[ao](ar.duration, aj)
                    } else {
                        return this.each(function() {
                            if (aj) {
                                aj.call(this)
                            }
                        })
                    }
                }

                function al(aw) {
                    var ax = K(this);

                    function av() {
                        ax.removeData(u);
                        K.effects.cleanUp(ax);
                        if (ar.mode === "hide") {
                            ax.hide()
                        }
                        au()
                    }

                    function au() {
                        if (K.isFunction(aj)) {
                            aj.call(ax[0])
                        }
                        if (K.isFunction(aw)) {
                            aw()
                        }
                    }
                    ar.mode = ak.shift();
                    if (K.uiBackCompat !== false && !an) {
                        if (ax.is(":hidden") ? ao === "hide" : ao === "show") {
                            ax[ao]();
                            au()
                        } else {
                            aq.call(ax[0], ar, au)
                        }
                    } else {
                        if (ar.mode === "none") {
                            ax[ao]();
                            au()
                        } else {
                            aq.call(ax[0], ar, av)
                        }
                    }
                }
                return ap === false ? this.each(at).each(al) : this.queue(am, at).queue(am, al)
            },
            show: (function(aj) {
                return function(al) {
                    if (ai(al)) {
                        return aj.apply(this, arguments)
                    } else {
                        var ak = ah.apply(this, arguments);
                        ak.mode = "show";
                        return this.effect.call(this, ak)
                    }
                }
            })(K.fn.show),
            hide: (function(aj) {
                return function(al) {
                    if (ai(al)) {
                        return aj.apply(this, arguments)
                    } else {
                        var ak = ah.apply(this, arguments);
                        ak.mode = "hide";
                        return this.effect.call(this, ak)
                    }
                }
            })(K.fn.hide),
            toggle: (function(aj) {
                return function(al) {
                    if (ai(al) || typeof al === "boolean") {
                        return aj.apply(this, arguments)
                    } else {
                        var ak = ah.apply(this, arguments);
                        ak.mode = "toggle";
                        return this.effect.call(this, ak)
                    }
                }
            })(K.fn.toggle),
            cssUnit: function(aj) {
                var ak = this.css(aj),
                    al = [];
                K.each(["em", "px", "%", "pt"], function(am, an) {
                    if (ak.indexOf(an) > 0) {
                        al = [parseFloat(ak), an]
                    }
                });
                return al
            },
            cssClip: function(aj) {
                if (aj) {
                    return this.css("clip", "rect(" + aj.top + "px " + aj.right + "px " + aj.bottom + "px " + aj.left + "px)")
                }
                return ag(this.css("clip"), this)
            },
            transfer: function(av, am) {
                var ao = K(this),
                    aq = K(av.to),
                    au = aq.css("position") === "fixed",
                    ap = K("body"),
                    ar = au ? ap.scrollTop() : 0,
                    at = au ? ap.scrollLeft() : 0,
                    aj = aq.offset(),
                    al = {
                        top: aj.top - ar,
                        left: aj.left - at,
                        height: aq.innerHeight(),
                        width: aq.innerWidth()
                    },
                    an = ao.offset(),
                    ak = K("<div class='ui-effects-transfer'></div>").appendTo("body").addClass(av.className).css({
                        top: an.top - ar,
                        left: an.left - at,
                        height: ao.innerHeight(),
                        width: ao.innerWidth(),
                        position: au ? "fixed" : "absolute"
                    }).animate(al, av.duration, av.easing, function() {
                        ak.remove();
                        if (K.isFunction(am)) {
                            am()
                        }
                    })
            }
        });

        function ag(ao, al) {
            var an = al.outerWidth(),
                am = al.outerHeight(),
                ak = /^rect\((-?\d*\.?\d*px|-?\d+%|auto),?\s*(-?\d*\.?\d*px|-?\d+%|auto),?\s*(-?\d*\.?\d*px|-?\d+%|auto),?\s*(-?\d*\.?\d*px|-?\d+%|auto)\)$/,
                aj = ak.exec(ao) || ["", 0, an, am, 0];
            return {
                top: parseFloat(aj[1]) || 0,
                right: aj[2] === "auto" ? an : parseFloat(aj[2]),
                bottom: aj[3] === "auto" ? am : parseFloat(aj[3]),
                left: parseFloat(aj[4]) || 0
            }
        }
        K.fx.step.clip = function(aj) {
            if (!aj.clipInit) {
                aj.start = K(aj.elem).cssClip();
                if (typeof aj.end === "string") {
                    aj.end = ag(aj.end, aj.elem)
                }
                aj.clipInit = true
            }
            K(aj.elem).cssClip({
                top: aj.pos * (aj.end.top - aj.start.top) + aj.start.top,
                right: aj.pos * (aj.end.right - aj.start.right) + aj.start.right,
                bottom: aj.pos * (aj.end.bottom - aj.start.bottom) + aj.start.bottom,
                left: aj.pos * (aj.end.left - aj.start.left) + aj.start.left
            })
        }
    })();
    (function() {
        var ag = {};
        K.each(["Quad", "Cubic", "Quart", "Quint", "Expo"], function(ai, ah) {
            ag[ah] = function(aj) {
                return Math.pow(aj, ai + 2)
            }
        });
        K.extend(ag, {
            Sine: function(ah) {
                return 1 - Math.cos(ah * Math.PI / 2)
            },
            Circ: function(ah) {
                return 1 - Math.sqrt(1 - ah * ah)
            },
            Elastic: function(ah) {
                return ah === 0 || ah === 1 ? ah : -Math.pow(2, 8 * (ah - 1)) * Math.sin(((ah - 1) * 80 - 7.5) * Math.PI / 15)
            },
            Back: function(ah) {
                return ah * ah * (3 * ah - 2)
            },
            Bounce: function(aj) {
                var ah, ai = 4;
                while (aj < ((ah = Math.pow(2, --ai)) - 1) / 11) {}
                return 1 / Math.pow(4, 3 - ai) - 7.5625 * Math.pow((ah * 3 - 2) / 22 - aj, 2)
            }
        });
        K.each(ag, function(ai, ah) {
            K.easing["easeIn" + ai] = ah;
            K.easing["easeOut" + ai] = function(aj) {
                return 1 - ah(1 - aj)
            };
            K.easing["easeInOut" + ai] = function(aj) {
                return aj < 0.5 ? ah(aj * 2) / 2 : 1 - ah(aj * -2 + 2) / 2
            }
        })
    })();
    var W = K.effects;
    /*!
     * jQuery UI Effects Blind 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var X = K.effects.define("blind", "hide", function(ai, ag) {
        var al = {
                up: ["bottom", "top"],
                vertical: ["bottom", "top"],
                down: ["top", "bottom"],
                left: ["right", "left"],
                horizontal: ["right", "left"],
                right: ["left", "right"]
            },
            aj = K(this),
            ak = ai.direction || "up",
            an = aj.cssClip(),
            ah = {
                clip: K.extend({}, an)
            },
            am = K.effects.createPlaceholder(aj);
        ah.clip[al[ak][0]] = ah.clip[al[ak][1]];
        if (ai.mode === "show") {
            aj.cssClip(ah.clip);
            if (am) {
                am.css(K.effects.clipToBox(ah))
            }
            ah.clip = an
        }
        if (am) {
            am.animate(K.effects.clipToBox(ah), ai.duration, ai.easing)
        }
        aj.animate(ah, {
            queue: false,
            duration: ai.duration,
            easing: ai.easing,
            complete: ag
        })
    });
    /*!
     * jQuery UI Effects Bounce 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var T = K.effects.define("bounce", function(ah, ao) {
        var ak, at, aw, ag = K(this),
            an = ah.mode,
            am = an === "hide",
            ax = an === "show",
            ay = ah.direction || "up",
            ai = ah.distance,
            al = ah.times || 5,
            az = al * 2 + (ax || am ? 1 : 0),
            av = ah.duration / az,
            aq = ah.easing,
            aj = (ay === "up" || ay === "down") ? "top" : "left",
            ap = (ay === "up" || ay === "left"),
            au = 0,
            ar = ag.queue().length;
        K.effects.createPlaceholder(ag);
        aw = ag.css(aj);
        if (!ai) {
            ai = ag[aj === "top" ? "outerHeight" : "outerWidth"]() / 3
        }
        if (ax) {
            at = {
                opacity: 1
            };
            at[aj] = aw;
            ag.css("opacity", 0).css(aj, ap ? -ai * 2 : ai * 2).animate(at, av, aq)
        }
        if (am) {
            ai = ai / Math.pow(2, al - 1)
        }
        at = {};
        at[aj] = aw;
        for (; au < al; au++) {
            ak = {};
            ak[aj] = (ap ? "-=" : "+=") + ai;
            ag.animate(ak, av, aq).animate(at, av, aq);
            ai = am ? ai * 2 : ai / 2
        }
        if (am) {
            ak = {
                opacity: 0
            };
            ak[aj] = (ap ? "-=" : "+=") + ai;
            ag.animate(ak, av, aq)
        }
        ag.queue(ao);
        K.effects.unshift(ag, ar, az + 1)
    });
    /*!
     * jQuery UI Effects Clip 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var Q = K.effects.define("clip", "hide", function(ao, ak) {
        var ah, ai = {},
            al = K(this),
            an = ao.direction || "vertical",
            am = an === "both",
            ag = am || an === "horizontal",
            aj = am || an === "vertical";
        ah = al.cssClip();
        ai.clip = {
            top: aj ? (ah.bottom - ah.top) / 2 : ah.top,
            right: ag ? (ah.right - ah.left) / 2 : ah.right,
            bottom: aj ? (ah.bottom - ah.top) / 2 : ah.bottom,
            left: ag ? (ah.right - ah.left) / 2 : ah.left
        };
        K.effects.createPlaceholder(al);
        if (ao.mode === "show") {
            al.cssClip(ai.clip);
            ai.clip = ah
        }
        al.animate(ai, {
            queue: false,
            duration: ao.duration,
            easing: ao.easing,
            complete: ak
        })
    });
    /*!
     * jQuery UI Effects Drop 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var G = K.effects.define("drop", "hide", function(aq, aj) {
        var ag, ak = K(this),
            am = aq.mode,
            ao = am === "show",
            an = aq.direction || "left",
            ah = (an === "up" || an === "down") ? "top" : "left",
            ap = (an === "up" || an === "left") ? "-=" : "+=",
            al = (ap === "+=") ? "-=" : "+=",
            ai = {
                opacity: 0
            };
        K.effects.createPlaceholder(ak);
        ag = aq.distance || ak[ah === "top" ? "outerHeight" : "outerWidth"](true) / 2;
        ai[ah] = ap + ag;
        if (ao) {
            ak.css(ai);
            ai[ah] = al + ag;
            ai.opacity = 1
        }
        ak.animate(ai, {
            queue: false,
            duration: aq.duration,
            easing: aq.easing,
            complete: aj
        })
    });
    /*!
     * jQuery UI Effects Explode 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var n = K.effects.define("explode", "hide", function(ah, au) {
        var ax, aw, aj, ar, aq, ao, an = ah.pieces ? Math.round(Math.sqrt(ah.pieces)) : 3,
            ai = an,
            ag = K(this),
            ap = ah.mode,
            ay = ap === "show",
            al = ag.show().css("visibility", "hidden").offset(),
            av = Math.ceil(ag.outerWidth() / ai),
            at = Math.ceil(ag.outerHeight() / an),
            am = [];

        function az() {
            am.push(this);
            if (am.length === an * ai) {
                ak()
            }
        }
        for (ax = 0; ax < an; ax++) {
            ar = al.top + ax * at;
            ao = ax - (an - 1) / 2;
            for (aw = 0; aw < ai; aw++) {
                aj = al.left + aw * av;
                aq = aw - (ai - 1) / 2;
                ag.clone().appendTo("body").wrap("<div></div>").css({
                    position: "absolute",
                    visibility: "visible",
                    left: -aw * av,
                    top: -ax * at
                }).parent().addClass("ui-effects-explode").css({
                    position: "absolute",
                    overflow: "hidden",
                    width: av,
                    height: at,
                    left: aj + (ay ? aq * av : 0),
                    top: ar + (ay ? ao * at : 0),
                    opacity: ay ? 0 : 1
                }).animate({
                    left: aj + (ay ? 0 : aq * av),
                    top: ar + (ay ? 0 : ao * at),
                    opacity: ay ? 1 : 0
                }, ah.duration || 500, ah.easing, az)
            }
        }

        function ak() {
            ag.css({
                visibility: "visible"
            });
            K(am).remove();
            au()
        }
    });
    /*!
     * jQuery UI Effects Fade 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var af = K.effects.define("fade", "toggle", function(ai, ah) {
        var ag = ai.mode === "show";
        K(this).css("opacity", ag ? 0 : 1).animate({
            opacity: ag ? 1 : 0
        }, {
            queue: false,
            duration: ai.duration,
            easing: ai.easing,
            complete: ah
        })
    });
    /*!
     * jQuery UI Effects Fold 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var S = K.effects.define("fold", "hide", function(ax, al) {
        var am = K(this),
            an = ax.mode,
            au = an === "show",
            ao = an === "hide",
            aw = ax.size || 15,
            ap = /([0-9]+)%/.exec(aw),
            av = !!ax.horizFirst,
            aj = av ? ["right", "bottom"] : ["bottom", "right"],
            ak = ax.duration / 2,
            at = K.effects.createPlaceholder(am),
            ah = am.cssClip(),
            ar = {
                clip: K.extend({}, ah)
            },
            aq = {
                clip: K.extend({}, ah)
            },
            ag = [ah[aj[0]], ah[aj[1]]],
            ai = am.queue().length;
        if (ap) {
            aw = parseInt(ap[1], 10) / 100 * ag[ao ? 0 : 1]
        }
        ar.clip[aj[0]] = aw;
        aq.clip[aj[0]] = aw;
        aq.clip[aj[1]] = 0;
        if (au) {
            am.cssClip(aq.clip);
            if (at) {
                at.css(K.effects.clipToBox(aq))
            }
            aq.clip = ah
        }
        am.queue(function(ay) {
            if (at) {
                at.animate(K.effects.clipToBox(ar), ak, ax.easing).animate(K.effects.clipToBox(aq), ak, ax.easing)
            }
            ay()
        }).animate(ar, ak, ax.easing).animate(aq, ak, ax.easing).queue(al);
        K.effects.unshift(am, ai, 4)
    });
    /*!
     * jQuery UI Effects Highlight 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var b = K.effects.define("highlight", "show", function(ah, ag) {
        var ai = K(this),
            aj = {
                backgroundColor: ai.css("backgroundColor")
            };
        if (ah.mode === "hide") {
            aj.opacity = 0
        }
        K.effects.saveStyle(ai);
        ai.css({
            backgroundImage: "none",
            backgroundColor: ah.color || "#ffff99"
        }).animate(aj, {
            queue: false,
            duration: ah.duration,
            easing: ah.easing,
            complete: ag
        })
    });
    /*!
     * jQuery UI Effects Size 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var p = K.effects.define("size", function(aj, ap) {
        var an, ao, au, ag = K(this),
            al = ["fontSize"],
            av = ["borderTopWidth", "borderBottomWidth", "paddingTop", "paddingBottom"],
            ai = ["borderLeftWidth", "borderRightWidth", "paddingLeft", "paddingRight"],
            am = aj.mode,
            at = am !== "effect",
            ay = aj.scale || "both",
            aw = aj.origin || ["middle", "center"],
            ax = ag.css("position"),
            ak = ag.position(),
            aq = K.effects.scaledDimensions(ag),
            ar = aj.from || aq,
            ah = aj.to || K.effects.scaledDimensions(ag, 0);
        K.effects.createPlaceholder(ag);
        if (am === "show") {
            au = ar;
            ar = ah;
            ah = au
        }
        ao = {
            from: {
                y: ar.height / aq.height,
                x: ar.width / aq.width
            },
            to: {
                y: ah.height / aq.height,
                x: ah.width / aq.width
            }
        };
        if (ay === "box" || ay === "both") {
            if (ao.from.y !== ao.to.y) {
                ar = K.effects.setTransition(ag, av, ao.from.y, ar);
                ah = K.effects.setTransition(ag, av, ao.to.y, ah)
            }
            if (ao.from.x !== ao.to.x) {
                ar = K.effects.setTransition(ag, ai, ao.from.x, ar);
                ah = K.effects.setTransition(ag, ai, ao.to.x, ah)
            }
        }
        if (ay === "content" || ay === "both") {
            if (ao.from.y !== ao.to.y) {
                ar = K.effects.setTransition(ag, al, ao.from.y, ar);
                ah = K.effects.setTransition(ag, al, ao.to.y, ah)
            }
        }
        if (aw) {
            an = K.effects.getBaseline(aw, aq);
            ar.top = (aq.outerHeight - ar.outerHeight) * an.y + ak.top;
            ar.left = (aq.outerWidth - ar.outerWidth) * an.x + ak.left;
            ah.top = (aq.outerHeight - ah.outerHeight) * an.y + ak.top;
            ah.left = (aq.outerWidth - ah.outerWidth) * an.x + ak.left
        }
        ag.css(ar);
        if (ay === "content" || ay === "both") {
            av = av.concat(["marginTop", "marginBottom"]).concat(al);
            ai = ai.concat(["marginLeft", "marginRight"]);
            ag.find("*[width]").each(function() {
                var aC = K(this),
                    az = K.effects.scaledDimensions(aC),
                    aB = {
                        height: az.height * ao.from.y,
                        width: az.width * ao.from.x,
                        outerHeight: az.outerHeight * ao.from.y,
                        outerWidth: az.outerWidth * ao.from.x
                    },
                    aA = {
                        height: az.height * ao.to.y,
                        width: az.width * ao.to.x,
                        outerHeight: az.height * ao.to.y,
                        outerWidth: az.width * ao.to.x
                    };
                if (ao.from.y !== ao.to.y) {
                    aB = K.effects.setTransition(aC, av, ao.from.y, aB);
                    aA = K.effects.setTransition(aC, av, ao.to.y, aA)
                }
                if (ao.from.x !== ao.to.x) {
                    aB = K.effects.setTransition(aC, ai, ao.from.x, aB);
                    aA = K.effects.setTransition(aC, ai, ao.to.x, aA)
                }
                if (at) {
                    K.effects.saveStyle(aC)
                }
                aC.css(aB);
                aC.animate(aA, aj.duration, aj.easing, function() {
                    if (at) {
                        K.effects.restoreStyle(aC)
                    }
                })
            })
        }
        ag.animate(ah, {
            queue: false,
            duration: aj.duration,
            easing: aj.easing,
            complete: function() {
                var az = ag.offset();
                if (ah.opacity === 0) {
                    ag.css("opacity", ar.opacity)
                }
                if (!at) {
                    ag.css("position", ax === "static" ? "relative" : ax).offset(az);
                    K.effects.saveStyle(ag)
                }
                ap()
            }
        })
    });
    /*!
     * jQuery UI Effects Scale 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var f = K.effects.define("scale", function(ah, ag) {
        var ai = K(this),
            al = ah.mode,
            aj = parseInt(ah.percent, 10) || (parseInt(ah.percent, 10) === 0 ? 0 : (al !== "effect" ? 0 : 100)),
            ak = K.extend(true, {
                from: K.effects.scaledDimensions(ai),
                to: K.effects.scaledDimensions(ai, aj, ah.direction || "both"),
                origin: ah.origin || ["middle", "center"]
            }, ah);
        if (ah.fade) {
            ak.from.opacity = 1;
            ak.to.opacity = 0
        }
        K.effects.effect.size.call(this, ak, ag)
    });
    /*!
     * jQuery UI Effects Puff 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var h = K.effects.define("puff", "hide", function(ah, ag) {
        var ai = K.extend(true, {}, ah, {
            fade: true,
            percent: parseInt(ah.percent, 10) || 150
        });
        K.effects.effect.scale.call(this, ai, ag)
    });
    /*!
     * jQuery UI Effects Pulsate 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var c = K.effects.define("pulsate", "show", function(ar, ai) {
        var ak = K(this),
            al = ar.mode,
            ap = al === "show",
            am = al === "hide",
            aq = ap || am,
            an = ((ar.times || 5) * 2) + (aq ? 1 : 0),
            ah = ar.duration / an,
            ao = 0,
            aj = 1,
            ag = ak.queue().length;
        if (ap || !ak.is(":visible")) {
            ak.css("opacity", 0).show();
            ao = 1
        }
        for (; aj < an; aj++) {
            ak.animate({
                opacity: ao
            }, ah, ar.easing);
            ao = 1 - ao
        }
        ak.animate({
            opacity: ao
        }, ah, ar.easing);
        ak.queue(ai);
        K.effects.unshift(ak, ag, an + 1)
    });
    /*!
     * jQuery UI Effects Shake 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var D = K.effects.define("shake", function(av, an) {
        var ao = 1,
            ap = K(this),
            ar = av.direction || "left",
            ag = av.distance || 20,
            ah = av.times || 3,
            at = ah * 2 + 1,
            al = Math.round(av.duration / at),
            ak = (ar === "up" || ar === "down") ? "top" : "left",
            ai = (ar === "up" || ar === "left"),
            am = {},
            au = {},
            aq = {},
            aj = ap.queue().length;
        K.effects.createPlaceholder(ap);
        am[ak] = (ai ? "-=" : "+=") + ag;
        au[ak] = (ai ? "+=" : "-=") + ag * 2;
        aq[ak] = (ai ? "-=" : "+=") + ag * 2;
        ap.animate(am, al, av.easing);
        for (; ao < ah; ao++) {
            ap.animate(au, al, av.easing).animate(aq, al, av.easing)
        }
        ap.animate(au, al, av.easing).animate(am, al / 2, av.easing).queue(an);
        K.effects.unshift(ap, aj, at + 1)
    });
    /*!
     * jQuery UI Effects Slide 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var C = K.effects.define("slide", "show", function(ar, an) {
        var ak, ah, ao = K(this),
            ai = {
                up: ["bottom", "top"],
                down: ["top", "bottom"],
                left: ["right", "left"],
                right: ["left", "right"]
            },
            ap = ar.mode,
            aq = ar.direction || "left",
            al = (aq === "up" || aq === "down") ? "top" : "left",
            aj = (aq === "up" || aq === "left"),
            ag = ar.distance || ao[al === "top" ? "outerHeight" : "outerWidth"](true),
            am = {};
        K.effects.createPlaceholder(ao);
        ak = ao.cssClip();
        ah = ao.position()[al];
        am[al] = (aj ? -1 : 1) * ag + ah;
        am.clip = ao.cssClip();
        am.clip[ai[aq][1]] = am.clip[ai[aq][0]];
        if (ap === "show") {
            ao.cssClip(am.clip);
            ao.css(al, am[al]);
            am.clip = ak;
            am[al] = ah
        }
        ao.animate(am, {
            queue: false,
            duration: ar.duration,
            easing: ar.easing,
            complete: an
        })
    });
    /*!
     * jQuery UI Effects Transfer 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     */
    var W;
    if (K.uiBackCompat !== false) {
        W = K.effects.define("transfer", function(ah, ag) {
            K(this).transfer(ah, ag)
        })
    }
    var g = W
}));
/*! jQuery Timepicker Addon - v1.6.3 - 2016-04-20
 * http://trentrichardson.com/examples/timepicker
 * Copyright (c) 2016 Trent Richardson; Licensed MIT */
(function(a) {
    if (typeof define === "function" && define.amd) {
        define(["jquery", "jquery-ui"], a)
    } else {
        a(jQuery)
    }
}(function($) {
    $.ui.timepicker = $.ui.timepicker || {};
    if ($.ui.timepicker.version) {
        return
    }
    $.extend($.ui, {
        timepicker: {
            version: "1.6.3"
        }
    });
    var Timepicker = function() {
        this.regional = [];
        this.regional[""] = {
            currentText: "Now",
            closeText: "Done",
            amNames: ["AM", "A"],
            pmNames: ["PM", "P"],
            timeFormat: "HH:mm",
            timeSuffix: "",
            timeOnlyTitle: "Choose Time",
            timeText: "Time",
            hourText: "Hour",
            minuteText: "Minute",
            secondText: "Second",
            millisecText: "Millisecond",
            microsecText: "Microsecond",
            timezoneText: "Time Zone",
            isRTL: false
        };
        this._defaults = {
            showButtonPanel: true,
            timeOnly: false,
            timeOnlyShowDate: false,
            showHour: null,
            showMinute: null,
            showSecond: null,
            showMillisec: null,
            showMicrosec: null,
            showTimezone: null,
            showTime: true,
            stepHour: 1,
            stepMinute: 1,
            stepSecond: 1,
            stepMillisec: 1,
            stepMicrosec: 1,
            hour: 0,
            minute: 0,
            second: 0,
            millisec: 0,
            microsec: 0,
            timezone: null,
            hourMin: 0,
            minuteMin: 0,
            secondMin: 0,
            millisecMin: 0,
            microsecMin: 0,
            hourMax: 23,
            minuteMax: 59,
            secondMax: 59,
            millisecMax: 999,
            microsecMax: 999,
            minDateTime: null,
            maxDateTime: null,
            maxTime: null,
            minTime: null,
            onSelect: null,
            hourGrid: 0,
            minuteGrid: 0,
            secondGrid: 0,
            millisecGrid: 0,
            microsecGrid: 0,
            alwaysSetTime: true,
            separator: " ",
            altFieldTimeOnly: true,
            altTimeFormat: null,
            altSeparator: null,
            altTimeSuffix: null,
            altRedirectFocus: true,
            pickerTimeFormat: null,
            pickerTimeSuffix: null,
            showTimepicker: true,
            timezoneList: null,
            addSliderAccess: false,
            sliderAccessArgs: null,
            controlType: "slider",
            oneLine: false,
            defaultValue: null,
            parse: "strict",
            afterInject: null
        };
        $.extend(this._defaults, this.regional[""])
    };
    $.extend(Timepicker.prototype, {
        $input: null,
        $altInput: null,
        $timeObj: null,
        inst: null,
        hour_slider: null,
        minute_slider: null,
        second_slider: null,
        millisec_slider: null,
        microsec_slider: null,
        timezone_select: null,
        maxTime: null,
        minTime: null,
        hour: 0,
        minute: 0,
        second: 0,
        millisec: 0,
        microsec: 0,
        timezone: null,
        hourMinOriginal: null,
        minuteMinOriginal: null,
        secondMinOriginal: null,
        millisecMinOriginal: null,
        microsecMinOriginal: null,
        hourMaxOriginal: null,
        minuteMaxOriginal: null,
        secondMaxOriginal: null,
        millisecMaxOriginal: null,
        microsecMaxOriginal: null,
        ampm: "",
        formattedDate: "",
        formattedTime: "",
        formattedDateTime: "",
        timezoneList: null,
        units: ["hour", "minute", "second", "millisec", "microsec"],
        support: {},
        control: null,
        setDefaults: function(settings) {
            extendRemove(this._defaults, settings || {});
            return this
        },
        _newInst: function($input, opts) {
            var tp_inst = new Timepicker(),
                inlineSettings = {},
                fns = {},
                overrides, i;
            for (var attrName in this._defaults) {
                if (this._defaults.hasOwnProperty(attrName)) {
                    var attrValue = $input.attr("time:" + attrName);
                    if (attrValue) {
                        try {
                            inlineSettings[attrName] = eval(attrValue)
                        } catch (err) {
                            inlineSettings[attrName] = attrValue
                        }
                    }
                }
            }
            overrides = {
                beforeShow: function(input, dp_inst) {
                    if ($.isFunction(tp_inst._defaults.evnts.beforeShow)) {
                        return tp_inst._defaults.evnts.beforeShow.call($input[0], input, dp_inst, tp_inst)
                    }
                },
                onChangeMonthYear: function(year, month, dp_inst) {
                    if ($.isFunction(tp_inst._defaults.evnts.onChangeMonthYear)) {
                        tp_inst._defaults.evnts.onChangeMonthYear.call($input[0], year, month, dp_inst, tp_inst)
                    }
                },
                onClose: function(dateText, dp_inst) {
                    if (tp_inst.timeDefined === true && $input.val() !== "") {
                        tp_inst._updateDateTime(dp_inst)
                    }
                    if ($.isFunction(tp_inst._defaults.evnts.onClose)) {
                        tp_inst._defaults.evnts.onClose.call($input[0], dateText, dp_inst, tp_inst)
                    }
                }
            };
            for (i in overrides) {
                if (overrides.hasOwnProperty(i)) {
                    fns[i] = opts[i] || this._defaults[i] || null
                }
            }
            tp_inst._defaults = $.extend({}, this._defaults, inlineSettings, opts, overrides, {
                evnts: fns,
                timepicker: tp_inst
            });
            tp_inst.amNames = $.map(tp_inst._defaults.amNames, function(val) {
                return val.toUpperCase()
            });
            tp_inst.pmNames = $.map(tp_inst._defaults.pmNames, function(val) {
                return val.toUpperCase()
            });
            tp_inst.support = detectSupport(tp_inst._defaults.timeFormat + (tp_inst._defaults.pickerTimeFormat ? tp_inst._defaults.pickerTimeFormat : "") + (tp_inst._defaults.altTimeFormat ? tp_inst._defaults.altTimeFormat : ""));
            if (typeof(tp_inst._defaults.controlType) === "string") {
                if (tp_inst._defaults.controlType === "slider" && typeof($.ui.slider) === "undefined") {
                    tp_inst._defaults.controlType = "select"
                }
                tp_inst.control = tp_inst._controls[tp_inst._defaults.controlType]
            } else {
                tp_inst.control = tp_inst._defaults.controlType
            }
            var timezoneList = [-720, -660, -600, -570, -540, -480, -420, -360, -300, -270, -240, -210, -180, -120, -60, 0, 60, 120, 180, 210, 240, 270, 300, 330, 345, 360, 390, 420, 480, 525, 540, 570, 600, 630, 660, 690, 720, 765, 780, 840];
            if (tp_inst._defaults.timezoneList !== null) {
                timezoneList = tp_inst._defaults.timezoneList
            }
            var tzl = timezoneList.length,
                tzi = 0,
                tzv = null;
            if (tzl > 0 && typeof timezoneList[0] !== "object") {
                for (; tzi < tzl; tzi++) {
                    tzv = timezoneList[tzi];
                    timezoneList[tzi] = {
                        value: tzv,
                        label: $.timepicker.timezoneOffsetString(tzv, tp_inst.support.iso8601)
                    }
                }
            }
            tp_inst._defaults.timezoneList = timezoneList;
            tp_inst.timezone = tp_inst._defaults.timezone !== null ? $.timepicker.timezoneOffsetNumber(tp_inst._defaults.timezone) : ((new Date()).getTimezoneOffset() * -1);
            tp_inst.hour = tp_inst._defaults.hour < tp_inst._defaults.hourMin ? tp_inst._defaults.hourMin : tp_inst._defaults.hour > tp_inst._defaults.hourMax ? tp_inst._defaults.hourMax : tp_inst._defaults.hour;
            tp_inst.minute = tp_inst._defaults.minute < tp_inst._defaults.minuteMin ? tp_inst._defaults.minuteMin : tp_inst._defaults.minute > tp_inst._defaults.minuteMax ? tp_inst._defaults.minuteMax : tp_inst._defaults.minute;
            tp_inst.second = tp_inst._defaults.second < tp_inst._defaults.secondMin ? tp_inst._defaults.secondMin : tp_inst._defaults.second > tp_inst._defaults.secondMax ? tp_inst._defaults.secondMax : tp_inst._defaults.second;
            tp_inst.millisec = tp_inst._defaults.millisec < tp_inst._defaults.millisecMin ? tp_inst._defaults.millisecMin : tp_inst._defaults.millisec > tp_inst._defaults.millisecMax ? tp_inst._defaults.millisecMax : tp_inst._defaults.millisec;
            tp_inst.microsec = tp_inst._defaults.microsec < tp_inst._defaults.microsecMin ? tp_inst._defaults.microsecMin : tp_inst._defaults.microsec > tp_inst._defaults.microsecMax ? tp_inst._defaults.microsecMax : tp_inst._defaults.microsec;
            tp_inst.ampm = "";
            tp_inst.$input = $input;
            if (tp_inst._defaults.altField) {
                tp_inst.$altInput = $(tp_inst._defaults.altField);
                if (tp_inst._defaults.altRedirectFocus === true) {
                    tp_inst.$altInput.css({
                        cursor: "pointer"
                    }).focus(function() {
                        $input.trigger("focus")
                    })
                }
            }
            if (tp_inst._defaults.minDate === 0 || tp_inst._defaults.minDateTime === 0) {
                tp_inst._defaults.minDate = new Date()
            }
            if (tp_inst._defaults.maxDate === 0 || tp_inst._defaults.maxDateTime === 0) {
                tp_inst._defaults.maxDate = new Date()
            }
            if (tp_inst._defaults.minDate !== undefined && tp_inst._defaults.minDate instanceof Date) {
                tp_inst._defaults.minDateTime = new Date(tp_inst._defaults.minDate.getTime())
            }
            if (tp_inst._defaults.minDateTime !== undefined && tp_inst._defaults.minDateTime instanceof Date) {
                tp_inst._defaults.minDate = new Date(tp_inst._defaults.minDateTime.getTime())
            }
            if (tp_inst._defaults.maxDate !== undefined && tp_inst._defaults.maxDate instanceof Date) {
                tp_inst._defaults.maxDateTime = new Date(tp_inst._defaults.maxDate.getTime())
            }
            if (tp_inst._defaults.maxDateTime !== undefined && tp_inst._defaults.maxDateTime instanceof Date) {
                tp_inst._defaults.maxDate = new Date(tp_inst._defaults.maxDateTime.getTime())
            }
            tp_inst.$input.bind("focus", function() {
                tp_inst._onFocus()
            });
            return tp_inst
        },
        _addTimePicker: function(dp_inst) {
            var currDT = $.trim((this.$altInput && this._defaults.altFieldTimeOnly) ? this.$input.val() + " " + this.$altInput.val() : this.$input.val());
            this.timeDefined = this._parseTime(currDT);
            this._limitMinMaxDateTime(dp_inst, false);
            this._injectTimePicker();
            this._afterInject()
        },
        _parseTime: function(timeString, withDate) {
            if (!this.inst) {
                this.inst = $.datepicker._getInst(this.$input[0])
            }
            if (withDate || !this._defaults.timeOnly) {
                var dp_dateFormat = $.datepicker._get(this.inst, "dateFormat");
                try {
                    var parseRes = parseDateTimeInternal(dp_dateFormat, this._defaults.timeFormat, timeString, $.datepicker._getFormatConfig(this.inst), this._defaults);
                    if (!parseRes.timeObj) {
                        return false
                    }
                    $.extend(this, parseRes.timeObj)
                } catch (err) {
                    $.timepicker.log("Error parsing the date/time string: " + err + "\ndate/time string = " + timeString + "\ntimeFormat = " + this._defaults.timeFormat + "\ndateFormat = " + dp_dateFormat);
                    return false
                }
                return true
            } else {
                var timeObj = $.datepicker.parseTime(this._defaults.timeFormat, timeString, this._defaults);
                if (!timeObj) {
                    return false
                }
                $.extend(this, timeObj);
                return true
            }
        },
        _afterInject: function() {
            var o = this.inst.settings;
            if ($.isFunction(o.afterInject)) {
                o.afterInject.call(this)
            }
        },
        _injectTimePicker: function() {
            var $dp = this.inst.dpDiv,
                o = this.inst.settings,
                tp_inst = this,
                litem = "",
                uitem = "",
                show = null,
                max = {},
                gridSize = {},
                size = null,
                i = 0,
                l = 0;
            if ($dp.find("div.ui-timepicker-div").length === 0 && o.showTimepicker) {
                var noDisplay = " ui_tpicker_unit_hide",
                    html = '<div class="ui-timepicker-div' + (o.isRTL ? " ui-timepicker-rtl" : "") + (o.oneLine && o.controlType === "select" ? " ui-timepicker-oneLine" : "") + '"><dl><dt class="ui_tpicker_time_label' + ((o.showTime) ? "" : noDisplay) + '">' + o.timeText + '</dt><dd class="ui_tpicker_time ' + ((o.showTime) ? "" : noDisplay) + '"><input class="ui_tpicker_time_input" ' + (o.timeInput ? "" : "disabled") + "/></dd>";
                for (i = 0, l = this.units.length; i < l; i++) {
                    litem = this.units[i];
                    uitem = litem.substr(0, 1).toUpperCase() + litem.substr(1);
                    show = o["show" + uitem] !== null ? o["show" + uitem] : this.support[litem];
                    max[litem] = parseInt((o[litem + "Max"] - ((o[litem + "Max"] - o[litem + "Min"]) % o["step" + uitem])), 10);
                    gridSize[litem] = 0;
                    html += '<dt class="ui_tpicker_' + litem + "_label" + (show ? "" : noDisplay) + '">' + o[litem + "Text"] + '</dt><dd class="ui_tpicker_' + litem + (show ? "" : noDisplay) + '"><div class="ui_tpicker_' + litem + "_slider" + (show ? "" : noDisplay) + '"></div>';
                    if (show && o[litem + "Grid"] > 0) {
                        html += '<div style="padding-left: 1px"><table class="ui-tpicker-grid-label"><tr>';
                        if (litem === "hour") {
                            for (var h = o[litem + "Min"]; h <= max[litem]; h += parseInt(o[litem + "Grid"], 10)) {
                                gridSize[litem]++;
                                var tmph = $.datepicker.formatTime(this.support.ampm ? "hht" : "HH", {
                                    hour: h
                                }, o);
                                html += '<td data-for="' + litem + '">' + tmph + "</td>"
                            }
                        } else {
                            for (var m = o[litem + "Min"]; m <= max[litem]; m += parseInt(o[litem + "Grid"], 10)) {
                                gridSize[litem]++;
                                html += '<td data-for="' + litem + '">' + ((m < 10) ? "0" : "") + m + "</td>"
                            }
                        }
                        html += "</tr></table></div>"
                    }
                    html += "</dd>"
                }
                var showTz = o.showTimezone !== null ? o.showTimezone : this.support.timezone;
                html += '<dt class="ui_tpicker_timezone_label' + (showTz ? "" : noDisplay) + '">' + o.timezoneText + "</dt>";
                html += '<dd class="ui_tpicker_timezone' + (showTz ? "" : noDisplay) + '"></dd>';
                html += "</dl></div>";
                var $tp = $(html);
                if (o.timeOnly === true) {
                    $tp.prepend('<div class="ui-widget-header ui-helper-clearfix ui-corner-all"><div class="ui-datepicker-title">' + PrimeFaces.escapeHTML(o.timeOnlyTitle) + "</div></div>");
                    $dp.find(".ui-datepicker-header, .ui-datepicker-calendar").hide()
                }
                for (i = 0, l = tp_inst.units.length; i < l; i++) {
                    litem = tp_inst.units[i];
                    uitem = litem.substr(0, 1).toUpperCase() + litem.substr(1);
                    show = o["show" + uitem] !== null ? o["show" + uitem] : this.support[litem];
                    tp_inst[litem + "_slider"] = tp_inst.control.create(tp_inst, $tp.find(".ui_tpicker_" + litem + "_slider"), litem, tp_inst[litem], o[litem + "Min"], max[litem], o["step" + uitem]);
                    if (show && o[litem + "Grid"] > 0) {
                        size = 100 * gridSize[litem] * o[litem + "Grid"] / (max[litem] - o[litem + "Min"]);
                        $tp.find(".ui_tpicker_" + litem + " table").css({
                            width: size + "%",
                            marginLeft: o.isRTL ? "0" : ((size / (-2 * gridSize[litem])) + "%"),
                            marginRight: o.isRTL ? ((size / (-2 * gridSize[litem])) + "%") : "0",
                            borderCollapse: "collapse"
                        }).find("td").click(function(e) {
                            var $t = $(this),
                                h = $t.html(),
                                n = parseInt(h.replace(/[^0-9]/g), 10),
                                ap = h.replace(/[^apm]/ig),
                                f = $t.data("for");
                            if (f === "hour") {
                                if (ap.indexOf("p") !== -1 && n < 12) {
                                    n += 12
                                } else {
                                    if (ap.indexOf("a") !== -1 && n === 12) {
                                        n = 0
                                    }
                                }
                            }
                            tp_inst.control.value(tp_inst, tp_inst[f + "_slider"], litem, n);
                            tp_inst._onTimeChange();
                            tp_inst._onSelectHandler()
                        }).css({
                            cursor: "pointer",
                            width: (100 / gridSize[litem]) + "%",
                            textAlign: "center",
                            overflow: "hidden"
                        })
                    }
                }
                this.timezone_select = $tp.find(".ui_tpicker_timezone").append("<select></select>").find("select");
                $.fn.append.apply(this.timezone_select, $.map(o.timezoneList, function(val, idx) {
                    return $("<option />").val(typeof val === "object" ? val.value : val).text(typeof val === "object" ? val.label : val)
                }));
                if (typeof(this.timezone) !== "undefined" && this.timezone !== null && this.timezone !== "") {
                    var local_timezone = (new Date(this.inst.selectedYear, this.inst.selectedMonth, this.inst.selectedDay, 12)).getTimezoneOffset() * -1;
                    if (local_timezone === this.timezone) {
                        selectLocalTimezone(tp_inst)
                    } else {
                        this.timezone_select.val(this.timezone)
                    }
                } else {
                    if (typeof(this.hour) !== "undefined" && this.hour !== null && this.hour !== "") {
                        this.timezone_select.val(o.timezone)
                    } else {
                        selectLocalTimezone(tp_inst)
                    }
                }
                this.timezone_select.change(function() {
                    tp_inst._onTimeChange();
                    tp_inst._onSelectHandler();
                    tp_inst._afterInject()
                });
                var $buttonPanel = $dp.find(".ui-datepicker-buttonpane");
                if ($buttonPanel.length) {
                    $buttonPanel.before($tp)
                } else {
                    $dp.append($tp)
                }
                this.$timeObj = $tp.find(".ui_tpicker_time_input");
                this.$timeObj.change(function() {
                    var timeFormat = tp_inst.inst.settings.timeFormat;
                    var parsedTime = $.datepicker.parseTime(timeFormat, this.value);
                    var update = new Date();
                    if (parsedTime) {
                        update.setHours(parsedTime.hour);
                        update.setMinutes(parsedTime.minute);
                        update.setSeconds(parsedTime.second);
                        $.datepicker._setTime(tp_inst.inst, update)
                    } else {
                        this.value = tp_inst.formattedTime;
                        this.blur()
                    }
                });
                if (this.inst !== null) {
                    var timeDefined = this.timeDefined;
                    this._onTimeChange();
                    this.timeDefined = timeDefined
                }
                if (this._defaults.addSliderAccess) {
                    var sliderAccessArgs = this._defaults.sliderAccessArgs,
                        rtl = this._defaults.isRTL;
                    sliderAccessArgs.isRTL = rtl;
                    setTimeout(function() {
                        if ($tp.find(".ui-slider-access").length === 0) {
                            $tp.find(".ui-slider:visible").sliderAccess(sliderAccessArgs);
                            var sliderAccessWidth = $tp.find(".ui-slider-access:eq(0)").outerWidth(true);
                            if (sliderAccessWidth) {
                                $tp.find("table:visible").each(function() {
                                    var $g = $(this),
                                        oldWidth = $g.outerWidth(),
                                        oldMarginLeft = $g.css(rtl ? "marginRight" : "marginLeft").toString().replace("%", ""),
                                        newWidth = oldWidth - sliderAccessWidth,
                                        newMarginLeft = ((oldMarginLeft * newWidth) / oldWidth) + "%",
                                        css = {
                                            width: newWidth,
                                            marginRight: 0,
                                            marginLeft: 0
                                        };
                                    css[rtl ? "marginRight" : "marginLeft"] = newMarginLeft;
                                    $g.css(css)
                                })
                            }
                        }
                    }, 10)
                }
                tp_inst._limitMinMaxDateTime(this.inst, true)
            }
        },
        _limitMinMaxDateTime: function(dp_inst, adjustSliders) {
            var o = this._defaults,
                dp_date = new Date(dp_inst.selectedYear, dp_inst.selectedMonth, dp_inst.selectedDay);
            if (!this._defaults.showTimepicker) {
                return
            }
            if ($.datepicker._get(dp_inst, "minDateTime") !== null && $.datepicker._get(dp_inst, "minDateTime") !== undefined && dp_date) {
                var minDateTime = $.datepicker._get(dp_inst, "minDateTime"),
                    minDateTimeDate = new Date(minDateTime.getFullYear(), minDateTime.getMonth(), minDateTime.getDate(), 0, 0, 0, 0);
                if (this.hourMinOriginal === null || this.minuteMinOriginal === null || this.secondMinOriginal === null || this.millisecMinOriginal === null || this.microsecMinOriginal === null) {
                    this.hourMinOriginal = o.hourMin;
                    this.minuteMinOriginal = o.minuteMin;
                    this.secondMinOriginal = o.secondMin;
                    this.millisecMinOriginal = o.millisecMin;
                    this.microsecMinOriginal = o.microsecMin
                }
                if (dp_inst.settings.timeOnly || minDateTimeDate.getTime() === dp_date.getTime()) {
                    this._defaults.hourMin = minDateTime.getHours();
                    if (this.hour <= this._defaults.hourMin) {
                        this.hour = this._defaults.hourMin;
                        this._defaults.minuteMin = minDateTime.getMinutes();
                        if (this.minute <= this._defaults.minuteMin) {
                            this.minute = this._defaults.minuteMin;
                            this._defaults.secondMin = minDateTime.getSeconds();
                            if (this.second <= this._defaults.secondMin) {
                                this.second = this._defaults.secondMin;
                                this._defaults.millisecMin = minDateTime.getMilliseconds();
                                if (this.millisec <= this._defaults.millisecMin) {
                                    this.millisec = this._defaults.millisecMin;
                                    this._defaults.microsecMin = minDateTime.getMicroseconds()
                                } else {
                                    if (this.microsec < this._defaults.microsecMin) {
                                        this.microsec = this._defaults.microsecMin
                                    }
                                    this._defaults.microsecMin = this.microsecMinOriginal
                                }
                            } else {
                                this._defaults.millisecMin = this.millisecMinOriginal;
                                this._defaults.microsecMin = this.microsecMinOriginal
                            }
                        } else {
                            this._defaults.secondMin = this.secondMinOriginal;
                            this._defaults.millisecMin = this.millisecMinOriginal;
                            this._defaults.microsecMin = this.microsecMinOriginal
                        }
                    } else {
                        this._defaults.minuteMin = this.minuteMinOriginal;
                        this._defaults.secondMin = this.secondMinOriginal;
                        this._defaults.millisecMin = this.millisecMinOriginal;
                        this._defaults.microsecMin = this.microsecMinOriginal
                    }
                } else {
                    this._defaults.hourMin = this.hourMinOriginal;
                    this._defaults.minuteMin = this.minuteMinOriginal;
                    this._defaults.secondMin = this.secondMinOriginal;
                    this._defaults.millisecMin = this.millisecMinOriginal;
                    this._defaults.microsecMin = this.microsecMinOriginal
                }
            }
            if ($.datepicker._get(dp_inst, "maxDateTime") !== null && $.datepicker._get(dp_inst, "maxDateTime") !== undefined && dp_date) {
                var maxDateTime = $.datepicker._get(dp_inst, "maxDateTime"),
                    maxDateTimeDate = new Date(maxDateTime.getFullYear(), maxDateTime.getMonth(), maxDateTime.getDate(), 0, 0, 0, 0);
                if (this.hourMaxOriginal === null || this.minuteMaxOriginal === null || this.secondMaxOriginal === null || this.millisecMaxOriginal === null) {
                    this.hourMaxOriginal = o.hourMax;
                    this.minuteMaxOriginal = o.minuteMax;
                    this.secondMaxOriginal = o.secondMax;
                    this.millisecMaxOriginal = o.millisecMax;
                    this.microsecMaxOriginal = o.microsecMax
                }
                if (dp_inst.settings.timeOnly || maxDateTimeDate.getTime() === dp_date.getTime()) {
                    this._defaults.hourMax = maxDateTime.getHours();
                    if (this.hour >= this._defaults.hourMax) {
                        this.hour = this._defaults.hourMax;
                        this._defaults.minuteMax = maxDateTime.getMinutes();
                        if (this.minute >= this._defaults.minuteMax) {
                            this.minute = this._defaults.minuteMax;
                            this._defaults.secondMax = maxDateTime.getSeconds();
                            if (this.second >= this._defaults.secondMax) {
                                this.second = this._defaults.secondMax;
                                this._defaults.millisecMax = maxDateTime.getMilliseconds();
                                if (this.millisec >= this._defaults.millisecMax) {
                                    this.millisec = this._defaults.millisecMax;
                                    this._defaults.microsecMax = maxDateTime.getMicroseconds()
                                } else {
                                    if (this.microsec > this._defaults.microsecMax) {
                                        this.microsec = this._defaults.microsecMax
                                    }
                                    this._defaults.microsecMax = this.microsecMaxOriginal
                                }
                            } else {
                                this._defaults.millisecMax = this.millisecMaxOriginal;
                                this._defaults.microsecMax = this.microsecMaxOriginal
                            }
                        } else {
                            this._defaults.secondMax = this.secondMaxOriginal;
                            this._defaults.millisecMax = this.millisecMaxOriginal;
                            this._defaults.microsecMax = this.microsecMaxOriginal
                        }
                    } else {
                        this._defaults.minuteMax = this.minuteMaxOriginal;
                        this._defaults.secondMax = this.secondMaxOriginal;
                        this._defaults.millisecMax = this.millisecMaxOriginal;
                        this._defaults.microsecMax = this.microsecMaxOriginal
                    }
                } else {
                    this._defaults.hourMax = this.hourMaxOriginal;
                    this._defaults.minuteMax = this.minuteMaxOriginal;
                    this._defaults.secondMax = this.secondMaxOriginal;
                    this._defaults.millisecMax = this.millisecMaxOriginal;
                    this._defaults.microsecMax = this.microsecMaxOriginal
                }
            }
            if (dp_inst.settings.minTime !== null) {
                var tempMinTime = new Date("01/01/1970 " + dp_inst.settings.minTime);
                if (this.hour < tempMinTime.getHours()) {
                    this.hour = this._defaults.hourMin = tempMinTime.getHours();
                    this.minute = this._defaults.minuteMin = tempMinTime.getMinutes()
                } else {
                    if (this.hour === tempMinTime.getHours() && this.minute < tempMinTime.getMinutes()) {
                        this.minute = this._defaults.minuteMin = tempMinTime.getMinutes()
                    } else {
                        if (this._defaults.hourMin < tempMinTime.getHours()) {
                            this._defaults.hourMin = tempMinTime.getHours();
                            this._defaults.minuteMin = tempMinTime.getMinutes()
                        } else {
                            if (this._defaults.hourMin === tempMinTime.getHours() === this.hour && this._defaults.minuteMin < tempMinTime.getMinutes()) {
                                this._defaults.minuteMin = tempMinTime.getMinutes()
                            } else {
                                this._defaults.minuteMin = 0
                            }
                        }
                    }
                }
            }
            if (dp_inst.settings.maxTime !== null) {
                var tempMaxTime = new Date("01/01/1970 " + dp_inst.settings.maxTime);
                if (this.hour > tempMaxTime.getHours()) {
                    this.hour = this._defaults.hourMax = tempMaxTime.getHours();
                    this.minute = this._defaults.minuteMax = tempMaxTime.getMinutes()
                } else {
                    if (this.hour === tempMaxTime.getHours() && this.minute > tempMaxTime.getMinutes()) {
                        this.minute = this._defaults.minuteMax = tempMaxTime.getMinutes()
                    } else {
                        if (this._defaults.hourMax > tempMaxTime.getHours()) {
                            this._defaults.hourMax = tempMaxTime.getHours();
                            this._defaults.minuteMax = tempMaxTime.getMinutes()
                        } else {
                            if (this._defaults.hourMax === tempMaxTime.getHours() === this.hour && this._defaults.minuteMax > tempMaxTime.getMinutes()) {
                                this._defaults.minuteMax = tempMaxTime.getMinutes()
                            } else {
                                this._defaults.minuteMax = 59
                            }
                        }
                    }
                }
            }
            if (adjustSliders !== undefined && adjustSliders === true) {
                var hourMax = parseInt((this._defaults.hourMax - ((this._defaults.hourMax - this._defaults.hourMin) % this._defaults.stepHour)), 10),
                    minMax = parseInt((this._defaults.minuteMax - ((this._defaults.minuteMax - this._defaults.minuteMin) % this._defaults.stepMinute)), 10),
                    secMax = parseInt((this._defaults.secondMax - ((this._defaults.secondMax - this._defaults.secondMin) % this._defaults.stepSecond)), 10),
                    millisecMax = parseInt((this._defaults.millisecMax - ((this._defaults.millisecMax - this._defaults.millisecMin) % this._defaults.stepMillisec)), 10),
                    microsecMax = parseInt((this._defaults.microsecMax - ((this._defaults.microsecMax - this._defaults.microsecMin) % this._defaults.stepMicrosec)), 10);
                if (this.hour_slider) {
                    this.control.options(this, this.hour_slider, "hour", {
                        min: this._defaults.hourMin,
                        max: hourMax,
                        step: this._defaults.stepHour
                    });
                    this.control.value(this, this.hour_slider, "hour", this.hour - (this.hour % this._defaults.stepHour))
                }
                if (this.minute_slider) {
                    this.control.options(this, this.minute_slider, "minute", {
                        min: this._defaults.minuteMin,
                        max: minMax,
                        step: this._defaults.stepMinute
                    });
                    this.control.value(this, this.minute_slider, "minute", this.minute - (this.minute % this._defaults.stepMinute))
                }
                if (this.second_slider) {
                    this.control.options(this, this.second_slider, "second", {
                        min: this._defaults.secondMin,
                        max: secMax,
                        step: this._defaults.stepSecond
                    });
                    this.control.value(this, this.second_slider, "second", this.second - (this.second % this._defaults.stepSecond))
                }
                if (this.millisec_slider) {
                    this.control.options(this, this.millisec_slider, "millisec", {
                        min: this._defaults.millisecMin,
                        max: millisecMax,
                        step: this._defaults.stepMillisec
                    });
                    this.control.value(this, this.millisec_slider, "millisec", this.millisec - (this.millisec % this._defaults.stepMillisec))
                }
                if (this.microsec_slider) {
                    this.control.options(this, this.microsec_slider, "microsec", {
                        min: this._defaults.microsecMin,
                        max: microsecMax,
                        step: this._defaults.stepMicrosec
                    });
                    this.control.value(this, this.microsec_slider, "microsec", this.microsec - (this.microsec % this._defaults.stepMicrosec))
                }
            }
        },
        _onTimeChange: function() {
            if (!this._defaults.showTimepicker) {
                return
            }
            var hour = (this.hour_slider) ? this.control.value(this, this.hour_slider, "hour") : false,
                minute = (this.minute_slider) ? this.control.value(this, this.minute_slider, "minute") : false,
                second = (this.second_slider) ? this.control.value(this, this.second_slider, "second") : false,
                millisec = (this.millisec_slider) ? this.control.value(this, this.millisec_slider, "millisec") : false,
                microsec = (this.microsec_slider) ? this.control.value(this, this.microsec_slider, "microsec") : false,
                timezone = (this.timezone_select) ? this.timezone_select.val() : false,
                o = this._defaults,
                pickerTimeFormat = o.pickerTimeFormat || o.timeFormat,
                pickerTimeSuffix = o.pickerTimeSuffix || o.timeSuffix;
            if (typeof(hour) === "object") {
                hour = false
            }
            if (typeof(minute) === "object") {
                minute = false
            }
            if (typeof(second) === "object") {
                second = false
            }
            if (typeof(millisec) === "object") {
                millisec = false
            }
            if (typeof(microsec) === "object") {
                microsec = false
            }
            if (typeof(timezone) === "object") {
                timezone = false
            }
            if (hour !== false) {
                hour = parseInt(hour, 10)
            }
            if (minute !== false) {
                minute = parseInt(minute, 10)
            }
            if (second !== false) {
                second = parseInt(second, 10)
            }
            if (millisec !== false) {
                millisec = parseInt(millisec, 10)
            }
            if (microsec !== false) {
                microsec = parseInt(microsec, 10)
            }
            if (timezone !== false) {
                timezone = timezone.toString()
            }
            var ampm = o[hour < 12 ? "amNames" : "pmNames"][0];
            var hasChanged = (hour !== parseInt(this.hour, 10) || minute !== parseInt(this.minute, 10) || second !== parseInt(this.second, 10) || millisec !== parseInt(this.millisec, 10) || microsec !== parseInt(this.microsec, 10) || (this.ampm.length > 0 && (hour < 12) !== ($.inArray(this.ampm.toUpperCase(), this.amNames) !== -1)) || (this.timezone !== null && timezone !== this.timezone.toString()));
            if (hasChanged) {
                if (hour !== false) {
                    this.hour = hour
                }
                if (minute !== false) {
                    this.minute = minute
                }
                if (second !== false) {
                    this.second = second
                }
                if (millisec !== false) {
                    this.millisec = millisec
                }
                if (microsec !== false) {
                    this.microsec = microsec
                }
                if (timezone !== false) {
                    this.timezone = timezone
                }
                if (!this.inst) {
                    this.inst = $.datepicker._getInst(this.$input[0])
                }
                this._limitMinMaxDateTime(this.inst, true)
            }
            if (this.support.ampm) {
                this.ampm = ampm
            }
            this.formattedTime = $.datepicker.formatTime(o.timeFormat, this, o);
            if (this.$timeObj) {
                if (pickerTimeFormat === o.timeFormat) {
                    this.$timeObj.val(this.formattedTime + pickerTimeSuffix)
                } else {
                    this.$timeObj.val($.datepicker.formatTime(pickerTimeFormat, this, o) + pickerTimeSuffix)
                }
                if (this.$timeObj[0].setSelectionRange) {
                    var sPos = this.$timeObj[0].selectionStart;
                    var ePos = this.$timeObj[0].selectionEnd
                }
            }
            this.timeDefined = true;
            if (hasChanged) {
                this._updateDateTime()
            }
        },
        _onSelectHandler: function() {
            var onSelect = this._defaults.onSelect || this.inst.settings.onSelect;
            var inputEl = this.$input ? this.$input[0] : null;
            if (onSelect && inputEl) {
                onSelect.apply(inputEl, [this.formattedDateTime, this])
            }
        },
        _updateDateTime: function(dp_inst) {
            dp_inst = this.inst || dp_inst;
            var dtTmp = (dp_inst.currentYear > 0 ? new Date(dp_inst.currentYear, dp_inst.currentMonth, dp_inst.currentDay) : new Date(dp_inst.selectedYear, dp_inst.selectedMonth, dp_inst.selectedDay)),
                dt = $.datepicker._daylightSavingAdjust(dtTmp),
                dateFmt = $.datepicker._get(dp_inst, "dateFormat"),
                formatCfg = $.datepicker._getFormatConfig(dp_inst),
                timeAvailable = dt !== null && this.timeDefined;
            this.formattedDate = $.datepicker.formatDate(dateFmt, (dt === null ? new Date() : dt), formatCfg);
            var formattedDateTime = this.formattedDate;
            if (dp_inst.lastVal === "") {
                dp_inst.currentYear = dp_inst.selectedYear;
                dp_inst.currentMonth = dp_inst.selectedMonth;
                dp_inst.currentDay = dp_inst.selectedDay
            }
            if (this._defaults.timeOnly === true && this._defaults.timeOnlyShowDate === false) {
                formattedDateTime = this.formattedTime
            } else {
                if ((this._defaults.timeOnly !== true && (this._defaults.alwaysSetTime || timeAvailable)) || (this._defaults.timeOnly === true && this._defaults.timeOnlyShowDate === true)) {
                    formattedDateTime += this._defaults.separator + this.formattedTime + this._defaults.timeSuffix
                }
            }
            this.formattedDateTime = formattedDateTime;
            if (!this._defaults.showTimepicker) {
                this.$input.val(this.formattedDate)
            } else {
                if (this.$altInput && this._defaults.timeOnly === false && this._defaults.altFieldTimeOnly === true) {
                    this.$altInput.val(this.formattedTime);
                    this.$input.val(this.formattedDate)
                } else {
                    if (this.$altInput) {
                        this.$input.val(formattedDateTime);
                        var altFormattedDateTime = "",
                            altSeparator = this._defaults.altSeparator !== null ? this._defaults.altSeparator : this._defaults.separator,
                            altTimeSuffix = this._defaults.altTimeSuffix !== null ? this._defaults.altTimeSuffix : this._defaults.timeSuffix;
                        if (!this._defaults.timeOnly) {
                            if (this._defaults.altFormat) {
                                altFormattedDateTime = $.datepicker.formatDate(this._defaults.altFormat, (dt === null ? new Date() : dt), formatCfg)
                            } else {
                                altFormattedDateTime = this.formattedDate
                            }
                            if (altFormattedDateTime) {
                                altFormattedDateTime += altSeparator
                            }
                        }
                        if (this._defaults.altTimeFormat !== null) {
                            altFormattedDateTime += $.datepicker.formatTime(this._defaults.altTimeFormat, this, this._defaults) + altTimeSuffix
                        } else {
                            altFormattedDateTime += this.formattedTime + altTimeSuffix
                        }
                        this.$altInput.val(altFormattedDateTime)
                    } else {
                        this.$input.val(formattedDateTime)
                    }
                }
            }
            this.$input.trigger("change")
        },
        _onFocus: function() {
            if (!this.$input.val() && this._defaults.defaultValue) {
                this.$input.val(this._defaults.defaultValue);
                var inst = $.datepicker._getInst(this.$input.get(0)),
                    tp_inst = $.datepicker._get(inst, "timepicker");
                if (tp_inst) {
                    if (tp_inst._defaults.timeOnly && (inst.input.val() !== inst.lastVal)) {
                        try {
                            $.datepicker._updateDatepicker(inst)
                        } catch (err) {
                            $.timepicker.log(err)
                        }
                    }
                }
            }
        },
        _controls: {
            slider: {
                create: function(tp_inst, obj, unit, val, min, max, step) {
                    var rtl = tp_inst._defaults.isRTL;
                    return obj.prop("slide", null).slider({
                        orientation: "horizontal",
                        value: rtl ? val * -1 : val,
                        min: rtl ? max * -1 : min,
                        max: rtl ? min * -1 : max,
                        step: step,
                        slide: function(event, ui) {
                            tp_inst.control.value(tp_inst, $(this), unit, rtl ? ui.value * -1 : ui.value);
                            tp_inst._onTimeChange()
                        },
                        stop: function(event, ui) {
                            tp_inst._onSelectHandler()
                        }
                    })
                },
                options: function(tp_inst, obj, unit, opts, val) {
                    if (tp_inst._defaults.isRTL) {
                        if (typeof(opts) === "string") {
                            if (opts === "min" || opts === "max") {
                                if (val !== undefined) {
                                    return obj.slider(opts, val * -1)
                                }
                                return Math.abs(obj.slider(opts))
                            }
                            return obj.slider(opts)
                        }
                        var min = opts.min,
                            max = opts.max;
                        opts.min = opts.max = null;
                        if (min !== undefined) {
                            opts.max = min * -1
                        }
                        if (max !== undefined) {
                            opts.min = max * -1
                        }
                        return obj.slider(opts)
                    }
                    if (typeof(opts) === "string" && val !== undefined) {
                        return obj.slider(opts, val)
                    }
                    return obj.slider(opts)
                },
                value: function(tp_inst, obj, unit, val) {
                    if (tp_inst._defaults.isRTL) {
                        if (val !== undefined) {
                            return obj.slider("value", val * -1)
                        }
                        return Math.abs(obj.slider("value"))
                    }
                    if (val !== undefined) {
                        return obj.slider("value", val)
                    }
                    return obj.slider("value")
                }
            },
            select: {
                create: function(tp_inst, obj, unit, val, min, max, step) {
                    var sel = '<select class="ui-timepicker-select ui-state-default ui-corner-all" data-unit="' + unit + '" data-min="' + min + '" data-max="' + max + '" data-step="' + step + '">',
                        format = tp_inst._defaults.pickerTimeFormat || tp_inst._defaults.timeFormat;
                    for (var i = min; i <= max; i += step) {
                        sel += '<option value="' + i + '"' + (i === val ? " selected" : "") + ">";
                        if (unit === "hour") {
                            sel += $.datepicker.formatTime($.trim(format.replace(/[^ht ]/ig, "")), {
                                hour: i
                            }, tp_inst._defaults)
                        } else {
                            if (unit === "millisec" || unit === "microsec" || i >= 10) {
                                sel += i
                            } else {
                                sel += "0" + i.toString()
                            }
                        }
                        sel += "</option>"
                    }
                    sel += "</select>";
                    obj.children("select").remove();
                    $(sel).appendTo(obj).change(function(e) {
                        tp_inst._onTimeChange();
                        tp_inst._onSelectHandler();
                        tp_inst._afterInject()
                    });
                    return obj
                },
                options: function(tp_inst, obj, unit, opts, val) {
                    var o = {},
                        $t = obj.children("select");
                    if (typeof(opts) === "string") {
                        if (val === undefined) {
                            return $t.data(opts)
                        }
                        o[opts] = val
                    } else {
                        o = opts
                    }
                    return tp_inst.control.create(tp_inst, obj, $t.data("unit"), $t.val(), o.min >= 0 ? o.min : $t.data("min"), o.max || $t.data("max"), o.step || $t.data("step"))
                },
                value: function(tp_inst, obj, unit, val) {
                    var $t = obj.children("select");
                    if (val !== undefined) {
                        return $t.val(val)
                    }
                    return $t.val()
                }
            }
        }
    });
    $.fn.extend({
        timepicker: function(o) {
            o = o || {};
            var tmp_args = Array.prototype.slice.call(arguments);
            if (typeof o === "object") {
                tmp_args[0] = $.extend(o, {
                    timeOnly: true
                })
            }
            return $(this).each(function() {
                $.fn.datetimepicker.apply($(this), tmp_args)
            })
        },
        datetimepicker: function(o) {
            o = o || {};
            var tmp_args = arguments;
            if (typeof(o) === "string") {
                if (o === "getDate" || (o === "option" && tmp_args.length === 2 && typeof(tmp_args[1]) === "string")) {
                    return $.fn.datepicker.apply($(this[0]), tmp_args)
                } else {
                    return this.each(function() {
                        var $t = $(this);
                        $t.datepicker.apply($t, tmp_args)
                    })
                }
            } else {
                return this.each(function() {
                    var $t = $(this);
                    $t.datepicker($.timepicker._newInst($t, o)._defaults)
                })
            }
        }
    });
    $.datepicker.parseDateTime = function(dateFormat, timeFormat, dateTimeString, dateSettings, timeSettings) {
        var parseRes = parseDateTimeInternal(dateFormat, timeFormat, dateTimeString, dateSettings, timeSettings);
        if (parseRes.timeObj) {
            var t = parseRes.timeObj;
            parseRes.date.setHours(t.hour, t.minute, t.second, t.millisec);
            parseRes.date.setMicroseconds(t.microsec)
        }
        return parseRes.date
    };
    $.datepicker.parseTime = function(timeFormat, timeString, options) {
        var o = extendRemove(extendRemove({}, $.timepicker._defaults), options || {}),
            iso8601 = (timeFormat.replace(/\'.*?\'/g, "").indexOf("Z") !== -1);
        var strictParse = function(f, s, o) {
            var getPatternAmpm = function(amNames, pmNames) {
                var markers = [];
                if (amNames) {
                    $.merge(markers, amNames)
                }
                if (pmNames) {
                    $.merge(markers, pmNames)
                }
                markers = $.map(markers, function(val) {
                    return val.replace(/[.*+?|()\[\]{}\\]/g, "\\$&")
                });
                return "(" + markers.join("|") + ")?"
            };
            var getFormatPositions = function(timeFormat) {
                var finds = timeFormat.toLowerCase().match(/(h{1,2}|m{1,2}|s{1,2}|l{1}|c{1}|t{1,2}|z|'.*?')/g),
                    orders = {
                        h: -1,
                        m: -1,
                        s: -1,
                        l: -1,
                        c: -1,
                        t: -1,
                        z: -1
                    };
                if (finds) {
                    for (var i = 0; i < finds.length; i++) {
                        if (orders[finds[i].toString().charAt(0)] === -1) {
                            orders[finds[i].toString().charAt(0)] = i + 1
                        }
                    }
                }
                return orders
            };
            var regstr = "^" + f.toString().replace(/([hH]{1,2}|mm?|ss?|[tT]{1,2}|[zZ]|[lc]|'.*?')/g, function(match) {
                    var ml = match.length;
                    switch (match.charAt(0).toLowerCase()) {
                        case "h":
                            return ml === 1 ? "(\\d?\\d)" : "(\\d{" + ml + "})";
                        case "m":
                            return ml === 1 ? "(\\d?\\d)" : "(\\d{" + ml + "})";
                        case "s":
                            return ml === 1 ? "(\\d?\\d)" : "(\\d{" + ml + "})";
                        case "l":
                            return "(\\d?\\d?\\d)";
                        case "c":
                            return "(\\d?\\d?\\d)";
                        case "z":
                            return "(z|[-+]\\d\\d:?\\d\\d|\\S+)?";
                        case "t":
                            return getPatternAmpm(o.amNames, o.pmNames);
                        default:
                            return "(" + match.replace(/\'/g, "").replace(/(\.|\$|\^|\\|\/|\(|\)|\[|\]|\?|\+|\*)/g, function(m) {
                                return "\\" + m
                            }) + ")?"
                    }
                }).replace(/\s/g, "\\s?") + o.timeSuffix + "$",
                order = getFormatPositions(f),
                ampm = "",
                treg;
            treg = s.match(new RegExp(regstr, "i"));
            var resTime = {
                hour: 0,
                minute: 0,
                second: 0,
                millisec: 0,
                microsec: 0
            };
            if (treg) {
                if (order.t !== -1) {
                    if (treg[order.t] === undefined || treg[order.t].length === 0) {
                        ampm = "";
                        resTime.ampm = ""
                    } else {
                        ampm = $.inArray(treg[order.t].toUpperCase(), $.map(o.amNames, function(x, i) {
                            return x.toUpperCase()
                        })) !== -1 ? "AM" : "PM";
                        resTime.ampm = o[ampm === "AM" ? "amNames" : "pmNames"][0]
                    }
                }
                if (order.h !== -1) {
                    if (ampm === "AM" && treg[order.h] === "12") {
                        resTime.hour = 0
                    } else {
                        if (ampm === "PM" && treg[order.h] !== "12") {
                            resTime.hour = parseInt(treg[order.h], 10) + 12
                        } else {
                            resTime.hour = Number(treg[order.h])
                        }
                    }
                }
                if (order.m !== -1) {
                    resTime.minute = Number(treg[order.m])
                }
                if (order.s !== -1) {
                    resTime.second = Number(treg[order.s])
                }
                if (order.l !== -1) {
                    resTime.millisec = Number(treg[order.l])
                }
                if (order.c !== -1) {
                    resTime.microsec = Number(treg[order.c])
                }
                if (order.z !== -1 && treg[order.z] !== undefined) {
                    resTime.timezone = $.timepicker.timezoneOffsetNumber(treg[order.z])
                }
                return resTime
            }
            return false
        };
        var looseParse = function(f, s, o) {
            try {
                var d = new Date("2012-01-01 " + s);
                if (isNaN(d.getTime())) {
                    d = new Date("2012-01-01T" + s);
                    if (isNaN(d.getTime())) {
                        d = new Date("01/01/2012 " + s);
                        if (isNaN(d.getTime())) {
                            throw "Unable to parse time with native Date: " + s
                        }
                    }
                }
                return {
                    hour: d.getHours(),
                    minute: d.getMinutes(),
                    second: d.getSeconds(),
                    millisec: d.getMilliseconds(),
                    microsec: d.getMicroseconds(),
                    timezone: d.getTimezoneOffset() * -1
                }
            } catch (err) {
                try {
                    return strictParse(f, s, o)
                } catch (err2) {
                    $.timepicker.log("Unable to parse \ntimeString: " + s + "\ntimeFormat: " + f)
                }
            }
            return false
        };
        if (typeof o.parse === "function") {
            return o.parse(timeFormat, timeString, o)
        }
        if (o.parse === "loose") {
            return looseParse(timeFormat, timeString, o)
        }
        return strictParse(timeFormat, timeString, o)
    };
    $.datepicker.formatTime = function(format, time, options) {
        options = options || {};
        options = $.extend({}, $.timepicker._defaults, options);
        time = $.extend({
            hour: 0,
            minute: 0,
            second: 0,
            millisec: 0,
            microsec: 0,
            timezone: null
        }, time);
        var tmptime = format,
            ampmName = options.amNames[0],
            hour = parseInt(time.hour, 10);
        if (hour > 11) {
            ampmName = options.pmNames[0]
        }
        tmptime = tmptime.replace(/(?:HH?|hh?|mm?|ss?|[tT]{1,2}|[zZ]|[lc]|'.*?')/g, function(match) {
            switch (match) {
                case "HH":
                    return ("0" + hour).slice(-2);
                case "H":
                    return hour;
                case "hh":
                    return ("0" + convert24to12(hour)).slice(-2);
                case "h":
                    return convert24to12(hour);
                case "mm":
                    return ("0" + time.minute).slice(-2);
                case "m":
                    return time.minute;
                case "ss":
                    return ("0" + time.second).slice(-2);
                case "s":
                    return time.second;
                case "l":
                    return ("00" + time.millisec).slice(-3);
                case "c":
                    return ("00" + time.microsec).slice(-3);
                case "z":
                    return $.timepicker.timezoneOffsetString(time.timezone === null ? options.timezone : time.timezone, false);
                case "Z":
                    return $.timepicker.timezoneOffsetString(time.timezone === null ? options.timezone : time.timezone, true);
                case "T":
                    return ampmName.charAt(0).toUpperCase();
                case "TT":
                    return ampmName.toUpperCase();
                case "t":
                    return ampmName.charAt(0).toLowerCase();
                case "tt":
                    return ampmName.toLowerCase();
                default:
                    return match.replace(/'/g, "")
            }
        });
        return tmptime
    };
    $.datepicker._base_selectDate = $.datepicker._selectDate;
    $.datepicker._selectDate = function(id, dateStr) {
        var inst = this._getInst($(id)[0]),
            tp_inst = this._get(inst, "timepicker"),
            was_inline;
        if (tp_inst && inst.settings.showTimepicker) {
            tp_inst._limitMinMaxDateTime(inst, true);
            was_inline = inst.inline;
            inst.inline = inst.stay_open = true;
            this._base_selectDate(id, dateStr);
            inst.inline = was_inline;
            inst.stay_open = false;
            this._notifyChange(inst);
            this._updateDatepicker(inst)
        } else {
            this._base_selectDate(id, dateStr)
        }
    };
    $.datepicker._base_updateDatepicker = $.datepicker._updateDatepicker;
    $.datepicker._updateDatepicker = function(inst) {
        var input = inst.input[0];
        if ($.datepicker._curInst && $.datepicker._curInst !== inst && $.datepicker._datepickerShowing && $.datepicker._lastInput !== input) {
            return
        }
        if (typeof(inst.stay_open) !== "boolean" || inst.stay_open === false) {
            this._base_updateDatepicker(inst);
            var tp_inst = this._get(inst, "timepicker");
            if (tp_inst) {
                tp_inst._addTimePicker(inst)
            }
        }
    };
    $.datepicker._base_doKeyPress = $.datepicker._doKeyPress;
    $.datepicker._doKeyPress = function(event) {
        var inst = $.datepicker._getInst(event.target),
            tp_inst = $.datepicker._get(inst, "timepicker");
        if (tp_inst) {
            if ($.datepicker._get(inst, "constrainInput")) {
                var ampm = tp_inst.support.ampm,
                    tz = tp_inst._defaults.showTimezone !== null ? tp_inst._defaults.showTimezone : tp_inst.support.timezone,
                    dateChars = $.datepicker._possibleChars($.datepicker._get(inst, "dateFormat")),
                    datetimeChars = tp_inst._defaults.timeFormat.toString().replace(/[hms]/g, "").replace(/TT/g, ampm ? "APM" : "").replace(/Tt/g, ampm ? "AaPpMm" : "").replace(/tT/g, ampm ? "AaPpMm" : "").replace(/T/g, ampm ? "AP" : "").replace(/tt/g, ampm ? "apm" : "").replace(/t/g, ampm ? "ap" : "") + " " + tp_inst._defaults.separator + tp_inst._defaults.timeSuffix + (tz ? tp_inst._defaults.timezoneList.join("") : "") + (tp_inst._defaults.amNames.join("")) + (tp_inst._defaults.pmNames.join("")) + dateChars,
                    chr = String.fromCharCode(event.charCode === undefined ? event.keyCode : event.charCode);
                return event.ctrlKey || (chr < " " || !dateChars || datetimeChars.indexOf(chr) > -1)
            }
        }
        return $.datepicker._base_doKeyPress(event)
    };
    $.datepicker._base_updateAlternate = $.datepicker._updateAlternate;
    $.datepicker._updateAlternate = function(inst) {
        var tp_inst = this._get(inst, "timepicker");
        if (tp_inst) {
            var altField = tp_inst._defaults.altField;
            if (altField) {
                var altFormat = tp_inst._defaults.altFormat || tp_inst._defaults.dateFormat,
                    date = this._getDate(inst),
                    formatCfg = $.datepicker._getFormatConfig(inst),
                    altFormattedDateTime = "",
                    altSeparator = tp_inst._defaults.altSeparator ? tp_inst._defaults.altSeparator : tp_inst._defaults.separator,
                    altTimeSuffix = tp_inst._defaults.altTimeSuffix ? tp_inst._defaults.altTimeSuffix : tp_inst._defaults.timeSuffix,
                    altTimeFormat = tp_inst._defaults.altTimeFormat !== null ? tp_inst._defaults.altTimeFormat : tp_inst._defaults.timeFormat;
                altFormattedDateTime += $.datepicker.formatTime(altTimeFormat, tp_inst, tp_inst._defaults) + altTimeSuffix;
                if (!tp_inst._defaults.timeOnly && !tp_inst._defaults.altFieldTimeOnly && date !== null) {
                    if (tp_inst._defaults.altFormat) {
                        altFormattedDateTime = $.datepicker.formatDate(tp_inst._defaults.altFormat, date, formatCfg) + altSeparator + altFormattedDateTime
                    } else {
                        altFormattedDateTime = tp_inst.formattedDate + altSeparator + altFormattedDateTime
                    }
                }
                $(altField).val(inst.input.val() ? altFormattedDateTime : "")
            }
        } else {
            $.datepicker._base_updateAlternate(inst)
        }
    };
    $.datepicker._base_doKeyUp = $.datepicker._doKeyUp;
    $.datepicker._doKeyUp = function(event) {
        var inst = $.datepicker._getInst(event.target),
            tp_inst = $.datepicker._get(inst, "timepicker");
        if (tp_inst) {
            if (tp_inst._defaults.timeOnly && (inst.input.val() !== inst.lastVal)) {
                try {
                    $.datepicker._updateDatepicker(inst)
                } catch (err) {
                    $.timepicker.log(err)
                }
            }
        }
        return $.datepicker._base_doKeyUp(event)
    };
    $.datepicker._base_gotoToday = $.datepicker._gotoToday;
    $.datepicker._gotoToday = function(id) {
        var inst = this._getInst($(id)[0]);
        this._base_gotoToday(id);
        var tp_inst = this._get(inst, "timepicker");
        if (!tp_inst) {
            return
        }
        var tzoffset = $.timepicker.timezoneOffsetNumber(tp_inst.timezone);
        var now = new Date();
        now.setMinutes(now.getMinutes() + now.getTimezoneOffset() + parseInt(tzoffset, 10));
        this._setTime(inst, now);
        this._setDate(inst, now);
        tp_inst._onSelectHandler()
    };
    $.datepicker._disableTimepickerDatepicker = function(target) {
        var inst = this._getInst(target);
        if (!inst) {
            return
        }
        var tp_inst = this._get(inst, "timepicker");
        $(target).datepicker("getDate");
        if (tp_inst) {
            inst.settings.showTimepicker = false;
            tp_inst._defaults.showTimepicker = false;
            tp_inst._updateDateTime(inst)
        }
    };
    $.datepicker._enableTimepickerDatepicker = function(target) {
        var inst = this._getInst(target);
        if (!inst) {
            return
        }
        var tp_inst = this._get(inst, "timepicker");
        $(target).datepicker("getDate");
        if (tp_inst) {
            inst.settings.showTimepicker = true;
            tp_inst._defaults.showTimepicker = true;
            tp_inst._addTimePicker(inst);
            tp_inst._updateDateTime(inst)
        }
    };
    $.datepicker._setTime = function(inst, date) {
        var tp_inst = this._get(inst, "timepicker");
        if (tp_inst) {
            var defaults = tp_inst._defaults;
            tp_inst.hour = date ? date.getHours() : defaults.hour;
            tp_inst.minute = date ? date.getMinutes() : defaults.minute;
            tp_inst.second = date ? date.getSeconds() : defaults.second;
            tp_inst.millisec = date ? date.getMilliseconds() : defaults.millisec;
            tp_inst.microsec = date ? date.getMicroseconds() : defaults.microsec;
            tp_inst._limitMinMaxDateTime(inst, true);
            tp_inst._onTimeChange();
            tp_inst._updateDateTime(inst)
        }
    };
    $.datepicker._setTimeDatepicker = function(target, date, withDate) {
        var inst = this._getInst(target);
        if (!inst) {
            return
        }
        var tp_inst = this._get(inst, "timepicker");
        if (tp_inst) {
            this._setDateFromField(inst);
            var tp_date;
            if (date) {
                if (typeof date === "string") {
                    tp_inst._parseTime(date, withDate);
                    tp_date = new Date();
                    tp_date.setHours(tp_inst.hour, tp_inst.minute, tp_inst.second, tp_inst.millisec);
                    tp_date.setMicroseconds(tp_inst.microsec)
                } else {
                    tp_date = new Date(date.getTime());
                    tp_date.setMicroseconds(date.getMicroseconds())
                }
                if (tp_date.toString() === "Invalid Date") {
                    tp_date = undefined
                }
                this._setTime(inst, tp_date)
            }
        }
    };
    $.datepicker._base_setDateDatepicker = $.datepicker._setDateDatepicker;
    $.datepicker._setDateDatepicker = function(target, _date) {
        var inst = this._getInst(target);
        var date = _date;
        if (!inst) {
            return
        }
        if (typeof(_date) === "string") {
            date = new Date(_date);
            if (!date.getTime()) {
                this._base_setDateDatepicker.apply(this, arguments);
                date = $(target).datepicker("getDate")
            }
        }
        var tp_inst = this._get(inst, "timepicker");
        var tp_date;
        if (date instanceof Date) {
            tp_date = new Date(date.getTime());
            tp_date.setMicroseconds(date.getMicroseconds())
        } else {
            tp_date = date
        }
        if (tp_inst && tp_date) {
            if (!tp_inst.support.timezone && tp_inst._defaults.timezone === null) {
                tp_inst.timezone = tp_date.getTimezoneOffset() * -1
            }
            date = $.timepicker.timezoneAdjust(date, $.timepicker.timezoneOffsetString(-date.getTimezoneOffset()), tp_inst.timezone);
            tp_date = $.timepicker.timezoneAdjust(tp_date, $.timepicker.timezoneOffsetString(-tp_date.getTimezoneOffset()), tp_inst.timezone)
        }
        this._updateDatepicker(inst);
        this._base_setDateDatepicker.apply(this, arguments);
        this._setTimeDatepicker(target, tp_date, true)
    };
    $.datepicker._base_getDateDatepicker = $.datepicker._getDateDatepicker;
    $.datepicker._getDateDatepicker = function(target, noDefault) {
        var inst = this._getInst(target);
        if (!inst) {
            return
        }
        var tp_inst = this._get(inst, "timepicker");
        if (tp_inst) {
            if (inst.lastVal === undefined) {
                this._setDateFromField(inst, noDefault)
            }
            var date = this._getDate(inst);
            var currDT = null;
            if (tp_inst.$altInput && tp_inst._defaults.altFieldTimeOnly) {
                currDT = tp_inst.$input.val() + " " + tp_inst.$altInput.val()
            } else {
                if (tp_inst.$input.get(0).tagName !== "INPUT" && tp_inst.$altInput) {
                    currDT = tp_inst.$altInput.val()
                } else {
                    currDT = tp_inst.$input.val()
                }
            }
            if (date && tp_inst._parseTime(currDT, !inst.settings.timeOnly)) {
                date.setHours(tp_inst.hour, tp_inst.minute, tp_inst.second, tp_inst.millisec);
                date.setMicroseconds(tp_inst.microsec);
                if (tp_inst.timezone != null) {
                    if (!tp_inst.support.timezone && tp_inst._defaults.timezone === null) {
                        tp_inst.timezone = date.getTimezoneOffset() * -1
                    }
                    date = $.timepicker.timezoneAdjust(date, tp_inst.timezone, $.timepicker.timezoneOffsetString(-date.getTimezoneOffset()))
                }
            }
            return date
        }
        return this._base_getDateDatepicker(target, noDefault)
    };
    $.datepicker._base_parseDate = $.datepicker.parseDate;
    $.datepicker.parseDate = function(format, value, settings) {
        var date;
        try {
            date = this._base_parseDate(format, value, settings)
        } catch (err) {
            if (err.indexOf(":") >= 0) {
                date = this._base_parseDate(format, value.substring(0, value.length - (err.length - err.indexOf(":") - 2)), settings);
                $.timepicker.log("Error parsing the date string: " + err + "\ndate string = " + value + "\ndate format = " + format)
            } else {
                throw err
            }
        }
        return date
    };
    $.datepicker._base_formatDate = $.datepicker._formatDate;
    $.datepicker._formatDate = function(inst, day, month, year) {
        var tp_inst = this._get(inst, "timepicker");
        if (tp_inst) {
            tp_inst._updateDateTime(inst);
            return tp_inst.$input.val()
        }
        return this._base_formatDate(inst)
    };
    $.datepicker._base_optionDatepicker = $.datepicker._optionDatepicker;
    $.datepicker._optionDatepicker = function(target, name, value) {
        var inst = this._getInst(target),
            name_clone;
        if (!inst) {
            return null
        }
        var tp_inst = this._get(inst, "timepicker");
        if (tp_inst) {
            var min = null,
                max = null,
                onselect = null,
                overrides = tp_inst._defaults.evnts,
                fns = {},
                prop, ret, oldVal, $target;
            if (typeof name === "string") {
                if (name === "minDate" || name === "minDateTime") {
                    min = value
                } else {
                    if (name === "maxDate" || name === "maxDateTime") {
                        max = value
                    } else {
                        if (name === "onSelect") {
                            onselect = value
                        } else {
                            if (overrides.hasOwnProperty(name)) {
                                if (typeof(value) === "undefined") {
                                    return overrides[name]
                                }
                                fns[name] = value;
                                name_clone = {}
                            }
                        }
                    }
                }
            } else {
                if (typeof name === "object") {
                    if (name.minDate) {
                        min = name.minDate
                    } else {
                        if (name.minDateTime) {
                            min = name.minDateTime
                        } else {
                            if (name.maxDate) {
                                max = name.maxDate
                            } else {
                                if (name.maxDateTime) {
                                    max = name.maxDateTime
                                }
                            }
                        }
                    }
                    for (prop in overrides) {
                        if (overrides.hasOwnProperty(prop) && name[prop]) {
                            fns[prop] = name[prop]
                        }
                    }
                }
            }
            for (prop in fns) {
                if (fns.hasOwnProperty(prop)) {
                    overrides[prop] = fns[prop];
                    if (!name_clone) {
                        name_clone = $.extend({}, name)
                    }
                    delete name_clone[prop]
                }
            }
            if (name_clone && isEmptyObject(name_clone)) {
                return
            }
            if (min) {
                if (min === 0) {
                    min = new Date()
                } else {
                    min = new Date(min)
                }
                tp_inst._defaults.minDate = min;
                tp_inst._defaults.minDateTime = min
            } else {
                if (max) {
                    if (max === 0) {
                        max = new Date()
                    } else {
                        max = new Date(max)
                    }
                    tp_inst._defaults.maxDate = max;
                    tp_inst._defaults.maxDateTime = max
                } else {
                    if (onselect) {
                        tp_inst._defaults.onSelect = onselect
                    }
                }
            }
            if (min || max) {
                $target = $(target);
                oldVal = $target.datetimepicker("getDate");
                ret = this._base_optionDatepicker.call($.datepicker, target, name_clone || name, value);
                $target.datetimepicker("setDate", oldVal);
                return ret
            }
        }
        if (value === undefined) {
            return this._base_optionDatepicker.call($.datepicker, target, name)
        }
        return this._base_optionDatepicker.call($.datepicker, target, name_clone || name, value)
    };
    var isEmptyObject = function(obj) {
        var prop;
        for (prop in obj) {
            if (obj.hasOwnProperty(prop)) {
                return false
            }
        }
        return true
    };
    var extendRemove = function(target, props) {
        $.extend(target, props);
        for (var name in props) {
            if (props[name] === null || props[name] === undefined) {
                target[name] = props[name]
            }
        }
        return target
    };
    var detectSupport = function(timeFormat) {
        var tf = timeFormat.replace(/'.*?'/g, "").toLowerCase(),
            isIn = function(f, t) {
                return f.indexOf(t) !== -1 ? true : false
            };
        return {
            hour: isIn(tf, "h"),
            minute: isIn(tf, "m"),
            second: isIn(tf, "s"),
            millisec: isIn(tf, "l"),
            microsec: isIn(tf, "c"),
            timezone: isIn(tf, "z"),
            ampm: isIn(tf, "t") && isIn(timeFormat, "h"),
            iso8601: isIn(timeFormat, "Z")
        }
    };
    var convert24to12 = function(hour) {
        hour %= 12;
        if (hour === 0) {
            hour = 12
        }
        return String(hour)
    };
    var computeEffectiveSetting = function(settings, property) {
        return settings && settings[property] ? settings[property] : $.timepicker._defaults[property]
    };
    var splitDateTime = function(dateTimeString, timeSettings) {
        var separator = computeEffectiveSetting(timeSettings, "separator"),
            format = computeEffectiveSetting(timeSettings, "timeFormat"),
            timeParts = format.split(separator),
            timePartsLen = timeParts.length,
            allParts = dateTimeString.split(separator),
            allPartsLen = allParts.length;
        if (allPartsLen > 1) {
            return {
                dateString: allParts.splice(0, allPartsLen - timePartsLen).join(separator),
                timeString: allParts.splice(0, timePartsLen).join(separator)
            }
        }
        return {
            dateString: dateTimeString,
            timeString: ""
        }
    };
    var parseDateTimeInternal = function(dateFormat, timeFormat, dateTimeString, dateSettings, timeSettings) {
        var date, parts, parsedTime;
        parts = splitDateTime(dateTimeString, timeSettings);
        date = $.datepicker._base_parseDate(dateFormat, parts.dateString, dateSettings);
        if (parts.timeString === "") {
            return {
                date: date
            }
        }
        parsedTime = $.datepicker.parseTime(timeFormat, parts.timeString, timeSettings);
        if (!parsedTime) {
            throw "Wrong time format"
        }
        return {
            date: date,
            timeObj: parsedTime
        }
    };
    var selectLocalTimezone = function(tp_inst, date) {
        if (tp_inst && tp_inst.timezone_select) {
            var now = date || new Date();
            tp_inst.timezone_select.val(-now.getTimezoneOffset())
        }
    };
    $.timepicker = new Timepicker();
    $.timepicker.timezoneOffsetString = function(tzMinutes, iso8601) {
        if (isNaN(tzMinutes) || tzMinutes > 840 || tzMinutes < -720) {
            return tzMinutes
        }
        var off = tzMinutes,
            minutes = off % 60,
            hours = (off - minutes) / 60,
            iso = iso8601 ? ":" : "",
            tz = (off >= 0 ? "+" : "-") + ("0" + Math.abs(hours)).slice(-2) + iso + ("0" + Math.abs(minutes)).slice(-2);
        if (tz === "+00:00") {
            return "Z"
        }
        return tz
    };
    $.timepicker.timezoneOffsetNumber = function(tzString) {
        var normalized = tzString.toString().replace(":", "");
        if (normalized.toUpperCase() === "Z") {
            return 0
        }
        if (!/^(\-|\+)\d{4}$/.test(normalized)) {
            return parseInt(tzString, 10)
        }
        return ((normalized.substr(0, 1) === "-" ? -1 : 1) * ((parseInt(normalized.substr(1, 2), 10) * 60) + parseInt(normalized.substr(3, 2), 10)))
    };
    $.timepicker.timezoneAdjust = function(date, fromTimezone, toTimezone) {
        var fromTz = $.timepicker.timezoneOffsetNumber(fromTimezone);
        var toTz = $.timepicker.timezoneOffsetNumber(toTimezone);
        if (!isNaN(toTz)) {
            date.setMinutes(date.getMinutes() + (-fromTz) - (-toTz))
        }
        return date
    };
    $.timepicker.timeRange = function(startTime, endTime, options) {
        return $.timepicker.handleRange("timepicker", startTime, endTime, options)
    };
    $.timepicker.datetimeRange = function(startTime, endTime, options) {
        $.timepicker.handleRange("datetimepicker", startTime, endTime, options)
    };
    $.timepicker.dateRange = function(startTime, endTime, options) {
        $.timepicker.handleRange("datepicker", startTime, endTime, options)
    };
    $.timepicker.handleRange = function(method, startTime, endTime, options) {
        options = $.extend({}, {
            minInterval: 0,
            maxInterval: 0,
            start: {},
            end: {}
        }, options);
        var timeOnly = false;
        if (method === "timepicker") {
            timeOnly = true;
            method = "datetimepicker"
        }

        function checkDates(changed, other) {
            var startdt = startTime[method]("getDate"),
                enddt = endTime[method]("getDate"),
                changeddt = changed[method]("getDate");
            if (startdt !== null) {
                var minDate = new Date(startdt.getTime()),
                    maxDate = new Date(startdt.getTime());
                minDate.setMilliseconds(minDate.getMilliseconds() + options.minInterval);
                maxDate.setMilliseconds(maxDate.getMilliseconds() + options.maxInterval);
                if (options.minInterval > 0 && minDate > enddt) {
                    endTime[method]("setDate", minDate)
                } else {
                    if (options.maxInterval > 0 && maxDate < enddt) {
                        endTime[method]("setDate", maxDate)
                    } else {
                        if (startdt > enddt) {
                            other[method]("setDate", changeddt)
                        }
                    }
                }
            }
        }

        function selected(changed, other, option) {
            if (!changed.val()) {
                return
            }
            var date = changed[method].call(changed, "getDate");
            if (date !== null && options.minInterval > 0) {
                if (option === "minDate") {
                    date.setMilliseconds(date.getMilliseconds() + options.minInterval)
                }
                if (option === "maxDate") {
                    date.setMilliseconds(date.getMilliseconds() - options.minInterval)
                }
            }
            if (date.getTime) {
                other[method].call(other, "option", option, date)
            }
        }
        $.fn[method].call(startTime, $.extend({
            timeOnly: timeOnly,
            onClose: function(dateText, inst) {
                checkDates($(this), endTime)
            },
            onSelect: function(selectedDateTime) {
                selected($(this), endTime, "minDate")
            }
        }, options, options.start));
        $.fn[method].call(endTime, $.extend({
            timeOnly: timeOnly,
            onClose: function(dateText, inst) {
                checkDates($(this), startTime)
            },
            onSelect: function(selectedDateTime) {
                selected($(this), startTime, "maxDate")
            }
        }, options, options.end));
        checkDates(startTime, endTime);
        selected(startTime, endTime, "minDate");
        selected(endTime, startTime, "maxDate");
        return $([startTime.get(0), endTime.get(0)])
    };
    $.timepicker.log = function() {
        if (window.console && window.console.log && window.console.log.apply) {
            window.console.log.apply(window.console, Array.prototype.slice.call(arguments))
        }
    };
    $.timepicker._util = {
        _extendRemove: extendRemove,
        _isEmptyObject: isEmptyObject,
        _convert24to12: convert24to12,
        _detectSupport: detectSupport,
        _selectLocalTimezone: selectLocalTimezone,
        _computeEffectiveSetting: computeEffectiveSetting,
        _splitDateTime: splitDateTime,
        _parseDateTimeInternal: parseDateTimeInternal
    };
    if (!Date.prototype.getMicroseconds) {
        Date.prototype.microseconds = 0;
        Date.prototype.getMicroseconds = function() {
            return this.microseconds
        };
        Date.prototype.setMicroseconds = function(m) {
            this.setMilliseconds(this.getMilliseconds() + Math.floor(m / 1000));
            this.microseconds = m % 1000;
            return this
        }
    }
    $.timepicker.version = "1.6.3"
}));
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof exports ? require("jquery") : jQuery)
}(function(e) {
    var f, d = navigator.userAgent,
        c = /iphone/i.test(d),
        a = /chrome/i.test(d),
        b = /android/i.test(d);
    e.mask = {
        definitions: {
            "9": "[0-9]",
            a: "[A-Za-z]",
            "*": "[A-Za-z0-9]"
        },
        autoclear: !0,
        dataName: "rawMaskFn",
        placeholder: "_"
    }, e.fn.extend({
        caret: function(i, g) {
            var h;
            if (0 !== this.length && !this.is(":hidden")) {
                return "number" == typeof i ? (g = "number" == typeof g ? g : i, this.each(function() {
                    this.setSelectionRange ? this.setSelectionRange(i, g) : this.createTextRange && (h = this.createTextRange(), h.collapse(!0), h.moveEnd("character", g), h.moveStart("character", i), h.select())
                })) : (this[0].setSelectionRange ? (i = this[0].selectionStart, g = this[0].selectionEnd) : document.selection && document.selection.createRange && (h = document.selection.createRange(), i = 0 - h.duplicate().moveStart("character", -100000), g = i + h.text.length), {
                    begin: i,
                    end: g
                })
            }
        },
        unmask: function() {
            return this.trigger("unmask")
        },
        mask: function(q, j) {
            var n, k, h, i, p, g, l, o;
            if (!q && this.length > 0) {
                n = e(this[0]);
                var m = n.data(e.mask.dataName);
                return m ? m() : void 0
            }
            return j = e.extend({
                autoclear: e.mask.autoclear,
                placeholder: e.mask.placeholder,
                completed: null
            }, j), k = e.mask.definitions, h = [], i = l = q.length, p = null, e.each(q.split(""), function(r, s) {
                "?" == s ? (l--, i = r) : k[s] ? (h.push(new RegExp(k[s])), null === p && (p = h.length - 1), i > r && (g = h.length - 1)) : h.push(null)
            }), this.trigger("unmask").each(function() {
                function D() {
                    if (j.completed) {
                        for (var J = p; g >= J; J++) {
                            if (h[J] && E[J] === I(J)) {
                                return
                            }
                        }
                        j.completed.call(B)
                    }
                }

                function I(J) {
                    return j.placeholder.charAt(J < j.placeholder.length ? J : 0)
                }

                function u(J) {
                    for (; ++J < l && !h[J];) {}
                    return J
                }

                function t(J) {
                    for (; --J >= 0 && !h[J];) {}
                    return J
                }

                function x(M, J) {
                    var L, K;
                    if (!(0 > M)) {
                        for (L = M, K = u(J); l > L; L++) {
                            if (h[L]) {
                                if (!(l > K && h[L].test(E[K]))) {
                                    break
                                }
                                E[L] = E[K], E[K] = I(K), K = u(K)
                            }
                        }
                        A(), B.caret(Math.max(p, M))
                    }
                }

                function s(N) {
                    var L, M, J, K;
                    for (L = N, M = I(N); l > L; L++) {
                        if (h[L]) {
                            if (J = u(L), K = E[L], E[L] = M, !(l > J && h[J].test(K))) {
                                break
                            }
                            M = K
                        }
                    }
                }

                function G() {
                    var K = B.val(),
                        L = B.caret();
                    var J = function() {
                        e.proxy(e.fn.caret, B, L.begin, L.begin)()
                    };
                    if (o && o.length && o.length > K.length) {
                        for (z(!0); L.begin > 0 && !h[L.begin - 1];) {
                            L.begin--
                        }
                        if (0 === L.begin) {
                            for (; L.begin < p && !h[L.begin];) {
                                L.begin++
                            }
                        }
                        setTimeout(function() {
                            J();
                            D()
                        }, 0)
                    } else {
                        for (z(!0); L.begin < l && !h[L.begin];) {
                            L.begin++
                        }
                        setTimeout(function() {
                            J();
                            D()
                        }, 0)
                    }
                }

                function C(J) {
                    z(), B.val() != w && H(J)
                }

                function H(J) {
                    B.change();
                    if (j.onChange) {
                        j.onChange.call(B, J)
                    }
                }

                function v(M) {
                    if (!B.prop("readonly")) {
                        var N, L, J, K = M.which || M.keyCode;
                        o = B.val(), 8 === K || 46 === K || c && 127 === K ? (N = B.caret(), L = N.begin, J = N.end, J - L === 0 && (L = 46 !== K ? t(L) : J = u(L - 1), J = 46 === K ? u(J) : J), r(L, J), x(L, J - 1), M.preventDefault()) : 13 === K ? C.call(this, M) : 27 === K && (B.val(w), B.caret(0, z()), M.preventDefault())
                    }
                }

                function F(N) {
                    if (!B.prop("readonly")) {
                        var M, P, L, J = N.which || N.keyCode,
                            O = B.caret();
                        if (!(N.ctrlKey || N.altKey || N.metaKey || 32 > J || (J > 34 && J < 41)) && J && 13 !== J) {
                            if (O.end - O.begin !== 0 && (r(O.begin, O.end), x(O.begin, O.end - 1)), M = u(O.begin - 1), l > M && (P = String.fromCharCode(J), h[M].test(P))) {
                                if (s(M), E[M] = P, A(), L = u(M), b) {
                                    var K = function() {
                                        e.proxy(e.fn.caret, B, L)()
                                    };
                                    setTimeout(K, 0)
                                } else {
                                    B.caret(L)
                                }
                                O.begin <= g && D()
                            }
                            N.preventDefault()
                        }
                    }
                }

                function r(L, J) {
                    var K;
                    for (K = L; J > K && l > K; K++) {
                        h[K] && (E[K] = I(K))
                    }
                }

                function A() {
                    B.val(E.join(""))
                }

                function z(K) {
                    var J, O, N, M = B.val(),
                        L = -1;
                    for (J = 0, N = 0; l > J; J++) {
                        if (h[J]) {
                            for (E[J] = I(J); N++ < M.length;) {
                                if (O = M.charAt(N - 1), h[J].test(O)) {
                                    E[J] = O, L = J;
                                    break
                                }
                            }
                            if (N > M.length) {
                                r(J + 1, l);
                                break
                            }
                        } else {
                            E[J] === M.charAt(N) && N++, i > J && (L = J)
                        }
                    }
                    return K ? A() : i > L + 1 ? j.autoclear || E.join("") === y ? (B.val() && B.val(""), r(0, l)) : A() : (A(), B.val(B.val().substring(0, L + 1))), i ? J : p
                }
                var B = e(this),
                    E = e.map(q.split(""), function(K, J) {
                        return "?" != K ? k[K] ? I(J) : K : void 0
                    }),
                    y = E.join(""),
                    w = B.val();
                B.data(e.mask.dataName, function() {
                    return e.map(E, function(K, J) {
                        return h[J] && K != I(J) ? K : null
                    }).join("")
                }), B.one("unmask", function() {
                    B.off(".mask").removeData(e.mask.dataName)
                }).on("focus.mask", function() {
                    if (!B.prop("readonly")) {
                        clearTimeout(f);
                        var J;
                        w = B.val(), J = z(), f = setTimeout(function() {
                            B.get(0) === document.activeElement && (A(), J == q.replace("?", "").length ? B.caret(0, J) : B.caret(J))
                        }, 10)
                    }
                }).on("blur.mask", C).on("keydown.mask", v).on("keypress.mask", F).on("input.mask paste.mask", function() {
                    B.prop("readonly") || setTimeout(function() {
                        var J = z(!0);
                        B.caret(J), D()
                    }, 0)
                }), a && b && B.off("input.mask").on("input.mask", G), z()
            })
        }
    })
});
$(function() {
    var a = {
        primaryStyles: ["fontFamily", "fontSize", "fontWeight", "fontVariant", "fontStyle", "paddingLeft", "paddingTop", "paddingBottom", "paddingRight", "marginLeft", "marginTop", "marginBottom", "marginRight", "borderLeftColor", "borderTopColor", "borderBottomColor", "borderRightColor", "borderLeftStyle", "borderTopStyle", "borderBottomStyle", "borderRightStyle", "borderLeftWidth", "borderTopWidth", "borderBottomWidth", "borderRightWidth", "line-height", "outline"],
        specificStyle: {
            "word-wrap": "break-word",
            "overflow-x": "hidden",
            "overflow-y": "auto"
        },
        simulator: $('<div id="textarea_simulator"/>').css({
            position: "absolute",
            top: 0,
            left: 0,
            visibility: "hidden"
        }).appendTo(document.body),
        toHtml: function(b) {
            return PrimeFaces.escapeHTML(b).replace(/\n/g, "<br>").split(" ").join('<span style="white-space:prev-wrap">&nbsp;</span>')
        },
        getCaretPosition: function() {
            var c = a,
                n = this,
                g = n[0],
                d = n.offset();
            if ($.browser.msie && document.selection && document.selection.createRange) {
                g.focus();
                var h = document.selection.createRange();
                $("#hskeywords").val(g.scrollTop);
                return {
                    left: h.boundingLeft - d.left,
                    top: parseInt(h.boundingTop) - d.top + g.scrollTop + document.documentElement.scrollTop + parseInt(n.getComputedStyle("fontSize"))
                }
            }
            c.simulator.empty();
            $.each(c.primaryStyles, function(p, q) {
                n.cloneStyle(c.simulator, q)
            });
            c.simulator.css($.extend({
                width: n.width(),
                height: n.height()
            }, c.specificStyle));
            var l = n.val(),
                e = n.getCursorPosition();
            var f = l.substring(0, e),
                m = l.substring(e);
            var j = $('<span class="before"/>').html(c.toHtml(f)),
                o = $('<span class="focus"/>'),
                b = $('<span class="after"/>').html(c.toHtml(m));
            c.simulator.append(j).append(o).append(b);
            var i = o.offset(),
                k = c.simulator.offset();
            return {
                top: i.top - k.top - g.scrollTop + ($.browser.mozilla ? 0 : parseInt(n.getComputedStyle("fontSize"))),
                left: o[0].offsetLeft - c.simulator[0].offsetLeft - g.scrollLeft
            }
        }
    };
    $.fn.extend({
        getComputedStyle: function(c) {
            if (this.length == 0) {
                return
            }
            var d = this[0];
            var b = this.css(c);
            b = b || ($.browser.msie ? d.currentStyle[c] : document.defaultView.getComputedStyle(d, null)[c]);
            return b
        },
        cloneStyle: function(c, b) {
            var d = this.getComputedStyle(b);
            if (!!d) {
                $(c).css(b, d)
            }
        },
        cloneAllStyle: function(e, d) {
            var c = this[0];
            for (var b in c.style) {
                var f = c.style[b];
                typeof f == "string" || typeof f == "number" ? this.cloneStyle(e, b) : NaN
            }
        },
        getCursorPosition: function() {
            var e = this[0],
                b = 0;
            if ("selectionStart" in e) {
                b = e.selectionStart
            } else {
                if ("selection" in document) {
                    var c = document.selection.createRange();
                    if (parseInt($.browser.version) > 6) {
                        e.focus();
                        var g = document.selection.createRange().text.length;
                        c.moveStart("character", -e.value.length);
                        b = c.text.length - g
                    } else {
                        var h = document.body.createTextRange();
                        h.moveToElementText(e);
                        for (; h.compareEndPoints("StartToStart", c) < 0; b++) {
                            h.moveStart("character", 1)
                        }
                        for (var d = 0; d <= b; d++) {
                            if (e.value.charAt(d) == "\n") {
                                b++
                            }
                        }
                        var f = e.value.split("\n").length - 1;
                        b -= f;
                        return b
                    }
                }
            }
            return b
        },
        getCaretPosition: a.getCaretPosition
    })
});
/*!
	autosize 4.0.2
	license: MIT
	http://www.jacklmoore.com/autosize
*/
(function(c, a) {
    if (typeof define === "function" && define.amd) {
        define(["module", "exports"], a)
    } else {
        if (typeof exports !== "undefined") {
            a(module, exports)
        } else {
            var b = {
                exports: {}
            };
            a(b, b.exports);
            c.autosize = b.exports
        }
    }
})(this, function(b, d) {
    var a = typeof Map === "function" ? new Map() : function() {
        var n = [];
        var k = [];
        return {
            has: function m(p) {
                return n.indexOf(p) > -1
            },
            get: function l(p) {
                return k[n.indexOf(p)]
            },
            set: function o(p, q) {
                if (n.indexOf(p) === -1) {
                    n.push(p);
                    k.push(q)
                }
            },
            _delete: function e(q) {
                var p = n.indexOf(q);
                if (p > -1) {
                    n.splice(p, 1);
                    k.splice(p, 1)
                }
            }
        }
    }();
    var h = function h(e) {
        return new Event(e, {
            bubbles: true
        })
    };
    try {
        new Event("test")
    } catch (f) {
        h = function h(k) {
            var e = document.createEvent("Event");
            e.initEvent(k, true, false);
            return e
        }
    }

    function j(n) {
        if (!n || !n.nodeName || n.nodeName !== "TEXTAREA" || a.has(n)) {
            return
        }
        var e = null;
        var r = null;
        var k = null;

        function t() {
            var u = window.getComputedStyle(n, null);
            if (u.resize === "vertical") {
                n.style.resize = "none"
            } else {
                if (u.resize === "both") {
                    n.style.resize = "horizontal"
                }
            }
            if (u.boxSizing === "content-box") {
                e = -(parseFloat(u.paddingTop) + parseFloat(u.paddingBottom))
            } else {
                e = parseFloat(u.borderTopWidth) + parseFloat(u.borderBottomWidth)
            }
            if (isNaN(e)) {
                e = 0
            }
            m()
        }

        function p(v) {
            var u = n.style.width;
            n.style.width = "0px";
            n.offsetWidth;
            n.style.width = u;
            n.style.overflowY = v
        }

        function s(v) {
            var u = [];
            while (v && v.parentNode && v.parentNode instanceof Element) {
                if (v.parentNode.scrollTop) {
                    u.push({
                        node: v.parentNode,
                        scrollTop: v.parentNode.scrollTop
                    })
                }
                v = v.parentNode
            }
            return u
        }

        function l() {
            if (n.scrollHeight === 0) {
                return
            }
            var v = s(n);
            var u = document.documentElement && document.documentElement.scrollTop;
            n.style.height = "";
            n.style.height = n.scrollHeight + e + "px";
            r = n.clientWidth;
            v.forEach(function(w) {
                w.node.scrollTop = w.scrollTop
            });
            if (u) {
                document.documentElement.scrollTop = u
            }
        }

        function m() {
            l();
            var y = Math.round(parseFloat(n.style.height));
            var w = window.getComputedStyle(n, null);
            var x = w.boxSizing === "content-box" ? Math.round(parseFloat(w.height)) : n.offsetHeight;
            if (x < y) {
                if (w.overflowY === "hidden") {
                    p("scroll");
                    l();
                    x = w.boxSizing === "content-box" ? Math.round(parseFloat(window.getComputedStyle(n, null).height)) : n.offsetHeight
                }
            } else {
                if (w.overflowY !== "hidden") {
                    p("hidden");
                    l();
                    x = w.boxSizing === "content-box" ? Math.round(parseFloat(window.getComputedStyle(n, null).height)) : n.offsetHeight
                }
            }
            if (k !== x) {
                k = x;
                var u = h("autosize:resized");
                try {
                    n.dispatchEvent(u)
                } catch (v) {}
            }
        }
        var o = function o() {
            if (n.clientWidth !== r) {
                m()
            }
        };
        var q = function(u) {
            window.removeEventListener("resize", o, false);
            n.removeEventListener("input", m, false);
            n.removeEventListener("keyup", m, false);
            n.removeEventListener("autosize:destroy", q, false);
            n.removeEventListener("autosize:update", m, false);
            Object.keys(u).forEach(function(v) {
                n.style[v] = u[v]
            });
            a._delete(n)
        }.bind(n, {
            height: n.style.height,
            resize: n.style.resize,
            overflowY: n.style.overflowY,
            overflowX: n.style.overflowX,
            wordWrap: n.style.wordWrap
        });
        n.addEventListener("autosize:destroy", q, false);
        if ("onpropertychange" in n && "oninput" in n) {
            n.addEventListener("keyup", m, false)
        }
        window.addEventListener("resize", o, false);
        n.addEventListener("input", m, false);
        n.addEventListener("autosize:update", m, false);
        n.style.overflowX = "hidden";
        n.style.wordWrap = "break-word";
        a.set(n, {
            destroy: q,
            update: m
        });
        t()
    }

    function g(k) {
        var e = a.get(k);
        if (e) {
            e.destroy()
        }
    }

    function c(k) {
        var e = a.get(k);
        if (e) {
            e.update()
        }
    }
    var i = null;
    if (typeof window === "undefined" || typeof window.getComputedStyle !== "function") {
        i = function i(e) {
            return e
        };
        i.destroy = function(e) {
            return e
        };
        i.update = function(e) {
            return e
        }
    } else {
        i = function i(k, e) {
            if (k) {
                Array.prototype.forEach.call(k.length ? k : [k], function(l) {
                    return j(l, e)
                })
            }
            return k
        };
        i.destroy = function(e) {
            if (e) {
                Array.prototype.forEach.call(e.length ? e : [e], g)
            }
            return e
        };
        i.update = function(e) {
            if (e) {
                Array.prototype.forEach.call(e.length ? e : [e], c)
            }
            return e
        }
    }
    b.exports = i
});
/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2006, 2014 Klaus Hartl
 * Released under the MIT license
 */
(function(a) {
    if (typeof define === "function" && define.amd) {
        define(["jquery"], a)
    } else {
        if (typeof exports === "object") {
            module.exports = a(require("jquery"))
        } else {
            a(jQuery)
        }
    }
}(function(f) {
    var a = /\+/g;

    function d(i) {
        return b.raw ? i : encodeURIComponent(i)
    }

    function g(i) {
        return b.raw ? i : decodeURIComponent(i)
    }

    function h(i) {
        return d(b.json ? JSON.stringify(i) : String(i))
    }

    function c(i) {
        if (i.indexOf('"') === 0) {
            i = i.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\")
        }
        try {
            i = decodeURIComponent(i.replace(a, " "));
            return b.json ? JSON.parse(i) : i
        } catch (j) {}
    }

    function e(j, i) {
        var k = b.raw ? j : c(j);
        return f.isFunction(i) ? i(k) : k
    }
    var b = f.cookie = function(q, p, v) {
        if (arguments.length > 1 && !f.isFunction(p)) {
            v = f.extend({}, b.defaults, v);
            if (typeof v.expires === "number") {
                var r = v.expires,
                    u = v.expires = new Date();
                u.setMilliseconds(u.getMilliseconds() + r * 86400000)
            }
            return (document.cookie = [d(q), "=", h(p), v.expires ? "; expires=" + v.expires.toUTCString() : "", v.path ? "; path=" + v.path : "", v.domain ? "; domain=" + v.domain : "", v.secure ? "; secure" : ""].join(""))
        }
        var w = q ? undefined : {},
            s = document.cookie ? document.cookie.split("; ") : [],
            o = 0,
            m = s.length;
        for (; o < m; o++) {
            var n = s[o].split("="),
                j = g(n.shift()),
                k = n.join("=");
            if (q === j) {
                w = e(k, p);
                break
            }
            if (!q && (k = e(k)) !== undefined) {
                w[j] = k
            }
        }
        return w
    };
    b.defaults = {};
    f.removeCookie = function(j, i) {
        f.cookie(j, "", f.extend({}, i, {
            expires: -1
        }));
        return !f.cookie(j)
    }
}));
/*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 *
 * Requires: 1.2.2+
 */
(function(d) {
    var b = ["DOMMouseScroll", "mousewheel"];
    if (d.event.fixHooks) {
        for (var a = b.length; a;) {
            d.event.fixHooks[b[--a]] = d.event.mouseHooks
        }
    }
    d.event.special.mousewheel = {
        setup: function() {
            if (this.addEventListener) {
                for (var e = b.length; e;) {
                    this.addEventListener(b[--e], c, false)
                }
            } else {
                this.onmousewheel = c
            }
        },
        teardown: function() {
            if (this.removeEventListener) {
                for (var e = b.length; e;) {
                    this.removeEventListener(b[--e], c, false)
                }
            } else {
                this.onmousewheel = null
            }
        }
    };
    d.fn.extend({
        mousewheel: function(e) {
            return e ? this.bind("mousewheel", e) : this.trigger("mousewheel")
        },
        unmousewheel: function(e) {
            return this.unbind("mousewheel", e)
        }
    });

    function c(j) {
        var h = j || window.event,
            g = [].slice.call(arguments, 1),
            k = 0,
            i = true,
            f = 0,
            e = 0;
        j = d.event.fix(h);
        j.type = "mousewheel";
        if (h.wheelDelta) {
            k = h.wheelDelta / 120
        }
        if (h.detail) {
            k = -h.detail / 3
        }
        e = k;
        if (h.axis !== undefined && h.axis === h.HORIZONTAL_AXIS) {
            e = 0;
            f = -1 * k
        }
        if (h.wheelDeltaY !== undefined) {
            e = h.wheelDeltaY / 120
        }
        if (h.wheelDeltaX !== undefined) {
            f = -1 * h.wheelDeltaX / 120
        }
        g.unshift(j, k, f, e);
        return (d.event.dispatch || d.event.handle).apply(this, g)
    }
})(jQuery);
(function(c) {
    var l = "undefined";
    var d, g, q, f, b;
    var n, i, m, p;

    function j(s, v) {
        var u = typeof s[v];
        return u === "function" || (!!(u == "object" && s[v])) || u == "unknown"
    }

    function k(s, t) {
        return typeof(s[t]) != l
    }

    function e(s, t) {
        return !!(typeof(s[t]) == "object" && s[t])
    }

    function h(s) {
        if (window.console && window.console.log) {
            window.console.log("TextInputs module for Rangy not supported in your browser. Reason: " + s)
        }
    }

    function o(t, u, s) {
        if (u < 0) {
            u += t.value.length
        }
        if (typeof s == l) {
            s = u
        }
        if (s < 0) {
            s += t.value.length
        }
        return {
            start: u,
            end: s
        }
    }

    function a(t, u, s) {
        return {
            start: u,
            end: s,
            length: s - u,
            text: t.value.slice(u, s)
        }
    }

    function r() {
        return e(document, "body") ? document.body : document.getElementsByTagName("body")[0]
    }
    c(document).ready(function() {
        var t = document.createElement("textarea");
        r().appendChild(t);
        if (k(t, "selectionStart") && k(t, "selectionEnd")) {
            d = function(w) {
                var x = w.selectionStart,
                    v = w.selectionEnd;
                return a(w, x, v)
            };
            g = function(x, v, w) {
                var y = o(x, v, w);
                x.selectionStart = y.start;
                x.selectionEnd = y.end
            };
            p = function(w, v) {
                if (v) {
                    w.selectionEnd = w.selectionStart
                } else {
                    w.selectionStart = w.selectionEnd
                }
            }
        } else {
            if (j(t, "createTextRange") && e(document, "selection") && j(document.selection, "createRange")) {
                d = function(z) {
                    var C = 0,
                        x = 0,
                        B, w, v, A;
                    var y = document.selection.createRange();
                    if (y && y.parentElement() == z) {
                        v = z.value.length;
                        B = z.value.replace(/\r\n/g, "\n");
                        w = z.createTextRange();
                        w.moveToBookmark(y.getBookmark());
                        A = z.createTextRange();
                        A.collapse(false);
                        if (w.compareEndPoints("StartToEnd", A) > -1) {
                            C = x = v
                        } else {
                            C = -w.moveStart("character", -v);
                            C += B.slice(0, C).split("\n").length - 1;
                            if (w.compareEndPoints("EndToEnd", A) > -1) {
                                x = v
                            } else {
                                x = -w.moveEnd("character", -v);
                                x += B.slice(0, x).split("\n").length - 1
                            }
                        }
                    }
                    return a(z, C, x)
                };
                var u = function(v, w) {
                    return w - (v.value.slice(0, w).split("\r\n").length - 1)
                };
                g = function(z, v, y) {
                    var A = o(z, v, y);
                    var x = z.createTextRange();
                    var w = u(z, A.start);
                    x.collapse(true);
                    if (A.start == A.end) {
                        x.move("character", w)
                    } else {
                        x.moveEnd("character", u(z, A.end));
                        x.moveStart("character", w)
                    }
                    x.select()
                };
                p = function(x, w) {
                    var v = document.selection.createRange();
                    v.collapse(w);
                    v.select()
                }
            } else {
                r().removeChild(t);
                h("No means of finding text input caret position");
                return
            }
        }
        r().removeChild(t);
        f = function(w, z, v, x) {
            var y;
            if (z != v) {
                y = w.value;
                w.value = y.slice(0, z) + y.slice(v)
            }
            if (x) {
                g(w, z, z)
            }
        };
        q = function(v) {
            var w = d(v);
            f(v, w.start, w.end, true)
        };
        m = function(v) {
            var w = d(v),
                x;
            if (w.start != w.end) {
                x = v.value;
                v.value = x.slice(0, w.start) + x.slice(w.end)
            }
            g(v, w.start, w.start);
            return w.text
        };
        b = function(w, z, v, x) {
            var y = w.value,
                A;
            w.value = y.slice(0, v) + z + y.slice(v);
            if (x) {
                A = v + z.length;
                g(w, A, A)
            }
        };
        n = function(v, y) {
            var w = d(v),
                x = v.value;
            v.value = x.slice(0, w.start) + y + x.slice(w.end);
            var z = w.start + y.length;
            g(v, z, z)
        };
        i = function(v, y, B) {
            var x = d(v),
                A = v.value;
            v.value = A.slice(0, x.start) + y + x.text + B + A.slice(x.end);
            var z = x.start + y.length;
            var w = z + x.length;
            g(v, z, w)
        };

        function s(v, w) {
            return function() {
                var z = this.jquery ? this[0] : this;
                var A = z.nodeName.toLowerCase();
                if (z.nodeType == 1 && (A == "textarea" || (A == "input" && z.type == "text"))) {
                    var y = [z].concat(Array.prototype.slice.call(arguments));
                    var x = v.apply(this, y);
                    if (!w) {
                        return x
                    }
                }
                if (w) {
                    return this
                }
            }
        }
        c.fn.extend({
            getSelection: s(d, false),
            setSelection: s(g, true),
            collapseSelection: s(p, true),
            deleteSelectedText: s(q, true),
            deleteText: s(f, true),
            extractSelectedText: s(m, false),
            insertText: s(b, true),
            replaceSelectedText: s(n, true),
            surroundSelectedText: s(i, true)
        })
    })
})(jQuery);
/*!
 * jQuery Browser Plugin v0.0.6
 * https://github.com/gabceb/jquery-browser-plugin
 *
 * Original jquery-browser code Copyright 2005, 2013 jQuery Foundation, Inc. and other contributors
 * http://jquery.org/license
 *
 * Modifications Copyright 2013 Gabriel Cebrian
 * https://github.com/gabceb
 *
 * Released under the MIT license
 *
 * Date: 2013-07-29T17:23:27-07:00
 */
(function(f, e, h) {
    var a, d;
    f.uaMatch = function(k) {
        k = k.toLowerCase();
        var j = /(opr)[\/]([\w.]+)/.exec(k) || /(chrome)[ \/]([\w.]+)/.exec(k) || /(version)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec(k) || /(webkit)[ \/]([\w.]+)/.exec(k) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(k) || /(msie) ([\w.]+)/.exec(k) || k.indexOf("trident") >= 0 && /(rv)(?::| )([\w.]+)/.exec(k) || k.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(k) || [];
        var i = /(ipad)/.exec(k) || /(iphone)/.exec(k) || /(android)/.exec(k) || /(windows phone)/.exec(k) || /(win)/.exec(k) || /(mac)/.exec(k) || /(linux)/.exec(k) || /(cros)/i.exec(k) || [];
        return {
            browser: j[3] || j[1] || "",
            version: j[2] || "0",
            platform: i[0] || ""
        }
    };
    a = f.uaMatch(e.navigator.userAgent);
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
        var g = "msie";
        a.browser = g;
        d[g] = true
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
    f.browser = d
})(jQuery, window);
/*!
 * jQuery UI Touch Punch Improved 0.3.1
 *
 *
 * Copyright 2013, Chris Hutchinson <chris@brushd.com>
 * Original jquery-ui-touch-punch Copyright 2011, Dave Furfero
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * 
 * Original: https://github.com/furf/jquery-ui-touch-punch
 * Fork: https://github.com/markrian/jquery-ui-touch-punch-improved
 *
 * Depends:
 * jquery.ui.widget.js
 * jquery.ui.mouse.js
 */
(function(a) {
    if (typeof define === "function" && define.amd) {
        define(["jquery", "jquery.ui"], a)
    } else {
        a(jQuery)
    }
}(function(d) {
    var a = window.navigator.pointerEnabled || window.navigator.msPointerEnabled;
    d.support.touch = ("ontouchstart" in document || "ontouchstart" in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0);
    if (!d.support.touch || !d.ui.mouse) {
        return
    }
    var e = d.ui.mouse.prototype,
        g = e._mouseInit,
        c;

    function b(l) {
        var j = window.pageXOffset,
            i = window.pageYOffset,
            h = l.clientX,
            k = l.clientY;
        if (l.pageY === 0 && Math.floor(k) > Math.floor(l.pageY) || l.pageX === 0 && Math.floor(h) > Math.floor(l.pageX)) {
            h = h - j;
            k = k - i
        } else {
            if (k < (l.pageY - i) || h < (l.pageX - j)) {
                h = l.pageX - j;
                k = l.pageY - i
            }
        }
        return {
            clientX: h,
            clientY: k
        }
    }

    function f(i, j) {
        if ((!a && i.originalEvent.touches.length > 1) || (a && !i.originalEvent.isPrimary)) {
            return
        }
        var l = a ? i.originalEvent : i.originalEvent.changedTouches[0],
            h = document.createEvent("MouseEvents"),
            k = b(l);
        if (d(l.target).is("input") || d(l.target).is("textarea")) {
            i.stopPropagation()
        } else {
            i.preventDefault()
        }
        h.initMouseEvent(j, true, true, window, 1, i.screenX || l.screenX, i.screenY || l.screenY, i.clientX || k.clientX, i.clientY || k.clientY, false, false, false, false, 0, null);
        i.target.dispatchEvent(h)
    }
    e._touchStart = function(i) {
        var h = this;
        if (c || (!a && !h._mouseCapture(i.originalEvent.changedTouches[0]))) {
            return
        }
        c = true;
        h._touchMoved = false;
        f(i, "mouseover");
        f(i, "mousemove");
        f(i, "mousedown")
    };
    e._touchMove = function(h) {
        if (!c) {
            return
        }
        this._touchMoved = true;
        f(h, "mousemove")
    };
    e._touchEnd = function(h) {
        if (!c) {
            return
        }
        f(h, "mouseup");
        f(h, "mouseout");
        if (!this._touchMoved) {
            f(h, "click")
        }
        c = false
    };
    e._mouseInit = function() {
        var h = this;
        if (a) {
            h.element.on({
                pointerdown: d.proxy(h, "_touchStart"),
                pointermove: d.proxy(h, "_touchMove"),
                pointerup: d.proxy(h, "_touchEnd"),
                MSPointerDown: d.proxy(h, "_touchStart"),
                MSPointerMove: d.proxy(h, "_touchMove"),
                MSPointerUp: d.proxy(h, "_touchEnd")
            })
        } else {
            h.element.on({
                touchstart: d.proxy(h, "_touchStart"),
                touchmove: d.proxy(h, "_touchMove"),
                touchend: d.proxy(h, "_touchEnd"),
            })
        }
        g.call(h)
    }
}));
(function() {
    var a = $.datepicker._gotoToday;
    $.datepicker._gotoToday = function(d) {
        var c = $(d),
            b = this._getInst(c[0]);
        a.call(this, d);
        this._selectDate(d, this._formatDate(b, b.selectedDay, b.drawMonth, b.drawYear))
    };
    $.datepicker._attachHandlers = function(c) {
        var b = this._get(c, "stepMonths"),
            d = "#" + c.id.replace(/\\\\/g, "\\");
        c.dpDiv.find("[data-handler]").map(function() {
            var e = {
                prev: function() {
                    $.datepicker._adjustDate(d, -b, "M");
                    this.updateDatePickerPosition(c)
                },
                next: function() {
                    $.datepicker._adjustDate(d, +b, "M");
                    this.updateDatePickerPosition(c)
                },
                hide: function() {
                    $.datepicker._hideDatepicker()
                },
                today: function() {
                    $.datepicker._gotoToday(d)
                },
                selectDay: function() {
                    $.datepicker._selectDay(d, +this.getAttribute("data-month"), +this.getAttribute("data-year"), this);
                    return false
                },
                selectMonth: function() {
                    $.datepicker._selectMonthYear(d, this, "M");
                    return false
                },
                selectYear: function() {
                    $.datepicker._selectMonthYear(d, this, "Y");
                    return false
                }
            };
            $(this).bind(this.getAttribute("data-event"), e[this.getAttribute("data-handler")]);
            this.updateDatePickerPosition = function(g) {
                if (!$.datepicker._pos) {
                    $.datepicker._pos = $.datepicker._findPos(g.input[0]);
                    $.datepicker._pos[1] += g.input[0].offsetHeight
                }
                var i = {
                    left: $.datepicker._pos[0],
                    top: $.datepicker._pos[1]
                };
                $.datepicker._pos = null;
                var h = false;
                $(g.input[0]).parents().each(function() {
                    h |= $(this).css("position") === "fixed";
                    return !h
                });
                var f = $.datepicker._checkOffset(g, i, h);
                g.dpDiv.css({
                    top: f.top + "px"
                })
            };
            this.updateDatePickerPosition(c)
        })
    };
    $.datepicker._generateMonthYearHeader = function(f, d, n, h, l, o, j, b) {
        var s, c, t, q, g, p, m, i, e = this._get(f, "changeMonth"),
            u = this._get(f, "changeYear"),
            v = this._get(f, "showMonthAfterYear"),
            k = "<div class='ui-datepicker-title'>",
            r = "";
        if (o || !e) {
            r += "<span class='ui-datepicker-month' aria-label='select month'>" + j[d] + "</span>"
        } else {
            s = (h && h.getFullYear() === n);
            c = (l && l.getFullYear() === n);
            r += "<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change' aria-label='select month'>";
            for (t = 0; t < 12; t++) {
                if ((!s || t >= h.getMonth()) && (!c || t <= l.getMonth())) {
                    r += "<option value='" + t + "'" + (t === d ? " selected='selected'" : "") + ">" + b[t] + "</option>"
                }
            }
            r += "</select>"
        }
        if (!v) {
            k += r + (o || !(e && u) ? "&#xa0;" : "")
        }
        if (!f.yearshtml) {
            f.yearshtml = "";
            if (o || !u) {
                k += "<span class='ui-datepicker-year' aria-label='select year'>" + n + "</span>"
            } else {
                q = this._get(f, "yearRange").split(":");
                g = new Date().getFullYear();
                p = function(x) {
                    var w = (x.match(/c[+\-].*/) ? n + parseInt(x.substring(1), 10) : (x.match(/[+\-].*/) ? g + parseInt(x, 10) : parseInt(x, 10)));
                    return (isNaN(w) ? g : w)
                };
                m = p(q[0]);
                i = Math.max(m, p(q[1] || ""));
                m = (h ? Math.max(m, h.getFullYear()) : m);
                i = (l ? Math.min(i, l.getFullYear()) : i);
                f.yearshtml += "<select class='ui-datepicker-year' data-handler='selectYear' data-event='change' aria-label='select year'>";
                for (; m <= i; m++) {
                    f.yearshtml += "<option value='" + m + "'" + (m === n ? " selected='selected'" : "") + ">" + m + "</option>"
                }
                f.yearshtml += "</select>";
                k += f.yearshtml;
                f.yearshtml = null
            }
        }
        k += this._get(f, "yearSuffix");
        if (v) {
            k += (o || !(e && u) ? "&#xa0;" : "") + r
        }
        k += "</div>";
        return k
    };
    $.datepicker._updateDatepicker = function(c) {
        var b = c.input[0];
        if ($.datepicker._curInst && $.datepicker._curInst !== c && $.datepicker._datepickerShowing && $.datepicker._lastInput !== b) {
            return
        }
        if (typeof(c.stay_open) !== "boolean" || c.stay_open === false) {
            var d = this;
            setTimeout(function() {
                d._base_updateDatepicker(c);
                var e = d._get(c, "timepicker");
                if (e) {
                    e._addTimePicker(c)
                }
            }, 0)
        }
    }
})();
(function() {
    $.fn.extend({
        focus: (function(a) {
            return function(b, c) {
                return typeof b === "number" ? this.each(function() {
                    var d = this;
                    setTimeout(function() {
                        $(d).focus();
                        if (c) {
                            c.call(d)
                        }
                    }, b)
                }) : a.apply(this, arguments)
            }
        })($.fn.focus),
        disableSelection: (function() {
            var a = "onselectstart" in document.createElement("div") ? "selectstart" : "mousedown";
            return function() {
                return this.bind(a + ".ui-disableSelection", function(b) {
                    b.preventDefault()
                })
            }
        })(),
        enableSelection: function() {
            return this.unbind(".ui-disableSelection")
        },
        zIndex: function(d) {
            if (d !== undefined) {
                return this.css("zIndex", d)
            }
            if (this.length) {
                var b = $(this[0]),
                    a, c;
                while (b.length && b[0] !== document) {
                    a = b.css("position");
                    if (a === "absolute" || a === "relative" || a === "fixed") {
                        c = parseInt(b.css("zIndex"), 10);
                        if (!isNaN(c) && c !== 0) {
                            return c
                        }
                    }
                    b = b.parent()
                }
            }
            return 0
        }
    })
})();
$.widget("ui.sortable", $.ui.sortable, {
    _setHandleClassName: function() {
        this._removeClass(this.element.find(".ui-sortable-handle"), "ui-sortable-handle");
        $.each(this.items, function() {
            (this.instance.options.handle ? this.item.find(this.instance.options.handle) : this.item).addClass("ui-sortable-handle")
        })
    }
});
(function() {
    $.extend(Object.getPrototypeOf($.timepicker), {
        _updateDateTime: function(h) {
            h = this.inst || h;
            var e = (h.currentYear > 0 ? new Date(h.currentYear, h.currentMonth, h.currentDay) : new Date(h.selectedYear, h.selectedMonth, h.selectedDay)),
                b = $.datepicker._daylightSavingAdjust(e),
                i = $.datepicker._get(h, "dateFormat"),
                c = $.datepicker._getFormatConfig(h),
                g = b !== null && this.timeDefined;
            this.formattedDate = $.datepicker.formatDate(i, (b === null ? new Date() : b), c);
            var a = this.formattedDate;
            var j = h.lastVal;
            if (j === "") {
                h.currentYear = h.selectedYear;
                h.currentMonth = h.selectedMonth;
                h.currentDay = h.selectedDay
            }
            if (this._defaults.timeOnly === true && this._defaults.timeOnlyShowDate === false) {
                a = this.formattedTime
            } else {
                if ((this._defaults.timeOnly !== true && (this._defaults.alwaysSetTime || g)) || (this._defaults.timeOnly === true && this._defaults.timeOnlyShowDate === true)) {
                    a += this._defaults.separator + this.formattedTime + this._defaults.timeSuffix
                }
            }
            this.formattedDateTime = a;
            if (!this._defaults.showTimepicker) {
                this.$input.val(this.formattedDate)
            } else {
                if (this.$altInput && this._defaults.timeOnly === false && this._defaults.altFieldTimeOnly === true) {
                    this.$altInput.val(this.formattedTime);
                    this.$input.val(this.formattedDate)
                } else {
                    if (this.$altInput) {
                        this.$input.val(a);
                        var f = "",
                            k = this._defaults.altSeparator !== null ? this._defaults.altSeparator : this._defaults.separator,
                            d = this._defaults.altTimeSuffix !== null ? this._defaults.altTimeSuffix : this._defaults.timeSuffix;
                        if (!this._defaults.timeOnly) {
                            if (this._defaults.altFormat) {
                                f = $.datepicker.formatDate(this._defaults.altFormat, (b === null ? new Date() : b), c)
                            } else {
                                f = this.formattedDate
                            }
                            if (f) {
                                f += k
                            }
                        }
                        if (this._defaults.altTimeFormat !== null) {
                            f += $.datepicker.formatTime(this._defaults.altTimeFormat, this, this._defaults) + d
                        } else {
                            f += this.formattedTime + d
                        }
                        this.$altInput.val(f)
                    } else {
                        this.$input.val(a)
                    }
                }
            }
            if (j != a) {
                this.$input.trigger("change")
            }
        },
        _addTimePicker: function(b) {
            var a = $.trim((this.$altInput && this._defaults.altFieldTimeOnly) ? this.$input.val() + " " + this.$altInput.val() : this.$input.next().val());
            this.timeDefined = this._parseTime(a);
            this._limitMinMaxDateTime(b, false);
            this._injectTimePicker();
            this._afterInject()
        },
        _controls: {
            slider: {
                create: function(b, g, e, h, c, a, d) {
                    var f = b._defaults.isRTL;
                    return g.prop("slide", null).slider({
                        orientation: "horizontal",
                        value: f ? h * -1 : h,
                        min: f ? a * -1 : c,
                        max: f ? c * -1 : a,
                        step: d,
                        slide: function(i, j) {
                            b.control.value(b, $(this), e, f ? j.value * -1 : j.value);
                            b._onTimeChange()
                        },
                        stop: function(i, j) {
                            b._onSelectHandler()
                        }
                    })
                },
                options: function(b, f, e, d, g) {
                    if (b._defaults.isRTL) {
                        if (typeof(d) === "string") {
                            if (d === "min" || d === "max") {
                                if (g !== undefined) {
                                    return f.slider(d, g * -1)
                                }
                                return Math.abs(f.slider(d))
                            }
                            return f.slider(d)
                        }
                        var c = d.min,
                            a = d.max;
                        d.min = d.max = null;
                        if (c !== undefined) {
                            d.max = c * -1
                        }
                        if (a !== undefined) {
                            d.min = a * -1
                        }
                        return f.slider(d)
                    }
                    if (typeof(d) === "string" && g !== undefined) {
                        return f.slider(d, g)
                    }
                    return f.slider(d)
                },
                value: function(a, c, b, d) {
                    if (a._defaults.isRTL) {
                        if (d !== undefined) {
                            return c.slider("value", d * -1)
                        }
                        return Math.abs(c.slider("value"))
                    }
                    if (d !== undefined) {
                        return c.slider("value", d)
                    }
                    return c.slider("value")
                }
            },
            select: {
                create: function(g, f, k, b, d, h, c) {
                    var a = '<select class="ui-timepicker-select ui-state-default ui-corner-all" data-unit="' + k + '" data-min="' + d + '" data-max="' + h + '" data-step="' + c + '" aria-label="select ' + k + '">',
                        j = g._defaults.pickerTimeFormat || g._defaults.timeFormat;
                    for (var e = d; e <= h; e += c) {
                        a += '<option value="' + e + '"' + (e === b ? " selected" : "") + ">";
                        if (k === "hour") {
                            a += $.datepicker.formatTime($.trim(j.replace(/[^ht ]/ig, "")), {
                                hour: e
                            }, g._defaults)
                        } else {
                            if (k === "millisec" || k === "microsec" || e >= 10) {
                                a += e
                            } else {
                                a += "0" + e.toString()
                            }
                        }
                        a += "</option>"
                    }
                    a += "</select>";
                    f.children("select").remove();
                    $(a).appendTo(f).change(function(i) {
                        g._onTimeChange();
                        g._onSelectHandler();
                        g._afterInject()
                    });
                    return f
                },
                options: function(a, d, c, b, f) {
                    var e = {},
                        g = d.children("select");
                    if (typeof(b) === "string") {
                        if (f === undefined) {
                            return g.data(b)
                        }
                        e[b] = f
                    } else {
                        e = b
                    }
                    return a.control.create(a, d, g.data("unit"), g.val(), e.min >= 0 ? e.min : g.data("min"), e.max || g.data("max"), e.step || g.data("step"))
                },
                value: function(a, c, b, d) {
                    var e = c.children("select");
                    if (d !== undefined) {
                        return e.val(d)
                    }
                    return e.val()
                }
            }
        }
    })
})();