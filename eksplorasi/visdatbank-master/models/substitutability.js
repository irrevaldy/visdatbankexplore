'use strict';
module.exports = function(sequelize, DataTypes) {
  var substitutability = sequelize.define('substitutability', {
    rtgsVal: DataTypes.DOUBLE,
    sknbiVal: DataTypes.DOUBLE,
    rtgsVol: DataTypes.DOUBLE,
    sknbiVol: DataTypes.DOUBLE,
    custodianVal: DataTypes.DOUBLE,
    custodianVol: DataTypes.DOUBLE
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });

  substitutability.toJson = getsubstitutabilityFromJson;
  substitutability.addToDB = addsubstitutabilityToDB;
  return substitutability;
};

function getsubstitutabilityFromJson(rawdata) {
  return {
    rtgsVal: rawdata['Nilai RTGS'],
    sknbiVal: rawdata['Nilai SKNBI'],
    rtgsVol: rawdata['Volume RTGS'],
    sknbiVol: rawdata['Volume SKNBI'],
    custodianVal: rawdata['Kustodian Nilai'],
    custodianVol: rawdata['Kustodian Volume']
  }
};

function addsubstitutabilityToDB(rawdata, cb) {
  this.create(this.toJson(rawdata)).then(cb);
};
