Installing Solr
===============

This document outliens how to install and configure Apache Solr
(Ultra-fast Lucene-based Search Server) for use with Dormbase.  Using
a configuration other than the one outlined in this document is not
supported.

Requirements
------------

 * Fedora 16 x86_64 server.  No other configuration has been tested,
   although 32-bit (i386) Fedora should also work.
 
 * MIT hostname and static IP address.  If your server is in your
   dorm, request a hostname and IP by going to http://rcc.mit.edu/

 * `jetty`.  This can be installed with `yum -y install jetty`

Obtaining Solr
----------------

Download `solr` 3.6.0 from the Apache website and extract the archive:

    mkdir solr
    wget http://www.apache.org/dist/lucene/solr/3.6.0/apache-solr-3.6.0.tgz
    tar xf apache-solr-3.6.0.tgz

Install Solr into Jetty
-----------------------
    
This distribution includes a copy of `jetty`.  However, using the
Fedora-provided `jetty` takes advantage of the built-in startup
scripts.

    cp example/webapps/solr.war /usr/share/jetty/webapps/
    cp -r example/solr /usr/share/jetty/
    cp example/etc/jetty.xml /etc/jetty/
    systemctl enable jetty.service
    systemctl start jetty.service
