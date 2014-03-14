#! /usr/bin/env python

from flup.server.fcgi import WSGIServer
import urlparse

def qstring2mtparam(qstring):
   return  [ '%s=%s' % (key, value) for key,value in urlparse.parse_qsl(qstring)]

def application(environ, start_response):
   myctype = ';'.join([environ['SCRIPT_URL'][1:]]+qstring2mtparam(environ['QUERY_STRING']))
   if (environ['REQUEST_METHOD']=='HEAD'):
       status = '200 OK'
   else:
       status = '405 Just a Content-type server'
   
   response_headers = [('Content-Type', myctype),('Allow','HEAD')]
   start_response(status, response_headers)
   
   response_body=''
   return [response_body]

WSGIServer(application).run()
