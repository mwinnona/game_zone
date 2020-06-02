<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\MySqlConnection::conection();

class AddTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "USE `game_zonedb`;
        DROP procedure IF EXISTS `Consult_User`;
        
        DELIMITER $$
        USE `game_zonedb`$$
        CREATE DEFINER=`root`@`localhost` PROCEDURE `Consult_User`(
        )
        BEGIN
            Select id, name, email, password from users;
        END$$
        
        DELIMITER";
        DB::conection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql="DROP PROCEDURE IF EXISTS Consult_Users();";
        DB::conection()->getPdo()->exec($sql);
    }
}
