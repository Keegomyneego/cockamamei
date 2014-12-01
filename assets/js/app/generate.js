/**
 * This script generates the dom content for the week view.
 */

/* globals $,document */

(function () {

  'use strict';

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

  var $week = $('#weekview-container .week');
  var daysInWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  for (var i = 0; i < daysInWeek.length; i ++) {
    $week
      .append($(document.createElement('div'))
        .addClass('day noselect edit-mode')
        .append($(document.createElement('h1'))
          .addClass('edit-mode')
          .text(daysInWeek[i]))
        .append($(document.createElement('div'))
          .addClass('timetable edit-mode')));
  }

  $('#weekview-container .timetable').append($genericTable.clone());
  $('#weekview-container').find('thead, th, td').hide();
  $('#weekview-container').find('.day:first-of-type th').show();
  $('#weekview-container').find('td:first-of-type').show();
  $('#weekview-container .timetable').show();
}());