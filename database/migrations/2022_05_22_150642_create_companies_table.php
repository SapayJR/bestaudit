<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('auditor_id')->nullable();
            $table->foreignId('taxes_id')->nullable();
            $table->string('title', 255);
            $table->string('legal_name', 255);
            $table->string('address', 255)->nullable();
            $table->string('oked', 255)->nullable();
            $table->string('ceo', 255)->nullable();
            $table->string('bank_account', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->integer('tin')->unique();
            $table->integer('mfo')->nullable();
            $table->string('img', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'tin']);
        });
    }
    /*
        1. Наименование организации
        2, Юридический адрес
        3, Сфера деятельности
        4, Руководитель
        5. Реквизиты (расчетный счет, ИНН, МФО, Банк)
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
