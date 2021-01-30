<?php
/**
 * AnotherskyCustomize plugin for Craft CMS 3.x
 *
 *
 * @link      https://www.anothersky.pw
 * @copyright Copyright (c) 2021 Hideki Abe
 */

namespace hidekia\anotherskycustomize;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    Hideki Abe
 * @package   AnotherskyCustomize
 * @since     1.0.0
 *
 */
class AnotherskyCustomize extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * AnotherskyCustomize::$plugin
     *
     * @var AnotherskyCustomize
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * AnotherskyCustomize::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->hook('cp.entries.edit.content', function (array &$context) {
            return '<div style="margin-top: 1.5rem;">SiteGuard設定: <pre>./tools/setip ' . $_SERVER['REMOTE_ADDR'] . '</pre></div>';
        });

        Craft::info(
            Craft::t(
                'anothersky-customize',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

}
