<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number', 6)->unique();
            $table->string('member_name');
            $table->string('member_id')->unique();
            $table->boolean('tshirt')->default(false);
            $table->boolean('nametag')->default(false);
            $table->boolean('bracelet')->default(false);
            $table->double('amount', 8, 2);
            $table->boolean('paid')->default(false);
            $table->foreignIdFor(User::class)->nullable();
            $table->timestamp('verified_at')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
