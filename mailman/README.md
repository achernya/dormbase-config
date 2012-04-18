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

