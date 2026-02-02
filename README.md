Sistema de Gestión Hotelera - Palmeras del Tuyú
Descripción
Este sistema es una solución integral para la administración de plazas hoteleras, desarrollada para digitalizar el control de ingresos, egresos y facturación. El proyecto nace de mi experiencia directa en el sector, traduciendo necesidades operativas reales en una arquitectura de software funcional.

Stack Tecnológico
Lenguaje: PHP 8.2

Base de Datos: MySQL / MariaDB

Conectividad: PDO (PHP Data Objects) para consultas seguras

Frontend: HTML5, CSS3 (Maquetación responsiva con Flexbox)

Funcionalidades Principales
Gestión de Check-In: Registro completo de huéspedes (DNI, Teléfono, Fechas) con asignación dinámica de habitaciones.

Menú de Habitaciones: Monitoreo visual de estados (Disponible/Ocupada) categorizado por tipo (Doble, Triple, etc.).

Historial de Huéspedes: Auditoría de estadías pasadas con filtros de búsqueda por nombre o documento.

Autenticación Segura: Sistema de acceso y registro para administradores con validación de identidad.

Desafíos Técnicos Superados
Seguridad de Datos: Refactoricé el sistema de login original para implementar Hashing de contraseñas mediante password_hash y password_verify, asegurando que ninguna credencial se almacene en texto plano.

Modelado Relacional: Diseñé una estructura de base de datos normalizada, utilizando una tabla intermedia (habitacion_x_huesped) para gestionar la relación entre estadías y plazas, manteniendo la integridad referencial.

Estructura del Repositorio
/login: Módulos de acceso y registro de administradores.

/sitio: Lógica de negocio (Check-in, Habitaciones, Historial).

test.sql: Script de creación de la base de datos y procedimientos almacenados.
