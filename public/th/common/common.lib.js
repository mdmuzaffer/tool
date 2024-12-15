(function ($) {
	window.QueryStringToJSON = function QueryStringToJSON(queryString) {
		var pairs = queryString.split('&');
		var result = {};
		pairs.forEach(function (pair) {
			pair = pair.split('=');
			result[pair[0]] = decodeURIComponent(pair[1] || '');
		});
		return JSON.parse(JSON.stringify(result));
	};

})(jQuery);

var RSCOM = {
	ErrorMsgCodes: [{
		N: "ERRBACK",
		V: "Error"
	}]
}
var RSLib = {
	BindToDrop: function (data, binder) {

	}
};

function isEmpty(v) {
	return (v == "" || v == null);
}

function CheckStatForError(Str) {
	return _(RSCOM.ErrorMsgCodes.map(v => v.N)).contains(Str);
}


window.BSLib = {
	getABasicModal: function () {
		var intStruct = '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button class="close" data-dismiss="modal" type="button">&times;</button><h4 class="modal-title">Modal Header</h4></div><div class="modal-body">Modal Body</div><div class="modal-footer"><button class="btn btn-default" data-dismiss="modal" type="button">Close</button></div></div></div>';
		var $o = $('<div  class="modal fade" role="dialog"/>').append(intStruct);

		return $o;
	},
	ConfirmModal: function (Options) {
		var Opt = {
			title: "",
			yesText: "Ok",
			NoText: "Cancel",
			autoOpen: true,
			destroyOnHide: true,
			onYes: function () {

			},
			onNo: function () {

			},
			show: function () {

			},
			hide: function () {

			},
			shown: function () {

			},
			hidden: function () {

			},
			loaded: function () {

			}
		};
		var LOpt = Object.assign({}, Opt, Options);
		var intStruct = '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button class="close" data-dismiss="modal" type="button" btn="no" >&times;</button><h4 class="modal-title">Confirmation!!</h4></div><div class="modal-body">Modal Body</div><div class="modal-footer"><button class="btn btn-default dark" type="button" btn="ok"  data-dismiss="modal" yes-btn="1">Ok</button><button class="btn dark btn-outline" data-dismiss="modal" type="button" btn="no" no-btn="1">Close</button></div></div></div>';
		var $o = $('<div  class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static"/>').append(intStruct);

		$o.find(".modal-body").empty().append(LOpt.title);
		//BindEvents
		$o.bind('show.bs.modal', LOpt.show)
			.bind('shown.bs.modal', LOpt.shown)
			.bind('hide.bs.modal', LOpt.hide)
			.bind('hidden.bs.modal', LOpt.hidden)
			.bind('hidden.bs.modal', function () {
				if (LOpt.destroyOnHide) $o.remove();
			})
			.bind('loaded.bs.modal', LOpt.loaded);

		$($o).modal({
			show: false
		});
		//$o.bind("hidden.bs.modal", cbNo);

		//$o.find("[btn='ok']").click(LOpt.onYes);
		//$o.find("[btn='no']").click(LOpt.onNo);
		$o.find("[yes-btn]").text(LOpt.yesText);
		$o.find("[no-btn]").text(LOpt.NoText);
		$o.find("[btn='ok']").click(function (e) {
			LOpt.onYes.apply($o, [].concat(e));
		});
		$o.find("[btn='no']").click(function (e) {
			LOpt.onNo.apply($o, [].concat(e));
			$o.modal('hide');
		});
		if (Opt.autoOpen) {
			$o.modal('show');
		}
		return $o;
	},
	showNotif: function (msg, type) {
		type = type || "success";
		$.notify(msg, type);
	},
	showMsg: function (msg, Err, duration) {

		//Null = Success, true = Failure, false = warning,default = warning
		//Err = Err || null;
		duration = duration || 3000;
		var tyClass = "info";
		if (typeof Err != "string") {
			if (Err == null) {
				tyClass = 'success';
			} else if (Err === true) {
				tyClass = 'error';
			} else if (Err === false) {
				tyClass = 'warn';
			}
		} else {
			tyClass = Err;
		}
		$.notify(msg, {
			className: tyClass,
			// style: 'bootstrap',
			autoHideDelay: duration,
		});
		// $.notify(msg, tyClass);
		//
		// $.notify({
		// 	title: "hi",
		//     text: msg,
		//     image:$("<img/>")
		// }, {
		// 	className: tyClass,
		// 	style: 'metro',
		// 	autoHideDelay: duration,
		// });
		///msgCont.
	}

};

window.showNotif = BSLib.showNotif;
window.showMsg = BSLib.showMsg;





/**
    Bootsrap Modal Extended
**/

$.fn.BSModal = function (a, b, c) {
	var op = {
		appendTo: "body",
		autoOpen: true,
		buttons: [],
		classes: {
			//"ui-dialog": "ui-corner-all",
			//"ui-dialog-titlebar": "ui-corner-all"
		},
		closeOnEscape: true,
		closeText: "Close",
		draggable: true,
		hide: null,
		height: "auto",
		maxHeight: null,
		maxWidth: null,
		minHeight: 150,
		minWidth: 150,
		modal: false,
		position: {
			my: "center",
			at: "center",
			of: window,
			collision: "fit",

			// Ensure the titlebar is always visible
			using: function (pos) {
				var topOffset = $(this).css(pos).offset().top;
				if (topOffset < 0) {
					$(this).css("top", pos.top - topOffset);
				}
			}
		},
		resizable: true,
		show: null,
		title: null,
		width: 300,

		// Callbacks
		beforeClose: null,
		close: null,
		drag: null,
		dragStart: null,
		dragStop: null,
		focus: null,
		open: null,
		resize: null,
		resizeStart: null,
		resizeStop: null
	};
	var aT = $.type(a);
	var $widget = BSLib.getABasicModal();
	switch (aT) {
		case "object":
	}
}


/***
Dates Defaults
***/
var comN = {
	Dates: {
		StartingYear: 2010,
		EndingYear: new Date().getFullYear() + 1
	}
};

// String.prototype.TryParseInt = function (defaultValue) {
// 	var f = this;
// 	try {
// 		f = parseInt(f);
// 		if (isNaN(f)) {
// 			f = defaultValue === undefined ? 0 : defaultValue
// 		}
// 	} catch (e) {

// 		f = defaultValue === undefined ? 0 : defaultValue;
// 	}
// 	return f;
// }
// String.prototype.TryParseFloat = function (defaultValue) {
// 	var f = this;
// 	try {
// 		f = parseFloat(f);
// 		if (isNaN(f)) {
// 			f = defaultValue === undefined ? 0.00 : defaultValue
// 		}
// 	} catch (e) {

// 		f = defaultValue === undefined ? 0.00 : defaultValue;
// 	}
// 	return f;
// }



(function ($) {
	if ($ && $.notify) {
		$.notify.addStyle("bootstrap", {
			html: "<div>\n<span data-notify-text></span>\n</div>",
			classes: {
				base: {
					"font-weight": "bold",
					"padding": "8px 15px 8px 14px",
					"text-shadow": "0 1px 0 rgba(255, 255, 255, 0.5)",
					"background-color": "#fcf8e3",
					"border": "1px solid #fbeed5",
					"border-radius": "0px",
					"white-space": "nowrap",
					"padding-left": "25px",
					"background-repeat": "no-repeat",
					"background-position": "3px 7px"
				},
				error: {
					"color": "#B94A48",
					"background-color": "#F2DEDE",
					"border-color": "#EED3D7",
					"background-image": "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAtRJREFUeNqkVc1u00AQHq+dOD+0poIQfkIjalW0SEGqRMuRnHos3DjwAH0ArlyQeANOOSMeAA5VjyBxKBQhgSpVUKKQNGloFdw4cWw2jtfMOna6JOUArDTazXi/b3dm55socPqQhFka++aHBsI8GsopRJERNFlY88FCEk9Yiwf8RhgRyaHFQpPHCDmZG5oX2ui2yilkcTT1AcDsbYC1NMAyOi7zTX2Agx7A9luAl88BauiiQ/cJaZQfIpAlngDcvZZMrl8vFPK5+XktrWlx3/ehZ5r9+t6e+WVnp1pxnNIjgBe4/6dAysQc8dsmHwPcW9C0h3fW1hans1ltwJhy0GxK7XZbUlMp5Ww2eyan6+ft/f2FAqXGK4CvQk5HueFz7D6GOZtIrK+srupdx1GRBBqNBtzc2AiMr7nPplRdKhb1q6q6zjFhrklEFOUutoQ50xcX86ZlqaZpQrfbBdu2R6/G19zX6XSgh6RX5ubyHCM8nqSID6ICrGiZjGYYxojEsiw4PDwMSL5VKsC8Yf4VRYFzMzMaxwjlJSlCyAQ9l0CW44PBADzXhe7xMdi9HtTrdYjFYkDQL0cn4Xdq2/EAE+InCnvADTf2eah4Sx9vExQjkqXT6aAERICMewd/UAp/IeYANM2joxt+q5VI+ieq2i0Wg3l6DNzHwTERPgo1ko7XBXj3vdlsT2F+UuhIhYkp7u7CarkcrFOCtR3H5JiwbAIeImjT/YQKKBtGjRFCU5IUgFRe7fF4cCNVIPMYo3VKqxwjyNAXNepuopyqnld602qVsfRpEkkz+GFL1wPj6ySXBpJtWVa5xlhpcyhBNwpZHmtX8AGgfIExo0ZpzkWVTBGiXCSEaHh62/PoR0p/vHaczxXGnj4bSo+G78lELU80h1uogBwWLf5YlsPmgDEd4M236xjm+8nm4IuE/9u+/PH2JXZfbwz4zw1WbO+SQPpXfwG/BBgAhCNZiSb/pOQAAAAASUVORK5CYII=)"
				},
				success: {
					"color": "#468847",
					"background-color": "#DFF0D8",
					"border-color": "#D6E9C6",
					"background-image": "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAutJREFUeNq0lctPE0Ecx38zu/RFS1EryqtgJFA08YCiMZIAQQ4eRG8eDGdPJiYeTIwHTfwPiAcvXIwXLwoXPaDxkWgQ6islKlJLSQWLUraPLTv7Gme32zoF9KSTfLO7v53vZ3d/M7/fIth+IO6INt2jjoA7bjHCJoAlzCRw59YwHYjBnfMPqAKWQYKjGkfCJqAF0xwZjipQtA3MxeSG87VhOOYegVrUCy7UZM9S6TLIdAamySTclZdYhFhRHloGYg7mgZv1Zzztvgud7V1tbQ2twYA34LJmF4p5dXF1KTufnE+SxeJtuCZNsLDCQU0+RyKTF27Unw101l8e6hns3u0PBalORVVVkcaEKBJDgV3+cGM4tKKmI+ohlIGnygKX00rSBfszz/n2uXv81wd6+rt1orsZCHRdr1Imk2F2Kob3hutSxW8thsd8AXNaln9D7CTfA6O+0UgkMuwVvEFFUbbAcrkcTA8+AtOk8E6KiQiDmMFSDqZItAzEVQviRkdDdaFgPp8HSZKAEAL5Qh7Sq2lIJBJwv2scUqkUnKoZgNhcDKhKg5aH+1IkcouCAdFGAQsuWZYhOjwFHQ96oagWgRoUov1T9kRBEODAwxM2QtEUl+Wp+Ln9VRo6BcMw4ErHRYjH4/B26AlQoQQTRdHWwcd9AH57+UAXddvDD37DmrBBV34WfqiXPl61g+vr6xA9zsGeM9gOdsNXkgpEtTwVvwOklXLKm6+/p5ezwk4B+j6droBs2CsGa/gNs6RIxazl4Tc25mpTgw/apPR1LYlNRFAzgsOxkyXYLIM1V8NMwyAkJSctD1eGVKiq5wWjSPdjmeTkiKvVW4f2YPHWl3GAVq6ymcyCTgovM3FzyRiDe2TaKcEKsLpJvNHjZgPNqEtyi6mZIm4SRFyLMUsONSSdkPeFtY1n0mczoY3BHTLhwPRy9/lzcziCw9ACI+yql0VLzcGAZbYSM5CCSZg1/9oc/nn7+i8N9p/8An4JMADxhH+xHfuiKwAAAABJRU5ErkJggg==)"
				},
				info: {
					"color": "#3A87AD",
					"background-color": "#D9EDF7",
					"border-color": "#BCE8F1",
					"background-image": "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QYFAhkSsdes/QAAA8dJREFUOMvVlGtMW2UYx//POaWHXg6lLaW0ypAtw1UCgbniNOLcVOLmAjHZolOYlxmTGXVZdAnRfXQm+7SoU4mXaOaiZsEpC9FkiQs6Z6bdCnNYruM6KNBw6YWewzl9z+sHImEWv+vz7XmT95f/+3/+7wP814v+efDOV3/SoX3lHAA+6ODeUFfMfjOWMADgdk+eEKz0pF7aQdMAcOKLLjrcVMVX3xdWN29/GhYP7SvnP0cWfS8caSkfHZsPE9Fgnt02JNutQ0QYHB2dDz9/pKX8QjjuO9xUxd/66HdxTeCHZ3rojQObGQBcuNjfplkD3b19Y/6MrimSaKgSMmpGU5WevmE/swa6Oy73tQHA0Rdr2Mmv/6A1n9w9suQ7097Z9lM4FlTgTDrzZTu4StXVfpiI48rVcUDM5cmEksrFnHxfpTtU/3BFQzCQF/2bYVoNbH7zmItbSoMj40JSzmMyX5qDvriA7QdrIIpA+3cdsMpu0nXI8cV0MtKXCPZev+gCEM1S2NHPvWfP/hL+7FSr3+0p5RBEyhEN5JCKYr8XnASMT0xBNyzQGQeI8fjsGD39RMPk7se2bd5ZtTyoFYXftF6y37gx7NeUtJJOTFlAHDZLDuILU3j3+H5oOrD3yWbIztugaAzgnBKJuBLpGfQrS8wO4FZgV+c1IxaLgWVU0tMLEETCos4xMzEIv9cJXQcyagIwigDGwJgOAtHAwAhisQUjy0ORGERiELgG4iakkzo4MYAxcM5hAMi1WWG1yYCJIcMUaBkVRLdGeSU2995TLWzcUAzONJ7J6FBVBYIggMzmFbvdBV44Corg8vjhzC+EJEl8U1kJtgYrhCzgc/vvTwXKSib1paRFVRVORDAJAsw5FuTaJEhWM2SHB3mOAlhkNxwuLzeJsGwqWzf5TFNdKgtY5qHp6ZFf67Y/sAVadCaVY5YACDDb3Oi4NIjLnWMw2QthCBIsVhsUTU9tvXsjeq9+X1d75/KEs4LNOfcdf/+HthMnvwxOD0wmHaXr7ZItn2wuH2SnBzbZAbPJwpPx+VQuzcm7dgRCB57a1uBzUDRL4bfnI0RE0eaXd9W89mpjqHZnUI5Hh2l2dkZZUhOqpi2qSmpOmZ64Tuu9qlz/SEXo6MEHa3wOip46F1n7633eekV8ds8Wxjn37Wl63VVa+ej5oeEZ/82ZBETJjpJ1Rbij2D3Z/1trXUvLsblCK0XfOx0SX2kMsn9dX+d+7Kf6h8o4AIykuffjT8L20LU+w4AZd5VvEPY+XpWqLV327HR7DzXuDnD8r+ovkBehJ8i+y8YAAAAASUVORK5CYII=)"
				},
				warn: {
					"color": "#C09853",
					"background-color": "#FCF8E3",
					"border-color": "#FBEED5",
					"background-image": "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABJlBMVEXr6eb/2oD/wi7/xjr/0mP/ykf/tQD/vBj/3o7/uQ//vyL/twebhgD/4pzX1K3z8e349vK6tHCilCWbiQymn0jGworr6dXQza3HxcKkn1vWvV/5uRfk4dXZ1bD18+/52YebiAmyr5S9mhCzrWq5t6ufjRH54aLs0oS+qD751XqPhAybhwXsujG3sm+Zk0PTwG6Shg+PhhObhwOPgQL4zV2nlyrf27uLfgCPhRHu7OmLgAafkyiWkD3l49ibiAfTs0C+lgCniwD4sgDJxqOilzDWowWFfAH08uebig6qpFHBvH/aw26FfQTQzsvy8OyEfz20r3jAvaKbhgG9q0nc2LbZxXanoUu/u5WSggCtp1anpJKdmFz/zlX/1nGJiYmuq5Dx7+sAAADoPUZSAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfdBgUBGhh4aah5AAAAlklEQVQY02NgoBIIE8EUcwn1FkIXM1Tj5dDUQhPU502Mi7XXQxGz5uVIjGOJUUUW81HnYEyMi2HVcUOICQZzMMYmxrEyMylJwgUt5BljWRLjmJm4pI1hYp5SQLGYxDgmLnZOVxuooClIDKgXKMbN5ggV1ACLJcaBxNgcoiGCBiZwdWxOETBDrTyEFey0jYJ4eHjMGWgEAIpRFRCUt08qAAAAAElFTkSuQmCC)"
				}
			}
		});
	}
})(jQuery);


(function ($) {
	// // //--------------- // //.btn-group[data-toggle="buttons"]

	// $(document).change($('.btn-group[data-toggle="buttons"]').find('input:radio,input:checkbox'), function (e) {
	// 	BS_Btn_Grp_Radio_Chkbx_Chng.apply(e.target,Array.from(arguments));
	// })
	$.fn.BSBtnGroupInputRefresh = function () {
		var grp = $(this);
		if (grp.hasClass('btn-group') && grp.attr("data-toggle") == "buttons") {

			grp.find('input:checkbox:not(:checked),input:radio:not(:checked)').each(function (inx, dta) {
				var lbls = $(dta).parents('label').first();
				// console.log('notActive', lbls);
				lbls.removeClass('active');
			});
			grp.find('input:checkbox:checked,input:radio:checked').each(function (inx, dta) {
				var lbls = $(dta).parents('label').first();
				// console.log('notActive', lbls);
				lbls.addClass('active');
			});
		}
	};
})(jQuery);

Array.prototype.DelEmptyElement = function (a) {
	a = [].concat(a || []);
	var b = [];
	if (0 < a.length)
		for (i = 0; i < this.length; i++)
			for (j = 0; j < a.length; j++) this[i] !== a[j] && b.push(this[i]);
	else
		for (i = 0; i < this.length; i++) null !== this[i] && void 0 !== this[i] && "" !== this[i] && b.push(this[i]);
	return b
};
String.prototype.toNumber = function () {
	return Number(this)
};
String.prototype.toNumberInt = function () {
	return parseInt(this)
};
String.prototype.toNumberFloat = function () {
	return parseFloat(this)
};
String.prototype.Format = function () {
	var a = Array.from(arguments),
		b = this.toString();
	return a.forEach(function (a, d) {
		b = b.replace(RegExp("(\\{" + d + "\\})", "g"), a == null ? "" : a.toString())
	}), (new String(b)).toString()
};
String.prototype.TryParseInt = function (a) {
	var b = this;
	try {
		b = parseInt(b), isNaN(b) && (b = void 0 === a ? 0 : a)
	} catch (c) {
		b = void 0 === a ? 0 : a
	}
	return b
};
String.prototype.TryParseFloat = function (a) {
	var b = this;
	try {
		b = parseFloat(b), isNaN(b) && (b = void 0 === a ? 0 : a)
	} catch (c) {
		b = void 0 === a ? 0 : a
	}
	return b
};
window.GetNewGUID = function () {
	function a() {
		return Math.floor(65536 * (1 + Math.random())).toString(16).substring(1)
	}
	return a() + a() + "-" + a() + "-" + a() + "-" + a() + "-" + a() + a() + a()
};
Number.prototype.TryParseInt = function (a) { var b = this; try { b = parseInt(b), isNaN(b) && (b = void 0 === a ? 0 : a) } catch (c) { b = void 0 === a ? 0 : a } return b }; 
Number.prototype.TryParseFloat = function (a) { var b = this; try { b = parseFloat(b), isNaN(b) && (b = void 0 === a ? 0 : a) } catch (c) { b = void 0 === a ? 0 : a } return b };
window.T12to24Sec = function (T) {
	if (T == "") return "";
	var m = moment(T, 'hh:mm:ss A');
	return m.format("HH:mm:ss");
}
window.T12to24 = function (T) {
	if (T == "") return "";
	var m = moment(T, 'hh:mm A');
	return m.format("HH:mm");
}
window.T24to12Sec = function (T) {
	if (T == "") return "";
	var m = moment(T, "HH:mm:ss");
	return m.format('hh:mm:ss A');
}
window.T24to12 = function (T) {
	if (T == "") return "";
	var m = moment(T, "HH:mm");
	return m.format('hh:mm A');
}
Date.prototype._SyncID = null;
Date.prototype.addMS = function (ms) {
	this.setMilliseconds(this.getMilliseconds() + parseInt(ms));
	return this;
};
Date.prototype.startSyncWithTime = function () {
	if (this._SyncID == nul) {
		this._SyncID = window.setInterval(function (dateOb) {
			dateOb.addMS(1);
		}, 1, this);
	}
}
Date.prototype.stopSync = function () {
	if (this._SyncID) {
		window.clearInterval(this._SyncID);
		this._SyncID = null;
	}
}

function BS_Btn_Grp_Radio_Chkbx_Chng() {
	// console.log(this,arguments);
	var inp = $(this);
	var lbl = inp.parents('label').first();
	var grp = inp.parents('.btn-group[data-toggle="buttons"]');
	grp.find('input:checkbox:not(:checked),input:radio:not(:checked)').each(function (inx, dta) {
		var lbls = $(dta).parents('label').first();
		console.log('notActive', lbls);
		lbls.removeClass('active');
	});
	grp.find('input:checkbox:checked,input:radio:checked').each(function (inx, dta) {
		var lbls = $(dta).parents('label').first();
		console.log('notActive', lbls);
		lbls.addClass('active');
	});

	// console.log(lbl,inp);

}

Object.lock = (OBJ, allTheWayThrough) => {

	allTheWayThrough = typeof allTheWayThrough === 'undefined' ? true : allTheWayThrough;
	Object.freeze(OBJ);
	Object.seal(OBJ);
	Object.preventExtensions(OBJ);

	if (allTheWayThrough) {
		Object.keys(OBJ).forEach((k) => {
			if ((OBJ[k] instanceof Object) || Array.isArray(OBJ[k])) {
				Object.lock(OBJ[k], allTheWayThrough);
			}
		});
	}

};

(function ($) {
	window.GoToLink = function (url, postData, newWindow) {
		newWindow = (typeof newWindow == 'undefined') ? false : newWindow;
		var ev = window.event;
		if (ev && ev.ctrlKey) {
			newWindow = true;
		}
		var GUID = GetNewGUID();
		var FID = "F-{0}-x".Format(GUID);
		var f = $("<form/>", {
			ID: FID,
			name: "GoToLink-Helper",
			action: url,
			method: "POST",
			autocomplete: "off",
			enctype: "multipart/form-data",
			target: newWindow ? '_blank' : '_self'
		});
		if (postData instanceof Object && (!Array.isArray(postData))) {
			var queryString = $.param(postData);
			var KeyValuePairArr = queryString.split("&").map((subQS) => {
				var subSQAr = subQS.split("=");
				var xoc = {
					Key: decodeURIComponent(subSQAr[0]),
					Value: decodeURIComponent(subSQAr[1] || ""),
				};
				return xoc;
			});
			KeyValuePairArr.forEach(function (Dat, indx) {
				var $Inp = $("<input type='hidden'/>").attr({
					name: Dat.Key,
					id: "{0}-e-{1}".Format(FID, indx),
					value: Dat.Value
				}).appendTo(f);
			});
		}
		$(document.body).append(f);
		f.submit();
	};

})(jQuery);


(function ($) {
	$(document).click('.btn-group[data-toggle="buttons"] .btn',function (ev) {
		var $target = $(ev.target);
		//var x = $target.find(":radio,:checkbox").change();
		// console.log(x,x.first().prop('checked'));
	});
})(jQuery);
function b64toBlob(b64Data, contentType, sliceSize) {
	contentType = contentType || '';
	sliceSize = sliceSize || 512;

	var byteCharacters = atob(b64Data);
	var byteArrays = [];

	for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
		var slice = byteCharacters.slice(offset, offset + sliceSize);

		var byteNumbers = new Array(slice.length);
		for (var i = 0; i < slice.length; i++) {
			byteNumbers[i] = slice.charCodeAt(i);
		}

		var byteArray = new Uint8Array(byteNumbers);

		byteArrays.push(byteArray);
	}

	var blob = new Blob(byteArrays, {
		type: contentType
	});
	return blob;
}
