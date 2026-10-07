from django.db import models
from django.conf import settings
from django.utils import timezone


class Usuario(models.Model):
    user = models.CharField(max_length=200)
    nombre = models.CharField(max_length=200)
    dni = models.CharField(max_length=9, unique=True)
    fecha_creacion = models.DateTimeField(default=timezone.now)

    def __str__(self):
        return self.nombre

    def publish(self):
        self.fecha_creacion = timezone.now()
        self.save()


class Producto(models.Model):
    nombre = models.CharField(max_length=50)
    descripcion = models.TextField()
    precio = models.DecimalField(max_digits=8, decimal_places=2)

    def __str__(self):
        return self.nombre


# CASCADE: si borras un usuario, se borran sus compras.
# PROTECT: no deja borrar un producto que tenga compras.
class Compra(models.Model):
    usuario = models.ForeignKey(Usuario, on_delete=models.CASCADE, related_name="compras")
    producto = models.ForeignKey(Producto, on_delete=models.PROTECT, related_name="compras")
    fecha_compra = models.DateTimeField(default=timezone.now)

    def __str__(self):
        return f"Compra {self.id} - {self.usuario.nombre} - {self.producto.nombre}"

    def publish(self):
        self.fecha_compra = timezone.now()
        self.save()