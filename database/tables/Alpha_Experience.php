<?php

	/**
	 * Alpha_Experience.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Experience-profile.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2016, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	class Alpha_Experience {
		private $number 		= NULL;
		private $value 			= NULL;
		private $category 		= NULL;
		private $grading 		= NULL;
		
		/**
		 * The default constructor of the Alpha_Experience-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->value 		= $dataArray[1];
			$this->category 	= $dataArray[2];
			$this->grading 		= $dataArray[3];
		}
	 
		// ===========================================================================

	    /**
		 * Alpha_Experience - getObject
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
		 * Alpha_Experience - getNumber
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
		 * Alpha_Experience - getValue
		 * 
		 * This function is used for returning the value attribute
		 * 
		 * @access		public
		 * @return		string		the value attribute loaded from the database table
		 */
		public function getValue() {
			return $this->value;
		}

	    /**
		 * Alpha_Experience - getCategory
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
		 * Alpha_Experience - getGrading
		 * 
		 * This function is used for returning the grading attribute
		 * 
		 * @access		public
		 * @return		string		the grading attribute loaded from the database table
		 */
		public function getGrading() {
			return $this->grading;
		}
	}

?>