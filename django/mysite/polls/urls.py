from django.conf.urls import url

from . import views

app_name = 'polls'
urlpatterns = [
	url(r'^main/', views.main),
	url(r'^register/', views.register),
	url(r'^query/', views.query),
	url(r'^delete/', views.delete),
	url(r'^$', views.index, name='index'),
]
