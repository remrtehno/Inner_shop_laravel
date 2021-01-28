<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'incomes', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->text( 'article' );
			$table->text( 'batch' );
			$table->text( 'qty' );
			$table->text( 'purchase' );
			$table->text( 'retail_price' );
			$table->text( 'warehouse' );
			$table->text( 'provider' );
			$table->text( 'is_returned' );
			
			$table->timestamps();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'incomes' );
	}
}
