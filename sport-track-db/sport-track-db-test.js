var user_dao = require('./sport-track-db').user_dao;
var activity_dao = require('./sport-track-db').activity_dao;
var db = require('./sport-track-db').db;

user_dao.findAll(console.log);


let activity = {
    id: 1,
    user_id: 'prof@mail.com',
    date: '2021-09-01',
    description: "marathon de la biere",
    start_time: "13:00:00",
    duration: "13:00:00",
    distance: 20,
    freq_min: 32,
    freq_max: 45,
    freq_avg: 50,
}


activity_dao.insert(activity,console.log);
activity_dao.findAll(console.log);



