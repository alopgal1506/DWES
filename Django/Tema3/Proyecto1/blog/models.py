from django.db import models
from django.conf import settings
from django.utils import timezone


class Usuario(models.Model):
    
    nombre = models.CharField(max_length=50)
    correoElectronico = models.CharField(max_length=200, unique=True)
    contrasenia = models.TextField()
    fechaRegistro = models.DateTimeField(blank=True, null=True)

    def publish(self):
        self.fechaRegistro = timezone.now()
        self.save()

    def __str__(self):
        return ("Nombre: " + self.nombre +
            ", Correo Electrónico: " + self.correoElectronico +
            ", Contraseña: " + self.contrasenia +
            ", Fecha de registro: " + str(self.fechaRegistro))

class Tarea(models.Model):
    
    ESTADO=[
            ("Pendiente", "Pendiente"),
            ("Progreso", "Progreso"),
            ("Completada", "Completada"),
        ]
    
    titulo = models.CharField(max_length=200)
    descripcion = models.TextField()
    prioridad = models.IntegerField()
    estado = models.CharField(max_length=20, choices=ESTADO, default='Pendiente')
    completada = models.BooleanField(default=False)
    fechaCreacion = models.DateField(auto_now_add=True)
    horaVencimiento = models.TimeField()
    

    def __str__(self):
        return ("Titulo: " + self.titulo +
            ", Correo Electrónico: " + self.correoElectronico +
            ", Contraseña: " + self.contrasenia +
            ", Fecha de registro: " + str(self.fechaRegistro))