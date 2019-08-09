<?php


namespace App\Services;

use App\Constants\Attribute;
use App\Models\BaseModel;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use \Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

abstract class Service
{
    /** @var BaseModel $model */
    protected $model;

    /** @var Builder $queryBuilder */
    protected $queryBuilder;

    public function __construct()
    {
        if (is_null($this->queryBuilder)) {
            $this->queryBuilder = $this->model;
        }
    }

    /**
     * @param $data
     * @param null $id
     * @return BaseModel|Exception|mixed
     */
    public function save($data, $id = null)
    {
        try {
            $this->isValid($data, $id);
            $entity = $this->model;
            if ($id) {
                $entity = $this->model->find($id);
                unset($data[Attribute::ID]);
            }
            $entity->populate($data);
            $entity->save();
            return $entity;
        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * @param $id
     * @return Builder
     */
    public function find($id)
    {
        $data = $this->queryBuilder->where($this->model->getKeyName(), $id)->first();
        if ($data) {
            $data->id = $data->{$this->model->getKeyName()};
        }
        return $data;
    }

    /**
     * Melhorar forma de adicionar o campo ID na paginacao.
     *
     * @param $data
     * @return Exception|LengthAwarePaginator
     */
    public function getPaginate($data)
    {
        $collect = collect($data);
        /** @var Builder $query */
        $query = $this->queryBuilder
            ->autoQuery(json_decode($collect->pull(Attribute::FILTER)))
            ->order(json_decode($collect->pull(Attribute::ORDER)));
        if ($collect->pull(Attribute::PAGE)) {
            $paginate = $query->paginate();
            $itemsTransformed = self::treateDataAddPk($paginate->getCollection());
            $itemsTransformed = $this->treatePaginateData($itemsTransformed);
            return new LengthAwarePaginator(
                $itemsTransformed,
                $paginate->total(),
                $paginate->perPage(),
                $paginate->currentPage(),
                [
                    Attribute::PATH => \Request::url(),
                    Attribute::QUERY => [
                        Attribute::PAGE => $paginate->currentPage()
                    ]
                ]
            );
        }
        $itemsTransformed = $this->treatePaginateData($query->get());
        return self::treateDataAddPk($itemsTransformed);
    }

    /**
     * @param $id
     * @return Exception|int
     */
    public function delete($id)
    {
        try {
            if ($this->isValidDelete($id)) {
                return $this->model->destroy($id);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * @param $data
     * @param null $id
     * @return bool
     */
    public function isValid(&$data, $id = null): bool
    {
        if ($data && ($id || !$id)) {
            return true;
        }

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function isValidDelete($id): bool
    {
        if ($id) {
            return true;
        }
        return false;
    }



    /**
     * @param $data
     * @return mixed
     */
    public function treatePaginateData($data)
    {
        return $data;
    }

    /**
     * @param $collection
     * @return Exception
     */
    public function treateDataAddPk($collection)
    {
        try {
            $keyName = $this->model->getKeyName();
            return $collection->map(function ($data) use ($keyName) {
                $data['id'] = $data[$keyName];
                return $data;
            });
        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * Recebe o array data do post extrai o objeto filter e retornando como collection
     *
     * @param array $data
     * @return Collection
     */
    public function getFilter(array $data)
    {
        return collect(json_decode(collect($data)->pull(Attribute::FILTER)));
    }

    /**
     * Recebe o objeto collection e retorna o mesmo como objeto json
     *
     * @param Collection $filter
     * @return string
     */
    public function setFilter(Collection $filter)
    {
        return json_encode($filter);
    }

    /**
     * Recebe o array data do post extrai o objeto order e retornando como collection
     *
     * @param array $data
     * @return Collection
     */
    public function getOrder(array $data)
    {
        return collect(json_decode(collect($data)->pull(Attribute::ORDER)));
    }

    /**
     * Recebe o objeto collection e retorna o mesmo como objeto json
     *
     * @param Collection $order
     * @return string
     */
    public function setOrder(Collection $order)
    {
        return json_encode($order);
    }
}
