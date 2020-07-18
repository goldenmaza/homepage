/*
    Filename:   contact.js
    Author:     Mats Richard Hellstrand (Sweden)
    Website:    www.hellstrand.org
    Date:       July 18th, 2020
    Comment:    This JS-file is used for validating the form under the Contact page and accessing the sendEmail.php file asynchronously.
*/

// Setup the labels used for describing the form limitations.
var range = [
    5, 5000,
    2, 50,
    2, 50,
    2, 25,
    2, 25,
    2, 13
];

var labels = [
    [
        'Message',
        'Topic',
        'Name',
        'E-mail'
    ],
    [
        'Incorrect format for this field, details under "HELP!"',
        'Currently, you are unable to send this message!',
        'If you are ready to send this message, press here!'
    ],
    [
        `a to z, åäö, A to Z, ÅÄÖ, space, dot, question mark, exclamation mark, ampersand, apostrophe, semicolon, colon, tilde and/or an hyphen - number of characters between ${range[0]} and ${range[1]}`,
        `a to z, åäö, A to Z, ÅÄÖ, space, dot, question mark, exclamation mark, ampersand, apostrophe, semicolon, colon, tilde and/or an hyphen - number of characters between ${range[2]} and ${range[3]}`,
        `a to z, åäö, A to Z, ÅÄÖ, space, dot, ampersand, apostrophe and/or an hyphen - number of characters between ${range[4]} and ${range[5]}`,
        `username + AT + domain + DOT + suffix<br/><br/>username - hyphen, dot, a to z and/or A to Z - number of characters between ${range[6]} and ${range[7]}<br/>domain - hyphen, dot, a to z and/or A to Z - number of characters between ${range[8]} and ${range[9]}<br/>suffix - a to z and/or A to Z - number of characters between ${range[10]} and ${range[11]}`
    ]
];

var regex = [
    `^([a-zA-ZåäöÅÄÖ \.\?\!\&\'\;\:\~\-]{${range[0]},${range[1]}})$`,
    `^([a-zA-ZåäöÅÄÖ \.\?\!\&\'\;\:\~\-]{${range[2]},${range[3]}})$`,
    `^([a-zA-ZåäöÅÄÖ \.\&\'\-]{${range[4]},${range[5]}})$`,
    `^([a-zA-Z\.\-]{${range[6]},${range[7]}})+@([a-zA-Z\.\-]{${range[8]},${range[9]}})+\\.([a-zA-Z]{${range[10]},${range[11]}})$`
];

var delayTimer;
var delayTime = 1000;

// It's used to clearing the contact form.
function clearForm() {
    'use strict';

    document.getElementById('messageInput').value = '';
    document.getElementById('topicInput').value = '';
    document.getElementById('nameInput').value = '';
    document.getElementById('emailInput').value = '';
    document.getElementById('formSummary').classList.remove('hidden');
    document.getElementById('formHelp').classList.add('hidden');

    var helpButton = document.getElementById('helpButton');
    var className = helpButton.className;
    className = className.substring(0, className.lastIndexOf(' '));
    helpButton.className = className;
}

// It's used to clearing the help text under the contact form.
function displayHelp() {
    'use strict';

    var helpButton = document.getElementById('helpButton'),
        formSummary = document.getElementById('formSummary'),
        formHelp = document.getElementById('formHelp'),
        helpMessage = document.getElementById('helpMessage'),
        helpTopic = document.getElementById('helpTopic'),
        helpName = document.getElementById('helpName'),
        helpEmail = document.getElementById('helpEmail');

    if (!formSummary.classList.contains('hidden')) {
        helpButton.classList.add('selected');
        formSummary.classList.add('hidden');
        formHelp.classList.remove('hidden');
        helpMessage.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][0];
        helpMessage.children[1].getElementsByTagName('p')[0].innerHTML = labels[2][0];
        helpTopic.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][1];
        helpTopic.children[1].getElementsByTagName('p')[0].innerHTML = labels[2][1];
        helpName.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][2];
        helpName.children[1].getElementsByTagName('p')[0].innerHTML = labels[2][2];
        helpEmail.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][3];
        helpEmail.children[1].getElementsByTagName('p')[0].innerHTML = labels[2][3];
    } else {
        helpButton.classList.remove('selected');
        formSummary.classList.remove('hidden');
        formHelp.classList.add('hidden');
    }
}

function validateForm() {
    'use strict';

    clearTimeout(delayTimer);
    delayTimer = setTimeout(function() {
        var messageInput = document.getElementById('messageInput'),
            topicInput = document.getElementById('topicInput'),
            nameInput = document.getElementById('nameInput'),
            emailInput = document.getElementById('emailInput'),
            messageCounter = document.getElementById('messageCounter'),
            topicCounter = document.getElementById('topicCounter'),
            nameCounter = document.getElementById('nameCounter'),
            emailCounter = document.getElementById('emailCounter'),
            clearButton = document.getElementById('clearButton'),
            helpButton = document.getElementById('helpButton'),
            sendButton = document.getElementById('sendButton'),
            formSummary = document.getElementById('formSummary'),
            formHelp = document.getElementById('formHelp'),
            summaryMessage = document.getElementById('summaryMessage'),
            summaryTopic = document.getElementById('summaryTopic'),
            summaryName = document.getElementById('summaryName'),
            summaryEmail = document.getElementById('summaryEmail');

        clearButton.setAttribute('disabled', 'disabled');
        helpButton.removeAttribute('disabled');
        sendButton.setAttribute('disabled', 'disabled');
        if (formHelp.classList.contains('hidden')) {
            formSummary.classList.remove('hidden');
        }

        var messageRegex = new RegExp(regex[0]), // Setup regular expressions for name, topic and e-mail.
            topicRegex = new RegExp(regex[1]),
            nameRegex = new RegExp(regex[2]),
            emailRegex = new RegExp(regex[3]),
            message = messageInput.value, // Get the values found under the form.
            topic = topicInput.value,
            name = nameInput.value,
            email = emailInput.value,
            messageCounterValue = range[1],
            topicCounterValue = range[3],
            nameCounterValue = range[5],
            emailCounterValue = range[7] + range[9] + range[11],
            correctionsNecessary = false;

        // Setup the starting character limitations that will be used in the form.
        messageCounter.innerHTML = messageCounterValue;
        topicCounter.innerHTML = topicCounterValue;
        nameCounter.innerHTML = nameCounterValue;
        emailCounter.innerHTML = emailCounterValue;

        // Incase Message is empty.
        if (message.length === 0) {
            correctionsNecessary = true;
            messageInput.classList.add('invalid');
        } else { // No longer empty.
            clearButton.removeAttribute('disabled');
            messageInput.classList.remove('invalid');
            messageCounter.innerHTML = messageCounterValue - message.length;
        }

        // Incase Topic is empty.
        if (topic.length === 0) {
            correctionsNecessary = true;
            topicInput.classList.add('invalid');
        } else { // No longer empty.
            clearButton.removeAttribute('disabled');
            topicInput.classList.remove('invalid');
            topicCounter.innerHTML = topicCounterValue - topic.length;
        }

        // Incase Name is empty.
        if (name.length === 0) {
            correctionsNecessary = true;
            nameInput.classList.add('invalid');
        } else { // No longer empty.
            clearButton.removeAttribute('disabled');
            nameInput.classList.remove('invalid');
            nameCounter.innerHTML = nameCounterValue - name.length;
        }

        // Incase E-mail is empty.
        if (email.length === 0) {
            correctionsNecessary = true;
            emailInput.classList.add('invalid');
        } else { // No longer empty.
            clearButton.removeAttribute('disabled');
            emailInput.classList.remove('invalid');
            emailCounter.innerHTML = emailCounterValue - email.length;
        }

        // Validate the Message and if it's incorrect.
        if (messageRegex.exec(message) === null) {
            correctionsNecessary = true;
            summaryMessage.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][0];
            summaryMessage.children[1].getElementsByTagName('p')[0].innerHTML = labels[1][0];
            messageInput.classList.add('invalid');
        } else { // It's validated.
            summaryMessage.children[0].getElementsByTagName('strong')[0].innerHTML = '';
            summaryMessage.children[1].getElementsByTagName('p')[0].innerHTML = '';
            messageInput.classList.remove('invalid');
        }

        // Validate the Topic and if it's incorrect.
        if (topicRegex.exec(topic) === null) {
            correctionsNecessary = true;
            summaryTopic.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][1];
            summaryTopic.children[1].getElementsByTagName('p')[0].innerHTML = labels[1][0];
            topicInput.classList.remove('invalid');
        } else { // It's validated.
            summaryTopic.children[0].getElementsByTagName('strong')[0].innerHTML = '';
            summaryTopic.children[1].getElementsByTagName('p')[0].innerHTML = '';
            topicInput.classList.remove('invalid');
        }

        // Validate the Name and if it's incorrect.
        if (nameRegex.exec(name) === null) {
            correctionsNecessary = true;
            summaryName.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][2];
            summaryName.children[1].getElementsByTagName('p')[0].innerHTML = labels[1][0];
            nameInput.classList.add('invalid');
        } else { // It's validated.
            summaryName.children[0].getElementsByTagName('strong')[0].innerHTML = '';
            summaryName.children[1].getElementsByTagName('p')[0].innerHTML = '';
            nameInput.classList.remove('invalid');
        }

        // Validate the E-mail and if it's incorrect.
        if (emailRegex.exec(email) === null) {
            correctionsNecessary = true;
            summaryEmail.children[0].getElementsByTagName('strong')[0].innerHTML = labels[0][3];
            summaryEmail.children[1].getElementsByTagName('p')[0].innerHTML = labels[1][0];
            emailInput.classList.add('invalid');
        } else { // It's validated.
            summaryEmail.children[0].getElementsByTagName('strong')[0].innerHTML = '';
            summaryEmail.children[1].getElementsByTagName('p')[0].innerHTML = '';
            emailInput.classList.remove('invalid');
        }

        // If corrections contain anything, something is wrong with other words, state the situation.
        if (correctionsNecessary) {
            sendButton.setAttribute('title', labels[1][2]);
        } else { // Nothing is left to correct, validation is completed and the user can now send the message.
            formHelp.classList.add('hidden');
            helpButton.setAttribute('disabled', 'disabled');
            sendButton.setAttribute('title', labels[1][3]);
            sendButton.removeAttribute('disabled');
        }
    }, delayTime);
}

// It's used for the storing procedure.
function storeData() {
    'use strict';

    document.getElementById('formSummary').classList.add('hidden');
    document.getElementById('formHelp').classList.add('hidden');

    // Get the values and asynchronously send the message to the default e-mail stated by using a PHP script.
    var inputData = [];
    inputData.push(document.getElementById('messageInput').value);
    inputData.push(document.getElementById('topicInput').value);
    inputData.push(document.getElementById('nameInput').value);
    inputData.push(document.getElementById('mailInput').value);
    processServer('sendEmail.php?formText=' + inputData);
    setTimeout(function() {
        clearForm();
    }, delayTime);
    location.href = '#sen';
}

// It's used for asynchronously load a file.
function processServer(source) {
    'use strict';

    var xhrObject = null;

    try {
        xhrObject = new XMLHttpRequest();  // Other browsers ... 
    } catch (exceptionOne) {
        try {
            xhrObject = new ActiveXObject('Microsoft.XMLHTTP');  // Some IE editions..
        } catch (exceptionTwo) {
            try {
                xhrObject = new ActiveXObject('Msxml2.XMLHTTP');  // Other IE editions..
            } catch (exceptionThree) {
                xhrObject = false;
            }
        }
    }

    if (xhrObject) {
        xhrObject.open('GET', source);
        xhrObject.send(null);
        xhrObject.onreadystatechange = function () {
            if (xhrObject.readyState === 4) {
                xhrObject = null;
            }
        };
    }
}
