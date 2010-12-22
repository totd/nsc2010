README
======

VARIABLES USED IN PROJECT
=========================
$_SESSION['driver_info']['DriverEmploymentType_list'] # contains list of employment types
$_SESSION['driver_info']['DriverEyeColor_list'] # contains list of eye colors
$_SESSION['driver_info']['DriverGender_list'] # contains gender list
$_SESSION['driver_info']['DriverHairColor_list'] # contains list of hair colors
$_SESSION['driver_info']['DriverStatus_list'] # contains list of driver status

$_SESSION['logined_user_info'] # contains list of driver status



Custom_View_Helper_Transformation::convertNumber($this->driverInfo['d_Fax']);



Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

<VirtualHost *:80>
   DocumentRoot "C:/AppServ/www/studyzend/nsc2010/public"
   ServerName .local

   # This should be omitted in the production environment
   SetEnv APPLICATION_ENV development
    
   <Directory "C:/AppServ/www/studyzend/nsc2010/public">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>
    
</VirtualHost>
