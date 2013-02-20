<?php
// no direct access
defined('_JEXEC') or die;

jimport('joomla.event.plugin');

class plgUserPassgen extends JPlugin
{
    /**
     * Constructor
     *
     * @access      protected
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     * @since       1.5
     */
    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage();
    }

    /**
     * @param	string	$context	The context for the data
     * @param	int		$data		The user id
     * @param	object
     *
     * @return	boolean
     * @since	1.6
     */
    function onContentPrepareData($context, $data)
    {
        // Check we are manipulating a valid form.
        if (!in_array($context, array('com_users.profile', 'com_users.user', 'com_users.registration', 'com_admin.profile')))
        {
            return true;
        }


        $document = & JFactory::getDocument();
        $document->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js");
        $document->addScript("http://jquery-easypassgen.googlecode.com/svn/trunk/jquery.easypassgen.js");
        $document->addCustomTag( '<script type="text/javascript">jQuery.noConflict();</script>' );
        $document->addCustomTag( '<script type="text/javascript">jQuery(document).ready(function(){

$("div.password").easypassgen();

});</script>' );
        echo '<div class="password">Test 2</div>';

    }
}