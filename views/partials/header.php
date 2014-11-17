<!doctype html>
<html ng-app="<?php echo __PROJECT_NAME; ?>">
<head>
    <title><?php echo !empty($title) ? $title : __PROJECT_NAME; ?></title>

    <link rel="stylesheet" href="/<?php echo __PROJECT_NAME; ?>/assets/css/app.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body ng-controller="BodyCtrl as Body">
<img src="assets/images/cockamamie_logo.png" alt="Cockamamie">