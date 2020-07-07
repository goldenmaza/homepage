<?php

	/**
	 * Alpha_Education.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Education-profile.
	 * 
	 * @package				Homepage
	 * @author				Mats Richard Hellstrand
	 * @copyright			Copyright (c) 2015-2020, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				July 7th, 2020 - Version 1.2
	 */
	// ===========================================================================

	class Alpha_Education {
		private $number 		= NULL;
		private $institution 	= NULL;
		private $level 			= NULL;
		private $major 			= NULL;
		private $name 			= NULL;
		private $points 		= NULL;
		private $location 		= NULL;
		private $graduation 	= NULL;
		private $website 		= NULL;
		private $description 	= NULL;
		private $keyword 		= NULL;
		
		/**
		 * The default constructor of the Alpha_Education-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->institution 	= $dataArray[1];
			$this->level 		= $dataArray[2];
			$this->major 		= $dataArray[3];
			$this->name 		= $dataArray[4];
			$this->points 		= $dataArray[5];
			$this->location 	= $dataArray[6];
			$this->graduation 	= $dataArray[7];
			$this->website 		= $dataArray[8];
			$this->description 	= $dataArray[9];
			$this->keyword 		= $dataArray[10];
		}

		// ===========================================================================

		/**
		 * Alpha_Education - getObject
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
		 * Alpha_Education - getNumber
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
		 * Alpha_Education - getInstitution
		 * 
		 * This function is used for returning the institution attribute
		 * 
		 * @access		public
		 * @return		integer		the institution attribute loaded from the database table
		 */
		public function getInstitution() {
			return $this->institution;
		}

		/**
		 * Alpha_Education - getLevel
		 * 
		 * This function is used for returning the level attribute
		 * 
		 * @access		public
		 * @return		integer		the level attribute loaded from the database table
		 */
		public function getLevel() {
			return $this->level;
		}

		/**
		 * Alpha_Education - getMajor
		 * 
		 * This function is used for returning the major attribute
		 * 
		 * @access		public
		 * @return		integer		the major attribute loaded from the database table
		 */
		public function getMajor() {
			return $this->major;
		}

		/**
		 * Alpha_Education - getName
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
		 * Alpha_Education - getPoints
		 * 
		 * This function is used for returning the points attribute
		 * 
		 * @access		public
		 * @return		integer		the points attribute loaded from the database table
		 */
		public function getPoints() {
			return $this->points;
		}

		/**
		 * Alpha_Education - getLocation
		 * 
		 * This function is used for returning the location attribute
		 * 
		 * @access		public
		 * @return		integer		the location attribute loaded from the database table
		 */
		public function getLocation() {
			return $this->location;
		}

		/**
		 * Alpha_Education - getGraduation
		 * 
		 * This function is used for returning the graduation attribute
		 * 
		 * @access		public
		 * @return		integer		the graduation attribute loaded from the database table
		 */
		public function getGraduation() {
			return $this->graduation;
		}

		/**
		 * Alpha_Education - getWebsite
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
		 * Alpha_Education - getDescription
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
		 * Alpha_Education - getKeyword
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
