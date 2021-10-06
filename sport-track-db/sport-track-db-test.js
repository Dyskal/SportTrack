const user_dao = require('./sport-track-db').user_dao;
const activity_dao = require('./sport-track-db').activity_dao;
const activity_data_dao = require('./sport-track-db').activity_data_dao;


async function user_test() {
    const User = {
        email: "user@mail.com",
        password: "123456789",
        lname: "nom",
        fname: "prenom",
        bdate: "2013-10-16",
        gender: "M",
        height: 123,
        weight: 321,
    }

    const User1 = {
        email: "user@mail.com",
        password: "123456789",
        lname: "nom",
        fname: "prenom",
        bdate: "2013-10-16",
        gender: "M",
        height: 124,
        weight: 421,
    }

    console.log("User")
    await user_dao.delete(User.email)
    await user_dao.insert(User)
    console.log("findAll")
    console.log(await user_dao.findAll())
    console.log()
    await user_dao.update(User.email, User1)
    console.log("findByKey")
    console.log(await user_dao.findByKey(User1.email))
    console.log()
}

async function activity_test() {
    const Activity = {
        id: 1,
        user_id: "user@mail.com",
        date: "2021-09-01",
        description: "Marathon de la bière",
        start_time: "13:00:00",
        duration: "00:30:00",
        distance: 20,
        freq_min: 32,
        freq_max: 45,
        freq_avg: 50
    }

    const Activity1 = {
        id: 1,
        user_id: "user@mail.com",
        date: "2021-09-01",
        description: "Marathon de la bière",
        start_time: "13:00:00",
        duration: "00:45:00",
        distance: 40,
        freq_min: 34,
        freq_max: 45,
        freq_avg: 50
    }

    console.log("Activity")
    await activity_dao.delete(Activity.id)
    await activity_dao.insert(Activity)
    console.log("findAll")
    console.log(await activity_dao.findAll())
    console.log()
    await activity_dao.update(Activity.id, Activity1)
    console.log("findByKey")
    console.log(await activity_dao.findByKey(Activity1.id))
    console.log()
}

async function activity_data_test() {
    let ActivityData = {
        data_id: 1,
        activity_id: 1,
        time: "00:10:00",
        cardio_frequency: 99,
        latitude: 47.644795,
        longitude: -2.776605,
        altitude: 18
    }

    let ActivityData1 = {
        data_id: 1,
        activity_id: 1,
        time: "00:15:00",
        cardio_frequency: 109,
        latitude: 47.644795,
        longitude: -2.776605,
        altitude: 15
    }

    console.log("ActivityData")
    await activity_data_dao.delete(ActivityData.data_id)
    await activity_data_dao.insert(ActivityData)
    console.log("findAll")
    console.log(await activity_data_dao.findAll())
    console.log()
    await activity_data_dao.update(ActivityData.data_id, ActivityData1)
    console.log("findByKey")
    console.log(await activity_data_dao.findByKey(ActivityData1.data_id))
    console.log()
}

async function main() {
    await user_test()
    await activity_test()
    await activity_data_test()
}
main()