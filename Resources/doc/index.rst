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

.. code-block:: ini

	[parameters]
		freegli.apns.connection_factory.certificat_path = %kernel.root_dir%/../certs/%kernel.environment%_apns_cert.pem
		freegli.apns.connection_factory.certificat_passphrase = 


Sample code
-----------
*TestController.php* provide a sample code.

Tokens
------
Binary tokens length is 32.
Freegli APNs component require an hexadecimal string representation. Its length is 64 (32 * 2).

Here is a sample code to obtain hexadecimal representation of NSData in your Objective-C project.

.. code-block:: objective-c


@implementation NSData (HexadecimalRepresentation)

- (NSString *)hexadecimalRepresentation {
    static const char hexValues[] = "0123456789abcdef";
    const size_t len = [self length];
    const unsigned char *data = [self bytes];
    char *buffer = (char *)calloc(len * 2 + 1, sizeof(char));
    char *hex = buffer;
    NSString *hexBytes = nil;
    
    for (int i = 0; i < len; i++) {
        const unsigned char c = data[i];
        *hex++ = hexValues[(c >> 4) & 0xF];
        *hex++ = hexValues[(c ) & 0xF];
    }
    
    hexBytes = [NSString stringWithUTF8String:buffer];
    
    free(buffer);
    
    return hexBytes;
}

@end



Resources
=========

* iOS Developer library <http://developer.apple.com/library/ios/#documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/CommunicatingWIthAPS/CommunicatingWIthAPS.html>
* Freegli APNS Component <https://github.com/Freegli/APNs>
