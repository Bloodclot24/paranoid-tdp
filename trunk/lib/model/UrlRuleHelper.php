<?php
/**
 * Created by JetBrains PhpStorm.
 * User: juan
 * Date: 2/17/12
 * Time: 1:13 AM
 * To change this template use File | Settings | File Templates.
 */



class UrlRuleHelper {

    public static function getRouteName($doctrineIteratorObject) {

        $configuration = sfContext::getInstance()->getConfiguration();
        $configuration->loadHelpers('Url');

        $moduleName = "";
        $rule = $doctrineIteratorObject->getRawValue();
        $ruleClass = get_class($rule);
        switch ($ruleClass) {
            case "ReglaDias":
                $moduleName .= "regla_dias";
                break;
            case "ReglaLlamadasSimultaneas":
                $moduleName .= "regla_llamadas_simultaneas";
                break;
            case "ReglaCostoPorMinuto":
                $moduleName .= "regla_costo_por_minuto";
                break;
            default:
                return null;
        }
        $completeRoute = $moduleName."/edit?id=".$rule->getId();
        $url = url_for($completeRoute);

        return $url;
    }
}


?>