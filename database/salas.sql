BEGIN TRANSACTION;

DROP TABLE IF EXISTS periodos CASCADE;
CREATE TABLE periodos (
    id bigserial NOT NULL,
    numero int NOT NULL,
    bloque varchar(255) NOT NULL,
    inicio time NOT NULL,
    fin time NOT NULL,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (numero),
    UNIQUE (bloque),
    UNIQUE (inicio, fin),
    PRIMARY KEY (id)
);
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (1, 'Primer Período', '08:15:00', '09:35:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (2, 'Segundo Período', '09:45:00', '11:05:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (3, 'Tercer Perídodo', '11:15:00', '12:35:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (4, 'Cuarto Período', '12:45:00', '14:05:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (5, 'Quinto Período', '14:15:00', '15:35:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (6, 'Sexto Período', '15:45:00', '17:05:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (7, 'Septimo Período', '17:15:00', '18:35:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (8, 'Octavo Período', '18:45:00', '20:05:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (9, 'Noveno Período', '20:15:00', '21:35:00');
INSERT INTO periodos (numero, bloque, inicio, fin) VALUES (10, 'Décimo Período', '21:45:00', '23:05:00');



DROP TABLE IF EXISTS roles CASCADE;
CREATE TABLE roles (
    id serial NOT NULL,
    nombre varchar(255) NOT NULL,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (nombre),
    PRIMARY KEY (id)
);
INSERT INTO roles (nombre) VALUES ('ADMINISTRADOR');
INSERT INTO roles (nombre) VALUES ('ENCARGADO_CAMPUS');
INSERT INTO roles (nombre) VALUES ('ESTUDIANTE');
INSERT INTO roles (nombre) VALUES ('DOCENTE');



DROP TABLE IF EXISTS roles_usuarios CASCADE;
CREATE TABLE roles_usuarios (
    id serial NOT NULL,
    usuario_rut int NOT NULL,
    rol_id int NOT NULL REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (usuario_rut, rol_id),
    PRIMARY KEY (id)
);
/*
INSERT INTO roles_usuarios (usuario_rut, rol_id) VALUES ('15997886','1');
INSERT INTO roles_usuarios (usuario_rut, rol_id) VALUES ('15997886','2');
INSERT INTO roles_usuarios (usuario_rut, rol_id) VALUES ('15997886','3');
INSERT INTO roles_usuarios (usuario_rut, rol_id) VALUES ('15997886','4');
*/


DROP TABLE IF EXISTS campus CASCADE;
CREATE TABLE campus (
    id serial NOT NULL,
    nombre varchar(255) NOT NULL,
    direccion varchar(255) NOT NULL,
    latitud double precision NOT NULL,
    longitud double precision NOT NULL,
    descripcion text,
    rut_encargado int NOT NULL,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (nombre),
    UNIQUE (latitud, longitud),
    PRIMARY KEY (id)
);
INSERT INTO campus (nombre, direccion, latitud, longitud, rut_encargado) VALUES ('Campus Área Central','Padre Felipe Gómez de Vidaurre 1550, Santiago','-33.4483279','-70.6573037','1');
INSERT INTO campus (nombre, direccion, latitud, longitud, rut_encargado) VALUES ('Campus Macul','Av. José Pedro Alessandri 1242, Ñuñoa','-33.4663317','-70.5981719','1');
INSERT INTO campus (nombre, direccion, latitud, longitud, rut_encargado) VALUES ('Campus Providencia','Dr. Hernán Alessandri 644, Providencia','-33.4349486','-70.6249623','1');



DROP TABLE IF EXISTS facultades CASCADE;
CREATE TABLE facultades (
    id serial NOT NULL,
    nombre varchar(255) NOT NULL,
    campus_id int NOT NULL REFERENCES campus(id) ON UPDATE CASCADE ON DELETE CASCADE,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (nombre),
    PRIMARY KEY (id)
);
INSERT INTO facultades (campus_id, nombre) VALUES ('1','Facultad de Humanidades y Tecnologías de la Comunicación Social');
INSERT INTO facultades (campus_id, nombre) VALUES ('1','Facultad de Ciencias de la Construcción y Ordenamiento Territorial');
INSERT INTO facultades (campus_id, nombre) VALUES ('2','Facultad de Ciencias Naturales, Matemática y del Medio Ambiente');
INSERT INTO facultades (campus_id, nombre) VALUES ('3','Facultad de Administración y Economía');
INSERT INTO facultades (campus_id, nombre) VALUES ('2','Facultad de Ingeniería');



DROP TABLE IF EXISTS departamentos CASCADE;
CREATE TABLE departamentos (
    id serial NOT NULL,
    nombre varchar(255) NOT NULL,
    facultad_id int NOT NULL REFERENCES facultades(id) ON UPDATE CASCADE ON DELETE CASCADE,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (nombre, facultad_id),
    PRIMARY KEY (id)
);
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Humanidades y Tecnologías de la Comunicación Social'),'Diseño');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Humanidades y Tecnologías de la Comunicación Social'),'Cartografía');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Humanidades y Tecnologías de la Comunicación Social'),'Trabajo Social');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Humanidades y Tecnologías de la Comunicación Social'),'Humanidades');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ciencias de la Construcción y Ordenamiento Territorial'),'Prevención de Riesgos y Medioambiente');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ciencias de la Construcción y Ordenamiento Territorial'),'Ciencias de la Construcción');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ciencias de la Construcción y Ordenamiento Territorial'),'Planificación y Ordenamiento Territorial');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ciencias Naturales, Matemática y del Medio Ambiente'),'Química');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ciencias Naturales, Matemática y del Medio Ambiente'),'Matemática');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ciencias Naturales, Matemática y del Medio Ambiente'),'Física');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ciencias Naturales, Matemática y del Medio Ambiente'),'Biotecnología');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Administración y Economía'),'Gestión Organizacional');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Administración y Economía'),'Economía, Recursos Naturales y Comercio Internacional');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Administración y Economía'),'Contabilidad y Gestión Financiera');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Administración y Economía'),'Gestión de la Información');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Administración y Economía'),'Estadística y Econometría');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ingeniería'),'Industria');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ingeniería'),'Informática y Computación');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ingeniería'),'Electricidad');
INSERT INTO departamentos (facultad_id, nombre) VALUES ((SELECT id FROM facultades WHERE nombre='Facultad de Ingeniería'),'Mecánica');



DROP TABLE IF EXISTS escuelas CASCADE;
CREATE TABLE escuelas (
    id serial NOT NULL,
    nombre varchar(255) NOT NULL,
    departamento_id int NOT NULL REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (nombre, departamento_id),
    PRIMARY KEY (id)
);
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Diseño'),'Diseño');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Cartografía'),'Cartografía');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Trabajo Social'),'Trabajo Social');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Humanidades'),'Criminalística Forense');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Prevención de Riesgos y Medioambiente'),'Prevención de Riesgos y Medio Ambiente');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Ciencias de la Construcción'),'Construcción Civil');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Planificación y Ordenamiento Territorial'),'Arquitectura');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Química'),'Química');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Química'),'Ingeniería en Industria Alimentaria');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Gestión Organizacional'),'Administración');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Economía, Recursos Naturales y Comercio Internacional'),'Comercio Internacional');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Contabilidad y Gestión Financiera'),'Contadores Auditores');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Gestión de la Información'),'Bibliotecología');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Estadística y Econometría'),'Ingeniería Comercial');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Informática y Computación'),'Informática');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Industria'),'Industria');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Industria'),'Ingeniería en Industria de la Madera');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Industria'),'Geomensura');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Industria'),'Transporte y Tránsito');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Electricidad'),'Electrónica');
INSERT INTO escuelas (departamento_id, nombre) VALUES ((SELECT id FROM departamentos WHERE nombre='Mecánica'),'Mecánica');


DROP TABLE IF EXISTS carreras CASCADE;
CREATE TABLE carreras (
    id serial NOT NULL,
    escuela_id int NOT NULL REFERENCES escuelas(id) ON UPDATE CASCADE ON DELETE CASCADE,
    codigo int NOT NULL,
    nombre varchar(255) NOT NULL,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (codigo),
    UNIQUE (codigo, nombre),
    PRIMARY KEY (id)
);
INSERT INTO carreras (escuela_id, codigo, nombre) VALUES ('15','21030','Ingeniería en Informática');
INSERT INTO carreras (escuela_id, codigo, nombre) VALUES ('15','21041','Ingeniería Civil en Computación mención Informática');


DROP TABLE IF EXISTS funcionarios CASCADE;
CREATE TABLE funcionarios (
    id serial NOT NULL,
    departamento_id int NOT NULL REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE,
    rut int NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (rut),
    PRIMARY KEY (id)
);


DROP TABLE IF EXISTS docentes CASCADE;
CREATE TABLE docentes (
    id serial NOT NULL,
    departamento_id int NOT NULL REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE,
    rut int NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (rut),
    PRIMARY KEY (id)
);


DROP TABLE IF EXISTS estudiantes CASCADE;
CREATE TABLE estudiantes (
    id serial NOT NULL,
    carrera_id int NOT NULL REFERENCES carreras(id) ON UPDATE CASCADE ON DELETE CASCADE,
    rut int NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (rut),
    PRIMARY KEY (id)
);


DROP TABLE IF EXISTS tipos_salas CASCADE;
CREATE TABLE tipos_salas (
    id serial NOT NULL,
    nombre varchar(255) NOT NULL,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (nombre),
    PRIMARY KEY (id)
);


DROP TABLE IF EXISTS salas CASCADE;
CREATE TABLE salas (
    id bigserial NOT NULL,
    campus_id int NOT NULL REFERENCES campus(id) ON UPDATE CASCADE ON DELETE CASCADE,
    tipo_sala_id int NOT NULL REFERENCES tipos_salas(id) ON UPDATE CASCADE ON DELETE CASCADE,
    nombre varchar(255) NOT NULL,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (tipo_sala_id, nombre),
    PRIMARY KEY (id)
);


DROP TABLE IF EXISTS asignaturas CASCADE;
CREATE TABLE asignaturas (
    id bigserial NOT NULL,
    departamento_id int NOT NULL REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE,
    codigo varchar(255) NOT NULL,
    nombre varchar(255) NOT NULL,
    descripcion text,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (codigo),
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS cursos CASCADE;
CREATE TABLE cursos (
    id bigserial NOT NULL,
    asignatura_id bigint NOT NULL REFERENCES asignaturas(id) ON UPDATE CASCADE ON DELETE CASCADE,
    docente_id int NOT NULL REFERENCES docentes(id) ON UPDATE CASCADE ON DELETE CASCADE,
    semestre int NOT NULL,
    anio int NOT NULL,
    seccion int NOT NULL,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (asignatura_id, docente_id, semestre, anio, seccion),
    PRIMARY KEY (id)
);


DROP TABLE IF EXISTS asignaturas_cursadas CASCADE;
CREATE TABLE asignaturas_cursadas (
    id bigserial NOT NULL,
    curso_id bigint NOT NULL REFERENCES cursos(id) ON UPDATE CASCADE ON DELETE CASCADE,
    estudiante_id bigint NOT NULL REFERENCES estudiantes(id) ON UPDATE CASCADE ON DELETE CASCADE,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (curso_id, estudiante_id),
    PRIMARY KEY (id)
);


DROP TABLE IF EXISTS horarios CASCADE;
CREATE TABLE horarios (
    id bigserial NOT NULL,
    fecha date NOT NULL DEFAULT NOW(),
    sala_id bigint NOT NULL REFERENCES salas(id) ON UPDATE CASCADE ON DELETE CASCADE,
    periodo_id int NOT NULL REFERENCES periodos(id) ON UPDATE CASCADE ON DELETE CASCADE,
    curso_id bigint NOT NULL REFERENCES cursos(id) ON UPDATE CASCADE ON DELETE CASCADE,
    created_at timestamp NOT NULL DEFAULT NOW(),
    updated_at timestamp NOT NULL DEFAULT NOW(),
    UNIQUE (fecha, sala_id, periodo_id),
    PRIMARY KEY (id)
);


COMMIT;