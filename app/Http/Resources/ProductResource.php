<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'prod_name' => $this->title,
            'categories' => $this->category->title,
            'best_price' => $this->price,
            'mrp' => $this->mrp,
            'stock' => $this->stock,
            'url_1' => asset("storage/uploads/products/" . $this->thumbnail),
            'url_2' => $this->getImagePaths(),
            // 'category' => $this->category->title
        ];
    }

    // Add a method to get image paths
    protected function getImagePaths()
    {
        // Decode the JSON string to an array
        $imagesArray = json_decode($this->images, true);

        // Use array_map to prepend the base path to each image name
        return array_map(function ($imageName) {
            return asset("storage/uploads/products/" . $imageName);
        }, $imagesArray);
    }
}
