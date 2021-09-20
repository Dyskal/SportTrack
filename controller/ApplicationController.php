<?php
class ApplicationController {
    private static $instance;
    private $routes;

    private function __construct() {
        // Sets the controller and the view of the application.
        $this->routes = [
            '/' => ['controller' => 'MainController', 'view' => 'MainView'],
            'error' => ['controller' => null, 'view' => 'ErrorView']
        ];
    }

    /**
     * Returns the single instance of this class.
     * @return ApplicationController the single instance of this class.
     */
    public static function getInstance(): ApplicationController {
        if (!isset(self::$instance)) {
            self::$instance = new ApplicationController;
        }
        return self::$instance;
    }

    /**
     * Returns the controller that is responsible for processing the request
     * specified as parameter. The controller can be null if there is no data to
     * process.
     * @param Array $request The HTTP request.
     * @param Controller The controller that is responsible for processing the
     * request specified as parameter.
     */
    public function getController(array $request) {
        if (array_key_exists($request['page'], $this->routes)) {
            return $this->routes[$request['page']]['controller'];
        }
        return null;
    }

    /**
     * Returns the view that must be return in response of the HTTP request
     * specified as parameter.
     * @param Array $request The HTTP request.
     * @param Object The view that must be return in response of the HTTP request
     * specified as parameter.
     */
    public function getView(array $request) {
        if (array_key_exists($request['page'], $this->routes)) {
            return $this->routes[$request['page']]['view'];
        }
        return $this->routes['error']['view'];
    }
}
?>
