const express = require('express');
const router = express.Router();
const asyncMiddleware = require("./functions").asyncMiddleware;

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (req.session.email) {
        res.redirect('home'); //Redirection sur home si l'utilisateur est déjà connecté
    }
    res.render('index');
}));

module.exports = router;
