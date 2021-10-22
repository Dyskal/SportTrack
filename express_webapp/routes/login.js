const express = require('express');
const router = express.Router();
const user_dao = require('sport-track-db').user_dao;
const asyncMiddleware = require("./functions").asyncMiddleware;
const htmlescape = require("./functions").htmlescape;

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (req.session.email) {
        res.redirect('home');//Redirection sur home si l'utilisateur est deja connecte
    }
    res.render('login', {error: false, fromregister: false});
}));

router.post('/', asyncMiddleware(async (req, res, next) => {
    if (req.body.email && req.body.password) {
        if (await user_dao.verifyPassword(req.body.email, req.body.password)) { //Verification du mot de passe saisie
            req.session.email = htmlescape(req.body.email);
            req.session.password = htmlescape(req.body.password);
            const User = await user_dao.findByKey(req.session.email);

            //Ajout des infos de l'utilisateur dans la session
            req.session.fname = User.fname;
            req.session.lname = User.lname;
            req.session.bdate = User.bdate;
            req.session.gender = User.gender;
            req.session.height = User.height;
            req.session.weight = User.weight;
            res.redirect('home');
        }
    }
    res.render('login', {error: true, fromregister: false});//Retour sur login avec une option indiquant une erreur
}));

//Deconnecte l'utilisateur
router.get('/disconnect', asyncMiddleware(async (req, res, next) => {
    req.session = null;
    res.redirect('/');
}));

module.exports = router;