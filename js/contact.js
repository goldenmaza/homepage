/*
    Filename:   contact.js
    Author:     Richard M. Hellstrand (Sweden)
    Website:    www.hellstrand.org
    Date:       October 1st, 2017
    Comment:    This JS-file is used for validating the form under the Contact page and accessing the sendMail.php file asynchronously.
*/

// It's used to clearing the contact form.
function clearForm() {
    "use strict";

    document.getElementById("nameInput").value = "";
    document.getElementById("mailInput").value = "";
    document.getElementById("topicInput").value = "";
    document.getElementById("messageInput").value = "";
    document.getElementById("contactSummary").className = "";
    document.getElementById("contactHelp").classList.add("hidden");
    var className = document.getElementById("helpButton").className;
    className = className.substring(0, className.lastIndexOf(" "));
    document.getElementById("helpButton").className = className;
}

// Setup the labels used for describing the form limitations.
var labels = [
    ["<strong>Name:</strong>", "<strong>E-mail:</strong>", "<strong>Topic:</strong>", "<strong>Message:</strong>"],
    ["Incorrect format, details under 'HELP!'", "You are missing a detailed Message, details under 'HELP!'"],
    [
        "a to z, åäö, A to Z, ÅÄÖ, space, dot, underscore and/or an apostrophe - number of characters between 2 and 50",
        "username + AT + domain + DOT + prefix<br/><br/>username - hyphen, dot, a to z, A to Z and/or 0 to 9 - number of characters between 2 and 25<br/>domain - hyphen, dot, a to z, A to Z and/or 0 to 9 - number of characters between 2 and 25<br/>prefix - a to z and/or A to Z - number of characters between 2 and 13",
        "2500 symbol limit, no other limitations (code syntax will be stripped, however)"
    ]
];

// It's used to clearing the help text under the contact form.
function displayHelp() {
    "use strict";

    if (document.getElementById("contactSummary").className !== "hidden") {
        document.getElementById("helpButton").classList.add("selected");
        document.getElementById("contactSummary").classList.add("hidden");
        document.getElementById("contactHelp").classList.remove("hidden");
        document.getElementById("contactHelp").children[0].getElementsByTagName("p")[0].innerHTML = labels[0][0];
        document.getElementById("contactHelp").children[0].getElementsByTagName("p")[1].innerHTML = labels[2][0];
        document.getElementById("contactHelp").children[1].getElementsByTagName("p")[0].innerHTML = labels[0][1];
        document.getElementById("contactHelp").children[1].getElementsByTagName("p")[1].innerHTML = labels[2][1];
        document.getElementById("contactHelp").children[2].getElementsByTagName("p")[0].innerHTML = labels[0][2];
        document.getElementById("contactHelp").children[2].getElementsByTagName("p")[1].innerHTML = labels[2][0];
        document.getElementById("contactHelp").children[3].getElementsByTagName("p")[0].innerHTML = labels[0][3];
        document.getElementById("contactHelp").children[3].getElementsByTagName("p")[1].innerHTML = labels[2][2];
    }
    else {
        var className = document.getElementById("helpButton").className;
        className = className.substring(0, className.lastIndexOf(" "));
        document.getElementById("helpButton").className = className;
        document.getElementById("contactSummary").classList.remove("hidden");
        document.getElementById("contactHelp").classList.add("hidden");
    }
}

// It's used for validation of the user input.
var delayTimer;
var delayTime = 1000;

function validateForm() {
    "use strict";

    clearTimeout(delayTimer);
    delayTimer = setTimeout(function() {
        document.getElementById("clearButton").setAttribute("disabled", "disabled");
        document.getElementById("helpButton").removeAttribute("disabled");
        document.getElementById("sendButton").setAttribute("disabled", "disabled");
        if (document.getElementById("contactHelp").className === "hidden") {
            document.getElementById("contactSummary").classList.remove("hidden");
        }

        var nameRegex = new RegExp("^([a-zA-ZåäöÅÄÖ\.\_\' ]{2,50})$"), // Setup regular expressions for name, topic and e-mail.
            topicRegex = new RegExp("^([a-zA-ZåäöÅÄÖ\.\_\' ]{2,50})$"),
            emailRegex = new RegExp("^([a-zA-Z0-9\.\-]{2,25})+@([a-zA-Z0-9\.\-]{2,25})+\\.([a-zA-Z]{2,13})$"),
            name = document.getElementById("nameInput").value, // Get the values found under the form.
            mail = document.getElementById("mailInput").value,
            topic = document.getElementById("topicInput").value,
            message = document.getElementById("messageInput").value,
            textareaCounter = 2500, // Setup the character limitations that will be used in the form.
            nameCounter = 50,
            mailCounter = 65,
            topicCounter = 50,
            corrections = 0;

        // Setup the starting character limitations that will be used in the form.
        document.getElementById("textareaCounter").innerHTML = textareaCounter;
        document.getElementById("topicCounter").innerHTML = topicCounter;
        document.getElementById("mailCounter").innerHTML = mailCounter;
        document.getElementById("nameCounter").innerHTML = nameCounter;

        // Incase Name is empty.
        if (name.length === 0) {
            corrections++;
            document.getElementById("nameInput").className = "input invalid";//.style.borderColor = "#500";
        }
        else { // No longer empty.
            document.getElementById("clearButton").removeAttribute("disabled");
            document.getElementById("nameInput").className = "input";//.removeAttribute("style");
            document.getElementById("nameCounter").innerHTML = nameCounter - name.length;
        }

        // Incase E-mail is empty.
        if (mail.length === 0) {
            corrections++;
            document.getElementById("mailInput").className = "input invalid";//.style.borderColor = "#500";
        }
        else { // No longer empty.
            document.getElementById("clearButton").removeAttribute("disabled");
            document.getElementById("mailInput").className = "input";//.removeAttribute("style");
            document.getElementById("mailCounter").innerHTML = mailCounter - mail.length;
        }

        // Incase Topic is empty.
        if (topic.length === 0) {
            corrections++;
            document.getElementById("topicInput").className = "input invalid";//.style.borderColor = "#500";
        }
        else { // No longer empty.
            document.getElementById("clearButton").removeAttribute("disabled");
            document.getElementById("topicInput").className = "input";//.removeAttribute("style");
            document.getElementById("topicCounter").innerHTML = topicCounter - topic.length;
        }

        // Validate the Name and if it's incorrect.
        if (nameRegex.exec(name) === null) {
            corrections++;
            document.getElementById("contactSummary").children[0].getElementsByTagName("p")[0].innerHTML = labels[0][0];
            document.getElementById("contactSummary").children[0].getElementsByTagName("p")[1].innerHTML = labels[1][0];
            document.getElementById("nameInput").className = "input invalid";//.style.borderColor = "#500";
        }
        else { // It's validated.
            document.getElementById("contactSummary").children[0].getElementsByTagName("p")[0].innerHTML = "";
            document.getElementById("contactSummary").children[0].getElementsByTagName("p")[1].innerHTML = "";
            document.getElementById("nameInput").className = "input";//.removeAttribute("style");
        }

        // Validate the E-mail and if it's incorrect.
        if (emailRegex.exec(mail) === null) {
            corrections++;
            document.getElementById("contactSummary").children[1].getElementsByTagName("p")[0].innerHTML = labels[0][1];
            document.getElementById("contactSummary").children[1].getElementsByTagName("p")[1].innerHTML = labels[1][0];
            document.getElementById("mailInput").className = "input invalid";//.style.borderColor = "#500";
        }
        else { // It's validated.
            document.getElementById("contactSummary").children[1].getElementsByTagName("p")[0].innerHTML = "";
            document.getElementById("contactSummary").children[1].getElementsByTagName("p")[1].innerHTML = "";
            document.getElementById("mailInput").className = "input";//.removeAttribute("style");
        }

        // Validate the Topic and if it's incorrect.
        if (topicRegex.exec(topic) === null) {
            corrections++;
            document.getElementById("contactSummary").children[2].getElementsByTagName("p")[0].innerHTML = labels[0][2];
            document.getElementById("contactSummary").children[2].getElementsByTagName("p")[1].innerHTML = labels[1][0];
            document.getElementById("topicInput").className = "input invalid";//.style.borderColor = "#500";
        }
        else { // It's validated.
            document.getElementById("contactSummary").children[2].getElementsByTagName("p")[0].innerHTML = "";
            document.getElementById("contactSummary").children[2].getElementsByTagName("p")[1].innerHTML = "";
            document.getElementById("topicInput").className = "input";//.removeAttribute("style");
        }

        // Incase Message is empty.
        if (message.length === 0) {
            corrections++;
            document.getElementById("contactSummary").children[3].getElementsByTagName("p")[0].innerHTML = labels[0][3];
            document.getElementById("contactSummary").children[3].getElementsByTagName("p")[1].innerHTML = labels[1][1];
            document.getElementById("messageInput").className = "input invalid";//.style.borderColor = "#500";
        }
        else { // No longer empty.
            if (message.length <= textareaCounter) {
                document.getElementById("contactSummary").children[3].getElementsByTagName("p")[0].innerHTML = "";
                document.getElementById("contactSummary").children[3].getElementsByTagName("p")[1].innerHTML = "";
                document.getElementById("clearButton").removeAttribute("disabled");
                document.getElementById("messageInput").className = "input";//.removeAttribute("style");
            }
            document.getElementById("textareaCounter").innerHTML = textareaCounter - message.length;
        }

        // If corrections contain anything, something is wrong with other words, state the situation.
        if (corrections > 0) {
            document.getElementById("sendButton").setAttribute("title", "Currently, you are unable to send this message!");
        }
        else { // Nothing is left to correct, validation is completed and the user can now send the message.
            document.getElementById("contactSummary").classList.add("hidden");
            document.getElementById("helpButton").setAttribute("disabled", "disabled");
            document.getElementById("sendButton").setAttribute("title", "If you are ready to send this message, press here!");
            document.getElementById("sendButton").removeAttribute("disabled");
        }
    }, delayTime);
}

// It's used for the storing procedure.
function storeData() {
    "use strict";

    document.getElementById("contactSummary").classList.add("hidden");
    document.getElementById("contactHelp").classList.add("hidden");

    // Get the values and asynchronously send the message to the default e-mail stated by using a PHP script.
    var inputData = [];
    inputData.push(document.getElementById("nameInput").value);
    inputData.push(document.getElementById("mailInput").value);
    inputData.push(document.getElementById("topicInput").value);
    inputData.push(document.getElementById("messageInput").value);
    processServer("sendEmail.php?formText=" + inputData);
    location.href = "#sen";
    setTimeout(function() {
        clearForm();
    }, 1000);
}

// It's used for asynchronously load a file.
function processServer(source) {
    "use strict";

    var xhrObject = null;

    try {
        xhrObject = new XMLHttpRequest();  // Other browsers ... 
    }
    catch (exceptionOne) {
        try {
            xhrObject = new ActiveXObject("Microsoft.XMLHTTP");  // Some IE editions..
        }
        catch (exceptionTwo) {
            try {
                xhrObject = new ActiveXObject("Msxml2.XMLHTTP");  // Other IE editions..
            }
            catch (exceptionThree) {
                xhrObject = false;
            }
        }
    }

    if (xhrObject) {
        xhrObject.open("GET", source);
        xhrObject.send(null);
        xhrObject.onreadystatechange = function () {
            if (xhrObject.readyState === 4) {
                xhrObject = null;
            }
        };
    }
}