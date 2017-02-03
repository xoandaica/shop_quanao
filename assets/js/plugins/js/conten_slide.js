
"function" != typeof Object.create && (Object.create = function (n) {
    function t() {
    }
    return t.prototype = n, new t
}), function (n) {
    var t = {init: function (t, i) {
        var r = this;
        r.elem = i;
        r.$elem = n(i);
        r.imageSrc = r.$elem.data("zoom-image") ? r.$elem.data("zoom-image") : r.$elem.attr("src");
        r.options = n.extend({}, n.fn.elevateZoom.options, t);
        r.options.tint && (r.options.lensColour = "none", r.options.lensOpacity = "1");
        "inner" == r.options.zoomType && (r.options.showLens = !1);
        r.$elem.parent().removeAttr("title").removeAttr("alt");
        r.zoomImage = r.imageSrc;
        r.refresh(1);
        n("#" + r.options.gallery + " a").click(function (t) {
            return r.options.galleryActiveClass && (n("#" + r.options.gallery + " a").removeClass(r.options.galleryActiveClass), n(this).addClass(r.options.galleryActiveClass)), t.preventDefault(), r.zoomImagePre = n(this).data("zoom-image") ? n(this).data("zoom-image") : n(this).data("image"), r.swaptheimage(n(this).data("image"), r.zoomImagePre), !1
        })
    }, refresh: function (n) {
        var t = this;
        setTimeout(function () {
            t.fetch(t.imageSrc)
        }, n || t.options.refresh)
    }, fetch: function (n) {
        var t = this, i = new Image;
        i.onload = function () {
            t.largeWidth = i.width;
            t.largeHeight = i.height;
            t.startZoom();
            t.currentImage = t.imageSrc;
            t.options.onZoomedImageLoaded(t.$elem)
        };
        i.src = n
    }, startZoom: function () {
        var t = this, i;
        t.nzWidth = t.$elem.width();
        t.nzHeight = t.$elem.height();
        t.isWindowActive = !1;
        t.isLensActive = !1;
        t.isTintActive = !1;
        t.overWindow = !1;
        t.options.imageCrossfade && (t.zoomWrap = t.$elem.wrap('<div style="height:' + t.nzHeight + "px;width:" + t.nzWidth + 'px;" class="zoomWrapper" />'), t.$elem.css("position", "absolute"));
        t.zoomLock = 1;
        t.scrollingLock = !1;
        t.changeBgSize = !1;
        t.currentZoomLevel = t.options.zoomLevel;
        t.nzOffset = t.$elem.offset();
        t.widthRatio = t.largeWidth / t.currentZoomLevel / t.nzWidth;
        t.heightRatio = t.largeHeight / t.currentZoomLevel / t.nzHeight;
        "window" == t.options.zoomType && (t.zoomWindowStyle = "overflow: hidden;background-position: 0px 0px;text-align:center;background-color: " + String(t.options.zoomWindowBgColour) + ";width: " + String(t.options.zoomWindowWidth) + "px;height: " + String(t.options.zoomWindowHeight) + "px;float: left;background-size: " + t.largeWidth / t.currentZoomLevel + "px " + t.largeHeight / t.currentZoomLevel + "px;display: none;z-index:100;border: " + String(t.options.borderSize) + "px solid " + t.options.borderColour + ";background-repeat: no-repeat;position: absolute;");
        "inner" == t.options.zoomType && (i = t.$elem.css("border-left-width"), t.zoomWindowStyle = "overflow: hidden;margin-left: " + String(i) + ";margin-top: " + String(i) + ";background-position: 0px 0px;width: " + String(t.nzWidth) + "px;height: " + String(t.nzHeight) + "px;float: left;display: none;cursor:" + t.options.cursor + ";px solid " + t.options.borderColour + ";background-repeat: no-repeat;position: absolute;");
        "window" == t.options.zoomType && (lensHeight = t.nzHeight < t.options.zoomWindowWidth / t.widthRatio ? t.nzHeight : String(t.options.zoomWindowHeight / t.heightRatio), lensWidth = t.largeWidth < t.options.zoomWindowWidth ? t.nzWidth : t.options.zoomWindowWidth / t.widthRatio, t.lensStyle = "background-position: 0px 0px;width: " + String(t.options.zoomWindowWidth / t.widthRatio) + "px;height: " + String(t.options.zoomWindowHeight / t.heightRatio) + "px;float: right;display: none;overflow: hidden;z-index: 999;-webkit-transform: translateZ(0);opacity:" + t.options.lensOpacity + ";filter: alpha(opacity = " + 100 * t.options.lensOpacity + "); zoom:1;width:" + lensWidth + "px;height:" + lensHeight + "px;background-color:" + t.options.lensColour + ";cursor:" + t.options.cursor + ";border: " + t.options.lensBorderSize + "px solid " + t.options.lensBorderColour + ";background-repeat: no-repeat;position: absolute;");
        t.tintStyle = "display: block;position: absolute;background-color: " + t.options.tintColour + ";filter:alpha(opacity=0);opacity: 0;width: " + t.nzWidth + "px;height: " + t.nzHeight + "px;";
        t.lensRound = "";
        "lens" == t.options.zoomType && (t.lensStyle = "background-position: 0px 0px;float: left;display: none;border: " + String(t.options.borderSize) + "px solid " + t.options.borderColour + ";width:" + String(t.options.lensSize) + "px;height:" + String(t.options.lensSize) + "px;background-repeat: no-repeat;position: absolute;");
        "round" == t.options.lensShape && (t.lensRound = "border-top-left-radius: " + String(t.options.lensSize / 2 + t.options.borderSize) + "px;border-top-right-radius: " + String(t.options.lensSize / 2 + t.options.borderSize) + "px;border-bottom-left-radius: " + String(t.options.lensSize / 2 + t.options.borderSize) + "px;border-bottom-right-radius: " + String(t.options.lensSize / 2 + t.options.borderSize) + "px;");
        t.zoomContainer = n('<div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:' + t.nzOffset.left + "px;top:" + t.nzOffset.top + "px;height:" + t.nzHeight + "px;width:" + t.nzWidth + 'px;"><\/div>');
        n("body").append(t.zoomContainer);
        t.options.containLensZoom && "lens" == t.options.zoomType && t.zoomContainer.css("overflow", "hidden");
        "inner" != t.options.zoomType && (t.zoomLens = n("<div class='zoomLens' style='" + t.lensStyle + t.lensRound + "'>&nbsp;<\/div>").appendTo(t.zoomContainer).click(function () {
            t.$elem.trigger("click")
        }), t.options.tint && (t.tintContainer = n("<div/>").addClass("tintContainer"), t.zoomTint = n("<div class='zoomTint' style='" + t.tintStyle + "'><\/div>"), t.zoomLens.wrap(t.tintContainer), t.zoomTintcss = t.zoomLens.after(t.zoomTint), t.zoomTintImage = n('<img style="position: absolute; left: 0px; top: 0px; max-width: none; width: ' + t.nzWidth + "px; height: " + t.nzHeight + 'px;" src="' + t.imageSrc + '">').appendTo(t.zoomLens).click(function () {
            t.$elem.trigger("click")
        })));
        t.zoomWindow = isNaN(t.options.zoomWindowPosition) ? n("<div style='z-index:999;left:" + t.windowOffsetLeft + "px;top:" + t.windowOffsetTop + "px;" + t.zoomWindowStyle + "' class='zoomWindow'>&nbsp;<\/div>").appendTo("body").click(function () {
            t.$elem.trigger("click")
        }) : n("<div style='z-index:999;left:" + t.windowOffsetLeft + "px;top:" + t.windowOffsetTop + "px;" + t.zoomWindowStyle + "' class='zoomWindow'>&nbsp;<\/div>").appendTo(t.zoomContainer).click(function () {
            t.$elem.trigger("click")
        });
        t.zoomWindowContainer = n("<div/>").addClass("zoomWindowContainer").css("width", t.options.zoomWindowWidth);
        t.zoomWindow.wrap(t.zoomWindowContainer);
        "lens" == t.options.zoomType && t.zoomLens.css({backgroundImage: "url('" + t.imageSrc + "')"});
        "window" == t.options.zoomType && t.zoomWindow.css({backgroundImage: "url('" + t.imageSrc + "')"});
        "inner" == t.options.zoomType && t.zoomWindow.css({backgroundImage: "url('" + t.imageSrc + "')"});
        t.$elem.bind("touchmove", function (n) {
            n.preventDefault();
            t.setPosition(n.originalEvent.touches[0] || n.originalEvent.changedTouches[0])
        });
        t.zoomContainer.bind("touchmove", function (n) {
            "inner" == t.options.zoomType && t.showHideWindow("show");
            n.preventDefault();
            t.setPosition(n.originalEvent.touches[0] || n.originalEvent.changedTouches[0])
        });
        t.zoomContainer.bind("touchend", function () {
            t.showHideWindow("hide");
            t.options.showLens && t.showHideLens("hide");
            t.options.tint && "inner" != t.options.zoomType && t.showHideTint("hide")
        });
        t.$elem.bind("touchend", function () {
            t.showHideWindow("hide");
            t.options.showLens && t.showHideLens("hide");
            t.options.tint && "inner" != t.options.zoomType && t.showHideTint("hide")
        });
        t.options.showLens && (t.zoomLens.bind("touchmove", function (n) {
            n.preventDefault();
            t.setPosition(n.originalEvent.touches[0] || n.originalEvent.changedTouches[0])
        }), t.zoomLens.bind("touchend", function () {
            t.showHideWindow("hide");
            t.options.showLens && t.showHideLens("hide");
            t.options.tint && "inner" != t.options.zoomType && t.showHideTint("hide")
        }));
        t.$elem.bind("mousemove", function (n) {
            !1 == t.overWindow && t.setElements("show");
            (t.lastX !== n.clientX || t.lastY !== n.clientY) && (t.setPosition(n), t.currentLoc = n);
            t.lastX = n.clientX;
            t.lastY = n.clientY
        });
        t.zoomContainer.bind("mousemove", function (n) {
            !1 == t.overWindow && t.setElements("show");
            (t.lastX !== n.clientX || t.lastY !== n.clientY) && (t.setPosition(n), t.currentLoc = n);
            t.lastX = n.clientX;
            t.lastY = n.clientY
        });
        "inner" != t.options.zoomType && t.zoomLens.bind("mousemove", function (n) {
            (t.lastX !== n.clientX || t.lastY !== n.clientY) && (t.setPosition(n), t.currentLoc = n);
            t.lastX = n.clientX;
            t.lastY = n.clientY
        });
        t.options.tint && "inner" != t.options.zoomType && t.zoomTint.bind("mousemove", function (n) {
            (t.lastX !== n.clientX || t.lastY !== n.clientY) && (t.setPosition(n), t.currentLoc = n);
            t.lastX = n.clientX;
            t.lastY = n.clientY
        });
        "inner" == t.options.zoomType && t.zoomWindow.bind("mousemove", function (n) {
            (t.lastX !== n.clientX || t.lastY !== n.clientY) && (t.setPosition(n), t.currentLoc = n);
            t.lastX = n.clientX;
            t.lastY = n.clientY
        });
        t.zoomContainer.add(t.$elem).mouseenter(function () {
            !1 == t.overWindow && t.setElements("show")
        }).mouseleave(function () {
                t.scrollLock || t.setElements("hide")
            });
        "inner" != t.options.zoomType && t.zoomWindow.mouseenter(function () {
            t.overWindow = !0;
            t.setElements("hide")
        }).mouseleave(function () {
                t.overWindow = !1
            });
        t.minZoomLevel = t.options.minZoomLevel ? t.options.minZoomLevel : 2 * t.options.scrollZoomIncrement;
        t.options.scrollZoom && t.zoomContainer.add(t.$elem).bind("mousewheel DOMMouseScroll MozMousePixelScroll", function (i) {
            t.scrollLock = !0;
            clearTimeout(n.data(this, "timer"));
            n.data(this, "timer", setTimeout(function () {
                t.scrollLock = !1
            }, 250));
            var r = i.originalEvent.wheelDelta || -1 * i.originalEvent.detail;
            return i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault(), 0 < r / 120 ? t.currentZoomLevel >= t.minZoomLevel && t.changeZoomLevel(t.currentZoomLevel - t.options.scrollZoomIncrement) : t.options.maxZoomLevel ? t.currentZoomLevel <= t.options.maxZoomLevel && t.changeZoomLevel(parseFloat(t.currentZoomLevel) + t.options.scrollZoomIncrement) : t.changeZoomLevel(parseFloat(t.currentZoomLevel) + t.options.scrollZoomIncrement), !1
        })
    }, setElements: function (n) {
        if (!this.options.zoomEnabled)return!1;
        "show" == n && this.isWindowSet && ("inner" == this.options.zoomType && this.showHideWindow("show"), "window" == this.options.zoomType && this.showHideWindow("show"), this.options.showLens && this.showHideLens("show"), this.options.tint && "inner" != this.options.zoomType && this.showHideTint("show"));
        "hide" == n && ("window" == this.options.zoomType && this.showHideWindow("hide"), this.options.tint || this.showHideWindow("hide"), this.options.showLens && this.showHideLens("hide"), this.options.tint && this.showHideTint("hide"))
    }, setPosition: function (n) {
        if (!this.options.zoomEnabled)return!1;
        this.nzHeight = this.$elem.height();
        this.nzWidth = this.$elem.width();
        this.nzOffset = this.$elem.offset();
        this.options.tint && "inner" != this.options.zoomType && (this.zoomTint.css({top: 0}), this.zoomTint.css({left: 0}));
        this.options.responsive && !this.options.scrollZoom && this.options.showLens && (lensHeight = this.nzHeight < this.options.zoomWindowWidth / this.widthRatio ? this.nzHeight : String(this.options.zoomWindowHeight / this.heightRatio), lensWidth = this.largeWidth < this.options.zoomWindowWidth ? this.nzWidth : this.options.zoomWindowWidth / this.widthRatio, this.widthRatio = this.largeWidth / this.nzWidth, this.heightRatio = this.largeHeight / this.nzHeight, "lens" != this.options.zoomType && (lensHeight = this.nzHeight < this.options.zoomWindowWidth / this.widthRatio ? this.nzHeight : String(this.options.zoomWindowHeight / this.heightRatio), lensWidth = this.options.zoomWindowWidth < this.options.zoomWindowWidth ? this.nzWidth : this.options.zoomWindowWidth / this.widthRatio, this.zoomLens.css("width", lensWidth), this.zoomLens.css("height", lensHeight), this.options.tint && (this.zoomTintImage.css("width", this.nzWidth), this.zoomTintImage.css("height", this.nzHeight))), "lens" == this.options.zoomType && this.zoomLens.css({width: String(this.options.lensSize) + "px", height: String(this.options.lensSize) + "px"}));
        this.zoomContainer.css({top: this.nzOffset.top});
        this.zoomContainer.css({left: this.nzOffset.left});
        this.mouseLeft = parseInt(n.pageX - this.nzOffset.left);
        this.mouseTop = parseInt(n.pageY - this.nzOffset.top);
        "window" == this.options.zoomType && (this.Etoppos = this.mouseTop < this.zoomLens.height() / 2, this.Eboppos = this.mouseTop > this.nzHeight - this.zoomLens.height() / 2 - 2 * this.options.lensBorderSize, this.Eloppos = this.mouseLeft < 0 + this.zoomLens.width() / 2, this.Eroppos = this.mouseLeft > this.nzWidth - this.zoomLens.width() / 2 - 2 * this.options.lensBorderSize);
        "inner" == this.options.zoomType && (this.Etoppos = this.mouseTop < this.nzHeight / 2 / this.heightRatio, this.Eboppos = this.mouseTop > this.nzHeight - this.nzHeight / 2 / this.heightRatio, this.Eloppos = this.mouseLeft < 0 + this.nzWidth / 2 / this.widthRatio, this.Eroppos = this.mouseLeft > this.nzWidth - this.nzWidth / 2 / this.widthRatio - 2 * this.options.lensBorderSize);
        0 >= this.mouseLeft || 0 > this.mouseTop || this.mouseLeft > this.nzWidth || this.mouseTop > this.nzHeight ? this.setElements("hide") : (this.options.showLens && (this.lensLeftPos = String(this.mouseLeft - this.zoomLens.width() / 2), this.lensTopPos = String(this.mouseTop - this.zoomLens.height() / 2)), this.Etoppos && (this.lensTopPos = 0), this.Eloppos && (this.tintpos = this.lensLeftPos = this.windowLeftPos = 0), "window" == this.options.zoomType && (this.Eboppos && (this.lensTopPos = Math.max(this.nzHeight - this.zoomLens.height() - 2 * this.options.lensBorderSize, 0)), this.Eroppos && (this.lensLeftPos = this.nzWidth - this.zoomLens.width() - 2 * this.options.lensBorderSize)), "inner" == this.options.zoomType && (this.Eboppos && (this.lensTopPos = Math.max(this.nzHeight - 2 * this.options.lensBorderSize, 0)), this.Eroppos && (this.lensLeftPos = this.nzWidth - this.nzWidth - 2 * this.options.lensBorderSize)), "lens" == this.options.zoomType && (this.windowLeftPos = String(-1 * ((n.pageX - this.nzOffset.left) * this.widthRatio - this.zoomLens.width() / 2)), this.windowTopPos = String(-1 * ((n.pageY - this.nzOffset.top) * this.heightRatio - this.zoomLens.height() / 2)), this.zoomLens.css({backgroundPosition: this.windowLeftPos + "px " + this.windowTopPos + "px"}), this.changeBgSize && (this.nzHeight > this.nzWidth ? ("lens" == this.options.zoomType && this.zoomLens.css({"background-size": this.largeWidth / this.newvalueheight + "px " + this.largeHeight / this.newvalueheight + "px"}), this.zoomWindow.css({"background-size": this.largeWidth / this.newvalueheight + "px " + this.largeHeight / this.newvalueheight + "px"})) : ("lens" == this.options.zoomType && this.zoomLens.css({"background-size": this.largeWidth / this.newvaluewidth + "px " + this.largeHeight / this.newvaluewidth + "px"}), this.zoomWindow.css({"background-size": this.largeWidth / this.newvaluewidth + "px " + this.largeHeight / this.newvaluewidth + "px"})), this.changeBgSize = !1), this.setWindowPostition(n)), this.options.tint && "inner" != this.options.zoomType && this.setTintPosition(n), "window" == this.options.zoomType && this.setWindowPostition(n), "inner" == this.options.zoomType && this.setWindowPostition(n), this.options.showLens && (this.fullwidth && "lens" != this.options.zoomType && (this.lensLeftPos = 0), this.zoomLens.css({left: this.lensLeftPos + "px", top: this.lensTopPos + "px"})))
    }, showHideWindow: function (n) {
        "show" != n || this.isWindowActive || (this.options.zoomWindowFadeIn ? this.zoomWindow.stop(!0, !0, !1).fadeIn(this.options.zoomWindowFadeIn) : this.zoomWindow.show(), this.isWindowActive = !0);
        "hide" == n && this.isWindowActive && (this.options.zoomWindowFadeOut ? this.zoomWindow.stop(!0, !0).fadeOut(this.options.zoomWindowFadeOut) : this.zoomWindow.hide(), this.isWindowActive = !1)
    }, showHideLens: function (n) {
        "show" != n || this.isLensActive || (this.options.lensFadeIn ? this.zoomLens.stop(!0, !0, !1).fadeIn(this.options.lensFadeIn) : this.zoomLens.show(), this.isLensActive = !0);
        "hide" == n && this.isLensActive && (this.options.lensFadeOut ? this.zoomLens.stop(!0, !0).fadeOut(this.options.lensFadeOut) : this.zoomLens.hide(), this.isLensActive = !1)
    }, showHideTint: function (n) {
        "show" != n || this.isTintActive || (this.options.zoomTintFadeIn ? this.zoomTint.css({opacity: this.options.tintOpacity}).animate().stop(!0, !0).fadeIn("slow") : (this.zoomTint.css({opacity: this.options.tintOpacity}).animate(), this.zoomTint.show()), this.isTintActive = !0);
        "hide" == n && this.isTintActive && (this.options.zoomTintFadeOut ? this.zoomTint.stop(!0, !0).fadeOut(this.options.zoomTintFadeOut) : this.zoomTint.hide(), this.isTintActive = !1)
    }, setLensPostition: function () {
    }, setWindowPostition: function (t) {
        var i = this;
        if (isNaN(i.options.zoomWindowPosition))i.externalContainer = n("#" + i.options.zoomWindowPosition), i.externalContainerWidth = i.externalContainer.width(), i.externalContainerHeight = i.externalContainer.height(), i.externalContainerOffset = i.externalContainer.offset(), i.windowOffsetTop = i.externalContainerOffset.top, i.windowOffsetLeft = i.externalContainerOffset.left; else switch (i.options.zoomWindowPosition) {
            case 1:
                i.windowOffsetTop = i.options.zoomWindowOffety;
                i.windowOffsetLeft = +i.nzWidth;
                break;
            case 2:
                i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = -1 * (i.options.zoomWindowHeight / 2 - i.nzHeight / 2), i.windowOffsetLeft = i.nzWidth);
                break;
            case 3:
                i.windowOffsetTop = i.nzHeight - i.zoomWindow.height() - 2 * i.options.borderSize;
                i.windowOffsetLeft = i.nzWidth;
                break;
            case 4:
                i.windowOffsetTop = i.nzHeight;
                i.windowOffsetLeft = i.nzWidth;
                break;
            case 5:
                i.windowOffsetTop = i.nzHeight;
                i.windowOffsetLeft = i.nzWidth - i.zoomWindow.width() - 2 * i.options.borderSize;
                break;
            case 6:
                i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = i.nzHeight, i.windowOffsetLeft = -1 * (i.options.zoomWindowWidth / 2 - i.nzWidth / 2 + 2 * i.options.borderSize));
                break;
            case 7:
                i.windowOffsetTop = i.nzHeight;
                i.windowOffsetLeft = 0;
                break;
            case 8:
                i.windowOffsetTop = i.nzHeight;
                i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
                break;
            case 9:
                i.windowOffsetTop = i.nzHeight - i.zoomWindow.height() - 2 * i.options.borderSize;
                i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
                break;
            case 10:
                i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = -1 * (i.options.zoomWindowHeight / 2 - i.nzHeight / 2), i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize));
                break;
            case 11:
                i.windowOffsetTop = i.options.zoomWindowOffety;
                i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
                break;
            case 12:
                i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize);
                i.windowOffsetLeft = -1 * (i.zoomWindow.width() + 2 * i.options.borderSize);
                break;
            case 13:
                i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize);
                i.windowOffsetLeft = 0;
                break;
            case 14:
                i.options.zoomWindowHeight > i.nzHeight && (i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize), i.windowOffsetLeft = -1 * (i.options.zoomWindowWidth / 2 - i.nzWidth / 2 + 2 * i.options.borderSize));
                break;
            case 15:
                i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize);
                i.windowOffsetLeft = i.nzWidth - i.zoomWindow.width() - 2 * i.options.borderSize;
                break;
            case 16:
                i.windowOffsetTop = -1 * (i.zoomWindow.height() + 2 * i.options.borderSize);
                i.windowOffsetLeft = i.nzWidth;
                break;
            default:
                i.windowOffsetTop = i.options.zoomWindowOffety;
                i.windowOffsetLeft = i.nzWidth
        }
        i.isWindowSet = !0;
        i.windowOffsetTop += i.options.zoomWindowOffety;
        i.windowOffsetLeft += i.options.zoomWindowOffetx;
        i.zoomWindow.css({top: i.windowOffsetTop});
        i.zoomWindow.css({left: i.windowOffsetLeft});
        "inner" == i.options.zoomType && (i.zoomWindow.css({top: 0}), i.zoomWindow.css({left: 0}));
        i.windowLeftPos = String(-1 * ((t.pageX - i.nzOffset.left) * i.widthRatio - i.zoomWindow.width() / 2));
        i.windowTopPos = String(-1 * ((t.pageY - i.nzOffset.top) * i.heightRatio - i.zoomWindow.height() / 2));
        i.Etoppos && (i.windowTopPos = 0);
        i.Eloppos && (i.windowLeftPos = 0);
        i.Eboppos && (i.windowTopPos = -1 * (i.largeHeight / i.currentZoomLevel - i.zoomWindow.height()));
        i.Eroppos && (i.windowLeftPos = -1 * (i.largeWidth / i.currentZoomLevel - i.zoomWindow.width()));
        i.fullheight && (i.windowTopPos = 0);
        i.fullwidth && (i.windowLeftPos = 0);
        ("window" == i.options.zoomType || "inner" == i.options.zoomType) && (1 == i.zoomLock && (1 >= i.widthRatio && (i.windowLeftPos = 0), 1 >= i.heightRatio && (i.windowTopPos = 0)), i.largeHeight < i.options.zoomWindowHeight && (i.windowTopPos = 0), i.largeWidth < i.options.zoomWindowWidth && (i.windowLeftPos = 0), i.options.easing ? (i.xp || (i.xp = 0), i.yp || (i.yp = 0), i.loop || (i.loop = setInterval(function () {
            i.xp += (i.windowLeftPos - i.xp) / i.options.easingAmount;
            i.yp += (i.windowTopPos - i.yp) / i.options.easingAmount;
            i.scrollingLock ? (clearInterval(i.loop), i.xp = i.windowLeftPos, i.yp = i.windowTopPos, i.xp = -1 * ((t.pageX - i.nzOffset.left) * i.widthRatio - i.zoomWindow.width() / 2), i.yp = -1 * ((t.pageY - i.nzOffset.top) * i.heightRatio - i.zoomWindow.height() / 2), i.changeBgSize && (i.nzHeight > i.nzWidth ? ("lens" == i.options.zoomType && i.zoomLens.css({"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"}), i.zoomWindow.css({"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"})) : ("lens" != i.options.zoomType && i.zoomLens.css({"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvalueheight + "px"}), i.zoomWindow.css({"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"})), i.changeBgSize = !1), i.zoomWindow.css({backgroundPosition: i.windowLeftPos + "px " + i.windowTopPos + "px"}), i.scrollingLock = !1, i.loop = !1) : (i.changeBgSize && (i.nzHeight > i.nzWidth ? ("lens" == i.options.zoomType && i.zoomLens.css({"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"}), i.zoomWindow.css({"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"})) : ("lens" != i.options.zoomType && i.zoomLens.css({"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"}), i.zoomWindow.css({"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"})), i.changeBgSize = !1), i.zoomWindow.css({backgroundPosition: i.xp + "px " + i.yp + "px"}))
        }, 16))) : (i.changeBgSize && (i.nzHeight > i.nzWidth ? ("lens" == i.options.zoomType && i.zoomLens.css({"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"}), i.zoomWindow.css({"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"})) : ("lens" == i.options.zoomType && i.zoomLens.css({"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"}), i.largeHeight / i.newvaluewidth < i.options.zoomWindowHeight ? i.zoomWindow.css({"background-size": i.largeWidth / i.newvaluewidth + "px " + i.largeHeight / i.newvaluewidth + "px"}) : i.zoomWindow.css({"background-size": i.largeWidth / i.newvalueheight + "px " + i.largeHeight / i.newvalueheight + "px"})), i.changeBgSize = !1), i.zoomWindow.css({backgroundPosition: i.windowLeftPos + "px " + i.windowTopPos + "px"})))
    }, setTintPosition: function (n) {
        this.nzOffset = this.$elem.offset();
        this.tintpos = String(-1 * (n.pageX - this.nzOffset.left - this.zoomLens.width() / 2));
        this.tintposy = String(-1 * (n.pageY - this.nzOffset.top - this.zoomLens.height() / 2));
        this.Etoppos && (this.tintposy = 0);
        this.Eloppos && (this.tintpos = 0);
        this.Eboppos && (this.tintposy = -1 * (this.nzHeight - this.zoomLens.height() - 2 * this.options.lensBorderSize));
        this.Eroppos && (this.tintpos = -1 * (this.nzWidth - this.zoomLens.width() - 2 * this.options.lensBorderSize));
        this.options.tint && (this.fullheight && (this.tintposy = 0), this.fullwidth && (this.tintpos = 0), this.zoomTintImage.css({left: this.tintpos + "px"}), this.zoomTintImage.css({top: this.tintposy + "px"}))
    }, swaptheimage: function (t, i) {
        var r = this, u = new Image;
        r.options.loadingIcon && (r.spinner = n("<div style=\"background: url('" + r.options.loadingIcon + "') no-repeat center;height:" + r.nzHeight + "px;width:" + r.nzWidth + 'px;z-index: 2000;position: absolute; background-position: center center;"><\/div>'), r.$elem.after(r.spinner));
        r.options.onImageSwap(r.$elem);
        u.onload = function () {
            r.largeWidth = u.width;
            r.largeHeight = u.height;
            r.zoomImage = i;
            r.zoomWindow.css({"background-size": r.largeWidth + "px " + r.largeHeight + "px"});
            r.zoomWindow.css({"background-size": r.largeWidth + "px " + r.largeHeight + "px"});
            r.swapAction(t, i)
        };
        u.src = i
    }, swapAction: function (t, i) {
        var r = this, e = new Image, u, f;
        e.onload = function () {
            r.nzHeight = e.height;
            r.nzWidth = e.width;
            r.options.onImageSwapComplete(r.$elem);
            r.doneCallback()
        };
        e.src = t;
        r.currentZoomLevel = r.options.zoomLevel;
        r.options.maxZoomLevel = !1;
        "lens" == r.options.zoomType && r.zoomLens.css({backgroundImage: "url('" + i + "')"});
        "window" == r.options.zoomType && r.zoomWindow.css({backgroundImage: "url('" + i + "')"});
        "inner" == r.options.zoomType && r.zoomWindow.css({backgroundImage: "url('" + i + "')"});
        r.currentImage = i;
        r.options.imageCrossfade ? (u = r.$elem, f = u.clone(), r.$elem.attr("src", t), r.$elem.after(f), f.stop(!0).fadeOut(r.options.imageCrossfade, function () {
            n(this).remove()
        }), r.$elem.width("auto").removeAttr("width"), r.$elem.height("auto").removeAttr("height"), u.fadeIn(r.options.imageCrossfade), r.options.tint && "inner" != r.options.zoomType && (u = r.zoomTintImage, f = u.clone(), r.zoomTintImage.attr("src", i), r.zoomTintImage.after(f), f.stop(!0).fadeOut(r.options.imageCrossfade, function () {
            n(this).remove()
        }), u.fadeIn(r.options.imageCrossfade), r.zoomTint.css({height: r.$elem.height()}), r.zoomTint.css({width: r.$elem.width()})), r.zoomContainer.css("height", r.$elem.height()), r.zoomContainer.css("width", r.$elem.width()), "inner" != r.options.zoomType || r.options.constrainType || (r.zoomWrap.parent().css("height", r.$elem.height()), r.zoomWrap.parent().css("width", r.$elem.width()), r.zoomWindow.css("height", r.$elem.height()), r.zoomWindow.css("width", r.$elem.width()))) : (r.$elem.attr("src", t), r.options.tint && (r.zoomTintImage.attr("src", i), r.zoomTintImage.attr("height", r.$elem.height()), r.zoomTintImage.css({height: r.$elem.height()}), r.zoomTint.css({height: r.$elem.height()})), r.zoomContainer.css("height", r.$elem.height()), r.zoomContainer.css("width", r.$elem.width()));
        r.options.imageCrossfade && (r.zoomWrap.css("height", r.$elem.height()), r.zoomWrap.css("width", r.$elem.width()));
        r.options.constrainType && ("height" == r.options.constrainType && (r.zoomContainer.css("height", r.options.constrainSize), r.zoomContainer.css("width", "auto"), r.options.imageCrossfade ? (r.zoomWrap.css("height", r.options.constrainSize), r.zoomWrap.css("width", "auto"), r.constwidth = r.zoomWrap.width()) : (r.$elem.css("height", r.options.constrainSize), r.$elem.css("width", "auto"), r.constwidth = r.$elem.width()), "inner" == r.options.zoomType && (r.zoomWrap.parent().css("height", r.options.constrainSize), r.zoomWrap.parent().css("width", r.constwidth), r.zoomWindow.css("height", r.options.constrainSize), r.zoomWindow.css("width", r.constwidth)), r.options.tint && (r.tintContainer.css("height", r.options.constrainSize), r.tintContainer.css("width", r.constwidth), r.zoomTint.css("height", r.options.constrainSize), r.zoomTint.css("width", r.constwidth), r.zoomTintImage.css("height", r.options.constrainSize), r.zoomTintImage.css("width", r.constwidth))), "width" == r.options.constrainType && (r.zoomContainer.css("height", "auto"), r.zoomContainer.css("width", r.options.constrainSize), r.options.imageCrossfade ? (r.zoomWrap.css("height", "auto"), r.zoomWrap.css("width", r.options.constrainSize), r.constheight = r.zoomWrap.height()) : (r.$elem.css("height", "auto"), r.$elem.css("width", r.options.constrainSize), r.constheight = r.$elem.height()), "inner" == r.options.zoomType && (r.zoomWrap.parent().css("height", r.constheight), r.zoomWrap.parent().css("width", r.options.constrainSize), r.zoomWindow.css("height", r.constheight), r.zoomWindow.css("width", r.options.constrainSize)), r.options.tint && (r.tintContainer.css("height", r.constheight), r.tintContainer.css("width", r.options.constrainSize), r.zoomTint.css("height", r.constheight), r.zoomTint.css("width", r.options.constrainSize), r.zoomTintImage.css("height", r.constheight), r.zoomTintImage.css("width", r.options.constrainSize))))
    }, doneCallback: function () {
        this.options.loadingIcon && this.spinner.hide();
        this.nzOffset = this.$elem.offset();
        this.nzWidth = this.$elem.width();
        this.nzHeight = this.$elem.height();
        this.currentZoomLevel = this.options.zoomLevel;
        this.widthRatio = this.largeWidth / this.nzWidth;
        this.heightRatio = this.largeHeight / this.nzHeight;
        "window" == this.options.zoomType && (lensHeight = this.nzHeight < this.options.zoomWindowWidth / this.widthRatio ? this.nzHeight : String(this.options.zoomWindowHeight / this.heightRatio), lensWidth = this.options.zoomWindowWidth < this.options.zoomWindowWidth ? this.nzWidth : this.options.zoomWindowWidth / this.widthRatio, this.zoomLens && (this.zoomLens.css("width", lensWidth), this.zoomLens.css("height", lensHeight)))
    }, getCurrentImage: function () {
        return this.zoomImage
    }, getGalleryList: function () {
        var t = this;
        return t.gallerylist = [], t.options.gallery ? n("#" + t.options.gallery + " a").each(function () {
            var i = "";
            n(this).data("zoom-image") ? i = n(this).data("zoom-image") : n(this).data("image") && (i = n(this).data("image"));
            i == t.zoomImage ? t.gallerylist.unshift({href: "" + i + "", title: n(this).find("img").attr("title")}) : t.gallerylist.push({href: "" + i + "", title: n(this).find("img").attr("title")})
        }) : t.gallerylist.push({href: "" + t.zoomImage + "", title: n(this).find("img").attr("title")}), t.gallerylist
    }, changeZoomLevel: function (n) {
        this.scrollingLock = !0;
        this.newvalue = parseFloat(n).toFixed(2);
        newvalue = parseFloat(n).toFixed(2);
        maxheightnewvalue = this.largeHeight / (this.options.zoomWindowHeight / this.nzHeight * this.nzHeight);
        maxwidthtnewvalue = this.largeWidth / (this.options.zoomWindowWidth / this.nzWidth * this.nzWidth);
        "inner" != this.options.zoomType && (maxheightnewvalue <= newvalue ? (this.heightRatio = this.largeHeight / maxheightnewvalue / this.nzHeight, this.newvalueheight = maxheightnewvalue, this.fullheight = !0) : (this.heightRatio = this.largeHeight / newvalue / this.nzHeight, this.newvalueheight = newvalue, this.fullheight = !1), maxwidthtnewvalue <= newvalue ? (this.widthRatio = this.largeWidth / maxwidthtnewvalue / this.nzWidth, this.newvaluewidth = maxwidthtnewvalue, this.fullwidth = !0) : (this.widthRatio = this.largeWidth / newvalue / this.nzWidth, this.newvaluewidth = newvalue, this.fullwidth = !1), "lens" == this.options.zoomType && (maxheightnewvalue <= newvalue ? (this.fullwidth = !0, this.newvaluewidth = maxheightnewvalue) : (this.widthRatio = this.largeWidth / newvalue / this.nzWidth, this.newvaluewidth = newvalue, this.fullwidth = !1)));
        "inner" == this.options.zoomType && (maxheightnewvalue = parseFloat(this.largeHeight / this.nzHeight).toFixed(2), maxwidthtnewvalue = parseFloat(this.largeWidth / this.nzWidth).toFixed(2), newvalue > maxheightnewvalue && (newvalue = maxheightnewvalue), newvalue > maxwidthtnewvalue && (newvalue = maxwidthtnewvalue), maxheightnewvalue <= newvalue ? (this.heightRatio = this.largeHeight / newvalue / this.nzHeight, this.newvalueheight = newvalue > maxheightnewvalue ? maxheightnewvalue : newvalue, this.fullheight = !0) : (this.heightRatio = this.largeHeight / newvalue / this.nzHeight, this.newvalueheight = newvalue > maxheightnewvalue ? maxheightnewvalue : newvalue, this.fullheight = !1), maxwidthtnewvalue <= newvalue ? (this.widthRatio = this.largeWidth / newvalue / this.nzWidth, this.newvaluewidth = newvalue > maxwidthtnewvalue ? maxwidthtnewvalue : newvalue, this.fullwidth = !0) : (this.widthRatio = this.largeWidth / newvalue / this.nzWidth, this.newvaluewidth = newvalue, this.fullwidth = !1));
        scrcontinue = !1;
        "inner" == this.options.zoomType && (this.nzWidth > this.nzHeight && (this.newvaluewidth <= maxwidthtnewvalue ? scrcontinue = !0 : (scrcontinue = !1, this.fullwidth = this.fullheight = !0)), this.nzHeight > this.nzWidth && (this.newvaluewidth <= maxwidthtnewvalue ? scrcontinue = !0 : (scrcontinue = !1, this.fullwidth = this.fullheight = !0)));
        "inner" != this.options.zoomType && (scrcontinue = !0);
        scrcontinue && (this.zoomLock = 0, this.changeZoom = !0, this.options.zoomWindowHeight / this.heightRatio <= this.nzHeight && (this.currentZoomLevel = this.newvalueheight, "lens" != this.options.zoomType && "inner" != this.options.zoomType && (this.changeBgSize = !0, this.zoomLens.css({height: String(this.options.zoomWindowHeight / this.heightRatio) + "px"})), "lens" == this.options.zoomType || "inner" == this.options.zoomType) && (this.changeBgSize = !0), this.options.zoomWindowWidth / this.widthRatio <= this.nzWidth && ("inner" != this.options.zoomType && this.newvaluewidth > this.newvalueheight && (this.currentZoomLevel = this.newvaluewidth), "lens" != this.options.zoomType && "inner" != this.options.zoomType && (this.changeBgSize = !0, this.zoomLens.css({width: String(this.options.zoomWindowWidth / this.widthRatio) + "px"})), "lens" == this.options.zoomType || "inner" == this.options.zoomType) && (this.changeBgSize = !0), "inner" == this.options.zoomType && (this.changeBgSize = !0, this.nzWidth > this.nzHeight && (this.currentZoomLevel = this.newvaluewidth), this.nzHeight > this.nzWidth && (this.currentZoomLevel = this.newvaluewidth)));
        this.setPosition(this.currentLoc)
    }, closeAll: function () {
        self.zoomWindow && self.zoomWindow.hide();
        self.zoomLens && self.zoomLens.hide();
        self.zoomTint && self.zoomTint.hide()
    }, changeState: function (n) {
        "enable" == n && (this.options.zoomEnabled = !0);
        "disable" == n && (this.options.zoomEnabled = !1)
    }};
    n.fn.elevateZoom = function (i) {
        return this.each(function () {
            var r = Object.create(t);
            r.init(i, this);
            n.data(this, "elevateZoom", r)
        })
    };
    n.fn.elevateZoom.options = {zoomActivation: "hover", zoomEnabled: !0, preloading: 1, zoomLevel: 1, scrollZoom: !1, scrollZoomIncrement: .1, minZoomLevel: !1, maxZoomLevel: !1, easing: !1, easingAmount: 12, lensSize: 200, zoomWindowWidth: 400, zoomWindowHeight: 400, zoomWindowOffetx: 0, zoomWindowOffety: 0, zoomWindowPosition: 1, zoomWindowBgColour: "#fff", lensFadeIn: !1, lensFadeOut: !1, debug: !1, zoomWindowFadeIn: !1, zoomWindowFadeOut: !1, zoomWindowAlwaysShow: !1, zoomTintFadeIn: !1, zoomTintFadeOut: !1, borderSize: 4, showLens: !0, borderColour: "#888", lensBorderSize: 1, lensBorderColour: "#000", lensShape: "square", zoomType: "window", containLensZoom: !1, lensColour: "white", lensOpacity: .4, lenszoom: !1, tint: !1, tintColour: "#333", tintOpacity: .4, gallery: !1, galleryActiveClass: "zoomGalleryActive", imageCrossfade: !1, constrainType: !1, constrainSize: !1, loadingIcon: !1, cursor: "default", responsive: !0, onComplete: n.noop, onZoomedImageLoaded: function () {
    }, onImageSwap: n.noop, onImageSwapComplete: n.noop}
}(jQuery, window, document), function (n) {
    typeof define == "function" && define.amd ? define(["jquery"], n) : typeof exports == "object" ? n(require("jquery")) : n(jQuery)
}
(function (n) {
    var o = !1, c = !1, w = 0, b = 2e3, u = 0, a = ["webkit", "ms", "moz", "o"], t = window.requestAnimationFrame || !1, i = window.cancelAnimationFrame || !1, v, s, f, e;
    if (!t)for (v in a)s = a[v], t || (t = window[s + "RequestAnimationFrame"]), i || (i = window[s + "CancelAnimationFrame"] || window[s + "CancelRequestAnimationFrame"]);
    var r = window.MutationObserver || window.WebKitMutationObserver || !1, y = {zindex: "auto", cursoropacitymin: 0, cursoropacitymax: 1, cursorcolor: "#424242", cursorwidth: "5px", cursorborder: "1px solid #fff", cursorborderradius: "5px", scrollspeed: 60, mousescrollstep: 24, touchbehavior: !1, hwacceleration: !0, usetransition: !0, boxzoom: !1, dblclickzoom: !0, gesturezoom: !0, grabcursorenabled: !0, autohidemode: !0, background: "", iframeautoresize: !0, cursorminheight: 32, preservenativescrolling: !0, railoffset: !1, railhoffset: !1, bouncescroll: !0, spacebarenabled: !0, railpadding: {top: 0, right: 0, left: 0, bottom: 0}, disableoutline: !0, horizrailenabled: !0, railalign: "right", railvalign: "bottom", enabletranslate3d: !0, enablemousewheel: !0, enablekeyboard: !0, smoothscroll: !0, sensitiverail: !0, enablemouselockapi: !0, cursorfixedheight: !1, directionlockdeadzone: 6, hidecursordelay: 400, nativeparentscrolling: !0, enablescrollonselection: !0, overflowx: !0, overflowy: !0, cursordragspeed: .3, rtlmode: "auto", cursordragontouch: !1, oneaxismousemode: "auto", scriptpath: function () {
        var n = document.getElementsByTagName("script"), n = n[n.length - 1].src.split("?")[0];
        return 0 < n.split("/").length ? n.split("/").slice(0, -1).join("/") + "/" : ""
    }(), preventmultitouchscrolling: !0}, l = !1, k = function () {
        if (l)return l;
        var e = document.createElement("DIV"), u = e.style, t = navigator.userAgent, i = navigator.platform, n = {haspointerlock: "pointerLockElement"in document || "webkitPointerLockElement"in document || "mozPointerLockElement"in document};
        for (n.isopera = ("opera"in window), n.isopera12 = n.isopera && ("getUserMedia"in navigator), n.isoperamini = "[object OperaMini]" === Object.prototype.toString.call(window.operamini), n.isie = ("all"in document) && ("attachEvent"in e) && !n.isopera, n.isieold = n.isie && !("msInterpolationMode"in u), n.isie7 = n.isie && !n.isieold && (!("documentMode"in document) || 7 == document.documentMode), n.isie8 = n.isie && ("documentMode"in document) && 8 == document.documentMode, n.isie9 = n.isie && ("performance"in window) && 9 <= document.documentMode, n.isie10 = n.isie && ("performance"in window) && 10 == document.documentMode, n.isie11 = ("msRequestFullscreen"in e) && 11 <= document.documentMode, n.isie9mobile = /iemobile.9/i.test(t), n.isie9mobile && (n.isie9 = !1), n.isie7mobile = !n.isie9mobile && n.isie7 && /iemobile/i.test(t), n.ismozilla = ("MozAppearance"in u), n.iswebkit = ("WebkitAppearance"in u), n.ischrome = ("chrome"in window), n.ischrome22 = n.ischrome && n.haspointerlock, n.ischrome26 = n.ischrome && ("transition"in u), n.cantouch = ("ontouchstart"in document.documentElement) || ("ontouchstart"in window), n.hasmstouch = window.MSPointerEvent || !1, n.hasw3ctouch = window.PointerEvent || !1, n.ismac = /^mac$/i.test(i), n.isios = n.cantouch && /iphone|ipad|ipod/i.test(i), n.isios4 = n.isios && !("seal"in Object), n.isios7 = n.isios && ("webkitHidden"in document), n.isandroid = /android/i.test(t), n.haseventlistener = ("addEventListener"in e), n.trstyle = !1, n.hastransform = !1, n.hastranslate3d = !1, n.transitionstyle = !1, n.hastransition = !1, n.transitionend = !1, i = ["transform", "msTransform", "webkitTransform", "MozTransform", "OTransform"], t = 0; t < i.length; t++)if ("undefined" != typeof u[i[t]]) {
            n.trstyle = i[t];
            break
        }
        n.hastransform = !!n.trstyle;
        n.hastransform && (u[n.trstyle] = "translate3d(1px,2px,3px)", n.hastranslate3d = /translate3d/.test(u[n.trstyle]));
        n.transitionstyle = !1;
        n.prefixstyle = "";
        n.transitionend = !1;
        for (var i = "transition webkitTransition msTransition MozTransition OTransition OTransition KhtmlTransition".split(" "), f = " -webkit- -ms- -moz- -o- -o -khtml-".split(" "), o = "transitionend webkitTransitionEnd msTransitionEnd transitionend otransitionend oTransitionEnd KhtmlTransitionEnd".split(" "), t = 0; t < i.length; t++)if (i[t]in u) {
            n.transitionstyle = i[t];
            n.prefixstyle = f[t];
            n.transitionend = o[t];
            break
        }
        n.ischrome26 && (n.prefixstyle = f[1]);
        n.hastransition = n.transitionstyle;
        n:{
            for (t = ["-webkit-grab", "-moz-grab", "grab"], (n.ischrome && !n.ischrome22 || n.isie) && (t = []), i = 0; i < t.length; i++)if (f = t[i], u.cursor = f, u.cursor == f) {
                u = f;
                break n
            }
            u = "url(//mail.google.com/mail/images/2/openhand.cur),n-resize"
        }
        return n.cursorgrabvalue = u, n.hasmousecapture = "setCapture"in e, n.hasMutationObserver = !1 !== r, l = n
    }, d = function (f, e) {
        function nt() {
            var n = s.doc.css(h.trstyle);
            return n && "matrix" == n.substr(0, 6) ? n.replace(/^.*\((.*)\)$/g, "$1").replace(/px/g, "").split(/, +/) : !1
        }

        function ut() {
            var n = s.win, t;
            if ("zIndex"in n)return n.zIndex();
            for (; 0 < n.length && 9 != n[0].nodeType;) {
                if (t = n.css("zIndex"), !isNaN(t) && 0 != t)return parseInt(t);
                n = n.parent()
            }
            return!1
        }

        function l(n, t, i) {
            return t = n.css(t), n = parseFloat(t), isNaN(n) ? (n = rt[t] || 0, i = 3 == n ? i ? s.win.outerHeight() - s.win.innerHeight() : s.win.outerWidth() - s.win.innerWidth() : 1, s.isie8 && n && (n += 1), i ? n : 0) : n
        }

        function tt(n, t, i, r) {
            s._bind(n, t, function (r) {
                r = r ? r : window.event;
                var u = {original: r, target: r.target || r.srcElement, type: "wheel", deltaMode: "MozMousePixelScroll" == r.type ? 0 : 1, deltaX: 0, deltaZ: 0, preventDefault: function () {
                    return r.preventDefault ? r.preventDefault() : r.returnValue = !1, !1
                }, stopImmediatePropagation: function () {
                    r.stopImmediatePropagation ? r.stopImmediatePropagation() : r.cancelBubble = !0
                }};
                return"mousewheel" == t ? (u.deltaY = -.025 * r.wheelDelta, r.wheelDeltaX && (u.deltaX = -.025 * r.wheelDeltaX)) : u.deltaY = r.detail, i.call(n, u)
            }, r)
        }

        function it(n, t, i) {
            var r, u;
            if (0 == n.deltaMode ? (r = -Math.floor(s.opt.mousescrollstep / 54 * n.deltaX), u = -Math.floor(s.opt.mousescrollstep / 54 * n.deltaY)) : 1 == n.deltaMode && (r = -Math.floor(n.deltaX * s.opt.mousescrollstep), u = -Math.floor(n.deltaY * s.opt.mousescrollstep)), t && s.opt.oneaxismousemode && 0 == r && u && (r = u, u = 0, i && (0 > r ? s.getScrollLeft() >= s.page.maxw : 0 >= s.getScrollLeft()) && (u = r, r = 0)), r && (s.scrollmom && s.scrollmom.stop(), s.lastdeltax += r, s.debounced("mousewheelx", function () {
                var n = s.lastdeltax;
                s.lastdeltax = 0;
                s.rail.drag || s.doScrollLeftBy(n)
            }, 15)), u) {
                if (s.opt.nativeparentscrolling && i && !s.ispage && !s.zoomactive)if (0 > u) {
                    if (s.getScrollTop() >= s.page.maxh)return!0
                } else if (0 >= s.getScrollTop())return!0;
                s.scrollmom && s.scrollmom.stop();
                s.lastdeltay += u;
                s.debounced("mousewheely", function () {
                    var n = s.lastdeltay;
                    s.lastdeltay = 0;
                    s.rail.drag || s.doScrollBy(n)
                }, 15)
            }
            return n.stopImmediatePropagation(), n.preventDefault()
        }

        var s = this, v, h, d, a, g, rt;
        if (this.version = "3.6.0", this.name = "nicescroll", this.me = e, this.opt = {doc: n("body"), win: !1}, n.extend(this.opt, y), this.opt.snapbackspeed = 80, f)for (v in s.opt)"undefined" != typeof f[v] && (s.opt[v] = f[v]);
        this.iddoc = (this.doc = s.opt.doc) && this.doc[0] ? this.doc[0].id || "" : "";
        this.ispage = /^BODY|HTML/.test(s.opt.win ? s.opt.win[0].nodeName : this.doc[0].nodeName);
        this.haswrapper = !1 !== s.opt.win;
        this.win = s.opt.win || (this.ispage ? n(window) : this.doc);
        this.docscroll = this.ispage && !this.haswrapper ? n(window) : this.win;
        this.body = n("body");
        this.iframe = this.isfixed = this.viewport = !1;
        this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName;
        this.istextarea = "TEXTAREA" == this.win[0].nodeName;
        this.forcescreen = !1;
        this.canshowonmouseevent = "scroll" != s.opt.autohidemode;
        this.page = this.view = this.onzoomout = this.onzoomin = this.onscrollcancel = this.onscrollend = this.onscrollstart = this.onclick = this.ongesturezoom = this.onkeypress = this.onmousewheel = this.onmousemove = this.onmouseup = this.onmousedown = !1;
        this.scroll = {x: 0, y: 0};
        this.scrollratio = {x: 0, y: 0};
        this.cursorheight = 20;
        this.scrollvaluemax = 0;
        this.isrtlmode = "auto" == this.opt.rtlmode ? "rtl" == (this.win[0] == window ? this.body : this.win).css("direction") : !0 === this.opt.rtlmode;
        this.observerbody = this.observerremover = this.observer = this.scrollmom = this.scrollrunning = !1;
        do this.id = "ascrail" + b++; while (document.getElementById(this.id));
        this.hasmousefocus = this.hasfocus = this.zoomactive = this.zoom = this.selectiondrag = this.cursorfreezed = this.cursor = this.rail = !1;
        this.visibility = !0;
        this.hidden = this.locked = this.railslocked = !1;
        this.cursoractive = !0;
        this.wheelprevented = !1;
        this.overflowx = s.opt.overflowx;
        this.overflowy = s.opt.overflowy;
        this.nativescrollingarea = !1;
        this.checkarea = 0;
        this.events = [];
        this.saved = {};
        this.delaylist = {};
        this.synclist = {};
        this.lastdeltay = this.lastdeltax = 0;
        this.detected = k();
        h = n.extend({}, this.detected);
        this.ishwscroll = (this.canhwscroll = h.hastransform && s.opt.hwacceleration) && s.haswrapper;
        this.hasreversehr = this.isrtlmode && !h.iswebkit;
        this.istouchcapable = !1;
        h.cantouch && !h.isios && !h.isandroid && (h.iswebkit || h.ismozilla) && (this.istouchcapable = !0, h.cantouch = !1);
        s.opt.enablemouselockapi || (h.hasmousecapture = !1, h.haspointerlock = !1);
        this.debounced = function (n, t, i) {
            var r = s.delaylist[n];
            s.delaylist[n] = t;
            r || setTimeout(function () {
                var t = s.delaylist[n];
                s.delaylist[n] = !1;
                t.call(s)
            }, i)
        };
        d = !1;
        this.synched = function (n, i) {
            return s.synclist[n] = i, function () {
                d || (t(function () {
                    var n, t;
                    d = !1;
                    for (n in s.synclist)t = s.synclist[n], t && t.call(s), s.synclist[n] = !1
                }), d = !0)
            }(), n
        };
        this.unsynched = function (n) {
            s.synclist[n] && (s.synclist[n] = !1)
        };
        this.css = function (n, t) {
            for (var i in t)s.saved.css.push([n, i, n.css(i)]), n.css(i, t[i])
        };
        this.scrollTop = function (n) {
            return"undefined" == typeof n ? s.getScrollTop() : s.setScrollTop(n)
        };
        this.scrollLeft = function (n) {
            return"undefined" == typeof n ? s.getScrollLeft() : s.setScrollLeft(n)
        };
        a = function (n, t, i, r, u, f, e) {
            this.st = n;
            this.ed = t;
            this.spd = i;
            this.p1 = r || 0;
            this.p2 = u || 1;
            this.p3 = f || 0;
            this.p4 = e || 1;
            this.ts = (new Date).getTime();
            this.df = this.ed - this.st
        };
        a.prototype = {B2: function (n) {
            return 3 * n * n * (1 - n)
        }, B3: function (n) {
            return 3 * n * (1 - n) * (1 - n)
        }, B4: function (n) {
            return(1 - n) * (1 - n) * (1 - n)
        }, getNow: function () {
            var n = 1 - ((new Date).getTime() - this.ts) / this.spd, t = this.B2(n) + this.B3(n) + this.B4(n);
            return 0 > n ? this.ed : this.st + Math.round(this.df * t)
        }, update: function (n, t) {
            return this.st = this.getNow(), this.ed = n, this.spd = t, this.ts = (new Date).getTime(), this.df = this.ed - this.st, this
        }};
        this.ishwscroll ? (this.doc.translate = {x: 0, y: 0, tx: "0px", ty: "0px"}, h.hastranslate3d && h.isios && this.doc.css("-webkit-backface-visibility", "hidden"), this.getScrollTop = function (n) {
            if (!n) {
                if (n = nt())return 16 == n.length ? -n[13] : -n[5];
                if (s.timerscroll && s.timerscroll.bz)return s.timerscroll.bz.getNow()
            }
            return s.doc.translate.y
        }, this.getScrollLeft = function (n) {
            if (!n) {
                if (n = nt())return 16 == n.length ? -n[12] : -n[4];
                if (s.timerscroll && s.timerscroll.bh)return s.timerscroll.bh.getNow()
            }
            return s.doc.translate.x
        }, this.notifyScrollEvent = function (n) {
            var t = document.createEvent("UIEvents");
            t.initUIEvent("scroll", !1, !0, window, 1);
            t.niceevent = !0;
            n.dispatchEvent(t)
        }, g = this.isrtlmode ? 1 : -1, h.hastranslate3d && s.opt.enabletranslate3d ? (this.setScrollTop = function (n, t) {
            s.doc.translate.y = n;
            s.doc.translate.ty = -1 * n + "px";
            s.doc.css(h.trstyle, "translate3d(" + s.doc.translate.tx + "," + s.doc.translate.ty + ",0px)");
            t || s.notifyScrollEvent(s.win[0])
        }, this.setScrollLeft = function (n, t) {
            s.doc.translate.x = n;
            s.doc.translate.tx = n * g + "px";
            s.doc.css(h.trstyle, "translate3d(" + s.doc.translate.tx + "," + s.doc.translate.ty + ",0px)");
            t || s.notifyScrollEvent(s.win[0])
        }) : (this.setScrollTop = function (n, t) {
            s.doc.translate.y = n;
            s.doc.translate.ty = -1 * n + "px";
            s.doc.css(h.trstyle, "translate(" + s.doc.translate.tx + "," + s.doc.translate.ty + ")");
            t || s.notifyScrollEvent(s.win[0])
        }, this.setScrollLeft = function (n, t) {
            s.doc.translate.x = n;
            s.doc.translate.tx = n * g + "px";
            s.doc.css(h.trstyle, "translate(" + s.doc.translate.tx + "," + s.doc.translate.ty + ")");
            t || s.notifyScrollEvent(s.win[0])
        })) : (this.getScrollTop = function () {
            return s.docscroll.scrollTop()
        }, this.setScrollTop = function (n) {
            return s.docscroll.scrollTop(n)
        }, this.getScrollLeft = function () {
            return s.detected.ismozilla && s.isrtlmode ? Math.abs(s.docscroll.scrollLeft()) : s.docscroll.scrollLeft()
        }, this.setScrollLeft = function (n) {
            return s.docscroll.scrollLeft(s.detected.ismozilla && s.isrtlmode ? -n : n)
        });
        this.getTarget = function (n) {
            return n ? n.target ? n.target : n.srcElement ? n.srcElement : !1 : !1
        };
        this.hasParent = function (n, t) {
            if (!n)return!1;
            for (var i = n.target || n.srcElement || n || !1; i && i.id != t;)i = i.parentNode || !1;
            return!1 !== i
        };
        rt = {thin: 1, medium: 3, thick: 5};
        this.getDocumentScrollOffset = function () {
            return{top: window.pageYOffset || document.documentElement.scrollTop, left: window.pageXOffset || document.documentElement.scrollLeft}
        };
        this.getOffset = function () {
            if (s.isfixed) {
                var n = s.win.offset(), t = s.getDocumentScrollOffset();
                return n.top -= t.top, n.left -= t.left, n
            }
            return(n = s.win.offset(), !s.viewport) ? n : (t = s.viewport.offset(), {top: n.top - t.top, left: n.left - t.left})
        };
        this.updateScrollBar = function (n) {
            if (s.ishwscroll)s.rail.css({height: s.win.innerHeight() - (s.opt.railpadding.top + s.opt.railpadding.bottom)}), s.railh && s.railh.css({width: s.win.innerWidth() - (s.opt.railpadding.left + s.opt.railpadding.right)}); else {
                var u = s.getOffset(), r = u.top, t = u.left - (s.opt.railpadding.left + s.opt.railpadding.right), r = r + l(s.win, "border-top-width", !0), t = t + (s.rail.align ? s.win.outerWidth() - l(s.win, "border-right-width") - s.rail.width : l(s.win, "border-left-width")), i = s.opt.railoffset;
                i && (i.top && (r += i.top), s.rail.align && i.left && (t += i.left));
                s.railslocked || s.rail.css({top: r, left: t, height: (n ? n.h : s.win.innerHeight()) - (s.opt.railpadding.top + s.opt.railpadding.bottom)});
                s.zoom && s.zoom.css({top: r + 1, left: 1 == s.rail.align ? t - 20 : t + s.rail.width + 4});
                s.railh && !s.railslocked && (r = u.top, t = u.left, (i = s.opt.railhoffset) && (i.top && (r += i.top), i.left && (t += i.left)), n = s.railh.align ? r + l(s.win, "border-top-width", !0) + s.win.innerHeight() - s.railh.height : r + l(s.win, "border-top-width", !0), t += l(s.win, "border-left-width"), s.railh.css({top: n - (s.opt.railpadding.top + s.opt.railpadding.bottom), left: t, width: s.railh.width}))
            }
        };
        this.doRailClick = function (n, t, i) {
            var r;
            s.railslocked || (s.cancelEvent(n), t ? (t = i ? s.doScrollLeft : s.doScrollTop, r = i ? (n.pageX - s.railh.offset().left - s.cursorwidth / 2) * s.scrollratio.x : (n.pageY - s.rail.offset().top - s.cursorheight / 2) * s.scrollratio.y, t(r)) : (t = i ? s.doScrollLeftBy : s.doScrollBy, r = i ? s.scroll.x : s.scroll.y, n = i ? n.pageX - s.railh.offset().left : n.pageY - s.rail.offset().top, i = i ? s.view.w : s.view.h, t(r >= n ? i : -i)))
        };
        s.hasanimationframe = t;
        s.hascancelanimationframe = i;
        s.hasanimationframe ? s.hascancelanimationframe || (i = function () {
            s.cancelAnimationFrame = !0
        }) : (t = function (n) {
            return setTimeout(n, 15 - Math.floor(+new Date / 1e3) % 16)
        }, i = clearInterval);
        this.init = function () {
            var e, f, b, l, a, k, i, d, v, g, t, y;
            if (s.saved.css = [], h.isie7mobile || h.isoperamini)return!0;
            if (h.hasmstouch && s.css(s.ispage ? n("html") : s.win, {"-ms-touch-action": "none"}), s.zindex = "auto", s.zindex = s.ispage || "auto" != s.opt.zindex ? s.opt.zindex : ut() || "auto", !s.ispage && "auto" != s.zindex && s.zindex > u && (u = s.zindex), s.isie && 0 == s.zindex && "auto" == s.opt.zindex && (s.zindex = "auto"), !s.ispage || !h.cantouch && !h.isieold && !h.isie9mobile) {
                e = s.docscroll;
                s.ispage && (e = s.haswrapper ? s.win : s.doc);
                h.isie9mobile || s.css(e, {"overflow-y": "hidden"});
                s.ispage && h.isie7 && ("BODY" == s.doc[0].nodeName ? s.css(n("html"), {"overflow-y": "hidden"}) : "HTML" == s.doc[0].nodeName && s.css(n("body"), {"overflow-y": "hidden"}));
                !h.isios || s.ispage || s.haswrapper || s.css(n("body"), {"-webkit-overflow-scrolling": "touch"});
                f = n(document.createElement("div"));
                f.css({position: "relative", top: 0, float: "right", width: s.opt.cursorwidth, height: "0px", "background-color": s.opt.cursorcolor, border: s.opt.cursorborder, "background-clip": "padding-box", "-webkit-border-radius": s.opt.cursorborderradius, "-moz-border-radius": s.opt.cursorborderradius, "border-radius": s.opt.cursorborderradius});
                f.hborder = parseFloat(f.outerHeight() - f.innerHeight());
                f.addClass("nicescroll-cursors");
                s.cursor = f;
                t = n(document.createElement("div"));
                t.attr("id", s.id);
                t.addClass("nicescroll-rails nicescroll-rails-vr");
                a = ["left", "right", "top", "bottom"];
                for (k in a)l = a[k], (b = s.opt.railpadding[l]) ? t.css("padding-" + l, b + "px") : s.opt.railpadding[l] = 0;
                t.append(f);
                t.width = Math.max(parseFloat(s.opt.cursorwidth), f.outerWidth());
                t.css({width: t.width + "px", zIndex: s.zindex, background: s.opt.background, cursor: "default"});
                t.visibility = !0;
                t.scrollable = !0;
                t.align = "left" == s.opt.railalign ? 0 : 1;
                s.rail = t;
                f = s.rail.drag = !1;
                !s.opt.boxzoom || s.ispage || h.isieold || (f = document.createElement("div"), s.bind(f, "click", s.doZoom), s.bind(f, "mouseenter", function () {
                    s.zoom.css("opacity", s.opt.cursoropacitymax)
                }), s.bind(f, "mouseleave", function () {
                    s.zoom.css("opacity", s.opt.cursoropacitymin)
                }), s.zoom = n(f), s.zoom.css({cursor: "pointer", "z-index": s.zindex, backgroundImage: "url(" + s.opt.scriptpath + "zoomico.png)", height: 18, width: 18, backgroundPosition: "0px 0px"}), s.opt.dblclickzoom && s.bind(s.win, "dblclick", s.doZoom), h.cantouch && s.opt.gesturezoom && (s.ongesturezoom = function (n) {
                    return 1.5 < n.scale && s.doZoomIn(n), .8 > n.scale && s.doZoomOut(n), s.cancelEvent(n)
                }, s.bind(s.win, "gestureend", s.ongesturezoom)));
                s.railh = !1;
                s.opt.horizrailenabled && (s.css(e, {"overflow-x": "hidden"}), f = n(document.createElement("div")), f.css({position: "absolute", top: 0, height: s.opt.cursorwidth, width: "0px", "background-color": s.opt.cursorcolor, border: s.opt.cursorborder, "background-clip": "padding-box", "-webkit-border-radius": s.opt.cursorborderradius, "-moz-border-radius": s.opt.cursorborderradius, "border-radius": s.opt.cursorborderradius}), h.isieold && f.css({overflow: "hidden"}), f.wborder = parseFloat(f.outerWidth() - f.innerWidth()), f.addClass("nicescroll-cursors"), s.cursorh = f, i = n(document.createElement("div")), i.attr("id", s.id + "-hr"), i.addClass("nicescroll-rails nicescroll-rails-hr"), i.height = Math.max(parseFloat(s.opt.cursorwidth), f.outerHeight()), i.css({height: i.height + "px", zIndex: s.zindex, background: s.opt.background}), i.append(f), i.visibility = !0, i.scrollable = !0, i.align = "top" == s.opt.railvalign ? 0 : 1, s.railh = i, s.railh.drag = !1);
                s.ispage ? (t.css({position: "fixed", top: "0px", height: "100%"}), t.align ? t.css({right: "0px"}) : t.css({left: "0px"}), s.body.append(t), s.railh && (i.css({position: "fixed", left: "0px", width: "100%"}), i.align ? i.css({bottom: "0px"}) : i.css({top: "0px"}), s.body.append(i))) : (s.ishwscroll ? ("static" == s.win.css("position") && s.css(s.win, {position: "relative"}), e = "HTML" == s.win[0].nodeName ? s.body : s.win, n(e).scrollTop(0).scrollLeft(0), s.zoom && (s.zoom.css({position: "absolute", top: 1, right: 0, "margin-right": t.width + 4}), e.append(s.zoom)), t.css({position: "absolute", top: 0}), t.align ? t.css({right: 0}) : t.css({left: 0}), e.append(t), i && (i.css({position: "absolute", left: 0, bottom: 0}), i.align ? i.css({bottom: 0}) : i.css({top: 0}), e.append(i))) : (s.isfixed = "fixed" == s.win.css("position"), e = s.isfixed ? "fixed" : "absolute", s.isfixed || (s.viewport = s.getViewport(s.win[0])), s.viewport && (s.body = s.viewport, 0 == /fixed|absolute/.test(s.viewport.css("position")) && s.css(s.viewport, {position: "relative"})), t.css({position: e}), s.zoom && s.zoom.css({position: e}), s.updateScrollBar(), s.body.append(t), s.zoom && s.body.append(s.zoom), s.railh && (i.css({position: e}), s.body.append(i))), h.isios && s.css(s.win, {"-webkit-tap-highlight-color": "rgba(0,0,0,0)", "-webkit-touch-callout": "none"}), h.isie && s.opt.disableoutline && s.win.attr("hideFocus", "true"), h.iswebkit && s.opt.disableoutline && s.win.css({outline: "none"}));
                !1 === s.opt.autohidemode ? (s.autohidedom = !1, s.rail.css({opacity: s.opt.cursoropacitymax}), s.railh && s.railh.css({opacity: s.opt.cursoropacitymax})) : !0 === s.opt.autohidemode || "leave" === s.opt.autohidemode ? (s.autohidedom = n().add(s.rail), h.isie8 && (s.autohidedom = s.autohidedom.add(s.cursor)), s.railh && (s.autohidedom = s.autohidedom.add(s.railh)), s.railh && h.isie8 && (s.autohidedom = s.autohidedom.add(s.cursorh))) : "scroll" == s.opt.autohidemode ? (s.autohidedom = n().add(s.rail), s.railh && (s.autohidedom = s.autohidedom.add(s.railh))) : "cursor" == s.opt.autohidemode ? (s.autohidedom = n().add(s.cursor), s.railh && (s.autohidedom = s.autohidedom.add(s.cursorh))) : "hidden" == s.opt.autohidemode && (s.autohidedom = !1, s.hide(), s.railslocked = !1);
                h.isie9mobile ? (s.scrollmom = new p(s), s.onmangotouch = function () {
                    var n = s.getScrollTop(), t = s.getScrollLeft(), i, r;
                    if (n == s.scrollmom.lastscrolly && t == s.scrollmom.lastscrollx)return!0;
                    if (i = n - s.mangotouch.sy, r = t - s.mangotouch.sx, 0 != Math.round(Math.sqrt(Math.pow(r, 2) + Math.pow(i, 2)))) {
                        var f = 0 > i ? -1 : 1, e = 0 > r ? -1 : 1, u = +new Date;
                        s.mangotouch.lazy && clearTimeout(s.mangotouch.lazy);
                        80 < u - s.mangotouch.tm || s.mangotouch.dry != f || s.mangotouch.drx != e ? (s.scrollmom.stop(), s.scrollmom.reset(t, n), s.mangotouch.sy = n, s.mangotouch.ly = n, s.mangotouch.sx = t, s.mangotouch.lx = t, s.mangotouch.dry = f, s.mangotouch.drx = e, s.mangotouch.tm = u) : (s.scrollmom.stop(), s.scrollmom.update(s.mangotouch.sx - r, s.mangotouch.sy - i), s.mangotouch.tm = u, i = Math.max(Math.abs(s.mangotouch.ly - n), Math.abs(s.mangotouch.lx - t)), s.mangotouch.ly = n, s.mangotouch.lx = t, 2 < i && (s.mangotouch.lazy = setTimeout(function () {
                            s.mangotouch.lazy = !1;
                            s.mangotouch.dry = 0;
                            s.mangotouch.drx = 0;
                            s.mangotouch.tm = 0;
                            s.scrollmom.doMomentum(30)
                        }, 100)))
                    }
                }, t = s.getScrollTop(), i = s.getScrollLeft(), s.mangotouch = {sy: t, ly: t, dry: 0, sx: i, lx: i, drx: 0, lazy: !1, tm: 0}, s.bind(s.docscroll, "scroll", s.onmangotouch)) : ((h.cantouch || s.istouchcapable || s.opt.touchbehavior || h.hasmstouch) && (s.scrollmom = new p(s), s.ontouchstart = function (t) {
                    var i, r;
                    if (t.pointerType && 2 != t.pointerType && "touch" != t.pointerType)return!1;
                    if (s.hasmoving = !1, !s.railslocked) {
                        if (h.hasmstouch)for (i = t.target ? t.target : !1; i;) {
                            if (r = n(i).getNiceScroll(), 0 < r.length && r[0].me == s.me)break;
                            if (0 < r.length)return!1;
                            if ("DIV" == i.nodeName && i.id == s.id)break;
                            i = i.parentNode ? i.parentNode : !1
                        }
                        if (s.cancelScroll(), (i = s.getTarget(t)) && /INPUT/i.test(i.nodeName) && /range/i.test(i.type))return s.stopPropagation(t);
                        if (!("clientX"in t) && "changedTouches"in t && (t.clientX = t.changedTouches[0].clientX, t.clientY = t.changedTouches[0].clientY), s.forcescreen && (r = t, t = {original: t.original ? t.original : t}, t.clientX = r.screenX, t.clientY = r.screenY), s.rail.drag = {x: t.clientX, y: t.clientY, sx: s.scroll.x, sy: s.scroll.y, st: s.getScrollTop(), sl: s.getScrollLeft(), pt: 2, dl: !1}, s.ispage || !s.opt.directionlockdeadzone)s.rail.drag.dl = "f"; else {
                            var r = n(window).width(), u = n(window).height(), f = Math.max(document.body.scrollWidth, document.documentElement.scrollWidth), e = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight), u = Math.max(0, e - u), r = Math.max(0, f - r);
                            s.rail.drag.ck = !s.rail.scrollable && s.railh.scrollable ? 0 < u ? "v" : !1 : s.rail.scrollable && !s.railh.scrollable ? 0 < r ? "h" : !1 : !1;
                            s.rail.drag.ck || (s.rail.drag.dl = "f")
                        }
                        if (s.opt.touchbehavior && s.isiframe && h.isie && (r = s.win.position(), s.rail.drag.x += r.left, s.rail.drag.y += r.top), s.hasmoving = !1, s.lastmouseup = !1, s.scrollmom.reset(t.clientX, t.clientY), !h.cantouch && !this.istouchcapable && !t.pointerType) {
                            if (!i || !/INPUT|SELECT|TEXTAREA/i.test(i.nodeName))return!s.ispage && h.hasmousecapture && i.setCapture(), s.opt.touchbehavior ? (i.onclick && !i._onclick && (i._onclick = i.onclick, i.onclick = function (n) {
                                if (s.hasmoving)return!1;
                                i._onclick.call(this, n)
                            }), s.cancelEvent(t)) : s.stopPropagation(t);
                            /SUBMIT|CANCEL|BUTTON/i.test(n(i).attr("type")) && (pc = {tg: i, click: !1}, s.preventclick = pc)
                        }
                    }
                }, s.ontouchend = function (n) {
                    if (!s.rail.drag)return!0;
                    if (2 == s.rail.drag.pt) {
                        if (n.pointerType && 2 != n.pointerType && "touch" != n.pointerType)return!1;
                        if (s.scrollmom.doMomentum(), s.rail.drag = !1, s.hasmoving && (s.lastmouseup = !0, s.hideCursor(), h.hasmousecapture && document.releaseCapture(), !h.cantouch))return s.cancelEvent(n)
                    } else if (1 == s.rail.drag.pt)return s.onmouseup(n)
                }, d = s.opt.touchbehavior && s.isiframe && !h.hasmousecapture, s.ontouchmove = function (t, i) {
                    var r, e, c, f, o, l;
                    if (!s.rail.drag || t.targetTouches && s.opt.preventmultitouchscrolling && 1 < t.targetTouches.length || t.pointerType && 2 != t.pointerType && "touch" != t.pointerType)return!1;
                    if (2 == s.rail.drag.pt) {
                        if (h.cantouch && h.isios && "undefined" == typeof t.original)return!0;
                        s.hasmoving = !0;
                        s.preventclick && !s.preventclick.click && (s.preventclick.click = s.preventclick.tg.onclick || !1, s.preventclick.tg.onclick = s.onpreventclick);
                        t = n.extend({original: t}, t);
                        "changedTouches"in t && (t.clientX = t.changedTouches[0].clientX, t.clientY = t.changedTouches[0].clientY);
                        s.forcescreen && (e = t, t = {original: t.original ? t.original : t}, t.clientX = e.screenX, t.clientY = e.screenY);
                        e = r = 0;
                        d && !i && (r = s.win.position(), e = -r.left, r = -r.top);
                        c = t.clientY + r;
                        r = c - s.rail.drag.y;
                        var a = t.clientX + e, o = a - s.rail.drag.x, u = s.rail.drag.st - r;
                        if (s.ishwscroll && s.opt.bouncescroll ? 0 > u ? u = Math.round(u / 2) : u > s.page.maxh && (u = s.page.maxh + Math.round((u - s.page.maxh) / 2)) : (0 > u && (c = u = 0), u > s.page.maxh && (u = s.page.maxh, c = 0)), s.railh && s.railh.scrollable && (f = s.isrtlmode ? o - s.rail.drag.sl : s.rail.drag.sl - o, s.ishwscroll && s.opt.bouncescroll ? 0 > f ? f = Math.round(f / 2) : f > s.page.maxw && (f = s.page.maxw + Math.round((f - s.page.maxw) / 2)) : (0 > f && (a = f = 0), f > s.page.maxw && (f = s.page.maxw, a = 0))), e = !1, s.rail.drag.dl)e = !0, "v" == s.rail.drag.dl ? f = s.rail.drag.sl : "h" == s.rail.drag.dl && (u = s.rail.drag.st); else if (r = Math.abs(r), o = Math.abs(o), l = s.opt.directionlockdeadzone, "v" == s.rail.drag.ck) {
                            if (r > l && o <= .3 * r)return s.rail.drag = !1, !0;
                            o > l && (s.rail.drag.dl = "f", n("body").scrollTop(n("body").scrollTop()))
                        } else if ("h" == s.rail.drag.ck) {
                            if (o > l && r <= .3 * o)return s.rail.drag = !1, !0;
                            r > l && (s.rail.drag.dl = "f", n("body").scrollLeft(n("body").scrollLeft()))
                        }
                        if (s.synched("touchmove", function () {
                            s.rail.drag && 2 == s.rail.drag.pt && (s.prepareTransition && s.prepareTransition(0), s.rail.scrollable && s.setScrollTop(u), s.scrollmom.update(a, c), s.railh && s.railh.scrollable ? (s.setScrollLeft(f), s.showCursor(u, f)) : s.showCursor(u), h.isie10 && document.selection.clear())
                        }), h.ischrome && s.istouchcapable && (e = !1), e)return s.cancelEvent(t)
                    } else if (1 == s.rail.drag.pt)return s.onmousemove(t)
                }), s.onmousedown = function (n, t) {
                    if (!s.rail.drag || 1 == s.rail.drag.pt) {
                        if (s.railslocked)return s.cancelEvent(n);
                        s.cancelScroll();
                        s.rail.drag = {x: n.clientX, y: n.clientY, sx: s.scroll.x, sy: s.scroll.y, pt: 1, hr: !!t};
                        var i = s.getTarget(n);
                        return!s.ispage && h.hasmousecapture && i.setCapture(), s.isiframe && !h.hasmousecapture && (s.saved.csspointerevents = s.doc.css("pointer-events"), s.css(s.doc, {"pointer-events": "none"})), s.hasmoving = !1, s.cancelEvent(n)
                    }
                }, s.onmouseup = function (n) {
                    if (s.rail.drag)return 1 != s.rail.drag.pt ? !0 : (h.hasmousecapture && document.releaseCapture(), s.isiframe && !h.hasmousecapture && s.doc.css("pointer-events", s.saved.csspointerevents), s.rail.drag = !1, s.hasmoving && s.triggerScrollEnd(), s.cancelEvent(n))
                }, s.onmousemove = function (n) {
                    if (s.rail.drag && 1 == s.rail.drag.pt) {
                        if (h.ischrome && 0 == n.which)return s.onmouseup(n);
                        if (s.cursorfreezed = !0, s.hasmoving = !0, s.rail.drag.hr) {
                            s.scroll.x = s.rail.drag.sx + (n.clientX - s.rail.drag.x);
                            0 > s.scroll.x && (s.scroll.x = 0);
                            var t = s.scrollvaluemaxw;
                            s.scroll.x > t && (s.scroll.x = t)
                        } else s.scroll.y = s.rail.drag.sy + (n.clientY - s.rail.drag.y), 0 > s.scroll.y && (s.scroll.y = 0), t = s.scrollvaluemax, s.scroll.y > t && (s.scroll.y = t);
                        return s.synched("mousemove", function () {
                            s.rail.drag && 1 == s.rail.drag.pt && (s.showCursor(), s.rail.drag.hr ? s.hasreversehr ? s.doScrollLeft(s.scrollvaluemaxw - Math.round(s.scroll.x * s.scrollratio.x), s.opt.cursordragspeed) : s.doScrollLeft(Math.round(s.scroll.x * s.scrollratio.x), s.opt.cursordragspeed) : s.doScrollTop(Math.round(s.scroll.y * s.scrollratio.y), s.opt.cursordragspeed))
                        }), s.cancelEvent(n)
                    }
                }, h.cantouch || s.opt.touchbehavior ? (s.onpreventclick = function (n) {
                    if (s.preventclick)return s.preventclick.tg.onclick = s.preventclick.click, s.preventclick = !1, s.cancelEvent(n)
                }, s.bind(s.win, "mousedown", s.ontouchstart), s.onclick = h.isios ? !1 : function (n) {
                    return s.lastmouseup ? (s.lastmouseup = !1, s.cancelEvent(n)) : !0
                }, s.opt.grabcursorenabled && h.cursorgrabvalue && (s.css(s.ispage ? s.doc : s.win, {cursor: h.cursorgrabvalue}), s.css(s.rail, {cursor: h.cursorgrabvalue}))) : (v = function (n) {
                    if (s.selectiondrag) {
                        if (n) {
                            var t = s.win.outerHeight();
                            n = n.pageY - s.selectiondrag.top;
                            0 < n && n < t && (n = 0);
                            n >= t && (n -= t);
                            s.selectiondrag.df = n
                        }
                        0 != s.selectiondrag.df && (s.doScrollBy(2 * -Math.floor(s.selectiondrag.df / 6)), s.debounced("doselectionscroll", function () {
                            v()
                        }, 50))
                    }
                }, s.hasTextSelected = "getSelection"in document ? function () {
                    return 0 < document.getSelection().rangeCount
                } : "selection"in document ? function () {
                    return"None" != document.selection.type
                } : function () {
                    return!1
                }, s.onselectionstart = function () {
                    s.ispage || (s.selectiondrag = s.win.offset())
                }, s.onselectionend = function () {
                    s.selectiondrag = !1
                }, s.onselectiondrag = function (n) {
                    s.selectiondrag && s.hasTextSelected() && s.debounced("selectionscroll", function () {
                        v(n)
                    }, 250)
                }), h.hasw3ctouch ? (s.css(s.rail, {"touch-action": "none"}), s.css(s.cursor, {"touch-action": "none"}), s.bind(s.win, "pointerdown", s.ontouchstart), s.bind(document, "pointerup", s.ontouchend), s.bind(document, "pointermove", s.ontouchmove)) : h.hasmstouch ? (s.css(s.rail, {"-ms-touch-action": "none"}), s.css(s.cursor, {"-ms-touch-action": "none"}), s.bind(s.win, "MSPointerDown", s.ontouchstart), s.bind(document, "MSPointerUp", s.ontouchend), s.bind(document, "MSPointerMove", s.ontouchmove), s.bind(s.cursor, "MSGestureHold", function (n) {
                    n.preventDefault()
                }), s.bind(s.cursor, "contextmenu", function (n) {
                    n.preventDefault()
                })) : this.istouchcapable && (s.bind(s.win, "touchstart", s.ontouchstart), s.bind(document, "touchend", s.ontouchend), s.bind(document, "touchcancel", s.ontouchend), s.bind(document, "touchmove", s.ontouchmove)), !s.opt.cursordragontouch && (h.cantouch || s.opt.touchbehavior) || (s.rail.css({cursor: "default"}), s.railh && s.railh.css({cursor: "default"}), s.jqbind(s.rail, "mouseenter", function () {
                    if (!s.ispage && !s.win.is(":visible"))return!1;
                    s.canshowonmouseevent && s.showCursor();
                    s.rail.active = !0
                }), s.jqbind(s.rail, "mouseleave", function () {
                    s.rail.active = !1;
                    s.rail.drag || s.hideCursor()
                }), s.opt.sensitiverail && (s.bind(s.rail, "click", function (n) {
                    s.doRailClick(n, !1, !1)
                }), s.bind(s.rail, "dblclick", function (n) {
                    s.doRailClick(n, !0, !1)
                }), s.bind(s.cursor, "click", function (n) {
                    s.cancelEvent(n)
                }), s.bind(s.cursor, "dblclick", function (n) {
                    s.cancelEvent(n)
                })), s.railh && (s.jqbind(s.railh, "mouseenter", function () {
                    if (!s.ispage && !s.win.is(":visible"))return!1;
                    s.canshowonmouseevent && s.showCursor();
                    s.rail.active = !0
                }), s.jqbind(s.railh, "mouseleave", function () {
                    s.rail.active = !1;
                    s.rail.drag || s.hideCursor()
                }), s.opt.sensitiverail && (s.bind(s.railh, "click", function (n) {
                    s.doRailClick(n, !1, !0)
                }), s.bind(s.railh, "dblclick", function (n) {
                    s.doRailClick(n, !0, !0)
                }), s.bind(s.cursorh, "click", function (n) {
                    s.cancelEvent(n)
                }), s.bind(s.cursorh, "dblclick", function (n) {
                    s.cancelEvent(n)
                })))), h.cantouch || s.opt.touchbehavior ? (s.bind(h.hasmousecapture ? s.win : document, "mouseup", s.ontouchend), s.bind(document, "mousemove", s.ontouchmove), s.onclick && s.bind(document, "click", s.onclick), s.opt.cursordragontouch && (s.bind(s.cursor, "mousedown", s.onmousedown), s.bind(s.cursor, "mouseup", s.onmouseup), s.cursorh && s.bind(s.cursorh, "mousedown", function (n) {
                    s.onmousedown(n, !0)
                }), s.cursorh && s.bind(s.cursorh, "mouseup", s.onmouseup))) : (s.bind(h.hasmousecapture ? s.win : document, "mouseup", s.onmouseup), s.bind(document, "mousemove", s.onmousemove), s.onclick && s.bind(document, "click", s.onclick), s.bind(s.cursor, "mousedown", s.onmousedown), s.bind(s.cursor, "mouseup", s.onmouseup), s.railh && (s.bind(s.cursorh, "mousedown", function (n) {
                    s.onmousedown(n, !0)
                }), s.bind(s.cursorh, "mouseup", s.onmouseup)), !s.ispage && s.opt.enablescrollonselection && (s.bind(s.win[0], "mousedown", s.onselectionstart), s.bind(document, "mouseup", s.onselectionend), s.bind(s.cursor, "mouseup", s.onselectionend), s.cursorh && s.bind(s.cursorh, "mouseup", s.onselectionend), s.bind(document, "mousemove", s.onselectiondrag)), s.zoom && (s.jqbind(s.zoom, "mouseenter", function () {
                    s.canshowonmouseevent && s.showCursor();
                    s.rail.active = !0
                }), s.jqbind(s.zoom, "mouseleave", function () {
                    s.rail.active = !1;
                    s.rail.drag || s.hideCursor()
                }))), s.opt.enablemousewheel && (s.isiframe || s.bind(h.isie && s.ispage ? document : s.win, "mousewheel", s.onmousewheel), s.bind(s.rail, "mousewheel", s.onmousewheel), s.railh && s.bind(s.railh, "mousewheel", s.onmousewheelhr)), s.ispage || h.cantouch || /HTML|^BODY/.test(s.win[0].nodeName) || (s.win.attr("tabindex") || s.win.attr({tabindex: w++}), s.jqbind(s.win, "focus", function (n) {
                    o = s.getTarget(n).id || !0;
                    s.hasfocus = !0;
                    s.canshowonmouseevent && s.noticeCursor()
                }), s.jqbind(s.win, "blur", function () {
                    o = !1;
                    s.hasfocus = !1
                }), s.jqbind(s.win, "mouseenter", function (n) {
                    c = s.getTarget(n).id || !0;
                    s.hasmousefocus = !0;
                    s.canshowonmouseevent && s.noticeCursor()
                }), s.jqbind(s.win, "mouseleave", function () {
                    c = !1;
                    s.hasmousefocus = !1;
                    s.rail.drag || s.hideCursor()
                })));
                s.onkeypress = function (t) {
                    var r;
                    if (s.railslocked && 0 == s.page.maxh || (t = t ? t : window.e, r = s.getTarget(t), r && /INPUT|TEXTAREA|SELECT|OPTION/.test(r.nodeName) && (!r.getAttribute("type") && !r.type || !/submit|button|cancel/i.tp) || n(r).attr("contenteditable")))return!0;
                    if (s.hasfocus || s.hasmousefocus && !o || s.ispage && !o && !c) {
                        if (r = t.keyCode, s.railslocked && 27 != r)return s.cancelEvent(t);
                        var u = t.ctrlKey || !1, f = t.shiftKey || !1, i = !1;
                        switch (r) {
                            case 38:
                            case 63233:
                                s.doScrollBy(72);
                                i = !0;
                                break;
                            case 40:
                            case 63235:
                                s.doScrollBy(-72);
                                i = !0;
                                break;
                            case 37:
                            case 63232:
                                s.railh && (u ? s.doScrollLeft(0) : s.doScrollLeftBy(72), i = !0);
                                break;
                            case 39:
                            case 63234:
                                s.railh && (u ? s.doScrollLeft(s.page.maxw) : s.doScrollLeftBy(-72), i = !0);
                                break;
                            case 33:
                            case 63276:
                                s.doScrollBy(s.view.h);
                                i = !0;
                                break;
                            case 34:
                            case 63277:
                                s.doScrollBy(-s.view.h);
                                i = !0;
                                break;
                            case 36:
                            case 63273:
                                s.railh && u ? s.doScrollPos(0, 0) : s.doScrollTo(0);
                                i = !0;
                                break;
                            case 35:
                            case 63275:
                                s.railh && u ? s.doScrollPos(s.page.maxw, s.page.maxh) : s.doScrollTo(s.page.maxh);
                                i = !0;
                                break;
                            case 32:
                                s.opt.spacebarenabled && (f ? s.doScrollBy(s.view.h) : s.doScrollBy(-s.view.h), i = !0);
                                break;
                            case 27:
                                s.zoomactive && (s.doZoom(), i = !0)
                        }
                        if (i)return s.cancelEvent(t)
                    }
                };
                s.opt.enablekeyboard && s.bind(document, h.isopera && !h.isopera12 ? "keypress" : "keydown", s.onkeypress);
                s.bind(document, "keydown", function (n) {
                    n.ctrlKey && (s.wheelprevented = !0)
                });
                s.bind(document, "keyup", function (n) {
                    n.ctrlKey || (s.wheelprevented = !1)
                });
                s.bind(window, "blur", function () {
                    s.wheelprevented = !1
                });
                s.bind(window, "resize", s.lazyResize);
                s.bind(window, "orientationchange", s.lazyResize);
                s.bind(window, "load", s.lazyResize);
                !h.ischrome || s.ispage || s.haswrapper || (g = s.win.attr("style"), t = parseFloat(s.win.css("width")) + 1, s.win.css("width", t), s.synched("chromefix", function () {
                    s.win.attr("style", g)
                }));
                s.onAttributeChange = function () {
                    s.lazyResize(s.isieold ? 250 : 30)
                };
                !1 !== r && (s.observerbody = new r(function (t) {
                    return t.forEach(function (t) {
                        if ("attributes" == t.type)return n("body").hasClass("modal-open") ? s.hide() : s.show()
                    }), document.body.scrollHeight != s.page.maxh ? s.lazyResize(30) : void 0
                }), s.observerbody.observe(document.body, {childList: !0, subtree: !0, characterData: !1, attributes: !0, attributeFilter: ["class"]}));
                s.ispage || s.haswrapper || (!1 !== r ? (s.observer = new r(function (n) {
                    n.forEach(s.onAttributeChange)
                }), s.observer.observe(s.win[0], {childList: !0, characterData: !1, attributes: !0, subtree: !1}), s.observerremover = new r(function (n) {
                    n.forEach(function (n) {
                        if (0 < n.removedNodes.length)for (var t in n.removedNodes)if (s && n.removedNodes[t] == s.win[0])return s.remove()
                    })
                }), s.observerremover.observe(s.win[0].parentNode, {childList: !0, characterData: !1, attributes: !1, subtree: !1})) : (s.bind(s.win, h.isie && !h.isie9 ? "propertychange" : "DOMAttrModified", s.onAttributeChange), h.isie9 && s.win[0].attachEvent("onpropertychange", s.onAttributeChange), s.bind(s.win, "DOMNodeRemoved", function (n) {
                    n.target == s.win[0] && s.remove()
                })));
                !s.ispage && s.opt.boxzoom && s.bind(window, "resize", s.resizeZoom);
                s.istextarea && s.bind(s.win, "mouseup", s.lazyResize);
                s.lazyResize(30)
            }
            "IFRAME" == this.doc[0].nodeName && (y = function () {
                var t, i;
                s.iframexd = !1;
                try {
                    t = "contentDocument"in this ? this.contentDocument : this.contentWindow.document
                } catch (r) {
                    s.iframexd = !0;
                    t = !1
                }
                if (s.iframexd)return"console"in window && console.log("NiceScroll error: policy restriced iframe"), !0;
                s.forcescreen = !0;
                s.isiframe && (s.iframe = {doc: n(t), html: s.doc.contents().find("html")[0], body: s.doc.contents().find("body")[0]}, s.getContentSize = function () {
                    return{w: Math.max(s.iframe.html.scrollWidth, s.iframe.body.scrollWidth), h: Math.max(s.iframe.html.scrollHeight, s.iframe.body.scrollHeight)}
                }, s.docscroll = n(s.iframe.body));
                h.isios || !s.opt.iframeautoresize || s.isiframe || (s.win.scrollTop(0), s.doc.height(""), i = Math.max(t.getElementsByTagName("html")[0].scrollHeight, t.body.scrollHeight), s.doc.height(i));
                s.lazyResize(30);
                h.isie7 && s.css(n(s.iframe.html), {"overflow-y": "hidden"});
                s.css(n(s.iframe.body), {"overflow-y": "hidden"});
                h.isios && s.haswrapper && s.css(n(t.body), {"-webkit-transform": "translate3d(0,0,0)"});
                "contentWindow"in this ? s.bind(this.contentWindow, "scroll", s.onscroll) : s.bind(t, "scroll", s.onscroll);
                s.opt.enablemousewheel && s.bind(t, "mousewheel", s.onmousewheel);
                s.opt.enablekeyboard && s.bind(t, h.isopera ? "keypress" : "keydown", s.onkeypress);
                (h.cantouch || s.opt.touchbehavior) && (s.bind(t, "mousedown", s.ontouchstart), s.bind(t, "mousemove", function (n) {
                    return s.ontouchmove(n, !0)
                }), s.opt.grabcursorenabled && h.cursorgrabvalue && s.css(n(t.body), {cursor: h.cursorgrabvalue}));
                s.bind(t, "mouseup", s.ontouchend);
                s.zoom && (s.opt.dblclickzoom && s.bind(t, "dblclick", s.doZoom), s.ongesturezoom && s.bind(t, "gestureend", s.ongesturezoom))
            }, this.doc[0].readyState && "complete" == this.doc[0].readyState && setTimeout(function () {
                y.call(s.doc[0], !1)
            }, 500), s.bind(this.doc, "load", y))
        };
        this.showCursor = function (n, t) {
            if (s.cursortimeout && (clearTimeout(s.cursortimeout), s.cursortimeout = 0), s.rail) {
                if (s.autohidedom && (s.autohidedom.stop().css({opacity: s.opt.cursoropacitymax}), s.cursoractive = !0), s.rail.drag && 1 == s.rail.drag.pt || ("undefined" != typeof n && !1 !== n && (s.scroll.y = Math.round(1 * n / s.scrollratio.y)), "undefined" != typeof t && (s.scroll.x = Math.round(1 * t / s.scrollratio.x))), s.cursor.css({height: s.cursorheight, top: s.scroll.y}), s.cursorh) {
                    var i = s.hasreversehr ? s.scrollvaluemaxw - s.scroll.x : s.scroll.x;
                    !s.rail.align && s.rail.visibility ? s.cursorh.css({width: s.cursorwidth, left: i + s.rail.width}) : s.cursorh.css({width: s.cursorwidth, left: i});
                    s.cursoractive = !0
                }
                s.zoom && s.zoom.stop().css({opacity: s.opt.cursoropacitymax})
            }
        };
        this.hideCursor = function (n) {
            s.cursortimeout || !s.rail || !s.autohidedom || s.hasmousefocus && "leave" == s.opt.autohidemode || (s.cursortimeout = setTimeout(function () {
                s.rail.active && s.showonmouseevent || (s.autohidedom.stop().animate({opacity: s.opt.cursoropacitymin}), s.zoom && s.zoom.stop().animate({opacity: s.opt.cursoropacitymin}), s.cursoractive = !1);
                s.cursortimeout = 0
            }, n || s.opt.hidecursordelay))
        };
        this.noticeCursor = function (n, t, i) {
            s.showCursor(t, i);
            s.rail.active || s.hideCursor(n)
        };
        this.getContentSize = s.ispage ? function () {
            return{w: Math.max(document.body.scrollWidth, document.documentElement.scrollWidth), h: Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)}
        } : s.haswrapper ? function () {
            return{w: s.doc.outerWidth() + parseInt(s.win.css("paddingLeft")) + parseInt(s.win.css("paddingRight")), h: s.doc.outerHeight() + parseInt(s.win.css("paddingTop")) + parseInt(s.win.css("paddingBottom"))}
        } : function () {
            return{w: s.docscroll[0].scrollWidth, h: s.docscroll[0].scrollHeight}
        };
        this.onResize = function (n, t) {
            if (!s || !s.win)return!1;
            if (!s.haswrapper && !s.ispage) {
                if ("none" == s.win.css("display"))return s.visibility && s.hideRail().hideRailHr(), !1;
                s.hidden || s.visibility || s.showRail().showRailHr()
            }
            var i = s.page.maxh, r = s.page.maxw, u = s.view.h, f = s.view.w;
            if (s.view = {w: s.ispage ? s.win.width() : parseInt(s.win[0].clientWidth), h: s.ispage ? s.win.height() : parseInt(s.win[0].clientHeight)}, s.page = t ? t : s.getContentSize(), s.page.maxh = Math.max(0, s.page.h - s.view.h), s.page.maxw = Math.max(0, s.page.w - s.view.w), s.page.maxh == i && s.page.maxw == r && s.view.w == f && s.view.h == u) {
                if (s.ispage || (i = s.win.offset(), s.lastposition && (r = s.lastposition, r.top == i.top && r.left == i.left)))return s;
                s.lastposition = i
            }
            return(0 == s.page.maxh ? (s.hideRail(), s.scrollvaluemax = 0, s.scroll.y = 0, s.scrollratio.y = 0, s.cursorheight = 0, s.setScrollTop(0), s.rail.scrollable = !1) : (s.page.maxh -= s.opt.railpadding.top + s.opt.railpadding.bottom, s.rail.scrollable = !0), 0 == s.page.maxw ? (s.hideRailHr(), s.scrollvaluemaxw = 0, s.scroll.x = 0, s.scrollratio.x = 0, s.cursorwidth = 0, s.setScrollLeft(0), s.railh.scrollable = !1) : (s.page.maxw -= s.opt.railpadding.left + s.opt.railpadding.right, s.railh.scrollable = !0), s.railslocked = s.locked || 0 == s.page.maxh && 0 == s.page.maxw, s.railslocked) ? (s.ispage || s.updateScrollBar(s.view), !1) : (s.hidden || s.visibility ? s.hidden || s.railh.visibility || s.showRailHr() : s.showRail().showRailHr(), s.istextarea && s.win.css("resize") && "none" != s.win.css("resize") && (s.view.h -= 20), s.cursorheight = Math.min(s.view.h, Math.round(s.view.h / s.page.h * s.view.h)), s.cursorheight = s.opt.cursorfixedheight ? s.opt.cursorfixedheight : Math.max(s.opt.cursorminheight, s.cursorheight), s.cursorwidth = Math.min(s.view.w, Math.round(s.view.w / s.page.w * s.view.w)), s.cursorwidth = s.opt.cursorfixedheight ? s.opt.cursorfixedheight : Math.max(s.opt.cursorminheight, s.cursorwidth), s.scrollvaluemax = s.view.h - s.cursorheight - s.cursor.hborder - (s.opt.railpadding.top + s.opt.railpadding.bottom), s.railh && (s.railh.width = 0 < s.page.maxh ? s.view.w - s.rail.width : s.view.w, s.scrollvaluemaxw = s.railh.width - s.cursorwidth - s.cursorh.wborder - (s.opt.railpadding.left + s.opt.railpadding.right)), s.ispage || s.updateScrollBar(s.view), s.scrollratio = {x: s.page.maxw / s.scrollvaluemaxw, y: s.page.maxh / s.scrollvaluemax}, s.getScrollTop() > s.page.maxh ? s.doScrollTop(s.page.maxh) : (s.scroll.y = Math.round(s.getScrollTop() * (1 / s.scrollratio.y)), s.scroll.x = Math.round(s.getScrollLeft() * (1 / s.scrollratio.x)), s.cursoractive && s.noticeCursor()), s.scroll.y && 0 == s.getScrollTop() && s.doScrollTo(Math.floor(s.scroll.y * s.scrollratio.y)), s)
        };
        this.resize = s.onResize;
        this.lazyResize = function (n) {
            return n = isNaN(n) ? 30 : n, s.debounced("resize", s.resize, n), s
        };
        this.jqbind = function (t, i, r) {
            s.events.push({e: t, n: i, f: r, q: !0});
            n(t).bind(i, r)
        };
        this.bind = function (n, t, i, r) {
            var u = "jquery"in n ? n[0] : n;
            "mousewheel" == t ? window.addEventListener || "onwheel"in document ? s._bind(u, "wheel", i, r || !1) : (n = "undefined" != typeof document.onmousewheel ? "mousewheel" : "DOMMouseScroll", tt(u, n, i, r || !1), "DOMMouseScroll" == n && tt(u, "MozMousePixelScroll", i, r || !1)) : u.addEventListener ? (h.cantouch && /mouseup|mousedown|mousemove/.test(t) && s._bind(u, "mousedown" == t ? "touchstart" : "mouseup" == t ? "touchend" : "touchmove", function (n) {
                if (n.touches) {
                    if (2 > n.touches.length) {
                        var t = n.touches.length ? n.touches[0] : n;
                        t.original = n;
                        i.call(this, t)
                    }
                } else n.changedTouches && (t = n.changedTouches[0], t.original = n, i.call(this, t))
            }, r || !1), s._bind(u, t, i, r || !1), h.cantouch && "mouseup" == t && s._bind(u, "touchcancel", i, r || !1)) : s._bind(u, t, function (n) {
                return(n = n || window.event || !1) && n.srcElement && (n.target = n.srcElement), "pageY"in n || (n.pageX = n.clientX + document.documentElement.scrollLeft, n.pageY = n.clientY + document.documentElement.scrollTop), !1 === i.call(u, n) || !1 === r ? s.cancelEvent(n) : !0
            })
        };
        h.haseventlistener ? (this._bind = function (n, t, i, r) {
            s.events.push({e: n, n: t, f: i, b: r, q: !1});
            n.addEventListener(t, i, r || !1)
        }, this.cancelEvent = function (n) {
            return n ? (n = n.original ? n.original : n, n.preventDefault(), n.stopPropagation(), n.preventManipulation && n.preventManipulation(), !1) : !1
        }, this.stopPropagation = function (n) {
            return n ? (n = n.original ? n.original : n, n.stopPropagation(), !1) : !1
        }, this._unbind = function (n, t, i, r) {
            n.removeEventListener(t, i, r)
        }) : (this._bind = function (n, t, i, r) {
            s.events.push({e: n, n: t, f: i, b: r, q: !1});
            n.attachEvent ? n.attachEvent("on" + t, i) : n["on" + t] = i
        }, this.cancelEvent = function (n) {
            return(n = window.event || !1, !n) ? !1 : (n.cancelBubble = !0, n.cancel = !0, n.returnValue = !1)
        }, this.stopPropagation = function (n) {
            return(n = window.event || !1, !n) ? !1 : (n.cancelBubble = !0, !1)
        }, this._unbind = function (n, t, i) {
            n.detachEvent ? n.detachEvent("on" + t, i) : n["on" + t] = !1
        });
        this.unbindAll = function () {
            for (var n, t = 0; t < s.events.length; t++)n = s.events[t], n.q ? n.e.unbind(n.n, n.f) : s._unbind(n.e, n.n, n.f, n.b)
        };
        this.showRail = function () {
            return 0 != s.page.maxh && (s.ispage || "none" != s.win.css("display")) && (s.visibility = !0, s.rail.visibility = !0, s.rail.css("display", "block")), s
        };
        this.showRailHr = function () {
            return s.railh ? (0 != s.page.maxw && (s.ispage || "none" != s.win.css("display")) && (s.railh.visibility = !0, s.railh.css("display", "block")), s) : s
        };
        this.hideRail = function () {
            return s.visibility = !1, s.rail.visibility = !1, s.rail.css("display", "none"), s
        };
        this.hideRailHr = function () {
            return s.railh ? (s.railh.visibility = !1, s.railh.css("display", "none"), s) : s
        };
        this.show = function () {
            return s.hidden = !1, s.railslocked = !1, s.showRail().showRailHr()
        };
        this.hide = function () {
            return s.hidden = !0, s.railslocked = !0, s.hideRail().hideRailHr()
        };
        this.toggle = function () {
            return s.hidden ? s.show() : s.hide()
        };
        this.remove = function () {
            var r, i, t, u;
            for (s.stop(), s.cursortimeout && clearTimeout(s.cursortimeout), s.doZoomOut(), s.unbindAll(), h.isie9 && s.win[0].detachEvent("onpropertychange", s.onAttributeChange), !1 !== s.observer && s.observer.disconnect(), !1 !== s.observerremover && s.observerremover.disconnect(), !1 !== s.observerbody && s.observerbody.disconnect(), s.events = null, s.cursor && s.cursor.remove(), s.cursorh && s.cursorh.remove(), s.rail && s.rail.remove(), s.railh && s.railh.remove(), s.zoom && s.zoom.remove(), r = 0; r < s.saved.css.length; r++)i = s.saved.css[r], i[0].css(i[1], "undefined" == typeof i[2] ? "" : i[2]);
            s.saved = !1;
            s.me.data("__nicescroll", "");
            t = n.nicescroll;
            t.each(function (n) {
                if (this && this.id === s.id) {
                    delete t[n];
                    for (var i = ++n; i < t.length; i++, n++)t[n] = t[i];
                    t.length--;
                    t.length && delete t[t.length]
                }
            });
            for (u in s)s[u] = null, delete s[u];
            s = null
        };
        this.scrollstart = function (n) {
            return this.onscrollstart = n, s
        };
        this.scrollend = function (n) {
            return this.onscrollend = n, s
        };
        this.scrollcancel = function (n) {
            return this.onscrollcancel = n, s
        };
        this.zoomin = function (n) {
            return this.onzoomin = n, s
        };
        this.zoomout = function (n) {
            return this.onzoomout = n, s
        };
        this.isScrollable = function (t) {
            if (t = t.target ? t.target : t, "OPTION" == t.nodeName)return!0;
            for (; t && 1 == t.nodeType && !/^BODY|HTML/.test(t.nodeName);) {
                var i = n(t), i = i.css("overflowY") || i.css("overflowX") || i.css("overflow") || "";
                if (/scroll|auto/.test(i))return t.clientHeight != t.scrollHeight;
                t = t.parentNode ? t.parentNode : !1
            }
            return!1
        };
        this.getViewport = function (t) {
            var i, r;
            for (t = t && t.parentNode ? t.parentNode : !1; t && 1 == t.nodeType && !/^BODY|HTML/.test(t.nodeName);) {
                if ((i = n(t), /fixed|absolute/.test(i.css("position"))) || (r = i.css("overflowY") || i.css("overflowX") || i.css("overflow") || "", /scroll|auto/.test(r) && t.clientHeight != t.scrollHeight || 0 < i.getNiceScroll().length))return i;
                t = t.parentNode ? t.parentNode : !1
            }
            return!1
        };
        this.triggerScrollEnd = function () {
            if (s.onscrollend) {
                var n = s.getScrollLeft(), t = s.getScrollTop();
                s.onscrollend.call(s, {type: "scrollend", current: {x: n, y: t}, end: {x: n, y: t}})
            }
        };
        this.onmousewheel = function (n) {
            if (!s.wheelprevented) {
                if (s.railslocked)return s.debounced("checkunlock", s.resize, 250), !0;
                if (s.rail.drag)return s.cancelEvent(n);
                if ("auto" == s.opt.oneaxismousemode && 0 != n.deltaX && (s.opt.oneaxismousemode = !1), s.opt.oneaxismousemode && 0 == n.deltaX && !s.rail.scrollable)return s.railh && s.railh.scrollable ? s.onmousewheelhr(n) : !0;
                var t = +new Date, i = !1;
                return(s.opt.preservenativescrolling && s.checkarea + 600 < t && (s.nativescrollingarea = s.isScrollable(n), i = !0), s.checkarea = t, s.nativescrollingarea) ? !0 : ((n = it(n, !1, i)) && (s.checkarea = 0), n)
            }
        };
        this.onmousewheelhr = function (n) {
            if (!s.wheelprevented) {
                if (s.railslocked || !s.railh.scrollable)return!0;
                if (s.rail.drag)return s.cancelEvent(n);
                var t = +new Date, i = !1;
                return s.opt.preservenativescrolling && s.checkarea + 600 < t && (s.nativescrollingarea = s.isScrollable(n), i = !0), s.checkarea = t, s.nativescrollingarea ? !0 : s.railslocked ? s.cancelEvent(n) : it(n, !0, i)
            }
        };
        this.stop = function () {
            return s.cancelScroll(), s.scrollmon && s.scrollmon.stop(), s.cursorfreezed = !1, s.scroll.y = Math.round(s.getScrollTop() * (1 / s.scrollratio.y)), s.noticeCursor(), s
        };
        this.getTransitionSpeed = function (n) {
            var t = Math.round(10 * s.opt.scrollspeed);
            return n = Math.min(t, Math.round(n / 20 * s.opt.scrollspeed)), 20 < n ? n : 0
        };
        s.opt.smoothscroll ? s.ishwscroll && h.hastransition && s.opt.usetransition && s.opt.smoothscroll ? (this.prepareTransition = function (n, t) {
            var i = t ? 20 < n ? n : 0 : s.getTransitionSpeed(n), r = i ? h.prefixstyle + "transform " + i + "ms ease-out" : "";
            return s.lasttransitionstyle && s.lasttransitionstyle == r || (s.lasttransitionstyle = r, s.doc.css(h.transitionstyle, r)), i
        }, this.doScrollLeft = function (n, t) {
            var i = s.scrollrunning ? s.newscrolly : s.getScrollTop();
            s.doScrollPos(n, i, t)
        }, this.doScrollTop = function (n, t) {
            var i = s.scrollrunning ? s.newscrollx : s.getScrollLeft();
            s.doScrollPos(i, n, t)
        }, this.doScrollPos = function (n, t, i) {
            var r = s.getScrollTop(), u = s.getScrollLeft();
            if (((0 > (s.newscrolly - r) * (t - r) || 0 > (s.newscrollx - u) * (n - u)) && s.cancelScroll(), 0 == s.opt.bouncescroll && (0 > t ? t = 0 : t > s.page.maxh && (t = s.page.maxh), 0 > n ? n = 0 : n > s.page.maxw && (n = s.page.maxw)), s.scrollrunning && n == s.newscrollx && t == s.newscrolly) || (s.newscrolly = t, s.newscrollx = n, s.newscrollspeed = i || !1, s.timer))return!1;
            s.timer = setTimeout(function () {
                var r = s.getScrollTop(), u = s.getScrollLeft(), i, f;
                i = n - u;
                f = t - r;
                i = Math.round(Math.sqrt(Math.pow(i, 2) + Math.pow(f, 2)));
                i = s.newscrollspeed && 1 < s.newscrollspeed ? s.newscrollspeed : s.getTransitionSpeed(i);
                s.newscrollspeed && 1 >= s.newscrollspeed && (i *= s.newscrollspeed);
                s.prepareTransition(i, !0);
                s.timerscroll && s.timerscroll.tm && clearInterval(s.timerscroll.tm);
                0 < i && (!s.scrollrunning && s.onscrollstart && s.onscrollstart.call(s, {type: "scrollstart", current: {x: u, y: r}, request: {x: n, y: t}, end: {x: s.newscrollx, y: s.newscrolly}, speed: i}), h.transitionend ? s.scrollendtrapped || (s.scrollendtrapped = !0, s.bind(s.doc, h.transitionend, s.onScrollTransitionEnd, !1)) : (s.scrollendtrapped && clearTimeout(s.scrollendtrapped), s.scrollendtrapped = setTimeout(s.onScrollTransitionEnd, i)), s.timerscroll = {bz: new a(r, s.newscrolly, i, 0, 0, .58, 1), bh: new a(u, s.newscrollx, i, 0, 0, .58, 1)}, s.cursorfreezed || (s.timerscroll.tm = setInterval(function () {
                    s.showCursor(s.getScrollTop(), s.getScrollLeft())
                }, 60)));
                s.synched("doScroll-set", function () {
                    s.timer = 0;
                    s.scrollendtrapped && (s.scrollrunning = !0);
                    s.setScrollTop(s.newscrolly);
                    s.setScrollLeft(s.newscrollx);
                    s.scrollendtrapped || s.onScrollTransitionEnd()
                })
            }, 50)
        }, this.cancelScroll = function () {
            if (!s.scrollendtrapped)return!0;
            var n = s.getScrollTop(), t = s.getScrollLeft();
            return s.scrollrunning = !1, h.transitionend || clearTimeout(h.transitionend), s.scrollendtrapped = !1, s._unbind(s.doc[0], h.transitionend, s.onScrollTransitionEnd), s.prepareTransition(0), s.setScrollTop(n), s.railh && s.setScrollLeft(t), s.timerscroll && s.timerscroll.tm && clearInterval(s.timerscroll.tm), s.timerscroll = !1, s.cursorfreezed = !1, s.showCursor(n, t), s
        }, this.onScrollTransitionEnd = function () {
            s.scrollendtrapped && s._unbind(s.doc[0], h.transitionend, s.onScrollTransitionEnd);
            s.scrollendtrapped = !1;
            s.prepareTransition(0);
            s.timerscroll && s.timerscroll.tm && clearInterval(s.timerscroll.tm);
            s.timerscroll = !1;
            var n = s.getScrollTop(), t = s.getScrollLeft();
            if (s.setScrollTop(n), s.railh && s.setScrollLeft(t), s.noticeCursor(!1, n, t), s.cursorfreezed = !1, 0 > n ? n = 0 : n > s.page.maxh && (n = s.page.maxh), 0 > t ? t = 0 : t > s.page.maxw && (t = s.page.maxw), n != s.newscrolly || t != s.newscrollx)return s.doScrollPos(t, n, s.opt.snapbackspeed);
            s.onscrollend && s.scrollrunning && s.triggerScrollEnd();
            s.scrollrunning = !1
        }) : (this.doScrollLeft = function (n, t) {
            var i = s.scrollrunning ? s.newscrolly : s.getScrollTop();
            s.doScrollPos(n, i, t)
        }, this.doScrollTop = function (n, t) {
            var i = s.scrollrunning ? s.newscrollx : s.getScrollLeft();
            s.doScrollPos(i, n, t)
        }, this.doScrollPos = function (n, r, u) {
            function l() {
                if (s.cancelAnimationFrame)return!0;
                if (s.scrollrunning = !0, v = 1 - v)return s.timer = t(l) || 1;
                var u = 0, r, n, i = n = s.getScrollTop();
                s.dst.ay ? (i = s.bzscroll ? s.dst.py + s.bzscroll.getNow() * s.dst.ay : s.newscrolly, r = i - n, (0 > r && i < s.newscrolly || 0 < r && i > s.newscrolly) && (i = s.newscrolly), s.setScrollTop(i), i == s.newscrolly && (u = 1)) : u = 1;
                n = r = s.getScrollLeft();
                s.dst.ax ? (n = s.bzscroll ? s.dst.px + s.bzscroll.getNow() * s.dst.ax : s.newscrollx, r = n - r, (0 > r && n < s.newscrollx || 0 < r && n > s.newscrollx) && (n = s.newscrollx), s.setScrollLeft(n), n == s.newscrollx && (u += 1)) : u += 1;
                2 == u ? (s.timer = 0, s.cursorfreezed = !1, s.bzscroll = !1, s.scrollrunning = !1, 0 > i ? i = 0 : i > s.page.maxh && (i = s.page.maxh), 0 > n ? n = 0 : n > s.page.maxw && (n = s.page.maxw), n != s.newscrollx || i != s.newscrolly ? s.doScrollPos(n, i) : s.onscrollend && s.triggerScrollEnd()) : s.timer = t(l) || 1
            }

            var e, o, f, c, h, v;
            if (r = "undefined" == typeof r || !1 === r ? s.getScrollTop(!0) : r, s.timer && s.newscrolly == r && s.newscrollx == n)return!0;
            s.timer && i(s.timer);
            s.timer = 0;
            e = s.getScrollTop();
            o = s.getScrollLeft();
            (0 > (s.newscrolly - e) * (r - e) || 0 > (s.newscrollx - o) * (n - o)) && s.cancelScroll();
            s.newscrolly = r;
            s.newscrollx = n;
            s.bouncescroll && s.rail.visibility || (0 > s.newscrolly ? s.newscrolly = 0 : s.newscrolly > s.page.maxh && (s.newscrolly = s.page.maxh));
            s.bouncescroll && s.railh.visibility || (0 > s.newscrollx ? s.newscrollx = 0 : s.newscrollx > s.page.maxw && (s.newscrollx = s.page.maxw));
            s.dst = {};
            s.dst.x = n - o;
            s.dst.y = r - e;
            s.dst.px = o;
            s.dst.py = e;
            f = Math.round(Math.sqrt(Math.pow(s.dst.x, 2) + Math.pow(s.dst.y, 2)));
            s.dst.ax = s.dst.x / f;
            s.dst.ay = s.dst.y / f;
            c = 0;
            h = f;
            0 == s.dst.x ? (c = e, h = r, s.dst.ay = 1, s.dst.py = 0) : 0 == s.dst.y && (c = o, h = n, s.dst.ax = 1, s.dst.px = 0);
            f = s.getTransitionSpeed(f);
            u && 1 >= u && (f *= u);
            s.bzscroll = 0 < f ? s.bzscroll ? s.bzscroll.update(h, f) : new a(c, h, f, 0, 1, 0, 1) : !1;
            s.timer || ((e == s.page.maxh && r >= s.page.maxh || o == s.page.maxw && n >= s.page.maxw) && s.checkContentSize(), v = 1, s.cancelAnimationFrame = !1, s.timer = 1, s.onscrollstart && !s.scrollrunning && s.onscrollstart.call(s, {type: "scrollstart", current: {x: o, y: e}, request: {x: n, y: r}, end: {x: s.newscrollx, y: s.newscrolly}, speed: f}), l(), (e == s.page.maxh && r >= e || o == s.page.maxw && n >= o) && s.checkContentSize(), s.noticeCursor())
        }, this.cancelScroll = function () {
            return s.timer && i(s.timer), s.timer = 0, s.bzscroll = !1, s.scrollrunning = !1, s
        }) : (this.doScrollLeft = function (n, t) {
            var i = s.getScrollTop();
            s.doScrollPos(n, i, t)
        }, this.doScrollTop = function (n, t) {
            var i = s.getScrollLeft();
            s.doScrollPos(i, n, t)
        }, this.doScrollPos = function (n, t) {
            var r = n > s.page.maxw ? s.page.maxw : n, i;
            0 > r && (r = 0);
            i = t > s.page.maxh ? s.page.maxh : t;
            0 > i && (i = 0);
            s.synched("scroll", function () {
                s.setScrollTop(i);
                s.setScrollLeft(r)
            })
        }, this.cancelScroll = function () {
        });
        this.doScrollBy = function (n, t) {
            var i = 0, i = t ? Math.floor((s.scroll.y - n) * s.scrollratio.y) : (s.timer ? s.newscrolly : s.getScrollTop(!0)) - n, r;
            if (s.bouncescroll && (r = Math.round(s.view.h / 2), i < -r ? i = -r : i > s.page.maxh + r && (i = s.page.maxh + r)), s.cursorfreezed = !1, r = s.getScrollTop(!0), 0 > i && 0 >= r)return s.noticeCursor();
            if (i > s.page.maxh && r >= s.page.maxh)return s.checkContentSize(), s.noticeCursor();
            s.doScrollTop(i)
        };
        this.doScrollLeftBy = function (n, t) {
            var i = 0, i = t ? Math.floor((s.scroll.x - n) * s.scrollratio.x) : (s.timer ? s.newscrollx : s.getScrollLeft(!0)) - n, r;
            if (s.bouncescroll && (r = Math.round(s.view.w / 2), i < -r ? i = -r : i > s.page.maxw + r && (i = s.page.maxw + r)), s.cursorfreezed = !1, r = s.getScrollLeft(!0), 0 > i && 0 >= r || i > s.page.maxw && r >= s.page.maxw)return s.noticeCursor();
            s.doScrollLeft(i)
        };
        this.doScrollTo = function (n, t) {
            t && Math.round(n * s.scrollratio.y);
            s.cursorfreezed = !1;
            s.doScrollTop(n)
        };
        this.checkContentSize = function () {
            var n = s.getContentSize();
            n.h == s.page.h && n.w == s.page.w || s.resize(!1, n)
        };
        s.onscroll = function () {
            s.rail.drag || s.cursorfreezed || s.synched("scroll", function () {
                s.scroll.y = Math.round(s.getScrollTop() * (1 / s.scrollratio.y));
                s.railh && (s.scroll.x = Math.round(s.getScrollLeft() * (1 / s.scrollratio.x)));
                s.noticeCursor()
            })
        };
        s.bind(s.docscroll, "scroll", s.onscroll);
        this.doZoomIn = function (t) {
            var i, f, e, r;
            if (!s.zoomactive) {
                s.zoomactive = !0;
                s.zoomrestore = {style: {}};
                i = "position top left zIndex backgroundColor marginTop marginBottom marginLeft marginRight".split(" ");
                f = s.win[0].style;
                for (e in i)r = i[e], s.zoomrestore.style[r] = "undefined" != typeof f[r] ? f[r] : "";
                return s.zoomrestore.style.width = s.win.css("width"), s.zoomrestore.style.height = s.win.css("height"), s.zoomrestore.padding = {w: s.win.outerWidth() - s.win.width(), h: s.win.outerHeight() - s.win.height()}, h.isios4 && (s.zoomrestore.scrollTop = n(window).scrollTop(), n(window).scrollTop(0)), s.win.css({position: h.isios4 ? "absolute" : "fixed", top: 0, left: 0, "z-index": u + 100, margin: "0px"}), i = s.win.css("backgroundColor"), ("" == i || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(i)) && s.win.css("backgroundColor", "#fff"), s.rail.css({"z-index": u + 101}), s.zoom.css({"z-index": u + 102}), s.zoom.css("backgroundPosition", "0px -18px"), s.resizeZoom(), s.onzoomin && s.onzoomin.call(s), s.cancelEvent(t)
            }
        };
        this.doZoomOut = function (t) {
            if (s.zoomactive)return s.zoomactive = !1, s.win.css("margin", ""), s.win.css(s.zoomrestore.style), h.isios4 && n(window).scrollTop(s.zoomrestore.scrollTop), s.rail.css({"z-index": s.zindex}), s.zoom.css({"z-index": s.zindex}), s.zoomrestore = !1, s.zoom.css("backgroundPosition", "0px 0px"), s.onResize(), s.onzoomout && s.onzoomout.call(s), s.cancelEvent(t)
        };
        this.doZoom = function (n) {
            return s.zoomactive ? s.doZoomOut(n) : s.doZoomIn(n)
        };
        this.resizeZoom = function () {
            if (s.zoomactive) {
                var t = s.getScrollTop();
                s.win.css({width: n(window).width() - s.zoomrestore.padding.w + "px", height: n(window).height() - s.zoomrestore.padding.h + "px"});
                s.onResize();
                s.setScrollTop(Math.min(s.page.maxh, t))
            }
        };
        this.init();
        n.nicescroll.push(this)
    }, p = function (n) {
        var t = this;
        this.nc = n;
        this.steptime = this.lasttime = this.speedy = this.speedx = this.lasty = this.lastx = 0;
        this.snapy = this.snapx = !1;
        this.demuly = this.demulx = 0;
        this.lastscrolly = this.lastscrollx = -1;
        this.timer = this.chky = this.chkx = 0;
        this.time = function () {
            return+new Date
        };
        this.reset = function (n, i) {
            t.stop();
            var r = t.time();
            t.steptime = 0;
            t.lasttime = r;
            t.speedx = 0;
            t.speedy = 0;
            t.lastx = n;
            t.lasty = i;
            t.lastscrollx = -1;
            t.lastscrolly = -1
        };
        this.update = function (n, i) {
            var r = t.time();
            t.steptime = r - t.lasttime;
            t.lasttime = r;
            var r = i - t.lasty, e = n - t.lastx, u = t.nc.getScrollTop(), f = t.nc.getScrollLeft(), u = u + r, f = f + e;
            t.snapx = 0 > f || f > t.nc.page.maxw;
            t.snapy = 0 > u || u > t.nc.page.maxh;
            t.speedx = e;
            t.speedy = r;
            t.lastx = n;
            t.lasty = i
        };
        this.stop = function () {
            t.nc.unsynched("domomentum2d");
            t.timer && clearTimeout(t.timer);
            t.timer = 0;
            t.lastscrollx = -1;
            t.lastscrolly = -1
        };
        this.doSnapy = function (n, i) {
            var r = !1;
            0 > i ? (i = 0, r = !0) : i > t.nc.page.maxh && (i = t.nc.page.maxh, r = !0);
            0 > n ? (n = 0, r = !0) : n > t.nc.page.maxw && (n = t.nc.page.maxw, r = !0);
            r ? t.nc.doScrollPos(n, i, t.nc.opt.snapbackspeed) : t.nc.triggerScrollEnd()
        };
        this.doMomentum = function (n) {
            var e = t.time(), u = n ? e + n : t.lasttime, f;
            n = t.nc.getScrollLeft();
            var h = t.nc.getScrollTop(), o = t.nc.page.maxh, s = t.nc.page.maxw;
            if (t.speedx = 0 < s ? Math.min(60, t.speedx) : 0, t.speedy = 0 < o ? Math.min(60, t.speedy) : 0, u = u && 60 >= e - u, (0 > h || h > o || 0 > n || n > s) && (u = !1), n = t.speedx && u ? t.speedx : !1, t.speedy && u && t.speedy || n) {
                f = Math.max(16, t.steptime);
                50 < f && (n = f / 50, t.speedx *= n, t.speedy *= n, f = 50);
                t.demulxy = 0;
                t.lastscrollx = t.nc.getScrollLeft();
                t.chkx = t.lastscrollx;
                t.lastscrolly = t.nc.getScrollTop();
                t.chky = t.lastscrolly;
                var i = t.lastscrollx, r = t.lastscrolly, c = function () {
                    var n = 600 < t.time() - e ? .04 : .02;
                    t.speedx && (i = Math.floor(t.lastscrollx - t.speedx * (1 - t.demulxy)), t.lastscrollx = i, 0 > i || i > s) && (n = .1);
                    t.speedy && (r = Math.floor(t.lastscrolly - t.speedy * (1 - t.demulxy)), t.lastscrolly = r, 0 > r || r > o) && (n = .1);
                    t.demulxy = Math.min(1, t.demulxy + n);
                    t.nc.synched("domomentum2d", function () {
                        t.speedx && (t.nc.getScrollLeft() != t.chkx && t.stop(), t.chkx = i, t.nc.setScrollLeft(i));
                        t.speedy && (t.nc.getScrollTop() != t.chky && t.stop(), t.chky = r, t.nc.setScrollTop(r));
                        t.timer || (t.nc.hideCursor(), t.doSnapy(i, r))
                    });
                    1 > t.demulxy ? t.timer = setTimeout(c, f) : (t.stop(), t.nc.hideCursor(), t.doSnapy(i, r))
                };
                c()
            } else t.doSnapy(t.nc.getScrollLeft(), t.nc.getScrollTop())
        }
    }, h = n.fn.scrollTop;


    f = n.fn.scrollLeft;
    n.cssHooks.pageXOffset = {get: function (t, i) {
        return(i = n.data(t, "__nicescroll") || !1) && i.ishwscroll ? i.getScrollLeft() : f.call(t)
    }, set: function (t, i) {
        var r = n.data(t, "__nicescroll") || !1;
        return r && r.ishwscroll ? r.setScrollLeft(parseInt(i)) : f.call(t, i), this
    }};
    n.fn.scrollLeft = function (t) {
        if ("undefined" == typeof t) {
            var i = this[0] ? n.data(this[0], "__nicescroll") || !1 : !1;
            return i && i.ishwscroll ? i.getScrollLeft() : f.call(this)
        }
        return this.each(function () {
            var i = n.data(this, "__nicescroll") || !1;
            i && i.ishwscroll ? i.setScrollLeft(parseInt(t)) : f.call(n(this), t)
        })
    };
    e = function (t) {
        var i = this, r, u;
        if (this.length = 0, this.name = "nicescrollarray", this.each = function (n) {
            for (var t = 0, r = 0; t < i.length; t++)n.call(i[t], r++);
            return i
        }, this.push = function (n) {
            i[i.length] = n;
            i.length++
        }, this.eq = function (n) {
            return i[n]
        }, t)for (r = 0; r < t.length; r++)u = n.data(t[r], "__nicescroll") || !1, u && (this[this.length] = u, this.length++);
        return this
    }, function (n, t, i) {
        for (var r = 0; r < t.length; r++)i(n, t[r])
    }(e.prototype, "show hide toggle onResize resize remove stop doScrollPos".split(" "), function (n, t) {
        n[t] = function () {
            var n = arguments;
            return this.each(function () {
                this[t].apply(this, n)
            })
        }
    });
    n.fn.getNiceScroll = function (t) {
        return"undefined" == typeof t ? new e(this) : this[t] && n.data(this[t], "__nicescroll") || !1
    };
    n.extend(n.expr[":"], {nicescroll: function (t) {
        return n.data(t, "__nicescroll") ? !0 : !1
    }});
    n.fn.niceScroll = function (t, i) {
        var r, u;
        return"undefined" != typeof i || "object" != typeof t || "jquery"in t || (i = t, t = !1), i = n.extend({}, i), r = new e, "undefined" == typeof i && (i = {}), t && (i.doc = n(t), i.win = n(this)), u = !("doc"in i), u || "win"in i || (i.win = n(this)), this.each(function () {
            var t = n(this).data("__nicescroll") || !1;
            t || (i.doc = u ? n(this) : i.doc, t = new d(i, n(this)), n(this).data("__nicescroll", t));
            r.push(t)
        }), 1 == r.length ? r[0] : r
    };
    window.NiceScroll = {getjQuery: function () {
        return n
    }};
    n.nicescroll || (n.nicescroll = new e, n.nicescroll.options = y)
})
    ,
    function (n) {


        n.fn.menuAim = function (n) {
            return this.each(function () {
                t.call(this, n)
            }), this
        }
    }(jQuery)