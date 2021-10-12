const express = require('express');
const router = express.Router();
const asyncMiddleware = require("./asyncMiddleware");

router.get('/', asyncMiddleware(async (req, res, next) => {
    //TODO if pas de session degage
    res.render('profile');
}));

module.exports = router;