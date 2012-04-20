#!/usr/bin/env python
import sys, os, time, threading, django.utils.autoreload
sys.path.append("/home/dormbase/public_html/dormbase")
sys.path.append("/home/dormbase/public_html/dormbase/dormbase")
os.chdir("/home/dormbase/public_html/dormbase")
os.environ['DJANGO_SETTINGS_MODULE'] = "dormbase.settings"

def reloader_thread():
  while True:
    if django.utils.autoreload.code_changed():
      os._exit(3)
    time.sleep(1)
t = threading.Thread(target=reloader_thread)
t.daemon = True
t.start()

from django.core.servers.fastcgi import runfastcgi
runfastcgi(method="threaded", daemonize="false")
