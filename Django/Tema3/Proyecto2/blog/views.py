from django.shortcuts import render
from .models import Proyecto, AsignacionTarea


def index(request):
    return render(request, 'blog/index.html')

#Ejercicio 1
def proyectos_list(request):
    proyectos = Proyecto.objects.prefetch_related("usuarios").select_related("crear_usuarios")
    return render(request, 'blog/proyectos_list.html', {'proyectos_list': proyectos})

#Ejercicio 2
def asignacionTarea_list(request, proyecto_id):
    proyecto = get_object_or_404(Proyecto, id=proyecto_id)

    asignaciones = (AsignacionTarea.objects
                    .filter(tarea__proyecto_crea_tareas=proyecto)
                    .select_related('tarea', 'usuario')
                    .order_by('-tarea__fechaCreacion', '-tarea__id'))

    return render(request, 'blog/asignacionTarea_list.html', {
        'proyecto': proyecto,
        'asignacionTarea_list': asignaciones,
    })