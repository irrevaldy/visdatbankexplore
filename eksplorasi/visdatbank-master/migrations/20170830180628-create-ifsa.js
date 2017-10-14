'use strict';
module.exports = {
  up: function(queryInterface, Sequelize) {
    return queryInterface.createTable('ifsas', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      penempatanBankLain: {
        type: Sequelize.DOUBLE
      },
      kreditBankLKNB: {
        type: Sequelize.DOUBLE
      },
      acceptOthBank: {
        type: Sequelize.DOUBLE
      },
      undrawnCommitLine: {
        type: Sequelize.DOUBLE
      },
      securedDebtSecurities: {
        type: Sequelize.DOUBLE
      },
      seniorNonSecuredDebtSecurities: {
        type: Sequelize.DOUBLE
      },
      subordinateDebt: {
        type: Sequelize.DOUBLE
      },
      commercePaper: {
        type: Sequelize.DOUBLE
      },
      stock: {
        type: Sequelize.DOUBLE
      },
      repo: {
        type: Sequelize.DOUBLE
      },
      reverseRepo: {
        type: Sequelize.DOUBLE
      },
      otcDerivNet: {
        type: Sequelize.DOUBLE
      },
      derivPotFutureExposure: {
        type: Sequelize.DOUBLE
      },
      createdAt: {
        allowNull: false,
        type: Sequelize.DATE
      },
      updatedAt: {
        allowNull: false,
        type: Sequelize.DATE
      }
    });
  },
  down: function(queryInterface, Sequelize) {
    return queryInterface.dropTable('ifsas');
  }
};
