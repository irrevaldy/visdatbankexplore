'use strict';
module.exports = function(sequelize, DataTypes) {
  var ifsa = sequelize.define('ifsa', {
    penempatanBankLain: DataTypes.DOUBLE,
    kreditBankLKNB: DataTypes.DOUBLE,
    acceptOthBank: DataTypes.DOUBLE,
    undrawnCommitLine: DataTypes.DOUBLE,
    securedDebtSecurities: DataTypes.DOUBLE,
    seniorNonSecuredDebtSecurities: DataTypes.DOUBLE,
    subordinateDebt: DataTypes.DOUBLE,
    commercePaper: DataTypes.DOUBLE,
    stock: DataTypes.DOUBLE,
    repo: DataTypes.DOUBLE,
    reverseRepo: DataTypes.DOUBLE,
    otcDerivNet: DataTypes.DOUBLE,
    derivPotFutureExposure: DataTypes.DOUBLE
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });
  ifsa.toJson = getIfsaFromJson;
  ifsa.addToDB = addIfsaToDB;
  return ifsa;
};

function getIfsaFromJson(rawdata) {
  return {
    penempatanBankLain: rawdata['Penempatan Pada Bank Lain Kecuali Margin Deposits'],
    acceptOthBank: rawdata['Acceptances From Other Banks(Tagihan Akseptasi)'],
    undrawnCommitLine: rawdata['Undrawn Committed Lines Extended To Other Financial Institution'],
    securedDebtSecurities: rawdata['Secured Debt Securities'],
    seniorNonSecuredDebtSecurities: rawdata['Senior Unsecured Debt Securities (Exclude EBA)'],
    subordinateDebt: rawdata['Subordinated Debt Securities'],
    commercePaper: rawdata['Commercial Paper'],
    stock: rawdata['Stock (Including Par And Surplus of Common And Preferred Shared)'],
    repo: rawdata['Net Positive Current Exposure of Securities Financing Transactions With Other Financial Institutions (Repo)'],
    reverseRepo: rawdata['Net Positive Current Exposure of Securities Financing Transactions With Other Financial Institutions (Reverse Repo)'],
    otcDerivNet: rawdata['OTC Derivatives Net Positive Fair Value (Include Collateral Held If It Is Within The Master Netting Agreement)'],
    derivPotFutureExposure: rawdata['Derivative Potential Future Exposure']
  }
};

function addIfsaToDB(rawdata, cb) {
  this.create(this.toJson(rawdata)).then(cb);
};
