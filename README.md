[Consignes TP](https://people.irisa.fr/Nicolas.Le_Sommer/ens/M3104/tps/)

[Site IUT](http://m3104.iut-info-vannes.net/m3104_24/)


# Modifications techniques :

Tout les champs rentrés par l'utilisateurs ont leurs caractères spéciaux échapés pour empecher les XSS.

Restriction du cookie à /m3104_24 pour que la session soit seulement utilisable sur notre site (pb de conflit entre les sites).
Mais une session d'un autre site pourrait interférer avec notre site.

Site totalement responsive sur mobile.

# Pour tester : 

Lancer `npm install` dans la base du projet et dans `express_webapp`.

Lancer `npm start` depuis la base du projet ou depuis le dossier `express_webapp`.

Fonctionne sous un serveur local `localhost/`.

Un compte sera créé : `prof@mail.com` avec le mot de passe `123456789`.

Pour créer une activité, un fichier json_test.json est disponible avec une activité exemple.
