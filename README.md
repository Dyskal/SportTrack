[Consignes TP](https://people.irisa.fr/Nicolas.Le_Sommer/ens/M3104/tps/)

[Site IUT](http://m3104.iut-info-vannes.net/m3104_24/)


# Modifications techniques :

Tous les champs rentrés par l'utilisateur ont leurs caractères spéciaux échapés pour empecher les XSS.

Tout les callbacks ont été remplacés par des promesses.

Sauvegarde de la session dans un cookie pour la persistance.

Site totalement responsive sur mobile.

# Pour tester : 

Lancer `npm install` dans la base du projet et dans `express_webapp`. (Testé uniquement avec Node v16)

Lancer `npm start` depuis la base du projet ou depuis le dossier `express_webapp`.

Fonctionne sous un serveur local `localhost:3000`.

Un compte sera créé : `prof@mail.com` avec le mot de passe `123456789`.

Pour créer une activité, deux fichiers `json_test.json` et `json_test2.json` sont disponibles avec une activité exemple.
