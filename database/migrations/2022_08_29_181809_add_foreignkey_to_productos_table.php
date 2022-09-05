<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {

            //

            $table->string('nombre');
            $table->string('descripcion');
            

            $table->unsignedBigInteger('categoria_id')->nullable()->after('id');
            $table->foreign('categoria_id')->references('id')->on('categorias')
            ->onUpDate('cascade')
            ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            //
        });
    }
}
