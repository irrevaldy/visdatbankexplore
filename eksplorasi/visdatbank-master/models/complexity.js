'use strict';
module.exports = function(sequelize, DataTypes) {
  var complexity = sequelize.define('complexity', {
    otcDerivative: DataTypes.DOUBLE,
    securities: DataTypes.DOUBLE
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });
  complexity.toJson = getcomplexityFromJson;
  complexity.addToDB = addcomplexityToDB;
  return complexity;
};

function getcomplexityFromJson(rawdata) {
  return {
    otcDerivative: rawdata['OTC Derivative'],
    securities: rawdata['Securities']
  }
};

function addcomplexityToDB(rawdata, cb) {
  this.create(this.toJson(rawdata)).then(cb);
};
