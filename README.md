# Homepage &middot; [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/goldenmaza/homepage/blob/master/LICENSE.md)

This is my personal website that I started working on during the middle of 2015 and have on and off worked on until today.

**Note:** It's a work in progress no dobut. Since I do not have a formal education (other than a course), other challenging projects, or even much working experience with PHP development, I therefore excuse the current design choices I've made for this project. I know that there are so many things I could do with PHP that would improve the source code but for this project, as it is old, I do not feel like I should make such a redesign overall. I've whetted my appetite for React, Redux, Node and JavaScript development and if I create a new personal website, I would probably just redesign my website with those libraries, runtimes and languages.

However, below is a description of the current project as it designed until today.

## Comprised of

Comprised of: PHP, HTML5, CSS3, MySQL, JavaScript, OOP, Responsive design, AJAX and File management.

## Overview

This project is built on a simple PHP design, with HTML5 markup and CSS3 styling (no preprocessor, I know...). It has some object-oriented programming aspects (database classes). Custom SQL queries are generated during runtime by the DatabaseHandler and communicates with the MySQL database. JavaScript is used for validation and minor client activities (like swiping). AJAX is used together with the contact form to send an e-mail.

## File management

The website present files (by only allowing certain extensions) that are stored under the server for each specific project. So if I add a file manually to the server, the files will be presented under the specific page dynamically.

## User-friendly

I tried to be as user-friendly as possible as well as thinking about critical details, which I learned during my studies at College of Gotland, but it's not always possible to follow ALL guidelines. I have chosen not to support earlier versions of Internet Explorer. I know this breaks one of the major guidelines of the old course but the amount of work required to make this website look decent for IE under 9.0 is just not worth it. IE above 9.0 and Edge should behave just as the other supported browsers.

**Note:** I know that my page contains blinking effects, which is seen as bad practice and for some people it is really an issue, but I really felt like it would be a good match for this design. They do not blink too fast and the effect is only for the Previous and Next buttons, so it's not too many elements.

## Responsiveness

The responsiveness behind this website comes from the logic behind the Bootstrap framework. I copied the CSS styles regarding the column, offset and push/pull. I also made the website responsive regarding the font-size, depending on the viewport of the device, it will make the size change depending on the resolution.

The website also has a responsive menu that will disappear for the smaller screen resolutions, this could be helpful when trying to use the contact form on a handheld device. The CSS code still needs some adjusting for resolutions larger than 2560x1600.

**Note:** The styling is now being updated. The Bootstrap aspects will be replaced by a Flexbox design.

## Page generation 

The website is made so ALL pages are generated each time you press the refresh button. Each "page" is built with anchors, so by pressing links and such you jump to the information that you are searching for. I made this design decision because it makes the automatic generated Sitemap.xml file (SEO), as well as the Sitemap page, so much easier to implement.

### About

The About page holds information about myself and what I think about software development, as well as some links to profiles that I currently use on "social media", in case you wanna contact me in other ways.

### Portfolio

The Portfolio page displays the projects that I've done to date. Under each subpage you will find information about each project, as well as a list of thumbnails linking to each screenshot at full resolution. There are also possible download links for each file that I felt like sharing with the public, regarding the project of course, lastly there are detailed information about the project itself.

### Contact

The Contact page can be used to contact me. It requires JavaScript to be enabled in the browser, otherwise the validation scripts will not run and the send button will be disabled. AJAX is used to send the e-mail, as the website will send the form information to a PHP file for processing. The page will give details on what is accepted for each input field as well as the textarea.

### Sitemap

The Sitemap page contains automatic generated content which is derived by the sections found under this website. Each section has an id, which are then used to create each link listed under this page. The breadcrumbs are used in a similar manner (TODO).

### Qualification

The Qualification page is a hubpage for several other subpages, which are listed below.

#### Education

The Education subpage holds a list of degrees and courses that I've taken, from different institutes. As new courses get completed they will be added to these pages. Each subpage have detailed information about either the degrees (of the programmes) or the courses themselves.

#### Career

The Career subpage holds a list of positions that I've had during my career. The list will display a short description of each and each subpage will describe them all more thoroughly. You will find a description of each position, date from when I stated until I finished, a link to their website (if any) as well as what the position was all about. In case of a software engineering position I will display all the technologies, tools, frameworks and subjects that I was dealing with during this period.

#### Testimonials

The Testimonials subpage holds a list of testimonials, that I have been blessed with, recieved from employers during my career or otherwise. For testimonials that are large, I've chosen to make them smaller so they would fit the website, or not to divulge important information that could either be harmful for me, my clients and/or employers. The originals, if possible, can be given on requests.

#### Experience

The Experience subpage tries to display my skill tree. You will first find a summary page where all of the different skills, under each group, are calculated by average and the progress bar will expand accordingly. The subpages will display each group, the skills under this group and a matching progress bar as well as a description where I try to explain how I tried to place a value on the different skills.

#### Certifications

The Certifications subpage holds a list of certifications that I have currently been able to gain. Each subpage will give you some information about the certification and a link (if any) to where, or by whom, the certification was issued.

#### Results

The Results subpage holds a list of tests (or exams) that I felt like sharing with you. Each subpage will give you some information about the results and a link (if any) to where I took this test or exam.

#### Awards

The Awards subpage holds a list of awards that I felt like sharing with you. Each subpage will give you some information about the award and a link (if any) to where, or by whom, the award was given.

#### Download

The Download subpage contains automatic generated content which is derived by the sections found under this website. Each section has an id, which are then used to display the pages that have downloadable items. Instead of going through all sections you can find all the files here.
