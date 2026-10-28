from django.shortcuts import render
from .models import Proyecto, AsignacionTarea, Tarea, Comentario, Etiqueta,Usuario
from django.views.defaults import page_not_found
#Ejercicio 1
def index(request):
    return render(request, 'blog/index.html')

#Ejercicio 2
def proyectos_list(request):
    proyectos = Proyecto.objects.prefetch_related("usuarios").select_related("crear_usuarios")
    return render(request, 'blog/proyectos_list.html', {'proyectos_list': proyectos})

#Ejercicio 3
def asignacionTarea_list(request, proyecto_id):
    tareas = (Tarea.objects.select_related("proyecto_crea_tareas").filter(proyecto_crea_tareas=proyecto_id).order_by('-fechaCreacion'))
    return render(request, 'blog/asignacionTarea_list.html', {'tareas': tareas})

#Ejercicio 4
def usuariosTarea_list(request, tarea_id):
    asignaciones = (AsignacionTarea.objects.select_related("tarea", "usuario").filter(tarea=tarea_id).order_by('fechaAsignacion'))
    return render(request, 'blog/usuarioTarea_list.html', {'asignaciones': asignaciones})
    
#Ejercicio 5
def tareaConcreta_list(request, texto_observacion):
    tarea = AsignacionTarea.objects.select_related("tarea", "usuario").filter(observaciones__icontains=texto_observacion)
    return render(request, 'blog/tareaConcreta_list.html', {'tarea': tarea})

#Ejercicio 6
def tareasCompletadas_list(request, estado_tarea, primerAnio, segundoAnio):
    tarea=Tarea.objects.filter(estado__icontains=estado_tarea,fechaCreacion__year__range=(primerAnio, segundoAnio))
    return render(request, 'blog/tareasCompletadas_list.html', {'tarea': tarea})

#Ejercicio 7
def ultimoUsuarioComentario_list(request, proyecto_id):
    comentario = Comentario.objects.filter(tareas__proyecto_crea_tareas_id=proyecto_id).order_by('-fechaComentario').first()
    return render(request, 'blog/ultimoUsuarioComentario_list.html', {'comentario': comentario})

#Ejercicio 8
def comentarioTarea_list(request, tarea_id, palabra, anyo):
    comentarios = Comentario.objects.select_related("tareas", "usuarios_comentan").filter(tareas=tarea_id,contenido__istartswith=palabra,fechaComentario__year=anyo)
    return render(request, 'blog/comentarioTarea_list.html', {'comentarios': comentarios})

#Ejercicio 9

def etiquetas_list(request, id_proyecto):
    etiquetas = Etiqueta.objects.filter(etiqueta__proyecto_crea_tareas=id_proyecto).distinct()
    return render(request, 'blog/etiquetas_list.html', {'etiquetas': etiquetas})

#Ejercicio 10
def usuariosNoAsignado_list(request, id_tarea):
    usuarios=Usuario.objects.prefetch_related("asignar_usuarios").exclude(asignar_usuarios=id_tarea)
    return render(request, 'blog/usuariosNoAsignado_list.html', {'usuarios': usuarios})

#Ejercicio 11
def mi_error_404(request, exception=None):
    return render(request, 'errores/404.html', None, None,404)

def mi_error_403(request, exception):
    return render(request, 'errores/403.html', None, None, 403)

def mi_error_400(request, exception):
    return render(request, 'errores/400.html', None, None, 400)

def mi_error_500(request):
    return render(request, 'errores/500.html', None, None, 500)

#Error 400
#from django.core.exceptions import SuspiciousOperation
#def probar_400(request):
    #raise SuspiciousOperation("Prueba del error 400")

#Error 403 
#from django.core.exceptions import PermissionDenied, SuspiciousOperation
#def probar_403(request):
    #raise PermissionDenied

#Error 404
#from django.http import Http404
#def probar_404(request):
    #raise Http404("Prueba del error 404")

#Error 500
#def probar_error_500(request):
    #resultado = 1 / 0