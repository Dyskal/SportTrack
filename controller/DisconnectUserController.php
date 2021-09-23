<?php

class DisconnectUserController {
    public  function __construct(){
        $this->disconnect();
    }

    public function handle($request) {
        // TODO: Implement handle() method.
    }
    public function disconnect(){
        session_start();
        session_destroy();
        ?>
        <head>
            <meta charset="UTF-8">
            <title>SportTrack | Accueil</title>
            <link href="../style/style.css" rel="stylesheet">
            <link href="../img/logo.svg" rel="icon"/>
        </head>
        <div class=loading-content><div class=loading1></div><div class=loading2></div><div class=loading3></div></div>
        <script type="text/javascript">
            window.location.href = '..';
        </script>

        <?php

    }
}

$o = new DisconnectUserController();