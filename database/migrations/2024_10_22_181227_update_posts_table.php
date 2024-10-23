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
			// Rename the 'body' column to 'content'
			$table->renameColumn('body', 'content');
		});
	}

	public function down(): void
	{
		Schema::table('posts', function (Blueprint $table) {
			// Revert the column back to 'body' if the migration is rolled back
			$table->renameColumn('content', 'body');
		});
	}
};
