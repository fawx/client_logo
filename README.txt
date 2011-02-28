Client logo 
-----------

Version: 1.1
Author: Andrea Moretti (nany@bbox.it)
Build Date: 2011-01-08
Requirements: Symphony 2.0.6 or higher

[ABOUT]

This extension adds a graphic file of your choiche to Symphony's Back-end Header.
Client logo makes life easier if you - like me - work on multiple symphony websites at once, and also pleases your client by making symphony **their** CMS!

[DEPENDENCIES]

JIT image manipulation extension

[INSTALLATION]

1. Upload the 'client logo' folder in this archive to your Symphony 'extensions' folder.

2. Enable it the usual way.

[USAGE]

1. Just provide an image file path in the "Client logo" field in Symphony's preferences page (png is recommended for nice transparency).

2. By default this extension makes the header 70px high, leaving 10px margin for the logo, if you need to tweak this values, look at lines 55-56 of extension.driver.php


[CHANGELOG]

1.0
- Initial release
1.1
- Add file existance check.