<?php

	/**
	 * Alpha_Project.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Project-profile.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2016, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	class Alpha_Project {
		private $number 		= NULL;
		private $name 			= NULL;
		private $customer 		= NULL;
		private $position 		= NULL;
		private $beginning 		= NULL;
		private $ending 		= NULL;
		private $website 		= NULL;
		private $keyword 		= NULL;
		private $description 	= NULL;
		private $directory 		= NULL;
		
		/**
		 * The default constructor of the Alpha_Project-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->name 		= $dataArray[1];
			$this->customer 	= $dataArray[2];
			$this->position 	= $dataArray[3];
			$this->beginning 	= $dataArray[4];
			$this->ending 		= $dataArray[5];
			$this->website 		= $dataArray[6];
			$this->keyword 		= $dataArray[7];
			$this->description 	= $dataArray[8];
			$this->directory 	= $dataArray[9];
		}
		
		// ===========================================================================

	    /**
		 * Alpha_Project - getObject
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
		 * Alpha_Project - getNumber
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
		 * Alpha_Project - getName
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
		 * Alpha_Project - getCustomer
		 * 
		 * This function is used for returning the customer attribute
		 * 
		 * @access		public
		 * @return		string		the customer attribute loaded from the database table
		 */
		public function getCustomer() {
			return $this->customer;
		}

	    /**
		 * Alpha_Project - getPosition
		 * 
		 * This function is used for returning the position attribute
		 * 
		 * @access		public
		 * @return		string		the position attribute loaded from the database table
		 */
		public function getPosition() {
			return $this->position;
		}

	    /**
		 * Alpha_Project - getBeginning
		 * 
		 * This function is used for returning the beginning attribute
		 * 
		 * @access		public
		 * @return		date		the beginning attribute loaded from the database table
		 */
		public function getBeginning() {
			return $this->beginning;
		}

	    /**
		 * Alpha_Project - getEnding
		 * 
		 * This function is used for returning the ending attribute
		 * 
		 * @access		public
		 * @return		date		the ending attribute loaded from the database table
		 */
		public function getEnding() {
			return $this->ending;
		}

	    /**
		 * Alpha_Project - getWebsite
		 * 
		 * This function is used for returning the website attribute
		 * 
		 * @access		public
		 * @return		string		the website attribute loaded from the database table
		 */
		public function getWebsite() {
			return $this->website;
		}

	    /**
		 * Alpha_Project - getKeyword
		 * 
		 * This function is used for returning the keyword attribute
		 * 
		 * @access		public
		 * @return		string		the keyword attribute loaded from the database table
		 */
		public function getKeyword() {
			return $this->keyword;
		}

	    /**
		 * Alpha_Project - getDescription
		 * 
		 * This function is used for returning the description attribute
		 * 
		 * @access		public
		 * @return		string		the description attribute loaded from the database table
		 */
		public function getDescription() {
			return $this->description;
		}

	    /**
		 * Alpha_Project - getDirectory
		 * 
		 * This function is used for returning the directory attribute
		 * 
		 * @access		public
		 * @return		string		the directory attribute loaded from the database table
		 */
		public function getDirectory() {
			return $this->directory;
		}
	}

?>