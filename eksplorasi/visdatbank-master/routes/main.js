var csv = require('csv');
var models  = require('../models');
var express = require('express');
var router  = express.Router();
var bodyParser = require('body-parser');

router.use(bodyParser.json()); // support json encoded bodies
router.use(bodyParser.urlencoded({ extended: true })); // support encoded bodies

router.get('/', function(req, res) {
  res.send(JSON.stringify({
    status: '404'
  }));
});

router.post('/', function(req, res) {
  var filters = req.body.filters;
  var params  = req.body.params;
  var dataraw = [
    {
      'Name' : 'BCA',
      'Size' : 10,
      'Interconnectedness' : 20,
      'Complexity' : 30,
      'Jumlah Nasabah' : 10,
      'Jumlah Cabang' : 30,
      'Nasabah Kakap' : 50,
      'Nasabah Biasa' : 30
    },
    {
      'Name' : 'BNI',
      'Size' : 10,
      'Interconnectedness' : 25,
      'Complexity' : 10,
      'Jumlah Nasabah' : 10,
      'Jumlah Cabang' : 23,
      'Nasabah Kakap' : 30,
      'Nasabah Biasa' : 50
    },
    {
      'Name' : 'BRI',
      'Size' : 10,
      'Interconnectedness' : 20,
      'Complexity' : 15,
      'Jumlah Nasabah' : 10,
      'Jumlah Cabang' : 18,
      'Nasabah Kakap' : 20,
      'Nasabah Biasa' : 50
    },
    {
      'Name' : 'Mandiri',
      'Size' : 10,
      'Interconnectedness' : 5,
      'Complexity' : 34,
      'Jumlah Nasabah' : 10,
      'Jumlah Cabang' : 30,
      'Nasabah Kakap' : 30,
      'Nasabah Biasa' : 50
    },
    {
      'Name' : 'BTN',
      'Size' : 10,
      'Interconnectedness' : 23,
      'Complexity' : 20,
      'Jumlah Nasabah' : 10,
      'Jumlah Cabang' : 14,
      'Nasabah Kakap' : 20,
      'Nasabah Biasa' : 20
    },
    {
      'Name' : 'Danamon',
      'Size' : 10,
      'Interconnectedness' : 16,
      'Complexity' : 22,
      'Jumlah Nasabah' : 10,
      'Jumlah Cabang' : 12,
      'Nasabah Kakap' : 12,
      'Nasabah Biasa' : 13
    },
    {
      'Name' : 'Mega',
      'Size' : 10,
      'Interconnectedness' : 20,
      'Complexity' : 22,
      'Jumlah Nasabah' : 10,
      'Jumlah Cabang' : 12,
      'Nasabah Kakap' : 12,
      'Nasabah Biasa' : 13
    },
  ];
  res.send(JSON.stringify({
    status: 'OK',
    data: dataraw
  }));
});


module.exports = router;
