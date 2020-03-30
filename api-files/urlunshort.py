"""Tools for detecting and expanding shortened URLs."""

__version__ = "0.2.3"
__author__ = "Rune Halvorsen <runefh@gmail.com>"
__homepage__ = "http://bitbucket.org/runeh/urlunshort"
__docformat__ = "restructuredtext"

from urllib.parse import urlparse
import urllib
from resolvers import generic_resolver

# If some tiny url services require a special resolver, this mapping will
# map between hostname -> resolver (currently we have no custom resolvers)
_resolver_map = {

}

"""
.. attribute:: services

List of domains of known URL shortening services.
"""
services = [
    "bit.ly",
    "budurl.com",
    "cli.gs",
    "fa.by",
    "is.gd",
    "lurl.no",
    "moourl.com",
    "smallr.com",
    "snipr.com",
    "snipurl.com",
    "snurl.com",
    "su.pr",
    "tiny.cc",
    "tr.im"]


def resolve(url, timeout=None):
    """
    Resolve shortened URL to a target URL. If the URL could not be resolved,
    return None.

    :argument url: the url to resolve

    :argumet timeout: the max tix to wait for the URL to resolve in seconds
        There's currently no way of telling if a request failed due to
        a timeout or because the URL could not be resolved!

    :returns: the resolved URL. None if URL could not be resolved

    """
    parts = urlparse.urlparse(url)
    resolver = _resolver_map.get(parts.netloc, generic_resolver)
    return resolver(parts.netloc, parts.path, timeout)


def is_shortened(url):
    """Check if the url appears to be shortened, based on the services
    whitelist. **Note:** This will be a best-effort thing, as the list
    if services has to be kept up to date. Also note that valid URLs on
    shortening services (like bit.ly/apidocs) will be assumed to be a
    shortened url.

    :argument url: The URL to check

    :returns: true or false
    """
    parts = urllib.parse.urlsplit(url)
    if not parts.scheme and not parts.hostname:
        # couldn't parse anything sensible, try again with a scheme.
        parts = urllib.parse.urlsplit("http://"+url)
        # yes, I dknow about the default_scheme argument to ursplit,
        # and no, it doesn't actully work.

    return bool(parts.hostname in services and parts.path)
