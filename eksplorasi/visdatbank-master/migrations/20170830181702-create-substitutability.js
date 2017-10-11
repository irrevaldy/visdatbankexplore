'use strict';
module.exports = {
  up: function(queryInterface, Sequelize) {
    return queryInterface.createTable('substitutabilities', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      rtgsVal: {
        type: Sequelize.DOUBLE
      },
      sknbiVal: {
        type: Sequelize.DOUBLE
      },
      rtgsVol: {
        type: Sequelize.DOUBLE
      },
      sknbiVol: {
        type: Sequelize.DOUBLE
      },
      custodianVal: {
        type: Sequelize.DOUBLE
      },
      custodianVol: {
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
    return queryInterface.dropTable('substitutabilities');
  }
};
