<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencasTable extends Migration
{
    public function up()
    {
        Schema::create('presencas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->date('data');
            $table->boolean('presente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presencas');
    }
}


