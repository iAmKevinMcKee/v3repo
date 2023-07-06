<?php

use App\Models\Property;
use App\Models\PropertyContact;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('property_property_contact', function (Blueprint $table) {
            $table->foreignIdFor(Property::class);
            $table->foreignIdFor(PropertyContact::class);
            $table->boolean('current')->default(true);
            $table->boolean('primary')->default(false);
            $table->date('start_date')->default(now());
            $table->date('end_date')->nullable();
        });
    }
};
