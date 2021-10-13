const express = require('express');
const router = express.Router();
const asyncMiddleware = require("./asyncMiddleware");
const {activity_dao} = require("sport-track-db");

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (!req.session.email) {
        res.render('index');
    }
    res.render('home',{activities : await activity_dao.findByKey(req.session.email)[0]});
}));

module.exports = router;