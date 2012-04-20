Installing Apache httpd
=======================

This document outlines how to install and configure Apache httpd for
use with Dormbase.  Using a configuration other than the one outlined
in this document is not supported.

Requirements
------------

 * Fedora 16 x86_64 server.  No other configuration has been tested,
   although 32-bit (i386) Fedora should also work.
 
 * MIT hostname and static IP address.  If your server is in your
   dorm, request a hostname and IP by going to http://rcc.mit.edu/

 * Apache `httpd`.  This can be installed with `yum -y install httpd`

Configuring the DocumentRoot
----------------------------

Fedora configured `httpd` to have a default `DocumentRoot` at
`/var/www/html/`.  If you do not want to place your main website
there, please change this line to the appropriate directory.

Create the Dormbase User and install Dormbase
---------------------------------------------

For simplicity, create a `dormbase` user to contain the current
version of Dormbase, and make the user readable:

    useradd -m -U -s /bin/bash dormbase
    chmod a+rx /home/dormbase
    su - dormbase
    mkdir public_html
    cd public_html
    git clone git://github.com/dormbase/dormbase.git
    mkdir dormbase-fcgi

Copy `index.fcgi` into `dormbase-fcgi`

Configure httpd
---------------

Copy `dormbase.conf` to `/etc/httpd/conf.d/` and modify the `Alias`
section as appropriate.  Simmons traditionally has had the directory
installed at `/sds/`.

Finally, enable and start `httpd`:

    systemctl enable httpd.service
    systemctl start httpd.service

