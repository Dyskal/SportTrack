const express = require('express');
const router = express.Router();
const user_dao = require('sport-track-db').user_dao;
router.get('/', async function (req, res, next) {
    const rows = await user_dao.findAll();
    res.render('users', {data: rows})
});
module.exports = router;