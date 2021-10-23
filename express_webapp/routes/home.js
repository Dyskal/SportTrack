const express = require('express');
const router = express.Router();
const activity_dao = require("sport-track-db").activity_dao;
const asyncMiddleware = require("./functions").asyncMiddleware;

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (!req.session.email) {
        res.redirect('/'); //Redirection sur index si l'utilisateur n'est pas connecté
    }
    res.render('home', {activities: await activity_dao.findByUser(req.session.email)});
}));

module.exports = router;