<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\IPtoCompany;

use Piwik\Piwik;
use Piwik\Plugin;
use Piwik\SettingsPiwik;
use Piwik\Widget\WidgetsList;

class IPtoCompany extends \Piwik\Plugin
{
    /**
     * @see \Piwik\Plugin::registerEvents
     */
    public function registerEvents()
    {
        return array(
            //'AssetManager.getJavaScriptFiles' => 'getJsFiles',
            'AssetManager.getStylesheetFiles' => 'getStylesheetFiles',
            'Widget.filterWidgets' => 'filterWidgets'
        );
    }

    public function getStylesheetFiles(&$stylesheets)
    {
        $stylesheets[] = "plugins/IPtoCompany/stylesheets/iptocompany.less";
    }

    /*public function getJsFiles(&$jsFiles)
    {
        $jsFiles[] = "libs/bower_components/iframe-resizer/js/iframeResizer.min.js";

        $jsFiles[] = "plugins/Marketplace/angularjs/plugins/plugin-name.directive.js";
        $jsFiles[] = "plugins/Marketplace/angularjs/licensekey/licensekey.controller.js";
        $jsFiles[] = "plugins/Marketplace/angularjs/marketplace/marketplace.controller.js";
        $jsFiles[] = "plugins/Marketplace/angularjs/marketplace/marketplace.directive.js";
    }*/

    /**
     * @param WidgetsList $list
     */
    public function filterWidgets($list)
    {
        if (!SettingsPiwik::isInternetEnabled()) {
            $list->remove('IPtoCompany_Companies');
        }
    }
}
