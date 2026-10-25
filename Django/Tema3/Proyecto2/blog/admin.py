from django.contrib import admin

from .models import Usuario, Proyecto, Tarea, Etiqueta, AsignacionTarea, Comentario

admin.site.register(Usuario)
admin.site.register(Proyecto)
admin.site.register(Etiqueta)
admin.site.register(AsignacionTarea)
admin.site.register(Comentario)