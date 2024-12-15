window.GetDateTimeElementTD = function (DateTimeString) {

	var mom = moment(DateTimeString, 'YYYY-MM-DD[T]HH:mm:ss[Z]');
	var DateTimeTDElem = $("<span class='DateTimeElement'/>");
	var DatePartElement = $("<span class='DatePartElement'/>").appendTo(DateTimeTDElem);
	var TimePartElement = $("<span class='TimePartElement'/>").appendTo(DateTimeTDElem);
	if (mom.isValid()) {
		var DatePart = mom.format('DD MMM, YYYY');
		var TimePart = mom.format('hh:mm:ss A');
		DatePartElement.text(DatePart);
		TimePartElement.text(TimePart);
		var DATETIMETitleStr = mom.format('dddd, DD MMMM, YYYY hh:mm:ss A');
		DateTimeTDElem.attr({
			title: DATETIMETitleStr
		});
	}
	return DateTimeTDElem;
}

/*
(function ($) {

	$(document).ready(function () {

		Object.prototype.MomentToNewISOString = function () {
			//var Obj = this;
			if (moment.isMoment(this)) {
				return this.format("YYYY-MM-DD[T]HH:mm:ss[Z]");
			} else {
				return this;
			}
		}
	});
})(jQuery)
*/
window.Base64ToFile = function (Base64String) {
	var b64 = Base64String; //$("#studentphoto").css("background-image");
	//console.log(b64);
	var buffStr = b64.split(",")[1];
	var det = b64.split(",")[0];
	var ContTyp = det.split(":")[1].split(";")[0];

	var ext = ContTyp.split("/")[1];

	var fDta = new FormData();
	var Blobb = b64toBlob(buffStr, ContTyp);
	var f = new File([Blobb], ['ffoof', Math.random() * 1000, ext].join("."), {
		type: ContTyp
	});
	return f;
}

window.momentToIsoNew = function (Ob) {
	if (moment.isMoment(Ob)) {
		return Ob.format("YYYY-MM-DD[T]HH:mm:ss[Z]");
	} else {
		return Ob;
	}
}


window.IsoNewToMoment = function (strISoNew) {
	var Mom = moment(strISoNew, "YYYY-MM-DD[T]HH:mm:ss[Z]");
	return Mom;
}


Array.prototype.toObject = function (key, val) {
	let Obj = {};

	function GetVal(Arr, Vk, keyC) {

	}
	if (key === undefined || key === "" || key === null) {
		this.forEach(function (valD, keyI) {
			Obj[keyI] = valD;
		});
	} else if (typeof key === 'string') {
		if (val === undefined || val === "" || val === null) {

			this.forEach(function (valD, keyI) {
				Obj[valD[key]] = valD;
			});
		} else if(typeof val === 'string'){
			this.forEach(function (valD, keyI) {
				Obj[valD[key]] = valD[val];
			});

		} else if(typeof val === 'function'){
			this.forEach(function (valD, keyI,MainAr) {

				let vlx = val.apply(valD,[valD,keyI,MainAr]);
				Obj[valD[key]] = vlx;
			});

		}
	}else if(typeof key === 'function'){

		if (val === undefined || val === "" || val === null) {

			this.forEach(function (valD, keyI,MainAr) {
				Obj[key.apply(valD,[valD,keyI,MainAr])] = valD;
			});
		} else if(typeof val === 'string'){
			this.forEach(function (valD, keyI,MainAr) {
				Obj[key.apply(valD,[valD,keyI,MainAr])] = valD[val];
			});

		} else if(typeof val === 'function'){
			this.forEach(function (valD, keyI,MainAr) {

				let vlx = val.apply(valD,[valD,keyI,MainAr]);
				Obj[key.apply(valD,[valD,keyI,MainAr])] = vlx;
			});

		}
	}

	return Obj;
}
