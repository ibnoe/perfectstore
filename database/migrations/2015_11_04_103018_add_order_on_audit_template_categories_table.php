<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderOnAuditTemplateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audit_template_categories', function(Blueprint $table)
        {
            $table->integer('category_order')->after('id');
        });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audit_template_categories', function(Blueprint $table)
        {
            $table->dropColumn(array('category_order'));
        });
    }
}
