from Estudiante import *

estudiante1 = Estudiante("Yeray" , 20 ,"1DAW")
estudiante2 = Estudiante("Ana" , 22, "2DAW")
estudiante3 = Estudiante("Jesus" , 21, "2DAW")

listaEstudainte = [estudiante1,estudiante2,estudiante3]

for i in listaEstudainte :
    print(i.decirNombre(), i.decirEdad() , i.decirCurso())