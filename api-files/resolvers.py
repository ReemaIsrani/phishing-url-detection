"""
This module contains resolvers for url shorteners. A resolver takes a netloc
(host[:port] and path) and returns a URL as a string.
"""

import socket
import http.client
from functools import wraps

# Currently there is only a single, generic resolver, which should(tm) work
# with all services. One could add more resolvers here, so as to be more
# polite with the url shortening services that provides APIs for developers
# There are probably also some services with a landing page for ads etc, which
# one needs to handle differently

def _io_error_handling(fun):
    """
    Decorator resolvers can use to handle all the standard io/net related
    exceptions
    """

    @wraps(fun)
    def wrapped(*args, **kwargs):
        try:
            return fun(*args, **kwargs)
        except socket.gaierror: # dns error occured.
            return None
    return wrapped


@_io_error_handling
def generic_resolver(netloc, path, timeout=None):
    """
    Generic url fetcher that assumes the target service will response sanely
    to a HEAD request for the url.

    returns the full url or None if the url could not be resolved.
    """
    if timeout:
        conn = httplib.HTTPConnection(netloc, timeout=timeout)
    else:
        conn = httplib.HTTPConnection(netloc)
    conn.request("HEAD", path)
    response = conn.getresponse()
    if response.status in [httplib.TEMPORARY_REDIRECT,
                           httplib.MOVED_PERMANENTLY, httplib.FOUND]:
        return response.getheader("Location") # None by default
    return None
