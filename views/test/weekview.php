<?php 
// include 'views/partials/header.php';

/* Work around while Router isn't working */
define("__PROJECT_NAME", "cockamamei");
include '../partials/header.php';
?>

<div id="meetings">
  <h1>Meetings</h1>
  <ol>
    <li><b>Meeting with Cockamamei</b></li>
    <li>Finalize design</li>
    <li>Ideation for Krypt</li>
  </ol>
</div>

<div id="weekview-container">
    <div>
      <h1>Monday</h1>
    </div>
    <div>
      <h1>Tuesday</h1>
    </div>
    <div>
      <h1>Wednesday</h1>
    </div>
    <div>
      <h1>Thursday</h1>
    </div>
    <div>
      <h1>Friday</h1>
    </div>
</div>

<script type="text/javascript" src="../../assets/js/test/weekview.js"></script>

<?php
// include 'views/partials/footer.php';

/* Work around while Router isn't working */
include '../partials/footer.php';
?>
