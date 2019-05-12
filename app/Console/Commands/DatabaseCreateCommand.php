<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class DatabaseCreateCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'db:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new mysql database schema based on the database config file';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$schemaName = config("database.connections.mysql.database");
		$charset = config("database.connections.mysql.charset", 'utf8mb4');
		$collation = config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');

		config(["database.connections.mysql.database" => null]);

		$query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

		if (DB::statement($query)) {
			$this->info(sprintf('Successfully created %s database', $schemaName));
		} else {
			$this->error(sprintf('Failed to create %s database', $schemaName));
		}

		config(["database.connections.mysql.database" => $schemaName]);
	}

}
