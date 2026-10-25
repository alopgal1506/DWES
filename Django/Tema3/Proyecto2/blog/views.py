from django.shortcuts import render, get_object_or_404
from .models import Proyecto, AsignacionTarea, Tarea

#Ejercicio 1
def index(request):
    return render(request, 'blog/index.html')

#Ejercicio 2
def proyectos_list(request):
    proyectos = Proyecto.objects.prefetch_related("usuarios").select_related("crear_usuarios")
    return render(request, 'blog/proyectos_list.html', {'proyectos_list': proyectos})

#Ejercicio 3
def asignacionTarea_list(request, proyecto_id):
    proyecto = get_object_or_404(Proyecto, id=proyecto_id)

    tareas = (Tarea.objects
              .filter(proyecto_crea_tareas=proyecto)
              .select_related('crear_tareas')
              .prefetch_related('asignaciontarea_set__usuario')
              .order_by('-fechaCreacion', '-id'))

    return render(request, 'blog/asignacionTarea_list.html', {
        'proyecto': proyecto,
        'tareas': tareas,
    })

#Ejercicio 4
def usuariosTarea_list(request, tarea_id):
    tarea = get_object_or_404(Tarea, id=tarea_id)

    asignaciones = (AsignacionTarea.objects
                    .filter(tarea=tarea)
                    .select_related('usuario')
                    .order_by('fechaAsignacion'))

    return render(request, 'blog/usuarioTarea_list.html', {
        'tarea': tarea,
        'asignaciones': asignaciones,
    })