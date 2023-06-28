USE campuslands;

CREATE TABLE campers(
    idCamper VARCHAR(20) NOT NULL PRIMARY KEY,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    idReg INT
);



CREATE TABLE region(
    idReg INT NOT NULL PRIMARY KEY,
    nombreReg VARCHAR(60) NOT NULL,
    idDep INT NOT NULL
);

CREATE TABLE departamento(
    idDep INT NOT NULL PRIMARY KEY,
    nombreDep VARCHAR(50) NOT NULL,
    idPais INT NOT NULL
);

CREATE TABLE pais(
    idPais INT NOT NULL PRIMARY KEY,
    nombrePais VARCHAR(50) NOT NULL
);



ALTER TABLE campers
ADD CONSTRAINT idReg 
FOREIGN KEY (idReg) REFERENCES region(idReg);

ALTER TABLE region
ADD CONSTRAINT idDep 
FOREIGN KEY (idDep) REFERENCES departamento(idDep);

ALTER TABLE departamento
ADD CONSTRAINT idPais 
FOREIGN KEY (idPais) REFERENCES pais(idPais);
