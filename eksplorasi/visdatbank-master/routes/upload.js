var models  = require('../models');
var express = require('express');
var path = require('path');
var router  = express.Router();
var bodyParser = require('body-parser');
var fs = require('fs');
var dateTime = require('node-datetime');
var read = fs.createReadStream;
var csv = require('csvtojson');
// var async = require('async');

router.use(bodyParser.json({limit: '25mb'}));
router.use(bodyParser.urlencoded({limit: '25mb', extended: true }));

router.get('/', function(req, res) {
  res.send(JSON.stringify({
    status: '404'
  }));
});

function deleteAllRecordInDB() {
  models.bank.destroy({
    where: {},
    truncate: true
  });
  models.ifsa.destroy({
    where: {},
    truncate: true
  });
  models.ifsl.destroy({
    where: {},
    truncate: true
  });
  models.size.destroy({
    where: {},
    truncate: true
  });
  models.complexity.destroy({
    where: {},
    truncate: true
  });
  models.countryspecific.destroy({
    where: {},
    truncate: true
  });
  models.debtsecurity.destroy({
    where: {},
    truncate: true
  });
  models.substitutability.destroy({
    where: {},
    truncate: true
  });
  models.bank.destroy({
    where: {},
    truncate: true
  });
}

router.post('/', function(req, res) {
  var dt = dateTime.create();
  var formatted = dt.format('Y-m-d H:M:S');
  var namefile = "public/csv/"+formatted+".csv";
  fs.writeFile(namefile, req.body.data.replace(/^data:text\/csv;base64,/, ""), "base64", function(err) {
      if(err) {
          return console.log(err);
      }
      deleteAllRecordInDB();
      csv()
      .fromFile(namefile)
      .on('json',(jsonObj)=>{
        jsonToDB(jsonObj)
      })
      .on('done',(error)=>{
        res.send(JSON.stringify({
          status: 'OK',
          data: {}
        }));
      })
  });
});

module.exports = router;


function checkKelBuku(data) {
    var li = {'Bank Swasta Nasional':1,
              'Bank Persero':2,
              'Bank Asing':3,
              'BPD':4,
              'Bank Campuran':5 };
    try {
      return li[data];
    } catch (err) {
      return 0;
    }
};

function jsonToDB(jsonObj){
  var ifsaId = 0, ifslId = 0, complexityId = 0,
    countryspecificId = 0, debtsecuritiesId = 0,
    substitutabilityId = 0, sizeId = 0;
  models.ifsa.addToDB(jsonObj, function(ifsa) {
    ifsaId = ifsa.id;
    models.ifsl.addToDB(jsonObj, function(ifsl) {
      ifslId = ifsl.id;
  models.complexity.addToDB(jsonObj, function(complexity) {
    complexityId = complexity.id;
    models.countryspecific.addToDB(jsonObj, function(countryspecific) {
      countryspecificId = countryspecific.id;
  models.debtsecurity.addToDB(jsonObj, function(debtsecurities) {
    debtsecuritiesId = debtsecurities.id;
    models.substitutability.addToDB(jsonObj, function(substitutability) {
      substitutabilityId = substitutability.id;
  models.size.addToDB(jsonObj, function(size){
    sizeId = size.id;
    models.bank.create({
      name: jsonObj['Id Bank'],
      kelKepemilikan: parseInt(jsonObj['Kelompok Bank berdasarkan Kepemilikan']),
      kelBuku: checkKelBuku(jsonObj['Kelompok Bank berdasarkan BUKU']),
      dsibFlag: parseInt(jsonObj['DSIB Flag']),
      dsibScore: parseInt(jsonObj['DSIB Score']),
      sizeId: sizeId,
      ifsaId: ifsaId,
      ifslId: ifslId,
      debtSecId: debtsecuritiesId,
      complexityId: complexityId,
      countrySpecId: countryspecificId,
      subsId: substitutabilityId
    });
  });
    });
  });
    });
  });
    });
  });
}
