# SOCIAL ICONS MODULE FOR FUEL CMS
This is a [FUEL CMS](http://www.getfuelcms.com) social module for adding social media links and icons to your website.

## INSTALLATION
There are a couple ways to install the module. If you are using GIT you can use the following method
to create a submodule:

### USING GIT
1. Open up a Terminal window, "cd" to your FUEL CMS installation then type in: 
Type in:
``php index.php fuel/installer/add_git_submodule https://github.com/jpswade/FUEL-CMS-Social-Module.git social``

2. Then to install, type in:
``php index.php fuel/installer/install social``

### MANUAL
1. Download the zip file from GitHub:
[https://github.com/jpswade/FUEL-CMS-Social-Module](https://github.com/jpswade/FUEL-CMS-Social-Module)

2. Create a "social" folder in fuel/modules/ and place the contents of the blog module folder in there.

3. Import the fuel_social_install.sql from the social/install folder into your database

4. Add "social" to the the `$config['modules_allowed']` in fuel/application/config/MY_fuel.php

## UNINSTALL

To uninstall the module which will remove any permissions and database information:
``php index.php fuel/installer/uninstall social``

### TROUBLESHOOTING
1. You may need to put in your full path to the "php" interpreter when using the terminal.
2. You must have access to an internet connection to install using GIT.

## TEAM
* James Wade, Lead Developer

## BUGS
To file a bug report, go to the [issues](https://github.com/jpswade/FUEL-CMS-Social-Module/issues) page.

## LICENSE
Licensed under [APACHE 2](http://www.apache.org/licenses/LICENSE-2.0).