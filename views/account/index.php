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
                <a href="logout" class="right">Logout</a>
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
        <div class="col-xs-8">
            <h1>Week View</h1>
            <?php
            for($i = 0; $i < 7; $i++)
            {
            ?>
                <div style="width: 14.28%; float: left;">
                    <?php
                    $now = new DateTime('now');
                    $now->modify('+' . $i . ' day');
                    ?>
                    <h6><?php echo $now->format('M. d, Y'); ?></h6>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
