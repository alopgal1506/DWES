from Empleado import *
class Programador (Empleado) :
    def __init__(self, nombre, salario, entorno):
        super().__init__(nombre,salario)
        self.entorno = entorno

    def mostrarInformacion(self) :
        return "Nombre: "+ self.nombre+ " , Salario: "+str(self.salario), " , Entorno: "+self.entorno
    
    

