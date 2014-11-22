$(document).ready(function () {
  window.weekview = {};

  /* generate week view */
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

  function generateTbody(startTime, endTime, columns) {
    var $tbody = $('<tbody></tbody>');
    var $genericRow = $('<tr></tr>');
    $genericRow.append('<th></th>');
    for (var col = 0; col < columns; col++) {
      $genericRow.append('<td class="timeslot busy"></td>')
    }

    for (var time = startTime; time <= endTime; time++) {
      var $row = $genericRow.clone();
      $row.children("th").html(time + ":00");
      if (time == endTime) {
        $row.children("td").remove();
      }
      $tbody.append($row);
    }

    return $tbody;
  }

  $genericTable.append(generateTbody(6, 20, 4));

  $('#weekview-container div').append($genericTable.clone());

  /* set up event handlers and animations */
  $('#weekview-container div h1').on('mousedown', function () {
    $div = $(this).parent();
    if ($div.hasClass('large')) {
      $div.children('table').fadeOut(250, function () {
        $div.removeClass('large', 200);
      });
    } else {
      $div.addClass('large', 250, function () {
        $div.children('table').fadeIn(200);
      });
    }
  });

  $('#weekview-container div h1').hover(function () {
    $(this).toggleClass("hover", 100);
  });

  $('#weekview-container .timeslot').on("mousedown", function () {
    window.weekview.mousedown = true;
    $(this).trigger("mouseenter");
  });

  $('body').on("mouseup", function () {
    window.weekview.mousedown = false;
  });

  $('#weekview-container .timeslot').on("mouseenter", function () {
    if (window.weekview.mousedown) {
      if ($(this).hasClass('busy')) {
        $(this).switchClass("busy", "free", 100);
      } else {
        $(this).switchClass("free", "busy", 100);
      }
    }
  });
});