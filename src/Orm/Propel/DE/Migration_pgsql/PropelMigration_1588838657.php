<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1588838657.
 * Generated on 2020-05-07 08:04:17 by spryker
 */
class PropelMigration_1588838657
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'zed' => '
BEGIN;

CREATE SEQUENCE "pyz_customer_price_storage_pk_seq";

CREATE TABLE "pyz_customer_price_storage"
(
    "id_customer_price_storage" INT8 NOT NULL,
    "fk_customer_price" INT8,
    "data" TEXT,
    "store" VARCHAR(128),
    "locale" VARCHAR(16),
    "key" VARCHAR,
    PRIMARY KEY ("id_customer_price_storage"),
    CONSTRAINT "pyz_customer_price_storage-unique-key" UNIQUE ("key")
);

COMMIT;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'zed' => '
BEGIN;

DROP TABLE IF EXISTS "pyz_customer_price_storage" CASCADE;

DROP SEQUENCE "pyz_customer_price_storage_pk_seq";

COMMIT;
',
);
    }

}