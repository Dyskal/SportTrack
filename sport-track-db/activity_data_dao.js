const db = require('./sqlite_connection');
const ActivityDataDAO = function () {
    this.insert = function (values) {
        return new Promise((resolve, reject) => {
            const query = "Insert Into ActivityData(data_id, activity_id, time, cardio_frequency, latitude, longitude, altitude) Values (?, ?, ?, ?, ?, ?, ?)";
            const params = [values.data_id, values.activity_id, values.time, values.cardio_frequency, values.latitude, values.longitude, values.altitude]
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
            const query = "Update ActivityData Set data_id = ?, activity_id = ?, time = ?, cardio_frequency = ?, latitude = ?, longitude = ?, altitude = ? Where data_id = ?";
            const params = [values.data_id, values.activity_id, values.time, values.cardio_frequency, values.latitude, values.longitude, values.altitude, key]
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
            const query = "Delete From ActivityData Where data_id = ?";
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
            const query = "Select * From ActivityData";
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
            const query = "Select * From ActivityData Where data_id = ?";
            db.all(query, key, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        }).catch((error) => console.error(error));
    };
};

module.exports = new ActivityDataDAO();