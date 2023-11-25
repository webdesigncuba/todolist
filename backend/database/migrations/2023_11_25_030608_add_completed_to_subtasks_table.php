<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('subtasks', function (Blueprint $table) {
            $table->boolean('completed')->default(false); // Nuevo campo 'completed' por defecto 'false'
        });
    }

    public function down()
    {
        Schema::table('subtasks', function (Blueprint $table) {
            $table->dropColumn('completed'); // Si necesitas revertir esta migración
        });
    }
};
