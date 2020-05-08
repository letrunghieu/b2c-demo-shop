<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1588825467.
 * Generated on 2020-05-07 04:24:27 by spryker
 */
class PropelMigration_1588825467
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

DROP TABLE IF EXISTS "pyz_price_import" CASCADE;

CREATE SEQUENCE "pyz_customer_price_pk_seq";

CREATE TABLE "pyz_customer_price"
(
    "customer_price_id" INT8 NOT NULL,
    "customer_number" VARCHAR NOT NULL,
    "item_number" VARCHAR NOT NULL,
    "quantity" INTEGER NOT NULL,
    "price" DOUBLE PRECISION NOT NULL,
    PRIMARY KEY ("customer_price_id")
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

DROP TABLE IF EXISTS "pyz_customer_price" CASCADE;

DROP SEQUENCE "pyz_customer_price_pk_seq";

CREATE TABLE "pyz_price_import"
(
    "price_import_id" INTEGER NOT NULL,
    "customer_number" INTEGER NOT NULL,
    "item_number" INTEGER NOT NULL,
    "quantity" INTEGER NOT NULL,
    "price" DOUBLE PRECISION NOT NULL,
    PRIMARY KEY ("price_import_id")
);

COMMIT;
',
);
    }

}