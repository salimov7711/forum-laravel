<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->unsignedInteger('main_post')->nullable()->after('post_id');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->dropColumn('main_post');
		});
	}
};
