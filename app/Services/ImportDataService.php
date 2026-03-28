<?php

namespace App\Services;

use App\Models\Album;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportDataService
{
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('jsonplaceholder.endpoint');
        $this->modelMapArray = [
            'post' => \App\Models\Post::class,
            'comment' => \App\Models\Comment::class,
            'photo' => \App\Models\Photo::class,
            'todo' => \App\Models\Todo::class,
            'user' => \App\Models\User::class,
            'album' => \App\Models\Album::class,
        ];
        $this->resourceIdentifierArray = [
            'post',
            'comment',
            'photo',
            'todo',
            'user',
            'album',
        ];
    }

    public function fetchFromSource($resourceIdentifier){
        /**
         * configure endpoint based on resource
         */
        $urlEndPoint = $this->apiUrl . "/" . $resourceIdentifier;

        $response = Http::get($urlEndPoint);

        $data = $response->json();

        return $data;

    }

    public function importResourceToDb($resourceIdentifier,$data){
        /**
         * setup model based from
         * identifier
         */
        $model = $this->modelMapArray[$resourceIdentifier];
        foreach($data as $currentData){
            DB::transaction(function () {
                $model::createOrUpdate(
                    [
                        'id'=>$currentData['id']
                    ],
                    $currentData
                );
            });
        }

    }

    public function initialize(){
        foreach ($this->resourceIdentifierArray as $resource) {
            $dataFetched = $this->fetchFromSource($resource);
            $this->importResourceToDb($dataFetched);
        }
    }

}
