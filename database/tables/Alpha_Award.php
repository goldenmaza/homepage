<?php

	/**
	 * Alpha_Award.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Award-profile.
	 * 
	 * @package				Homepage
	 * @author				Mats Richard Hellstrand
	 * @copyright			Copyright (c) 2015-2020, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				July 7th, 2020 - Version 1.2
	 */
	// ===========================================================================

	class Alpha_Award {
		private $number 		= NULL;
		private $publisher 		= NULL;
		private $name 			= NULL;
		private $nominated 		= NULL;
		private $score 			= NULL;
		private $website 		= NULL;
		private $description 	= NULL;
		private $directory 		= NULL;
		
		/**
		 * The default constructor of the Alpha_Award-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->publisher 	= $dataArray[1];
			$this->name 		= $dataArray[2];
			$this->nominated 	= $dataArray[3];
			$this->score 		= $dataArray[4];
			$this->website 		= $dataArray[5];
			$this->description 	= $dataArray[6];
			$this->directory 	= $dataArray[7];
		}

		// ===========================================================================

		/**
		 * Alpha_Award - getObject
		 * 
		 * This function is used for returning non-static properties of the given object
		 * 
		 * @access		public
		 * @return		array		return the properties of the given object
		 */
		public function getObject()	{
			return get_object_vars($this);
		}

		/**
		 * Alpha_Award - getNumber
		 * 
		 * This function is used for returning the id attribute
		 * 
		 * @access		public
		 * @return		integer		the id attribute loaded from the database table
		 */
		public function getNumber()	{
			return $this->number;
		}

		/**
		 * Alpha_Award - getPublisher
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
		 * Alpha_Award - getName
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
		 * Alpha_Award - getNominated
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
		 * Alpha_Award - getScore
		 * 
		 * This function is used for returning the score attribute
		 * 
		 * @access		public
		 * @return		string		the score attribute loaded from the database table
		 */
		public function getScore() {
			return $this->score;
		}

		/**
		 * Alpha_Award - getWebsite
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
		 * Alpha_Award - getDescription
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
		 * Alpha_Award - getDirectory
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
