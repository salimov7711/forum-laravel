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
		Schema::table('users', function (Blueprint $table) {
			$table->string('picture')->nullable()->after('email');
			$table->string('icon')->nullable()->after('email');
			$table->string('thumb')->nullable()->after('email');
			$table->integer('user_role_id')->nullable()->after('email');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('picture');
			$table->dropColumn('icon');
			$table->dropColumn('thumb');
			$table->dropColumn('user_role_id');
			//
		});
	}
};
