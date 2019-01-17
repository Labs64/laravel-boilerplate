<?php namespace App\Repositories;

/**
 * Abstract Class DbRepository
 *
 *@author Anuj Jaha <er.anujjaha@gmail.com>
 * @package App\Repositories
 */

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection as SupportCollection;

Abstract class DbRepository
{
    /**
     * Destroy Item
     *
     * @param string|int $id
     * @return bool
     * @throws GeneralException
     */
    public function destroy($id)
    {
        if($this->model->where('ID', '=', $id)->delete())
        {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.delete_error'));
    }

    /**
     * Select All
     *
     * @param string $columns
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function selectAll($columns='*', $order_by = 'id', $sort = 'asc')
    {
        return $this->model->select($columns)->orderBy($order_by, $sort)->get();
    }

    /**
     * Set DateTimeFormat
     *
     * @param mixed $input
     * @param mixed $field
     * @param string $format
     * @return bool|string
     */
    public function setDateTimeFormat($input = null, $field = null, $format = 'Y-m-d')
    {
        if(isset($input[$field]))
        {
            $carbonObj = Carbon::parse($input[$field]);
            return $format ? $carbonObj->format($format) : $carbonObj->toDateTimeString();
        }

        return false;
    }

    /**
     * Get Records with Offset & Limit
     *
     * @param integer $offset
     * @param integer $limit
     * @param array $where
     * @param array $relations
     * @param null|array $orderBy
     * @param string $direction
     * @param \Closure|null $callback
     * @return mixed
     */
    public function getRecordsByLimit($offset, $limit, $where = array(), $relations = array(), $orderBy = null, $direction = 'asc', $callback = null)
    {
        $query = $this->model->query();

        if($relations && !empty($relations))
        {
            $query->with($relations);
        }

        if(!empty($where))
        {
            $query = $query->where($where);
        }

        if($callback && $callback instanceof \Closure)
        {
            $callback($query);
        }

        if($orderBy && Schema::hasColumn($this->model->getTable(), $orderBy) && in_array(strtolower($direction), ['asc', 'desc']))
        {
            $query->orderBy($orderBy, $direction);
        }

        return $query->skip($offset)->take($limit)->get();
    }

    /**
     * Array Sort
     *
     * @param array $array
     * @param string $on
     * @param int|string $order
     * @return array
     */
    public function arraySort($array = array(), $on = '', $order = SORT_ASC)
    {
        $new_array      = [];
        $sortable_array = [];

        if(count($array) > 0)
        {
            foreach($array as $k => $v)
            {
                if(is_array($v))
                {
                    foreach($v as $k2 => $v2)
                    {
                        if($k2 == $on)
                        {
                            $sortable_array[$k] = $v2;
                        }
                    }
                }
                else
                {
                    $sortable_array[$k] = $v;
                }
            }

            switch($order)
            {
                case SORT_ASC:

                    asort($sortable_array);
                    break;

                case SORT_DESC:

                    arsort($sortable_array);
                    break;
            }

            foreach($sortable_array as $k => $v)
            {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }

    /**
     * Check Record Is Soft Deleted Or Not
     *
     * @return mixed
     * @throws GeneralException
     */
    public function checkRecordIsSoftDeleteOrNot()
    {
        if(!app()->runningInConsole())
        {
            $route = request()->route()->getName();

            if(strpos($route, '.edit') !== false)
            {
                throw new GeneralException('You cannot view a deleted record. Please restore the record before trying to open the edit view');
            }
        }
    }
}

