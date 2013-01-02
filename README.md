What
====

PHPKeychain is a PHP wrapper for storing and retrieving passwords in OS X Keychain.


Why
===

You've written a CLI tool that interacts with a 3rd party service and you need to store a users sensitive details such as passwords. You could store this in a plain text file, but OS X has Keychain, so this will help you to do this.


How
===

Include this class in your CLI script and use the methods to set, get, update and delete passwords, all stored within Keychain.


Methods
=======

See the demo.php file for details on how to use this class

Thanks
======

Thanks to the following articles:

http://blog.macromates.com/2006/keychain-access-from-shell/

http://blogs.developerforce.com/developer-relations/2011/11/using-keychain-for-secure-text-on-os-x.html