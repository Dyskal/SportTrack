const express = require('express');
const router = express.Router();
const user_dao = require('sport-track-db').user_dao;

router.get('/', async function (req, res) {
    res.render('login')
});

router.post('/', async function (req, res) {
    //if password valid
    if (req.session.email === undefined) {
        req.session.email = req.body.email;
    }
    //full bullshit a changer
    const usr = await user_dao.findByKey(req.body.email)
    if (usr.length === 0) {
        if (req.body.email != null && req.body.password != null && req.body.lname != null && req.body.fname != null && req.body.bdate != null &&
            req.body.gender != null && req.body.height != null && req.body.weight != null) {
            await user_dao.insert(req.body)
            res.render('login')
        }
    }
    res.render('error', {message: "camarchpa", error: {status: 200, stack: "lalal"}})
})

router.post('/disconnect', async function (req, res) {
    req.session.destroy()
    res.render('/')
})

module.exports = router;