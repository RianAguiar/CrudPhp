CREATE DATABASE CategoriaProduto;

COMMIT;

USE CategoriaProduto;

CREATE TABLE Categoria(
    CodCategoria        INT AUTO_INCREMENT,
    NomeCategoria       VARCHAR(50) NOT NULL,
    CONSTRAINT PKCategoria PRIMARY KEY (CodCategoria)
);

CREATE TABLE Produto(
    CodProduto          INT AUTO_INCREMENT,
    Descricao           VARCHAR(50) NOT NULL,
    Quantidade          INT,
    ValorUnitario       FLOAT,
    CodCategoria        INT NOT NULL,
    CONSTRAINT PKProduto PRIMARY KEY(CodProduto),
    CONSTRAINT FKProdutoCategoria FOREIGN KEY (CodCategoria)
        REFERENCES Categoria(CodCategoria)
);

CREATE TABLE Cliente(
    CodCliente      INT AUTO_INCREMENT PRIMARY KEY,
    NomeCliente     VARCHAR(30) NOT NULL,
    CPFCliente      CHAR(11) NOT NULL UNIQUE
);

CREATE TABLE Endereco(
    CodEndereco     INT AUTO_INCREMENT PRIMARY KEY,
    Logradouro      VARCHAR(50) NOT NULL,
    NUMERO          VARCHAR(10),
    CEP             CHAR(8),
    Bairro          VARCHAR(50),
    Cidade          VARCHAR(50),
    CodCliente      INT NOT NULL,
    CONSTRAINT FKCliente FOREIGN KEY (CodCliente) REFERENCES Cliente (CodCliente)
);

CREATE TABLE Usuario(
    Usuario         VARCHAR(30) NOT NULL,
    Senha           CHAR(40) NOT NULL,
    PerfilAcesso    CHAR(1) NOT NULL DEFAULT 'U',
    CONSTRAINT  PKUsuario PRIMARY KEY (Usuario),
    CONSTRAINT  CKUsuarioPerfil 
        CHECK( (PerfilAcesso='A') OR  (PerfilAcesso='U') )
);

INSERT INTO Usuario(Usuario,Senha,PerfilAcesso)
    VALUES('Anderson', SHA1('123456') , 'A');

INSERT INTO Usuario(Usuario,Senha,PerfilAcesso)
    VALUES('Paulo', SHA1('654321') , 'U');