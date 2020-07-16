<?php

    echo'
        <h2 class="hidden">Contact pages</h2>
        <section id="con" class="sections" data-sitemap="Contact form">
            <div class="container contactContainer">
                <header>
                    <div class="containerRow">
                        <h3>Contact form</h3>
                    </div><!-- containerRow ends -->
                </header><!-- header ends -->
                <div class="containerColumn">
                    <form enctype="application/x-www-form-urlencoded" method="get" action="#" onkeyup="validateForm()" onclick="validateForm()">
                        <div class="containerSwap">
                            <div class="containerColumn exceptionColumn">
                                <label for="messageInput">
                                    <!--[if lt IE 10]>
                                    <span class="required">Message:</span>
                                    <![endif]-->
                                    <textarea id="messageInput" class="input" maxlength="2500" title="Please give a detailed message..." placeholder="Please give a detailed message..." accesskey="m" autocomplete="off"></textarea>
                                    <span id="messageCounter"></span>
                                </label>
                            </div><!-- containerColumn ends -->
                            <div class="containerColumn exceptionColumn">
                                <label for="topicInput">
                                    <!--[if lt IE 10]>
                                    <span class="required">Topic:</span>
                                    <![endif]-->
                                    <input id="topicInput" class="input" type="text" maxlength="50" title="What is the topic of this message?" placeholder="Topic" accesskey="t" autocomplete="off" />
                                    <span id="topicCounter"></span>
                                </label>
                                <label for="nameInput">
                                    <!--[if lt IE 10]>
                                    <span class="required">Name:</span>
                                    <![endif]-->
                                    <input id="nameInput" class="input" type="text" maxlength="50" title="What is your name?" placeholder="Name" accesskey="n" autocomplete="off" />
                                    <span id="nameCounter"></span>
                                </label>
                                <label for="emailInput">
                                    <!--[if lt IE 10]>
                                    <span class="required">E-mail:</span>
                                    <![endif]-->
                                    <input id="emailInput" class="input" type="text" maxlength="65" title="What is your e-mail?" placeholder="E-mail" accesskey="e" autocomplete="off" />
                                    <span id="emailCounter"></span>
                                </label>
                            </div><!-- containerColumn ends -->
                        </div><!-- containerSwap ends -->
                        <div class="containerColumn">
                            <div class="containerSwap">
                                <label class="containerColumn exceptionColumn" for="clearButton">
                                    <!--[if lt IE 10]>
                                    <span>Clear button:</span>
                                    <![endif]-->
                                    <input id="clearButton" class="input" type="button" disabled="disabled" onclick="clearForm()" title="If you want to clear out this contact form, press here!" value="CLEAR!" accesskey="c" />
                                </label>
                                <label class="containerColumn exceptionColumn" for="helpButton">
                                    <!--[if lt IE 10]>
                                    <span>Help button:</span>
                                    <![endif]-->
                                    <input id="helpButton" class="input" type="button" disabled="disabled" onclick="displayHelp()" title="If you need help with this contact form, press here!" value="HELP!" accesskey="h" />
                                </label>
                                <label class="containerColumn exceptionColumn" for="sendButton">
                                    <!--[if lt IE 10]>
                                    <span>Send button:</span>
                                    <![endif]-->
                                    <input id="sendButton" class="input" type="button" disabled="disabled" onclick="storeData()" title="If you are ready to send this message, press here!" value="SEND!" accesskey="s" />
                                </label>
                            </div><!-- containerColumn ends -->
                        </div><!-- containerColumn ends -->
                    </form><!-- form ends -->
                </div><!-- containerColumn ends -->
                <div class="containerColumn">
                    <div class="containerRow">
                        <strong>Please leave a detailed message, thank you!</strong>
                    </div><!-- containerRow ends -->
                </div><!-- containerColumn ends -->
                <div class="containerColumn">
                    <div id="formSummary" class="hidden">
                        <div class="containerColumn">
                            <div id="summaryMessage" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                            <div id="summaryTopic" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                            <div id="summaryName" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                            <div id="summaryEmail" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                        </div><!-- containerColumn ends -->
                    </div><!-- formSummary ends -->
                    <div id="formHelp" class="hidden">
                        <div class="containerColumn">
                            <div id="helpMessage" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                            <div id="helpTopic" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                            <div id="helpName" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                            <div id="helpEmail" class="containerSwap">
                                <div class="containerColumn exceptionColumn">
                                    <strong></strong>
                                </div>
                                <div class="containerColumn exceptionColumn">
                                    <p></p>
                                </div>
                            </div>
                        </div><!-- containerColumn ends -->
                    </div><!-- helpSection ends -->
                </div><!-- containerColumn ends -->
            </div><!-- container ends -->
        </section><!-- section ends -->
        <section id="sen" class="sections">
            <div class="container">
                <div class="containerColumn">
                    <h3>Message sent notification</h3>
                    <div class="containerRow">
                        <strong>Thank you, for your message!</strong>
                    </div><!-- containerRow ends -->
                    <div class="containerRow iconsBar">
                        <a class="row sent" href="#con" title="Return to the Contact form!"></a>
                    </div><!-- containerRow ends -->
                </div><!-- containerColumn ends -->
            </div><!-- container ends -->
        </section><!-- section ends -->
    ';

?>
