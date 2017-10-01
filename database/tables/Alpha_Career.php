<?php

	/**
	 * Alpha_Career.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Career-profile.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2016, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	class Alpha_Career {
		private $number 		= NULL;
		private $company 		= NULL;
		private $position 		= NULL;
		private $employment 	= NULL;
		private $beginning 		= NULL;
		private $ending 		= NULL;
		private $website 		= NULL;
		private $description 	= NULL;
		private $keyword 		= NULL;
		
		/**
		 * The default constructor of the Alpha_Career-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->company 		= $dataArray[1];
			$this->position 	= $dataArray[2];
			$this->employment 	= $dataArray[3];
			$this->beginning 	= $dataArray[4];
			$this->ending 		= $dataArray[5];
			$this->website 		= $dataArray[6];
			$this->description 	= $dataArray[7];
			$this->keyword 		= $dataArray[8];
		}
		
		// ===========================================================================

	    /**
		 * Alpha_Career - getObject
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
		 * Alpha_Career - getNumber
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
		 * Alpha_Career - getCompany
		 * 
		 * This function is used for returning the company attribute
		 * 
		 * @access		public
		 * @return		string		the company attribute loaded from the database table
		 */
		public function getCompany() {
			return $this->company;
		}

	    /**
		 * Alpha_Career - getPosition
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
		 * Alpha_Career - getEmployment
		 * 
		 * This function is used for returning the employment attribute
		 * 
		 * @access		public
		 * @return		string		the employment attribute loaded from the database table
		 */
		public function getEmployment() {
			return $this->employment;
		}

	    /**
		 * Alpha_Career - getBeginning
		 * 
		 * This function is used for returning the beginning attribute
		 * 
		 * @access		public
		 * @return		string		the beginning attribute loaded from the database table
		 */
		public function getBeginning() {
			return $this->beginning;
		}

	    /**
		 * Alpha_Career - getEnding
		 * 
		 * This function is used for returning the ending attribute
		 * 
		 * @access		public
		 * @return		string		the ending attribute loaded from the database table
		 */
		public function getEnding() {
			return $this->ending;
		}

	    /**
		 * Alpha_Career - getWebsite
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
		 * Alpha_Career - getDescription
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
		 * Alpha_Career - getKeyword
		 * 
		 * This function is used for returning the keyword attribute
		 * 
		 * @access		public
		 * @return		string		the keyword attribute loaded from the database table
		 */
		public function getKeyword() {
			return $this->keyword;
		}
	}

?>