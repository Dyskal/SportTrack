<?php
require('Controller.php');
class DisconnectUserController implements Controller {
    public function __construct() {
        $this->disconnect();
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function disconnect() {
        session_set_cookie_params(['lifetime' => 0, 'path' => '/m3104_24', 'domain' => '', 'secure' => false, 'httponly' => false, 'samesite' => '']);
        session_start();
        session_destroy();
        //Destruction de la session
        ?>

        <!--Lancement d'un petit menu de chargement-->
        <head>
            <meta charset="UTF-8">
            <title>SportTrack | Accueil</title>
            <link href="../style/style.css" rel="stylesheet">
            <link href="../img/logo.svg" rel="icon"/>
        </head>
        <div class=loading-content>
            <div class=loading1></div>
            <div class=loading2></div>
            <div class=loading3></div>
        </div>

        <!--Redirige l'utilisateur vers la page principale-->
        <script type="text/javascript">
            window.location.href = '..';
        </script>
        <?php
    }

    public function handle($request) {}
}
$o = new DisconnectUserController();
?>