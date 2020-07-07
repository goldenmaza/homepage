<?php

	/**
	 * Alpha_Testimonial.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Testimonial-profile.
	 * 
	 * @package				Homepage
	 * @author				Mats Richard Hellstrand
	 * @copyright			Copyright (c) 2015-2020, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				July 7th, 2020 - Version 1.2
	 */
	// ===========================================================================

	class Alpha_Testimonial {
		private $number 		= NULL;
		private $author 		= NULL;
		private $company 		= NULL;
		private $website 		= NULL;
		private $authored		= NULL;
		private $description 	= NULL;
		private $short 			= NULL;
		
		/**
		 * The default constructor of the Alpha_Testimonial-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->author 		= $dataArray[1];
			$this->company 		= $dataArray[2];
			$this->website 		= $dataArray[3];
			$this->authored 	= $dataArray[4];
			$this->description 	= $dataArray[5];
			$this->short 		= $dataArray[6];
		}

		// ===========================================================================

		/**
		 * Alpha_Testimonial - getObject
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
		 * Alpha_Testimonial - getNumber
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
		 * Alpha_Testimonial - getAuthor
		 * 
		 * This function is used for returning the author attribute
		 * 
		 * @access		public
		 * @return		integer		the author attribute loaded from the database table
		 */
		public function getAuthor() {
			return $this->author;
		}

		/**
		 * Alpha_Testimonial - getCompany
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
		 * Alpha_Testimonial - getWebsite
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
		 * Alpha_Testimonial - getAuthored
		 * 
		 * This function is used for returning the authored attribute
		 * 
		 * @access		public
		 * @return		date		the authored attribute loaded from the database table
		 */
		public function getAuthored() {
			return $this->authored;
		}

		/**
		 * Alpha_Testimonial - getDescription
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
		 * Alpha_Testimonial - getShort
		 * 
		 * This function is used for returning the short attribute
		 * 
		 * @access		public
		 * @return		string		the short attribute loaded from the database table
		 */
		public function getShort() {
			return $this->short;
		}
	}

?>
