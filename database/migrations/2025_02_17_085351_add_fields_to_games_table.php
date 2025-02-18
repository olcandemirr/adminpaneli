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
        Schema::table('games', function (Blueprint $table) {
            if (!Schema::hasColumn('games', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('games', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('games', 'image')) {
                $table->string('image')->nullable()->after('meta_description');
            }
            if (!Schema::hasColumn('games', 'tags')) {
                $table->string('tags')->nullable()->after('image');
            }
            if (!Schema::hasColumn('games', 'game_link')) {
                $table->string('game_link')->nullable()->default('https://example.com')->after('description');
            }
            if (!Schema::hasColumn('games', 'width')) {
                $table->integer('width')->default(800)->after('game_link');
            }
            if (!Schema::hasColumn('games', 'height')) {
                $table->integer('height')->default(600)->after('width');
            }
            if (!Schema::hasColumn('games', 'is_active')) {
                $table->boolean('is_active')->default(1)->after('height');
            }
            if (!Schema::hasColumn('games', 'is_editor_choice')) {
                $table->boolean('is_editor_choice')->default(0)->after('is_active');
            }
            if (!Schema::hasColumn('games', 'played_count')) {
                $table->integer('played_count')->default(0)->after('is_editor_choice');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title', 
                'meta_description', 
                'image', 
                'tags', 
                'game_link', 
                'width', 
                'height', 
                'is_active', 
                'is_editor_choice', 
                'played_count'
            ]);

        });
    }
};
