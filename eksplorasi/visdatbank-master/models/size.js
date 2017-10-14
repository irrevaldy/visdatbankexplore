'use strict';
module.exports = function(sequelize, DataTypes) {
  var size = sequelize.define('size', {
    onBalance: DataTypes.DOUBLE,
    offBalance: DataTypes.DOUBLE,
    totalWajibKomit: DataTypes.DOUBLE,
    totalWajibKontijen: DataTypes.DOUBLE,
    spotDerivPosition: DataTypes.DOUBLE,
    potFutureExposure: DataTypes.DOUBLE
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });
  size.toJson = getSizeFromJson;
  size.addToDB = addSizeToDB;
  return size;
};


function getSizeFromJson(rawdata) {
  return {
    onBalance: rawdata['On Balance Sheet'],
    offBalance: rawdata['Off Balance Sheet'],
    totalWajibKomit: rawdata['Total Kewajiban Komitmen'],
    totalWajibKontijen: rawdata['Total Kewajiban Kontijensi'],
    spotDerivPosition: rawdata['Posisi Penjualan Spot dan Derivatif'],
    potFutureExposure: rawdata['Potential Future Exposure']
  }
};

function addSizeToDB(rawdata, cb) {
  // console.log(this.toJson(rawdata));
  this.create(this.toJson(rawdata)).then(cb);
};
