<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Booking Details</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
    <style>
        .imgBox {
            border: 1px solid #e0bd4cb0;
            margin: 1px;
            padding: 24px;
            box-shadow: -1px 3px 5px #af9e6a;
        }

        .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .stars {
            margin: 20px 0;
            font-size: 24px;
            color: #d17581;
        }

    </style>
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.usermenu')
    </header>
    <section class="section-sm row bg-white row">
        <table>
            <td><a class="button button-icon button-primary" href="/ubooking"><span>Booked Rooms</span><span
                        class="icon material-icons-chevron_right"></span></a></td>
            {{-- <td><a class="button button-icon button-primary book-details" href="/bbooking"><span>Booked Breakfasts</span><span class="icon material-icons-chevron_right"></span></a></td> --}}
            <td><a class="button button-icon button-primary book-details" href="/vibooking"><span>Booked
                        Vehicles</span><span class="icon material-icons-chevron_right"></span></a></td>
            <td><a class="button button-icon button-primary book-details" href="/pibooking"><span>Booked
                        Packages</span><span class="icon material-icons-chevron_right"></span></a></td>
        </table><br>
        @if (!$rbooking->count())
        <div class="text-center">
            {{-- <h5 style="font-size:30px;">No Bookings Yet</h5><br> --}}
        </div>
        @else
        <div class="text-center">
            <h5 style="font-size:30px;">Recent Bookings</h5><br>
        </div>
        <div class="row">
        @foreach ($rbooking as $rbookings)
        <div class="col-md-6" style="padding-bottom:45px">
            <div class="row imgBox">
                <div class="col-md-4">
                    <img src="images/package/{{ $rbookings->pkimage}}" alt="" style=" height:200px" />

                    <img src="images/room/{{ $rbookings->nrimage}}" alt="" style=" height:200px" />
                </div>
                <div class="col-md-4">
                    <label><b>Package :</b></label>
                    <label>{{ $rbookings->pkinfo }}</label><br>
                    <label><b>Room :</b></label>
                    <label>{{ $rbookings->rname }}</label><br>
                    <label><b>Breakfast :</b></label>
                    <label>{{ $rbookings->bfname }}</label><br>
                    {{-- <label>{{ $packages->description }}</label><br> --}}
                    <label><b>Vehicle :</b></label>
                    <label>{{ $rbookings->vrno }}</label><br>
                    <label><b></b>Booked Date :</b></label>
                    <label>{{ $rbookings->pbdate }}</label><br>
                    <label>{{ $rbookings->s_name }}</label><br>
                    <label>{{ $rbookings->d_name }}</label><br>
                    <label>{{ $rbookings->pname }}</label>
                    <label>{{ $rbookings->rcontact }}</label><br>
                    <label>Rs : </label><label>{{ $rbookings->rent }}</label>
                    @php
                    $todaycurrent = $today->format("m/d/Y")
                    @endphp
                    </div>
                    @if ($rbookings->pbdate > $todaycurrent) 
                        <a class="button button-icon button-primary cancel-package" href="#" data-toggle="modal"
                            data-target="#cancelpackage" data-pakid="{{ $rbookings->pbid }}"><span>Cancel</span><span
                                class="icon material-icons-chevron_right"></span></a>
                        {{-- @else
                        <a class="button button-icon button-primary cancel-package" href="#" data-toggle="modal"
                        data-target="#cancelpackage" data-pakid="{{ $rbookings->pbid }}"><span>Cancel</span><span
                            class="icon material-icons-chevron_right"></span></a> --}}
                        @endif
          
            </div>
        </div>
        @endforeach
        </div>
        @endif
        @if (!$obooking->count())
        <div class="text-center">
            {{-- <h5 style="font-size:30px;">Empty List</h5><br> --}}
        </div>
        @else
        <div class="text-center">
            <h5 style="font-size:30px;">Old Booking History</h5><br>
        </div>
        <div class="row">
        @foreach ($obooking as $obookings)
        <div class="col-md-6" style="padding-bottom:45px">
            <div class="row imgBox">
                <div class="col-md-4">
                    <img src="images/package/{{ $obookings->pkimage}}" alt="" style=" height:200px" />

                    <img src="images/room/{{ $obookings->nrimage}}" alt="" style=" height:200px" />
                </div>
                <div class="col-md-4">
                    <label><b>Package :</b></label>
                    <label>{{ $obookings->pkinfo }}</label><br>
                    <label><b>Room :</b></label>
                    <label>{{ $obookings->rname }}</label><br>
                    <label><b>Breakfast :</b></label>
                    <label>{{ $obookings->bfname }}</label><br>
                    {{-- <label>{{ $packages->description }}</label><br> --}}
                    <label><b>Vehicle :</b></label>
                    <label>{{ $obookings->vrno }}</label><br>
                    <label><b></b>Booked Date :</b></label>
                    <label>{{ $obookings->pbdate }}</label><br>
                    <label>{{ $obookings->s_name }}</label><br>
                    <label>{{ $obookings->d_name }}</label><br>
                    <label>{{ $obookings->pname }}</label>
                    <label>{{ $obookings->rcontact }}</label><br>
                    <label>Rs : </label><label>{{ $obookings->rent }}</label>
                    @php
                    $todaycurrent = $today->format("m/d/Y")
                    @endphp
                    @if ($obookings->pbdate < $todaycurrent) <a class="button button-icon button-primary rating-package"
                        href="#" data-toggle="modal" data-target="#ratepackage" data-pagkid="{{ $obookings->pbid }}"
                        data-prbkid="{{ $obookings->pkid }}" data-rpkimage="{{ $obookings->pkimage }}">
                        <span>Rating</span><span class="icon material-icons-chevron_right"></span></a>
                        @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
        @endif

    </section>

    @include('User.footer')
</body>

</html>
<div class="modal login" id="cancelpackage">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox">
                            <form method="post" action="/pbookcancel" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="pakgid" id="pakgid">
                                <label>Please Confirm Your Cancellation</label><br>
                                <input class="btn btn-default btn-login" type="submit" value="confirm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal login" id="ratepackage">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox">
                            <form action="/ratingpackage" method="post" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="packid" id="packid">
                                <input type="hidden" name="packagebkid" id="packagebkid">
                                <input id="ratings-hidden" name="rating" type="hidden" value="1">
                                <div class="col-md-6">
                                    <img src="" id="primagert" class="img-circle img-responsive" />
                                    {{-- <img src="" id="primagert" /> --}}
                                </div>
                                <div class="text-right">
                                    <div class="stars starrr" data-rating="1"></div>
                                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(".cancel-package").on("click", function () {
        $pakid = $(this).data("pakid");
        $("#pakgid").val($pakid);
    });
    $(".rating-package").on("click", function () {
        $pagkid = $(this).data("pagkid");
        $("#packagebkid").val($pagkid);
        $pakid1 = $(this).data("prbkid");
        $("#packid").val($pakid1);
        $primage = $(this).data("rpkimage");
        $("#primagert").attr("src", "images/package/" + $primage);
    });

</script>
<script>
    (function (e) {
        var t, o = {
                className: "autosizejs",
                append: "",
                callback: !1,
                resizeDelay: 10
            },
            i =
            '<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',
            n = ["fontFamily", "fontSize", "fontWeight", "fontStyle", "letterSpacing", "textTransform",
                "wordSpacing", "textIndent"
            ],
            s = e(i).data("autosize", !0)[0];
        s.style.lineHeight = "99px", "99px" === e(s).css("lineHeight") && n.push("lineHeight"), s.style.lineHeight =
            "", e.fn.autosize = function (i) {
                return this.length ? (i = e.extend({}, o, i || {}), s.parentNode !== document.body && e(document
                    .body).append(s), this.each(function () {
                    function o() {
                        var t, o;
                        "getComputedStyle" in window ? (t = window.getComputedStyle(u, null), o = u
                                .getBoundingClientRect().width, e.each(["paddingLeft", "paddingRight",
                                    "borderLeftWidth", "borderRightWidth"
                                ], function (e, i) {
                                    o -= parseInt(t[i], 10)
                                }), s.style.width = o + "px") : s.style.width = Math.max(p.width(), 0) +
                            "px"
                    }

                    function a() {
                        var a = {};
                        if (t = u, s.className = i.className, d = parseInt(p.css("maxHeight"), 10), e
                            .each(n, function (e, t) {
                                a[t] = p.css(t)
                            }), e(s).css(a), o(), window.chrome) {
                            var r = u.style.width;
                            u.style.width = "0px", u.offsetWidth, u.style.width = r
                        }
                    }

                    function r() {
                        var e, n;
                        t !== u ? a() : o(), s.value = u.value + i.append, s.style.overflowY = u.style
                            .overflowY, n = parseInt(u.style.height, 10), s.scrollTop = 0, s.scrollTop =
                            9e4, e = s.scrollTop, d && e > d ? (u.style.overflowY = "scroll", e = d) : (
                                u.style.overflowY = "hidden", c > e && (e = c)), e += w, n !== e && (u
                                .style.height = e + "px", f && i.callback.call(u, u))
                    }

                    function l() {
                        clearTimeout(h), h = setTimeout(function () {
                            var e = p.width();
                            e !== g && (g = e, r())
                        }, parseInt(i.resizeDelay, 10))
                    }
                    var d, c, h, u = this,
                        p = e(u),
                        w = 0,
                        f = e.isFunction(i.callback),
                        z = {
                            height: u.style.height,
                            overflow: u.style.overflow,
                            overflowY: u.style.overflowY,
                            wordWrap: u.style.wordWrap,
                            resize: u.style.resize
                        },
                        g = p.width();
                    p.data("autosize") || (p.data("autosize", !0), ("border-box" === p.css(
                            "box-sizing") || "border-box" === p.css("-moz-box-sizing") ||
                        "border-box" === p.css("-webkit-box-sizing")) && (w = p.outerHeight() -
                        p.height()), c = Math.max(parseInt(p.css("minHeight"), 10) - w || 0, p
                        .height()), p.css({
                        overflow: "hidden",
                        overflowY: "hidden",
                        wordWrap: "break-word",
                        resize: "none" === p.css("resize") || "vertical" === p.css(
                            "resize") ? "none" : "horizontal"
                    }), "onpropertychange" in u ? "oninput" in u ? p.on(
                        "input.autosize keyup.autosize", r) : p.on("propertychange.autosize",
                        function () {
                            "value" === event.propertyName && r()
                        }) : p.on("input.autosize", r), i.resizeDelay !== !1 && e(window).on(
                        "resize.autosize", l), p.on("autosize.resize", r), p.on(
                        "autosize.resizeIncludeStyle",
                        function () {
                            t = null, r()
                        }), p.on("autosize.destroy", function () {
                        t = null, clearTimeout(h), e(window).off("resize", l), p.off(
                            "autosize").off(".autosize").css(z).removeData("autosize")
                    }), r())
                })) : this
            }
    })(window.jQuery || window.$);
    var __slice = [].slice;
    (function (e, t) {
        var n;
        n = function () {
            function t(t, n) {
                var r, i, s, o = this;
                this.options = e.extend({}, this.defaults, n);
                this.$el = t;
                s = this.defaults;
                for (r in s) {
                    i = s[r];
                    if (this.$el.data(r) != null) {
                        this.options[r] = this.$el.data(r)
                    }
                }
                this.createStars();
                this.syncRating();
                this.$el.on("mouseover.starrr", "span", function (e) {
                    return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1)
                });
                this.$el.on("mouseout.starrr", function () {
                    return o.syncRating()
                });
                this.$el.on("click.starrr", "span", function (e) {
                    return o.setRating(o.$el.find("span").index(e.currentTarget) + 1)
                });
                this.$el.on("starrr:change", this.options.change)
            }
            t.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function (e, t) {}
            };
            t.prototype.createStars = function () {
                var e, t, n;
                n = [];
                for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) {
                    n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))
                }
                return n
            };
            t.prototype.setRating = function (e) {
                if (this.options.rating === e) {
                    e = void 0
                }
                this.options.rating = e;
                this.syncRating();
                return this.$el.trigger("starrr:change", e)
            };
            t.prototype.syncRating = function (e) {
                var t, n, r, i;
                e || (e = this.options.rating);
                if (e) {
                    for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) {
                        this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass(
                            "glyphicon-star")
                    }
                }
                if (e && e < 5) {
                    for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) {
                        this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass(
                            "glyphicon-star-empty")
                    }
                }
                if (!e) {
                    return this.$el.find("span").removeClass("glyphicon-star").addClass(
                        "glyphicon-star-empty")
                }
            };
            return t
        }();
        return e.fn.extend({
            starrr: function () {
                var t, r;
                r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function () {
                    var i;
                    i = e(this).data("star-rating");
                    if (!i) {
                        e(this).data("star-rating", i = new n(e(this), r))
                    }
                    if (typeof r === "string") {
                        return i[r].apply(i, t)
                    }
                })
            }
        })
    })(window.jQuery, window);
    $(function () {
        return $(".starrr").starrr()
    })
    $(function () {

        $('#new-review').autosize({
            append: "\n"
        });

        var reviewBox = $('#post-review-box');
        var newReview = $('#new-review');
        var openReviewBtn = $('#open-review-box');
        var closeReviewBtn = $('#close-review-box');
        var ratingsField = $('#ratings-hidden');

        openReviewBtn.click(function (e) {
            reviewBox.slideDown(400, function () {
                $('#new-review').trigger('autosize.resize');
                newReview.focus();
            });
            openReviewBtn.fadeOut(100);
            closeReviewBtn.show();
        });

        closeReviewBtn.click(function (e) {
            e.preventDefault();
            reviewBox.slideUp(300, function () {
                newReview.focus();
                openReviewBtn.fadeIn(200);
            });
            closeReviewBtn.hide();

        });

        $('.starrr').on('starrr:change', function (e, value) {
            ratingsField.val(value);
        });
    });

</script>
