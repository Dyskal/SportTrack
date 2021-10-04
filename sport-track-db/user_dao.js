const db = require('./sqlite_connection');
const UserDAO = function () {
    this.insert = function (values, callback) {

    };
    this.update = function (key, values, callback) {

    };
    this.delete = function (key, callback) {

    };
    this.findAll = function (callback) {
        const query = "Select * From User Order By lname, fname";
        return db.all(query, callback);
    };
    this.findByKey = function (key, callback) {

    };
};
const dao = new UserDAO();
module.exports = dao;