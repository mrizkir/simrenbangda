<?php

namespace App\Models\DMaster;

use Illuminate\Database\Eloquent\Model;

class OrganisasiModel extends Model {
     /**
     * nama tabel model ini.
     *
     * @var string
     */
    protected $table = 'tmOrg';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'OrgID', 'UrsID', 'OrgCd', 'OrgNm', 'Alamat', 'NamaKepalaSKPD', 'NIPKepalaSKPD', 'Descr', 'TA'
    ];
    /**
     * primary key tabel ini.
     *
     * @var string
     */
    protected $primaryKey = 'OrgID';
    /**
     * enable auto_increment.
     *
     * @var string
     */
    public $incrementing = false;
    /**
     * activated timestamps.
     *
     * @var string
     */
    public $timestamps = true;

    /**
     * make the model use another name than the default
     *
     * @var string
     */
    protected static $logName = 'OrganisasiController';
    /**
     * log the changed attributes for all these events 
     */
    protected static $logAttributes = ['OrgID', 'OrgCd', 'OrgNm'];
    /**
     * log changes to all the $fillable attributes of the model
     */
    // protected static $logFillable = true;

    //only the `deleted` event will get logged automatically
    // protected static $recordEvents = ['deleted'];
}
