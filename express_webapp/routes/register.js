const express = require('express');
const router = express.Router();
const user_dao = require("sport-track-db").user_dao;
const asyncMiddleware = require("./functions").asyncMiddleware;
const htmlescape = require("./functions").htmlescape;

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (req.session.email) {
        res.redirect('home');
    }
    res.render('register', {error: false});
}));

router.post('/', asyncMiddleware(async (req, res, next) => {
    if (req.body.email) {
        const usr = await user_dao.findByKey(htmlescape(req.body.email));
        if (usr.length === 0) { //S'il y a un utilisateur avec cette adresse mail, ne pas recréer un compte
            if (req.body.email && req.body.password && req.body.lname && req.body.fname && req.body.bdate && req.body.gender && req.body.height && req.body.weight) {
                //Utilisation d'htmlescape pour nettoyer les champs de l'utilisateur
                const User = {
                    email: htmlescape(req.body.email),
                    password: htmlescape(req.body.password),
                    lname: htmlescape(req.body.lname),
                    fname: htmlescape(req.body.fname),
                    bdate: htmlescape(req.body.bdate),
                    gender: htmlescape(req.body.gender),
                    height: htmlescape(req.body.height),
                    weight: htmlescape(req.body.weight),
                };
                await user_dao.insert(User);
                //Redirection vers login avec le paramètre error = false et fromregister = true pour afficher les notifications (cf fichier jade)
                res.render('login', {error: false, fromregister: true});
            }
        }
    }
    res.render('register', {error: true});
}));

module.exports = router;