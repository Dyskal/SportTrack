const db = require('./sqlite_connection');
const ActivityDAO = function () {
    this.insert = function (values, callback) {

        const query = "Insert Into Activity(id, user_id, date, description, start_time, duration, distance, freq_min, freq_max, freq_avg) Values (?,?,?,?,?,?,?,?,?,?)";
        const params = [values['id'], values['user_id'], values['date'], values['description'], values['start_time'], values['duration'], values['distance'], values['freq_min'], values['freq_max'], values['freq_avg']]
         db.run(query, params, callback);
    };
    this.update = function (key, values, callback) {
        const query = "Update Activity Set user_id = ?, date = ?, description = ?, start_time = ?, duration = ?, distance = ?, freq_min = ?, freq_max = ?, freq_avg = ?  Where id = ?";
        const params = [values['user_id'], values['date'], values['description'], values['start_time'], values['duration'], values['distance'], values['freq_min'], values['freq_max'], values['freq_avg'] , values['id']]
        db.run(query, params, callback);
    };
    this.delete = function (key, callback) {
        const query = "Delete From Activity Where id=" + key;
         db.run(query,[],callback);
    };
    this.findAll = function (callback) {
        const query = "Select * From Activity";
        return db.all(query, callback);
    };
    this.findByKey = function (key, callback) {
        const query = "Select * From Activity Where id="+key;
        return db.all(query, callback);
    };
};


const dao = new ActivityDAO();
module.exports = dao;