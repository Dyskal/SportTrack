const express = require('express');
const router = express.Router();
const multer = require('multer');
const upload = multer({dest: 'public/uploads/'})
const fs = require('fs').promises;
const activity_dao = require('sport-track-db').activity_dao;
const asyncMiddleware = require("./asyncMiddleware");
const htmlescape = require("./htmlescape");

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (!req.session.email) {
        res.redirect('/');
    }
    res.render('upload');
}));

router.post('/', upload.single('file'), asyncMiddleware(async (req, res, next) => {
    function exit() {
        res.render('upload', {error: true})
    }
    const file = await JSON.parse((await fs.readFile(req.file.path)).toString());
    console.log(file);
    if (file.activity.date && file.activity.description) {
        const id = await activity_dao.getNextId();
        await activity_dao.insert(id, req.session.email, new Date(file.activity.date).toISOString().slice(0,10), htmlescape(file.activity.description), null, null, null, null, null, null);
        if (file.data) {

        } else {
            
        }
        //         $ActivityDataDAO = ActivityDataDAO::getInstance();
        //         if (!array_key_exists('file', $jsond)) {
        //             $this->exit();
        //         } else {
        //             foreach ($jsond['file'] as $line) {
        //                 if (!array_key_exists('time', $line) || !array_key_exists('cardio_frequency', $line) || !array_key_exists('latitude', $line) || !array_key_exists('longitude', $line) || !array_key_exists('altitude', $line)) {
        //                     break;
        //                 }
        //                 $file = new ActivityData();
        //                 $data_id = $ActivityDataDAO->getNextId();
        //                 $file->init($data_id, $activity_id, $line['time'], $line['cardio_frequency'], $line['latitude'], $line['longitude'], $line['altitude']);
        //                 $ActivityDataDAO->insert($file);
        //             }
        //         }
        //
        //         //Calcule la distance totale
        //         $distance = new CalculDistanceImpl();
        //         $activity_array = $ActivityDAO->find($activity_id);
        //         $activity = $activity_array[0];
        //         $activity->setDistance($distance->calculDistanceTrajet($distance->json_cut(json_encode($jsond['file']))));
        //         $ActivityDAO->update($activity);
    } else {
        exit();
    }

}));

module.exports = router;