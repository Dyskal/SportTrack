const express = require('express');
const router = express.Router();
const asyncMiddleware = require("./asyncMiddleware");
const {user_dao} = require("sport-track-db");
const htmlescape = require("./htmlescape");



router.get('/', asyncMiddleware(async (req, res, next) => {
    if (!req.session.email) {
        res.redirect('/');
    }
    console.log(req.session.lname);
    console.log(req.session.email);

    res.render('profile', {
        lname: req.session.lname,
        fname: req.session.fname,
        bdate: req.session.bdate,
        gender: req.session.gender,
        height: req.session.height,
        weight: req.session.weight,
        session: req.session
    });
}));


router.post('/', asyncMiddleware(async (req, res, next) => {
    // if (await user_dao.verifyPassword(req.body.email, req.body.password)) {
    //     req.session.email = htmlescape(req.body.email);
    //     req.session.password = htmlescape(req.body.password);
    //     const User = await user_dao.findByKey(req.session.email);
    //     req.session.lname = User.lname;
    //     req.session.bdate = User.bdate;
    //     req.session.gender = User.gender;
    //     req.session.height = User.height;
    //     req.session.weight = User.weight;
    //     res.redirect('home');
    // } else {
    //     res.render('login', {error: true, fromregister: false});
    // }

    if (htmlescape(req.body.lname) != null && htmlescape(req.body.fname) != null &&
        htmlescape(req.body.bdate) != null && htmlescape(req.body.gender) != null && htmlescape(req.body.height) != null && htmlescape(req.body.weight) != null) {
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
        await user_dao.update(User.email, User);
        req.session.fname = User.fname;

        req.session.lname = User.lname;
        req.session.bdate = User.bdate;
        req.session.gender = User.gender;
        req.session.height = User.height;
        req.session.weight = User.weight;

        res.render('profile', {
            lname: req.session.lname,
            fname: req.session.fname,
            bdate: req.session.bdate,
            gender: req.session.gender,
            height: req.session.height,
            weight: req.session.weight,
            session: req.session,

            change: true
        });
    }

    res.render('profile', {
        lname: req.session.lname,
        fname: req.session.fname,
        bdate: req.session.bdate,
        gender: req.session.gender,
        height: req.session.height,
        weight: req.session.weight,
        session: req.session,

        change: false
    });

}));

module.exports = router;