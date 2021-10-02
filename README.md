[Consignes TP](https://people.irisa.fr/Nicolas.Le_Sommer/ens/M3104/tps/)

[Site IUT](http://m3104.iut-info-vannes.net/m3104_24/)


#Modifications techniques :

Nous avons restreint l'accès aux dossiers model, sql et autres avec un fichier .htaccess et une jolie page 403.

Tout les champs rentrés par l'utilisateurs ont leurs caractères spéciaux échapés pour empecher les XSS.

Restriction du cookie à /m3104_24 pour que la session soit seulement utilisable sur notre site (pb de conflit entre les sites)

Site totalement responsive sur mobile.

#Pour tester : 

Fonctionne sous un serveur local, mais doit être dans un répertoire du style `localhost/m3104_24/`

Un compte sera créé : `prof@mail.com` avec le mot de passe `123456789`

Pour créer une activité, un fichier json_test.json est disponible avec une activité exemple.