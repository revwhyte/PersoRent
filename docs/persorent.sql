CREATE DATABASE IF NOT EXISTS `persorent`;

CREATE TABLE IF NOT EXISTS `persorent`.`cnh` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(12) NOT NULL,
  `categoria` VARCHAR(2) NOT NULL,
  `validade` DATE NOT NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  PRIMARY KEY (`numero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `persorent`.`dados_bancarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `agencia` SMALLINT(5) NOT NULL,
  `conta` SMALLINT(5) NOT NULL,
  `digito` TINYINT(1) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`agencia`, `conta`, `digito`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `persorent`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `rg` VARCHAR(11) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `id_cnh` INT NOT NULL,
  `dados_bancarios_agencia` SMALLINT(5) NOT NULL,
  `dados_bancarios_conta` SMALLINT(5) NOT NULL,
  `dados_bancarios_digito` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_cnh`, `cpf`, `dados_bancarios_agencia`, `dados_bancarios_conta`, `dados_bancarios_digito`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC),
  INDEX `fk_cliente_cnh1_idx` (`id_cnh` ASC),
  INDEX `fk_cliente_dados_bancarios1_idx` (`dados_bancarios_agencia` ASC, `dados_bancarios_conta` ASC, `dados_bancarios_digito` ASC),
  CONSTRAINT `fk_cliente_cnh1`
    FOREIGN KEY (`id_cnh`)
    REFERENCES `persorent`.`cnh` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_dados_bancarios1`
    FOREIGN KEY (`dados_bancarios_agencia` , `dados_bancarios_conta` , `dados_bancarios_digito`)
    REFERENCES `persorent`.`dados_bancarios` (`agencia` , `conta` , `digito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

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
  `arCondicionado` TINYINT(1) NOT NULL,
  `direcao` TINYINT(1) NOT NULL,
  `combustivel` CHAR(1) NOT NULL,
  `potencia` VARCHAR(3) NOT NULL,
  `avarias` TEXT(300) NULL,
  `status` TINYINT(1) NOT NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `placa_UNIQUE` (`placa` ASC),
  PRIMARY KEY (`chassi`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `persorent`.`aluguel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_saida` DATE NOT NULL,
  `data_devolucao` DATE NOT NULL,
  `valor` FLOAT NOT NULL,
  `multa` FLOAT NULL,
  `novas_avarias` VARCHAR(20) NULL,
  `status` TINYINT(1) NOT NULL,
  `veiculo_chassi` VARCHAR(45) NOT NULL,
  `cliente_cpf` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_aluguel_veiculo1_idx` (`veiculo_chassi` ASC),
  INDEX `fk_aluguel_cliente1_idx` (`cliente_cpf` ASC),
  CONSTRAINT `fk_aluguel_veiculo1`
    FOREIGN KEY (`veiculo_chassi`)
    REFERENCES `persorent`.`veiculo` (`chassi`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluguel_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `persorent`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;