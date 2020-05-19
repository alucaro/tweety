@extends('layouts.app')

@section('content')
  <header class="mb-6 relative">
    <img 
      src="/images/default-profile-banner.jpg" 
      alt=""
      class="mb-2"
    >

    <div class="flex justify-between items-center">
      <div>
        <h2 class="font-bold text-2xl mb-0"> {{ $user->name }}</h2>
        <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
      </div>

      <div>
        <a href="" class="rounded-full border border-gray-300 py-2 px-2 text-black text-xs mr-2">Edit profie</a>
        <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Follow me</a>
      </div>
    </div>

    
    <p class="text-sm">
      Tom and Jerry is an American animated franchise and series of comedy short films created in 1940 by William Hanna and Joseph Barbera. 
      Best known for its 161 theatrical short films by Metro-Goldwyn-Mayer, the series centers on a friendship/rivalry (a love-hate relationship) 
      between the title characters Tom, a cat, and Jerry, a mouse. Many shorts also feature several recurring characters.
    </p>

    <img 
      src="{{ $user->avatar }}" 
      alt=""
      class="rounded-full mr-2 absolute"
      style="width: 150px; left: calc(50% - 75px); top:55%"
    >


  </header>

  @include ('_timeline', [
      'tweets'=> $user->tweets
  ])
    
@endsection
