#! /usr/bin/env python

from flup.server.fcgi import WSGIServer
import urlparse
import re

def qstring2mtparam(qstring):
   return  [ '%s=%s' % (key, value) for key,value in urlparse.parse_qsl(qstring)]

mimetype=re.compile('(application|audio|example|image|message|model|multipart|text|video|(vnd|x|prs)\.[^/]+)/[^/]+$')

def path2ctype(path):
   ctype=path[1:] #Replace with something that can cope with not being the root of the site
   if not mimetype.match(ctype)
       ctype=''
   return ctype

def application(environ, start_response):
   myctype=path2ctype(environ['SCRIPT_URL'])
   if not myctype
       status = '404 File not found'
       response_headers = []
   elif (environ['REQUEST_METHOD']=='HEAD'):
       status = '200 OK'
       response_headers = [('Content-Type', ';'.join([myctype]+qstring2mtparam(environ['QUERY_STRING'])))]
   else:
       status = '405 Just a Content-type server'
       response_headers = [('Allow','HEAD')]
   start_response(status, response_headers)
   return ['']

WSGIServer(application).run()
