from django.contrib import admin

# Register your models here.

from .models import Usuario, Producto, Compra

admin.site.register(Usuario)
admin.site.register(Producto)
admin.site.register(Compra)
