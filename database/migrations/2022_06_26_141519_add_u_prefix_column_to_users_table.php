<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('u_prefix')->comment('คำนำหน้าชื่อ');
            $table->string('u_first_name')->comment('ชื่อ');
            $table->string('u_last_name')->comment('นามสกุล');
            $table->string('u_nick_name')->comment('ชื่อเล่น');
            $table->string('u_phone')->comment('เบอร์โทรศัพท์');
            $table->date('u_birthday')->comment('วันเกิด');
            $table->date('u_workday')->comment('วันที่เริ่มทำงาน');
            $table->date('u_officerday')->nullable()->comment('วันที่บรรจุ');
            $table->string('u_address')->comment('ที่อยู่');
            $table->foreignId('sub_district_id')
                ->comment('relations sub_districts (ตำบล)')
                ->references('id')
                ->on('sub_districts')
                ->cascadeOnDelete();
            $table->foreignId('district_id')
                ->comment('relations districts (อำเภอ)')
                ->references('id')
                ->on('districts')
                ->cascadeOnDelete();
            $table->foreignId('province_id')
                ->comment('relations provinces (จังหวัด)')
                ->references('id')
                ->on('provinces')
                ->cascadeOnDelete();
            $table->string('u_zipcode')->comment('รหัสไปษรณีย์');
            $table->foreignId('position_id')
                ->comment('relations positions (ตำแหน่ง)')
                ->references('id')
                ->on('positions')
                ->cascadeOnDelete();
            $table->foreignId('department_id')
                ->comment('relations departments (แผนกหลัก)')
                ->references('id')
                ->on('departments')
                ->cascadeOnDelete();
            $table->foreignId('sub_department_id')
                ->comment('relations departments (แผนกย่อย)')
                ->references('id')
                ->on('departments')
                ->cascadeOnDelete();
            $table->foreignId('leader_id')
                ->comment('relations users (หัวหน้าหน่วย)')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignId('commander_id')
                ->comment('relations users (หัวหน้ากลุ่มงาน)')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignId('director_id')
                ->comment('relations users (ผู้อำนวยการ)')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['sub_district_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['position_id']);
            $table->dropForeign(['department_id']);
            $table->dropForeign(['sub_department_id']);
            $table->dropForeign(['leader_id']);
            $table->dropForeign(['commander_id']);
            $table->dropForeign(['director_id']);
            

            $table->dropColumn([
                'u_prefix',
                'u_first_name',
                'u_last_name',
                'u_nick_name',
                'u_birthday',
                'u_workday',
                'u_officerday',
                'u_address',
                'sub_district_id',
                'district_id',
                'province_id',
                'u_zipcode',
                'position_id',
                'department_id',
                'sub_department_id',
                'leader_id',
                'commander_id',
                'director_id'
            ]);

            $table->dropSoftDeletes();
        });
    }
};
