'use strict';
module.exports = function(sequelize, DataTypes) {
  var debtSecurities = sequelize.define('debtsecurity', {
    seniorUnsecuredDebt: DataTypes.DOUBLE,
    SubordinateDebtSecurities: DataTypes.DOUBLE,
    equityMarketCapital: DataTypes.DOUBLE
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });
    debtSecurities.toJson = getdebtSecuritiesFromJson;
    debtSecurities.addToDB = adddebtSecuritiesToDB;
    return debtSecurities;
  };

  function getdebtSecuritiesFromJson(rawdata) {
    return {
      seniorUnsecuredDebt: rawdata['Senior Unsecured Debt Securities'],
      SubordinateDebtSecurities: rawdata['Subordinated Debt Securities'],
      equityMarketCapital: rawdata['Equity Market Capitalization']
    }
  };

  function adddebtSecuritiesToDB(rawdata, cb) {
    this.create(this.toJson(rawdata)).then(cb);
  };
