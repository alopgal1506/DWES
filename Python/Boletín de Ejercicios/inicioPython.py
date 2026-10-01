# 1 Imprime "Hola, mundo!" en la pantalla. 
    #print("Hola, Mundo!")
# 2 Calcula la suma de dos números ingresados por el usuario.
    #num1 = int(input("Ingresa un numero: "))
    #num2 = int(input("Ingresa otro numero: "))
    #suma = num1 + num2
    #print("La suma es:" + str(suma))
# 3 Calcula el área de un triángulo con la fórmula: Área = (base * altura) / 2. 
    #base = 2
    #altura = 2
    #area = (base * altura) / 2
    #print ("El area del triangulo es " + str(area))
# 4 Convierte grados Celsius a Fahrenheit
    #gradosCelsius = 5
    #gradosFa = (gradosCelsius * 9/5) + 32
    #print("Los grados Fahrenheit son: " + str(gradosFa))
# 5 Calcula el factorial de un número.
    #num = int(input("Ingresa un numero: "))
    #factorial = 1
    #for i in range(1, num + 1):
    #    factorial *= i
    #print("El factorial de " + str(num) + " es: " + str(factorial))
# 6 Verifica si un número es par o impar. 
    #num = int(input("Ingresa un numero: "))
    #if num %2 == 0 :
    #    print("El numero es par")
    #else : 
    #    print("El numero es impar")
"""
"""
# 7 Calcula el máximo común divisor (MCD) de dos números. 
num1 = int(input("Introduce el primer número: "))
num2 = int(input("Introduce el segundo número: "))

mcd = 1

for i in range(1, min(num1, num2) + 1):
    if num1 % i == 0 and num2 % i == 0:
        mcd = i

print("El MCD es:", mcd)
"""
# 8. Imprime los números del 1 al 10 usando un bucle for.
    #for i in range (1,11) :
    #   print(i)
# 9 Calcula la suma de los números del 1 al 100. 
sumarNumeros = 0
for i in range (1,101) :
   sumarNumeros +=i
print(sumarNumeros)

# 10 Crea una lista de números y calcula su promedio. 
list = [1,7,8,9]
suma = 0
for x in list :
    suma += x
division = suma/len(list)
print(division)
"""
