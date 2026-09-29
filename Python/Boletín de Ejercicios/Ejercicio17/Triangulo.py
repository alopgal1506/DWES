from FiguraGeometrica import *
class Triangulo (FiguraGeometrica) :
        
    def mostrarInformacion(self) :
        return "Ancho: "+ str(self.ancho)+ " , Altura: "+str(self.altura)
    
    def area(self):
        return (self.ancho*self.altura)/2

