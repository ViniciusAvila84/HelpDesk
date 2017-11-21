
create table USUARIO(
	PK_ID_USUARIO bigint auto_increment,
	NOME varchar(40),
	EMAIL varchar(40),
	SENHA varchar(40),
	DATA_HORA_CADASTRO datetime DEFAULT NULL,
	PRIMARY KEY (PK_ID_USUARIO)
);

ALTER TABLE USUARIO ADD FOTO VARCHAR (30);




=================================================================
Projeto antigo
==================================================================
create table usuarios(
	idUsuarios bigint auto_increment,
	nome varchar(40),
	email varchar(60),
	password varchar(40),
	PRIMARY KEY (idUsuarios)
);


create table teste(
	idTeste bigint auto_increment,
	protocolo varchar(40),
	numero varchar(40),
	ramal varchar(40),
	inicio_ligacao_data_hora datetime DEFAULT NULL,
	fim_ligacao_data_hora datetime DEFAULT NULL,
	audio varchar(40),
	PRIMARY KEY (idTeste)
);


create table cliente(
	idCliente bigint auto_increment,
	nome varchar(40),
	telefone varchar(40),
	
	PRIMARY KEY (idCliente)
);


####################################################################################
Sistema 1234
####################################################################################
create table usuarios(
	idUsuarios bigint auto_increment,
	nome varchar(40),
	email varchar(60),
	password varchar(40),
	PRIMARY KEY (idUsuarios)
);


create table CURSO(
	PK_ID_CURSO bigint auto_increment,
	NOME varchar(40),
	DATAHORA datetime DEFAULT NULL,
	PRIMARY KEY (PK_ID_CURSO)
);

create table TURMA(
	PK_ID_TURMA bigint auto_increment,
	DESCRICAO varchar(40),
	FK_ID_CURSO bigint,
	DATA_INICIO datetime DEFAULT NULL,
	DATA_TEMINO datetime DEFAULT NULL,
	VALOR varchar(10),
	NUMERO_DE_PARTICIPANTES varchar(4),
	DATAHORA datetime DEFAULT NULL,
	PRIMARY KEY (PK_ID_TURMA),
	FOREIGN KEY (FK_ID_CURSO) REFERENCES CURSO (PK_ID_CURSO)
);

CREATE TABLE `CENTRO_DE_CUSTO` (
  `ID_CENTRO_DE_CUSTO` bigint(20) NOT NULL,
  `CODIGO` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `NOME` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `DATAHORA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `PLANO_DE_CONTAS` (
  `PK_PLANO_DE_CONTAS` bigint(20) NOT NULL,
  `CODIGO` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `NOME` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STATUS` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `DATAHORA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

create table USUARIO(
	PK_ID_USUARIO bigint auto_increment,
	NOME varchar(40),
	EMAIL varchar(40),
	SENHA varchar(40),
	TELEFONE varchar(15),
	DATAHORA datetime DEFAULT NULL,
	PRIMARY KEY (PK_ID_USUARIO)
);

ALTER TABLE USUARIO ADD FOTO VARCHAR (30);


ALTER TABLE pessoa ADD  tipo_cliente  varchar (3);
ALTER TABLE pessoa ADD  tipo_treinador  varchar (3);




create table TURMA_ALUNO(
	PK_ID_TURMA_ALUNO bigint auto_increment,
	FK_ID_CURSO bigint,
	FK_ID_TURMA bigint,
	FK_ID_PESSOA bigint,
	DATAHORA datetime DEFAULT NULL,
	PRIMARY KEY (PK_ID_TURMA_ALUNO)
);


ALTER TABLE pessoa ADD observacao varchar (1000);

ALTER TABLE pessoa ADD numero varchar (4);
ALTER TABLE pessoa ADD complemento varchar (4);

ALTER TABLE TURMA_ALUNO ADD AUTORIZADO varchar (3);


##################################################################
CREATE TABLE NOSSO_CLIENTE(
	PK_ID_NOSSO_CLIENTE BIGINT AUTO_INCREMENT,
	NOME_COMPLETO VARCHAR(40),
	EMAIL VARCHAR(50),
	SENHA VARCHAR(40),
	TELEFONE VARCHAR(15),
	STATUS VARCHAR(7),
	DATAHORA DATETIME DEFAULT NULL,
	PRIMARY KEY (PK_ID_NOSSO_CLIENTE)
);

CREATE TABLE PAGINA(
	PK_ID_PAGINA BIGINT AUTO_INCREMENT,
	NOME_FANTASIA VARCHAR(40),
	

	FK_ID_NOSSO_CLIENTE BIGINT,
	STATUS VARCHAR(7), 
	DATAHORA DATETIME DEFAULT NULL,
	PRIMARY KEY (PK_ID_PAGINA),
	FOREIGN KEY (FK_ID_NOSSO_CLIENTE) REFERENCES NOSSO_CLIENTE (PK_ID_NOSSO_CLIENTE)
);


CREATE TABLE TELEFONES_UTEIS(
	PK_ID_TELEFONES_UTEIS BIGINT AUTO_INCREMENT,
	NOME VARCHAR(40),
	TELEFONE_1 VARCHAR(50),
	TELEFONE_2 VARCHAR(40),
	STATUS VARCHAR(11), 
	DATAHORA DATETIME DEFAULT NULL,
	PRIMARY KEY (PK_ID_TELEFONES_UTEIS)
);


CREATE TABLE PRODUTO(
	PK_ID_PRODUTO BIGINT AUTO_INCREMENT,
	NOME_PRODUTO VARCHAR(100),
	CODIGO_REFERENCIA VARCHAR(20),
	PRECO VARCHAR(40),
	DESCRICAO TEXT,
	DATAHORA DATETIME DEFAULT NULL,
	PRIMARY KEY (PK_ID_PRODUTO)
);

CREATE TABLE PRODUTO_IMAGEM(
	PK_ID_PRODUTO_IMAGEM BIGINT AUTO_INCREMENT,
	IMAGEM VARCHAR(50),
	DESTAQUE VARCHAR(3),
	FK_ID_PRODUTO BIGINT,
	DATAHORA DATETIME DEFAULT NULL,
	PRIMARY KEY (PK_ID_PRODUTO_IMAGEM),
	FOREIGN KEY (FK_ID_PRODUTO) REFERENCES PRODUTO (PK_ID_PRODUTO)
);

CREATE TABLE PRODUTO_INFORMACAO_TECNICA(
	PK_ID_PRODUTO_INFORMACAO_TECNICA BIGINT AUTO_INCREMENT,
	ITEM VARCHAR(25),
	DESCRICAO VARCHAR(150),
	FK_ID_PRODUTO BIGINT,
	DATAHORA DATETIME DEFAULT NULL,
	PRIMARY KEY (PK_ID_PRODUTO_INFORMACAO_TECNICA),
	FOREIGN KEY (FK_ID_PRODUTO) REFERENCES PRODUTO (PK_ID_PRODUTO)
);