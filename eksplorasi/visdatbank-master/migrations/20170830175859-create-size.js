'use strict';
module.exports = {
  up: function(queryInterface, Sequelize) {
    return queryInterface.createTable('sizes', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      onBalance: {
        type: Sequelize.DOUBLE
      },
      offBalance: {
        type: Sequelize.DOUBLE
      },
      totalWajibKomit: {
        type: Sequelize.DOUBLE
      },
      totalWajibKontijen: {
        type: Sequelize.DOUBLE
      },
      spotDerivPosition: {
        type: Sequelize.DOUBLE
      },
      potFutureExposure: {
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
    return queryInterface.dropTable('sizes');
  }
};
