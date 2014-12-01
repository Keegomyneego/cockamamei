/* globals $,document */
$(document).ready(function () {

	'use strict';
	window.weekview = {};

	/**
	 * Generate days in weekview.
	 */
	(function () {
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

		$('#weekview-container .day').append(document.createElement('div'));
		$('#weekview-container .day div').append($genericTable.clone());
		$('#weekview-container .day div').hide();
	}());



	/**
	 * Set up event handlers and animations.
	 */
	(function () {

		function createDropDown(parent, menu) {
			$(parent).on('click', function () {
				var $menu = $(menu);
				if (!$menu.is(':visible')) {
					$menu.slideDown();
				} else {
					$menu.slideUp();
				}
			});
		}

		/* dropdown for help menu */
		createDropDown('#help-toggle', '#help-menu ul');

		/* dropdown for controls */
		createDropDown('#show-controls', '#controls');

		/* enlarge a day view */
		$('#weekview-container .day').on('mousedown', function () {
			var $day = $(this);
			if (!$day.hasClass('large')) {
				window.weekview.selectedDay = $day;

				/* unenlarge other days */
				$day.siblings('.large')
				    .children('div').hide(500, function () {
					$(this).parent().removeClass('large', 250);
				});

				/* unshrink self */
				$day.removeClass('small', 250)
				    .children('h1')
				    .removeClass('small', 250);

				/* enlarge self then show its timeslots */
				$day.addClass('large', 250, function () {
					$day.children('div')
					    .show(500);
				});

				/* shrink all other days */
				$day.siblings()
				    .addClass('small', 250)
				    .children('h1')
				    .addClass('small', 250);

				/* switch self clickability from div to h1 */
				$day.removeClass('clickable');
				$day.children('h1')
				    .addClass('clickable');
			}
		});

		/* unenlarge a day view */
		$('#weekview-container .day h1').on('mousedown', function () {
			var $day = $(this).parent();
			if ($day.hasClass('large')) {
				window.weekview.selectedDay = null;

				/* hide own timeslots */
				$day.children('div').hide(500, function () {
					/* unshrink all other days */
					$day.siblings()
					    .removeClass('small', 250)
					    .children('h1')
					    .removeClass('small', 250);

					/* unenlarge self */
					$day.removeClass('large', 250);
				});

				/* switch self clickability from h1 to div */
				$day.children('h1').removeClass('clickable');
				$day.addClass('clickable');
			}
		});

		/* prevent right-click menu */
		$('#weekview-container .day').on('contextmenu', function () {
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