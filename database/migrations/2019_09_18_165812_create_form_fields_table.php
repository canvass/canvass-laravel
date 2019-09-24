<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFieldsTable extends Migration
{
    private $table_name = 'form_fields';

    public function up()
    {
        if (Schema::hasTable($this->table_name)) {
            return;
        }

        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('sort')->default(1);

            $table->string('identifier', 160);
            $table->string('classes', 160)->nullable();

            $table->string('name', 160);
            $table->string('label', 160)->nullable();
            $table->string('type', 160)->nullable();
            $table->string('value', 160)->nullable();

            $table->string('help_text', 320)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['form_id', 'identifier'], 'unique_id_attr');
        });
    }
}
