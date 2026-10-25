from django.urls import path
from . import views


urlpatterns = [
   path('', views.index, name='index'),
   #Ejercicio 1
   path('proyectos/', views.proyectos_list, name='proyectos_list'),
   #Ejercicio 2
   path('asignacionTarea/<int:proyecto_id>/', views.asignacionTarea_list, name='asignacionTarea_list'),
]