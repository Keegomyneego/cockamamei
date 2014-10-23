<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><html>
<body>

<style>
    table {
        background: #d3d3d3;
    }
</style>

<table>
    <tr>
        <th><?php echo $this->scope["firstname"];?> <?php echo $this->scope["lastname"];?></th>
    </tr>
</table>

</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>