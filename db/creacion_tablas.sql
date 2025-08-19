---CREACION DE TABLAS NOMINA
-- crear la tabla empleados

CREATE TABLE USUARIOS (
    id_usuario INT IDENTITY(1,1) PRIMARY KEY,
    usuario NVARCHAR(50) NOT NULL UNIQUE,
    clave NVARCHAR(200) NOT NULL,
    nombre NVARCHAR(100),
    email NVARCHAR(100)
);

-- Crear la tabla EMPLEADOS
CREATE TABLE EMPLEADOS (
    id INT IDENTITY(1,1) PRIMARY KEY,
	codigo INT NOT NULL UNIQUE,
	cedula NVARCHAR(20) NOT NULL UNIQUE,
    nombre NVARCHAR(50) NOT NULL,
    apellidos NVARCHAR(50) NOT NULL,
	sexo NVARCHAR(20),
	fecha_na date,
	lugar_na NVARCHAR(100),
	direccion NVARCHAR(100),
	telefono NVARCHAR(20),
    email NVARCHAR(100),
	situacion NVARCHAR(30),
	fecha_ing date,
	tipo_cobro nvarchar(50),
	banco nvarchar(50),
	numero_cuen nvarchar(50),
	tipo_cont nvarchar(20),
	sueldo_men DECIMAL(12,2),
	nomina nvarchar(20),
	departamento nvarchar(50),
	cargo nvarchar(50),
	observacion nvarchar(30),
	foto nvarchar(200),
	id_usuario_crea INT,
	fecha_crea datetime2(6)


	  CONSTRAINT FK_Empleado_Usuario FOREIGN KEY (id_usuario_crea)
        REFERENCES USUARIOS(id_usuario)

    
);

-