const express = require('express');
const router = express.Router();
const user_dao = require('sport-track-db').user_dao;
const asyncMiddleware = require("./asyncMiddleware");

router.get('/', asyncMiddleware(async (req, res, next) => {
    const rows = await user_dao.findAll();
    res.render('users', {data: rows})
}))

router.post('/', asyncMiddleware(async (req, res, next) => {
    const usr = await user_dao.findByKey(req.body.email)
    if (usr.length === 0) {
        if (req.body.email != null && req.body.password != null && req.body.lname != null && req.body.fname != null && req.body.bdate != null &&
            req.body.gender != null && req.body.height != null && req.body.weight != null) {
            await user_dao.insert(req.body)
            res.render('login')
        }
    }
    res.render('error', {message: "Error"})
}))

module.exports = router;