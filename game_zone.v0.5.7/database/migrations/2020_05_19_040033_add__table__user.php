<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;

class AddTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<FinSP
            CREATE PROCEDURE C_Table_Users(

            )
            BEGIN
                Select id, name, email, password from users;
            END;
            $$ LANGUAGE plpgsql;
        FinSP;
        DB::conection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql="DROP PROCEDURE IF EXISTS C_Table_Users();";
        DB::conection()->getPdo()->exec($sql);
    }
}
