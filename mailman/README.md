Installing Mailman
==================

This document outlines how to install and configure Mailman for use
with Dormbase.  Using a configuration other than the one outlined in
this document is not supported.

Requirements
------------

 * Fedora 16 x86_64 server.  No other configuration has been tested,
   although 32-bit (i386) Fedora should also work.
 
 * MIT hostname and static IP address.  If your server is in your
   dorm, request a hostname and IP by going to http://rcc.mit.edu/

 * Apache `httpd`.  This can be installed with `yum -y install httpd`

Installing Mailman and Postfix
------------------------------

Fedora comes with the `sendmail` MTA by default.  `sendmail` has a
larger community but a noticeably worse security record.  Therefore,
we recommend `postfix`.  To cleanly remove `sendmail` and replace it
with `postfix`, run:

     yum shell <<EOF
     remove sendmail
     install postfix
     run
     EOF

Next, install `mailman`

    yum -y install mailman

Once that completes, immediately re-configure the permissions by running

    /usr/lib/mailman/bin/check_perms -f

Fedora's `mailman` package automatically configured httpd.  Restart it with

    systemctl restart httpd.service

You should now be able to navigate to http://YOUR_SERVER/pipermail and
see an "Index of /pipermail" page.

Configuring Mailman
===================

Now that `mailman` is installed, it has to be configured to be useful.
This section details how to do so.

Initial bootstrapping
---------------------

The `mailman` installation has an overall password that must be set
for all administrator operations.  Note that other administrators
accounts can be created.  Run:

    /usr/lib/mailman/bin/mmsitepass <your-site-password>

Next, instruct `mailman` to update its data:

    /usr/lib/mailman/bin/update

Finally, create a special `mailman` list:

    /usr/lib/mailman/bin/newlist mailman

`mailman` can now be started and enabled:

    systemctl enable mailman.service
    systemctl start mailman.service

Navigating to http://YOUR_SERVER/pipermail should now show a `mailman`
directory.

