const db = require('./sqlite_connection');
const ActivityEntryDAO = function () {
    this.insert = function (values, callback) {

        const query = "Insert Into ActivityData(data_id, activity_id, time, cardio_frequency, latitude, longitude, altitude) Values (?,?,?,?,?,?,?)";
        const params = [values['data_id'], values['activity_id'], values['time'], values['cardio_frequency'], values['latitude'], values['longitude'],values['altitude']]
        db.run(query, params, callback);
    };
    this.update = function (key, values, callback) {
        const query = "Update ActivityData Set activity_id = ?, time = ?, cardio_frequency = ?, latitude = ?, longitude = ?, altitude = ? Where data_id = ?";
        const params = [values['activity_id'], values['time'], values['cardio_frequency'], values['latitude'], values['longitude'],values['altitude'], key]
        db.run(query, params, callback);
    };
    this.delete = function (key, callback) {
        const query = "Delete From ActivityData Where data_id=" + key;
        db.run(query, [], callback);
    };
    this.findAll = function (callback) {
        const query = "Select * From ActivityData";
        return db.all(query, callback);
    };
    this.findByKey = function (key, callback) {
        const query = "Select * From ActivityData Where data_id=" + key;
        return db.all(query, callback);
    };
};


const dao = new ActivityEntryDAO();
module.exports = dao;