<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Таблица книг
        Schema::create('книги', function (Blueprint $table) {
            $table->id();
            $table->string('название', 255);
            $table->string('автор', 100);
            $table->date('дата_публикации');
            $table->decimal('цена', 8, 2);
            $table->smallInteger('страницы');
            $table->boolean('доступность')->default(true);
            $table->float('рейтинг', 3, 2)->nullable();
            $table->timestamp('добавлено')->useCurrent();
            $table->timestamps();
        });

        // Таблица категорий
        Schema::create('категории', function (Blueprint $table) {
            $table->id();
            $table->string('название', 100);
            $table->text('описание')->nullable();
            $table->tinyInteger('приоритет')->default(0);
            $table->date('дата_создания')->default(now());
            $table->boolean('возрастное_ограничение')->default(true);
            $table->integer('пупулярность');
            $table->smallInteger('количество_книг')->default(0);
            $table->timestamps();
        });

        // Таблица издателей
        Schema::create('издатели', function (Blueprint $table) {
            $table->id();
            $table->string('название', 150);
            $table->text('адрес')->nullable();
            $table->string('телефон')->nullable();
            $table->string('email', 100)->nullable();
            $table->year('год_основания')->nullable();
            $table->boolean('активность')->default(true);
            $table->string('сайт', 200)->nullable();
            $table->timestamps();
        });

        // Таблица библиотек
        Schema::create('библиотеки', function (Blueprint $table) {
            $table->id();
            $table->string('название', 100);
            $table->text('адрес')->nullable();
            $table->string('часы_работы', 50)->nullable();
            $table->boolean('открыта')->default(false);
            $table->integer('вместимость_книг')->default(0);
            $table->date('дата_основания')->nullable();
            $table->float('рейтинг', 3, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('библиотеки');
        Schema::dropIfExists('издатели');
        Schema::dropIfExists('категории');
        Schema::dropIfExists('книги');
    }
};
