'use strict';
module.exports = function(sequelize, DataTypes) {
  var countryspecific = sequelize.define('countryspecific', {
    garansi: DataTypes.DOUBLE,
    LC: DataTypes.DOUBLE,
    pangsaSBN: DataTypes.DOUBLE,
    rekDPK: DataTypes.DOUBLE,
    fasKredit: DataTypes.DOUBLE,
    kcdn: DataTypes.DOUBLE,
    kcln: DataTypes.DOUBLE
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });
  countryspecific.toJson = getcountryspecificFromJson;
  countryspecific.addToDB = addcountryspecificToDB;
  return countryspecific;
};


function getcountryspecificFromJson(rawdata) {
  return {
    garansi: rawdata['Garansi'],
    LC: rawdata['LC'],
    pangsaSBN: rawdata['Pangsa SBN'],
    rekDPK: rawdata['Rek. DPK'],
    fasKredit: rawdata['Fas. Kredit'],
    kcdn: rawdata['KC DN'],
    kcln: rawdata['KC LN']
  }
};

function addcountryspecificToDB(rawdata, cb) {
  this.create(this.toJson(rawdata)).then(cb);
};
