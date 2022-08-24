<?php
use App\Models\News;
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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            $table->foreignId('source_id')
                ->nullable()
                ->constrained('sources')
                ->onDelete('set null');

            $table->string('title', 255);
            $table->string('author', 255)->nullable();
            $table->enum('status', [
                News::DRAFT, News::ACTIVE, News::BLOCKED
            ])->default(News::DRAFT);
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
