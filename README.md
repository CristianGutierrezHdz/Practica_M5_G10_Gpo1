# Documentacion de API (Postman)

Esta API expone recursos para:
- eventos
- ponentes
- asistentes

Las rutas estan definidas en [routes/api.php](routes/api.php).

## Base URL

Usa esta base en local:

```text
http://127.0.0.1:8000/api
```

Si aun no esta levantado el proyecto:

```bash
php artisan serve
```

## Headers recomendados en Postman

```text
Accept: application/json
Content-Type: application/json
```

## 1) Rutas de Eventos

### Listar eventos

- Metodo: GET
- URL: /eventos

Ejemplo completo:

```http
GET http://127.0.0.1:8000/api/eventos
```

### Crear evento

- Metodo: POST
- URL: /eventos

Body JSON:

```json
{
	"titulo": "Foro de Tecnologia Publica",
	"descripcion": "Encuentro de innovacion para sector publico",
	"fecha_inicio": "2026-05-20",
	"fecha_fin": "2026-05-21",
	"ubicacion": "Ciudad de Mexico"
}
```

Ejemplo completo:

```http
POST http://127.0.0.1:8000/api/eventos
```

### Ver evento por ID

- Metodo: GET
- URL: /eventos/{id}

Ejemplo completo:

```http
GET http://127.0.0.1:8000/api/eventos/1
```

### Actualizar evento

- Metodo: PUT (o PATCH)
- URL: /eventos/{id}

Body JSON:

```json
{
	"titulo": "Foro de Tecnologia Publica 2026",
	"descripcion": "Evento actualizado",
	"fecha_inicio": "2026-05-20",
	"fecha_fin": "2026-05-22",
	"ubicacion": "Guadalajara"
}
```

Ejemplo completo:

```http
PUT http://127.0.0.1:8000/api/eventos/1
```

### Eliminar evento

- Metodo: DELETE
- URL: /eventos/{id}

Ejemplo completo:

```http
DELETE http://127.0.0.1:8000/api/eventos/1
```

## 2) Rutas de Ponentes

### Listar ponentes

- Metodo: GET
- URL: /ponentes

```http
GET http://127.0.0.1:8000/api/ponentes
```

### Crear ponente

- Metodo: POST
- URL: /ponentes

Body JSON:

```json
{
	"nombre": "Ana",
	"apellido": "Torres",
	"email": "ana.torres@example.com",
	"especialidad": "Transformacion digital",
	"evento_id": 2
}
```

```http
POST http://127.0.0.1:8000/api/ponentes
```

### Ver ponente por ID

- Metodo: GET
- URL: /ponentes/{id}

```http
GET http://127.0.0.1:8000/api/ponentes/1
```

### Actualizar ponente

- Metodo: PUT (o PATCH)
- URL: /ponentes/{id}

Body JSON:

```json
{
	"nombre": "Ana",
	"apellido": "Torres",
	"email": "ana.torres.actualizado@example.com",
	"especialidad": "Gobierno digital",
	"evento_id": 3
}
```

```http
PUT http://127.0.0.1:8000/api/ponentes/1
```

### Eliminar ponente

- Metodo: DELETE
- URL: /ponentes/{id}

```http
DELETE http://127.0.0.1:8000/api/ponentes/1
```

## 3) Rutas de Asistentes

### Listar asistentes

- Metodo: GET
- URL: /asistentes

```http
GET http://127.0.0.1:8000/api/asistentes
```

### Crear asistente

- Metodo: POST
- URL: /asistentes

Body JSON:

```json
{
	"nombre": "Luis",
	"apellido": "Garcia",
	"email": "luis.garcia@example.com",
	"telefono": "5512345678",
	"evento_id": 2
}
```

```http
POST http://127.0.0.1:8000/api/asistentes
```

### Ver asistente por ID

- Metodo: GET
- URL: /asistentes/{id}

```http
GET http://127.0.0.1:8000/api/asistentes/1
```

### Actualizar asistente

- Metodo: PUT (o PATCH)
- URL: /asistentes/{id}

Body JSON:

```json
{
	"nombre": "Luis",
	"apellido": "Garcia",
	"email": "luis.garcia.actualizado@example.com",
	"telefono": "5598765432",
	"evento_id": 4
}
```

```http
PUT http://127.0.0.1:8000/api/asistentes/1
```

### Eliminar asistente

- Metodo: DELETE
- URL: /asistentes/{id}

```http
DELETE http://127.0.0.1:8000/api/asistentes/1
```

## 4) Ruta protegida de usuario autenticado

### Obtener usuario autenticado

- Metodo: GET
- URL: /user
- Requiere autenticacion (`auth:api`)

```http
GET http://127.0.0.1:8000/api/user
Authorization: Bearer TU_TOKEN
```

## Respuestas esperadas

Estados comunes en esta API:
- 200: consulta, actualizacion o eliminacion correcta
- 201: creacion correcta
- 404: recurso no encontrado
- 422: error de validacion
- 500: error interno del servidor

Ejemplo de respuesta exitosa:

```json
{
	"message": "Evento creado correctamente.",
	"data": {
		"id": 11,
		"titulo": "Foro de Tecnologia Publica",
		"descripcion": "Encuentro de innovacion para sector publico",
		"fecha_inicio": "2026-05-20",
		"fecha_fin": "2026-05-21",
		"ubicacion": "Ciudad de Mexico",
		"created_at": "2026-04-13T20:00:00.000000Z",
		"updated_at": "2026-04-13T20:00:00.000000Z"
	}
}
```

Ejemplo de error de validacion:

```json
{
	"message": "Datos de entrada invalidos.",
	"errors": {
		"email": [
			"The email has already been taken."
		]
	}
}
```
