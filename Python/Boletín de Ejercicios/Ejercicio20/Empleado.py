class Empleado () :
    def __init__(self, nombre, salario):
        self.nombre = nombre
        self.salario = salario

    def mostrarInformacion(self) :
        return "Nombre: "+ self.nombre+ " , Salario: "+str(self.salario)
    
    def calcular_salario_anual(self) :
        return self.salario*12
    

