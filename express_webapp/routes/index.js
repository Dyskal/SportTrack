const express = require('express');
const router = express.Router();
const asyncMiddleware = require("./functions").asyncMiddleware;

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (req.session.email) {
        res.redirect('home');
    }
    res.render('index');
}));

module.exports = router;
