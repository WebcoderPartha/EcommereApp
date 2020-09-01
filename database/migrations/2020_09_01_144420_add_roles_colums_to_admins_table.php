<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesColumsToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->integer('type')->nullable();
            $table->integer('category')->nullable();
            $table->integer('coupon')->nullable();
            $table->integer('products')->nullable();
            $table->integer('orders')->nullable();
            $table->integer('blog')->nullable();
            $table->integer('reports')->nullable();
            $table->integer('users')->nullable();
            $table->integer('return_order')->nullable();
            $table->integer('contact_message')->nullable();
            $table->integer('product_comment')->nullable();
            $table->integer('site_setting')->nullable();
            $table->integer('others')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('category');
            $table->dropColumn('coupon');
            $table->dropColumn('products');
            $table->dropColumn('orders');
            $table->dropColumn('blog');
            $table->dropColumn('reports');
            $table->dropColumn('users');
            $table->dropColumn('return_order');
            $table->dropColumn('contact_message');
            $table->dropColumn('product_comment');
            $table->dropColumn('site_setting');
            $table->dropColumn('others');
        });
    }
}
