from Vehiculo import *
class Coche (Vehiculo) :
    def __init__(self, marca, modelo, color):
        super().__init__(marca, modelo)
        self.color = color

        
    def mostrarInformacion(self) :
        return "Marca: "+ self.marca+ " , Modelo: "+self.modelo+ " , Color: "+self.color
    