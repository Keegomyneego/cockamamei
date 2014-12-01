/* globals $ */
$(function () {

	'use strict';

	$.getScript('assets/js/app/generate.js');
	$.getScript('assets/js/app/interactivity.js');

	/*  */
	function enterEditMode() {
		$('#weekview-container').switchClass('view-mode', 'edit-mode', 1000);
	}

	/*  */
	function enterViewMode() {

	}


});