<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {
  public function setup() {
    $this->enablePlugins(array(
      'sfDoctrinePlugin', 
      'sfLinkCrossAppPlugin',
      'mpRealityAdminPlugin',
      'sfFormExtraPlugin'
    ));
    sfConfig::set('masterTemplateUri', sprintf('%s/apps/frontend/templates/_header.php', sfConfig::get('sf_root_dir')));
  }
}
