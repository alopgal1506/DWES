<?php
/**
 * Biblioteca de funciones matemáticas.
 * Las funciones trabajan con números enteros y usan solo operaciones
 * aritméticas (sin convertir los números a cadenas).
 */

/** Potencia: base elevada a un exponente entero >= 0. */
function potencia(int $base, int $exponente): int
{
    $resultado = 1;
    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $base;
    }
    return $resultado;
}

/** Cuenta el número de dígitos de un entero. */
function digitos(int $n): int
{
    $n = abs($n);
    if ($n === 0) {
        return 1;
    }
    $cuenta = 0;
    while ($n > 0) {
        $n = intdiv($n, 10);
        $cuenta++;
    }
    return $cuenta;
}

/** Le da la vuelta a un número (conserva el signo). */
function voltea(int $n): int
{
    $signo = $n < 0 ? -1 : 1;
    $n = abs($n);
    $resultado = 0;
    while ($n > 0) {
        $resultado = $resultado * 10 + $n % 10;
        $n = intdiv($n, 10);
    }
    return $signo * $resultado;
}

/** Devuelve true si el número es capicúa. */
function esCapicua(int $n): bool
{
    return $n === voltea($n);
}

/** Devuelve true si el número es primo. */
function esPrimo(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

/** Devuelve el menor primo mayor que $n. */
function siguientePrimo(int $n): int
{
    $candidato = $n + 1;
    while (!esPrimo($candidato)) {
        $candidato++;
    }
    return $candidato;
}

/**
 * Devuelve el dígito en la posición $pos (empezando en 0, de izquierda
 * a derecha). Devuelve -1 si la posición no existe.
 */
function digitoN(int $n, int $pos): int
{
    $n = abs($n);
    $total = digitos($n);
    if ($pos < 0 || $pos >= $total) {
        return -1;
    }
    return intdiv($n, potencia(10, $total - $pos - 1)) % 10;
}

/**
 * Posición de la primera ocurrencia de un dígito dentro de un número.
 * Devuelve -1 si no se encuentra.
 */
function posicionDeDigito(int $n, int $digito): int
{
    $total = digitos($n);
    for ($pos = 0; $pos < $total; $pos++) {
        if (digitoN($n, $pos) === $digito) {
            return $pos;
        }
    }
    return -1;
}

/** Quita $cuantos dígitos por detrás (derecha). */
function quitaPorDetras(int $n, int $cuantos): int
{
    return intdiv($n, potencia(10, $cuantos));
}

/** Quita $cuantos dígitos por delante (izquierda). */
function quitaPorDelante(int $n, int $cuantos): int
{
    $n = abs($n);
    $total = digitos($n);
    if ($cuantos >= $total) {
        return 0;
    }
    return $n % potencia(10, $total - $cuantos);
}

/** Añade un dígito por detrás. */
function pegaPorDetras(int $n, int $digito): int
{
    $signo = $n < 0 ? -1 : 1;
    return $signo * (abs($n) * 10 + $digito);
}

/** Añade un dígito por delante. */
function pegaPorDelante(int $n, int $digito): int
{
    $signo = $n < 0 ? -1 : 1;
    $n = abs($n);
    if ($n === 0) {
        // El 0 no cuenta como dígito a la izquierda: pegaPorDelante(0, 5) = 5
        return $signo * $digito;
    }
    return $signo * ($digito * potencia(10, digitos($n)) + $n);
}

/**
 * Devuelve el trozo de número comprendido entre las posiciones
 * $inicio y $fin (ambas incluidas, empezando en 0 por la izquierda).
 */
function trozoDeNumero(int $n, int $inicio, int $fin): int
{
    $n = abs($n);
    $total = digitos($n);
    if ($inicio < 0 || $fin >= $total || $inicio > $fin) {
        return -1;
    }
    $sinDetras = quitaPorDetras($n, $total - 1 - $fin);
    return $sinDetras % potencia(10, $fin - $inicio + 1);
}

/** Pega dos números para formar uno. */
function juntaNumeros(int $a, int $b): int
{
    return $a * potencia(10, digitos($b)) + $b;
}