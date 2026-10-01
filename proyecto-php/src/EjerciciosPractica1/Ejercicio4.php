<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP para
familiarizarte con éste último.  -->
    
    <table border="1">
       <tr>
            <th><?php echo "Lunes" ?></th>
            <th><?php echo "MARTES" ?></th>
            <th><?php echo "MIÉRCOLES" ?></th>
            <th><?php echo "JUEVES" ?></th>
            <th><?php echo "VIERNES" ?></th>
        </tr>
        <tr>
            <td><?php echo "Desarrollo Web Entorno Cliente" ?></td>
            <td><?php echo "Proyecto Intermodular" ?></td>
            <td><?php echo "Inglés" ?></td>
            <td><?php echo "Desarrollo Web Entorno Servidor" ?></td>
            <td><?php echo "Desarrollo Web Entorno Cliente" ?></td>
        </tr>
        <tr>
            <td><?php echo "Desarrollo Web Entorno Cliente" ?></td>
            <td><?php echo "Proyecto Intermodular" ?></td>
            <td><?php echo "Desarrollo Web Entorno Servidor" ?></td>
            <td><?php echo "Desarrollo Web Entorno Servidor" ?></td>
            <td><?php echo "Desarrollo Web Entorno Cliente" ?></td>
        </tr>
        <tr>
            <td><?php echo "Desarrollo Web Entorno Cliente" ?></td>
            <td><?php echo "Optativa" ?></td>
            <td><?php echo "Desarrollo Web Entorno Servidor" ?></td>
            <td><?php echo "Desarrollo Web Entorno Servidor" ?></td>
            <td><?php echo "Desarrollo Web Entorno Cliente" ?></td>
        </tr>
        <tr>
            <td><?php echo "Inglés" ?></td>
            <td><?php echo "Optativa" ?></td>
            <td><?php echo "Diseño de Interfaces Web" ?></td>
            <td><?php echo "Diseño de Interfaces Web" ?></td>
            <td><?php echo "Diseño de Interfaces Web" ?></td>
        </tr>
        <tr>
            <td><?php echo "Desarrollo Web Entorno Servidor" ?></td>
            <td><?php echo "Despliegue de Aplicaciones Web" ?></td>
            <td><?php echo "IPE2" ?></td>
            <td><?php echo "Diseño de Interfaces Web" ?></td>
            <td><?php echo "Diseño de Interfaces Web" ?></td>
        </tr>
        <tr>
            <td><?php echo "Desarrollo Web Entorno Servidor" ?></td>
            <td><?php echo "Despliegue de Aplicaciones Web" ?></td>
            <td><?php echo "IPE2" ?></td>
            <td><?php echo "IPE2" ?></td>
            <td><?php echo "Optativa" ?></td>
        </tr>
        
        
    </table>

</body>

</html>