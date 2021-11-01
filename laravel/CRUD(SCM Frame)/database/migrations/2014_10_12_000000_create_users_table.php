<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function GuzzleHttp\default_ca_bundle;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('region');
      $table->string('city');
      $table->date('doj');
      $table->string('department');
      $table->foreignId('created_user_id')->references('id')->on('users');
      $table->foreignId('updated_user_id')->references('id')->on('users');
      $table->foreignId('deleted_user_id')->nullable()->references('id')->on('users');
      $table->timestamps(0);
      $table->softDeletes('deleted_at', 0);
      $table->rememberToken();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
