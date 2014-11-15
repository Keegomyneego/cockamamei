<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="row" >
        <div class="col-xs-11">
            <p>
                Welcome, <?php echo $firstname . ' ' . $lastname; ?>
            </p>
        </div>
        <div class="col-xs-1">
            <p>
                <a href="logout">Logout</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <h1>Events</h1>
            <ul>
                <li>Meeting with Cockamamei</li>
                <li>Finalize design</li>
                <li>Ideation for Krypt</li>
            </ul>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
