<?php if (!defined('APPLICATION')) exit;

$PluginInfo['oembed'] = array(
    'Name'        => "OEmbed",
    'Description' => "OEmbed enables you to embed content from a myriad of different providers",
    'Version'     => '2.0.0',
    'PluginUrl'   => 'https://github.com/kasperisager/vanilla-oembed',
    'Author'      => "Kasper Kronborg Isager",
    'AuthorEmail' => 'kasperisager@gmail.com',
    'AuthorUrl'   => 'https://github.com/kasperisager',
    'License'     => 'MIT',
    'RequiredApplications' => array('Vanilla' => '2.2.x')
);

/**
 * OEmbed Plugin
 *
 * @author    Kasper Kronborg Isager <kasperisager@gmail.com>
 * @copyright 2014 (c) Kasper Kronborg Isager
 * @license   MIT
 * @package   OEmbed
 * @since     2.0.0
 */
class OEmbedPlugin extends Gdn_Plugin
{
    /**
     * Hook into the link handler of Gdn_Format and replace links from
     * providers that support OEmbed with embedable HTML.
     *
     * @since  2.0.0
     * @access public
     * @param  Gdn_Format $sender
     * @param  array      $args
     */
    public function base_links_handler($sender, $args)
    {
        $mixed =& $args['Mixed'];

        // Require Composer autoloader
        require_once PATH_PLUGINS . '/oembed/library/vendors/autoload.php';

        // Get instance of Essence library
        $essence = \Essence\Essence::instance();

        // Replace links with embedable HTML
        $mixed = $essence->replace($mixed, function($media) {
            $slug = str_replace(' ', '', ucwords($media->providerName));

            $media->set('providerSlug', $slug);

            include Gdn::controller()->fetchViewLocation($media->type, 'oembed', 'plugins/oembed');
        });
    }
}
