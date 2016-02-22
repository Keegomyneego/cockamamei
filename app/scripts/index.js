/* globals $ */
$(function () {

	'use strict';

    console.log("index :: starting...");

	require('./generate.js');
	require('./interactivity.js');

	/*  */
	function enterEditMode() {
		$('#weekview-container').switchClass('view-mode', 'edit-mode', 1000);
	}

	/*  */
	function enterViewMode() {

	}

    console.log("index :: finished");

});