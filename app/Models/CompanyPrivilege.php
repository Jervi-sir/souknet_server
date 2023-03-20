<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyPrivilege extends Model
{
    use HasFactory;

    public function getCompanies() :HasMany
    {
        return $this->hasMany(Company::class);
    }
}
