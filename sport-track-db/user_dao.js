const db = require('./sqlite_connection');
const UserDAO = function () {
    this.insert = function (values) {
        return new Promise((resolve, reject) => {
            let query = "Insert Into User(email, password, lname, fname, bdate, gender, height, weight) Values (?, ?, ?, ?, ?, ?, ?, ?)";
            let params = [values.email, values['password'], values['lname'], values['fname'], values['bdate'], values['gender'], values['height'] , values['weight']];
            db.run(query, params, (error) => {
                if (error) {
                    reject(error)
                }
                resolve()
            });
        });

    };
    this.update = function (key, values, callback) {
        let query = "Update User Set email = ? , password = ?, lname = ?, fname = ?, bdate = ?, gender = ?, height = ?, weight = ? Where email = ?";
        let params = [values['email'], values['password'], values['lname'], values['fname'], values['bdate'], values['gender'], values['height'] , values['weight'], key];
        db.run(query, params, callback);
    };
    this.delete = function (key, callback) {
        let query = "Delete From User Where email = ?";
        db.run(query, [key], callback);
    };
    this.findAll = function (callback) {
        const query = "Select * From User Order By lname, fname";
        return db.all(query, [], callback);
    };

    this.findByKey = function (key, callback) {
        const query = "Select * From User Where email = ?";
        return db.all(query, [key], callback);
    };
};
const dao = new UserDAO();
module.exports = dao;