from InstrumentoMusical import *
class Guitarra (InstrumentoMusical) :
    def __init__(self, nombre, marca, numeroCuerdas):
        super().__init__(nombre, marca)
        self.numeroCuerdas = numeroCuerdas
        
    def mostrarInformacion(self) :
        return "Nombre: "+ self.nombre+ " , Marca: "+self.marca+ " , Número de cuerdas: "+str(self.numeroCuerdas)
    
    def tocar(self) :
        return "Se tocar la guitarra"
    
    

