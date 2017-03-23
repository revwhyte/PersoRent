CREATE DATABASE IF NOT EXISTS `persorent`;

CREATE TABLE IF NOT EXISTS `persorent`.`cnh` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(12) NOT NULL,
  `categoria` VARCHAR(2) NOT NULL,
  `validade` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `persorent`.`dados_bancarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `agencia` SMALLINT(5) NOT NULL,
  `conta` SMALLINT(5) NOT NULL,
  `digito` TINYINT(1) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `persorent`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `rg` VARCHAR(11) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `id_banco` INT NOT NULL,
  `id_cnh` INT NOT NULL,
  PRIMARY KEY (`id`, `id_banco`, `id_cnh`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC),
  INDEX `fk_cliente_dados_bancarios2_idx` (`id_banco` ASC),
  INDEX `fk_cliente_cnh1_idx` (`id_cnh` ASC),
  CONSTRAINT `fk_cliente_dados_bancarios2`
    FOREIGN KEY (`id_banco`)
    REFERENCES `persorent`.`dados_bancarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_cnh1`
    FOREIGN KEY (`id_cnh`)
    REFERENCES `persorent`.`cnh` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `persorent`.`veiculo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(16) NOT NULL,
  `modelo` VARCHAR(16) NOT NULL,
  `ano` INT NOT NULL,
  `placa` VARCHAR(7) NOT NULL,
  `odometro` MEDIUMINT(7) NOT NULL,
  `chassi` VARCHAR(45) NOT NULL,
  `cor` VARCHAR(12) NOT NULL,
  `portas` TINYINT(1) NOT NULL,
  `ar_condicionado` TINYINT(1) NOT NULL,
  `direcao` TINYINT(1) NOT NULL,
  `combustivel` CHAR(1) NOT NULL,
  `potencia` VARCHAR(3) NOT NULL,
  `avarias` TEXT(300) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `placa_UNIQUE` (`placa` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `persorent`.`emprestimo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_saida` DATE NOT NULL,
  `data_devolucao` DATE NOT NULL,
  `valor` FLOAT NOT NULL,
  `multa` FLOAT NULL,
  `novas_avarias` VARCHAR(20) NULL,
  `status` TINYINT(1) NOT NULL,
  `id_veiculo` INT NOT NULL,
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_emprestimo_veiculo1_idx` (`id_veiculo` ASC),
  INDEX `fk_emprestimo_cliente1_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_emprestimo_veiculo1`
    FOREIGN KEY (`id_veiculo`)
    REFERENCES `persorent`.`veiculo` (`id`)
    ON DELETE NULL
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `persorent`.`cliente` (`id`)
    ON DELETE NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;