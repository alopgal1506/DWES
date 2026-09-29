from CuentaBancaria import *
dineroActual=300
cuenta1=CuentaBancaria("Ana López Galán", dineroActual)

dineroSacar=20
dineroMeter=50
print("El titular de la cuenta es ", cuenta1.mostrarTitular(), " con un saldo de ", cuenta1.mostrarSaldo())
dineroActual=cuenta1.retirar(dineroSacar)
print("Se han retirado ",dineroSacar," tu saldo actual es ",dineroActual)
dineroActual=cuenta1.depositar(dineroMeter)
print("Se han metido en el banco ",dineroMeter," tu saldo actual es ",dineroActual)