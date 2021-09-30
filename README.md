[Consignes TP](https://people.irisa.fr/Nicolas.Le_Sommer/ens/M3104/tps/)

[Site IUT](http://m3104.iut-info-vannes.net/m3104_24/)

Nous avons restreint l'accès aux dossiers model, sql et autres avec un fichier .htaccess et une jolie page 403.
Tout les champs rentrés par l'utilisateurs ont leurs caractères spéciaux échapés pour empecher les XSS.
Restriction du cookie à /m3104_24 pour que la session soit seulement utilisable sur notre site (pb de conflit entre les sites)