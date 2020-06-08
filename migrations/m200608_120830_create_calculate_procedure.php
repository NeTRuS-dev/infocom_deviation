<?php

use yii\db\Migration;

/**
 * Class m200608_120830_create_calculate_procedure
 */
class m200608_120830_create_calculate_procedure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand(<<<EOT
CREATE PROCEDURE [calculate]
AS
DECLARE @n int;
DECLARE @SigmaFromPure float;
DECLARE @SigmaFromPow float;
DECLARE @a2 float;
DECLARE @m float;
DECLARE @D float;
SET @n = (SELECT COUNT([rows].[value]) as [Count]
          FROM [rows]);
SET @SigmaFromPure = (SELECT SUM([rows].[value]) as [Sigma]
                      FROM [rows]);
SET @SigmaFromPow = (SELECT SUM([rows].[value]*[rows].[value]) as [PowSigma]
                     FROM [rows]);
SET @m=(SELECT @SigmaFromPure/@n);
SET @a2=(SELECT @SigmaFromPow/@n);
SET @D=(SELECT @a2-(@m*@m));
TRUNCATE TABLE [rows];
SELECT SQRT(@D);
EOT
        )->
        execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand("DROP PROCEDURE [calculate]")->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_120830_create_calculate_procedure cannot be reverted.\n";

        return false;
    }
    */
}
