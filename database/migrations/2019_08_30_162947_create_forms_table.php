<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    private $table_name = 'forms';

    public function up()
    {
        if (Schema::hasTable($this->table_name)) {
            return;
        }

        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id')->nullable();

            $table->string('name', 160);
            $table->text('introduction')->nullable();

            $table->string('redirect_url', 160)->nullable();
            $table->string('identifier', 160)->nullable();
            $table->string('classes', 160)->nullable();
            $table->string('button_text', 160)->nullable();
            $table->string('button_classes', 160)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }
}
