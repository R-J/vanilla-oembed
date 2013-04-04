<?php if (!defined('APPLICATION')) exit();

$PluginInfo['OEmbed'] = array(
   'Name'         => 'OEmbed',
   'Description'  => 'OEmbed enables you to embed all sorts of cool stuff besides Youtube and Vimeo videos in discussions and comments.',
   'Version'      => '1.2',
   'Author'       => 'Kasper K. Isager',
   'AuthorEmail'  => 'kasperisager@gmail.com',
   'AuthorUrl'    => 'http://github.com/kasperisager'
);

/**
 * OEmbed plugin for Vanilla
 *
 * @package    Addons
 * @version    1.2
 * @author     Kasper Kronborg Isager <kasperisager@gmail.com>
 * @copyright  Copyright © 2013
 * @license    http://opensource.org/licenses/MIT MIT
 */
class OEmbed extends Gdn_Plugin
{
	/**
    * Add OEmbed to discussion pages
    * 
    * @param  Gdn_Controller $Sender
    * @since  1.0
    * @access public
    */
   public function DiscussionController_Render_Before($Sender)
   {
      $Sender->AddCssFile('oembed.css', 'plugins/OEmbed');
      $Sender->AddJsFile('jquery.oembed.js', 'plugins/OEmbed');
      $Sender->AddJsFile('jquery.providers.js', 'plugins/OEmbed');
   }
}