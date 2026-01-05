<?php

namespace ShadowCoders\ShadowCoders\Listener;

use XF\Mvc\Entity\Entity;

class Listener
{
    /**
     * Logic to execute during app initialization.
     */
    public static function appSetup(\XF\App $app)
    {
        // Placeholder for initial setup logic if needed.
    }

    /**
     * This method hooks into the entity structure to determine
     * if content should be blurred based on guest status.
     */
    public static function postEntityStructure(
        \XF\Mvc\Entity\Manager $em,
        \XF\Mvc\Entity\Structure &$structure,
    ) {
        // You can use this to inject 'is_blurred' properties into the Post entity
        // if you want to handle logic at the data layer.
    }

    /**
     * Example of a template hook that could be called via an event listener
     * to wrap the post body in a blur container.
     */
    public static function templaterMacroPreRender(
        \XF\Template\Templater $templater,
        &$type,
        &$template,
        &$name,
        array &$arguments,
        array &$globalVars,
    ) {
        // Check if we are rendering a post and the visitor is a guest
        if ($name == "post" && !\XF::visitor()->user_id) {
            // Logic to signal the template to apply the .u-blurContent class
            $arguments["blurContent"] = true;
        }
    }
}
