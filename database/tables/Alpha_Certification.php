<?php

	/**
	 * Alpha_Certification.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Certification-profile.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2016, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	class Alpha_Certification {
		private $number 		= NULL;
		private $category 		= NULL;
		private $name 			= NULL;
		private $nominated 		= NULL;
		private $publisher		= NULL;
		private $website 		= NULL;
		private $description 	= NULL;
		private $directory 		= NULL;
		
		/**
		 * The default constructor of the Alpha_Certification-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->category 	= $dataArray[1];
			$this->name 		= $dataArray[2];
			$this->nominated 	= $dataArray[3];
			$this->publisher	= $dataArray[4];
			$this->website 		= $dataArray[5];
			$this->description 	= $dataArray[6];
			$this->directory 	= $dataArray[7];
		}
		
		// ===========================================================================

		/**
		 * Alpha_Certification - getObject
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
		 * Alpha_Certification - getNumber
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
		 * Alpha_Certification - getCategory
		 * 
		 * This function is used for returning the category attribute
		 * 
		 * @access		public
		 * @return		string		the category attribute loaded from the database table
		 */
		public function getCategory() {
			return $this->category;
		}

		/**
		 * Alpha_Certification - getName
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
		 * Alpha_Certification - getNominated
		 * 
		 * This function is used for returning the nominated attribute
		 * 
		 * @access		public
		 * @return		string		the nominated attribute loaded from the database table
		 */
		public function getNominated() {
			return $this->nominated;
		}

		/**
		 * Alpha_Certification - getPublisher
		 * 
		 * This function is used for returning the publisher attribute
		 * 
		 * @access		public
		 * @return		string		the publisher attribute loaded from the database table
		 */
		public function getPublisher() {
			return $this->publisher;
		}

		/**
		 * Alpha_Certification - getWebsite
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
		 * Alpha_Certification - getDescription
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
		 * Alpha_Certification - getDirectory
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