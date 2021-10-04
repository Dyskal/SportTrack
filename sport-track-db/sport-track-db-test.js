var user_dao = require('./sport-track-db').user_dao;
var activity_dao = require('./sport-track-db').activity_dao;
var activity_entry_dao = require('./sport-track-db').activity_entry_dao;
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
    freq_avg: 50
}
activity_dao.delete(1);

activity_dao.insert(activity);
activity_dao.findAll(console.log);
let activity2 = {
    id: 1,
    user_id: 'prof@mail.com',
    date: '2021-09-01',
    description: "marathon de la biere",
    start_time: "13:00:00",
    duration: "13:00:00",
    distance: 1000,
    freq_min: 34,
    freq_max: 45,
    freq_avg: 50
}
activity_dao.update(1, activity2);
activity_dao.findAll(console.log);

activity_entry_dao.delete(1);
let data = {
    data_id:1,
    activity_id:1,
    time: "13:00:00",
    cardio_frequency: 99,
    latitude: 47.644795,
    longitude: -2.776605,
    altitude: 18
}
activity_entry_dao.insert(data);
activity_entry_dao.findAll(console.log)
data = {
    data_id:1,
    activity_id:1,
    time: "13:00:00",
    cardio_frequency: 19,
    latitude: 47.644795,
    longitude: -2.776605,
    altitude: 15
}
activity_entry_dao.update(1,data);
activity_entry_dao.findAll(console.log)
