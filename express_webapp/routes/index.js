const express = require('express');
const router = express.Router();
const asyncMiddleware = require("./asyncMiddleware");

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (req.session.email) {
        res.render('home')
    }
    res.render('index')
}))

module.exports = router;
