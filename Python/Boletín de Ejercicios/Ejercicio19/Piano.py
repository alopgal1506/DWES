from InstrumentoMusical import *
class Piano (InstrumentoMusical) :
    def __init__(self, nombre, marca, numeroTeclas):
        super().__init__(nombre, marca)
        self.numeroTeclas = numeroTeclas
        
    def mostrarInformacion(self) :
        return "Nombre: "+ self.nombre+ " , Marca: "+self.marca+ " , Número de teclas: "+str(self.numeroTeclas)
    
    def tocar(self) :
        return "Se tocar el piano"
    
    

