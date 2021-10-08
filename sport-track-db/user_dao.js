const db = require('./sqlite_connection');

const UserDAO = function () {
    this.insert = function (values) {
        return new Promise((resolve, reject) => {
            const query = "Insert Into User(email, password, lname, fname, bdate, gender, height, weight) Values (?, ?, ?, ?, ?, ?, ?, ?)";
            const params = [values.email, values.password, values.lname, values.fname, values.bdate, values.gender, values.height, values.weight];
            db.run(query, params, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        })
    };

    this.update = function (key, values) {
        return new Promise((resolve, reject) => {
            const query = "Update User Set email = ? , password = ?, lname = ?, fname = ?, bdate = ?, gender = ?, height = ?, weight = ? Where email = ?";
            const params = [values.email, values.password, values.lname, values.fname, values.bdate, values.gender, values.height, values.weight, key];
            db.run(query, params, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        })
    };

    this.delete = function (key) {
        return new Promise((resolve, reject) => {
            const query = "Delete From User Where email = ?";
            db.run(query, key, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        })
    };

    this.findAll = function () {
        return new Promise((resolve, reject) => {
            const query = "Select * From User Order By lname, fname";
            db.all(query, [], (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        })
    };

    this.findByKey = function (key) {
        return new Promise((resolve, reject) => {
            const query = "Select * From User Where email = ?";
            db.all(query, key, (error, row) => {
                if (error) {
                    reject(error)
                }
                resolve(row)
            });
        })
    };
};

module.exports = new UserDAO();