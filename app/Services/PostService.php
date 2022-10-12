<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostService{

    public function putImagesInStorage($data){

        if(isset($data['main_image'])) $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        if(isset($data['secondary_image'])) $data['secondary_image'] = Storage::disk('public')->put('images', $data['secondary_image']);

        return $data;
    }


    public function storePostInDB($data){

        $tagIds = null;

        if(isset($data['tags'])) {

            $tagIds = $data['tags'];
            unset($data['tags']);

        }

        try{
            DB::beginTransaction();

            $createdPost = Post::create($data);

            if(!is_null($tagIds)) $createdPost->tags()->attach($tagIds);

            DB::commit();
        }
        catch(\Exception $exception){

            DB::rollBack();
            abort(500);
        }
    }

    public function updatePost($data, $post){

        $tagIds = null;

        if(isset($data['tags'])) {

            $tagIds = $data['tags'];
            unset($data['tags']);

        }

        try{
            DB::beginTransaction();

            $post->update($data);
            $post->fresh();

            $post->tags()->sync($tagIds);
            DB::commit();
        }
        catch(\Exception $exception){

            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
