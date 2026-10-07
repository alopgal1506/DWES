from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('usuarios/', views.usuario_list, name='usuario_list'),
    path('productos/', views.producto_list, name='producto_list'),
    path('compras/', views.compra_list, name='compra_list'),
]
