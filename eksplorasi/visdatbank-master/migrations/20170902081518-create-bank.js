'use strict';
module.exports = {
  up: function(queryInterface, Sequelize) {
    return queryInterface.createTable('banks', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      name: {
        type: Sequelize.STRING
      },
      kelKepemilikan: {
        type: Sequelize.INTEGER
      },
      kelBuku: {
        type: Sequelize.INTEGER
      },
      dsibFlag: {
        type: Sequelize.INTEGER
      },
      dsibScore: {
        type: Sequelize.INTEGER
      },
      sizeId: {
        type: Sequelize.INTEGER
      },
      ifsaId: {
        type: Sequelize.INTEGER
      },
      ifslId: {
        type: Sequelize.INTEGER
      },
      debtSecId: {
        type: Sequelize.INTEGER
      },
      complexityId: {
        type: Sequelize.INTEGER
      },
      countrySpecId: {
        type: Sequelize.INTEGER
      },
      subsId: {
        type: Sequelize.INTEGER
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
    return queryInterface.dropTable('banks');
  }
};
