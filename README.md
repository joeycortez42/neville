[Neville Beta v.0.6.5](http://neville.blossomers.com)
====================

Neville is a lightweight PHP7 MVC Framework for building web applications.

Get started at http://neville.blossomers.com!

Built Using
-----------
* Apache 2.2.31
* PHP 7.0.12
* MySQL 5.6.33

(Should work on some non-tested versions of Apache, PHP, and MySQL.)

Features
--------
* Bundled Bootstrap v3.3.7
* Uses Apache Mod_ReWrite for Clean URLs
* Optional Helper Classes
	- Curl
	- Phone Number formatting
	- Dropdown generator

Change Log
----------
* 0.6.5 - **STABLE** Updated for Bootstrap v3.3.7 and links to jQuery v1.12.4. Raised PHP requirement from 5.x to 7.x. Added CSS body class, most likely to change in the future. Added DB escape string.
* 0.6 - **STABLE** All builds from now on will be considered: **STABLE**. Changed engine startup so Neville can be updated by simply replacing the system folder. (Note: helper folder may move in a future release.) Added style to select helper.
* 0.5.4.2 - **STABLE** Fixed user cookie issue.
* 0.5.4.1 - **STABLE** Oops, broke database library then fixed it. Also, fixed session issues and user login library.
* 0.5.4 - **STABLE** Updated for Bootstrap v3.3.6 and links to jQuery v2.2.0, Neville no longer bundles jQuery files. Updated database library, should be more efficient now.
* 0.5.3 - **STABLE** Updated Neville website. Added MySQL install script and updates user library to match table.

Author
------
* Email: joey@blossomers.com
* Twitter: http://twitter.com/thejoeycortez
* GitHub: https://github.com/nokemono42
* Work: http://blossomers.com

To-do
------
* System wide way of hiding footer per page.
* Add to/Update documentation.
* Check multi selection on select helper.
* Check pagination library, possibly rewrite.
* Test and enable SSL URL support.