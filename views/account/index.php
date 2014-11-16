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
                                $startTime = 6;
                                $endTime = 18;
                                while($startTime <= $endTime) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo date($startTime) ?>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                <?
                                    $startTime++;
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
