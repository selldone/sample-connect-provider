<?php

namespace Selldone\provider\webhook\responses;

use Illuminate\Contracts\Support\Arrayable;
use Selldone\provider\webhook\models\WebhookCategory;

class SyncCategoriesResponse  extends \stdClass implements Arrayable
{

    public array $categories=[];
    public int $total=0;


    /**
     * @param array $categories
     * @return SyncCategoriesResponse
     */
    public function setCategories(array $categories): self
    {
        $this->categories = $categories;
        return $this;
    }

    public function addCategory(WebhookCategory $category): self
    {
        $this->categories[]=$category;
        return $this;
    }

    /**
     * @param int $total
     * @return SyncCategoriesResponse
     */
    public function setTotal(int $total): self
    {
        $this->total = $total;
        return $this;
    }


    public function toArray()
    {
        if(!$this->total){
            $this->total=sizeof($this->categories);
        }
        return ['categories' => $this->categories, 'total' => $this->total];
    }
}
