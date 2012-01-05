===================
Freegli APNs Bundle
===================

Freegli APNs Bundle intends to provide an easy to use Bundle for the Apple Push Notification Service (APNs).

WARNING: WIP

How To
======

Requirements
------------
* Freegli APNS Component <https://github.com/Freegli/APNs>
* APNS Certificate(s) <http://code.google.com/p/apns-php/wiki/CertificateCreation>

Configuration
-------------

You can include this code in your *deps* file.

::

[FreegliAPNSBundle]
	git=git://github.com/Freegli/FreegliAPNSBundle.git
	target=bundles/Freegli/Bundle/APNSBundle	
[FreegliAPNs]
	git=git://github.com/Freegli/APNs.git

You need to specify your certificate path into parameters.
The following example use *certs* subdirectory including *dev_apns_cert.pem* and *prod_apns_cert.pem*, without passphrase.

::

[parameters]
	freegli.apns.connection_factory.certificat_path = %kernel.root_dir%/../certs/%kernel.environment%_apns_cert.pem
#	freegli.apns.connection_factory.certificat_passphrase = 


Sample code
-----------
*TestController.php* provide a sample code.

Tokens
------
Binary tokens length is 32.
Freegli APNs component require an hexadecimal string representation. Its length is 64 (32 * 2).

Resources
=========

* iOS Developer library <http://developer.apple.com/library/ios/#documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/CommunicatingWIthAPS/CommunicatingWIthAPS.html>
* Freegli APNS Component <https://github.com/Freegli/APNs>
