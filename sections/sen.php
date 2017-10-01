<?php

	echo'
		<section id="con" class="sections" data-sitemap="Contact form">
			<div class="container contactContainer">
				<div class="row col-12-xs">
					<div class="row col-12-xs">
						<h2>
							Contact form
						</h2>
					</div>
					<form enctype="application/x-www-form-urlencoded" method="get" action="#" onkeyup="validateForm()" onclick="validateForm()" >
						<div class="row col-12-xs">
							<div class="row col-8-sm col-12-xs col-sm-push-2">
								<label for="messageInput">
									<!--[if lt IE 10]>
									<span class="required">Message:</span>
									<![endif]-->
									<textarea id="messageInput" class="input" maxlength="2500" title="Please give a detailed message..." placeholder="Please give a detailed message..." onfocus="this.value=\'\'; this.onfocus=\'\';" accesskey="m" tabindex="11"></textarea>
									<span id="textareaCounter"></span>
								</label>
							</div>
							<div class="col-10-lg col-8-sm col-12-xs col-lg-push-1 col-sm-push-2">
								<div class="row col-6-lg col-12-xs col-lg-push-3">
									<div class="col-12-xs">
										<label for="nameInput">
											<!--[if lt IE 10]>
											<span class="required">Name:</span>
											<![endif]-->
											<input id="nameInput" class="input" type="text" maxlength="50" title="What is your name?" placeholder="Name" accesskey="n" tabindex="12" />
											<span id="nameCounter"></span>
										</label>
									</div>
									<div class="col-12-xs">
										<label for="mailInput">
											<!--[if lt IE 10]>
											<span class="required">E-mail:</span>
											<![endif]-->
											<input id="mailInput" class="input" type="text" maxlength="65" title="What is your e-mail?" placeholder="E-mail" accesskey="e" tabindex="13" />
											<span id="mailCounter"></span>
										</label>
									</div>
									<div class="col-12-xs">
										<label for="topicInput">
											<!--[if lt IE 10]>
											<span class="required">Topic:</span>
											<![endif]-->
											<input id="topicInput" class="input" type="text" maxlength="50" title="What is the topic of this message?" placeholder="Topic" accesskey="t" tabindex="14" />
											<span id="topicCounter"></span>
										</label>
									</div>
								</div>
								<div class="row col-8-lg col-12-xs col-lg-push-2">
									<label for="clearButton">
										<!--[if lt IE 10]>
										<span>Clear button:</span>
										<![endif]-->
										<input id="clearButton" class="input" type="button" disabled="disabled" onclick="clearForm()" title="If you want to clear out this contact form, press here!" value="CLEAR!" accesskey="c" tabindex="15" />
									</label>
									<label for="helpButton">
										<!--[if lt IE 10]>
										<span>Help button:</span>
										<![endif]-->
										<input id="helpButton" class="input" type="button" disabled="disabled" onclick="displayHelp()" title="If you need help with this contact form, press here!" value="HELP!" accesskey="h" tabindex="16" />
									</label>
									<label for="sendButton">
										<!--[if lt IE 10]>
										<span>Send button:</span>
										<![endif]-->
										<input id="sendButton" class="input" type="button" disabled="disabled" onclick="storeData()" title="If you are ready to send this message, press here!" value="SEND!" accesskey="s" tabindex="17" />
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="row col-12-xs">
					<strong>Please leave a detailed message, thank you!</strong>
				</div>
				<div class="row col-12-xs">
					<div id="contactSummary" class="hidden">
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
					</div>
					<div id="contactHelp" class="hidden">
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
						<div class="row col-11-md col-12-xs">
							<div class="col-3-xl col-3-lg col-3-md col-3-sm col-3-xs text-right">
								<p></p>
							</div>
							<div class="col-8-xl col-8-lg col-7-md col-7-sm col-7-xs col-0-lg-offset col-1-xs-offset text-left">
								<p></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="sen" class="sections">
			<div class="container">
				<div class="content row col-12-xs">
					<h2>
						Message sent
					</h2>
					<div class="row col-12-xs">
						<strong>
							Thank you, for your message!
						</strong>
					</div>
					<div class="row col-4-lg col-6-xs col-lg-push-4 col-xs-push-3 iconsBar">
						<a class="row sent" href="#con" title="Return to the Contact form!">
						</a>
					</div>
				</div>
			</div>
		</section>
	';

?>