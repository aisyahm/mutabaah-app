<?php

use App\Models\Submission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
            $table->string("name");
            $table->integer("max_value")->nullable();
            $table->string("unit");
            
            $table->timestamps();
=======
          $table->id();

          $table->string("name");
          $table->integer("category");
          $table->boolean("female_only")->default(false);
          
          $table->timestamps();
>>>>>>> 3296c7a585f751582e728f463e71eb2f7cf1e5db
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
