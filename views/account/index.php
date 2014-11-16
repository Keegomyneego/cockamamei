<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="row" >
        <div class="col-xs-10">
            <p>
                Welcome, <?php echo $firstname . ' ' . $lastname; ?>
            </p>
        </div>
        <div class="col-xs-1">
            <p>
                <a href="#" class="right">Pricing</a>
            </p>
        </div>
        <div class="col-xs-1">
            <p>
                <a href="logout" class="right">Logout</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <h1>Events</h1>
            <ul>
                <li>Meeting with Cockamamei</li>
                <li>Finalize design</li>
                <li>Ideation for Krypt</li>
            </ul>
        </div>
        <div class="col-xs-9">
            <h1>Week View</h1>
            <?php
            for($i = 0; $i < 7; $i++)
            {
            ?>
                <div style="height: 50px;">
                    <?php
                    $now = new DateTime('now');
                    $now->modify('+' . $i . ' day');

                    ?>
                        <table>
                            <tr>
                                <th>
                                    <h4 class="center"><?php echo $now->format('D, M. d, Y'); ?></h4>
                                </th>
                            </tr>
                                <?
                                $startTime = 6; //start day at 6am
                                $endTime = 18; //end day at 6pm
                                while($startTime <= $endTime) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo date('h:i:s', $startTime) //attempt to print int as time. Bug will probably be here. ?>
                                        </td>
                                        <td>
                                            <?php //We will use this empty column to display initial info (color it when they hover over time or something ?>
                                        </td>
                                    </tr>
                                <?
                                    $startTime++; //hourly increment
                                }
                                ?>
                        </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
