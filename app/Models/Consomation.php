<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consomation extends Model
{
    use HasFactory;

    protected $fillable = [
        "chaufeur_id",
        "camion_id",
        "ville",
    ];
    public function Bons()
    {
        return $this->hasMany(Bons::class);
    }
    public function chaufeur()
    {
        return $this->belongsTo(Chaufeur::class);
    }
    public function Station()
    {
        return $this->belongsTo(Station::class);
    }
    public function Camion()
    {
        return $this->belongsTo(Camion::class);
    }
    public function getQtyLittreAttribute()
    {
        $bons = $this->Bons()->where('nature', 'gazole')->orderByDesc('id')->get();
        $first_bon = $bons->first();
        $last_bon = $bons->last();
        if ($bons->count() > 1 && $first_bon->km > 0 && $last_bon->km > 0) {
            $first = $bons->first()->qte_litre;
            $qte_littre = $bons->sum('qte_litre') - $first;
            return $qte_littre;
        }
        return null;
    }
    public function getKmTotalAttribute()
    {
        $bons = $this->Bons()->where('nature', 'gazole')->orderByDesc('id')->get();
        $first_bon = $bons->first();
        $last_bon = $bons->last();
        if ($bons->count() > 1 && $first_bon->km > 0 && $last_bon->km > 0) {
            $kmdepart = $bons->first()->km;
            $kmreturn = $bons->latest()->first()->km;
            $KmTotal = $kmreturn - $kmdepart;
            return $KmTotal;
        }
    }

    public function getTauxAttribute()
    {
        $bons = $this->Bons()->where('nature', 'gazole')->orderByDesc('id')->get();
        $first_bon = $bons->first();
        $last_bon = $bons->last();
        if ($bons->count() > 1 && $first_bon->km > 0 && $last_bon->km > 0) {
            $qtylittre = $this->getQtyLittreAttribute();
            $KmTotal = $this->getKmTotalAttribute();
            return number_format(($qtylittre  / $KmTotal) * 100, 2);
        }
    }

    public function getPrixAttribute()
    {
        $bons = $this->Bons()->where('nature', 'gazole')->orderByDesc('id')->get();
        $first_bon = $bons->first();
        $last_bon = $bons->last();
        if ($bons->count() > 1 && $first_bon->km > 0 && $last_bon->km > 0) {
            $bons = $this->Bons()->where('nature', 'gazole');
            $first = $bons->first()->prix;
            $prix = $bons->sum('prix') - $first;
            return $prix;
        }
    }

    public function getStatueAttribute()
    {
        $bons = $this->Bons()->where('nature', 'gazole');
        if ($bons->count() > 1) {
            $taux = $this->getTauxAttribute();
            $camionconsomation = $this->Camion->consommation;
            $statue = $taux - $camionconsomation;
            return $statue;
        }
        // return '<span class="badge bg-secondary">New</span>';
    }
}
