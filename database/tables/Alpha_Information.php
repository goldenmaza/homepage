<?php

	/**
	 * Alpha_Information.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Information-profile.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2017, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	class Alpha_Information {
		private $number 		= NULL;
		private $title			= NULL;
		private $paragraph 		= NULL;
		private $page			= NULL;
		private $group 			= NULL;
		
		/**
		 * The default constructor of the Alpha_Information-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->title 		= $dataArray[1];
			$this->paragraph 	= $dataArray[2];
			$this->page 		= $dataArray[3];
			$this->group 		= $dataArray[4];
		}
		
		// ===========================================================================

	    /**
		 * Alpha_Information - getObject
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
		 * Alpha_Information - getNumber
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
		 * Alpha_Information - getTitle
		 * 
		 * This function is used for returning the title attribute
		 * 
		 * @access		public
		 * @return		string		the title attribute loaded from the database table
		 */
		public function getTitle() {
			return $this->title;
		}

	    /**
		 * Alpha_Information - getParagraph
		 * 
		 * This function is used for returning the paragraph attribute
		 * 
		 * @access		public
		 * @return		string		the paragraph attribute loaded from the database table
		 */
		public function getParagraph() {
			return $this->paragraph;
		}

	    /**
		 * Alpha_Information - getPage
		 * 
		 * This function is used for returning the page attribute
		 * 
		 * @access		public
		 * @return		string		the page attribute loaded from the database table
		 */
		public function getPage() {
			return $this->page;
		}

	    /**
		 * Alpha_Information - getGroup
		 * 
		 * This function is used for returning the group attribute
		 * 
		 * @access		public
		 * @return		integer		the group attribute loaded from the database table
		 */
		public function getGroup() {
			return $this->group;
		}
	}

?>