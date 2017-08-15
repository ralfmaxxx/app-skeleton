<?php

declare(strict_types=1);

namespace migrations;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190620174951 extends AbstractMigration
{
    private const MIGRATION_CAN_ONLY_BE_EXECUTED_SAFELY_ON_MYSQL = 'Migration can only be executed safely on \'mysql\'.';

    private const DESCRIPTION = 'Add category table';

    private const ADD_CATEGORY_TABLE_SQL = 'CREATE TABLE category (uuid VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB';
    private const REMOVE_CATEGORY_TABLE_SQL = 'DROP TABLE category';

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    /**
     * @param Schema $schema
     *
     * @throws DBALException
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', self::MIGRATION_CAN_ONLY_BE_EXECUTED_SAFELY_ON_MYSQL);

        $this->addSql(self::ADD_CATEGORY_TABLE_SQL);
    }

    /**
     * @param Schema $schema
     *
     * @throws DBALException
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', self::MIGRATION_CAN_ONLY_BE_EXECUTED_SAFELY_ON_MYSQL);

        $this->addSql(self::REMOVE_CATEGORY_TABLE_SQL);
    }
}
