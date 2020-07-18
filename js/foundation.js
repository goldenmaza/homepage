/*
    Filename:   foundation.js
    Author:     Richard M. Hellstrand (Sweden)
    Website:    www.hellstrand.org
    Date:       July 18th, 2020
    Comment:    This JS-file is used for the menu bar and the swiping motion.
*/

// Once the browser has finished loading then lay the foundation.
document.onreadystatechange = function () {
    'use strict';

    if (document.readyState === 'interactive') {
        swiping();
    }
};

// Toggle the menu bar.
function toggleTarget() {
    'use strict';

    var navigationBar = document.getElementById('navigationBar'),
        navigationHandler = document.getElementById('navigationHandler');

    if (navigationBar.classList.contains('showing') === true) {
        navigationBar.classList.remove('showing');
        navigationHandler.classList.remove('showing');
    } else {
        navigationBar.classList.add('showing');
        navigationHandler.classList.add('showing');
    }
}

function swiping() {
    'use strict';

    var query = document.querySelectorAll('section'),
        sections = [],
        startX = null,
        currentX = null,
        currentTarget = null,
        i = null,
        j = null;

    for (i = 0; i < query.length - 2; i++) { // -2 meaning that it should ignore the Contact form and it's sent notice
        sections[i] = query[i].id;
    }
    sections.shift();

    for (i = 0; i < 1; i++) {
        document.querySelector('#' + sections[i]).addEventListener('touchstart', function (e) {
            for (j = 0; j < e.path.length; j++) {
                if (e.path[j].localName === 'section') {
                    currentTarget = e.path[j].id;
                }
            }
            startX = e.targetTouches[0].pageX;
            this.addEventListener('touchmove', function (e) {
                currentX = e.targetTouches[0].pageX - startX;
                if (Math.abs(currentX) >= 40) {
                    swipe(sections, currentX > 0, currentTarget); //go left on true, otherwise right
                }
                e.stopPropagation();
            }, false);
        }, false);
    }
}

function swipe(sections, direction, target) {
    'use strict';

    var i = null;
    for (i = 0; i < sections.length - 1; i++) {
        if (target === sections[i]) {
            if (i > 0 && direction === true) {
                location.href = '#' + sections[i - 1];
            } else if (i < sections.length && direction === false) {
                location.href = '#' + sections[i + 1];
            }
            break;
        }
    }
}
