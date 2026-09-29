from Estudiante import *

estudiante1 = Estudiante("Yeray" , 20 ,"2ª DAW")
estudiante2 = Estudiante("Ana" , 22, "2ª DAW")
estudiante3 = Estudiante("Jesus" , 21, "2ª DAW")

listaEstudiantes = []
listaEstudiantes.append(estudiante1)
listaEstudiantes.append(estudiante2)
listaEstudiantes.append(estudiante3)


for i in listaEstudiantes :
    print(i.decirNombre(), i.decirEdad() , i.decirCurso())