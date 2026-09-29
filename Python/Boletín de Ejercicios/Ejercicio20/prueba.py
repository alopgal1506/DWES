from Empleado import *
from Gerente import *
from Programador import *

gerente1=Gerente("Ana López", 1200, "Informática")
programador1=Programador("Yeray Ventura",1400, "Visual Studio")

print(gerente1.mostrarInformacion())
print("El salario anual del gerente es: ",gerente1.calcular_salario_anual())
print(programador1.mostrarInformacion())
print("El salario anual del programador es: ",programador1.calcular_salario_anual())