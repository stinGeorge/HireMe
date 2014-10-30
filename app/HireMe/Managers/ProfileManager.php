<?php

namespace HireMe\Managers;

class ProfileManager extends BaseManager{

    public function getRules(){

        $rules = [
            'website_url' => 'required|url',
            'description' => 'required|max:1000',
            'job_type'    => 'required|in:full,partial,freelance',
            'category_id' => 'required|exists:categories,id',
            'available'   => 'in:1,0'
        ];

        return $rules;

    }

    public function prepareData($data){
        if (!isset($data['available'])) {
            $data['available'] = 0;
        }

        // Manera directa sin asignacion masiva
        // $this->entity->slug = Str::slug($this->entity->user->full_name);
        $data['slug'] = \Str::slug($this->entity->user->full_name);

        return $data;
    }

}