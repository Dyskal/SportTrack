const express = require('express');
const router = express.Router();
const upload = require('multer')({dest: 'uploads/'});
const fs = require('fs').promises;
const activity_dao = require('sport-track-db').activity_dao;
const activity_data_dao = require('sport-track-db').activity_data_dao;
const asyncMiddleware = require("./functions").asyncMiddleware;
const htmlescape = require("./functions").htmlescape;
const calculDistanceTrajet = require("./functions").calculDistanceTrajet;

router.get('/', asyncMiddleware(async (req, res, next) => {
    if (!req.session.email) {
        res.redirect('/');
    }
    res.render('upload', {error: false});
}));

//Route pour charger un fichier d'activité
router.post('/', upload.single('file'), asyncMiddleware(async (req, res, next) => {
    //Gestion d'erreur, essaye de supprimer le fichier uploadé s'il a été enregistré et renvoie vers la page upload avec une erreur
    async function exit() {
        try {
            await fs.unlink(req.file.path);
        } catch (ignored) {}
        res.render('upload', {error: true});
    }

    //Try/Catch pour la structure du JSON
    try {
        //Lit le fichier et parse son contenu, vérifie que chaque partie du JSON existe, dans le cas contraire, appel à la fct exit()
        const file = await JSON.parse((await fs.readFile(req.file.path)).toString());
        if (file.activity.date && file.activity.description) {
            const activity_id = await activity_dao.getNextId();
            const Activity = {
                id: activity_id,
                user_id: req.session.email,
                date: new Date(file.activity.date).toISOString().slice(0, 10),
                description: htmlescape(file.activity.description),
                start_time: null,
                duration: null,
                distance: null,
                freq_min: null,
                freq_max: null,
                freq_avg: null
            };

            if (file.data && file.data.length !== 0) {
                await activity_dao.insert(Activity);
                for (const row of file.data) {
                    const data_id = await activity_data_dao.getNextId();
                    if (row.time && row.cardio_frequency && row.latitude && row.longitude && row.altitude) {
                        const ActivityData = {
                            data_id: data_id,
                            activity_id: activity_id,
                            time: row.time,
                            cardio_frequency: row.cardio_frequency,
                            latitude: row.latitude,
                            longitude: row.longitude,
                            altitude: row.altitude
                        };
                        await activity_data_dao.insert(ActivityData);
                    } else {
                        await exit();
                    }
                }

                const Activity_arr = await activity_dao.findByKey(activity_id);
                Activity_arr.distance = calculDistanceTrajet(file.data);
                await activity_dao.update(Activity_arr.id, Activity_arr);
            } else {
                await exit();
            }
            //Supprime le fichier et redirige vers home pour afficher l'activité
            await fs.unlink(req.file.path);
            res.redirect('home');
        } else {
            await exit();
        }
    } catch (error) {
        await exit();
    }
}));

module.exports = router;