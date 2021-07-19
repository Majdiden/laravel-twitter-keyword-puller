<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Atymic\Twitter\Twitter as TwitterContract;
use Twitter;
use DateTime;

class TwitterListsController extends Controller
{
    public function index(){
        $tweets = [];

        $statuses = Twitter::getListStatuses(['list_id' => "1416543495322587138", 'include_rts' => false,'count' => "200"]);

            // foreach($statuses as $status){

            //     if(!$store->protected){

            //         $contents = Twitter::getUserTimeline(['user_id' => $store->id_str]);
                    
                    foreach($statuses as $tweet){
                        if(Str::contains($tweet->text, ['عروض', 'تخفيضات', 'توفير', 'عرض', 'تخفيض', 'offer', 'offers', 'discount'])){
                            $tweets[] = $tweet;
                        }
                    }
            //     }                
            // }

        return view('welcome')->with('tweets', $tweets);
    }

    public function addMembers(){
       return $lists = Twitter::getLists();
 
    }

    public function lists(){
        $tweets = [];

        $stores = Twitter::getListMembers(['list_id' => "1416543495322587138", 'count' => "200"]);

            foreach($stores->users as $store){

                if(!$store->protected){

                    $contents = Twitter::getUserTimeline(['user_id' => $store->id_str]);
                    
                    foreach($contents as $tweet){
                        if(Str::contains($tweet->text, ['عروض', 'تخفيضات', 'توفير', 'عرض', 'تخفيض', 'offer', 'offers', 'discount'])){
                            $tweets[] = $tweet;
                        }
                    }
                }                
            }

        return response()->json($tweets);
  
     }
}