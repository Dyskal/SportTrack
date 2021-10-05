const db = require('./sqlite_connection');

const ActivityDAO = function () {
    this.insert = function (values) {
        return new Promise((resolve, reject) => {
            const query = "Insert Into Activity(id, user_id, date, description, start_time, duration, distance, freq_min, freq_max, freq_avg) Values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            const params = [values.id, values.user_id, values.date, values.description, values.start_time, values.duration, values.distance, values.freq_min, values.freq_max, values.freq_avg]
            db.run(query, params, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        }).catch((error) => console.error(error));
    };

    this.update = function (key, values) {
        return new Promise((resolve, reject) => {
            const query = "Update Activity Set id = ?, user_id = ?, date = ?, description = ?, start_time = ?, duration = ?, distance = ?, freq_min = ?, freq_max = ?, freq_avg = ? Where id = ?";
            const params = [values.id, values.user_id, values.date, values.description, values.start_time, values.duration, values.distance, values.freq_min, values.freq_max, values.freq_avg, key]
            db.run(query, params, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        }).catch((error) => console.error(error));
    };

    this.delete = function (key) {
        return new Promise((resolve, reject) => {
            const query = "Delete From Activity Where id = ?";
            db.run(query, key, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        }).catch((error) => console.error(error));
    };

    this.findAll = function () {
        return new Promise((resolve, reject) => {
            const query = "Select * From Activity";
            db.all(query, [], (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        }).catch((error) => console.error(error));
    };

    this.findByKey = function (key) {
        return new Promise((resolve, reject) => {
            const query = "Select * From Activity Where id = ?";
            db.all(query, key, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        }).catch((error) => console.error(error));
    };
};

module.exports = new ActivityDAO();