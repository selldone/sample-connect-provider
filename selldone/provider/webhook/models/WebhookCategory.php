<?php

namespace Selldone\provider\webhook\models;

class WebhookCategory
{

    public string $name;
    public string $title;
    public ?string $description = null;
    public ?string $icon = null;
    public ?string $category = null;

    /**
     * @param string $name
     * @param string $title
     * @param string|null $description
     * @param string|null $icon
     * @param string|null $category
     */
    public function __construct(string $name, string $title, ?string $description, ?string $icon, ?string $category)
    {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
        $this->icon = $icon;
        $this->category = $category;
    }


}
