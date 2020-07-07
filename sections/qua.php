<?php

	echo'
		<h2 class="hidden">Qualifications\'s sections</h2>
		<section id="qua" class="sections" data-sitemap="Categories">
			<div class="container">
				<div class="containerColumn">
					<div class="containerRow">
						<h3>Categories</h3>
					</div><!-- containerRow ends -->
					<div class="containerSwap gridLayout">
	';
	foreach ($qualificationKeyMatching as $categoryLabel => $categoryQuantity) {
		$emptyCategory = is_null($categoryQuantity);
		$paragraphQuantity = $emptyCategory ? '0' : $categoryQuantity;
		$anchorTag = $anchorKeyMatching[$categoryLabel];
		$anchorClass = $anchorTag . ($emptyCategory ? ' disabled' : '');
		$hrefTag = $emptyCategory ? 'qua' : $anchorTag . '0';
		$titleTag = str_replace('X', $categoryLabel, $quaDefaultTitle);
		echo'
						<div class="displaySummaryContainer iconsBar">
							<h4 class="hidden">' . $categoryLabel . ' #' . $paragraphQuantity . '</h4>
							<a class="' . $anchorClass . '" href="#' . $hrefTag . '" title="' . $titleTag . '">
								<span>' . $categoryLabel . '</span>
								<span>' . $paragraphQuantity . '</span>
							</a>
						</div><!-- displaySummaryContainer ends -->
		';
	}
	echo'
					</div><!-- containerSwap ends -->
				</div><!-- containerColumn ends -->
			</div><!-- container ends -->
		</section><!-- section ends -->
	';

	include("sections/edu.php");
	include("sections/car.php");
	include("sections/tes.php");
	include("sections/exp.php");
	include("sections/cer.php");
	include("sections/res.php");
	include("sections/dow.php");
	include("sections/awa.php");

?>
