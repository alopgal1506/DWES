# Crea una clase llamada Rectangulo con atributos ancho y altura. Agrega un método para calcular el área del rectángulo y otro para calcular su perímetro. 
class Rectangulo() :
    def __init__(self, ancho, altura):
        self.ancho=ancho
        self.altura=altura
    
    def calcularArea (self) :
        return self.ancho*self.altura
        
    def calcularPerimetro (self) :
        return 2*(self.ancho+self.altura)