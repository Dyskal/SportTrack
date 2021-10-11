const express = require('express');
const router = express.Router();
const asyncMiddleware = require("./asyncMiddleware");
const user_dao = require("sport-track-db").user_dao;

router.get('/', asyncMiddleware(async (req, res, next) => {
    res.render('register', {error: false})
}))

router.post('/', asyncMiddleware(async (req, res, next) => {
    const usr = await user_dao.findByKey(req.body.email)
    if (usr.length === 0) {
        if (req.body.email != null && req.body.password != null && req.body.lname != null && req.body.fname != null && req.body.bdate != null &&
            req.body.gender != null && req.body.height != null && req.body.weight != null) {
            await user_dao.insert(req.body)
            res.render('login', {error: false, fromregister: true})
        }
    }
    res.render('register', {error: true})
}))

module.exports = router;