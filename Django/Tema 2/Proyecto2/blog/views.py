from django.shortcuts import render
from .models import Usuario, Producto, Compra

# Create your views here.
def index(request):
    return render(request, 'blog/index.html')

def usuario_list(request):
    usuarios = Usuario.objects.all()
    return render(request, 'blog/usuario_list.html', {'usuarios_list': usuarios})

def producto_list(request):
    productos = Producto.objects.all()
    return render(request, 'blog/producto_list.html', {'productos_list': productos})


def compra_list(request):
    compras = Compra.objects.all()
    return render(request, 'blog/compra_list.html', {'compras_list': compras})