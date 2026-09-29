class CuentaBancaria () :
    def __init__(self, titular, saldo):
        self.titular = titular
        self.saldo = saldo
    
    def mostrarTitular(self) :
        return self.titular

    def mostrarSaldo(self):
        return self.saldo
        
    def depositar(self, dinero) :
        self.saldo=self.saldo+dinero
        return self.saldo
    
    def retirar(self, dinero) :
        self.saldo=self.saldo-dinero
        return self.saldo
    

