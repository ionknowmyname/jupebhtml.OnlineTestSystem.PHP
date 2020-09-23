

window.onload = alertText;

function alertText()
{
	var alertDiv = document.createElement('div');
	alertDiv.setAttribute("id", "alert-div");
	var spanT = document.createElement('span');
	spanT.setAttribute("class", "alert-span");
	// spanT.setAttribute("class", "noPadding");
	var flashTip = document.createTextNode(' Hot:  ');
	spanT.appendChild(flashTip);
	var a = document.createElement('a');
	a.setAttribute("href", "http://www.jambcbttest.com/exam/");
	var aText = document.createTextNode(' FREE CBT Practice for your 2017/2018 JAMB UTME here ');
	a.appendChild(aText);
	alertDiv.appendChild(spanT);
	alertDiv.appendChild(a);


	var container = document.getElementById('sW');
	container.insertBefore(alertDiv, container.childNodes[0]);
}


function _(e) {
    return document.getElementById(e)
}

function toggleElement(e) {
    var e = _(e);
    e.style.display = "block" == e.style.display ? "none" : "block"
}

function localUrl() {
    document.getElementById("forJSUrl").value;
    return "http://www.jambcbttest.com"
}

function restrict(e) {
    var n = _(e),
        t = new RegExp;
    "emailReg" == e ? t = /[' "]/gi : "username" == e && (t = /[^a-z0-9]/gi), n.value = n.value.replace(t, "")
}

function emptyElement(e) {
    _(e).value = "", _("statusReg").style.display = "none"
}

function cleanStatus() {
    _("statusReg").style.display = "none"
}

function checkusername() {
    var e = _("username").value;
    if ("" != e) {
        _("unamestatus").innerHTML = "Checking ...";
        var n = ajaxParser("POST", localUrl() + "/ajax_check_username.php");
        n.onreadystatechange = function() {
            1 == ajaxReturn(n) && (_("unamestatus").innerHTML = n.responseText)
        }, n.send("usernamecheck=" + e)
    }
}

function signup() {
    var e = _("fname").value,
        n = _("username").value,
        t = _("emailReg").value,
        a = _("passwordReg").value,
        l = _("statusReg"),
        s = _("signupbtn");
    if (1 == s.disabled, "" == e || "" == n || "" == t || "" == a) 0 == s.disabled, l.style.display = "block", l.innerHTML = "Fill out all of the form data";
    else {
        1 == s.disabled, s.className = "btnStyleClicked";
        var i = ajaxParser("POST", localUrl() + "/php_register.php");
        i.onreadystatechange = function() {
            1 == ajaxReturn(i) && ("signup_success" != i.responseText ? (l.style.display = "block", l.innerHTML = i.responseText) : "signup_success" == i.responseText && (window.scrollTo(0, 0), _("register_form").innerHTML = '<div id="confirmationMsg"><span id="ch"><u><h2>ONE LAST STEP</h2></u></span><h2>Hi ' + n.toUpperCase() + ",</h2><h2><u>Confirm your email</u></h2>A confirmation link has been sent to your email inbox at <u>" + t + '</u>.<br /> <span><h3>Note:</h3></span> Incase you don\'t find the link in you inbox, check your junk or spam messages. <br /><br />See you on the website!!! <br />The jambcbttest Team. <br /><a href="http://www.jambcbttest.com">jambcbttest</a></div>'))
        }, i.send("u=" + n + "&f=" + e + "&e=" + t + "&p=" + a)
    }
}

function logmein() {
    var e = _("loginName").value,
        n = _("loginPass").value,
        t = _("status"),
        a = _("login"),
        l = _("loginBtn");
    if ("" == e || "" == n) a.addClass("lo");
    else {
        1 == l.disabled, l.className = "btnStyleClicked", t.style.display = "block", t.innerHTML = "Please wait ...";
        var s = ajaxParser("POST", localUrl() + "/php_login.php?ref=" + uip + "&taken=" + urlpath);
        s.onreadystatechange = function() {
            1 == ajaxReturn(s) && ("login_failed" != s.responseText ? window.location = s.responseText : (t.style.display = "block", t.innerHTML = "Login unsuccessful, please try again.", l.className = "btnStyle"))
        }, s.send("lu=" + lu + "&lp=" + lp + "&uip=" + uip + "&urlpath=" + urlpath)
    }
}

function bold() {
    alert("OK");
    var e = window.getSelection(),
        n = "<span>" + e + "</span";
    return n
}

function commentPost(e, n) {
    var t = _("comment").value,
        a = _("loginCName").value,
        l = _("loginCPass").value,
        s = _("userLoginStat"),
        i = _("loginBtn"),
        r = _("guestName").value,
        o = _("guestEmail").value,
        c = _("guestLoginStat"),
        d = _("guestloginBtn"),
        u = _("urlpath").value;
    if ("user" == e)
        if ("" == t) s.style.display = "block", s.innerHTML = '<div class="err">Comment field is empty</div>';
        else if ("" == a || "" == l) s.style.display = "block", s.innerHTML = '<div class="err">Fill in the empty fields</div>';
    else {
        s.style.display = "block", s.innerHTML = '<div class="suc">Please wait...</div>', 1 == i.disabled;
        var p = ajaxParser("POST", localUrl() + "/core/login.php");
        p.onreadystatechange = function() {
            if (1 == ajaxReturn(p))
                if ("empty_fields" == p.responseText) s.style.display = "block", s.innerHTML = '<div class="err">Fill out the empty fields</div>';
                else if ("comment_empty" == p.responseText) s.style.display = "block", s.innerHTML = '<div class="err">Comment field is empty</div>';
            else if ("login_error" == p.responseText) s.style.display = "block", s.innerHTML = '<div class="err">Login error. Try again</div>';
            else {
                var e = document.createElement("div");
                e.setAttribute("class", "all_responses");
                var n = document.createElement("div");
                n.setAttribute("class", "response_top_div");
                var l = document.createElement("div"),
                    i = document.createTextNode("By: " + a + " . Date: Just now");
                n.appendChild(i), l.setAttribute("class", "response_div"), t = t.replace(/\\n/g, "<br />");
                var r = document.createTextNode(t);
                l.appendChild(r), e.appendChild(n), e.appendChild(l), _("comment").value = "", s.innerHTML = "", s.style.display = "none";
                var o = _("responseWrap");
                o.insertBefore(e, o.childNodes[0]), _("commentform").reset(), window.location = u + "#responseWrap"
            }
        }, p.send("user=" + a + "&pass=" + l + "&comment=" + t + "&url=" + u + "&type=" + e + "&page=" + n)
    } else if ("guest" == e)
        if ("" == t) c.style.display = "block", c.innerHTML = '<div class="err">Comment field is empty</div>';
        else if ("" == r || "" == o) c.style.display = "block", c.innerHTML = '<div class="err">Fill in the empty fields</div>';
    else {
        c.style.display = "block", c.innerHTML = '<div class="suc">Please wait...</div>', 1 == d.disabled;
        var p = ajaxParser("POST", localUrl() + "/core/login.php");
        p.onreadystatechange = function() {
            1 == ajaxReturn(p) && ("comment_success" != p.responseText ? (c.style.display = "block", c.innerHTML = '<div class="err">' + p.responseText + "</div>") : "comment_success" == p.responseText && (_("comment").value = "", c.style.display = "block", c.innerHTML = '<div class="suc">Follow the link in your mail to complete your registration</div>'))
        }, p.send("guestUser=" + r + "&guestEmail=" + o + "&comment=" + t + "&url=" + u + "&type=" + e + "&page=" + n)
    }
}

function toggleCP() {
    var e = document.getElementById("cp");
    e.style.height = window.innerHeight - 60 + "px", e.style.display = "none" == e.style.display || "" == e.style.display ? "block" : "none"
}

function renderGrid() {
    var e, n, t = _("news").children,
        a = 6,
        l = window.innerWidth;
    if (l > 1094) var s = 3;
    else s = l > 480 ? 2 : 1;
    for (var i = 1; i < t.length; i++) i % s == 0 ? (n = t[i - s].offsetTop + t[i - s].offsetHeight + a, t[i].style.top = n + "px") : (t[i - s] && (n = t[i - s].offsetTop + t[i - s].offsetHeight + a, t[i].style.top = n + "px"), e = t[i - 1].offsetLeft + t[i - 1].offsetWidth + a, t[i].style.left = e + "px")
}

function linkedWithin() {}

function wrapText(e, n, t) {
    var a = document.getElementById(e),
        l = a.value.length,
        s = a.selectionStart,
        i = a.selectionEnd,
        r = a.value.substring(s, i),
        o = n + r + t;
    a.value = a.value.substring(0, s) + o + a.value.substring(i, l), a.focus(), a.selectionStart = a.selectionEnd = i + n.length + t.length
}

function addText(e, n) {
    var t = document.getElementById(e),
        a = t.value.length,
        l = t.selectionEnd;
    t.value = t.value.substring(0, l) + n + t.value.substring(l, a), t.focus(), t.selectionStart = t.selectionEnd = l + n.length
}

function toEnd(e) {
    var n = document.getElementById(e);
    n.focus(), n.selectionStart = n.selectionEnd = n.value.length
}

function modalBox(e) {
    var n = _(e);
    n.style.display = "block"
}

function closeup(e) {
    var n = _(e);
    n.style.display = "none"
}

function giveCard() {
    var e = _("mail").value,
        n = (_("cardBtn").value, _("status"));
    if ("" == e) n.innerHTML = "Fill in your email";
    else {
        _("cardBtn").value = "Sending card";
        var t = ajaxParser("POST", localUrl() + "/core/complimentaryCards.php");
        t.onreadystatechange = function() {
            1 == ajaxReturn(t) && ("error_sending" == t.responseText ? (n.innerHTML = "An error occured. Please try again.", _("cardBtn").value = "Get card") : (_("mail").value = "", n.innerHTML = "Your Card has been sent to your email", _("cardBtn").value = "Get card"))
        }, t.send("mail=" + e)
    }
}

function selectSbj() {
    var e = _("selectSbj").value,
        n = _("sbjShow"),
        t = localUrl() + "/syllabus/" + e + ".txt";
    if ("" == e) alert("Select a subject!");
    else {
        n.innerHTML = '<img src="' + localUrl() + '/core/imgs/loading_rolling.gif" alt="jambcbttest.com loading" />';
        var a = ajaxParser("GET", t);
        a.onreadystatechange = function() {
            1 == ajaxReturn(a) && (n.innerHTML = "<pre>" + a.responseText + "</pre>")
        }, a.send(null)
    }
}

function DownloadExamApp() {
    var e = localUrl() + "/core/addDwnldParse.php",
        n = ajaxParser("POST", e);
    n.onreadystatechange = function() {
        1 == ajaxReturn(n) && (window.location = localUrl() + "/core/resources/_JAMB_CBT_KIT.apk")
    }, n.send(null)
}

function likeItem(e, n, t, a, l, s, i) {
    "" != i && window.open(i, "", "width=700, height=700");
    var r = _(s),
        l = _(l);
    r.innerHTML = '<img src="' + localUrl() + '/core/imgs/loading1.gif" alt="loading" />';
    var o = ajaxParser("POST", localUrl() + "/php/likeParse.php");
    o.onreadystatechange = function() {
        if (1 == ajaxReturn(o)) {
            var e = o.responseText.split("|");
            "success" != e[0] ? (l.innerHTML = e[0], r.innerHTML = e[1]) : r.innerHTML = e[1]
        }
    }, o.send("page=" + e + "&thread=" + n + "&type=" + t + "&reaction=" + a)
}

function createReplyArea(e, n, t) {
    var a = _("reply_" + n),
        l = _("activity_" + n),
        s = document.createElement("div");
    s.setAttribute("id", "holderDiv_" + n);
    var i = document.createElement("input");
    i.setAttribute("type", "text"), i.setAttribute("id", "input_" + n), i.className = "width50 floatLeft pad01";
    var r = document.createElement("button");
    r.setAttribute("id", "btn_" + n), r.className = "floatLeft pad01", r.setAttribute("onClick", "replyThread('" + e + "', '" + n + "', 'c', '" + t + "');");
    var o = document.createTextNode("Post");
    r.appendChild(o);
    var c = document.createElement("div");
    c.className = "clearer", a.className = "displaynone", s.appendChild(i), s.appendChild(r), s.appendChild(c), l.insertBefore(s, l.childNodes[0])
}

function replyThread(e, n, t, a) {
    var l = _("input_" + n).value,
        s = _("btn_" + n);
    s.disabled, s.innerHTML = '<img src="' + localUrl() + '/core/imgs/loading1.gif" alt="loading" />';
    var i = ajaxParser("POST", localUrl() + "/php/commentParse.php");
    i.onreadystatechange = function() {
        if (1 == ajaxReturn(i)) {
            var e = i.responseText.split("|");
            "success" == e[0] ? (_("last_cmt_" + n).innerHTML = JSON.parse(e[1]), s.innerHTML = "Post", _("input_" + n).value = "") : (s.innerHTML = "Post", alert(e[0]))
        }
    }, i.send("page=" + e + "&commentText=" + l + "&thread=" + n + "&type=" + t + "&url=" + a)
}
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i)
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i)
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i)
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i)
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i)
    },
    any: function() {
        return isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()
    }
};