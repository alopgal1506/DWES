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
   path('usuarioTarea/<int:tarea_id>/', views.usuariosTarea_list, name='usuariosTarea_list'),
   #Ejercicio 5
   path('tareaConcreta/<str:texto_observacion>/', views.tareaConcreta_list, name='tareaConcreta_list'),
   #Ejercicio 6
   path('tareasCompletadas/<str:estado_tarea>/<int:primerAnio>/<int:segundoAnio>/', views.tareasCompletadas_list, name='tareasCompletadas_list'),
   #Ejercicio 7
   path('ultimoUsuarioComentario/<int:proyecto_id>/', views.ultimoUsuarioComentario_list, name='ultimoUsuarioComentario_list'),
   #Ejercicio 8
   path('comentarioTarea_list/<int:tarea_id>/<str:palabra>/<int:anyo>/', views.comentarioTarea_list, name='comentarioTarea_list'),
   #Ejercicio 9
   path('etiquetas_list/<int:id_proyecto>/', views.etiquetas_list, name='etiquetas_list'),
   #Ejercicio 10
   path('usuariosNoAsignado_list/<int:id_tarea>/', views.usuariosNoAsignado_list, name='usuariosNoAsignado_list'),
   #Errores
   path('probar-400/', views.probar_400, name='probar_400'),
   path('probar-403/', views.probar_403, name='probar_403'),
   path('probar-404/', views.probar_404, name='probar_404'),
   path('probar-500/', views.probar_500, name='probar_500'),
]