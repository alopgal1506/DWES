from django.db import models
from django.conf import settings
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

class Tarea(models.Model):
    
    ESTADO=[
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
    usuarios=models.ManyToManyField(Usuario, through="AsignarProyecto", related_name="usuarios")
    asignar_usuarios=models.ManyToManyField(Usuario, through="CrearTarea", related_name="asignar_usuarios")
        
    def __str__(self):
        return ("Titulo: " + self.titulo +
            ", Descripción: " + self.descripcion +
            ", Prioridad: " + self.prioridad +
            ", Estado: " + self.estado +
            ", Completa: " + self.completada +
            ", Fecha de Creación: " + self.fechaCreacion +
            ", Fecha de Vencimiento: " + self.horaVencimiento)

class Proyecto(models.Model):
    nombre = models.CharField(max_length=50)
    descripcion= models.TextField()
    duracionEstimada=models.FloatField(default=5.0)
    fechaInicio=models.DateField()
    fechaFinalizacion=models.DateField()
    usuarios=models.ManyToManyField(Usuario, through="AsignacionTarea", related_name="proyectos")
    proyecto=models.ForeignKey(Usuario, on_delete=models.CASCADE)
    def __str__(self):
        return ("Nombre: " + self.nombre +
        ", Descripción: " + self.descripcion +
        ", Duración Estimada: " + self.duracionEstimada +
        ", Fecha de Inicio: " + str(self.fechaInicio)+
        ", Fecha de Finalización: "+ str(self.fechaFinalizacion)+
        ", Usuarios: "+self.usuarios)

class Etiqueta (models.Model):
    nombre=models.CharField(unique=True)
  
    
    def __str__(self):
        return ("Nombre: "+self.name)
        
class AsignacionTarea(models.Model):
    usuario=models.ForeignKey(Usuario, on_delete=models.CASCADE)
    tarea=models.ForeignKey(Tarea, on_delete=models.CASCADE)
    observaciones=models.TextField()
    fechaAsignacion=models.DateTimeField()
    
    def __str__(self):
        return ("Usuario:"+self.usuario+
        "Tarea: "+self.self.tarea+
        "Observaciones: "+self.observaciones+
        ", Fecha Asignación: "+self.fechaAsignacion)
               
class Comentario(models.Model):
    contenido=models.TextField()
    fechaComentario=models.DateTimeField()
        
    def __str__(self):
        return ("Contenido: "+self.contenido+
        ", Fecha Comentario: "+self.fechaComentario)
    
        

class AsignarProyecto(models.Model):
    usuario=models.ForeignKey(Usuario, on_delete=models.CASCADE)
    proyecto=models.ForeignKey(Proyecto, on_delete=models.CASCADE)
    
    def __str__(self):
            return ("Usuario: " + self.usuario +
            ", Proyectos: " + self.proyecto)
    
class CrearTarea(models.Model):
    usuario=models.ForeignKey(Usuario, on_delete=models.CASCADE)
    tarea=models.ForeignKey(Tarea, on_delete=models.CASCADE)
        
    def __str__(self):
        return ("Usuario: " + self.usuario +
        ", Tarea: " + self.tarea)
    
     
     