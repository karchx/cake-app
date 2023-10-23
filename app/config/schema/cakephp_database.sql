USE cakephp;
-- a. Nombres y apellidos (en campos diferentes)
-- b. Fecha de Nacimiento
-- c. Fotografía (imagen)
-- d. Carrera (catálogo de nombres de carreras)


CREATE TABLE IF NOT EXISTS carreras (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS alumnos (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    fotografia varchar(50) NOT NULL,
    carrera_id INT unsigned,
    PRIMARY KEY (id),
    FOREIGN KEY (carrera_id) REFERENCES carreras(id),
    INDEX (nombres, apellidos)
);

-- a. Semestre (incluir catálogo de semestres)
-- b. Sección (Catálogo de secciones)
-- c. Curso aprobado (catálogo de nombres de cursos)
-- d. Nota del curso

CREATE TABLE IF NOT EXISTS semestres (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS secciones (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS cursos (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS curso_aprobado_alumno (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    alumno_id INT unsigned,
    semestre_id INT unsigned,
    seccion_id INT unsigned,
    curso_id INT unsigned,
    nota   DECIMAL(4, 2),
    PRIMARY KEY (id),
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id),
    FOREIGN KEY (semestre_id) REFERENCES semestres(id),
    FOREIGN KEY (seccion_id) REFERENCES secciones(id),
    FOREIGN KEY (curso_id) REFERENCES cursos(id)
);

