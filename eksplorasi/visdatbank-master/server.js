var express = require('express');
var app     = express();
var path    = require("path");
var bodyParser = require('body-parser');

var main = require('./routes/main');
var upload = require('./routes/upload');

app.use('/main',main);
app.use('/upload',upload);

// app.set('views', __dirname + '/views');
app.set('view engine', 'js');
app.engine('js', require('express-react-views').createEngine());

app.use(bodyParser.json({limit: '10mb'}));
app.use(bodyParser.urlencoded({limit: '10mb', extended: true }));


app.use('/', express.static(__dirname+'/public/'));
// respond with "hello world" when a GET request is made to the homepage

app.get('/lel', function (req, res) {
  var initialState = {
    items: [
      'document your code',
      'drop the kids off at the pool',
      '</script><script>alert(666)</script>'
    ],
    text: ''
  };
  res.render('Html', { data: initialState });
});

app.get('/', function (req, res) {
  res.sendFile(path.join(__dirname+'/index.html'));
})

app.get('/graph', function (req, res) {
  res.sendFile(path.join(__dirname+'/graph.html'));
})

app.listen(process.env.PORT || 3000);
