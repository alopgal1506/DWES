from Empleado import *
class Gerente (Empleado) :
    def __init__(self, nombre, salario, departamento):
        super().__init__(nombre,salario)
        self.departamento = departamento

    def mostrarInformacion(self) :
        return "Nombre: "+ self.nombre+ " , Salario: "+str(self.salario), " , Departamento: "+self.departamento
    
    

