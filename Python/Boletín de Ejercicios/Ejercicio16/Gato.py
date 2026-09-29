from Animal import *
class Gato (Animal) :
    def __init__(self,edad, peso, color, tamanio):
        self.tamanio = tamanio
        super().__init__(edad, peso, color)
        
    def mostrarTamanio(self) :
        return self.tamanio
    
    def mostrarDatos(self):
        return "Edad: " + str(self.edad) + ", Peso: " + str(self.peso) + ", Color: " + self.color + ", Tamaño: " + self.tamanio
    
    def hablar(self) :
        return "Los gatos maullan"    
        
    


