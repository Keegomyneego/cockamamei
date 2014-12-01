<?php include 'views/partials/header.php'; ?>

<div class="header small">
  <img src="/<?php echo __PROJECT_NAME; ?>/assets/images/cockamamie_logo_small.png" alt="Cockamamie">
</div>

<div class="navmenu">
  <ul>
    <li>
      <a class="clickable" id="switchMode">View Group Availability</a>
    </li>
    <li>
      <a class="clickable" id="help">Help</a>
    </li>
    <li>
      <a class="clickable" href="/cockamamei">Switch User</a>
    </li>
  </ul>
</div>

<div id="helpmenu">
  <img src="/<?php echo __PROJECT_NAME; ?>/assets/images/diagram-mouse.png" alt="Left click marks a timeslot as free and right click marks it as busy.">
</div>

<div id="events">
  <h1>Events</h1>
  <ul>
    <li><b>Meeting with Cockamamei</b></li>
    <li class="clickable">Finalize design</li>
    <li class="clickable">Ideation for Krypt</li>
  </ul>
</div>


<div id="weekview-container">
  <div class="change-week noselect" id="prevWeek">
    <span>&lt;</span>
  </div>

  <div class="day clickable noselect">
    <h1>Sunday</h1>
  </div>
  <div class="day clickable noselect">
    <h1>Monday</h1>
  </div>
  <div class="day clickable noselect">
    <h1>Tuesday</h1>
  </div>
  <div class="day clickable noselect">
    <h1>Wednesday</h1>
  </div>
  <div class="day clickable noselect">
    <h1>Thursday</h1>
  </div>
  <div class="day clickable noselect">
    <h1>Friday</h1>
  </div>
  <div class="day clickable noselect">
    <h1>Saturday</h1>
  </div>

  <div class="change-week noselect" id="nextWeek">
    <span>&gt;</span>
  </div>
</div>

<?php include 'views/partials/footer.php'; ?>
