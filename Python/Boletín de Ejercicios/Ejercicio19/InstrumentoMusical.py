class InstrumentoMusical () :
    def __init__(self, nombre, marca):
        self.nombre = nombre
        self.marca = marca

        
    def mostrarInformacion(self) :
        return "Nombre: "+ self.nombre+ " , Marca: "+self.marca
    
    def tocar(self) :
        return "Los instrumentos se tocan"
    
    

