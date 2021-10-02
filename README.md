[Consignes TP](https://people.irisa.fr/Nicolas.Le_Sommer/ens/M3104/tps/)

[Site IUT](http://m3104.iut-info-vannes.net/m3104_24/)


#Modifications techniques :

Nous avons restreint l'accès aux dossiers model, sql et views avec un fichier .htaccess et une jolie page 403.

Nous n'avons pas utilisé les controlleurs dans les routes car, de la manière dont nous l'avons codé,
nous devions avoir la vue avant le controller, et appeller le controller depuis la vue, ce qui n'etait pas possible avec cette configuration.

Tout les champs rentrés par l'utilisateurs ont leurs caractères spéciaux échapés pour empecher les XSS.

Restriction du cookie à /m3104_24 pour que la session soit seulement utilisable sur notre site (pb de conflit entre les sites).
Mais une session d'un autre site pourrait interférer avec notre site.

Site totalement responsive sur mobile.

#Pour tester : 

Fonctionne sous un serveur local, mais doit être dans un répertoire du style `localhost/m3104_24/`

Un compte sera créé : `prof@mail.com` avec le mot de passe `123456789`

Pour créer une activité, un fichier json_test.json est disponible avec une activité exemple.