<?php

class frontendConfiguration extends sfApplicationConfiguration {
  public function configure() {
  }

  protected $backendRouting = null ;

  public function generateBackendUrl($name, $parameters = array()) {
    return 'http://mys/backend_dev.php'.$this->getBackendRouting()->generate($name, $parameters);
  }

  public function getBackendRouting() {
    if (!$this->backendRouting) {
      $this->backendRouting = new sfPatternRouting(new sfEventDispatcher());

      $config = new sfRoutingConfigHandler();
      $routes = $config->evaluate(array(sfConfig::get('sf_apps_dir').'/backend/config/routing.yml'));

      $this->backendRouting->setRoutes($routes);
    }

    return $this->backendRouting;
  }
}
