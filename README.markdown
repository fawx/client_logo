# Client logo 
-----------

Version: 1.1.1  
Author: Andrea Moretti (nany@bbox.it), Adam Fox (fox@hairb.us)  
Build Date: 2012-05-03  
Requirements: Symphony 2.2 or higher

## About

This extension gives you the option to replace Symphony's default admin header with an image.  It was born out of a desire to allow clients to feel like their CMS is their own.


## Dependencies

JIT image manipulation extension


## Installation

1. Upload the `client_logo` folder in this archive to your Symphony `extensions` folder.

2. Enable it the usual way.


## Usage

1. Just provide an image file path in the "Client logo" field in Symphony's preferences page.

2. By default this extension makes the header 70px high, leaving 10px margin for the logo. If you need to tweak this, look at lines 60 and 65 of `extension.driver.php`.


## Changelog

### 1.1.1
 - Add extension.meta.xml for use with [symphonyextensions.com](http://symphonyextensions.com)
 - Spring cleaning of code and documentation

### 1.1
 - Add file existence check.

### 1.0
 - Initial release


## Todo
 - create an external stylesheet on savePreferences instead of using embedded stylesheets.
 - possibly discontinue extension in favor of [admin css override](https://github.com/michael-e/admin_css_override/tree)
