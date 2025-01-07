# Todo List con Livewire 3

## Descripción del Proyecto

Este proyecto es una aplicación de lista de tareas (Todo List) construida con [Livewire 3](https://laravel-livewire.com/), un framework de componentes dinámicos para Laravel. La aplicación permite a los usuarios agregar, editar, marcar como completadas y eliminar tareas de manera interactiva sin necesidad de recargar la página. Utiliza Livewire para manejar la lógica del lado del servidor y actualizar la interfaz de usuario en tiempo real.

## Características

- **Agregar Tareas:** Los usuarios pueden agregar nuevas tareas a la lista.
- **Editar Tareas:** Las tareas existentes se pueden editar.
- **Marcar como Completadas:** Las tareas se pueden marcar como completadas o no completadas.
- **Eliminar Tareas:** Las tareas se pueden eliminar de la lista.
- **Interfaz Dinámica:** La interfaz se actualiza en tiempo real sin recargar la página.

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente:

- [PHP](https://www.php.net/) >= 8.2
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) y [npm](https://www.npmjs.com/)

## Instalación

Sigue estos pasos para instalar y configurar el proyecto en tu máquina local:

1. **Clona el repositorio:**
    ```sh
    git https://github.com/StevenU21/Livewire-TO-DO-LIST.git
    ```

    ```sh
    cd Livewire-TO-DO-LIST
    ```

2. **Instala las dependencias de PHP:**
    ```sh
    composer install
    ```

3. **Instala las dependencias de Node.js:**
    ```sh
    npm install
    ```

4. **Configura el archivo `.env`:**
    Copia el archivo `.env.example` a `.env` y configura tus variables de entorno, incluyendo la conexión a la base de datos.
    ```sh
    cp .env.example .env
    ```

5. **Genera la clave de la aplicación:**
    ```sh
    php artisan key:generate
    ```

6. **Migra la base de datos:**
    ```sh
    php artisan migrate
    ```

7. **Compila los assets:**
    ```sh
    npm run build
    ```

## Uso

Para iniciar el servidor de desarrollo, ejecuta el siguiente comando:

```sh
php artisan serve
```

```sh
npm run dev
```

Luego, abre tu navegador y navega a `http://localhost:8000` para ver la aplicación en funcionamiento.

