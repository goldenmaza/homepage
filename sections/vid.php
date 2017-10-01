<?php

	echo'
		<h1 class="hidden">
			Videos
		</h1>
	';
	for ($i = 0; $i < count($videoValues); $i++) {
		echo'
			<section id="vid0" class="sections">
				<div class="container">
					<div class="content row col-12-xs">
						<div class="row col-12-xs">
							<h2>
								' . $videoValues[$i] . '
							</h2>
						</div>
						<div class="row col-12-xs">
							<object class="videoObject" type="application/x-shockwave-flash" height="100%" width="100%" data="http://www.youtube.com/v/lQ62_AoBY3Y?version=3">
								<param name="movie" value="http://www.youtube.com/v/lQ62_AoBY3Y?version=3"></param>
								<param name="wmode" value="transparent"></param>
							</object>
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}
	
?>