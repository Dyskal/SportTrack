const express = require('express');
const router = express.Router();
const user_dao = require("sport-track-db").user_dao;
const asyncMiddleware = require("./asyncMiddleware");
const htmlescape = require("./htmlescape");

router.get('/', asyncMiddleware(async (req, res, next) => {
    res.render('register', {error: false})
}))

router.post('/', asyncMiddleware(async (req, res, next) => {
    const usr = await user_dao.findByKey(htmlescape(req.body.email))
    if (usr.length === 0) {
        if (htmlescape(req.body.email) != null && htmlescape(req.body.password) != null && htmlescape(req.body.lname) != null && htmlescape(req.body.fname) != null &&
            htmlescape(req.body.bdate) != null && htmlescape(req.body.gender) != null && htmlescape(req.body.height) != null && htmlescape(req.body.weight) != null) {
            const User = {
                email: htmlescape(req.body.email),
                password: htmlescape(req.body.password),
                lname: htmlescape(req.body.lname),
                fname: htmlescape(req.body.fname),
                bdate: htmlescape(req.body.bdate),
                gender: htmlescape(req.body.gender),
                height: htmlescape(req.body.height),
                weight: htmlescape(req.body.weight),
            }
            await user_dao.insert(User)
            res.render('login', {error: false, fromregister: true})
        }
    }
    res.render('register', {error: true})
}))

module.exports = router;