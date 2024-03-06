CREATE DATABASE sistema;

USE sistema;

CREATE TABLE armazem(
	id_armazem INT,
    codigo_armazem VARCHAR(45),
    nome VARCHAR(45),
    PRIMARY KEY(id_armazem)
);

CREATE TABLE estante (
	id_estante INT,
	codigo_estante VARCHAR(45),
    id_armazem VARCHAR(45),
    PRIMARY KEY(id_estante)
);
ALTER TABLE `sistema`.`estante` 
CHANGE COLUMN `id_estante` `id_estante` INT NOT NULL AUTO_INCREMENT ;


CREATE TABLE prateleira(
	id_prateleira INT,
    codigo_prateleira VARCHAR(45),
    id_estante VARCHAR(45),
    PRIMARY KEY(id_prateleira)
);
ALTER TABLE `sistema`.`prateleira` 
CHANGE COLUMN `id_prateleira` `id_prateleira` INT NOT NULL AUTO_INCREMENT ;


CREATE TABLE posicao(
	id_posicao INT,
    codigo_posicao VARCHAR(45),
    id_prateleira VARCHAR(45),
    PRIMARY KEY(id_posicao)
);
ALTER TABLE `sistema`.`posicao` 
CHANGE COLUMN `id_posicao` `id_posicao` INT NOT NULL AUTO_INCREMENT ;


CREATE TABLE produto (
	id_produto INT,
    codigo_produto VARCHAR(45),
    nome VARCHAR(45),
    codigo_armazem VARCHAR(45),
    codigo_estante VARCHAR(45),
    codigo_prateleira VARCHAR(45),
    codigo_posicao VARCHAR(45),
    PRIMARY KEY(id_produto)
);
ALTER TABLE `sistema`.`produto` 
CHANGE COLUMN `id_produto` `id_produto` INT NOT NULL AUTO_INCREMENT ;


select * from armazem;
select * from prateleira;
select * from estante;
select *from posicao;
select * from produto;

INSERT INTO produto(codigo_produto, nome, codigo_armazem, codigo_estante, codigo_prateleira, codigo_posicao) VALUES (NUll,'a', 'ao', 'ao', 'aam', 'aante', 'Prateleira', 'asicao');