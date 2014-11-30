/* globals $,document,console */
$(document).ready(function () {
	'use strict';
	window.weekview = {};

	/* Table with header and no body */
	var $genericTable = $(
		'<table>' +
			'<thead>' +
				'<tr>' +
					'<th></th>' +
					'<td>Bryant</td>' +
					'<td>Chau</td>' +
					'<td>Hamzah</td>' +
					'<td>Keegan</td>' +
				'</tr>' +
			'</thead>' +
		'</table>');

	/**
	 * Generate all the timeslots for a day based on start/end time
	 * and the number of columns requested.
	 */
	function generateTbody(startTime, endTime, columns) {
		var $tbody = $(document.createElement('tbody'));
		var $genericRow = $(document.createElement('tr'));
		$genericRow.append(document.createElement('th'));
		for (var col = 0; col < columns; col++) {
			$genericRow.append('<td class="timeslot busy"></td>');
		}

		for (var time = startTime; time <= endTime; time++) {
			var $row = $genericRow.clone();
			$row.children('th').html(time + ':00');
			$tbody.append($row);
		}

		return $tbody;
	}

	$genericTable.append(generateTbody(6, 20, 4));

	$('#weekview-container div').append(document.createElement('div'));
	$('#weekview-container div div').append($genericTable.clone());
	$('#weekview-container div div').hide();

	/**
	 * Set up event handlers and animations.
	 */
	(function () {

		/* enlarge a day view */
		$('#weekview-container > div').on('mousedown', function () {
			var $div = $(this);
			if (!$div.hasClass('large')) {
				$div.siblings(':not(.large)').addClass('small', 250);
				$div.removeClass('small');
				$div.addClass('large', 250, function () {
					$div.children('div').show(500);
				});

				$div.removeClass('clickable');
				$div.children('h1').addClass('clickable');
			}
		});

		/* shrink a day view */
		$('#weekview-container div h1').on('mousedown', function () {
			var $div = $(this).parent();
			if ($div.hasClass('large')) {
				$div.children('div').hide(500, function () {
					if (!$div.siblings().hasClass('large')) {
						$div.parent().children().removeClass('small', 250);
					}
					$div.removeClass('large', 250);
				});

				$div.children('h1').removeClass('clickable');
				$div.addClass('clickable');
			}
		});

		/* prevent right-click menu */
		$('#weekview-container > div').on('contextmenu', function () {
			return false;
		});

		/* enter timeslot edit mode */
		$('#weekview-container .timeslot').on('mousedown', function (e) {
			if (e.which === 1) {
				window.weekview.buttonClicked = 'left';
			} else if (e.which === 3) {
				window.weekview.buttonClicked = 'right';
			}
			window.weekview.mousedown = true;
			$(this).trigger('mouseenter');
		});

		/* leave timeslot edit mode */
		$('body').on('mouseup', function () {
			window.weekview.mousedown = false;
		});

		/* modify timeslots when in edit mode */
		$('#weekview-container .timeslot').on('mouseenter', function () {
			if (window.weekview.mousedown) {
				if (window.weekview.buttonClicked == 'left') {
					$(this).switchClass('busy', 'free', 100);
				} else {
					$(this).switchClass('free', 'busy', 100);
				}
			}
		});
	}());
});