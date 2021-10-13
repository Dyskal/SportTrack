const express = require('express');
const router = express.Router();
const user_dao = require('sport-track-db').user_dao;
const asyncMiddleware = require("./asyncMiddleware");
const htmlescape = require('./htmlescape');

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (req.session.email) {
        res.redirect('home');
    }
    res.render('login', {error: false, fromregister: false});
}));

router.post('/', asyncMiddleware(async (req, res, next) => {
    if (await user_dao.verifyPassword(req.body.email, req.body.password)) {
        req.session.email = htmlescape(req.body.email);
        req.session.password = htmlescape(req.body.password);
        const User = (await user_dao.findByKey(req.session.email))[0];
        req.session.fname = User.fname;
        req.session.lname = User.lname;
        req.session.bdate = User.bdate;
        req.session.gender = User.gender;
        req.session.height = User.height;
        req.session.weight = User.weight;
        res.redirect('home');
    } else {
        res.render('login', {error: true, fromregister: false});
    }
}));

router.get('/disconnect', asyncMiddleware(async (req, res, next) => {
    req.session.destroy();
    res.redirect('/');
}));

module.exports = router;