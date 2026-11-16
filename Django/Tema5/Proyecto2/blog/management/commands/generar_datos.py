import random

from datetime import date, timedelta, time

from django.core.management.base import BaseCommand
from django.utils import timezone

from blog.models import (
    Usuario,
    Proyecto,
    Tarea,
    Etiqueta,
    AsignacionTarea,
    Comentario
)


class Command(BaseCommand):

    help = 'Genera datos de prueba para la aplicación'

    def handle(self, *args, **kwargs):

        self.stdout.write("Generando datos...")

        usuarios = []

        for i in range(5):
            usuario = Usuario.objects.create(
                nombre=f"Usuario {i + 1}",
                correoElectronico=f"usuario{i + 1}_{random.randint(1000,9999)}@gmail.com",
                contrasenia="password123",
                fechaRegistro=timezone.now()
            )

            usuarios.append(usuario)

        proyectos = []

        for i in range(3):
            proyecto = Proyecto.objects.create(
                nombre=f"Proyecto {i + 1}",
                descripcion=f"Descripción del proyecto {i + 1}",
                duracionEstimada=random.uniform(5, 30),
                fechaInicio=date.today(),
                fechaFinalizacion=date.today() + timedelta(days=30),
                crear_usuarios=random.choice(usuarios)
            )

            proyecto.usuarios.set(
                random.sample(usuarios, 3)
            )

            proyectos.append(proyecto)

        nombres_etiquetas = [
            "Desarrollo",
            "Diseño",
            "Programación",
            "Documentación",
            "Urgente",
            "Revisión"
        ]

        etiquetas = []

        for nombre in nombres_etiquetas:
            etiqueta, creada = Etiqueta.objects.get_or_create(
                nombre=nombre
            )
            etiquetas.append(etiqueta)

        tareas = []

        for proyecto in proyectos:

            for i in range(3):

                tarea = Tarea.objects.create(
                    titulo=f"Tarea {i + 1} de {proyecto.nombre}",
                    descripcion="Descripción de la tarea",
                    prioridad=random.randint(1, 5),
                    estado=random.choice([
                        "Pendiente",
                        "Progreso",
                        "Completada"
                    ]),
                    completada=False,
                    horaVencimiento=time(12, 0),
                    crear_tareas=random.choice(usuarios),
                    proyecto_crea_tareas=proyecto
                )

                tarea.etiqueta.set(
                    random.sample(etiquetas, 2)
                )

                tareas.append(tarea)

        for tarea in tareas:

            for usuario in random.sample(usuarios, 2):

                AsignacionTarea.objects.create(
                    observaciones="Asignación de tarea",
                    fechaAsignacion=timezone.now(),
                    tarea=tarea,
                    usuario=usuario
                )

        for tarea in tareas:

            for i in range(2):

                Comentario.objects.create(
                    contenido="Comentario de prueba",
                    fechaComentario=timezone.now(),
                    usuarios_comentan=random.choice(usuarios),
                    tareas=tarea
                )

        self.stdout.write(
            self.style.SUCCESS("¡Datos generados correctamente!")
        )