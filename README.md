[Neville Beta v.0.6](http://neville.blossomers.com)
====================

Neville is a lightweight PHP5 MVC Framework for building web applications.

Get started at http://neville.blossomers.com!

Built Using
-----------
* Apache 2.2.29
* PHP 5.3.29, 5.5.21, 5.6.10
* MySQL 5.5.38

(Should work on some non-tested versions of Apache, PHP, and MySQL.)

Features
--------
* Bundled Bootstrap v3.3.6
* Uses Apache Mod_ReWrite for Clean URLs
* Optional Helper Classes
	- Curl
	- Phone Number formatting
	- Dropdown generator

Change Log
----------
* 0.6 - **STABLE** All builds from now on will be considered: **STABLE**. Changed engine startup so Neville can be updated by simply replacing the system folder. (Note: helper folder may move in a future release.) Added style to select helper.
* 0.5.4.2 - **STABLE** Fixed user cookie issue.
* 0.5.4.1 - **STABLE** Oops, broke database library then fixed it. Also, fixed session issues and user login library.
* 0.5.4 - **STABLE** Updated for Bootstrap v3.3.6 and links to jQuery v2.2.0, Neville no longer bundles jQuery files. Updated database library, should be more efficient now.
* 0.5.3 - **STABLE** Updated Neville website. Updated documentation. Added MySQL install script and updates user library to match table.

Author
------
* Email: joey@blossomers.com
* Twitter: http://twitter.com/thejoeycortez
* GitHub: https://github.com/nokemono42
* Work: http://blossomers.com

To-do
------
* System wide way of hidding footer per page.
* Add to documentation.
* Check multi selection on select helper.
* Check pagination library, possibly rewrite.
* Test and enable SSL URL support.