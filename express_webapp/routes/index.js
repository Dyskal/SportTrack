const express = require('express');
const router = express.Router();
const activity_dao = require("sport-track-db").activity_dao;
const asyncMiddleware = require("./asyncMiddleware");

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (req.session.email) {
        res.render('home', {activities : await activity_dao.findByUser(req.session.email)});
    }
    res.render('index');
}));

module.exports = router;
