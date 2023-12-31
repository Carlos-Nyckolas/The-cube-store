-- Banco de dados criado por Romão e Cafundó
CREATE SCHEMA IF NOT EXISTS `the-cube-store`;
USE `the-cube-store`;

-- Criação da tabela de acesso
CREATE TABLE IF NOT EXISTS acesso(
idacesso INT(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (idacesso)
);

-- Criação da tabela de usuario ligada com a tabela: acesso
CREATE TABLE IF NOT EXISTS usuario(
idusuario INT(11) NOT NULL AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
senha VARCHAR(12) NOT NULL,
email VARCHAR(50) NOT NULL, 
idacesso INT(11) NOT NULL DEFAULT 2,
imgperfil VARCHAR(1000) DEFAULT 'https://cdn-icons-png.flaticon.com/512/3106/3106921.png',
CONSTRAINT fk_acesso_usuario
FOREIGN KEY (idacesso)
REFERENCES acesso(idacesso),
PRIMARY KEY(idusuario)
);

-- Criação da tabela de produto
CREATE TABLE IF NOT EXISTS produto(
idproduto INT(11) NOT NULL AUTO_INCREMENT,
titulo VARCHAR(50) NOT NULL,
descricao VARCHAR(150) NOT NULL,
img VARCHAR(255) NOT NULL,
preco DECIMAL(8,2) NOT NULL,
PRIMARY KEY(idproduto)
);

-- Criação da tabela de carrinho de compras ligada com as tabelas: produto e usuario
CREATE TABLE IF NOT EXISTS carrinho(
idcarrinho INT(11) NOT NULL AUTO_INCREMENT,
idproduto INT(11) NOT NULL,
quantidade INT(11) NOT NULL,
idusuario INT(11) NOT NULL,
PRIMARY KEY(idcarrinho),
CONSTRAINT fk_carrinho_usuario
FOREIGN KEY (idusuario)
REFERENCES usuario(idusuario),
CONSTRAINT fk_carrinho_produto
FOREIGN KEY (idproduto)
REFERENCES produto(idproduto)
);

-- criação da tabela feedback
CREATE TABLE IF NOT EXISTS feedback(
idfeedback INT(11) NOT NULL AUTO_INCREMENT,
titulo VARCHAR(30) NOT NULL,
mensagem VARCHAR(1000) NOT NULL,
datahora DATETIME NOT NULL DEFAULT NOW(),
PRIMARY KEY(idfeedback)
);

-- Inserção do nivel 1 de acesso
INSERT INTO acesso (idacesso) VALUES (1);

-- Inserção do nivel 2 de acesso
INSERT INTO acesso (idacesso) VALUES (2);

-- Inserção manual do administrador do site
INSERT INTO usuario (nome, senha, email, idacesso) VALUES ('adm', 'adm123', 'adm@gmail.com', 1);
