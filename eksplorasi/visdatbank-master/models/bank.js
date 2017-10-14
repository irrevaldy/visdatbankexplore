'use strict';
module.exports = function(sequelize, DataTypes) {
  var Bank = sequelize.define('bank', {
    name: DataTypes.STRING,
    kelKepemilikan: DataTypes.INTEGER,
    kelBuku: DataTypes.INTEGER,
    dsibFlag: DataTypes.INTEGER,
    dsibScore: DataTypes.INTEGER,
    sizeId: DataTypes.INTEGER,
    ifsaId: DataTypes.INTEGER,
    ifslId: DataTypes.INTEGER,
    debtSecId: DataTypes.INTEGER,
    complexityId: DataTypes.INTEGER,
    countrySpecId: DataTypes.INTEGER,
    subsId: DataTypes.INTEGER
  }, {
    classMethods: {
      associate: function(models) {
        // associations can be defined here
      }
    }
  });
  return Bank;
};
