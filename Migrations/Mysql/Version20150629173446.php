<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20150629173446 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema): void
	{
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE kaystrobach_logger_domain_model_logentry DROP PRIMARY KEY");
		$this->addSql("ALTER TABLE kaystrobach_logger_domain_model_logentry ADD id VARCHAR(255) NOT NULL, ADD action VARCHAR(8) NOT NULL, ADD logged_at DATETIME NOT NULL, ADD object_id VARCHAR(64) DEFAULT NULL, ADD object_class VARCHAR(255) NOT NULL, ADD version INT NOT NULL, ADD data LONGTEXT DEFAULT NULL COMMENT '(DC2Type:array)', ADD username VARCHAR(255) DEFAULT NULL, DROP persistence_object_identifier");
		$this->addSql("ALTER TABLE kaystrobach_logger_domain_model_logentry ADD PRIMARY KEY (id)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema): void
	{
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE kaystrobach_logger_domain_model_logentry DROP PRIMARY KEY");
		$this->addSql("ALTER TABLE kaystrobach_logger_domain_model_logentry ADD persistence_object_identifier VARCHAR(40) NOT NULL, DROP id, DROP action, DROP logged_at, DROP object_id, DROP object_class, DROP version, DROP data, DROP username");
		$this->addSql("ALTER TABLE kaystrobach_logger_domain_model_logentry ADD PRIMARY KEY (persistence_object_identifier)");
	}
}