/* 
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-8 12:50:59
 */
document.writeln("<style>");
document.writeln(".date-picker-wp {");
document.writeln("	display:none;");
document.writeln("	position:absolute;");
document.writeln("	background:#f1f1f1;");
document.writeln("	left:40px;");
document.writeln("	top:40px;");
document.writeln("	border-top:4px solid #3879d9;");
document.writeln("}");
document.writeln(".date-picker-wp table {");
document.writeln("	border:1px solid #ddd;");
document.writeln("}");
document.writeln(".date-picker-wp td {");
document.writeln("	background:#fafafa;");
document.writeln("	width:22px;");
document.writeln("	height:18px;");
document.writeln("	border:1px solid #ccc;");
document.writeln("	font-size:12px;");
document.writeln("	text-align:center;");
document.writeln("}");
document.writeln(".date-picker-wp td.noborder {");
document.writeln("	border:none;");
document.writeln("	background:none;");
document.writeln("}");
document.writeln(".date-picker-wp td a {");
document.writeln("	color:#1c93c4;");
document.writeln("	text-decoration:none;");
document.writeln("}");
document.writeln(".strong {");
document.writeln("	font-weight:bold");
document.writeln("}");
document.writeln(".hand {");
document.writeln("	cursor:pointer;");
document.writeln("	color:#3879d9");
document.writeln("}");
document.writeln("</style>");
var DatePicker = function() {
    var $ = function(i) {
        return document.getElementById(i)
    },
    addEvent = function(o, e, f) {
        o.addEventListener ? o.addEventListener(e, f, false) : o.attachEvent('on' + e,
        function() {
            f.call(o)
        })
    },
    getPos = function(el) {
        for (var pos = {
            x: 0,
            y: 0
        }; el; el = el.offsetParent) {
            pos.x += el.offsetLeft;
            pos.y += el.offsetTop
        }
        return pos
    }
    var init = function(n, config) {
        window[n] = this;
        Date.prototype._fd = function() {
            var d = new Date(this);
            d.setDate(1);
            return d.getDay()
        };
        Date.prototype._fc = function() {
            var d1 = new Date(this),
            d2 = new Date(this);
            d1.setDate(1);
            d2.setDate(1);
            d2.setMonth(d2.getMonth() + 1);
            return (d2 - d1) / 86400000
        };
        this.n = n;
        this.config = config;
        this.D = new Date;
        this.el = $(config.inputId);
        this.el.title = this.n + 'DatePicker';
        this.update();
        this.bind()
    }
    init.prototype = {
        update: function(y, m) {
            var con = [],
            week = ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            D = this.D,
            _this = this;
            fn = function(a, b) {
                return '<td title="' + _this.n + 'DatePicker" class="noborder hand" onclick="' + _this.n + '.update(' + a + ')">' + b + '</td>'
            },
            _html = '<table cellpadding=0 cellspacing=2>';
            y && D.setYear(D.getFullYear() + y);
            m && D.setMonth(D.getMonth() + m);
            var year = D.getFullYear(),
            month = D.getMonth() + 1,
            date = D.getDate();
            for (var i = 0; i < week.length; i++) con.push('<td title="' + this.n + 'DatePicker" class="noborder">' + week[i] + '</td>');
            for (var i = 0; i < D._fd(); i++) con.push('<td title="' + this.n + 'DatePicker" class="noborder"> </td>');
            for (var i = 0; i < D._fc(); i++) con.push('<td class="hand" onclick="' + this.n + '.fillInput(' + year + ', ' + month + ', ' + (i + 1) + ')">' + (i + 1) + '</td>');
            var toend = con.length % 7;
            if (toend != 0) for (var i = 0; i < 7 - toend; i++) con.push('<td class="noborder"> </td>');
            _html += '<tr>' + fn("-1, null", "<<") + fn("null, -1", "<") + '<td title="' + this.n + 'DatePicker" colspan=3 class="strong">' + year + '/' + month + '/' + date + '</td>' + fn("null, 1", ">") + fn("1, null", ">>") + '</tr>';
            for (var i = 0; i < con.length; i++) _html += (i == 0 ? '<tr>': i % 7 == 0 ? '</tr><tr>': '') + con[i] + (i == con.length - 1 ? '</tr>': ''); !! this.box ? this.box.innerHTML = _html: this.createBox(_html)
        },
        fillInput: function(y, m, d) {
            var s = this.config.seprator || '/';
            this.el.value = y + s + m + s + d;
            this.box.style.display = 'none'
        },
        show: function() {
            var s = this.box.style,
            is = this.mask.style;
            s['left'] = is['left'] = getPos(this.el).x + 'px';
            s['top'] = is['top'] = getPos(this.el).y + this.el.offsetHeight + 'px';
            s['display'] = is['display'] = 'block';
            is['width'] = this.box.offsetWidth - 2 + 'px';
            is['height'] = this.box.offsetHeight - 2 + 'px'
        },
        hide: function() {
            this.box.style.display = 'none';
            this.mask.style.display = 'none'
        },
        bind: function() {
            var _this = this;
            addEvent(document, 'click',
            function(e) {
                e = e || window.event;
                var t = e.target || e.srcElement;
                if (t.title != _this.n + 'DatePicker') {
                    _this.hide()
                } else {
                    _this.show()
                }
            })
        },
        createBox: function(html) {
            var box = this.box = document.createElement('div'),
            mask = this.mask = document.createElement('iframe');
            box.className = this.config.className || 'datepicker';
            mask.src = 'javascript:false';
            mask.frameBorder = 0;
            box.style.cssText = 'position:absolute;display:none;z-index:9999';
            mask.style.cssText = 'position:absolute;display:none;z-index:9998';
            box.title = this.n + 'DatePicker';
            box.innerHTML = html;
            document.body.appendChild(box);
            document.body.appendChild(mask);
            return box
        }
    }
    return init
} ();

onload = function() {
    new DatePicker('_DatePicker_demo', {
        inputId: 'date-input',
        className: 'date-picker-wp',
        seprator: '-'
    });
}