
<script type="text/javascript" src="/<?php echo __PROJECT_NAME; ?>/assets/modules/C3/d3.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/<?php echo __PROJECT_NAME; ?>/assets/modules/C3/c3.min.js"></script>
<?php
if(isset($_SERVER['REDIRECT_URL']) || substr($_SERVER['QUERY_STRING'], 0, 3) == "rt=")
{
    $pathParts = explode('/', $_SERVER['REDIRECT_URL']);
    $controller = $pathParts[2];
    $action = $pathParts[3];
    $jsFile = '/' . __PROJECT_NAME . '/assets/js/' . $controller . '/' . (($action) ? $action : 'index') . '.js';
}
else
{
    $jsFile = '/' . __PROJECT_NAME . '/assets/js/index.js';
}
?>
<script type="text/javascript" src="<?php echo $jsFile; ?>"></script>

</body>
</html>