from django.db import models
from django.utils import timezone


class Usuario(models.Model):
    nombre = models.CharField(max_length=50)
    correoElectronico = models.CharField(max_length=200, unique=True)
    contrasenia = models.TextField()
    fechaRegistro = models.DateTimeField(blank=True, null=True)

    def publish(self):
        self.fechaRegistro = timezone.now()
        self.save()

    def __str__(self):
        return ("Nombre: " + self.nombre +
                ", Correo Electrónico: " + self.correoElectronico +
                ", Contraseña: " + self.contrasenia +
                ", Fecha de registro: " + str(self.fechaRegistro))

class Proyecto(models.Model):
    nombre = models.CharField(max_length=50)
    descripcion = models.TextField()
    duracionEstimada = models.FloatField(default=5.0)
    fechaInicio = models.DateField()
    fechaFinalizacion = models.DateField()
    #Primera relación N:M
    usuarios = models.ManyToManyField(Usuario, related_name='usuarios')
    #Segunda Relación 1:N
    crear_usuarios=models.ForeignKey(Usuario, on_delete=models.CASCADE, related_name='crear_usuarios')

    def __str__(self):
        return ("Nombre: " + self.nombre +
                ", Descripción: " + self.descripcion +
                ", Duración Estimada: " + str(self.duracionEstimada) +
                ", Fecha de Inicio: " + str(self.fechaInicio) +
                ", Fecha de Finalización: " + str(self.fechaFinalizacion))


class Tarea(models.Model):
    ESTADO = [
        ("Pendiente", "Pendiente"),
        ("Progreso", "Progreso"),
        ("Completada", "Completada"),
    ]
    titulo = models.CharField(max_length=200)
    descripcion = models.TextField()
    prioridad = models.IntegerField()
    estado = models.CharField(max_length=20, choices=ESTADO, default='Pendiente')
    completada = models.BooleanField(default=False)
    fechaCreacion = models.DateField(auto_now_add=True)
    horaVencimiento = models.TimeField()
    #Tercera Relación 1:N
    crear_tareas = models.ForeignKey(Usuario, on_delete=models.CASCADE, related_name='crear_tareas')
    #Cuarta Relación N:M
    asignar_usuarios = models.ManyToManyField(Usuario, through='AsignacionTarea', related_name='asignar_usuarios')
    #Quinta Relación N:M
    etiqueta=models.ManyToManyField('Etiqueta', related_name='etiqueta')
    #Sexta Realacion 1:N
    proyecto_crea_tareas = models.ForeignKey(Proyecto, on_delete=models.CASCADE, related_name='proyecto_crea_tareas')


    def __str__(self):
        return ("Titulo: " + self.titulo +
                ", Descripción: " + self.descripcion +
                ", Prioridad: " + str(self.prioridad) +
                ", Estado: " + self.estado +
                ", Completa: " + str(self.completada) +
                ", Fecha de Creación: " + str(self.fechaCreacion) +
                ", Hora de Vencimiento: " + str(self.horaVencimiento))




class Etiqueta(models.Model):
    nombre = models.CharField(max_length=100, unique=True)

    def __str__(self):
        return "Nombre: " + self.nombre


class AsignacionTarea(models.Model):
    observaciones = models.TextField(blank=True, default='')
    fechaAsignacion = models.DateTimeField(default=timezone.now)
    #Cuarta Relación
    tarea = models.ForeignKey(Tarea, on_delete=models.CASCADE)
    usuario = models.ForeignKey(Usuario, on_delete=models.CASCADE)
    
    def publish(self):
        self.fechaAsignacion = timezone.now()
        self.save()

    def __str__(self):
        return ("Observaciones: " + self.observaciones +
                ", Fecha Asignación: " + str(self.fechaAsignacion))


class Comentario(models.Model):
    contenido = models.TextField()
    fechaComentario = models.DateTimeField()
    #Septima relacion de 1:N
    usuarios_comentan=models.ForeignKey(Usuario, on_delete=models.CASCADE, related_name='usuarios_comentan')
    #Octava Relacion 1:N
    tareas=models.ForeignKey(Tarea, on_delete=models.CASCADE, related_name='tareas')

    def publish(self):
        self.fechaComentario = timezone.now()
        self.save()
        
    def __str__(self):
        return ("Contenido: " + self.contenido +
                ", Fecha Comentario: " + str(self.fechaComentario))