<?php

	echo'
		<h2 class="hidden">
			Qualifications\'s sections
		</h2>
		<section id="qua" class="sections" data-sitemap="Categories">
			<div class="container">
				<div class="content row col-12-xs">
					<div class="row col-12-xs">
						<h3>
							Categories
						</h3>
					</div>
					<div class="row col-12-xs text-center">
	';
	for ($i = 0; $i < count($qualificationCategories); $i++) {
		$category = $qualificationCategories[$i];
		$quantity = $qualificationQuantities[$i];
		if ($i != 0 && $i % 3 == 0) {
			echo'
					</div>
					<div class="row col-12-xs text-center">
			';
		}
		echo'
						<div class="col-4-xs displaySummaryContainer iconsBar">
							<h4 class="hidden">
								' . $category . ' ' . ($quantity > 0 ? "#" . $quantity : "#0") . '
							</h4>
							<a class="' . $anchorTags[$i] . ($quantity == NULL ? " disabled" : "") . '" href="#' . ($quantity > 0 ? $anchorTags[$i] . "0" : "qua") . '" title="' . str_replace("X", $category, $quaDefaultTitle) . '">
								<p>
									' . $category . '
								</p>
								<p>
									' . ($quantity > 0 ? "#" . $quantity : "#0") . '
								</p>
							</a>
						</div>
		';
	}
	echo'
					</div>
				</div>
			</div><!-- container ends -->
		</section><!-- section ends -->
	';

	include("sections/edu.php");
	include("sections/car.php");
	include("sections/res.php");
	include("sections/exp.php");
	include("sections/cer.php");
	include("sections/dow.php");
	include("sections/awa.php");
	include("sections/tes.php");

?>