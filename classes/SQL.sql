CREATE TABLE usuario (
	id int auto_increment,
    nome varchar(95),
    rg varchar(95),
    login varchar(95),
    senha varchar(95),
    matricula varchar(95),
    turma varchar(45),
    siape varchar(95),
    dataadm varchar(95),
    carga decimal(6,2),
    salario decimal(8, 2),
    PRIMARY KEY (id)
);