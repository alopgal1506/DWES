from Animal import *
from Gato import *
from Perro import *

animal1=Animal(30,50, "verde")
perro1 = Perro(5, 12, "marrón", "mediano")
gato1 = Gato(3, 5, "blanco", "largo")


print(animal1.hablar())
print(perro1.hablar())
print(gato1.hablar())
