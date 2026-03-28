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
        $this->apiUrl = config('app.jsonplaceholder.endpoint');
        $this->modelMapArray = [
            'post' => \App\Models\Post::class,
            'comment' => \App\Models\Comment::class,
            'photo' => \App\Models\Photo::class,
            'todo' => \App\Models\Todo::class,
            'user' => \App\Models\User::class,
            'album' => \App\Models\Album::class,
        ];
        $this->resourceIdentifierArray = [
            'user',
            'post',
            'comment',
            'album',
            'photo',
            'todo',
        ];
    }

    public function fetchFromSource($resourceIdentifier){
        /**
         * configure endpoint based on resource
         */
        $urlEndPoint = $this->apiUrl . "/" . $resourceIdentifier."s";

        $response = Http::get($urlEndPoint);

        $data = $response->json();

        return $data;

    }

    public function importResourceToDb($resourceIdentifier,$data){
        /**
         * setup model based from
         * identifier
         */
        $model = $this->modelMapArray[$resourceIdentifier] ?? null;
        foreach($data as $currentData){
            DB::transaction(function () use ($model,$currentData){
                $model::updateOrCreate(
                    [
                        'id'=>$currentData['id']
                    ],
                    $currentData
                );
            });
        }

    }

    public function initialize(){
        foreach ($this->resourceIdentifierArray as $resourceIdentifier) {
            $dataFetched = $this->fetchFromSource($resourceIdentifier);
            $this->importResourceToDb($resourceIdentifier,$dataFetched);
        }
    }

}
