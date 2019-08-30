<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVProgramKegiatanView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('CREATE VIEW v_program_kegiatan AS
            SELECT 
                A."KgtID",
                A."PrgID",
                D."UrsID",
                E."KUrsID",
                E."Kd_Urusan",
                CASE 
                        WHEN D."UrsID" IS NOT NULL OR  E."KUrsID" IS NOT NULL THEN
                                E."Nm_Urusan"
                        ELSE
                                \'SEMUA URUSAN\'
                END AS "Nm_Urusan",
                D."Kd_Bidang",
                CASE 
                        WHEN D."UrsID" IS NOT NULL OR  E."KUrsID" IS NOT NULL THEN
                                D."Nm_Bidang"
                        ELSE
                                \'SEMUA URUSAN\'
                END AS "Nm_Bidang",
                B."Kd_Prog",
                CASE 
                        WHEN D."UrsID" IS NOT NULL OR  E."KUrsID" IS NOT NULL THEN
                                CONCAT(E."Kd_Urusan", \'.\',D."Kd_Bidang", \'.\',B."Kd_Prog")
                        ELSE
                                CONCAT(\'n.nn.\',B."Kd_Prog")
                END AS kode_program,
                B."PrgNm", 
                B."Jns", 
                A."Kd_Keg",
                CASE 
                        WHEN D."UrsID" IS NOT NULL OR  E."KUrsID" IS NOT NULL THEN
                                CONCAT(E."Kd_Urusan", \'.\',D."Kd_Bidang", \'.\',B."Kd_Prog", \'.\',A."Kd_Keg")
                        ELSE
                                CONCAT(\'n.nn.\',B."Kd_Prog", \'.\',A."Kd_Keg")
                END AS kode_kegiatan,
                A."KgtNm",
                A."Descr",
                A."TA",
                A.created_at,
                A.updated_at	
            FROM "tmKgt" A
            JOIN "tmPrg" B ON A."PrgID"=B."PrgID"
            LEFT JOIN "trUrsPrg" C ON A."PrgID"=C."PrgID"
            LEFT JOIN "tmUrs" D ON C."UrsID"=D."UrsID"
            LEFT JOIN "tmKUrs" E ON D."KUrsID"=E."KUrsID"	
        ');			 				
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('DROP VIEW v_program_kegiatan');
    }
}