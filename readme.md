## Developer's Best Friend
### DWA Project 3 - Mike Vartanian

## Live URL:
<http://p3.mikevartanian.me/>

## Description
Laravel based web application that, by using HTML forms, generates a user specified number of lorem ipsum text paragaphs, generates
random user data, re-uses the xkcd password generator code from P2 but incorporating Laravel and blade concepts, and generates octal unix
permission codes to use with the unix command, chmod.

The lorem ipsum text paragraph and random user generators were taken from packagist.org at the following URLs:

lorem-ipsum: https://packagist.org/packages/badcow/lorem-ipsum<br>
Random User: https://packagist.org/packages/fzaninotto/faker

## Demo

As a remote student, my demo is located in jing at the following location http://screencast.com/t/YzFYwFCN

## Details for Teaching Team
I took the following challenges for this assignment.
<ol>
	<li>Gave the option to include extra infor for the randomly generated users.</li>
	<li>Added the xkcd password generator from p2 using the laravel application framework</li>
	<li>Added the Unix Permissions Calculator based on inspiration from http://permissions-calculator.org/</li>
	<li>Added form validation for the three pages.</li>
</ol>

### Form Validation
Form validation was performed for the lorem-ipsum paragraph generator, random user generator, and xkcd password generator pages. The first two pages
had text input blocks that needed constraints/rules added but the xkcd password generator only had dropdown and radio buttons so individual inputs
did not need to be validated but we needed to validate the MinWordLength was less than or equal to MaxWordLength so some additional logic was added
the routes.php file.

### Interesting Observations / Code Modifications
1. In order to have the class Passwdgen() recognized by the blade.php files, I needed to run composer dump-autoload (found out prior to lecture 7)
2. usort() needed to be changed after it was inserted into a class
3. Parameters for validation rules and messages arrays are case sensitive (noticed this sometimes but not always?)
4. Needed to have at least two rules and messages to get correct validation?? This was observed in the xkcd-passwd form validation in routes.php
5. Class names were case sensitive running on live server but not on local server

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
