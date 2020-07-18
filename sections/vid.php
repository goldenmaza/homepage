<?php

	echo'
		<h2 class="hidden">Videos</h2>
	';
	for ($i = 0; $i < count($videoValues); $i++) {
		echo'
			<section id="vid0" class="sections">
				<div class="container">
					<div class="containerColumn">
						<div class="containerRow">
							<h3>' . $videoValues[$i] . '</h3>
						</div><!-- containerRow ends -->
						<div class="containerColumn">
							<object class="videoObject" type="application/x-shockwave-flash" height="100%" width="100%" data="http://www.youtube.com/v/###?version=3">
								<param name="movie" value="http://www.youtube.com/v/lQ62_AoBY3Y?version=3"></param>
								<param name="wmode" value="transparent"></param>
							</object><!-- containerColumn ends -->
						</div><!-- containerColumn ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}

?>
