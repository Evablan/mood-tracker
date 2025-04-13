
# README_draft.md

## 🧠 Mood Tracker – Documento de desarrollo

### 🟣 Descripción general del proyecto

**Mood Tracker** es una aplicación web que permite a los usuarios registrar su estado de ánimo diario junto con un texto tipo diario personal. Está dirigida a adolescentes y adultos que desean reflexionar sobre su estado emocional a lo largo del tiempo.

El proyecto se basa en el patrón **MVC (Modelo-Vista-Controlador)**, está desarrollado en PHP, utiliza una base de datos MySQL y hace uso de **AJAX** para mejorar la experiencia de usuario.

---

### 📁 Estructura actual del proyecto

- `/config/`  
  - `config.php`: configuración general.  
  - `database.php`: conexión a la base de datos.  
  - `router.php`: sistema de enrutamiento.

- `/controladores/`  
  - `AuthController.php`: gestiona el registro e inicio de sesión.  
  - `MoodController.php`: recibe y procesa los estados de ánimo.

- `/modelos/`  
  - `Usuario.php`: define el modelo del usuario.  
  - `EstadoAnimo.php`: define el modelo de entradas de ánimo.

- `/vistas/`  
  - `/auth/`: formularios de inicio de sesión y registro.  
  - `/moods/`: vistas de registro, listado, edición.  
  - `/includes/`: `header.php` y `footer.php`.  
  - `dashboard.php`: vista principal tras el login.  
  - `index.php`: portada del proyecto.  
  - `/css/`: estilos personalizados (ej: `login.css`).

- `/assets/`  
  - `/js/`: scripts como `historial.js` para AJAX.  
  - `/img/`: imágenes del proyecto.

- `/lib/`  
  - `gestorBD.php`: funciones para acceder a la base de datos.  
  - `gestorSesiones.php`: manejo de sesiones.

---

### 🧩 Base de datos actual

#### 📌 Tablas:

- `usuarios`  
  - `id` (INT, PK, AI)  
  - `nombre` (VARCHAR)  
  - `email` (VARCHAR, UNIQUE)  
  - `password_hash` (VARCHAR)  
  - `fecha_registro` (DATETIME)

- `estados_animo`  
  - `id` (INT, PK, AI)  
  - `usuario_id` (FK a `usuarios.id`)  
  - `fecha` (DATE)  
  - `estado_animo` (VARCHAR)  
  - `texto_diario` (TEXT)

---

### 🧑‍💻 Funcionalidades implementadas

- ✅ Registro e inicio de sesión con verificación de usuario y contraseña cifrada.
- ✅ Registro de estado de ánimo con nota personal.
- ✅ Envío de datos desde el `dashboard` mediante AJAX.
- ✅ Visualización de historial de estados de ánimo al pulsar un botón, usando JavaScript separado.
- ✅ Estilos con Bootstrap + CSS personalizado.
- ✅ Colores asociados a emociones en el `<select>`, sin iconos (por diseño emocional adulto).

---

### 🐛 Problemas resueltos

- ❌ Error al eliminar base de datos por carpeta residual → solución: eliminación manual desde `C:\xampp\mysql\data\`.
- ❌ Error `Unknown column 'password_hash'` → añadido campo correcto en SQL.
- ❌ Fallos con AJAX → uso correcto de `fetch()`, `JSON.stringify()`, y recepción con `file_get_contents("php://input")`.

---

### 💡 Pendiente / Ideas futuras

- Visualización de gráficos con resumen emocional.
- Filtro de entradas por estado de ánimo.
- Integración de IA para análisis de texto emocional.
- App móvil para seguimiento diario más cómodo.
- Exportación de entradas como PDF personal.

---

### 📌 Notas para futuros proyectos

- Separar cada tipo de lógica en archivos específicos (controlador, modelo, vista, JS).
- Usar `password_hash()` siempre, y dejar clara la estructura en la base de datos.
- Organizar carpetas desde el principio pensando en escalabilidad.
- Ir documentando errores comunes y sus soluciones en tiempo real.

---

### ✍️ Autor

Eva Blanco Martínez  
Desarrolladora en formación – Proyecto académico + personal


