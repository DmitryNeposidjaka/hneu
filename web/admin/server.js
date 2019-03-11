var express = require('express');
var serveStatic = require('serve-static');

var app = express();
app.use(serveStatic(__dirname + "/dist"));

var port = 80;
app.listen(port);
