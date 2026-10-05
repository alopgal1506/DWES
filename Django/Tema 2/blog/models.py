from django.db import models
from django.conf import settings
from django.utils import timezone

class Animal(models.Model):

    cuidador = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.CASCADE)
    nombre = models.CharField(max_length=50)
    tipo = models.CharField(max_length=50)

    def __str__(self):

        return self.nombre
    
    
class Protectora(models.Model):

    nombre = models.CharField(max_length=50)
    descripcion = models.TextField()
    fecha_creacion = models.DateTimeField(default=timezone.now)
    

    def __str__(self):

        return self.nombre


class Colaborador(models.Model):

    nombre = models.CharField(max_length=50)
    cargo = models.CharField(max_length=50)
    fecha_entrada_protectora = models.DateTimeField(default=timezone.now)
    

    def __str__(self):

        return self.nombre
