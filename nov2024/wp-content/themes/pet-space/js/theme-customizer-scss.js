'use strict';
(function ($, api) {
	api.bind('ready', function () {
		function getColorOptionValue(val) {
			//if not empty string
			if (val) {
				//hex code
				if (val.length === 7) {
					return val;
					//json string
				} else {
					return JSON.parse(val)[0].value;
				}
			}
			return val;
		}

		var previewWrap = document.getElementById('customize-preview');
		api('fw_options[accent_color_1]', function (value) {
			value.bind(function (newval) {
				//set style on iframe root element
				if(newval){
					previewWrap.firstChild.contentWindow.document.documentElement.style.setProperty('--c-main', getColorOptionValue(newval));
				}else {
					previewWrap.firstChild.contentWindow.document.documentElement.style.removeProperty('--c-main');
				}
			});
		});

		api('fw_options[accent_color_2]', function (value) {
			value.bind(function (newval) {
				if(newval){
					previewWrap.firstChild.contentWindow.document.documentElement.style.setProperty('--c-main2', getColorOptionValue(newval));
				}else {
					previewWrap.firstChild.contentWindow.document.documentElement.style.removeProperty('--c-main2');
				}
			});
		});

		api('fw_options[accent_color_3]', function (value) {
			value.bind(function (newval) {
				if(newval){
					previewWrap.firstChild.contentWindow.document.documentElement.style.setProperty('--c-main3', getColorOptionValue(newval));
				}else {
					previewWrap.firstChild.contentWindow.document.documentElement.style.removeProperty('--c-main3');
				}
			});
		});

		api('fw_options[accent_color_4]', function (value) {
			value.bind(function (newval) {
				if(newval){
					previewWrap.firstChild.contentWindow.document.documentElement.style.setProperty('--c-main4', getColorOptionValue(newval));
				}else {
					previewWrap.firstChild.contentWindow.document.documentElement.style.removeProperty('--c-main4');
				}
			});
		});
	}); //api ready
})(jQuery, wp.customize);
