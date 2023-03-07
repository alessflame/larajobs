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
        Schema::table('job_ads', function (Blueprint $table) {
            $table->decimal('ral')->after('description')->nullable();
            $table->string('skills')->after('description')->nullable(); // use this for field after specific column.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_ads', function (Blueprint $table) {
            $table->dropColumn('ral');
            $table->dropColumn('skills');
        });
    }
};
