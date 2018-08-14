<?php

/**
 * Class Router
 * Component for working with routes
 */
class Router
{
    /**
     * @var array with routes
     */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * process request
     */
    public function run()
    {
        //get URI
        $uri = $this->getURI();

        //find if there is route in array of routes
        foreach ($this->routes as $uriPattern => $path) {

            //compare uriPattern with $uri
            if (preg_match("~^$uriPattern$~", $uri)) {

                //get internal route from external
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //determine controller, action and parameters
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;

                //include controller class file
                $controllerFile = './controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //creating object of controller class file
                $controllerObject = new $controllerName;

                //call for defined method with defined parameters
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                //if success, end router work
                if ($result != null) {
                    return;
                }
            }
        }
        //else show 404 page
        include_once(ROOT.'/views/404.php');
    }

    /**
     * @return string with URI excluding server subfolders
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            //$subfolder = include_once (ROOT.'/config/route_path.php');
            $uri = preg_replace("/".FOLDER."/", "", $_SERVER['REQUEST_URI']);
            return trim($uri, '/');
        }
    }


}