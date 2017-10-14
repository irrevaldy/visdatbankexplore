'use strict';
module.exports = function(sequelize, DataTypes) {
  var ifsl = sequelize.define('ifsl', {
    liabilities: DataTypes.DOUBLE,
    depositsNonDepo: DataTypes.DOUBLE,
    undrawenCommitLine: DataTypes.DOUBLE,
    pinjaman: DataTypes.DOUBLE,
    netNegativeCurrent: DataTypes.DOUBLE,
    otcDerivNet: DataTypes.DOUBLE
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });
  ifsl.toJson = getIfslFromJson;
  ifsl.addToDB = addIfslToDB;
  return ifsl;
};

function getIfslFromJson(rawdata) {
  return {
    liabilities: rawdata['Liabilities Incld. Deposits Due To Depository Institutions'],
    depositsNonDepo: rawdata['Deposits Due To Non-Depository Financial Institutions'],
    undrawenCommitLine: rawdata['Undrawn Committed Lines Obtained From Other Financial Institutions'],
    pinjaman: rawdata['Pinjaman Yang Diterima'],
    netNegativeCurrent: rawdata['Net Negative Current Exposure of Securities Financing Transactions With Other Financial Institutions'],
    otcDerivNet: rawdata['OTC Derivative Net Negative Fair Value (Include Collateral Provided If It Is Within The Master Netting Agreement)']
  }
};

function addIfslToDB(rawdata, cb) {
  this.create(this.toJson(rawdata)).then(cb);
};
