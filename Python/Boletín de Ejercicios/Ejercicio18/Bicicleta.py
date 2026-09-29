from Vehiculo import *
class Bicicleta (Vehiculo) :
    def __init__(self, marca, modelo, rueda):
        super().__init__(marca, modelo)
        self.rueda = rueda

        
    def mostrarInformacion(self) :
        return "Marca: "+ self.marca+ " , Modelo: "+self.modelo+ " , Ruedas: "+str(self.rueda)
    