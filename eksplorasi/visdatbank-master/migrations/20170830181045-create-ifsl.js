'use strict';
module.exports = {
  up: function(queryInterface, Sequelize) {
    return queryInterface.createTable('ifsls', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      liabilities: {
        type: Sequelize.DOUBLE
      },
      depositsNonDepo: {
        type: Sequelize.DOUBLE
      },
      undrawenCommitLine: {
        type: Sequelize.DOUBLE
      },
      pinjaman: {
        type: Sequelize.DOUBLE
      },
      netNegativeCurrent: {
        type: Sequelize.DOUBLE
      },
      otcDerivNet: {
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
    return queryInterface.dropTable('ifsls');
  }
};
