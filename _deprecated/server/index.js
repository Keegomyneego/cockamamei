
var express = require('express');
var exec = require("child_process").exec;
var path = require('path');


// Ceate a new express app
var app = express();

app.get('/', function(req, res) {
	res.redirect("/index.php");
});

//
app.get('/*.php', function(req, res) {

	exec("php ."+ req.url, function (error, stdout, stderr) {
		res.send(stdout);
	});
});

app.get('/*', function(req, res) {
	var filepath = path.resolve(__dirname +"/../.."+ req.url);

	console.log("GET "+ filepath);
	res.sendFile(filepath);
});

var server = app.listen(8080, function() {
	console.log('Listening on port %d', server.address().port);
});
