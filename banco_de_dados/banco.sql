CREATE SCHEMA IF NOT EXISTS `the-cube-store`;
USE `the-cube-store`;

CREATE TABLE IF NOT EXISTS acesso(
idacesso INT(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (idacesso)
);

CREATE TABLE IF NOT EXISTS usuario(
idusuario INT(11) NOT NULL AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
senha VARCHAR(12) NOT NULL,
email VARCHAR(50) NOT NULL, 
idacesso INT(11) NOT NULL DEFAULT 2,
CONSTRAINT fk_acesso_usuario
FOREIGN KEY (idacesso)
REFERENCES acesso(idacesso),
PRIMARY KEY(idusuario)
);


CREATE TABLE IF NOT EXISTS produto(
idproduto INT(11) NOT NULL AUTO_INCREMENT,
titulo VARCHAR(50) NOT NULL,
descricao VARCHAR(150) NOT NULL,
img VARCHAR(255) NOT NULL,
preco DECIMAL(8,2) NOT NULL,
PRIMARY KEY(idproduto)
);

CREATE TABLE IF NOT EXISTS imgprod(
idimgprod INT(11) NOT NULL AUTO_INCREMENT,
imagem VARCHAR(255) NOT NULL,
idproduto INT(11) NOT NULL,
PRIMARY KEY(idimgprod),
CONSTRAINT fk_imgprod_produto
FOREIGN KEY (idproduto)
REFERENCES produto(idproduto)
);
CREATE TABLE IF NOT EXISTS carrinho(
idcarrinho INT(11) NOT NULL AUTO_INCREMENT,
idproduto INT(11) NOT NULL,
idusuario INT(11) NOT NULL,
PRIMARY KEY(idcarrinho),
CONSTRAINT fk_carrinho_usuario
FOREIGN KEY (idusuario)
REFERENCES usuario(idusuario),
CONSTRAINT fk_carrinho_produto
FOREIGN KEY (idproduto)
REFERENCES produto(idproduto)
);

INSERT INTO acesso (idacesso) VALUES (1);
INSERT INTO acesso (idacesso) VALUES (2);
INSERT INTO usuario (nome, senha, email, idacesso) VALUES ('adm', 'adm123', 'adm@gmail.com', 1);
