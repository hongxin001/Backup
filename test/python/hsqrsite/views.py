from pyramid.view import view_config
from bson.objectid import ObjectId
from logging import getLogger

log = getLogger(__name__)

@view_config(route_name='home', renderer='templates/index.mako')
def home(request):
    id = request.matchdict['id']
    if id and ObjectId.is_valid(id):
        id =  ObjectId(id)
        item = request.db.item.find_one({"_id":id})
        if item:
            status = item.get("status", -1)
            return dict(result=status)
    return dict(result=-1)

@view_config(route_name='click',renderer='jsonp')
def click(request):
    id = request.matchdict['id']
    if id and ObjectId.is_valid(id):
        id = ObjectId(id)
        item = request.db.item.find_one({'_id':id})
        if item:
            if(item.get("status",-1)==0):
                request.db.item.update({'_id':id},{'status':1},upsert=False)
                id=1
            else:
                id=0
    else:
        id = -1
    return dict(result=id)

