[Neville Beta v.0.7.1](http://neville.blossomers.com)
====================

Neville is a lightweight PHP5+ MVC Framework for building web applications.

Get started at http://neville.blossomers.com

Built Using
-----------
* Apache 2.2.31
* PHP 5.5.35, 7.0.12
* MySQL 5.6.33
* Postgre 9.5.5

(Should work on some non-tested versions of Apache, PHP, MySQL, Postgre.)

Features
--------
* Bundled Bootstrap v3.3.7
* Uses Apache Mod_ReWrite for Clean URLs
* Optional Helper Classes
	- Curl
	- Phone Number formatting
	- Dropdown / Select generator

Updating
--------
Download latest release and replace the "system" folder.

Change Log
----------
* 0.7.1 - Forgot to included updated Postgre adaptor update. CSS file version bump.
* 0.7 - HUGE UPDATE! Reworked routing method. It is now easier to load partials. Added user/login support, but needs testing. Dropped requirement to PHP 5.4. Added DB autostart option. Added support for Postgre databases. Added script position option. Misc changes.
* 0.6.5 - Updated for Bootstrap v3.3.7 and links to jQuery v1.12.4. Raised PHP requirement from 5.x to 7.x. Added CSS body class, most likely to change in the future. Added DB escape string.
* 0.6 - All builds from now on will be considered: **STABLE**. Changed engine startup so Neville can be updated by simply replacing the system folder. (Note: helper folder may move in a future release.) Added style to select helper.

Author
------
* Email: joey@blossomers.com
* Twitter: http://twitter.com/thejoeycortez
* GitHub: https://github.com/nokemono42
* Work: http://blossomers.com

To-do
------
* Debug $this->request
* Add to/Update documentation.
* Check multi selection on select helper.
* Check pagination library, possibly rewrite.
* Check mail library, possibly rewrite.
* Enable and test SSL URL support.