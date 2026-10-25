from django.urls import path
from . import views


urlpatterns = [
    #Ejercicio 1
   path('', views.index, name='index'),
   #Ejercicio 2
   path('proyectos/', views.proyectos_list, name='proyectos_list'),
   #Ejercicio 3
   path('asignacionTarea/<int:proyecto_id>/', views.asignacionTarea_list, name='asignacionTarea_list'),
   #Ejercicio 4
   path('usuariosTarea/<int:tarea_id>/', views.usuariosTarea_list, name='usuariosTarea_list'),
   #Ejercicio 6
   
]