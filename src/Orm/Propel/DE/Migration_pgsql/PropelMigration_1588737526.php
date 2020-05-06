<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1588737526.
 * Generated on 2020-05-06 03:58:46 by spryker
 */
class PropelMigration_1588737526
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

ALTER TABLE "spy_glossary_storage"

  ALTER COLUMN "key" DROP NOT NULL,

  ALTER COLUMN "locale" TYPE VARCHAR(16);

CREATE UNIQUE INDEX "spy_glossary_storage-unique-key" ON "spy_glossary_storage" ("key");

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

    ALTER TABLE "spy_glossary_storage" DROP CONSTRAINT "spy_glossary_storage-unique-key";
    
ALTER TABLE "spy_glossary_storage"

  ALTER COLUMN "key" SET NOT NULL,

  ALTER COLUMN "locale" TYPE VARCHAR;

COMMIT;
',
);
    }

}