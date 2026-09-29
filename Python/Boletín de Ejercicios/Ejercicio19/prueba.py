from InstrumentoMusical import *
from Guitarra import *
from Piano import *

guitarra1=Guitarra("Guitarra 1", "Modelo 2", 5)
piano1=Piano("Piano 1", "Modelo 45", 40)

print(guitarra1.tocar())
print(piano1.tocar())