<?php
/**
 * sfLinkCrossApp.
 *
 * this class for sfLinkCrossApp plugin
 *
 * @package    sfLinkCrossAppPlugin
 * @subpackage 
 * @author     dendie sanjaya
 * @version    
 */
class sfLinkCrossApp 
{
    /**
    * link_cross_app
    *
    * this function for link to cross application  
    * @author dendie sanjaya
    * @param string $app for add name of application
    * @param string $module for add module destination
    * @return string return string url
    * @example link_cross_app('appSampel','moduleSample/actionSample','dev')	
    */
    static public function linkTo($app, $module = '') 
    {   

        $initialScript = basename(sfContext::getInstance()->getRequest()->getScriptName());
        $initialConfigCurrent = sfConfig::getAll();
        $initialAppCurrent = sfContext::getInstance()->getConfiguration()->getApplication();    
    
        if(sfContext::getInstance()->getConfiguration()->getEnvironment() == 'prod')
        {
            $env = null;            
        }
        else
        {
            $env = sfContext::getInstance()->getConfiguration()->getEnvironment();           
        }

        $initialApp = $env == null ? $app.'.php' : $app.'_'.$env.'.php';

        if (!sfContext::hasInstance($app))
        {
            $context = sfContext::createInstance(ProjectConfiguration::getApplicationConfiguration($app, $env, false), $app);
        }
        else
        {
            $context = sfContext::getInstance($app);
        }


        if(!file_exists(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$initialApp))
        {
            $initialApp = 'index.php';
        }

        $tmpUrl = $context->getController()->genUrl($module, true);
        $url = str_replace($initialScript, $initialApp, $tmpUrl);    
        
        sfContext::switchTo($initialAppCurrent);
        sfConfig::add($initialConfigCurrent);
        unset($context);
        
        return $url;
    } 
}
?>
