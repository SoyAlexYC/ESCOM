create table ALUMNO(
    IDAlumno int not null AUTO_INCREMENT primary key,
    NombreAlu varchar(15) not null,
    PaternoAlu varchar(15) not null,
    MaternoAlu varchar(15) null,
    Contrasena varchar(15) not null,
    Boleta varchar(11) not null,
    Estatus int not null
);
create table SEMESTRE_CORRIENTE(
    IDSemestre int not null AUTO_INCREMENT primary key,
    NomSemestre varchar(15) not null,
    Estatus int not null
);
create table MATERIA(
    IDMateria int not null AUTO_INCREMENT primary KEY,
    NombMateria varchar(30) not null,
    HorasTeo varchar(15) not null,
    HorasLab varchar(15) not null,
    Estatus int not null
    );
create table GRUPO(
    IDGrupo int not null AUTO_INCREMENT primary key,
    NombreGru varchar(10) not null,
    Estatus int not null
    );
create table TIPO(
    IDTipo int not null AUTO_INCREMENT primary key,
    NomTipo varchar(10) not null
    );
create table ACADEMIA(
    IDAcademia int not null AUTO_INCREMENT primary key,
    NomAcademia varchar(10) not null,
    Estatus int not null
    );
create table DIA(
    IDDia int not null AUTO_INCREMENT primary key,
    NomDia varchar(10) not null
    );
create table HORA(
    IDHora int not null AUTO_INCREMENT primary key,
    HoraIni int not null,
    HoraFin int not null
    );  
create table PROFESOR(
    IDProfesor int not null AUTO_INCREMENT primary KEY,
    NombrePro varchar(15) not null,
    PaternoPro varchar(15) not null,
    MaternoPro varchar(15) null,
    Cubiculo varchar(10) not null,
    Estatus int not null,
    IdAcademia int not null,
    CONSTRAINT FKProfesorAcademia FOREIGN KEY(IdAcademia) 
	REFERENCES ACADEMIA (IDAcademia)
    );
create table SALON(
    IDSalon int not null AUTO_INCREMENT primary key,
    NomSalon int not null,
    Estatus int not null,
    IdTipo int not null,
    CONSTRAINT FKSalonTipo FOREIGN KEY(IdTipo) 
	REFERENCES Tipo (IDTipo)
    );   
create table HORARIO(
    IDHorario int not null AUTO_INCREMENT primary key,
    Semestre varchar(15) not null,
    Estatus int not null,
    IdProfesor int not null,
    CONSTRAINT FKHorarioProfesor FOREIGN KEY(IdProfesor) 
	REFERENCES PROFESOR (IDProfesor)
    );
    
create table CURSO(
    IDCurso int not null AUTO_INCREMENT primary key,
    Estatus int not null,
    IdGrupo int not null,
    IdMateria int not null,
    CONSTRAINT FKCursoGrupo FOREIGN KEY(IdGrupo) 
	REFERENCES GRUPO (IDGrupo),
    CONSTRAINT FKCursoMateria FOREIGN KEY(IdMateria) 
	REFERENCES MATERIA (IDMateria)
    );
create table CLASE(
    IDClase int not null AUTO_INCREMENT primary key,
    Estatus int not null,
    IdCurso int not null,
    IdSalon int not null,
    CONSTRAINT FKclase_curso FOREIGN KEY(IdCurso) 
	REFERENCES CURSO (IDCurso),
    CONSTRAINT FKclase_salon FOREIGN KEY(IdSalon) 
	REFERENCES SALON (IDSalon)
    );
create table ESPACIO(
    IDEspacio int not null AUTO_INCREMENT primary key,
    Detalles varchar(10) not null,
    Estatus int not null,
    IdHorario int not null,
    IdClase int null,
    IdDia int not null,
    IdHora int not null,
    CONSTRAINT FKespacioHorario FOREIGN KEY(IdHorario) 
	REFERENCES HORARIO (IDHorario),
    CONSTRAINT FKespacio_clase FOREIGN KEY(IdClase) 
	REFERENCES CLASE (IDClase),
    CONSTRAINT FKespacioDia FOREIGN KEY(IdDia) 
	REFERENCES DIA (IDDia),
    CONSTRAINT FKespacioHora FOREIGN KEY(IdHora) 
	REFERENCES HORA (IDHora)
    );