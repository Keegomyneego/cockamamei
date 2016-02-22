<?php include 'views/partials/header.php'; ?>

<div class="header small">
  <img src="/assets/images/cockamamie_logo_small.png" alt="Cockamamie">
</div>

<div class="navmenu" id="main-nav">
  <ul>
    <li>
      <a class="clickable" id="switch-mode">View Group Availability</a>
    </li>
    <li>
      <a class="clickable" href="/Cockamamei">Switch User</a>
    </li>
    <li>
      <a class="clickable" id="help-toggle">Help</a>
    </li>
  </ul>
</div>

<div class="navmenu" id="help-menu">
  <ul>
    <li>
      <a class="clickable" id="start-tutorial">Start Tutorial</a>
    </li>
    <li>
      <a class="clickable" id="show-controls">Show Controls</a>
    </li>
  </ul>
  <div id="controls">
    <img src="/<?php echo __PROJECT_NAME; ?>/assets/images/diagram-mouse.png" alt="Left click marks a timeslot as free and right click marks it as busy.">
  </div>
</div>

<div id="module-container">
  <div id="events">
    <h1>Events</h1>
    <ul>
      <li><b>Meeting with Cockamamei</b></li>
      <li class="clickable">Finalize design</li>
      <li class="clickable">Ideation for Krypt</li>
    </ul>
  </div>

  <div id="info-display" class="good-news">
    <h1>Getting Started</h1>
    <p>Go ahead and set what times you're free this week.</p>
  </div>

  <div id="available-times" class="bad-news">
    <h1>Available Meeting Times</h1>
    <p>No available times : (</p>
  </div>
</div>

<div id="weekview-container" class="view-mode">
  <div class="change-week noselect" id="prevWeek">
    <span>&lt;</span>
  </div>

  <div class="week">
  </div>

  <div class="change-week noselect" id="nextWeek">
    <span>&gt;</span>
  </div>
</div>

<?php include 'views/partials/footer.php'; ?>
