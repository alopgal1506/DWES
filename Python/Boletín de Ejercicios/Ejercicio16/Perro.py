from Animal import *
class Perro (Animal) :
    def __init__(self, edad, peso, color, pelo):
        self.pelo = pelo
        super().__init__(edad, peso, color)
        
    def mostrarMarca(self) :
        return self.pelo
    
    def mostrarDatos(self):
        return "Edad: " + str(self.edad) + ", Peso: " + str(self.peso) + ", Color: " + self.color + ", Pelo: " + self.pelo
    
    def hablar(self) :
        return "Los perros ladran"   


