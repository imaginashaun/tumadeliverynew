<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DriverLocationRepository;
use App\Entities\DriverLocation;
use App\Validators\DriverLocationValidator;

/**
 * Class DriverLocationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DriverLocationRepositoryEloquent extends BaseRepository implements DriverLocationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DriverLocation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
