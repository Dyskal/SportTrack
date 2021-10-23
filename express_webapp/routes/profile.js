const express = require('express');
const router = express.Router();
const user_dao = require("sport-track-db").user_dao;
const asyncMiddleware = require("./functions").asyncMiddleware;
const htmlescape = require("./functions").htmlescape;

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (!req.session.email) {
        res.redirect('/');
    }
    res.render('profile', {session: req.session});
}));

//Modification des informations de l'utilisateur via un update de la table
router.post('/', asyncMiddleware(async (req, res, next) => {
    //Vérifie que les informations sont bonnes
    if (req.session.email && req.session.password && req.body.lname && req.body.fname && req.body.bdate && req.body.gender && req.body.height && req.body.weight) {
        const User = {
            email: req.session.email,
            password: req.session.password,
            lname: htmlescape(req.body.lname),
            fname: htmlescape(req.body.fname),
            bdate: htmlescape(req.body.bdate),
            gender: htmlescape(req.body.gender),
            height: htmlescape(req.body.height),
            weight: htmlescape(req.body.weight),
        };
        await user_dao.update(User.email, User);

        //Modification des informations de session avec les nouvelles données
        req.session.fname = User.fname;
        req.session.lname = User.lname;
        req.session.bdate = User.bdate;
        req.session.gender = User.gender;
        req.session.height = User.height;
        req.session.weight = User.weight;

        //Retour sur la page profile avec le parametre change = true pour indiquer que toutes les modifications ont été effectuées
        res.render('profile', {session: req.session, change: true});
    }

    //Retour sur la page profile avec le parametre change = false pour indiquer qu'il y a un problème
    res.render('profile', {session: req.session, change: false});
}));

module.exports = router;