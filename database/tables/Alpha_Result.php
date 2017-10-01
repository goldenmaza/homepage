<?php

	/**
	 * Alpha_Result.php
	 *
	 * This class is used for holding the aspects regarding the Alpha_Result-profile.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2016, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	class Alpha_Result {
		private $number 		= NULL;
		private $agent 			= NULL;
		private $name 			= NULL;
		private $beginning 		= NULL;
		private $ending 		= NULL;
		private $score 			= NULL;
		private $website 		= NULL;
		private $description 	= NULL;
		
		/**
		 * The default constructor of the Alpha_Result-object.
		 */
		public function __construct($dataArray) {
			$this->number 		= $dataArray[0];
			$this->agent 		= $dataArray[1];
			$this->name 		= $dataArray[2];
			$this->beginning 	= $dataArray[3];
			$this->ending 		= $dataArray[4];
			$this->score 		= $dataArray[5];
			$this->website 		= $dataArray[6];
			$this->description 	= $dataArray[7];
		}
		
		// ===========================================================================

	    /**
		 * Alpha_Result - getObject
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
		 * Alpha_Result - getNumber
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
		 * Alpha_Result - getAgent
		 * 
		 * This function is used for returning the agent attribute
		 * 
		 * @access		public
		 * @return		string		the agent attribute loaded from the database table
		 */
		public function getAgent() {
			return $this->agent;
		}

	    /**
		 * Alpha_Result - getName
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
		 * Alpha_Result - getBeginning
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
		 * Alpha_Result - getEnding
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
		 * Alpha_Result - getScore
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
		 * Alpha_Result - getWebsite
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
		 * Alpha_Result - getDescription
		 * 
		 * This function is used for returning the description attribute
		 * 
		 * @access		public
		 * @return		string		the description attribute loaded from the database table
		 */
		public function getDescription() {
			return $this->description;
		}
	}

?>