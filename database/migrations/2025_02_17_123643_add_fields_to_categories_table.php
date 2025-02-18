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
        Schema::table('categories', function (Blueprint $table) {
            
            $table->string('meta_title')->nullable()->after('slug');
            $table->string('meta_description')->nullable()->after('meta_title');
            $table->string('icon')->nullable()->after('meta_description');
            $table->string('description')->nullable()->after('icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['meta_title','meta_description','icon','description']);
        });
    }
};
