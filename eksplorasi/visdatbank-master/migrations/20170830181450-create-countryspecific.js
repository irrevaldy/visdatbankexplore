'use strict';
module.exports = {
  up: function(queryInterface, Sequelize) {
    return queryInterface.createTable('countryspecifics', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      garansi: {
        type: Sequelize.DOUBLE
      },
      LC: {
        type: Sequelize.DOUBLE
      },
      pangsaSBN: {
        type: Sequelize.DOUBLE
      },
      rekDPK: {
        type: Sequelize.DOUBLE
      },
      fasKredit: {
        type: Sequelize.DOUBLE
      },
      kcdn: {
        type: Sequelize.DOUBLE
      },
      kcln: {
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
    return queryInterface.dropTable('countryspecifics');
  }
};
