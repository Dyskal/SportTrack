const express = require('express');
const router = express.Router();
const user_dao = require("sport-track-db").user_dao;
const asyncMiddleware = require("./asyncMiddleware");
const htmlescape = require("./htmlescape");

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (!req.session.email) {
        res.redirect('/');
    }

    res.render('profile', {

        session: req.session
    });
}));

router.post('/', asyncMiddleware(async (req, res, next) => {
    console.log(req.body.height);
    if (req.body.lname != null && req.body.fname != null && req.body.bdate != null && req.body.gender != null && req.body.height != null && req.body.weight != null
        && req.body.lname != undefined && req.body.fname != undefined && req.body.bdate != undefined && req.body.gender != undefined && req.body.height != undefined && req.body.weight != undefined
        && req.body.lname !== "" && req.body.fname !== "" && req.body.bdate !== "" && req.body.gender !== "" && req.body.height !== "" && req.body.weight !== "") {
        const User = {
            email: htmlescape(req.session.email),
            password: htmlescape(req.session.password),
            lname: htmlescape(req.body.lname),
            fname: htmlescape(req.body.fname),
            bdate: htmlescape(req.body.bdate),
            gender: htmlescape(req.body.gender),
            height: htmlescape(req.body.height),
            weight: htmlescape(req.body.weight),
        };
        console.log(User);
        await user_dao.update(User.email, User)



        req.session.fname = User.fname;
        req.session.lname = User.lname;
        req.session.bdate = User.bdate;
        req.session.gender = User.gender;
        req.session.height = User.height;
        req.session.weight = User.weight;

        res.render('profile', {

            session: req.session,

            change: true
        });
    }

    res.render('profile', {

        session: req.session,

        change: false
    });
}));

module.exports = router;