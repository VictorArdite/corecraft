<?php
/**
 * Funciones helper para manejo de URLs
 */

/**
 * Genera una URL absoluta usando BASE_URL
 * @param string $path Ruta relativa
 * @return string URL absoluta
 */
function url($path = '') {
    return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
}

/**
 * Redirige a una URL usando BASE_URL
 * @param string $path Ruta relativa
 * @param array $params Parámetros de query string
 */
function redirect($path = '', $params = []) {
    $url = url($path);
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }
    header('Location: ' . $url);
    exit;
}

/**
 * Genera un enlace HTML usando BASE_URL
 * @param string $path Ruta relativa
 * @param string $text Texto del enlace
 * @param array $attributes Atributos HTML adicionales
 * @return string Enlace HTML
 */
function link_to($path, $text, $attributes = []) {
    $url = url($path);
    $attrs = '';
    foreach ($attributes as $key => $value) {
        $attrs .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
    return '<a href="' . $url . '"' . $attrs . '>' . htmlspecialchars($text) . '</a>';
} 