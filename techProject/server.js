var express = require('express'),
    fs = require('fs'),
    morgan = require('morgan'),
    bodyParser = require('body-parser'),
    port = process.env.PORT || 8080;

var app = express();
app.use(bodyParser());
app.use(morgan('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded());

app.set('view options', {
    layout: false
});


app.use(express.static(__dirname + '/public'));

app.get('/', function (req, res) {
    res.render('public/index.html');
});

app.get('/products', function (req, res) {
    var vegeProducts = require('./data/vege.json');
    res.json(vegeProducts);
});

app.listen(port);
console.log("Server is running");