<?php

	/**
	 * Alpha_Download.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Download-profile.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2016, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	class Alpha_Download {
		private $number 		= NULL;
		private $name 			= NULL;
		private $filename 		= NULL;
		
		/**
		 * The default constructor of the Alpha_Download-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->name 		= $dataArray[1];
			$this->filename 	= $dataArray[2];
		}
		
		// ===========================================================================

	    /**
		 * Alpha_Download - getObject
		 * 
		 * This function is used for returning non-static properties of the given object
		 * 
		 * @access		public
		 * @return		array		return the properties of the given object
		 */
		public function getObject() {
			return get_object_vars($this);
		}

	    /**
		 * Alpha_Download - getNumber
		 * 
		 * This function is used for returning the id attribute
		 * 
		 * @access		public
		 * @return		integer		the id attribute loaded from the database table
		 */
		public function getNumber() {
			return $this->number;
		}

	    /**
		 * Alpha_Download - getName
		 * 
		 * This function is used for returning the name attribute
		 * 
		 * @access		public
		 * @return		string		the name attribute loaded from the database table
		 */
		public function getName() {
			return $this->name;
		}

	    /**
		 * Alpha_Download - getFilename
		 * 
		 * This function is used for returning the filename attribute
		 * 
		 * @access		public
		 * @return		string		the filename attribute loaded from the database table
		 */
		public function getFilename() {
			return $this->filename;
		}
	}

?>