<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('model/SQLiteConnection.php');
include('model/ActivityDAO.php');
include('model/ActivityDataDAO.php');
include('model/UserDAO.php');

$db = SQLiteConnection::getInstance();
$adao = ActivityDAO::getInstance();
$addao = ActivityDataDAO::getInstance();
$udao = UserDAO::getInstance();
$user = new User();
$user->init('trobienjesuis@surgmail.com', 'aa5=_%aaaaaaaaaaa', 'nom', 'prenom', '2021-09-08', 'W', 12, 120);
$activity = new Activity();
$activity->init(1, 'trobienjesuis@surgmail.com', '2021-09-09', "lezgongue a l'iut", null, null, null, null, null);
$activity->init(2, 'trobienjesuis@surgmail.com', '2021-09-09', "lezgongue a l'iut", null, null, null, null, null);
$activity->init(3, 'trobienjesuis@surgmail.com', '2021-09-09', "lezgongue a l'iut", null, null, null, null, null);
$activity_data = new ActivityData();
$activity_data->init(1, 1, '13:00:00', 95, 1.5, -2.65, 18);
$udao->delete($user);
$adao->delete($activity);
$addao->delete($activity_data);
$udao->insert($user);
$adao->insert($activity);
$addao->insert($activity_data);
echo('<pre>');
var_dump($udao->findAll());
echo('</pre>');
echo("</br>");
echo("</br>");
echo('<pre>');
var_dump($adao->findAll());
echo('</pre>');
echo("</br>");
echo("</br>");
echo('<pre>');
var_dump($addao->findAll());
echo('</pre>');
?>
