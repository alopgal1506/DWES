from django.shortcuts import render

# Create your views here.
from django.shortcuts import render
from .models import Animal, Colaborador, Protectora


def animal_list(request):
   animales = Animal.objects.all()
   return render(request, 'blog/animal_list.html', {'animal_list': animales})


def protectora_list(request):
   protectoras = Protectora.objects.all()
   return render(request, 'blog/protectora_list.html', {'protectora_list': protectoras})


def colaborador_list(request):
   colaboradores = Colaborador.objects.all()
   return render(request, 'blog/colaborador_list.html', {'colaborador_list': colaboradores})
