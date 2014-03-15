mime-type
=========

A Python FCGI(WSGI) that responds to HEAD method with a content type based on the URL with which it was invoked.
URL's that don't convert to a valid mime type are rejected as file not found.  Attempts to retrieve valid mime types
via methods other than HEAD are rejected as unauthorized.  The intent is that one can use a URL based on this
in a magnet link to provide type information in combination with a URI that provides the data but not the content 
type.

NB My first python program more complicated than hello world that wasn't just copied and pasted so the commits are
mostly me fixing idiot errors.

You can test it with [the copy I have installed](http://type.srv.dumain.com/mime.type/)  by making a HEAD request to 
the url suffixed by the mime type you want it to respond with and passing query parameters you want converted to 
parameters to be added to the content-type: header.  If you plan to use it to distribute files please install and 
use your own copy.
