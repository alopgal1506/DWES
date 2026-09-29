class Persona ():
    def _init_(self, nombre = "", edad = 0) :
        self.nombre=nombre
        self.edad=edad
    
    def mostrarNombre(self) :
        return self.nombre
    def mostrarEdad(self) :
        return self.edad