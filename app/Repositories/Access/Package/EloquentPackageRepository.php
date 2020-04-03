<?php namespace App\Repositories\Access\Package;

/**
 * Class EloquentUserRepository
 * 
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */

use App\Models\Package;
use App\Exceptions\GeneralException;
use App\Repositories\DbRepository;
use Exception;

class EloquentPackageRepository extends DbRepository
{
    /**
     * Model
     *
     * @var object
     */
    protected $model;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new Package;
    }

    /**
     * Restore User
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function restore($id)
    {
        $package= $this->model->withTrashed()->where('id', $id)->first();
        
        if(isset($package) && isset($package->id))
        {
            $package>restore();
            return true;
        }
        
        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * Destroy User
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        // If the current user is who we're destroying, prevent this action and throw GeneralException

        $package = $this->model->find($id);

        if($package->delete())
        {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }
}