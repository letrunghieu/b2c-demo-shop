<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1588752456.
 * Generated on 2020-05-06 08:07:36 by spryker
 */
class PropelMigration_1588752456
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

CREATE SEQUENCE "spy_process_pk_seq";

CREATE TABLE "spy_process"
(
    "id_process" INTEGER NOT NULL,
    "process_name" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id_process"),
    CONSTRAINT "spy_process-string" UNIQUE ("process_name")
);

CREATE SEQUENCE "spy_process_result_pk_seq";

CREATE TABLE "spy_process_result"
(
    "id_process_result" INTEGER NOT NULL,
    "item_count" INTEGER NOT NULL,
    "processed_item_count" INTEGER NOT NULL,
    "failed_item_count" INTEGER NOT NULL,
    "skipped_item_count" INTEGER NOT NULL,
    "start_time" TIMESTAMP NOT NULL,
    "end_time" TIMESTAMP,
    "stage_results" TEXT,
    "process_configuration" TEXT,
    "fk_process_id" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_process_result")
);

ALTER TABLE "spy_process_result" ADD CONSTRAINT "spy_process_result_fk_cc1690"
    FOREIGN KEY ("fk_process_id")
    REFERENCES "spy_process" ("id_process")
    ON UPDATE CASCADE
    ON DELETE SET NULL;

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

DROP TABLE IF EXISTS "spy_process" CASCADE;

DROP SEQUENCE "spy_process_pk_seq";

DROP TABLE IF EXISTS "spy_process_result" CASCADE;

DROP SEQUENCE "spy_process_result_pk_seq";

COMMIT;
',
);
    }

}