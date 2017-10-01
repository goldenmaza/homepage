<?php

	/**
	 * Process.php
	 *
	 * This class is used for creating a Process-object, which is used to store arrays
	 * of all the elements that is used by this website.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2017, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 5th, 2017 - Version 1.1
	 */
	 
	// ===========================================================================

	// The following are used for storing data under specific objects.
	require_once("tables/Alpha_Information.php");
	require_once("tables/Alpha_Project.php");
	require_once("tables/Alpha_Education.php");
	require_once("tables/Alpha_Career.php");
	require_once("tables/Alpha_Result.php");
	require_once("tables/Alpha_Experience.php");
	require_once("tables/Alpha_Certification.php");
	require_once("tables/Alpha_Download.php");
	require_once("tables/Alpha_Award.php");
	require_once("tables/Alpha_Testimonial.php");

	class Process {
		private $alpha_information		= NULL;
		private $alpha_project 			= NULL;
		private $alpha_degree 			= NULL;
		private $alpha_education 		= NULL;
		private $alpha_career 			= NULL;
		private $alpha_result 			= NULL;
		private $alpha_experience 		= NULL;
		private $Alpha_certification	= NULL;
		private $alpha_download			= NULL;
		private $alpha_award 			= NULL;
		private $alpha_testimonial 		= NULL;
		
		/**
		 * The default constructor of the Process-object.
		 */
		public function __construct() {
			$this->alpha_information 	= [];
			$this->alpha_project 		= [];
			$this->alpha_degree 		= [];
			$this->alpha_education 		= [];
			$this->alpha_career 		= [];
			$this->alpha_result 		= [];
			$this->alpha_experience 	= [];
			$this->alpha_certification	= [];
			$this->alpha_download 		= [];
			$this->alpha_award 			= [];
			$this->alpha_testimonial 	= [];
		}

	    /**
		 * Data management - addAlpha_Information
		 * 
		 * This function is used for assigning the Alpha_Information-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Information specific data
		 */
	    public function addAlpha_Information($dataArray) {
	        $this->alpha_information[] = new Alpha_Information($dataArray);
		}

	    /**
		 * Data management - getAlpha_InformationSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Information-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Information array
		 */
		public function getAlpha_InformationSize() {
			return count($this->alpha_information);
		}

	    /**
		 * Data management - getAlpha_Information
		 * 
		 * This function is used for returning the entire Alpha_Information-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Information-objects
		 */
		public function getAlpha_Information() {
			return $this->alpha_information;
		}

	    /**
		 * Data management - addAlpha_Project
		 * 
		 * This function is used for assigning the Alpha_Project-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Project specific data
		 */
	    public function addAlpha_Project($dataArray) {
	        $this->alpha_project[] = new Alpha_Project($dataArray);
		}

	    /**
		 * Data management - getAlpha_ProjectSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Project-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Project array
		 */
		public function getAlpha_ProjectSize() {
			return count($this->alpha_project);
		}

	    /**
		 * Data management - getAlpha_Project
		 * 
		 * This function is used for returning the entire Alpha_Project-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Project-objects
		 */
		public function getAlpha_Project() {
			return $this->alpha_project;
		}
		
	    /**
		 * Data management - addAlpha_Degree
		 * 
		 * This function is used for assigning the Alpha_Education-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Degree specific data
		 */
	    public function addAlpha_Degree($dataArray) {
	        $this->alpha_degree[] = new Alpha_Education($dataArray);
		}

	    /**
		 * Data management - getAlpha_DegreeSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Degree-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Degree array
		 */
		public function getAlpha_DegreeSize() {
			return count($this->alpha_degree);
		}

	    /**
		 * Data management - getAlpha_Degree
		 * 
		 * This function is used for returning the entire Alpha_Degree-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Degree-objects
		 */
		public function getAlpha_Degree() {
			return $this->alpha_degree;
		}
		
	    /**
		 * Data management - addAlpha_Education
		 * 
		 * This function is used for assigning the Alpha_Education-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Education specific data
		 */
	    public function addAlpha_Education($dataArray) {
	        $this->alpha_education[] = new Alpha_Education($dataArray);
		}

	    /**
		 * Data management - getAlpha_ProjectSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Project-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Project array
		 */
		public function getAlpha_EducationSize() {
			return count($this->alpha_education);
		}

	    /**
		 * Data management - getAlpha_Education
		 * 
		 * This function is used for returning the entire Alpha_Education-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Education-objects
		 */
		public function getAlpha_Education() {
			return $this->alpha_education;
		}
		
	    /**
		 * Data management - addAlpha_Career
		 * 
		 * This function is used for assigning the Alpha_Career-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Career specific data
		 */
	    public function addAlpha_Career($dataArray) {
	        $this->alpha_career[] = new Alpha_Career($dataArray);
		}

	    /**
		 * Data management - getAlpha_CareerSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Career-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Career array
		 */
		public function getAlpha_CareerSize() {
			return count($this->alpha_career);
		}

	    /**
		 * Data management - getAlpha_Career
		 * 
		 * This function is used for returning the entire Alpha_Career-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Career-objects
		 */
		public function getAlpha_Career() {
			return $this->alpha_career;
		}
		
	    /**
		 * Data management - addAlpha_Result
		 * 
		 * This function is used for assigning the Alpha_Result-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Result specific data
		 */
	    public function addAlpha_Result($dataArray) {
	        $this->alpha_result[] = new Alpha_Result($dataArray);
		}

	    /**
		 * Data management - getAlpha_ResultSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Result-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Result array
		 */
		public function getAlpha_ResultSize() {
			return count($this->alpha_result);
		}

	    /**
		 * Data management - getAlpha_Result
		 * 
		 * This function is used for returning the entire Alpha_Result-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Result-objects
		 */
		public function getAlpha_Result() {
			return $this->alpha_result;
		}
		
	    /**
		 * Data management - addAlpha_Experience
		 * 
		 * This function is used for assigning the Alpha_Experience-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Experience specific data
		 */
	    public function addAlpha_Experience($dataArray) {
	        $this->alpha_experience[] = new Alpha_Experience($dataArray);
		}

	    /**
		 * Data management - getAlpha_ExperienceSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Experience-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Experience array
		 */
		public function getAlpha_ExperienceSize() {
			return count($this->alpha_experience);
		}

	    /**
		 * Data management - getAlpha_Experience
		 * 
		 * This function is used for returning the entire Alpha_Experience-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Experience-objects
		 */
		public function getAlpha_Experience() {
			return $this->alpha_experience;
		}
		
	    /**
		 * Data management - addAlpha_Certification
		 * 
		 * This function is used for assigning the Alpha_Certification-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Certification specific data
		 */
	    public function addAlpha_Certification($dataArray) {
	        $this->alpha_certification[] = new Alpha_Certification($dataArray);
		}

	    /**
		 * Data management - getAlpha_CertificationSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Certification-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Certification array
		 */
		public function getAlpha_CertificationSize() {
			return count($this->alpha_certification);
		}

	    /**
		 * Data management - getAlpha_Certification
		 * 
		 * This function is used for returning the entire Alpha_Certification-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Certification-objects
		 */
		public function getAlpha_Certification() {
			return $this->alpha_certification;
		}
		
	    /**
		 * Data management - addAlpha_Download
		 * 
		 * This function is used for assigning the Alpha_Download-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Download specific data
		 */
	    public function addAlpha_Download($dataArray) {
	        $this->alpha_download[] = new Alpha_Download($dataArray);
		}

	    /**
		 * Data management - getAlpha_DownloadSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Download-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Download array
		 */
		public function getAlpha_DownloadSize() {
			return count($this->alpha_download);
		}

	    /**
		 * Data management - getAlpha_Download
		 * 
		 * This function is used for returning the entire Alpha_Download-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Download-objects
		 */
		public function getAlpha_Download() {
			return $this->alpha_download;
		}
		
	    /**
		 * Data management - addAlpha_Award
		 * 
		 * This function is used for assigning the Alpha_Award-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Award specific data
		 */
	    public function addAlpha_Award($dataArray) {
	        $this->alpha_award[] = new Alpha_Award($dataArray);
		}

	    /**
		 * Data management - getAlpha_AwardSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Award-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Award array
		 */
		public function getAlpha_AwardSize() {
			return count($this->alpha_award);
		}

	    /**
		 * Data management - getAlpha_Award
		 * 
		 * This function is used for returning the entire Alpha_Award-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Award-objects
		 */
		public function getAlpha_Award() {
			return $this->alpha_award;
		}
		
	    /**
		 * Data management - addAlpha_Testimonial
		 * 
		 * This function is used for assigning the Alpha_Testimonial-array a new set of content from the database.
		 * 
		 * @access		public
		 * @param		array		$dataArray			the array holds Testimonial specific data
		 */
	    public function addAlpha_Testimonial($dataArray) {
	        $this->alpha_testimonial[] = new Alpha_Testimonial($dataArray);
		}
		
	    /**
		 * Data management - getAlpha_TestimonialSize
		 * 
		 * This function is used for returning the specific amount of stored Alpha_Testimonial-objects under the array.
		 * 
		 * @access		public
		 * @return		integer		the amount of objects stored under the Testimonial array
		 */
		public function getAlpha_TestimonialSize() {
			return count($this->alpha_testimonial);
		}

	    /**
		 * Data management - getAlpha_Testimonial
		 * 
		 * This function is used for returning the entire Alpha_Testimonial-array.
		 * 
		 * @access		public
		 * @return		array		the entire array of Testimonial-objects
		 */
		public function getAlpha_Testimonial() {
			return $this->alpha_testimonial;
		}
		
	    /**
		 * Data management - clearObject
		 * 
		 * This function is used for clearing out a specific array by stating the object name.
		 * 
		 * @access		public
		 * @param		string		$target			the name of the array to be emptied
		 */
		public function clearObject($target) {
			if ($target == "Alpha_Information") {
				$this->alpha_information = [];
			}
			else if ($target == "Alpha_Project") {
				$this->alpha_project = [];
			}
			else if ($target == "Alpha_Degree") {
				$this->alpha_degree = [];
			}
			else if ($target == "Alpha_Education") {
				$this->alpha_education = [];
			}
			else if ($target == "Alpha_Career") {
				$this->alpha_career = [];
			}
			else if ($target == "Alpha_Result") {
				$this->alpha_result = [];
			}
			else if ($target == "Alpha_Experience") {
				$this->alpha_experience = [];
			}
			else if ($target == "Alpha_Certification") {
				$this->alpha_certification = [];
			}
			else if ($target == "Alpha_Download") {
				$this->alpha_download = [];
			}
			else if ($target == "Alpha_Award") {
				$this->alpha_award = [];
			}
			else if ($target == "Alpha_Testimonial") {
				$this->alpha_testimonial = [];
			}
		}
	}

?>