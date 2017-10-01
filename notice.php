<?php

	// State any problems with the code.
	//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	/**
	 * notice.php
	 *
	 * This file is used for setting up the notice-page.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2017, Mats Richard Hellstrand
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 5th, 2017 - Version 1.1
	 */
	 
	// ===========================================================================
	
	// Turn on the output buffering.
	ob_start();

	$title 		= "goldenmaza - Software Developer";
	$date 		= "2015-" . date("Y");

	echo '
		<div id="welcomeScreen" class="welcome" style="top: 0; left: 0; margin: auto; font-size: 1.5em;">
			<p>
				I am sorry, but your browser is incompatible with the current design.<br/>
				Please update your browser or use another to access the full experience.<br/><br/>
				Kind regards<br/>
				Richard<br/><br/>
				If you wanna get in contact with me: <a href="mailto:anubis@live.se" title="Get in contact with me on my public e-mail address!">goldenmaza</a>
			</p>
		</div>
	';
	
	// Assign the variable the content of the buffer, which is used in the template.
	$content 	= ob_get_contents();
	
	// Empty the buffer and turn off output buffering.
	ob_end_clean();
	
	// Include the template, which is used for creating the entire website.
	require_once("noticeTemplate.php");

?>