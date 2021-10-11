const express = require('express');
const router = express.Router();
const user_dao = require('sport-track-db').user_dao;
const asyncMiddleware = require("./asyncMiddleware");

router.get('/', asyncMiddleware(async (req, res, next) => {
    res.render('login', {error: false, fromregister: false})
}))

router.post('/', asyncMiddleware(async (req, res, next) => {
    if (await user_dao.verifyPassword(req.body.email, req.body.password)) {
        req.session.email = req.body.email;
        req.session.password = req.body.password;
        req.session.lname = req.body.lname;
        req.session.bdate = req.body.bdate;
        req.session.gender = req.body.gender;
        req.session.height = req.body.height;
        req.session.weight = req.body.weight;
        res.render('home')
    } else {
        res.render('login', {error: true, fromregister: false})
    }
}))

router.get('/disconnect', asyncMiddleware(async (req, res, next) => {
    req.session.destroy()
    res.render('index')
}))

module.exports = router;