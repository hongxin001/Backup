from pyramid.config import Configurator
from logging import getLogger
from urlparse import urlparse
import pymongo
from pyramid.renderers import JSONP

log = getLogger(__name__)
def get_db(request):
    settings = request.registry.settings
    db_url = urlparse(settings['mongo_uri'])
    conn = pymongo.MongoClient(host=db_url.hostname, port=db_url.port)
    db = conn[db_url.path[1:]]
    if db_url.username and db_url.password:
        db.authenticate(db_url.username, db_url.password)
    return db

def main(global_config, **settings):
    """ This function returns a Pyramid WSGI application.
    """
    config = Configurator(settings=settings)
    jsonp = JSONP(param_name='callback')
    config.add_static_view('static', 'static', cache_max_age=3600)
    config.add_route('home', '/{id}')
    config.add_route('click','/{id}/click')
    config.add_renderer('jsonp', jsonp)
    config.set_request_property(get_db, "db", reify=True)

    config.scan('.views')

    return config.make_wsgi_app()

