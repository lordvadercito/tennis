# Tennis Tournament CLI

Este proyecto es una aplicación de consola para simular un torneo de tenis, desarrollada como desafío técnico para GeoPagos.

## Requisitos

- PHP >= 8.4
- Composer

## Instalación

1. Clona el repositorio:
   ```bash
   git clone <url-del-repo>
   cd tennis
   ```
2. Instala las dependencias:
   ```bash
   composer install
   ```

## Ejecución del juego

Para iniciar la aplicación de consola:

```bash
php run.php
```

Sigue las instrucciones en pantalla para seleccionar el tipo de torneo (`male` o `female`). El sistema simulará el torneo y mostrará el campeón.

## Estructura del proyecto

- `src/` - Código fuente de la aplicación
- `tests/` - Tests unitarios y de integración
- `run.php` - Punto de entrada CLI

## Correr los tests

Este proyecto utiliza PHPUnit. Los tests están ubicados en el directorio `tests/`.

Para ejecutar todos los tests:

```bash
./vendor/bin/phpunit
```
---

¡Disfruta simulando tu torneo de tenis! 🎾
