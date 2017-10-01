<?php

	/**
	 *
	 * The following lines are used for setting the loaded data from the database,
	 * into each respective global variable, which will be used for dynamically build
	 * and presenting data around the website.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2016, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 3rd, 2017 - Version 1.0
	 *
	 */
	
	// Alpha_Information-table, which holds the paragraphs used for the About page.
	if ($_SESSION['process']->getAlpha_InformationSize() != 0) {
		$alpha_information = $_SESSION['process']->getAlpha_Information();
		$alpha_informationSize = $_SESSION['process']->getAlpha_InformationSize();
	}
	
	// Alpha_Project-table, which holds the items listed under the Portfolio page(s).
	if ($_SESSION['process']->getAlpha_ProjectSize() != 0) {
		$alpha_project = $_SESSION['process']->getAlpha_Project();
		$alpha_projectSize = $_SESSION['process']->getAlpha_ProjectSize();
	}
	
	// Alpha_Education-table, which holds the courses used for the Education - Course page(s).
	if ($_SESSION['process']->getAlpha_EducationSize() != 0) {
		$alpha_education = $_SESSION['process']->getAlpha_Education();
		$alpha_educationSize = $_SESSION['process']->getAlpha_EducationSize();
	}
	
	// Alpha_Degree-table, which holds the degrees used for the Education - Degree page(s).
	if ($_SESSION['process']->getAlpha_DegreeSize() != 0) {
		$alpha_degree = $_SESSION['process']->getAlpha_Degree();
		$alpha_degreeSize = $_SESSION['process']->getAlpha_DegreeSize();
	}
	
	// Alpha_Career-table, which holds the jobs listed under the Career page(s).
	if ($_SESSION['process']->getAlpha_CareerSize() != 0) {
		$alpha_career = $_SESSION['process']->getAlpha_Career();
		$alpha_careerSize = $_SESSION['process']->getAlpha_CareerSize();
	}
	
	// Alpha_Experience-table, which holds the fields of knowledge under the Experience page(s).
	if ($_SESSION['process']->getAlpha_ExperienceSize() != 0) {
		$alpha_experience = $_SESSION['process']->getAlpha_Experience();
		$alpha_experienceSize = $_SESSION['process']->getAlpha_ExperienceSize();
	}
	
	// Alpha_Certification-table, which holds the certifications listed under the Certification page(s).
	if ($_SESSION['process']->getAlpha_CertificationSize() != 0) {
		$alpha_certification = $_SESSION['process']->getAlpha_Certification();
		$alpha_certificationSize = $_SESSION['process']->getAlpha_CertificationSize();
	}
	
	// Alpha_Award-table, which holds the awards listed under the Award page(s).
	if ($_SESSION['process']->getAlpha_AwardSize() != 0) {
		$alpha_award = $_SESSION['process']->getAlpha_Award();
		$alpha_awardSize = $_SESSION['process']->getAlpha_AwardSize();
	}
	
	// Alpha_Testimonial-table, which holds the quotes listed under the Testimonial page(s).
	if ($_SESSION['process']->getAlpha_TestimonialSize() != 0) {
		$alpha_testimonial = $_SESSION['process']->getAlpha_Testimonial();
		$alpha_testimonialSize = $_SESSION['process']->getAlpha_TestimonialSize();
	}
	
	// Alpha_Result-table, which holds the scores listed under the Result page(s).
	if ($_SESSION['process']->getAlpha_ResultSize() != 0) {
		$alpha_result = $_SESSION['process']->getAlpha_Result();
		$alpha_resultSize = $_SESSION['process']->getAlpha_ResultSize();
	}
	
	// Alpha_Download-table, which holds the files listed under the Download page(s).
	if ($_SESSION['process']->getAlpha_DownloadSize() != 0) {
		$alpha_download = $_SESSION['process']->getAlpha_Download();
		$alpha_downloadSize = $_SESSION['process']->getAlpha_DownloadSize();
	}

?>